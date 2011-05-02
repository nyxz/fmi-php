-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2011 at 01:16 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hw4db`
--

-- --------------------------------------------------------

--
-- Table structure for table `men`
--

CREATE TABLE IF NOT EXISTS `men` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `salary` int(11) NOT NULL,
  `owner_of` varchar(255) NOT NULL,
  `height` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `men`
--

INSERT INTO `men` (`id`, `username`, `password`, `name`, `salary`, `owner_of`, `height`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin', 9000, 'a:3:{i:0;s:3:"car";i:1;s:5:"villa";i:2;s:5:"yacht";}', 180),
(2, 'pich', '32250170a0dca92d53ec9624f336ca24', 'Nikolay Nikolov', 9999, 'a:3:{i:0;s:3:"car";i:1;s:5:"villa";i:2;s:5:"yacht";}', 189),
(3, 'pich2', '32250170a0dca92d53ec9624f336ca24', 'Georgi Georgiev', 6000, 'a:2:{i:0;s:3:"car";i:1;s:5:"villa";}', 199),
(4, 'pich3', '32250170a0dca92d53ec9624f336ca24', 'Peter Petrov', 8992, 'a:2:{i:0;s:5:"villa";i:1;s:5:"yacht";}', 156),
(5, 'pich4', '32250170a0dca92d53ec9624f336ca24', 'Ivan Ivanov', 4000, 'a:2:{i:0;s:3:"car";i:1;s:5:"villa";}', 178),
(6, 'poor_pich', '32250170a0dca92d53ec9624f336ca24', 'Micho Mihailov', 350, '', 160),
(7, 'pich13', '32250170a0dca92d53ec9624f336ca24', 'Selby', 6000, 'a:3:{i:0;s:3:"car";i:1;s:5:"villa";i:2;s:5:"yacht";}', 192),
(8, 'pich21', '32250170a0dca92d53ec9624f336ca24', 'Higins', 120000, 'a:3:{i:0;s:3:"car";i:1;s:5:"villa";i:2;s:5:"yacht";}', 190),
(10, 'asdf', '6a204bd89f3c8348afd5c77c717a097a', 'Higins', 120000, 'a:3:{i:0;s:3:"car";i:1;s:5:"villa";i:2;s:5:"yacht";}', 180),
(11, 'pich123', '32250170a0dca92d53ec9624f336ca24', 'Trump', 80000, 'a:2:{i:0;s:5:"villa";i:1;s:5:"yacht";}', 190),
(12, 'pich1235', '32250170a0dca92d53ec9624f336ca24', 'Intel', 3000, 'a:1:{i:0;s:3:"car";}', 178),
(13, 'pich43', '32250170a0dca92d53ec9624f336ca24', 'Jim Hendry', 4500, 'a:3:{i:0;s:3:"car";i:1;s:5:"villa";i:2;s:5:"yacht";}', 192),
(14, 'pich99', '32250170a0dca92d53ec9624f336ca24', 'Daniel Negreanu', 900000, '', 180);

-- --------------------------------------------------------

--
-- Table structure for table `women`
--

CREATE TABLE IF NOT EXISTS `women` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `chest` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `hair` varchar(15) NOT NULL,
  `eyes` varchar(15) NOT NULL,
  `legs` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `women`
--

INSERT INTO `women` (`id`, `username`, `password`, `name`, `chest`, `height`, `hair`, `eyes`, `legs`) VALUES
(1, 'girla1', '1e36c95deab7e7d49f5541190179a4c3', 'Candy', 145, 187, 'black', 'green', 150),
(2, 'girla2', '32250170a0dca92d53ec9624f336ca24', 'Sindy', 150, 176, 'red', 'brown', 130),
(3, 'girla3', '32250170a0dca92d53ec9624f336ca24', 'Amanda', 134, 192, 'brown', 'blue', 158),
(4, 'girla4', '32250170a0dca92d53ec9624f336ca24', 'Eva', 120, 160, 'pink', 'brown', 85),
(5, 'girla13', '32250170a0dca92d53ec9624f336ca24', 'Amanda', 140, 190, 'blond', 'blue', 140);
