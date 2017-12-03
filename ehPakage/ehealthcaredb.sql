-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2017 at 11:53 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehealthcaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `doctor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) UNSIGNED ZEROFILL NOT NULL,
  `image` varchar(300) NOT NULL,
  `degrees` text NOT NULL,
  `designation` text NOT NULL,
  `organization` text NOT NULL,
  `year of graduation` year(4) NOT NULL,
  `contactaddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctor_id`, `name`, `email`, `phone`, `image`, `degrees`, `designation`, `organization`, `year of graduation`, `contactaddress`) VALUES
(1000, ' Biplab Kumar Das', 'dkbiplab@gmail.com', 01711190944, 'd', ' MBBS,DDV    Dermatology', 'Assistant Professor', 'Sher - E - Bangla Medical College (SBMC)', 1985, 'Barisal,Bangladesh'),
(1001, 'Dr. Abdul Hamid', 'hamid@gmail.com', 00008143913, 'n', 'MBBS, DTCD, MRIT', 'Consultant', 'City Hospital Ltd.', 1987, '1/8, Block-E, Lalmatia, Sat Masjid Road, Dhaka - 1217'),
(1002, ' Dr. Md. Atiqur Rahman', 'atiqur@gmail.com', 00152463101, 'c', 'MBBS (Dhaka), DTCD (D.U), MD (Chest)', 'Professor', 'National Institute of Chest Disease Hospital', 1995, ''),
(1003, 'Dr. Mahabub Anwer ', 'mahabub@gmail.com', 00000000000, 'd', '', '', '', 2000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctorlogin`
--

CREATE TABLE `tbl_doctorlogin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `doctorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctorlogin`
--

INSERT INTO `tbl_doctorlogin` (`email`, `password`, `doctorid`) VALUES
('dkbiplab@gmail.com', 'dkbiplab', 1000),
('hamid@gmail.com', 'hamid', 1001),
('atiqur@gmail.com', 'atiquir', 1002),
('mahabub@gmail.com', 'mahabub', 1003);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dpd`
--

CREATE TABLE `tbl_dpd` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `prescription_id` int(11) DEFAULT NULL,
  `request_id` int(11) DEFAULT NULL,
  `requettime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dpd`
--

