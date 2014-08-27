-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Структура на таблица `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staffID` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `work_position` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`staffID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Схема на данните от таблица `staff`
--

INSERT INTO `staff` (`staffID`, `name`, `work_position`, `mail`, `facebook`, `phone`) VALUES
(10, 'Maria Nikolova ', 'undefined', 'mariq.k.nikolova@gmail.com', NULL, NULL),
(11, 'Martin Tsekov ', 'PHP developer', 'martin.tsekov@gamil.com', NULL, NULL),
(12, 'Milen Dimitrov', 'Expert Human Recourses', ' milen820430@gmail.com', NULL, NULL),
(13, 'Stephan Kolev', 'electronics', 'stephan_kol@yahoo.com', NULL, '555-555-5555'),
(14, 'Tihomir Pelev', 'importing data', 't.pelev@gmail.com', NULL, NULL),
(16, 'Tsvetan Iliev', 'Unemployed', 'masovskitv@gmail.com', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
