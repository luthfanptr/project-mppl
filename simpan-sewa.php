<?php
// FILE: simpan-sewa.php (VERSI LENGKAP & FINAL)
include 'assets/php/koneksi.php';
include 'assets/php/konfigurasi_email.php';
date_default_timezone_set('Asia/Jakarta');

function generateUniqueFileName($originalFileName, $prefix) {
    $fileExtension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
    return $prefix . "-" . time() . "-" . uniqid() . "." . $fileExtension;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { die("Akses tidak sah."); }

// Validasi kelengkapan data
$required_fields = ['namaLengkap', 'emailPenerima', 'tanggalAmbil', 'lamaSewa', 'tanggalKembaliHidden', 'barang', 'qty'];
foreach ($required_fields as $field) {
    if (empty($_POST[$field])) { die("Error: Semua field wajib diisi."); }
}
if (empty($_FILES["fotoIdentitas"]["name"]) || empty($_FILES["buktiPembayaran"]["name"])) {
    die("Error: Foto identitas dan bukti pembayaran wajib diupload.");
}

// Ambil data dari form
$nama_pemesan = mysql_real_escape_string($_POST['namaLengkap']);
$email_penerima = mysql_real_escape_string($_POST['emailPenerima']);
$tanggal_ambil = mysql_real_escape_string($_POST['tanggalAmbil']);
$lama_sewa = (int)$_POST['lamaSewa'];
$tgl_kembali = mysql_real_escape_string($_POST['tanggalKembaliHidden']);
$total_bayar = preg_replace('/[^0-9]/', '', $_POST['totalBayar']);
$tgl_pesan_sekarang = date("Y-m-d H:i:s");

// --- BLOK VALIDASI STOK YANG SEBELUMNYA HILANG ---
$stok_aman = true;
$barang_pesanan = array();
$loop_index = 0;
$pesan_error = "";

foreach ($_POST['barang'] as $id_brg) {
    if (!empty($id_brg)) {
        $id_brg_safe = mysql_real_escape_string($id_brg);
        $qty_pesan = (int)$_POST['qty'][$loop_index];

        if ($qty_pesan <= 0) { $loop_index++; continue; }

        $query_stok = "
            SELECT qty as stok_total, 
            (
                SELECT COALESCE(SUM(td.qty_sewa), 0) 
                FROM tb_transaksi_detail td
                JOIN tb_transaksi t ON td.no_transaksi = t.no_transaksi
                WHERE 
                    td.id_barang = b.id_barang AND
                    t.status_sewa NOT IN ('Dibatalkan', 'Selesai') AND
                    (DATE_SUB(t.tanggal_ambil, INTERVAL 1 DAY) < '$tgl_kembali' AND t.tgl_kembali_aktual >= '$tanggal_ambil')
            ) AS stok_tersewa
            FROM tb_barang b WHERE b.id_barang = '$id_brg_safe'
        ";
        
        $res_stok = mysql_query($query_stok);
        if (!$res_stok || mysql_num_rows($res_stok) == 0) {
            $stok_aman = false; $pesan_error = "Terjadi kesalahan saat memeriksa stok barang."; break;
        }

        $data_stok = mysql_fetch_assoc($res_stok);
        $stok_tersedia = $data_stok['stok_total'] - $data_stok['stok_tersewa'];

        if ($qty_pesan > $stok_tersedia) {
            $stok_aman = false;
            $nama_barang_error_q = mysql_query("SELECT nama_barang FROM tb_barang WHERE id_barang='$id_brg_safe'");
            $nama_barang_error = mysql_fetch_assoc($nama_barang_error_q)['nama_barang'];
            $pesan_error = "Stok untuk '$nama_barang_error' tidak mencukupi (hanya tersisa $stok_tersedia unit).";
            break;
        }
        $barang_pesanan[] = ['id' => $id_brg_safe, 'qty' => $qty_pesan];
    }
    $loop_index++;
}
// --- AKHIR BLOK VALIDASI STOK ---


if ($stok_aman && !empty($barang_pesanan)) {
    $target_dir = "uploads/";
    $namaFileIdentitas = generateUniqueFileName($_FILES["fotoIdentitas"]["name"], "identitas");
    $namaFileBukti = generateUniqueFileName($_FILES["buktiPembayaran"]["name"], "bukti");
    if (!move_uploaded_file($_FILES["fotoIdentitas"]["tmp_name"], $target_dir . $namaFileIdentitas) || !move_uploaded_file($_FILES["buktiPembayaran"]["tmp_name"], $target_dir . $namaFileBukti)) {
        die("Error: Gagal mengupload file lampiran.");
    }

    $kodifikasi = "TRS" . date('ymd');
    $q_trans_num = mysql_query("SELECT no_transaksi FROM tb_transaksi WHERE no_transaksi LIKE '$kodifikasi%' ORDER BY no_transaksi DESC LIMIT 1");
    $last_num = 0;
    if (mysql_num_rows($q_trans_num) > 0) {
        $last_trans = mysql_fetch_assoc($q_trans_num);
        $last_num = (int)substr($last_trans['no_transaksi'], -3);
    }
    $no_transaksi = $kodifikasi . str_pad($last_num + 1, 3, '0', STR_PAD_LEFT);

    // Menyimpan email
    $q_insert_trans = "INSERT INTO tb_transaksi (no_transaksi, nama_pemesan, no_telp, lama_sewa, tgl_pesan, tanggal_ambil, tgl_kembali_aktual, total_bayar, foto_identitas, bukti_pembayaran, status_sewa) VALUES ('$no_transaksi', '$nama_pemesan', '$email_penerima', '$lama_sewa', '$tgl_pesan_sekarang', '$tanggal_ambil', '$tgl_kembali', '$total_bayar', '$namaFileIdentitas', '$namaFileBukti', 'Menunggu Persetujuan')";
    
    $exec_trans = mysql_query($q_insert_trans);

    if ($exec_trans) {
        foreach ($barang_pesanan as $barang) {
            mysql_query("INSERT INTO tb_transaksi_detail (no_transaksi, id_barang, qty_sewa) VALUES ('$no_transaksi', '".$barang['id']."', '".$barang['qty']."')");
        }

        $subjek_email = "Konfirmasi Pemesanan CAMPP - " . $no_transaksi;
        $isi_email = "
            Halo <b>$nama_pemesan</b>,<br><br>
            Terima kasih telah melakukan pemesanan di CAMPP. Pesanan Anda dengan nomor <b>$no_transaksi</b> telah kami terima.<br><br>
            Saat ini pesanan Anda sedang menunggu persetujuan dari admin kami. Anda akan menerima email pemberitahuan selanjutnya setelah pesanan Anda disetujui atau ditolak.<br><br>
            Terima kasih,<br>
            <b>Tim CAMPP</b>
        ";
        kirim_email($email_penerima, $nama_pemesan, $subjek_email, $isi_email);

        header("Location: cetak-sewa.php?no_transaksi=$no_transaksi");
        exit();
    } else {
        die("Gagal menyimpan data transaksi ke database: " . mysql_error());
    }
} else {
    $final_error = !empty($pesan_error) ? $pesan_error : "Tidak ada barang yang dipilih atau kuantitas 0.";
    die("Pemesanan Gagal: " . $final_error . " Silakan kembali dan perbaiki pesanan Anda.");
}
?>