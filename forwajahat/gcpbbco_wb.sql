-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2019 at 09:18 AM
-- Server version: 5.6.41
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcpbbco_wb`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_registration_tb`
--

CREATE TABLE `company_registration_tb` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `paymentStatus` int(11) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `DesignCompanyName` varchar(255) NOT NULL,
  `Titledesign` varchar(255) NOT NULL,
  `Caption` varchar(500) NOT NULL,
  `UniqueFeatures` varchar(1000) NOT NULL,
  `Preffered_medium_one` varchar(255) NOT NULL,
  `Preffered_medium_two` varchar(255) NOT NULL,
  `meeting_time` varchar(255) NOT NULL,
  `agreeWithPolicy` varchar(50) NOT NULL,
  `gcpbb_code` varchar(10) NOT NULL,
  `uploaded_file_URL` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_registration_tb`
--

INSERT INTO `company_registration_tb` (`id`, `name`, `paymentStatus`, `email`, `phone`, `companyname`, `industry`, `DesignCompanyName`, `Titledesign`, `Caption`, `UniqueFeatures`, `Preffered_medium_one`, `Preffered_medium_two`, `meeting_time`, `agreeWithPolicy`, `gcpbb_code`, `uploaded_file_URL`) VALUES
(36, 'this is me', 1, 'hkmarkhand@gmail.com', '231323', 'dssdfds ', 'dssdfds ', 'dssdfds ', 'dssdfds ', 'dssdfds ', 'dssdfds ', 'Email', 'SMS', '2019-06-12T19:30', 'No', '06H1ZI', 'https://gcpbb.co.uk/Folder/1553096007.png'),
(37, 'Wajahat Ullah Khan', 1, 'wajahat.ish@gmail.com', '123123132', 'DigitonicsLabs', 'PPC Model', 'Brand Team', 'COPYRIGHT', 'Kesa DIya ', 'Teen ankhen', 'Chat', 'Phone', '2019-06-12T19:30', 'No', 'U3O78K', 'https://gcpbb.co.uk/Folder/1553205149.png'),
(38, 'andfad addsa', 0, 'adada@dad.com', '11811005121', 'daada', 'dafra', 'dadae', 'daeada', 'adaease', 'adwsadad', 'Phone', 'Chat', '2019-06-12T19:30', 'No', 'T8RDRE', 'https://gcpbb.co.uk/Folder/1553535505.PNG'),
(39, 'qfq', 0, 'asFQW', '5738753', 'FQWEF2E', 'FQWEQ', 'FQWQ', 'FQF', 'EFQ', 'FQQWE', 'Phone', 'Chat', '2019-06-12T19:30', 'No', 'NHYXEH', 'https://gcpbb.co.uk/Folder/1553689852.PNG'),
(40, 'Zac Wolfe', 0, 'zac.wolfe@videoanimators.co.uk', '3104699411', 'pro-shooter', 'real estate', 'Video Cottage', 'Pro - shooter', 'The best a man can get', 'The feel', 'Phone', 'Email', '2019-06-12T19:30', 'No', 'TQTK4W', 'https://gcpbb.co.uk/Folder/1553694865.JPG'),
(41, 'Jesse Messenger', 0, 'jesse@attractive.media', '5709825644', 'Attractive.Media', 'Advertising', 'Attractive.Media', 'Attractive.Media Logo', '(No Caption)', 'Font and layout of text.', 'Phone', 'Email', '2019-05-29T19:30', 'No', '1XY06O', 'https://gcpbb.co.uk/Folder/1559009636.png'),
(42, 'wajahat', 0, 'wajahat.u.khan@hotmail.com', '23123123', 'asdasda', 'sdasdasd', 'asdasd', 'dasdasda', 'sdasdasd', 'asdasd', 'Chat', 'Email', '2019-06-14T19:30', 'No', 'C8Z9N7', 'https://gcpbb.co.uk/Folder/1561982306.png');

-- --------------------------------------------------------

--
-- Table structure for table `getstartedquote`
--

CREATE TABLE `getstartedquote` (
  `id` int(11) NOT NULL,
  `cust_name` varchar(255) DEFAULT NULL,
  `cust_email` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `cust_phonenumber` varchar(255) DEFAULT NULL,
  `Package` varchar(255) DEFAULT NULL,
  `cust_comment` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `getstartedquote`
--

INSERT INTO `getstartedquote` (`id`, `cust_name`, `cust_email`, `country_code`, `country_name`, `cust_phonenumber`, `Package`, `cust_comment`) VALUES
(19, 'this is me', 'hkmarkhand@gmail.com', '+92', 'Pakistan ', '123231', 'Copyrights - Â£499', 'sadasddasdsa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'owner', 'solution123+');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_registration_tb`
--
ALTER TABLE `company_registration_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getstartedquote`
--
ALTER TABLE `getstartedquote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_registration_tb`
--
ALTER TABLE `company_registration_tb`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `getstartedquote`
--
ALTER TABLE `getstartedquote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
