-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Nov 27, 2023 at 01:16 PM
-- Server version: 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aplikasi_penilaian_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `kd_absen` char(5) NOT NULL,
  `nm_bulan` varchar(15) DEFAULT NULL,
  `nis` char(11) DEFAULT NULL,
  `nm_siswa` varchar(30) DEFAULT NULL,
  `jml_hadir` int(11) DEFAULT NULL,
  `alfa` int(11) DEFAULT NULL,
  `izin` int(11) DEFAULT NULL,
  `sakit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` char(11) NOT NULL,
  `nm_guru` varchar(30) DEFAULT NULL,
  `tmp_lahir_guru` varchar(30) DEFAULT NULL,
  `tgl_lahir_guru` date DEFAULT NULL,
  `jkel_guru` char(1) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` char(14) DEFAULT NULL,
  `kd_matpel` char(5) DEFAULT NULL,
  `nm_matpel` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nm_guru`, `tmp_lahir_guru`, `tgl_lahir_guru`, `jkel_guru`, `alamat`, `telp`, `kd_matpel`, `nm_matpel`) VALUES
('12345678901', 'Nama Guru 1', 'Tempat Lahir Guru 1', '1990-01-01', 'L', 'Alamat Guru 1', '1234567890', 'MP001', 'Matematika'),
('23456789012', 'Nama Guru 2', 'Tempat Lahir Guru 2', '1991-02-02', 'P', 'Alamat Guru 2', '2345678901', 'MP002', 'Bahasa Inggris'),
('34567890123', 'Nama Guru 3', 'Tempat Lahir Guru 3', '1992-03-03', 'L', 'Alamat Guru 3', '3456789012', 'MP003', 'Sejarah'),
('45678901234', 'Nama Guru 4', 'Tempat Lahir Guru 4', '1993-04-04', 'P', 'Alamat Guru 4', '4567890123', 'MP004', 'Fisika'),
('56789012345', 'Supriyadi', 'Kebayoran', '1994-05-05', 'L', 'Serpong', '5678901234', 'MP002', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` char(8) NOT NULL,
  `nm_kelas` varchar(15) DEFAULT NULL,
  `jml_siswa` int(100) DEFAULT NULL,
  `thn_ajaran` varchar(9) DEFAULT NULL,
  `nip` char(11) DEFAULT NULL,
  `nm_guru` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `nm_kelas`, `jml_siswa`, `thn_ajaran`, `nip`, `nm_guru`) VALUES
('KLS00001', 'Kelas A', 25, '2023/2024', '12345678901', 'Nama Guru 1'),
('KLS00002', 'Kelas B', 30, '2023/2024', '23456789012', 'Nama Guru 2'),
('KLS00003', 'Kelas C', 28, '2023/2024', '34567890123', 'Nama Guru 3'),
('KLS00004', 'Kelas D', 22, '2023/2024', '45678901234', 'Nama Guru 4'),
('KLS00005', 'Kelas E', 27, '2023/2024', '56789012345', 'Nama Guru 5');

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `kd_matpel` char(5) NOT NULL,
  `nm_matpel` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`kd_matpel`, `nm_matpel`) VALUES
('MP001', 'Matematika'),
('MP002', 'Bahasa Inggris'),
('MP003', 'Sejarah'),
('MP004', 'Fisika'),
('MP005', 'Seni Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` varchar(10) NOT NULL,
  `nis` char(11) DEFAULT NULL,
  `nm_siswa` varchar(30) DEFAULT NULL,
  `kd_matpel` char(5) DEFAULT NULL,
  `nm_matpel` varchar(35) DEFAULT NULL,
  `uts_sem_ganjil` int(11) DEFAULT NULL,
  `uas_sem_ganjil` int(11) DEFAULT NULL,
  `uts_sem_genap` int(11) DEFAULT NULL,
  `uas_sem_genap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `nis`, `nm_siswa`, `kd_matpel`, `nm_matpel`, `uts_sem_ganjil`, `uas_sem_ganjil`, `uts_sem_genap`, `uas_sem_genap`) VALUES
('NIL000002', '23456789012', 'Aozora', 'MP004', 'Bahasa Inggris', 100, 100, 100, 100),
('NIL00001', '12345678901', 'Nama Siswa 1', 'MP001', 'Matematika', 85, 78, 81, 82);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` char(11) NOT NULL,
  `nm_siswa` varchar(30) DEFAULT NULL,
  `tmp_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jkel` char(1) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` char(14) DEFAULT NULL,
  `nm_wali` varchar(30) DEFAULT NULL,
  `kd_kelas` char(8) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nm_siswa`, `tmp_lahir`, `tgl_lahir`, `jkel`, `alamat`, `telp`, `nm_wali`, `kd_kelas`, `username`, `password`) VALUES
('12345678901', 'Nama Siswa 1', 'Tempat Lahir Siswa 1', '2005-01-01', 'L', 'Alamat Siswa 1', '1234567890', 'Wali 1', 'KLS00001', 'siswa1', 'password1'),
('23456789012', 'Ngrok', 'Meikarta', '2005-02-02', 'P', 'Meikarta', '2345678901', 'Wali 2', 'KLS00003', 'siswa2', 'password2'),
('34567890123', 'Nama Siswa 3', 'Tempat Lahir Siswa 3', '2005-03-03', 'L', 'Alamat Siswa 3', '3456789012', 'Wali 3', 'KLS00003', 'siswa3', 'password3'),
('45678901234', 'Nama Siswa 4', 'Tempat Lahir Siswa 4', '2005-04-04', 'P', 'Alamat Siswa 4', '4567890123', 'Wali 4', 'KLS00004', 'siswa4', 'password4'),
('56789012345', 'Nama Siswa 5', 'Tempat Lahir Siswa 5', '2005-05-05', 'P', 'Alamat Siswa 5', '5678901234', 'Wali 5', 'KLS00002', 'siswa5', 'password5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`kd_absen`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `kd_matpel` (`kd_matpel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`kd_matpel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`),
  ADD KEY `nis` (`nis`),
  ADD KEY `kd_matpel` (`kd_matpel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kd_kelas` (`kd_kelas`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`kd_matpel`) REFERENCES `matpel` (`kd_matpel`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kd_matpel`) REFERENCES `matpel` (`kd_matpel`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
