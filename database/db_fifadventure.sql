-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Mei 2019 pada 16.14
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fifadventure`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` varchar(13) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` int(20) NOT NULL,
  `harga_sewa` int(10) NOT NULL,
  `qty` int(5) NOT NULL,
  `img` varchar(50) NOT NULL,
  `id_kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `nama_barang`, `harga_barang`, `harga_sewa`, `qty`, `img`, `id_kategori`) VALUES
('CAR08051901', 'Carrier 35 Liter', 230000, 13000, 5, 'CAR08051901.jpg', 'car'),
('CAR08051902', 'Carrier 45 Liter', 300000, 15000, 2, 'CAR08051902.jpg', 'car'),
('CAR08051903', 'Carrier 60 Liter', 350000, 20000, 6, 'CAR08051903.jpg', 'car'),
('CAR08051904', 'Carrier 80 Liter', 420000, 25000, 6, 'CAR08051904.jpg', 'car'),
('KMP08051901', 'Kompor Portable', 120000, 10000, 10, 'KMP08051901.jpg', 'kmp'),
('KMP16051901', 'Tes Kompor ', 80000, 10000, 5, 'KMP16051901.jpg', 'kmp'),
('TAS08051901', 'Tas Slempang', 95000, 10000, 10, 'TAS08051901.jpg', 'tas'),
('TAS16051901', 'Tes Barang Tas', 150000, 12000, 12, 'TAS16051901.jpg', 'tas'),
('TND08051901', 'Tenda Go Pro 2-3 Orang', 500000, 25000, 5, 'TND08051901.jpg', 'tnd'),
('TND08051902', 'Tenda Go Camp - Rei Eliot 4-5 Orang', 550000, 40000, 0, 'TND08051902.jpg', 'tnd'),
('TND08051903', 'Tenda Pavillo - Lokal 4-5 Orang', 620000, 45000, 0, 'TND08051903.jpg', 'tnd'),
('TND08051904', 'Tenda Go Java 4-5 Orang', 660000, 50000, 5, 'TND08051904.jpg', 'tnd'),
('TND08051905', 'Tenda KAP 7-8 Orang', 730000, 75000, 5, 'TND08051905.jpg', 'tnd'),
('TND16051901', 'Test Barang Tenda', 200000, 40000, 2, 'TND16051901.jpg', 'tnd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pengadaan`
--

CREATE TABLE `tb_detail_pengadaan` (
  `no_pengadaan` varchar(20) NOT NULL,
  `id_barang` varchar(13) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail_pengadaan`
--

INSERT INTO `tb_detail_pengadaan` (`no_pengadaan`, `id_barang`, `qty`) VALUES
('PB/190519/01', 'TND08051902', 6),
('PB/190519/01', 'TND08051903', 6),
('PB/190519/01', 'TND16051901', 4),
('PB/190519/02', 'TND08051902', 8),
('PB/190519/02', 'TND08051903', 8),
('PB/190519/03', 'TND08051902', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
('car', 'Carrie'),
('kmp', 'Kompor'),
('tas', 'Tas'),
('tnd', 'Tenda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengadaan`
--

CREATE TABLE `tb_pengadaan` (
  `no_pengadaan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(1) NOT NULL,
  `id_supplier` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengadaan`
--

INSERT INTO `tb_pengadaan` (`no_pengadaan`, `tanggal`, `status`, `id_supplier`) VALUES
('PB/190519/01', '2019-05-19', '0', 'SP19051901'),
('PB/190519/02', '2019-05-19', '0', 'SP19051902'),
('PB/190519/03', '2019-05-19', '0', 'SP19051902');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `no_hp`) VALUES
('SP19051901', 'Sumber Tas', '085795416813'),
('SP19051902', 'Kamping Teroos', '081245784512');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `no_transaksi` varchar(50) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `lama_sewa` varchar(3) NOT NULL,
  `tgl_pesan` varchar(50) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `total_bayar` varchar(30) NOT NULL,
  `jenis_jaminan` varchar(50) NOT NULL,
  `foto_jaminan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`no_transaksi`, `nama_pemesan`, `no_telp`, `lama_sewa`, `tgl_pesan`, `tgl_kembali`, `total_bayar`, `jenis_jaminan`, `foto_jaminan`) VALUES
('TRS230519001', 'Rafi', '085795851996', '2', '23 Mei 2019 21:2', '25 Mei 2019 21:2', '56000', '', ''),
('TRS230519002', 'Rafi', '085795851996', '2', '23 Mei 2019 21:2', '25 Mei 2019 21:2', '56000', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_detail`
--

CREATE TABLE `tb_transaksi_detail` (
  `no_transaksi` varchar(50) NOT NULL,
  `id_barang` varchar(13) NOT NULL,
  `qty_sewa` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi_detail`
--

INSERT INTO `tb_transaksi_detail` (`no_transaksi`, `id_barang`, `qty_sewa`) VALUES
('TRS230519001', 'CAR08051901', 1),
('TRS230519001', 'CAR08051902', 2),
('TRS230519002', 'CAR08051901', 1),
('TRS230519002', 'CAR08051902', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_pengadaan`
--
ALTER TABLE `tb_pengadaan`
  ADD PRIMARY KEY (`no_pengadaan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
