-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2019 at 09:57 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentskiservis`
--
CREATE DATABASE IF NOT EXISTS `studentskiservis` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `studentskiservis`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(3) NOT NULL,
  `korime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `komentar` text COLLATE utf8_unicode_ci,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `brindexa` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `korime`, `lozinka`, `ime`, `prezime`, `status`, `email`, `komentar`, `datum`, `brindexa`) VALUES
(1, 'bane', '1', 'Бранислав', 'Вујановић', 'Администратор', 'branislavvujanovic4@gmail.com', 'Бранислав Вујановић је админ овог сајта!', '2019-03-14 20:56:14', NULL),
(2, 'vericart1516', '11', 'Верица', 'Максимовић', 'Student', 'verica@gmail.com', NULL, '2019-03-14 20:54:00', 'RT-15/16'),
(3, 'darkort716', '1234', 'Боривоје', 'Мартиновић', 'Student', 'darko@gmail.com', 'Darko je los student!', '2019-03-14 20:54:18', 'RT-7/16'),
(4, 'nikolart116', '33', 'Никола', 'Николић', 'Student', 'nikola@gmail.com', 'Nikola je redovan student!', '2019-03-14 20:54:33', 'RT-1/16'),
(5, 'jjovana', 'jjovana', 'Јована', 'Јовановић', 'Student', 'jjovana@gmail.com', 'Jovana je pauzirala godinu.', '2019-03-14 20:55:53', 'NRT-5/15'),
(6, 'bbosko', 'bbosko', 'Бошко', 'Богојевић', 'Profesor', 'bbosko@viser.edu.rs', 'Bosko je odlican profesor!', '2019-03-14 20:53:25', NULL),
(7, 'mdusan', 'mdusan', 'Душан', 'Марковић', 'Profesor', 'dusanm@viser.edu.rs', NULL, '2019-03-14 20:58:47', NULL),
(8, 'vivan', 'vivan', 'Иван', 'Вулић', 'Profesor', 'vulic.ivan@gmail.com', 'Ivan je profesor.', '2019-03-14 20:53:43', NULL),
(9, 'djordjeasuv3514', 'djordje', 'Ђорђе', 'Јоцовић', 'Student', 'djordje@gmail.com', 'Djrodje jos nije zavrsio skolu.', '2019-03-14 20:59:10', 'ASUV-35/14'),
(10, 'sdjenic', 'sdjenic', 'Слободанка', 'Ђенић', 'Profesor', 'sdjenic@viser.edu.rs', NULL, '2019-03-14 20:59:25', NULL),
(11, 'gdikic', 'dikic', 'Горан', 'Дикић', 'Profesor', 'gdikic@viser.edu.rs', NULL, '2019-03-14 20:59:41', NULL),
(12, 'kaja', '1', 'Катарина', 'Васић', 'Student', 'kaja@gmail.com', 'Kaja je Branuskino srce!', '2019-03-14 21:00:00', 'RT-44/16');

-- --------------------------------------------------------

--
-- Table structure for table `ocene`
--

