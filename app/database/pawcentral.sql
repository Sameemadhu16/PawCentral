-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2024 at 08:46 AM
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
-- Table structure for table `adoption_posts`
--

CREATE TABLE `adoption_posts` (
  `pet_id` int(11) NOT NULL,
  `shelter_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `species` enum('Cat','Dog','Other') NOT NULL DEFAULT 'Other',
  `breed` varchar(255) NOT NULL DEFAULT 'Unknown',
  `sex` enum('Male','Female') NOT NULL,
  `age` float NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `pedigree` tinyint(1) NOT NULL,
  `nuetered` tinyint(1) NOT NULL,
  `trained` tinyint(1) NOT NULL,
  `vaccinated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adoption_requests`
--

CREATE TABLE `adoption_requests` (
  `adoptor_id` int(11) NOT NULL,
  `adoption_postid` int(11) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `residence` varchar(255) NOT NULL,
  `owned_pets` int(4) NOT NULL DEFAULT 0,
  `past_pets` tinyint(1) NOT NULL DEFAULT 0,
  `garden_area` varchar(100) NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0 COMMENT 'set -1 for unreg users',
  `name` varchar(50) NOT NULL DEFAULT 'Unknown',
  `req_id` int(11) NOT NULL,
  `account_no` int(20) NOT NULL,
  `amount` float NOT NULL,
  `donated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donation_requests`
--

CREATE TABLE `donation_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `info` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `collected` float NOT NULL,
  `img` longblob NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `max_participants` int(11) NOT NULL,
  `enrolled` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_enrolments`
--

CREATE TABLE `event_enrolments` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lost_and_found_pets`
--

CREATE TABLE `lost_and_found_pets` (
  `petid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `petName` varchar(15) NOT NULL DEFAULT 'Unknown',
  `breed` enum('Cat','Dog','Other') NOT NULL,
  `type` varchar(10) NOT NULL,
  `publishedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(100) NOT NULL,
  `location` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `height` float NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `age` float NOT NULL,
  `health` varchar(20) NOT NULL,
  `color` varchar(15) NOT NULL,
  `contactNo` varchar(10) NOT NULL,
  `description` varchar(350) NOT NULL,
  `img1` longblob DEFAULT NULL,
  `img2` longblob DEFAULT NULL,
  `img3` longblob DEFAULT NULL,
  `postStatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_appointments`
--

CREATE TABLE `medical_appointments` (
  `appointment_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `med_id` int(11) NOT NULL,
  `timeslot` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `completion_status` tinyint(1) NOT NULL DEFAULT 0,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_providers`
--

CREATE TABLE `medical_providers` (
  `med_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `license_id` varchar(255) NOT NULL,
  `license_proof` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `open_hours` varchar(255) NOT NULL,
  `working_days` varchar(255) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `services` varchar(255) NOT NULL,
  `about_us` varchar(255) NOT NULL,
  `verifiedStatus` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `record_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `med_id` int(11) DEFAULT NULL COMMENT 'Not necessary: also in the appointment',
  `pet_id` int(11) DEFAULT NULL COMMENT 'Not necessary: also in the appointment',
  `vet_name` int(11) NOT NULL,
  `diagnosis` int(11) NOT NULL,
  `vet_notes` int(11) DEFAULT NULL,
  `record_added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merchant_posts`
--

CREATE TABLE `merchant_posts` (
  `pet_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL COMMENT 'merchant''s ref registered id',
  `petName` int(11) DEFAULT NULL,
  `tradeType` enum('sell','rent','import','adopt') NOT NULL DEFAULT 'adopt',
  `species` enum('Cat','Dog','Other','') NOT NULL DEFAULT 'Other',
  `breed` varchar(255) NOT NULL DEFAULT 'Other',
  `sex` enum('Male','Female','Unknown') NOT NULL DEFAULT 'Unknown',
  `age` float NOT NULL DEFAULT 0,
  `height` float NOT NULL DEFAULT 0,
  `weight` float NOT NULL DEFAULT 0,
  `neutered` tinyint(1) NOT NULL DEFAULT 0,
  `trained` tinyint(1) NOT NULL DEFAULT 0,
  `pedigree` tinyint(1) NOT NULL DEFAULT 0,
  `vaccinated` tinyint(1) NOT NULL DEFAULT 0,
  `price` float NOT NULL DEFAULT 0,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `noti_id` int(11) NOT NULL,
  `to_userid` int(11) NOT NULL COMMENT 'user_id',
  `from_userid` int(11) NOT NULL,
  `regarding_id` int(11) DEFAULT NULL COMMENT 'what the notification is regarding. adoption post id,apppointment_id',
  `message` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet_merchant`
--

CREATE TABLE `pet_merchant` (
  `merchant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `merchant_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(60) DEFAULT 'Sri Lanka'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pet_shelters`
--

CREATE TABLE `pet_shelters` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `capacity` int(11) NOT NULL,
  `capacity_left` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registered_pets`
--

CREATE TABLE `registered_pets` (
  `pet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'Unknown',
  `species` enum('Cat','Dog','Other') NOT NULL DEFAULT 'Other',
  `breed` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `age` float NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `nuetered` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE `service_providers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `service_type` enum('Pet Sitter','Food Suppliments','Day Care','Equipments Seller') NOT NULL,
  `Areas` varchar(255) NOT NULL,
  `open_hour` time NOT NULL,
  `closing_hour` time NOT NULL,
  `available_days` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `registered_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `mobile_no` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('user','admin','medical_provider','seller','shelter','service_prov') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `veterinarians`
--

CREATE TABLE `veterinarians` (
  `vet_id` int(11) NOT NULL,
  `med_id` int(11) NOT NULL COMMENT 'clinic where the vet is working in',
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption_posts`
--
ALTER TABLE `adoption_posts`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `shelter_id_fk` (`shelter_id`);

--
-- Indexes for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  ADD PRIMARY KEY (`adoptor_id`,`adoption_postid`),
  ADD KEY `adoption_postid_fk` (`adoption_postid`) USING BTREE;

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id_fk` (`user_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `donation_requests`
--
ALTER TABLE `donation_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `even_hoster_fk` (`user_id`);

--
-- Indexes for table `event_enrolments`
--
ALTER TABLE `event_enrolments`
  ADD PRIMARY KEY (`user_id`,`event_id`),
  ADD KEY `event_id_fk` (`event_id`);

--
-- Indexes for table `lost_and_found_pets`
--
ALTER TABLE `lost_and_found_pets`
  ADD PRIMARY KEY (`petid`),
  ADD KEY `owner_id_fk` (`id`);

--
-- Indexes for table `medical_appointments`
--
ALTER TABLE `medical_appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `pet_id_fk` (`pet_id`),
  ADD KEY `medical_prov_fk` (`med_id`),
  ADD KEY `owner_fk` (`owner_id`);

--
-- Indexes for table `medical_providers`
--
ALTER TABLE `medical_providers`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `appointment_id_fk` (`appointment_id`),
  ADD KEY `medical_prov_id_fk` (`med_id`);

--
-- Indexes for table `merchant_posts`
--
ALTER TABLE `merchant_posts`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `merchant_id_fk` (`merchant_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`noti_id`),
  ADD KEY `receiver_fk` (`to_userid`),
  ADD KEY `sender_fk` (`from_userid`);

--
-- Indexes for table `pet_merchant`
--
ALTER TABLE `pet_merchant`
  ADD PRIMARY KEY (`merchant_id`),
  ADD UNIQUE KEY `user_id_ref` (`user_id`);

--
-- Indexes for table `pet_shelters`
--
ALTER TABLE `pet_shelters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shelter_owner_fk` (`user_id`);

--
-- Indexes for table `registered_pets`
--
ALTER TABLE `registered_pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `petowner_fk` (`user_id`);

--
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_id_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `veterinarians`
--
ALTER TABLE `veterinarians`
  ADD PRIMARY KEY (`vet_id`),
  ADD KEY `provider_fk` (`med_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_posts`
--
ALTER TABLE `adoption_posts`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation_requests`
--
ALTER TABLE `donation_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lost_and_found_pets`
--
ALTER TABLE `lost_and_found_pets`
  MODIFY `petid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_appointments`
--
ALTER TABLE `medical_appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_providers`
--
ALTER TABLE `medical_providers`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchant_posts`
--
ALTER TABLE `merchant_posts`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet_merchant`
--
ALTER TABLE `pet_merchant`
  MODIFY `merchant_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pet_shelters`
--
ALTER TABLE `pet_shelters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registered_pets`
--
ALTER TABLE `registered_pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `veterinarians`
--
ALTER TABLE `veterinarians`
  MODIFY `vet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption_posts`
--
ALTER TABLE `adoption_posts`
  ADD CONSTRAINT `shelter_id_fk` FOREIGN KEY (`shelter_id`) REFERENCES `pet_shelters` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `adoption_requests`
--
ALTER TABLE `adoption_requests`
  ADD CONSTRAINT `adopter_fk` FOREIGN KEY (`adoptor_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `adoption_postid_fk` FOREIGN KEY (`adoption_postid`) REFERENCES `adoption_posts` (`pet_id`) ON DELETE NO ACTION;

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `admin_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `donation_requests`
--
ALTER TABLE `donation_requests`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `even_hoster_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `event_enrolments`
--
ALTER TABLE `event_enrolments`
  ADD CONSTRAINT `event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `part_fks` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `lost_and_found_pets`
--
ALTER TABLE `lost_and_found_pets`
  ADD CONSTRAINT `owner_id_fk` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `medical_appointments`
--
ALTER TABLE `medical_appointments`
  ADD CONSTRAINT `medical_prov_fk` FOREIGN KEY (`med_id`) REFERENCES `medical_providers` (`med_id`),
  ADD CONSTRAINT `owner_fk` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `pet_id_fk` FOREIGN KEY (`pet_id`) REFERENCES `registered_pets` (`pet_id`) ON DELETE NO ACTION;

--
-- Constraints for table `medical_providers`
--
ALTER TABLE `medical_providers`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `appointment_id_fk` FOREIGN KEY (`appointment_id`) REFERENCES `medical_appointments` (`appointment_id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `medical_prov_id_fk` FOREIGN KEY (`med_id`) REFERENCES `medical_providers` (`med_id`) ON DELETE NO ACTION;

--
-- Constraints for table `merchant_posts`
--
ALTER TABLE `merchant_posts`
  ADD CONSTRAINT `merchant_id_fk` FOREIGN KEY (`merchant_id`) REFERENCES `pet_merchant` (`merchant_id`) ON DELETE NO ACTION;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `receiver_fk` FOREIGN KEY (`to_userid`) REFERENCES `users` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `sender_fk` FOREIGN KEY (`from_userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `pet_shelters`
--
ALTER TABLE `pet_shelters`
  ADD CONSTRAINT `shelter_owner_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `registered_pets`
--
ALTER TABLE `registered_pets`
  ADD CONSTRAINT `petowner_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD CONSTRAINT `provider_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;

--
-- Constraints for table `veterinarians`
--
ALTER TABLE `veterinarians`
  ADD CONSTRAINT `provider_fk` FOREIGN KEY (`med_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
