-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 06:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it26`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `AdmissionNo` varchar(6) NOT NULL,
  `admdate` date DEFAULT NULL,
  `patientID` varchar(6) DEFAULT NULL,
  `doctorID` varchar(6) DEFAULT NULL,
  `illness` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`AdmissionNo`, `admdate`, `patientID`, `doctorID`, `illness`) VALUES
('ad001', '2011-02-01', 'px5', 'dd3', 'diabetes'),
('ad002', '2011-01-02', 'px8', 'dd1', 'dengue'),
('ad003', '2011-01-02', 'px6', 'dd5', 'diabetes'),
('ad004', '2011-01-03', 'px5', 'dd5', 'ashtma'),
('ad005', '2011-01-03', 'px6', 'dd5', 'diabetes'),
('ad006', '2011-01-03', 'px2', 'dd5', 'cough and fever'),
('ad007', '2011-01-03', 'px3', 'dd3', 'miscarriage'),
('ad008', '2011-01-04', 'px7', 'dd2', 'ovarian cyst'),
('ad009', '2011-01-04', 'px4', 'dd4', 'bone fracture'),
('ad010', '2011-01-04', 'px9', 'dd1', 'measles'),
('ad011', '2011-01-04', 'px10', 'dd3', 'Ectopic Pregnancy'),
('ad012', '2011-04-01', 'px08', 'dd1', 'UTI'),
('ad013', '0000-00-00', 'px11', 'dd1', 'diarrhea'),
('ad014', '0000-00-00', 'px12', 'dd5', 'ashtma and flu'),
('ad016', '0000-00-00', 'px10', 'dd1', 'ubo'),
('ad017', '2023-05-13', 'px10', 'dd1', 'ubo'),
('ad018', '2023-05-15', 'px15', 'dd1', 'ubo');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `contactId` varchar(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `archived` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`contactId`, `address`, `email`, `phone_number`, `archived`) VALUES
('cont1', 'Davao city', 'something@gmail.com', '09287127782', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorID` varchar(6) NOT NULL,
  `fullname` varchar(18) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `specialization` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorID`, `fullname`, `gender`, `specialization`) VALUES
('dd1', 'Garde,Caroleen', 'female', 'Pediatrician'),
('dd2', 'Chua,Cathy', 'female', 'Ob-gynecologist'),
('dd3', 'Vista,Avenida', 'female', 'Ob-gynecologist'),
('dd4', 'Poloyapoy,Ranier', 'male', 'surgeon'),
('dd5', 'Parangan,Liz', 'female', 'physician');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `em_contactId` varchar(15) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `relationship` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`em_contactId`, `fullname`, `email`, `phone_number`, `relationship`) VALUES
('eme_cont1', 'Rolly D. Tan', 'something@gmail.com', '09732842388', 'wala');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medcode` varchar(6) NOT NULL,
  `name` varchar(15) DEFAULT NULL,
  `generic` varchar(15) DEFAULT NULL,
  `volume` varchar(6) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medcode`, `name`, `generic`, `volume`, `price`) VALUES
('m001', 'cefallin', 'cefallexin', '10ml', 67),
('m002', 'solmux', 'carbocisteine', '500mg', 12),
('m003', 'robitussin', 'carbocisteine', '500mg', 9),
('m004', 'Ponstan', 'MefenamicAcid', '500mg', 17),
('m005', 'Dolfenal', 'MefenamicAcid', '500mg', 20),
('m006', 'Gardan', 'MefenamicAcid', '500mg', 12),
('m007', 'Calpol', 'Paracetamol', '10ml', 45),
('m009', 'Ventolin', 'Salbutamol', '2mg', 9),
('m010', 'Bioflu', 'Paracetamol', '500mg', 15),
('m011', 'Biogesic', 'Paracetamol', '500mg', 4),
('m012', 'Glucophage', 'Metformin', '500mg', 12),
('m013', 'Glumetza', 'Metformin', '500mg', 22),
('m014', 'Fortamet', 'Metformin', '500mg', 14),
('m015', 'Pedialyte', 'OralSalt', '500ml', 74),
('m016', 'Tempra', 'Paracetamol', '25ml', 79),
('m017', 'Hemostan', 'Menorrhagia', '500mg', 39);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` varchar(12) NOT NULL,
  `ln` varchar(15) DEFAULT NULL,
  `fn` varchar(15) DEFAULT NULL,
  `mi` varchar(2) DEFAULT NULL,
  `birthday` date NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `blood_type` varchar(5) NOT NULL,
  `contactID` varchar(15) NOT NULL,
  `em_contactId` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `ln`, `fn`, `mi`, `birthday`, `age`, `gender`, `blood_type`, `contactID`, `em_contactId`) VALUES
