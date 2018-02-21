-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2018 at 01:45 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shivcarg_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `fstname` varchar(100) NOT NULL,
  `lstname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contct` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `lastloginip` varchar(300) NOT NULL,
  `lastlogindate` datetime NOT NULL,
  `logintoken` varchar(300) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `lastpswd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fstname`, `lstname`, `email`, `username`, `password`, `contct`, `address`, `image`, `lastloginip`, `lastlogindate`, `logintoken`, `regdate`, `status`, `lastpswd`) VALUES
(1, 'manjar', 'hussain', 'hussainmanjar44@gmail.com', 'hussainmanjar44@gmail.com', 'admin', '9845216250', 'gaur nepal', '', '1.187.39.110', '2017-09-17 20:01:43', '9lb2pftczis8h43', '2017-09-17 20:01:43', '1', ''),
(5, 'nashim', 'akhtar', 'nashimnx@gmail.com', 'nashimnx@gmail.com', 'admin', '9874561232', 'new delhi ', '', '::1', '2016-02-11 08:58:12', 'ap5h3ob9r2nzlwj', '2017-08-06 01:49:06', '1', 'manjar'),
(6, 'demo', 'demo', 'demo@gmail.com', 'demo@gmail.com', 'demo', '', '', '', '::1', '2018-02-17 13:09:08', '1cgej0yvbkdtlzo', '2018-02-17 12:09:08', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bokid` int(11) NOT NULL,
  `boklrno` varchar(255) NOT NULL,
  `bokdate` date NOT NULL,
  `boktime` time NOT NULL,
  `bok_senderid` int(11) NOT NULL,
  `bok_reciverid` int(11) NOT NULL,
  `bok_srccitybranchid` int(11) NOT NULL,
  `bok_descityid` int(11) NOT NULL,
  `bok_cityplaceid` int(11) NOT NULL DEFAULT '0',
  `bok_paymode` varchar(255) NOT NULL,
  `bok_parcel` varchar(255) NOT NULL,
  `bok_weight` varchar(100) NOT NULL,
  `bok_pivatemark` varchar(255) NOT NULL,
  `bok_item` varchar(255) NOT NULL,
  `bok_freight` varchar(255) NOT NULL,
  `bok_hamali` varchar(255) NOT NULL,
  `bok_others` varchar(255) NOT NULL,
  `bok_gst` varchar(255) NOT NULL,
  `bok_total` varchar(255) NOT NULL,
  `bok_addeddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bok_remark` text NOT NULL,
  `bok_addedby` int(11) NOT NULL,
  `bok_status` int(11) NOT NULL DEFAULT '0',
  `bok_amt` varchar(255) NOT NULL,
  `bok_privatemark` text NOT NULL,
  `bok_loaddate` date NOT NULL,
  `bok_dispatchdate` date NOT NULL,
  `bok_drivername` varchar(255) NOT NULL,
  `bok_drivermobile` varchar(255) NOT NULL,
  `bok_vehicleno` varchar(100) NOT NULL,
  `bok_memo_total` varchar(100) NOT NULL,
  `bok_memo` varchar(255) NOT NULL,
  `amountdeclare_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bokid`, `boklrno`, `bokdate`, `boktime`, `bok_senderid`, `bok_reciverid`, `bok_srccitybranchid`, `bok_descityid`, `bok_cityplaceid`, `bok_paymode`, `bok_parcel`, `bok_weight`, `bok_pivatemark`, `bok_item`, `bok_freight`, `bok_hamali`, `bok_others`, `bok_gst`, `bok_total`, `bok_addeddate`, `bok_remark`, `bok_addedby`, `bok_status`, `bok_amt`, `bok_privatemark`, `bok_loaddate`, `bok_dispatchdate`, `bok_drivername`, `bok_drivermobile`, `bok_vehicleno`, `bok_memo_total`, `bok_memo`, `amountdeclare_desc`) VALUES
(1, 'C19933', '2017-11-17', '04:22:57', 1, 12, 1, 1, 0, 'To pay', 'Big ', '', 'yes', '2', '1009', '100', '75', '5', '1184', '2017-08-27 11:17:29', 'zxczxczx', 6, 0, '10', 'mm', '2017-08-31', '2017-09-21', 'sunil', '9764129236', 'mh12-5151', '90', '1584', ''),
(2, 'C18722', '2017-08-30', '09:56:22', 1, 1, 1, 1, 0, 'To pay', 'Small', '', '42', '4', '52', '552', '52', '555', '1211', '2017-08-30 16:11:58', 'cjcxjh', 1, 1, '20', 'll', '2017-08-31', '2017-09-21', 'sunil9090', '5656', 'mh12-5151', '89', '1584', ''),
(3, 'C23833', '2017-08-30', '09:56:59', 3, 3, 2, 2, 0, 'To pay', 'Small', '', 'nmmmnb', '4', '445', '4545', '545', '545', '6080', '2017-08-30 16:12:43', 'ncmn', 1, 1, '10', 'kk', '2017-08-31', '2017-09-21', 'fgjhbl', '9898', '0989079', '', '2584', ''),
(7, 'C27920', '2017-09-01', '01:14:59', 7, 8, 2, 2, 0, 'To pay', 'Small', '', '', '34', '', '', '', '', '0', '2017-09-01 07:31:56', '', 1, 1, '90', 'hh', '2017-09-01', '0000-00-00', '', '0', '', '', '2741', ''),
(8, 'C16660', '2017-09-01', '01:17:00', 8, 9, 1, 2, 0, 'To pay', 'Small', '', '', '12', '', '', '', '', '0', '2017-09-01 07:33:10', '', 1, 1, '67', 'jsa', '2017-09-01', '0000-00-00', '', '0', '', '', ' 2741', ''),
(9, '1071', '2017-09-01', '04:24:25', 9, 10, 1, 7, 0, 'Paid', 'Big ', '', '548/2', '1', '', '', '', '', '0', '2017-09-01 10:41:27', '', 1, 1, '210', '00', '2017-09-01', '0000-00-00', '', '0', '', '', '7391', ''),
(10, '800', '2017-09-01', '04:26:30', 10, 11, 1, 7, 0, 'Paid', 'Big ', '', '', '2', '420', '', '', '', '420', '2017-09-01 10:43:22', '', 1, 1, '210', '0', '2017-09-04', '0000-00-00', '', '0', '', '', ' 7956', ''),
(11, '951', '2017-09-01', '04:28:25', 10, 11, 1, 7, 0, 'Paid', 'Big ', '', '', '2', '420', '', '', '', '420', '2017-09-01 10:44:12', '', 1, 1, '210', '0', '2017-10-06', '0000-00-00', 'dffsd', '12323', '89876', '', '787796', ''),
(12, '1069', '2017-09-01', '04:29:15', 11, 12, 1, 7, 0, 'Paid', 'Small', '', '', '2', '420', '', '', '', '420', '2017-09-01 10:46:58', '', 1, 1, '420', '0', '2017-09-01', '0000-00-00', '', '0', '', '', ' 7391', ''),
(13, '1070', '2017-09-01', '04:32:06', 9, 13, 1, 7, 0, 'Paid', 'Big ', '', '529/1', '1', '210', '', '', '', '210', '2017-09-01 10:54:46', '', 1, 1, '210', '00', '2017-09-01', '0000-00-00', '', '0', '', '', ' 7391', ''),
(14, 'C12378', '2017-09-04', '12:20:55', 12, 14, 1, 7, 0, 'To pay', 'Big ', '', '', '7', '', '', '', '', '0', '2017-09-03 18:36:58', '', 1, 1, '210', '0', '2017-09-04', '0000-00-00', '', '0', '', '', ' 7662', ''),
(15, 'C16571', '2017-09-04', '12:22:01', 12, 14, 1, 7, 0, 'To pay', 'Small', '', '', '2', '', '', '', '', '0', '2017-09-03 18:37:26', '', 1, 1, '210', '0', '2017-09-04', '0000-00-00', '', '0', '', '', ' 7662', ''),
(16, 'C26980', '2017-09-04', '12:22:29', 12, 14, 2, 7, 0, 'To pay', 'Small', '', '', '1', '', '', '', '', '0', '2017-09-03 18:38:00', '', 1, 1, '210', '0', '2017-09-04', '0000-00-00', '', '0', '', '', ' 7662', ''),
(17, 'C13283', '2017-09-04', '12:23:03', 12, 14, 1, 7, 0, 'To pay', 'Small', '', '', '3', '', '', '', '', '0', '2017-09-03 18:38:41', '', 1, 1, '210', '0', '2017-09-04', '0000-00-00', '', '0', '', '', ' 7662', ''),
(18, 'C19269', '2017-09-04', '12:52:36', 12, 14, 1, 7, 0, 'To pay', 'Small', '', '', '2', '290', '', '', '', '280', '2017-09-03 19:08:02', '', 1, 1, '5000', 'sunil 123', '2017-10-06', '0000-00-00', 'dffsd', '12323', '89876', '', '787796', ''),
(19, 'C19833', '2017-09-05', '04:02:37', 12, 14, 1, 1, 0, 'To pay', 'Big ', '', '22', '5', '', '', '', '', '0', '2017-09-05 10:19:33', '', 1, 1, '255', '0', '2017-09-06', '0000-00-00', '', '0', 'MH12-7171', '100', '1704', ''),
(20, 'C1160', '2017-09-05', '04:04:53', 12, 14, 1, 1, 0, 'To pay', 'Big ', '', '22', '5', '', '', '', '', '0', '2017-09-05 10:20:28', '', 1, 1, '230', '0', '2017-09-06', '0000-00-00', '', '0', 'MH12-7171', '100', '1704', ''),
(21, '31146', '2017-09-05', '04:30:51', 13, 15, 1, 9, 0, 'To pay', 'Big ', '', '', '3', '', '', '', '', '0', '2017-09-05 10:47:32', '', 1, 1, '1000', 'me sunil', '2017-09-25', '0000-00-00', 'sunil kk', '5009', 'MH 30 6945', '', '948364', ''),
(22, '31143', '2017-09-05', '04:36:59', 9, 16, 1, 10, 0, 'To pay', 'Big ', '', '138/1', '1', '', '', '', '', '0', '2017-09-05 10:54:07', '', 1, 1, '1111', 'edrfsdfasd', '2017-09-25', '0000-00-00', 'smk 22', '9191', 'MH50 1212', '', '1085299', ''),
(23, '', '2017-09-29', '08:15:42', 14, 17, 0, 0, 0, '', '', '', '', '', '', '', '', '', '0', '2017-09-29 02:31:45', '', 6, 0, '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(24, '', '2017-09-29', '09:04:47', 14, 17, 0, 0, 0, '', '', '', '', '', '', '', '', '', '0', '2017-09-29 03:22:15', '', 6, 0, '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(26, 'C6666', '2017-09-29', '09:27:26', 14, 17, 1, 9, 0, 'To pay', 'Big ', '', '', '', '12', '', '', '', '0', '2017-09-29 03:43:23', '', 6, 1, '', '', '2017-10-06', '0000-00-00', 'sunil', '6658', '12323', '', '96636', ''),
(27, '', '2017-09-29', '09:31:01', 14, 17, 0, 0, 0, '', '', '', '', '', '', '', '', '', '0', '2017-09-29 03:47:14', '', 6, 0, '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(29, 'B1891', '2017-11-17', '04:22:02', 1, 2, 1, 1, 0, 'To pay', 'Big ', '', '', '3', '0', '5', '5', '', '10', '2017-10-11 07:51:03', '', 6, 1, '', '', '2017-10-11', '0000-00-00', 'sunil khandare', '123', 'MH17 321', '110', '138636', ''),
(30, 'B15611', '2017-11-17', '04:21:20', 13, 5, 1, 1, 0, 'To pay', 'Big ', '', '', '2', '101', '0', '0', '18', '101', '2017-11-15 08:22:12', '', 6, 0, '', '', '2017-11-16', '0000-00-00', 'fsadfsdfa3232', '3232', 'MH17 322', '100', '46843', ''),
(31, 'B19032', '2017-11-17', '04:44:20', 10, 4, 1, 1, 3, 'To pay', 'Big ', '', '', '2', '0', '0', '0', '', '0', '2017-11-17 10:59:42', '', 6, 0, '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', ''),
(32, 'B14703', '2017-11-21', '08:42:10', 16, 10, 1, 1, 3, 'To pay', 'Big ', '', '', '3', '0', '0', '0', '', '0', '2017-11-21 15:00:09', '', 6, 0, '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `des_cities`
--

CREATE TABLE `des_cities` (
  `dcty_id` int(11) NOT NULL,
  `dcty_name` varchar(255) NOT NULL,
  `dcty_transport_name` varchar(255) NOT NULL,
  `dcty_transport_add` varchar(255) NOT NULL,
  `dcty_transport_mobno` varchar(255) NOT NULL,
  `dcty_regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dcty_cutrate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `des_cities`
--

INSERT INTO `des_cities` (`dcty_id`, `dcty_name`, `dcty_transport_name`, `dcty_transport_add`, `dcty_transport_mobno`, `dcty_regdate`, `dcty_cutrate`) VALUES
(1, 'Mumbai', 'mmmm', 'mmm', '5552252255', '2017-08-22 09:02:24', '0'),
(2, 'Pune', 'aaaa', 'aaaaa', '5454545455', '2017-08-22 09:02:24', '0'),
(4, 'Lonaval', 'manjar', 'khushgaon', '5465465464654', '2017-08-22 09:07:22', '0'),
(5, 'kl', 'klkl', 'kl', '54654654654', '2017-08-30 14:01:49', '545'),
(6, 'Nasik', 'SHRI INDANI TRAVELS', 'NASIK', '9422245598', '2017-09-01 10:38:27', '0'),
(7, 'MALEGAON', 'UNCLE TRAVELS', 'MALEGAON', 'NA', '2017-09-01 10:39:19', '0'),
(8, 'Ahmadnagar', 'Shri Darshan transport', 'midc ahmadnagar', '9822811197', '2017-09-05 10:42:59', '6'),
(9, 'LATUR', 'SHRI SHAH ROADWAYS', 'LATUR', '9423719741', '2017-09-05 10:45:05', '6'),
(10, 'PARLI', 'NEW SHAKTI TRANSPORT', 'PARLI', '9695698666', '2017-09-05 10:45:43', '6');

-- --------------------------------------------------------

--
-- Table structure for table `des_city_place`
--

CREATE TABLE `des_city_place` (
  `dcplace_id` int(11) NOT NULL,
  `dcplace_ctyid` int(11) NOT NULL,
  `dcplace_name` varchar(255) NOT NULL,
  `dcplace_crossing` varchar(255) NOT NULL,
  `dcplace_regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `des_city_place`
--

INSERT INTO `des_city_place` (`dcplace_id`, `dcplace_ctyid`, `dcplace_name`, `dcplace_crossing`, `dcplace_regdate`) VALUES
(3, 1, 'andheri', '13', '2017-08-22 09:25:07'),
(4, 1, 'msms', '112', '2017-08-30 13:49:15'),
(5, 1, 'mamama', '54545', '2017-08-30 13:50:19'),
(6, 1, 'mamama', '54545', '2017-08-30 13:50:51'),
(7, 1, 'mamama', '54545', '2017-08-30 13:51:26'),
(8, 1, 'mmmm', '444', '2017-08-30 14:03:53'),
(9, 1, 'fgfgfgdfg', '45545', '2017-08-30 14:05:57'),
(10, 1, 'mn mnsbzmnbm', '5454', '2017-08-30 14:06:52'),
(11, 8, 'Sangamner', '0', '2017-09-05 10:43:38'),
(12, 8, 'LONI', '0', '2017-09-05 10:44:02'),
(13, 6, 'SATPUR', '0', '2017-09-05 10:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driv_id` int(11) NOT NULL,
  `driv_name` varchar(255) NOT NULL,
  `driv_tranname` varchar(255) NOT NULL,
  `driv_vehicelno` varchar(255) NOT NULL,
  `driv_mobno` varchar(255) NOT NULL,
  `driv_address` varchar(255) NOT NULL,
  `driv_regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driv_id`, `driv_name`, `driv_tranname`, `driv_vehicelno`, `driv_mobno`, `driv_address`, `driv_regdate`) VALUES
(2, 'mahtab', 'Sivhnery', '5454545', '5545545645', 'nepal', '2017-08-24 04:43:15'),
(3, 'AA', '', '7707', '9999999999', 'AA', '2017-09-05 10:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `recipt`
--

CREATE TABLE `recipt` (
  `recptid` int(11) NOT NULL,
  `recptmemono` varchar(255) NOT NULL,
  `recptamt` varchar(255) NOT NULL,
  `recptstatus` int(11) NOT NULL DEFAULT '0',
  `recptdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipt`
--

INSERT INTO `recipt` (`recptid`, `recptmemono`, `recptamt`, `recptstatus`, `recptdate`) VALUES
(1, '1696', '100', 1, '2017-08-31 19:47:30'),
(2, '2696', '200', 1, '2017-08-31 19:48:13'),
(3, '2696', '300', 1, '2017-08-31 19:48:29'),
(4, '1547', '100', 1, '2017-09-01 10:33:42'),
(5, '1547', '100', 1, '2017-09-01 10:33:42'),
(6, '1547', '100', 1, '2017-09-01 10:35:10'),
(7, '7662', '0', 1, '2017-09-27 03:41:02'),
(8, '1584', '', 1, '2017-09-27 06:20:28'),
(9, '1584', '', 1, '2017-09-27 06:20:47'),
(10, '1584', '2', 1, '2017-09-27 06:23:45'),
(11, '1584', '2', 1, '2017-09-27 06:33:51'),
(12, '1584', '6', 1, '2017-09-27 06:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `recivers`
--

CREATE TABLE `recivers` (
  `recvid` int(11) NOT NULL,
  `recvname` varchar(255) NOT NULL,
  `recvaddress` varchar(255) NOT NULL,
  `recvmobile` varchar(255) NOT NULL,
  `recvgstno` varchar(255) NOT NULL,
  `recvregdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recivers`
--

INSERT INTO `recivers` (`recvid`, `recvname`, `recvaddress`, `recvmobile`, `recvgstno`, `recvregdate`) VALUES
(1, 'mahtab', 'gaur', '85465465464', '4321', '2017-08-18 11:12:28'),
(2, 'amzad', 'bhagwanpur', '546546546465', '5879878', '2017-08-18 11:58:03'),
(3, 'mnbmbmnb', 'nbnbnbnbnm', '588\\87', '55454', '2017-08-30 16:12:43'),
(4, 'lll', 'kkkkk', '54654654654', '546565', '2017-08-31 17:49:14'),
(5, 'mmmm', 'mmmm', '87987987987', '8798797', '2017-08-31 17:49:45'),
(6, 'Hshshsh', 'Chhangani nagar near ram mandir.', '1234567890', '9999999', '2017-09-01 03:52:08'),
(7, 'dsadfg', 'qwerdsadf', '444444444', '432156789', '2017-09-01 07:08:49'),
(8, 'darshan', 'adadadaddada', '88888888', '12345678', '2017-09-01 07:31:56'),
(9, 'darshan kjasra', 'darshan ', '89898989', '21212211', '2017-09-01 07:33:10'),
(10, 'M/S INDIAN SADI', 'MALEGAON', '9999999999', '27AANHR1826G12Y', '2017-09-01 10:41:27'),
(11, 'SANVI COLLECTION', 'NAMPUR', '9999999999', 'UR', '2017-09-01 10:43:22'),
(12, 'SHRI PARAS SUPER FASHION', 'MALEGAON', '9999999999', '27AAGFS1504B1ZR', '2017-09-01 10:46:58'),
(13, 'M/S INDIAN SADI', 'MALEGAON', '95651456524', '27AANHR1826G1ZY', '2017-09-01 10:54:46'),
(14, 'ashish', 'na', 'na', '2222', '2017-09-03 18:36:58'),
(15, 'BALAJI HOSIERY', 'LATUR', '9999999999', '27AAFPL8892C1ZF', '2017-09-05 10:47:32'),
(16, 'PRATHAM CHILDREN WORLD', 'NA', 'NA', '27BCWPP617C1ZP', '2017-09-05 10:54:07'),
(17, 'ank', '2323', '9898', '', '2017-09-29 02:31:45'),
(18, 'tin', 'ltr', '9090', '53535', '2017-10-06 03:31:16'),
(19, 'tin', 'ltr', '9090', '123', '2017-10-06 05:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `sender`
--

CREATE TABLE `sender` (
  `sendid` int(11) NOT NULL,
  `sendname` varchar(255) NOT NULL,
  `sendaddress` varchar(255) NOT NULL,
  `sendmobile` varchar(255) NOT NULL,
  `sendgstno` varchar(255) NOT NULL,
  `sendregdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sender`
--

INSERT INTO `sender` (`sendid`, `sendname`, `sendaddress`, `sendmobile`, `sendgstno`, `sendregdate`) VALUES
(1, 'manjar', 'nepal', '5465654654', '123', '2017-08-18 11:12:11'),
(2, 'dablu', 'kthm', '54654654', '454', '2017-08-18 11:58:03'),
(3, 'jbjjh', 'jhhkjh', '89798797', '545', '2017-08-30 16:12:43'),
(4, 'mmm', 'mmmm', '4444555555', '54546', '2017-08-31 17:49:14'),
(5, 'Darahan', 'Chhangani nagar near ram mandir.', '0000000000', '192827', '2017-09-01 03:52:08'),
(6, 'abcd', 'asdfg', '5555555555', '1234567890', '2017-09-01 07:08:49'),
(7, 'sasasasaa', 'dasasddada', '11111111', '1212112121', '2017-09-01 07:31:56'),
(8, 'darshan sharma', 'kkkkkk', '0000000000', 'darshansa', '2017-09-01 07:33:10'),
(9, 'S M R ENTERPRISES', 'BUSYLAND', '9999999999', '27ADAFS9982J1ZC', '2017-09-01 10:41:27'),
(10, 'BOMBAY FASHION', 'CITYLAND', '9999999999', '27ABYPN8102D1ZF', '2017-09-01 10:43:22'),
(11, 'TIRUPATI APPRELS', 'BUSYLAND', '9999999999', '27ADEPA5957B1ZY', '2017-09-01 10:46:58'),
(12, 'akash', 'na', 'na', '2222', '2017-09-03 18:36:58'),
(13, 'SHRI SHIV SONS', 'BUSYLAND', '999999999', '27ACUFS4606E1ZU', '2017-09-05 10:47:32'),
(14, 'smk', 'ltr', '9898', '', '2017-09-29 02:31:45'),
(15, 'vin', 'latur', '7878', '6565', '2017-10-06 03:31:16'),
(16, 'sunil mkk', 'paral', '02021992', '02029191', '2017-10-11 10:56:42'),
(17, 'sunil mkk', 'paral', '02021992', 'select', '2017-10-11 11:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `src_cities`
--

CREATE TABLE `src_cities` (
  `src_id` int(11) NOT NULL,
  `src_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `src_cities`
--

INSERT INTO `src_cities` (`src_id`, `src_name`) VALUES
(1, 'Amravati ');

-- --------------------------------------------------------

--
-- Table structure for table `src_cities_branch`
--

CREATE TABLE `src_cities_branch` (
  `scbrnch_id` int(11) NOT NULL,
  `scbrnch_sctyid` int(11) NOT NULL,
  `scbrnch_name` varchar(255) NOT NULL,
  `scbrnch_regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `src_cities_branch`
--

INSERT INTO `src_cities_branch` (`scbrnch_id`, `scbrnch_sctyid`, `scbrnch_name`, `scbrnch_regdate`) VALUES
(1, 1, 'Busy Land', '2017-08-27 10:46:24'),
(2, 1, 'City Land', '2017-08-27 10:46:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bokid`);

--
-- Indexes for table `des_cities`
--
ALTER TABLE `des_cities`
  ADD PRIMARY KEY (`dcty_id`);

--
-- Indexes for table `des_city_place`
--
ALTER TABLE `des_city_place`
  ADD PRIMARY KEY (`dcplace_id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driv_id`);

--
-- Indexes for table `recipt`
--
ALTER TABLE `recipt`
  ADD PRIMARY KEY (`recptid`);

--
-- Indexes for table `recivers`
--
ALTER TABLE `recivers`
  ADD PRIMARY KEY (`recvid`);

--
-- Indexes for table `sender`
--
ALTER TABLE `sender`
  ADD PRIMARY KEY (`sendid`);

--
-- Indexes for table `src_cities`
--
ALTER TABLE `src_cities`
  ADD PRIMARY KEY (`src_id`);

--
-- Indexes for table `src_cities_branch`
--
ALTER TABLE `src_cities_branch`
  ADD PRIMARY KEY (`scbrnch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bokid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `des_cities`
--
ALTER TABLE `des_cities`
  MODIFY `dcty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `des_city_place`
--
ALTER TABLE `des_city_place`
  MODIFY `dcplace_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `recipt`
--
ALTER TABLE `recipt`
  MODIFY `recptid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `recivers`
--
ALTER TABLE `recivers`
  MODIFY `recvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sender`
--
ALTER TABLE `sender`
  MODIFY `sendid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `src_cities`
--
ALTER TABLE `src_cities`
  MODIFY `src_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `src_cities_branch`
--
ALTER TABLE `src_cities_branch`
  MODIFY `scbrnch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
