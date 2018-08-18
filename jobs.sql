-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2018 at 07:53 AM
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
  `mobile` int(11) NOT NULL,
  `completed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `overview`, `banner`, `industry`, `social_ids`, `size`, `telephone`, `email`, `photo`, `userid`, `mobile`, `completed`) VALUES
(3, '2', '2', '2', '37e8c8d4ad2cfe6b9f6462695e8246be.png', '2', '2', '2', '2', '2', '37e8c8d4ad2cfe6b9f6462695e8246be.png', 6, 2, 0),
(4, 'Hays Specialist', 'Tampa, Florida, US', 'Hays is the expert at recruiting qualified, professional and skilled people worldwide. We operate across the private and public sectors, dealing in full-time positions, contract roles and temporary assignments. Hays employs over 9,000 staff operating from over 250 offices in 33 countries across 20 specialisms. \r\n\r\nLast year our experts placed 67,000 candidates into permanent jobs and over 220,000 people into interim or contract assignments. We attract the best candidates, make the best match and provide the best industry expertise, delivered through our commitment to service excellence. \r\nOur website www.hays.com', 'd118f39d3444485ec693535f37925461.png', 'Staffing/Employment Agencies', 'fb', '5,000 to 9,999 employees', '09345353', 'hays@gmail.com', 'a2b5f1c3c8dec2a3173ec1409c015e2a.gif', 9, 78687678, 0),
(5, 'jordans', '', '', NULL, '', '', '', '', '', NULL, 11, 0, 0),
(6, 'asdsad', '', '', 'f4abe06c5c3752d36886bac2b10220d9.png', '', '', '', '', '', '733f5111c19fea69076ee001539213a9.png', 12, 0, 1),
(7, 'jordan sadiwa', '3242 zfdsfd', '', 'd118f39d3444485ec693535f37925461.png', '', '', '', '', 'sad@mail.com', '93e43439321d51bb2a5eeb7b1e57b4b6.jpeg', 21, 342424, 1);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `school` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `school`, `level`, `datestart`, `dateend`, `userid`) VALUES
(1, 'ASDASD', 'Academic', '0000-00-00', '0000-00-00', 23),
(2, 'ASDASD', 'Academic', '0000-00-00', '0000-00-00', 23),
(3, 'ASDASD', 'Academic', '0000-00-00', '0000-00-00', 23),
(4, 'ASDASD', 'Academic', '0000-00-00', '0000-00-00', 23),
(5, 'ASDASD', 'Academic', '0000-00-00', '0000-00-00', 23),
(6, 'ASDASD', 'Academic', '0000-00-00', '0000-00-00', 23),
(7, 'ASDASD', 'Academic', '2018-08-01', '0000-00-00', 23),
(8, 'ASDASD', 'Academic', '2018-08-01', '2018-08-01', 23),
(9, 'ASDASD', 'Bachelor', '2018-08-01', '2018-08-01', 23),
(10, 'Infinite Devworks', 'Bachelor', '2018-08-01', '2018-08-01', 23),
(11, 'ASDASD', 'Bachelor', '2018-08-01', '2018-08-01', 23),
(12, 'Infinite Devworks', 'Bachelor', '2018-08-01', '2018-08-01', 23),
(13, 'Infinite Devworks', 'Bachelor', '2018-08-01', '2018-08-01', 23),
(14, 'Infinite Devworks', 'Bachelor', '2018-08-01', '2018-08-01', 23),
(15, 'Infinite Devworks', 'Bachelor', '2018-08-01', '2018-08-01', 23),
(16, 'Infinite Devworks', 'Bachelor', '2018-08-01', '2018-08-01', 23);

-- --------------------------------------------------------

--
-- Table structure for table `emp_history`
--

CREATE TABLE `emp_history` (
  `id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL DEFAULT '0',
  `companyname` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `jobrole` longtext NOT NULL,
  `jobdesc` longtext NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_history`
--

INSERT INTO `emp_history` (`id`, `companyid`, `companyname`, `startdate`, `enddate`, `jobrole`, `jobdesc`, `userid`) VALUES
(1, 0, 'MemeisLove', '2018-08-14', '2019-10-18', 'PHP Dev', 'desc', 23),
(2, 0, 'US Autoparts', '2018-08-12', '2018-08-17', 'PHP Dev', 'ncluding fractional months in the above is much more complicated, because three days in a typical February is a larger fraction of that month (~10.714%) than three days in August (~9.677%), and of course even February is a moving target depending on whether it\'s a leap year.', 23),
(4, 0, 'asd', '2018-08-15', '2018-08-23', 'asdasd', 'asd', 23),
(5, 0, 'asdsad', '2018-08-17', '2018-08-23', 'asdasd', 'asdsad', 23),
(6, 0, 'company', '2018-08-16', '2018-08-15', 'web dev', 'some lorem ipsum job description.', 23),
(7, 0, 'company', '2018-08-16', '2018-08-15', 'web dev', 'some lorem ipsum job description.', 23),
(8, 0, 'company', '2018-08-16', '2018-08-15', 'web dev', 'some lorem ipsum job description.', 23),
(9, 0, 'company', '2018-08-16', '2018-08-15', 'web dev', 'some lorem ipsum job description.', 23),
(10, 0, 'MemeisLove', '2018-08-01', '2018-08-15', 'php def', 'asdada', 23);

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`) VALUES
(1, 'HR'),
(2, 'Finance & Accounts'),
(3, 'IT'),
(4, 'Purchase & Supply Chain'),
(5, 'Admin/Secretarial'),
(6, 'Legal'),
(7, 'Customer Service/ BPO/ KPO'),
(8, 'Sales'),
(9, 'Marketing'),
(10, 'Industry Specific Functions'),
(11, 'Banking & Financial Services'),
(12, 'Manufacturing'),
(13, 'Oil & Gas'),
(16, 'Pharma & Biotech'),
(17, 'Telecom & ISP'),
(18, 'Export/Import'),
(19, 'Construction'),
(20, 'Health Care'),
(21, 'Real Estate'),
(22, 'Travel & Airlines'),
(23, 'Education/Teaching'),
(24, 'Hotels & Restaurants'),
(25, 'Retailing'),
(26, 'Advertising & Media'),
(27, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `userid` int(11) NOT NULL,
  `processing_time` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `min_experience` varchar(255) NOT NULL,
  `expire_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `industryid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `otherdesc` longtext NOT NULL,
  `desclist` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `companyid`, `description`, `userid`, `processing_time`, `salary`, `min_experience`, `expire_date`, `status`, `industryid`, `title`, `otherdesc`, `desclist`) VALUES
