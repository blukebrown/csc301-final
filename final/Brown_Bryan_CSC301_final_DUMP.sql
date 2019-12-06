-- MySQL dump 10.13  Distrib 8.0.17, for macos10.14 (x86_64)
--
-- Host: csweb.hh.nku.edu    Database: db_fall19_brownb23
-- ------------------------------------------------------
-- Server version	8.0.17

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
-- Table structure for table `book_categories`
--

DROP TABLE IF EXISTS `book_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_categories` (
  `isbn` varchar(45) NOT NULL,
  `categoryid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_categories`
--

LOCK TABLES `book_categories` WRITE;
/*!40000 ALTER TABLE `book_categories` DISABLE KEYS */;
INSERT INTO `book_categories` VALUES ('0-672-31697-8',1),('000000000012',2),('000000000012',3),('45673892',1),('45673892',4);
/*!40000 ALTER TABLE `book_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_reviews`
--

DROP TABLE IF EXISTS `book_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_reviews` (
  `isbn` char(13) NOT NULL,
  `review` text,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_reviews`
--

LOCK TABLES `book_reviews` WRITE;
/*!40000 ALTER TABLE `book_reviews` DISABLE KEYS */;
INSERT INTO `book_reviews` VALUES ('0-672-31697-8','Morgan\'s book is clearly written and goes well beyond \n                     most of the basic Java books out there.');
/*!40000 ALTER TABLE `book_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `isbn` char(13) NOT NULL,
  `author` char(50) DEFAULT NULL,
  `title` char(100) DEFAULT NULL,
  `price` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES ('0-672-31509-2','Pruitt, et al.','Teach Yourself GIMP in 24 Hours',24.99),('0-672-31697-8','Michael Morgan','Java 2 for Professional Developers',34.99),('0-672-31745-1','Thomas Down','Installing Debian GNU/Linux',24.99),('0-672-31769-9','Thomas Schenk','Caldera OpenLinux System Administration Unleashed',49.99),('000000000012','P. Ness','Seymour Butts',99.99),('1300','Jesse Hockenbury','Jesse Grading',12.45),('45673892','Author Brothel','New Book Sister',19.34);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Technology'),(2,'English'),(3,'Science'),(4,'Math');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `customerid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `address` char(100) NOT NULL,
  `city` char(30) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`customerid`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Julie Smith','25 Oak Street','Airport West','admin','$2y$10$yr/xuFJeQ1BuHoHyl.4y8OEN7cl5qFC79SWCSJu5DwCln2sSNHP46'),(2,'Alan Wong','1/47 Haines Avenue','Box Hill',NULL,NULL),(3,'Michelle Arthur','357 North Road','Yarraville',NULL,NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_employee`
--

DROP TABLE IF EXISTS `final_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `final_employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_firstname` varchar(45) DEFAULT NULL,
  `emp_lastname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `emp_id_UNIQUE` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_employee`
--

LOCK TABLES `final_employee` WRITE;
/*!40000 ALTER TABLE `final_employee` DISABLE KEYS */;
INSERT INTO `final_employee` VALUES (1,'John','Doe','admin','91a343c02e6c4e10b023216ecfcd69e7');
/*!40000 ALTER TABLE `final_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_guest`
--

DROP TABLE IF EXISTS `final_guest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `final_guest` (
  `guest_id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_firstname` varchar(45) NOT NULL,
  `guest_lastname` varchar(45) NOT NULL,
  `guest_email` varchar(45) NOT NULL,
  `guest_phone` varchar(45) NOT NULL,
  `guest_zip` varchar(45) DEFAULT NULL,
  `guest_card` varchar(45) NOT NULL,
  PRIMARY KEY (`guest_id`),
  UNIQUE KEY `guest_id_UNIQUE` (`guest_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_guest`
--

LOCK TABLES `final_guest` WRITE;
/*!40000 ALTER TABLE `final_guest` DISABLE KEYS */;
INSERT INTO `final_guest` VALUES (1,'Bob','Smith','a@a.com','123-456-7890','90210','1234567890123456'),(2,'Andrew','Smith','b@b.com','859-999-8888','41079','12341234123456'),(3,'John','Doe','doe@john.com','123456789','12345','12341234123412'),(4,'Aaron','Blue','aaron@blue.com','1234567890','098765','0987654321234567'),(5,'Luke','Brown','lb@nku.edu','9990004444','09765','444455556666777'),(6,'Luke','Brown','lb@nku.edu','9990004444','09765','444455556666777'),(7,'Luke','Brown','lb@nku.edu','9990004444','09765','444455556666777'),(8,'New','Guy','ng@ng.com','1234567890','12345','123412341234567'),(9,'abc','def','def@abc.com','123456789','90210','12345678901234'),(10,'NEW','GUY','n@g.com','1234567890','12345','12341234123411'),(11,'Eleven','SMith','m@n.com','1234567890','12345','111111111111111'),(12,'Twelve','dude','d@d.com','1234567890','87465','00000000000000'),(13,'Thirteen','dude','a@a.com','1234567890','64538','987656789876545'),(14,'K','V','v@k.com','9999999999','11111','876543324154657'),(15,'Colby','Jack','cheese@chesse.com','1234567890','90210','12341234123456'),(16,'Cas','Morg','cas@morg.com','9999999999','99999','9999999999999');
/*!40000 ALTER TABLE `final_guest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_reservation`
--

DROP TABLE IF EXISTS `final_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `final_reservation` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_id` int(11) DEFAULT NULL,
  `res_time` datetime DEFAULT NULL,
  `res_arrival` datetime DEFAULT NULL,
  `res_dept` datetime DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`res_id`),
  UNIQUE KEY `res_id_UNIQUE` (`res_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_reservation`
--

LOCK TABLES `final_reservation` WRITE;
/*!40000 ALTER TABLE `final_reservation` DISABLE KEYS */;
INSERT INTO `final_reservation` VALUES (4,13,'2019-12-05 22:36:02','2019-12-20 00:00:00','2019-12-21 00:00:00',2),(5,14,'2019-12-05 22:37:11','2019-12-29 00:00:00','2019-12-30 00:00:00',3),(6,15,'2019-12-06 14:13:19','2019-12-30 00:00:00','2019-12-31 00:00:00',2),(7,16,'2019-12-06 14:24:58','2019-12-30 00:00:00','2019-12-31 00:00:00',1);
/*!40000 ALTER TABLE `final_reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_room`
--

DROP TABLE IF EXISTS `final_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `final_room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  UNIQUE KEY `idfinal_room_UNIQUE` (`room_id`),
  KEY `room_type_idx` (`room_type`),
  CONSTRAINT `room_type` FOREIGN KEY (`room_type`) REFERENCES `final_roomtype` (`room_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_room`
--

LOCK TABLES `final_room` WRITE;
/*!40000 ALTER TABLE `final_room` DISABLE KEYS */;
/*!40000 ALTER TABLE `final_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `final_roomtype`
--

DROP TABLE IF EXISTS `final_roomtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `final_roomtype` (
  `room_type` int(11) NOT NULL AUTO_INCREMENT,
  `room_desc` varchar(3) NOT NULL,
  PRIMARY KEY (`room_type`),
  UNIQUE KEY `ROOM_TYPE_UNIQUE` (`room_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `final_roomtype`
--

LOCK TABLES `final_roomtype` WRITE;
/*!40000 ALTER TABLE `final_roomtype` DISABLE KEYS */;
INSERT INTO `final_roomtype` VALUES (1,'K'),(2,'Q'),(3,'QQ');
/*!40000 ALTER TABLE `final_roomtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `orderid` int(10) unsigned NOT NULL,
  `isbn` char(13) NOT NULL,
  `quantity` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`orderid`,`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,'0-672-31697-8',2),(2,'0-672-31769-9',1),(3,'0-672-31509-2',1),(3,'0-672-31769-9',1),(4,'0-672-31745-1',3);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `orderid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customerid` int(10) unsigned NOT NULL,
  `amount` float(6,2) DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,3,69.98,'2000-04-02'),(2,1,49.99,'2000-04-15'),(3,2,74.98,'2000-04-19'),(4,3,24.99,'2000-05-01');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-06 15:47:09
