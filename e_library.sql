-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2017 at 05:48 PM
-- Server version: 5.5.25
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'root', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `author_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`) VALUES
(1, 'И.О. Фамилия');

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE IF NOT EXISTS `book_details` (
  `book_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `soft_copy` varchar(50) CHARACTER SET utf8 NOT NULL,
  `publisher_id` int(20) NOT NULL DEFAULT '351',
  `edition` varchar(50) CHARACTER SET utf8 NOT NULL,
  `isbn` varchar(30) CHARACTER SET utf8 NOT NULL,
  `availability` int(11) NOT NULL DEFAULT '1',
  `count` int(11) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`book_id`, `title`, `soft_copy`, `publisher_id`, `edition`, `isbn`, `availability`, `count`) VALUES
(1359628784, 'Программирование С', '1487565997.pdf', 1, 'First', '2020', 1, 0),
(1486011445, 'Книга 1', '', 1, 'First-2', '12234', 1, 0),
(1488437014, '1111111111', '', 1, '333', '3333', 1, 0),
(1486379812, 'книга 3', '1486379812.pdf', 1, 'третье', '222', 1, 0),
(1487155618, 'kнига 4', '1487155618.PDF', 1, 'second', '2223323232', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrow_details`
--

CREATE TABLE IF NOT EXISTS `borrow_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `expire` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `borrow_details`
--

INSERT INTO `borrow_details` (`id`, `user_id`, `book_id`, `status`, `date`, `expire`) VALUES
(35, 1359629756, 1486011445, '0', '2017-02-28', '2017-02-28'),
(36, 1359629756, 1486379812, '0', '2017-02-28', '2017-02-28'),
(37, 1359629756, 1486011445, '0', '2017-03-01', '2017-03-01'),
(38, 1359629756, 1486011445, '0', '2017-03-01', '2017-03-01'),
(39, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(40, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(41, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(42, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(43, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(44, 1359629756, 1488437014, '0', '2017-03-02', '2017-03-02'),
(45, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(46, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(47, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(48, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(49, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(50, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(51, 1359629756, 1488437014, '0', '2017-03-02', '2017-03-02'),
(52, 1359629756, 1488437014, '0', '2017-03-02', '2017-03-02'),
(53, 1359629756, 1488437014, '0', '2017-03-02', '2017-03-02'),
(54, 1359629756, 1488437014, '0', '2017-03-02', '2017-03-02'),
(55, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(56, 1359629756, 1486011445, '0', '2017-03-02', '2017-03-02'),
(57, 1359629756, 1488437014, '0', '2017-03-06', '2017-03-06'),
(58, 1359629756, 1488437014, '0', '2017-03-06', '2017-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE IF NOT EXISTS `dept` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `dept_name`) VALUES
(1, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE IF NOT EXISTS `halls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `no_of_room` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `name`, `no_of_room`) VALUES
(1, 'Block 1', 20);

-- --------------------------------------------------------

--
-- Table structure for table `last_book_view`
--

CREATE TABLE IF NOT EXISTS `last_book_view` (
  `userId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `last_book_view`
--

INSERT INTO `last_book_view` (`userId`, `bookId`) VALUES
(1359629756, 1486379812),
(1359629756, 1359628784),
(1359629756, 1487155618);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`publisher_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisher_name`) VALUES
(1, 'КРМУ');

-- --------------------------------------------------------

--
-- Table structure for table `saved_author`
--

CREATE TABLE IF NOT EXISTS `saved_author` (
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved_author`
--

INSERT INTO `saved_author` (`book_id`, `author_id`) VALUES
(1359628784, 1),
(1359628552, 1),
(1486011445, 1),
(1486035437, 1),
(1486035545, 1),
(1486035734, 1),
(1486035987, 1),
(1486375137, 1),
(1486375137, 1),
(1486378009, 1),
(1486378033, 1),
(1486378117, 1),
(1486378222, 1),
(1486379759, 1),
(1486379812, 1),
(1486384218, 1),
(1487155618, 1),
(1488344557, 1),
(1488344595, 0),
(1488344614, 0),
(1488437014, 1);

-- --------------------------------------------------------

--
-- Table structure for table `saved_subject`
--

CREATE TABLE IF NOT EXISTS `saved_subject` (
  `book_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved_subject`
--

INSERT INTO `saved_subject` (`book_id`, `subject_id`) VALUES
(1359628784, 1),
(1359628552, 2),
(1486011445, 1),
(1486035437, 1),
(1486035545, 1),
(1486035734, 1),
(1486035987, 1),
(1486375137, 1),
(1486378009, 1),
(1486378033, 1),
(1486378117, 1),
(1486378222, 1),
(1486379759, 1),
(1486379812, 1),
(1486384218, 1),
(1487155618, 6),
(1488344557, 1),
(1488344595, 0),
(1488344614, 0),
(1488437014, 6);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) CHARACTER SET cp1251 NOT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`) VALUES
(1, 'Информатика'),
(6, 'Категория 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `userFamily` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8 NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(40) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1359629759 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `userFamily`, `name`, `address`, `phone`, `status`, `password`) VALUES
(1, '', '', 'Виктор Иванович', 'Gaa Akanbi', '07035198447', 'Staff', '1234'),
(2, '', '', 'Дмитрий Петрович', '107, Pipeline Road', '23470351984', 'Student', '1023'),
(1359629754, '', '', 'Петр Васильевич', '', '', 'Student', 'loginsdawdwdaw'),
(1359629755, '', '', 'Никнейм Фамильин', '', '', 'Student', 'wqdqwdwqdwqdqwdwdwq'),
(1359629756, 'Майкл', 'Споун', 'Micle', '', '', 'Student', '1010'),
(1359629757, '', '', 'John', '10', '10', 'Staff', ''),
(1359629758, '', '', 'Idiot', '', '34242', 'Staff', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_wanted_books`
--

CREATE TABLE IF NOT EXISTS `users_wanted_books` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
