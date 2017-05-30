-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 30. maj 2017 ob 21.26
-- Različica strežnika: 5.7.14
-- Različica PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `testing`
--

-- --------------------------------------------------------

--
-- Struktura tabele `aktivnost`
--

DROP TABLE IF EXISTS `aktivnost`;
CREATE TABLE `aktivnost` (
  `aid` int(10) UNSIGNED NOT NULL,
  `sifra_storitve` int(11) NOT NULL,
  `ime_storitve` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifra_aktivnosti` int(11) NOT NULL,
  `ime_aktivnosti` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `aktivnost`
--

INSERT INTO `aktivnost` (`aid`, `sifra_storitve`, `ime_storitve`, `sifra_aktivnosti`, `ime_aktivnosti`) VALUES
(1, 10, 'Obisk nosečnice', 10, 'Seznanitev nosečnice o normalnem poteku nosečnosti in o spremembah na telesu.'),
(2, 10, 'Obisk nosečnice', 20, 'Povabilo v šolo za starše.'),
(3, 10, 'Obisk nosečnice', 30, 'Seznanitev o rednih ginekoloških pregledih.'),
(4, 10, 'Obisk nosečnice', 40, 'Seznanitev z bližajočim se porodom in pravočasnim odhodom v porodnišnico.'),
(5, 10, 'Obisk nosečnice', 50, 'Pogovor in vključevanje partnerja v nosečnost in porod ter po prihodu domov.'),
(6, 10, 'Obisk nosečnice', 60, 'Svetovanje o pripomočkih, ki jih bo potrebovala v porodnišnici.'),
(7, 10, 'Obisk nosečnice', 70, 'Seznanitev nosečnice o štetju in beleženju plodovih gibov.'),
(8, 10, 'Obisk nosečnice', 80, 'Svetovanje glede opreme za novorojenca in primerno ležišče.'),
(9, 10, 'Obisk nosečnice', 90, 'Svetovanje o pravilni prehrani, ustrezni izbiri obleke in obutve.'),
(10, 10, 'Obisk nosečnice', 100, 'Svetovanje o primernem režim življenja, telesne vaje, gibanje na svežem zraku.'),
(11, 10, 'Obisk nosečnice', 110, 'Odsvetovanje razvad kot so uživanje alkohola, kajenje, uživanje zdravil in drog.'),
(12, 10, 'Obisk nosečnice', 120, 'Seznanitev nosočnice z nevšečnostmi in svetovanje.'),
(13, 10, 'Obisk nosečnice', 130, 'Seznanitev nosečnice s pravicami do starševskega dopusta.'),
(14, 10, 'Obisk nosečnice', 140, 'Pričakovan datum poroda.'),
(15, 10, 'Obisk nosečnice', 150, 'Anamneza: počutje, telesni znaki nosečnosti.'),
(16, 10, 'Obisk nosečnice', 160, 'Družinska anamneza.'),
(17, 10, 'Obisk nosečnice', 170, 'Izražanje čustev.'),
(18, 10, 'Obisk nosečnice', 180, 'Fizična obremenjenost.'),
(19, 10, 'Obisk nosečnice', 190, 'Krvni pritisk: sistolični, diastolični.'),
(20, 10, 'Obisk nosečnice', 200, 'Srčni utrip.'),
(21, 10, 'Obisk nosečnice', 210, 'Dihanje.'),
(22, 10, 'Obisk nosečnice', 220, 'Telesna temperatura.'),
(23, 10, 'Obisk nosečnice', 230, 'Telesna teža pred nosečnostjo.'),
(24, 10, 'Obisk nosečnice', 240, 'Trenutna telesna teža.'),
(25, 20, 'Obisk otročnice', 10, 'Pregled materinske knjižice in odpustnice iz porodnišnice.'),
(26, 20, 'Obisk otročnice', 20, 'Kontrola vitalnih funkcij.'),
(27, 20, 'Obisk otročnice', 30, 'Opazovanje čišče.'),
(28, 20, 'Obisk otročnice', 40, 'Nadzor nad izločanjem blata in urina.'),
(29, 20, 'Obisk otročnice', 50, 'Zdravstveno vzgojno delo glede pravilnega rokovanja z novorojenčkom.'),
(30, 20, 'Obisk otročnice', 60, 'Motivacija za dojenje. Nadzor in pomoč pri dojenju.'),
(31, 20, 'Obisk otročnice', 70, 'Svetovanje o čustveni podpori s strani partnerja.'),
(32, 20, 'Obisk otročnice', 80, 'Seznanitev o otrokovih potrebah po toplini, nežnosti in varnosti.'),
(33, 20, 'Obisk otročnice', 90, 'Svetovanje o spalnih potrebah otročnice, pravilni negi in higienskem režimu.'),
(34, 20, 'Obisk otročnice', 100, 'Svetovanje o pravilni prehrani, pitju ustreznih količin tekočin.'),
(35, 20, 'Obisk otročnice', 110, 'Poučitev o poporodni telovadbi.'),
(36, 20, 'Obisk otročnice', 120, 'Sezananitev z nekaterimi obolenji.'),
(37, 20, 'Obisk otročnice', 130, 'Napotitev na poporodni pregled.'),
(38, 20, 'Obisk otročnice', 140, 'Seznanitev z metodami zaščite pred nezaželjno nosečnostjo.'),
(39, 20, 'Obisk otročnice', 150, 'Svetovanje o normalnem delu, življenju in spolnih odnosih.'),
(40, 20, 'Obisk otročnice', 160, 'Krvni pritisk.'),
(41, 20, 'Obisk otročnice', 170, 'Srčni utrip.'),
(42, 20, 'Obisk otročnice', 180, 'Dihanje.'),
(43, 20, 'Obisk otročnice', 190, 'Telesna temperatura.'),
(44, 20, 'Obisk otročnice', 200, 'Trenutna telesna teža.'),
(45, 20, 'Obisk otročnice', 210, 'Anamneza: počutje, telesni znaki nosečnosti.'),
(46, 20, 'Obisk otročnice', 220, 'Družinska anamneza.'),
(47, 20, 'Obisk otročnice', 230, 'Izražanje čustev.'),
(48, 20, 'Obisk otročnice', 240, 'Fizična obremenjenost.'),
(49, 30, 'Obisk novorojenčka', 10, 'Prikaz nege dojenčka.'),
(50, 30, 'Obisk novorojenčka', 20, 'Nega popokovne rane.'),
(51, 30, 'Obisk novorojenčka', 30, 'Nudenje pomoči pri dojenju in seznanitev s tehnikami dojenja.'),
(52, 30, 'Obisk novorojenčka', 40, 'Ureditev ležišča.'),
(53, 30, 'Obisk novorojenčka', 50, 'Svetovanje o povijanju, oblačenju, slačenju.'),
(54, 30, 'Obisk novorojenčka', 60, 'Trenutna telesna teža.'),
(55, 30, 'Obisk novorojenčka', 70, 'Trenutna telesna višina.'),
(56, 30, 'Obisk novorojenčka', 80, 'Dojenje.'),
(57, 30, 'Obisk novorojenčka', 90, 'Dodajanje adaptiranega mleka.'),
(58, 30, 'Obisk novorojenčka', 100, 'Izločanje in odvajanje.'),
(59, 30, 'Obisk novorojenčka', 110, 'Ritem spanja.'),
(60, 30, 'Obisk novorojenčka', 120, 'Povišanje bilirubina (zlatenica).'),
(61, 30, 'Obisk novorojenčka', 130, 'Kolki.'),
(62, 30, 'Obisk novorojenčka', 130, 'Posebnosti.'),
(63, 40, 'Preventiva starostnika', 10, 'Anamneza.'),
(64, 40, 'Preventiva starostnika', 20, 'Družinska anamneza.'),
(65, 40, 'Preventiva starostnika', 30, 'Krvni pritisk: sistolični, diastolični.'),
(66, 40, 'Preventiva starostnika', 40, 'Srčni utrip.'),
(67, 40, 'Preventiva starostnika', 50, 'Dihanje.'),
(68, 40, 'Preventiva starostnika', 60, 'Telesna temperatura.'),
(69, 40, 'Preventiva starostnika', 70, 'Telesna teža.'),
(70, 40, 'Preventiva starostnika', 80, 'Osebna higiena.'),
(71, 40, 'Preventiva starostnika', 90, 'Prehranjevanje in pitje.'),
(72, 40, 'Preventiva starostnika', 100, 'Izločanje in odvajanje.'),
(73, 40, 'Preventiva starostnika', 110, 'Gibanje.'),
(74, 40, 'Preventiva starostnika', 120, 'Čutila in občutki.'),
(75, 40, 'Preventiva starostnika', 130, 'Spanje in počitek.'),
(76, 40, 'Preventiva starostnika', 140, 'Duševno stanje: izražanje čustev in potreb, komunikacija.'),
(77, 40, 'Preventiva starostnika', 150, 'Stanje neodvisnosti.'),
(78, 40, 'Preventiva starostnika', 160, 'Pregled predpisanih terapij.'),
(79, 40, 'Preventiva starostnika', 170, 'Pogovor, nasvet in vzpodbuda.'),
(80, 50, 'Aplikacija injekcij', 10, 'Aplikacija injekcije.'),
(81, 50, 'Aplikacija injekcij', 20, 'Pogovor, nasvet in vzpodbuda.'),
(82, 60, 'Odvzem krvi', 10, 'Odvzem krvi.'),
(83, 60, 'Odvzem krvi', 20, 'Pogovor, nasvet in vzpodbuda.'),
(84, 70, 'Kontrola zdravstvenega stanja', 10, 'Anamneza.'),
(85, 70, 'Kontrola zdravstvenega stanja', 20, 'Krvni pritisk: sistolični, diastolični.'),
(86, 70, 'Kontrola zdravstvenega stanja', 30, 'Srčni utrip.'),
(87, 70, 'Kontrola zdravstvenega stanja', 40, 'Dihanje.'),
(88, 70, 'Kontrola zdravstvenega stanja', 50, 'Telesna temperatura.'),
(89, 70, 'Kontrola zdravstvenega stanja', 60, 'Krvni sladkor.'),
(90, 70, 'Kontrola zdravstvenega stanja', 70, 'Oksigenacija SpO2.'),
(91, 70, 'Kontrola zdravstvenega stanja', 80, 'Upoštevanje terapije.'),
(92, 70, 'Kontrola zdravstvenega stanja', 90, 'Pregled terapije.'),
(93, 70, 'Kontrola zdravstvenega stanja', 100, 'Navodila za terapijo do naslednjega obiska.'),
(94, 70, 'Kontrola zdravstvenega stanja', 110, 'Pogovor, nasvet in vzpodbuda.');

-- --------------------------------------------------------

--
-- Struktura tabele `bolezen`
--

DROP TABLE IF EXISTS `bolezen`;
CREATE TABLE `bolezen` (
  `sifra_bolezen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ime` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `izbrisan` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `bolezen`
--

INSERT INTO `bolezen` (`sifra_bolezen`, `ime`, `izbrisan`) VALUES
('A00', 'Kolera', 0),
('A17', 'Tuberkuloza živčevja', 0),
('A20', 'Kuga', 0),
('A30', 'Gobavost', 0),
('A37', 'Oslovski kašelj', 0),
('E28', 'Disfunkcija jajčnika', 0),
('E30.0', 'Zapoznela puberteta', 0),
('E66', 'Debelost', 0),
('H40', 'Glavkom (zelena mrena)', 0),
('H53.8', 'Nočna slepota', 0),
('L68', 'Hipertrihoza (prekomerna poraščenost)', 0),
('N92', 'Premočna, prepogosta in neredna menstruacija', 0),
('S40', 'Površinska poškodba rame in nadlakti', 0),
('S43.0', 'Izpah ramenskega sklepa', 0);

-- --------------------------------------------------------

--
-- Struktura tabele `delavec`
--

DROP TABLE IF EXISTS `delavec`;
CREATE TABLE `delavec` (
  `sifra_delavec` int(11) NOT NULL,
  `sifra_zd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_uporabnik` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `delavec`
--

INSERT INTO `delavec` (`sifra_delavec`, `sifra_zd`, `id_uporabnik`) VALUES
(33124, '05900', 2),
(53424, '06501', 3),
(55641, '06501', 4);

-- --------------------------------------------------------

--
-- Struktura tabele `delovni_nalog`
--

DROP TABLE IF EXISTS `delovni_nalog`;
CREATE TABLE `delovni_nalog` (
  `sifra_dn` int(10) UNSIGNED NOT NULL,
  `sifra_delavec` int(11) NOT NULL,
  `sifra_bolezen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifra_vrsta_obisk` int(11) NOT NULL,
  `stevilo_epruvet_RdMoRuZe` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datum_prvega_obiska` date NOT NULL,
  `datum_koncnega_obiska` date DEFAULT NULL,
  `datum_obvezen` tinyint(1) NOT NULL,
  `stevilo_obiskov` int(11) NOT NULL,
  `casovni_interval` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `delovni_nalog`
--

INSERT INTO `delovni_nalog` (`sifra_dn`, `sifra_delavec`, `sifra_bolezen`, `sifra_vrsta_obisk`, `stevilo_epruvet_RdMoRuZe`, `datum_prvega_obiska`, `datum_koncnega_obiska`, `datum_obvezen`, `stevilo_obiskov`, `casovni_interval`, `created_at`, `updated_at`) VALUES
(1, 33124, 'L68', 10, '0 0 0 0', '2017-06-08', NULL, 0, 4, 2, '2017-05-30 15:43:07', '2017-05-30 15:43:07'),
(2, 33124, 'H40', 20, '0 0 0 0', '2017-06-08', NULL, 1, 2, 1, '2017-05-30 15:43:29', '2017-05-30 15:43:29'),
(3, 33124, 'A37', 40, '0 0 0 0', '2017-06-10', NULL, 0, 3, 3, '2017-05-30 15:43:50', '2017-05-30 15:43:50'),
(4, 33124, 'A17', 50, '0 0 0 0', '2017-06-10', NULL, 1, 3, 2, '2017-05-30 15:57:49', '2017-05-30 15:57:49'),
(5, 33124, 'E66', 60, '2 1 1 2', '2017-06-12', NULL, 0, 3, 3, '2017-05-30 15:59:02', '2017-05-30 15:59:02'),
(6, 33124, 'A37', 70, '0 0 0 0', '2017-06-20', NULL, 1, 1, 1, '2017-05-30 15:59:57', '2017-05-30 15:59:57'),
(7, 53424, 'A17', 10, '0 0 0 0', '2017-06-26', NULL, 1, 2, 4, '2017-05-30 16:06:40', '2017-05-30 16:06:40'),
(8, 53424, 'S43.0', 20, '0 0 0 0', '2017-06-27', NULL, 0, 2, 3, '2017-05-30 16:07:10', '2017-05-30 16:07:10'),
(9, 53424, 'H53.8', 40, '0 0 0 0', '2017-07-04', NULL, 1, 2, 7, '2017-05-30 16:07:56', '2017-05-30 16:07:56'),
(10, 53424, 'A00', 50, '0 0 0 0', '2017-06-16', NULL, 0, 3, 4, '2017-05-30 16:08:40', '2017-05-30 16:08:40'),
(11, 53424, 'A00', 60, '1 2 0 0', '2017-07-13', NULL, 1, 1, 1, '2017-05-30 16:09:02', '2017-05-30 16:09:02'),
(12, 53424, 'H40', 70, '0 0 0 0', '2017-06-12', NULL, 1, 1, 1, '2017-05-30 16:10:29', '2017-05-30 16:10:29'),
(13, 33124, 'A37', 20, '0 0 0 0', '2017-06-01', NULL, 0, 3, 1, '2017-05-30 16:20:47', '2017-05-30 16:20:47'),
(14, 33124, 'A00', 60, '2 0 0 2', '2017-06-01', NULL, 0, 3, 3, '2017-05-30 16:23:43', '2017-05-30 16:23:43'),
(15, 53424, 'A37', 50, '0 0 0 0', '2017-06-05', NULL, 1, 3, 2, '2017-05-30 16:25:26', '2017-05-30 16:25:26'),
(16, 33124, 'A37', 10, '0 0 0 0', '2017-06-01', NULL, 0, 4, 1, '2017-05-30 17:55:24', '2017-05-30 17:55:24'),
(17, 53424, 'A37', 40, '0 0 0 0', '2017-06-02', NULL, 1, 1, 1, '2017-05-30 18:06:39', '2017-05-30 18:06:39'),
(18, 53424, 'A37', 50, '0 0 0 0', '2017-06-03', NULL, 0, 1, 1, '2017-05-30 18:07:05', '2017-05-30 18:07:05'),
(19, 53424, 'A00', 60, '2 0 0 0', '2017-05-31', NULL, 0, 1, 1, '2017-05-30 18:07:29', '2017-05-30 18:07:29');

-- --------------------------------------------------------

--
-- Struktura tabele `delovni_nalog_material`
--

DROP TABLE IF EXISTS `delovni_nalog_material`;
CREATE TABLE `delovni_nalog_material` (
  `id` int(10) UNSIGNED NOT NULL,
  `sifra_dn` int(11) NOT NULL,
  `sifra_material` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `delovni_nalog_pacient`
--

DROP TABLE IF EXISTS `delovni_nalog_pacient`;
CREATE TABLE `delovni_nalog_pacient` (
  `id` int(10) UNSIGNED NOT NULL,
  `pacient_stevilka_KZZ` int(11) NOT NULL,
  `delovni_nalog_sifra_dn` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `delovni_nalog_pacient`
--

INSERT INTO `delovni_nalog_pacient` (`id`, `pacient_stevilka_KZZ`, `delovni_nalog_sifra_dn`) VALUES
(1, 1511111111, 1),
(2, 1234567890, 2),
(3, 1211111111, 2),
(4, 1122222222, 3),
(5, 1311111111, 4),
(6, 1411111111, 5),
(7, 1122222222, 6),
(8, 1511111111, 7),
(9, 1234567890, 8),
(10, 1211111111, 8),
(11, 1122222222, 9),
(12, 1311111111, 10),
(13, 1234567890, 11),
(14, 1511111111, 12),
(15, 1234567890, 13),
(16, 1211111111, 13),
(17, 1411111111, 14),
(18, 1511111111, 15),
(19, 1511111111, 16),
(20, 1311111111, 17),
(21, 1311111111, 18),
(22, 1311111111, 19);

-- --------------------------------------------------------

--
-- Struktura tabele `delovni_nalog_zdravilo`
--

DROP TABLE IF EXISTS `delovni_nalog_zdravilo`;
CREATE TABLE `delovni_nalog_zdravilo` (
  `id` int(10) UNSIGNED NOT NULL,
  `delovni_nalog_sifra_dn` int(11) NOT NULL,
  `zdravilo_sifra_zdravilo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `delovni_nalog_zdravilo`
--

INSERT INTO `delovni_nalog_zdravilo` (`id`, `delovni_nalog_sifra_dn`, `zdravilo_sifra_zdravilo`) VALUES
(1, 4, 'L04AA31'),
(2, 4, 'B01AC06'),
(3, 4, 'C09CA07'),
(4, 10, 'C10AA05'),
(5, 10, 'L04AA31'),
(6, 10, 'A11HA02'),
(7, 15, 'C10AA07'),
(8, 15, 'B01AC06'),
(9, 18, 'B01AC06');

-- --------------------------------------------------------

--
-- Struktura tabele `izvajalec_zd`
--

DROP TABLE IF EXISTS `izvajalec_zd`;
CREATE TABLE `izvajalec_zd` (
  `sifra_zd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postna_stevilka` int(11) NOT NULL,
  `naziv` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `naslov` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `izbrisan` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `izvajalec_zd`
--

INSERT INTO `izvajalec_zd` (`sifra_zd`, `postna_stevilka`, `naziv`, `naslov`, `izbrisan`) VALUES
('05900', 1000, 'ZDŠ LJUBLJANA', 'AŠKRČEVA CESTA 4', 0),
('06501', 1000, 'ŽZD LJUBLJANA', 'CELOVŠKA CESTA 4', 0),
('20662', 2000, 'MARIBORSKE LEKARNE MARIBOR', 'PE LEKARNA BETNAVA', 0),
('08664', 9000, 'SB M. SOBOTA', 'RAKIČAN, UL DR. VRBNJAKA 6', 0),
('12521', 3000, 'ZPIZ', 'GREGORČIČEVA ULICA 5 A', 0),
('33057', 5000, 'MEDIGO D.O.O. NOVA GORICA', 'ULICA GRADNIKOVE BRIGADE 53', 0),
('55218', 6000, 'ZAVOD FURLAN LJUBLJANA', 'OBRTNIŠKA ULICA 30', 0),
('09301', 8000, 'TERME KRKA, D.O.O., NOVO MESTO', 'LJUBLJANSKA CESTA 26', 0),
('17098', 9000, 'ZAVOD ZA ZDRAVSTVENO ZAVAROVANJE SLOVENIJE OBMOČNA ENOTA', 'SLOVENSKA ULICA 48', 0),
('05600', 1000, 'ZD LJUBLJANA - VIČ - RUDNIK', 'ŠESTOVA ULICA 10', 0);

-- --------------------------------------------------------

--
-- Struktura tabele `kontaktna_oseba`
--

DROP TABLE IF EXISTS `kontaktna_oseba`;
CREATE TABLE `kontaktna_oseba` (
  `id_kontakt` int(10) UNSIGNED NOT NULL,
  `id_uporabnik` int(11) NOT NULL,
  `sifra_razmerje` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ime` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priimek` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_stevilka` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postna_stevilka` int(11) NOT NULL,
  `ulica` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kraj` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `material`
--

DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `sifra_material` int(11) NOT NULL,
  `ime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `material`
--

INSERT INTO `material` (`sifra_material`, `ime`) VALUES
(1, 'Rdeča epruveta'),
(2, 'Modra epruveta'),
(3, 'Rumena epruveta'),
(4, 'Zelena epruveta'),
(5, 'Injekcija'),
(6, 'Elastični povoj'),
(7, 'Fiziološka raztopina'),
(8, 'Sterilne rokavice');

-- --------------------------------------------------------

--
-- Struktura tabele `meritve`
--

DROP TABLE IF EXISTS `meritve`;
CREATE TABLE `meritve` (
  `sifra_meritev` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `izbrisan` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `meritve`
--

INSERT INTO `meritve` (`sifra_meritev`, `ime`, `izbrisan`) VALUES
('TETEZ', 'Telesna teža', 0),
('DIHAN', 'Dihanje', 0),
('TETEM', 'Telesna temperatura', 0),
('DAROJ', 'Datum rojstva', 0),
('POTEO', 'Porodna teža otroka', 0),
('POVIO', 'Porodna višina otroka', 0),
('KRPRI', 'Krvni pritisk', 0),
('SRUTR', 'Srčni utrip', 0),
('RISPA', 'Ritem spanja', 0),
('KRSLA', 'Krvni sladkor', 0);

-- --------------------------------------------------------

--
-- Struktura tabele `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3585, '2014_10_12_000000_create_users_table', 1),
(3586, '2014_10_12_100000_create_password_resets_table', 1),
(3587, '2017_04_02_122253_create_posta_table', 1),
(3588, '2017_04_02_122416_create_okolis_table', 1),
(3589, '2017_04_02_122452_create_izvajalec_zd_table', 1),
(3590, '2017_04_02_122528_create_patronazna_sestra_table', 1),
(3591, '2017_04_02_123524_create_delavecs_table', 1),
(3592, '2017_04_02_124246_create_vlogas_table', 1),
(3593, '2017_04_02_151124_create_vrsta_obiskas_table', 1),
(3594, '2017_04_02_151348_create_bolezens_table', 1),
(3595, '2017_04_02_151608_create_materials_table', 1),
(3596, '2017_04_02_152934_create_delovni_nalog_material_table', 1),
(3597, '2017_04_02_153141_create_obisks_table', 1),
(3598, '2017_04_02_153428_create_zdravilos_table', 1),
(3599, '2017_04_02_153536_create_delovni_nalog_zdravilo_table', 1),
(3600, '2017_04_02_153717_create_delovni_nalogs_table', 1),
(3601, '2017_04_02_154953_create_pacients_table', 1),
(3602, '2017_04_02_155425_create_delovni_nalog_pacient', 1),
(3603, '2017_04_02_155958_create_sorodstveno_razmerjes_table', 1),
(3604, '2017_04_02_160310_create_kontaktna_osebas_table', 1),
(3605, '2017_04_05_182901_create_uporabniks_table', 1),
(3606, '2017_04_11_171742_create_uporabnik_aktivacija_table', 1),
(3607, '2017_04_12_091415_create_plans_table', 1),
(3608, '2017_04_12_112720_create_zaklepanje_i_ps_table', 1),
(3609, '2017_05_05_171924_create_aktivnosts_table', 1),
(3610, '2017_05_05_185721_create_porocilos_table', 1),
(3611, '2017_05_06_192327_create_pozabljeno_geslos_table', 1),
(3612, '2017_05_10_134332_create_nadomescanjes_table', 1),
(3613, '2017_05_27_205449_create_meritves_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabele `nadomescanje`
--

DROP TABLE IF EXISTS `nadomescanje`;
CREATE TABLE `nadomescanje` (
  `nid` int(10) UNSIGNED NOT NULL,
  `zacetek` date NOT NULL,
  `konec` date NOT NULL,
  `sifra_ps` int(11) NOT NULL,
  `nadomestna_sifra_ps` int(11) NOT NULL,
  `sifra_obisk` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `obisk`
--

DROP TABLE IF EXISTS `obisk`;
CREATE TABLE `obisk` (
  `sifra_obisk` int(10) UNSIGNED NOT NULL,
  `sifra_dn` int(11) NOT NULL,
  `sifra_plan` int(11) NOT NULL,
  `originalna_sifra_plan` int(11) NOT NULL,
  `sifra_ps` int(11) NOT NULL,
  `sifra_nadomestne_ps` int(11) DEFAULT NULL,
  `datum_obiska` date NOT NULL,
  `datum_opravljenosti_obiska` date DEFAULT NULL,
  `opravljen` tinyint(1) NOT NULL DEFAULT '0',
  `nadomescanje` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `obisk`
--

INSERT INTO `obisk` (`sifra_obisk`, `sifra_dn`, `sifra_plan`, `originalna_sifra_plan`, `sifra_ps`, `sifra_nadomestne_ps`, `datum_obiska`, `datum_opravljenosti_obiska`, `opravljen`, `nadomescanje`) VALUES
(1, 1, -1, -1, 83312, NULL, '2017-06-08', NULL, 0, 0),
(2, 1, 2, -1, 83312, NULL, '2017-06-09', NULL, 0, 0),
(3, 1, 3, -1, 83312, NULL, '2017-06-12', NULL, 0, 0),
(4, 1, 4, -1, 83312, NULL, '2017-06-14', NULL, 0, 0),
(5, 2, 5, 5, 45331, NULL, '2017-06-08', NULL, 0, 0),
(6, 2, 6, 6, 45331, NULL, '2017-06-09', NULL, 0, 0),
(7, 3, 7, -1, 21245, NULL, '2017-06-09', NULL, 0, 0),
(8, 3, 8, -1, 21245, NULL, '2017-06-13', NULL, 0, 0),
(9, 3, 9, -1, 21245, NULL, '2017-06-16', NULL, 0, 0),
(10, 4, 10, 10, 12234, NULL, '2017-06-09', NULL, 0, 0),
(11, 4, 11, 11, 12234, NULL, '2017-06-12', NULL, 0, 0),
(12, 4, 12, 12, 12234, NULL, '2017-06-14', NULL, 0, 0),
(13, 5, 11, -1, 12234, NULL, '2017-06-12', NULL, 0, 0),
(14, 5, 13, -1, 12234, NULL, '2017-06-15', NULL, 0, 0),
(15, 5, 14, -1, 12234, NULL, '2017-06-19', NULL, 0, 0),
(16, 6, 15, 15, 21245, NULL, '2017-06-20', NULL, 0, 0),
(17, 7, 16, 16, 83312, NULL, '2017-06-26', NULL, 0, 0),
(18, 7, 17, 17, 83312, NULL, '2017-06-30', NULL, 0, 0),
(19, 8, 18, -1, 45331, NULL, '2017-06-27', NULL, 0, 0),
(20, 8, 19, -1, 45331, NULL, '2017-06-30', NULL, 0, 0),
(21, 9, 20, 20, 21245, NULL, '2017-07-04', NULL, 0, 0),
(22, 9, 21, 21, 21245, NULL, '2017-07-11', NULL, 0, 0),
(23, 10, 22, -1, 12234, NULL, '2017-06-16', NULL, 0, 0),
(24, 10, 23, -1, 12234, NULL, '2017-06-20', NULL, 0, 0),
(25, 10, 24, -1, 12234, NULL, '2017-06-23', NULL, 0, 0),
(26, 11, 25, 25, 45331, NULL, '2017-07-13', NULL, 0, 0),
(27, 12, 3, 3, 83312, NULL, '2017-06-12', NULL, 0, 0),
(28, 13, 26, -1, 45331, NULL, '2017-06-01', NULL, 0, 0),
(29, 13, 27, -1, 45331, NULL, '2017-06-02', NULL, 0, 0),
(30, 13, 27, -1, 45331, NULL, '2017-06-02', NULL, 0, 0),
(31, 14, 28, -1, 12234, NULL, '2017-06-01', '2017-06-01', 1, 0),
(32, 14, 29, -1, 12234, NULL, '2017-06-05', '2017-06-05', 1, 0),
(33, 14, 30, -1, 12234, NULL, '2017-06-07', '2017-06-07', 1, 0),
(34, 15, 31, 31, 83312, NULL, '2017-06-05', '2017-06-05', 1, 0),
(35, 15, 32, 32, 83312, NULL, '2017-06-07', '2017-06-07', 1, 0),
(36, 15, 2, 2, 83312, NULL, '2017-06-09', NULL, 0, 0),
(37, 16, 33, -1, 83312, NULL, '2017-06-01', '2017-06-01', 1, 0),
(38, 16, 34, -1, 83312, NULL, '2017-06-02', '2017-06-02', 1, 0),
(39, 16, 35, -1, 83312, NULL, '2017-06-02', '2017-06-03', 1, 0),
(40, 16, 31, -1, 83312, NULL, '2017-06-05', '2017-06-05', 1, 0),
(41, 17, 36, 36, 12234, NULL, '2017-06-02', '2017-06-02', 1, 0),
(42, 18, 36, -1, 12234, NULL, '2017-06-02', '2017-06-02', 1, 0),
(43, 19, 37, -1, 12234, NULL, '2017-05-31', '2017-05-31', 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabele `okolis`
--

DROP TABLE IF EXISTS `okolis`;
CREATE TABLE `okolis` (
  `sifra_okolis` int(11) NOT NULL,
  `ime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `okolis`
--

INSERT INTO `okolis` (`sifra_okolis`, `ime`) VALUES
(1, 'Moste-Polje'),
(2, 'Polje'),
(3, 'Rožna dolina'),
(4, 'Domžale'),
(5, 'Vrhnika'),
(6, 'Logatec'),
(7, 'Grosuplje'),
(8, 'Škofja Loka'),
(9, 'Sežana'),
(10, 'Radovljica'),
(11, 'Ravne na Koroškem'),
(12, 'Slovenska bistrica');

-- --------------------------------------------------------

--
-- Struktura tabele `pacient`
--

DROP TABLE IF EXISTS `pacient`;
CREATE TABLE `pacient` (
  `stevilka_KZZ` int(11) NOT NULL,
  `postna_stevilka` int(11) NOT NULL,
  `pac_stevilka_KZZ` int(11) NOT NULL DEFAULT '-1',
  `ime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priimek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifra_okolis` int(11) NOT NULL,
  `ulica` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kraj` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum_rojstva` date NOT NULL,
  `spol` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifra_razmerje` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/',
  `id_uporabnik` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `pacient`
--

INSERT INTO `pacient` (`stevilka_KZZ`, `postna_stevilka`, `pac_stevilka_KZZ`, `ime`, `priimek`, `sifra_okolis`, `ulica`, `kraj`, `datum_rojstva`, `spol`, `sifra_razmerje`, `id_uporabnik`) VALUES
(1234567890, 1000, -1, 'Ksenija', 'Debevc', 3, 'Rožna Dolina, cesta IV 45', 'Ljubljana', '1989-07-12', 'z', '/', 5),
(1111111111, 1000, 1234567890, 'Iza', 'Debevc', 3, 'Rožna Dolina, cesta IV 45', 'Ljubljana', '2010-06-17', 'z', 'A1', 14),
(1211111111, 1000, 1234567890, 'Miha', 'Debevc', 3, 'Rožna Dolina, cesta IV 45', 'Ljubljana', '2017-03-10', 'm', 'A1', 15),
(1311111111, 1000, -1, 'Blaž', 'Blažič', 2, 'Polje cesta XI', 'Ljubljana', '1966-09-21', 'm', '/', 6),
(1411111111, 1000, -1, 'Anton', 'Antončič', 2, 'Polje cesta IX', 'Ljubljana', '1974-11-20', 'm', '/', 7),
(1511111111, 1000, -1, 'Jana', 'Janezič', 5, 'Drenov Grič 165', 'Ljubljana', '1991-10-18', 'z', '/', 8),
(1122222222, 2000, -1, 'Mirko', 'Car', 11, 'Čečovje 6', 'Ravne na Koroškem', '1931-07-27', 'm', '/', 13);

-- --------------------------------------------------------

--
-- Struktura tabele `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `patronazna_sestra`
--

DROP TABLE IF EXISTS `patronazna_sestra`;
CREATE TABLE `patronazna_sestra` (
  `sifra_ps` int(11) NOT NULL,
  `sifra_okolis` int(11) NOT NULL DEFAULT '0',
  `sifra_zd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_uporabnik` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `patronazna_sestra`
--

INSERT INTO `patronazna_sestra` (`sifra_ps`, `sifra_okolis`, `sifra_zd`, `id_uporabnik`) VALUES
(12234, 2, '05900', 9),
(45331, 3, '05600', 10),
(83312, 5, '06501', 11),
(21245, 11, '20662', 13);

-- --------------------------------------------------------

--
-- Struktura tabele `plan`
--

DROP TABLE IF EXISTS `plan`;
CREATE TABLE `plan` (
  `sifra_plan` int(10) UNSIGNED NOT NULL,
  `datum_plan` date NOT NULL,
  `sifra_ps_plan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `plan`
--

INSERT INTO `plan` (`sifra_plan`, `datum_plan`, `sifra_ps_plan`) VALUES
(1, '2017-06-08', 83312),
(2, '2017-06-09', 83312),
(3, '2017-06-12', 83312),
(4, '2017-06-14', 83312),
(5, '2017-06-08', 45331),
(6, '2017-06-09', 45331),
(7, '2017-06-09', 21245),
(8, '2017-06-13', 21245),
(9, '2017-06-16', 21245),
(10, '2017-06-09', 12234),
(11, '2017-06-12', 12234),
(12, '2017-06-14', 12234),
(13, '2017-06-15', 12234),
(14, '2017-06-19', 12234),
(15, '2017-06-20', 21245),
(16, '2017-06-26', 83312),
(17, '2017-06-30', 83312),
(18, '2017-06-27', 45331),
(19, '2017-06-30', 45331),
(20, '2017-07-04', 21245),
(21, '2017-07-11', 21245),
(22, '2017-06-16', 12234),
(23, '2017-06-20', 12234),
(24, '2017-06-23', 12234),
(25, '2017-07-13', 45331),
(26, '2017-06-01', 45331),
(27, '2017-06-02', 45331),
(28, '2017-06-01', 12234),
(29, '2017-06-05', 12234),
(30, '2017-06-07', 12234),
(31, '2017-06-05', 83312),
(32, '2017-06-07', 83312),
(33, '2017-06-01', 83312),
(34, '2017-06-02', 83312),
(35, '2017-06-03', 83312),
(36, '2017-06-02', 12234),
(37, '2017-05-31', 12234);

-- --------------------------------------------------------

--
-- Struktura tabele `porocilo`
--

DROP TABLE IF EXISTS `porocilo`;
CREATE TABLE `porocilo` (
  `pid` int(10) UNSIGNED NOT NULL,
  `sifra_obisk` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `opis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `porocilo`
--

INSERT INTO `porocilo` (`pid`, `sifra_obisk`, `aid`, `opis`, `created_at`, `updated_at`) VALUES
(1, 31, 82, '{"rdeca":"1","modra":"0","rumena":"0","zelena":"1"}', '2017-05-30 17:48:44', '2017-05-30 17:48:44'),
(2, 31, 83, '-', '2017-05-30 17:48:44', '2017-05-30 17:48:44'),
(3, 32, 82, '{"rdeca":"1","modra":"0","rumena":"0","zelena":"1"}', '2017-05-30 17:49:01', '2017-05-30 17:49:01'),
(4, 32, 83, '-', '2017-05-30 17:49:01', '2017-05-30 17:49:01'),
(5, 33, 82, '{"rdeca":"0","modra":"0","rumena":"0","zelena":"0"}', '2017-05-30 17:49:23', '2017-05-30 17:49:23'),
(6, 33, 83, '-', '2017-05-30 17:49:23', '2017-05-30 17:49:23'),
(7, 34, 80, 'Atorvastatin, Acetilsalicilna kislina, Telmisartan', '2017-05-30 17:54:08', '2017-05-30 17:54:08'),
(8, 34, 81, '-', '2017-05-30 17:54:08', '2017-05-30 17:54:08'),
(9, 35, 80, 'Piridoksin', '2017-05-30 17:54:37', '2017-05-30 17:54:37'),
(10, 35, 81, '-', '2017-05-30 17:54:37', '2017-05-30 17:54:37'),
(11, 37, 1, 'Da', '2017-05-30 17:57:21', '2017-05-30 17:57:21'),
(12, 37, 2, '-', '2017-05-30 17:57:21', '2017-05-30 17:57:21'),
(13, 37, 3, 'Da', '2017-05-30 17:57:21', '2017-05-30 17:57:21'),
(14, 37, 4, 'Da', '2017-05-30 17:57:21', '2017-05-30 17:57:21'),
(15, 37, 5, 'Da', '2017-05-30 17:57:21', '2017-05-30 17:57:21'),
(16, 37, 6, '-', '2017-05-30 17:57:21', '2017-05-30 17:57:21'),
(17, 37, 7, '-', '2017-05-30 17:57:21', '2017-05-30 17:57:21'),
(18, 37, 8, '-', '2017-05-30 17:57:21', '2017-05-30 17:57:21'),
(19, 37, 9, '-', '2017-05-30 17:57:21', '2017-05-30 17:57:21'),
(20, 37, 10, '-', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(21, 37, 11, '-', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(22, 37, 12, '-', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(23, 37, 13, '-', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(24, 37, 14, '09/29/2017', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(25, 37, 15, NULL, '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(26, 37, 16, NULL, '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(27, 37, 17, '{"mot":"niMoteno","opis":null}', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(28, 37, 18, '{"fizicna":"srednja","opis":null}', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(29, 37, 19, '{"sis":"125","dia":"81"}', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(30, 37, 20, '70', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(31, 37, 21, '55', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(32, 37, 22, '37', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(33, 37, 23, '55', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(34, 37, 24, '60', '2017-05-30 17:57:24', '2017-05-30 17:57:24'),
(35, 38, 1, '-', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(36, 38, 2, '-', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(37, 38, 3, '-', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(38, 38, 4, '-', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(39, 38, 5, 'Da', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(40, 38, 6, 'Da', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(41, 38, 7, 'Da', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(42, 38, 8, 'Da', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(43, 38, 9, '-', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(44, 38, 10, '-', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(45, 38, 11, '-', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(46, 38, 12, '-', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(47, 38, 13, '-', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(48, 38, 14, NULL, '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(49, 38, 15, NULL, '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(50, 38, 16, NULL, '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(51, 38, 17, '{"mot":"niMoteno","opis":null}', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(52, 38, 18, '{"fizicna":"srednja","opis":null}', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(53, 38, 19, '{"sis":"128","dia":"84"}', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(54, 38, 20, '60', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(55, 38, 21, '55', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(56, 38, 22, '37', '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(57, 38, 23, NULL, '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(58, 38, 24, NULL, '2017-05-30 17:58:31', '2017-05-30 17:58:31'),
(59, 39, 1, '-', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(60, 39, 2, '-', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(61, 39, 3, '-', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(62, 39, 4, '-', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(63, 39, 5, '-', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(64, 39, 6, '-', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(65, 39, 7, '-', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(66, 39, 8, '-', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(67, 39, 9, 'Da', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(68, 39, 10, 'Da', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(69, 39, 11, 'Da', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(70, 39, 12, 'Da', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(71, 39, 13, 'Da', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(72, 39, 14, NULL, '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(73, 39, 15, NULL, '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(74, 39, 16, NULL, '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(75, 39, 17, '{"mot":"niMoteno","opis":null}', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(76, 39, 18, '{"fizicna":"srednja","opis":null}', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(77, 39, 19, '{"sis":"122","dia":"78"}', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(78, 39, 20, '59', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(79, 39, 21, '52', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(80, 39, 22, '37', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(81, 39, 23, NULL, '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(82, 39, 24, '59', '2017-05-30 17:59:23', '2017-05-30 17:59:23'),
(83, 40, 1, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(84, 40, 2, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(85, 40, 3, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(86, 40, 4, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(87, 40, 5, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(88, 40, 6, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(89, 40, 7, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(90, 40, 8, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(91, 40, 9, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(92, 40, 10, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(93, 40, 11, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(94, 40, 12, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(95, 40, 13, '-', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(96, 40, 14, '09/22/2017', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(97, 40, 15, NULL, '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(98, 40, 16, NULL, '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(99, 40, 17, '{"mot":"niMoteno","opis":null}', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(100, 40, 18, '{"fizicna":"srednja","opis":null}', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(101, 40, 19, '{"sis":"121","dia":"78"}', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(102, 40, 20, '58', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(103, 40, 21, '60', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(104, 40, 22, '37', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(105, 40, 23, NULL, '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(106, 40, 24, '61', '2017-05-30 18:00:22', '2017-05-30 18:00:22'),
(107, 43, 82, '{"rdeca":"2","modra":"0","rumena":"0","zelena":"0"}', '2017-05-30 18:08:09', '2017-05-30 18:08:09'),
(108, 43, 83, '-', '2017-05-30 18:08:09', '2017-05-30 18:08:09'),
(109, 41, 63, '-', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(110, 41, 64, '-', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(111, 41, 65, '{"sis":"124","dia":"78"}', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(112, 41, 66, '60', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(113, 41, 67, '55', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(114, 41, 68, '37', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(115, 41, 69, '75', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(116, 41, 70, 'Da', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(117, 41, 71, 'Da', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(118, 41, 72, '{"urin":"Svetel","blato":"-"}', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(119, 41, 73, 'Normalno', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(120, 41, 74, '{"vid":"Normalno","vonj":"Normalno","sluh":"Podpovpre\\u010dno","okus":"Normalno","otip":"Omrtvi\\u010denost v levi roki","opis":null}', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(121, 41, 75, '12 ur na dan', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(122, 41, 76, '-', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(123, 41, 77, '{"odvisnost":"samostojen","opis":"-"}', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(124, 41, 78, '-', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(125, 41, 79, '-', '2017-05-30 18:10:09', '2017-05-30 18:10:09'),
(126, 42, 80, 'Teriflunomid', '2017-05-30 18:11:06', '2017-05-30 18:11:06'),
(127, 42, 81, '-', '2017-05-30 18:11:06', '2017-05-30 18:11:06');

-- --------------------------------------------------------

--
-- Struktura tabele `posta`
--

DROP TABLE IF EXISTS `posta`;
CREATE TABLE `posta` (
  `postna_stevilka` int(11) NOT NULL,
  `kraj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `posta`
--

INSERT INTO `posta` (`postna_stevilka`, `kraj`) VALUES
(1000, 'Ljubljana'),
(2000, 'Maribor'),
(3000, 'Celje'),
(4000, 'Kranj'),
(5000, 'Nova Gorica'),
(6000, 'Koper'),
(8000, 'Novo Mesto'),
(9000, 'Murska Sobota');

-- --------------------------------------------------------

--
-- Struktura tabele `pozabljeno_geslo`
--

DROP TABLE IF EXISTS `pozabljeno_geslo`;
CREATE TABLE `pozabljeno_geslo` (
  `id_uporabnik` int(11) NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geslo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dirty` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `sorodstveno_razmerje`
--

DROP TABLE IF EXISTS `sorodstveno_razmerje`;
CREATE TABLE `sorodstveno_razmerje` (
  `sifra_razmerje` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `izbrisan` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `sorodstveno_razmerje`
--

INSERT INTO `sorodstveno_razmerje` (`sifra_razmerje`, `ime`, `izbrisan`) VALUES
('A1', 'Otrok do 18. leta starosti', 0),
('A2', 'Otrok med 18. in 26. letom, ki nadaljuje šolanje', 0),
('B', 'Zakonec ali zunajzakonski partner', 0),
('C', 'Stari starš', 0);

-- --------------------------------------------------------

--
-- Struktura tabele `uporabnik`
--

DROP TABLE IF EXISTS `uporabnik`;
CREATE TABLE `uporabnik` (
  `id_uporabnik` int(10) UNSIGNED NOT NULL,
  `sifra_vloga` int(11) NOT NULL,
  `ime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priimek` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geslo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_stevilka` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktiviran` tinyint(1) NOT NULL DEFAULT '0',
  `datum_prijave` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `uporabnik`
--

INSERT INTO `uporabnik` (`id_uporabnik`, `sifra_vloga`, `ime`, `priimek`, `email`, `geslo`, `tel_stevilka`, `aktiviran`, `datum_prijave`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'Administratorjev', 'admin@gmail.com', '$2y$10$8xnmkhfeNSdSqwYaUP2JtuwwB2xxxZxpdGIVRV.JEweiQp.KgydNC', '051000001', 1, NULL, NULL, '2017-05-30 14:04:00', '2017-05-30 15:18:28'),
(2, 2, 'Zdravko', 'Zdravič', 'zdravko@mailinator.com', '$2y$10$zVgA1DmagnoacaZHN9ZncOntHy8IP3q3B.GNnv74qZVrGeR7Xpc6O', '051000002', 1, '2017-05-30', 'WYLXNEjX8oKtah0AhGj7lCvOqxOWz0sQYgUCQOpLaWkJZRN1NfPIowHXj6Zw', '2017-05-30 14:04:01', '2017-05-30 17:54:59'),
(3, 2, 'Marko', 'Markič', 'marko@mailinator.com', '$2y$10$71UvNg1LG4ZCObWPOoi7gerOutfx1qgdrSLJa4HGrn8IEyY5WoSla', '051000003', 1, '2017-05-30', 'rhsqhOPkgCLs2TGkw8DJyxMJinaUCu0otoc21ugaPHZJed9cDIs1EiL6ljAz', '2017-05-30 14:04:01', '2017-05-30 18:24:09'),
(4, 3, 'Vodja', 'Vodjič', 'vodja@mailinator.com', '$2y$10$p25tEjX5zUG8anvzWoc6IuHPvrUXxNpNYGlLdWhHpu.ZmO8MYjUM6', '051000013', 1, NULL, NULL, '2017-05-30 14:04:01', '2017-05-30 14:04:01'),
(5, 6, 'Ksenija', 'Debevc', 'pacient@mailinator.com', '$2y$10$LwWl96/JYvI/Rl95F8UScu2p9NrKohaaFlU86Rh52K0WmdwyizK7a', '051000006', 1, NULL, NULL, '2017-05-30 14:04:01', '2017-05-30 14:48:05'),
(6, 6, 'Blaž', 'Blažič', 'blazic@mailinator.com', '$2y$10$LYhJ.GMBLsyfyNfDoIBBreQB6q0ZXYYnt45HHB5T.FY5hbhcCzmNC', '051777111', 1, '2017-05-30', 'rN1cn5sjIMmcNLYiDeQOvyQ1v9pqZZQG3ErpW5wN3wyvZN0f4CPcP6lQWgPc', '2017-05-30 14:12:34', '2017-05-30 18:11:34'),
(7, 6, 'Anton', 'Antončič', 'antoncic@mailinator.com', '$2y$10$S08FE7YnQMktpYzuR8Q/L.THfFhJ2F160rvEgWmlenaUYJ5rl5E.O', '031444222', 1, '2017-05-30', 'DqbiyZC7umlwtA5UU5bqhu40DX2wA8O7t9KcgHvJdt8FfZR9hOjShfeIW3fo', '2017-05-30 14:17:55', '2017-05-30 17:51:39'),
(8, 6, 'Jana', 'Janezič', 'janezic@mailinator.com', '$2y$10$DVUUiQklL3K.57DFptoMou0iBvR2h0ulGKNdJ5ji6fRDxsPkgEBJy', '041222111', 1, '2017-05-30', 'MQJM5OD3cgH6cYO1hn8voYOR5ehk8g98mTHEBaIIxUaTPhx3CLTuf84vi7cv', '2017-05-30 14:33:28', '2017-05-30 19:18:42'),
(9, 4, 'Franja', 'Frankovič', 'frankovic@mailinator.com', '$2y$10$q5dWt/HmtXU0W5xcExS8R.cAVZpMZa/OSDE76Fj8xao5Jz0BZQHnu', '031445112', 1, '2017-05-30', 'jrRXG5AQH82p2aPhGBWeKdmCcRMAtg91quZhdpMkg1z8HFozi5j5GiLU1iBS', '2017-05-30 14:42:57', '2017-05-30 18:07:44'),
(10, 4, 'Petra', 'Petrovič', 'petrovic@mailinator.com', '$2y$10$KVEwlijeOr4.PNHKPnDOPu1OSQVckeBnswZ0IxH6XtdrM09klmo82', '080123441', 1, '2017-05-30', 't38QoJzx1hVRMmB7Ti3QkQCnEBAEpf5dWKuVSjGajJWZHwtjLbIboN5BK2Vc', '2017-05-30 14:43:53', '2017-05-30 17:45:38'),
(11, 4, 'Vida', 'Vidič', 'vidic@mailinator.com', '$2y$10$0LY6t//0vfEZnpI9MM5aQejgKkSJjWEANaq6rdvQYxnKMtsA6fkuK', '091881223', 1, '2017-05-30', 'DS4rH1ywd1PRna2WEelfAQZswcuWZDMc5oMkRQ9Xoq9E7dyX51o3B0V6Db7u', '2017-05-30 14:45:13', '2017-05-30 17:55:40'),
(12, 6, 'Mirko', 'Car', 'mirko@mailinator.com', '$2y$10$hGWDs7JOzHJQkRLiXdW9TeCEhezJ4xuO9a0S/PqzLVK.sVdvh7Mv.', '032223112', 1, NULL, NULL, '2017-05-30 15:16:21', '2017-05-30 15:16:21'),
(13, 4, 'Nezhka', 'Vodopivec', 'vodopivec@mailinator.com', '$2y$10$atx/fOOovIQwIjMQloXi4eJu9IlzQ6Ojfr4mGIjtgE0T63DD8BBdC', '090122331', 1, NULL, NULL, '2017-05-30 15:19:27', '2017-05-30 15:19:27'),
(14, 6, 'Iza', 'Debevc', NULL, NULL, NULL, 1, NULL, NULL, '2017-05-30 15:19:27', '2017-05-30 15:19:27'),
(15, 6, 'Miha', 'Debevc', NULL, NULL, NULL, 1, NULL, NULL, '2017-05-30 15:19:27', '2017-05-30 15:19:27');

-- --------------------------------------------------------

--
-- Struktura tabele `uporabnik_aktivacija`
--

DROP TABLE IF EXISTS `uporabnik_aktivacija`;
CREATE TABLE `uporabnik_aktivacija` (
  `id_uporabnik` int(11) NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `vloga`
--

DROP TABLE IF EXISTS `vloga`;
CREATE TABLE `vloga` (
  `sifra_vloga` int(11) NOT NULL,
  `ime` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `izbrisan` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `vloga`
--

INSERT INTO `vloga` (`sifra_vloga`, `ime`, `izbrisan`) VALUES
(1, 'Administrator', 0),
(2, 'Zdravnik', 0),
(3, 'Vodja patronažne službe', 0),
(4, 'Patronažna sestra', 0),
(5, 'Uslužbenec', 0),
(6, 'Pacient', 0);

-- --------------------------------------------------------

--
-- Struktura tabele `vrsta_obiska`
--

DROP TABLE IF EXISTS `vrsta_obiska`;
CREATE TABLE `vrsta_obiska` (
  `sifra_vrsta_obisk` int(11) NOT NULL,
  `preventivni` tinyint(1) NOT NULL,
  `ime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` double(8,2) NOT NULL,
  `meritve` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `izbrisan` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `vrsta_obiska`
--

INSERT INTO `vrsta_obiska` (`sifra_vrsta_obisk`, `preventivni`, `ime`, `cena`, `meritve`, `izbrisan`) VALUES
(10, 1, 'Obisk nosečnice', 65.99, '', 0),
(20, 1, 'Obisk otročnice', 53.99, '', 0),
(40, 1, 'Preventiva starostnika', 91.99, '', 0),
(50, 0, 'Aplikacija injekcij', 88.99, '', 0),
(60, 0, 'Odvzem krvi', 70.99, '', 0),
(70, 0, 'Kontrola zdravstvenega stanja', 79.99, '', 0);

-- --------------------------------------------------------

--
-- Struktura tabele `zaklepanje_ip`
--

DROP TABLE IF EXISTS `zaklepanje_ip`;
CREATE TABLE `zaklepanje_ip` (
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poskus` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `zaklepanje_ip`
--

INSERT INTO `zaklepanje_ip` (`ip`, `poskus`, `created_at`, `updated_at`) VALUES
('127.0.0.1', 0, '2017-05-30 17:45:38', '2017-05-30 18:04:37');

-- --------------------------------------------------------

--
-- Struktura tabele `zdravilo`
--

DROP TABLE IF EXISTS `zdravilo`;
CREATE TABLE `zdravilo` (
  `sifra_zdravilo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ime` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` double(8,2) NOT NULL,
  `izbrisan` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Odloži podatke za tabelo `zdravilo`
--

INSERT INTO `zdravilo` (`sifra_zdravilo`, `ime`, `opis`, `cena`, `izbrisan`) VALUES
('C10AA05', 'Atorvastatin', 'Atoris 20 mg filmsko obložene tablete', 7.99, 0),
('L04AA31', 'Teriflunomid', 'Aubagio 14 mg filmsko obložene tablete', 5.99, 0),
('C10AA07', 'Rosuvastatin', 'CRESTOR 5 mg filmsko obložene tablete', 6.99, 0),
('B01AC06', 'Acetilsalicilna kislina', 'Aspirin protect 100 mg gastrorezistentne tablete', 8.99, 0),
('N05AH03', 'Olanzapin', 'Olanzapin Teva 10 mg orodisperzibilne tablete', 9.99, 0),
('C09BB04', 'Perindopril in amlodipin', 'PRESTANCE 5 mg/10 mg tablete', 6.99, 0),
('D06BX01', 'Metronidazol', 'Rozamet 10 mg/g krema', 8.99, 0),
('C09CA07', 'Telmisartan', 'Telmisartan Lek 40 mg tablete', 7.99, 0),
('A11HA02', 'Piridoksin (vitamin B6)', 'Vitamin B6 20 MG Jenapharm tablete', 9.99, 0),
('N05BA12', 'Alprazolam', 'XANAX 1 mg tablete', 5.99, 0);

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `aktivnost`
--
ALTER TABLE `aktivnost`
  ADD PRIMARY KEY (`aid`);

--
-- Indeksi tabele `delovni_nalog`
--
ALTER TABLE `delovni_nalog`
  ADD PRIMARY KEY (`sifra_dn`);

--
-- Indeksi tabele `delovni_nalog_material`
--
ALTER TABLE `delovni_nalog_material`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `delovni_nalog_pacient`
--
ALTER TABLE `delovni_nalog_pacient`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `delovni_nalog_zdravilo`
--
ALTER TABLE `delovni_nalog_zdravilo`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `kontaktna_oseba`
--
ALTER TABLE `kontaktna_oseba`
  ADD PRIMARY KEY (`id_kontakt`);

--
-- Indeksi tabele `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `nadomescanje`
--
ALTER TABLE `nadomescanje`
  ADD PRIMARY KEY (`nid`);

--
-- Indeksi tabele `obisk`
--
ALTER TABLE `obisk`
  ADD PRIMARY KEY (`sifra_obisk`);

--
-- Indeksi tabele `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeksi tabele `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`sifra_plan`);

--
-- Indeksi tabele `porocilo`
--
ALTER TABLE `porocilo`
  ADD PRIMARY KEY (`pid`);

--
-- Indeksi tabele `uporabnik`
--
ALTER TABLE `uporabnik`
  ADD PRIMARY KEY (`id_uporabnik`),
  ADD UNIQUE KEY `uporabnik_email_unique` (`email`);

--
-- Indeksi tabele `uporabnik_aktivacija`
--
ALTER TABLE `uporabnik_aktivacija`
  ADD UNIQUE KEY `uporabnik_aktivacija_id_uporabnik_unique` (`id_uporabnik`);

--
-- Indeksi tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `aktivnost`
--
ALTER TABLE `aktivnost`
  MODIFY `aid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT tabele `delovni_nalog`
--
ALTER TABLE `delovni_nalog`
  MODIFY `sifra_dn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT tabele `delovni_nalog_material`
--
ALTER TABLE `delovni_nalog_material`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `delovni_nalog_pacient`
--
ALTER TABLE `delovni_nalog_pacient`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT tabele `delovni_nalog_zdravilo`
--
ALTER TABLE `delovni_nalog_zdravilo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT tabele `kontaktna_oseba`
--
ALTER TABLE `kontaktna_oseba`
  MODIFY `id_kontakt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3614;
--
-- AUTO_INCREMENT tabele `nadomescanje`
--
ALTER TABLE `nadomescanje`
  MODIFY `nid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT tabele `obisk`
--
ALTER TABLE `obisk`
  MODIFY `sifra_obisk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT tabele `plan`
--
ALTER TABLE `plan`
  MODIFY `sifra_plan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT tabele `porocilo`
--
ALTER TABLE `porocilo`
  MODIFY `pid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT tabele `uporabnik`
--
ALTER TABLE `uporabnik`
  MODIFY `id_uporabnik` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
