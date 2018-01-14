-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

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
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `BankName` varchar(100) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banks`
--

LOCK TABLES `banks` WRITE;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `budgetdepts`
--

DROP TABLE IF EXISTS `budgetdepts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `budgetdepts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `budgetdepts`
--

LOCK TABLES `budgetdepts` WRITE;
/*!40000 ALTER TABLE `budgetdepts` DISABLE KEYS */;
INSERT INTO `budgetdepts` VALUES (1,'budgetdept','2018-01-07 14:45:16','2018-01-07 14:45:16','Brenda',NULL,'Pasadas',NULL,1,1,'bd@email.com','$2y$10$JreMhPgmD1/Dra0KkSJVE.riAMsQmE8FwYKYTpY1ZqPzUVNUrpyvS','ZErfrMOo6o');
/*!40000 ALTER TABLE `budgetdepts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientidutils`
--

DROP TABLE IF EXISTS `clientidutils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientidutils` (
  `strClientIDUtil` varchar(100) NOT NULL,
  PRIMARY KEY (`strClientIDUtil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientidutils`
--

LOCK TABLES `clientidutils` WRITE;
/*!40000 ALTER TABLE `clientidutils` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientidutils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `representative` varchar(100) NOT NULL,
  `position` varchar(30) NOT NULL,
  `TIN` varchar(20) NOT NULL,
  `contactno` varchar(13) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `prov` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companyutils`
--

