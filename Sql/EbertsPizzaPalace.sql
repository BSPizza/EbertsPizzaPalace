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



CREATE DATABASE IF NOT EXISTS EbertsPizzaPalace;
USE EbertsPizzaPalace;

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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
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
  PRIMARY KEY (`ID`),
  KEY `CategoryID` (`CategoryID`),
  CONSTRAINT `menues_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menues`
--

LOCK TABLES `menues` WRITE;
/*!40000 ALTER TABLE `menues` DISABLE KEYS */;
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
  PRIMARY KEY (`ID`),
  KEY `CategoryID` (`CategoryID`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
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
  CONSTRAINT `xdiscountorder_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`),
  CONSTRAINT `xdiscountorder_ibfk_1` FOREIGN KEY (`DiscountID`) REFERENCES `discounts` (`ID`)
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
  `MenueID` int(11) NOT NULL DEFAULT '0',
  `ProductID` int(11) NOT NULL DEFAULT '0',
  `Amount` int(11) DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  PRIMARY KEY (`MenueID`,`ProductID`),
  KEY `ProductID` (`ProductID`),
  CONSTRAINT `xmenueproduct_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`),
  CONSTRAINT `xmenueproduct_ibfk_1` FOREIGN KEY (`MenueID`) REFERENCES `menues` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xmenueproduct`
--

LOCK TABLES `xmenueproduct` WRITE;
/*!40000 ALTER TABLE `xmenueproduct` DISABLE KEYS */;
/*!40000 ALTER TABLE `xmenueproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `xproductingredient`
--

DROP TABLE IF EXISTS `xproductingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xproductingredient` (
  `ProductID` int(11) NOT NULL DEFAULT '0',
  `IngredientID` int(11) NOT NULL DEFAULT '0',
  `IsDeleted` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ProductID`,`IngredientID`),
  KEY `IngredientID` (`IngredientID`),
  CONSTRAINT `xproductingredient_ibfk_2` FOREIGN KEY (`IngredientID`) REFERENCES `ingredients` (`ID`),
  CONSTRAINT `xproductingredient_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `xproductingredient`
--

LOCK TABLES `xproductingredient` WRITE;
/*!40000 ALTER TABLE `xproductingredient` DISABLE KEYS */;
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

-- Dump completed on 2016-02-17  9:44:29
