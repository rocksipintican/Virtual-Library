-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 03:49 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managerstocuri`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(20) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mesaj` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nume`, `username`, `mesaj`) VALUES
(1, 'Andrei Pop', 'andrei', 'Salut, acesta este un mesaj de test!');

-- --------------------------------------------------------

--
-- Table structure for table `modificari`
--

CREATE TABLE `modificari` (
  `id` int(255) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `nume_produs` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `Actiune` varchar(255) NOT NULL,
  `Cantitate` varchar(255) NOT NULL,
  `pret_nou` varchar(255) NOT NULL,
  `data_modificari` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modificari`
--

INSERT INTO `modificari` (`id`, `nume`, `nume_produs`, `categorie`, `Actiune`, `Cantitate`, `pret_nou`, `data_modificari`) VALUES
(9, 'Hila Aurel', 'Pall Mall Negru', 'Tigari', 'Cumparata', '1000', '16,50', '2018-05-16'),
(10, 'Hila Aurel', 'Kent 8 Lung', 'Tigari', 'Cumparata', '3213', '18', '2018-05-16'),
(11, 'Hila Aurel', 'Nesquick Ciocolata', 'Cereale', 'Cumparata', '121', '10.82', '2018-05-17'),
(12, 'Hila Aurel', 'Kent 8 Lung', 'Tigari', 'Adaugata', '102', 'nemodificat', '2018-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `cod_produs` bigint(255) NOT NULL,
  `prenume` varchar(255) NOT NULL,
  `data_mod` varchar(255) NOT NULL,
  `nume_produs` varchar(255) NOT NULL,
  `furnizor_produs` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `cantitate_cumparata` varchar(255) NOT NULL,
  `cantitate_vanduta` varchar(255) NOT NULL,
  `cantitate_ramasa` varchar(255) NOT NULL,
  `pret_produs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`cod_produs`, `prenume`, `data_mod`, `nume_produs`, `furnizor_produs`, `categorie`, `cantitate_cumparata`, `cantitate_vanduta`, `cantitate_ramasa`, `pret_produs`) VALUES
(1231, 'Hila Aurel', '2018-05-17', 'Nesquick Ciocolata', 'Nestle', 'Cereale', '121', '-----', '121', '10.82'),
(23145, 'Hila Aurel', '2018-05-17', 'Kent 8 Lung', 'British American Tobacco', 'Tigari', '3315', '-----', '3315', '18'),
(351234, 'Hila Aurel', '2018-05-16', 'Pall Mall Negru', 'British American Tobacco', 'Tigari', '1000', '-----', '1000', '16,50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `nume` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tip_acces` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nume`, `username`, `Email`, `password`, `tip_acces`) VALUES
(1, 'Hila Aurel', 'admin', 'admin@gmail.com', 'admin', 1),
(4, 'Andrei Pop', 'andrei', 'andrei33@gmail.com', '12345', 0),
(10, 'Soare Daniel', 'soare23', 'dsoare@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(11, 'Scurtu Vlad ', 'scurtu23', 'scurtud@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modificari`
--
ALTER TABLE `modificari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`cod_produs`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modificari`
--
ALTER TABLE `modificari`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
