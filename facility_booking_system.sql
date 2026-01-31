-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2026 at 11:10 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facility_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `admin_type` enum('super','department') COLLATE utf8mb4_general_ci DEFAULT 'department'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `applicant_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `institution` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `matric_no` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `faculty` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `course` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`applicant_id`, `user_id`, `status`, `institution`, `address`, `phone`, `matric_no`, `faculty`, `course`) VALUES
(1, 3, 'Active', 'UTHM', 'UiTM Segamat', '0123456789', '', '', ''),
(2, 4, 'Active', 'UiTM Segamat/UTM', 'Johor', '017-717 5722', '', '', ''),
(3, 5, 'Active', NULL, NULL, NULL, '', '', ''),
(4, 14, 'Active', NULL, NULL, NULL, '2025123456', 'KOLEJ PENGAJIAN PENGKOMPUTERAN, INFORMATIK DAN MATEMATIK', 'CDIM262'),
(5, 15, 'Active', NULL, NULL, NULL, '2025567890', 'KOLEJ PENGAJIAN PENGKOMPUTERAN, INFORMATIK DAN MATEMATIK', 'CDIM262'),
(6, 16, 'Active', NULL, NULL, NULL, '2025456789', 'KOLEJ PENGAJIAN PENGKOMPUTERAN, INFORMATIK DAN MATEMATIK', 'CDIM262'),
(7, 24, 'Active', 'UTM', 'KL', '0182943864', '2025639482', 'KOLEJ PENGAJIAN PENGKOMPUTERAN, INFORMATIK DAN MATEMATIK', 'CDIM262'),
(8, 25, 'Active', 'UTM', 'Pahang', '0172839345', '2025638479', 'KOLEJ PENGAJIAN PENGKOMPUTERAN, INFORMATIK DAN MATEMATIK', 'CDIM262'),
(9, 26, 'Active', 'UTM', 'Melaka', '0192834576', '2025428394', 'KOLEJ PENGAJIAN PENGKOMPUTERAN, INFORMATIK DAN MATEMATIK', 'CDIM262'),
(10, 27, 'Active', 'UTM', 'Muar', '0132938746', '2025428934', 'KOLEJ PENGAJIAN PENGKOMPUTERAN, INFORMATIK DAN MATEMATIK', 'CDIM262'),
(11, 28, 'Active', 'UTM', 'Pahang', '0129384726', '2025639487', 'KOLEJ PENGAJIAN PENGKOMPUTERAN, INFORMATIK DAN MATEMATIK', 'CDIM262'),
(12, 29, 'Active', 'UTM', 'Klang', '0149324835', '2025483475', 'KOLEJ PENGAJIAN PENGKOMPUTERAN, INFORMATIK DAN MATEMATIK', 'CDIM263'),
(13, 30, 'Active', 'UTM', 'Johor', '0182938437', '2025329475', 'KOLEJ PENGAJIAN PENGKOMPUTERAN, INFORMATIK DAN MATEMATIK', 'CDIM262');

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `approval_id` int NOT NULL,
  `booking_id` int DEFAULT NULL,
  `approved_by` int DEFAULT NULL,
  `approval_status` enum('Approved','Rejected') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_general_ci,
  `approval_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `event_id` int DEFAULT NULL,
  `facility_id` int DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `status` enum('Pending','Forwarded','Approved','Rejected') COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `department_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `event_id`, `facility_id`, `booking_date`, `status`, `department_id`) VALUES
(1, NULL, 2, 1, '2026-02-15', 'Rejected', 1),
(2, NULL, 4, 3, '2026-03-11', 'Approved', 3),
(3, NULL, 5, 1, '2026-01-19', 'Approved', 1),
(4, NULL, 6, 4, '2026-01-13', 'Approved', 4),
(5, NULL, 7, 1, '2026-01-16', 'Approved', 1),
(6, NULL, 8, 1, '2026-01-19', 'Approved', 1),
(7, NULL, 9, 3, '2026-01-20', 'Approved', 3),
(8, NULL, 10, 4, '2026-01-21', 'Rejected', 4),
(9, NULL, 14, 3, '2026-02-01', 'Pending', 3),
(10, 3, 15, 3, '2026-02-01', 'Approved', 3),
(11, 3, 16, 4, '2026-02-02', 'Approved', 4),
(12, 3, 18, 1, '2026-03-10', 'Approved', 1),
(13, 3, 20, 2, '2026-02-04', 'Rejected', 2),
(14, 29, 25, 1, '2026-02-07', 'Rejected', 1),
(15, 29, 27, 2, '2026-02-08', 'Approved', 2),
(16, 3, 29, 2, '2026-02-25', 'Approved', 2),
(17, 3, 31, 1, '2026-02-12', 'Approved', 1),
(18, 30, 33, 2, '2026-02-13', 'Approved', 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking_services`
--

