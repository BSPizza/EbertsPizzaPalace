-- MySQL dump 10.13  Distrib 5.5.8, for Win32 (x86)
--
-- Host: localhost    Database: EbertsPizzaPalace
-- ------------------------------------------------------
-- Server version	5.5.8

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(60) DEFAULT NULL,
  `SuperCategoryID` int(11) DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `DeleteDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Getränke',0,'\0',NULL),(2,'Pizza/Pasta',0,'\0',NULL),(3,'Vegetarisches',0,'\0',NULL),(4,'Veganes',0,'\0',NULL),(5,'Fisch/Fleisch',0,'\0',NULL),(6,'Soda',1,'\0',NULL),(7,'Weine',1,'\0',NULL),(8,'Biere',1,'\0',NULL),(9,'Fruchtsäfte',1,'\0',NULL),(10,'Pizza',2,'\0',NULL),(11,'Pasta',2,'\0',NULL),(12,'Calzone',2,'\0',NULL),(13,'Salate',3,'\0',NULL),(14,'Gemüse',3,'\0',NULL),(15,'Hauptgerichte',3,'\0',NULL),(16,'Salate',4,'\0',NULL),(17,'Hauptgerichte',4,'\0',NULL),(18,'Dezentes',5,'\0',NULL),(19,'Deftiges',5,'\0',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(40) DEFAULT NULL,
  `LastName` varchar(40) DEFAULT NULL,
  `Street` varchar(80) DEFAULT NULL,
  `Zip` varchar(5) DEFAULT NULL,
  `City` varchar(40) DEFAULT NULL,
  `Login` varchar(20) DEFAULT NULL,
  `Password` varchar(256) DEFAULT NULL,
  `IsAdmin` bit(1) DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `DeleteDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discounts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(120) DEFAULT NULL,
  `Begin` date DEFAULT NULL,
  `End` date DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `DeleteDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts`
--

LOCK TABLES `discounts` WRITE;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `DeleteDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` VALUES (1,'Wasser','\0',NULL),(2,'Zusatzstoff E-Schießmichtot','\0',NULL),(3,'Zucker','\0',NULL),(4,'Aspartam','\0',NULL),(5,'Fett','\0',NULL),(6,'Kartoffln','\0',NULL),(7,'Knoblauch','\0',NULL),(8,'Basilikum','\0',NULL),(9,'Hefeteig','\0',NULL),(10,'Sauerteig','\0',NULL),(11,'Salz','\0',NULL),(12,'Fruchtsaftkonzentrat','\0',NULL),(13,'Kohlensaeure','\0',NULL),(14,'Konservierungsstoffe','\0',NULL),(15,'Nuesse','\0',NULL),(16,'Mehl','\0',NULL),(17,'','','2016-02-18'),(18,'','','2016-02-18'),(19,'Test2','','2016-02-18');
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `OrderID` (`OrderID`),
  CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menues`
--

DROP TABLE IF EXISTS `menues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menues` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Discount` float DEFAULT NULL,
  `DeleteDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CategoryID` (`CategoryID`),
  CONSTRAINT `menues_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menues`
--

