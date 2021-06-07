-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Cze 2020, 22:10
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(10) UNSIGNED NOT NULL,
  `imie_nazwisko` varchar(60) CHARACTER SET utf8 NOT NULL,
  `adres` varchar(80) CHARACTER SET utf8 NOT NULL,
  `miejscowosc` varchar(30) CHARACTER SET utf8 NOT NULL,
  `kod_poczt` varchar(10) CHARACTER SET utf8 NOT NULL,
  `kraj` varchar(60) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `klienci`
--

INSERT INTO `klienci` (`id_klienta`, `imie_nazwisko`, `adres`, `miejscowosc`, `kod_poczt`, `kraj`) VALUES
(1, 'a', 'a', 'a', 'a', 'a'),
(2, 'b', 'b', 'b', 'b', 'b'),
(3, 'test', '123 test', '12121', 'test', 'test'),
(4, '', '', '', '', ''),
(5, 'janek jaki', 'gdzies', 'jakies', '4300', 'ciemnogrod'),
(6, 'nowy', 'test', 'test', '2134', 'test'),
(7, 'janek jaki', 'test', 'jakies', '4300', 'ciemnogrod');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id_produktu` int(100) NOT NULL,
  `nazwa_produktu` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `producent` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `produkt_image` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `opis_produktu` text CHARACTER SET utf8 DEFAULT NULL,
  `cena_produktu` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id_produktu`, `nazwa_produktu`, `producent`, `produkt_image`, `opis_produktu`, `cena_produktu`) VALUES
(16, 'Dead by Daylight', 'Behaviour Interactive Inc.', 'dbd.jpg', 'Dead by Daylight is a multiplayer (4vs1) horror game where one player takes on the role of the savage Killer, and the other four players play as Survivors, trying to escape the Killer and avoid being caught and killed.', '71.00'),
(17, 'Sid Meier\'s Civilization VI', 'Firaxis Games', 'smc.jpeg', 'Civilization VI zapewnia całkiem nowe możliwości interakcji ze światem, poszerzania granic swojego imperium, rozwoju kultury i konkurowania z największymi przywódcami historii w walce o stworzenie cywilizacji, która wytrzyma próbę czasu.', '257.00'),
(18, 'SteelSeries Rival 600', 'SteelSeries', 'myszka1.webp', 'Zyskaj większą precyzję i większą swobodę ruchu z myszą SteelSeries Rival 600. Na pokładzie rewolucyjny, podwójny sensor optyczny TrueMove3+, łączący śledzenie 1:1 z czujnikiem odległości od podłoża. Rival 600 jest również jedyną myszą z imponującą liczbą 256 kombinacji ciężaru i równowagi. Sunie gładko, pracuje bezbłędnie, perfekcyjnie znosi najcięższe bitwy, dysponując duetem mechanicznych przełączników. Możesz ją też podświetlić konfigurowalną paletą RGB. A potem ruszać po zwycięstwo.', '299.00'),
(19, 'SteelSeries Apex 3', 'SteelSeries', 'klawiatura1.webp', 'Przygotuj się do gry w najlepszy możliwy sposób z klawiaturą SteelSeries Apex 3. Zaprojektowana dzięki połączeniu nowoczesnych technologii SteelSeries z bogatą gamą funkcji dla graczy dostarczy Ci niesamowitych wrażeń z każdej rozgrywki. Wyposażona w innowacyjne przełączniki membranowe eliminuje tarcie i gwarantuje niesamowitą trwałość. Apex 3 jest również odporna na zachlapanie. Natomiast elegancji dodaje 10-strefowe podświetlenie RGB.', '329.00'),
(20, 'Overwatch', 'Blizzard Entertainment', 'ov.jpg', 'Overwatch to gra na komputery PC z gatunku pierwszoosobowych strzelanin w trybie multiplayer, ktora została stworzona i wydana przez Blizzard Entertainment w 2016 roku. W grze zawodnicy przejmują kontrolę nad jedną z kilkunastu postaci, zwanych bohaterami lub herosami, i wykonują różne zadania w ramach rozgrywki opartej na grze zespołowej.', '155.00'),
(21, 'Minecraft', 'Mojang Studios', 'mc.jpg', 'Buduj wszystko, czego zapragniesz przy użyciu różnorodnych klocków wszelkiego rodzaju. Twórz nowoczesne domy i obiekty, twórz rozbudowane miasta, wioski, kopalnie, a nawet całkowicie nowe środowiska. Ścinaj drzewa, wydobywaj kamień, zbieraj trawę i walcz z niebezpiecznymi potworami. Rozbudowane mechaniki wytwarzania i nieograniczone zasoby umożliwiają ci zbudowanie niemal wszystkiego, co możesz sobie tylko wyobrazić. Poczuj satysfakcję jaką daje zbudowanie własnego miasteczka, zbuduj zagrody dla zwierząt, a nawet zautomatyzowaną farmę grzybów!', '100.00'),
(22, 'Razer Kraken Essential', 'Razer', 'sluchawki1.webp', 'Gamingowy zestaw słuchawkowy Razer Kraken Tournament Edition wyposażony w kontroler audio USB emituje dźwięk o jakości hi-fi i umożliwia pełną regulację dźwięku odpowiednio do preferencji użytkownika. Wbudowany konwerter sygnału cyfrowego na analogowy (DAC) generuje wyraźny dźwięk, a technologia THX Spatial Audio zapewnia dźwięk przestrzenny nowej generacji emitowany przez duże przetworniki o średnicy 50 mm.', '159.00'),
(23, 'Grand Theft Auto V', 'Rockstar Games', 'gta.jpg', 'Grand Theft Auto 5 to najnowsza odsłona słynnej gry akcji, której fabuła rozgrywa się w amerykańskim świecie gangsterów, złodziei i drobnych przestępców. To gra o największym budżecie w historii (jej produkcja i marketing pochłonęły 265 mln dolarów), która sześciokrotnie trafiła do księgi rekordów Guinnessa za wyniki sprzedaży. Za jej produkcję odpowiedzialna jest nowojorska firma Rockstar Games, która stworzyła także wszystkie poprzednie części serii GTA. Gra dostępna jest od 2015 roku na komputery PC.', '89.00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `haslo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `kontakt` varchar(255) CHARACTER SET utf8 NOT NULL,
  `miasto` varchar(255) CHARACTER SET utf8 NOT NULL,
  `adres_u` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `nazwa`, `email`, `haslo`, `kontakt`, `miasto`, `adres_u`) VALUES
