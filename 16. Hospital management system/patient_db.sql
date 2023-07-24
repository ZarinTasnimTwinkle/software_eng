-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 09:53 PM
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
-- Database: `patient_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL DEFAULT '9AM to 10AM',
  `department` varchar(200) NOT NULL DEFAULT 'Neurology',
  `doctor` varchar(200) NOT NULL DEFAULT 'Dr. NASHIMUDDIN AHMED',
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(100) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `dphone_no` varchar(11) NOT NULL,
  `demail` varchar(200) NOT NULL,
  `ddepartment` varchar(200) NOT NULL DEFAULT 'Neurology',
  `daction` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `dname`, `dphone_no`, `demail`, `ddepartment`, `daction`) VALUES
(1, 'DR. NASHIMUDDIN AHMED', '01723456778', 'nashimuddin@gmail.com', 'Neurology', ''),
(2, 'DR. TASNEEM HASIN', '01923455678', 'tasneem@gmail.com', 'Cardiology', ''),
(3, 'DR. SHARMIN KABIR', '01723456778', 'sharmin@gmail.com', 'Dermatology', ''),
(4, 'DR. KUMRUL HASAN', '01923455678', 'hasan@gmail.com', 'Pshycology', ''),
(5, 'DR. NASIMA ZAHAN', '01723456778', 'nasima@gmail.com', 'Dermatology', ''),
(6, 'DR. ZARIN TASNIM', '01923455678', 'ztt@gmail.com', 'Cardiology', '');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL DEFAULT '9AM to 10AM',
  `department` varchar(200) NOT NULL DEFAULT 'Neurology',
  `doctor` varchar(200) NOT NULL DEFAULT 'Dr. NASHIMUDDIN AHMED',
  `message` varchar(300) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`id`, `name`, `phone_no`, `email`, `time`, `department`, `doctor`, `message`, `status`) VALUES
(1, 'Zarin Tasnim', '01586370890', 'zarin@gmail.com', '9AM to 10AM', 'Neurology', 'Dr. NASHIMUDDIN AHMED', '', 'Pending'),
(2, 'Zinia Zafrin', '01710895716', 'ziniaoyshi@gmail.com', '11AM to 12PM', 'Dermatology', 'Dr. SHARMIN KABIR', '', 'Pending'),
(3, 'Hashim Uddin ', '01716005566', 'hashim@gmail.com', '11AM to 12PM', 'Cardiology', 'Dr. TASNEEM HASIN', '', 'Pending'),
(4, 'Jahanara Begum', '01716005566', 'jahanara@gmail.com', '11AM to 12PM', 'Cardiology', 'Dr. TASNEEM HASIN', '', 'Pending'),
(5, 'Ishita khan', '01234567890', 'ishita@gmail.com', '2PM to 4PM', 'Psycology', 'Dr. KUMRUL HASAN', '', 'Pending'),
(6, 'Abdul Kamal', '01823456789', 'kamal@gmail.com', '11AM to 12PM', 'Dermatology', 'Dr. SHARMIN KABIR', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `reg_form`
--

CREATE TABLE `reg_form` (
  `id` int(100) NOT NULL,
  `your_name` varchar(200) NOT NULL,
  `your_email` varchar(200) NOT NULL,
  `your_password` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL DEFAULT 'Patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg_form`
--

INSERT INTO `reg_form` (`id`, `your_name`, `your_email`, `your_password`, `user_type`) VALUES
(1, 'zarin', 'zarin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'patient'),
(2, 'Tasnim', 'tasnim@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'assistant'),
(3, 'Smita', 'smita@gmail.com', '34f6a8c55b5fda9265e3415a96b800b5', 'patient'),
(4, 'Rowshan', 'rowshan@gmail.com', '3aea9516d222934e35dd30f142fda18c', 'assistant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_form`
--
ALTER TABLE `reg_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reg_form`
--
ALTER TABLE `reg_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
