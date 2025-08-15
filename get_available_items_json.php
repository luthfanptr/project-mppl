<?php
// saat user memilih tanggal ambil dan tanggal kembali,
// kita akan mengirimkan daftar barang yang tersedia pada tanggal tersebut
// file ini akan mengembalikan data dalam format JSON, misalnya:
// {
//     "id": "BRG001",
//     "nama": "Tenda Dome Pro (Sisa 4)",
//     "harga": "25000",
//     "stok_tersedia": 4,
//     "gambar": "tenda_pro.jpg"
//  }

// akan mengirimkan data JSON yang berisi daftar barang yang tersedia
header('Content-Type: application/json');
include 'assets/php/koneksi.php';

//
if (!isset($_POST['tanggal_ambil']) || !isset($_POST['tanggal_kembali'])) {
    echo json_encode(['error' => 'Tanggal tidak lengkap.']);
    exit;
}

// ambil tanggal ambil dan tanggal kembali dari POST
$tanggal_ambil = mysql_real_escape_string($_POST['tanggal_ambil']);
$tanggal_kembali = mysql_real_escape_string($_POST['tanggal_kembali']);

// mengambil daftar barang yang tersedia, sub query untuk menghitung stok yang sudah tersewa
$query = "
    SELECT id_barang, nama_barang, harga_sewa, img, qty as stok_total, 
    (
        SELECT COALESCE(SUM(td.qty_sewa), 0) 
        FROM tb_transaksi_detail td
        JOIN tb_transaksi t ON td.no_transaksi = t.no_transaksi
        WHERE 
            td.id_barang = b.id_barang AND
            t.status_sewa NOT IN ('Dibatalkan', 'Selesai') AND
            -- PERUBAHAN LOGIKA: tanggal_ambil dikurangi 1 hari untuk hari persiapan
            (DATE_SUB(t.tanggal_ambil, INTERVAL 1 DAY) < '$tanggal_kembali' AND t.tgl_kembali_aktual >= '$tanggal_ambil')
    ) AS stok_tersewa
    FROM tb_barang b
";

// eksekusi query
$result = mysql_query($query);

// jika query gagal, tampilkan pesan error
if (!$result) {
    echo json_encode(['error' => 'Query Gagal: ' . mysql_error()]);
    exit;
}

//
$available_items = array();
// melakukan loop untuk mendapatkan data barang yang tersedia
while ($row = mysql_fetch_assoc($result)) {
    // hitung stok yang tersedia
    $stok_tersedia = $row['stok_total'] - $row['stok_tersewa'];
    if ($stok_tersedia > 0) {
        $available_items[] = [
            'id' => $row['id_barang'],
            'nama' => $row['nama_barang'] . ' (Sisa ' . $stok_tersedia . ')',
            'harga' => $row['harga_sewa'],
            'stok_tersedia' => $stok_tersedia,
            'gambar' => $row['img']
        ];
    }
}
// mengirim data dan mengubahnya menjadi format JSON
echo json_encode($available_items);
?>