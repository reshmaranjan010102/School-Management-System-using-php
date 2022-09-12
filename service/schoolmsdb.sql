-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2022 at 08:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `hiredate` date NOT NULL,
  `address` varchar(30) NOT NULL,
  `sex` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `phone`, `email`, `dob`, `hiredate`, `address`, `sex`) VALUES
('ad-123-0', 'Christen', '123', '2587416969', 'christen@example.com', '1993-11-20', '2016-01-01', 'US, Blkr St', 'female'),
('ad-123-1', 'Harry Den', '123', '7531596969', 'harryden@gmail.com', '1995-09-22', '2018-01-05', 'US, Fairview Drive', 'Male'),
('ad-123-2', 'Bucky Barnes', '123', '1969735220', 'barsmine@gmail.com', '1994-04-02', '2020-12-24', 'US, DownSt 12', 'Male'),
('ad-123-3', 'Steephen', '123', '9745452220', 'stephen@gmail.com', '1991-05-02', '2014-04-24', 'AU, Parmmiza Rd', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `admissionform`
--

CREATE TABLE `admissionform` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `sex` varchar(6) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `femail` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `memail` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `mob1` text NOT NULL,
  `mob2` text NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `class` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admissionform`
--

INSERT INTO `admissionform` (`id`, `name`, `dob`, `email`, `sex`, `fname`, `femail`, `mname`, `memail`, `address`, `mob1`, `mob2`, `nationality`, `religion`, `class`, `status`) VALUES
(16, 'Rohan', '2022-07-21', 'rohan@gmail.com', 'male', 'gdghfj', 'cgfgf@cvnh.com', 'gfghf', 'ffhg@vhvjggmail.com', 'ghgj', '4657744646', '2436753563', 'Indian', 'Hindu', 'class1', 1),
(24, 'Reena', '2022-07-13', 'reena@gmail.com', 'female', 'vhjg', 'fhgfh@gmail.com', 'gcghcj', 'gfvvj@gmail.com', 'vhjvjh', '3545876678', '5676575676', 'Indian', 'Hindu', 'class2', 1),
(25, 'Reshma', '2022-07-15', 'reshmaranjan02@gmail.com', 'female', 'Raviranjan Kumar', 'ggdfhf@gchg.com', 'Rashmi Ranjan', 'dghfh@gfh.com', 'E-259/7, Begusarai', '8709776676', '4356476565', 'Indian', 'Hindu', 'class1', 1),
(26, 'Juhi', '2022-07-02', 'juhi26@gmail.com', 'female', 'fhjfgh', 'dghfch@gmail.com', 'gchnkj', 'fvjh@gmail.com', 'E-259/7 d-street, lucknow', '4858798935', '3436567865', 'Indian', 'Hindu', 'class2', 1),
(27, 'Banty Kumari', '2022-07-02', 'banty7771@gmail.com', 'female', 'fdcvg@gmail.com', 'fghfv', 'dybvn', 'dytdf@gmail.com', 'E-2/765, Begusarai', '4546757687', '4675860986', 'Indian', 'Hindu', 'class4', 1),
(28, 'Rajesh Ranjan', '2022-07-16', 'rajesh@gmail.com', 'male', 'Raviranjan Kumar', 'vhgh@gmail.com', 'Rashmi Ranjan', 'dcgf@gmail.com', 'E-259/7, Begusarai', '8709776636', '5476578776', 'Indian', 'Hindu', 'class2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('62d6cfd160678', '62d6cfd176a5c'),
('62d6cfd1a38a5', '62d6cfd1a7939');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attendedid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date`, `attendedid`) VALUES
(18, '2016-05-04', 'te-123-1'),
(20, '2016-05-01', 'te-123-1'),
(21, '2016-04-12', 'te-123-1'),
(22, '2016-05-04', 'te-124-1'),
(23, '2016-04-19', 'te-124-1'),
(24, '2016-05-02', 'te-124-1'),
(25, '2016-05-04', 'sta-123-1'),
(26, '2016-05-05', 'sta-123-1'),
(27, '2016-04-04', 'sta-123-1'),
(28, '2016-04-05', 'sta-123-1'),
(29, '2021-04-06', 'te-123-1'),
(30, '2021-04-06', 'sta-123-1'),
(31, '2021-04-06', 'st-123-1'),
(32, '2021-04-06', 'st-124-1'),
(33, '2022-06-27', 'te-126-1'),
(34, '2022-06-27', 'te-127-1'),
(35, '2022-06-30', 'te-127-1');

