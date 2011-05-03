-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2011 at 05:02 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `year` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `year`, `pages`) VALUES
(1, 'The Great Gatsby', 1892, 250),
(2, 'The Prince', 1834, 437),
(3, 'Slaughterhouse-Five', 1890, 325),
(4, '1984', 1987, 435),
(5, 'The Republic', 1956, 467),
(6, 'Brothers Karamazov', 1934, 280),
(7, 'The Catcher in the Rye', 1896, 500),
(8, 'The Wealth of Nations', 1993, 380),
(9, 'For Whom the Bell Tolls', 1756, 400),
(10, 'The Picture of Dorian Gray', 1720, 345);

-- --------------------------------------------------------

--
-- Table structure for table `booksin`
--

CREATE TABLE IF NOT EXISTS `booksin` (
  `BOOKS_ID_FK` int(11) DEFAULT NULL,
  `FRIENDS_ID_FK` int(11) DEFAULT NULL,
  KEY `BOOKS_ID_FK` (`BOOKS_ID_FK`),
  KEY `FRIENDS_ID_FK` (`FRIENDS_ID_FK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `booksin`
--

INSERT INTO `booksin` (`BOOKS_ID_FK`, `FRIENDS_ID_FK`) VALUES
(7, 11),
(10, 11),
(9, 10),
(10, 10),
(2, 12),
(7, 8),
(9, 10),
(2, 8),
(4, 11),
(1, 9),
(5, 9),
(6, 11),
(5, 9),
(3, 11),
(5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `firstname` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(255) COLLATE utf8_bin NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`firstname`, `lastname`, `id`) VALUES
('Nikolay', 'Georgiev', 8),
('Ivan', 'Ivanov', 9),
('Nikolay', 'Nikolov', 10),
('Peter', 'Petrov', 11),
('Dimiter', 'Dimitrov', 12);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booksin`
--
ALTER TABLE `booksin`
  ADD CONSTRAINT `booksin_ibfk_2` FOREIGN KEY (`FRIENDS_ID_FK`) REFERENCES `friends` (`id`),
  ADD CONSTRAINT `booksin_ibfk_1` FOREIGN KEY (`BOOKS_ID_FK`) REFERENCES `books` (`id`);
