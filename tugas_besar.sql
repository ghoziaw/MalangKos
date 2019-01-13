-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Jan 2019 pada 14.20
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_besar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `id_kos` int(11) NOT NULL,
  `nama_kos` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fasilitas` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kamar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('kosong','terisi','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `id_kos`, `nama_kos`, `fasilitas`, `nama_kamar`, `harga`, `status`, `gambar`) VALUES
(50, 27, 'Pangestu', 'Kamar Mandi Dalam, Spring Bed, AC', '1', 500000, 'kosong', 'Luxury B.jpg'),
(51, 26, 'Amarilis', 'Kamar Mandi Dalam, Spring Bed, AC', '2', 600000, 'terisi', 'Minimalis C.jpg'),
(52, 28, 'President', 'Kamar Mandi Dalam, Spring Bed, AC', '3', 700000, 'terisi', 'President A.jpg'),
(53, 26, 'Amarilis', 'Kamar Mandi Dalam, Spring Bed, AC', '2', 550000, 'kosong', 'Minimalis B.jpg'),
(54, 27, 'Pangestu', 'Kamar Mandi Dalam, Spring Bed, AC', '3', 770000, 'kosong', 'Minimalis B.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kos`
--

CREATE TABLE `kos` (
  `id_kos` int(11) NOT NULL,
  `nama_kos` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kos`
--

INSERT INTO `kos` (`id_kos`, `nama_kos`, `alamat`, `gambar`) VALUES
(26, 'Amarilis', 'Jl. Soekarno Hatta 56 No. 23', ''),
(27, 'Pangestu', 'Jl. Pangestu Sejahtera No. 13', 'Luxury A.jpg'),
(28, 'President', 'Jl. Veteran Warrior IX No. 78', 'President A.jpg'),
(31, 'Wisma Sasando', 'Jalan Sasando 200', 'Luxury B.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_kos` int(11) NOT NULL,
  `nama_kos` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_kos`, `nama_kos`, `id_user`, `nama_user`, `id_kamar`, `nama_kamar`, `harga`, `lama_sewa`, `tgl_sewa`, `total`) VALUES
(26, 'Amarilis', 29, 'faisal', 51, '2', 600000, 2, '2018-06-01', 1200000),
(28, 'President', 18, 'ryan', 52, '3', 700000, 2, '2018-11-08', 1400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akses` enum('admin','customer') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_telp`, `username`, `password`, `akses`) VALUES
(18, 'ryan', 'qwerty', '1234567', 'ryan', 'ryan', 'customer'),
(20, 'anggara', 'lamongan', '0987654', 'admin', 'admin', 'admin'),
(21, 'nizar', 'malang', '0987654', 'nizar', '123', 'customer'),
(22, 'jio', 'blitar', '0987654', 'jio', '123', 'customer'),
(23, 'aziz', 'qwerty', '0987654', 'aziz', '123', 'customer'),
(24, 'faisal', 'tangerang', '09876543', 'faisal', '123', 'customer'),
(25, 'fahmi', 'iuytrew', '09876543', 'fahmi', '123', 'customer'),
(26, 'jepit', 'qwert', '123', 'jepit', '123', 'customer'),
(27, 'qwe', 'qwe', '123', 'qwe', 'qwe', 'customer'),
(29, 'faisal', 'tangerang', '082299214675', 'faisal', 'qwerty123', 'customer'),
(30, 'Rio', 'Lamongan', '0987654', 'rio', '1', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_kos` (`id_kos`);

--
-- Indexes for table `kos`
--
ALTER TABLE `kos`
  ADD PRIMARY KEY (`id_kos`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_kos` (`id_kos`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `kos`
--
ALTER TABLE `kos`
  MODIFY `id_kos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_kos`) REFERENCES `kos` (`id_kos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`id_kos`) REFERENCES `kos` (`id_kos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sewa_ibfk_3` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
