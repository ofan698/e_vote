-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 08:47 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_calon`
--

CREATE TABLE IF NOT EXISTS `tb_calon` (
  `id_calon` int(11) NOT NULL AUTO_INCREMENT,
  `no_urut` int(11) NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `foto_calon` varchar(200) NOT NULL,
  `foto_ktm` varchar(200) NOT NULL,
  `foto_transkrip` varchar(200) NOT NULL,
  `foto_lk` varchar(200) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `riwayat` varchar(128) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_calon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_calon`
--

INSERT INTO `tb_calon` (`id_calon`, `no_urut`, `nama_calon`, `foto_calon`, `foto_ktm`, `foto_transkrip`, `foto_lk`, `keterangan`, `riwayat`, `email`, `no_hp`, `publish`) VALUES
(1, 1, 'ARENTIAS BUDI ALWAHID', '14202.jpg', '14204.jpg', '14235.jpg', '14392.jpg', 'Memajukan Fasilkom', 'Ketua DPM 2017', 'ucup@gmail.com', '082939939393', 'Y'),
(2, 2, 'DENI WILDANI', 'Alienware-logo.jpg', 'aset3.jpg', 'Jellyfish.jpg', 'Asus_Wide_Wallpaper_Logo_by_biffexploder.png', 'Fasilkom Menjadi Fakultas Transfaran', 'Ketua BEM Fakultas 2017, Anggota DPM Universitas 2018', 'zilongkaguya@gmail.com', '08233932932', 'Y'),
(3, 3, 'ANGGI SURBAKTI', 'musuhangga1.jpg', 'kotakfebry.png', 'musuhangga2.jpg', 'fbr.jpg', 'Menguncupkan diri', 'Ucup s1 , s2', 'ucupkuncup@gmail.com', '08128434342', 'Y'),
(4, 4, 'CEP PERMANA GALIH', 'Alienware_Alien.jpg', 'AMD Spider Wall (2).jpg', '4.jpg', '3479929281_b277c35c21.jpg', 'Memajuka Fasilkom', 'Ketua BEM 2017', 'bella@gmail.com', '08533923242', 'Y'),
(8, 0, 'pak EED', 'bang ade1.jpg', 'aset3.jpg', 'IMG_E0588.JPG', 'aset3.jpg', 'FASILKOM', '', 'saiful@mail.com', '121321', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE IF NOT EXISTS `tb_data` (
  `id_data` int(10) NOT NULL DEFAULT '0',
  `nama_data` varchar(100) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id_data`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_data`
--

INSERT INTO `tb_data` (`id_data`, `nama_data`, `keterangan`, `publish`) VALUES
(1, 'Menu Pendaftaran Calon Kandidat Ketua BEM', 'Daftar Disini !!!', 'Y'),
(2, 'Menu Pendaftaran Calon Pemilih (Mahasiswa)', 'Klik Disini !!!', 'Y'),
(3, '2021-2022', 'Periode', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE IF NOT EXISTS `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Administrator','Panitia','Pemilih') NOT NULL,
  `foto_pengguna` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  `status` enum('1','0') NOT NULL,
  `jenis` enum('PAN','PST') NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`, `foto_pengguna`, `email`, `no_hp`, `publish`, `status`, `jenis`) VALUES
(1, 'admin', 'admin', 'admin', 'Administrator', 'avatar.jpg', '', '', 'Y', '0', 'PAN'),
(3, 'budi', 'budi', 'budi', 'Panitia', 'bang ade.jpg', '', '', 'Y', '1', 'PAN'),
(5, 'ofan', 'ofan', 'ofan', 'Pemilih', 'IMG_0002.JPG', '', '', 'Y', '0', 'PST'),
(6, 'valentino', 'valentino', 'valentino', 'Pemilih', '1382910095_79626.ico', '', '', 'Y', '1', 'PST');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vote`
--

CREATE TABLE IF NOT EXISTS `tb_vote` (
  `id_vote` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon` varchar(2) NOT NULL,
  `id_pemilih` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_vote`),
  KEY `id_calon` (`id_calon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_vote`
--

INSERT INTO `tb_vote` (`id_vote`, `id_calon`, `id_pemilih`, `date`) VALUES
(1, '1', 5, '2021-02-12 21:54:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
