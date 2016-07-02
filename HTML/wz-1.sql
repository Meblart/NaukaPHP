-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Maj 2016, 22:39
-- Wersja serwera: 10.1.13-MariaDB
-- Wersja PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `towary`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wz`
--

CREATE TABLE `wz` (
  `id` int(11) NOT NULL,
  `Nazwa towaru` text COLLATE utf8_polish_ci NOT NULL,
  `Długość` int(11) NOT NULL,
  `Szerokość` int(11) NOT NULL,
  `Wysokość` int(11) NOT NULL,
  `Kolor` text COLLATE utf8_polish_ci NOT NULL,
  `Cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wz`
--

INSERT INTO `wz` (`id`, `Nazwa towaru`, `Długość`, `Szerokość`, `Wysokość`, `Kolor`, `Cena`) VALUES
(1, 'Krzesło aluminiowe', 57, 57, 90, 'Szary', 460),
(2, 'Fotel technorattanowy', 66, 66, 75, 'Szary', 400),
(3, 'Fotel składany', 55, 58, 90, 'Czarny', 430),
(4, 'Fotel rozkładany', 61, 61, 100, 'Niebieski', 375),
(5, 'Krzesło bistro', 55, 65, 80, 'Krzemowe', 450),
(6, 'Okrągły stół', 107, 73, 73, 'Biały', 1900),
(7, 'Duży stół ogrodowy', 250, 1177, 40, 'Czarny', 3990),
(8, 'Stół ogrodowy aluminiowy', 200, 91, 74, 'Szary', 3300),
(9, 'Stół ogrodowy JAVA teak', 220, 100, 70, 'Krzemowy', 2790),
(10, 'Stół ogrodowy rozkładany', 154, 92, 63, 'Srebny', 1690),
(11, 'Huśtawka metalowa', 212, 125, 160, 'Czarny', 2270),
(12, 'Huśtawka RODZINNA', 250, 180, 150, 'Szary', 1800),
(13, 'Huśtawka PALMA (kosz na pałąku)', 80, 80, 100, 'Czarny', 2300),
(14, 'Huśtawka RODZINNA z drabinką', 300, 150, 100, 'Czerwony', 2110),
(15, 'Huśtawka RODOS (fotel bujany na pałąku)', 125, 111, 112, 'Pomaranczowy', 2190),
(16, 'Ławka ogrodowa CLASSIC (drewno-metal)', 120, 82, 62, 'Szary', 250),
(17, 'Ławka technorattanowa', 89, 114, 63, 'Szary', 2150),
(18, 'Ławka ażurowa ORLEANS', 162, 86, 62, 'Niebieski', 2600),
(19, 'Ławka GARDEN (sosna)', 95, 130, 85, 'Biały', 1595),
(20, 'Ławka ogrodowa (aluminium)', 102, 50, 91, 'Biały', 1950);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `wz`
--
ALTER TABLE `wz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `wz`
--
ALTER TABLE `wz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
