-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 01, 2020 at 03:16 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `ISBN` int(12) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(70) NOT NULL,
  `book_edition` varchar(20) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_author_name` varchar(50) NOT NULL,
  `book_publisher` varchar(50) NOT NULL,
  `book_price` varchar(10) NOT NULL,
  `book_qty` int(5) NOT NULL,
  `available_qty` int(5) NOT NULL,
  `book_purchase_date` varchar(50) NOT NULL,
  `libraian_username` varchar(50) NOT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `book_name`, `book_edition`, `book_image`, `book_author_name`, `book_publisher`, `book_price`, `book_qty`, `available_qty`, `book_purchase_date`, `libraian_username`) VALUES
(1, 'Java 2: The complete reference ', '5th edition', '20200104071548.jpg', 'Herbert Schildt', 'McGraw Hill Education(India)Private Limited', '955', 61, 59, '2020-01-04', 'krish2020'),
(7, 'data structure', '8th edition', '20200107044211.jpg', 'Dibya Bhattacharya', 'Nava', '785', 61, 60, '2020-01-07', 'krish_admin1'),
(6, 'Database', '8th edition', '20200107035923.jpg', 'krishanu', 'TMG', '855', 61, 61, '2020-01-07', 'krish2020'),
(10, 'C++ ', '4th edition', '20200114061003.jpg', 'Bjarne Stroustrap', 'Pearson', '988', 61, 60, '2020-01-14', 'krish_admin1'),
(17, 'C in depth', '4th edition', '20200122064604.jpg', 'S.K.Srivastava', 'BPB publisher', '587', 61, 61, '2020-01-22', 'krish_admin1');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

DROP TABLE IF EXISTS `fine`;
CREATE TABLE IF NOT EXISTS `fine` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ISBN` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `fine` int(10) DEFAULT NULL,
  `amount` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`id`, `ISBN`, `student_id`, `fine`, `amount`) VALUES
(1, 7, 2, 55, 'not paid'),
(2, 1, 2, 55, 'not paid');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

DROP TABLE IF EXISTS `issue_book`;
CREATE TABLE IF NOT EXISTS `issue_book` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `student_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(20) NOT NULL,
  `book_renew_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) NOT NULL DEFAULT '0',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `student_id`, `book_id`, `book_issue_date`, `book_renew_date`, `book_return_date`, `datetime`) VALUES
(1, 2, 17, '2020-01-27', '2020-02-05', '11-Feb-2020', '2020-02-11 07:40:14'),
(2, 2, 1, '2020-01-27', '2020-02-05', '11-Feb-2020', '2020-02-11 07:44:41'),
(3, 1, 1, '2020-01-27', '2020-02-05', '11-Feb-2020', '2020-02-11 07:45:59'),
(4, 1, 17, '2020-01-28', '2020-02-04', '11-Feb-2020', '2020-02-11 07:47:34'),
(5, 2, 6, '2020-01-28', '2020-02-04', '11-Feb-2020', '2020-02-11 08:42:25'),
(6, 2, 10, '2020-01-28', '2020-02-04', '11-Feb-2020', '2020-02-11 08:44:40'),
(7, 2, 7, '2020-01-27', '2020-02-05', '11-Feb-2020', '2020-02-11 09:10:00'),
(8, 2, 7, '2020-01-28', '2020-02-05', '0', '2020-02-11 09:25:08'),
(9, 2, 1, '2020-01-28', '2020-02-05', '0', '2020-02-11 09:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `libraian`
--

DROP TABLE IF EXISTS `libraian`;
CREATE TABLE IF NOT EXISTS `libraian` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libraian`
--

INSERT INTO `libraian` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `datetime`) VALUES
(1, 'Krishanu', 'Ghosh', 'krishanughosh12345@gmail.com', 'krish_admin1', 'admin1', '2020-01-02 19:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profession` varchar(40) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `profession`, `phone`, `date`) VALUES
(1, 'Moumita', 'Sarkar', 'moumita123@gmail.com', 'Moumita_12', 'moumita2018', 'Teacher', 8745984269, '2020-01-25 10:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `member_issue_book`
--

DROP TABLE IF EXISTS `member_issue_book`;
CREATE TABLE IF NOT EXISTS `member_issue_book` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `member_id` int(5) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_issue_date` varchar(20) NOT NULL,
  `book_return_date` varchar(20) NOT NULL DEFAULT '0',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_issue_book`
--

INSERT INTO `member_issue_book` (`id`, `member_id`, `book_id`, `book_issue_date`, `book_return_date`, `datetime`) VALUES
(1, 1, 1, '16-02-2020', '0', '2020-02-16 01:54:40'),
(2, 1, 10, '16-02-2020', '0', '2020-02-16 02:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `susername` varchar(50) NOT NULL,
  `dusername` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `msg_read` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `susername`, `dusername`, `title`, `msg`, `msg_read`) VALUES
(1, 'krish', 'krish_admin1', 'Issue', 'book', 'read'),
(2, 'krish', 'krish_admin1', 'issue', 'PHP', 'read'),
(3, 'krish', 'krish_admin1', 'Wish', 'Good Evening Sir!', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `students_reg`
--

DROP TABLE IF EXISTS `students_reg`;
CREATE TABLE IF NOT EXISTS `students_reg` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `roll` int(3) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `roll` (`roll`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_reg`
--

INSERT INTO `students_reg` (`ID`, `fname`, `lname`, `email`, `password`, `username`, `roll`, `phone`, `status`, `datetime`) VALUES
(1, 'krishanu', 'Ghosh', 'krishanughosh1234567@gmail.com', 'krish123', 'krish', 613, 9051151938, 1, '2020-01-24 18:20:29'),
(2, 'Amit', 'Das', 'amit1993@gmail.com', 'amit1993', 'Amit', 784, 9745687464, 1, '2020-01-24 19:22:01'),
(3, 'Dibya', 'Bhattacharya', 'dibya20@gmail.com', 'dibya1999', 'Dibya1999', 605, 8796488112, 1, '2020-02-16 03:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `total_fine`
--

DROP TABLE IF EXISTS `total_fine`;
CREATE TABLE IF NOT EXISTS `total_fine` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_id` int(10) NOT NULL,
  `Total` int(100) NOT NULL,
  `Amount` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total_fine`
--

INSERT INTO `total_fine` (`id`, `student_id`, `Total`, `Amount`) VALUES
(1, 2, 70, 'paid');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
