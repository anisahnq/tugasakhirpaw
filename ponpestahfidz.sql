-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 05 Des 2017 pada 01.53
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `ponpestahfidz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  `level` enum('santri','admin','staff') NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `level`) VALUES
(1, 'anisah', 'anisah', 'santri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE IF NOT EXISTS `santri` (
  `id_san` int(10) NOT NULL,
  `nama_san` varchar(150) NOT NULL,
  `tempatl_san` varchar(25) NOT NULL,
  `datel_san` date NOT NULL,
  `jk_san` char(10) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `notlp_san` char(14) NOT NULL,
  `jenjang` char(5) NOT NULL,
  `asalsekolah_san` varchar(25) NOT NULL,
  `namaortu_san` varchar(50) NOT NULL,
  `notlportu_san` char(15) NOT NULL,
  `username_san` char(20) NOT NULL,
  `password_san` char(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id_san`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id_staff` int(11) NOT NULL,
  `nama_staff` varchar(200) NOT NULL,
  `tempatl_staff` char(50) NOT NULL,
  `datel_staff` date NOT NULL,
  `jk_staff` char(20) NOT NULL,
  `alamat_staff` varchar(250) NOT NULL,
  `notelp_staff` char(15) NOT NULL,
  `norek_staff` varchar(100) NOT NULL,
  `bank_staff` char(50) NOT NULL,
  `username_staff` char(20) NOT NULL,
  `email_staff` varchar(200) NOT NULL,
  `password_staff` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
