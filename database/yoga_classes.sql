-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2022 at 12:50 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yoga_classes`
--
CREATE DATABASE IF NOT EXISTS `yoga_classes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `yoga_classes`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_name`, `email_id`, `pwd`) VALUES
(1, 'admin', 'admin@yogaclasses.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking_master`
--

CREATE TABLE IF NOT EXISTS `booking_master` (
  `booking_id` int(10) NOT NULL,
  `booking_date` date NOT NULL,
  `member_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `trainer_id` int(10) NOT NULL,
  `health_issue` varchar(200) NOT NULL,
  `age` int(3) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_master`
--

INSERT INTO `booking_master` (`booking_id`, `booking_date`, `member_id`, `course_id`, `trainer_id`, `health_issue`, `age`) VALUES
(1, '2022-04-01', 1, 1, 1, 'no problem', 21);

-- --------------------------------------------------------

--
-- Table structure for table `book_event_detail`
--

CREATE TABLE IF NOT EXISTS `book_event_detail` (
  `book_event_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `trainer_id` int(10) NOT NULL,
  `booking_date` date NOT NULL,
  PRIMARY KEY (`book_event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_event_detail`
--

INSERT INTO `book_event_detail` (`book_event_id`, `event_id`, `member_id`, `trainer_id`, `booking_date`) VALUES
(1, 1, 0, 1, '2022-03-26'),
(2, 1, 1, 0, '2022-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `course_master`
--

CREATE TABLE IF NOT EXISTS `course_master` (
  `course_id` int(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `duration` varchar(15) NOT NULL,
  `fees` int(10) NOT NULL,
  `course_img` varchar(50) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_master`
--

INSERT INTO `course_master` (`course_id`, `course_name`, `description`, `duration`, `fees`, `course_img`) VALUES
(1, 'Basic Course', 'Basic Yoga Course for begineers who want to practice yoga in their daily routine system', '3 months', 6000, 'course_img/CI1_4477.png'),
(2, 'Advanced Course', 'Advanced Yoga Course for all who want to learn yoga for meditation and want more detail about yoga and health cocious', '6 months', 12000, 'course_img/CI2_4307.png');

-- --------------------------------------------------------

--
-- Table structure for table `diet_chart_detail`
--

CREATE TABLE IF NOT EXISTS `diet_chart_detail` (
  `diet_chart_id` int(10) NOT NULL,
  `upload_date` date NOT NULL,
  `diet_chart_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `diet_chart_img` varchar(50) NOT NULL,
  `trainer_id` int(10) NOT NULL,
  PRIMARY KEY (`diet_chart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diet_chart_detail`
--

INSERT INTO `diet_chart_detail` (`diet_chart_id`, `upload_date`, `diet_chart_name`, `description`, `diet_chart_img`, `trainer_id`) VALUES
(1, '2022-03-26', 'Weight Gain', 'Wegiht Gain diet Chart for the person who want to gain their weight', 'diet_img/DCI1_1777.png', 1),
(2, '2022-03-26', 'Weight Loss ', 'Weight loss diet chart for the person who want to reduce their weight ', 'diet_img/DCI2_3895.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE IF NOT EXISTS `event_master` (
  `event_id` int(10) NOT NULL,
  `upload_date` date NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_description` varchar(200) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `event_timings` varchar(20) NOT NULL,
  `event_img` varchar(50) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`event_id`, `upload_date`, `event_name`, `event_description`, `event_start_date`, `event_end_date`, `event_timings`, `event_img`) VALUES
(1, '2022-03-20', 'Yoga 2 Days Sibir', '2 days yoga sibir from patanjali yog pith every body invitied to attend this sibir Morning 6 to 8 am', '2022-04-08', '2022-04-09', '2 hours', 'event_img/EI1_5743.png'),
(2, '2022-03-20', 'Yog Sibir', '5 days Evening Yog Sibir by our trainers evening 6 to 7', '2022-04-14', '2022-04-18', '1 hours', 'event_img/EI2_4086.png');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(10) NOT NULL,
  `feed_date` date NOT NULL,
  `description` varchar(100) NOT NULL,
  `member_id` int(10) NOT NULL,
  `trainer_id` int(10) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feed_date`, `description`, `member_id`, `trainer_id`) VALUES
(1, '2022-03-26', 'Trainer provide us good knowledge about yoga and also give  us a good response of our question', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_regis`
--

CREATE TABLE IF NOT EXISTS `member_regis` (
  `member_id` int(10) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `medical_problem` varchar(200) NOT NULL,
  `security_que` varchar(200) NOT NULL,
  `security_ans` varchar(50) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_regis`
--

INSERT INTO `member_regis` (`member_id`, `member_name`, `address`, `city`, `mobile_no`, `email_id`, `pwd`, `gender`, `dob`, `medical_problem`, `security_que`, `security_ans`) VALUES
(1, 'Jitali Patel', 'halar', 'valsad', '9876543210', 'jitali@yahoo.com', '111111', 'FEMALE', '2001-03-19', 'no', 'What is Your Nick Name', 'khyati');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pay_id` int(10) NOT NULL,
  `pay_date` date NOT NULL,
  `booking_id` int(10) NOT NULL,
  `card_type` varchar(15) NOT NULL,
  `card_no` varchar(16) NOT NULL,
  `cvv_no` varchar(3) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `card_holder_name` varchar(50) NOT NULL,
  `expiry_date` varchar(15) NOT NULL,
  `amount` int(10) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_date`, `booking_id`, `card_type`, `card_no`, `cvv_no`, `bank_name`, `card_holder_name`, `expiry_date`, `amount`) VALUES
(1, '2022-04-01', 1, 'DEBIT CARD', '1234567890123456', '111', 'bob', 'Jitali Patel', 'Mar-2026', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `trainer_dietian_regis`
--

CREATE TABLE IF NOT EXISTS `trainer_dietian_regis` (
  `trainer_id` int(10) NOT NULL,
  `trainer_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `gender` varchar(7) NOT NULL,
  PRIMARY KEY (`trainer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer_dietian_regis`
--

INSERT INTO `trainer_dietian_regis` (`trainer_id`, `trainer_name`, `address`, `city`, `mobile_no`, `email_id`, `pwd`, `gender`) VALUES
(1, 'Priti Pandey', 'halar', 'valsad', '9876543210', 'priti@yahoo.com', '111111', 'FEMALE');

-- --------------------------------------------------------

--
-- Table structure for table `video_detail`
--

CREATE TABLE IF NOT EXISTS `video_detail` (
  `video_id` int(10) NOT NULL,
  `upload_date` date NOT NULL,
  `video_name` varchar(50) NOT NULL,
  `course_id` int(10) NOT NULL,
  `video_desc` varchar(200) NOT NULL,
  `video_path` varchar(50) NOT NULL,
  `trainer_id` int(10) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_detail`
--

INSERT INTO `video_detail` (`video_id`, `upload_date`, `video_name`, `course_id`, `video_desc`, `video_path`, `trainer_id`) VALUES
(1, '2022-03-25', 'Beginner video', 1, 'Begineer normal yoga practice video', 'yoga_video/YV1_6228.mp4', 1),
(2, '2022-03-25', 'Beginner Video', 1, 'Begineer video 2 for general yoga practioner', 'yoga_video/YV2_9053.mp4', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