CREATE TABLE `booking_services` (
  `booking_service_id` int NOT NULL,
  `booking_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_services`
--

INSERT INTO `booking_services` (`booking_service_id`, `booking_id`, `service_id`, `note`) VALUES
(1, 17, 4, NULL),
(2, 17, 2, NULL),
(3, 17, 1, NULL),
(4, 17, 6, NULL),
(5, 18, 4, NULL),
(6, 18, 2, NULL),
(7, 18, 1, NULL),
(8, 18, 6, NULL),
(9, 18, 3, NULL),
(10, 18, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int NOT NULL,
  `department_name` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `description`) VALUES
(1, 'Sports & Recreation', 'Manage sports and recreation facilities'),
(2, 'Student Affairs', 'Manage student programs and affairs'),
(3, 'Research & Laboratory Services', 'Manage labs and research facilities'),
(4, 'Agro Technology', 'Manage research farm and agro technology facilities');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int NOT NULL,
  `applicant_id` int DEFAULT NULL,
  `event_name` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `event_type` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `target_audience` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expected_attendance` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `status` enum('Pending','Forwarded','Approved','Rejected') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `applicant_id`, `event_name`, `event_type`, `event_date`, `event_time`, `target_audience`, `expected_attendance`, `description`, `status`) VALUES
(2, 1, 'Seminar Keusahawanan', 'Seminar', '2026-02-15', '8.00 AM - 5.00 PM', 'staff and student UTM', 120, 'Program seminar untuk meningkatkan kesedaran keusahawanan dalam kalangan pelajar UTHM serta pendedahan kepada peluang perniagaan.\r\n', 'Pending'),
(3, 1, 'Seminar AI', 'Seminar', '2026-01-20', '8.00 AM - 5.00 PM', 'Students', 150, 'AI seminar for UiTM students', 'Pending'),
(4, 1, 'Seminar Keusahawan 2026', 'Seminar', '2026-03-11', '8.00 AM - 5.00 PM', 'Students', 80, 'Seminar bertujuan sayangi AI', 'Pending'),
(5, 2, 'Final Test 566', 'Final Test', '2026-01-19', '8.00 AM - 10. AM', 'Students', 60, 'Ufuture', 'Pending'),
(6, 3, 'Makan Bersama Kawan', 'Makan', '2026-01-13', '8.30 PM - 10.00 PM', 'Students', 15, 'Makan', 'Pending'),
(7, 1, 'Pinjaman Bola Sepak di Unit Sukan', 'Pinjaman', '2026-01-16', '8.00 AM - 5.00 PM', 'Students', 80, 'Tournament', 'Approved'),
(8, 5, 'Seminar AI', 'Seminar', '2026-01-19', '8.00 AM - 5.00 PM', 'Students', 80, 'Seminar la', 'Approved'),
(9, 6, 'Seminar AI', 'Seminar', '2026-01-20', '8.00 AM - 10. AM', 'Students', 200, 'hello', 'Approved'),
(10, 1, 'Seminar Kawad', 'Wedding', '2026-01-21', '8.00 AM - 5.00 PM', 'Students', 600, 'kahwin', 'Rejected'),
(11, 1, 'Test 560', 'Test', '2026-01-30', '8.00 AM - 10. AM', 'Students', 90, 'Test 560', 'Pending'),
(12, 11, 'Final Test 560', 'Final Test', '2026-01-31', '8.00 AM - 10. AM', 'Students', 90, 'Test', 'Pending'),
(13, 12, 'Final Test 564', 'Final Test', '2026-02-01', '8.00 AM - 10. AM', 'Students', 90, 'Test', 'Pending'),
(14, NULL, 'Final Test 564', NULL, NULL, NULL, NULL, NULL, NULL, 'Pending'),
(15, 3, 'Final Test 564', NULL, NULL, NULL, NULL, NULL, NULL, 'Approved'),
(16, 3, 'Final Test 564', NULL, NULL, NULL, NULL, NULL, NULL, 'Approved'),
(17, 1, 'Final Test 565', 'Final Test', '2026-02-04', '8.00 AM - 10. AM', 'Students', 90, 'Test', 'Pending'),
(18, 3, 'Final Test 565', NULL, NULL, NULL, NULL, NULL, NULL, 'Approved'),
(19, 1, 'Final Test 561', 'Final Test', '2026-02-04', '8.00 AM - 10. AM', 'Students', 60, 'Test', 'Pending'),
(20, 3, 'Final Test 561', NULL, NULL, NULL, NULL, NULL, NULL, 'Rejected'),
(21, 12, 'Final Test 562', 'Final Test', '2026-02-05', '8.00 AM - 10. AM', 'Students', 90, 'Test', 'Pending'),
(23, 12, 'Final Test 567', 'Final Test', '2026-02-07', '8.00 AM - 10. AM', 'Students', 60, 'Test', 'Pending'),
(25, 12, 'Final Test 567', NULL, NULL, NULL, NULL, NULL, NULL, 'Rejected'),
(26, 12, 'Final Test 568', 'Final Test', '2026-02-08', '8.00 AM - 10. AM', 'Students', 80, 'Test', 'Pending'),
(27, 12, 'Final Test 568', NULL, NULL, NULL, NULL, NULL, NULL, 'Approved'),
(28, 1, 'Graduate 2025', 'Graduation', '2026-02-25', '8.00 AM - 5.00 PM', 'Students', 1000, 'Grad', 'Pending'),
(29, 1, 'Graduate 2025', NULL, NULL, NULL, NULL, NULL, NULL, 'Approved'),
(30, 1, 'Final Paper 565', 'Final Paper', '2026-02-12', '8.00 AM - 10. AM', 'Students', 90, 'Final Paper', 'Pending'),
(31, 1, 'Final Paper 565', NULL, NULL, NULL, NULL, NULL, NULL, 'Approved'),
(32, 13, 'Thetaer Test', 'Theater', '2026-02-13', '8.30 PM - 10.00 PM', 'Students', 200, 'Theater', 'Pending'),
(33, 13, 'Thetaer Test', NULL, NULL, NULL, NULL, NULL, NULL, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `facility_id` int NOT NULL,
  `facility_name` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `department_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`facility_id`, `facility_name`, `location`, `capacity`, `type`, `department_id`) VALUES
