-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1-log

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
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(10) unsigned NOT NULL,
  `transaction` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `symbol` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(11) NOT NULL,
  `price` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`,`datetime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (6,'BUY','2015-02-16 23:44:13','GOOG',10,5490.1000),(6,'BUY','2015-02-17 01:37:38','YHOO',5,222.1000),(6,'BUY','2015-02-17 01:47:17','YHOO',1,44.4200),(6,'BUY','2015-02-17 01:55:43','YHOO',5,222.1000),(6,'SELL','2015-02-17 01:58:23','YHOO',18,799.5600),(6,'BUY','2015-02-17 02:03:03','FREE',10000,1000.0000),(6,'SELL','2015-02-17 02:03:16','YHOO',18,799.5600),(8,'BUY','2015-02-16 23:44:02','MSFT',50,2193.5000),(8,'BUY','2015-02-17 01:34:28','YHOO',5,222.1000),(8,'SELL','2015-02-17 01:37:29','YHOO',5,222.1000),(8,'BUY','2015-02-17 01:44:12','YHOO',5,222.1000),(8,'BUY','2015-02-17 01:46:16','YHOO',1,44.4200),(8,'BUY','2015-02-17 01:52:00','YHOO',1,44.4200),(8,'BUY','2015-02-17 01:59:02','YHOO',18,799.5600),(8,'SELL','2015-02-17 02:02:04','MSFT',50,2193.5000),(8,'BUY','2015-02-17 13:50:54','AAPL',5,637.6500),(8,'SELL','2015-02-17 13:51:54','FREE',10000,1069.0000),(8,'SELL','2015-02-17 14:20:48','GOOG',10,5447.7500),(8,'BUY','2015-03-02 20:39:07','AAPL',10,1290.9000),(8,'BUY','2015-03-02 20:39:26','AAPL',10,1290.9000),(8,'BUY','2015-03-02 20:40:15','AAPL',20,2581.8000),(16,'BUY','2015-02-17 13:56:15','AAPL',2,255.0468),(16,'SELL','2015-02-17 14:26:09','AAPL',2,255.0870),(16,'BUY','2015-02-17 14:29:07','DOW ',1,49.6500),(16,'BUY','2015-02-17 14:29:10','DOW ',1,49.6500),(16,'BUY','2015-02-17 14:29:53','AAPL',10,1274.2100),(16,'BUY','2015-02-17 14:29:56','AAPL',10,1274.3500),(16,'SELL','2015-02-17 14:30:39','AAPL',20,2549.8200),(16,'SELL','2015-02-17 14:30:51','DOW',2,99.2800),(22,'BUY','2015-02-17 15:13:56','AAPL',5,638.3500),(22,'BUY','2015-02-17 15:16:15','GOOG',0,0.0000),(22,'BUY','2015-02-17 15:17:06','DOW ',5,247.6000),(22,'BUY','2015-02-17 15:17:09','DOW ',5,247.6000),(22,'BUY','2015-02-17 15:18:01','GOOG',10,5439.0000),(22,'SELL','2015-02-17 15:22:35','AAPL',5,639.5590),(22,'SELL','2015-02-17 15:22:53','GOOG',10,5443.0000),(22,'SELL','2015-02-17 15:23:09','DOW',10,495.2570),(22,'BUY','2015-02-17 15:28:25','YHOO',1,43.5900),(22,'SELL','2015-02-17 15:28:35','YHOO',1,43.5800),(23,'BUY','2015-02-24 17:24:20','YHOO',9,390.4200),(23,'BUY','2015-02-24 17:28:07','AAPL',5,660.8500),(23,'BUY','2015-02-24 17:29:20','YHOO',2,86.7600),(23,'SELL','2015-02-24 17:29:57','YHOO',11,477.1800);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `symbol` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(11) NOT NULL,
  PRIMARY KEY (`id`,`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` VALUES (1,'BAC',20),(2,'ZNGA',20),(3,'GRPN',20),(4,'PBR',20),(5,'CSCO',20),(6,'MSFT',20),(7,'GENE',20),(8,'AAPL',65),(9,'GOOG',20),(10,'AXP',20),(11,'SIRI',20),(12,'GE',20),(23,'AAPL',5);
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cash` float(65,4) unsigned NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'belindazeng','test1@mail.com','$1$50$oxJEDBo9KDStnrhtnSzir0',10000.0000),(2,'caesar','test2@mail.com','$1$50$GHABNWBNE/o4VL7QjmQ6x0',10000.0000),(3,'jharvard','test3@mail.com','$1$50$RX3wnAMNrGIbgzbRYrxM1/',10000.0000),(4,'malan','test4@mail.com','$1$50$lJS9HiGK6sphej8c4bnbX.',10000.0000),(5,'rob','test5@mail.com','$1$HA$l5llES7AEaz8ndmSo5Ig41',10000.0000),(6,'skroob','test6@mail.com','$1$50$euBi4ugiJmbpIbvTTfmfI.',10000.0000),(7,'zamyla','test7@mail.com','$1$50$uwfqB45ANW.9.6qaQ.DcF.',10000.0000),(8,'karan','karan_kishinani@hotmail.com','$1$xbNSEbii$hsGhqWuF5.XjgUWqP5o8r1',8960.4971),(9,'puja','test9@mail.com','$1$VbukW5qM$GwioHP3GOD9XdsE/ngEZN/',10000.0000),(10,'kusum','test10@mail.com','$1$RAUfyA24$YG3fPbqq4o677oJygv/Vs/',10000.0000),(11,'rajesh','test11@mail.com','$1$f08.Xjod$mOSSQaWvGZMwR59i2VMfS1',10000.0000),(12,'sunita','test12@mail.com','$1$ZIH.S/gJ$RDaafBnk00cmd4BRqmKa70',10000.0000),(13,'dada','dada@mail.com','$1$YGXuJXrw$EOtolZTDMVS5pNOAMBSqZ1',10000.0000),(15,'dada3','dada2@mail.com','$1$9LRvBXI9$CfiQbcFvJeF6oJnHNK8z9.',10000.0000),(16,'pujak','pujakishinani@hotmail.com','$1$mIWMho3w$SmaLcRmuYqlWFqqHgBbB/0',10001.2793),(22,'kusumi','kusumkishinani@hotmail.com','$1$9cvYfWQO$2pkzhZshfPhxL61MyYOOa0',10005.2578),(23,'a','a@a.a','$1$F1zA3qvX$5c.rPv9LTQ8YAobafaBgq.',9339.1504);
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

-- Dump completed on 2015-03-02 20:54:16
