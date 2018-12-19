-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2017 at 08:36 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bambi`
--

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenica`
--

CREATE TABLE `narudzbenica` (
  `id_narudzbenice` int(11) NOT NULL,
  `id_proizvoda` int(11) NOT NULL,
  `id_skladista` int(11) NOT NULL,
  `id_proizvodne_jedinice` int(11) NOT NULL,
  `datum_slanja` date DEFAULT NULL,
  `kolicina_porucenog_proizvoda` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `narudzbenica`
--

INSERT INTO `narudzbenica` (`id_narudzbenice`, `id_proizvoda`, `id_skladista`, `id_proizvodne_jedinice`, `datum_slanja`, `kolicina_porucenog_proizvoda`) VALUES
(1, 5, 1, 4, '2017-01-10', 1000),
(2, 2, 3, 4, '2017-01-12', 100);

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id_proizvoda` int(11) NOT NULL,
  `id_tipa_proizvoda` int(11) NOT NULL,
  `naziv_proizvoda` text,
  `jedinica_mere` text,
  `cena` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id_proizvoda`, `id_tipa_proizvoda`, `naziv_proizvoda`, `jedinica_mere`, `cena`) VALUES
(1, 1, 'Plazma', 'kg', 1000),
(2, 1, 'Krem banana', 'komad', 10),
(3, 2, 'Secer', 'kg', 100),
(4, 2, 'Cokolada', 'kg', 500),
(5, 1, 'Wellness', 'Kg', 1200),
(6, 1, 'Josh', 'gram', 25);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodna_jedinica`
--

CREATE TABLE `proizvodna_jedinica` (
  `id_proizvodne_jedinice` int(11) NOT NULL,
  `ime_pj` text,
  `mesto_pj` text,
  `ukupan_kapacitet_proizvodnje` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proizvodna_jedinica`
--

INSERT INTO `proizvodna_jedinica` (`id_proizvodne_jedinice`, `ime_pj`, `mesto_pj`, `ukupan_kapacitet_proizvodnje`) VALUES
(1, 'prva jedinica', 'Beograd', 100),
(2, 'druga jedinica', 'Novi Sad', 200),
(3, 'treca jedinica', 'Kragujevac', 100),
(4, 'cetvrta jedinica', 'Nis', 200);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodnja`
--

CREATE TABLE `proizvodnja` (
  `id_proizvodnje` int(11) NOT NULL,
  `id_proizvodne_jedinice` int(11) NOT NULL,
  `id_proizvoda` int(11) NOT NULL,
  `kolicina_proizvoda` bigint(20) DEFAULT NULL,
  `min_kapacitet_proizvodnje` bigint(20) DEFAULT NULL,
  `max_kapacitet_proizvodnje` bigint(20) DEFAULT NULL,
  `datum_proizvodnje` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proizvodnja`
--