DROP TABLE IF EXISTS `companyutils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companyutils` (
  `intCompanyUtilID` int(10) NOT NULL AUTO_INCREMENT,
  `strCompanyName` varchar(100) NOT NULL,
  `strCompanyTIN` varchar(20) NOT NULL,
  `strCompanyAddress` varchar(100) NOT NULL,
  `strCompanyEmail` varchar(50) NOT NULL,
  `strGeneralManagerName` varchar(100) NOT NULL,
  `strCompanyLogo` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`intCompanyUtilID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companyutils`
--

LOCK TABLES `companyutils` WRITE;
/*!40000 ALTER TABLE `companyutils` DISABLE KEYS */;
/*!40000 ALTER TABLE `companyutils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contractidutils`
--

DROP TABLE IF EXISTS `contractidutils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contractidutils` (
  `strContractIDUtil` varchar(100) NOT NULL,
  PRIMARY KEY (`strContractIDUtil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contractidutils`
--

LOCK TABLES `contractidutils` WRITE;
/*!40000 ALTER TABLE `contractidutils` DISABLE KEYS */;
/*!40000 ALTER TABLE `contractidutils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliverytrucks`
--

DROP TABLE IF EXISTS `deliverytrucks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deliverytrucks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `DeliTruckPlateNo` varchar(8) NOT NULL,
  `DeliTruckVINNo` varchar(17) NOT NULL,
  `DeliTruckCapacity` double NOT NULL,
  `DeliTruckGrossWeight` double NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliverytrucks`
--

LOCK TABLES `deliverytrucks` WRITE;
/*!40000 ALTER TABLE `deliverytrucks` DISABLE KEYS */;
/*!40000 ALTER TABLE `deliverytrucks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detailuoms`
--

DROP TABLE IF EXISTS `detailuoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detailuoms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `GroupUOMID` int(10) NOT NULL,
  `DetailUOMText` varchar(50) NOT NULL,
  `UOMUnitSymbol` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblDetailUOM_tblGroupUOM1_idx` (`GroupUOMID`),
  CONSTRAINT `fk_tblDetailUOM_tblGroupUOM1` FOREIGN KEY (`GroupUOMID`) REFERENCES `groupuoms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detailuoms`
--

LOCK TABLES `detailuoms` WRITE;
/*!40000 ALTER TABLE `detailuoms` DISABLE KEYS */;
/*!40000 ALTER TABLE `detailuoms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downdetails`
--

DROP TABLE IF EXISTS `downdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DownID` int(11) NOT NULL,
  `initialtax` decimal(11,2) NOT NULL,
  `taxValue` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbldowndetail_tbldownpayment1_idx` (`DownID`),
  CONSTRAINT `fk_tbldowndetail_tbldownpayment1` FOREIGN KEY (`DownID`) REFERENCES `downpayments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downdetails`
--

LOCK TABLES `downdetails` WRITE;
/*!40000 ALTER TABLE `downdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `downdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downpayments`
--

DROP TABLE IF EXISTS `downpayments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downpayments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(11,2) NOT NULL,
  `status` int(11) NOT NULL,
  `TaxID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbldownpayment_tbltax1_idx` (`TaxID`),
  CONSTRAINT `fk_tbldownpayment_tbltax1` FOREIGN KEY (`TaxID`) REFERENCES `taxes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downpayments`
--

LOCK TABLES `downpayments` WRITE;
/*!40000 ALTER TABLE `downpayments` DISABLE KEYS */;
/*!40000 ALTER TABLE `downpayments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empidutils`
--

DROP TABLE IF EXISTS `empidutils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empidutils` (
  `strEmpIDUtil` varchar(100) NOT NULL,
  PRIMARY KEY (`strEmpIDUtil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empidutils`
--

LOCK TABLES `empidutils` WRITE;
/*!40000 ALTER TABLE `empidutils` DISABLE KEYS */;
/*!40000 ALTER TABLE `empidutils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` varchar(100) NOT NULL,
  `EmpLname` varchar(50) NOT NULL,
  `EmpMname` varchar(50) DEFAULT NULL,
  `EmpFname` varchar(50) NOT NULL,
  `EmpContactNo` varchar(16) NOT NULL,
  `EmpCity` varchar(50) NOT NULL,
  `EmpProvince` varchar(50) NOT NULL,
  `EmpEmail` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empspecs`
--

DROP TABLE IF EXISTS `empspecs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empspecs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `EmpID` varchar(100) NOT NULL,
  `SpecID` int(10) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblempspec_tblspecialization1_idx` (`SpecID`),
  KEY `fk_tblempspec_tblEmployee1_idx` (`EmpID`),
  CONSTRAINT `fk_tblempspec_tblEmployee1` FOREIGN KEY (`EmpID`) REFERENCES `employees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblempspec_tblspecialization1` FOREIGN KEY (`SpecID`) REFERENCES `specializations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empspecs`
--

LOCK TABLES `empspecs` WRITE;
/*!40000 ALTER TABLE `empspecs` DISABLE KEYS */;
/*!40000 ALTER TABLE `empspecs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipments`
--

DROP TABLE IF EXISTS `equipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `TypeID` int(10) NOT NULL,
  `EquipName` varchar(30) NOT NULL,
  `EquipLeaser` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `EquipKey` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  `EquipPrice` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `EquipKey_UNIQUE` (`EquipKey`),
  KEY `fk_tblEquipment_tblEquipType1_idx` (`TypeID`),
  CONSTRAINT `fk_tblEquipment_tblEquipType1` FOREIGN KEY (`TypeID`) REFERENCES `equiptypes` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipments`
--

LOCK TABLES `equipments` WRITE;
/*!40000 ALTER TABLE `equipments` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equiptypes`
--

DROP TABLE IF EXISTS `equiptypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equiptypes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `EquipTypeDesc` varchar(40) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equiptypes`
--

LOCK TABLES `equiptypes` WRITE;
/*!40000 ALTER TABLE `equiptypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `equiptypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fees` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `FeeDesc` varchar(100) NOT NULL,
  `FeeValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fees`
--

LOCK TABLES `fees` WRITE;
/*!40000 ALTER TABLE `fees` DISABLE KEYS */;
/*!40000 ALTER TABLE `fees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groupuoms`
--

DROP TABLE IF EXISTS `groupuoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groupuoms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `GroupUOMText` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupuoms`
--

LOCK TABLES `groupuoms` WRITE;
/*!40000 ALTER TABLE `groupuoms` DISABLE KEYS */;
/*!40000 ALTER TABLE `groupuoms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incurrences`
--

DROP TABLE IF EXISTS `incurrences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incurrences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` text NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `user` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblincurrences_tbltype1_idx` (`type`),
  CONSTRAINT `fk_tblincurrences_tbltype1` FOREIGN KEY (`type`) REFERENCES `types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incurrences`
--

LOCK TABLES `incurrences` WRITE;
/*!40000 ALTER TABLE `incurrences` DISABLE KEYS */;
/*!40000 ALTER TABLE `incurrences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoiceidutils`
--

DROP TABLE IF EXISTS `invoiceidutils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoiceidutils` (
  `strInvoiceIDUtil` varchar(100) NOT NULL,
  PRIMARY KEY (`strInvoiceIDUtil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoiceidutils`
--

LOCK TABLES `invoiceidutils` WRITE;
/*!40000 ALTER TABLE `invoiceidutils` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoiceidutils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materialclasses`
--

DROP TABLE IF EXISTS `materialclasses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materialclasses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `MatTypeID` int(10) NOT NULL,
  `MatClassName` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblMaterialClass_tblMaterialType1_idx` (`MatTypeID`),
  CONSTRAINT `fk_tblMaterialClass_tblMaterialType1` FOREIGN KEY (`MatTypeID`) REFERENCES `materialtypes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materialclasses`
--

LOCK TABLES `materialclasses` WRITE;
/*!40000 ALTER TABLE `materialclasses` DISABLE KEYS */;
/*!40000 ALTER TABLE `materialclasses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materials` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `MatClassID` int(10) NOT NULL,
  `MatUOM` int(10) NOT NULL,
  `MaterialName` varchar(50) NOT NULL,
  `MaterialBrand` varchar(50) DEFAULT NULL,
  `MaterialSize` varchar(15) DEFAULT NULL,
  `MaterialColor` varchar(30) DEFAULT NULL,
  `MaterialDimension` varchar(40) DEFAULT NULL,
  `MaterialUnitPrice` decimal(11,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblMaterial_tblDetailUOM1_idx` (`MatUOM`),
  KEY `fk_tblMaterial_tblMaterialClass1_idx` (`MatClassID`),
  CONSTRAINT `fk_tblMaterial_tblDetailUOM1` FOREIGN KEY (`MatUOM`) REFERENCES `detailuoms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblMaterial_tblMaterialClass1` FOREIGN KEY (`MatClassID`) REFERENCES `materialclasses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materialtypes`
--

DROP TABLE IF EXISTS `materialtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materialtypes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `MatTypeName` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materialtypes`
--

LOCK TABLES `materialtypes` WRITE;
/*!40000 ALTER TABLE `materialtypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `materialtypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `miscellaneous`
--

DROP TABLE IF EXISTS `miscellaneous`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `miscellaneous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MiscDesc` varchar(100) NOT NULL,
  `MiscValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `miscellaneous`
--

LOCK TABLES `miscellaneous` WRITE;
/*!40000 ALTER TABLE `miscellaneous` DISABLE KEYS */;
/*!40000 ALTER TABLE `miscellaneous` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operations`
--

DROP TABLE IF EXISTS `operations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `operations_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operations`
--

LOCK TABLES `operations` WRITE;
/*!40000 ALTER TABLE `operations` DISABLE KEYS */;
INSERT INTO `operations` VALUES (1,'operations','Criszel',NULL,'Murillo',NULL,'o@email.com','$2y$10$b6lU.4acSEax3edru5FpAOtFzRkwuKMlurcdhOM0v1JjLLyzC4OCi',1,1,'j3dr6LDGeb','2018-01-07 14:45:16','2018-01-07 14:45:16');
/*!40000 ALTER TABLE `operations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oridutils`
--

DROP TABLE IF EXISTS `oridutils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oridutils` (
  `strOrIDUtil` varchar(100) NOT NULL,
  PRIMARY KEY (`strOrIDUtil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oridutils`
--

LOCK TABLES `oridutils` WRITE;
/*!40000 ALTER TABLE `oridutils` DISABLE KEYS */;
/*!40000 ALTER TABLE `oridutils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentmodes`
--

DROP TABLE IF EXISTS `paymentmodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paymentmodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ModeValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentmodes`
--

LOCK TABLES `paymentmodes` WRITE;
/*!40000 ALTER TABLE `paymentmodes` DISABLE KEYS */;
/*!40000 ALTER TABLE `paymentmodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `OrID` varchar(100) NOT NULL,
  `InvID` varchar(100) NOT NULL,
  `amountpaid` decimal(11,2) NOT NULL,
  `date` date NOT NULL,
  `change` decimal(11,2) NOT NULL,
  `remarks` text,
  PRIMARY KEY (`OrID`),
  KEY `fk_tblpayment_tblserviceinvoiceheader1_idx` (`InvID`),
  CONSTRAINT `fk_tblpayment_tblserviceinvoiceheader1` FOREIGN KEY (`InvID`) REFERENCES `serviceinvoiceheaders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `progressbills`
--

DROP TABLE IF EXISTS `progressbills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `progressbills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `progress` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `TaxID` int(11) NOT NULL,
  `RecID` int(11) NOT NULL,
  `RetID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblprogressbill_tbltax1_idx` (`TaxID`),
  KEY `fk_tblprogressbill_tblrecoupment1_idx` (`RecID`),
  KEY `fk_tblprogressbill_tblretention1_idx` (`RetID`),
  CONSTRAINT `fk_tblprogressbill_tblrecoupment1` FOREIGN KEY (`RecID`) REFERENCES `recoupments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblprogressbill_tblretention1` FOREIGN KEY (`RetID`) REFERENCES `retentions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblprogressbill_tbltax1` FOREIGN KEY (`TaxID`) REFERENCES `taxes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `progressbills`
--

LOCK TABLES `progressbills` WRITE;
/*!40000 ALTER TABLE `progressbills` DISABLE KEYS */;
/*!40000 ALTER TABLE `progressbills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `progressdetails`
--

DROP TABLE IF EXISTS `progressdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `progressdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recValue` decimal(11,2) NOT NULL,
  `retValue` decimal(11,2) NOT NULL,
  `initial` decimal(11,2) NOT NULL,
  `initialtax` decimal(11,2) NOT NULL,
  `taxValue` decimal(11,2) NOT NULL,
  `PB_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblprogressdetail_tblprogressbill1_idx` (`PB_ID`),
  CONSTRAINT `fk_tblprogressdetail_tblprogressbill1` FOREIGN KEY (`PB_ID`) REFERENCES `progressbills` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `progressdetails`
--

LOCK TABLES `progressdetails` WRITE;
/*!40000 ALTER TABLE `progressdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `progressdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projectmanagers`
--

DROP TABLE IF EXISTS `projectmanagers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projectmanagers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `projectmanager_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projectmanagers`
--

LOCK TABLES `projectmanagers` WRITE;
/*!40000 ALTER TABLE `projectmanagers` DISABLE KEYS */;
INSERT INTO `projectmanagers` VALUES (1,'pm','pm@email.com','$2y$10$cNJFOdPfhMiS/UVInk5ws.lm09YEBceMByXmPSF0LgzNoK4XUHaH6','Ambrosio',NULL,'Cruz',NULL,1,1,'D0zun3FFBm','2018-01-07 14:45:17','2018-01-07 14:45:17');
/*!40000 ALTER TABLE `projectmanagers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `RateDesc` varchar(50) NOT NULL,
  `RateValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recoupments`
--

DROP TABLE IF EXISTS `recoupments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recoupments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `RecValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recoupments`
--

LOCK TABLES `recoupments` WRITE;
/*!40000 ALTER TABLE `recoupments` DISABLE KEYS */;
/*!40000 ALTER TABLE `recoupments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retentions`
--

DROP TABLE IF EXISTS `retentions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retentions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `RetValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retentions`
--

LOCK TABLES `retentions` WRITE;
/*!40000 ALTER TABLE `retentions` DISABLE KEYS */;
/*!40000 ALTER TABLE `retentions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servdeliveries`
--

DROP TABLE IF EXISTS `servdeliveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servdeliveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tblservdeliverycol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servdeliveries`
--

LOCK TABLES `servdeliveries` WRITE;
/*!40000 ALTER TABLE `servdeliveries` DISABLE KEYS */;
/*!40000 ALTER TABLE `servdeliveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servequips`
--

DROP TABLE IF EXISTS `servequips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servequips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServID` int(10) NOT NULL,
  `EquipID` int(10) NOT NULL,
  `todelete` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblservequip_tblservicesoffered1_idx` (`ServID`),
  KEY `fk_tblservequip_tblequipment1_idx` (`EquipID`),
  CONSTRAINT `fk_tblservequip_tblequipment1` FOREIGN KEY (`EquipID`) REFERENCES `equipments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblservequip_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `servicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servequips`
--

LOCK TABLES `servequips` WRITE;
/*!40000 ALTER TABLE `servequips` DISABLE KEYS */;
/*!40000 ALTER TABLE `servequips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servfees`
--

DROP TABLE IF EXISTS `servfees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servfees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServID` int(10) NOT NULL,
  `FeeID` int(11) NOT NULL,
  `todelete` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblservfee_tblservicesoffered1_idx` (`ServID`),
  KEY `fk_tblservfee_tblfee1_idx` (`FeeID`),
  CONSTRAINT `fk_tblservfee_tblfee1` FOREIGN KEY (`FeeID`) REFERENCES `fees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblservfee_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `servicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servfees`
--

LOCK TABLES `servfees` WRITE;
/*!40000 ALTER TABLE `servfees` DISABLE KEYS */;
/*!40000 ALTER TABLE `servfees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serviceinvoicedetails`
--

DROP TABLE IF EXISTS `serviceinvoicedetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serviceinvoicedetails` (
  `InvID` varchar(100) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  KEY `fk_tblserviceinvoicedetail_tblserviceinvoiceheader1_idx` (`InvID`),
  CONSTRAINT `fk_tblserviceinvoicedetail_tblserviceinvoiceheader1` FOREIGN KEY (`InvID`) REFERENCES `serviceinvoiceheaders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviceinvoicedetails`
--

LOCK TABLES `serviceinvoicedetails` WRITE;
/*!40000 ALTER TABLE `serviceinvoicedetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `serviceinvoicedetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serviceinvoiceheaders`
--

DROP TABLE IF EXISTS `serviceinvoiceheaders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `serviceinvoiceheaders` (
  `id` varchar(100) NOT NULL,
  `date` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `duedate` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviceinvoiceheaders`
--

LOCK TABLES `serviceinvoiceheaders` WRITE;
/*!40000 ALTER TABLE `serviceinvoiceheaders` DISABLE KEYS */;
/*!40000 ALTER TABLE `serviceinvoiceheaders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicesoffered`
--

DROP TABLE IF EXISTS `servicesoffered`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicesoffered` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ServiceOffName` varchar(200) NOT NULL,
  `duration` float NOT NULL,
  `remarks` text,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicesoffered`
--

LOCK TABLES `servicesoffered` WRITE;
/*!40000 ALTER TABLE `servicesoffered` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicesoffered` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servmaterials`
--

DROP TABLE IF EXISTS `servmaterials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servmaterials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServID` int(10) NOT NULL,
  `MatID` int(10) NOT NULL,
  `todelete` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblservmaterial_tblservicesoffered1_idx` (`ServID`),
  KEY `fk_tblservmaterial_tblmaterial1_idx` (`MatID`),
  CONSTRAINT `fk_tblservmaterial_tblmaterial1` FOREIGN KEY (`MatID`) REFERENCES `materials` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblservmaterial_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `servicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servmaterials`
--

LOCK TABLES `servmaterials` WRITE;
/*!40000 ALTER TABLE `servmaterials` DISABLE KEYS */;
/*!40000 ALTER TABLE `servmaterials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servmatfees`
--

DROP TABLE IF EXISTS `servmatfees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servmatfees` (
  `ServID` int(10) NOT NULL,
  `FeeID` int(10) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  KEY `fk_tblservmatfee_tblservicesoffered1_idx` (`ServID`),
  KEY `fk_tblservmatfee_tblfee1_idx` (`FeeID`),
  CONSTRAINT `fk_tblservmatfee_tblfee1` FOREIGN KEY (`FeeID`) REFERENCES `fees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblservmatfee_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `servicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servmatfees`
--

LOCK TABLES `servmatfees` WRITE;
/*!40000 ALTER TABLE `servmatfees` DISABLE KEYS */;
/*!40000 ALTER TABLE `servmatfees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servtaskdues`
--

DROP TABLE IF EXISTS `servtaskdues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servtaskdues` (
  `ServTaskID` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  KEY `fk_tblservtaskdue_tblservtask1_idx` (`ServTaskID`),
  CONSTRAINT `fk_tblservtaskdue_tblservtask1` FOREIGN KEY (`ServTaskID`) REFERENCES `servtasks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servtaskdues`
--

LOCK TABLES `servtaskdues` WRITE;
/*!40000 ALTER TABLE `servtaskdues` DISABLE KEYS */;
/*!40000 ALTER TABLE `servtaskdues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servtasks`
--

DROP TABLE IF EXISTS `servtasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servtasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServID` int(10) NOT NULL,
  `ServTask` text NOT NULL,
  `duration` float DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblservtask_tblservicesoffered1_idx` (`ServID`),
  CONSTRAINT `fk_tblservtask_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `servicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servtasks`
--

LOCK TABLES `servtasks` WRITE;
/*!40000 ALTER TABLE `servtasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `servtasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servtotals`
--

DROP TABLE IF EXISTS `servtotals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servtotals` (
  `ServID` int(10) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  PRIMARY KEY (`ServID`),
  KEY `fk_tblservtotal_tblservicesoffered1_idx` (`ServID`),
  CONSTRAINT `fk_tblservtotal_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `servicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servtotals`
--

LOCK TABLES `servtotals` WRITE;
/*!40000 ALTER TABLE `servtotals` DISABLE KEYS */;
/*!40000 ALTER TABLE `servtotals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servwfees`
--

DROP TABLE IF EXISTS `servwfees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servwfees` (
  `ServWID` int(11) NOT NULL,
  `FeeID` int(10) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  KEY `fk_tblservwfee_tblservworker1_idx` (`ServWID`),
  KEY `fk_tblservwfee_tblfee1_idx` (`FeeID`),
  CONSTRAINT `fk_tblservwfee_tblfee1` FOREIGN KEY (`FeeID`) REFERENCES `fees` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblservwfee_tblservworker1` FOREIGN KEY (`ServWID`) REFERENCES `servworkers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servwfees`
--

LOCK TABLES `servwfees` WRITE;
/*!40000 ALTER TABLE `servwfees` DISABLE KEYS */;
/*!40000 ALTER TABLE `servwfees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servworkers`
--

DROP TABLE IF EXISTS `servworkers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servworkers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServID` int(10) NOT NULL,
  `SpecID` int(10) NOT NULL,
  `todelete` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblservworker_tblservicesoffered1_idx` (`ServID`),
  KEY `fk_tblservworker_tblspecialization1_idx` (`SpecID`),
  CONSTRAINT `fk_tblservworker_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `servicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblservworker_tblspecialization1` FOREIGN KEY (`SpecID`) REFERENCES `specializations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servworkers`
--

LOCK TABLES `servworkers` WRITE;
/*!40000 ALTER TABLE `servworkers` DISABLE KEYS */;
/*!40000 ALTER TABLE `servworkers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specializations`
--

DROP TABLE IF EXISTS `specializations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specializations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `SpecDesc` varchar(45) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `rpd` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specializations`
--

LOCK TABLES `specializations` WRITE;
/*!40000 ALTER TABLE `specializations` DISABLE KEYS */;
/*!40000 ALTER TABLE `specializations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stockcards`
--

DROP TABLE IF EXISTS `stockcards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stockcards` (
  `MatID` int(10) NOT NULL,
  `quantity` float NOT NULL,
  `date` datetime NOT NULL,
  `method` varchar(3) NOT NULL,
  `stock` float NOT NULL,
  `cost` decimal(11,2) NOT NULL,
  `totalcost` decimal(11,2) NOT NULL,
  KEY `fk_tblstockcard_tblmaterial1_idx` (`MatID`),
  CONSTRAINT `fk_tblstockcard_tblmaterial1` FOREIGN KEY (`MatID`) REFERENCES `materials` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stockcards`
--

LOCK TABLES `stockcards` WRITE;
/*!40000 ALTER TABLE `stockcards` DISABLE KEYS */;
/*!40000 ALTER TABLE `stockcards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stocks` (
  `MatID` int(10) NOT NULL,
  `stocks` float NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`MatID`),
  KEY `fk_tblstocks_tblmaterial1_idx` (`MatID`),
  CONSTRAINT `fk_tblstocks_tblmaterial1` FOREIGN KEY (`MatID`) REFERENCES `materials` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks`
--

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TaxValue` decimal(11,2) NOT NULL,
  `TaxDesc` varchar(50) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxes`
--

LOCK TABLES `taxes` WRITE;
/*!40000 ALTER TABLE `taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `taxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `remember_token` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'mydb'
--

--
-- Dumping routines for database 'mydb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-14 21:51:17
