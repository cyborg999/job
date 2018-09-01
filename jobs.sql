-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2018 at 07:28 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `terms` longtext,
  `contact` longtext NOT NULL,
  `privacy` longtext NOT NULL,
  `about` longtext NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `terms`, `contact`, `privacy`, `about`, `logo`, `name`) VALUES
(8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'ContactLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'PriLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'AbotLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `jobid`, `userid`, `status`) VALUES
(6, 9, 23, 0),
(7, 9, 23, 0);

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
  `completed` int(11) NOT NULL DEFAULT '0',
  `approved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `overview`, `banner`, `industry`, `social_ids`, `size`, `telephone`, `email`, `photo`, `userid`, `mobile`, `completed`, `approved`) VALUES
(3, '2', '2', '2', '37e8c8d4ad2cfe6b9f6462695e8246be.png', '2', '2', '2', '2', '2', '37e8c8d4ad2cfe6b9f6462695e8246be.png', 6, 2, 0, 0),
(4, 'Hays Specialist', 'Tampa, Florida, US', 'Hays is the expert at recruiting qualified, professional and skilled people worldwide. We operate across the private and public sectors, dealing in full-time positions, contract roles and temporary assignments. Hays employs over 9,000 staff operating from over 250 offices in 33 countries across 20 specialisms. \r\n\r\nLast year our experts placed 67,000 candidates into permanent jobs and over 220,000 people into interim or contract assignments. We attract the best candidates, make the best match and provide the best industry expertise, delivered through our commitment to service excellence. \r\nOur website www.hays.com', 'd118f39d3444485ec693535f37925461.png', 'Staffing/Employment Agencies', 'fb', '5,000 to 9,999 employees', '09345353', 'hays@gmail.com', 'a2b5f1c3c8dec2a3173ec1409c015e2a.gif', 9, 78687678, 1, 0),
(5, 'jordans', '', '', NULL, '', '', '', '', '', NULL, 11, 0, 0, 0),
(6, 'asdsad', '', '', 'f4abe06c5c3752d36886bac2b10220d9.png', '', '', '', '', '', '733f5111c19fea69076ee001539213a9.png', 12, 0, 1, 0),
(7, 'jordan sadiwa', '3242 zfdsfd', '', 'd118f39d3444485ec693535f37925461.png', '', '', '', '', 'sad@mail.com', '93e43439321d51bb2a5eeb7b1e57b4b6.jpeg', 21, 342424, 1, 0);

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
(15, 'Infinite Devworks', 'Bachelor', '2018-08-01', '2018-08-01', 23),
(17, 'Marinduque State College', 'Bachelor', '2018-08-01', '2018-08-01', 25),
(18, 'Marinduque State College', 'Bachelor', '2018-08-01', '2018-08-01', 25),
(19, 'Marinduque State College', 'Doctorate', '2018-08-01', '2018-08-01', 26),
(21, 'Marinduque State College', 'Master', '2018-08-01', '2018-08-01', 23),
(22, 'Infinite Devworks', 'Master', '2018-08-01', '2018-08-01', 23);

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
(2, 0, 'US Autoparts', '2018-08-12', '2018-08-17', 'PHP Dev', 'ncluding fractional months in the above is much more complicated, because three days in a typical February is a larger fraction of that month (~10.714%) than three days in August (~9.677%), and of course even February is a moving target depending on whether it\'s a leap year.', 23),
(16, 0, 'MemeisLove', '2018-08-02', '2018-08-29', 'PHP Developer', 'some desc', 25),
(17, 0, 'MemeisLove', '2018-08-16', '2018-08-23', 'PHP Dev', 'sfsdfs', 26),
(18, 0, 'Infinite Dev Works', '2018-08-08', '2018-11-17', 'PHP Dev', 'lorem', 23);

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
  `desclist` longtext NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `companyid`, `description`, `userid`, `processing_time`, `salary`, `min_experience`, `expire_date`, `status`, `industryid`, `title`, `otherdesc`, `desclist`, `date_added`) VALUES
(9, 9, 'CGI is looking for a mid-level developer proficient in front-end development technologies including Javascript, Drupal, PHP, and JQuery. The candidate selected for this position will have the opportunity to support government public-facing web sites, helping to educate the public on federal regulations and issues. The selected candidate will also build applications to collect data reported by industry to comply with federal regulations.\r\n', 9, '2-3 Days', '120,000-160,000', '3 Years Working Experience', '2018-08-25', 0, 0, 'PHP Developer at CGI', 'Please note, this email address is only to be used for those individuals who need an accommodation to apply for a job. Emails for any other reason or those that do not include a requisition number will not be returned.\r\n', 'We make it easy to translate military experience and skills! Clickhereto be directed to our site that is dedicated to veterans and transitioning service members.]All CGI offers of employment in the U.S. are contingent upon the ability to successfully complete a background investigation. Background investigation components can vary dependent upon specific assignment and/or level of US government security clearance held.]CGI will not discharge or in any other manner discriminate against employees or applicants because they have inquired about, discussed, or disclosed their own pay or the pay of another employee or applicant. However, employees who have access to the compensation information of other employees or applicants as a part of their essential job functions cannot disclose the pay of other employees or applicants to individuals who do not otherwise have access to compensation information, unless the disclosure is (a) in response to a formal complaint or charge, (b) in furtherance of an investigation, proceeding, hearing, or action, including an investigation conducted by the employer, or (c) consistent with CGIs legal duty to furnish information.', '2018-08-18 15:58:06'),
(10, 9, 'CGI is looking for a mid-level developer proficient in front-end development technologies including Javascript, Drupal, PHP, and JQuery. The candidate selected for this position will have the opportunity to support government public-facing web sites, helping to educate the public on federal regulations and issues. The selected candidate will also build applications to collect data reported by industry to comply with federal regulations.\r\n', 9, '2-3 Days', '120,000-160,000', '3 Years Working Experience', '2018-08-25', 0, 0, 'Web Developer', 'Please note, this email address is only to be used for those individuals who need an accommodation to apply for a job. Emails for any other reason or those that do not include a requisition number will not be returned.\r\n', 'We make it easy to translate military experience and skills! Clickhereto be directed to our site that is dedicated to veterans and transitioning service members.]All CGI offers of employment in the U.S. are contingent upon the ability to successfully complete a background investigation. Background investigation components can vary dependent upon specific assignment and/or level of US government security clearance held.]CGI will not discharge or in any other manner discriminate against employees or applicants because they have inquired about, discussed, or disclosed their own pay or the pay of another employee or applicant. However, employees who have access to the compensation information of other employees or applicants as a part of their essential job functions cannot disclose the pay of other employees or applicants to individuals who do not otherwise have access to compensation information, unless the disclosure is (a) in response to a formal complaint or charge, (b) in furtherance of an investigation, proceeding, hearing, or action, including an investigation conducted by the employer, or (c) consistent with CGIs legal duty to furnish information.', '2018-08-18 15:58:06'),
(11, 12, 'some desc', 12, '5-7 Days', '20,000- 50,000', ' 3 Years', '2018-08-24', 0, 0, 'Web Developer', 'header', '', '2018-08-18 17:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` varchar(255) DEFAULT NULL,
  `seen` int(11) NOT NULL DEFAULT '0',
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `content`, `sender`, `receiver`, `seen`, `dateadded`) VALUES
(24, 'Required forms have been updated by the administrator.<br>Please comply with the new requirements in order to post a new job.', 28, '9', 1, '2018-09-01 16:44:58'),
(25, 'Your account has been approved.<br> You can now post a new job opening.', 28, '4', 0, '2018-09-01 16:45:14'),
(26, 'Required forms have been updated by the administrator.<br>Please comply with the new requirements in order to post a new job.', 28, '9', 1, '2018-09-01 16:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `filename`, `active`, `dateadded`) VALUES
(71, '5b4ecc3aa89441e04b839fc2392ead53.png', 1, '2018-08-29 15:09:22'),
(72, 'dee20a9f2dae8ca2c592292f5fcaed27.png', 1, '2018-08-29 15:10:39'),
(73, '1fd0476eca4e8a345d40ad06944c2718.png', 1, '2018-08-29 15:31:50'),
(74, '62ceda10c7dca2bf6d7bef7234166120.jpg', 1, '2018-09-01 13:42:31'),
(75, '55a1d747e74ae579d5e54a0f08ef71be.jpg', 1, '2018-09-01 13:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `requirement`
--

CREATE TABLE `requirement` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `location` varchar(255) DEFAULT NULL,
  `requirement_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requirement`
--

INSERT INTO `requirement` (`id`, `name`, `userid`, `level`, `location`, `requirement_id`) VALUES
(37, '', 9, 1, 'uploads/9/5118c63d9bfcd58f6fd627929f78e162.jpg', 10),
(38, '', 9, 1, 'uploads/9/3742ddd4085c6c0ece97655e4bb7a6c8.jpg', 11),
(39, '', 9, 1, 'uploads/9/1b6d4794cf42f67a5a58fe8c33e05603.jpg', 12),
(40, '', 21, 1, 'uploads/21/36365401cfa9ee33ef474d17788e494e.jpg', 10),
(41, '', 21, 1, 'uploads/21/36365401cfa9ee33ef474d17788e494e.jpg', 11),
(42, '', 21, 1, 'uploads/21/36365401cfa9ee33ef474d17788e494e.jpg', 12),
(48, 'Registration Form', 28, 0, NULL, NULL),
(49, 'NSO', 28, 0, NULL, NULL),
(50, 'BIR', 28, 0, NULL, NULL),
(51, 'Brgy Clearance', 28, 0, NULL, NULL),
(52, 'form', 28, 0, NULL, NULL),
(53, 'ffffff', 28, 0, NULL, NULL),
(54, 'adasd', 28, 0, NULL, NULL),
(55, 'adas', 28, 0, NULL, NULL);

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
(29, 'PHP', 3, 26),
(34, 'Web Development', 4, 23),
(35, 'PHP', 4, 23),
(36, 'Javascript', 2, 23),
(37, 'CSS/CSS3', 4, 23),
(38, 'Photoshop', 3, 23),
(39, 'MS Office', 3, 23);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `photoid` int(11) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `photoid`, `dateadded`) VALUES
(52, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 73, '2018-08-29 15:31:50'),
(53, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\ncillum dolore eu fugiat nulla pariatur.', 74, '2018-09-01 13:42:32'),
(54, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 75, '2018-09-01 13:43:08');

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
(14, 'fb', 'fn.vom', 25),
(15, 'jordan sadiwa', 'sfsdf', 26),
(18, 'jordan sadiwa', 'test.com', 23);

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
(23, 'applicant', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'applicant', 0, '2018-08-12 16:27:43'),
(24, 'applicant2', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'applicant', 0, '2018-08-18 18:01:05'),
(25, 'applicant3', '80228fe3343c9613474abdc5d549416d', 'applicant', 0, '2018-08-20 13:29:53'),
(26, 'applicant4', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'applicant', 0, '2018-08-20 15:14:44'),
(27, 'applicant6', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'applicant', 0, '2018-08-22 10:33:20'),
(28, 'admin', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'admin', 0, '2018-08-28 05:15:37');

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
  `completed` int(11) NOT NULL DEFAULT '0',
  `position` varchar(255) DEFAULT NULL,
  `intro` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `firstname`, `lastname`, `middlename`, `dob`, `address`, `mobile`, `nationality`, `skill_ids`, `industry_ids`, `resume`, `photo`, `email`, `userid`, `social_ids`, `gender`, `completed`, `position`, `intro`) VALUES
(4, '2', '2', '2', '0000-00-00', '2', 2, '2', '2', '2', NULL, '', '2', 6, '2', 'female', 0, NULL, NULL),
(5, 'fname1', 'lname1', 'mname1', '2018-08-02', 'add1', 1, 'nat1', '', '16', '7d9e92e6620014147b7ea839451e87d5.docx', '35fe3128054de722cc7796074b08dd2f.jpg', 'sad1@gmail.com', 23, '', 'female', 1, '23424', '24234'),
(6, 'Jordan', 'Sadiwa', 'De los Reyes', '2018-08-09', '1852 Sandejas Pasay City', 630000000, 'Philippines', '', '', NULL, '93e43439321d51bb2a5eeb7b1e57b4b6.jpeg', 'sad@mail.com', 25, '', 'male', 1, NULL, NULL),
(7, 'jordan', 'sadiwa', 'De los Reyes', '0000-00-00', '3242 zfdsfd', 342424, 'Hong Kong', '', '', NULL, NULL, 'sad@mail.com', 26, '', 'male', 1, NULL, NULL),
(8, '', '', '', '0000-00-00', '', 0, '', '', '', NULL, NULL, '', 27, '', 'male', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirement`
--
ALTER TABLE `requirement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `emp_history`
--
ALTER TABLE `emp_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `requirement`
--
ALTER TABLE `requirement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
