-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2021 at 10:35 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etailor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(2) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`) VALUES
(1, 'ADMIN', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_btqhelp`
--

DROP TABLE IF EXISTS `tbl_btqhelp`;
CREATE TABLE IF NOT EXISTS `tbl_btqhelp` (
  `bh_id` int(10) NOT NULL AUTO_INCREMENT,
  `btq_id` int(10) NOT NULL,
  `bh_email` varchar(50) NOT NULL,
  `bh_sub` varchar(50) NOT NULL,
  `bh_msg` varchar(200) NOT NULL,
  `bh_status` varchar(2) NOT NULL,
  PRIMARY KEY (`bh_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_btqreg`
--

DROP TABLE IF EXISTS `tbl_btqreg`;
CREATE TABLE IF NOT EXISTS `tbl_btqreg` (
  `btq_id` int(2) NOT NULL AUTO_INCREMENT,
  `btq_name` varchar(30) NOT NULL,
  `btq_owner` varchar(30) NOT NULL,
  `btq_address` varchar(100) NOT NULL,
  `btq_email` varchar(50) NOT NULL,
  `btq_phone` varchar(10) NOT NULL,
  `btq_lic` varchar(5) NOT NULL,
  `btq_status` varchar(2) NOT NULL,
  PRIMARY KEY (`btq_id`),
  UNIQUE KEY `btq_email` (`btq_email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_btqreg`
--

INSERT INTO `tbl_btqreg` (`btq_id`, `btq_name`, `btq_owner`, `btq_address`, `btq_email`, `btq_phone`, `btq_lic`, `btq_status`) VALUES
(25, 'THERESA BTQ', 'TREESA', 'ERNAKULAM', 'karthikasureshbabu@mca.ajce.in', '9061619885', 'B789', 'A'),
(26, 'PRIYA', 'HARIPRIYA', 'KOTTAYAM', 'anil.piyaa28@gmail.com', '9632584856', 'B004', 'A'),
(29, 'Karthika', 'Karthika', 'Ammikattu House,\r\nKanjiramattom,\r\nThodupuzha', 'karthikasuresh185@gmail.com', '9654875236', 'B666', 'A'),
(30, 'YAMI', 'YAMIKA', 'rth', 'yam@gmail.com', '9632589635', 'B444', 'A'),
(31, 'eva', 'eva', 'dfghjk', 'eva@gmail.com', '9854852154', 'B668', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(2) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(10) NOT NULL,
  `cat_status` varchar(10) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name` (`cat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_status`) VALUES
(22, 'SKIRT', 'A'),
(24, 'FROCKKK', 'A'),
(25, 'skirttt', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

DROP TABLE IF EXISTS `tbl_color`;
CREATE TABLE IF NOT EXISTS `tbl_color` (
  `col_id` int(5) NOT NULL AUTO_INCREMENT,
  `col_name` varchar(50) NOT NULL,
  `col_code` char(7) NOT NULL,
  `col_status` varchar(2) NOT NULL,
  PRIMARY KEY (`col_id`),
  UNIQUE KEY `col_name` (`col_name`),
  UNIQUE KEY `col_code` (`col_code`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`col_id`, `col_name`, `col_code`, `col_status`) VALUES
(1, 'RED', '#FF0000', 'A'),
(2, 'BLUE', '#0000FF', ''),
(3, 'ORANGE', '#FF6600', 'A'),
(4, 'BLACK', '#000000', 'A'),
(5, 'WHITE', '#FFFFFF', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custhelp`
--

DROP TABLE IF EXISTS `tbl_custhelp`;
CREATE TABLE IF NOT EXISTS `tbl_custhelp` (
  `ch_id` int(10) NOT NULL AUTO_INCREMENT,
  `cust_id` int(10) NOT NULL,
  `ch_mail` varchar(50) NOT NULL,
  `ch_phn` int(10) NOT NULL,
  `ch_sub` varchar(100) NOT NULL,
  `ch_msg` varchar(500) NOT NULL,
  `ch_status` varchar(2) NOT NULL,
  PRIMARY KEY (`ch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_custhelp`
--

INSERT INTO `tbl_custhelp` (`ch_id`, `cust_id`, `ch_mail`, `ch_phn`, `ch_sub`, `ch_msg`, `ch_status`) VALUES
(1, 10, 'mahima@gmail.com', 2147483647, 'fghj', 'fghjk', ''),
(2, 10, 'mahima@gmail.com', 2147483647, 'fghj', 'fghjk', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customiseform`
--

DROP TABLE IF EXISTS `tbl_customiseform`;
CREATE TABLE IF NOT EXISTS `tbl_customiseform` (
  `custform_id` int(2) NOT NULL AUTO_INCREMENT,
  `cust_id` int(2) NOT NULL,
  `custform_btq` varchar(50) NOT NULL,
  `custform_mail` varchar(20) NOT NULL,
  `custform_phn` varchar(12) NOT NULL,
  `custform_cat` varchar(20) NOT NULL,
  `custform_subcat` varchar(20) NOT NULL,
  `custform_mat` varchar(20) NOT NULL,
  `custform_measure` varchar(100) NOT NULL,
  `custform_sug` varchar(200) NOT NULL,
  `custform_date` date NOT NULL,
  `custform_status` int(11) NOT NULL,
  PRIMARY KEY (`custform_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customiseform`
--

INSERT INTO `tbl_customiseform` (`custform_id`, `cust_id`, `custform_btq`, `custform_mail`, `custform_phn`, `custform_cat`, `custform_subcat`, `custform_mat`, `custform_measure`, `custform_sug`, `custform_date`, `custform_status`) VALUES
(1, 10, '25', 'mahima@gmail.com', '9856214582', '14', '5', '3', '12', 'qwert', '0000-00-00', 0),
(2, 10, '25', 'mahima@gmail.com', '9856214582', '14', '5', 'cotton', '22', 'qwert', '0000-00-00', 0),
(3, 10, '25', 'mahima@gmail.com', '9856214582', '', '5', '3', '25', 'sdfgh', '0000-00-00', 0),
(4, 10, '25', 'mahima@gmail.com', '9856214582', '14', '5', '3', '55', 'hjk', '0000-00-00', 0),
(5, 10, '25', 'mahima@gmail.com', '9856214582', '14', '5', '3', '23', 'edfghj', '0000-00-00', 0),
(6, 11, '25', 'meenu@gmail.com', '8563215478', '14', '5', '3', '23', 'ertyui', '0000-00-00', 0),
(7, 10, '25', 'mahima@gmail.com', '9856214582', '22', '8', '3', '21,22,24', 'fghjk', '0000-00-00', 0),
(8, 10, '25', 'mahima@gmail.com', '9856214582', '22', '8', '3', '21,22,24', 'fghjk', '0000-00-00', 0),
(9, 11, '', 'meenu@gmail.com', '8563215478', '', '', '', '', '', '0000-00-00', 0),
(10, 11, '25', 'meenu@gmail.com', '8563215478', '22', '8', '3', '25,24,26', 'fghj', '2021-06-06', 1),
(11, 10, '25', 'mahima@gmail.com', '9856214582', '22', '8', '3', '21,22,23,25', 'ghjk', '2021-06-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customiseform1`
--

DROP TABLE IF EXISTS `tbl_customiseform1`;
CREATE TABLE IF NOT EXISTS `tbl_customiseform1` (
  `form_id` int(2) NOT NULL AUTO_INCREMENT,
  `cust_id` int(2) NOT NULL,
  `form_email` varchar(50) NOT NULL,
  `form_phone` varchar(10) NOT NULL,
  `form_cat` varchar(20) NOT NULL,
  `form_subcat` varchar(20) NOT NULL,
  `form_mat` varchar(20) NOT NULL,
  `form_measure` varchar(200) NOT NULL,
  `form_sug` varchar(500) NOT NULL,
  `form_date` date NOT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customiseform1`
--

INSERT INTO `tbl_customiseform1` (`form_id`, `cust_id`, `form_email`, `form_phone`, `form_cat`, `form_subcat`, `form_mat`, `form_measure`, `form_sug`, `form_date`) VALUES
(1, 10, 'mahima@gmail.com', '9856214582', '', '', 'cotton', '22', 'qwert', '0000-00-00'),
(2, 10, 'mahima@gmail.com', '9856214582', '', '', 'kjj', '22,21', 'qwert', '0000-00-00'),
(3, 10, 'mahima@gmail.com', '9856214582', '22', '8', 'dhjie', '22,23,26,21,23', 'ghjm,', '0000-00-00'),
(4, 10, 'mahima@gmail.com', '9856214582', '22', '9', 'no', '23,22', 'no', '2021-06-05'),
(5, 10, 'mahima@gmail.com', '9856214582', '', '', '', 'mmm', '', '0000-00-00'),
(6, 10, 'mahima', '9856214582', '', '', '', '', '', '0000-00-00'),
(7, 10, 'mahima@gmail.com', '9856214582', '', '', '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custreg`
--

DROP TABLE IF EXISTS `tbl_custreg`;
CREATE TABLE IF NOT EXISTS `tbl_custreg` (
  `cust_id` int(2) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(20) NOT NULL,
  `cust_phone` char(10) NOT NULL,
  `cust_email` varchar(30) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `cust_status` varchar(2) NOT NULL,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY `cust_email` (`cust_email`),
  UNIQUE KEY `cust_phone` (`cust_phone`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_custreg`
--

INSERT INTO `tbl_custreg` (`cust_id`, `cust_name`, `cust_phone`, `cust_email`, `cust_address`, `cust_status`) VALUES
(11, 'MEENU', '8563215478', 'meenu@gmail.com', 'KOCHI', 'A'),
(10, 'MAHIMA', '9856214582', 'mahima@gmail.com', 'MAHIMA Alappuzha KERALA', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guest`
--

DROP TABLE IF EXISTS `tbl_guest`;
CREATE TABLE IF NOT EXISTS `tbl_guest` (
  `guest_id` int(2) NOT NULL AUTO_INCREMENT,
  `guest_email` varchar(50) NOT NULL,
  `guest_subject` varchar(20) NOT NULL,
  `guest_message` varchar(500) NOT NULL,
  `guest_status` varchar(2) NOT NULL,
  PRIMARY KEY (`guest_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guest`
--

INSERT INTO `tbl_guest` (`guest_id`, `guest_email`, `guest_subject`, `guest_message`, `guest_status`) VALUES
(8, 'karthikasuresh185@gmail.com', 'bnm', 'bnm', 'P'),
(9, 'karthikasuresh185@gmail.com', 'vbnm', 'ghjk', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `login_id` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `usertype` varchar(2) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `username`, `password`, `usertype`) VALUES
(34, 'mahima@gmail.com', '', 'C'),
(35, 'admin@gmail.com', 'admin', 'A'),
(37, 'karthikasureshbabu@mca.ajce.in', 'Kvsb@123', 'B'),
(38, 'anil.piyaa28@gmail.com', '671590', 'B'),
(39, 'meenu@gmail.com', 'Meenu@123', 'C'),
(42, 'karthikasuresh185@gmail.com', '108824', 'B'),
(43, 'yam@gmail.com', '680782', 'B'),
(44, 'eva@gmail.com', '686078', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material`
--

DROP TABLE IF EXISTS `tbl_material`;
CREATE TABLE IF NOT EXISTS `tbl_material` (
  `mat_id` int(2) NOT NULL AUTO_INCREMENT,
  `btq_id` int(2) NOT NULL,
  `mat_name` varchar(20) NOT NULL,
  `mat_price` char(10) NOT NULL,
  `mat_status` varchar(2) NOT NULL,
  `mat_pic` varchar(40) NOT NULL,
  PRIMARY KEY (`mat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_material`
--

INSERT INTO `tbl_material` (`mat_id`, `btq_id`, `mat_name`, `mat_price`, `mat_status`, `mat_pic`) VALUES
(3, 25, 'JUTE', '53', 'A', '3f9564733f9e380b3a5a5313567c3cf0.jpg'),
(4, 25, 'cottonnnn', '20', 'A', '08b9335e41a9082e35a268a6b511eb5a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_respond`
--

DROP TABLE IF EXISTS `tbl_respond`;
CREATE TABLE IF NOT EXISTS `tbl_respond` (
  `respond_id` int(10) NOT NULL AUTO_INCREMENT,
  `respond_btqid` varchar(50) NOT NULL,
  `respond_custmail` varchar(50) NOT NULL,
  `respond_dress` varchar(30) NOT NULL,
  `respond_mat` varchar(30) NOT NULL,
  `respond_price` int(20) NOT NULL,
  `respond_mtr` int(20) NOT NULL,
  `respond_cost` int(30) NOT NULL,
  `respond_date` date NOT NULL,
  PRIMARY KEY (`respond_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_respond`
--

INSERT INTO `tbl_respond` (`respond_id`, `respond_btqid`, `respond_custmail`, `respond_dress`, `respond_mat`, `respond_price`, `respond_mtr`, `respond_cost`, `respond_date`) VALUES
(2, '$btq_id', '$mail', '$dress', '$mat', 0, 0, 0, '0000-00-00'),
(3, '25', 'mahima@gmail.com', 'CIGARETTE            ', 'JUTE            ', 53, 5, 200, '2021-06-02'),
(4, '25', 'meenu@gmail.com', 'Aline            ', 'JUTE            ', 53, 20, 200, '2021-06-17'),
(5, '25', 'meenu@gmail.com', 'Aline            ', 'JUTE            ', 53, 22, 500, '2021-06-04'),
(6, '25', 'meenu@gmail.com', 'Aline            ', 'JUTE            ', 53, 5, 200, '2021-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

DROP TABLE IF EXISTS `tbl_subcategory`;
CREATE TABLE IF NOT EXISTS `tbl_subcategory` (
  `subcat_id` int(2) NOT NULL AUTO_INCREMENT,
  `cat_id` int(2) NOT NULL,
  `subcat_name` varchar(20) NOT NULL,
  `subcat_pic` varchar(40) NOT NULL,
  `subcat_status` varchar(2) NOT NULL,
  PRIMARY KEY (`subcat_id`),
  UNIQUE KEY `subcat_name` (`subcat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcat_id`, `cat_id`, `subcat_name`, `subcat_pic`, `subcat_status`) VALUES
(5, 14, 'CIGARETTE', 'CIGARETTE.jpg', 'A'),
(6, 15, 'TAIL', 'TAIL.jpg', 'A'),
(7, 16, 'ANARKALI', 'ANARKALI.jpg', 'A'),
(8, 22, 'Aline', 'Aline.jpg', 'A'),
(9, 22, 'Alinee', 'Alinee.jpg', 'A');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