(1, 'Dewan Sultan Ibrahim\r\n', 'UTM Skudai\r\n', 800, 'Hall\r\n', 1),
(2, 'Auditorium Perdana', 'UTM Skudai', 300, 'Auditorium', 2),
(3, 'Bilik Seminar FSKSM', 'Blok N28', 60, 'Seminar Room', 3),
(4, 'Padang Kawad UTM', 'UTM Skudai', 1000, 'Outdoor', 4),
(5, 'Stor Sukan', 'UTM Skudai', 500, NULL, NULL),
(6, 'Ruang Bacaan', 'UTM Skudai', 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int NOT NULL,
  `service_name` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `department_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `description`, `department_id`) VALUES
(1, 'Projector - LCD projector and HDMI support', 'LCD projector with HDMI and VGA support, suitable for seminar and presentation.', 1),
(2, 'PA System – Sound system and microphone', 'Complete sound system including speakers, microphones, and mixer.', 2),
(3, 'Technical Support – On-site technical assistance', 'On-site technician to manage equipment and technical issues.', 3),
(4, 'Cleaning Service – Cleaning before and after event', 'Cleaning before, during, and after the event.', 4),
(5, 'WiFi & Internet Setup', 'Temporary WiFi and internet configuration for events, including router setup and network stability support during the program.', NULL),
(6, 'Stage & Seating Arrangement', 'Arrangement of stage, chairs, and tables according to event requirements, including setup and dismantling after the event.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` enum('admin','staff','student','system_admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `department_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role`, `created_at`, `department_id`) VALUES
(1, 'System Admin', 'admin@test.com', 'admin123', 'admin', '2026-01-11 07:54:44', NULL),
(3, ' MUHAMAD NAKIB BIN HAMIDUN', 'hamidunnakib@gmail.com', 'Ahteng567%', 'student', '2026-01-11 08:03:43', 1),
(4, 'Danial Akasyah', 'danial_syah24@gmail.com', 'syah123', 'student', '2026-01-11 15:26:55', 1),
(5, 'Azreez Aiman', 'az@gmail.com', 'az123', 'student', '2026-01-12 11:17:52', 2),
(6, 'Azri', 'azri@gmail.com', '123456', 'admin', '2026-01-13 11:03:53', 1),
(7, 'Basyam', 'basyam@gmail.com', '123456', 'admin', '2026-01-13 11:03:53', 2),
(8, 'Kasyah', 'kasyah@gmail.com', '123456', 'admin', '2026-01-13 11:03:53', 3),
(9, 'Naqib', 'naqib@gmail.com', '123456', 'admin', '2026-01-13 11:03:53', 4),
(10, 'Syuhada Syakila', 'syu@gmail.com', 'syu123', 'student', '2026-01-17 06:23:03', 4),
(11, 'Daus Us Us', 'daus@gmail.com', 'daus123', 'student', '2026-01-17 06:39:02', 1),
(12, 'Amzar', 'amzar@gmail.com', 'amzar123', 'student', '2026-01-17 06:45:23', 4),
(13, 'Naimon', 'naimon@gmail.com', 'naimon123', 'student', '2026-01-17 06:50:27', 3),
(14, 'Mirmirmeay', 'mirmir@gmail.com', 'mirmir123', 'student', '2026-01-17 06:54:24', 3),
(15, 'adam latif', 'damtip@gmail.com', 'damtip123', 'student', '2026-01-17 07:06:37', 1),
(16, 'Adam Sufi', 'adamsufi@gmail.com', 'adamsufi123', 'student', '2026-01-17 11:42:04', 1),
(17, 'zamarul', 'zamarul@gmail.com', 'zamarul123', 'student', '2026-01-28 11:00:48', 2),
(19, 'hasan basri', 'hasanbasri@gmail.com', '$2y$10$yS/a8dhGYiJbVawL.E6IouoQaZp5b3r/brbsDmjuYS.l72HMVNUzy', 'student', '2026-01-28 11:06:01', 1),
(20, 'nick', 'nick@gmail.com', '$2y$10$nb18scvxgF45EBYXdIk5VuSNgtVxq58lKPSVDhEVuXjsmdhSlShlm', 'student', '2026-01-28 11:17:48', 4),
(22, 'ammar', 'ammar@gmail.com', '$2y$10$xm3a/P3RNFTaYry6sCT0OO8arOB.SMDkXLRsdZLdDNq37Smqamtwm', 'student', '2026-01-28 11:19:24', 3),
(24, 'ahmad', 'ahmad@gmail.com', '$2y$10$k5k0fJuxfqemxWoHXpsmeufMIaT.vYyZlh5oBNfFsnIJY5wvhD6UG', 'student', '2026-01-28 11:29:30', 4),
(25, 'hakim', 'hakim@gmail.com', NULL, 'student', '2026-01-28 11:40:49', 1),
(26, 'malqim', 'malqim@gmail.com', NULL, 'student', '2026-01-28 11:43:25', 1),
(27, 'fahmi', 'fahmi@gmail.com', 'fahmi123', 'student', '2026-01-28 11:49:24', 1),
(28, 'khairi', 'khairi@gmail.com', 'khairi123', 'student', '2026-01-29 12:38:41', 4),
(29, 'mirza', 'mirza@gmail.com', 'mirza123', 'student', '2026-01-29 18:17:27', NULL),
(30, 'Haziq', 'Haziq@gmail.com', 'Haziq123', 'student', '2026-01-31 10:32:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`applicant_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`approval_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `approved_by` (`approved_by`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `facility_id` (`facility_id`);

--
-- Indexes for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD PRIMARY KEY (`booking_service_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `applicant_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `approval_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `booking_services`
--
ALTER TABLE `booking_services`
  MODIFY `booking_service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `facility_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `admins_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`);

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `approvals`
--
ALTER TABLE `approvals`
  ADD CONSTRAINT `approvals_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`),
  ADD CONSTRAINT `approvals_ibfk_2` FOREIGN KEY (`approved_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`facility_id`);

--
-- Constraints for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD CONSTRAINT `booking_services_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`booking_id`),
  ADD CONSTRAINT `booking_services_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