('px1', 'Alonzo', 'Bea', 'O', '0000-00-00', 22, 'female', '', '', ''),
('px10', 'Cruz', 'Sheryl', 'S', '0000-00-00', 33, 'Female', '', '', ''),
('px11', 'Manabat', 'Xyriel', 'F', '0000-00-00', 5, 'Female', '', '', ''),
('px12', 'Hermosa', 'Kristine', 'F', '0000-00-00', 23, 'Female', '', '', ''),
('px13', 'Tan', 'Karl Christian', 'D', '2002-01-27', 21, 'male', 'A-', 'cont1', 'eme_cont1'),
('px14', 'Tan', 'Karl Christian', 'D', '2002-01-27', 21, 'male', 'A ', 'cont2', 'eme_cont2'),
('px15', 'Tan', 'Karl Christian', 'D', '2002-01-28', 21, 'male', 'AB-', 'cont1', 'eme_cont1'),
('px2', 'Cruz', 'JohnLloyd', 'L', '0000-00-00', 25, 'Male', '', '', ''),
('px3', 'Magdayao', 'Shaina', 'D', '0000-00-00', 19, 'female', '', '', ''),
('px4', 'Cuizon', 'Dolphy', 'D', '0000-00-00', 85, 'Male', '', '', ''),
('px5', 'Sotto', 'Vic', 'P', '0000-00-00', 55, 'Male', '', '', ''),
('px6', 'Andrews', 'Bobby', 'K', '0000-00-00', 32, 'male', '', '', ''),
('px7', 'Morales', 'Vina', 'M', '0000-00-00', 35, 'female', '', '', ''),
('px8', 'Aguas', 'Nash', 'E', '0000-00-00', 8, 'Male', '', '', ''),
('px9', 'San Pedro', 'Charlene', 'T', '0000-00-00', 8, 'Female', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `AdmissionNo` varchar(6) NOT NULL,
  `medcode` varchar(6) NOT NULL,
  `dosage` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `AdmissionNo`, `medcode`, `dosage`) VALUES
(1, 'ad001', 'm011', '3x a day'),
(2, 'ad001', 'm012', 'once a day'),
(3, 'ad002', 'm007', '4x a day'),
(4, 'ad002', 'm015', '3x a day'),
(5, 'ad003', 'm012', '3x a day'),
(6, 'ad004', 'm002', '3x a day'),
(7, 'ad005', 'm012', 'once a day'),
(8, 'ad006', 'm002', '3x a day'),
(9, 'ad006', 'm011', '3x a day'),
(10, 'ad007', 'm004', '3x a day'),
(11, 'ad008', 'm006', '3x a day'),
(12, 'ad009', 'm010', '3x a day'),
(13, 'ad010', 'm015', 'every fever >=39'),
(14, 'ad010', 'm016', '3x a day'),
(15, 'ad011', 'm005', '3x a day'),
(16, 'ad011', 'm017', '2x a day'),
(17, 'ad012', 'm001', '4x a day'),
(18, 'ad012', 'm007', '4x a day'),
(19, 'ad012', 'm016', '4x a day'),
(20, 'ad013', 'm015', 'every lose stool'),
(21, 'ad014', 'm009', 'as needed'),
(22, 'ad014', 'm010', '3x a day'),
(23, 'ad018', 'm009', 'as needed'),
(24, 'ad018', 'm010', '3 times a day'),
(25, 'ad018', 'm010', '3 times a day'),
(26, 'ad015', 'm016', '3times a day');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(8) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `patientID` varchar(12) NOT NULL,
  `role` varchar(20) NOT NULL,
  `archived` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `patientID`, `role`, `archived`) VALUES
(1, 'test', 'pass', 'px15', 'patient', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`AdmissionNo`);

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorID`);

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`em_contactId`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medcode`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`),
  ADD KEY `AdmissionNo` (`AdmissionNo`,`medcode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
