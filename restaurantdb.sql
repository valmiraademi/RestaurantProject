-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 09:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurantdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `chefsid` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `position` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`chefsid`, `firstname`, `lastname`, `position`, `image`, `description`) VALUES
(17, 'Jamie', 'Oliver', 'HeadChef', '2.jpg', 'Oliver is one of the most recognisable chefs today, and some of his television programmes have aired in other countries, such as the Emmy Award–winning show'),
(18, 'Nigella', 'Lawson', 'Chef', '1.jpg', 'She even won Author of the Year for the British Book Awards in 2001.'),
(19, 'Delia', 'Smith', 'Sous Chef', '3.jpg', ' She wrote for 12 years about cooking and famous chefs around the world. After making television appearances in Family Far, she soon became a resident cook on the BBC.');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactid`, `userid`, `message`) VALUES
(1, NULL, 'Valmira Ademi Valmira Ademi Valmira Ademi'),
(3, NULL, 'Valmira Ademi Valmira Ademi Valmira Ademi'),
(7, 62, ' I would like to meet the restaurant owner to talk about a collaboration opportunity');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menuid` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `price` int(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menuid`, `name`, `type`, `price`, `image`) VALUES
(20, 'Beef', 'Lunch', 20, '1.jpg'),
(21, 'Chicken', 'Lunch', 100, '7.jpg'),
(22, 'Salad', 'Lunch', 40, '4.jpg'),
(23, 'Fried Rice', 'Lunch', 50, '6.jpg'),
(24, 'Lemon Chicken', 'Dinner', 100, '7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonialid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `position` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `rating` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonialid`, `userid`, `position`, `image`, `description`, `rating`) VALUES
(4, 62, 'Client', '2.jpg', 'This place is great! Atmosphere is chill and cool but the staff is also really friendly. They know what they’re doing and what they’re talking about, and you can tell making the customers happy is their main priority. Food is pretty good, some italian classics and some twists, and for their prices it’s 100% worth it.', 4),
(5, 63, 'Boss', '3.jpg', 'Oliver is one of the most recognisable chefs today, and some of his television programmes have aired in other countries, such as the Emmy Award–winning show', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `role` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `phone`, `email`, `username`, `password`, `role`) VALUES
(60, 'Valmira', 'Ademi', '+383 45 555 555', 'valmira@gmail.com', 'Valmira', '$2y$10$AE7Q8Vllf1T8b41b8ZDpT.wJEbS/vIf0uiUl9a9w/yR4LsWLAxKGK', b'1'),
(62, 'Jamie', 'Oliver', '+383 45 555 555', 'jamie@gmail.com', 'Jamieee', '$2y$10$d4tgvhGXRQQMEUdU60TYs.EPSk7n2ZVFYNT3ECUR5g4bt9gCysLMG', b'0'),
(63, 'Ardit', 'Sekiraqa', '+383 45 444 444', 'valmiraademiii@gmail.com', 'Ardit', '$2y$10$PA9PDHqvSizfN7eLPretPu.XPPfBERwkAfzAtuirPPvwxM..d9RUu', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`chefsid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menuid`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonialid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `chefsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonialid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contactus`
--
ALTER TABLE `contactus`
  ADD CONSTRAINT `contactus_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
