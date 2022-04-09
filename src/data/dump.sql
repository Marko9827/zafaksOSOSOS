-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2022 at 10:32 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_rad1`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivniispiti`
--

CREATE TABLE `aktivniispiti` (
  `id_ispita` int(11) NOT NULL,
  `datumIspita` date NOT NULL,
  `K1` int(11) NOT NULL DEFAULT '0',
  `K2` int(11) NOT NULL DEFAULT '0',
  `ZakljucnaOcena` int(11) NOT NULL DEFAULT '0',
  `prijaviloIspt` int(11) NOT NULL DEFAULT '0',
  `id_predmeta` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktivniispiti`
--

INSERT INTO `aktivniispiti` (`id_ispita`, `datumIspita`, `K1`, `K2`, `ZakljucnaOcena`, `prijaviloIspt`, `id_predmeta`) VALUES
(0, '2022-04-11', 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ispit_ocena`
--

CREATE TABLE `ispit_ocena` (
  `id` int(11) NOT NULL,
  `id_studenta` int(11) NOT NULL,
  `k1` int(11) NOT NULL DEFAULT '0',
  `k2` int(11) NOT NULL DEFAULT '0',
  `ZakljucnaOcena` int(11) NOT NULL DEFAULT '0',
  `id_ispita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ispit_ocena`
--

INSERT INTO `ispit_ocena` (`id`, `id_studenta`, `k1`, `k2`, `ZakljucnaOcena`, `id_ispita`) VALUES
(0, 3, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ispit_s_novo`
--

CREATE TABLE `ispit_s_novo` (
  `id` int(11) NOT NULL,
  `id_studenta` int(11) NOT NULL,
  `id_predmeta` int(11) NOT NULL,
  `napomene` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ispit_s_novo`
--

INSERT INTO `ispit_s_novo` (`id`, `id_studenta`, `id_predmeta`, `napomene`) VALUES
(0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--

CREATE TABLE `notify` (
  `id` int(11) NOT NULL,
  `time` date NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notify`
--

INSERT INTO `notify` (`id`, `time`, `text`, `title`) VALUES
(0, '2022-04-05', 'Ovo je demo nalog.\r\nPodaci naloga se utomatski resetuju u 00:00 ponoc, svake noci.\r\n\r\nFunkcije Administratora/Profesora nece biti dostupne!', 'Za Demo, 7007007');

-- --------------------------------------------------------

--
-- Table structure for table `predmeti`
--

CREATE TABLE `predmeti` (
  `id_predmeta` int(11) NOT NULL,
  `Ime_predmeta` text NOT NULL,
  `upisanih_studenata` int(11) NOT NULL,
  `Pali_ispit` int(11) NOT NULL,
  `Profesor` text NOT NULL,
  `asistent` text NOT NULL,
  `opis` text NOT NULL,
  `link_predmeta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `predmeti`
--

INSERT INTO `predmeti` (`id_predmeta`, `Ime_predmeta`, `upisanih_studenata`, `Pali_ispit`, `Profesor`, `asistent`, `opis`, `link_predmeta`) VALUES
(0, 'Razvoj web Aplikacija', 1, 0, 'Dr. Pera X.', 'Milos M.', 'PHP, HTML...', ''),
(1, 'Hotelijerstvo', 2, 0, 'Milan X', 'Demo X', 'Kafi?i, kuhinja', '');

-- --------------------------------------------------------

--
-- Table structure for table `prijavljeni_ispiti`
--

CREATE TABLE `prijavljeni_ispiti` (
  `id_studenta` int(11) NOT NULL,
  `ispit` int(11) NOT NULL,
  `brojPrijava` int(11) NOT NULL,
  `napomene` int(11) NOT NULL,
  `id_predmeta` int(11) NOT NULL,
  `indeks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prijavljeni_ispiti`
--

INSERT INTO `prijavljeni_ispiti` (`id_studenta`, `ispit`, `brojPrijava`, `napomene`, `id_predmeta`, `indeks`) VALUES
(3, 0, 1, 0, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `racun`
--

CREATE TABLE `racun` (
  `id` int(11) NOT NULL,
  `indeks` int(11) NOT NULL,
  `money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `racun`
--

INSERT INTO `racun` (`id`, `indeks`, `money`) VALUES
(0, 2020200219, 4001),
(1, 7, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

CREATE TABLE `studenti` (
  `id` int(11) NOT NULL,
  `indeks` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `lang` text NOT NULL,
  `datumRodjenja` date NOT NULL,
  `upisao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studenti`
--

INSERT INTO `studenti` (`id`, `indeks`, `username`, `password`, `admin`, `lang`, `datumRodjenja`, `upisao`) VALUES
(1, 2020200219, 'Marko Nikolic', 'sifra123', 0, 'rs', '2021-03-26', 'FIR'),
(2, 2020200209, 'Profesor', 'admin123', 1, '', '0000-00-00', ''),
(3, 7007007, 'demo', 'demo', 0, 'en', '2022-04-08', 'Turizam');

-- --------------------------------------------------------

--
-- Table structure for table `student_predmet`
--

CREATE TABLE `student_predmet` (
  `id_student_predmet` int(11) NOT NULL,
  `id_studenta` int(11) NOT NULL,
  `id_predmeta` int(11) NOT NULL,
  `polozio_da_ne` int(11) NOT NULL DEFAULT '0',
  `prijavio` int(11) NOT NULL DEFAULT '0',
  `brojPrijava` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_predmet`
--

INSERT INTO `student_predmet` (`id_student_predmet`, `id_studenta`, `id_predmeta`, `polozio_da_ne`, `prijavio`, `brojPrijava`) VALUES
(0, 2020200219, 0, 0, 0, 0),
(1, 7, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `upisi`
--

CREATE TABLE `upisi` (
  `id` int(11) NOT NULL,
  `stuednt_id` int(11) NOT NULL,
  `sta_je_upisao` text NOT NULL,
  `Godina_upisa` int(11) NOT NULL,
  `vreme_upisa` date NOT NULL,
  `kojiPut` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upisi`
--

INSERT INTO `upisi` (`id`, `stuednt_id`, `sta_je_upisao`, `Godina_upisa`, `vreme_upisa`, `kojiPut`) VALUES
(0, 1, 'FIR', 1, '2022-04-15', 1),
(1, 3, 'Turizam', 1, '2022-01-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `zaposlen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivniispiti`
--
ALTER TABLE `aktivniispiti`
  ADD PRIMARY KEY (`id_ispita`),
  ADD UNIQUE KEY `id_ispita` (`id_ispita`);

--
-- Indexes for table `ispit_ocena`
--
ALTER TABLE `ispit_ocena`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ispit_s_novo`
--
ALTER TABLE `ispit_s_novo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predmeti`
--
ALTER TABLE `predmeti`
  ADD PRIMARY KEY (`id_predmeta`);

--
-- Indexes for table `prijavljeni_ispiti`
--
ALTER TABLE `prijavljeni_ispiti`
  ADD PRIMARY KEY (`id_studenta`),
  ADD UNIQUE KEY `id_studenta` (`id_studenta`),
  ADD KEY `id_studenta_2` (`id_studenta`);

--
-- Indexes for table `racun`
--
ALTER TABLE `racun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `student_predmet`
--
ALTER TABLE `student_predmet`
  ADD PRIMARY KEY (`id_student_predmet`);

--
-- Indexes for table `upisi`
--
ALTER TABLE `upisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
