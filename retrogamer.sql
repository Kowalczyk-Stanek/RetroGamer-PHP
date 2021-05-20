-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 20 Maj 2021, 15:43
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `retrogamer`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `details` varchar(250) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `tag`, `code`, `price`, `image`) VALUES
(1, 'Amiga 600', 'wyprodukowany w 1992 r. fizycznie najmniejszy model Amigi.', 'konsola', 'AM600', 40.00, 'IMG/AMIGA600.JPG'),
(3, 'Wii Fit', 'Wii Fit to wydana przez Nintendo produkcja będąca połączeniem gry z programem służącym do poprawiania kondycji fizycznej.', 'gra', 'WIIFIT', 50.00, 'IMG/WIIFIT.JPG'),
(4, 'Amiga CD32', 'Pierwsza 32-bitowa konsola z CD-ROMem. Została zaprezentowana po raz pierwszy 16 lipca 1993 w Science Museum w Londynie.', 'konsola', 'ACD32', 500.00, 'IMG/AMIGACD32.JPG'),
(5, 'Atari 2600', 'Konsola produkowana od 1977roku. Jedna z pierwszych konsoli, które używały wymiennych modułów z grami, tzw. kartridży', 'konsola', 'A2600', 100.00, 'IMG/ATARI2600.JPG'),
(6, 'Dyskietka 8 cali', 'Dysk wymienny, przenośny nośnik magnetyczny o niewielkiej pojemności, umożliwiający zarówno odczyt, jak i zapis danych.', 'akcesorium', 'D5', 10.00, 'IMG/D525.JPG'),
(7, 'Super Mario 64', 'Gra platformowa stworzona i wydana przez Nintendo w 1996 roku na konsolę Nintendo 64.', 'gra', 'SM64', 40.00, 'IMG/SM64.JPG'),
(8, 'Pokemon Yellow', 'Gra komputerowa z gatunku cRPG stworzona na konsolę Game Boy przez Game Freak i wydana przez Nintendo w 1998 roku.', 'gra', 'PY', 15.00, 'IMG/POKEMONY.JPG'),
(9, 'Commodore 64', 'Komputer domowy z lat 80. C64 był dotychczas najlepiej sprzedającym się komputerem w historii informatyki', 'konsola', 'C64', 200.00, 'IMG/COMMODORE64.JPG'),
(10, 'Gameboy Advanced', 'Przenośna konsola do gier wyprodukowana przez firmę Nintendo. Jest następczynią popularnej konsoli Game Boy Color.', 'konsola', 'GA', 50.00, 'IMG/GAMEBOYADVANCED.JPG'),
(11, 'Gameboy Advanced SP', 'Przenośna konsola gier wideo wydana w 2003 roku przez Nintendo, będąca specjalną wersją konsoli Game Boy Advance.', 'konsola', 'GASP', 60.00, 'IMG/GAMEBOYADVANCEDSP.JPG'),
(12, 'Gameboy Pocket', 'Game Boy Pocket z 1996 roku, poprawiona wersją Game Boya. Zmniejszona obudowa i zapotrzebowanie na prąd', 'konsola', 'GP', 50.00, 'IMG/GAMEBOYPOCKET.JPG'),
(13, 'Pokemon Colosseum', 'Japońska gra fabularna z serii Pokémon stworzona przez Genius Sonority i wydana przez The Pokémon Company i Nintendo.', 'gra', 'PC', 20.00, 'IMG/PC.JPG'),
(14, 'Super Mario Bros', 'Komputerowa gra platformowa wyprodukowana w 1985 roku przez Nintendo.', 'gra', 'SMB', 50.00, 'IMG/SMB.JPG'),
(15, 'Pad Nintendo 64', 'Kontroler do konsoli Nintendo 64', 'akcesorium', 'P64', 100.00, 'IMG/P64.JPG'),
(16, 'Pad SNES', 'Kontroler do konsoli SNES', 'akcesorium', 'PSNES', 100.00, 'IMG/PSNES.JPG'),
(17, 'Pad Gamecube', 'Kontroler do konsoli Nintendo Gamecube', 'akcesorium', 'PGC', 100.00, 'IMG/PGC.JPG'),
(18, 'Sega Rally', 'Gra oferuje wybór samochodów z napędem na dwa i cztery koła, oraz samochody klasyczne z lat 80 i 90', 'gra', 'SR', 30.00, 'IMG/SR.JPG'),
(19, 'NES', 'Konsola gier komputerowych trzeciej generacji wyprodukowana przez japońskie przedsiębiorstwo Nintendo.', 'konsola', 'NES', 200.00, 'IMG/NES.JPG'),
(20, 'Nintendo 64', 'Konsola stworzona przez firmę Nintendo. Premiera konsoli w Japonii miała miejsce 23 czerwca 1996 roku', 'konsola', 'N64', 200.00, 'IMG/NINTENDO64.JPG'),
(21, 'Nintendo DSI', 'trzecia wersja konsoli Nintendo DS. Po raz pierwszy została zaprezentowana 2 października 2008 roku', 'konsola', 'NDSI', 200.00, 'IMG/NINTENDODSI.JPG'),
(22, 'Nintendo Gamecube', 'Konsola szóstej generacji, wydana w 2001 przez Nintendo. Konsola, zgodnie z nazwą, ma kształt kostki', 'konsola', 'NGC', 300.00, 'IMG/NINTENDOGAMECUBE.JPG'),
(23, 'Nintendo Switch', 'Konsola gier wideo firmy Nintendo wydana 3 marca 2017 roku', 'konsola', 'NS', 1200.00, 'IMG/NINTENDOSWITCH.JPG'),
(24, 'Nintendo Wii', 'Konsola gier wideo zaprojektowana i produkowana przez japońską firmę Nintendo. Początkowo znana pod nazwą Revolution', 'konsola', 'NWII', 200.00, 'IMG/NINTENDOWII.JPG'),
(25, 'Pad Amiga CD32', 'Kontroler do konsoli Amiga CD32', 'akcesorium', 'PACD32', 70.00, 'IMG/PA32.JPG'),
(26, 'Pad Nintendo Wii', 'Kontroler do konsoli nintendo WII', 'akcesorium', 'PNWI', 200.00, 'IMG/PWII.JPG'),
(27, 'Pad NES', 'Kontroler do konsoli NES', 'akcesorium', 'PNES', 50.00, 'IMG/PNES.JPG'),
(28, 'Sonic the Hedgehog', 'pierwsza gra komputerowa z serii Sonic the Hedgehog, która ukazała się na konsolę Sega Mega Drive w 1991 roku', 'gra', 'Son', 10.00, 'IMG/SONIC.JPG'),
(29, 'Playstation 1', '32-bitowa konsola do gier wideo, wyprodukowana w Japonii przez firmę Sony Computer Entertainment', 'konsola', 'PSX', 100.00, 'IMG/PLAYSTATION1.JPG'),
(30, 'Playstation 2', 'Konsola gier wideo produkcji Sony Computer Entertainment, następca PlayStation', 'konsola', 'PS2', 200.00, 'IMG/PLAYSTATION2.JPG'),
(31, 'Playstation 3', 'Konsola gier wideo wyprodukowana przez Sony Computer Entertainment. ', 'konsola', 'PS3', 800.00, 'IMG/PLAYSTATION3.JPG'),
(32, 'Sega Mastersystem', '8-bitowa konsola na kartridże produkowana przez japońską firmę Sega.', 'konsola', 'SMS', 150.00, 'IMG/SEGAMASTERSYSTEM.JPG'),
(33, 'Sega Megadrive', '16-bitowa konsola wydana przez Segę w 1988 roku w Japonii i 1990 w Europie. W Ameryce Północnej sprzedawana jako Sega Genesis', 'konsola', 'SMD', 200.00, 'IMG/SEGAMEGADRIVE.JPG'),
(34, 'Sega Saturn', '32-bitowa konsola firmy Sega wydana 22 listopada 1994. W dniu premiery w Japonii sprzedano ok. 170 000 egzemplarzy.', 'konsola', 'SS', 500.00, 'IMG/SEGASATURN.JPG'),
(35, 'Pad XBOX', 'Kontroler do konsoli XBOX', 'akcesorium', 'PXB', 100.00, 'IMG/PXBOX.JPG'),
(36, 'Pad Sega Saturn', 'Kontroler do konsoli Sega Saturn', 'akcesorium', 'PSS', 100.00, 'IMG/PSS.JPG'),
(37, 'SNES', '16-bitowa konsola do gier, która osiągnęła wielki sukces w krajach zachodniej Europy, USA oraz w Japonii.', 'konsola', 'SNES', 200.00, 'IMG/SNES.JPG'),
(38, 'XBOX', 'Konsola gier wideo wyprodukowana przez amerykańskie przedsiębiorstwo Microsoft.', 'konsola', 'XB', 300.00, 'IMG/XBOX.JPG'),
(39, 'XBOX 360', 'Konsola gier wideo wyprodukowana przez firmę Microsoft. Została opracowana we współpracy z IBM, ATI i NEC. ', 'konsola', 'X360', 800.00, 'IMG/XBOX360.JPG'),
(40, 'Pad XBOX 360', 'Kontroler do konsoli XBOX 360', 'akcesorium', 'PX360', 80.00, 'IMG/PX360.JPG'),
(41, 'Pokemon Sapphire', 'Wydane przez Nintendo na konsolę Game Boy Advance. Sprzedano ponad 13 milionów kopii tych gier.', 'gra', 'PS', 20.00, 'IMG/PS.JPG'),
(42, 'Chequered Flag ZX Spectrum', 'Gra wyścigowa na komputer ZX Spectrum', 'gra', 'ZX', 10.00, 'IMG/ZX.JPG');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie`
--

CREATE TABLE `zamowienie` (
  `id_zam` int(11) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `ulica` varchar(50) NOT NULL,
  `numer_domu` varchar(50) NOT NULL,
  `kod_pocztowy` varchar(10) NOT NULL,
  `miejscowosc` varchar(50) NOT NULL,
  `numer_telefonu` int(11) NOT NULL,
  `dostawa` varchar(50) NOT NULL,
  `newsletter` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeksy dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`id_zam`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `id_zam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
