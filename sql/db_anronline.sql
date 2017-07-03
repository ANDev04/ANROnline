-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2017 at 11:49 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_anronline`
--

-- --------------------------------------------------------

--
-- Table structure for table `anr_config`
--

CREATE TABLE `anr_config` (
  `ID_Config` varchar(11) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Tipe` varchar(10) NOT NULL,
  `Isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anr_guru`
--

CREATE TABLE `anr_guru` (
  `ID_Guru` int(11) NOT NULL,
  `NIP` varchar(15) DEFAULT NULL,
  `NUPTK` varchar(15) DEFAULT NULL,
  `Nama_Guru` varchar(100) NOT NULL,
  `Jenis_Kelamin` enum('L','P') NOT NULL,
  `Status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anr_guru_mapel`
--

CREATE TABLE `anr_guru_mapel` (
  `id_guru_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `kode_mapel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anr_kelas`
--

CREATE TABLE `anr_kelas` (
  `Kode_Kelas` varchar(20) NOT NULL,
  `Tingkat_Kelas` enum('X','XI','XII') NOT NULL DEFAULT 'X',
  `Nama_Kelas` varchar(100) NOT NULL,
  `Kuota` int(3) NOT NULL DEFAULT '36',
  `Tahun_Masuk` year(4) NOT NULL DEFAULT '2017',
  `Tahun_Keluar` year(4) NOT NULL DEFAULT '2018'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anr_mapel`
--

CREATE TABLE `anr_mapel` (
  `Kode_Mapel` varchar(20) NOT NULL,
  `Nama_Mapel` varchar(100) NOT NULL,
  `KKM` int(3) NOT NULL DEFAULT '75'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anr_nilai`
--

CREATE TABLE `anr_nilai` (
  `ID_NILAI` int(11) NOT NULL,
  `Siswa` int(11) NOT NULL,
  `Mapel` varchar(20) NOT NULL,
  `Jenis_Nilai` enum('Harian','Ujian Tengah Semester','Ujian Akhir Semester','Praktek') NOT NULL,
  `Kelas` varchar(20) NOT NULL,
  `Semester` enum('Ganjil','Genap') NOT NULL,
  `Nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anr_paket_keahlian`
--

CREATE TABLE `anr_paket_keahlian` (
  `id_paket_keahlian` int(11) NOT NULL,
  `id_program_keahlian` int(11) NOT NULL,
  `paket_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anr_program_keahlian`
--

CREATE TABLE `anr_program_keahlian` (
  `id_program_keahlian` int(11) NOT NULL,
  `program_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anr_siswa`
--

CREATE TABLE `anr_siswa` (
  `ID_SISWA` int(11) NOT NULL,
  `NIS` varchar(10) NOT NULL,
  `NISN` varchar(11) NOT NULL,
  `Nama_Siswa` varchar(100) NOT NULL,
  `Jenis_Kelamin` enum('L','P') NOT NULL,
  `Tempat_Lahir` varchar(50) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Agama` enum('Islam','Kristen Khatolik','Kristen Protestan','Hindu','Buddha','Atheis','DLL') NOT NULL DEFAULT 'DLL',
  `Kelas` varchar(20) NOT NULL,
  `No_Telp` varchar(15) NOT NULL,
  `Alamat` text NOT NULL,
  `Status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `anr_siswa_kelas`
--

CREATE TABLE `anr_siswa_kelas` (
  `ID_SISWA_KELAS` bigint(20) NOT NULL,
  `ID_Siswa` int(11) NOT NULL,
  `Kode_Kelas` varchar(20) NOT NULL,
  `Tahun_Masuk` year(4) NOT NULL,
  `Tahun_Keluar` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anr_config`
--
ALTER TABLE `anr_config`
  ADD PRIMARY KEY (`ID_Config`);

--
-- Indexes for table `anr_guru`
--
ALTER TABLE `anr_guru`
  ADD PRIMARY KEY (`ID_Guru`);

--
-- Indexes for table `anr_guru_mapel`
--
ALTER TABLE `anr_guru_mapel`
  ADD PRIMARY KEY (`id_guru_mapel`),
  ADD UNIQUE KEY `id_guru` (`id_guru`);

--
-- Indexes for table `anr_kelas`
--
ALTER TABLE `anr_kelas`
  ADD PRIMARY KEY (`Kode_Kelas`);

--
-- Indexes for table `anr_mapel`
--
ALTER TABLE `anr_mapel`
  ADD PRIMARY KEY (`Kode_Mapel`);

--
-- Indexes for table `anr_nilai`
--
ALTER TABLE `anr_nilai`
  ADD PRIMARY KEY (`ID_NILAI`);

--
-- Indexes for table `anr_paket_keahlian`
--
ALTER TABLE `anr_paket_keahlian`
  ADD PRIMARY KEY (`id_paket_keahlian`),
  ADD KEY `id_program_keahlian` (`id_program_keahlian`);

--
-- Indexes for table `anr_program_keahlian`
--
ALTER TABLE `anr_program_keahlian`
  ADD PRIMARY KEY (`id_program_keahlian`);

--
-- Indexes for table `anr_siswa`
--
ALTER TABLE `anr_siswa`
  ADD PRIMARY KEY (`ID_SISWA`);

--
-- Indexes for table `anr_siswa_kelas`
--
ALTER TABLE `anr_siswa_kelas`
  ADD PRIMARY KEY (`ID_SISWA_KELAS`),
  ADD KEY `ID_Siswa` (`ID_Siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anr_guru`
--
ALTER TABLE `anr_guru`
  MODIFY `ID_Guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `anr_guru_mapel`
--
ALTER TABLE `anr_guru_mapel`
  MODIFY `id_guru_mapel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `anr_nilai`
--
ALTER TABLE `anr_nilai`
  MODIFY `ID_NILAI` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `anr_paket_keahlian`
--
ALTER TABLE `anr_paket_keahlian`
  MODIFY `id_paket_keahlian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `anr_program_keahlian`
--
ALTER TABLE `anr_program_keahlian`
  MODIFY `id_program_keahlian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `anr_siswa`
--
ALTER TABLE `anr_siswa`
  MODIFY `ID_SISWA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `anr_siswa_kelas`
--
ALTER TABLE `anr_siswa_kelas`
  MODIFY `ID_SISWA_KELAS` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `anr_paket_keahlian`
--
ALTER TABLE `anr_paket_keahlian`
  ADD CONSTRAINT `anr_paket_keahlian_ibfk_1` FOREIGN KEY (`id_program_keahlian`) REFERENCES `anr_program_keahlian` (`id_program_keahlian`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
