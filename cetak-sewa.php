<?php
// FILE: cetak-sewa.php (VERSI FINAL DENGAN TOMBOL KEMBALI)
include 'assets/php/koneksi.php';

if (!isset($_GET['no_transaksi']) || empty($_GET['no_transaksi'])) {
    die("Error: Nomor transaksi tidak valid.");
}
$no_transaksi = mysql_real_escape_string($_GET['no_transaksi']);

$qq = mysql_query("SELECT * FROM tb_transaksi WHERE no_transaksi='$no_transaksi'") or die(mysql_error());
if (mysql_num_rows($qq) == 0) {
    die("Data transaksi tidak ditemukan.");
}

$data_transaksi = mysql_fetch_assoc($qq);
$nama_pemesan = $data_transaksi['nama_pemesan'];
$no_telp = $data_transaksi['no_telp'];
$lama_sewa = $data_transaksi['lama_sewa'];
$tgl_pesan = $data_transaksi['tgl_pesan'];
$tanggal_ambil = $data_transaksi['tanggal_ambil'];
$tgl_kembali = $data_transaksi['tgl_kembali_aktual'];
$foto_identitas = $data_transaksi['foto_identitas'];
$bukti_pembayaran = $data_transaksi['bukti_pembayaran'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>BUKTI BOOKING - <?=$no_transaksi?></title>
    <style type="text/css">
        body { font-family: sans-serif; }
        table { border-collapse: collapse; font-family: sans-serif; }
        @media print {
            body { margin: 1cm; padding: 0; font-size: 10pt; }
            table { width: 100% !important; }
            .gambar-bukti { max-width: 280px !important; max-height: 220px !important; border: 1px solid #ccc !important; object-fit: contain; page-break-inside: avoid; }
            .tabel-gambar { page-break-inside: avoid; }
            .area-tombol { display: none !important; }
        }
    </style>
</head>
<body>
    <table align="center" border="0" cellpadding="1" style="width: 700px;">
        <tr><td colspan="3"><div align="center"><span style="font-size: large;"><b>CAMPP</b></span><br><span style="font-size: medium;">BUKTI BOOKING PEMESANAN ONLINE</span><hr></div></td></tr>
    </table><br>
    <table style="width: 700px; margin: auto; font-size: 14px;">
        <tr><td width="200px">NOMOR TRANSAKSI</td><td width="20px" align="center">:</td><td><b><?=$no_transaksi?></b></td></tr>
        <tr><td>NAMA PEMESAN</td><td align="center">:</td><td><?=strtoupper($nama_pemesan)?></td></tr>
        <tr><td>ALAMAT EMAIL</td><td align="center">:</td><td><?=$no_telp?></td></tr>
        <tr><td>TANGGAL PEMESANAN</td><td align="center">:</td><td><?=date('d M Y, H:i', strtotime($tgl_pesan))?></td></tr>
        <tr><td>TANGGAL PENGAMBILAN</td><td align="center">:</td><td><?=date('d M Y', strtotime($tanggal_ambil))?></td></tr>
        <tr><td>TANGGAL KEMBALI</td><td align="center">:</td><td><?=date('d M Y', strtotime($tgl_kembali))?></td></tr>
        <tr><td>LAMA SEWA</td><td align="center">:</td><td><?=$lama_sewa." Hari"?></td></tr>
    </table><br><br>
    <table border="1" width="700px" align="center" style="font-size: 13px;">
        <tr style="background-color: #f2f2f2;"><th style="padding: 8px;">NO</th><th style="padding: 8px;">NAMA BARANG</th><th style="padding: 8px;">HARGA SEWA</th><th style="padding: 8px;">Qty</th><th style="padding: 8px;">SUBTOTAL</th></tr>
        <?php
        $q3 = mysql_query("SELECT * FROM tb_transaksi_detail d JOIN tb_barang b ON d.id_barang=b.id_barang WHERE d.no_transaksi='$no_transaksi'") or die(mysql_error());
        $no = 0; $total_bayar_akhir = 0;
        while ($result = mysql_fetch_array($q3)) {
            $no++; $subtotal = ($result['harga_sewa'] * $result['qty_sewa']); $total_bayar_akhir += $subtotal;
        ?>
        <tr><td align='center' style="padding: 8px;"><?=$no?></td><td style="padding: 8px;"><?=$result['nama_barang']?></td><td style="padding: 8px;"><?="Rp. ".number_format($result['harga_sewa'])?> / Hari</td><td align='center' style="padding: 8px;"><?=$result['qty_sewa']?></td><td style="padding: 8px;"><?="Rp. ".number_format($subtotal)?></td></tr>
        <?php } $total_sewa_keseluruhan = $total_bayar_akhir * $lama_sewa; ?>
        <tr style="background-color: #f2f2f2;"><td align='right' colspan='4' style="padding: 8px;"><b>TOTAL BAYAR (<?=$lama_sewa?> Hari)</b></td><td style="padding: 8px;"><b><?="Rp. ".number_format($total_sewa_keseluruhan)?></b></td></tr>
    </table><br><br>
    <table border="0" width="700px" align="center" class="tabel-gambar">
        <tr><td colspan="2"><hr></td></tr>
        <tr>
            <td width="50%" align="center" style="padding: 10px;"><b>Foto Identitas</b><br><br>
                <?php if($foto_identitas && file_exists("uploads/".$foto_identitas)): ?><img src="uploads/<?=$foto_identitas?>" alt="Foto Identitas" class="gambar-bukti" style="max-width: 250px; max-height: 200px; border: 1px solid black; object-fit: contain;"><?php else: ?><p>Gambar tidak ditemukan.</p><?php endif; ?>
            </td>
            <td width="50%" align="center" style="padding: 10px;"><b>Bukti Pembayaran</b><br><br>
                <?php if($bukti_pembayaran && file_exists("uploads/".$bukti_pembayaran)): ?><img src="uploads/<?=$bukti_pembayaran?>" alt="Bukti Pembayaran" class="gambar-bukti" style="max-width: 250px; max-height: 200px; border: 1px solid black; object-fit: contain;"><?php else: ?><p>Gambar tidak ditemukan.</p><?php endif; ?>
            </td>
        </tr>
    </table>

    <div class="area-tombol" style="text-align: center; margin-top: 30px; margin-bottom: 30px;">
        <a href="home.php" style="padding: 10px 25px; background-color:rgb(28, 206, 255); color: white; text-decoration: none; border-radius: 5px; font-size: 16px;">
            Kembali ke Halaman Utama
        </a>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>