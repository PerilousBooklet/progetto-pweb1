-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2024 at 06:11 PM
-- Server version: 8.0.32
-- PHP Version: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_foglienipw`
--
CREATE DATABASE IF NOT EXISTS `my_foglienipw` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `my_foglienipw`;

-- --------------------------------------------------------

--
-- Table structure for table `Autostrada`
--

DROP TABLE IF EXISTS `Autostrada`;
CREATE TABLE `Autostrada` (
  `cod_naz` varchar(255) NOT NULL,
  `cod_eu` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `lunghezza` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Casello`
--

DROP TABLE IF EXISTS `Casello`;
CREATE TABLE `Casello` (
  `codice` int NOT NULL,
  `cod_naz` varchar(255) NOT NULL,
  `comune` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `x` double NOT NULL,
  `y` double NOT NULL,
  `is_automatico` tinyint(1) NOT NULL,
  `data_automazione` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Comune`
--

DROP TABLE IF EXISTS `Comune`;
CREATE TABLE `Comune` (
  `codice` varchar(255) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Provincia`
--

DROP TABLE IF EXISTS `Provincia`;
CREATE TABLE `Provincia` (
  `sigla` varchar(255) NOT NULL,
  `regione` int NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Regione`
--

DROP TABLE IF EXISTS `Regione`;
CREATE TABLE `Regione` (
  `codice` int NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Autostrada`
--
ALTER TABLE `Autostrada`
  ADD PRIMARY KEY (`cod_naz`);

--
-- Indexes for table `Casello`
--
ALTER TABLE `Casello`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `cod_naz` (`cod_naz`),
  ADD KEY `comune` (`comune`);

--
-- Indexes for table `Comune`
--
ALTER TABLE `Comune`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `provincia` (`provincia`);

--
-- Indexes for table `Provincia`
--
ALTER TABLE `Provincia`
  ADD PRIMARY KEY (`sigla`),
  ADD KEY `regione` (`regione`);

--
-- Indexes for table `Regione`
--
ALTER TABLE `Regione`
  ADD PRIMARY KEY (`codice`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Casello`
--
ALTER TABLE `Casello`
  MODIFY `codice` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Regione`
--
ALTER TABLE `Regione`
  MODIFY `codice` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Casello`
--
ALTER TABLE `Casello`
  ADD CONSTRAINT `Casello_ibfk_1` FOREIGN KEY (`cod_naz`) REFERENCES `Autostrada` (`cod_naz`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Casello_ibfk_2` FOREIGN KEY (`comune`) REFERENCES `Comune` (`codice`) ON UPDATE CASCADE;

--
-- Constraints for table `Comune`
--
ALTER TABLE `Comune`
  ADD CONSTRAINT `Comune_ibfk_1` FOREIGN KEY (`provincia`) REFERENCES `Provincia` (`sigla`) ON UPDATE CASCADE;

--
-- Constraints for table `Provincia`
--
ALTER TABLE `Provincia`
  ADD CONSTRAINT `Provincia_ibfk_1` FOREIGN KEY (`regione`) REFERENCES `Regione` (`codice`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
