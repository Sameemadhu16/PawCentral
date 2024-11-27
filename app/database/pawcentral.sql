-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 05:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pawcentral`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `user_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(11, 2, 'Grooming Services Discount', 'Get 20% off all grooming services this week. Book your appointment now!', '2024-11-10 06:04:24', '2024-11-10 06:04:24'),
(12, 2, 'New Veterinarian Joining', 'We\'re pleased to welcome Dr. Smith to our veterinary team. She specializes in exotic pets.orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-11-10 06:04:52', '2024-11-10 06:04:52'),
(13, 2, 'Pet Training Classes', 'New series of pet training classes starting next month. Early bird discounts available!', '2024-11-10 06:05:35', '2024-11-10 06:05:35'),
(19, 2, 'Party decor for gatherings and celebrations', 'Editable new puppy announcement digital fur baby reveal tiny paws announcement haven\'t told the cat social media dog reveal dog announcement one.\r\n\r\n', '2024-11-20 13:38:30', '2024-11-22 22:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `post_pet`
--

CREATE TABLE `post_pet` (
  `id` int(11) NOT NULL,
  `tradeType` enum('sell','adopt') NOT NULL,
  `petName` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `genderNeeds` varchar(255) NOT NULL,
  `contactName` varchar(255) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image_path` longtext DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `feebox` tinyint(1) DEFAULT 0,
  `city` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `termsAccepted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_pet`
--

INSERT INTO `post_pet` (`id`, `tradeType`, `petName`, `species`, `breed`, `genderNeeds`, `contactName`, `contactNumber`, `email`, `image_path`, `price`, `feebox`, `city`, `address`, `termsAccepted`, `created_at`) VALUES
(16, 'sell', 'ama ', 'German shephard', '17', 'Male ', 'Lehan', '0123546789', 'udarapiumal0@gmail.com', 'Array', 2500.00, 1, 'Bambe', '36/32 dsasdf fdsaf', 1, '2024-11-24 21:11:03'),
(18, '', 'ewrwer', 'ewrewrwerewr', '23', 'werw', 'ewrewrwerwe', '07734123432', 'udarapiumal0@gmail.com', 'http://localhost/PawCentral/public/uploads/Array', 40000.00, 1, 'sadasd', 'asdsad', 1, '2024-11-25 00:13:40'),
(19, '', 'k', 'k', 'k', 'k', 'k', '0784822710', 'udarapiumal0@gmail.com', 'http://localhost/PawCentral/public/uploads/C:\\xampp\\tmp\\phpE538.tmp', 0.00, 1, 'df', 'asdf', 1, '2024-11-25 00:20:23'),
(21, '', 'sad', 'fasfa', '44', 'fdsfs', 'fssdfds', '0724192672', 'udarapiumal0@gmail.com', 'Array', 40000.00, 1, 'dasdas', 'afsfasf', 1, '2024-11-25 00:28:59'),
(22, '', 'gfasgd', 'sadasd', '33', 'fsafas', 'dsada', '0724192672', 'udarapiumal0@gmail.com', 'Array', 40000.00, 1, 'pij', 'kljhkj', 1, '2024-11-25 00:31:09'),
(23, '', 'lkj', 'khb', '44', 'jlgjh', 'jk', '0724192672', 'udarapiumal0@gmail.com', 'Array', 40000.00, 1, 'lii', 'bmn', 1, '2024-11-25 00:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_service` enum('yes','no') DEFAULT 'no',
  `service_type` varchar(100) DEFAULT NULL,
  `service_name` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `mobile_no` int(20) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT 'assets/images/user/default_user.jpg',
  `proof_of_service` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `is_service`, `service_type`, `service_name`, `location`, `mobile_no`, `profile_pic`, `proof_of_service`, `email_verified`, `created_at`, `updated_at`, `role`) VALUES
(2, 'Sameera', 'Madhuranga', 'sameemadhu2003@gmail.com', '$2y$10$s./aJR4mB2uovKO3XjNt5O8IbHFstlB0euUt0W0h1OoDpZxJRja56', 'no', NULL, NULL, NULL, 781468851, 'profile-images/67469d2647cfc_WhatsApp Image 2024-10-24 at 12.23.01_5179ed45.jpg', NULL, 0, '2024-11-10 05:45:12', '2024-11-27 04:16:38', 'admin'),
(12, 'Ashan', 'Kavinda', 'ashan@gmail.com', '$2y$10$.Cn/IsBV9w1M02v2EPFHOeEOIieR1cOD73Z8bRDeor57MUG9vG/hK', 'yes', 'care-service-provider', 'medical provider', 'matara', NULL, NULL, 'uploads/proofs/Lecture02_CPT101.pdf', 0, '2024-11-21 05:44:28', '2024-11-21 05:44:28', 'user'),
(13, 'ishan', 'lakshitha', 'ishan123@gmail.com', '$2y$10$P336cXGpbLNt4suNgc8w7uIq.IA6kex/nEZFO36iMAHSJFxdqON2i', 'yes', 'medical-provider', 'medical provider', 'galle', NULL, NULL, 'uploads/proofs/22000895.pdf', 0, '2024-11-21 16:03:44', '2024-11-21 16:03:44', 'user'),
(17, 'Lehan', 'lehan', 'lehan@gmail.com', '$2y$10$RvbUdv5L9o/MqvlkAKvJSeIulruVLlOzlfghmAYpCpcl.qm7TAMqm', 'no', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-11-22 15:17:08', '2024-11-22 15:17:52', 'admin'),
(60, 'Shashika', 'Ekanayake', 'shashika@gmail.com', '$2y$10$pxeG.PybrmInI2kx9hLFaefue.ZfrrOcS.6481jMkfYUtLTOVUFCS', 'no', NULL, NULL, NULL, 717395361, 'profile-images/6745f76309da3_WhatsApp Image 2024-11-26 at 21.58.16_e2a9c592.jpg', NULL, 0, '2024-11-26 16:06:02', '2024-11-26 16:29:23', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `post_pet`
--
ALTER TABLE `post_pet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `post_pet`
--
ALTER TABLE `post_pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