INSERT INTO `tbl_dpd` (`id`, `patient_id`, `doctor_id`, `prescription_id`, `request_id`, `requettime`) VALUES
(1, 2000, 1000, 60000, 30001, '2017-07-07 22:28:11'),
(2, 2000, 1000, 60001, 30002, '2017-07-08 09:18:31'),
(3, 2002, 1000, 60002, 30003, '2017-07-08 09:22:20'),
(4, 2003, 1001, NULL, 30004, '2017-07-08 09:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `patient_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `phone` int(11) UNSIGNED ZEROFILL NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`patient_id`, `name`, `birth_date`, `gender`, `height`, `marital_status`, `phone`, `email`, `image`) VALUES
(2000, 'Sudipto Baral', '1995-02-03', 'Male', '5.5', 'Unmarried', 01743142948, 'Sudiptobaral.me@gmail.com', 'Images/595fb5ca7043d.png'),
(2001, 'Animesh', '1996-04-28', 'Male', '5"2''', 'Unmarried', 01786580405, 'khashkel.animesh89@gmail.com', 's'),
(2002, 'Joy Karmaker', '1995-07-08', 'Male', '3', 'Unmarried', 01782323929, 'joykarmaker2069@gmail.com', 'as'),
(2003, 'Farhad Hossain', '1990-07-05', 'Male', '6', 'Married', 01773478962, 'farhad@gmail.com', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patientlogin`
--

CREATE TABLE `tbl_patientlogin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_patientlogin`
--

INSERT INTO `tbl_patientlogin` (`email`, `password`, `patient_id`) VALUES
('Sudiptobaral.me@gmail.com', 'iamsudipto', 2000),
('khashkel.animesh89@gmail.com', 'iamanimesh', 2001),
('joykarmaker2069@gmail.com', 'iamzc', 2002),
('farhad@gmail.com', 'iamfarhad', 2003);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription`
--

CREATE TABLE `tbl_prescription` (
  `prescription_id` int(11) NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `detail` text NOT NULL,
  `responded_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_prescription`
--

INSERT INTO `tbl_prescription` (`prescription_id`, `request_id`, `detail`, `responded_at`) VALUES
(60000, 30001, 'You can try these medecines for 1 monthYou can try these medecines for 1 monthYou can try these medecines for 1 monthYou can try these medecines for 1 monthYou can try these medecines for 1 monthYou can try these medecines for 1 month\n1.Disipane 0.5mg 0+0+1\n2.Rebepra  20mg  1+0+1\nYou should stop taking this medecines after 1 month.', '2017-07-08 15:56:04'),
(60001, 30002, 'You can try these medecines\n\n1.Napa 500mg  1+1+1  7 days\n\n2.Cebac 500mg  1+0+1  7 days\n\n3.Saclo 20mg   1+0+1   30 days\n\n\n', '2017-07-08 16:02:27'),
(60002, 30003, 'You can try these medecines\r\n\r\n1.Napa 500mg  1+1+1  7 days\r\n\r\n2.Cebac 500mg  1+0+1  7 days\r\n\r\n3.Saclo 20mg   1+0+1   30 days\r\n\r\n\r\n', '2017-07-08 16:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `request_id` int(11) NOT NULL,
  `prescription_id` int(11) DEFAULT NULL,
  `disease_name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `q1` text NOT NULL,
  `q2` text NOT NULL,
  `q3` text NOT NULL,
  `q4` text NOT NULL,
  `audio_description` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `requettime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`request_id`, `prescription_id`, `disease_name`, `detail`, `q1`, `q2`, `q3`, `q4`, `audio_description`, `image`, `requettime`) VALUES
(30000, NULL, '', '', '', '', '', '', '', '', '2017-07-07 22:27:10'),
(30001, 60000, 'Ploblem In Sleep', 'I cnat sleep properly\n', '52', 'Since A Month', 'No', 'No', '', 'Images/59600afbc0820.png', '2017-07-07 22:28:11'),
(30002, 60001, 'Pain In Eye Movement', 'I  feel pain on eyeball movement.Eye also gets watery and itchy.Sometime Eye gets red', '53', 'About A Week', 'No', 'Yes I Have Allergies', '', 'Images/5960a366efdb4.png', '2017-07-08 09:18:30'),
(30003, 60002, 'Fever', 'I am feeling like fever when I came back from my university', '53', 'About A Day', 'No', 'Yes', '', 'Images/5960a44c0faa0.png', '2017-07-08 09:22:20'),
(30004, NULL, 'Infection Under Lips', 'I have some infection under my lips.I think it is for lack of vitamin C.Sugggest some medicine', '53', 'About A Week', 'No', 'Yes', '', 'Images/5960aa17eaf33.png', '2017-07-08 09:47:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_doctorlogin`
--
ALTER TABLE `tbl_doctorlogin`
  ADD PRIMARY KEY (`doctorid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_dpd`
--
ALTER TABLE `tbl_dpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_patientlogin`
--
ALTER TABLE `tbl_patientlogin`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD PRIMARY KEY (`prescription_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
--
-- AUTO_INCREMENT for table `tbl_doctorlogin`
--
ALTER TABLE `tbl_doctorlogin`
  MODIFY `doctorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
--
-- AUTO_INCREMENT for table `tbl_dpd`
--
ALTER TABLE `tbl_dpd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2004;
--
-- AUTO_INCREMENT for table `tbl_patientlogin`
--
ALTER TABLE `tbl_patientlogin`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2004;
--
-- AUTO_INCREMENT for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60004;
--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30005;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