INSERT INTO `proizvodnja` (`id_proizvodnje`, `id_proizvodne_jedinice`, `id_proizvoda`, `kolicina_proizvoda`, `min_kapacitet_proizvodnje`, `max_kapacitet_proizvodnje`, `datum_proizvodnje`) VALUES
(1, 1, 1, 0, 100, 1000, '2017-01-01'),
(2, 2, 2, 0, 110, 2000, '2017-01-02'),
(3, 3, 3, 950, 120, 3000, '2017-01-03'),
(4, 4, 4, 1000, 125, 300, '2017-01-04'),
(5, 1, 3, 400, 600, 2000, '2017-01-05'),
(6, 3, 2, 600, 100, 1000, '2017-01-06'),
(7, 1, 4, 0, 205, 1055, '2017-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `skladiste`
--

CREATE TABLE `skladiste` (
  `id_skladista` int(11) NOT NULL,
  `naziv_skladista` text,
  `mesto_skladista` text,
  `ukupan_kapacitet_zaliha_skladista` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skladiste`
--

INSERT INTO `skladiste` (`id_skladista`, `naziv_skladista`, `mesto_skladista`, `ukupan_kapacitet_zaliha_skladista`) VALUES
(1, 'prvo skladiste', 'Beograd', 5000),
(2, 'drugo skladiste', 'gornji milanovac', 5000),
(3, 'trece skladiste', 'Vrsac', 10000),
(4, 'cetvrto skladiste', 'zlatibor', 10000),
(7, 'peto skladiste', 'Krusevac ', 8879);

-- --------------------------------------------------------

--
-- Table structure for table `stanje_skladista`
--

CREATE TABLE `stanje_skladista` (
  `id_stanja_skladista` int(11) NOT NULL,
  `id_skladista` int(11) NOT NULL,
  `id_proizvoda` int(11) DEFAULT NULL,
  `trenutna_kolicina` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stanje_skladista`
--

INSERT INTO `stanje_skladista` (`id_stanja_skladista`, `id_skladista`, `id_proizvoda`, `trenutna_kolicina`) VALUES
(1, 1, 1, 2000),
(2, 2, 2, 3000),
(3, 3, 3, 3000),
(4, 4, 4, 5000),
(5, 1, 2, 400),
(6, 2, 1, 750),
(7, 2, 5, 1750);

-- --------------------------------------------------------

--
-- Table structure for table `tip_proizvoda`
--

CREATE TABLE `tip_proizvoda` (
  `id_tipa_proizvoda` int(11) NOT NULL,
  `naziv_tipa_proizvoda` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tip_proizvoda`
--

INSERT INTO `tip_proizvoda` (`id_tipa_proizvoda`, `naziv_tipa_proizvoda`) VALUES
(1, 'proizvod'),
(2, 'polu proizvod');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  ADD PRIMARY KEY (`id_narudzbenice`),
  ADD KEY `FK_R6` (`id_proizvoda`),
  ADD KEY `FK_R7` (`id_proizvodne_jedinice`),
  ADD KEY `FK_R8` (`id_skladista`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id_proizvoda`),
  ADD KEY `FK_R1` (`id_tipa_proizvoda`);

--
-- Indexes for table `proizvodna_jedinica`
--
ALTER TABLE `proizvodna_jedinica`
  ADD PRIMARY KEY (`id_proizvodne_jedinice`);

--
-- Indexes for table `proizvodnja`
--
ALTER TABLE `proizvodnja`
  ADD PRIMARY KEY (`id_proizvodnje`),
  ADD KEY `FK_R2` (`id_proizvoda`),
  ADD KEY `FK_R3` (`id_proizvodne_jedinice`);

--
-- Indexes for table `skladiste`
--
ALTER TABLE `skladiste`
  ADD PRIMARY KEY (`id_skladista`);

--
-- Indexes for table `stanje_skladista`
--
ALTER TABLE `stanje_skladista`
  ADD PRIMARY KEY (`id_stanja_skladista`),
  ADD KEY `FK_R4` (`id_proizvoda`),
  ADD KEY `FK_R5` (`id_skladista`);

--
-- Indexes for table `tip_proizvoda`
--
ALTER TABLE `tip_proizvoda`
  ADD PRIMARY KEY (`id_tipa_proizvoda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  MODIFY `id_narudzbenice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `id_proizvoda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `proizvodna_jedinica`
--
ALTER TABLE `proizvodna_jedinica`
  MODIFY `id_proizvodne_jedinice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `proizvodnja`
--
ALTER TABLE `proizvodnja`
  MODIFY `id_proizvodnje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `skladiste`
--
ALTER TABLE `skladiste`
  MODIFY `id_skladista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `stanje_skladista`
--
ALTER TABLE `stanje_skladista`
  MODIFY `id_stanja_skladista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  ADD CONSTRAINT `FK_R6` FOREIGN KEY (`id_proizvoda`) REFERENCES `proizvod` (`id_proizvoda`),
  ADD CONSTRAINT `FK_R7` FOREIGN KEY (`id_proizvodne_jedinice`) REFERENCES `proizvodna_jedinica` (`id_proizvodne_jedinice`),
  ADD CONSTRAINT `FK_R8` FOREIGN KEY (`id_skladista`) REFERENCES `skladiste` (`id_skladista`);

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `FK_R1` FOREIGN KEY (`id_tipa_proizvoda`) REFERENCES `tip_proizvoda` (`id_tipa_proizvoda`);

--
-- Constraints for table `proizvodnja`
--
ALTER TABLE `proizvodnja`
  ADD CONSTRAINT `FK_R2` FOREIGN KEY (`id_proizvoda`) REFERENCES `proizvod` (`id_proizvoda`),
  ADD CONSTRAINT `FK_R3` FOREIGN KEY (`id_proizvodne_jedinice`) REFERENCES `proizvodna_jedinica` (`id_proizvodne_jedinice`);

--
-- Constraints for table `stanje_skladista`
--
ALTER TABLE `stanje_skladista`
  ADD CONSTRAINT `FK_R4` FOREIGN KEY (`id_proizvoda`) REFERENCES `proizvod` (`id_proizvoda`),
  ADD CONSTRAINT `FK_R5` FOREIGN KEY (`id_skladista`) REFERENCES `skladiste` (`id_skladista`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
