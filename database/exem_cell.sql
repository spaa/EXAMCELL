-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 07:22 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exem_cell`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_batch`
--

CREATE TABLE `class_batch` (
  `id` int(11) NOT NULL,
  `batch_no` varchar(10) NOT NULL,
  `batch_year` varchar(5) NOT NULL,
  `class_incharge` varchar(50) NOT NULL,
  `class_filled` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examcell`
--

CREATE TABLE `examcell` (
  `sr_no` int(11) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examcell`
--

INSERT INTO `examcell` (`sr_no`, `uid`, `password`, `first_name`, `mobile_no`, `emailid`, `photo`) VALUES
(1, 'E001', '2a08a27328a004c2d0dc347fe5a8cba6', 'SWAPNIL', '9757169996', 'swapnilchopade07@gmail.com', '../files/examcell/E001/photo.jpg'),
(2, 'E002', '2a08a27328a004c2d0dc347fe5a8cba6', 'MARI', '9757169996', 'swapnilchopade07@gmail.com', '../files/examcell/E002/photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hod_information`
--

CREATE TABLE `hod_information` (
  `sr_no` int(11) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hod_information`
--

INSERT INTO `hod_information` (`sr_no`, `uid`, `password`, `first_name`, `mobile_no`, `emailid`, `photo`) VALUES
(1, 'HODCP01', '2a08a27328a004c2d0dc347fe5a8cba6', 'SHANKAR', '9757169996', 'swapnilchopade07@gmail.com', '../files/hod/HODCP01/photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `no_of_staff`
--

CREATE TABLE `no_of_staff` (
  `sr_no` int(11) NOT NULL,
  `no_of_staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `no_of_staff`
--

INSERT INTO `no_of_staff` (`sr_no`, `no_of_staff`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff_information`
--

CREATE TABLE `staff_information` (
  `sr_no` int(11) NOT NULL,
  `uid_staff` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `middle_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `mother_name` varchar(15) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `branch` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `pincode` int(10) NOT NULL,
  `photo` text NOT NULL,
  `signature` text NOT NULL,
  `subject` text NOT NULL,
  `shift` int(11) NOT NULL,
  `joining_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_information`
--

INSERT INTO `staff_information` (`sr_no`, `uid_staff`, `password`, `first_name`, `middle_name`, `last_name`, `mother_name`, `dob`, `gender`, `email`, `mobile_no`, `marital_status`, `blood_group`, `branch`, `address`, `state`, `district`, `city`, `pincode`, `photo`, `signature`, `subject`, `shift`, `joining_date`) VALUES
(1, 'F19CP1001B', 'bcfbc18c6d585f7d7e7bfbfb6f461b16', 'VANDANA', 'DARSHAN', 'SALVE', 'MANJU', '17-04-2019', 'FEMALE', 'vandanasalve@gmail.com', '8356814559', 'MARRIED', 'NONE', 'COMPUTER', 'NERUL', 'MAHARASHTRA', 'NAVI MUMBAI', 'NAVI MUMBAI', 400706, '../files/staff_files/F09CP1002B/photo.jpg', '../files/staff_files/F09CP1002B/signature.png', '', 1, '17-04-2019'),
(2, 'F09CP1002B', 'b0ee366abce4ae1266c4afeee011b2cc', 'ASHWINI', 'ANAND', 'BHATKAL', 'MADHURI', '17-04-2019', 'FEMALE', 'ashwani@gmail.com', '8356814559', 'MARRIED', 'NONE', 'COMPUTER', 'THANE', 'MAHARASHTRA', 'NAVI MUMBAI', 'KALWA', 400606, '../files/staff_files/F09CP1002B/photo.jpg', '../files/staff_files/F09CP1002B/signature.png', '', 1, '17-04-2009');

-- --------------------------------------------------------

--
-- Table structure for table `students_per_year`
--

CREATE TABLE `students_per_year` (
  `sr_no` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `no_of_students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_per_year`
--

INSERT INTO `students_per_year` (`sr_no`, `year`, `no_of_students`) VALUES
(1, 2015, 2),
(2, 2016, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students_per_year_dse`
--

CREATE TABLE `students_per_year_dse` (
  `sr_no` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `no_of_students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students_per_year_dse`
--

INSERT INTO `students_per_year_dse` (`sr_no`, `year`, `no_of_students`) VALUES
(1, 2015, 0),
(2, 2016, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_general_info`
--

CREATE TABLE `student_general_info` (
  `srno` int(11) NOT NULL,
  `uid` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `middle_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `mother_name` varchar(15) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `medical_status` varchar(15) NOT NULL,
  `emailid` varchar(40) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `employment` varchar(15) NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `pincode` int(6) NOT NULL,
  `ssc_details` text NOT NULL,
  `hsc_details` text NOT NULL,
  `ssc_marksheet` text NOT NULL,
  `hsc_marksheet` text NOT NULL,
  `photo` text NOT NULL,
  `signature` text NOT NULL,
  `father_mobile_no` varchar(11) NOT NULL,
  `father_email` varchar(40) NOT NULL,
  `mother_mobile_no` varchar(11) NOT NULL,
  `mother_email` varchar(40) NOT NULL,
  `fe_receipt` text NOT NULL,
  `se_receipt` text NOT NULL,
  `te_receipt` text NOT NULL,
  `be_receipt` text NOT NULL,
  `sem1_marks` int(11) NOT NULL,
  `sem2_marks` int(11) NOT NULL,
  `sem3_marks` int(11) NOT NULL,
  `sem4_marks` int(11) NOT NULL,
  `sem5_marks` int(11) NOT NULL,
  `sem6_marks` int(11) NOT NULL,
  `sem7_marks` int(11) NOT NULL,
  `sem8_marks` int(11) NOT NULL,
  `sem1_kt` int(2) NOT NULL,
  `sem2_kt` int(2) NOT NULL,
  `sem3_kt` int(2) NOT NULL,
  `sem4_kt` int(2) NOT NULL,
  `sem5_kt` int(2) NOT NULL,
  `sem6_kt` int(2) NOT NULL,
  `sem7_kt` int(2) NOT NULL,
  `sem8_kt` int(2) NOT NULL,
  `sem1_document` text NOT NULL,
  `sem2_document` text NOT NULL,
  `sem3_document` text NOT NULL,
  `sem4_document` text NOT NULL,
  `sem5_document` text NOT NULL,
  `sem6_document` text NOT NULL,
  `sem7_document` text NOT NULL,
  `sem8_document` text NOT NULL,
  `admission_year` varchar(5) NOT NULL,
  `current_year` varchar(5) NOT NULL,
  `course_name` varchar(15) NOT NULL,
  `admission_category` varchar(10) NOT NULL,
  `admission_type` varchar(10) NOT NULL,
  `shift` varchar(2) DEFAULT NULL,
  `otp_received` text NOT NULL,
  `otp_verified` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_general_info`
--

INSERT INTO `student_general_info` (`srno`, `uid`, `password`, `first_name`, `middle_name`, `last_name`, `mother_name`, `dob`, `gender`, `medical_status`, `emailid`, `mobile_no`, `employment`, `marital_status`, `blood_group`, `address`, `state`, `district`, `city`, `pincode`, `ssc_details`, `hsc_details`, `ssc_marksheet`, `hsc_marksheet`, `photo`, `signature`, `father_mobile_no`, `father_email`, `mother_mobile_no`, `mother_email`, `fe_receipt`, `se_receipt`, `te_receipt`, `be_receipt`, `sem1_marks`, `sem2_marks`, `sem3_marks`, `sem4_marks`, `sem5_marks`, `sem6_marks`, `sem7_marks`, `sem8_marks`, `sem1_kt`, `sem2_kt`, `sem3_kt`, `sem4_kt`, `sem5_kt`, `sem6_kt`, `sem7_kt`, `sem8_kt`, `sem1_document`, `sem2_document`, `sem3_document`, `sem4_document`, `sem5_document`, `sem6_document`, `sem7_document`, `sem8_document`, `admission_year`, `current_year`, `course_name`, `admission_category`, `admission_type`, `shift`, `otp_received`, `otp_verified`) VALUES
(1, '115CP1001A', '2a08a27328a004c2d0dc347fe5a8cba6', 'SWAPNIL', 'SUNIL', 'CHOPADE', 'MINAKSHI', '30-01-1997', 'MALE', 'NOTHING', 'swapnilchopade07@gmail.com', '9757169996', 'UNEMPLOYED', 'SINGLE', 'NONE', '2/1406,SADBHAVNA COP. SOC.,NITYANANDNAGAR,GHATKOPAR(W),MUMBAI-400086', 'MAHARASHTRA', 'MUMBAI SUBARBAN', 'MUMBAI', 400086, 'MAHARASHTRA STATE BOARD,DOMINIC SAVIO VIDYALAYA,2013-03,507,550,A259982', 'MAHARASHTRA STATE BOARD,RAM NIRANJAN JHUNJHUNWALA COLLEGE,2015-02,511,650,M080158', '../files/student_files/115CP1001A/10th.pdf', '../files/student_files/115CP1001A/12th.pdf', '../files/student_files/115CP1001A/photo.jpg', '../files/student_files/115CP1001A/signature.png', '9869852825', 'sunilchopade47@gmail.com', '8286301304', 'minakshichopade28@gmail.com', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '2015', 'FE', 'COMPUTER', 'OPEN', 'CAP', '1', '', 0),
(2, '115CP1002A', 'fdd7366f0df2a5437bd8876b52358a52', 'ANIKET', 'RAJENDRA', 'SONAWANE', 'LATIKA', '02-05-1998', 'MALE', 'NOTHING', 'sonawaneaniket02@gmail.com', '7506877340', 'UNEMPLOYED', 'SINGLE', 'NONE', 'NIWARA APPARTMENT D/E ,PLOT NO. 284,ROOM NO. 01,SARSOLE VILLAGE ,SECTOR-06,NERUL (W),NAVI MUMBAI-400706.', 'MAHARASHTRA', 'NAVI MUMBAI', 'NAVI MUMBAI', 400706, 'MAHARASHTRA STATE BOARD,NREUL SCHOOL,2013-03,400,550,A259982', 'MAHARASHTRA STATE BOARD,NERUL COLLEGE,2015-02,415,650,M091158', '../files/student_files/115CP1002A/10th.pdf', '../files/student_files/115CP1002A/12th.pdf', '../files/student_files/115CP1002A/photo.jpg', '../files/student_files/115CP1002A/signature.jpg', '7506877340', 'sonawrajendra02@gmail.com', '7506877340', 'sonawlatika02@gmail.com', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '2015', 'FE', 'COMPUTER', 'OPEN', 'CAP', '1', '', 0),
(3, '116CP2001A', 'fab5ccbf29b2b13419aa9c78b35ff92c', 'AADESH', 'NARENDRA', 'BORGAONKAR', 'NILIMA', '26-08-1998', 'MALE', 'NOTHING', 'borgaonkaraadesh@gmail.com', '2147483647', 'UNEMPLOYED', 'SINGLE', 'NONE', 'SEC-17,AIROLI,NAVI MUMBAI', 'MAHARASHTRA', 'NAVI MUMBAI', 'THANE', 400002, 'MAHARASHTRA STATE BOARD,AIROLI SCHOOL,2013-03,450,550,A359982', 'MAHARASHTRA STATE BOARD,AIROLI COLLEGE,2016-02,470,650,D180158', '../files/student_files/116CP2001A/10th.pdf', '../files/student_files/116CP2001A/12th.pdf', '../files/student_files/116CP2001A/photo.jpg', '../files/student_files/116CP2001A/signature.png', '2147483647', 'borgaonkarnarendra@gmail.com', '2147483647', 'borgaonkar@gmail.com', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '2016', 'SE', 'COMPUTER', 'OPEN', 'CAP', '1', '', 0),
(4, '116CP2002A', 'fab5ccbf29b2b13419aa9c78b35ff92c', 'SAHIL', 'VILAS', 'MAHADIK', 'NILIMA', '17-04-2019', 'MALE', 'NOTHING', 'sahilmahadik@gmail.com', '2147483647', 'UNEMPLOYED', 'SINGLE', 'NONE', 'ROOM NO-16 KALIKA APPARTMENT KOLBAD', 'MAHARASHTRA', 'THANE', 'THANE', 400022, 'MAHARASHTRA STATE BOARD,THANE SCHOOL,2013-03,480,550,A358982', 'MAHARASHTRA STATE BOARD,THANE COLLEGE,2016-02,470,650,M180158', '../files/student_files/116CP2002A/10th.pdf', '../files/student_files/116CP2002A/12th.pdf', '../files/student_files/116CP2002A/photo.jpg', '../files/student_files/116CP2002A/signature.png', '2147483647', 'vilasmahadik@gmail.com', '2147483647', 'vilasmahadik@gmail.com', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '2016', 'SE', 'COMPUTER', 'OPEN', 'CAP', '1', '', 0),
(5, '116CP2003A', '8e9da23de93908919fd79372bcaf09ae', 'MARI', 'THANGAMANI', ' -', 'BHAGYAM', '18-04-2019', 'MALE', 'NOTHING', 'maripillai17@gmail.com', '8329434538', 'UNEMPLOYED', 'SINGLE', 'B+', 'B-107,JANKI DHAM APT, SHIVAJI NAGAR, VALDHUNI, KALYAN', 'MAHARASHTRA', 'THANE', 'KALYAN', 421301, 'SSC,CENTRAL RAILWAY,2011-05,339,500,4211760', 'MSBTE,JONDHALE COLLEGE,2016-05,1198,1700,138240', '../files/student_files/116CP2003A/10th.pdf', '../files/student_files/116CP2003A/12th.pdf', '../files/student_files/116CP2003A/photo.jpg', '../files/student_files/116CP2003A/signature.jpg', '2147483647', 'maripillai17@gmail.com', '2147483647', 'maripillai17@gmail.com', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '2016', 'SE', 'COMPUTER', 'OPEN', 'CAP', '1', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject_incharge`
--

CREATE TABLE `subject_incharge` (
  `sub_id` int(11) NOT NULL,
  `batch_no` varchar(10) NOT NULL,
  `batch_year` varchar(5) NOT NULL,
  `subject_batch_no` varchar(15) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_short_name` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `subject_incharge` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table 1`
--

CREATE TABLE `table 1` (
  `COL 1` varchar(10) DEFAULT NULL,
  `COL 2` varchar(10) DEFAULT NULL,
  `COL 3` varchar(11) DEFAULT NULL,
  `COL 4` varchar(10) DEFAULT NULL,
  `COL 5` varchar(6) DEFAULT NULL,
  `COL 6` varchar(35) DEFAULT NULL,
  `COL 7` varchar(9) DEFAULT NULL,
  `COL 8` varchar(10) DEFAULT NULL,
  `COL 9` varchar(17) DEFAULT NULL,
  `COL 10` varchar(5) DEFAULT NULL,
  `COL 11` varchar(9) DEFAULT NULL,
  `COL 12` varchar(14) DEFAULT NULL,
  `COL 13` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table 1`
--

INSERT INTO `table 1` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`, `COL 9`, `COL 10`, `COL 11`, `COL 12`, `COL 13`) VALUES
('UID..', 'FIRST_NAME', 'MIDDLE_NAME', 'LAST_NAME', 'GENDER', 'ADDRESS', 'DOB', 'MOBILE_NO.', 'PARENT_MOBILE_NO.', 'PHOTO', 'SIGNATURE', 'SSC_PERCENTAGE', 'HSC/DIPLOMA_PERCENTAGE'),
('116CP2353A', 'Sahil', 'VILAS', 'Mahadik', 'MALE', 'ROOM NO-16 KALIKA APPARTMENT KOLBAD', '26/7/1997', '8356814559', '8149441505', 'LINK', 'LINK', '77', '65'),
('116CP2162A', 'AADESH', 'NARENDRA', 'BORGAONKAR', 'MALE', 'SEC-17,AIROLI,NAVI MUMBAI', '26/8/1997', '9987285257', '8097543255', 'LINK', 'LINK', '87', '71'),
('115CP1167A', 'SWAPNIL', '.', 'CHOPADE', 'MALE', 'GHATKOPAR(W)', '30/1/1997', '9757169996', '8356814559', 'LINK', 'LINK', '86', '75'),
('116CP2147A', 'MARI', 'THANGAMANI', '.', 'MALE', 'WALDUNI,KAYLAN', '17/4/1996', '8433795865', '8329434538', 'LINK', 'LINK', '70', '67');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_batch`
--
ALTER TABLE `class_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examcell`
--
ALTER TABLE `examcell`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `hod_information`
--
ALTER TABLE `hod_information`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `no_of_staff`
--
ALTER TABLE `no_of_staff`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `staff_information`
--
ALTER TABLE `staff_information`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `students_per_year`
--
ALTER TABLE `students_per_year`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `students_per_year_dse`
--
ALTER TABLE `students_per_year_dse`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `student_general_info`
--
ALTER TABLE `student_general_info`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `subject_incharge`
--
ALTER TABLE `subject_incharge`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_batch`
--
ALTER TABLE `class_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examcell`
--
ALTER TABLE `examcell`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hod_information`
--
ALTER TABLE `hod_information`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `no_of_staff`
--
ALTER TABLE `no_of_staff`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_information`
--
ALTER TABLE `staff_information`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students_per_year`
--
ALTER TABLE `students_per_year`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students_per_year_dse`
--
ALTER TABLE `students_per_year_dse`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_general_info`
--
ALTER TABLE `student_general_info`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject_incharge`
--
ALTER TABLE `subject_incharge`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