LOCK TABLES `menues` WRITE;
/*!40000 ALTER TABLE `menues` DISABLE KEYS */;
INSERT INTO `menues` VALUES (1,'Große Omerta','\0',10,10,NULL),(2,'Kleine Omerta','\0',10,10,NULL),(3,'Pizza Party','\0',10,40,NULL),(4,'Bengalische BetrÃ¼ger','\0',10,-20,NULL);
/*!40000 ALTER TABLE `menues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` date DEFAULT NULL,
  `DesiredDeliveryTime` time DEFAULT NULL,
  `DesiredDeliveryDate` date DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CustomerID` (`CustomerID`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) DEFAULT NULL,
  `EnergyValue` int(11) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `DeleteDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `CategoryID` (`CategoryID`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Pizza Napoli',123,3.5,'\0',10,NULL),(2,'Pizza Bengala',150,6.5,'\0',10,NULL),(3,'Pizza Omerta',15000,12.5,'\0',10,NULL),(4,'Coca-Cola 0,33l',945,19.54,'\0',6,NULL),(5,'Rotwein 0,5l',1900,19.43,'\0',7,NULL),(6,'testSalat',0,94.9,'',13,'2016-02-18'),(7,'GibtsNicht',-5,33.49,'',17,'2016-02-18'),(8,'Gibts doch',147,12.54,'\0',17,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xdiscountorder`
--

DROP TABLE IF EXISTS `xdiscountorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xdiscountorder` (
  `DiscountID` int(11) NOT NULL DEFAULT '0',
  `OrderID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`DiscountID`,`OrderID`),
  KEY `OrderID` (`OrderID`),
  CONSTRAINT `xdiscountorder_ibfk_1` FOREIGN KEY (`DiscountID`) REFERENCES `discounts` (`ID`),
  CONSTRAINT `xdiscountorder_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xdiscountorder`
--

LOCK TABLES `xdiscountorder` WRITE;
/*!40000 ALTER TABLE `xdiscountorder` DISABLE KEYS */;
/*!40000 ALTER TABLE `xdiscountorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xmenueorder`
--

DROP TABLE IF EXISTS `xmenueorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xmenueorder` (
  `MenueID` int(11) NOT NULL DEFAULT '0',
  `OrderID` int(11) NOT NULL DEFAULT '0',
  `Amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`MenueID`,`OrderID`),
  KEY `OrderID` (`OrderID`),
  CONSTRAINT `xmenueorder_ibfk_1` FOREIGN KEY (`MenueID`) REFERENCES `menues` (`ID`),
  CONSTRAINT `xmenueorder_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xmenueorder`
--

LOCK TABLES `xmenueorder` WRITE;
/*!40000 ALTER TABLE `xmenueorder` DISABLE KEYS */;
/*!40000 ALTER TABLE `xmenueorder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xmenueproduct`
--

DROP TABLE IF EXISTS `xmenueproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xmenueproduct` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MenueID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `DeleteDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `MenueID` (`MenueID`),
  KEY `ProductID` (`ProductID`),
  CONSTRAINT `xmenueproduct_ibfk_1` FOREIGN KEY (`MenueID`) REFERENCES `menues` (`ID`),
  CONSTRAINT `xmenueproduct_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xmenueproduct`
--

LOCK TABLES `xmenueproduct` WRITE;
/*!40000 ALTER TABLE `xmenueproduct` DISABLE KEYS */;
INSERT INTO `xmenueproduct` VALUES (1,1,3,2,'\0',NULL),(2,1,1,1,'\0',NULL),(3,1,2,1,'\0',NULL),(4,2,3,1,'\0',NULL),(5,2,2,1,'\0',NULL),(6,3,1,1,'\0',NULL),(7,3,2,1,'\0',NULL),(8,3,3,1,'\0',NULL),(9,4,1,1,'','2016-02-18'),(10,4,3,1,'','2016-02-18'),(11,4,2,1,'\0',NULL),(12,4,3,1,'\0',NULL);
/*!40000 ALTER TABLE `xmenueproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xproductingredient`
--

DROP TABLE IF EXISTS `xproductingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xproductingredient` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductID` int(11) DEFAULT NULL,
  `IngredientID` int(11) DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `DeleteDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ProductID` (`ProductID`),
  KEY `IngredientID` (`IngredientID`),
  CONSTRAINT `xproductingredient_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`),
  CONSTRAINT `xproductingredient_ibfk_2` FOREIGN KEY (`IngredientID`) REFERENCES `ingredients` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xproductingredient`
--

LOCK TABLES `xproductingredient` WRITE;
/*!40000 ALTER TABLE `xproductingredient` DISABLE KEYS */;
INSERT INTO `xproductingredient` VALUES (13,4,1,'\0',NULL),(14,4,2,'\0',NULL),(15,4,3,'\0',NULL),(16,5,1,'\0',NULL),(17,5,3,'\0',NULL),(18,5,12,'\0',NULL),(19,6,4,'','2016-02-18'),(20,6,7,'','2016-02-18'),(21,6,8,'','2016-02-18'),(22,6,9,'','2016-02-18'),(23,6,11,'','2016-02-18'),(24,6,12,'','2016-02-18'),(25,6,13,'','2016-02-18'),(26,8,1,'','2016-02-18'),(27,8,2,'','2016-02-18'),(28,8,3,'','2016-02-18'),(29,8,4,'','2016-02-18'),(30,8,5,'','2016-02-18'),(31,8,6,'','2016-02-18'),(32,8,7,'','2016-02-18'),(33,8,8,'','2016-02-18'),(34,8,9,'','2016-02-18'),(35,8,10,'','2016-02-18'),(36,8,11,'','2016-02-18'),(37,8,12,'','2016-02-18'),(38,8,13,'','2016-02-18'),(39,8,14,'','2016-02-18'),(40,8,15,'','2016-02-18'),(41,8,16,'','2016-02-18'),(42,7,1,'','2016-02-18'),(43,7,3,'','2016-02-18'),(44,7,5,'','2016-02-18'),(45,7,6,'','2016-02-18'),(46,7,7,'','2016-02-18'),(47,7,8,'','2016-02-18'),(48,7,11,'','2016-02-18'),(49,7,15,'','2016-02-18'),(50,7,16,'','2016-02-18'),(51,7,1,'','2016-02-18'),(52,7,3,'','2016-02-18'),(53,7,5,'','2016-02-18'),(54,7,6,'','2016-02-18'),(55,7,7,'','2016-02-18'),(56,7,8,'','2016-02-18'),(57,7,11,'','2016-02-18'),(58,7,15,'','2016-02-18'),(59,7,16,'','2016-02-18'),(60,7,1,'','2016-02-18'),(61,7,3,'','2016-02-18'),(62,7,5,'','2016-02-18'),(63,7,6,'','2016-02-18'),(64,7,7,'','2016-02-18'),(65,7,8,'','2016-02-18'),(66,7,11,'','2016-02-18'),(67,7,15,'','2016-02-18'),(68,7,16,'','2016-02-18'),(69,8,7,'','2016-02-18'),(70,8,8,'','2016-02-18'),(71,8,9,'','2016-02-18'),(72,8,10,'','2016-02-18'),(73,8,15,'','2016-02-18'),(74,8,7,'','2016-02-18'),(75,8,8,'','2016-02-18'),(76,8,9,'','2016-02-18'),(77,8,10,'','2016-02-18'),(78,8,15,'','2016-02-18'),(79,8,7,'','2016-02-18'),(80,8,8,'','2016-02-18'),(81,8,9,'','2016-02-18'),(82,8,10,'','2016-02-18'),(83,8,15,'','2016-02-18'),(84,8,7,'','2016-02-18'),(85,8,8,'','2016-02-18'),(86,8,9,'','2016-02-18'),(87,8,10,'','2016-02-18'),(88,8,15,'','2016-02-18'),(89,8,7,'','2016-02-18'),(90,8,8,'','2016-02-18'),(91,8,10,'','2016-02-18'),(92,8,12,'','2016-02-18'),(93,8,7,'','2016-02-18'),(94,8,8,'','2016-02-18'),(95,8,10,'','2016-02-18'),(96,8,12,'','2016-02-18'),(97,8,7,'\0',NULL),(98,8,8,'\0',NULL),(99,8,10,'\0',NULL),(100,8,12,'\0',NULL);
/*!40000 ALTER TABLE `xproductingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xproductorder`
--

DROP TABLE IF EXISTS `xproductorder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xproductorder` (
  `ProductID` int(11) NOT NULL DEFAULT '0',
  `OrderID` int(11) NOT NULL DEFAULT '0',
  `Amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`ProductID`,`OrderID`),
  KEY `OrderID` (`OrderID`),
  CONSTRAINT `xproductorder_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`),
  CONSTRAINT `xproductorder_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xproductorder`
--

LOCK TABLES `xproductorder` WRITE;
/*!40000 ALTER TABLE `xproductorder` DISABLE KEYS */;
/*!40000 ALTER TABLE `xproductorder` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-18 14:48:53
