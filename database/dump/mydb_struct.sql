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
-- Table structure for table `budgetdept`
--

DROP TABLE IF EXISTS `budgetdept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `budgetdept` (
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
-- Table structure for table `projectmanager`
--

DROP TABLE IF EXISTS `projectmanager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projectmanager` (
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
-- Table structure for table `tblbank`
--

DROP TABLE IF EXISTS `tblbank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblbank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `BankName` varchar(100) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblclient`
--

DROP TABLE IF EXISTS `tblclient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblclient` (
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
-- Table structure for table `tblclientidutil`
--

DROP TABLE IF EXISTS `tblclientidutil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblclientidutil` (
  `strClientIDUtil` varchar(100) NOT NULL,
  PRIMARY KEY (`strClientIDUtil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblcompanyutil`
--

DROP TABLE IF EXISTS `tblcompanyutil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcompanyutil` (
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
-- Table structure for table `tblcontractidutil`
--

DROP TABLE IF EXISTS `tblcontractidutil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblcontractidutil` (
  `strContractIDUtil` varchar(100) NOT NULL,
  PRIMARY KEY (`strContractIDUtil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbldeliverytruck`
--

DROP TABLE IF EXISTS `tbldeliverytruck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldeliverytruck` (
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
-- Table structure for table `tbldetailuom`
--

DROP TABLE IF EXISTS `tbldetailuom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldetailuom` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `GroupUOMID` int(10) NOT NULL,
  `DetailUOMText` varchar(50) NOT NULL,
  `UOMUnitSymbol` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblDetailUOM_tblGroupUOM1_idx` (`GroupUOMID`),
  CONSTRAINT `fk_tblDetailUOM_tblGroupUOM1` FOREIGN KEY (`GroupUOMID`) REFERENCES `tblgroupuom` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbldowndetail`
--

DROP TABLE IF EXISTS `tbldowndetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldowndetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `DownID` int(11) NOT NULL,
  `initialtax` decimal(11,2) NOT NULL,
  `taxValue` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbldowndetail_tbldownpayment1_idx` (`DownID`),
  CONSTRAINT `fk_tbldowndetail_tbldownpayment1` FOREIGN KEY (`DownID`) REFERENCES `tbldownpayment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbldownpayment`
--

DROP TABLE IF EXISTS `tbldownpayment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldownpayment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(11,2) NOT NULL,
  `status` int(11) NOT NULL,
  `TaxID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbldownpayment_tbltax1_idx` (`TaxID`),
  CONSTRAINT `fk_tbldownpayment_tbltax1` FOREIGN KEY (`TaxID`) REFERENCES `tbltax` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblempidutil`
--

DROP TABLE IF EXISTS `tblempidutil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblempidutil` (
  `strEmpIDUtil` varchar(100) NOT NULL,
  PRIMARY KEY (`strEmpIDUtil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblemployee`
--

DROP TABLE IF EXISTS `tblemployee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblemployee` (
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
-- Table structure for table `tblempspec`
--

DROP TABLE IF EXISTS `tblempspec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblempspec` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `EmpID` varchar(100) NOT NULL,
  `SpecID` int(10) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblempspec_tblspecialization1_idx` (`SpecID`),
  KEY `fk_tblempspec_tblEmployee1_idx` (`EmpID`),
  CONSTRAINT `fk_tblempspec_tblEmployee1` FOREIGN KEY (`EmpID`) REFERENCES `tblemployee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblempspec_tblspecialization1` FOREIGN KEY (`SpecID`) REFERENCES `tblspecialization` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblequipment`
--

DROP TABLE IF EXISTS `tblequipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblequipment` (
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
  CONSTRAINT `fk_tblEquipment_tblEquipType1` FOREIGN KEY (`TypeID`) REFERENCES `tblequiptype` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblequiptype`
--

DROP TABLE IF EXISTS `tblequiptype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblequiptype` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `EquipTypeDesc` varchar(40) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblfee`
--

DROP TABLE IF EXISTS `tblfee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblfee` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `FeeDesc` varchar(100) NOT NULL,
  `FeeValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblgroupuom`
--

DROP TABLE IF EXISTS `tblgroupuom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblgroupuom` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `GroupUOMText` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblincurrences`
--

DROP TABLE IF EXISTS `tblincurrences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblincurrences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` text NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `user` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblincurrences_tbltype1_idx` (`type`),
  CONSTRAINT `fk_tblincurrences_tbltype1` FOREIGN KEY (`type`) REFERENCES `tbltype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblinvoiceidutil`
--

DROP TABLE IF EXISTS `tblinvoiceidutil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinvoiceidutil` (
  `strInvoiceIDUtil` varchar(100) NOT NULL,
  PRIMARY KEY (`strInvoiceIDUtil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblmaterial`
--

DROP TABLE IF EXISTS `tblmaterial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblmaterial` (
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
  CONSTRAINT `fk_tblMaterial_tblDetailUOM1` FOREIGN KEY (`MatUOM`) REFERENCES `tbldetailuom` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblMaterial_tblMaterialClass1` FOREIGN KEY (`MatClassID`) REFERENCES `tblmaterialclass` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblmaterialclass`
--

DROP TABLE IF EXISTS `tblmaterialclass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblmaterialclass` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `MatTypeID` int(10) NOT NULL,
  `MatClassName` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblMaterialClass_tblMaterialType1_idx` (`MatTypeID`),
  CONSTRAINT `fk_tblMaterialClass_tblMaterialType1` FOREIGN KEY (`MatTypeID`) REFERENCES `tblmaterialtype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblmaterialtype`
