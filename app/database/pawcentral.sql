-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 04:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
CREATE DATABASE IF NOT EXISTS `pawcentral` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pawcentral`;

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
(17, 3, ' New markdown! Biggest sale in 60+ days', 'Editable Pet Profile CANVA template, Dog Adoption Marketing Flyer,Doggie Daycare Printable,Pet Sitter Notes,About my Puppy Dog.Animal Rescue one.qwerty', '2024-11-14 08:14:44', '2024-11-20 09:05:52'),
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
  `image_path` longblob DEFAULT NULL,
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
(16, 'sell', 'ama ', 'German shephard', '17', 'Male ', 'Lehan', '0123546789', 'udarapiumal0@gmail.com', 0x4172726179, 2500.00, 1, 'Bambe', '36/32 dsasdf fdsaf', 1, '2024-11-25 02:41:03'),
(17, '', 'ewrwer', 'ewrewrwerewr', '23', 'werw', 'ewrewrwerwe', '07734123432', 'udarapiumal0@gmail.com', 0x4172726179, 40000.00, 1, 'sad', 'sdfdsf', 1, '2024-11-25 03:18:19');

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
  `profile_pic` varchar(255) DEFAULT NULL,
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
(2, 'sameera', 'Madhuranga', 'sameemadhu2003@gmail.com', '$2y$10$s./aJR4mB2uovKO3XjNt5O8IbHFstlB0euUt0W0h1OoDpZxJRja56', 'no', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-11-10 05:45:12', '2024-11-22 15:22:35', 'admin'),
(3, 'Shanuka ', 'Malshan', 'shanukamalshan@gmail.com', '$2y$10$pkFVyIr7HHO1CwOdIzn8N.QKp5O8f9yIckvrrzZTCZUICr8.3y9..', 'yes', 'care-service-provider', 'medical provider', 'nalwala,srilanka', NULL, NULL, 'uploads/proofs/Lecture01_CPT101 (1).pdf', 0, '2024-11-14 08:10:56', '2024-11-14 08:10:56', 'user'),
(4, 'sandaru', 'Nihara', 'sandaru@gmail.com', '$2y$10$00Mqqk0DbfeWAD25PSbz5eAvgDBwp5y.ChoybHsg027tU94UkXT3.', 'yes', 'care-service-provider', 'medical provider', 'matara', NULL, NULL, 'uploads/proofs/Lecture01_CPT101 (1).pdf', 0, '2024-11-17 17:13:44', '2024-11-17 17:13:44', 'user'),
(5, 'Irumi', 'Theekshana', 'irumi@gmail.com', '$2y$10$ByTpr.Z25ExRSJzjnYYRFOqiEqTrxssgpmucutGTxOaLuTgUds3TS', 'yes', 'medical-provider', 'medical provider', 'Akuressa', NULL, NULL, 'uploads/proofs/Lecture01_CPT101 (1).pdf', 0, '2024-11-20 04:01:34', '2024-11-20 04:01:34', 'user'),
(6, 'Hirun', 'Mihisara', 'hirun@gmail.com', '$2y$10$tcux4OKfceZfYRPJUbDQqeg6VKeBfiJcYqYR0b1/ViYxTDnXvf0.W', 'no', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-11-20 08:09:26', '2024-11-20 08:09:26', 'user'),
(7, 'sachith', 'avintha', 'sachith@gmail.com', '$2y$10$DubFNEjGev.5kP4thP44s.c8n9f3QsWH/WGzxobJ1eicJ.i.8MwCO', 'yes', 'adoption-shelter', 'shelter', 'Dehiwala,Collombo', NULL, NULL, 'uploads/proofs/Lecture05_CPT101 (1).pdf', 0, '2024-11-20 12:29:45', '2024-11-20 12:29:45', 'user'),
(8, 'shashika', 'Ekanayake', 'shashika@gmail.com', '$2y$10$eKrwNnEQPIYsxJ3anCpTXOiEQY/EpHubgQXZQeLw/pbr5Yt2JdNj.', 'yes', 'adoption-shelter', 'shelter', 'matara', NULL, NULL, 'uploads/proofs/Lecture01_CPT101 (1).pdf', 0, '2024-11-20 12:39:32', '2024-11-20 12:39:32', 'user'),
(11, 'Bhakthi', 'Dhanesha', 'bhakthi11@gmail.com', '$2y$10$DAtpObysT1VwrgUDXXuE/edaIdCgzFBvO28a0Au8vVQycBncuZncm', 'yes', 'medical-provider', 'medical provider', 'matara', NULL, NULL, 'uploads/proofs/Lecture05_CPT101 (1).pdf', 0, '2024-11-20 13:33:40', '2024-11-20 13:33:40', 'user'),
(12, 'Ashan', 'Kavinda', 'ashan@gmail.com', '$2y$10$.Cn/IsBV9w1M02v2EPFHOeEOIieR1cOD73Z8bRDeor57MUG9vG/hK', 'yes', 'care-service-provider', 'medical provider', 'matara', NULL, NULL, 'uploads/proofs/Lecture02_CPT101.pdf', 0, '2024-11-21 05:44:28', '2024-11-21 05:44:28', 'user'),
(13, 'ishan', 'lakshitha', 'ishan123@gmail.com', '$2y$10$P336cXGpbLNt4suNgc8w7uIq.IA6kex/nEZFO36iMAHSJFxdqON2i', 'yes', 'medical-provider', 'medical provider', 'galle', NULL, NULL, 'uploads/proofs/22000895.pdf', 0, '2024-11-21 16:03:44', '2024-11-21 16:03:44', 'user'),
(17, 'Lehan', 'lehan', 'lehan@gmail.com', '$2y$10$RvbUdv5L9o/MqvlkAKvJSeIulruVLlOzlfghmAYpCpcl.qm7TAMqm', 'no', NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-11-22 15:17:08', '2024-11-22 15:17:52', 'admin'),
(21, 'sandaru', 'nihara', 'sandaru@gail.com', '$2y$10$ohSxdlkJxm9dHEHXpDzFIOcpT3vLH/zscdGERLMdUgBR3WEmSlQ4q', 'yes', 'medical-provider', 'medical provider', 'matara', NULL, NULL, NULL, 0, '2024-11-24 12:13:09', '2024-11-24 12:13:09', 'user'),
(28, 'ishadi', 'Malshani', 'ishadi@gmail.com', '$2y$10$ZqLS89InbCSsTdJrF8ZTJOhw.cDcH6Vwt7QToCABx0/bxQDUhZ9Lq', 'yes', 'medical-provider', 'medical provider', 'Akuressa', NULL, NULL, 'uploads/proofs/Lecture05_CPT101 (1).pdf', 0, '2024-11-24 13:17:57', '2024-11-24 13:17:57', 'user'),
(29, 'shammu', 'ashan', 'shammu@gmail.com', '$2y$10$0o2Yd/P1KAbhctSdgxcOVey7qlFqfPnlbMcRavqEr2gaiP7YvT52G', 'yes', 'medical-provider', 'medical provider', 'matara', NULL, NULL, 'uploads/proofs/Lecture01_CPT101 (1).pdf', 0, '2024-11-24 17:03:44', '2024-11-24 17:03:44', 'user');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `post_pet`
--
ALTER TABLE `post_pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-11-25 03:23:58', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
