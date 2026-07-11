-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2026 at 05:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uagms`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `staffID` int(11) NOT NULL,
  `staffName` varchar(255) NOT NULL,
  `staffPosition` varchar(255) NOT NULL,
  `staffDetails` varchar(255) NOT NULL,
  `staffIMG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`staffID`, `staffName`, `staffPosition`, `staffDetails`, `staffIMG`) VALUES
(1, 'Mohd Ikrima Bin Yahya', 'Founder', 'He studied about fitness from several international fitness trainers. He has also taken the Zumba Instructor Specialists training in Brunei. He is also someone who has experience concerning gym.', '../../assets/images/first-trainer.jpeg'),
(2, 'Mohd Qisthee Bin Yahya', 'Operational Manager', 'He became the gym\'s operations manager as a first step toward his ultimate goal of becoming a successful coach. The knowledge he acquires about fitness comes from both his own experiences and the advice of experts.', '../../assets/images/second-trainer.jpg'),
(3, 'Mohd Waqiuddin Bin Yahya', 'Assistant Coach', 'He educated about fitness by watching online videos and reading articles written by experts. He has prior experience assisting members at a gym.', '../../assets/images/third-trainer.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminUsername` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL,
  `adminIMG` varchar(255) NOT NULL,
  `logStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminUsername`, `adminEmail`, `adminPassword`, `adminIMG`, `logStatus`) VALUES
(1, 'qisthee', 'qisthee@gmail.com', 'abc123', '../../assets/images/adminqisthee.jpg', '1'),
(2, 'qiu', 'qiu@gmail.com', 'abc123', '../../assets/images/third-trainer.jpeg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientID` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobileNo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `member` varchar(11) NOT NULL,
  `programJoined` varchar(255) NOT NULL,
  `clientIMG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `fullName`, `username`, `mobileNo`, `email`, `password`, `gender`, `address`, `member`, `programJoined`, `clientIMG`) VALUES
(1001, 'HARITH ZAKWAN ', 'harith', '0120202222', 'zakwan@gmail.com', 'abc123', 'Male', '16 Jln Saroja Taman Pusing Baru 31550 Pusing Pusing Perak 31550 Malaysia Pusing Perak 31550 Malaysia', 'Active', 'Eek! Online Program', '../../assets/images/harith.jpg'),
(1002, 'FAIZATUL FITRI ', 'fai', '0130303333', 'faizatulfitri@gmail.com', 'abc123', 'Male', '26 Persiaran Baru 5 Taman Bersatu Kampung Kepayang 31300 Perak Malaysia', 'Active', '', '../../assets/images/faizatul.jpg'),
(1003, 'MOHD HAMKA ', 'hamka', '0140404444', 'hamka@gmail.com', 'abc123', 'Male', '303 Jalan Sultan Azlan Shah, Sungai Nibong, 11900', 'Active', 'Eek! Personal Program', '../../assets/images/hamka.jpg'),
(1004, 'JOHN CENA ', 'john', '0150505555', 'jcena@gmail.com', 'Abc123@', 'Male', 'NO. 84, LORONG CENDERAWASIH 6H1, TAMAN SRI SENA, JALAN SEMARIANG', 'Pending', '', '../../assets/images/cena.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactID` int(11) NOT NULL,
  `contactLink` varchar(255) NOT NULL,
  `contactIMG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactID`, `contactLink`, `contactIMG`) VALUES
(1, 'https://www.facebook.com/uagkotasamarahan', '../../assets/images/fb.png'),
(2, 'https://wa.me/601126869280', '../../assets/images/ws.png'),
(3, 'https://www.instagram.com/ultimateathleticsgym/', '../../assets/images/ig.png'),
(4, 'https://www.tiktok.com/@ultimateathleticsgym', '../../assets/images/tiktok.png');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `facilityID` int(11) NOT NULL,
  `facilityName` varchar(255) NOT NULL,
  `facilityIMG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facilityID`, `facilityName`, `facilityIMG`) VALUES