(9, 9, 'CGI is looking for a mid-level developer proficient in front-end development technologies including Javascript, Drupal, PHP, and JQuery. The candidate selected for this position will have the opportunity to support government public-facing web sites, helping to educate the public on federal regulations and issues. The selected candidate will also build applications to collect data reported by industry to comply with federal regulations.\r\n', 9, '2-3 Days', '120,000-160,000', '3 Years Working Experience', '2018-08-25', 0, 0, 'PHP Developer at CGI', 'Please note, this email address is only to be used for those individuals who need an accommodation to apply for a job. Emails for any other reason or those that do not include a requisition number will not be returned.\r\n', 'We make it easy to translate military experience and skills! Clickhereto be directed to our site that is dedicated to veterans and transitioning service members.]All CGI offers of employment in the U.S. are contingent upon the ability to successfully complete a background investigation. Background investigation components can vary dependent upon specific assignment and/or level of US government security clearance held.]CGI will not discharge or in any other manner discriminate against employees or applicants because they have inquired about, discussed, or disclosed their own pay or the pay of another employee or applicant. However, employees who have access to the compensation information of other employees or applicants as a part of their essential job functions cannot disclose the pay of other employees or applicants to individuals who do not otherwise have access to compensation information, unless the disclosure is (a) in response to a formal complaint or charge, (b) in furtherance of an investigation, proceeding, hearing, or action, including an investigation conducted by the employer, or (c) consistent with CGIs legal duty to furnish information.');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `name`, `level`, `userid`) VALUES
(1, 'PHP Programming', 1, 23),
(2, 'asdasd', 0, 23),
(3, 'asdsad', 4, 23),
(4, 'asdasd', 2, 23),
(5, 'asdasdsa', 2, 23),
(6, 'asd', 4, 23),
(7, 'asdsfsdf', 4, 23),
(13, 'sadasd', 4, 23),
(14, 'sadasd', 4, 23),
(15, 'sadasd', 4, 23),
(16, 'sadasd', 4, 23),
(17, 'sadasd', 4, 23),
(18, 'sadasd', 4, 23),
(19, 'sadasd', 4, 23),
(20, 'sadasd', 4, 23),
(21, 'sadasd', 4, 23),
(22, 'sadasd', 4, 23),
(23, 'sadasd', 4, 23),
(24, 'sadasd', 4, 23),
(25, 'PHP', 2, 23),
(26, 'PHP', 2, 23);

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
(1, 'fb', 'fb.com', 92),
(8, 'jordan sadiwa', '', 12),
(9, 'asd', '', 12),
(10, 'fb', '', 21),
(11, 'twitter', 'fb', 23),
(12, 'fb', 'fb', 23);

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
(9, 'company', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'employer', 0, '2018-07-29 12:50:49'),
(10, 'admin', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'applicant', 0, '2018-08-04 12:57:32'),
(11, 'test Company', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'employer', 0, '2018-08-04 16:03:31'),
(12, 'employer', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'employer', 0, '2018-08-04 16:09:18'),
(13, 'employer2', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'employer', 0, '2018-08-11 08:15:06'),
(14, 'employer3', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'employer', 0, '2018-08-11 08:16:29'),
(15, 'employer4', '95cd95ec0f585a3c1da0f400cbb91b3d', 'applicant', 0, '2018-08-11 08:26:56'),
(16, 'emp5', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'employer', 0, '2018-08-11 08:27:26'),
(17, 'EMP3', '36d04a9d74392c727b1a9bf97a7bcbac', 'employer', 0, '2018-08-11 08:29:56'),
(18, 'asdasd', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'employer', 0, '2018-08-11 08:32:19'),
(19, 'adsasd', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'employer', 0, '2018-08-11 08:33:21'),
(20, 'asdasda', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'employer', 0, '2018-08-11 08:34:55'),
(21, 'dandan', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'employer', 0, '2018-08-11 08:55:06'),
(22, 'employer999', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'employer', 0, '2018-08-11 15:40:01'),
(23, 'applicant', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'applicant', 0, '2018-08-12 16:27:43');

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
  `gender` varchar(255) NOT NULL,
  `completed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `firstname`, `lastname`, `middlename`, `dob`, `address`, `mobile`, `nationality`, `skill_ids`, `industry_ids`, `resume`, `photo`, `email`, `userid`, `social_ids`, `gender`, `completed`) VALUES
(4, '2', '2', '2', '0000-00-00', '2', 2, '2', '2', '2', NULL, 'afb09376f2c30cab320d9317ee39bb9e.png', '2', 6, '2', 'female', 0),
(5, 'jordan', 'sadiwa', 'DLR', '2018-08-07', '3242 zfdsfd', 342424, 'Hong Kong', '', '', NULL, NULL, 'sad@mail.com', 23, '', 'male', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_history`
--
ALTER TABLE `emp_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `emp_history`
--
ALTER TABLE `emp_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
