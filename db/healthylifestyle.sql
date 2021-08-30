-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 04:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthylifestyle`
--

-- --------------------------------------------------------

--
-- Table structure for table `artical`
--

CREATE TABLE `artical` (
  `artical_id` int(10) NOT NULL,
  `artical_title` varchar(50) NOT NULL,
  `artical_text` text NOT NULL,
  `artical_classification` varchar(50) NOT NULL,
  `artical_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artical`
--

INSERT INTO `artical` (`artical_id`, `artical_title`, `artical_text`, `artical_classification`, `artical_image`) VALUES
(3, 'Nutrition Diet', 'In nutrition, diet is the sum of food consumed by a person or other organism.[1] The word diet often implies the use of specific intake of nutrition for health or weight-management reasons (with the two often being related). Although humans are omnivores, each culture and each person holds some food preferences or some food taboos. This may be due to personal tastes or ethical reasons. Individual dietary choices may be more or less healthy.\r\n\r\nComplete nutrition requires ingestion and absorption of vitamins, minerals, essential amino acids from protein and essential fatty acids from fat-containing food, also food energy in the form of carbohydrate, protein, and fat. Dietary habits and choices play a significant role in the quality of life, health and longevity.', 'tips nutration', 'dietNutrition1.jpg'),
(4, 'Nutrition Diet 2', 'In nutrition, diet is the sum of food consumed by a person or other organism.[1] The word diet often implies the use of specific intake of nutrition for health or weight-management reasons (with the two often being related).', 'tips nutration', 'dietNutrition2.jpg'),
(5, 'Nutrition Diet 3', 'dsajijdusahuidhasuhdisua', 'tips nutration', 'comp.jpg'),
(6, 'Nutrition Diet 2', 'Hi Sheleh \r\nFrom Ahmad Rade', 'Food Recipes', 'cc.png');

-- --------------------------------------------------------

--
-- Table structure for table `blooddonation`
--

CREATE TABLE `blooddonation` (
  `ID` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `secondName` varchar(100) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `FromUsers` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blooddonation`
--

INSERT INTO `blooddonation` (`ID`, `firstName`, `secondName`, `lastName`, `email`, `gender`, `age`, `weight`, `telephone`, `address`, `city`, `hospital`, `disease`, `FromUsers`) VALUES
(3, 'Abed', 'MHD', 'Ghandour', 'abed@gmail.com', 'male', 22, 73, '0790714916', 'al-hashmi al-shmali', 'Amman', 'Prince Hamzah Hospital', 'Anything', 1),
(4, 'Alaa', 'Khalid', 'Yotman', 'alaa@gmail.com', 'male', 23, 70, '0791257649', 'amman', 'Amman', 'Prince Hamzah Hospital', 'AnyThing', 1),
(5, 'test', 'test', 'test', 'test@gmail.com', 'female', 20, 80, '0795698425', 'zarqa', 'zarqaa', 'Zarqa Modern Hospital', 'dsadas', 1),
(6, 'Abed', 'MHD', 'Ghandour', 'abed.@gmail.com', 'male', 22, 73, '0790714916', 'al-hashmi al-shmali', 'Amman', 'Prince Hamzah Hospital', 'Anything', 1),
(8, 'Abed', 'MHD', 'Ghandour', 'djsaijd@gmail.com', 'male', 22, 73, '0790714916', 'al-hashmi al-shmali', 'Amman', 'Prince Hamzah Hospital', 'AnyThing', 0),
(9, 'Abed', 'MHD', 'Ghandour', 'abed@gmail.com', 'male', 22, 73, '0790714916', 'al-hashmi al-shmali', 'Amman', 'Prince Hamzah Hospital', 'Anything', 1),
(10, 'aaaa', 'aaa', 'aaa', 'aaa@gmail.com', 'male', 99, 99, '0790790790', 'aaaaa', 'Amman', 'Prince Hamzah Hospital', 'dsada', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `userID` int(5) NOT NULL,
  `comment` text NOT NULL,
  `agreeComment` tinyint(1) NOT NULL,
  `artical_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `userID`, `comment`, `agreeComment`, `artical_id`) VALUES
(1, 23, 'Nice Comment', 1, 6),
(2, 23, 'Nice Post', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(50) NOT NULL,
  `userID` int(5) NOT NULL,
  `opinon` text NOT NULL,
  `agreeFeedback` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `userID`, `opinon`, `agreeFeedback`) VALUES
(10, 23, 'Hello', 1),
(11, 23, 'OKAY', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(5) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(5) NOT NULL,
  `password` varchar(15) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `weight` int(3) NOT NULL,
  `height` int(3) NOT NULL,
  `image` text NOT NULL,
  `ownTable` varchar(255) NOT NULL DEFAULT 'steady diet',
  `GroupID` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `email`, `age`, `password`, `gender`, `weight`, `height`, `image`, `ownTable`, `GroupID`) VALUES
(22, 'Admin1', 'admin1@gmail.com', 18, '123', 'male', 0, 0, 'admin1.png', '', 1),
(23, 'abed', 'abed@gmail.com', 22, '123', 'male', 75, 175, '15280.jpg', 'steady diet', 0),
(24, 'ahmad', 'Ahmad@gmail.com', 18, '123', 'male', 65, 170, 'mencat1.jpg', 'steady diet', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artical`
--
ALTER TABLE `artical`
  ADD PRIMARY KEY (`artical_id`);

--
-- Indexes for table `blooddonation`
--
ALTER TABLE `blooddonation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `userIDForComments_FK` (`userID`),
  ADD KEY `articalIDForComments_FK` (`artical_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `userID_FK` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artical`
--
ALTER TABLE `artical`
  MODIFY `artical_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blooddonation`
--
ALTER TABLE `blooddonation`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `articalIDForComments_FK` FOREIGN KEY (`artical_id`) REFERENCES `artical` (`artical_id`),
  ADD CONSTRAINT `userIDForComments_FK` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `userID_FK` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