(4, 'yugesh verma', 'yugeshverma32@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '6263056779', 'bhilai', '25 commercial complex, nehru nagar,east near vijya bank, bhilai C.G.'),
(5, 'yugesh', 'yugeshverma@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '9165063741', 'bhilai', 'bhilai'),
(6, 'admin', 'admin@admin.com', '8b283e8957f744ae5a1a6add05fc354f', '12312', 'adminowo', '34'),
(7, '', 'ziomek@ziomek.com', '74be16979710d4c4e7c6647856088456', '', '', ''),
(8, 'test', 'test@test.com', 'f2f0faea5cd0a68ef3cb446db9189820', '452734', 'testowo', '11');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id_zamowienia` int(10) UNSIGNED NOT NULL,
  `id_klienta` int(10) UNSIGNED NOT NULL,
  `do_zaplaty` decimal(6,2) DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `z_imie_nazwisko` char(60) CHARACTER SET utf8 NOT NULL,
  `z_adres` char(80) CHARACTER SET utf8 NOT NULL,
  `z_miejscowosc` char(30) CHARACTER SET utf8 NOT NULL,
  `z_kod_poczt` char(10) CHARACTER SET utf8 NOT NULL,
  `z_kraj` char(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id_zamowienia`, `id_klienta`, `do_zaplaty`, `data`, `z_imie_nazwisko`, `z_adres`, `z_miejscowosc`, `z_kod_poczt`, `z_kraj`) VALUES
(1, 1, '60.00', '2015-12-03 13:30:12', 'a', 'a', 'a', 'a', 'a'),
(2, 2, '60.00', '2015-12-03 13:31:12', 'b', 'b', 'b', 'b', 'b'),
(3, 3, '20.00', '2015-12-03 19:34:21', 'test', '123 test', '12121', 'test', 'test'),
(4, 1, '20.00', '2015-12-04 10:19:14', 'a', 'a', 'a', 'a', 'a'),
(5, 4, '80.00', '2020-05-28 14:39:17', '', '', '', '', ''),
(6, 4, '20.00', '2020-05-28 14:39:26', '', '', '', '', ''),
(7, 5, '40.00', '2020-06-01 10:22:36', 'janek jaki', 'gdzies', 'jakies', '4300', 'ciemnogrod'),
(8, 5, '20.00', '2020-06-01 10:26:17', 'janek jaki', 'gdzies', 'jakies', '4300', 'ciemnogrod'),
(9, 5, '20.00', '2020-06-01 10:48:08', 'janek jaki', 'gdzies', 'jakies', '4300', 'ciemnogrod'),
(10, 5, '20.00', '2020-06-01 10:49:08', 'janek jaki', 'gdzies', 'jakies', '4300', 'ciemnogrod'),
(11, 5, '20.00', '2020-06-01 14:44:58', 'janek jaki', 'gdzies', 'jakies', '4300', 'ciemnogrod'),
(12, 4, '48.00', '2020-06-01 18:40:57', '', '', '', '', ''),
(13, 5, '48.00', '2020-06-01 18:48:32', 'janek jaki', 'gdzies', 'jakies', '4300', 'ciemnogrod'),
(14, 5, '48.00', '2020-06-01 18:49:21', 'janek jaki', 'gdzies', 'jakies', '4300', 'ciemnogrod'),
(15, 4, '0.00', '2020-06-01 18:50:59', '', '', '', '', ''),
(16, 4, '0.00', '2020-06-01 18:54:28', '', '', '', '', ''),
(17, 6, '48.00', '2020-06-01 18:55:27', 'nowy', 'test', 'test', '2134', 'test'),
(18, 7, '753.00', '2020-06-01 19:52:19', 'janek jaki', 'test', 'jakies', '4300', 'ciemnogrod');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia_produkty`
--

CREATE TABLE `zamowienia_produkty` (
  `id_zamowienia` int(10) UNSIGNED NOT NULL,
  `id_produktu` varchar(20) CHARACTER SET utf8 NOT NULL,
  `cena` decimal(6,2) NOT NULL,
  `ilosc` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Zrzut danych tabeli `zamowienia_produkty`
--

INSERT INTO `zamowienia_produkty` (`id_zamowienia`, `id_produktu`, `cena`, `ilosc`) VALUES
(7, '15', '48.00', 1),
(5, '15', '48.00', 1),
(17, '15', '48.00', 1),
(18, '18', '299.00', 2),
(18, '20', '155.00', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id_produktu`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id_zamowienia`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id_produktu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id_zamowienia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
