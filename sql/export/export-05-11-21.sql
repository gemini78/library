-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: library_db
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `publish_at` date NOT NULL,
  `writer_id` int NOT NULL,
  `path_image` varchar(255) DEFAULT 'noCover.jpg',
  `price` float DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_book_writer` (`writer_id`),
  CONSTRAINT `fk_book_writer` FOREIGN KEY (`writer_id`) REFERENCES `writer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'l\'alliance des Trois','978-2-226-19953-9','2008-11-03',1,'noCover.jpg',7.85),(2,'le coeur de la terre','978-2-226-20840-8','2010-04-01',1,'ID-le-coeur-de-la-terre.jpg',3.88),(3,'Entropia','978-2-226-26135-9','2011-11-03',1,'noCover.jpg',5.3),(5,'Le crime de l\'orient-Express','978-1-471-15419-5','2016-11-15',3,'orient.jpg',17.1),(6,'Les Montagnes','979-10-281-1038-3','2019-10-16',3,'noCover.jpg',5.4),(13,'devotion','978-28-098-4239-5','2021-09-02',4,'noCover.jpg',12),(14,'Introduction to Computer','978-93-5019-561-1','2011-01-01',5,'noCover.jpg',24.9),(15,'Data Structure Using C','978-93-5163-389-1','2015-01-01',6,'noCover.jpg',17.5),(17,'untitre','978-2-227-26135-9','2021-11-01',1,'noCover.jpg',20),(19,'my super car','978-2-226-26135-18','2021-11-30',1,'id-19-veyron.png',0),(21,'un titre pour le prix','978-2-826-26135-10','2021-11-04',1,'id-21-hypernova.jpg',57.8),(22,'un nouv','938-2-226-26135-10','2021-11-04',1,'id-22-mcd.png',1),(23,'un test pour l\'image','978-2-226-29135-9','2021-11-05',4,'noCover.jpg',15),(24,'un avion','978-2-286-26135-10','2021-11-01',3,'id-24-NC900-2.png',100);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `writer`
--

DROP TABLE IF EXISTS `writer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `writer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `writer`
--

LOCK TABLES `writer` WRITE;
/*!40000 ALTER TABLE `writer` DISABLE KEYS */;
INSERT INTO `writer` VALUES (1,'maxime','chattam','1976-02-19'),(2,'mary','higgins clark','1927-12-24'),(3,'agatha','christie','1890-09-15'),(4,'Dean Ray','Koontz','1945-07-09'),(5,'Lalit','Kumar','1957-01-01'),(6,'Sharad','Verma','1978-06-26');
/*!40000 ALTER TABLE `writer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-05 20:06:23
