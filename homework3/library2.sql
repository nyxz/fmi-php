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
-- Database: `library2`
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
  `FRID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `friend_fk` (`FRID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `year`, `pages`, `FRID`) VALUES
(1, 'The Great Gatsby', 1892, 250, 8),
(2, 'The Prince', 1834, 437, 8),
(3, 'Slaughterhouse-Five', 1890, 325, 11),
(4, '1984', 1987, 435, NULL),
(5, 'The Republic', 1956, 467, 10),
(6, 'Brothers Karamazov', 1934, 280, 9),
(7, 'The Catcher in the Rye', 1896, 500, 12),
(8, 'The Wealth of Nations', 1993, 380, 9),
(9, 'For Whom the Bell Tolls', 1756, 400, 11),
(10, 'The Picture of Dorian Gray', 1720, 345, NULL);

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
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `friend_fk` FOREIGN KEY (`FRID`) REFERENCES `friends` (`id`);
