-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2016. Nov 24. 12:11
-- Kiszolgáló verziója: 10.1.16-MariaDB
-- PHP verzió: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `shrekbook`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `post`
--

CREATE TABLE `post` (
  `ID` int(11) NOT NULL,
  `Author` varchar(20) NOT NULL,
  `Text` text NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `post`
--

INSERT INTO `post` (`ID`, `Author`, `Text`, `Date`) VALUES
(23, 'Shrek Shrek', 'sad', '2016-11-24'),
(28, 'Shrek Shrek', 'posfigjbpoadifnbÅ‘ojadfhnbpadfnbonadjbnadfbnaÅ‘dfnbÅ‘adfnbÅ‘iadfnbaÅ‘gfnbÅ‘oadgnbÅ‘ojadgnbÅ‘ojanbÅ‘oafnbÅ‘ofnbÅ‘oadfnbÅ‘oadgnbÅ‘oadgnbÅ‘ojgnfbÅ‘ojadnbÅ‘ojadgnoatenoagmnbÅ‘okdfnbÃºoadrhnÃºaoerjbÅ±kcbnÅ±thjaÃºepijbmvkbnaÅ±tijha\r\nejbpoidfhbÃºousrtjhÃºoaierhnbodafhnÅ‘iouethbaobnvÅ‘aiodurhbvadr\r\nshÃºasrvbaÃºdrhbvadr\r\n\r\n\r\nadrsvbhdfjbvdjkafbhfavbuocbiuvbadfibirujujrurvnfv', '2016-11-24'),
(29, 'Shrek Shrek', 'posfigjbpoadifnbÅ‘ojadfhnbpadfnbonadjbnadfbnaÅ‘dfnbÅ‘adfnbÅ‘iadfnbaÅ‘gfnbÅ‘oadgnbÅ‘ojadgnbÅ‘ojanbÅ‘oafnbÅ‘ofnbÅ‘oadfnbÅ‘oadgnbÅ‘oadgnbÅ‘ojgnfbÅ‘ojadnbÅ‘ojadgnoatenoagmnbÅ‘okdfnbÃºoadrhnÃºaoerjbÅ±kcbnÅ±thjaÃºepijbmvkbnaÅ±tijha\r\nejbpoidfhbÃºousrtjhÃºoaierhnbodafhnÅ‘iouethbaobnvÅ‘aiodurhbvadr\r\nshÃºasrvbaÃºdrhbvadr\r\n\r\n\r\nadrsvbhdfjbvdjkafbhfavbuocbiuvbadfibirujujrurvnfv', '2016-11-24'),
(30, 'Shrek Shrek', 'posfigjbpoadifnbÅ‘ojadfhnbpadfnbonadjbnadfbnaÅ‘dfnbÅ‘adfnbÅ‘iadfnbaÅ‘gfnbÅ‘oadgnbÅ‘ojadgnbÅ‘ojanbÅ‘oafnbÅ‘ofnbÅ‘oadfnbÅ‘oadgnbÅ‘oadgnbÅ‘ojgnfbÅ‘ojadnbÅ‘ojadgnoatenoagmnbÅ‘okdfnbÃºoadrhnÃºaoerjbÅ±kcbnÅ±thjaÃºepijbmvkbnaÅ±tijha\r\nejbpoidfhbÃºousrtjhÃºoaierhnbodafhnÅ‘iouethbaobnvÅ‘aiodurhbvadr\r\nshÃºasrvbaÃºdrhbvadr\r\n\r\n\r\nadrsvbhdfjbvdjkafbhfavbuocbiuvbadfibirujujrurvnfv', '2016-11-24'),
(31, 'Shrek Shrek', 'posfigjbpoadifnbÅ‘ojadfhnbpadfnbonadjbnadfbnaÅ‘dfnbÅ‘adfnbÅ‘iadfnbaÅ‘gfnbÅ‘oadgnbÅ‘ojadgnbÅ‘ojanbÅ‘oafnbÅ‘ofnbÅ‘oadfnbÅ‘oadgnbÅ‘oadgnbÅ‘ojgnfbÅ‘ojadnbÅ‘ojadgnoatenoagmnbÅ‘okdfnbÃºoadrhnÃºaoerjbÅ±kcbnÅ±thjaÃºepijbmvkbnaÅ±tijha\r\nejbpoidfhbÃºousrtjhÃºoaierhnbodafhnÅ‘iouethbaobnvÅ‘aiodurhbvadr\r\nshÃºasrvbaÃºdrhbvadr\r\n\r\n\r\nadrsvbhdfjbvdjkafbhfavbuocbiuvbadfibirujujrurvnfv', '2016-11-24'),
(32, 'Shrek Shrek', 'adhadhadhdgah', '2016-11-24'),
(33, 'Shrek Shrek', 'adhadhadhdgah', '2016-11-24'),
(34, 'Shrek Shrek', 'adhadhadhdgah', '2016-11-24'),
(35, 'Shrek Shrek', 'adhadhadhdgah', '2016-11-24');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
