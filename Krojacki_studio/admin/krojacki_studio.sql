-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 07:12 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krojacki_studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `boja`
--

CREATE TABLE `boja` (
  `id` int(11) NOT NULL,
  `naziv` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `slika` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `boja`
--

INSERT INTO `boja` (`id`, `naziv`, `slika`) VALUES
(6, 'Crna', 'img6126887d9e88d4.25559621.jpg'),
(7, 'Plava', 'img61275051331179.78018344.jpg'),
(8, 'Crvena', 'img612cfd0fe37dd7.52865313.png');

-- --------------------------------------------------------

--
-- Table structure for table `dozvola`
--

CREATE TABLE `dozvola` (
  `id` int(11) NOT NULL,
  `opis` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `dozvola`
--

INSERT INTO `dozvola` (`id`, `opis`) VALUES
(2, 'Korisnik ima mogućnost naručivanja sa web stranice, uređivanje svog privatnog profila te slanja upita putem kontakt forme.'),
(4, 'Moderator ima ovlasti nad narudžbama, proizvodima te galeriji slika. Nema pregled nad korisnicima, mjestima i ulogama.'),
(7, 'Administrator ima sve ovlasti nad ovom web stranicom!');

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE `galerija` (
  `id` int(11) NOT NULL,
  `slika` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`id`, `slika`) VALUES
(3, 'img61275ca9668558.44819430.jpg'),
(4, 'img61275caeaad744.99189914.jpg'),
(5, 'img61275cb7463c30.17026538.jpg'),
(7, 'img61275cc22f8249.38718024.jpg'),
(8, 'img61275cc73d2b67.50545605.jpg'),
(9, 'img61275cd64544d9.92975997.jpg'),
(10, 'img61275f1cac26c3.80973570.jpg'),
(11, 'img61275f40538976.76438334.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `prezime` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `korisnicko_ime` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `broj_mob` int(9) NOT NULL,
  `uloga_id` int(11) NOT NULL,
  `poslovnica_id` int(11) NOT NULL,
  `mjesto_id` int(11) NOT NULL,
  `lozinka` varchar(128) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `email`, `broj_mob`, `uloga_id`, `poslovnica_id`, `mjesto_id`, `lozinka`) VALUES
(21, 'Karlo', 'Karlić', 'karlica', 'karlo@gmail.com', 255411, 2, 3, 5, '$2y$10$WPjBpug7SW2bQXS05ttKAulAZkj0zr/7dFQxdJQhkkwxmEyELdqpK'),
(24, 'Lucija', 'Lucić', 'Luca', 'luca@gmail.com', 951753, 2, 3, 6, '$2y$10$JTwSsfzkoTTHoQTE/imD8eqOQS9GFhuzZ4xho1umhuktV5Ofz4mym'),
(26, 'Admin', 'Admin', 'Admin', 'krojacki_studio@gmail.com', 63555555, 1, 1, 4, '$2y$10$nRh6/7pmEUaZzWOpqkSlJ.0blc5D5Bx1vZOazrotkYlm3iUMz8Miq'),
(29, 'Ana', 'Anić', 'Ankica', 'ana@gmail.com', 63814612, 5, 1, 6, '$2y$10$oILNCScTpwVJxX13WbQo/eIyTUSA./SATH2GHgcAXZPQt9deQ80mO'),
(34, 'Renato', 'Ripić', 'Reno', 'reno@gmail.com', 987456321, 2, 3, 5, '$2y$10$IwiENy5FyDHY9nNPwdDJGOLkfLGOy1OkrWIHFiJWZIeDoi7pl8GV2'),
(37, 'Tomislav', 'Tomic', 'Tomica', 'tomo@gmail.com', 3522424, 2, 3, 6, '$2y$10$kROnAkw1SyAee.sI2zpls.yS62pl2Ml8DjycOOFYUNLUwbYERtf1e'),
(38, 'Dominik', 'Domazet', 'Domo', 'domo@gmail.com', 63154874, 2, 3, 5, '$2y$10$/zen1s8AJw8Z4A4UwO1c9.v3pcP3sVhlqm2EEsfKMJNP7KNx6BlA.');

-- --------------------------------------------------------

--
-- Table structure for table `materijal`
--

CREATE TABLE `materijal` (
  `id` int(11) NOT NULL,
  `naziv` varchar(30) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `materijal`
--

INSERT INTO `materijal` (`id`, `naziv`) VALUES
(2, 'svila'),
(3, 'pamuk'),
(4, 'pliš'),
(7, 'santen');

-- --------------------------------------------------------

--
-- Table structure for table `mjesto`
--

CREATE TABLE `mjesto` (
  `id` int(11) NOT NULL,
  `naziv` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `post_broj` int(11) NOT NULL,
  `ulica` varchar(50) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `mjesto`
--

INSERT INTO `mjesto` (`id`, `naziv`, `post_broj`, `ulica`) VALUES
(4, 'Posušje', 88240, 'Fra Grge Martića 1'),
(5, 'Široki Brijeg', 88220, 'Kralja Tomislava 10'),
(6, 'Mostar', 88000, 'Splitska ulica 16'),
(7, 'xxxxx', 0, 'xxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `narudzba`
--

CREATE TABLE `narudzba` (
  `id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `uzorak_id` int(11) NOT NULL,
  `boja_id` int(11) NOT NULL,
  `materijal_id` int(11) NOT NULL,
  `velicina_id` int(11) NOT NULL,
  `kolicina` int(5) NOT NULL,
  `ukupno` int(10) NOT NULL,
  `vrijeme_nar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poslovnica`
--

CREATE TABLE `poslovnica` (
  `id` int(11) NOT NULL,
  `naziv` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `mjesto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `poslovnica`
--

INSERT INTO `poslovnica` (`id`, `naziv`, `mjesto_id`) VALUES
(1, 'Krojački studio', 4),
(3, 'Kupac', 4);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id` int(11) NOT NULL,
  `naziv` varchar(20) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id`, `naziv`) VALUES
(1, 'admin'),
(2, 'korisnik'),
(5, 'Moderator');

-- --------------------------------------------------------

--
-- Table structure for table `uloga_dozvola`
--

CREATE TABLE `uloga_dozvola` (
  `id` int(11) NOT NULL,
  `uloga_id` int(11) NOT NULL,
  `dozvola_id` int(11) NOT NULL,
  `kreirano` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `uloga_dozvola`
--

INSERT INTO `uloga_dozvola` (`id`, `uloga_id`, `dozvola_id`, `kreirano`) VALUES
(3, 2, 2, '2021-08-26 11:05:17'),
(8, 5, 4, '2021-08-30 15:52:43'),
(10, 1, 7, '2021-09-01 15:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `upiti`
--

CREATE TABLE `upiti` (
  `id` int(11) NOT NULL,
  `ime` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `broj` int(15) NOT NULL,
  `upit` longtext COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uzorak`
--

CREATE TABLE `uzorak` (
  `id` int(11) NOT NULL,
  `naziv` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `slika` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `uzorak`
--

INSERT INTO `uzorak` (`id`, `naziv`, `slika`) VALUES
(2, 'Krug', 'img61275442ddc0c2.88605091.png'),
(3, 'Kocka', 'img6127545005bcd9.85316645.png'),
(4, 'Trokut', 'img61275462884345.25198230.png'),
(5, 'Srce', 'img612754740b4f08.86881848.png'),
(6, 'Zvijezda', 'img6127547dd60619.67795623.png'),
(8, 'Nota', 'img6128d58574f117.67085753.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `velicina`
--

CREATE TABLE `velicina` (
  `id` int(11) NOT NULL,
  `oznaka` varchar(10) COLLATE utf32_unicode_ci NOT NULL,
  `cijena` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `velicina`
--

INSERT INTO `velicina` (`id`, `oznaka`, `cijena`) VALUES
(1, 'S', 3),
(2, 'M', 5),
(7, 'L', 10);

-- --------------------------------------------------------

--
-- Table structure for table `web_stranica`
--

CREATE TABLE `web_stranica` (
  `id` int(11) NOT NULL,
  `naziv_stranice` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `sekcija` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `naslov` varchar(30) COLLATE utf32_unicode_ci NOT NULL,
  `ikona` varchar(20) COLLATE utf32_unicode_ci NOT NULL,
  `opis` longtext COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `web_stranica`
--

INSERT INTO `web_stranica` (`id`, `naziv_stranice`, `sekcija`, `naslov`, `ikona`, `opis`) VALUES
(1, 'index', 'o_nama', 'Moda', 'cut', 'Krojački studio se bavi kreiranjem gumica, mašnica i haljina za sve vrste prigoda. Sve je rađeno ručno od posebno izabranih materijala.'),
(2, 'index', 'o_nama', 'Naručivanje', 'phone', 'Vršimo izradu novih ali i popravak starih artikala. Za više informacija nas možete kontaktirati!'),
(3, 'index', 'o_nama', 'Dostava', 'shopping-cart', 'Nakon što je artikal završen, dostava se vrši slanjem putem brze pošte u sve gradove na području Bosne i Hercegovine.'),
(4, 'index', 'kontakt', 'Kontaktirajte nas', '', 'Odgovor očekujte u roku jedan sat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boja`
--
ALTER TABLE `boja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dozvola`
--
ALTER TABLE `dozvola`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uloga_id` (`uloga_id`,`poslovnica_id`,`mjesto_id`),
  ADD KEY `poslovnica_id` (`poslovnica_id`),
  ADD KEY `mjesto_id` (`mjesto_id`);

--
-- Indexes for table `materijal`
--
ALTER TABLE `materijal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mjesto`
--
ALTER TABLE `mjesto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uzorak_id` (`uzorak_id`),
  ADD KEY `boja_id` (`boja_id`),
  ADD KEY `materijal_id` (`materijal_id`),
  ADD KEY `velicina_id` (`velicina_id`),
  ADD KEY `korisnik_id` (`korisnik_id`);

--
-- Indexes for table `poslovnica`
--
ALTER TABLE `poslovnica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mjesto_id` (`mjesto_id`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uloga_dozvola`
--
ALTER TABLE `uloga_dozvola`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uloga_id` (`uloga_id`,`dozvola_id`),
  ADD KEY `dozvola_id` (`dozvola_id`);

--
-- Indexes for table `upiti`
--
ALTER TABLE `upiti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzorak`
--
ALTER TABLE `uzorak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `velicina`
--
ALTER TABLE `velicina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_stranica`
--
ALTER TABLE `web_stranica`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boja`
--
ALTER TABLE `boja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dozvola`
--
ALTER TABLE `dozvola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `materijal`
--
ALTER TABLE `materijal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mjesto`
--
ALTER TABLE `mjesto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `narudzba`
--
ALTER TABLE `narudzba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `poslovnica`
--
ALTER TABLE `poslovnica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uloga_dozvola`
--
ALTER TABLE `uloga_dozvola`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `upiti`
--
ALTER TABLE `upiti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uzorak`
--
ALTER TABLE `uzorak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `velicina`
--
ALTER TABLE `velicina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `web_stranica`
--
ALTER TABLE `web_stranica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`uloga_id`) REFERENCES `uloga` (`id`),
  ADD CONSTRAINT `korisnik_ibfk_2` FOREIGN KEY (`poslovnica_id`) REFERENCES `poslovnica` (`id`),
  ADD CONSTRAINT `korisnik_ibfk_3` FOREIGN KEY (`mjesto_id`) REFERENCES `mjesto` (`id`);

--
-- Constraints for table `narudzba`
--
ALTER TABLE `narudzba`
  ADD CONSTRAINT `narudzba_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `narudzba_ibfk_2` FOREIGN KEY (`uzorak_id`) REFERENCES `uzorak` (`id`),
  ADD CONSTRAINT `narudzba_ibfk_3` FOREIGN KEY (`boja_id`) REFERENCES `boja` (`id`),
  ADD CONSTRAINT `narudzba_ibfk_4` FOREIGN KEY (`velicina_id`) REFERENCES `velicina` (`id`),
  ADD CONSTRAINT `narudzba_ibfk_5` FOREIGN KEY (`materijal_id`) REFERENCES `materijal` (`id`);

--
-- Constraints for table `poslovnica`
--
ALTER TABLE `poslovnica`
  ADD CONSTRAINT `poslovnica_ibfk_1` FOREIGN KEY (`mjesto_id`) REFERENCES `mjesto` (`id`);

--
-- Constraints for table `uloga_dozvola`
--
ALTER TABLE `uloga_dozvola`
  ADD CONSTRAINT `uloga_dozvola_ibfk_1` FOREIGN KEY (`uloga_id`) REFERENCES `uloga` (`id`),
  ADD CONSTRAINT `uloga_dozvola_ibfk_2` FOREIGN KEY (`dozvola_id`) REFERENCES `dozvola` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
