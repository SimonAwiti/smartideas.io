-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: cms
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(259) DEFAULT NULL,
  `mobilenumber` bigint DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin',8956232356,'admin@gmail.com','admin','f925916e2754e5e03f75dd58a5733251','2023-09-12 05:16:16','18-10-2016 04:18:16');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'E-commerce','E-commerce','2023-08-28 07:10:55','2023-09-14 07:10:30'),(2,'general','dsdas','2023-08-11 10:54:06','2023-09-14 07:10:46'),(4,'Consumer','Consumer complain lodged','2023-09-12 06:26:48',NULL),(5,'Bank','Bank related user complaints','2023-09-12 06:27:36',NULL),(6,'Labour','Labour related user complaints','2023-09-12 06:33:43','2023-09-12 06:34:54'),(9,'Agriculture ','Farming and any agricultural related','2025-01-17 08:07:06',NULL),(10,'Service Delivery','Anything related to service delivery','2025-01-17 08:07:26',NULL),(11,'Any other business ','anything uncategorized','2025-01-17 08:08:01',NULL),(12,'Entertainment ','Anything entertainment industry','2025-01-17 08:08:20',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complaintremark`
--

DROP TABLE IF EXISTS `complaintremark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `complaintremark` (
  `id` int NOT NULL AUTO_INCREMENT,
  `complaintNumber` int DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext,
  `remarkDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complaintremark`
--

LOCK TABLES `complaintremark` WRITE;
/*!40000 ALTER TABLE `complaintremark` DISABLE KEYS */;
INSERT INTO `complaintremark` VALUES (1,3,'in process','your ticket forward to associated team','2023-09-15 13:05:38'),(2,3,'closed','Ticket close in favor of user','2023-09-15 13:06:31'),(3,5,'in process','We are reviewing the complaint','2023-10-01 04:12:48'),(4,5,'closed','Issue resolved','2023-10-01 04:13:12');
/*!40000 ALTER TABLE `complaintremark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ideas`
--

DROP TABLE IF EXISTS `ideas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ideas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `in_search_of` varchar(255) DEFAULT NULL,
  `idea_type` varchar(100) NOT NULL,
  `brief_description` text NOT NULL,
  `votes` int DEFAULT '0',
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ideas`
--

LOCK TABLES `ideas` WRITE;
/*!40000 ALTER TABLE `ideas` DISABLE KEYS */;
INSERT INTO `ideas` VALUES (1,'Anonymous','+254798226640','Kenya','Money','Farming','Do a mixed Sukuma Wiki farming in Rongai, looking for funding',1,'2025-01-30 08:47:33'),(2,'Simon Awiti','+254798226640','Kenya','Money','Service Industry','Start a fast food delivery busness with a eunique business model',1,'2025-01-30 08:47:33'),(3,'Alicia Davidson','adavidson4020@gmail.com','New York, USA','Partner','Other','A mobile massage palour with chyropractor services focusing on corprates',1,'2025-01-30 08:47:33'),(4,'Joseph Kitivo','+254791220640','Kenya','Money','Cleaning','A post construction cleaning and landscaping company thet focuses on new construction sites based in Nakuru',1,'2025-01-30 08:47:33'),(5,'Alice Modi','+254728221240','Tanzania','Partner','IT','Provide IT services like printing and browsing to users in Arusha town',1,'2025-01-30 08:47:33'),(6,'Brian Otieno','+2547331782','Kenya','Partner','Fish farming','Start a fish farming business with a eunique fishing technique where the fish are feed once a day',1,'2025-01-30 08:47:33'),(7,'Michael Hachinson','mhachinson13@gmail.com','Trenton, New Jersey, USA','Money','Beauty Polour','A mobile beauty palour where users can make orders and services be delivered to them within town',0,'2025-01-30 08:47:33'),(8,'Betty Akoth','+25471317123','Kenya','Partner','Boost my Kiosk','Id like to partner up with someone at an agreed shares in order to boost up my samosa kiosk',1,'2025-01-30 08:47:33'),(9,'Dennis Too','+25471317123','Kenya','Money','Boost my Kiosk','Id like to partner up with someone at an agreed shares in order to boost up my samosa kiosk',0,'2025-01-30 10:43:07'),(10,'Hernandez Julio','hernandezj97@gmail.com','Buenos Aires, Argentina - South America','Partnership','Mitumba Business','Import cheap bales from China',0,'2025-01-30 11:22:57'),(11,'Awiti Simon','0798226512','Punjab','Partnership','Mitumba Business','Start mutumba business; I have contacts in London',1,'2025-01-30 15:51:09');
/*!40000 ALTER TABLE `ideas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `state` (
  `id` int NOT NULL AUTO_INCREMENT,
  `stateName` varchar(255) DEFAULT NULL,
  `stateDescription` tinytext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (3,'Uttar Pradesh','Uttar Pradesh-UP','2023-09-28 16:56:56','2023-10-01 10:30:30'),(4,'Punjab','Punjab-PB','2023-09-28 16:56:56','2023-10-01 10:30:33'),(5,'Haryana','Haryana-HR','2023-09-28 16:56:56','2023-10-01 10:30:36'),(6,'Delhi','Delhi-DL','2023-09-28 16:56:56','2023-10-01 10:30:40'),(10,'Kenya','','2025-01-17 08:10:00',NULL),(11,'Tanzania','','2025-01-17 08:10:06',NULL),(12,'Uganda','','2025-01-17 08:10:10',NULL),(13,'Rwanda','','2025-01-17 08:10:29',NULL);
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subcategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoryid` int DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategory`
--

LOCK TABLES `subcategory` WRITE;
/*!40000 ALTER TABLE `subcategory` DISABLE KEYS */;
INSERT INTO `subcategory` VALUES (1,1,'Online Shopping','2023-03-28 07:11:07','2023-09-14 07:10:13'),(2,1,'E-wllaet','2023-08-28 07:11:20','2023-09-14 07:10:00'),(3,2,'other','2023-09-14 07:06:44','2023-09-14 07:09:47'),(4,2,'ABC','2023-09-12 11:40:13','2023-09-12 11:59:07'),(8,9,'Farming','2025-01-17 08:09:00',NULL),(9,9,'Agribusiness','2025-01-17 08:09:15',NULL);
/*!40000 ALTER TABLE `subcategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcomplaints`
--

DROP TABLE IF EXISTS `tblcomplaints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcomplaints` (
  `complaintNumber` int NOT NULL AUTO_INCREMENT,
  `userId` int DEFAULT NULL,
  `category` int DEFAULT NULL,
  `complaintType` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `noc` varchar(255) DEFAULT NULL,
  `complaintDetails` mediumtext,
  `complaintFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `contact` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`complaintNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcomplaints`
--

LOCK TABLES `tblcomplaints` WRITE;
/*!40000 ALTER TABLE `tblcomplaints` DISABLE KEYS */;
INSERT INTO `tblcomplaints` VALUES (1,3,1,' Complaint','Punjab','Complain against Shopping website','company name xyz has not return my money after returning the item.','','2023-09-15 12:33:14',NULL,'2023-09-15 12:56:52',NULL),(2,4,1,'General Query','Punjab','htrdy','dytuj','7db575b77409a4ad74cb9620814085e8.jpg','2023-09-15 12:41:41',NULL,NULL,NULL),(3,1,1,'General Query','Punjab','htrdy','dytuj','7db575b77409a4ad74cb9620814085e8.jpg','2023-09-15 12:45:26','closed','2023-09-15 13:06:31',NULL),(4,5,1,' Complaint','Delhi','Complain against Shopping website','This is for testing.','2c86e2aa7eb4cb4db70379e28fab9b52.pdf','2023-09-26 01:28:17',NULL,NULL,NULL),(5,6,1,'General Query','Punjab','Test nature','This is for testing','858828b8b12d041fde07b353a94db5ed.png','2023-10-01 04:12:07','closed','2023-10-01 04:13:12',NULL),(6,7,2,'General Query','Delhi','Online Doctors Marketplace','An online platform for doctors where users are able to get consultation at a fee',NULL,'2025-01-17 07:48:55',NULL,NULL,NULL),(7,7,2,' Complaint','Punjab','Barbershop','A modern barbershop with additional services like massage therapy',NULL,'2025-01-17 07:52:54',NULL,NULL,NULL),(8,7,9,' Complaint','Kenya','Onion Farming','A more modern and tested method of onion farming ',NULL,'2025-01-17 08:57:37',NULL,NULL,''),(9,7,9,'Funding','Kenya','Onion Farmin','A new method and approach of onion farming which is tested and approved',NULL,'2025-01-17 09:29:19',NULL,NULL,''),(10,7,9,' Patnership','Kenya','Onion farmin','A testing environment',NULL,'2025-01-17 09:47:46',NULL,NULL,'');
/*!40000 ALTER TABLE `tblcomplaints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint DEFAULT NULL,
  `address` tinytext,
  `State` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` int DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Anuj Kumar','anuj.lpu1@gmail.com','f925916e2754e5e03f75dd58a5733251',9999857860,'Shakarpur','Uttar Pradesh','India',110092,'6e8024ec26c292f258ec30f01e0392dc.png','2023-09-28 16:56:56','2023-09-28 16:56:56',1),(2,'test','test@123','202cb962ac59075b964b07152d234b70',7894561236,NULL,NULL,NULL,NULL,NULL,'2023-09-13 05:05:11',NULL,1),(3,'Ram','ram@gmail.com','202cb962ac59075b964b07152d234b70',1234567899,NULL,NULL,NULL,NULL,NULL,'2023-09-15 06:33:30',NULL,1),(4,'Rakesh Sharma','rakesh@gmail.com','202cb962ac59075b964b07152d234b70',8989898989,'J-789, Near Metro Station','Delhi','India',110110,'e9a19a656ca1e4758c2025fe1adaeb64.jpg','2023-09-15 06:43:53',NULL,1),(5,'John Doe','jhndoe12@test.com','f925916e2754e5e03f75dd58a5733251',4141414141,NULL,NULL,NULL,NULL,NULL,'2023-09-26 01:06:49',NULL,1),(6,'Garima','grmat@test.com','f925916e2754e5e03f75dd58a5733251',1234563214,'A1 1222 XYZ Aprtment','Delhi','India',110001,NULL,'2023-10-01 04:10:45',NULL,1),(7,'Simon Awiti','awitisimon23@gmail.com','31cda25f9a54a43d4310b3b8466d83fd',798226640,NULL,NULL,NULL,NULL,NULL,'2025-01-17 07:09:36',NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `votes` (
  `vote_id` int NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(45) NOT NULL,
  `idea_id` int NOT NULL,
  `voted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`vote_id`),
  KEY `idea_id` (`idea_id`),
  CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` VALUES (1,'::1',1,'2025-01-24 12:11:58'),(2,'::1',2,'2025-01-27 02:46:43'),(3,'::1',4,'2025-01-27 07:44:07'),(4,'::1',3,'2025-01-27 07:44:27'),(5,'::1',8,'2025-01-27 07:49:58'),(6,'::1',6,'2025-01-30 10:44:17'),(7,'::1',5,'2025-01-30 15:38:27'),(8,'::1',11,'2025-01-30 15:56:21');
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-01 21:02:24
