-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 02:18 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipraker`
--

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `tgl_bimbingan` date NOT NULL,
  `judul_bimbingan` varchar(256) NOT NULL,
  `up_bimbingan` varchar(256) NOT NULL,
  `up_revisi` varchar(256) NOT NULL,
  `status_bimbingan` varchar(20) NOT NULL,
  `id_praker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` varchar(40) NOT NULL,
  `nama_dosen` varchar(200) NOT NULL,
  `prodi` varchar(200) NOT NULL,
  `alamat` varchar(249) NOT NULL,
  `jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`, `prodi`, `alamat`, `jabatan`) VALUES
('111234', 'Firmansyah Putra S.kom,M.kom.', 'Teknik Informatika', 'Tuban', 1),
('222345', 'Udin Malik S.kom,M.kom.', 'Teknik Informatika', 'Kediri', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabat` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabat`, `jabatan`) VALUES
(1, 'Kaprodi'),
(2, 'Dosen ');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(249) NOT NULL,
  `prodi` varchar(200) NOT NULL,
  `alamat_mahasiswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `prodi`, `alamat_mahasiswa`) VALUES
('2018420047', 'Bayu Tri Setyo Budi', 'Teknik Informatika', 'Lamongan');

-- --------------------------------------------------------

--
-- Table structure for table `praker`
--

CREATE TABLE `praker` (
  `id_praker` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `nim` varchar(200) NOT NULL,
  `judul_praker` varchar(200) NOT NULL,
  `nama_instansi` varchar(256) NOT NULL,
  `alamat_instansi` text NOT NULL,
  `acc` varchar(20) NOT NULL,
  `dosbim` varchar(40) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`),
  ADD KEY `praker` (`id_praker`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`),
  ADD KEY `jabat` (`jabatan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabat`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `praker`
--
ALTER TABLE `praker`
  ADD PRIMARY KEY (`id_praker`),
  ADD KEY `mhs` (`nim`),
  ADD KEY `dosebim` (`dosbim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `praker`
--
ALTER TABLE `praker`
  MODIFY `id_praker` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD CONSTRAINT `praker` FOREIGN KEY (`id_praker`) REFERENCES `praker` (`id_praker`);

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `jabat` FOREIGN KEY (`jabatan`) REFERENCES `jabatan` (`id_jabat`);

--
-- Constraints for table `praker`
--
ALTER TABLE `praker`
  ADD CONSTRAINT `dosebim` FOREIGN KEY (`dosbim`) REFERENCES `dosen` (`nidn`),
  ADD CONSTRAINT `mhs` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
