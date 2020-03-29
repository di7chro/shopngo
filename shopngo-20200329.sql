-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 29 mars 2020 kl 19:43
-- Serverversion: 10.3.22-MariaDB-1
-- PHP-version: 7.3.15-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `shopngo`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `Cart`
--

CREATE TABLE `Cart` (
  `Cart_ID` int(255) NOT NULL,
  `Cart_Namn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `Cart`
--

INSERT INTO `Cart` (`Cart_ID`, `Cart_Namn`) VALUES
(1, 'Test fest'),
(2, 'Särten Festen'),
(3, 'Supé el Grande'),
(4, 'Fjällen!'),
(5, 'Släktkalas!');

-- --------------------------------------------------------

--
-- Tabellstruktur `CartItem`
--

CREATE TABLE `CartItem` (
  `Cart_ID` int(255) NOT NULL,
  `Item_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `CartItem`
--

INSERT INTO `CartItem` (`Cart_ID`, `Item_ID`) VALUES
(1, 1),
(1, 2),
(2, 2),
(2, 3),
(3, 5),
(4, 6),
(5, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Tabellstruktur `Item`
--

CREATE TABLE `Item` (
  `Namn` varchar(255) NOT NULL,
  `Item_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `Item`
--

INSERT INTO `Item` (`Namn`, `Item_ID`) VALUES
('Köttbullar', 1),
('Pasta', 2),
('Äpplen', 3),
('Bananer', 4),
('Gräddglass', 5),
('Smör', 6),
('Ost&Skink-Paj', 7),
('Björnbärs-sylt', 8);

-- --------------------------------------------------------

--
-- Tabellstruktur `User`
--

CREATE TABLE `User` (
  `User_ID` int(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `User`
--

INSERT INTO `User` (`User_ID`, `Username`, `Password`, `Color`) VALUES
(1, 'TestUser', 'test', 'Grey'),
(2, 'Crille', 'hemligt', 'Green'),
(3, 'Suzana', 'test2', 'Red'),
(4, 'Emma', 'test', 'Yellow'),
(5, 'BrumBrum', 'test', 'LightBlue');

-- --------------------------------------------------------

--
-- Tabellstruktur `UserCarts`
--

CREATE TABLE `UserCarts` (
  `User_ID` int(11) NOT NULL,
  `Cart_ID` int(11) NOT NULL,
  `Roll` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `UserCarts`
--

INSERT INTO `UserCarts` (`User_ID`, `Cart_ID`, `Roll`) VALUES
(1, 1, 'Ägare'),
(2, 2, 'Ägare'),
(2, 3, 'Guest'),
(3, 3, 'Ägare'),
(3, 5, 'Guest'),
(4, 4, 'Ägare'),
(5, 1, 'Guest'),
(5, 5, 'Ägare');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`Cart_ID`);

--
-- Index för tabell `CartItem`
--
ALTER TABLE `CartItem`
  ADD PRIMARY KEY (`Cart_ID`,`Item_ID`),
  ADD KEY `Item_ID` (`Item_ID`);

--
-- Index för tabell `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`Item_ID`);

--
-- Index för tabell `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_ID`);

--
-- Index för tabell `UserCarts`
--
ALTER TABLE `UserCarts`
  ADD PRIMARY KEY (`User_ID`,`Cart_ID`),
  ADD KEY `Cart_ID` (`Cart_ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `Cart`
--
ALTER TABLE `Cart`
  MODIFY `Cart_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT för tabell `Item`
--
ALTER TABLE `Item`
  MODIFY `Item_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT för tabell `User`
--
ALTER TABLE `User`
  MODIFY `User_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `CartItem`
--
ALTER TABLE `CartItem`
  ADD CONSTRAINT `CartItem_ibfk_1` FOREIGN KEY (`Cart_ID`) REFERENCES `Cart` (`Cart_ID`),
  ADD CONSTRAINT `CartItem_ibfk_2` FOREIGN KEY (`Item_ID`) REFERENCES `Item` (`Item_ID`);

--
-- Restriktioner för tabell `UserCarts`
--
ALTER TABLE `UserCarts`
  ADD CONSTRAINT `UserCarts_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `User` (`User_ID`),
  ADD CONSTRAINT `UserCarts_ibfk_2` FOREIGN KEY (`Cart_ID`) REFERENCES `Cart` (`Cart_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
