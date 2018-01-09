-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2018 at 11:45 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `budgetdept`
--

CREATE TABLE `budgetdept` (
  `id` int(10) NOT NULL,
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
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budgetdept`
--

INSERT INTO `budgetdept` (`id`, `username`, `created_at`, `updated_at`, `fname`, `mname`, `lname`, `suffix`, `active`, `status`, `email`, `password`, `remember_token`) VALUES
(1, 'budgetdept', '2018-01-07 14:45:16', '2018-01-07 14:45:16', 'Brenda', NULL, 'Pasadas', NULL, 1, 1, 'bd@email.com', '$2y$10$JreMhPgmD1/Dra0KkSJVE.riAMsQmE8FwYKYTpY1ZqPzUVNUrpyvS', 'ZErfrMOo6o');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id` int(10) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id`, `username`, `fname`, `mname`, `lname`, `suffix`, `email`, `password`, `active`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'operations', 'Criszel', NULL, 'Murillo', NULL, 'o@email.com', '$2y$10$b6lU.4acSEax3edru5FpAOtFzRkwuKMlurcdhOM0v1JjLLyzC4OCi', 1, 1, 'j3dr6LDGeb', '2018-01-07 14:45:16', '2018-01-07 14:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projectmanager`
--

CREATE TABLE `projectmanager` (
  `id` int(10) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projectmanager`
--

INSERT INTO `projectmanager` (`id`, `username`, `email`, `password`, `fname`, `mname`, `lname`, `suffix`, `active`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pm', 'pm@email.com', '$2y$10$cNJFOdPfhMiS/UVInk5ws.lm09YEBceMByXmPSF0LgzNoK4XUHaH6', 'Ambrosio', NULL, 'Cruz', NULL, 1, 1, 'D0zun3FFBm', '2018-01-07 14:45:17', '2018-01-07 14:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblbank`
--

CREATE TABLE `tblbank` (
  `id` int(11) NOT NULL,
  `BankName` varchar(100) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblclient`
--

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
  `prov` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblclientidutil`
--

CREATE TABLE `tblclientidutil` (
  `strClientIDUtil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcompanyutil`
--

CREATE TABLE `tblcompanyutil` (
  `intCompanyUtilID` int(10) NOT NULL,
  `strCompanyName` varchar(100) NOT NULL,
  `strCompanyTIN` varchar(20) NOT NULL,
  `strCompanyAddress` varchar(100) NOT NULL,
  `strCompanyEmail` varchar(50) NOT NULL,
  `strGeneralManagerName` varchar(100) NOT NULL,
  `strCompanyLogo` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontractidutil`
--

CREATE TABLE `tblcontractidutil` (
  `strContractIDUtil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldeliverytruck`
--

CREATE TABLE `tbldeliverytruck` (
  `id` int(10) NOT NULL,
  `DeliTruckPlateNo` varchar(8) NOT NULL,
  `DeliTruckVINNo` varchar(17) NOT NULL,
  `DeliTruckCapacity` double NOT NULL,
  `DeliTruckGrossWeight` double NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldetailuom`
--

CREATE TABLE `tbldetailuom` (
  `id` int(10) NOT NULL,
  `GroupUOMID` int(10) NOT NULL,
  `DetailUOMText` varchar(50) NOT NULL,
  `UOMUnitSymbol` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldowndetail`
--

CREATE TABLE `tbldowndetail` (
  `id` int(11) NOT NULL,
  `DownID` int(11) NOT NULL,
  `initialtax` decimal(11,2) NOT NULL,
  `taxValue` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldownpayment`
--

CREATE TABLE `tbldownpayment` (
  `id` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `status` int(11) NOT NULL,
  `TaxID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblempidutil`
--

CREATE TABLE `tblempidutil` (
  `strEmpIDUtil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

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
  `todelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblempspec`
--

CREATE TABLE `tblempspec` (
  `id` int(10) NOT NULL,
  `EmpID` varchar(100) NOT NULL,
  `SpecID` int(10) NOT NULL,
  `todelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblequipment`
--

CREATE TABLE `tblequipment` (
  `id` int(10) NOT NULL,
  `TypeID` int(10) NOT NULL,
  `EquipName` varchar(30) NOT NULL,
  `EquipLeaser` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `EquipKey` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  `EquipPrice` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblequiptype`
--

CREATE TABLE `tblequiptype` (
  `id` int(10) NOT NULL,
  `EquipTypeDesc` varchar(40) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblfee`
--

CREATE TABLE `tblfee` (
  `id` int(10) NOT NULL,
  `FeeDesc` varchar(100) NOT NULL,
  `FeeValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblgroupuom`
--

CREATE TABLE `tblgroupuom` (
  `id` int(10) NOT NULL,
  `GroupUOMText` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblincurrences`
--

CREATE TABLE `tblincurrences` (
  `id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `user` varchar(45) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoiceidutil`
--

CREATE TABLE `tblinvoiceidutil` (
  `strInvoiceIDUtil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmaterial`
--

CREATE TABLE `tblmaterial` (
  `id` int(10) NOT NULL,
  `MatClassID` int(10) NOT NULL,
  `MatUOM` int(10) NOT NULL,
  `MaterialName` varchar(50) NOT NULL,
  `MaterialBrand` varchar(50) DEFAULT NULL,
  `MaterialSize` varchar(15) DEFAULT NULL,
  `MaterialColor` varchar(30) DEFAULT NULL,
  `MaterialDimension` varchar(40) DEFAULT NULL,
  `MaterialUnitPrice` decimal(11,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmaterialclass`
--

CREATE TABLE `tblmaterialclass` (
  `id` int(10) NOT NULL,
  `MatTypeID` int(10) NOT NULL,
  `MatClassName` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmaterialtype`
--

CREATE TABLE `tblmaterialtype` (
  `id` int(10) NOT NULL,
  `MatTypeName` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblmiscellaneous`
--

CREATE TABLE `tblmiscellaneous` (
  `id` int(11) NOT NULL,
  `MiscDesc` varchar(100) NOT NULL,
  `MiscValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbloridutil`
--

CREATE TABLE `tbloridutil` (
  `strOrIDUtil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `OrID` varchar(100) NOT NULL,
  `InvID` varchar(100) NOT NULL,
  `amountpaid` decimal(11,2) NOT NULL,
  `date` date NOT NULL,
  `change` decimal(11,2) NOT NULL,
  `remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymentmode`
--

CREATE TABLE `tblpaymentmode` (
  `id` int(11) NOT NULL,
  `ModeValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblprogressbill`
--

CREATE TABLE `tblprogressbill` (
  `id` int(11) NOT NULL,
  `progress` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `TaxID` int(11) NOT NULL,
  `RecID` int(11) NOT NULL,
  `RetID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblprogressdetail`
--

CREATE TABLE `tblprogressdetail` (
  `id` int(11) NOT NULL,
  `recValue` decimal(11,2) NOT NULL,
  `retValue` decimal(11,2) NOT NULL,
  `initial` decimal(11,2) NOT NULL,
  `initialtax` decimal(11,2) NOT NULL,
  `taxValue` decimal(11,2) NOT NULL,
  `PB_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblrate`
--

CREATE TABLE `tblrate` (
  `id` int(11) NOT NULL,
  `RateDesc` varchar(50) NOT NULL,
  `RateValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblrecoupment`
--

CREATE TABLE `tblrecoupment` (
  `id` int(11) NOT NULL,
  `RecValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblretention`
--

CREATE TABLE `tblretention` (
  `id` int(11) NOT NULL,
  `RetValue` decimal(11,2) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservdelivery`
--

CREATE TABLE `tblservdelivery` (
  `id` int(11) NOT NULL,
  `tblservdeliverycol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservequip`
--

CREATE TABLE `tblservequip` (
  `id` int(11) NOT NULL,
  `ServID` int(10) NOT NULL,
  `EquipID` int(10) NOT NULL,
  `todelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservfee`
--

CREATE TABLE `tblservfee` (
  `id` int(11) NOT NULL,
  `ServID` int(10) NOT NULL,
  `FeeID` int(11) NOT NULL,
  `todelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblserviceinvoicedetail`
--

CREATE TABLE `tblserviceinvoicedetail` (
  `InvID` varchar(100) NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblserviceinvoiceheader`
--

CREATE TABLE `tblserviceinvoiceheader` (
  `id` varchar(100) NOT NULL,
  `date` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `duedate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservicesoffered`
--

CREATE TABLE `tblservicesoffered` (
  `id` int(10) NOT NULL,
  `ServiceOffName` varchar(200) NOT NULL,
  `duration` float NOT NULL,
  `remarks` text,
  `status` tinyint(1) NOT NULL,
  `todelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservmaterial`
--

CREATE TABLE `tblservmaterial` (
  `id` int(11) NOT NULL,
  `ServID` int(10) NOT NULL,
  `MatID` int(10) NOT NULL,
  `todelete` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservmatfee`
--

CREATE TABLE `tblservmatfee` (
  `ServID` int(10) NOT NULL,
  `FeeID` int(10) NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservtask`
--

CREATE TABLE `tblservtask` (
  `id` int(11) NOT NULL,
  `ServID` int(10) NOT NULL,
  `ServTask` text NOT NULL,
  `duration` float DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservtaskdue`
--

CREATE TABLE `tblservtaskdue` (
  `ServTaskID` int(11) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservtotal`
--

CREATE TABLE `tblservtotal` (
  `ServID` int(10) NOT NULL,
  `total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservwfee`
--

CREATE TABLE `tblservwfee` (
  `ServWID` int(11) NOT NULL,
  `FeeID` int(10) NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblservworker`
--

CREATE TABLE `tblservworker` (
  `id` int(11) NOT NULL,
  `ServID` int(10) NOT NULL,
  `SpecID` int(10) NOT NULL,
  `todelete` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblspecialization`
--

CREATE TABLE `tblspecialization` (
  `id` int(10) NOT NULL,
  `SpecDesc` varchar(45) NOT NULL,
  `todelete` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `rpd` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstockcard`
--

CREATE TABLE `tblstockcard` (
  `MatID` int(10) NOT NULL,
  `quantity` float NOT NULL,
  `date` datetime NOT NULL,
  `method` varchar(3) NOT NULL,
  `stock` float NOT NULL,
  `cost` decimal(11,2) NOT NULL,
  `totalcost` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstocks`
--

CREATE TABLE `tblstocks` (
  `MatID` int(10) NOT NULL,
  `stocks` float NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbltax`
--

CREATE TABLE `tbltax` (
  `id` int(11) NOT NULL,
  `TaxValue` decimal(11,2) NOT NULL,
  `TaxDesc` varchar(50) NOT NULL,
  `todelete` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbltype`
--

CREATE TABLE `tbltype` (
  `id` int(11) NOT NULL,
  `desc` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `budgetdept`
--
ALTER TABLE `budgetdept`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `operations_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projectmanager`
--
ALTER TABLE `projectmanager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projectmanager_email_unique` (`email`);

--
-- Indexes for table `tblbank`
--
ALTER TABLE `tblbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclient`
--
ALTER TABLE `tblclient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclientidutil`
--
ALTER TABLE `tblclientidutil`
  ADD PRIMARY KEY (`strClientIDUtil`);

--
-- Indexes for table `tblcompanyutil`
--
ALTER TABLE `tblcompanyutil`
  ADD PRIMARY KEY (`intCompanyUtilID`);

--
-- Indexes for table `tblcontractidutil`
--
ALTER TABLE `tblcontractidutil`
  ADD PRIMARY KEY (`strContractIDUtil`);

--
-- Indexes for table `tbldeliverytruck`
--
ALTER TABLE `tbldeliverytruck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldetailuom`
--
ALTER TABLE `tbldetailuom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblDetailUOM_tblGroupUOM1_idx` (`GroupUOMID`);

--
-- Indexes for table `tbldowndetail`
--
ALTER TABLE `tbldowndetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbldowndetail_tbldownpayment1_idx` (`DownID`);

--
-- Indexes for table `tbldownpayment`
--
ALTER TABLE `tbldownpayment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tbldownpayment_tbltax1_idx` (`TaxID`);

--
-- Indexes for table `tblempidutil`
--
ALTER TABLE `tblempidutil`
  ADD PRIMARY KEY (`strEmpIDUtil`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblempspec`
--
ALTER TABLE `tblempspec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblempspec_tblspecialization1_idx` (`SpecID`),
  ADD KEY `fk_tblempspec_tblEmployee1_idx` (`EmpID`);

--
-- Indexes for table `tblequipment`
--
ALTER TABLE `tblequipment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EquipKey_UNIQUE` (`EquipKey`),
  ADD KEY `fk_tblEquipment_tblEquipType1_idx` (`TypeID`);

--
-- Indexes for table `tblequiptype`
--
ALTER TABLE `tblequiptype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfee`
--
ALTER TABLE `tblfee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgroupuom`
--
ALTER TABLE `tblgroupuom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblincurrences`
--
ALTER TABLE `tblincurrences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblincurrences_tbltype1_idx` (`type`);

--
-- Indexes for table `tblinvoiceidutil`
--
ALTER TABLE `tblinvoiceidutil`
  ADD PRIMARY KEY (`strInvoiceIDUtil`);

--
-- Indexes for table `tblmaterial`
--
ALTER TABLE `tblmaterial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblMaterial_tblDetailUOM1_idx` (`MatUOM`),
  ADD KEY `fk_tblMaterial_tblMaterialClass1_idx` (`MatClassID`);

--
-- Indexes for table `tblmaterialclass`
--
ALTER TABLE `tblmaterialclass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblMaterialClass_tblMaterialType1_idx` (`MatTypeID`);

--
-- Indexes for table `tblmaterialtype`
--
ALTER TABLE `tblmaterialtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmiscellaneous`
--
ALTER TABLE `tblmiscellaneous`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbloridutil`
--
ALTER TABLE `tbloridutil`
  ADD PRIMARY KEY (`strOrIDUtil`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`OrID`),
  ADD KEY `fk_tblpayment_tblserviceinvoiceheader1_idx` (`InvID`);

--
-- Indexes for table `tblpaymentmode`
--
ALTER TABLE `tblpaymentmode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblprogressbill`
--
ALTER TABLE `tblprogressbill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblprogressbill_tbltax1_idx` (`TaxID`),
  ADD KEY `fk_tblprogressbill_tblrecoupment1_idx` (`RecID`),
  ADD KEY `fk_tblprogressbill_tblretention1_idx` (`RetID`);

--
-- Indexes for table `tblprogressdetail`
--
ALTER TABLE `tblprogressdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblprogressdetail_tblprogressbill1_idx` (`PB_ID`);

--
-- Indexes for table `tblrate`
--
ALTER TABLE `tblrate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblrecoupment`
--
ALTER TABLE `tblrecoupment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblretention`
--
ALTER TABLE `tblretention`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblservdelivery`
--
ALTER TABLE `tblservdelivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblservequip`
--
ALTER TABLE `tblservequip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblservequip_tblservicesoffered1_idx` (`ServID`),
  ADD KEY `fk_tblservequip_tblequipment1_idx` (`EquipID`);

--
-- Indexes for table `tblservfee`
--
ALTER TABLE `tblservfee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblservfee_tblservicesoffered1_idx` (`ServID`),
  ADD KEY `fk_tblservfee_tblfee1_idx` (`FeeID`);

--
-- Indexes for table `tblserviceinvoicedetail`
--
ALTER TABLE `tblserviceinvoicedetail`
  ADD KEY `fk_tblserviceinvoicedetail_tblserviceinvoiceheader1_idx` (`InvID`);

--
-- Indexes for table `tblserviceinvoiceheader`
--
ALTER TABLE `tblserviceinvoiceheader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblservicesoffered`
--
ALTER TABLE `tblservicesoffered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblservmaterial`
--
ALTER TABLE `tblservmaterial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblservmaterial_tblservicesoffered1_idx` (`ServID`),
  ADD KEY `fk_tblservmaterial_tblmaterial1_idx` (`MatID`);

--
-- Indexes for table `tblservmatfee`
--
ALTER TABLE `tblservmatfee`
  ADD KEY `fk_tblservmatfee_tblservicesoffered1_idx` (`ServID`),
  ADD KEY `fk_tblservmatfee_tblfee1_idx` (`FeeID`);

--
-- Indexes for table `tblservtask`
--
ALTER TABLE `tblservtask`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblservtask_tblservicesoffered1_idx` (`ServID`);

--
-- Indexes for table `tblservtaskdue`
--
ALTER TABLE `tblservtaskdue`
  ADD KEY `fk_tblservtaskdue_tblservtask1_idx` (`ServTaskID`);

--
-- Indexes for table `tblservtotal`
--
ALTER TABLE `tblservtotal`
  ADD PRIMARY KEY (`ServID`),
  ADD KEY `fk_tblservtotal_tblservicesoffered1_idx` (`ServID`);

--
-- Indexes for table `tblservwfee`
--
ALTER TABLE `tblservwfee`
  ADD KEY `fk_tblservwfee_tblservworker1_idx` (`ServWID`),
  ADD KEY `fk_tblservwfee_tblfee1_idx` (`FeeID`);

--
-- Indexes for table `tblservworker`
--
ALTER TABLE `tblservworker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tblservworker_tblservicesoffered1_idx` (`ServID`),
  ADD KEY `fk_tblservworker_tblspecialization1_idx` (`SpecID`);

--
-- Indexes for table `tblspecialization`
--
ALTER TABLE `tblspecialization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstockcard`
--
ALTER TABLE `tblstockcard`
  ADD KEY `fk_tblstockcard_tblmaterial1_idx` (`MatID`);

--
-- Indexes for table `tblstocks`
--
ALTER TABLE `tblstocks`
  ADD PRIMARY KEY (`MatID`),
  ADD KEY `fk_tblstocks_tblmaterial1_idx` (`MatID`);

--
-- Indexes for table `tbltax`
--
ALTER TABLE `tbltax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltype`
--
ALTER TABLE `tbltype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `budgetdept`
--
ALTER TABLE `budgetdept`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projectmanager`
--
ALTER TABLE `projectmanager`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tblbank`
--
ALTER TABLE `tblbank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblcompanyutil`
--
ALTER TABLE `tblcompanyutil`
  MODIFY `intCompanyUtilID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbldeliverytruck`
--
ALTER TABLE `tbldeliverytruck`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbldetailuom`
--
ALTER TABLE `tbldetailuom`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbldowndetail`
--
ALTER TABLE `tbldowndetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbldownpayment`
--
ALTER TABLE `tbldownpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblempspec`
--
ALTER TABLE `tblempspec`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblequipment`
--
ALTER TABLE `tblequipment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblequiptype`
--
ALTER TABLE `tblequiptype`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblfee`
--
ALTER TABLE `tblfee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblgroupuom`
--
ALTER TABLE `tblgroupuom`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblincurrences`
--
ALTER TABLE `tblincurrences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmaterial`
--
ALTER TABLE `tblmaterial`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmaterialclass`
--
ALTER TABLE `tblmaterialclass`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmaterialtype`
--
ALTER TABLE `tblmaterialtype`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblmiscellaneous`
--
ALTER TABLE `tblmiscellaneous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblpaymentmode`
--
ALTER TABLE `tblpaymentmode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblprogressbill`
--
ALTER TABLE `tblprogressbill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblprogressdetail`
--
ALTER TABLE `tblprogressdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblrate`
--
ALTER TABLE `tblrate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblrecoupment`
--
ALTER TABLE `tblrecoupment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblretention`
--
ALTER TABLE `tblretention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblservdelivery`
--
ALTER TABLE `tblservdelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblservequip`
--
ALTER TABLE `tblservequip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblservfee`
--
ALTER TABLE `tblservfee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblservicesoffered`
--
ALTER TABLE `tblservicesoffered`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblservmaterial`
--
ALTER TABLE `tblservmaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblservtask`
--
ALTER TABLE `tblservtask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblservworker`
--
ALTER TABLE `tblservworker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblspecialization`
--
ALTER TABLE `tblspecialization`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbltax`
--
ALTER TABLE `tbltax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbltype`
--
ALTER TABLE `tbltype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbldetailuom`
--
ALTER TABLE `tbldetailuom`
  ADD CONSTRAINT `fk_tblDetailUOM_tblGroupUOM1` FOREIGN KEY (`GroupUOMID`) REFERENCES `tblgroupuom` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbldowndetail`
--
ALTER TABLE `tbldowndetail`
  ADD CONSTRAINT `fk_tbldowndetail_tbldownpayment1` FOREIGN KEY (`DownID`) REFERENCES `tbldownpayment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbldownpayment`
--
ALTER TABLE `tbldownpayment`
  ADD CONSTRAINT `fk_tbldownpayment_tbltax1` FOREIGN KEY (`TaxID`) REFERENCES `tbltax` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblempspec`
--
ALTER TABLE `tblempspec`
  ADD CONSTRAINT `fk_tblempspec_tblEmployee1` FOREIGN KEY (`EmpID`) REFERENCES `tblemployee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblempspec_tblspecialization1` FOREIGN KEY (`SpecID`) REFERENCES `tblspecialization` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblequipment`
--
ALTER TABLE `tblequipment`
  ADD CONSTRAINT `fk_tblEquipment_tblEquipType1` FOREIGN KEY (`TypeID`) REFERENCES `tblequiptype` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tblincurrences`
--
ALTER TABLE `tblincurrences`
  ADD CONSTRAINT `fk_tblincurrences_tbltype1` FOREIGN KEY (`type`) REFERENCES `tbltype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblmaterial`
--
ALTER TABLE `tblmaterial`
  ADD CONSTRAINT `fk_tblMaterial_tblDetailUOM1` FOREIGN KEY (`MatUOM`) REFERENCES `tbldetailuom` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblMaterial_tblMaterialClass1` FOREIGN KEY (`MatClassID`) REFERENCES `tblmaterialclass` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblmaterialclass`
--
ALTER TABLE `tblmaterialclass`
  ADD CONSTRAINT `fk_tblMaterialClass_tblMaterialType1` FOREIGN KEY (`MatTypeID`) REFERENCES `tblmaterialtype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD CONSTRAINT `fk_tblpayment_tblserviceinvoiceheader1` FOREIGN KEY (`InvID`) REFERENCES `tblserviceinvoiceheader` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblprogressbill`
--
ALTER TABLE `tblprogressbill`
  ADD CONSTRAINT `fk_tblprogressbill_tblrecoupment1` FOREIGN KEY (`RecID`) REFERENCES `tblrecoupment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblprogressbill_tblretention1` FOREIGN KEY (`RetID`) REFERENCES `tblretention` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblprogressbill_tbltax1` FOREIGN KEY (`TaxID`) REFERENCES `tbltax` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblprogressdetail`
--
ALTER TABLE `tblprogressdetail`
  ADD CONSTRAINT `fk_tblprogressdetail_tblprogressbill1` FOREIGN KEY (`PB_ID`) REFERENCES `tblprogressbill` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblservequip`
--
ALTER TABLE `tblservequip`
  ADD CONSTRAINT `fk_tblservequip_tblequipment1` FOREIGN KEY (`EquipID`) REFERENCES `tblequipment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblservequip_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblservfee`
--
ALTER TABLE `tblservfee`
  ADD CONSTRAINT `fk_tblservfee_tblfee1` FOREIGN KEY (`FeeID`) REFERENCES `tblfee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblservfee_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblserviceinvoicedetail`
--
ALTER TABLE `tblserviceinvoicedetail`
  ADD CONSTRAINT `fk_tblserviceinvoicedetail_tblserviceinvoiceheader1` FOREIGN KEY (`InvID`) REFERENCES `tblserviceinvoiceheader` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblservmaterial`
--
ALTER TABLE `tblservmaterial`
  ADD CONSTRAINT `fk_tblservmaterial_tblmaterial1` FOREIGN KEY (`MatID`) REFERENCES `tblmaterial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblservmaterial_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblservmatfee`
--
ALTER TABLE `tblservmatfee`
  ADD CONSTRAINT `fk_tblservmatfee_tblfee1` FOREIGN KEY (`FeeID`) REFERENCES `tblfee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblservmatfee_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblservtask`
--
ALTER TABLE `tblservtask`
  ADD CONSTRAINT `fk_tblservtask_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblservtaskdue`
--
ALTER TABLE `tblservtaskdue`
  ADD CONSTRAINT `fk_tblservtaskdue_tblservtask1` FOREIGN KEY (`ServTaskID`) REFERENCES `tblservtask` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblservtotal`
--
ALTER TABLE `tblservtotal`
  ADD CONSTRAINT `fk_tblservtotal_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblservwfee`
--
ALTER TABLE `tblservwfee`
  ADD CONSTRAINT `fk_tblservwfee_tblfee1` FOREIGN KEY (`FeeID`) REFERENCES `tblfee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblservwfee_tblservworker1` FOREIGN KEY (`ServWID`) REFERENCES `tblservworker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblservworker`
--
ALTER TABLE `tblservworker`
  ADD CONSTRAINT `fk_tblservworker_tblservicesoffered1` FOREIGN KEY (`ServID`) REFERENCES `tblservicesoffered` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblservworker_tblspecialization1` FOREIGN KEY (`SpecID`) REFERENCES `tblspecialization` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblstockcard`
--
ALTER TABLE `tblstockcard`
  ADD CONSTRAINT `fk_tblstockcard_tblmaterial1` FOREIGN KEY (`MatID`) REFERENCES `tblmaterial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblstocks`
--
ALTER TABLE `tblstocks`
  ADD CONSTRAINT `fk_tblstocks_tblmaterial1` FOREIGN KEY (`MatID`) REFERENCES `tblmaterial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
