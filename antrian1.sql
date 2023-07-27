-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2023 pada 06.23
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian1`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_antrian_loket` (IN `vloket_id` INT, IN `vtgl_antrian_loket` DATE, IN `vstatus` VARCHAR(100))  BEGIN
  DECLARE jml INT;
  SELECT COUNT(no_antrian_loket) INTO jml FROM antrian_loket WHERE loket_id = vloket_id AND tgl_antrian_loket = vtgl_antrian_loket AND status = vstatus;
  INSERT INTO antrian_loket (loket_id, no_antrian_loket, status,  tgl_antrian_loket) VALUES (vloket_id, jml + 1,vstatus, vtgl_antrian_loket);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nambah_antrian` (IN `vtanggal` DATE, IN `vloket_id` INT)  BEGIN
  DECLARE jml INT;
  SELECT COUNT(no_antrian) INTO jml FROM antrian WHERE loket_id = vloket_id AND tgl_antrian = vtanggal;
  INSERT INTO antrian (no_antrian, loket_id, tgl_antrian) VALUES (jml + 1, vloket_id, vtanggal);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(20) NOT NULL,
  `tgl_antrian` date NOT NULL,
  `no_antrian` int(20) DEFAULT NULL,
  `loket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `tgl_antrian`, `no_antrian`, `loket_id`) VALUES
(73, '2023-07-11', 1, 34),
(74, '2023-07-11', 2, 34),
(75, '2023-07-11', 1, 37),
(76, '2023-07-11', 2, 37),
(77, '2023-07-11', 3, 34),
(78, '2023-07-11', 1, 33),
(79, '2023-07-11', 1, 36),
(80, '2023-07-11', 2, 36),
(81, '2023-07-11', 4, 34),
(82, '2023-07-11', 2, 33),
(83, '2023-07-11', 5, 34),
(84, '2023-07-11', 1, 38),
(85, '2023-07-11', 3, 36),
(86, '2023-07-11', 3, 37),
(87, '2023-07-11', 4, 36),
(88, '2023-07-11', 2, 38),
(89, '2023-07-11', 6, 34),
(90, '2023-07-11', 7, 34),
(91, '2023-07-11', 8, 34),
(92, '2023-07-12', 1, 34),
(93, '2023-07-12', 1, 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian_loket`
--

CREATE TABLE `antrian_loket` (
  `id_antrian_loket` int(20) NOT NULL,
  `loket_id` int(10) NOT NULL,
  `no_antrian_loket` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tgl_antrian_loket` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `antrian_loket`
--

INSERT INTO `antrian_loket` (`id_antrian_loket`, `loket_id`, `no_antrian_loket`, `status`, `tgl_antrian_loket`) VALUES
(101, 34, 1, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(102, 34, 2, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(103, 37, 1, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(104, 37, 2, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(105, 34, 3, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(106, 33, 1, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(107, 36, 1, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(108, 36, 2, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(109, 34, 4, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(110, 33, 2, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(111, 34, 5, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(112, 38, 1, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(113, 36, 3, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(114, 37, 3, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(115, 36, 4, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(116, 38, 2, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(117, 34, 6, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(118, 34, 7, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(119, 34, 8, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-11'),
(120, 34, 1, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-12'),
(121, 37, 1, '<span class=\"label label-warning blok\">Belum terlayani</span>', '2023-07-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `loket`
--

CREATE TABLE `loket` (
  `loket_id` int(11) NOT NULL,
  `kode_loket` varchar(10) NOT NULL,
  `name_loket` varchar(40) NOT NULL,
  `keterangan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `loket`
--

INSERT INTO `loket` (`loket_id`, `kode_loket`, `name_loket`, `keterangan`) VALUES
(33, 'F', 'PIDANA', 'Loket PIDANA'),
(34, 'A', 'e-COURT', 'Loket e-COURT'),
(36, 'C', 'INFORMASI', 'LOKET INFORMASI'),
(37, 'B', 'HUKUM', 'LOKET HUKUM'),
(38, 'D', 'INZAGE', 'Loket Inzage'),
(39, 'E', 'PERDATA', 'Loket Perdata');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `loket_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`, `loket_id`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Admin', 'purwokerto', 1, 0),
(107, 'inzage', '8cb2237d0679ca88db6464eac60da96345513964', 'INZAGE', 'Lt. 2', 2, 38),
(108, 'pidana', '8cb2237d0679ca88db6464eac60da96345513964', 'pidana', 'lantai 2', 2, 33);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indeks untuk tabel `antrian_loket`
--
ALTER TABLE `antrian_loket`
  ADD PRIMARY KEY (`id_antrian_loket`);

--
-- Indeks untuk tabel `loket`
--
ALTER TABLE `loket`
  ADD PRIMARY KEY (`loket_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `antrian_loket`
--
ALTER TABLE `antrian_loket`
  MODIFY `id_antrian_loket` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT untuk tabel `loket`
--
ALTER TABLE `loket`
  MODIFY `loket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