(1, 'Dumbbell Rack', '../../assets/images/eq1.jpg'),
(2, 'Preacher Curl Rack', '../../assets/images/eq2.jpg'),
(3, 'Barbell & EZ-Bar Rack', '../../assets/images/eq3.jpg'),
(4, 'Incline Bench Press', '../../assets/images/eq4.jpg'),
(5, 'Bench Press', '../../assets/images/eq5.jpg'),
(6, 'Leg Press Machine', '../../assets/images/eq6.jpg'),
(7, 'Sit Up Bench', '../../assets/images/eq7.jpg'),
(8, 'Squat Rack', '../../assets/images/eq8.jpg'),
(9, 'Prone Leg Curl Machine', '../../assets/images/eq9.jpg'),
(10, 'Seated Calf Raise Machine', '../../assets/images/eq10.jpg'),
(11, 'Leg Extension Machine', '../../assets/images/eq11.jpg'),
(12, 'Cable Pulldown Machine', '../../assets/images/eq12.jpg'),
(13, 'Long Pull Machine', '../../assets/images/eq13.jpg'),
(14, 'Treadmill', '../../assets/images/eq14.jpg'),
(15, 'Machine Fly', '../../assets/images/eq15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `membershipID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `mobileNo` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `expiryDate` date NOT NULL DEFAULT (curdate() + interval 1 month),
  `membershipStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`membershipID`, `clientID`, `fullName`, `mobileNo`, `date`, `expiryDate`, `membershipStatus`) VALUES
(1001, 1001, 'HARITH ZAKWAN ', '0120202222', '2022-12-08', '2023-01-08', 'Active'),
(1002, 1002, 'FAIZATUL FITRI ', '0130303333', '2023-01-02', '2023-02-02', 'Active'),
(1003, 1003, 'MOHD HAMKA', '0140404444', '2023-01-12', '2023-02-12', 'Active'),
(1004, 1004, 'JOHN CENA ', '0150505555', '2023-01-12', '2023-02-12', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `invoiceID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `paymentFor` varchar(255) NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentAmount` float NOT NULL,
  `paymentProof` varchar(255) NOT NULL,
  `approvalStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`invoiceID`, `clientID`, `paymentMethod`, `paymentFor`, `paymentDate`, `paymentAmount`, `paymentProof`, `approvalStatus`) VALUES
