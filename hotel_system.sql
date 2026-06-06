-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2026 at 04:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country`) VALUES
(1, 'Бургас', 'България'),
(2, 'Берлин', 'Германия'),
(3, 'София', 'България'),
(4, 'Прага', 'Чехия'),
(5, 'Истанбул', 'Турция'),
(6, 'Париж', 'Франция'),
(7, 'Варшава', 'Полша'),
(8, 'Пловдив', 'България'),
(9, 'Варна', 'България'),
(10, 'Букурещ', 'Румъния'),
(11, 'Лондон', 'Великобритания'),
(12, 'Ню Йорк', 'САЩ');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `apartments` int(11) NOT NULL,
  `studios` int(11) NOT NULL,
  `offices` int(11) NOT NULL,
  `restaurant` tinyint(1) NOT NULL,
  `spa` tinyint(1) NOT NULL,
  `pool` tinyint(1) NOT NULL,
  `disco` tinyint(1) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `apartments`, `studios`, `offices`, `restaurant`, `spa`, `pool`, `disco`, `city_id`) VALUES
(1, 'Хотел Иван', 50, 20, 5, 1, 0, 0, 0, 9),
(2, 'Хотел Космос', 100, 20, 20, 1, 1, 1, 1, 2),
(4, 'Хотел Париж', 300, 100, 50, 1, 0, 0, 1, 6),
(6, 'Хотел Мираж', 31, 10, 3, 1, 0, 1, 0, 8),
(7, 'Хотел Милан', 10, 10, 10, 0, 1, 1, 1, 5),
(8, 'Хотел Аква', 25, 10, 2, 0, 1, 1, 0, 1),
(9, 'Арт плаза', 10, 3, 0, 0, 0, 0, 0, 7),
(10, 'Хотел Септември', 25, 0, 5, 1, 1, 0, 0, 3),
(11, 'Хотел Ню Йорк', 1000, 500, 500, 1, 1, 1, 1, 6),
(12, 'Лондон Premium Hotel', 350, 150, 50, 0, 0, 0, 0, 11),
(13, 'Хотел Берлин', 25, 5, 0, 0, 0, 0, 1, 2),
(14, 'Приморец', 50, 50, 50, 1, 1, 1, 1, 1),
(15, 'Хотел Централ', 30, 20, 10, 1, 1, 1, 0, 12),
(16, 'Grand Hotel Varna', 100, 150, 200, 1, 0, 1, 0, 9),
(17, 'Palace Hotel', 20, 20, 20, 0, 0, 0, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', 'admin'),
('admin', '123'),
('tomas', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