-- --------------------------------------------------------

--
-- Table structure for table `class1`
--

CREATE TABLE `class1` (
  `id` int(11) UNSIGNED NOT NULL,
  `days` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class1`
--

INSERT INTO `class1` (`id`, `days`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
(1, 'MON', 'Hindi', 'English', 'Mathematics', 'Drawing', 'Drawing', 'Drawing'),
(3, 'TUE', 'Hindi', 'English', 'Mathematics', 'Drawing', 'Physical Training', 'Physical Training'),
(4, 'WED', 'Hindi', 'English', 'Mathematics', 'Drawing', 'Physical Training', 'Physical Training'),
(5, 'THUR', 'Hindi', 'English', 'Mathematics', 'Drawing', 'Physical Training', 'Physical Training'),
(6, 'FRI', 'Hindi', 'English', 'Mathematics', 'Drawing', 'Physical Training', 'Physical Training'),
(7, 'SAT', 'Hindi', 'English', 'Mathematics', 'Drawing', 'Drawing', 'Drawing');

-- --------------------------------------------------------

--
-- Table structure for table `class2`
--

CREATE TABLE `class2` (
  `id` int(11) UNSIGNED NOT NULL,
  `days` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class2`
--

INSERT INTO `class2` (`id`, `days`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
(1, 'Select day', 'Select period1', 'Select period2', 'Select period3', 'Select period4', 'Select period5', 'Select period6');

-- --------------------------------------------------------

--
-- Table structure for table `class3`
--

CREATE TABLE `class3` (
  `id` int(11) UNSIGNED NOT NULL,
  `days` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class4`
--

CREATE TABLE `class4` (
  `id` int(11) UNSIGNED NOT NULL,
  `days` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` text NOT NULL,
  `classteacher` text NOT NULL,
  `subjects` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `classteacher`, `subjects`) VALUES
(29, 'class1', 'Suman', '11,12,13,18'),
(30, 'class2', 'Pankaj kumar', '11,12,13,18,19'),
(31, 'class3', 'Roshni Mittal', '11,12,13,18,19'),
(32, 'class4', 'Suman', '11,12,13,18,19'),
(33, 'Class5', 'Select one', '11,12,13,14,18,19'),
(34, 'Class6', 'Select one', '11,12,13,14,15,18,19'),
(35, 'Class7', 'Select one', '11,12,13,14,15,18,19'),
(36, 'Class8', 'Select one', '11,12,13,14,15,18,19');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `teacherid` varchar(20) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `classid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `teacherid`, `studentid`, `classid`) VALUES
('1', 'Bangla 1st', 'te-124-1', 'st-123-1', '1A'),
('1', 'Bangla 1st', 'te-124-1', 'st-124-1', '1A');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` text NOT NULL,
  `class` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `posmark` int(11) NOT NULL,
  `negmark` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `descr` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `class`, `subject`, `posmark`, `negmark`, `total`, `time`, `descr`, `date`) VALUES
('62d6cf9d703da', 'Class1', 'English', 4, 1, 2, 10, '', '2022-07-19 21:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int(11) UNSIGNED NOT NULL,
  `exam_date` date NOT NULL,
  `exam_day` varchar(30) NOT NULL,
  `exam_time` time NOT NULL,
  `class1` varchar(50) NOT NULL,
  `class2` varchar(50) NOT NULL,
  `class3` varchar(50) NOT NULL,
  `class4` varchar(50) NOT NULL,
  `class5` varchar(50) NOT NULL,
  `class6` varchar(50) NOT NULL,
  `class7` varchar(50) NOT NULL,
  `class8` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_schedule`
--

INSERT INTO `exam_schedule` (`id`, `exam_date`, `exam_day`, `exam_time`, `class1`, `class2`, `class3`, `class4`, `class5`, `class6`, `class7`, `class8`) VALUES
(1, '2022-08-02', 'Tue', '10:00:00', 'Mathematics', 'Mathematics', 'English', 'Mathematics', 'English', 'English', 'Social Studies', 'Social Studies');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `courseid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `studentid`, `grade`, `courseid`) VALUES
(1, 'st-123-1', 'C', '8'),
(2, 'st-123-1', 'F', '4'),
(3, 'st-125-1', 'D+', '1'),
(4, 'st-123-1', 'D+', '1'),
(5, 'st-124-1', 'C+', '1'),
(6, 'st-124-1', 'A+', '1');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `posmark` int(11) NOT NULL,
  `negmark` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `posmark`, `negmark`, `date`) VALUES