CREATE TABLE `ocene` (
  `id` int(2) NOT NULL,
  `idStudenta` int(2) NOT NULL,
  `idpredmeta` int(2) NOT NULL,
  `ocena` int(2) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ocene`
--

INSERT INTO `ocene` (`id`, `idStudenta`, `idpredmeta`, `ocena`) VALUES
(14, 2, 2, 7),
(15, 2, 4, 9),
(16, 2, 3, 5),
(17, 2, 1, 5),
(18, 4, 2, 10),
(19, 4, 4, 9),
(20, 4, 3, 5),
(21, 4, 1, 5),
(22, 3, 2, 10),
(23, 3, 4, 7),
(24, 3, 3, 8),
(25, 3, 1, 10),
(26, 2, 5, 5),
(27, 3, 5, 7),
(28, 4, 5, 6),
(29, 5, 2, 5),
(30, 5, 1, 8),
(31, 5, 5, 6),
(32, 9, 4, 10),
(33, 9, 1, 9),
(34, 9, 6, 10),
(35, 5, 4, 5),
(41, 12, 6, 5),
(42, 0, 0, 0),
(43, 12, 1, 5),
(44, 12, 2, 5),
(45, 12, 3, 5),
(46, 12, 4, 5),
(47, 12, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `predmeti`
--

CREATE TABLE `predmeti` (
  `id` int(2) UNSIGNED NOT NULL,
  `imepredmeta` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `trajanje` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `predavanja` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `vezbe` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `predmeti`
--

INSERT INTO `predmeti` (`id`, `imepredmeta`, `trajanje`, `predavanja`, `vezbe`) VALUES
(1, 'Programiranje veb aplikacija', '1 semestar', '409, GSL', '403, 402'),
(2, 'Baze podataka', '1 semestar', 'SL', '509'),
(3, 'Java programiranje', '1 semestar', '306, 404', '403, 402'),
(4, 'Mikroracunari', '1 semestar', '406', '403'),
(5, 'Programski jezici', '1 semestar', 'SL, SD', '403,402,509'),
(6, 'Automatika 1', '1 semestar', 'SD, 106', '103,104');

-- --------------------------------------------------------

--
-- Table structure for table `predmetprofesor`
--

CREATE TABLE `predmetprofesor` (
  `id` int(3) UNSIGNED NOT NULL,
  `idprofesora` int(2) NOT NULL,
  `idpredmeta` int(2) NOT NULL,
  `angazovanOD` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `predmetprofesor`
--

INSERT INTO `predmetprofesor` (`id`, `idprofesora`, `idpredmeta`, `angazovanOD`) VALUES
(1, 6, 4, '2005-04-04'),
(2, 7, 2, '2010-11-05'),
(3, 7, 3, '2013-02-07'),
(5, 8, 1, '2017-10-02'),
(6, 10, 5, '2018-10-02'),
(7, 11, 6, '2016-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `profesori`
--

CREATE TABLE `profesori` (
  `id` int(2) UNSIGNED NOT NULL,
  `ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zaposlenOD` text COLLATE utf8_unicode_ci NOT NULL,
  `brojTEL` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mesto` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `postanskibroj` int(8) NOT NULL,
  `plata` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `BrTelPosao` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `statusprof` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profesori`
--

INSERT INTO `profesori` (`id`, `ime`, `prezime`, `zaposlenOD`, `brojTEL`, `adresa`, `mesto`, `postanskibroj`, `plata`, `BrTelPosao`, `email`, `statusprof`) VALUES
(6, 'Bosko', 'Bogojevic', '2010-01-17', '066-6666-666', 'Zdravka Celara 3333', 'Palilula', 11000, '100.000,00 DIN', '011 5457 556', 'bbosko@viser.edu.rs', 'Asistent'),
(7, 'Dusan', 'Markovic', '2015-04-26', '060-0000-000', 'Vojvode Stepe 33', 'Vozdovac', 11000, '90.000,00 DIN', '011 5457 557', 'mdusan@viser.edu.rs', 'Asistent'),
(8, 'Ivan', 'Vulic', '2017-10-02', '069-9687-32', 'Ruzveltova 13', 'Beograd', 11000, '200.000,00 DIN', '011 5457 558', 'vulic.ivan@gmail.com', 'Profesor'),
(10, 'SLobodanka', 'Djenic', '2000-10-01', '061 4753 534', 'Djordja Djkic 5a', 'Palilula', 11000, '170.000,00 DIN', '011 5457 559', 'sdjenic@viser.edu.rs', 'Profesor'),
(11, 'Goran', 'Dikic', '1970-10-01', '063 473 743', 'Rade Petkovic 76', 'Belanovica', 24356, '200.000,00 DIN', '011 5457 560', 'gdikic@viser.edu.rs', 'Profesor'),
(12, 'Marko', 'Vujanovic', '2019-08-07', '061-1133-224', 'Brezovacka 007', 'Arandjelovac', 34300, '30.000,00 DIN', '011 6343 223', 'marko@viser.edu.rs', 'Asistent'),
(25, 'Dragan', 'Vujanovic', '2019-09-01', '061-134-8797', 'Brezovacka 007', 'Arandjelovac', 34300, '110000', '034-6790-320', 'dragan@gmail.com', 'Profesor');

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

CREATE TABLE `studenti` (
  `id` smallint(5) NOT NULL,
  `brojindeksa` text COLLATE utf8_unicode_ci NOT NULL,
  `ime` text COLLATE utf8_unicode_ci NOT NULL,
  `prezime` text COLLATE utf8_unicode_ci NOT NULL,
  `godinaupisa` smallint(5) NOT NULL,
  `statussemestra` text COLLATE utf8_unicode_ci NOT NULL,
  `adresa` text COLLATE utf8_unicode_ci NOT NULL,
  `mesto` text COLLATE utf8_unicode_ci NOT NULL,
  `mobilnitelefon` text COLLATE utf8_unicode_ci,
  `e-mail` text COLLATE utf8_unicode_ci,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studenti`
--

INSERT INTO `studenti` (`id`, `brojindeksa`, `ime`, `prezime`, `godinaupisa`, `statussemestra`, `adresa`, `mesto`, `mobilnitelefon`, `e-mail`, `datum`) VALUES
(2, 'RT-15/16', 'Verica', 'Maksimovic', 2016, '3 semestar', 'Zemun polje 30', 'Beograd', '061- 11111111', 'verica@gmail.com', '2018-02-07 17:48:25'),
(3, 'RT-7/16', 'Borivoje', 'Martinovic', 2016, '3 semestar', 'Bogu iza nogu', 'Beograd', '066-30589502', 'bora@gmail.com', '2018-01-27 18:02:31'),
(4, 'RT-1/16', 'Nikola', 'Nikolic', 2016, '3 semestar', 'Vojvode Stepe 300', 'Beograd', '0655555555', 'nikola@gmail.com', '2018-01-27 18:02:31'),
(5, 'NRT-5/15', 'Jovana', 'Jovanovic', 2015, '5 semestar', 'Djordja Radomirovica 56/6', 'Bosuta', '064-7685-990', 'jovana@gmail.com', '2018-01-29 08:46:44'),
(9, 'ASUV-35/14', 'Djordje', 'Jocovic', 2014, '6 semestar', 'Kaludjerica bb', 'Beograd', '063-8459-034', 'djordje@gmail.com', '2018-02-15 22:33:02'),
(12, 'RT-44/16', 'Katarina', 'Vasic', 2016, '3 semestar', 'Pere Veljkovic 6v', 'Mirijevo, Beograd', '064 444 4444', 'kaja@gmail.com', '2018-02-20 11:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `uverenja`
--

CREATE TABLE `uverenja` (
  `id` int(2) UNSIGNED NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uverenja`
--

INSERT INTO `uverenja` (`id`, `naziv`) VALUES
(1, 'Регулисање војне обавезе'),
(2, 'Право на дечји додатак'),
(3, 'Породичне пензије'),
(4, 'Инвалидског додатка'),
(5, 'Добијања здравствене књижице'),
(6, 'Легитимације за повлашћену вожњу'),
(7, 'Добијање виза'),
(8, 'Пријаве у студентску задругу'),
(9, 'Конкурисања за студентски дом');

-- --------------------------------------------------------

--
-- Table structure for table `zahtevi`
--

CREATE TABLE `zahtevi` (
  `id` int(10) UNSIGNED NOT NULL,
  `idStudenta` int(3) NOT NULL,
  `iduverenja` int(1) NOT NULL,
  `odradjeno` int(1) NOT NULL DEFAULT '0',
  `komentar` text COLLATE utf8_unicode_ci NOT NULL,
  `datum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zahtevi`
--

INSERT INTO `zahtevi` (`id`, `idStudenta`, `iduverenja`, `odradjeno`, `komentar`, `datum`) VALUES
(56, 4, 2, 1, '0=nije uradjeno', '2018-01-28 21:08:33'),
(57, 2, 3, 1, '0=nije uradjeno', '2018-01-29 09:14:55'),
(58, 2, 1, 1, '0=nije uradjeno', '2018-01-29 09:15:02'),
(59, 2, 5, 1, '0=nije uradjeno', '2018-01-29 09:15:07'),
(60, 4, 2, 1, '0=nije uradjeno', '2018-01-29 11:13:21'),
(61, 4, 5, 1, '0=nije uradjeno', '2018-01-29 11:13:24'),
(62, 4, 7, 1, '0=nije uradjeno', '2018-01-29 11:13:26'),
(63, 4, 3, 1, '0=nije uradjeno', '2018-01-29 11:14:06'),
(64, 4, 3, 1, '0=nije uradjeno', '2018-01-29 11:14:08'),
(65, 4, 6, 1, '0=nije uradjeno', '2018-01-29 11:14:10'),
(66, 4, 6, 1, '0=nije uradjeno', '2018-01-29 11:14:12'),
(67, 4, 5, 1, '0=nije uradjeno', '2018-01-29 11:14:14'),
(68, 4, 6, 1, '0=nije uradjeno', '2018-01-29 11:14:16'),
(69, 4, 9, 1, '0=nije uradjeno', '2018-01-29 11:14:18'),
(70, 4, 1, 1, '0=nije uradjeno', '2018-01-29 11:14:21'),
(71, 4, 2, 1, '0=nije uradjeno', '2018-01-29 11:14:22'),
(72, 4, 3, 1, '0=nije uradjeno', '2018-01-29 11:14:23'),
(73, 4, 4, 1, '0=nije uradjeno', '2018-01-29 11:14:25'),
(74, 2, 7, 1, '0=nije uradjeno', '2018-01-29 20:58:06'),
(75, 2, 2, 1, '0=nije uradjeno', '2018-01-29 20:58:10'),
(76, 2, 3, 1, '0=nije uradjeno', '2018-01-30 00:13:11'),
(77, 2, 7, 1, '0=nije uradjeno', '2018-01-30 00:13:14'),
(78, 2, 3, 1, '0=nije uradjeno', '2018-01-30 00:14:54'),
(79, 2, 4, 1, '0=nije uradjeno', '2018-01-30 00:14:56'),
(80, 2, 7, 1, '0=nije uradjeno', '2018-01-30 00:14:59'),
(81, 4, 2, 1, '0=nije uradjeno', '2018-01-31 15:19:37'),
(82, 4, 7, 1, '0=nije uradjeno', '2018-01-31 15:19:39'),
(83, 4, 4, 1, '0=nije uradjeno', '2018-01-31 15:19:42'),
(84, 4, 9, 1, '0=nije uradjeno', '2018-01-31 15:19:44'),
(85, 4, 2, 1, '0=nije uradjeno', '2018-01-31 16:40:44'),
(86, 4, 3, 0, '0=nije uradjeno', '2018-01-31 16:59:12'),
(87, 4, 3, 1, '0=nije uradjeno', '2018-01-31 16:59:16'),
(88, 4, 2, 1, '0=nije uradjeno', '2018-01-31 16:59:18'),
(89, 2, 3, 1, '0=nije uradjeno', '2018-02-07 18:19:05'),
(90, 2, 2, 1, '0=nije uradjeno', '2018-02-07 18:19:07'),
(91, 2, 6, 1, '0=nije uradjeno', '2018-02-07 18:19:09'),
(92, 1, 2, 0, '0=nije uradjeno', '2018-02-07 18:19:32'),
(93, 4, 3, 1, '0=nije uradjeno', '2018-02-07 18:20:04'),
(94, 4, 8, 1, '0=nije uradjeno', '2018-02-07 18:20:07'),
(95, 4, 5, 1, '0=nije uradjeno', '2018-02-07 18:20:09'),
(96, 4, 9, 1, '0=nije uradjeno', '2018-02-07 18:20:11'),
(97, 4, 6, 1, '0=nije uradjeno', '2018-02-07 18:22:06'),
(98, 4, 7, 1, '0=nije uradjeno', '2018-02-07 18:22:08'),
(99, 2, 2, 1, '0=nije uradjeno', '2018-02-15 19:44:41'),
(100, 2, 2, 1, '0=nije uradjeno', '2018-02-15 19:46:09'),
(101, 2, 2, 1, '0=nije uradjeno', '2018-02-15 19:46:10'),
(102, 4, 2, 1, '0=nije uradjeno', '2018-02-15 22:53:46'),
(103, 5, 2, 0, '0=nije uradjeno', '2018-02-15 23:28:38'),
(104, 9, 3, 0, '0=nije uradjeno', '2018-02-15 23:42:21'),
(105, 9, 2, 0, '0=nije uradjeno', '2018-02-16 00:02:44'),
(106, 3, 3, 1, '0=nije uradjeno', '2018-02-16 00:03:25'),
(107, 2, 7, 1, '0=nije uradjeno', '2018-02-18 21:07:20'),
(108, 2, 4, 1, '0=nije uradjeno', '2018-02-19 11:00:25'),
(109, 2, 6, 1, '0=nije uradjeno', '2018-02-19 11:00:33'),
(110, 2, 2, 1, '0=nije uradjeno', '2018-02-19 11:00:51'),
(111, 2, 2, 1, '0=nije uradjeno', '2018-02-19 11:22:10'),
(112, 2, 2, 1, '0=nije uradjeno', '2018-02-19 11:23:01'),
(113, 2, 2, 1, '0=nije uradjeno', '2018-02-19 11:23:09'),
(114, 2, 4, 1, '0=nije uradjeno', '2018-02-19 17:23:06'),
(115, 2, 4, 1, '0=nije uradjeno', '2018-02-19 17:23:26'),
(116, 2, 4, 1, '0=nije uradjeno', '2018-02-19 17:24:09'),
(117, 2, 3, 1, '0=nije uradjeno', '2018-02-19 17:24:29'),
(118, 2, 3, 1, '0=nije uradjeno', '2018-02-20 12:38:28'),
(119, 12, 2, 1, '0=nije uradjeno', '2018-02-20 12:43:04'),
(120, 2, 1, 1, '0=nije uradjeno', '2018-02-22 22:16:56'),
(121, 2, 7, 1, '0=nije uradjeno', '2018-02-22 22:17:06'),
(122, 4, 7, 1, '0=nije uradjeno', '2018-02-24 16:57:24'),
(123, 2, 5, 1, '0=nije uradjeno', '2018-02-24 17:01:09'),
(124, 2, 7, 1, '0=nije uradjeno', '2018-04-03 21:38:21'),
(125, 2, 1, 0, '0=nije uradjeno', '2018-04-29 20:46:18'),
(126, 2, 7, 0, '0=nije uradjeno', '2018-05-04 15:27:26'),
(127, 2, 3, 0, '0=nije uradjeno', '2019-08-07 13:34:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ocene`
--
ALTER TABLE `ocene`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predmeti`
--
ALTER TABLE `predmeti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predmetprofesor`
--
ALTER TABLE `predmetprofesor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesori`
--
ALTER TABLE `profesori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `uverenja`
--
ALTER TABLE `uverenja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zahtevi`
--
ALTER TABLE `zahtevi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ocene`
--
ALTER TABLE `ocene`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `predmeti`
--
ALTER TABLE `predmeti`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `predmetprofesor`
--
ALTER TABLE `predmetprofesor`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profesori`
--
ALTER TABLE `profesori`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `studenti`
--
ALTER TABLE `studenti`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `uverenja`
--
ALTER TABLE `uverenja`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zahtevi`
--
ALTER TABLE `zahtevi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
