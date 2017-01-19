-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Jan 19. 11:26
-- Kiszolgáló verziója: 10.1.16-MariaDB
-- PHP verzió: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `products`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `product_name` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `product_desc` tinytext COLLATE utf8_hungarian_ci NOT NULL,
  `product_img_name` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `price`) VALUES
(1, '001', 'Shrek Character', 'Plastic Shrek Toy', 'shrekbabu.jpg', '500.00'),
(2, '002', 'Fiona Character', 'Slexy Fiona Character', 'fionafigura.jpg', '990.00'),
(3, '003', 'Iphone 6/6s Case Shrek Edition', 'Just for Yolo', 'iphone6tok.jpg', '3000.00'),
(4, '004', 'Real Donkey', 'Can talk!', 'szamar.png', '85000.00'),
(5, '005', 'Shrek phone', 'You used to call me on my Shrek phone\r\nlate night when you need my swamp.', 'shrekphone.jpg', '2500.00'),
(6, '006', 'Shrek Hug', 'Worth It, if u survie...', 'shrekhug.jpg', '1500.00'),
(7, '007', 'Shrek 2 Talking Puss ''n Boots ', 'Meeow!', 'macska.jpg', '2000.00');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