('reshmaranjan02@gmail.com', '62d6cf9d703da', 3, 2, 1, 1, '2022-07-19 15:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('62d6cfd160678', 'Green', '62d6cfd176a4e'),
('62d6cfd160678', 'Yellow', '62d6cfd176a59'),
('62d6cfd160678', 'Red', '62d6cfd176a5c'),
('62d6cfd160678', 'Blue', '62d6cfd176a5e'),
('62d6cfd1a38a5', '3', '62d6cfd1a792e'),
('62d6cfd1a38a5', '4', '62d6cfd1a7939'),
('62d6cfd1a38a5', '5', '62d6cfd1a793a'),
('62d6cfd1a38a5', '6', '62d6cfd1a793c');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `amount` double NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `studentid`, `amount`, `month`, `year`) VALUES
(1, 'st-123-1', 500, '5', '2016'),
(2, 'st-123-1', 500, '4', '2016'),
(3, 'st-124-1', 500, '5', '2016'),
(4, 'st-123-1', 4500, 'March 10', '2021'),
(5, 'st-123-1', 4000, 'April 6', '2021');

-- --------------------------------------------------------

--
-- Table structure for table `pk`
--

CREATE TABLE `pk` (
  `id` int(11) UNSIGNED NOT NULL,
  `days` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pk`
--

INSERT INTO `pk` (`id`, `days`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
(1, 'MON', 'class2', 'class1', 'Select period3', 'Select period4', 'Select period5', 'Select period6'),
(2, 'TUE', 'class2', 'Select period2', 'Select period3', 'Select period4', 'Select period5', 'Select period6'),
(3, 'WED', 'class2', 'Select period2', 'Select period3', 'Select period4', 'Select period5', 'Select period6');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `ques` text NOT NULL,
  `choice` int(11) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `ques`, `choice`, `sn`) VALUES
('62d6cf9d703da ', '62d6cfd160678', 'color: apple?', 4, 1),
('62d6cf9d703da ', '62d6cfd1a38a5', 'color: flag?', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportid` int(11) NOT NULL,
  `studentid` varchar(20) NOT NULL,
  `teacherid` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL,
  `courseid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportid`, `studentid`, `teacherid`, `message`, `courseid`) VALUES
