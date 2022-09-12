-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 07:15 PM
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
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `phone`, `email`) VALUES
('ad-123-0', 'Samaira', '123', '2587416969', 'sk@example.com');

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
(1, 'Reshma Ranjan', '2022-08-24', 'reshmaranjan02@gmail.com', '', 'Mr. Ravi Ranjan', 'sfdgdfg@gmail.com', 'Mrs. Taruna Sinha', 'fgsh@gmail.com', 'E-259/7 d-street, lucknow', '8709776676', '7676891212', 'Indian', 'Hindu', 'class1', 2),
(2, 'Khushi Kumari', '2022-08-05', 'kk@gmail.com', '', 'fdgffgf', 'dewf@gmail.com', 'gjug', 'jbkb@gmail.com', '776, E-block, Bihar', '4754466876', '3356476522', 'Indian', 'Hindu', 'Class1', 2),
(3, 'Khushboo Kumari', '2022-08-11', 'khk@gmail.com', '', 'dfgcgb', 'gfhjf@gmail.com', 'gfhjfu', 'hfjhfh@gmail.com', '67, East Vihar, Nalanda', '3648576584', '4564587656', 'Indian', 'Hindu', 'class1', 2),
(4, 'Juhi Priyadarshni', '2022-08-04', 'jp@gmail.com', '', 'dadsffv', 'fvefg@gmail.com', 'csvfesrg', 'scdsc@gmail.com', 'E-259/7, Begusarai', '4546757687', '2436753563', 'Indian', 'Hindu', 'class2', 2),
(5, 'Banty Kumari', '2022-08-04', 'bk@gmail.com', '', 'Shyam Pal', 'dcds@gmail.com', 'Sarla devi', 'cscsc@gmail.com', 'E-2/765, Begusarai', '5346765343', '4357261895', 'Indian', 'Hindu', 'class2', 2),
(6, 'Neha Kumari', '2022-06-15', 'nk@gmail.com', 'female', 'hgugi', 'bkjhk@gmail.com', 'bnkjhl', 'vjguk@gmail.com', 'bkhoij', '8709776676', '4357261895', 'Indian', 'Hindu', 'Class1', 2),
(7, 'Rajesh Ranjan', '2022-06-15', 'rr@gmail.com', 'male', 'vhgj', 'gchfhjg@gmail.com', 'chggjh', 'dgdh@gmail.com', 'fcgjf', '8709776676', '4357261896', 'Indian', 'Hindu', 'class2', 2),
(8, 'Shivam Kumar', '2022-08-01', 'shk@gmail.com', 'male', 'tertyfytj', 'shddf@gmail.com', 'chjfj', 'xhfjjg@gmail.com', 'bkjhklh', '8709776676', '4357261895', 'Indian', 'Hindu', 'Class 2', 2),
(9, 'Suresh Kumar', '2022-08-02', 'suk@gmail.com', 'male', 'fyfgu', 'diruit@gmail.com', 'cjhgjgh', 'fifg@gmail.com', 'vkguyiuyj', '5858777775', '4654675654', 'Indian', 'Hindu', 'class2', 2),
(10, 'Nitya Kumari', '2022-08-08', 'nik@gmail.com', 'female', 'ddfsgf', 'gdfhgfn@gmail.com', 'gjhghkb', 'fgyv@gmail.com', 'bkjhknl', '5676897897', '7097987890', 'Indian', 'Hindu', 'Class1', 2),
(11, 'Nishant Kumar', '2022-08-09', 'nisk@gmail.com', 'male', 'tewty', 'eythh@gmail.com', 'nfhj', 'rjhthj@gmail.com', 'hrhgfhj', '5346765343', '7676891212', 'Indian', 'Hindu', 'Class1', 2),
(12, 'Suraj Kumar', '2022-01-05', 'surk@gmail.com', 'male', 'tgfrjy', 'gdjf@gmail.com', 'cjhfh', 'cjkgbk@gmail.com', 'djgk', '5346765343', '7676891212', 'Indian', 'Hindu', 'class2', 2),
(13, 'Naveen Mishra', '2022-02-03', 'nm@gmail.com', 'male', 'gfghrh', 'gdg@gmail.com', 'fhdghf', 'ghdggdh@gmail.com', 'gdhgfj', '4546757687', '2436753563', 'Indian', 'Hindu', 'Class1', 2),
(14, 'Neetu Sharma', '2022-08-04', 'ns@gmail.com', 'female', 'wdwe', 'gjgj@gmail.com', 'vgkjhk', 'vjhki@gmail.com', 'bjghih', '4858798935', '4357261896', 'Indian', 'Hindu', 'class2', 2),
(15, 'Maithili Raj', '2022-08-16', 'mr@gmail.com', '', 'dvdfvd', 'bdfb@gmail.com', 'dbgbrs', 'egefb@gmail.com', 'ddgbg', '6789770797', '68689770097', 'Indian', 'Hindu', 'class2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date`, `email`, `status`) VALUES
(1, '2022-08-08', 'pa@gmail.com', 1),
(2, '2022-08-08', 'sd@gmail.com', 1),
(3, '2022-08-08', 'pm@gmail.com', 1),
(4, '2022-08-08', 'ss@gmail.com', 0),
(5, '2022-08-08', 'nc@gmail.com', 0),
(6, '2022-08-08', 'sk@gmail.com', 1),
(7, '2022-08-08', 'mk@gmail.com', 1),
(8, '2022-08-08', 'sus@gmail.com', 1);

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
(1, 'MON', 'Hindi', 'English', 'Maths', 'Drawing', 'Drawing', 'Drawing'),
(2, 'TUE', 'Hindi', 'English', 'Maths', 'Drawing', 'Physical Training', 'Physical Training'),
(3, 'WED', 'Hindi', 'English', 'Maths', 'Physical Training', 'Physical Training', 'Physical Training'),
(4, 'THU', 'Hindi', 'English', 'Maths', 'Maths', 'Drawing', 'Drawing'),
(5, 'FRI', 'Hindi', 'English', 'English', 'Maths', 'Drawing', 'Drawing'),
(6, 'SAT', 'Hindi', 'English', 'Maths', '-', '-', '-');

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
(3, 'Class1', 'Meera Kumari', '6,7,8,9,10'),
(4, 'Class2', 'Pankaj Mishra', '6,7,8,9,10'),
(5, 'Class3', 'Sujata Sharma', '6,7,9,10,11'),
(6, 'Class4', 'Sushma Dubey', '6,7,9,10,11'),
(7, 'Class5', 'Shyam Kumar', '6,7,8,9,10'),
(8, 'Class6', 'Satish Srivastav', '6,7,8,9,10,13'),
(9, 'Class7', 'Neeraj Chaudhary', '6,7,8,9,10,13'),
(10, 'Class8', 'Promila Aggarwal', '6,7,9,10,11,13');

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
  `date` text NOT NULL,
  `examname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_schedule`
--

CREATE TABLE `exam_schedule` (
  `id` int(11) UNSIGNED NOT NULL,
  `examname` text NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `posmarks` int(11) NOT NULL,
  `negmarks` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Reshma Ranjan', '8709776676', 'reshmaranjan02@gmail.com', '', '2022-08-24', 'E-259/7 d-street, lucknow', 'class1', 1),
(2, 'Khushi Kumari', '4754466876', 'kk@gmail.com', '', '2022-08-05', '776, E-block, Bihar', 'Class1', 1),
(3, 'Khushboo Kumari', '3648576584', 'khk@gmail.com', '', '2022-08-11', '67, East Vihar, Nalanda', 'class1', 1),
(4, 'Juhi Priyadarshni', '4546757687', 'jp@gmail.com', '', '2022-08-04', 'E-259/7, Begusarai', 'class2', 1),
(5, 'Banty Kumari', '5346765343', 'bk@gmail.com', '', '2022-08-04', 'E-2/765, Begusarai', 'class2', 1),
(6, 'Neha Kumari', '8709776676', 'nk@gmail.com', 'female', '2022-06-15', 'bkhoij', 'Class1', 1),
(7, 'Rajesh Ranjan', '8709776676', 'rr@gmail.com', 'male', '2022-06-15', 'fcgjf', 'class2', 1),
(8, 'Shivam Kumar', '8709776676', 'shk@gmail.com', 'male', '2022-08-01', 'bkjhklh', 'Class2', 1),
(9, 'Suresh Kumar', '5858777775', 'suk@gmail.com', 'male', '2022-08-02', 'vkguyiuyj', 'class2', 1),
(10, 'Nitya Kumari', '5676897897', 'nik@gmail.com', 'female', '2022-08-08', 'bkjhknl', 'Class1', 1),
(11, 'Nishant Kumar', '5346765343', 'nisk@gmail.com', 'male', '2022-08-09', 'hrhgfhj', 'Class1', 1),
(12, 'Suraj Kumar', '5346765343', 'surk@gmail.com', 'male', '2022-01-05', 'djgk', 'class2', 1),
(13, 'Naveen Mishra', '4546757687', 'nm@gmail.com', 'male', '2022-02-03', 'gdhgfj', 'Class1', 1),
(14, 'Neetu Sharma', '4858798935', 'ns@gmail.com', 'female', '2022-08-04', 'bjghih', 'class2', 1),
(15, 'Maithili Raj', '6789770797', 'mr@gmail.com', '', '2022-08-16', 'ddgbg', 'class2', 1);

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
(6, 'English', 'Sujata Sharma'),
(7, 'Hindi', 'Meera Kumari'),
(8, 'Maths', 'Pankaj Mishra'),
(9, 'Drawing', 'Sushma Dubey'),
(10, 'Physical Training', 'Satish Srivastav'),
(11, 'Maths', 'Shyam Kumar'),
(13, 'Science', 'Neeraj Chaudhary'),
(14, 'Social Studies', 'Promila Aggarwal');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `pri_key` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `abbr` varchar(10) NOT NULL,
  `phone` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `sex` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `subject` text NOT NULL,
  `phone2` text NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `hiredate` date NOT NULL,
  `salary` double NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`pri_key`, `name`, `abbr`, `phone`, `email`, `address`, `sex`, `dob`, `subject`, `phone2`, `nationality`, `religion`, `hiredate`, `salary`, `status`) VALUES
(1, 'Promila Aggarwal', 'pa', '7980980894', 'pa@gmail.com', 'jnklkn', 'female', '1997-03-15', 'Social Studies', '4575876897', 'Indian', 'Hindu', '2022-08-12', 0, 3),
(2, 'Sushma Dubey', 'sd', '6876909898', 'sd@gmail.com', 'sdvdvbgnjkfdv', 'female', '1996-08-08', 'Drawing', '6876878976', 'Indian', 'Hindu', '2022-08-12', 0, 3),
(3, 'Pankaj Mishra', 'pm', '6876897457', 'pm@gmail.com', 'hhjggghvjh', 'male', '2022-08-12', 'Maths', '6587646754', 'Indian', 'Hindu', '2022-08-12', 0, 3),
(4, 'Satish Srivastav', 'ss', '5365632345', 'ss@gmail.com', 'bvkjvbkjh', 'male', '1999-08-05', 'Physical Training', '6758796899', 'Indian', 'Hindu', '2022-08-13', 0, 3),
(5, 'Neeraj Chaudhary', 'nc', '6879687690', 'nc@gmail.com', 'gkjgg', 'male', '1999-08-10', 'Science', '5687569857', 'Indian', 'Hindu', '2022-08-16', 0, 3),
(6, 'Shyam Kumar', 'sk', '7980980894', 'sk@gmail.com', 'E-259/7 d-street, lucknow', 'male', '2000-05-09', 'Maths', '2147483647', 'Indian', 'Hindu', '2022-08-12', 0, 3),
(7, 'Meera Kumari', 'mk', '6299719357', 'mk@gmail.com', 'ghfhjggugg', 'female', '2002-02-13', 'Hindi', '2147483647', 'Indian', 'Hindu', '2022-08-12', 0, 3),
(8, 'Sujata Sharma', 'sus', '5765888799', 'sus@gmail.com', 'sdvdvbgnjkfdv', 'female', '1996-08-08', 'English', '5876896897', 'Indian', 'Hindu', '2022-08-18', 0, 3),
(9, 'Vikram Singh', 'vs', '6769770999', 'vs@gmail.com', 'jnckjdhvdfnvb', 'male', '1995-08-11', 'Social Studies', '4564765487', 'Indian', 'Hindu', '2022-08-18', 0, 3);

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
('bk@gmail.com', 'Banty@123', 'student'),
('jp@gmail.com', 'Juhi@123', 'student'),
('khk@gmail.com', 'Khushboo@123', 'student'),
('kk@gmail.com', 'Khushi@123', 'student'),
('mk@gmail.com', 'Meera@123', 'teacher'),
('mr@gmail.com', 'Maithili@123', 'student'),
('nc@gmail.com', 'Neeraj@123', 'teacher'),
('nik@gmail.com', 'Nitya@123', 'student'),
('nisk@gmail.com', 'Nishant@123', 'student'),
('nk@gmail.com', 'Neha@123', 'student'),
('nm@gmail.com', 'Naveen@123', 'student'),
('ns@gmail.com', 'Neetu@123', 'student'),
('pa@gmail.com', 'Promila@123', 'teacher'),
('pm@gmail.com', 'Pankaj@123', 'teacher'),
('reshmaranjan02@gmail.com', 'Reshma@123', 'student'),
('rr@gmail.com', 'Rajesh@123', 'student'),
('sd@gmail.com', 'Sushma@123', 'teacher'),
('shk@gmail.com', 'Shivam@123', 'student'),
('sk@gmail.com', 'Shyam@123', 'teacher'),
('ss@gmail.com', 'Satish@123', 'teacher'),
('suk@gmail.com', 'Suresh@123', 'student'),
('surk@gmail.com', 'Suraj@123', 'student'),
('sus@gmail.com', 'Sujata@123', 'teacher'),
('vs@gmail.com', 'Vikram@123', 'teacher');

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
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `class1`
--
ALTER TABLE `class1`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class2`
--
ALTER TABLE `class2`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exam_schedule`
--
ALTER TABLE `exam_schedule`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `pri_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
