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

DROP DATABASE IF EXISTS EbertsPizzaPalace;
CREATE DATABASE EbertsPizzaPalace;
USE EbertsPizzaPalace;

--
-- Table structure for table `Categories`
--

DROP TABLE IF EXISTS `Categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(60) DEFAULT NULL,
  `SuperCategoryID` int(11) DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `DeleteDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Customers`
--

DROP TABLE IF EXISTS `Customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Customers` (
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
-- Table structure for table `Discounts`
--

DROP TABLE IF EXISTS `Discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Discounts` (
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
-- Table structure for table `Ingredients`
--

DROP TABLE IF EXISTS `Ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ingredients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(80) DEFAULT NULL,
  `IsDeleted` bit(1) DEFAULT NULL,
  `DeleteDate` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Invoices`
--

DROP TABLE IF EXISTS `Invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Invoices` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) DEFAULT NULL,
  `TotalPrice` float DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `OrderID` (`OrderID`),
  CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `Menues`
--

DROP TABLE IF EXISTS `Menues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Menues` (
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
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Orders` (
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
-- Table structure for table `Products`
--

DROP TABLE IF EXISTS `Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Products` (
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
-- Table structure for table `xDiscountOrder`
--

DROP TABLE IF EXISTS `xDiscountOrder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xDiscountOrder` (
  `DiscountID` int(11) NOT NULL DEFAULT '0',
  `OrderID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`DiscountID`,`OrderID`),
  KEY `OrderID` (`OrderID`),
  CONSTRAINT `xdiscountorder_ibfk_1` FOREIGN KEY (`DiscountID`) REFERENCES `discounts` (`ID`),
  CONSTRAINT `xdiscountorder_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `xMenueOrder`
--

DROP TABLE IF EXISTS `xMenueOrder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xMenueOrder` (
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
-- Table structure for table `xMenueProduct`
--

DROP TABLE IF EXISTS `xMenueProduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xMenueProduct` (
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
-- Table structure for table `xProductIngredient`
--

DROP TABLE IF EXISTS `xProductIngredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xProductIngredient` (
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
-- Table structure for table `xProductOrder`
--

DROP TABLE IF EXISTS `xProductOrder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `xProductOrder` (
  `ProductID` int(11) NOT NULL DEFAULT '0',
  `OrderID` int(11) NOT NULL DEFAULT '0',
  `Amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`ProductID`,`OrderID`),
  KEY `OrderID` (`OrderID`),
  CONSTRAINT `xproductorder_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ID`),
  CONSTRAINT `xproductorder_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

-- Dump completed on 2016-02-19 12:12:23
