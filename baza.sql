-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2017 at 10:06 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanovi`
--

CREATE TABLE `clanovi` (
  `Clan_ID` int(11) NOT NULL,
  `Clan_Ime` varchar(50) NOT NULL,
  `Clan_Prezime` varchar(50) DEFAULT NULL,
  `Clan_Tel` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clanovi`
--

INSERT INTO `clanovi` (`Clan_ID`, `Clan_Ime`, `Clan_Prezime`, `Clan_Tel`) VALUES
(15, 'Bojana', 'Zivkovic', '0631126472'),
(16, 'Pera', 'Peric', '0112365478');

-- --------------------------------------------------------

--
-- Table structure for table `filmovi`
--

CREATE TABLE `filmovi` (
  `Film_ID` int(11) NOT NULL,
  `Film_Ime` varchar(50) DEFAULT NULL,
  `Zanr_ID` int(11) DEFAULT '0',
  `Trajanje` int(11) DEFAULT '0',
  `Vrsta_ID` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filmovi`
--

INSERT INTO `filmovi` (`Film_ID`, `Film_Ime`, `Zanr_ID`, `Trajanje`, `Vrsta_ID`) VALUES
(9, 'Sivilo', 3, 120, 2),
(10, 'Parada', 1, 100, 2),
(11, 'Maratonci', 1, 90, 3),
(18, 'Kad jaganjci utihnu', 2, 90, 2),
(19, 'Terminator', 4, 98, 2),
(20, 'Terminator 2', 4, 100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `iznajmljivanja`
--

CREATE TABLE `iznajmljivanja` (
  `Iznaj_ID` int(11) NOT NULL,
  `Datum_iznaj` datetime DEFAULT NULL,
  `Datum_vracanja` datetime DEFAULT NULL,
  `Clan_ID` int(11) DEFAULT '0',
  `Film_ID` int(11) DEFAULT '0',
  `Cena_dan` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iznajmljivanja`
--

INSERT INTO `iznajmljivanja` (`Iznaj_ID`, `Datum_iznaj`, `Datum_vracanja`, `Clan_ID`, `Film_ID`, `Cena_dan`) VALUES
(76, '2012-05-14 00:00:00', '2012-05-17 00:00:00', 5, 9, 100),
(77, '2012-05-15 00:00:00', '2012-05-18 00:00:00', 12, 11, 50),
(82, '2017-01-16 22:01:06', NULL, 16, 20, 0),
(81, '2017-01-16 22:00:57', NULL, 16, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `plate`
--

CREATE TABLE `plate` (
  `Plate_ID` int(11) NOT NULL,
  `Plate` decimal(19,4) DEFAULT NULL,
  `Zaposleni_ID` int(11) DEFAULT '0',
  `Datum_uplate` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `troskovi`
--

CREATE TABLE `troskovi` (
  `Troskovi_ID` int(11) NOT NULL,
  `Lokal` decimal(19,4) DEFAULT NULL,
  `Racuni` decimal(19,4) DEFAULT NULL,
  `Plate_ID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vrsta`
--

CREATE TABLE `vrsta` (
  `Vrsta_ID` int(11) NOT NULL,
  `Vrsta_Ime` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vrsta`
--

INSERT INTO `vrsta` (`Vrsta_ID`, `Vrsta_Ime`) VALUES
(1, 'CD'),
(2, 'DVD'),
(3, 'Video kaseta');

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

CREATE TABLE `zanr` (
  `Zanr_ID` int(11) NOT NULL,
  `Zanr_Ime` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`Zanr_ID`, `Zanr_Ime`) VALUES
(1, 'Komedija'),
(2, 'Drama'),
(3, 'Triler'),
(4, 'Akcioni'),
(5, 'Crtani');

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

CREATE TABLE `zaposleni` (
  `Zaposleni_ID` int(11) NOT NULL,
  `Zaposleni_Naziv` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`Zaposleni_ID`, `Zaposleni_Naziv`, `Username`, `Password`) VALUES
(6, 'Bojana Zivkovic', 'boka', '123'),
(7, 'Drugi Zaposleni', 'drugi', '456'),
(8, 'Administrator', 'Admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanovi`
--
ALTER TABLE `clanovi`
  ADD PRIMARY KEY (`Clan_ID`),
  ADD KEY `Clan_ID` (`Clan_ID`);

--
-- Indexes for table `filmovi`
--
ALTER TABLE `filmovi`
  ADD PRIMARY KEY (`Film_ID`),
  ADD KEY `Film_ID` (`Film_ID`),
  ADD KEY `Vrsta_ID` (`Vrsta_ID`);

--
-- Indexes for table `iznajmljivanja`
--
ALTER TABLE `iznajmljivanja`
  ADD PRIMARY KEY (`Iznaj_ID`),
  ADD KEY `Clan_ID` (`Clan_ID`),
  ADD KEY `Film_ID` (`Film_ID`),
  ADD KEY `Iznaj_ID` (`Iznaj_ID`);

--
-- Indexes for table `plate`
--
ALTER TABLE `plate`
  ADD PRIMARY KEY (`Plate_ID`),
  ADD KEY `Zaposleni_ID` (`Zaposleni_ID`);

--
-- Indexes for table `troskovi`
--
ALTER TABLE `troskovi`
  ADD PRIMARY KEY (`Troskovi_ID`),
  ADD KEY `Plate_ID` (`Plate_ID`);

--
-- Indexes for table `vrsta`
--
ALTER TABLE `vrsta`
  ADD PRIMARY KEY (`Vrsta_ID`),
  ADD KEY `Vrsta_ID` (`Vrsta_ID`);

--
-- Indexes for table `zanr`
--
ALTER TABLE `zanr`
  ADD PRIMARY KEY (`Zanr_ID`),
  ADD KEY `Zanr_ID` (`Zanr_ID`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`Zaposleni_ID`),
  ADD KEY `Zaposleni_ID` (`Zaposleni_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanovi`
--
ALTER TABLE `clanovi`
  MODIFY `Clan_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `filmovi`
--
ALTER TABLE `filmovi`
  MODIFY `Film_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `iznajmljivanja`
--
ALTER TABLE `iznajmljivanja`
  MODIFY `Iznaj_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `plate`
--
ALTER TABLE `plate`
  MODIFY `Plate_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `troskovi`
--
ALTER TABLE `troskovi`
  MODIFY `Troskovi_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vrsta`
--
ALTER TABLE `vrsta`
  MODIFY `Vrsta_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `zanr`
--
ALTER TABLE `zanr`
  MODIFY `Zanr_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `zaposleni`
--
ALTER TABLE `zaposleni`
  MODIFY `Zaposleni_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
