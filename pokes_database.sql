-- MySQL dump 10.13  Distrib 5.6.24, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: pokes
-- ------------------------------------------------------
-- Server version	5.5.41-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pokes`
--

DROP TABLE IF EXISTS `pokes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poker_id` int(11) NOT NULL,
  `poked_id` int(11) NOT NULL,
  `poke_count` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pokes_users_idx` (`poker_id`),
  KEY `fk_pokes_users1_idx` (`poked_id`),
  CONSTRAINT `fk_pokes_users` FOREIGN KEY (`poker_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pokes_users1` FOREIGN KEY (`poked_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokes`
--

LOCK TABLES `pokes` WRITE;
/*!40000 ALTER TABLE `pokes` DISABLE KEYS */;
INSERT INTO `pokes` VALUES (1,1,2,4,'2015-09-27 21:10:09','2015-09-27 21:10:09'),(2,2,1,1,'2015-09-27 22:16:45','2015-09-27 22:16:45'),(3,2,3,1,'2015-09-27 22:16:53','2015-09-27 22:16:53'),(4,3,4,1,'2015-09-27 22:23:07','2015-09-27 22:23:07'),(5,7,8,2,'2015-09-27 22:45:59','2015-09-27 22:45:59'),(7,6,5,3,'2015-09-27 22:57:40','2015-09-27 22:57:40'),(8,6,7,1,'2015-09-27 22:57:46','2015-09-27 22:57:46'),(10,3,2,7,'2015-09-27 23:49:38','2015-09-27 23:49:38'),(11,2,6,3,'2015-09-27 23:53:28','2015-09-27 23:53:28');
/*!40000 ALTER TABLE `pokes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `total_pokes` int(11) DEFAULT NULL,
  `total_pokers` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ghostface Killa','Ghostface Killa','ghostface@gmail.com','wutang4life','1970-01-01',1,1,'2015-09-27 20:15:16','2015-09-27 20:15:16'),(2,'Raekwon','Raekwon the Chef','raekwon@gmail.com','number1chef','1971-02-02',11,2,'2015-09-27 20:16:42','2015-09-27 20:16:42'),(3,'Method Man','Method Man','methman@gmail.com','dollabills','1972-03-03',1,1,'2015-09-27 20:17:23','2015-09-27 20:17:23'),(4,'RZA','RZA the Founder','bestproduceralive@gmail.com','dontcomeforme','1973-04-04',1,1,'2015-09-27 20:18:54','2015-09-27 20:18:54'),(5,'Inspectah Deck','Inspectah Deck','inspectah@gmail.com','inspectahgadget','1974-05-05',3,2,'2015-09-27 20:19:50','2015-09-27 20:19:50'),(6,'Ol Dirty Bastard','Big Baby Jesus','oldirty@gmail.com','forthechildren','1975-06-06',3,1,'2015-09-27 20:20:46','2015-09-27 20:20:46'),(7,'Cappa Donna','Cappadonna','putitdown@gmail.com','capthedon','1976-07-07',1,1,'2015-09-27 20:22:08','2015-09-27 20:22:08'),(8,'U-God','U-God','ugod@gmail.com','worstnameever','1977-08-08',2,1,'2015-09-27 21:40:17','2015-09-27 21:40:17');
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

-- Dump completed on 2015-09-27 23:57:52
