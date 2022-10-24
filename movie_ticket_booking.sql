-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 17, 2021 at 11:18 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_ticket_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(111) NOT NULL,
  `cid` varchar(111) NOT NULL,
  `mid` varchar(111) NOT NULL,
  `Qty` int(11) NOT NULL,
  `dates` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `uid`, `cid`, `mid`, `Qty`, `dates`, `time`, `status`) VALUES
(2, '22', '5', '2', 2, '1982', '10', 0),
(3, '23', '5', '2', 1, '1982', '12', 1),
(4, '24', '6', '2', 5, '1982', '8', 0),
(6, '11', '6', '5', 1, '2007', '10', 0),
(7, '27', '5', '4', 2, '2003', '8', 1),
(8, '27', '6', '5', 1, '2005', '10', 1),
(9, '27', '5', '6', 1, '2002', '12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

DROP TABLE IF EXISTS `cinema`;
CREATE TABLE IF NOT EXISTS `cinema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(2222) NOT NULL,
  `city` varchar(2222) NOT NULL,
  `capacity` int(11) NOT NULL,
  `current` int(11) NOT NULL,
  `free` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `name`, `city`, `capacity`, `current`, `free`) VALUES
(5, 'Ambasader', 'Addis Abeba', 500, 6, 494),
(6, 'Ras cicema', 'Addis Abeba', 500, 7, 493);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `detail` varchar(2555) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `cover`, `detail`, `duration`, `trailer`) VALUES
(1, 'Free Guy', 'freeguy.jpg', 'For as long as residents can remember, the housing projects of Chicagoâ€™s Cabrini Green neighborhood were terrorized by a word-of-mouth ghost story about .', '2:00', 'https://www.youtube.com/watch?v=TPBH3XO8YEU'),
(2, 'CandyMan', 'Candyman_(2021_film).png', 'If Beale Street Could Talk, The Photograph), move into a luxury loft condo in Cabrini, now gentrified beyond recognition and inhabited by upwardly mobile millennials.\r\n', '1.45', 'https://www.youtube.com/watch?v=TPBH3XO8YEU'),
(3, 'the matrix', '1600221180_matrix.jpg', 'The matrix is an old and fauous movie.', '2:00', 'https://www.youtube.com/watch?v=TPBH3XO8YEU'),
(4, 'yene ', '1600222200_avengersendgame-20190417122917-18221.jpg', '', '1', ''),
(5, '3tegnaw Ayine', '3tegna ayin.png', 'hhtfuyg tughoijih hnj ', '2:00', 'https://www.youtube.com/watch?v=TPBH3XO8YEU'),
(6, 'The wolf of wall streat', 'dont breath.jpg', 'This is nice movie', '2', 'https://www.youtube.com/watch?v=TPBH3XO8YEU');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `passwords`, `role`) VALUES
(4, 'admin', 'bereketyezelalem@gmail.com', 'admin123', 0),
(7, 'somene', 'someone@register.com', '123456', 0),
(9, 'Jane', 'jane@patric.com', '12345678', 0),
(11, 'Yasir', 'Yasir@gmail.com', '12345678', 1),
(19, 'test', 'test@person.com', '123', 0),
(15, 'Sead', 'sead@home.com', '123', 0),
(16, 'eyob', 'eyob@amanuel.com', '123', 0),
(17, 'test', 'test@test.com', '123456', 0),
(18, 'henok', 'henok@gmail.com', '123', 0),
(20, 'eyob', 'eyob@amaanuel.com', '123', 1),
(21, 'dummy', 'dummy@dummyinfinty.always', '123', 0),
(22, 'beki', 'beki@ot.com', '123', 1),
(23, 'tati', 'tati@gmail.com', '12345678', 1),
(24, 'misgana', 'misgana@school.com', '12345678', 0),
(25, 'Sead', 'sead@home.nw', '123456', 0),
(26, 'misgee123', 'misge@google.com', '123456', 0),
(27, 'tests', 'samuel@movie.com', '123', 1),
(28, 'hermi', 'hermi@always.azig', '123456', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
