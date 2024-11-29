-- MySQL dump 10.13  Distrib 8.0.34, for macos13 (x86_64)
--
-- Host: localhost    Database: genie_new
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `state` (
  `state_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `country_id` bigint unsigned DEFAULT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`state_id`),
  KEY `state_state_id_index` (`state_id`),
  KEY `state_country_id_index` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,NULL,'Andhra Pradesh','AD','1','2023-11-08 23:36:37','2023-11-08 23:36:37'),(2,NULL,'Arunachal Pradesh','AR','1','2023-11-08 23:36:46','2023-11-08 23:36:46'),(3,NULL,'Telangana','TS','1','2023-11-08 23:36:51','2023-11-08 23:36:51'),(4,NULL,'Assam','AS','1','2023-11-08 23:36:53','2023-11-08 23:36:53'),(5,NULL,'Bihar','BR','1','2023-11-08 23:37:01','2023-11-08 23:37:01'),(6,NULL,'Uttar Pradesh','UP','1','2023-11-08 23:37:02','2023-11-08 23:37:02'),(7,NULL,'Gujarat','GJ','1','2023-11-08 23:37:10','2023-11-08 23:37:10'),(8,NULL,'Goa','GA','1','2023-11-08 23:37:12','2023-11-08 23:37:12'),(9,NULL,'Haryana','HR','1','2023-11-08 23:37:12','2023-11-08 23:37:12'),(10,NULL,'Himachal Pradesh','HP','1','2023-11-08 23:37:12','2023-11-08 23:37:12'),(11,NULL,'Jammu and Kashmir','JK','1','2023-11-08 23:37:13','2023-11-08 23:37:13'),(12,NULL,'Madhya Pradesh','MP','1','2023-11-08 23:37:13','2023-11-08 23:37:13'),(13,NULL,'Karnataka','KA','1','2023-11-08 23:37:13','2023-11-08 23:37:13'),(14,NULL,'Kerala','KL','1','2023-11-08 23:37:13','2023-11-08 23:37:13'),(15,NULL,'Maharashtra','MH','1','2023-11-08 23:37:13','2023-11-08 23:37:13'),(16,NULL,'Chattisgarh','CG','1','2023-11-08 23:37:20','2023-11-08 23:37:20'),(17,NULL,'Delhi','DL','1','2023-11-08 23:37:28','2023-11-08 23:37:28'),(18,NULL,'Daman and Diu','DD','1','2023-11-08 23:37:47','2023-11-08 23:37:47'),(19,NULL,'Dadra and Nagar Hav.','DNHDD','1','2023-11-08 23:38:10','2023-11-08 23:38:10'),(20,NULL,'Manipur','MN','1','2023-11-08 23:38:21','2023-11-08 23:38:21'),(21,NULL,'Megalaya','ML','1','2023-11-08 23:38:21','2023-11-08 23:38:21'),(22,NULL,'Mizoram','MZ','1','2023-11-08 23:38:21','2023-11-08 23:38:21'),(23,NULL,'Nagaland','NL','1','2023-11-08 23:38:21','2023-11-08 23:38:21'),(24,NULL,'Odisha','OD','1','2023-11-08 23:38:21','2023-11-08 23:38:21'),(25,NULL,'Punjab','PB','1','2023-11-08 23:38:21','2023-11-08 23:38:21'),(26,NULL,'Rajasthan','RJ','1','2023-11-08 23:38:21','2023-11-08 23:38:21'),(27,NULL,'Sikkim','SK','1','2023-11-08 23:38:21','2023-11-08 23:38:21'),(28,NULL,'Tamil Nadu','TN','1','2023-11-08 23:38:21','2023-11-08 23:38:21'),(29,NULL,'Tripura','TR','1','2023-11-08 23:38:21','2023-11-08 23:38:21'),(30,NULL,'Jharkhand','JH','1','2023-11-08 23:38:45','2023-11-08 23:38:45'),(31,NULL,'Uttarakhand','UK','1','2023-11-08 23:38:55','2023-11-08 23:38:55'),(32,NULL,'Lakshadweep','LD','1','2023-11-08 23:40:53','2023-11-08 23:40:53'),(33,NULL,'Chandigarh','CH','1','2023-11-08 23:53:43','2023-11-08 23:53:43'),(34,NULL,'Pondicherry','PY','1','2023-11-08 23:55:48','2023-11-08 23:55:48'),(35,NULL,'Andaman and Nico.In.','AN','1','2023-11-08 23:57:27','2023-11-08 23:57:27'),(36,NULL,'West Bengal','WB','1','2023-11-08 23:58:41','2023-11-08 23:58:41');
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-10 11:06:26
