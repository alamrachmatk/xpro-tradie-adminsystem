-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 09:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xpro_tradie`
--

-- --------------------------------------------------------

--
-- Table structure for table `biddings`
--

CREATE TABLE `biddings` (
  `id` int(25) NOT NULL,
  `order_id` int(25) NOT NULL,
  `company_id` int(25) NOT NULL,
  `labor_time` varchar(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0: waiting approval customer, 1: approve customer',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biddings`
--

INSERT INTO `biddings` (`id`, `order_id`, `company_id`, `labor_time`, `price`, `description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(18, 1, 2, '3', '34.00', '<p><strong>Motor Servicing</strong></p>\n\n<p>basic care, move-in, and special care. The basic care service is at IDR320,000 and based on where you live. The SOP is a bedroom, bathroom, living room, kitchen. The move-in service is at IDR400,000 and dedicated to your new house. Move-in covers windows, balconies, and closets with &lsquo;Basic Care&rsquo; cleaning. Meanwhile, the special care service is at IDR80,000 and only for one particular area of your place</p>', 1, '2020-09-17 07:53:43', '2020-09-17 07:53:43', 1, 1),
(19, 1, 1, '12', '34.00', '<p>tes</p>', 1, '2020-09-19 01:43:10', '2020-09-19 01:43:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `phone_office` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `abn_cn_number` varchar(100) DEFAULT NULL,
  `qualification_number` varchar(100) NOT NULL,
  `id_insurance` int(11) DEFAULT NULL,
  `insurance_policy_number` varchar(100) DEFAULT NULL,
  `insurance_validation` varchar(100) DEFAULT NULL,
  `insurance_lability` decimal(10,2) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `phone`, `phone_office`, `fax`, `address`, `abn_cn_number`, `qualification_number`, `id_insurance`, `insurance_policy_number`, `insurance_validation`, `insurance_lability`, `avatar`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'PT. Askara', 'askanra@gmail.com', '081274859302', '0217483940', NULL, 'jalan merpati', '313144114', '23242424', 1, '333', '2323', '444.00', 'image', 1, NULL, NULL, NULL, NULL),
(2, 'PT. Napon', 'napon@gmail.com', '081274859302', '0217384920', NULL, 'jalan peninggaran', '3535353535', '252525', 1, '444', '2323', '666.00', 'image', 1, NULL, NULL, NULL, NULL),
(3, 'PT. Cleaning Hospital', 'cg@yahoo.co,', '081254637829', '0217453678', NULL, 'jalan rempoa 3', '2435353536', '646467', 1, '4355', '5555', '6666.00', 'image', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Cleaning', 'cleaning house/company', 1, '2020-09-11 17:41:56', '2020-09-10 11:50:33', 1, 1),
(2, 'Service Automotive', 'car servicing', 1, '2020-09-11 17:42:03', '2020-09-11 17:42:07', 1, 1),
(3, 'Security', 'security', 1, NULL, NULL, NULL, NULL),
(4, 'Plumbing', 'plumbing', 1, NULL, NULL, NULL, NULL),
(5, 'Carpentry', 'carpentry', 1, NULL, NULL, NULL, NULL),
(6, 'Roofing', 'gardening', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(25) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `category` int(25) NOT NULL COMMENT 'company: 1, housing: 2',
  `company_name` varchar(255) DEFAULT NULL,
  `abn_cn_number` varchar(100) DEFAULT NULL,
  `driving_licence` varchar(255) NOT NULL,
  `photo_id` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT 'new: 0, active: 1, banned: 2',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted` int(11) UNSIGNED DEFAULT 0 COMMENT 'delete: 1, not delete:: 0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `category`, `company_name`, `abn_cn_number`, `driving_licence`, `photo_id`, `avatar`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted`) VALUES
(1, 'Hari334678', 'Sartono', 'rudi2@gmail.com', '', '081254637483', 'jalan nam nam 2 no 5', 1, 'Dcm', '224224242424', '1599620518dv.jpg', '1325353335', 'aaa', 1, '2020-09-08 05:03:15', '2020-09-16 12:42:36', 1, 1, 1),
(3, 'Jihan', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '2278478247825', '1599554499b.jpeg', '23758282424', '1599554499a.jpg', 1, '2020-09-08 08:41:39', '2020-09-08 23:48:02', NULL, NULL, 1),
(4, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', 'sss', '1599573819b.PNG', '32323', '1599573819a.PNG', 0, '2020-09-08 14:03:39', '2020-09-08 14:03:39', NULL, NULL, 0),
(5, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', 'dwe', '1599574717b.PNG', 'wewe', '1599574717a.png', 0, '2020-09-08 14:18:37', '2020-09-08 14:18:37', NULL, NULL, 0),
(6, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 2, 'mnc', '2323', '1599574878b.PNG', '232323', '1599574878a.png', 1, '2020-09-08 14:21:18', '2020-09-08 14:21:18', NULL, NULL, 0),
(7, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '1313', '1599575269b.PNG', '2323', '1599575269a.png', 0, '2020-09-08 14:27:49', '2020-09-08 14:27:49', NULL, NULL, 0),
(8, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '2323', '1599575702b.PNG', '23223', '1599575702a.PNG', 0, '2020-09-08 14:35:02', '2020-09-08 14:35:02', NULL, NULL, 0),
(9, 'Alam 888', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '2323', '1599575761b.png', '2323', '1599575761a.png', 0, '2020-09-08 14:36:01', '2020-09-08 14:36:01', NULL, NULL, 0),
(10, 'Alam 90', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', 'QW', '1599575865b.png', '2323', '1599575865a.png', 0, '2020-09-08 14:37:45', '2020-09-08 14:37:45', NULL, NULL, 0),
(11, 'Budi', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 2, 'mnc', 'QW', 'dv-1599628472.jpeg', '2323', 'avatar-1599628472.jpg', 0, '2020-09-08 14:41:02', '2020-09-11 11:14:41', NULL, NULL, 0),
(12, 'Alam00', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '57755757', '1599577490b.PNG', '686868', '1599577490a.PNG', 0, '2020-09-08 15:04:50', '2020-09-08 15:04:50', NULL, NULL, 0),
(13, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '2323', '1599578870b.png', '2323', '1599578870a.png', 0, '2020-09-08 15:27:50', '2020-09-08 15:27:50', NULL, NULL, 0),
(14, 'Alam 99', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '232323', '1599578984b.png', '32323', '1599578984a.png', 0, '2020-09-08 15:29:44', '2020-09-08 15:29:44', NULL, NULL, 0),
(15, 'Alam56', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '2323', '1599579068b.png', '2323', '1599579068a.png', 0, '2020-09-08 15:31:08', '2020-09-08 15:31:08', NULL, NULL, 0),
(16, 'Alam55', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 2, 'mnc', 'QW', '1599579284b.png', '4334', '1599579284a.PNG', 1, '2020-09-08 15:34:44', '2020-09-08 15:34:44', NULL, NULL, 0),
(17, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', 'QW', '1599580298b.png', '232323', '1599580298a.PNG', 0, '2020-09-08 15:51:38', '2020-09-08 15:51:38', NULL, NULL, 0),
(18, 'Alam 444 88', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 2, 'mnc', '2323', '1599580526b.PNG', '232323', '1599580526a.png', 1, '2020-09-08 15:52:32', '2020-09-08 15:55:26', NULL, NULL, 0),
(19, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '32323', 'dv-1599628472.jpeg', '2323', 'avatar-1599628472.jpg', 0, '2020-09-08 15:56:54', '2020-09-11 11:15:04', NULL, NULL, 0),
(20, 'Alam II', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '232323', '1599580666b.png', '2323', '1599580666a.PNG', 0, '2020-09-08 15:57:46', '2020-09-09 07:11:43', NULL, NULL, 0),
(21, 'Hari33467', 'Sartono', 'rudi2@gmail.com', '', '081254637483', 'jalan nam nam 2 no 5', 3, 'Dcm', '224224242424', 'D:\\xampp\\tmp\\php3D20.tmp', '1325353335', 'D:\\xampp\\tmp\\php3D31.tmp', 1, '2020-09-08 15:58:32', '2020-09-09 07:11:34', NULL, NULL, 1),
(22, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 2, 'mnc', '232323', '1599582946b.PNG', '2323', '1599582946a.png', 1, '2020-09-08 16:35:46', '2020-09-08 18:01:18', NULL, NULL, 1),
(23, 'Hari334678', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 2, 'mnc', '2323', '1599582976b.PNG', '2323', '1599582976a.PNG', 1, '2020-09-08 16:36:16', '2020-09-09 05:44:37', NULL, NULL, 1),
(24, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '2323', '1599583019b.PNG', '2323', '1599583019a.PNG', 0, '2020-09-08 16:36:59', '2020-09-08 18:23:36', NULL, NULL, 1),
(25, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '43535', '1599588946dv.jpg', '64646346', '1599588946avatar.jpg', 1, '2020-09-08 17:20:55', '2020-09-08 18:16:09', NULL, NULL, 1),
(26, 'Alam 99', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '1213', '1599585761b.jpg', '313131', '1599585761a.jpg', 0, '2020-09-08 17:22:41', '2020-09-08 18:14:23', NULL, NULL, 1),
(27, 'Alam 44', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 2, 'mnc', '1313131313', '1599586068dv.jpeg', '123131313', NULL, 0, '2020-09-08 17:27:48', '2020-09-08 18:14:19', NULL, NULL, 1),
(28, 'Alam23499', 'Rachmatwe', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '232323', '1599588028dv.jpg', '23758282424', '1599588028avatar.jpg', 0, '2020-09-08 17:29:59', '2020-09-08 18:13:29', NULL, NULL, 1),
(29, 'Alam k r 2 3', 'Rachmat 2', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '1313', 'D:\\xampp\\tmp\\phpAF59.tmp', '1313', 'D:\\xampp\\tmp\\phpAF5A.tmp', 0, '2020-09-09 04:23:40', '2020-09-09 05:44:32', NULL, NULL, 1),
(30, 'Alam 2', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 2, 'mnc', '2323', '1599630386dv.jpeg', '1313', '1599630386avatar.jpg', 0, '2020-09-09 05:46:26', '2020-09-09 05:46:36', NULL, NULL, 1),
(31, 'Alam 3', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '222244', '1599814632dv.jpeg', '2242424', '1599814632avatar.jpg', 1, '2020-09-11 08:57:12', '2020-09-11 08:57:12', NULL, NULL, 0),
(32, 'Hari', 'Sartono', 'rudi@gmail.com', '', '081254637483', 'jalan nam nam 2 no 5', 1, 'Dcm', '224224242424', '/images/customers/avatar/1599814991dv.jpg', '1325353335', '/images/customers/driving-licence/1599814991avatar.jpg', 1, '2020-09-11 09:03:11', '2020-09-11 09:03:11', NULL, NULL, 0),
(33, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '242424', '/images/customers/avatar/1599815129dv.jpeg', '2324', '/images/customers/driving-licence/1599815129avatar.jpg', 0, '2020-09-11 09:05:29', '2020-09-11 09:05:29', NULL, NULL, 0),
(34, 'Wahyu', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '242424242424', '1599815338dv.jpeg', '242424242424', '1599815338avatar.jpg', 1, '2020-09-11 09:08:58', '2020-09-11 09:08:58', NULL, NULL, 0),
(35, 'Hari', 'Sartono', 'rudi@gmail.com', '', '081254637483', 'jalan nam nam 2 no 5', 1, 'Dcm', '224224242424', '1599815425dv.jpg', '1325353335', '1599815425avatar.jpg', 1, '2020-09-11 09:10:25', '2020-09-11 09:10:25', NULL, NULL, 0),
(36, 'Hari', 'Sartono', 'rudi@gmail.com', '', '081254637483', 'jalan nam nam 2 no 5', 1, 'Dcm', '224224242424', '1599815439dv.jpg', '1325353335', '1599815439avatar.jpg', 1, '2020-09-11 09:10:39', '2020-09-11 09:10:39', NULL, NULL, 0),
(37, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', '', '081253989207', 'Jalan nam nam 2 no 5', 1, 'mnc', '2323', '1599815512dv.jpg', '2324', '1599815512avatar.jpg', 0, '2020-09-11 09:11:52', '2020-09-11 09:11:52', NULL, NULL, 0),
(38, 'Hari', 'Sartono', 'rudi@gmail.com', '', '081254637483', 'jalan nam nam 2 no 5', 1, 'Dcm', '224224242424', '1599815525dv.jpg', '1325353335', '1599815525avatar.jpg', 1, '2020-09-11 09:12:05', '2020-09-11 09:12:05', NULL, NULL, 0),
(39, 'Hari', 'Sartono', 'rudi@gmail.com', '', '081254637483', 'jalan nam nam 2 no 5', 1, 'Dcm', '224224242424', '1599815573dv.jpg', '1325353335', '1599815573avatar.jpg', 1, '2020-09-11 09:12:54', '2020-09-11 09:12:54', NULL, NULL, 0),
(40, 'Hari', 'Sartono', 'rudi@gmail.com', '', '081254637483', 'jalan nam nam 2 no 5', 1, 'Dcm', '224224242424', '1599815639dv.jpg', '1325353335', '1599815639avatar.jpg', 1, '2020-09-11 09:13:59', '2020-09-11 09:13:59', NULL, NULL, 0),
(45, 'Rizki Febian', 'rachmat', 'alamrk.informatic@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'NxZ6EflHehaKw3WK95sY.jpeg', '335335', 'fPFfT4B5g71T7Jw7NNUb.jpg', 1, '2020-09-24 13:10:46', '2020-09-25 22:42:06', NULL, NULL, 0),
(46, 'Alam Rachmat', 'rachmat', 'alamrk.informatic45@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'Er9i9gq6BCsjYwrDAzEm.jpeg', '335335', '3nPzvtIcuaEnOSrGBJEe.jpg', 1, '2020-09-24 11:59:15', '2020-09-25 22:42:01', NULL, NULL, 0),
(47, 'Heri hartono', 'rachmat', 'alamrk.informatic45@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'FsfjWkZS9SgL9ale37oh.jpeg', '335335', 'g77GVcioEE4HOb7zKmNo.jpg', 1, '2020-09-24 11:55:50', '2020-09-25 22:41:51', NULL, NULL, 0),
(121, 'alam', 'rachmat', 'alamrk.informatic@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', '4eSkOY2piQgTlBnMt8ja.jpeg', '335335', 'TyddoKLo4f7MPhN3eA2v.jpg', 1, '2020-09-24 14:49:45', '2020-09-25 22:42:47', NULL, NULL, 0),
(122, 'alam', 'rachmat', 'alamrk.informatic10@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'e6C2AjS1NzdyMmx50AIA.jpeg', '335335', 'UzFGkdD2obZCL6pjmMxY.jpg', 1, '2020-09-25 16:40:43', '2020-09-25 22:42:49', NULL, NULL, 0),
(123, 'Alam', 'Rachmat', 'alamrk.informatic@gmail.com', NULL, '012742484', 'jalan nam nam 2 no 5', 1, 'DCM', '2424242424', '1601212866dv.jpeg', '3433', '1601212866avatar.jpg', 0, '2020-09-27 13:21:06', '2020-09-27 13:21:06', NULL, NULL, 0),
(124, 'alam', 'rachmat', 'alamrk.informatic12@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'hMkki8C9PQyNTDBfuG5x.jpeg', '335335', '85vtiSjYleZy2mFlMCT0.jpg', 1, '2020-09-29 15:07:05', NULL, NULL, NULL, 0),
(125, 'alam', 'rachmat', 'alamrk.informatic124@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'qi2A2ZErNgKTqhwwdMMs.jpeg', '335335', 'ry2YaiTBNfHcpYgKRgqS.jpg', 1, '2020-09-29 11:04:03', NULL, NULL, NULL, 0),
(126, 'alam', 'rachmat', 'alamrk.informaticc@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'A3XOlf7p3Qb9sZRT8dBm.jpeg', '335335', 'xz5ptQukyisAKFf4UljN.jpg', 1, '2020-09-29 11:05:39', NULL, NULL, NULL, 0),
(127, 'alam', 'rachmat', 'alamrk.informatic@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'sGPAMAXtRc9eS3Cj1wlB.jpeg', '335335', 'zKsairdTRt5HtQHAzXfQ.jpg', 1, '2020-09-30 08:18:02', NULL, NULL, NULL, 0),
(128, 'alam', 'rachmat', 'alamrk.informatic2@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'SDLMoTLXZalMKvEB4VpQ.jpeg', '335335', 'uYbPbZ9zR8LIsagvGVCL.jpg', 1, '2020-09-30 09:10:22', NULL, NULL, NULL, 0),
(129, 'alam', 'rachmat', 'alamrk.informatic3@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', '8P0ACxzxfAJfNb1DOdnD.jpeg', '335335', '7DaF6NcgnLo5WYsrTf9H.jpg', 1, '2020-09-30 10:08:06', NULL, NULL, NULL, 0),
(130, 'alam', 'rachmat', 'alamrk.informatic4@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'chQEjSVSQosZcijMQfqR.jpeg', '335335', 'MaWQMwL7bh16UWmqEBPK.jpg', 1, '2020-09-30 18:54:06', NULL, NULL, NULL, 0),
(131, 'alam', 'rachmat', 'alamrk.informatic@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'nBV6HHiz0CT9DJQB3Plq.jpeg', '335335', 'JWlOn8twaBNlcKEWHY07.jpg', 1, '2020-09-30 19:21:05', NULL, NULL, NULL, 0),
(132, 'alam', 'rachmat', 'alamrk.informatic2@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', '0nDLvfYFPocHExBMzOf4.jpeg', '335335', NULL, 1, '2020-09-30 20:02:30', '2020-09-30 20:21:45', NULL, NULL, 0),
(133, 'alam', 'rachmat', 'alamrk.informatic3@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'PycfzEXfrC3CBpQpyiFi.jpeg', '335335', 'rTYKO1kQnJZLvhAJG1qR.jpg', 1, '2020-09-30 20:22:31', NULL, NULL, NULL, 0),
(134, 'alam', 'rachmat', 'alamrk.informatic4@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'dT34l4tqQFBwz4Ahj4br.jpeg', '335335', '6EgPqMhci5gTb2EznDn2.jpg', 1, '2020-09-30 20:28:19', NULL, NULL, NULL, 0),
(135, 'alam', 'rachmat', 'alamrk.informatic5@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'hGGAfD9vhSxHh8axyLSP.jpeg', '335335', 'OTRn0c9lTPywE37O5UN0.jpg', 1, '2020-09-30 20:38:10', NULL, NULL, NULL, 0),
(136, 'alam', 'rachmat', 'alamrk.informatic6@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'NrMCrughDExHy3sVAyuj.jpeg', '335335', '8cc0TTGbQkhGFVXsx7jQ.jpg', 1, '2020-09-30 20:39:07', NULL, NULL, NULL, 0),
(137, 'alam', 'rachmat', 'alamrk.informatic7@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', '4N9c5Fg30WJ4YBXKiNFB.jpeg', '335335', 'xdtyKj7XNOCXHjcWjU2O.jpg', 1, '2020-09-30 20:55:48', NULL, NULL, NULL, 0),
(138, 'Anto2', 'rachmat', 'alamrk.informatic8@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', '6jTMxPqpzw75j1kUyGaZ.jpeg', '335335', NULL, 1, '2020-09-30 20:59:39', '2020-10-05 13:22:13', NULL, NULL, 0),
(139, 'Alam', 'Kurniawa', 'alamrk.informatic80@gmail.com', 'YWxhbXIxMjM=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'JeYUnhvC9cnHfY2cUNlh.jpeg', '335335', '34NKzWo9rulLKsvvxbL6.jpg', 0, '2020-10-03 23:51:51', NULL, NULL, NULL, 0),
(140, 'Alam', 'Kurniawan tes', 'alamrk.informatic801@gmail.com', 'YWxhbXJrMTIz', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'rEV2oPQXauvEeIuOEimA.jpeg', '335335', '042DAC8vmL2ftFCnYjEa.jpg', 1, '2020-10-04 00:10:06', NULL, NULL, NULL, 0),
(141, 'Alam', 'Kurniawan tes', 'alamrk.informatic802@gmail.com', 'YWxhbXJrMTIzNDU2Nzg=', '081253989207', 'jalan nam nam 2 no 5', 1, 'tes', '343335', 'mwQlE0XRSuhQTj1AIXaq.jpeg', '335335', 'kwcFRY6yalp5Xwo0T4rG.jpg', 1, '2020-10-04 20:22:08', '2020-10-04 21:33:20', NULL, NULL, 0),
(142, '1', '2', 'alamrk.informatic809@gmail.com', 'YWxhbXJrMTIz', '3', '4', 5, '6', '7', '45Svn8a5TxU335eRmZh9.jpeg', '8', 'uBBlxubuG9cRymNx1G0x.jpg', 9, '2020-10-05 13:27:34', '2020-10-05 13:42:15', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu_privilege`
--

CREATE TABLE `menu_privilege` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `new_orders`
--

CREATE TABLE `new_orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `customer_id` int(25) NOT NULL,
  `company_setting_id` int(25) NOT NULL,
  `due_date` datetime NOT NULL,
  `budget` decimal(20,0) DEFAULT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 : waiting approval admin, 1 : approval admin, 2 : reject',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_orders`
--

INSERT INTO `new_orders` (`id`, `name`, `customer_id`, `company_setting_id`, `due_date`, `budget`, `description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'House Cleaning', 47, 1, '2020-09-18 12:02:48', '100', 'basic care, move-in, and special care. The basic care service is at IDR320,000 and based on where you live. The SOP is a bedroom, bathroom, living room, kitchen. The move-in service is at IDR400,000 and dedicated to your new house. Move-in covers windows, balconies, and closets with ‘Basic Care’ cleaning. Meanwhile, the special care service is at IDR80,000 and only for one particular area of your place', 1, '2020-09-10 12:02:58', '2020-09-16 13:58:00', 1, 1),
(2, 'Car Servicing', 46, 2, '2020-09-14 16:59:11', '100', 'basic care, move-in, and special care. The basic care service is at IDR320,000 and based on where you live. The SOP is a bedroom, bathroom, living room, kitchen. The move-in service is at IDR400,000 and dedicated to your new house. Move-in covers windows, balconies, and closets with ‘Basic Care’ cleaning. Meanwhile, the special care service is at IDR80,000 and only for one particular area of your place', 1, '2020-09-18 16:59:20', '2020-09-19 01:42:20', 1, 1),
(3, 'Motor Servicing', 45, 2, '2020-09-17 16:59:11', '100', 'basic care, move-in, and special care. The basic care service is at IDR320,000 and based on where you live. The SOP is a bedroom, bathroom, living room, kitchen. The move-in service is at IDR400,000 and dedicated to your new house. Move-in covers windows, balconies, and closets with ‘Basic Care’ cleaning. Meanwhile, the special care service is at IDR80,000 and only for one particular area of your place', 1, '2020-09-18 16:59:20', '2020-09-19 04:36:34', 1, 1),
(4, 'Hospital Cleaning', 47, 2, '2020-09-17 16:59:11', '100', 'basic care, move-in, and special care. The basic care service is at IDR320,000 and based on where you live. The SOP is a bedroom, bathroom, living room, kitchen. The move-in service is at IDR400,000 and dedicated to your new house. Move-in covers windows, balconies, and closets with ‘Basic Care’ cleaning. Meanwhile, the special care service is at IDR80,000 and only for one particular area of your place', 0, '2020-09-18 16:59:20', '2020-09-17 07:44:46', 1, 1),
(5, 'Cuci', 12, 1, '2020-09-18 12:02:48', '12000', 'tes', 1, '2020-10-03 13:33:11', NULL, NULL, NULL),
(6, 'Cuci', 12, 1, '2020-09-18 12:02:48', '12000', 'tes', 1, '2020-10-03 13:34:21', NULL, NULL, NULL),
(7, 'Cuci', 12, 1, '2020-09-18 12:02:48', '12000', 'tes', 1, '2020-10-05 14:51:27', NULL, NULL, NULL),
(8, 'Cuci', 12, 1, '2021-09-18 12:02:48', '12000', 'tes', 1, '2020-10-05 15:14:38', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `new_order_id` int(11) DEFAULT NULL,
  `work_order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `new_order_id`, `work_order_id`) VALUES
(1, 3, 1),
(2, 2, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `work_orders`
--

CREATE TABLE `work_orders` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 : cancel, 1 : ongoing, 2 : ready, 3 : pending',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_orders`
--

INSERT INTO `work_orders` (`id`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 3, '2020-09-14 10:35:07', '2020-09-14 10:35:10', 1, 1),
(2, 2, '2020-09-14 10:35:07', '2020-09-14 10:35:10', 1, 1),
(3, 3, '2020-09-14 19:16:58', '2020-09-14 19:17:00', 1, 1),
(4, 1, '2020-10-03 11:26:10', NULL, NULL, NULL),
(5, 1, '2020-10-03 11:26:12', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biddings`
--
ALTER TABLE `biddings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance`
--
ALTER TABLE `insurance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_privilege`
--
ALTER TABLE `menu_privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_orders`
--
ALTER TABLE `new_orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_orders`
--
ALTER TABLE `work_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biddings`
--
ALTER TABLE `biddings`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `insurance`
--
ALTER TABLE `insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_privilege`
--
ALTER TABLE `menu_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_orders`
--
ALTER TABLE `new_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_orders`
--
ALTER TABLE `work_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
