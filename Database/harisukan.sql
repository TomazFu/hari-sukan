-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 05:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testfile`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `idAcara` varchar(11) NOT NULL,
  `namaAcara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`idAcara`, `namaAcara`) VALUES
('K1', '100-Meter'),
('K2', '200-Meter'),
('K3', '400-Meter'),
('K4', 'Lompat Jauh'),
('K5', 'Lompat Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` varchar(11) NOT NULL,
  `namaAdmin` varchar(255) NOT NULL,
  `passwordAdmin` varchar(255) NOT NULL,
  `noTelefon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `namaAdmin`, `passwordAdmin`, `noTelefon`) VALUES
('A1', 'Tomaz', 'admin1', '0123459876'),
('A2', 'Fu', 'admin2', '0193852951');

-- --------------------------------------------------------

--
-- Table structure for table `hakim`
--

CREATE TABLE `hakim` (
  `idHakim` varchar(11) NOT NULL,
  `idAcara` varchar(11) NOT NULL,
  `namaHakim` varchar(255) NOT NULL,
  `passwordHakim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hakim`
--

INSERT INTO `hakim` (`idHakim`, `idAcara`, `namaHakim`, `passwordHakim`) VALUES
('H0001', 'K1', 'Peter Lee', 'hakim1'),
('H0002', 'K2', 'Jonathan Edwards', 'hakim2'),
('H0003', 'K3', 'Marilyn Johnson', 'hakim3'),
('H0004', 'K4', 'Joe Kim', 'hakim4'),
('H0005', 'K5', 'Haley Martinez', 'hakim5');

-- --------------------------------------------------------

--
-- Table structure for table `markah`
--

CREATE TABLE `markah` (
  `idMurid` varchar(11) NOT NULL,
  `idAcara` varchar(11) NOT NULL,
  `catatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `markah`
--

INSERT INTO `markah` (`idMurid`, `idAcara`, `catatan`) VALUES
('A0001', 'K1', '12.9s'),
('A0001', 'K2', '23.1s'),
('A0001', 'K3', '63.1s'),
('A0002', 'K3', '64.2s'),
('A0002', 'K4', '6.6m'),
('A0002', 'K5', '1.45m'),
('A0003', 'K1', '12.1s'),
('A0003', 'K2', '24.6s'),
('A0004', 'K4', '6.3m'),
('A0004', 'K5', '1.4m'),
('A0005', 'K1', '13.5s'),
('A0005', 'K2', '25.6s'),
('A0005', 'K3', '61.8s'),
('A0006', 'K3', '60.3s'),
('A0006', 'K4', '6m'),
('A0006', 'K5', '1.35m'),
('A0007', 'K1', '13.8s'),
('A0007', 'K2', '26.2s'),
('A0008', 'K4', '5.4m'),
('A0008', 'K5', '1.3m'),
('A0009', 'K1', '14.3s'),
('A0009', 'K2', '23.9s'),
('A0009', 'K3', '64.9s'),
('A0010', 'K3', '65.3s'),
('A0010', 'K4', '6.9m'),
('A0010', 'K5', '1.25m');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `idMurid` varchar(11) NOT NULL,
  `namaMurid` varchar(255) NOT NULL,
  `jantina` char(1) NOT NULL,
  `kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`idMurid`, `namaMurid`, `jantina`, `kelas`) VALUES
('A0001', 'Adu Christiana', 'P', '2A9'),
('A0002', 'Agbeko Mavis', 'P', '3A2'),
('A0003', 'Afrifa Yvette', 'P', '5B3'),
('A0004', 'Arthur John', 'L', '2A6'),
('A0005', 'Ofori Amanfo', 'L', '3AK1'),
('A0006', 'Aidoo Patience', 'P', '4K1'),
('A0007', 'Akafia Lawrencia', 'P', '4SA3'),
('A0008', 'Okoe Theodora', 'P', '3B4'),
('A0009', 'Ampofo David', 'L', '4SA1'),
('A0010', 'Poku Kwame', 'L', '5SB2');

-- --------------------------------------------------------

--
-- Table structure for table `no telefon hakim`
--

CREATE TABLE `no telefon hakim` (
  `namaHakim` varchar(255) NOT NULL,
  `noTelefon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `no telefon hakim`
--

INSERT INTO `no telefon hakim` (`namaHakim`, `noTelefon`) VALUES
('Haley Martinez', '0195769283'),
('Joe Kim', '0104859275'),
('Jonathan Edwards', '0125839572'),
('Marilyn Johnson', '0193758391'),
('Peter Lee', '0115839482');

-- --------------------------------------------------------

--
-- Table structure for table `no telefon murid`
--

CREATE TABLE `no telefon murid` (
  `namaMurid` varchar(255) NOT NULL,
  `noTelefon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `no telefon murid`
--

INSERT INTO `no telefon murid` (`namaMurid`, `noTelefon`) VALUES
('Adu Christiana', '0123493193'),
('Afrifa Yvette', '0128694586'),
('Agbeko Mavis', '0124857482'),
('Aidoo Patience', '0112948284'),
('Akafia Lawrencia', '0184069385'),
('Ampofo David', '0194859673'),
('Arthur John', '0193858291'),
('Ofori Amanfo', '0103859173'),
('Okoe Theodora', '0195839271'),
('Poku Kwame', '0123485738');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`idAcara`),
  ADD KEY `idAcara` (`idAcara`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `hakim`
--
ALTER TABLE `hakim`
  ADD PRIMARY KEY (`idHakim`),
  ADD KEY `idAcara` (`idAcara`),
  ADD KEY `hakim_ibfk_2` (`namaHakim`);

--
-- Indexes for table `markah`
--
ALTER TABLE `markah`
  ADD PRIMARY KEY (`idMurid`,`idAcara`),
  ADD KEY `idAcara` (`idAcara`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`idMurid`),
  ADD KEY `murid_ibfk_2` (`namaMurid`);

--
-- Indexes for table `no telefon hakim`
--
ALTER TABLE `no telefon hakim`
  ADD PRIMARY KEY (`namaHakim`);

--
-- Indexes for table `no telefon murid`
--
ALTER TABLE `no telefon murid`
  ADD PRIMARY KEY (`namaMurid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hakim`
--
ALTER TABLE `hakim`
  ADD CONSTRAINT `hakim_ibfk_1` FOREIGN KEY (`idAcara`) REFERENCES `acara` (`idAcara`) ON UPDATE CASCADE;

--
-- Constraints for table `markah`
--
ALTER TABLE `markah`
  ADD CONSTRAINT `markah_ibfk_1` FOREIGN KEY (`idAcara`) REFERENCES `acara` (`idAcara`) ON UPDATE CASCADE,
  ADD CONSTRAINT `markah_ibfk_2` FOREIGN KEY (`idMurid`) REFERENCES `murid` (`idMurid`) ON UPDATE CASCADE;

--
-- Constraints for table `no telefon hakim`
--
ALTER TABLE `no telefon hakim`
  ADD CONSTRAINT `no telefon hakim_ibfk_1` FOREIGN KEY (`namaHakim`) REFERENCES `hakim` (`namaHakim`) ON UPDATE CASCADE;

--
-- Constraints for table `no telefon murid`
--
ALTER TABLE `no telefon murid`
  ADD CONSTRAINT `no telefon murid_ibfk_1` FOREIGN KEY (`namaMurid`) REFERENCES `murid` (`namaMurid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
