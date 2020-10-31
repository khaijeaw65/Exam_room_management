-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 08, 2019 at 12:17 AM
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
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `faculty_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`ID`, `name`, `faculty_id`) VALUES
(1, 'วิศวะคอมพิวเตอร์', 1),
(7, 'test', 1),
(9, 'วิทยาการคอมพิวเตอร์', 3),
(10, 'เทคโนโลยีสารสนเทศ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `ID` int(20) NOT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`ID`, `Name`) VALUES
(1, 'อาคารอาทิตย์อุไรรัตน์'),
(2, 'อาคารประสิทธิรัตน์'),
(3, 'อาคารอุไรรัตน์'),
(4, 'อาคารวิทยาศาสตร์การแพทย์'),
(5, 'อาคารวิษณุรัตน์'),
(6, 'อาคารพิฆเณศ  Student Center'),
(7, 'อาคารหอสมุด'),
(8, 'อาคารคุณหญิงพัฒนา'),
(9, 'อาคารประสิทธิ์พัฒนา'),
(10, 'อาคารคณะรังสีเทคนิค'),
(11, 'อาคารรัตนคุณากร'),
(12, 'อาคารรังสิตประยูรศักดิ์'),
(13, 'อาคารสำนักงานอาคารและสิ่งแวดล้อม'),
(14, 'อาคารนันทนาการ'),
(15, 'อาคารดิจิตอล มัลติมีเดีย'),
(16, 'อาคารบริการ'),
(17, 'อาคารศาลาดนตรีสุริยเทพ'),
(18, 'อาคารศาลากวนอิม'),
(19, 'อาคารสถาปัตย์');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ID` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `building_id` int(40) NOT NULL,
  `room_id` int(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `student_prefix` varchar(10) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_surname` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `student_faculty` varchar(255) NOT NULL,
  `student_branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ID`, `date`, `building_id`, `room_id`, `subject`, `student_prefix`, `student_name`, `student_surname`, `student_id`, `student_faculty`, `student_branch`) VALUES
(82, '2019-12-08', 6, 22, 'หกกหก', 'นาย', 'ไข่ดาว', 'พิเศษ', '6100002', 'เชฟ', 'ของคาว'),
(83, '2019-12-08', 6, 22, 'หกกหก', 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '6100004', 'เชฟ', 'ของคาว'),
(84, '2019-12-08', 6, 22, 'หกกหก', 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '6100005', 'เชฟ', 'ของคาว'),
(85, '2019-12-08', 6, 22, 'หกกหก', 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '6100006', 'เชฟ', 'ของคาว'),
(86, '2019-12-08', 6, 22, 'หกกหก', 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '6100006', 'เชฟ', 'ของคาว'),
(87, '2019-12-08', 6, 22, 'หกกหก', 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '6100007', 'เชฟ', 'ของคาว'),
(88, '2019-12-08', 6, 22, 'หกกหก', 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '6100008', 'เชฟ', 'ของคาว'),
(89, '2019-12-08', 6, 22, 'หกกหก', 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '6100009', 'เชฟ', 'ของคาว'),
(90, '2019-12-08', 6, 22, 'หกกหก', 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '6100010', 'เชฟ', 'ของคาว');

-- --------------------------------------------------------

--
-- Table structure for table `examiner`
--

CREATE TABLE `examiner` (
  `ID` int(11) NOT NULL,
  `prefix` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_id` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `faculty` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `examiner`
--

INSERT INTO `examiner` (`ID`, `prefix`, `name`, `surname`, `student_id`, `faculty`, `branch`) VALUES
(1, 'นาย', 'ณัฐวัฒน์', 'จิรกุลประดิษฐ์', '?????', 'นวัตกรรมดิจิตอลและเทคโนโลยีสารสนเทศ', 'วิทยาการคอมพิวเตอร์'),
(2, 'นาย', 'ไข่เจียว', 'พิเศษ', '?????', 'เชฟ', 'ของคาว'),
(3, 'นาย', 'ไข่ดาว', 'พิเศษ', '?????', 'เชฟ', 'ของคาว'),
(4, 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '?????', 'เชฟ', 'ของคาว'),
(5, 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '?????', 'เชฟ', 'ของคาว'),
(6, 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '?????', 'เชฟ', 'ของคาว'),
(7, 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '?????', 'เชฟ', 'ของคาว'),
(8, 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '?????', 'เชฟ', 'ของคาว'),
(9, 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '?????', 'เชฟ', 'ของคาว'),
(10, 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '?????', 'เชฟ', 'ของคาว'),
(11, 'นาย', 'ไข่ตุ๋น', 'พิเศษ', '?????', 'เชฟ', 'ของคาว');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`ID`, `name`) VALUES
(1, 'วิศวกรรมศาสตร์'),
(2, 'test'),
(3, 'นวัตกรรมดิจิตอลและเทคโนโลยีสารสนเทศ');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `ID` int(20) NOT NULL,
  `seat_amount` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `num` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `building_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ID`, `seat_amount`, `num`, `building_id`) VALUES
(1, '40', '6-306B', 6),
(2, '80', '6-306A', 6),
(6, '40', '6-303B', 6),
(10, '40', '3-301', 3),
(16, '100', '1-504', 1),
(19, '50', '6-303A', 6),
(20, '25', '6-331A', 6),
(21, '50', '1-101', 1),
(22, '50', '345', 6);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`) VALUES
(1, 'field', '123456'),
(2, 'admin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `building_id` (`building_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `examiner`
--
ALTER TABLE `examiner`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BuildingID` (`building_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `examiner`
--
ALTER TABLE `examiner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`ID`);

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `building` (`ID`),
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`ID`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `building` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
