-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2019 pada 06.15
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persewaan_kamera`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kamera`
--

CREATE TABLE `data_kamera` (
  `kode_kamera` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(10) NOT NULL,
  `harga_sewa` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kamera`
--

INSERT INTO `data_kamera` (`kode_kamera`, `nama_barang`, `stok`, `harga_sewa`) VALUES
('K01', 'Nikon 23', 2, 300000),
('K02', 'Canon IID', 1, 350000),
('K03', 'Canon 5D Mark II', 1, 450000),
('K04', 'Canon 7D Mark II', 2, 500000),
('K05', 'Nikon', 2, 250000),
('K06', 'Nikon', 2, 550000),
('K07', 'Sony ', 1, 400000),
('K08', 'Sony G5', 1, 350000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detailpenjualan`
--

CREATE TABLE `tbl_detailpenjualan` (
  `kode_sewa` varchar(20) NOT NULL,
  `kode_kamera` varchar(20) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detailpenjualan`
--

INSERT INTO `tbl_detailpenjualan` (`kode_sewa`, `kode_kamera`, `total`) VALUES
('S02', 'K02', 0),
('S03', 'K03', 0),
('S04', 'K01', 300000),
('S05', 'K06', 550000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `kode_sewa` varchar(15) NOT NULL,
  `kode_admin` varchar(15) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `nama_penyewa` varchar(35) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`kode_sewa`, `kode_admin`, `tgl_sewa`, `nama_penyewa`, `alamat`, `telpon`, `total`, `bayar`, `kembali`) VALUES
('S01', 'A1', '2019-05-10', 'Ayunda', 'Solo', '08123', 0, 0, 0),
('S02', 'A2', '2019-05-10', 'Ani', 'mlg', '08234567', 0, 0, 0),
('S03', 'A3', '2019-05-10', 'Adi', 'Malang', '08123', 0, 0, 0),
('S04', 'A4', '2019-05-10', 'Warda', 'Nganjuk', '08887543379', 300000, 500000, 200000),
('S05', 'A5', '2019-05-10', 'Asa', 'Solo', '08234567', 550000, 600000, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '12345', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_kamera`
--
ALTER TABLE `data_kamera`
  ADD PRIMARY KEY (`kode_kamera`);

--
-- Indeks untuk tabel `tbl_detailpenjualan`
--
ALTER TABLE `tbl_detailpenjualan`
  ADD PRIMARY KEY (`kode_sewa`,`kode_kamera`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`kode_sewa`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
