-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: pawcentral
-- ------------------------------------------------------
-- Server version	8.0.37

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adoption_posts`
--

DROP TABLE IF EXISTS `adoption_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adoption_posts` (
  `pet_id` int NOT NULL AUTO_INCREMENT,
  `shelter_id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `species` enum('Cat','Dog','Other') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Other',
  `breed` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Unknown',
  `sex` enum('Male','Female') COLLATE utf8mb4_general_ci NOT NULL,
  `age` float NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `pedigree` tinyint(1) NOT NULL,
  `nuetered` tinyint(1) NOT NULL,
  `trained` tinyint(1) NOT NULL,
  `vaccinated` tinyint(1) NOT NULL,
  PRIMARY KEY (`pet_id`),
  KEY `shelter_id_fk` (`shelter_id`),
  CONSTRAINT `shelter_id_fk` FOREIGN KEY (`shelter_id`) REFERENCES `pet_shelters` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adoption_posts`
--

LOCK TABLES `adoption_posts` WRITE;
/*!40000 ALTER TABLE `adoption_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `adoption_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adoption_requests`
--

DROP TABLE IF EXISTS `adoption_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adoption_requests` (
  `adoptor_id` int NOT NULL,
  `adoption_postid` int NOT NULL,
  `contact_no` int NOT NULL,
  `residence` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `owned_pets` int NOT NULL DEFAULT '0',
  `past_pets` tinyint(1) NOT NULL DEFAULT '0',
  `garden_area` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `requested_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`adoptor_id`,`adoption_postid`),
  KEY `adoption_postid_fk` (`adoption_postid`) USING BTREE,
  CONSTRAINT `adopter_fk` FOREIGN KEY (`adoptor_id`) REFERENCES `users` (`id`),
  CONSTRAINT `adoption_postid_fk` FOREIGN KEY (`adoption_postid`) REFERENCES `adoption_posts` (`pet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adoption_requests`
--

LOCK TABLES `adoption_requests` WRITE;
/*!40000 ALTER TABLE `adoption_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `adoption_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `announcements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `admin_id_fk` (`user_id`),
  CONSTRAINT `admin_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donation_requests`
--

DROP TABLE IF EXISTS `donation_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donation_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `reason` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` float NOT NULL,
  `collected` float NOT NULL,
  `img` longblob NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `requested_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id_fk` (`user_id`),
  CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donation_requests`
--

LOCK TABLES `donation_requests` WRITE;
/*!40000 ALTER TABLE `donation_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `donation_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donations` (
  `donation_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT '0' COMMENT 'set -1 for unreg users',
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Unknown',
  `req_id` int NOT NULL,
  `account_no` int NOT NULL,
  `amount` float NOT NULL,
  `donated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`donation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donations`
--

LOCK TABLES `donations` WRITE;
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_enrolments`
--

DROP TABLE IF EXISTS `event_enrolments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_enrolments` (
  `event_id` int NOT NULL,
  `user_id` int NOT NULL,
  `contact_no` int NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`event_id`),
  KEY `event_id_fk` (`event_id`),
  CONSTRAINT `event_id_fk` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  CONSTRAINT `part_fks` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_enrolments`
--

LOCK TABLES `event_enrolments` WRITE;
/*!40000 ALTER TABLE `event_enrolments` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_enrolments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `max_participants` int NOT NULL,
  `enrolled` int NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`event_id`),
  KEY `even_hoster_fk` (`user_id`),
  CONSTRAINT `even_hoster_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lost_and_found_pets`
--

DROP TABLE IF EXISTS `lost_and_found_pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lost_and_found_pets` (
  `petid` int NOT NULL AUTO_INCREMENT,
  `id` int NOT NULL,
  `petName` varchar(15) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Unknown',
  `breed` enum('Cat','Dog','Other') COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `publishedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `height` float NOT NULL,
  `sex` enum('Male','Female') COLLATE utf8mb4_general_ci NOT NULL,
  `age` float NOT NULL,
  `health` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `contactNo` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(350) COLLATE utf8mb4_general_ci NOT NULL,
  `img1` longblob,
  `img2` longblob,
  `img3` longblob,
  `postStatus` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`petid`),
  KEY `owner_id_fk` (`id`),
  CONSTRAINT `owner_id_fk` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lost_and_found_pets`
--

LOCK TABLES `lost_and_found_pets` WRITE;
/*!40000 ALTER TABLE `lost_and_found_pets` DISABLE KEYS */;
/*!40000 ALTER TABLE `lost_and_found_pets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medical_appointments`
--

DROP TABLE IF EXISTS `medical_appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medical_appointments` (
  `appointment_id` int NOT NULL AUTO_INCREMENT,
  `pet_id` int NOT NULL,
  `owner_id` int NOT NULL,
  `med_id` int NOT NULL,
  `timeslot` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `completion_status` tinyint(1) NOT NULL DEFAULT '0',
  `comment` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `pet_id_fk` (`pet_id`),
  KEY `medical_prov_fk` (`med_id`),
  KEY `owner_fk` (`owner_id`),
  CONSTRAINT `medical_prov_fk` FOREIGN KEY (`med_id`) REFERENCES `medical_providers` (`med_id`),
  CONSTRAINT `owner_fk` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`),
  CONSTRAINT `pet_id_fk` FOREIGN KEY (`pet_id`) REFERENCES `registered_pets` (`pet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medical_appointments`
--

LOCK TABLES `medical_appointments` WRITE;
/*!40000 ALTER TABLE `medical_appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `medical_appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medical_providers`
--

DROP TABLE IF EXISTS `medical_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medical_providers` (
  `med_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `license_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `license_proof` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `open_hours` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `working_days` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_no` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `services` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `about_us` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `verifiedStatus` enum('pending','approved','rejected','') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`med_id`),
  KEY `user_fk` (`user_id`),
  CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medical_providers`
--

LOCK TABLES `medical_providers` WRITE;
/*!40000 ALTER TABLE `medical_providers` DISABLE KEYS */;
INSERT INTO `medical_providers` VALUES (1,8,'testMedicals',NULL,NULL,'uploads/proofs/22.pdf','panadura',NULL,NULL,NULL,NULL,NULL,'approved','2025-01-29 23:23:39'),(2,12,'finlaMED',NULL,NULL,'uploads/proofs/chapter 25 fundamentals of db (1).pdf','panadura',NULL,NULL,NULL,NULL,NULL,'pending','2025-02-01 05:05:44'),(3,14,'IsService',NULL,NULL,'uploads/proofs/22001263.pdf','gampaha',NULL,NULL,NULL,NULL,NULL,'approved','2025-02-11 03:39:52'),(4,16,'Pawcare Center','uploads/profile-images/67d23c3c2b0d4.png',NULL,'uploads/license-proofs/67d0e0dda5c9b.pdf','Colombo',NULL,NULL,'0773098895',NULL,'We the best vet center!','approved','2025-03-10 00:46:32');
/*!40000 ALTER TABLE `medical_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medical_records`
--

DROP TABLE IF EXISTS `medical_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medical_records` (
  `record_id` int NOT NULL AUTO_INCREMENT,
  `appointment_id` int NOT NULL,
  `med_id` int DEFAULT NULL COMMENT 'Not necessary: also in the appointment',
  `pet_id` int DEFAULT NULL COMMENT 'Not necessary: also in the appointment',
  `vet_name` int NOT NULL,
  `diagnosis` int NOT NULL,
  `vet_notes` int DEFAULT NULL,
  `record_added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`record_id`),
  KEY `appointment_id_fk` (`appointment_id`),
  KEY `medical_prov_id_fk` (`med_id`),
  CONSTRAINT `appointment_id_fk` FOREIGN KEY (`appointment_id`) REFERENCES `medical_appointments` (`appointment_id`),
  CONSTRAINT `medical_prov_id_fk` FOREIGN KEY (`med_id`) REFERENCES `medical_providers` (`med_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medical_records`
--

LOCK TABLES `medical_records` WRITE;
/*!40000 ALTER TABLE `medical_records` DISABLE KEYS */;
/*!40000 ALTER TABLE `medical_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `merchant_posts`
--

DROP TABLE IF EXISTS `merchant_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `merchant_posts` (
  `pet_id` int NOT NULL AUTO_INCREMENT,
  `merchant_id` int NOT NULL COMMENT 'merchant''s ref registered id',
  `petName` int DEFAULT NULL,
  `tradeType` enum('sell','rent','import','adopt') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'adopt',
  `species` enum('Cat','Dog','Other','') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Other',
  `breed` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Other',
  `sex` enum('Male','Female','Unknown') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Unknown',
  `age` float NOT NULL DEFAULT '0',
  `height` float NOT NULL DEFAULT '0',
  `weight` float NOT NULL DEFAULT '0',
  `neutered` tinyint(1) NOT NULL DEFAULT '0',
  `trained` tinyint(1) NOT NULL DEFAULT '0',
  `pedigree` tinyint(1) NOT NULL DEFAULT '0',
  `vaccinated` tinyint(1) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `img1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `img3` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pet_id`),
  KEY `merchant_id_fk` (`merchant_id`),
  CONSTRAINT `merchant_id_fk` FOREIGN KEY (`merchant_id`) REFERENCES `pet_merchant` (`merchant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `merchant_posts`
--

LOCK TABLES `merchant_posts` WRITE;
/*!40000 ALTER TABLE `merchant_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `merchant_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `noti_id` int NOT NULL AUTO_INCREMENT,
  `to_userid` int NOT NULL COMMENT 'user_id',
  `from_userid` int NOT NULL,
  `regarding_id` int DEFAULT NULL COMMENT 'what the notification is regarding. adoption post id,apppointment_id',
  `message` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`noti_id`),
  KEY `receiver_fk` (`to_userid`),
  KEY `sender_fk` (`from_userid`),
  CONSTRAINT `receiver_fk` FOREIGN KEY (`to_userid`) REFERENCES `users` (`id`),
  CONSTRAINT `sender_fk` FOREIGN KEY (`from_userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pet_merchant`
--

DROP TABLE IF EXISTS `pet_merchant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pet_merchant` (
  `merchant_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `merchant_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `location` varchar(60) COLLATE utf8mb4_general_ci DEFAULT 'Sri Lanka',
  PRIMARY KEY (`merchant_id`),
  UNIQUE KEY `user_id_ref` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pet_merchant`
--

LOCK TABLES `pet_merchant` WRITE;
/*!40000 ALTER TABLE `pet_merchant` DISABLE KEYS */;
INSERT INTO `pet_merchant` VALUES (1,2,'HappyPaws',NULL,'newdb_sellertable'),(3,6,'pawsell',NULL,'panadura'),(4,7,'servicerole',NULL,'panadura');
/*!40000 ALTER TABLE `pet_merchant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pet_shelters`
--

DROP TABLE IF EXISTS `pet_shelters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pet_shelters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` int DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `capacity_left` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `shelter_owner_fk` (`user_id`),
  CONSTRAINT `shelter_owner_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pet_shelters`
--

LOCK TABLES `pet_shelters` WRITE;
/*!40000 ALTER TABLE `pet_shelters` DISABLE KEYS */;
INSERT INTO `pet_shelters` VALUES (1,13,'sehltertest','panadura',NULL,NULL,NULL,NULL,'2025-02-01 05:06:32');
/*!40000 ALTER TABLE `pet_shelters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registered_pets`
--

DROP TABLE IF EXISTS `registered_pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registered_pets` (
  `pet_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Unknown',
  `species` enum('Cat','Dog','Other') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Other',
  `breed` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sex` enum('Male','Female') COLLATE utf8mb4_general_ci NOT NULL,
  `age` float NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `nuetered` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pet_id`),
  KEY `petowner_fk` (`user_id`),
  CONSTRAINT `petowner_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registered_pets`
--

LOCK TABLES `registered_pets` WRITE;
/*!40000 ALTER TABLE `registered_pets` DISABLE KEYS */;
/*!40000 ALTER TABLE `registered_pets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_providers`
--

DROP TABLE IF EXISTS `service_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_providers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `service_type` enum('Pet Sitter','Food Suppliments','Day Care','Equipments Seller') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Areas` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `open_hour` time DEFAULT NULL,
  `closing_hour` time DEFAULT NULL,
  `available_days` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `registered_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `provider_id_fk` (`user_id`),
  CONSTRAINT `provider_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_providers`
--

LOCK TABLES `service_providers` WRITE;
/*!40000 ALTER TABLE `service_providers` DISABLE KEYS */;
/*!40000 ALTER TABLE `service_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile_no` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('user','admin','medical_provider','seller','shelter','service_prov') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'newdb','test','dbtest1@gmail.com','$2y$10$mwpxuTzxTxD2DoXmPzYqWuS/72.QLcflLWaT3d617bg/S4/zlL/0.','profile-images\\67494af750c77_user.jpg',NULL,NULL,NULL,'2025-01-25 10:20:43','2025-01-25 10:20:43','admin'),(2,'dbtest','Services','dbtest_ser@gmail.com','$2y$10$qheqnZ.s.pEMDRn4JLowW.SeqbrqRWurDiC7PF0DNQ1fVtVFHSpma',NULL,NULL,NULL,NULL,'2025-01-25 11:48:25','2025-01-25 11:48:25','user'),(3,'dbtest','Services','dbtest_ser@gmail.com','$2y$10$crWrQ5NSUklFZvs06AdK2OiDzifc/sTBOgAGh7VwCs6rIkwI.2eU6',NULL,NULL,NULL,NULL,'2025-01-25 11:52:37','2025-01-25 11:52:37','user'),(6,'service','uservice','dbtest_ser10@gmail.com','$2y$10$rtpHB6pFpYJYKnhqt.h.Y.ljQkTFcL3UjiqsgMpQ9re7Z1/tq/bVC',NULL,NULL,NULL,NULL,'2025-01-28 15:17:37','2025-01-28 15:17:37','user'),(7,'check','userrole','dbtest_ser11@gmail.com','$2y$10$GLbZJK.vhWCmaM73FRw8We5MxZxTvdB6YWQf0JtSBauuzUXLU4QF.',NULL,NULL,NULL,NULL,'2025-01-28 15:30:57','2025-01-28 15:30:57','seller'),(8,'med','test','medTest@gmail.com','$2y$10$OK.0pXHxM7HhkKDb69D8r.rDYhPfS2PEMo2f87l0rzqJkC9NIV9yG',NULL,NULL,NULL,NULL,'2025-01-29 23:17:06','2025-01-29 23:17:06','medical_provider'),(9,'med','test','medTest@gmail.com','$2y$10$prqu1qRFhb4RywRclv79gOdthRytw0WUQHYpW2xV1ntG8YIxyrVGG',NULL,NULL,NULL,NULL,'2025-01-29 23:20:52','2025-01-29 23:20:52','medical_provider'),(10,'med','test','medTest@gmail.com','$2y$10$u7bqjRnE0aNX6E7M5lHJ6uWsR8V6F2d0BYpaE59kNwmPq1nniwTtm',NULL,NULL,NULL,NULL,'2025-01-29 23:21:14','2025-01-29 23:21:14','medical_provider'),(11,'med','test','medTest@gmail.com','$2y$10$uxXaX/NRYUyYz8d/D.dhL.FUoRAZjBbpWtFuqQnYmDllq5G/AtSzK',NULL,NULL,NULL,NULL,'2025-01-29 23:23:39','2025-01-29 23:23:39','medical_provider'),(12,'asdsa','asdasd','finaltest@gmail.com','$2y$10$ITWPZhU9qAGeqe/0xwwKS.ECaRrvbEC4.LFO0/WmnWhpaqwwfBnkm',NULL,NULL,NULL,NULL,'2025-02-01 05:05:44','2025-02-01 05:05:44','medical_provider'),(13,'ads','adsad','sheltertest@gmail.com','$2y$10$Fb4G2zDlLw3AanHF3uZMYeW809bNg3TAWjjeWrnlQQ9dpG9u7Wd9O',NULL,NULL,NULL,NULL,'2025-02-01 05:06:32','2025-02-01 05:06:32','shelter'),(14,'testisserv','tickinput','isservice@gmail.com','$2y$10$4wd1.VJNXrORD4o1.WB8NODxCqWy7RprVt03xfd.CSYt8iXP0wOt.',NULL,NULL,NULL,NULL,'2025-02-11 03:39:52','2025-02-11 03:39:52','medical_provider'),(16,'Shenal','Danthanarayana','vet@gmail.com','$2y$10$LQkQS.SsKUHWUaA60wdJyuJhOqNXmMwD62Zh1auFJ9/ZIiKhZVb5O',NULL,NULL,NULL,NULL,'2025-03-10 00:46:32','2025-03-10 00:46:32','medical_provider');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veterinarians`
--

DROP TABLE IF EXISTS `veterinarians`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `veterinarians` (
  `vet_id` int NOT NULL AUTO_INCREMENT,
  `med_id` int NOT NULL COMMENT 'clinic where the vet is working in',
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `availability` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`vet_id`),
  KEY `provider_fk_idx` (`med_id`),
  CONSTRAINT `provider_fk` FOREIGN KEY (`med_id`) REFERENCES `medical_providers` (`med_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veterinarians`
--

LOCK TABLES `veterinarians` WRITE;
/*!40000 ALTER TABLE `veterinarians` DISABLE KEYS */;
INSERT INTO `veterinarians` VALUES (1,1,'Dr. Farah','http://localhost/PawCentral/public/assets/uploads/vet-images/1741835294_kanishka.jpeg','4','Sat - Sun 8 to 5','2025-02-11 05:13:46'),(2,1,'Dr. Ochintha','http://localhost/PawCentral/public/assets/uploads/vet-images/1741835277_ochintha.jpeg','2','Mon - Fri 8 to 5','2025-02-11 05:16:41');
/*!40000 ALTER TABLE `veterinarians` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-13  9:06:44