(1001, 1004, 'Bank Transfer', 'Membership', '2023-01-12', 90, '../../assets/images/receipt1.png', 'Pending'),
(1002, 1001, 'DuitNow QR', 'Walk-In', '2023-01-12', 15, '../../assets/images/receipt2.png', 'Approved'),
(1009, 1001, 'DuitNow QR', 'Membership', '2023-01-13', 90, '../../assets/images/receipt3.png', 'Approved'),
(1012, 1001, 'Pay by Cash', 'Walk-in', '2023-01-13', 15, '../../assets/images/pbc2.jpg', 'Approved'),
(1013, 1001, 'Pay by Cash', 'Membership', '2023-01-13', 90, '../../assets/images/pbc1.jpg', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `programID` int(11) NOT NULL,
  `programName` varchar(255) NOT NULL,
  `desc1` varchar(255) NOT NULL,
  `desc2` varchar(255) NOT NULL,
  `desc3` varchar(255) NOT NULL,
  `desc4` varchar(255) NOT NULL,
  `desc5` varchar(255) NOT NULL,
  `programIMG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`programID`, `programName`, `desc1`, `desc2`, `desc3`, `desc4`, `desc5`, `programIMG`) VALUES
(1, 'Eek! Online Program', 'Virtual personal training programme', 'Required smart phone or laptop', 'Flexible date and time', 'Customised training and nutrition plans', 'Minimum 3 session', '../../assets/images/eop.jpg'),
(2, 'Eek! Personal Program', 'Face-to-face training', 'Flexible date and time', 'Correct technique reduces injury risk', 'Improves health and fitness', 'Minimum 3 session', '../../assets/images/epp.jpg'),
(3, 'Zumba Classes (Unavailable)', 'Face-to-face training', 'Flexible date and time', 'Cardio, muscle conditioning, balance', 'Enjoy yourself like at a dance party', 'Limited Slot', '../../assets/images/zumba.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `progression`
--

CREATE TABLE `progression` (
  `sessionID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `sessionNo` int(11) NOT NULL,
  `sessionDate` date NOT NULL,
  `sessionRoutine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progression`
--

INSERT INTO `progression` (`sessionID`, `clientID`, `program`, `sessionNo`, `sessionDate`, `sessionRoutine`) VALUES
(1, 1001, 'Eek! Online Program', 1, '2023-01-01', 'Chest & Back'),
(2, 1001, 'Eek! Online Program', 2, '2023-01-02', 'Biceps & Triceps'),
(3, 1001, 'Eek! Online Program', 3, '2023-01-03', 'Glutes & Calves'),
(4, 1003, 'Eek! Personal Program', 1, '2023-01-01', 'Chest & Triceps'),
(5, 1003, 'Eek! Personal Program', 2, '2023-01-02', 'Back & Biceps'),
(6, 1003, 'Eek! Personal Program', 3, '2023-01-03', 'Shoulders & Forearms'),
(7, 1003, 'Eek! Personal Program', 4, '2023-01-04', 'Quads & Hamstrings'),
(9, 1001, 'Eek! Online Program', 4, '2023-01-04', 'Quads & Hamstrings');

-- --------------------------------------------------------

--
-- Table structure for table `progresstracker`
--

CREATE TABLE `progresstracker` (
  `trackerID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `program` varchar(255) NOT NULL,
  `sessionNo` int(11) NOT NULL,
  `sessionDate` date NOT NULL,
  `weight` double NOT NULL,
  `chest` double NOT NULL,
  `rightArm` double NOT NULL,
  `leftArm` double NOT NULL,
  `rightThigh` double NOT NULL,
  `leftThigh` double NOT NULL,
  `waist` double NOT NULL,
  `hips` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progresstracker`
--

INSERT INTO `progresstracker` (`trackerID`, `clientID`, `program`, `sessionNo`, `sessionDate`, `weight`, `chest`, `rightArm`, `leftArm`, `rightThigh`, `leftThigh`, `waist`, `hips`) VALUES
(1, 1001, 'Eek! Online Program', 1, '2023-01-01', 51.5, 54.3, 20.2, 19.8, 34.5, 34.4, 54.3, 50.7),
(2, 1001, 'Eek! Online Program', 2, '2023-01-02', 51.5, 54.3, 20.9, 20.1, 34.5, 34.4, 54.3, 50.7),
(3, 1001, 'Eek! Online Program', 3, '2023-01-03', 51.5, 54.3, 20.9, 20.1, 35.1, 35, 54.7, 50.9),
(4, 1003, 'Eek! Personal Program', 1, '2023-01-01', 67.5, 59.2, 23.2, 23.1, 38.6, 38.6, 58.2, 53.1),
(5, 1003, 'Eek! Personal Program', 2, '2023-01-02', 67.5, 59.2, 23.9, 23.8, 38.6, 38.6, 58.2, 53.1),
(6, 1003, 'Eek! Personal Program', 3, '2023-01-03', 67.5, 59.2, 23.9, 23.8, 38.6, 38.6, 58.2, 53.1),
(7, 1003, 'Eek! Personal Program', 4, '2023-01-04', 67.5, 59.2, 23.9, 23.8, 38.9, 38.9, 58.2, 53.1),
(8, 1001, 'Eek! Online Program', 4, '2023-01-04', 51.7, 54.4, 20.9, 20.1, 35.2, 35.1, 54.7, 50.9);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int(11) NOT NULL,
  `serviceName` varchar(255) NOT NULL,
  `servicePrice` varchar(255) NOT NULL,
  `serviceSession` varchar(255) NOT NULL,
  `serviceDetail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceID`, `serviceName`, `servicePrice`, `serviceSession`, `serviceDetail`) VALUES
(1, 'Walk-In', 'RM15 per Entry', 'Unlimited Hours', 'Can Use All Facilities'),
(2, 'Membership', 'RM90 per Month', 'Unlimited Days In A Month', 'Can Use All Facilities'),
(3, 'Eek! Online Program', 'RM30 per Session', 'Minimum 3 Sessions', 'Personal Coaches Virtually'),
(4, 'Eek! Personal Program', 'RM30 per Session', 'Minimum 3 Sessions', 'Face-To-Face Personal Coaches');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactID`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facilityID`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`membershipID`),
  ADD KEY `customerID` (`clientID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`invoiceID`),
  ADD KEY `customerID` (`clientID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`programID`);

--
-- Indexes for table `progression`
--
ALTER TABLE `progression`
  ADD PRIMARY KEY (`sessionID`),
  ADD KEY `customerID` (`clientID`);

--
-- Indexes for table `progresstracker`
--
ALTER TABLE `progresstracker`
  ADD PRIMARY KEY (`trackerID`),
  ADD KEY `customerID` (`clientID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facility`
--
ALTER TABLE `facility`
  MODIFY `facilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `invoiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `programID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `progression`
--
ALTER TABLE `progression`
  MODIFY `sessionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `progresstracker`
--
ALTER TABLE `progresstracker`
  MODIFY `trackerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`clientID`) REFERENCES `client` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`clientID`) REFERENCES `client` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `progression`
--
ALTER TABLE `progression`
  ADD CONSTRAINT `progression_ibfk_1` FOREIGN KEY (`clientID`) REFERENCES `client` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `progresstracker`
--
ALTER TABLE `progresstracker`
  ADD CONSTRAINT `progresstracker_ibfk_1` FOREIGN KEY (`clientID`) REFERENCES `client` (`clientID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
