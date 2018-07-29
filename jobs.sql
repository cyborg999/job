-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 07:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `overview` varchar(1000) NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `industry` varchar(255) NOT NULL,
  `social_ids` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `overview`, `banner`, `industry`, `social_ids`, `size`, `telephone`, `email`, `photo`, `userid`, `mobile`) VALUES
(3, '2', '2', '2', '37e8c8d4ad2cfe6b9f6462695e8246be.png', '2', '2', '2', '2', '2', '37e8c8d4ad2cfe6b9f6462695e8246be.png', 6, 2),
(4, 'Hays Specialist', 'Tampa, Florida, US', 'Hays is the expert at recruiting qualified, professional and skilled people worldwide. We operate across the private and public sectors, dealing in full-time positions, contract roles and temporary assignments. Hays employs over 9,000 staff operating from over 250 offices in 33 countries across 20 specialisms. \r\n\r\nLast year our experts placed 67,000 candidates into permanent jobs and over 220,000 people into interim or contract assignments. We attract the best candidates, make the best match and provide the best industry expertise, delivered through our commitment to service excellence. \r\nOur website www.hays.com', NULL, 'Staffing/Employment Agencies', 'fb', '5,000 to 9,999 employees', '', 'hays@gmail.com', 'a2b5f1c3c8dec2a3173ec1409c015e2a.gif', 9, 78687678);

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `name`, `link`, `userid`) VALUES
(1, 'fb', 'fb.com', 92);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `dateregistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `usertype`, `deleted`, `dateregistered`) VALUES
(1, 'cyborg999', 'aaaaaaa', 'applicant', 0, '2018-07-28 17:22:02'),
(2, 'cyborg999', 'aaaaaa', 'applicant', 0, '2018-07-28 17:22:02'),
(3, 'cybo', 'aaaaaa', 'applicant', 0, '2018-07-28 17:22:02'),
(4, 'jordan', 'aaaaaa', 'applicant', 0, '2018-07-28 17:22:18'),
(5, 'jordan1', 'aaaaaa', 'applicant', 0, '2018-07-28 17:58:50'),
(6, 'loki999', 'matantei999', 'applicant', 0, '2018-07-29 05:11:18'),
(7, 'ffuf', 'aaaaaa', 'employer', 0, '2018-07-29 07:17:41'),
(8, 'dan999', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'applicant', 0, '2018-07-29 07:42:42'),
(9, 'company', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'employer', 0, '2018-07-29 12:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `skill_ids` varchar(255) NOT NULL,
  `industry_ids` varchar(255) NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `social_ids` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `firstname`, `lastname`, `middlename`, `dob`, `address`, `mobile`, `nationality`, `skill_ids`, `industry_ids`, `resume`, `photo`, `email`, `userid`, `social_ids`, `gender`) VALUES
(4, '2', '2', '2', '0000-00-00', '2', 2, '2', '2', '2', NULL, 'afb09376f2c30cab320d9317ee39bb9e.png', '2', 6, '2', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
