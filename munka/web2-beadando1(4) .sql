-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Nov 18. 20:22
-- Kiszolgáló verziója: 10.4.18-MariaDB
-- PHP verzió: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `web2-beadando1`
--
CREATE DATABASE IF NOT EXISTS `web2-beadando1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `web2-beadando1`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(10) UNSIGNED NOT NULL,
  `csaladi_nev` varchar(45) NOT NULL DEFAULT '',
  `utonev` varchar(45) NOT NULL DEFAULT '',
  `bejelentkezes` varchar(12) NOT NULL DEFAULT '',
  `jelszo` varchar(40) NOT NULL DEFAULT '',
  `jogosultsag` varchar(3) NOT NULL DEFAULT '_1_'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `csaladi_nev`, `utonev`, `bejelentkezes`, `jelszo`, `jogosultsag`) VALUES
(1, 'Rendszer', 'Admin', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '__1'),
(2, 'Családi_2', 'Utónév_2', 'Login2', '6cf8efacae19431476020c1e2ebd2d8acca8f5c0', '_1_'),
(3, 'Családi_3', 'Utónév_3', 'Login3', 'df4d8ad070f0d1585e172a2150038df5cc6c891a', '_1_'),
(4, 'Családi_4', 'Utónév_4', 'Login4', 'b020c308c155d6bbd7eb7d27bd30c0573acbba5b', '_1_'),
(5, 'Családi_5', 'Utónév_5', 'Login5', '9ab1a4743b30b5e9c037e6a645f0cfee80fb41d4', '_1_'),
(6, 'Családi_6', 'Utónév_6', 'Login6', '7ca01f28594b1a06239b1d96fc716477d198470b', '_1_'),
(7, 'Családi_7', 'Utónév_7', 'Login7', '41ad7e5406d8f1af2deef2ade4753009976328f8', '_1_'),
(8, 'Családi_8', 'Utónév_8', 'Login8', '3a340fe3599746234ef89591e372d4dd8b590053', '_1_'),
(9, 'Családi_9', 'Utónév_9', 'Login9', 'c0298f7d314ecbc5651da5679a0a240833a88238', '_1_'),
(10, 'Családi_10', 'Utónév_10', 'Login10', 'a477427c183664b57f977661ac3167b64823f366', '_1_'),
(11, 'Fehér', 'Donát', 'dfeher', '87663cdd821262b3082b19d427a5fe857864e177', '_1_');
-- kesz

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hirek`
--

