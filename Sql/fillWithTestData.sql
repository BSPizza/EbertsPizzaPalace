USE EbertsPizzaPalace;

LOCK TABLES `Categories` WRITE;
/*!40000 ALTER TABLE `Categories` DISABLE KEYS */;
INSERT INTO `Categories` VALUES (1,'Getraenke',0,'\0',NULL),(2,'Pizza/Pasta',0,'\0',NULL),(3,'Vegetarisches',0,'\0',NULL),(4,'Veganes',0,'\0',NULL),(5,'Fisch/Fleisch',0,'\0',NULL),(6,'Soda',1,'\0',NULL),(7,'Weine',1,'\0',NULL),(8,'Biere',1,'\0',NULL),(9,'Fruchtsaefte',1,'\0',NULL),(10,'Pizza',2,'\0',NULL),(11,'Pasta',2,'\0',NULL),(12,'Calzone',2,'\0',NULL),(13,'Salate',3,'\0',NULL),(14,'Gemuese',3,'\0',NULL),(15,'Hauptgerichte',3,'\0',NULL),(16,'Salate',4,'\0',NULL),(17,'Hauptgerichte',4,'\0',NULL),(18,'Dezentes',5,'\0',NULL),(19,'Deftiges',5,'\0',NULL);
/*!40000 ALTER TABLE `Categories` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `Customers` WRITE;
/*!40000 ALTER TABLE `Customers` DISABLE KEYS */;
INSERT INTO `Customers` VALUES (1,'Max','Mustermann','Musterstrasse 1','11111','Musterstadt','MaxMuster','$2a$07$R.gJb2U2N.FmZ4hPp1y2C.tC.cregA8EoLsCZaoQEUxC74siFsVWu','',NULL,NULL),(2,'Test','User','Teststrasse 12','00000','Debug-City','tmpUser','$2a$07$R.gJb2U2N.FmZ4hPp1y2C.ApHweIsOkUzvPl6goG3tj0g3R7XhFJ2',NULL,NULL,NULL);
/*!40000 ALTER TABLE `Customers` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `Discounts` WRITE;
/*!40000 ALTER TABLE `Discounts` DISABLE KEYS */;
INSERT INTO `Discounts` VALUES (1,'Dummy','2016-02-18','2016-02-18',20,'','2016-02-18'),(2,'Vorbesteller','0000-00-00','0000-00-00',50,'\0',NULL);
/*!40000 ALTER TABLE `Discounts` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `Ingredients` WRITE;
/*!40000 ALTER TABLE `Ingredients` DISABLE KEYS */;
INSERT INTO `Ingredients` VALUES (1,'Wasser','\0',NULL),(2,'Zusatzstoff E-Schießmichtot','\0',NULL),(3,'Zucker','\0',NULL),(4,'Aspartam','\0',NULL),(5,'Fett','\0',NULL),(6,'Kartoffln','\0',NULL),(7,'Knoblauch','\0',NULL),(8,'Basilikum','\0',NULL),(9,'Hefeteig','\0',NULL),(10,'Sauerteig','\0',NULL),(11,'Salz','\0',NULL),(12,'Fruchtsaftkonzentrat','\0',NULL),(13,'Kohlensaeure','\0',NULL),(14,'Konservierungsstoffe','\0',NULL),(15,'Nuesse','\0',NULL),(16,'Mehl','\0',NULL),(17,'','','2016-02-18'),(18,'','','2016-02-18'),(19,'Test2','','2016-02-18');
/*!40000 ALTER TABLE `Ingredients` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;
INSERT INTO `Orders` VALUES (2,'2016-02-28','10:04:41','2016-02-28',2),(3,'2016-02-28','10:05:02','2016-02-28',2),(4,'2016-02-28','10:05:02','2016-02-28',2),(5,'2016-02-28','10:05:03','2016-02-28',2),(6,'2016-02-28','10:05:03','2016-02-28',2),(7,'2016-02-28','10:05:04','2016-02-28',2),(8,'2016-02-28','10:05:04','2016-02-28',2),(9,'2016-02-28','10:05:04','2016-02-28',2),(10,'2016-02-28','10:05:05','2016-02-28',2),(11,'2016-02-28','10:05:05','2016-02-28',2),(12,'2016-02-28','10:05:06','2016-02-28',2),(13,'2016-02-28','10:05:06','2016-02-28',2);
/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `Invoices` WRITE;
/*!40000 ALTER TABLE `Invoices` DISABLE KEYS */;
INSERT INTO `Invoices` VALUES (1,2,400),(2,3,100),(3,4,124),(4,5,241),(5,6,312),(6,7,12),(7,8,12),(8,9,12),(9,10,45),(10,11,14),(11,12,24),(12,13,147);
/*!40000 ALTER TABLE `Invoices` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `Menues` WRITE;
/*!40000 ALTER TABLE `Menues` DISABLE KEYS */;
INSERT INTO `Menues` VALUES (1,'Große Omerta','',10,10,'2016-02-28'),(2,'Kleine Omerta','',10,10,'2016-02-28'),(3,'Pizza Party','',10,40,'2016-02-28'),(4,'Bengalische BetrÃ¼ger','',10,-20,'2016-02-28');
/*!40000 ALTER TABLE `Menues` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `Products` WRITE;
/*!40000 ALTER TABLE `Products` DISABLE KEYS */;
INSERT INTO `Products` VALUES (1,'Pizza Napoli',123,3.5,'',10,'2016-02-28'),(2,'Pizza Bengala',150,6.5,'',10,'2016-02-28'),(3,'Pizza Omerta',15000,12.5,'',10,'2016-02-28'),(4,'Coca-Cola 0,33l',945,19.54,'',6,'2016-02-28'),(5,'Rotwein 0,5l',1900,19.43,'',7,'2016-02-28'),(6,'testSalat',0,94.9,'',13,'2016-02-18'),(7,'GibtsNicht',-5,33.49,'',17,'2016-02-18'),(8,'Gibts doch',147,12.54,'',17,'2016-02-28'),(9,'Orangensaft',130,4.8,'\0',9,NULL),(10,'Cola - Light 0,5l',0,5.8,'\0',6,NULL),(11,'Rotwein 0,5l',250,13.8,'\0',7,NULL),(12,'Weizen 0,3l',134,3.89,'\0',8,NULL),(13,'Pizza Napoli',456,12.8,'\0',10,NULL),(14,'Pasta Desasta',3541,12.48,'\0',11,NULL),(15,'Saure Calzone',561,13.67,'\0',12,NULL),(16,'Kartoffelsalat mit Ei und Gurke',487,6.74,'\0',13,NULL),(17,'Brokoli in Sahne',999,11.23,'\0',14,NULL),(18,'Vegetarisches Fischfilettofu',412,13.37,'\0',15,NULL),(19,'Knosilikum',0,11.89,'\0',16,NULL),(20,'Wassersuppe',0,7.81,'\0',17,NULL),(21,'Lachsfilet an Sauerampfer',312,14.92,'\0',18,NULL),(22,'Schweinehaxe im Merrettichmantel',641,15.17,'\0',19,NULL);
/*!40000 ALTER TABLE `Products` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `xDiscountOrder` WRITE;
/*!40000 ALTER TABLE `xDiscountOrder` DISABLE KEYS */;
/*!40000 ALTER TABLE `xDiscountOrder` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `xMenueOrder` WRITE;
/*!40000 ALTER TABLE `xMenueOrder` DISABLE KEYS */;
/*!40000 ALTER TABLE `xMenueOrder` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `xMenueProduct` WRITE;
/*!40000 ALTER TABLE `xMenueProduct` DISABLE KEYS */;
INSERT INTO `xMenueProduct` VALUES (1,1,3,2,'','2016-02-28'),(2,1,1,1,'','2016-02-28'),(3,1,2,1,'','2016-02-28'),(4,2,3,1,'','2016-02-28'),(5,2,2,1,'','2016-02-28'),(6,3,1,1,'','2016-02-28'),(7,3,2,1,'','2016-02-28'),(8,3,3,1,'','2016-02-28'),(9,4,1,1,'','2016-02-28'),(10,4,3,1,'','2016-02-28'),(11,4,2,1,'','2016-02-28'),(12,4,3,1,'','2016-02-28');
/*!40000 ALTER TABLE `xMenueProduct` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `xProductIngredient` WRITE;
/*!40000 ALTER TABLE `xProductIngredient` DISABLE KEYS */;
INSERT INTO `xProductIngredient` VALUES (13,4,1,'','2016-02-28'),(14,4,2,'','2016-02-28'),(15,4,3,'','2016-02-28'),(16,5,1,'','2016-02-28'),(17,5,3,'','2016-02-28'),(18,5,12,'','2016-02-28'),(19,6,4,'','2016-02-18'),(20,6,7,'','2016-02-18'),(21,6,8,'','2016-02-18'),(22,6,9,'','2016-02-18'),(23,6,11,'','2016-02-18'),(24,6,12,'','2016-02-18'),(25,6,13,'','2016-02-18'),(26,8,1,'','2016-02-28'),(27,8,2,'','2016-02-28'),(28,8,3,'','2016-02-28'),(29,8,4,'','2016-02-28'),(30,8,5,'','2016-02-28'),(31,8,6,'','2016-02-28'),(32,8,7,'','2016-02-28'),(33,8,8,'','2016-02-28'),(34,8,9,'','2016-02-28'),(35,8,10,'','2016-02-28'),(36,8,11,'','2016-02-28'),(37,8,12,'','2016-02-28'),(38,8,13,'','2016-02-28'),(39,8,14,'','2016-02-28'),(40,8,15,'','2016-02-28'),(41,8,16,'','2016-02-28'),(42,7,1,'','2016-02-18'),(43,7,3,'','2016-02-18'),(44,7,5,'','2016-02-18'),(45,7,6,'','2016-02-18'),(46,7,7,'','2016-02-18'),(47,7,8,'','2016-02-18'),(48,7,11,'','2016-02-18'),(49,7,15,'','2016-02-18'),(50,7,16,'','2016-02-18'),(51,7,1,'','2016-02-18'),(52,7,3,'','2016-02-18'),(53,7,5,'','2016-02-18'),(54,7,6,'','2016-02-18'),(55,7,7,'','2016-02-18'),(56,7,8,'','2016-02-18'),(57,7,11,'','2016-02-18'),(58,7,15,'','2016-02-18'),(59,7,16,'','2016-02-18'),(60,7,1,'','2016-02-18'),(61,7,3,'','2016-02-18'),(62,7,5,'','2016-02-18'),(63,7,6,'','2016-02-18'),(64,7,7,'','2016-02-18'),(65,7,8,'','2016-02-18'),(66,7,11,'','2016-02-18'),(67,7,15,'','2016-02-18'),(68,7,16,'','2016-02-18'),(69,8,7,'','2016-02-28'),(70,8,8,'','2016-02-28'),(71,8,9,'','2016-02-28'),(72,8,10,'','2016-02-28'),(73,8,15,'','2016-02-28'),(74,8,7,'','2016-02-28'),(75,8,8,'','2016-02-28'),(76,8,9,'','2016-02-28'),(77,8,10,'','2016-02-28'),(78,8,15,'','2016-02-28'),(79,8,7,'','2016-02-28'),(80,8,8,'','2016-02-28'),(81,8,9,'','2016-02-28'),(82,8,10,'','2016-02-28'),(83,8,15,'','2016-02-28'),(84,8,7,'','2016-02-28'),(85,8,8,'','2016-02-28'),(86,8,9,'','2016-02-28'),(87,8,10,'','2016-02-28'),(88,8,15,'','2016-02-28'),(89,8,7,'','2016-02-28'),(90,8,8,'','2016-02-28'),(91,8,10,'','2016-02-28'),(92,8,12,'','2016-02-28'),(93,8,7,'','2016-02-28'),(94,8,8,'','2016-02-28'),(95,8,10,'','2016-02-28'),(96,8,12,'','2016-02-28'),(97,8,7,'','2016-02-28'),(98,8,8,'','2016-02-28'),(99,8,10,'','2016-02-28'),(100,8,12,'','2016-02-28'),(101,11,1,'\0',NULL),(102,11,3,'\0',NULL),(103,12,1,'\0',NULL),(104,12,3,'\0',NULL),(105,13,7,'\0',NULL),(106,13,8,'\0',NULL),(107,13,9,'\0',NULL),(108,13,11,'\0',NULL),(109,13,16,'\0',NULL),(110,14,5,'\0',NULL),(111,14,9,'\0',NULL),(112,14,16,'\0',NULL),(113,15,3,'\0',NULL),(114,15,5,'\0',NULL),(115,15,7,'\0',NULL),(116,15,8,'\0',NULL),(117,15,10,'\0',NULL),(118,15,11,'\0',NULL),(119,15,16,'\0',NULL),(120,16,6,'\0',NULL),(121,16,7,'\0',NULL),(122,16,8,'\0',NULL),(123,16,11,'\0',NULL),(124,17,1,'\0',NULL),(125,18,3,'\0',NULL),(126,18,7,'\0',NULL),(127,18,8,'\0',NULL),(128,19,7,'\0',NULL),(129,19,8,'\0',NULL),(130,20,1,'\0',NULL);
/*!40000 ALTER TABLE `xProductIngredient` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `xProductOrder` WRITE;
/*!40000 ALTER TABLE `xProductOrder` DISABLE KEYS */;
INSERT INTO `xProductOrder` VALUES (9,2,3),(10,2,1),(10,3,2),(10,5,1),(10,7,1),(10,10,1),(10,12,1),(11,3,2),(11,6,1),(11,8,1),(11,9,4),(11,11,1),(11,12,4),(11,13,1),(12,4,1),(13,2,1),(13,3,2),(15,6,1),(15,8,1),(15,11,1),(15,13,1),(16,2,2),(16,3,1),(16,6,2),(16,8,2),(16,11,2),(16,13,2),(17,3,1),(17,5,1),(17,7,1),(18,2,1);
/*!40000 ALTER TABLE `xProductOrder` ENABLE KEYS */;
UNLOCK TABLES;