(1, 'st-123-1', 'te-123-1', 'Good Boy', '790'),
(2, 'st-124-1', 'te-123-1', 'Good boy But not honest.', '790'),
(3, 'st-123-1', 'te-124-1', ' good', '1'),
(4, 'st-124-1', 'te-124-1', ' Good one, keep it up!', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rm`
--

CREATE TABLE `rm` (
  `id` int(11) UNSIGNED NOT NULL,
  `days` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `s`
--

CREATE TABLE `s` (
  `id` int(11) UNSIGNED NOT NULL,
  `days` varchar(10) NOT NULL,
  `period1` varchar(30) NOT NULL,
  `period2` varchar(30) NOT NULL,
  `period3` varchar(30) NOT NULL,
  `period4` varchar(30) NOT NULL,
  `period5` varchar(30) NOT NULL,
  `period6` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `status`) VALUES
(2, 'examreport', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `classid` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone`, `email`, `sex`, `dob`, `address`, `classid`, `status`) VALUES
(9, 'Reshma', '8709776676', 'reshmaranjan02@gmail.com', 'female', '2022-07-15', 'E-259/7, Begusarai', 'class1', 1),
(11, 'Juhi', '4858798935', 'juhi26@gmail.com', 'female', '2022-07-02', 'E-259/7 d-street, lucknow', 'class2', 1),
(12, 'Banty Kumari', '4546757687', 'banty7771@gmail.com', 'female', '2022-07-02', 'E-2/765, Begusarai', 'class4', 1),
(13, 'Rajesh Ranjan', '8709776636', 'rajesh@gmail.com', 'male', '2022-07-16', 'E-259/7, Begusarai', 'class2', 1),
(14, 'Rohan', '4657744646', 'rohan@gmail.com', 'male', '2022-07-21', 'ghgj', 'class1', 1),
(15, 'Reena', '3545876678', 'reena@gmail.com', '', '2022-07-13', 'vhjvjh', 'class2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `subteacher` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `subteacher`) VALUES
(11, 'Hindi', 'Suman'),
(12, 'English', 'Roshni Mittal'),
(13, 'Mathematics', 'Pankaj kumar'),
(14, 'Science', 'Pankaj kumar'),
(15, 'Social Studies', 'Roshni Mittal'),
(18, 'Drawing', 'Vimla Devi'),
(19, 'Physical Training', 'Pankaj kumar');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `pri_key` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `abbr` varchar(10) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `subject` text NOT NULL,
  `hiredate` date NOT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`pri_key`, `name`, `abbr`, `phone`, `email`, `address`, `sex`, `dob`, `subject`, `hiredate`, `salary`) VALUES
(1, 'Pankaj kumar', 'pk', '6897989213', 'pankaj7@gmail.com', 'sdvdvbgnjkfdv', 'male', '2022-07-20', 'Science', '2022-07-02', 25000),
(2, 'Roshni Mittal', 'rm', '7648596836', 'roshni4@gmail.com', 'hhjggghvjh', 'female', '2022-07-20', 'Social Studies', '2022-07-13', 22000),
(3, 'Suman', 's', '3424454763', 'suman127@gmail.com', 'sdvdvbgnjkfdv', 'female', '2022-07-14', 'English\r\n', '2022-07-28', 12000),
(4, 'Vimla Devi', 'vd', '6473976748', 'vimla6@gmail.com', 'jnckjdhvdfnvb', 'female', '2022-07-07', 'Drawing', '2022-07-13', 12000),
(5, 'Khushi Kumari', '', '5467487976', 'khushi@gmail.com', 'ghfhjggugg', 'female', '2022-07-23', '', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `password`, `usertype`) VALUES
('ad-123-0', '123', 'admin'),
('banty7771@gmail.com', 'Banty@123', 'student'),
('juhi26@gmail.com', 'Juhi@123', 'student'),
('khushi@gmail.com', 'Khushi@123', 'teacher'),
('pankaj7@gmail.com', 'pankaj@7', 'teacher'),
('rajesh23@gmail.com', 'Rajesh@23', 'teacher'),
('rajesh@gmail.com', 'Rajesh@123', 'student'),
('reena@gmail.com', 'Reena@123', 'student'),
('reshmaranjan02@gmail.com', 'Reshma@123', 'student'),
('rohan@gmail.com', 'Rohan@123', 'student'),
('roshni4@gmail.com', 'roshni@4', 'teacher'),
('suman127@gmail.com', 'suman@127', 'teacher'),
('vimla6@gmail.com', 'vimla@6', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD UNIQUE KEY `id_3` (`id`);

--
-- Indexes for table `admissionform`
--
ALTER TABLE `admissionform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class1`
--
ALTER TABLE `class1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class2`
--
ALTER TABLE `class2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class3`
--
ALTER TABLE `class3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class4`
--
ALTER TABLE `class4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pk`
--
ALTER TABLE `pk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportid`);

--
-- Indexes for table `rm`
--
ALTER TABLE `rm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s`
--
ALTER TABLE `s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`pri_key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissionform`
--
ALTER TABLE `admissionform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `class1`
--
ALTER TABLE `class1`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class2`
--
ALTER TABLE `class2`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class3`
--
ALTER TABLE `class3`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class4`
--
ALTER TABLE `class4`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pk`
--
ALTER TABLE `pk`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rm`
--
ALTER TABLE `rm`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s`
--
ALTER TABLE `s`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `pri_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
