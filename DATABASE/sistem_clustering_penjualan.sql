-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2023 pada 21.08
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_clustering_penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `centroid`
--

CREATE TABLE `centroid` (
  `id_centroid` int(5) NOT NULL,
  `data_centroid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `centroid`
--

INSERT INTO `centroid` (`id_centroid`, `data_centroid`) VALUES
(1, '20,4,16'),
(2, '75,56,19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `objek`
--

CREATE TABLE `objek` (
  `id_objek` int(5) NOT NULL,
  `nama_objek` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `objek`
--

INSERT INTO `objek` (`id_objek`, `nama_objek`, `data`) VALUES
(1, 'B001', '8,3,5'),
(2, 'B002', '20,4,16'),
(3, 'B003', '23,19,4'),
(4, 'B004', '16,9,7'),
(5, 'B005', '25,19,6'),
(6, 'B006', '20,14,6'),
(7, 'B007', '36,30,6'),
(8, 'B008', '27,17,10'),
(9, 'B009', '25,10,15'),
(10, 'B010', '63,18,45'),
(11, 'B011', '20,5,15'),
(12, 'B012', '65,40,25'),
(13, 'B013', '75,56,19'),
(14, 'B014', '6,1,5'),
(15, 'B015', '7,0,7'),
(16, 'B016', '15,3,12'),
(17, 'B017', '35,27,8'),
(18, 'B018', '28,19,9'),
(19, 'B019', '55,23,32'),
(20, 'B020', '42,16,26'),
(21, 'B021', '10,6,4'),
(22, 'B022', '10,9,1'),
(23, 'B023', '10,4,6'),
(24, 'B024', '10,7,3'),
(25, 'B025', '10,2,8'),
(26, 'B026', '10,4,6'),
(27, 'B027', '10,8,2'),
(28, 'B028', '12,8,4'),
(29, 'B029', '12,3,9'),
(30, 'B030', '12,6,6'),
(31, 'B031', '12,12,0'),
(32, 'B032', '12,10,2'),
(33, 'B033', '20,13,7'),
(34, 'B034', '15,14,1'),
(35, 'B035', '22,11,11'),
(36, 'B036', '20,13,7'),
(37, 'B037', '45,21,24'),
(38, 'B038', '30,17,13'),
(39, 'B039', '15,9,6'),
(40, 'B040', '30,24,6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`username`, `password`, `nama_lengkap`) VALUES
('ferdi', '8bf4bb0e2efad01abe522bf314504a49', 'mohammad ferdiansyah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `centroid`
--
ALTER TABLE `centroid`
  ADD PRIMARY KEY (`id_centroid`);

--
-- Indeks untuk tabel `objek`
--
ALTER TABLE `objek`
  ADD PRIMARY KEY (`id_objek`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `centroid`
--
ALTER TABLE `centroid`
  MODIFY `id_centroid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `objek`
--
ALTER TABLE `objek`
  MODIFY `id_objek` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
