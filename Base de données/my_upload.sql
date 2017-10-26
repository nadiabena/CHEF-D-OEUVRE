-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2017 at 02:11 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_upload`
--

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `id_classe` int(11) NOT NULL,
  `classe` varchar(255) NOT NULL,
  `id_promo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`id_classe`, `classe`, `id_promo`) VALUES
(1, 'BXLCentral', 1),
(2, 'BXLAnderlecht', 1),
(3, 'Lovelace', 2),
(4, 'cycorp-maj', 2),
(82, 'Classe-Nadia', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `description_event` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `description_event`) VALUES
(1, 'Pizza Party'),
(2, 'Visite du Roi'),
(3, 'Degroof Petercam'),
(4, 'Prairie'),
(11, 'ok'),
(15, 'dernier');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(10) UNSIGNED NOT NULL,
  `date_photo` datetime NOT NULL,
  `description_photo` text,
  `image` varchar(255) DEFAULT 'event_default.jpg',
  `photo_une` tinyint(1) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id_photo`, `date_photo`, `description_photo`, `image`, `photo_une`, `id_event`) VALUES
(1, '2017-04-18 00:00:00', 'pizza party', 'View/Images/groupe_gagnant.JP', 1, 1),
(2, '2017-05-08 00:00:00', 'bowling party', 'View/Images/safia_interview.jpg', 1, 1),
(3, '2017-10-30 00:00:00', 'recontre ancien-nouveau', 'View/Images/becode.jpg', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `promo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id_promo`, `promo`) VALUES
(1, 'promo-1'),
(2, 'promo-2'),
(3, 'promo-3'),
(4312, 'promo-4'),
(4355, 'promo-5-test-maj');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `idStudent` tinyint(3) UNSIGNED NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `datenaissance` date NOT NULL,
  `genre` varchar(10) NOT NULL,
  `school` varchar(10) NOT NULL,
  `password_students` varchar(10) NOT NULL,
  `email_students` varchar(100) NOT NULL,
  `register` tinyint(4) NOT NULL,
  `promo` varchar(50) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`idStudent`, `prenom`, `nom`, `datenaissance`, `genre`, `school`, `password_students`, `email_students`, `register`, `promo`, `id_classe`) VALUES
(1, 'Safia', 'Bihmedn', '1990-11-17', 'F', 'Central', '', '', 0, '', 1),
(2, 'Estelle', 'Desmeurs', '1991-08-28', 'F', 'Central', '', '', 0, '', 1),
(4, 'Daniela', 'Santos', '1984-05-29', 'F', 'Central', '', '', 1, '', 1),
(5, 'Gabriele', 'Virga', '1994-10-09', 'M', 'Central', '', '', 0, '', 1),
(6, 'Kreshnik', 'Ibërdemaj', '1985-07-30', 'M', 'Central', '', '', 0, '', 1),
(7, 'Dan', 'Jansoone', '1993-10-18', 'M', 'Central', '', '', 0, '', 1),
(8, 'Jayce Marcel', 'Kaje Banziziki', '1992-03-01', 'M', 'Central', '', '', 0, '', 1),
(9, 'Eric', 'Nsukami Zaki Mbambu', '1978-05-16', 'M', 'Central', '', '', 0, '', 1),
(10, 'David', 'Vandervaeren', '1988-11-22', 'M', 'Central', '', '', 1, '', 1),
(11, 'Habib', 'El Maaza Gomez', '1972-01-27', 'M', 'Central', '', '', 0, '', 1),
(12, 'Ludovic', 'Patho', '1984-06-24', 'M', 'Central', '', '', 0, '', 1),
(13, 'Santiago', 'Astete', '2017-04-24', 'M', 'Central', '', '', 1, '', 1),
(14, 'Nadia', 'Nachit', '1982-03-30', 'F', 'Central', '', '', 0, '', 1),
(15, 'Hugo', 'Barcelona', '1989-05-31', 'M', 'Central', '', '', 0, '', 1),
(16, 'Miriam', 'Azzouz', '1980-01-03', 'F', 'Andy', '', '', 1, '', 2),
(17, 'Nadia', 'Ben Azouz', '1981-08-25', 'F', 'Andy', 'nadia12', 'nadia54321@hotmail.be', 1, 'PROMO-01', 2),
(18, 'Victor', 'Lanckriet', '1996-05-09', 'M', 'Andy', '', '', 0, '', 2),
(19, 'Gary', 'Luypaert', '1989-07-21', 'M', 'Andy', '', '', 0, '', 2),
(20, 'Michael', 'Mesmeaker', '1993-04-07', 'M', 'Andy', '', '', 0, '', 2),
(21, 'Juan Pablo', 'Quintero Torres', '1991-01-25', 'M', 'Andy', '', '', 0, '', 2),
(22, 'Thomas', 'Tonneau', '1993-10-03', 'M', 'Andy', '', '', 1, '', 2),
(23, 'Claudy', 'Via', '1960-11-29', 'M', 'Andy', '', '', 0, '', 2),
(24, 'Gilles', 'Youtou', '1978-12-28', 'M', 'Andy', '', '', 0, '', 2),
(25, 'Adrian', 'Zochowski', '1996-03-18', 'M', 'Andy', '', 'adrian@gmail.fr', 1, '', 2),
(26, 'Maria', 'Pedro Miala', '1980-08-23', 'F', 'Andy', '', '', 0, '', 2),
(27, 'salvatore', 'saia', '1978-06-20', 'M', 'Central', '', '', 0, '', 2),
(28, 'Thomas', 'Demilito', '1989-03-10', 'M', 'Central', '', '', 1, '', 2),
(29, 'geoffrey', 'marique', '1990-11-09', 'M', 'Central', '', '', 0, '', 2),
(30, 'Khaled', 'Nzisabira', '1995-01-26', 'M', 'Central', '', '', 0, '', 2),
(31, 'axel', 'saispas', '2000-05-05', 'M', 'Lovelace', 'axel12', 'axel@hotmail.com', 1, '2', 3),
(32, 'Laureen', 'lolo', '2000-06-06', 'F', 'Lovelace', 'laureen12', 'laureen@gmail.com', 0, '2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` smallint(5) UNSIGNED NOT NULL,
  `nom_user` varchar(60) DEFAULT NULL,
  `prenom_user` varchar(60) DEFAULT NULL,
  `datenaissance_user` datetime(1) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `telephone` varchar(13) NOT NULL,
  `login_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL DEFAULT 'pwd',
  `statut` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nom_user`, `prenom_user`, `datenaissance_user`, `email_user`, `telephone`, `login_user`, `password_user`, `statut`) VALUES
(1, 'Ben-Azouz', 'Nadia', '1981-08-25 00:00:00.0', 'nad@gmail.com', '0485/053093', 'admin', 'admin', 'Administrateur'),
(2, 'Salla', 'Eric', '2000-10-10 00:00:00.0', 'eric@becode.org', '0474/349043', 'eric', 'eric12', 'employe'),
(3, 'Girl', 'Maria', '2000-09-11 00:00:00.0', 'maria@becode.org', '0478/905691', 'maria', 'mamaria', 'employe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id_classe`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`idStudent`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4356;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