CREATE TABLE `hirek` (
  `id` int(10) UNSIGNED NOT NULL,
  `felhasznaloid` int(10) UNSIGNED NOT NULL,
  `cim` varchar(45) NOT NULL DEFAULT '',
  `ido` timestamp NOT NULL DEFAULT current_timestamp(),
  `tartalom` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `hirek`
--

INSERT INTO `hirek` (`id`, `felhasznaloid`, `cim`, `ido`, `tartalom`) VALUES
(1, 1, 'Első hír!', '2021-11-07 21:48:15', 'Ez itt az első hír tartalma.'),
(2, 1, 'Második hír!', '2021-11-07 21:48:27', 'Ez itt a második hír tartalma.'),
(15, 2, 'Az én harmadik címem', '2021-11-08 14:20:56', 'Ez a rész fog a harmadik címről szólni!'),
(16, 1, 'Ezt nektek!', '2021-11-10 15:40:44', 'Hihihihihi'),
(17, 2, 'Sokadik hír!', '2021-11-10 16:45:41', 'ez bizony itt a sokadik hír.'),
(18, 2, 'asdasdasd', '2021-11-10 17:07:25', 'asdasdasdasd'),
(19, 1, 'Ez az eddigi legjobb hír', '2021-11-14 08:17:10', 'csssss'),
(20, 2, 'Új címecském', '2021-11-14 08:29:12', 'hihi-haha');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hozzaszolasok`
--

CREATE TABLE `hozzaszolasok` (
  `id` int(10) UNSIGNED NOT NULL,
  `hirid` int(10) UNSIGNED NOT NULL,
  `felhasznaloid` int(10) UNSIGNED NOT NULL,
  `tartalom` varchar(200) NOT NULL DEFAULT '',
  `ido` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `hozzaszolasok`
--

INSERT INTO `hozzaszolasok` (`id`, `hirid`, `felhasznaloid`, `tartalom`, `ido`) VALUES
(1, 1, 1, 'Ez az első hír első kommentje!', '2021-11-08 12:59:04'),
(10, 1, 2, 'Ez az első hír második kemmentje!', '2021-11-08 14:18:22'),
(11, 1, 2, 'Ez pedig itt a harmadik komment.', '2021-11-08 14:20:07'),
(12, 1, 1, 'Hahahaha!', '2021-11-10 15:16:33'),
(13, 1, 1, '', '2021-11-10 15:38:32'),
(14, 1, 1, '', '2021-11-10 15:39:31'),
(15, 2, 1, 'aaaaa', '2021-11-10 15:45:21'),
(16, 1, 2, 'Sziasztok', '2021-11-10 16:45:08'),
(17, 16, 2, 'Hahahahaha', '2021-11-10 16:45:19'),
(18, 1, 2, 'klkalsdasd', '2021-11-10 17:07:16'),
(19, 1, 1, 'Teszttttttt', '2021-11-14 08:16:17'),
(20, 20, 2, '', '2021-11-14 08:29:51'),
(21, 1, 2, '', '2021-11-14 08:30:10'),
(22, 1, 2, 'asd', '2021-11-14 08:30:56'),
(23, 1, 2, '', '2021-11-14 08:31:00'),
(24, 1, 2, 'asd', '2021-11-14 08:31:36'),
(25, 1, 2, 'hehe', '2021-11-14 12:14:26');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `naptar`
--

CREATE TABLE `naptar` (
	`azon` int(10) NOT NULL,
	`datum` DATE,
	`szolgid` int(10) NOT NULL,
	PRIMARY KEY(`azon`)
);


INSERT INTO `naptar` (`azon`,`datum`,`szolgid`) VALUES
(	1	,'	2018.01.03	',	1	),
(	2	,'	2018.01.03	',	4	),
(	3	,'	2018.01.04	',	5	),
(	4	,'	2018.01.11	',	5	),
(	5	,'	2018.01.17	',	1	),
(	6	,'	2018.01.17	',	4	),
(	7	,'	2018.01.18	',	5	),
(	8	,'	2018.01.18	',	3	),
(	9	,'	2018.01.25	',	5	),
(	10	,'	2018.01.25	',	3	),
(	11	,'	2018.01.31	',	1	),
(	12	,'	2018.01.31	',	4	),
(	13	,'	2018.02.01	',	5	),
(	14	,'	2018.02.08	',	5	),
(	15	,'	2018.02.14	',	1	),
(	16	,'	2018.02.14	',	4	),
(	17	,'	2018.02.15	',	5	),
(	18	,'	2018.02.22	',	5	),
(	19	,'	2018.02.28	',	1	),
(	20	,'	2018.02.28	',	4	),
(	21	,'	2018.03.01	',	5	),
(	22	,'	2018.03.05	',	3	),
(	23	,'	2018.03.08	',	5	),
(	24	,'	2018.03.12	',	3	),
(	25	,'	2018.03.14	',	1	),
(	26	,'	2018.03.14	',	4	),
(	27	,'	2018.03.15	',	5	),
(	28	,'	2018.03.19	',	3	),
(	29	,'	2018.03.22	',	5	),
(	30	,'	2018.03.26	',	3	),
(	31	,'	2018.03.28	',	1	),
(	32	,'	2018.03.28	',	4	),
(	33	,'	2018.03.29	',	5	),
(	34	,'	2018.04.02	',	3	),
(	35	,'	2018.04.05	',	5	),
(	36	,'	2018.04.09	',	3	),
(	37	,'	2018.04.11	',	1	),
(	38	,'	2018.04.11	',	4	),
(	39	,'	2018.04.12	',	5	),
(	40	,'	2018.04.16	',	3	),
(	41	,'	2018.04.19	',	5	),
(	42	,'	2018.04.23	',	3	),
(	43	,'	2018.04.25	',	1	),
(	44	,'	2018.04.25	',	4	),
(	45	,'	2018.04.26	',	5	),
(	46	,'	2018.04.30	',	3	),
(	47	,'	2018.05.03	',	5	),
(	48	,'	2018.05.07	',	3	),
(	49	,'	2018.05.09	',	1	),
(	50	,'	2018.05.09	',	4	),
(	51	,'	2018.05.10	',	5	),
(	52	,'	2018.05.14	',	3	),
(	53	,'	2018.05.17	',	5	),
(	54	,'	2018.05.21	',	3	),
(	55	,'	2018.05.23	',	1	),
(	56	,'	2018.05.23	',	4	),
(	57	,'	2018.05.24	',	5	),
(	58	,'	2018.05.28	',	3	),
(	59	,'	2018.05.31	',	5	),
(	60	,'	2018.06.03	',	5	),
(	61	,'	2018.06.04	',	3	),
(	62	,'	2018.06.06	',	1	),
(	63	,'	2018.06.06	',	4	),
(	64	,'	2018.06.07	',	5	),
(	65	,'	2018.06.10	',	5	),
(	66	,'	2018.06.11	',	3	),
(	67	,'	2018.06.14	',	5	),
(	68	,'	2018.06.17	',	5	),
(	69	,'	2018.06.18	',	3	),
(	70	,'	2018.06.20	',	1	),
(	71	,'	2018.06.20	',	4	),
(	72	,'	2018.06.21	',	5	),
(	73	,'	2018.06.24	',	5	),
(	74	,'	2018.06.25	',	3	),
(	75	,'	2018.06.28	',	5	),
(	76	,'	2018.07.01	',	5	),
(	77	,'	2018.07.02	',	3	),
(	78	,'	2018.07.04	',	1	),
(	79	,'	2018.07.04	',	4	),
(	80	,'	2018.07.05	',	5	),
(	81	,'	2018.07.08	',	5	),
(	82	,'	2018.07.09	',	3	),
(	83	,'	2018.07.12	',	5	),
(	84	,'	2018.07.15	',	5	),
(	85	,'	2018.07.16	',	3	),
(	86	,'	2018.07.18	',	1	),
(	87	,'	2018.07.18	',	4	),
(	88	,'	2018.07.19	',	5	),
(	89	,'	2018.07.22	',	5	),
(	90	,'	2018.07.23	',	3	),
(	91	,'	2018.07.26	',	5	),
(	92	,'	2018.07.29	',	5	),
(	93	,'	2018.07.30	',	3	),
(	94	,'	2018.08.01	',	1	),
(	95	,'	2018.08.01	',	4	),
(	96	,'	2018.08.02	',	5	),
(	97	,'	2018.08.05	',	5	),
(	98	,'	2018.08.06	',	3	),
(	99	,'	2018.08.09	',	5	),
(	100	,'	2018.08.12	',	5	),
(	101	,'	2018.08.13	',	3	),
(	102	,'	2018.08.15	',	1	),
(	103	,'	2018.08.15	',	4	),
(	104	,'	2018.08.16	',	5	),
(	105	,'	2018.08.19	',	5	),
(	106	,'	2018.08.20	',	3	),
(	107	,'	2018.08.23	',	5	),
(	108	,'	2018.08.26	',	5	),
(	109	,'	2018.08.27	',	3	),
(	110	,'	2018.08.29	',	1	),
(	111	,'	2018.08.29	',	4	),
(	112	,'	2018.08.30	',	5	),
(	113	,'	2018.09.03	',	3	),
(	114	,'	2018.09.06	',	5	),
(	115	,'	2018.09.10	',	3	),
(	116	,'	2018.09.12	',	1	),
(	117	,'	2018.09.12	',	4	),
(	118	,'	2018.09.13	',	5	),
(	119	,'	2018.09.17	',	3	),
(	120	,'	2018.09.20	',	5	),
(	121	,'	2018.09.24	',	3	),
(	122	,'	2018.09.26	',	1	),
(	123	,'	2018.09.26	',	4	),
(	124	,'	2018.09.27	',	5	),
(	125	,'	2018.10.01	',	3	),
(	126	,'	2018.10.04	',	5	),
(	127	,'	2018.10.08	',	3	),
(	128	,'	2018.10.10	',	1	),
(	129	,'	2018.10.10	',	4	),
(	130	,'	2018.10.11	',	5	),
(	131	,'	2018.10.15	',	3	),
(	132	,'	2018.10.18	',	5	),
(	133	,'	2018.10.22	',	3	),
(	134	,'	2018.10.24	',	1	),
(	135	,'	2018.10.24	',	4	),
(	136	,'	2018.10.25	',	5	),
(	137	,'	2018.10.29	',	3	),
(	138	,'	2018.11.01	',	5	),
(	139	,'	2018.11.05	',	3	),
(	140	,'	2018.11.07	',	1	),
(	141	,'	2018.11.07	',	4	),
(	142	,'	2018.11.08	',	5	),
(	143	,'	2018.11.12	',	3	),
(	144	,'	2018.11.15	',	5	),
(	145	,'	2018.11.19	',	3	),
(	146	,'	2018.11.21	',	1	),
(	147	,'	2018.11.21	',	4	),
(	148	,'	2018.11.22	',	5	),
(	149	,'	2018.11.26	',	3	),
(	150	,'	2018.11.29	',	5	),
(	151	,'	2018.12.05	',	1	),
(	152	,'	2018.12.05	',	4	),
(	153	,'	2018.12.06	',	5	),
(	154	,'	2018.12.13	',	5	),
(	155	,'	2018.12.19	',	1	),
(	156	,'	2018.12.20	',	5	),
(	157	,'	2018.12.27	',	5	);
-- idaig jo

--
-- Tábla szerkezet ehhez a táblához `lakig`
--

CREATE TABLE `lakig` (
	`azon` int(10) NOT NULL,
	`igeny` DATE,
	`szolgid` int(10) NOT NULL,
	`mennyiseg` int(10) NOT NULL,
	PRIMARY KEY(`azon`)
);
-- idaig jo

INSERT INTO `lakig` (`azon`,`igeny`,`szolgid`, `mennyiseg`) VALUES
(	1	,'	2018.01.04	',	5	,	1	),
(	2	,'	2018.01.11	',	5	,	1	),
(	3	,'	2018.01.18	',	4	,	2	),
(	4	,'	2018.01.18	',	5	,	1	),
(	5	,'	2018.01.17	',	3	,	1	),
(	6	,'	2018.01.24	',	5	,	1	),
(	7	,'	2018.01.30	',	1	,	3	),
(	8	,'	2018.01.31	',	4	,	1	),
(	9	,'	2018.02.01	',	5	,	1	),
(	10	,'	2018.02.08	',	5	,	1	),
(	11	,'	2018.02.13	',	4	,	1	),
(	12	,'	2018.02.15	',	5	,	1	),
(	13	,'	2018.02.22	',	5	,	1	),
(	14	,'	2018.02.27	',	1	,	2	),
(	15	,'	2018.03.02	',	4	,	1	),
(	16	,'	2018.03.01	',	5	,	1	),
(	17	,'	2018.03.04	',	3	,	2	),
(	18	,'	2018.03.08	',	5	,	1	),
(	19	,'	2018.03.15	',	5	,	1	),
(	20	,'	2018.03.21	',	5	,	1	),
(	21	,'	2018.03.29	',	5	,	1	),
(	22	,'	2018.04.03	',	3	,	6	),
(	23	,'	2018.04.05	',	5	,	1	),
(	24	,'	2018.04.11	',	3	,	19	),
(	25	,'	2018.04.09	',	4	,	1	),
(	26	,'	2018.04.10	',	5	,	1	),
(	27	,'	2018.04.19	',	5	,	1	),
(	28	,'	2018.04.26	',	5	,	1	),
(	29	,'	2018.04.29	',	3	,	5	),
(	30	,'	2018.05.03	',	5	,	1	),
(	31	,'	2018.05.06	',	3	,	4	),
(	32	,'	2018.05.10	',	5	,	1	),
(	33	,'	2018.05.16	',	3	,	3	),
(	34	,'	2018.05.17	',	5	,	1	),
(	35	,'	2018.05.21	',	3	,	3	),
(	36	,'	2018.05.22	',	1	,	1	),
(	37	,'	2018.05.24	',	4	,	1	),
(	38	,'	2018.05.24	',	5	,	1	),
(	39	,'	2018.05.27	',	3	,	3	),
(	40	,'	2018.05.31	',	5	,	1	),
(	41	,'	2018.06.03	',	5	,	1	),
(	42	,'	2018.06.04	',	3	,	5	),
(	43	,'	2018.06.04	',	1	,	3	),
(	44	,'	2018.06.06	',	4	,	3	),
(	45	,'	2018.06.07	',	5	,	1	),
(	46	,'	2018.06.10	',	5	,	1	),
(	47	,'	2018.06.10	',	3	,	2	),
(	48	,'	2018.06.14	',	5	,	1	),
(	49	,'	2018.06.17	',	5	,	1	),
(	50	,'	2018.06.20	',	3	,	2	),
(	51	,'	2018.06.20	',	4	,	1	),
(	52	,'	2018.06.21	',	5	,	1	),
(	53	,'	2018.06.24	',	5	,	1	),
(	54	,'	2018.06.25	',	3	,	2	),
(	55	,'	2018.06.27	',	5	,	1	),
(	56	,'	2018.07.01	',	5	,	1	),
(	57	,'	2018.07.02	',	3	,	1	),
(	58	,'	2018.07.02	',	4	,	3	),
(	59	,'	2018.07.05	',	5	,	1	),
(	60	,'	2018.07.08	',	5	,	1	),
(	61	,'	2018.07.08	',	3	,	3	),
(	62	,'	2018.07.12	',	5	,	1	),
(	63	,'	2018.07.15	',	5	,	1	),
(	64	,'	2018.07.16	',	3	,	1	),
(	65	,'	2018.07.18	',	1	,	1	),
(	66	,'	2018.07.19	',	4	,	2	),
(	67	,'	2018.07.19	',	5	,	1	),
(	68	,'	2018.07.22	',	5	,	1	),
(	69	,'	2018.07.22	',	3	,	1	),
(	70	,'	2018.07.26	',	5	,	1	),
(	71	,'	2018.07.29	',	5	,	1	),
(	72	,'	2018.07.31	',	3	,	2	),
(	73	,'	2018.08.26	',	5	,	1	),
(	74	,'	2018.08.29	',	3	,	3	),
(	75	,'	2018.08.27	',	1	,	1	),
(	76	,'	2018.08.29	',	4	,	1	),
(	77	,'	2018.08.30	',	5	,	1	),
(	78	,'	2018.09.01	',	3	,	4	),
(	79	,'	2018.09.06	',	5	,	1	),
(	80	,'	2018.09.09	',	3	,	3	),
(	81	,'	2018.09.10	',	1	,	3	),
(	82	,'	2018.09.13	',	5	,	1	),
(	83	,'	2018.09.18	',	3	,	2	),
(	84	,'	2018.09.20	',	5	,	1	),
(	85	,'	2018.09.23	',	3	,	1	),
(	86	,'	2018.09.24	',	4	,	2	),
(	87	,'	2018.09.27	',	5	,	1	),
(	88	,'	2018.09.29	',	3	,	1	),
(	89	,'	2018.10.04	',	5	,	1	),
(	90	,'	2018.10.10	',	3	,	2	),
(	91	,'	2018.10.10	',	5	,	1	),
(	92	,'	2018.10.15	',	3	,	2	),
(	93	,'	2018.10.18	',	5	,	1	),
(	94	,'	2018.10.22	',	3	,	6	),
(	95	,'	2018.10.25	',	5	,	1	),
(	96	,'	2018.10.31	',	3	,	3	),
(	97	,'	2018.11.01	',	5	,	1	),
(	98	,'	2018.11.04	',	3	,	13	),
(	99	,'	2018.11.05	',	1	,	2	),
(	100	,'	2018.11.07	',	4	,	1	),
(	101	,'	2018.11.15	',	5	,	1	),
(	102	,'	2018.11.17	',	3	,	7	),
(	103	,'	2018.11.22	',	5	,	1	),
(	104	,'	2018.11.26	',	3	,	3	),
(	105	,'	2018.11.29	',	5	,	1	),
(	106	,'	2018.12.06	',	5	,	1	),
(	107	,'	2018.12.13	',	5	,	1	),
(	108	,'	2018.12.19	',	4	,	2	),
(	109	,'	2018.12.20	',	5	,	1	),
(	110	,'	2018.12.26	',	5	,	1	);
-- idaig jo


--
-- Tábla szerkezet ehhez a táblához `szolgaltatas`
--

CREATE TABLE `szolgaltatas` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`tipus` varchar(255) NOT NULL,
	`jelentes` varchar(255) NOT NULL,
	PRIMARY KEY(`id`)
);
-- idaig jo

INSERT INTO `szolgaltatas` (`id`,`tipus`,`jelentes`) VALUES
(1,	'mua',	'Műanyag hulladék: PET palack, kozmetikai flakonok(PP+HDPE), szatyor, zacskó.'),
(2,	'uv',	'Üveg hulladék: színes és fehér üveg.'),
(3,	'zold',	'Zöldhulladék: komposztálható, kerti hulladékok.'),
(4,	'pa',	'Papírhulladékok: újságok, könyvek, kartondobozok.'),
(5,	'kom',	'Kommunális hulladék: szilárd, a lakókörnyezetünkben található, nem lebomló, nem veszélyes hulladék.');
-- idaig jo


-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menu`
--

CREATE TABLE `menu` (
  `url` varchar(30) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `szulo` varchar(30) NOT NULL,
  `jogosultsag` varchar(3) NOT NULL,
  `sorrend` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `menu`
--

INSERT INTO `menu` (`url`, `nev`, `szulo`, `jogosultsag`, `sorrend`) VALUES
('alapinfok', 'Alapinfók', 'elerhetoseg', '111', 40),
('belepes', 'Belépés', '', '100', 60),
('szallitasok', 'Szállítások', '', '011', 25),
('haviarfolyam', 'Havi Árfolyam', 'mnb', '111', 27),
('hirek', 'Hírek', '', '011', 11),
('kiegeszitesek', 'Kiegészítések', 'elerhetoseg', '011', 50),
('kilepes', 'Kilépés', '', '011', 70),
('mnb', 'MNB', '', '111', 55),
('napiarfolyam', 'Napi Árfolyam', 'mnb', '111', 26),
('nyitolap', 'Nyitólap', '', '111', 10),
('datumok', 'Dátumok', 'szallitasok', '011', 26),
('regisztracio', 'Regisztráció', '', '100', 70),
('ujhir', 'Új Hír', 'hirek', '011', 12);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);
-- kesz

--
-- A tábla indexei `naptar`
--
ALTER TABLE `naptar`
	add key `szolgid` (`szolgid`);

--
-- A tábla indexei `naptar`
--
ALTER TABLE `lakig`
	add KEY `szolgid` (`szolgid`);
	
--
-- A tábla indexei `hirek`
--
ALTER TABLE `hirek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznaloid` (`felhasznaloid`);
-- kesz

--
-- A tábla indexei `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  ADD PRIMARY KEY (`id`);
-- kesz

--
-- A tábla indexei `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`url`);
-- kesz

-- ----------------------------------------------------------------

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `naptar`
--
ALTER TABLE `naptar`
	MODIFY `azon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT a táblához `lakig`
--
ALTER TABLE `lakig`
	MODIFY `azon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT a táblához `szolgaltatas`
--
ALTER TABLE `szolgaltatas`
	MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `hirek`
--
ALTER TABLE `hirek`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `hozzaszolasok`
--
ALTER TABLE `hozzaszolasok`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

-- ------------------------------------------------------------------------

--
-- Megkötések a kiírt táblákhoz
--

/*
Nem tudom lehet mégsem kell.


--
-- Megkötések a táblához `naptar`
--
ALTER TABLE `naptar`
	ADD CONSTRAINT `naptar_ibfk_1` FOREIGN KEY (`szolgid`) REFERENCES `szolgaltatas` (`id`);

--
-- Megkötések a táblához `lakig`
--
ALTER TABLE `lakig`
	ADD CONSTRAINT `lakig_ibfk_1` FOREIGN KEY (`szolgid`) REFERENCES `szolgaltatas` (`id`);
COMMIT;
-- teszt sikeres

*/

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
