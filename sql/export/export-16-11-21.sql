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
  `synopsys` text,
  PRIMARY KEY (`id`),
  KEY `fk_book_writer` (`writer_id`),
  CONSTRAINT `fk_book_writer` FOREIGN KEY (`writer_id`) REFERENCES `writer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'l\'alliance des Trois','978-2-226-19953-9','2008-11-03',1,'id-1-allliance.png',7.85,'New York, de nos jours. Matt et Tobias sont amis depuis l\'enfance, grands amateurs de jeux de rôles, de jeux vidéos. ... Après une mystérieuse tempête, seul les enfants ont été épargnés, faisant disparaître, la plupart des adultes et transformant le reste en être malfaisants.'),(2,'le coeur de la terre','978-2-226-20840-8','2010-04-01',1,'ID-le-coeur-de-la-terre.jpg',30.8,'Résumé Matt, Ambre et Tobias, trois adolescents américains, tentent de survivre à Autre-Monde, une terre transformée, et qui a transformé les vivants, les a changé mentalement ou rendu plus forts. Les adultes (les Cyniks), devenus belliqueux, sont séparés des enfants et adolescents, appelés les Pans.'),(3,'Entropia','978-2-226-26135-9','2011-11-03',1,'id-3-entropia.png',5.3,'Un jour, une terrible tempête a frappé la Terre, changeant totalement la nature, faisant oublier la mémoire aux adultes survivants (les Cyniks), les séparant des enfants et adolescents (les Pans), changeant des animaux en créatures féroces.'),(5,'Le crime de l\'orient-Express','978-1-471-15419-5','2016-11-15',3,'orient.jpg',17.1,'Dans cette histoire tirée du célèbre roman d\'Agatha Christie, le célèbre détective belge Hercule Poirot prend l\'Orient-Express pour rentrer d\'Istanbul à Londres mais alors que le train se retrouve bloqué par la neige dans les montagnes yougoslaves, un meurtre est commis. Les 13 passagers sont tous suspects et le fameux détective Hercule Poirot se lance dans une course contre la montre pour identifier l\'assassin, avant qu\'il ne frappe à nouveau.'),(13,'devotion','978-28-098-4239-5','2021-09-02',4,'id-13-devotion.png',12,'Woody, 11 ans, est autiste et doué pour la télépathie. Avec l\'aide de Kipp, un golden retriever lui aussi doté d\'une intelligence supérieure, il tente de déjouer les plans d\'un tueur génétiquement modifié et de ceux qui ont créé ce monstre.'),(14,'Introduction to Computer','978-93-5019-561-1','2011-01-01',5,'id-14-lkumar.jpg',24.9,'A computer is an electronic device, operating under the control of instructions stored in its own memory that can accept data (input), process the data according to specified rules, produce information (output), and store the information for future use1. Any kind of computers consists of HARDWARE AND SOFTWARE.'),(15,'Data Structure Using C','978-93-5163-389-1','2015-01-01',6,'id-15-sharad-verma.jpeg',17.5,'La structure des données est le sujet le plus important de l\'informatique. Il est nécessaire de connaître la structure des données pour chaque étudiant en informatique. Ce livre fournit une description détaillée de la structure des données. Au moment de la rédaction de ce livre, la principale considération était la simplicité du texte. Il s\'agit essentiellement d\'un livre destiné aux étudiants. le premier chapitre qui explique tous les concepts de base et nécessaires de la programmation C est également inclus dans le livre, qui est le chapitre supplémentaire pour les étudiants.'),(36,'Les cauchemars de Lovecraft','978-2-226-208740-8','2014-01-01',9,'id-36-lovecraft.png',8.5,'C\'est avec L\'Appel de Cthulhu que l’écrivain H. P. Lovecraft signe l\'acte de naissance officiel d’une inquiétante mythologie... Ce que l’on sait moins, c’est qu’en plus de ce célèbre texte il a signé quantité d’autres nouvelles toutes aussi angoissantes et morbides, faisant de lui l’un des écrivains d’horreur les plus influents de son époque, au même titre qu’un Edgar Allan Poe. Retrouvez, compilées dans cet ouvrage, pas moins de 18 récits de Lovecraft – parmi lesquelles, outre L’Appel de Cthulhu, d’autres pépites de la littérature d’épouvante comme La Couleur tombée du ciel, L\'Abomination de Dunwich ou Je suis d\'ailleurs – illustrés par le noir et blanc redoutable du maître argentin de l’horreur : Horacio Lalia.'),(38,'la nuit des temps','9782258152854','2018-11-08',7,'id-38-nuit-des-temps.png',13.99,'Dans le grand silence blanc de l’Antarctique, les membres d’une mission des Expéditions polaires françaises s’activent à prélever des carottes de glace. L’épaisseur de la banquise atteint plus de 1 000 mètres, les couches les plus profondes remontant à 900 000 ans…\r\nC’est alors que l’incroyable intervient : les appareils sondeurs enregistrent un signal provenant du niveau du sol. Il y a un émetteur sous la glace. La nouvelle éclate comme une bombe et les journaux du monde entier rivalisent de gros titres : « Une ville sous la glace », « Un cœur sous la banquise », etc. Que vont découvrir les savants et les techniciens qui, venus du monde entier, forent la glace à la rencontre du mystère ?');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `writer`
--

LOCK TABLES `writer` WRITE;
/*!40000 ALTER TABLE `writer` DISABLE KEYS */;
INSERT INTO `writer` VALUES (1,'maxime','chattam','1976-02-19'),(2,'mary','higgins clark','1927-12-24'),(3,'agatha','christie','1890-09-15'),(4,'Dean Ray','Koontz','1945-07-09'),(5,'Lalit','Kumar','1957-01-01'),(6,'Sharad','Verma','1978-06-26'),(7,'René','Barjavel','1911-01-24'),(9,'Howard Phillips ','Lovecraft','1890-08-20');
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

-- Dump completed on 2021-11-16  0:42:23