--

DROP TABLE IF EXISTS `tblmaterialtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblmaterialtype` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `MatTypeName` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblmiscellaneous`
--

DROP TABLE IF EXISTS `tblmiscellaneous`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblmiscellaneous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MiscDesc` varchar(100) NOT NULL,
  `MiscValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbloridutil`
--

DROP TABLE IF EXISTS `tbloridutil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbloridutil` (
  `strOrIDUtil` varchar(100) NOT NULL,
  PRIMARY KEY (`strOrIDUtil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblpayment`
--

DROP TABLE IF EXISTS `tblpayment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblpayment` (
  `OrID` varchar(100) NOT NULL,
  `InvID` varchar(100) NOT NULL,
  `amountpaid` decimal(11,2) NOT NULL,
  `date` date NOT NULL,
  `change` decimal(11,2) NOT NULL,
  `remarks` text,
  PRIMARY KEY (`OrID`),
  KEY `fk_tblpayment_tblserviceinvoiceheader1_idx` (`InvID`),
  CONSTRAINT `fk_tblpayment_tblserviceinvoiceheader1` FOREIGN KEY (`InvID`) REFERENCES `tblserviceinvoiceheader` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblpaymentmode`
--

DROP TABLE IF EXISTS `tblpaymentmode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblpaymentmode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ModeValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblprogressbill`
--

DROP TABLE IF EXISTS `tblprogressbill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblprogressbill` (
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
  CONSTRAINT `fk_tblprogressbill_tblrecoupment1` FOREIGN KEY (`RecID`) REFERENCES `tblrecoupment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblprogressbill_tblretention1` FOREIGN KEY (`RetID`) REFERENCES `tblretention` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblprogressbill_tbltax1` FOREIGN KEY (`TaxID`) REFERENCES `tbltax` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblprogressdetail`
--

DROP TABLE IF EXISTS `tblprogressdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblprogressdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recValue` decimal(11,2) NOT NULL,
  `retValue` decimal(11,2) NOT NULL,
  `initial` decimal(11,2) NOT NULL,
  `initialtax` decimal(11,2) NOT NULL,
  `taxValue` decimal(11,2) NOT NULL,
  `PB_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblprogressdetail_tblprogressbill1_idx` (`PB_ID`),
  CONSTRAINT `fk_tblprogressdetail_tblprogressbill1` FOREIGN KEY (`PB_ID`) REFERENCES `tblprogressbill` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblrate`
--

DROP TABLE IF EXISTS `tblrate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblrate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `RateDesc` varchar(50) NOT NULL,
  `RateValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblrecoupment`
--

DROP TABLE IF EXISTS `tblrecoupment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblrecoupment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `RecValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblretention`
--

DROP TABLE IF EXISTS `tblretention`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblretention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `RetValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblservdelivery`
--

DROP TABLE IF EXISTS `tblservdelivery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservdelivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tblservdeliverycol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblservequip`
--

DROP TABLE IF EXISTS `tblservequip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservequip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServID` int(10) NOT NULL,
  `EquipID` int(10) NOT NULL,
  `todelete` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblservequip_tblservicesoffered1_idx` (`ServID`),
  KEY `fk_tblservequip_tblequipment1_idx` (`EquipID`),
  CONSTRAINT `fk_tblservequip_tblequipment1` FOREIGN KEY (`EquipID`) REFERENCES `tblequipment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblservequip_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblservfee`
--

DROP TABLE IF EXISTS `tblservfee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservfee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServID` int(10) NOT NULL,
  `FeeID` int(11) NOT NULL,
  `todelete` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblservfee_tblservicesoffered1_idx` (`ServID`),
  KEY `fk_tblservfee_tblfee1_idx` (`FeeID`),
  CONSTRAINT `fk_tblservfee_tblfee1` FOREIGN KEY (`FeeID`) REFERENCES `tblfee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblservfee_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblserviceinvoicedetail`
--

DROP TABLE IF EXISTS `tblserviceinvoicedetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblserviceinvoicedetail` (
  `InvID` varchar(100) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  KEY `fk_tblserviceinvoicedetail_tblserviceinvoiceheader1_idx` (`InvID`),
  CONSTRAINT `fk_tblserviceinvoicedetail_tblserviceinvoiceheader1` FOREIGN KEY (`InvID`) REFERENCES `tblserviceinvoiceheader` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblserviceinvoiceheader`
--

DROP TABLE IF EXISTS `tblserviceinvoiceheader`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblserviceinvoiceheader` (
  `id` varchar(100) NOT NULL,
  `date` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `duedate` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblservicesoffered`
--

DROP TABLE IF EXISTS `tblservicesoffered`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservicesoffered` (
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
-- Table structure for table `tblservmaterial`
--

DROP TABLE IF EXISTS `tblservmaterial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservmaterial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServID` int(10) NOT NULL,
  `MatID` int(10) NOT NULL,
  `todelete` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblservmaterial_tblservicesoffered1_idx` (`ServID`),
  KEY `fk_tblservmaterial_tblmaterial1_idx` (`MatID`),
  CONSTRAINT `fk_tblservmaterial_tblmaterial1` FOREIGN KEY (`MatID`) REFERENCES `tblmaterial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblservmaterial_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblservmatfee`
--

DROP TABLE IF EXISTS `tblservmatfee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservmatfee` (
  `ServID` int(10) NOT NULL,
  `FeeID` int(10) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  KEY `fk_tblservmatfee_tblservicesoffered1_idx` (`ServID`),
  KEY `fk_tblservmatfee_tblfee1_idx` (`FeeID`),
  CONSTRAINT `fk_tblservmatfee_tblfee1` FOREIGN KEY (`FeeID`) REFERENCES `tblfee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblservmatfee_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblservtask`
--

DROP TABLE IF EXISTS `tblservtask`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservtask` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServID` int(10) NOT NULL,
  `ServTask` text NOT NULL,
  `duration` float DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblservtask_tblservicesoffered1_idx` (`ServID`),
  CONSTRAINT `fk_tblservtask_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblservtaskdue`
--

DROP TABLE IF EXISTS `tblservtaskdue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservtaskdue` (
  `ServTaskID` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  KEY `fk_tblservtaskdue_tblservtask1_idx` (`ServTaskID`),
  CONSTRAINT `fk_tblservtaskdue_tblservtask1` FOREIGN KEY (`ServTaskID`) REFERENCES `tblservtask` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblservtotal`
--

DROP TABLE IF EXISTS `tblservtotal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservtotal` (
  `ServID` int(10) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  PRIMARY KEY (`ServID`),
  KEY `fk_tblservtotal_tblservicesoffered1_idx` (`ServID`),
  CONSTRAINT `fk_tblservtotal_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblservwfee`
--

DROP TABLE IF EXISTS `tblservwfee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservwfee` (
  `ServWID` int(11) NOT NULL,
  `FeeID` int(10) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  KEY `fk_tblservwfee_tblservworker1_idx` (`ServWID`),
  KEY `fk_tblservwfee_tblfee1_idx` (`FeeID`),
  CONSTRAINT `fk_tblservwfee_tblfee1` FOREIGN KEY (`FeeID`) REFERENCES `tblfee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblservwfee_tblservworker1` FOREIGN KEY (`ServWID`) REFERENCES `tblservworker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblservworker`
--

DROP TABLE IF EXISTS `tblservworker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservworker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ServID` int(10) NOT NULL,
  `SpecID` int(10) NOT NULL,
  `todelete` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tblservworker_tblservicesoffered1_idx` (`ServID`),
  KEY `fk_tblservworker_tblspecialization1_idx` (`SpecID`),
  CONSTRAINT `fk_tblservworker_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblservworker_tblspecialization1` FOREIGN KEY (`SpecID`) REFERENCES `tblspecialization` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblspecialization`
--

DROP TABLE IF EXISTS `tblspecialization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblspecialization` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `SpecDesc` varchar(45) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `rpd` decimal(11,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblstockcard`
--

DROP TABLE IF EXISTS `tblstockcard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstockcard` (
  `MatID` int(10) NOT NULL,
  `quantity` float NOT NULL,
  `date` datetime NOT NULL,
  `method` varchar(3) NOT NULL,
  `stock` float NOT NULL,
  `cost` decimal(11,2) NOT NULL,
  `totalcost` decimal(11,2) NOT NULL,
  KEY `fk_tblstockcard_tblmaterial1_idx` (`MatID`),
  CONSTRAINT `fk_tblstockcard_tblmaterial1` FOREIGN KEY (`MatID`) REFERENCES `tblmaterial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblstocks`
--

DROP TABLE IF EXISTS `tblstocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblstocks` (
  `MatID` int(10) NOT NULL,
  `stocks` float NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`MatID`),
  KEY `fk_tblstocks_tblmaterial1_idx` (`MatID`),
  CONSTRAINT `fk_tblstocks_tblmaterial1` FOREIGN KEY (`MatID`) REFERENCES `tblmaterial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbltax`
--

DROP TABLE IF EXISTS `tbltax`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbltax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TaxValue` decimal(11,2) NOT NULL,
  `TaxDesc` varchar(50) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbltype`
--

DROP TABLE IF EXISTS `tbltype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbltype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-12 13:42:19
