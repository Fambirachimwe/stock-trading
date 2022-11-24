-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: toby
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

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
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organizations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `org_name` varchar(1000) NOT NULL,
  `phone` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `details` text,
  `site_url` varchar(1000) NOT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `total_shares` varchar(100) DEFAULT NULL,
  `shares_on_sale` varchar(100) DEFAULT NULL,
  `selling` varchar(100) DEFAULT NULL,
  `owners` varchar(100) DEFAULT NULL,
  `share_value` varchar(100) DEFAULT NULL,
  `share_value_history` int DEFAULT NULL,
  `docs` varchar(2000) DEFAULT NULL,
  `images` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (1,'Oxfam','+254 (0) 20 2820000','1234','Oxfam International Headquarters\r\nThe Atrium\r\nChaka Road\r\nKilimani,\r\nNairobi, Kenya','Oxfam is a global movement of people, working together to end the injustice of poverty. That means we tackle the inequality that keeps people poor. Together, we save, protect and rebuild lives when disaster strikes. We help people build better lives for themselves, and for others. we take on issues like land rights, climate change and discrimination against women. And we won’t stop until every person on the planet can enjoy life free from poverty.','https://www.oxfam.org/en','0000',' 10000','6280',NULL,'/1/3/7/6/2/10/9','0.50',NULL,NULL,'/OxfamHeader.png'),(6,'      ZIMAS','0772345763','zimas@gmail.com','Marondera','','www.zimas.org','12345678',' 4000','3436',NULL,'/1/7/6/9/2/10','.70',NULL,NULL,NULL),(7,'KidzCan','+263242255739','admin@kidzcan.org','6 Natal Road, Belgravia, Harare','Our vision is to have a compassionate world where children with cancer are given the chance to lead healthy and fulfilling lives. The team believes that before we can show love to others outside we should first be able to share it among ourselves and hence we are one big family that loves and supports each other. Having grown from a mission of Northside Community Church, we have Christian roots and have precise values of love, empathy and integrity and even though we are christians ourselves we help all children regardless of their religion, ethnicity or race.','www.kidzcanzimbabwe.org','12345678',' 5000','176',NULL,'/1/5/7/6/8/9/2/10','0.25',NULL,NULL,'/KidzCanLogo.png'),(10,'digiAfrica','0776412771','digi@gmail.com','394B Seke road Ruwa',NULL,'test','test1234',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'digiAfrica','0776412771','digi@gmail.com','394B Seke road Ruwa','test','test','test1234',' 100000','4223',NULL,'/6/7/8/9/2/10','100',NULL,'/company profile (2) (1).pdf','/businessProblems.png');
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `userId` varchar(45) DEFAULT NULL,
  `stockId` varchar(45) DEFAULT NULL,
  `volume` varchar(45) DEFAULT NULL,
  `stock_price` varchar(45) DEFAULT NULL,
  `reason` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'2022-11-23 18:18:12','10','-','-','-','Top Up','20'),(2,'2022-11-23 18:18:34','10','-','-','-','Withdraw','1000'),(3,'2022-11-24 04:50:25','10','-','-','-','Withdraw','100'),(4,'2022-11-24 04:50:41','10','-','-','-','Top Up','2000');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `id_number` varchar(45) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `watchlist` varchar(2000) DEFAULT NULL,
  `stocks` varchar(2000) DEFAULT NULL,
  `balance` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Bruce Migeri','0712732386','bruceprintworks@gmail.com','136 Bakeway Belvedere',NULL,'12345678','/1/7','1-200/7-200','1035'),(3,'Tino','0734567433','tino@gmail.com','Belgravia',NULL,'12345678','/7','/1-100','450'),(4,'Sophia','0712387564','sophia@gmial.com','Belvedere',NULL,'12345678',NULL,NULL,NULL),(5,'Ellain','0777112737','ellain@gmail.com','err45',NULL,'12345678','/7','7-1050','49937.5'),(9,'tatenda','0776412771','t@gmail.com','394B Seke road Ruwa',NULL,'test1234',NULL,'6-2600/6-2600/1-400/1-300','5422948.5'),(10,'tafadzwa ','0782824073','tafa@gmail.com','394B Seke road Ruwa',NULL,'test1234','/7','11-1/6-3','2165.85'),(11,'test','07775232190','test@gmail.com','33 seke road',NULL,'test1234',NULL,NULL,NULL),(13,'Aron','078562336','aa@gmail.com','394B Seke road Ruwa','5622247896dsd55','test1234',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-24  4:59:50
