-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2015 at 07:04 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotelexpert`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_cart_hotel`
--

CREATE TABLE IF NOT EXISTS `add_cart_hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `api_temp_hotel_id` int(11) NOT NULL,
  `product_id` tinyint(4) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `quantity` tinyint(3) NOT NULL,
  `payment_mode` tinyint(2) NOT NULL,
  `sub_total` float NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `add_cart_hotel`
--

INSERT INTO `add_cart_hotel` (`id`, `session_id`, `user_id`, `api_temp_hotel_id`, `product_id`, `product_name`, `quantity`, `payment_mode`, `sub_total`, `status`) VALUES
(1, 'r5m8hkqhdhub9rbph218k7lah4', 0, 39, 5, 'Breakfast', 3, 2, 600, 1),
(2, 'r5m8hkqhdhub9rbph218k7lah4', 0, 51, 7, 'Breakfast', 2, 2, 300, 1),
(29, 'tngqsosgbcbbp9l24mi9h0pmb3', 0, 64, 5, 'Breakfast', 4, 2, 800, 1),
(30, '95gp8jo155tkrcv2oq2ku2hli6', 0, 0, 5, 'Breakfast', 1, 2, 200, 1),
(35, '95gp8jo155tkrcv2oq2ku2hli6', 0, 67, 5, 'Breakfast', 5, 2, 1000, 1),
(32, '95gp8jo155tkrcv2oq2ku2hli6', 0, 69, 5, 'Breakfast', 1, 2, 200, 1),
(33, '95gp8jo155tkrcv2oq2ku2hli6', 0, 70, 5, 'Breakfast', 1, 2, 200, 1),
(40, '95gp8jo155tkrcv2oq2ku2hli6', 0, 77, 5, 'Breakfast', 1, 2, 200, 1),
(41, 'n3lrk9hfs3ikmrc8g8d6qkshd1', 0, 77, 5, 'Breakfast', 2, 2, 400, 1),
(42, 'n3lrk9hfs3ikmrc8g8d6qkshd1', 0, 7, 5, 'Breakfast', 2, 2, 400, 1),
(43, 'n3lrk9hfs3ikmrc8g8d6qkshd1', 0, 9, 5, 'Breakfast', 5, 2, 1000, 1),
(48, 'g0lm7tfq9jep0igtuqa2vpnn30', 0, 96, 8, 'Lunch', 5, 1, 1250, 1),
(49, 'g0lm7tfq9jep0igtuqa2vpnn30', 0, 96, 7, 'Breakfast', 5, 2, 750, 1),
(50, 'nngcrv8fp0hkqat0a4tj7is502', 0, 101, 8, 'Lunch', 2, 1, 500, 1),
(51, 'nngcrv8fp0hkqat0a4tj7is502', 0, 101, 7, 'Breakfast', 3, 2, 450, 1),
(52, 'bdbkct9d0dbvg66ria472ti432', 0, 132, 5, 'Breakfast', 2, 2, 400, 1),
(53, 'amfbntd2iboldkgo2hci1oni54', 0, 146, 8, 'Lunch', 2, 1, 500, 1),
(54, 'amfbntd2iboldkgo2hci1oni54', 0, 146, 7, 'Breakfast', 2, 2, 300, 1),
(55, '75c6gmg2rmsg2r8rhf71emmk35', 0, 5, 5, 'Breakfast', 2, 2, 400, 1),
(56, 'gecdp7pdehsv0hn19fe74su3u0', 0, 85, 5, 'Breakfast', 17, 2, 3400, 1),
(57, 'r3umo0p7qct4l7dm8vh11n2im0', 0, 51, 8, 'Lunch', 1, 1, 250, 1),
(58, 'l68bqlnel3lh3osuscdrksnap7', 0, 369, 5, 'Breakfast', 2, 2, 400, 1),
(64, 'l68bqlnel3lh3osuscdrksnap7', 29, 396, 5, 'Breakfast', 2, 2, 400, 1),
(70, 'oduak8p6rotvnh4r3vnpeeop93', 29, 494, 8, 'Lunch', 4, 1, 1000, 1),
(71, 'hq3po2c6hfff6j68uh6g8o88c7', 0, 545, 5, 'Breakfast', 12, 2, 2400, 1),
(72, '2q5bee18aeln361h2ncj100ga7', 29, 606, 5, 'Breakfast', 2, 2, 400, 1),
(73, '26k8mpghtfdh6u2t602af7bod0', 29, 633, 8, 'Lunch', 2, 1, 500, 1),
(74, '26k8mpghtfdh6u2t602af7bod0', 29, 681, 5, 'Breakfast', 5, 2, 1000, 1),
(75, '26k8mpghtfdh6u2t602af7bod0', 29, 696, 5, 'Breakfast', 2, 2, 400, 1),
(76, '26k8mpghtfdh6u2t602af7bod0', 29, 694, 5, 'Breakfast', 2, 2, 400, 1),
(82, 'g4dv7g4hcs0mirnj7g3afih5e0', 0, 1231, 5, 'Breakfast', 2, 2, 400, 1),
(79, 'i0p0gnmm3akjsvt6it8op3plg5', 29, 950, 8, 'Lunch', 1, 1, 250, 1),
(86, 't0659ist1147msfdgbf4n8ujk7', 0, 1407, 5, 'Breakfast', 1, 2, 200, 1),
(87, 't0659ist1147msfdgbf4n8ujk7', 0, 1409, 5, 'Breakfast', 2, 2, 400, 1),
(95, 'iupc00fals4k8me03hdit1el10', 0, 1519, 5, 'Breakfast', 4, 2, 800, 1),
(92, '10vc470s3kjqm8q385qeadoeh1', 0, 1457, 5, 'Breakfast', 2, 2, 400, 1),
(91, '10vc470s3kjqm8q385qeadoeh1', 0, 1455, 5, 'Breakfast', 2, 2, 400, 1),
(100, 'iupc00fals4k8me03hdit1el10', 0, 1541, 8, 'Lunch', 2, 1, 500, 1),
(102, '00o81qliofgf1p3m1im9c3fv24', 29, 1591, 5, 'Breakfast', 2, 2, 400, 1),
(103, '00o81qliofgf1p3m1im9c3fv24', 29, 1594, 5, 'Breakfast', 5, 2, 1000, 1),
(104, 'rng1p65tstschjjsg5paj1cdk5', 0, 1697, 7, 'Breakfast', 1, 2, 150, 1),
(106, 'cgo5pt6t5m5o41tius6eh36135', 0, 1873, 5, 'Breakfast', 5, 2, 1000, 1),
(107, 'cgo5pt6t5m5o41tius6eh36135', 0, 1967, 5, 'Breakfast', 5, 2, 1000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_type` smallint(2) DEFAULT '3',
  `roll_type` varchar(250) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `address` text,
  `mobile_no` varchar(32) DEFAULT NULL,
  `office_phone_no` varchar(20) DEFAULT NULL,
  `contact_person_name` varchar(250) NOT NULL,
  `desig_of_contact` varchar(250) NOT NULL,
  `notes` text NOT NULL,
  `supplier_logo` varchar(250) NOT NULL,
  `sub_admin_type_id` int(11) NOT NULL,
  `supplier_type_id` int(11) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_visit_date` datetime NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `admin_type`, `roll_type`, `email`, `password`, `firstname`, `address`, `mobile_no`, `office_phone_no`, `contact_person_name`, `desig_of_contact`, `notes`, `supplier_logo`, `sub_admin_type_id`, `supplier_type_id`, `register_date`, `last_visit_date`, `status`) VALUES
(1, 1, 'super', 'admin@dbl.com', 'admin', 'Admin', 'J.P Nagar', '4545653', '34343', '', '', 'fdgvfhy', '0', 0, 0, '2014-07-22 05:51:06', '2012-07-31 10:06:00', 1),
(3, 2, 'sub1', 'satheeshperumal.provab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Provab Technosoft', 'xvffdg', '9876543211', '9876543210', '', '', 'xfgthryt', '', 1, 0, '2013-04-25 07:05:00', '0000-00-00 00:00:00', 1),
(4, 3, 'sup1', 'nirmala.provab1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Provab Technosoft', 'dsfgerg', '9876543210', '9876543210', 'fgvfd', 'cfg', 'dxfgrgrt', 'Penguins.jpg', 0, 1, '2013-04-25 07:05:00', '0000-00-00 00:00:00', 1),
(5, 3, 'sup2', 'nirmala.btech.v@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nirmala', 'zxvdrgt', '9876543210', '9876543210', 'fgvfd', '', 'dgf', 'Jellyfish.jpg', 0, 2, '2013-04-25 07:05:00', '0000-00-00 00:00:00', 1),
(6, 3, 'sup3', 'satheesh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Satheesh', 'sfdsg', '9876543210', '9876543210', 'xcfbdgf', '', '', 'Tulips.jpg', 0, 3, '2013-04-25 07:05:00', '0000-00-00 00:00:00', 1),
(20, 1, 'super', 'nirmala.provab4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'mzvb', 'fghj', '86486469', '9876543210', '', '', 'sferhy', '', 0, 0, '2013-04-27 10:39:41', '0000-00-00 00:00:00', 1),
(7, 2, 'sub2', 'nirmala.provab2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nirmala', 'zsfvdfg', '9876543210', '9876543210', '', '', 'fhggfhy', '', 2, 0, '2013-04-25 07:05:00', '0000-00-00 00:00:00', 1),
(8, 3, 'sup1', 'admin1@provab.com', 'e10adc3949ba59abbe56e057f20f883e', 'David Mathew', 'zdgfdgh', '9876543210', '', '', '', '', '', 0, 1, '2013-04-25 07:05:00', '0000-00-00 00:00:00', 1),
(9, 3, 'sup3', 'nirmala.provab3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nirmala123', 'dgftghytj', '9876543210', '9876543210', '', '', '', '', 0, 3, '2013-04-25 07:05:00', '0000-00-00 00:00:00', 1),
(10, 3, 'sup2', 'nirmala.provab4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Provab Technosoft', 'xfgfht', '9876543210', '9876543210', '', '', '', '', 0, 2, '2013-04-25 07:05:00', '0000-00-00 00:00:00', 1),
(12, 3, 'sup1', 'nirmala123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Nirmala123', 'dvfgdgrt', '9876543210', '9876543210', 'fgvfd', 'cfg', '', '', 0, 1, '2013-04-25 07:05:00', '0000-00-00 00:00:00', 1),
(19, 1, 'super', 'nirmala.provab@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Nirmala', 'sfdgrh dfbgj', '9876543210', '9876543210', '', '', '', '', 0, 0, '2013-04-25 07:05:00', '0000-00-00 00:00:00', 1),
(21, 2, 'sub4', 'admin@provab.com', '0192023a7bbd73250516f069df18b500', 'Nirmala', 'dsg', '9876543210', '9876543210', '', '', '', '', 4, 0, '2013-04-27 11:38:35', '0000-00-00 00:00:00', 1),
(22, 2, 'sub2', 'nirmala.provab3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'cdsgt', 'dsg', '86486469', '9876543210', '', '', '', '', 2, 0, '2013-04-25 07:05:00', '0000-00-00 00:00:00', 1),
(23, 3, 'sup1', 'admin@provab.com', '0192023a7bbd73250516f069df18b500', 'Nirmala', 'asdfsf', '9876543210', '9876543210', 'sfsssg', '', '', 'Desert.jpg', 0, 1, '2013-04-25 07:05:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_type`
--

CREATE TABLE IF NOT EXISTS `admin_type` (
  `admin_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_type` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`admin_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admin_type`
--

INSERT INTO `admin_type` (`admin_type_id`, `admin_type`, `status`) VALUES
(1, 'Super Admin', 1),
(2, 'Sub Admin', 1),
(5, 'User', 1),
(3, 'Supplier', 1),
(4, 'B2B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agent_deposit`
--

CREATE TABLE IF NOT EXISTS `agent_deposit` (
  `deposit_id` int(11) NOT NULL AUTO_INCREMENT,
  `b2b_user_id` int(11) DEFAULT NULL,
  `deposit_type` varchar(256) DEFAULT NULL,
  `amount_credit` double(11,2) DEFAULT NULL,
  `deposited_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bank` varchar(256) NOT NULL,
  `branch` varchar(256) NOT NULL,
  `city` varchar(128) NOT NULL,
  `transaction_id` varchar(128) NOT NULL,
  `cheque_date` date NOT NULL,
  `cheque_number` varchar(128) NOT NULL,
  `status` enum('Pending','Accepted','Declined') DEFAULT 'Pending',
  `remarks` text NOT NULL,
  PRIMARY KEY (`deposit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `agent_deposit`
--

INSERT INTO `agent_deposit` (`deposit_id`, `b2b_user_id`, `deposit_type`, `amount_credit`, `deposited_date`, `bank`, `branch`, `city`, `transaction_id`, `cheque_date`, `cheque_number`, `status`, `remarks`) VALUES
(1, 17, 'cash', 5000.00, '2013-04-11 18:30:00', '', '', '', '', '0000-00-00', '', 'Accepted', ''),
(2, 17, 'cash', 20.00, '2013-03-16 18:30:00', '', '', '', '', '0000-00-00', '', 'Accepted', ''),
(3, 19, 'cash', 2000.00, '2013-03-16 18:30:00', 'SBI', 'Bangalore', 'Bangalore', '', '0000-00-00', '', 'Accepted', 'No remarks'),
(4, 17, 'etransfer', 40.00, '2013-03-16 18:30:00', 'vf', 'dgrh', 'gj', '45gr56fdhrtju7i', '0000-00-00', '', 'Accepted', 'gt'),
(5, 17, 'cheque', 20.00, '2013-04-01 18:30:00', 'df', 'aghtr', 'fdhyt', '', '2013-04-05', 'xzdfgd', 'Accepted', 'gtru'),
(6, 20, 'cash', 20000.00, '2013-03-17 18:30:00', '', '', '', '', '0000-00-00', '', 'Accepted', ''),
(7, 29, 'cash', 100000.00, '2013-03-18 18:30:00', '', '', '', '', '0000-00-00', '', 'Accepted', '');

-- --------------------------------------------------------

--
-- Table structure for table `api`
--

CREATE TABLE IF NOT EXISTS `api` (
  `api_id` int(2) NOT NULL AUTO_INCREMENT,
  `api_name` varchar(32) DEFAULT NULL,
  `api_order` smallint(2) DEFAULT NULL,
  `active` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`api_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `api`
--

INSERT INTO `api` (`api_id`, `api_name`, `api_order`, `active`) VALUES
(1, 'gta', 3, 0),
(2, 'hotelsbed', 1, 0),
(3, 'travco', 2, 0),
(4, 'hotelspro', 4, 0),
(5, 'dotw', 5, 0),
(6, 'jac', 6, 0),
(7, 'crs', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `api_hotel_detail_t`
--

CREATE TABLE IF NOT EXISTS `api_hotel_detail_t` (
  `api_temp_hotel_id` bigint(100) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(128) NOT NULL,
  `b2b_user_id` int(11) NOT NULL,
  `api` varchar(10) NOT NULL,
  `hotel_code` varchar(32) NOT NULL,
  `room_code` varchar(64) NOT NULL,
  `room_type` varchar(128) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `inclusion` varchar(64) NOT NULL,
  `selling_price` float NOT NULL,
  `net_cost` float NOT NULL,
  `total_cost` float NOT NULL,
  `total_final_price` float NOT NULL,
  `grand_total` float NOT NULL,
  `agent_commission` float NOT NULL,
  `agent_fin_pri` float NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `no_of_days` int(11) DEFAULT NULL,
  `no_of_rooms` int(11) DEFAULT NULL,
  `status` varchar(32) NOT NULL,
  `shurival` varchar(64) NOT NULL,
  `charval` varchar(64) NOT NULL,
  `star_rating` int(11) NOT NULL,
  `adult` int(2) NOT NULL,
  `child` int(2) NOT NULL,
  `infant` int(2) NOT NULL,
  `board_type` varchar(64) NOT NULL,
  `token` varchar(64) NOT NULL,
  `inoffcode` varchar(64) NOT NULL,
  `contractnameVal` varchar(64) NOT NULL,
  `destCodeVal` varchar(32) NOT NULL,
  `shortname` text NOT NULL,
  `room_count` varchar(10) NOT NULL,
  `markup` double NOT NULL,
  `org_amt` double NOT NULL,
  `xml_currency` varchar(62) NOT NULL,
  `currency_val` double NOT NULL,
  `payment_charge` double NOT NULL,
  `city` varchar(200) NOT NULL,
  PRIMARY KEY (`api_temp_hotel_id`),
  KEY `hotel_code` (`hotel_code`),
  KEY `api` (`api`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2039 ;

--
-- Dumping data for table `api_hotel_detail_t`
--

INSERT INTO `api_hotel_detail_t` (`api_temp_hotel_id`, `session_id`, `b2b_user_id`, `api`, `hotel_code`, `room_code`, `room_type`, `room_type_id`, `inclusion`, `selling_price`, `net_cost`, `total_cost`, `total_final_price`, `grand_total`, `agent_commission`, `agent_fin_pri`, `check_in`, `check_out`, `no_of_days`, `no_of_rooms`, `status`, `shurival`, `charval`, `star_rating`, `adult`, `child`, `infant`, `board_type`, `token`, `inoffcode`, `contractnameVal`, `destCodeVal`, `shortname`, `room_count`, `markup`, `org_amt`, `xml_currency`, `currency_val`, `payment_charge`, `city`) VALUES
(2038, 'p9kqkv24pnekvsaaorhat5vpv4', 0, 'crs', 'CRS23', '25', 'Double Room', 4, '', 31.27, 0, 31.27, 3080, 3080, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 2, 1, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2037, 'p9kqkv24pnekvsaaorhat5vpv4', 0, 'crs', 'CRS3', '15', 'Triple Room', 5, '', 24.37, 0, 24.37, 2400, 2400, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2036, 'p9kqkv24pnekvsaaorhat5vpv4', 0, 'crs', 'CRS3', '10', 'Double Room', 4, '', 20.31, 0, 20.31, 2000, 2000, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2035, 'p9kqkv24pnekvsaaorhat5vpv4', 0, 'crs', 'CRS5', '5', 'Double Room', 4, '', 18.28, 0, 18.28, 1800, 1800, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 5, 4, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2034, 'p9kqkv24pnekvsaaorhat5vpv4', 0, 'crs', 'CRS1', '22', 'Single Room', 7, '', 17.26, 0, 17.26, 1700, 1700, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 3, 2, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2033, 'p9kqkv24pnekvsaaorhat5vpv4', 0, 'crs', 'CRS1', '6', 'Double Room', 4, '', 16.25, 0, 16.25, 1600, 1600, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 5, 4, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2032, 'p9kqkv24pnekvsaaorhat5vpv4', 0, 'crs', 'CRS6', '9', 'Double Room', 4, '', 15.23, 0, 15.23, 1500, 1500, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2031, 'p9kqkv24pnekvsaaorhat5vpv4', 0, 'crs', 'CRS3', '13', 'Single Room', 7, '', 10.36, 0, 10.36, 1020, 1020, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2030, '3o8m74fspsvtp8rqpj265q3uf4', 0, 'crs', 'CRS23', '25', 'Double Room', 4, '', 31.27, 0, 31.27, 3080, 3080, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 2, 1, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2029, '3o8m74fspsvtp8rqpj265q3uf4', 0, 'crs', 'CRS3', '15', 'Triple Room', 5, '', 24.37, 0, 24.37, 2400, 2400, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2028, '3o8m74fspsvtp8rqpj265q3uf4', 0, 'crs', 'CRS3', '10', 'Double Room', 4, '', 20.31, 0, 20.31, 2000, 2000, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2027, '3o8m74fspsvtp8rqpj265q3uf4', 0, 'crs', 'CRS5', '5', 'Double Room', 4, '', 18.28, 0, 18.28, 1800, 1800, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 5, 4, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2026, '3o8m74fspsvtp8rqpj265q3uf4', 0, 'crs', 'CRS1', '22', 'Single Room', 7, '', 17.26, 0, 17.26, 1700, 1700, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 3, 2, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2025, '3o8m74fspsvtp8rqpj265q3uf4', 0, 'crs', 'CRS1', '6', 'Double Room', 4, '', 16.25, 0, 16.25, 1600, 1600, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 5, 4, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2024, '3o8m74fspsvtp8rqpj265q3uf4', 0, 'crs', 'CRS6', '9', 'Double Room', 4, '', 15.23, 0, 15.23, 1500, 1500, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2023, '3o8m74fspsvtp8rqpj265q3uf4', 0, 'crs', 'CRS3', '13', 'Single Room', 7, '', 10.36, 0, 10.36, 1020, 1020, 0, 0, '2013-04-29', '2013-04-30', 1, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(2022, 'u6fo4vulp8r7psa68d8623hn47', 0, 'crs', 'CRS23', '25', 'Double Room', 4, '', 104.26, 0, 104.26, 3080, 3080, 0, 0, '2013-05-02', '2013-05-03', 1, 1, 'Available', '', '', 0, 2, 1, 0, '', '', '', '', '', '', '', 0, 0, 'RON', 0, 0, '2'),
(2021, 'u6fo4vulp8r7psa68d8623hn47', 0, 'crs', 'CRS3', '15', 'Triple Room', 5, '', 81.24, 0, 81.24, 2400, 2400, 0, 0, '2013-05-02', '2013-05-03', 1, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'RON', 0, 0, '2'),
(2020, 'u6fo4vulp8r7psa68d8623hn47', 0, 'crs', 'CRS3', '10', 'Double Room', 4, '', 67.7, 0, 67.7, 2000, 2000, 0, 0, '2013-05-02', '2013-05-03', 1, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'RON', 0, 0, '2'),
(2019, 'u6fo4vulp8r7psa68d8623hn47', 0, 'crs', 'CRS5', '5', 'Double Room', 4, '', 60.93, 0, 60.93, 1800, 1800, 0, 0, '2013-05-02', '2013-05-03', 1, 1, 'Available', '', '', 0, 5, 4, 0, '', '', '', '', '', '', '', 0, 0, 'RON', 0, 0, '2'),
(2015, 'u6fo4vulp8r7psa68d8623hn47', 0, 'crs', 'CRS3', '13', 'Single Room', 7, '', 34.53, 0, 34.53, 1020, 1020, 0, 0, '2013-05-02', '2013-05-03', 1, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'RON', 0, 0, '2'),
(2016, 'u6fo4vulp8r7psa68d8623hn47', 0, 'crs', 'CRS6', '9', 'Double Room', 4, '', 50.78, 0, 50.78, 1500, 1500, 0, 0, '2013-05-02', '2013-05-03', 1, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'RON', 0, 0, '2'),
(2017, 'u6fo4vulp8r7psa68d8623hn47', 0, 'crs', 'CRS1', '6', 'Double Room', 4, '', 54.16, 0, 54.16, 1600, 1600, 0, 0, '2013-05-02', '2013-05-03', 1, 1, 'Available', '', '', 0, 5, 4, 0, '', '', '', '', '', '', '', 0, 0, 'RON', 0, 0, '2'),
(2018, 'u6fo4vulp8r7psa68d8623hn47', 0, 'crs', 'CRS1', '22', 'Single Room', 7, '', 57.55, 0, 57.55, 1700, 1700, 0, 0, '2013-05-02', '2013-05-03', 1, 1, 'Available', '', '', 0, 3, 2, 0, '', '', '', '', '', '', '', 0, 0, 'RON', 0, 0, '2'),
(1998, 'cgo5pt6t5m5o41tius6eh36135', 0, 'crs', 'CRS23', '25', 'Double Room', 4, '', 31.27, 0, 31.27, 6160, 6160, 0, 0, '2013-04-27', '2013-04-29', 2, 1, 'Available', '', '', 0, 2, 1, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(1997, 'cgo5pt6t5m5o41tius6eh36135', 0, 'crs', 'CRS3', '15', 'Triple Room', 5, '', 24.37, 0, 24.37, 4800, 4800, 0, 0, '2013-04-27', '2013-04-29', 2, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(1996, 'cgo5pt6t5m5o41tius6eh36135', 0, 'crs', 'CRS3', '10', 'Double Room', 4, '', 20.31, 0, 20.31, 4000, 4000, 0, 0, '2013-04-27', '2013-04-29', 2, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(1995, 'cgo5pt6t5m5o41tius6eh36135', 0, 'crs', 'CRS5', '5', 'Double Room', 4, '', 18.28, 0, 18.28, 3600, 3600, 0, 0, '2013-04-27', '2013-04-29', 2, 1, 'Available', '', '', 0, 5, 4, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(1994, 'cgo5pt6t5m5o41tius6eh36135', 0, 'crs', 'CRS1', '22', 'Single Room', 7, '', 17.26, 0, 17.26, 3400, 3400, 0, 0, '2013-04-27', '2013-04-29', 2, 1, 'Available', '', '', 0, 3, 2, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(1991, 'cgo5pt6t5m5o41tius6eh36135', 0, 'crs', 'CRS3', '13', 'Single Room', 7, '', 10.36, 0, 10.36, 2040, 2040, 0, 0, '2013-04-27', '2013-04-29', 2, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(1992, 'cgo5pt6t5m5o41tius6eh36135', 0, 'crs', 'CRS6', '9', 'Double Room', 4, '', 15.23, 0, 15.23, 3000, 3000, 0, 0, '2013-04-27', '2013-04-29', 2, 1, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(1993, 'cgo5pt6t5m5o41tius6eh36135', 0, 'crs', 'CRS1', '6', 'Double Room', 4, '', 16.25, 0, 16.25, 3200, 3200, 0, 0, '2013-04-27', '2013-04-29', 2, 1, 'Available', '', '', 0, 5, 4, 0, '', '', '', '', '', '', '', 0, 0, 'USD', 0, 0, '2'),
(1944, 'irgm0mulh5klc5h93hj6vosg93', 0, 'crs', 'CRS3', '13', 'Single Room', 7, '', 563.62, 0, 563.62, 9180, 9180, 0, 0, '2013-04-27', '2013-04-28', 1, 9, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'INR', 0, 0, '2'),
(1945, 'irgm0mulh5klc5h93hj6vosg93', 0, 'crs', 'CRS6', '9', 'Double Room', 4, '', 828.85, 0, 828.85, 13500, 13500, 0, 0, '2013-04-27', '2013-04-28', 1, 9, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'INR', 0, 0, '2'),
(1946, 'irgm0mulh5klc5h93hj6vosg93', 0, 'crs', 'CRS1', '6', 'Double Room', 4, '', 884.11, 0, 884.11, 14400, 14400, 0, 0, '2013-04-27', '2013-04-28', 1, 9, 'Available', '', '', 0, 5, 4, 0, '', '', '', '', '', '', '', 0, 0, 'INR', 0, 0, '2'),
(1947, 'irgm0mulh5klc5h93hj6vosg93', 0, 'crs', 'CRS1', '22', 'Single Room', 7, '', 939.37, 0, 939.37, 15300, 15300, 0, 0, '2013-04-27', '2013-04-28', 1, 9, 'Available', '', '', 0, 3, 2, 0, '', '', '', '', '', '', '', 0, 0, 'INR', 0, 0, '2'),
(1948, 'irgm0mulh5klc5h93hj6vosg93', 0, 'crs', 'CRS5', '5', 'Double Room', 4, '', 994.62, 0, 994.62, 16200, 16200, 0, 0, '2013-04-27', '2013-04-28', 1, 9, 'Available', '', '', 0, 5, 4, 0, '', '', '', '', '', '', '', 0, 0, 'INR', 0, 0, '2'),
(1949, 'irgm0mulh5klc5h93hj6vosg93', 0, 'crs', 'CRS3', '10', 'Double Room', 4, '', 1105.14, 0, 1105.14, 18000, 18000, 0, 0, '2013-04-27', '2013-04-28', 1, 9, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'INR', 0, 0, '2'),
(1950, 'irgm0mulh5klc5h93hj6vosg93', 0, 'crs', 'CRS3', '15', 'Triple Room', 5, '', 1326.16, 0, 1061, 9548.35, 9548.35, 0, 0, '2013-04-27', '2013-04-28', 1, 9, 'Available', '', '', 0, 5, 5, 0, '', '', '', '', '', '', '', 0, 0, 'INR', 0, 0, '2');

-- --------------------------------------------------------

--
-- Table structure for table `api_permanent`
--

CREATE TABLE IF NOT EXISTS `api_permanent` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `api` varchar(32) NOT NULL,
  `hotel_code` varchar(32) NOT NULL,
  `sup_hotel_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `hotel_name` varchar(128) NOT NULL,
  `city` varchar(64) NOT NULL,
  `star` int(2) NOT NULL,
  `image` varchar(128) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hotel_policy` text NOT NULL,
  `location` varchar(128) NOT NULL,
  `near_by_area` varchar(250) NOT NULL,
  `near_by_location` varchar(250) NOT NULL,
  `hotel_nearest_location` text NOT NULL,
  `latitude` varchar(32) NOT NULL,
  `longitude` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `chain` varchar(100) NOT NULL,
  `postal` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `web` varchar(200) NOT NULL,
  `coun` int(200) NOT NULL DEFAULT '0',
  `room_facilities` text NOT NULL,
  `hotel_facilities` text NOT NULL,
  KEY `hotel_code` (`hotel_code`),
  KEY `api` (`api`),
  KEY `id` (`id`),
  FULLTEXT KEY `hotel_facilities` (`hotel_facilities`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `api_permanent`
--

INSERT INTO `api_permanent` (`id`, `api`, `hotel_code`, `sup_hotel_id`, `supplier_id`, `hotel_name`, `city`, `star`, `image`, `description`, `hotel_policy`, `location`, `near_by_area`, `near_by_location`, `hotel_nearest_location`, `latitude`, `longitude`, `address`, `phone`, `fax`, `chain`, `postal`, `email`, `web`, `coun`, `room_facilities`, `hotel_facilities`) VALUES
(1, 'crs', 'CRS1', 1, 4, 'Crown Plaza', '2', 4, 'http://192.168.0.117/WDM/crs/supplier_hotels_images/crowne-plaza-sheikh-zayd-road-dubai.jpg', 'fhgytjyuik8', 'dfgtyui87890', '', 'test area', 'test attraction', '3,2,', '54.673831', '-2.526855', 'zdfghy', '9876543210', '651684984984', '', '', 'nirmala.provab@gmail.com', '', 67, '2,5,', '1,2,3,'),
(2, 'crs', 'CRS7', 7, 4, 'Palmers Lodge', '2', 0, 'http://192.168.0.117/WDM/crs/supplier_hotels_images/crowne_plaza_dubai_01.jpg', 'This unique new central London hostel is housed in a Victorian listed building that received a substantial refurbishment to restore it to original condition It offers international travellers all the facilities expected at the very best hostels in London The hostel offers 35 guest rooms in total and facilities include a lobby with hotel safe lift access a newspaper stand TV lounge bar and disco Guests may also take advantage of the WLAN Internet access a laundry service and a car park fees apply', 'This unique new central London hostel is housed in a Victorian listed building that received a substantial refurbishment to restore it to original condition It offers international travellers all the facilities expected at the very best hostels in London The hostel offers 35 guest rooms in total and facilities include a lobby with hotel safe lift access a newspaper stand TV lounge bar and disco Guests may also take advantage of the WLAN Internet access a laundry service and a car park fees apply', '', 'Airport', 'dht', '3,2,', '54.673831', '-2.526855', 'COLLEGE CRESCENT 40., LONDON', '9876543210', 'dsgt', '', '', 'nirmala.provab@gmail.com', '', 64, '', '1,2,3,'),
(3, 'crs', 'CRS2', 2, 4, 'Taaj Banjara', '2', 0, 'http://192.168.0.117/WDM/crs/supplier_hotels_images/_1383.jpeg', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', 'dgtrhy67i8', '', '', '', '2,', '54.673831', '-2.526855', 'safrgrty', '9876543210', '651684984984', '', '', 'nirmala.provab@gmail.com', '', 0, '1,2,', '1,5,'),
(4, 'crs', 'CRS3', 3, 8, 'Crown Plaza1', '2', 0, 'http://192.168.0.117/WDM/crs/supplier_hotels_images/Penguins.jpg', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', 'dsgt6uy', '', '', '', '3,', '54.673831', '-2.526855', 'sxcfre', '9876543210', '651684984984', '', '', 'nirmala.provab@gmail.com', '', 161, '1,2,', '1,2,'),
(5, 'crs', 'CRS4', 4, 4, 'Taaj Banjara1', '2', 4, 'http://192.168.0.117/WDM/crs/supplier_hotels_images/381_abacos2.jpg', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', 'fdhgyi978o<br>', '', '', '', '2,', '54.673831', '-2.526855', 'asf r', '9876543210', '', '', '', 'nirmala.provab@gmail.com', '', 0, '2,2,3,5,', '2,3,'),
(6, 'crs', 'CRS5', 5, 4, 'Prince Villiam', '2', 0, 'http://192.168.0.117/WDM/crs/supplier_hotels_images/crowne_plaza_dubai_01.jpg', 'This unique new central London hostel is housed in a Victorian listed building that received a substantial refurbishment to restore it to original condition It offers international travellers all the facilities expected at the very best hostels in London The hostel offers 35 guest rooms in total and facilities include a lobby with hotel safe lift access a newspaper stand TV ', '', '', 'sdsds', 'fdfdfd', '3,', '55.38535180341315', '-0.4064936718750687', '4545', '9876543210', '55454', '', '', 'nirmala.provab@gmail.com', '', 28, '2,5,', '1,2,3,'),
(7, 'crs', 'CRS6', 6, 4, 'NOVOTEL', '2', 0, 'http://192.168.0.117/WDM/crs/supplier_hotels_images/26145_37_b_tn.jpg', 'Built in 1880 and renovated in 2001 the hotel offers a total of 47 rooms of which 12 are singles 29 are doubles and 6 are suites The facilities include a 24-hour reception a safe and a lift The hotel has a its own restaurant', 'asd', '', '', '', '4,2,3,', '54.673831', '-2.526855', 'asd', '9876543210', '666666', '', '', 'adfadf@gmail.com', '', 109, '1,2,', '1,2,'),
(8, 'crs', 'CRS8', 8, 4, 'taj', '2', 0, '', 'gfhg hfgh  dd', 'ghfdg', '', 'fgf', 'dfgf', '', '54.673831', '-2.526855', 'gf ghgfh ddd', '9876543210', '45645', '', '', 'taj@info.com', '', 0, '', ''),
(9, 'crs', 'CRS13', 13, 12, 'ris_testing', '7', 0, 'http://192.168.0.117/WDM/crs/supplier_hotels_images/Hydrangeas.jpg', 'try', 'werewr', '', '', '', '', '54.673831', '-2.526855', 'tgu', '123456', '', '', '', 'riswana@gmail.com', '', 0, '', ''),
(10, 'crs', 'CRS14', 14, 4, 'dfgfd', '2', 0, '', '<br>', '<br>', '', '', '', '', '54.673831', '-2.526855', '', '3423435', '', '', '', 'fdf@er.fgh', '', 0, '', ''),
(11, 'crs', 'CRS15', 15, 12, 'fgfd', '2', 0, '', 'fd', 'sdgtrh fjhyjt tyj 68i y5uj fdgrt dgftrh rgr6y65 ghtu hy67', '', 'fd', 'f', '3,', '54.673831', '-2.526855', 'fg', '454', '34', '', '', 'fdf@er.fgh', '', 0, '', '1,'),
(12, 'crs', 'CRS22', 22, 4, 'fsghg', '7', 0, '', 'ytyi', 'szf', '', '', '', '', '54.673831', '-2.526855', 'ytu', '9876543210', 'dfsgd', '', '', 'nirmala.provab1@gmail.com', '', 0, '', ''),
(13, 'crs', 'CRS23', 23, 4, 'hjgjghjghj', '2', 0, '', 'gf<br>', 'j<br>', '', 'hj', 'jh', '', '54.673831', '-2.526855', 'hf', '9876543210', '456', '', '', 'nirmala.provab1@gmail.com', '', 0, '', '1,3,');

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE IF NOT EXISTS `banner_images` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `file_path` mediumtext NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`banner_id`, `image_name`, `date`, `description`, `file_path`, `status`) VALUES
(18, 'The Taj', '2013-04-20', 'The Taj Mahal hotel in what was then known as Bombay was built by Indian industrialist Tata in a stand against the colonialism and snobbery that had once seen him denied entrance to one of the better known British-Bombay hotels. ', 'banner_images/test/inRoom 15 1500x924.JPG', 1),
(17, 'Hotel Cipriani', '2013-04-15', 'In Venice tourists can be more plentiful than pigeons in San Marco piazza so insiders know that the place to be is on Giudecca Island looking back over at the delights of San Marco form a quiet and refined bolt-hole,', 'banner_images/test/Q2_PHR05_Grand_Hotel_Tremezzo.jpg', 1),
(16, 'Burj Al Arab', '2013-04-15', 'The beauteous Burj came storming into the public consciousness a few years back and its 1023 feet (321 metres) high, sail-like structure has become as well recognised at the Sydney Opera House.', 'banner_images/test/UMass-Hotel-Lobby-3.png.jpg', 1),
(15, 'The Raffles', '2013-04-15', 'This hotel has a legendary past. In colonial days the decadent and gin-soaked sat on its white-arched verandahs and discussed all kinds of dubious deeds from opium smuggling to the overthrow of a dictatorship', 'banner_images/test/default2.jpg', 1),
(19, 'Waldorf', '2013-04-15', 'So famous it was designated as AN official New York City landmark IN 1993, this Art Deco property occupies an entire city block of prime, mid-town Manhattan real estate', 'banner_images/test/UMass-Hotel-Lobby-3.png.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('2f9a5ffe2c347aef04c7540cc60c4f94', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2560.0 Safari/537.36', 1447868027, 'a:82:{s:9:"user_data";s:0:"";s:5:"email";s:13:"admin@dbl.com";s:9:"firstname";s:5:"Admin";s:7:"user_id";s:1:"1";s:9:"roll_type";s:5:"super";s:10:"admin_type";s:1:"1";s:18:"view_order_reports";s:1:"0";s:18:"view_sales_reports";s:1:"0";s:17:"add_travel_agents";s:1:"1";s:18:"edit_travel_agents";s:1:"1";s:20:"delete_travel_agents";s:1:"1";s:18:"view_travel_agents";s:1:"1";s:9:"add_admin";s:1:"1";s:10:"edit_admin";s:1:"1";s:12:"delete_admin";s:1:"1";s:16:"view_admin_users";s:1:"1";s:14:"add_admin_type";s:1:"1";s:15:"edit_admin_type";s:1:"1";s:17:"delete_admin_type";s:1:"1";s:15:"view_admin_type";s:1:"1";s:17:"add_supplier_type";s:1:"1";s:18:"edit_supplier_type";s:1:"1";s:20:"delete_supplier_type";s:1:"1";s:18:"view_supplier_type";s:1:"1";s:19:"view_supplier_users";s:1:"1";s:17:"add_supplier_user";s:1:"1";s:18:"edit_supplier_user";s:1:"1";s:20:"delete_supplier_user";s:1:"1";s:12:"static_pages";s:1:"1";s:15:"email_templates";s:1:"1";s:16:"top_destinations";s:1:"1";s:5:"deals";s:1:"1";s:4:"news";s:1:"1";s:16:"add_b2c_customer";s:1:"1";s:17:"edit_b2c_customer";s:1:"1";s:19:"delete_b2c_customer";s:1:"1";s:18:"view_b2c_customers";s:1:"1";s:12:"create_order";s:1:"1";s:10:"edit_order";s:1:"1";s:12:"delete_order";s:1:"1";s:10:"view_order";s:1:"1";s:12:"amenity_list";s:1:"1";s:10:"currencies";s:1:"1";s:16:"payment_gateways";s:1:"1";s:9:"commision";s:1:"1";s:13:"manage_cities";s:1:"1";s:16:"manage_amenities";s:1:"1";s:16:"manage_discounts";s:1:"1";s:17:"manage_previliges";s:1:"1";s:21:"manage_room_categorys";s:1:"1";s:23:"global_near_by_location";s:1:"1";s:9:"add_hotel";s:1:"1";s:10:"edit_hotel";s:1:"1";s:12:"delete_hotel";s:1:"1";s:11:"view_hotels";s:1:"1";s:15:"add_hotel_rooms";s:1:"1";s:16:"edit_hotel_rooms";s:1:"1";s:18:"delete_hotel_rooms";s:1:"1";s:16:"view_hotel_rooms";s:1:"1";s:20:"hotel_room_inventory";s:1:"1";s:13:"hotel_pricing";s:1:"1";s:10:"edit_villa";s:1:"1";s:12:"delete_villa";s:1:"1";s:9:"add_villa";s:1:"1";s:10:"view_villa";s:1:"1";s:20:"villa_room_inventory";s:1:"1";s:13:"villa_pricing";s:1:"1";s:12:"user_reports";s:1:"1";s:13:"order_reports";s:1:"1";s:25:"order_reports_status_wize";s:1:"1";s:17:"inventory_reports";s:1:"1";s:13:"sales_reports";s:1:"1";s:15:"account_reports";s:1:"1";s:19:"call_center_reports";s:1:"1";s:28:"call_center_tracking_reports";s:1:"1";s:7:"add_car";s:1:"1";s:8:"edit_car";s:1:"1";s:10:"delete_car";s:1:"1";s:9:"view_cars";s:1:"1";s:18:"car_room_inventory";s:1:"1";s:11:"car_pricing";s:1:"1";s:15:"admin_logged_in";b:1;}'),
('b59289ce9dc7af0bf4d1ed10b0882a36', '223.228.187.185', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2560.0 Safari/537.36', 1447951732, 'a:81:{s:5:"email";s:13:"admin@dbl.com";s:9:"firstname";s:5:"Admin";s:7:"user_id";s:1:"1";s:9:"roll_type";s:5:"super";s:10:"admin_type";s:1:"1";s:18:"view_order_reports";s:1:"0";s:18:"view_sales_reports";s:1:"0";s:17:"add_travel_agents";s:1:"1";s:18:"edit_travel_agents";s:1:"1";s:20:"delete_travel_agents";s:1:"1";s:18:"view_travel_agents";s:1:"1";s:9:"add_admin";s:1:"1";s:10:"edit_admin";s:1:"1";s:12:"delete_admin";s:1:"1";s:16:"view_admin_users";s:1:"1";s:14:"add_admin_type";s:1:"1";s:15:"edit_admin_type";s:1:"1";s:17:"delete_admin_type";s:1:"1";s:15:"view_admin_type";s:1:"1";s:17:"add_supplier_type";s:1:"1";s:18:"edit_supplier_type";s:1:"1";s:20:"delete_supplier_type";s:1:"1";s:18:"view_supplier_type";s:1:"1";s:19:"view_supplier_users";s:1:"1";s:17:"add_supplier_user";s:1:"1";s:18:"edit_supplier_user";s:1:"1";s:20:"delete_supplier_user";s:1:"1";s:12:"static_pages";s:1:"1";s:15:"email_templates";s:1:"1";s:16:"top_destinations";s:1:"1";s:5:"deals";s:1:"1";s:4:"news";s:1:"1";s:16:"add_b2c_customer";s:1:"1";s:17:"edit_b2c_customer";s:1:"1";s:19:"delete_b2c_customer";s:1:"1";s:18:"view_b2c_customers";s:1:"1";s:12:"create_order";s:1:"1";s:10:"edit_order";s:1:"1";s:12:"delete_order";s:1:"1";s:10:"view_order";s:1:"1";s:12:"amenity_list";s:1:"1";s:10:"currencies";s:1:"1";s:16:"payment_gateways";s:1:"1";s:9:"commision";s:1:"1";s:13:"manage_cities";s:1:"1";s:16:"manage_amenities";s:1:"1";s:16:"manage_discounts";s:1:"1";s:17:"manage_previliges";s:1:"1";s:21:"manage_room_categorys";s:1:"1";s:23:"global_near_by_location";s:1:"1";s:9:"add_hotel";s:1:"1";s:10:"edit_hotel";s:1:"1";s:12:"delete_hotel";s:1:"1";s:11:"view_hotels";s:1:"1";s:15:"add_hotel_rooms";s:1:"1";s:16:"edit_hotel_rooms";s:1:"1";s:18:"delete_hotel_rooms";s:1:"1";s:16:"view_hotel_rooms";s:1:"1";s:20:"hotel_room_inventory";s:1:"1";s:13:"hotel_pricing";s:1:"1";s:10:"edit_villa";s:1:"1";s:12:"delete_villa";s:1:"1";s:9:"add_villa";s:1:"1";s:10:"view_villa";s:1:"1";s:20:"villa_room_inventory";s:1:"1";s:13:"villa_pricing";s:1:"1";s:12:"user_reports";s:1:"1";s:13:"order_reports";s:1:"1";s:25:"order_reports_status_wize";s:1:"1";s:17:"inventory_reports";s:1:"1";s:13:"sales_reports";s:1:"1";s:15:"account_reports";s:1:"1";s:19:"call_center_reports";s:1:"1";s:28:"call_center_tracking_reports";s:1:"1";s:7:"add_car";s:1:"1";s:8:"edit_car";s:1:"1";s:10:"delete_car";s:1:"1";s:9:"view_cars";s:1:"1";s:18:"car_room_inventory";s:1:"1";s:11:"car_pricing";s:1:"1";s:15:"admin_logged_in";b:1;}'),
('ac2c401021f85f9404d662c3f998f5de', '66.249.85.223', 'Google favicon', 1448079796, ''),
('0d17ee7d9f7a14ba0d039a2643cc829b', '66.249.85.217', 'Google favicon', 1448079797, ''),
('26d75b80381eceb6f6abba5f7ddad3dd', '59.95.69.226', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.8 Safari/537.36', 1448081585, ''),
('f946fa55a531f95db8715072c464e17e', '106.216.164.209', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2490.86 Safari/537.36', 1448082547, ''),
('a6889981b421e8c3ccce0868561239f9', '223.228.234.148', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.10 Safari/537.36', 1448302359, 'a:82:{s:9:"user_data";s:0:"";s:5:"email";s:13:"admin@dbl.com";s:9:"firstname";s:5:"Admin";s:7:"user_id";s:1:"1";s:9:"roll_type";s:5:"super";s:10:"admin_type";s:1:"1";s:18:"view_order_reports";s:1:"0";s:18:"view_sales_reports";s:1:"0";s:17:"add_travel_agents";s:1:"1";s:18:"edit_travel_agents";s:1:"1";s:20:"delete_travel_agents";s:1:"1";s:18:"view_travel_agents";s:1:"1";s:9:"add_admin";s:1:"1";s:10:"edit_admin";s:1:"1";s:12:"delete_admin";s:1:"1";s:16:"view_admin_users";s:1:"1";s:14:"add_admin_type";s:1:"1";s:15:"edit_admin_type";s:1:"1";s:17:"delete_admin_type";s:1:"1";s:15:"view_admin_type";s:1:"1";s:17:"add_supplier_type";s:1:"1";s:18:"edit_supplier_type";s:1:"1";s:20:"delete_supplier_type";s:1:"1";s:18:"view_supplier_type";s:1:"1";s:19:"view_supplier_users";s:1:"1";s:17:"add_supplier_user";s:1:"1";s:18:"edit_supplier_user";s:1:"1";s:20:"delete_supplier_user";s:1:"1";s:12:"static_pages";s:1:"1";s:15:"email_templates";s:1:"1";s:16:"top_destinations";s:1:"1";s:5:"deals";s:1:"1";s:4:"news";s:1:"1";s:16:"add_b2c_customer";s:1:"1";s:17:"edit_b2c_customer";s:1:"1";s:19:"delete_b2c_customer";s:1:"1";s:18:"view_b2c_customers";s:1:"1";s:12:"create_order";s:1:"1";s:10:"edit_order";s:1:"1";s:12:"delete_order";s:1:"1";s:10:"view_order";s:1:"1";s:12:"amenity_list";s:1:"1";s:10:"currencies";s:1:"1";s:16:"payment_gateways";s:1:"1";s:9:"commision";s:1:"1";s:13:"manage_cities";s:1:"1";s:16:"manage_amenities";s:1:"1";s:16:"manage_discounts";s:1:"1";s:17:"manage_previliges";s:1:"1";s:21:"manage_room_categorys";s:1:"1";s:23:"global_near_by_location";s:1:"1";s:9:"add_hotel";s:1:"1";s:10:"edit_hotel";s:1:"1";s:12:"delete_hotel";s:1:"1";s:11:"view_hotels";s:1:"1";s:15:"add_hotel_rooms";s:1:"1";s:16:"edit_hotel_rooms";s:1:"1";s:18:"delete_hotel_rooms";s:1:"1";s:16:"view_hotel_rooms";s:1:"1";s:20:"hotel_room_inventory";s:1:"1";s:13:"hotel_pricing";s:1:"1";s:10:"edit_villa";s:1:"1";s:12:"delete_villa";s:1:"1";s:9:"add_villa";s:1:"1";s:10:"view_villa";s:1:"1";s:20:"villa_room_inventory";s:1:"1";s:13:"villa_pricing";s:1:"1";s:12:"user_reports";s:1:"1";s:13:"order_reports";s:1:"1";s:25:"order_reports_status_wize";s:1:"1";s:17:"inventory_reports";s:1:"1";s:13:"sales_reports";s:1:"1";s:15:"account_reports";s:1:"1";s:19:"call_center_reports";s:1:"1";s:28:"call_center_tracking_reports";s:1:"1";s:7:"add_car";s:1:"1";s:8:"edit_car";s:1:"1";s:10:"delete_car";s:1:"1";s:9:"view_cars";s:1:"1";s:18:"car_room_inventory";s:1:"1";s:11:"car_pricing";s:1:"1";s:15:"admin_logged_in";b:1;}'),
('bc088bf61872eb04ba7cbbaba8ca4518', '223.228.234.148', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.10 Safari/537.36', 1448303033, ''),
('6c837e149968cb07c862685a69e78685', '45.124.225.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:43.0) Gecko/20100101 Firefox/43.0', 1448356272, ''),
('f1b41fd48dfa96b486fe10dd09a05487', '106.200.68.110', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.10 Safari/537.36', 1448384829, ''),
('b4574ac2ee4f51e3be71ee9e56a923bc', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.10 Safari/537.36', 1448560803, ''),
('f4f065723033b9638917eb6e41e7082d', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.10 Safari/537.36', 1448560818, ''),
('4861ece5654fc09881e73dfbaf8846a2', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.10 Safari/537.36', 1448560819, '');

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE IF NOT EXISTS `commission` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product` varchar(100) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `agents` varchar(200) NOT NULL,
  `commission_rate` varchar(10) NOT NULL,
  `status` int(2) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`id`, `product`, `product_name`, `agents`, `commission_rate`, `status`, `updated_date`) VALUES
(1, 'hotel', '7', '17', '20', 1, '2013-04-11 05:39:39'),
(28, 'villa', 'all', '29', '10', 1, '2013-04-18 07:08:02'),
(18, 'car', '3', 'all', '12', 1, '2013-04-17 11:47:49'),
(29, 'villa', '12', 'all', '11', 1, '2013-04-18 07:08:15'),
(19, 'car', 'all', '29', '13', 1, '2013-04-17 11:45:10'),
(7, 'hotel', '4', '22', '20', 1, '2013-04-16 07:59:50'),
(8, 'hotel', '5', '27', '45', 1, '2013-04-11 05:41:39'),
(27, 'villa', 'all', 'all', '9', 1, '2013-04-18 07:07:40'),
(12, 'hotel', '7', '22', '20', 1, '2013-04-16 07:59:36'),
(15, 'hotel', '1', 'all', '20', 1, '2013-04-16 12:28:10'),
(16, 'hotel', '1', '17', '20', 1, '2013-04-16 12:28:27'),
(17, 'car', 'all', 'all', '11', 1, '2013-04-17 11:44:49'),
(20, 'car', '3', '29', '14', 1, '2013-04-17 12:42:25'),
(22, 'hotel', 'all', '29', '30', 1, '2013-04-18 06:04:26'),
(23, 'hotel', '1', '29', '20', 1, '2013-04-18 06:04:53'),
(24, 'hotel', '3', '29', '40', 1, '2013-04-18 06:07:28'),
(25, 'hotel', '5', '29', '20', 1, '2013-04-18 06:08:00'),
(30, 'villa', '12', '29', '12', 1, '2013-04-18 07:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `company_logos`
--

CREATE TABLE IF NOT EXISTS `company_logos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(100) NOT NULL,
  `logo_url` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `company_logos`
--

INSERT INTO `company_logos` (`id`, `logo`, `logo_url`, `company_name`, `status`) VALUES
(2, '4.png', 'http://www.provab.com/iphoneappdeveloper-iphoneappsdevelopment.html', 'Nirmala', 1),
(3, '6.png', 'http://www.provab.com/propertymanagementsoftware-propertymanagementsystem.html', 'test', 1),
(4, '4.png', 'http://www.provab.com/iphoneappdeveloper-iphoneappsdevelopment.html', 'Goghoom', 1),
(5, '3.png', 'http://www.provab.com/iphoneappdeveloper-iphoneappsdevelopment.html', 'Nirmala', 1),
(6, '4.png', 'https://developers.facebook.com/apps/507421205983317/summary', 'Nirmala', 1),
(7, '5.png', 'http://192.168.0.117/WDM/crs/admin/index.php/cms/company_logos', 'Tesing123', 1),
(9, '2.png', 'http://www.provab.com/propertymanagementsoftware-propertymanagementsystem.html', 'Goghoom', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country_currency`
--

CREATE TABLE IF NOT EXISTS `country_currency` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(10) NOT NULL,
  `country_currency` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `country_currency`
--

INSERT INTO `country_currency` (`id`, `country_code`, `country_currency`) VALUES
(1, 'US', 'USD'),
(2, 'BE', 'EUR'),
(3, 'ES', 'EUR'),
(4, 'LU', 'EUR'),
(5, 'PT', 'EUR'),
(6, 'DE', 'EUR'),
(7, 'FR', 'EUR'),
(8, 'MT', 'EUR'),
(9, 'SI', 'EUR'),
(10, 'IE', 'EUR'),
(11, 'IT', 'EUR'),
(12, 'NL', 'EUR'),
(13, 'SK', 'EUR'),
(14, 'GR', 'EUR'),
(15, 'CY', 'EUR'),
(16, 'AT', 'EUR'),
(17, 'FI', 'EUR'),
(18, 'JP', 'JPY'),
(19, 'BG', 'BGN'),
(20, 'CZ', 'CZK'),
(21, 'DK', 'DKK'),
(22, 'EE', 'EEK'),
(23, 'GB', 'GBP'),
(24, 'HU', 'HUF'),
(25, 'LT', 'LTL'),
(26, 'LV', 'LVL'),
(27, 'PL', 'PLN'),
(28, 'RO', 'RON'),
(29, 'SE', 'SEK'),
(30, 'CH', 'CHF'),
(31, 'NO', 'NOK'),
(32, 'HR', 'HRK'),
(33, 'RU', 'RUB'),
(34, 'TR', 'TRY'),
(35, 'AU', 'AUD'),
(36, 'BR', 'BRL'),
(37, 'CA', 'CAD'),
(38, 'CN', 'CNY'),
(39, 'HK', 'HKD'),
(40, 'ID', 'IDR'),
(41, 'IN', 'INR'),
(42, 'KR', 'KRW'),
(43, 'MX', 'MXN'),
(44, 'MY', 'MYR'),
(45, 'NZ', 'NZD'),
(46, 'PH', 'PHP'),
(47, 'SG', 'SGD'),
(48, 'TH', 'THB'),
(49, 'ZA', 'ZAR'),
(50, 'AF', 'AFA'),
(51, 'AL', 'ALK'),
(52, 'IQ', 'IQD'),
(53, 'IR', 'IRR'),
(54, 'IL', 'ILP'),
(55, 'KZ', 'KZT'),
(56, 'SD', 'SDD'),
(57, 'KW', 'KWD'),
(58, 'KG', 'KGS'),
(59, 'MO', 'MOP'),
(60, 'TJ', 'TJS');

-- --------------------------------------------------------

--
-- Table structure for table `discount_parameters`
--

CREATE TABLE IF NOT EXISTS `discount_parameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parameter` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `discount_parameters`
--

INSERT INTO `discount_parameters` (`id`, `parameter`) VALUES
(1, 'if booking is for'),
(2, 'if booking amount is'),
(3, 'if supplier is'),
(4, 'if booking is between'),
(5, 'if booking city is');

-- --------------------------------------------------------

--
-- Table structure for table `discount_rules`
--

CREATE TABLE IF NOT EXISTS `discount_rules` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `rule_name` varchar(100) DEFAULT NULL,
  `discount_parameter` varchar(100) NOT NULL,
  `days` varchar(100) DEFAULT NULL,
  `customer_type` varchar(10) NOT NULL,
  `costs` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `discount_rate` float DEFAULT NULL,
  `basis` varchar(100) DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `room_type` varchar(25) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `discount_rules`
--

INSERT INTO `discount_rules` (`id`, `rule_name`, `discount_parameter`, `days`, `customer_type`, `costs`, `currency`, `discount_rate`, `basis`, `product`, `product_name`, `room_type`, `from_date`, `to_date`, `city`, `status`, `modified`) VALUES
(1, 'de', '1', '10', 'B2C', NULL, NULL, 10, 'percentage', NULL, NULL, NULL, '2013-03-20', '2013-04-30', NULL, 1, '2013-03-23 13:15:25'),
(2, 'zdfv', '2', NULL, 'B2C', '10000', 'Rs', 20, 'percentage', NULL, NULL, NULL, '2013-03-20', '2013-04-30', NULL, 1, '2013-03-23 13:51:19'),
(12, 'zvf', '1', '10', 'B2C', NULL, NULL, 20, 'percentage', NULL, NULL, NULL, '2013-04-04', '2013-04-05', NULL, 1, '2013-04-26 05:27:31'),
(4, 'FGDG', '2', NULL, 'B2C', '10000', 'Rs', 10, 'percentage', NULL, NULL, NULL, '2013-05-12', '2013-05-18', NULL, 1, '2013-03-25 05:42:11'),
(6, 'cdef', '4', NULL, 'B2C', NULL, NULL, 30, 'fixed', 'villa', NULL, NULL, '2013-03-06', '2013-03-31', NULL, 1, '2013-03-25 13:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `global_all_previliges`
--

CREATE TABLE IF NOT EXISTS `global_all_previliges` (
  `global_all_previliges_id` int(11) NOT NULL AUTO_INCREMENT,
  `view_order_reports` int(11) NOT NULL,
  `view_sales_reports` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_type` int(11) NOT NULL,
  `roll_type` varchar(250) NOT NULL,
  `add_travel_agents` int(11) NOT NULL,
  `edit_travel_agents` int(11) NOT NULL,
  `delete_travel_agents` int(11) NOT NULL,
  `view_travel_agents` int(11) NOT NULL,
  `add_admin` int(11) NOT NULL,
  `add_admin_type` int(11) NOT NULL,
  `edit_admin_type` int(11) NOT NULL,
  `delete_admin_type` int(11) NOT NULL,
  `view_admin_type` int(11) NOT NULL,
  `edit_admin` int(11) NOT NULL,
  `delete_admin` int(11) NOT NULL,
  `view_admin_users` int(11) NOT NULL,
  `add_supplier_type` int(11) NOT NULL,
  `edit_supplier_type` int(11) NOT NULL,
  `delete_supplier_type` int(11) NOT NULL,
  `view_supplier_users` int(11) NOT NULL,
  `add_supplier_user` int(11) NOT NULL,
  `edit_supplier_user` int(11) NOT NULL,
  `delete_supplier_user` int(11) NOT NULL,
  `view_supplier_type` int(11) NOT NULL,
  `static_pages` int(11) NOT NULL,
  `email_templates` int(11) NOT NULL,
  `top_destinations` int(11) NOT NULL,
  `deals` int(11) NOT NULL,
  `news` int(11) NOT NULL,
  `add_b2c_customer` int(11) NOT NULL,
  `edit_b2c_customer` int(11) NOT NULL,
  `delete_b2c_customer` int(11) NOT NULL,
  `view_b2c_customers` int(11) NOT NULL,
  `create_order` int(11) NOT NULL,
  `edit_order` int(11) NOT NULL,
  `delete_order` int(11) NOT NULL,
  `view_order` int(11) NOT NULL,
  `amenity_list` int(11) NOT NULL,
  `currencies` int(11) NOT NULL,
  `payment_gateways` int(11) NOT NULL,
  `commision` int(11) NOT NULL,
  `manage_cities` int(11) NOT NULL,
  `manage_amenities` int(11) NOT NULL,
  `manage_discounts` int(11) NOT NULL,
  `manage_previliges` int(11) NOT NULL,
  `manage_room_categorys` int(11) NOT NULL,
  `global_near_by_location` int(11) NOT NULL,
  `add_hotel` int(11) NOT NULL,
  `edit_hotel` int(11) NOT NULL,
  `delete_hotel` int(11) NOT NULL,
  `view_hotels` int(11) NOT NULL,
  `add_hotel_rooms` int(11) NOT NULL,
  `edit_hotel_rooms` int(11) NOT NULL,
  `delete_hotel_rooms` int(11) NOT NULL,
  `view_hotel_rooms` int(11) NOT NULL,
  `hotel_room_inventory` int(11) NOT NULL,
  `hotel_pricing` int(11) NOT NULL,
  `add_villa` int(11) NOT NULL,
  `edit_villa` int(11) NOT NULL,
  `delete_villa` int(11) NOT NULL,
  `view_villa` int(11) NOT NULL,
  `villa_room_inventory` int(11) NOT NULL,
  `villa_pricing` int(11) NOT NULL,
  `user_reports` int(11) NOT NULL,
  `b2b_reports` int(11) NOT NULL,
  `order_reports` int(11) NOT NULL,
  `order_reports_status_wize` int(11) NOT NULL,
  `inventory_reports` int(11) NOT NULL,
  `sales_reports` int(11) NOT NULL,
  `account_reports` int(11) NOT NULL,
  `call_center_reports` int(11) NOT NULL,
  `call_center_tracking_reports` int(11) NOT NULL,
  `add_car` int(11) NOT NULL,
  `edit_car` int(11) NOT NULL,
  `delete_car` int(11) NOT NULL,
  `view_cars` int(11) NOT NULL,
  `car_room_inventory` int(11) NOT NULL,
  `car_pricing` int(11) NOT NULL,
  PRIMARY KEY (`global_all_previliges_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `global_all_previliges`
--

INSERT INTO `global_all_previliges` (`global_all_previliges_id`, `view_order_reports`, `view_sales_reports`, `user_id`, `admin_type`, `roll_type`, `add_travel_agents`, `edit_travel_agents`, `delete_travel_agents`, `view_travel_agents`, `add_admin`, `add_admin_type`, `edit_admin_type`, `delete_admin_type`, `view_admin_type`, `edit_admin`, `delete_admin`, `view_admin_users`, `add_supplier_type`, `edit_supplier_type`, `delete_supplier_type`, `view_supplier_users`, `add_supplier_user`, `edit_supplier_user`, `delete_supplier_user`, `view_supplier_type`, `static_pages`, `email_templates`, `top_destinations`, `deals`, `news`, `add_b2c_customer`, `edit_b2c_customer`, `delete_b2c_customer`, `view_b2c_customers`, `create_order`, `edit_order`, `delete_order`, `view_order`, `amenity_list`, `currencies`, `payment_gateways`, `commision`, `manage_cities`, `manage_amenities`, `manage_discounts`, `manage_previliges`, `manage_room_categorys`, `global_near_by_location`, `add_hotel`, `edit_hotel`, `delete_hotel`, `view_hotels`, `add_hotel_rooms`, `edit_hotel_rooms`, `delete_hotel_rooms`, `view_hotel_rooms`, `hotel_room_inventory`, `hotel_pricing`, `add_villa`, `edit_villa`, `delete_villa`, `view_villa`, `villa_room_inventory`, `villa_pricing`, `user_reports`, `b2b_reports`, `order_reports`, `order_reports_status_wize`, `inventory_reports`, `sales_reports`, `account_reports`, `call_center_reports`, `call_center_tracking_reports`, `add_car`, `edit_car`, `delete_car`, `view_cars`, `car_room_inventory`, `car_pricing`) VALUES
(1, 0, 0, 0, 1, 'super', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 0, 0, 0, 2, 'sub1', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(3, 0, 0, 0, 2, 'sub2', 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 2, 'sub3', 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 0, 0, 4, 3, 'sup1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 1, 5, 3, 'sup2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 1, 0, 6, 3, 'sup3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1),
(11, 0, 0, 12, 3, 'sup1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 1, 0, 8, 3, 'sup1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 1, 1, 9, 3, 'sup3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(10, 0, 0, 10, 3, 'sup2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 0, 0, 18, 3, 'sup1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 0, 0, 0, 2, 'sub4', 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 23, 3, 'sup1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 0, 0, 30, 3, 'sup2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 0, 0, 31, 3, 'sup1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 0, 0, 34, 3, 'sup2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 0, 0, 35, 3, 'sup1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `global_amenity_list`
--

CREATE TABLE IF NOT EXISTS `global_amenity_list` (
  `amenity_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `amenity_name` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`amenity_list_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `global_amenity_list`
--

INSERT INTO `global_amenity_list` (`amenity_list_id`, `amenity_name`, `status`) VALUES
(1, 'Room Service', 1),
(2, 'TV', 1),
(3, 'Wifi', 1),
(5, 'Laundry', 1);

-- --------------------------------------------------------

--
-- Table structure for table `global_cities`
--

CREATE TABLE IF NOT EXISTS `global_cities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reg_id` int(10) NOT NULL,
  `city_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `global_cities`
--

INSERT INTO `global_cities` (`id`, `reg_id`, `city_name`, `status`) VALUES
(12, 1, 'bangalore', 1),
(2, 1, 'Mysore', 1),
(7, 5, 'Mumbai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `global_near_by_location`
--

CREATE TABLE IF NOT EXISTS `global_near_by_location` (
  `global_near_by_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`global_near_by_location_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `global_near_by_location`
--

INSERT INTO `global_near_by_location` (`global_near_by_location_id`, `location_name`, `status`) VALUES
(3, 'City Center', 1),
(2, 'Airport', 1),
(4, 'Suberbs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `global_regions`
--

CREATE TABLE IF NOT EXISTS `global_regions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `global_regions`
--

INSERT INTO `global_regions` (`id`, `region_name`, `status`) VALUES
(1, 'karnataka', 1),
(2, 'tamilnadu', 1),
(4, 'kerala', 1),
(5, 'maharastra', 1),
(6, 'andra pradesh', 1),
(7, 'madya pradesh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `global_room_category_type`
--

CREATE TABLE IF NOT EXISTS `global_room_category_type` (
  `global_room_category_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_type` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`global_room_category_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `global_room_category_type`
--

INSERT INTO `global_room_category_type` (`global_room_category_type_id`, `category_type`, `status`) VALUES
(7, 'Single Room', 1),
(4, 'Double Room', 1),
(5, 'Triple Room', 1),
(6, 'Quarter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `help_videos`
--

CREATE TABLE IF NOT EXISTS `help_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_title` varchar(500) NOT NULL,
  `embed_video_code` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `help_videos`
--

INSERT INTO `help_videos` (`id`, `video_title`, `embed_video_code`, `status`) VALUES
(7, 'test1', 'http://www.youtube.com/v/opVb89Cmrtk&hl=en&fs=1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `holiday_ideas`
--

CREATE TABLE IF NOT EXISTS `holiday_ideas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `holiday_ideas`
--

INSERT INTO `holiday_ideas` (`id`, `name`, `description`, `image`, `status`) VALUES
(1, 'Goghoom', 'dsfsdf', 't14.jpg', 1),
(2, 'Nirmala', 'asdasd', 'images (1).jpg', 1),
(3, 'test', 'fgdfg', 'images (4).jpg', 1),
(4, 'fgfd', 'dfgdf', 'images (3).jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_booking_info`
--

CREATE TABLE IF NOT EXISTS `hotel_booking_info` (
  `hotel_booking_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `h_cus_contact_details_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `image` text NOT NULL,
  `voucher_date` date NOT NULL,
  `xml_currency` varchar(64) NOT NULL,
  `hotel_code` varchar(32) NOT NULL,
  `sup_hotel_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `selling_price` float NOT NULL,
  `total_cost` float NOT NULL,
  `total_final_price` float NOT NULL,
  `near_by_area` varchar(50) NOT NULL,
  `near_by_location` varchar(50) NOT NULL,
  `grand_total` float NOT NULL,
  `hotel_name` varchar(128) NOT NULL,
  `city` varchar(64) NOT NULL,
  `room_type` text NOT NULL,
  `room_code` varchar(20) NOT NULL,
  `star` smallint(2) NOT NULL,
  `address` text NOT NULL,
  `no_of_rooms` smallint(2) NOT NULL,
  `cancel_tilldate` date NOT NULL,
  `cancel_policy` text NOT NULL,
  `provider_id` smallint(2) NOT NULL,
  `adult` varchar(12) NOT NULL,
  `child` varchar(12) NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(32) NOT NULL,
  `fax` varchar(32) NOT NULL,
  `no_of_nights` varchar(32) NOT NULL,
  `api` varchar(20) NOT NULL,
  `supplier_detail` mediumtext NOT NULL,
  `remarks` mediumtext NOT NULL,
  `commenttype` varchar(40) NOT NULL,
  `comment_desc` mediumtext NOT NULL,
  `child_age` varchar(10) NOT NULL,
  `api_temp_hotel_id` bigint(100) NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `current_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hotel_booking_info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `hotel_booking_info`
--

INSERT INTO `hotel_booking_info` (`hotel_booking_info_id`, `h_cus_contact_details_id`, `check_in`, `check_out`, `image`, `voucher_date`, `xml_currency`, `hotel_code`, `sup_hotel_id`, `supplier_id`, `selling_price`, `total_cost`, `total_final_price`, `near_by_area`, `near_by_location`, `grand_total`, `hotel_name`, `city`, `room_type`, `room_code`, `star`, `address`, `no_of_rooms`, `cancel_tilldate`, `cancel_policy`, `provider_id`, `adult`, `child`, `description`, `phone`, `fax`, `no_of_nights`, `api`, `supplier_detail`, `remarks`, `commenttype`, `comment_desc`, `child_age`, `api_temp_hotel_id`, `session_id`, `current_date`) VALUES
(1, 1, '2013-04-12', '2013-04-13', 'http://192.168.0.117/WDM/crs/supplier_hotels_images/992650_187_b_tn.jpg', '0000-00-00', '', 'CRS3', 3, 0, 2400, 2400, 2400, '', '', 2800, 'Crown Plaza1', '2', 'Triple Room', '15', 0, 'sxcfre', 1, '0000-00-00', '', 0, '5', '5', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', 'nirmala.provab@gmail', '651684984984', '1', 'crs', '', '', '', '', '', 5, '75c6gmg2rmsg2r8rhf71emmk35', '2013-04-05 04:30:45'),
(2, 2, '2013-04-12', '2013-04-13', 'http://192.168.0.117/WDM/crs/supplier_hotels_images/992650_187_b_tn.jpg', '0000-00-00', '', 'CRS3', 3, 0, 1800, 1800, 1800, '', '', 1800, 'Crown Plaza1', '2', 'Single Room', '13', 0, 'sxcfre', 1, '0000-00-00', '', 0, '5', '5', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', 'nirmala.provab@gmail', '651684984984', '1', 'crs', '', '', '', '', '', 2, '75c6gmg2rmsg2r8rhf71emmk35', '2013-04-05 05:24:22'),
(3, 3, '2013-04-05', '2013-04-06', 'http://192.168.0.117/WDM/crs/supplier_hotels_images/crowne-plaza-sheikh-zayd-road-dubai.jpg', '0000-00-00', '', 'CRS1', 1, 0, 1600, 1600, 1600, 'test area', 'test attraction', 1600, 'Crown Plaza', '2', 'Double Room', '6', 4, 'zdfghy', 1, '0000-00-00', '', 0, '5', '4', 'fhgytjyuik8', 'nirmala.provab@gmail', '651684984984', '1', 'crs', '', '', '', '', '', 46, 'gecdp7pdehsv0hn19fe74su3u0', '2013-04-05 09:14:05'),
(4, 4, '2013-04-05', '2013-04-06', 'http://192.168.0.117/WDM/crs/supplier_hotels_images/992650_187_b_tn.jpg', '0000-00-00', '', 'CRS3', 3, 0, 2400, 2400, 2400, '', '', 5800, 'Crown Plaza1', '2', 'Triple Room', '15', 0, 'sxcfre', 1, '0000-00-00', '', 0, '5', '5', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', 'nirmala.provab@gmail', '651684984984', '1', 'crs', '', '', '', '', '', 85, 'gecdp7pdehsv0hn19fe74su3u0', '2013-04-05 11:14:19'),
(5, 5, '2013-04-16', '2013-04-17', 'http://192.168.0.117/WDM/crs/supplier_hotels_images/992650_187_b_tn.jpg', '0000-00-00', '', 'CRS3', 3, 0, 1800, 1800, 1800, '', '', 1800, 'Crown Plaza1', '2', 'Single Room', '13', 0, 'sxcfre', 1, '0000-00-00', '', 0, '5', '5', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', 'nirmala.provab@gmail', '651684984984', '1', 'crs', '', '', '', '', '', 87, '75c6gmg2rmsg2r8rhf71emmk35', '2013-04-05 11:34:14'),
(6, 6, '2013-04-10', '2013-04-11', 'http://192.168.0.117/WDM/crs/supplier_hotels_images/crowne_plaza_dubai_01.jpg', '0000-00-00', '', 'CRS5', 5, 0, 1800, 1800, 1800, 'sdsds', 'fdfdfd', 1800, 'Prince Villiam', '2', 'Double Room', '5', 0, '4545', 1, '0000-00-00', '', 0, '5', '4', 'This unique new central London hostel is housed in a Victorian listed building that received a substantial refurbishment to restore it to original condition It offers international travellers all the facilities expected at the very best hostels in London The hostel offers 35 guest rooms in total and facilities include a lobby with hotel safe lift access a newspaper stand TV ', 'nirmala.provab@gmail', '55454', '1', 'crs', '', '', '', '', '', 93, '75c6gmg2rmsg2r8rhf71emmk35', '2013-04-05 12:45:34'),
(7, 7, '2013-04-25', '2013-04-26', 'http://192.168.0.117/WDM/crs/supplier_hotels_images/992650_187_b_tn.jpg', '0000-00-00', '', 'CRS3', 3, 8, 1800, 1800, 1800, '', '', 1800, 'Crown Plaza1', '2', 'Single Room', '13', 0, 'sxcfre', 1, '0000-00-00', '', 0, '5', '5', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', 'nirmala.provab@gmail', '651684984984', '1', 'crs', '', '', '', '', '', 87, '7rcpt6hfat3h7mb8uji7157bf6', '2013-04-13 06:55:50'),
(15, 15, '2013-04-27', '2013-04-28', 'http://192.168.0.117/WDM/crs/supplier_hotels_images/992650_187_b_tn.jpg', '0000-00-00', '', 'CRS3', 3, 8, 1800, 1800, 1800, '', '', 1800, 'Crown Plaza1', '2', 'Single Room', '13', 0, 'sxcfre', 1, '0000-00-00', '', 0, '5', '5', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', '9876543210', '651684984984', '1', 'crs', '', '', '', '', '', 701, '26k8mpghtfdh6u2t602af7bod0', '2013-04-18 10:13:55'),
(13, 13, '2013-04-25', '2013-04-26', 'http://192.168.0.117/WDM/crs/supplier_hotels_images/992650_187_b_tn.jpg', '0000-00-00', '', 'CRS3', 3, 8, 1800, 1800, 1800, '', '', 2200, 'Crown Plaza1', '2', 'Single Room', '13', 0, 'sxcfre', 1, '0000-00-00', '', 0, '5', '5', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', '9876543210', '651684984984', '1', 'crs', '', '', '', '', '', 694, '26k8mpghtfdh6u2t602af7bod0', '2013-04-18 08:08:11'),
(14, 14, '2013-04-25', '2013-04-26', 'http://192.168.0.117/WDM/crs/supplier_hotels_images/crowne_plaza_dubai_01.jpg', '0000-00-00', '', 'CRS5', 5, 4, 1800, 1800, 1800, 'sdsds', 'fdfdfd', 1800, 'Prince Villiam', '2', 'Double Room', '5', 0, '4545', 1, '0000-00-00', '', 0, '5', '4', 'This unique new central London hostel is housed in a Victorian listed building that received a substantial refurbishment to restore it to original condition It offers international travellers all the facilities expected at the very best hostels in London The hostel offers 35 guest rooms in total and facilities include a lobby with hotel safe lift access a newspaper stand TV ', '9876543210', '55454', '1', 'crs', '', '', '', '', '', 695, '26k8mpghtfdh6u2t602af7bod0', '2013-04-18 08:34:20'),
(16, 16, '2013-04-27', '2013-04-28', 'http://192.168.0.117/WDM/crs/supplier_hotels_images/crowne_plaza_dubai_01.jpg', '0000-00-00', '', 'CRS5', 5, 4, 1800, 1800, 1800, 'sdsds', 'fdfdfd', 1800, 'Prince Villiam', '2', 'Double Room', '5', 0, '4545', 1, '0000-00-00', '', 0, '5', '4', 'This unique new central London hostel is housed in a Victorian listed building that received a substantial refurbishment to restore it to original condition It offers international travellers all the facilities expected at the very best hostels in London The hostel offers 35 guest rooms in total and facilities include a lobby with hotel safe lift access a newspaper stand TV ', '9876543210', '55454', '1', 'crs', '', '', '', '', '', 702, '26k8mpghtfdh6u2t602af7bod0', '2013-04-18 10:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_customer_contact_details`
--

CREATE TABLE IF NOT EXISTS `hotel_customer_contact_details` (
  `h_cus_contact_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category` varchar(4) NOT NULL,
  `api_temp_hotel_id` bigint(100) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `booking_number` varchar(250) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `office_phone` varchar(20) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `amount` float NOT NULL COMMENT 'in USD',
  `currency` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0:Not Booked;1:Booked;2:Pending;3:Cancelled',
  `cancellation_desc` text NOT NULL,
  `cancel_req_date` datetime NOT NULL,
  `refund_amount` varchar(20) NOT NULL,
  `cancellation_charge` varchar(20) NOT NULL,
  `commission` float NOT NULL,
  `booked_date` date NOT NULL,
  PRIMARY KEY (`h_cus_contact_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `hotel_customer_contact_details`
--

INSERT INTO `hotel_customer_contact_details` (`h_cus_contact_details_id`, `user_id`, `category`, `api_temp_hotel_id`, `transaction_id`, `booking_number`, `first_name`, `last_name`, `email`, `city`, `zip_code`, `state`, `mobile_no`, `office_phone`, `fax`, `amount`, `currency`, `status`, `cancellation_desc`, `cancel_req_date`, `refund_amount`, `cancellation_charge`, `commission`, `booked_date`) VALUES
(1, 0, 'b2c', 5, 'TXHOTEL001231', 'GH1H001231', 'Nirmala', 'Reddy', 'nirmala.btech.v@gmail.com', 'Bangalore', '522408', 'karnataka', '9876543210', '9876543210', 'efrg', 51.02, '', 3, '', '2013-04-12 12:29:29', '1800', '60', 0, '2013-04-05'),
(2, 0, 'b2c', 2, '', 'GH1H001232', 'Nirmala', 'Reddy', 'nirmala.btech.v@gmail.com', 'Bangalore', '522408', 'karnataka', '9876543210', '9876543210', 'efrg', 32.8, '', 3, '', '2013-04-12 12:29:17', '', '564', 0, '2013-04-08'),
(3, 0, 'b2c', 46, '', 'GH1H001233', 'momahim', 'momahim', 'momahim@gmail.com', 'Bangalore', '560041', 'karnataka', '8888888888', '8888888888', '454', 29.18, '', 1, 'dvthy', '2013-04-12 12:27:25', '', '', 0, '2013-04-05'),
(4, 33, 'b2c', 85, '', 'GH1H001234', 'momahim', 'momahim', 'momahim@gmail.com', 'Bangalore', '560041', 'karnataka', '8888888888', '8888888888', '454', 105.76, '', 3, 'dzsfaery5 fg hgd vb nti6y ghciyuy8i                                                                                                                      ', '2013-04-20 13:16:25', '15621', 'fggh', 0, '2013-04-06'),
(17, 0, 'b2c', 1675, '', '', 'Cultural Tourism', 'satheesh', 'satheeshperumal.provab@gmail.com', 'bangalore', '1356', 'dfd', '343244', '324324', '', 27.58, 'USD', 0, '', '0000-00-00 00:00:00', '', '', 0, '2013-04-23'),
(5, 33, 'b2c', 87, '', 'GH1H001235', 'Nirmala', 'Reddy', 'nirmala.provab@gmail.com', 'Bangalore', '522408', 'karnataka', '9876543210', '9876543210', '659+5', 32.82, '', 3, 'ewtergn nmbfjdn nbdsgjf nbjngjh     ', '2013-04-12 15:23:39', '1800', '564', 0, '0000-00-00'),
(6, 33, 'b2c', 93, '', 'GH1H001236', 'Nirmala', 'Reddy', 'nirmala.provab@gmail.com', 'Bangalore', '522408', 'karnataka', '9876543210', '9876543210', '659+5', 32.81, '', 3, 'dgdfgfh            ', '2013-04-12 15:26:03', '1800', '20', 0, '2013-04-07'),
(15, 29, '', 701, '', 'GH1H0012315', 'mzvb', 'dfghju', 'admin@provab.com', 'Bangalore', '5887466', 'gff', '86486469', '965468468589', 'fg', 1080, 'INR', 4, '                             This user wants to cancel his booking plaese cancel this ticket.                                                                                                                                                                                                                                ', '2013-04-19 17:15:45', '1500', '100', 720, '2013-04-18'),
(13, 29, '', 694, '', 'GH1H0012313', 'mzvb', 'dfghju', 'admin@provab.com', 'Bangalore', '5887466', 'gff', '86486469', '965468468589', 'fg', 1480, 'INR', 1, '', '0000-00-00 00:00:00', '', '', 720, '2013-04-18'),
(14, 29, '', 695, '', 'GH1H0012314', 'mzvb', 'dfghju', 'nirmala.provab@gmail.com', 'Bangalore', '5887466', 'gff', '86486469', '965468468589', 'fg', 1440, 'INR', 1, '', '0000-00-00 00:00:00', '', '', 360, '2013-04-18'),
(16, 29, '', 702, '', 'GH1H0012316', 'mzvb', 'dfghju', 'nirmala.provab@gmail.com', 'Bangalore', '5887466', 'gff', '86486469', '965468468589', 'fg', 1440, 'INR', 4, 'scsdgtr', '2013-04-19 17:15:53', '0', '0', 360, '2013-04-18'),
(18, 33, 'b2c', 1697, '', '', 'Nirmala', 'Reddy', 'nirmala.provab@gmail.com', 'Mysore', 'fhtyj', 'd', '3345', '3345', 'ju', 32.26, 'USD', 0, '', '0000-00-00 00:00:00', '', '', 0, '2013-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `hot_deals`
--

CREATE TABLE IF NOT EXISTS `hot_deals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `hot_deals`
--

INSERT INTO `hot_deals` (`id`, `name`, `price`, `description`, `image`, `status`) VALUES
(1, 'Goghoom', '2000', 'dfsdfsdf', 'images (2).jpg', 1),
(8, 'test', '4534', 'sdfsd', 'home-wigwam.jpg', 1),
(3, 'testingd', '2343', 'dsfsd', 'images (1).jpg', 1),
(6, 'test', '2000', 'dfsdf', 'images (3).jpg', 1),
(7, 'Nirmala', '2000', 'asdasda', 'images.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE IF NOT EXISTS `latest_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`id`, `title`, `description`, `date`, `status`) VALUES
(2, 'test', 'Lorem ipsum dolor sit amet, consectetuer dfhghyt', '0000-00-00', 1),
(4, 'example news', 'West Bengal Governor M K Narayanan Friday apologised to students and teachers of Presidency University for this week''s violence on campus, saying he had "failed" in his responsibility as chancellor.', '2013-04-14', 1),
(5, 'water shortage', 'Ahmedabad: Through this summer, CNN-IBN will focus on the acute water shortage that is gripping large parts of the country. In areas like North Gujarat, where those who were promised water from the Narmada canals are still waiting for relief.', '2013-04-17', 1),
(6, 'mumbai news', 'The airline had last year pulled out flights to Bangkok and Kuala Lumpur from these cities, citing high airport charges at these places as the reason.', '2013-04-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `supplier_type` varchar(100) NOT NULL,
  `b2c_id` int(10) NOT NULL,
  `b2b_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_street_address` varchar(1000) NOT NULL,
  `customer_city` varchar(200) NOT NULL,
  `customer_country` varchar(200) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `booking_range` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `total_cost` bigint(20) NOT NULL,
  `payment_amount` float NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `order_comments` varchar(1000) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `payment_clear` varchar(100) NOT NULL,
  `supplier_called` varchar(100) NOT NULL,
  `customer_called` varchar(100) NOT NULL,
  `order_confirmed` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `per_night_cost` varchar(50) NOT NULL,
  `totalNights` varchar(10) NOT NULL,
  `forNightsCost` varchar(50) NOT NULL,
  `surplus_charge` varchar(50) NOT NULL,
  `deposit_type` varchar(50) NOT NULL,
  `deposited_bank` varchar(50) NOT NULL,
  `deposited_branch` varchar(50) NOT NULL,
  `deposited_city` varchar(50) NOT NULL,
  `remarks` tinytext NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `cheque_date` date NOT NULL,
  `cheque_number` varchar(50) NOT NULL,
  `collect_person` varchar(50) NOT NULL,
  `collect_city` varchar(50) NOT NULL,
  `collect_addr` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `product_name`, `supplier_id`, `supplier_type`, `b2c_id`, `b2b_id`, `customer_name`, `customer_email`, `customer_street_address`, `customer_city`, `customer_country`, `customer_phone`, `booking_range`, `from_date`, `to_date`, `total_cost`, `payment_amount`, `payment_status`, `order_comments`, `order_status`, `payment_clear`, `supplier_called`, `customer_called`, `order_confirmed`, `datetime`, `per_night_cost`, `totalNights`, `forNightsCost`, `surplus_charge`, `deposit_type`, `deposited_bank`, `deposited_branch`, `deposited_city`, `remarks`, `transaction_id`, `cheque_date`, `cheque_number`, `collect_person`, `collect_city`, `collect_addr`) VALUES
(13, 1, 'Crown Plaza', 4, '1', 33, 0, '', '', 'sfdgd', 'dgf', 'dsgf', 'd', '', '2013-04-27', '2013-04-28', 540, 545, 'pending', '', '', '', '', '', '', '2013-04-27 12:31:28', '500', '1', '500', '5', 'etransfer', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(14, 7, 'Palmers Lodge', 4, '1', 85, 0, '', '', 'edui', 'sdyio', 'iassudi', '2384779', '', '2013-04-26', '2013-04-27', 0, 0, 'pending', '', '', '', '', '', '', '2013-04-29 05:43:36', '0', '1', '0', '', '', '', '', '', '', '', '0000-00-00', '', '', '', ''),
(15, 1, 'Crown Plaza', 4, '1', 0, 17, '', '', 'fdsd', 'fgd', 'fdgfd', '45435', '', '2013-04-29', '2013-04-30', 0, 0, 'recieved', '', '', '', '', '', '', '2013-04-29 05:42:37', '0', '1', '0', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_extra_products`
--

CREATE TABLE IF NOT EXISTS `orders_extra_products` (
  `orders_extra_products_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `extra_products` varchar(250) NOT NULL,
  `extra_product_price` varchar(50) NOT NULL,
  `extra_product_quantity` varchar(50) NOT NULL,
  `extra_product_price_total` varchar(50) NOT NULL,
  PRIMARY KEY (`orders_extra_products_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `orders_extra_products`
--

INSERT INTO `orders_extra_products` (`orders_extra_products_id`, `orders_id`, `extra_products`, `extra_product_price`, `extra_product_quantity`, `extra_product_price_total`) VALUES
(1, 1, 'Product 1', '1000', '2', '2000'),
(2, 1, 'Product 2', '2000', '3', '6000'),
(3, 1, 'Product 3', '3000', '4', '12000'),
(4, 1, 'Product 4', '4000', '5', '20000'),
(5, 1, 'Product 5', '5000', '6', '30000'),
(6, 2, 'Product 1', '1000', '2', '2000'),
(7, 2, 'Product 2', '2000', '3', '6000'),
(8, 2, 'Product 3', '3000', '4', '12000'),
(9, 2, 'Product 4', '4000', '5', '20000'),
(10, 3, 'yjmm', '132', '5', '660'),
(16, 9, 'xdgf', '50', '1', '50'),
(15, 8, 'fgsdfsdsf', '122', '1', '122'),
(17, 10, '', '', '', ''),
(18, 11, 'xdgf', '20', '1', '20'),
(19, 12, 'gf', '500', '1', '500'),
(20, 13, 'xcgf', '40', '1', '40'),
(21, 14, '', '', '', ''),
(22, 15, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `previliges_b2b`
--

CREATE TABLE IF NOT EXISTS `previliges_b2b` (
  `previliges_b2b_id` int(11) NOT NULL AUTO_INCREMENT,
  `edit_details` int(11) NOT NULL,
  `view_reports` int(11) NOT NULL,
  PRIMARY KEY (`previliges_b2b_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `previliges_b2b`
--

INSERT INTO `previliges_b2b` (`previliges_b2b_id`, `edit_details`, `view_reports`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `previliges_call_center_agents`
--

CREATE TABLE IF NOT EXISTS `previliges_call_center_agents` (
  `previliges_call_center_agents_id` int(11) NOT NULL AUTO_INCREMENT,
  `create_order` int(11) NOT NULL,
  `edit_order` int(11) NOT NULL,
  `delete_order` int(11) NOT NULL,
  `view_order` int(11) NOT NULL,
  `create_complaint` int(11) NOT NULL,
  `edit_complaint` int(11) NOT NULL,
  `delete_complaint` int(11) NOT NULL,
  `static_pages` int(11) NOT NULL,
  `email_templates` int(11) NOT NULL,
  `top_destinations` int(11) NOT NULL,
  `deals` int(11) NOT NULL,
  `news` int(11) NOT NULL,
  PRIMARY KEY (`previliges_call_center_agents_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `previliges_call_center_agents`
--

INSERT INTO `previliges_call_center_agents` (`previliges_call_center_agents_id`, `create_order`, `edit_order`, `delete_order`, `view_order`, `create_complaint`, `edit_complaint`, `delete_complaint`, `static_pages`, `email_templates`, `top_destinations`, `deals`, `news`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `previliges_data_entry_agents`
--

CREATE TABLE IF NOT EXISTS `previliges_data_entry_agents` (
  `previliges_data_entry_agents_id` int(11) NOT NULL AUTO_INCREMENT,
  `add_hotel` int(11) NOT NULL,
  `edit_hotel` int(11) NOT NULL,
  `delete_hotel` int(11) NOT NULL,
  `add_hotel_rooms` int(11) NOT NULL,
  `edit_hotel_rooms` int(11) NOT NULL,
  `delete_hotel_rooms` int(11) NOT NULL,
  `hotel_room_inventory` int(11) NOT NULL,
  `hotel_pricing` int(11) NOT NULL,
  `add_villa` int(11) NOT NULL,
  `edit_villa` int(11) NOT NULL,
  `delete_villa` int(11) NOT NULL,
  `villa_room_inventory` int(11) NOT NULL,
  `villa_pricing` int(11) NOT NULL,
  `add_car` int(11) NOT NULL,
  `edit_car` int(11) NOT NULL,
  `delete_car` int(11) NOT NULL,
  `car_room_inventory` int(11) NOT NULL,
  `car_pricing` int(11) NOT NULL,
  PRIMARY KEY (`previliges_data_entry_agents_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `previliges_data_entry_agents`
--

INSERT INTO `previliges_data_entry_agents` (`previliges_data_entry_agents_id`, `add_hotel`, `edit_hotel`, `delete_hotel`, `add_hotel_rooms`, `edit_hotel_rooms`, `delete_hotel_rooms`, `hotel_room_inventory`, `hotel_pricing`, `add_villa`, `edit_villa`, `delete_villa`, `villa_room_inventory`, `villa_pricing`, `add_car`, `edit_car`, `delete_car`, `car_room_inventory`, `car_pricing`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `static_pages`
--

CREATE TABLE IF NOT EXISTS `static_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `static_pages`
--

INSERT INTO `static_pages` (`id`, `page_name`, `content`, `status`) VALUES
(2, 'About Us', '<p style="margin: 0px; padding: 5px 0px; line-height: 26px; color: rgb(34, 34, 34); font-family: Arial, Geneva, sans-serif; font-size: 15px; background-color: rgb(255, 255, 255);">Something that I have wanted to do for a long time is&nbsp;<strong style="margin: 0px; padding: 0px;">take a look at the web’s best About Us pages</strong>. Why? Because a good About Us page is hard to come by. Normally they are a boring, self-serving mix of me me me and us us us. But a they are so vital to your business. In fact, its usually the first place people look before they start to take you seriously. Get it wrong and you could be turning people off without even knowing it.</p><p style="margin: 0px; padding: 5px 0px; line-height: 26px; color: rgb(34, 34, 34); font-family: Arial, Geneva, sans-serif; font-size: 15px; background-color: rgb(255, 255, 255);">In this post I am going to show you what I consider to be&nbsp;<strong style="margin: 0px; padding: 0px;">12 of the best About Us pages on the internet</strong>. I’m going to go through them all, one by one, and show you what makes them so good.</p>', 1),
(8, 'FAQ', '<font size="2"><cite>Contents</cite> is an online magazine for readers who create, \r\nedit, publish, analyze, and care for the contents of the internet. We \r\npublish in open, themed issues that run for about eight weeks. When \r\nwe’re publishing an issue, a new article appears most Wednesdays.</font><br><br><font size="2">We are biased toward open access, reader-friendly design and policy, \r\nquality over quantity, and the creation of usable beautiful things.</font><br>', 1),
(3, 'Help', '<p style="margin: 0px; padding: 5px 0px; line-height: 26px; color: rgb(34, 34, 34); font-family: Arial, Geneva, sans-serif; font-size: 15px; background-color: rgb(255, 255, 255);">Something that I have wanted to do for a long time is&nbsp;<strong style="margin: 0px; padding: 0px;">take a look at the web’s best About Us pages</strong>. Why? Because a good About Us page is hard to come by. Normally they are a boring, self-serving mix of me me me and us us us. But a they are so vital to your business. In fact, its usually the first place people look before they start to take you seriously. Get it wrong and you could be turning people off without even knowing it.</p><p style="margin: 0px; padding: 5px 0px; line-height: 26px; color: rgb(34, 34, 34); font-family: Arial, Geneva, sans-serif; font-size: 15px; background-color: rgb(255, 255, 255);">In this post I am going to show you what I consider to be&nbsp;<strong style="margin: 0px; padding: 0px;">12 of the best About Us pages on the internet</strong>. I’m going to go through them all, one by one, and show you what makes them so good.</p>', 1),
(109, 'Contact Us', '', 1),
(111, 'Flights', '<br>', 1),
(10, 'Car Rental', '<p style="margin: 0.4em 0px 0.5em; line-height: 19.1875px; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);">A&nbsp;<b>car rental</b>&nbsp;or&nbsp;<b>car hire</b>&nbsp;agency is a company that&nbsp;<a href="http://en.wikipedia.org/wiki/Renting" title="Renting" style="color: rgb(11, 0, 128); background-image: none;">rents</a>&nbsp;<a href="http://en.wikipedia.org/wiki/Automobile" title="Automobile" style="color: rgb(11, 0, 128); background-image: none;">automobiles</a>&nbsp;for short periods of time (generally ranging from a few hours to a few weeks) for a<a href="http://en.wikipedia.org/wiki/Fee" title="Fee" style="color: rgb(11, 0, 128); background-image: none;">fee</a>. It is often organized with numerous local&nbsp;<a href="http://en.wikipedia.org/wiki/Branch#Organizations" title="Branch" style="color: rgb(11, 0, 128); background-image: none;">branches</a>&nbsp;(which allow a user to return a vehicle to a different location), and primarily located near&nbsp;<a href="http://en.wikipedia.org/wiki/Airport" title="Airport" style="color: rgb(11, 0, 128); background-image: none;">airports</a>or busy city areas and often complemented by a website allowing online&nbsp;<a href="http://en.wikipedia.org/wiki/Computer_reservations_system" title="Computer reservations system" style="color: rgb(11, 0, 128); background-image: none;">reservations</a>.</p><p style="margin: 0.4em 0px 0.5em; line-height: 19.1875px; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);">Car rental agencies primarily serve people who have a car that is temporarily out of reach or out of service, for example&nbsp;<a href="http://en.wikipedia.org/wiki/Travel" title="Travel" style="color: rgb(11, 0, 128); background-image: none;">travellers</a>&nbsp;who are out of town or owners of damaged or destroyed vehicles who are awaiting repair or&nbsp;<a href="http://en.wikipedia.org/wiki/Auto_insurance" title="Auto insurance" class="mw-redirect" style="color: rgb(11, 0, 128); background-image: none;">insurance</a>&nbsp;compensation. Because of the variety of sizes of their vehicles, car rental agencies may also serve the self-<a href="http://en.wikipedia.org/wiki/Moving_industry" title="Moving industry" class="mw-redirect" style="color: rgb(11, 0, 128); background-image: none;">moving industry</a>&nbsp;needs, by renting&nbsp;<a href="http://en.wikipedia.org/wiki/Van" title="Van" style="color: rgb(11, 0, 128); background-image: none;">vans</a>&nbsp;or&nbsp;<a href="http://en.wikipedia.org/wiki/Truck" title="Truck" style="color: rgb(11, 0, 128); background-image: none;">trucks</a>, and in certain markets other types of vehicles such as motorcycles or scooters may also be offered.</p><p style="margin: 0.4em 0px 0.5em; line-height: 19.1875px; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);">Alongside the basic rental of a vehicle, car rental agencies typically also offer extra products such as insurance,&nbsp;<a href="http://en.wikipedia.org/wiki/Global_positioning_system" title="Global positioning system" class="mw-redirect" style="color: rgb(11, 0, 128); background-image: none;">global positioning system</a>&nbsp;(GPS) navigation systems, entertainment systems, and even such things as mobile phones.</p>', 1),
(11, 'Private Accomodation', '<div>Within the worldwide community marketplace for renting and booking of private spaces, Airbnb offers business and private travellers an easy way to find their spaces by over 1500 offered objects in Munich. Guests quickly discover and book spaces in every price category. The trusted online community marketplace offers access to unique spaces in over 16,000 cities and 192 countries.</div><div><br></div>', 1),
(9, 'hotels & resorts', '<div><br></div><div>This leading chain of business and luxury hotels in India, offers business and leisure travellers, luxurious rooms with all amenities, exclusive service and fun filled moments. These are trademarks of all our hotels that are perfect choices whether you are visiting us on business or on a holiday.</div><div><br></div>', 1),
(12, 'Villa and Apartment Rental', '<p><p><font color="#000000" face="Verdana, Arial, sans-serif" size="2"><span style="line-height: 16px;">This beautiful light and spacious family holiday home will ensure you have the perfect holiday accommodation and location. With classic contemporary designer interior and secluded location it offers stylish comfort for a relaxing stress free holiday. Minutes from all the local amenities you choose whether to stroll along the miles of sandy beaches of the Ria Formosa or make the most of your stay by joining the local gym, playing golf at one of the many fantastic golf courses, playing tennis or taking the children to the theme parks, water sports and horse riding. And as the sun goes down decide whether to walk along the beach to the laid back beach bar/restaurants or sample. Michelin starred Portuguese cuisine. Visit the marina of Vilamoura or the market at Quateira or go further afield to explore caves and villages of the Algarvian coast. Whatever you choose to do the famous hospitality of the Portuguese people will only enhance your stay.</span></font></p><div><br></div></p>', 1),
(13, 'Flights', '<p align="justify" style="padding: 0px; margin: 0px; color: rgb(65, 65, 65); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px;">Use your preferred option from the multiple booking and ticketing services we offer. Our state–of-the-art online booking engine is specially designed for a seamless booking process. That’s not all; you can cancel and refund your bookings online as well. For those on the move, book, pay and generate your eTickets from anywhere, anytime using our Mobile Ticketing service - JetWallet.</p><br style="color: rgb(65, 65, 65); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px;"><p align="justify" style="padding: 0px; margin: 0px; color: rgb(65, 65, 65); font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 11px;">Our JetPrivilege members can use our exclusive online redemption facility to book their free flights against their JPMiles. And for those who have booked through our Contact Centre or our direct reservation offices, simply pay online right here and have your eTicket issued. Be assured all our booking and ticketing options are secure using the latest industry standards.</p>', 1),
(14, 'Travel Information', '<div><span style="color: rgb(64, 64, 64); font-family: Verdana, sans-serif; line-height: 20px;"><br></span></div><span style="color: rgb(64, 64, 64); font-family: Verdana, sans-serif; line-height: 20px;">We provide&nbsp;</span><b><a href="http://travel.state.gov/travel/cis_pa_tw/cis/cis_4965.html" title="" style="color: rgb(0, 74, 148); font-family: Verdana, sans-serif; line-height: 20px;">T</a>ravel Information</b><span style="color: rgb(64, 64, 64); font-family: Verdana, sans-serif; line-height: 20px;">&nbsp;for every country of the world. For each country, you will find information like the location of the U.S. embassy and any consular offices; whether you need a visa; crime and security information; health and medical conditions; drug penalties; and localized hot spots. This is a good place to start learning about where you are going. &nbsp;</span>', 1),
(15, 'Activities', '<div><span style="color: rgb(34, 34, 34); font-family: Roboto, sans-serif; font-size: 14px; line-height: 19px; background-color: rgb(249, 249, 249);"><br></span></div><span style="color: rgb(34, 34, 34); font-family: Roboto, sans-serif; font-size: 14px; line-height: 19px; background-color: rgb(249, 249, 249);">An </span><span style="color: rgb(34, 34, 34); background-color: rgb(249, 249, 249); line-height: 14px;"><font face="monospace" size="2"><b>Activity&nbsp;</b></font></span><span style="color: rgb(34, 34, 34); font-family: Roboto, sans-serif; font-size: 14px; line-height: 19px; background-color: rgb(249, 249, 249);">is an application component that provides a screen with which users can interact in order to do something, such as dial the phone, take a photo, send an email, or view a map. Each activity is given a window in which to draw its user interface. The window typically fills the screen, but may be smaller than the screen and float on top of other windows.</span>', 1),
(16, 'Tours', '<div><span style="color: rgb(44, 44, 44); font-family: Arial, sans-serif; line-height: 17px; background-color: rgb(255, 255, 255);"><br></span></div><span style="color: rgb(44, 44, 44); font-family: Arial, sans-serif; line-height: 17px; background-color: rgb(255, 255, 255);">We are based in Delhi and offer a variety of Tours in Delhi and from Delhi to several destinations. Our tours tend to get beneath the surface of the destination to explore less known and unique aspects. Various elements are combined to give guests the option of a complete experience - Ayurvedic massages, walks along the back of beyond regions, contact with families, home visits and dinner with families, witnessing performing arts, theater etc.</span>', 1),
(17, 'Location Guides', '<h1 class="boxed" style="font-size: 1.5em; margin: 20px 0px; padding: 0px 0px 20px; border-bottom-width: 10px; border-bottom-style: solid; border-bottom-color: rgb(13, 183, 237); color: rgb(0, 0, 0); line-height: 1.2em; font-family: Helvetica;"><span style="font-weight: normal;">The Location Guide is a global production company directory and location filming directory providing filming-on-location news, a pre-production forum and film incentives information.</span></h1>', 1),
(18, 'Lahore', '<div><font color="#3c3032" face="arial"><span style="line-height: 18px;">Lahore is Pakistan''s second largest city with population of approximately 9 million people, and the capital of the Punjab province. Lahore is no doubt Pakistan''s cultural capital, with rich and fabulous history of over thousand years.&nbsp;</span></font></div><div><font color="#3c3032" face="arial"><span style="line-height: 18px;"><br></span></font></div><div><font color="#3c3032" face="arial"><span style="line-height: 18px;">The heart of Lahore is the Walled or Inner City, a very densely populated area of about one square kilometre. Founded in legendary times, and a cultural centre for over a thousand years, Lahore has many attractions to keep the tourist busy. Minar-e-Pakistan, Lahore Fort, Badshahi Mosque and Shalimar Gardens are some of key Lahore attractions. The Mall is lined with colonial-gothic buildings from the British rule, and the suburbs of Gulberg and Defence feature beautiful mansions and trendy shopping districts.&nbsp;</span></font></div><div><br></div>', 1),
(19, 'Karachi', 'Contents is an online magazine for readers who create, edit, publish, analyze, and care for the contents of the internet. We publish in open, themed issues that run for about eight weeks. When we’re publishing an issue, a new article appears most Wednesdays.<br><br>We are biased toward open access, reader-friendly design and policy, quality over quantity, and the creation of usable beautiful things.', 1),
(20, 'Peshawar', 'Contents is an online magazine for readers who create, edit, publish, analyze, and care for the contents of the internet. We publish in open, themed issues that run for about eight weeks. When we’re publishing an issue, a new article appears most Wednesdays.<br><br>We are biased toward open access, reader-friendly design and policy, quality over quantity, and the creation of usable beautiful things.', 1),
(21, 'Islamabad', 'Contents is an online magazine for readers who create, edit, publish, analyze, and care for the contents of the internet. We publish in open, themed issues that run for about eight weeks. When we’re publishing an issue, a new article appears most Wednesdays.<br><br>We are biased toward open access, reader-friendly design and policy, quality over quantity, and the creation of usable beautiful things.', 1),
(22, 'Faislabad', '<div>Faisalabad Serena Hotel is close to the city’s business district. Two kilometers away from the teeming bazaars, the Hotel is a haven for peace and serenity in the city renowned for quality textile production. The ravishing interior of the Hotel is reminiscent of spacious old city homes of Faisalabad; Chinioti Sofas with vibrant floral tapestry made locally in Faisalabad; Traditional Ceramic lamps giving the place a majestic yet cultural touch and feel all together; A huge, stunning brass lamp hangs in the lobby, offsetting the brick walls. The courtyards and gardens are another treat for the guests as they witness a burst of tradition throughout the building as well as enjoy a truly hospitality magnificent experience.</div><div><br></div>', 1),
(23, 'Sialkot', '<div><br></div>Contents is an online magazine for readers who create, edit, publish, analyze, and care for the contents of the internet. We publish in open, themed issues that run for about eight weeks. When we’re publishing an issue, a new article appears most Wednesdays.<br><br>We are biased toward open access, reader-friendly design and policy, quality over quantity, and the creation of usable beautiful things.', 1),
(24, 'Quetta', '<p style="margin: 0.4em 0px 0.5em; line-height: 19.1875px; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);"><b><br></b></p><p style="margin: 0.4em 0px 0.5em; line-height: 19.1875px; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);"><b>Quetta&nbsp;</b>is the largest city in, and the&nbsp;<a href="http://en.wikipedia.org/wiki/Subdivisions_of_Pakistan" title="Subdivisions of Pakistan" class="mw-redirect" style="color: rgb(11, 0, 128); background-image: none;">provincial</a>&nbsp;capital of, the&nbsp;<a href="http://en.wikipedia.org/wiki/Balochistan_(Pakistan)" title="Balochistan (Pakistan)" class="mw-redirect" style="color: rgb(11, 0, 128); background-image: none;">Balochistan</a>&nbsp;province of&nbsp;<a href="http://en.wikipedia.org/wiki/Pakistan" title="Pakistan" style="color: rgb(11, 0, 128); background-image: none;">Pakistan</a>. Known as the&nbsp;<i>Fruit Garden of Balochistan</i>&nbsp;due to the diversity of its plant and animal wildlife, Quetta is situated at an average elevation of 1,680 meters (5,500&nbsp;ft) above sea level&nbsp;making it Pakistan''s only high-altitude major city. The population of the city is between 896,090&nbsp;and 2.8 million, which makes it the 6th largest city in Pakistan<sup id="cite_ref-Pak_Metor_4-0" class="reference" style="line-height: 1em;"></sup></p><p style="margin: 0.4em 0px 0.5em; line-height: 19.1875px; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);">Sitting in northern Balochistan near the&nbsp;<font color="#0b0080">Durand Line</font>&nbsp;border with&nbsp;<font color="#0b0080">Afghanistan</font>&nbsp;and close to&nbsp;<font color="#0b0080">Kandahar province</font>, Quetta is a trade and communication center between the two countries as well as an important military location which occupies a strategic position for the<font color="#0b0080">Pakistani Armed Forces</font>. The city lies on the&nbsp;<font color="#0b0080">Bolan Pass</font>&nbsp;route which was once the only gateway to and from South Asia.</p>', 1),
(25, 'Skardu', 'Contents is an online magazine for readers who create, edit, publish, analyze, and care for the contents of the internet. We publish in open, themed issues that run for about eight weeks. When we’re publishing an issue, a new article appears most Wednesdays.<br><br>We are biased toward open access, reader-friendly design and policy, quality over quantity, and the creation of usable beautiful things.', 1),
(26, 'News & Press', '<table class="contentpaneopen" style="border-spacing: 0px; padding: 0px; width: 748px; color: rgb(0, 0, 0); font-family: Verdana, Arial, sans-serif; line-height: 18px; background-color: rgb(255, 255, 255);"><tbody><tr><td colspan="2" valign="top"><br>The 193rd Annual General Meeting of the RAS will be held in the lecture theatre of the Geological Society, Burlington House, London, on 10th May 2013 at 16:00. It is open to Fellows and RAS staff only. The AGM is the opportunity for the Fellows to discuss and determine matters relating to the affairs the society. It deals with...</td></tr></tbody></table>', 1),
(27, 'Payment Methods', '<p style="font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255); margin-top: 0px;">While buying products on eBay, it is extremely important that you select the right payment method for yourself. eBay offers an array of payment options, both online and offline, which are made available to you by the seller. Different payment methods have innumerable advantages and every option can work differently for different buyers.</p><p style="font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);">Before you buy an item, always make sure that the seller''s payment methods will work for you.</p><p style="font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);"><b class="boldTxt" style="color: rgb(93, 93, 93);">Payment Methods</b></p><p style="font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255); margin-bottom: 0px;"><a href="http://pages.ebay.in/help/pay/methods.html#PaisaPay Online Payment Methods" style="color: rgb(112, 41, 142);"></a><b class="boldTxt" style="color: rgb(93, 93, 93);">Online Payment Methods (PaisaPay)</b></p><ul style="font-family: Arial, Helvetica, sans-serif; font-size: medium; margin: 6px 0px 0px; padding: 0px; list-style-type: none; background-color: rgb(255, 255, 255);"><li class="unorderedList" style="margin-bottom: 5px; margin-top: 5px; list-style-type: none; background-image: url(http://pics.ebaystatic.com/aw/pics/help/ProStores/imgPsHelpBullet.gif); padding-left: 10px; background-position: 0px 0.4em; background-repeat: no-repeat no-repeat;"><div style="font-size: small; padding-left: 4px;"><p style="font-size: small; margin-top: 0px; margin-bottom: 3px;">Online Bank Transfer</p></div></li></ul><ul style="font-family: Arial, Helvetica, sans-serif; font-size: medium; margin: 6px 0px 0px; padding: 0px; list-style-type: none; background-color: rgb(255, 255, 255);"><li class="unorderedList" style="margin-bottom: 5px; margin-top: 5px; list-style-type: none; background-image: url(http://pics.ebaystatic.com/aw/pics/help/ProStores/imgPsHelpBullet.gif); padding-left: 10px; background-position: 0px 0.4em; background-repeat: no-repeat no-repeat;"><div style="font-size: small; padding-left: 4px;"><p style="font-size: small; margin-top: 0px; margin-bottom: 3px;">Credit Card</p></div></li></ul><ul style="font-family: Arial, Helvetica, sans-serif; font-size: medium; margin: 6px 0px 0px; padding: 0px; list-style-type: none; background-color: rgb(255, 255, 255);"><li class="unorderedList" style="margin-bottom: 5px; margin-top: 5px; list-style-type: none; background-image: url(http://pics.ebaystatic.com/aw/pics/help/ProStores/imgPsHelpBullet.gif); padding-left: 10px; background-position: 0px 0.4em; background-repeat: no-repeat no-repeat;"><div style="font-size: small; padding-left: 4px;"><p style="font-size: small; margin-top: 0px; margin-bottom: 3px;">Debit Card</p></div></li></ul><ul style="font-family: Arial, Helvetica, sans-serif; font-size: medium; margin: 6px 0px 0px; padding: 0px; list-style-type: none; background-color: rgb(255, 255, 255);"><li class="unorderedList" style="margin-bottom: 5px; margin-top: 5px; list-style-type: none; background-image: url(http://pics.ebaystatic.com/aw/pics/help/ProStores/imgPsHelpBullet.gif); padding-left: 10px; background-position: 0px 0.4em; background-repeat: no-repeat no-repeat;"><div style="font-size: small; padding-left: 4px;"><p style="font-size: small; margin-top: 0px; margin-bottom: 3px;">Cash Card</p></div></li></ul><ul style="font-family: Arial, Helvetica, sans-serif; font-size: medium; margin: 6px 0px 0px; padding: 0px; list-style-type: none; background-color: rgb(255, 255, 255);"><li class="unorderedList" style="margin-bottom: 5px; margin-top: 5px; list-style-type: none; background-image: url(http://pics.ebaystatic.com/aw/pics/help/ProStores/imgPsHelpBullet.gif); padding-left: 10px; background-position: 0px 0.4em; background-repeat: no-repeat no-repeat;"><div style="font-size: small; padding-left: 4px;"><p style="font-size: small; margin-top: 0px; margin-bottom: 3px;">Mobile Payment (IMPS/Airtel Money)</p></div></li></ul><p style="font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255); margin-bottom: 0px;"><b class="boldTxt" style="color: rgb(93, 93, 93);">Offline Payment Methods</b></p><ul style="font-family: Arial, Helvetica, sans-serif; font-size: medium; margin: 6px 0px 0px; padding: 0px; list-style-type: none; background-color: rgb(255, 255, 255);"><li class="unorderedList" style="margin-bottom: 5px; margin-top: 5px; list-style-type: none; background-image: url(http://pics.ebaystatic.com/aw/pics/help/ProStores/imgPsHelpBullet.gif); padding-left: 10px; background-position: 0px 0.4em; background-repeat: no-repeat no-repeat;"><div style="font-size: small; padding-left: 4px;"><p style="font-size: small; margin-top: 0px; margin-bottom: 3px;">PaisaPay Cash on Delivery</p></div></li><li class="unorderedList" style="margin-bottom: 5px; margin-top: 5px; list-style-type: none; background-image: url(http://pics.ebaystatic.com/aw/pics/help/ProStores/imgPsHelpBullet.gif); padding-left: 10px; background-position: 0px 0.4em; background-repeat: no-repeat no-repeat;"><div style="font-size: small; padding-left: 4px;"><p style="font-size: small; margin-top: 0px; margin-bottom: 3px;">Cheques</p></div></li><li class="unorderedList" style="margin-bottom: 5px; margin-top: 5px; list-style-type: none; background-image: url(http://pics.ebaystatic.com/aw/pics/help/ProStores/imgPsHelpBullet.gif); padding-left: 10px; background-position: 0px 0.4em; background-repeat: no-repeat no-repeat;"><div style="font-size: small; padding-left: 4px;"><p style="font-size: small; margin-top: 0px; margin-bottom: 3px;">Demand Draft</p></div></li><li class="unorderedList" style="margin-bottom: 5px; margin-top: 5px; list-style-type: none; background-image: url(http://pics.ebaystatic.com/aw/pics/help/ProStores/imgPsHelpBullet.gif); padding-left: 10px; background-position: 0px 0.4em; background-repeat: no-repeat no-repeat;"><div style="font-size: small; padding-left: 4px;"><p style="font-size: small; margin-top: 0px; margin-bottom: 3px;">Buyer picks up and pays</p><div><br></div></div></li></ul><p style="font-family: Arial, Helvetica, sans-serif; font-size: small; background-color: rgb(255, 255, 255);"></p>', 1),
(28, 'Blog', '<div><span style="color: rgb(34, 34, 34); font-family: Arial, sans-serif; font-size: 13px; line-height: 21px; background-color: rgb(255, 255, 255);"><br></span></div><span style="color: rgb(34, 34, 34); font-family: Arial, sans-serif; font-size: 13px; line-height: 21px; background-color: rgb(255, 255, 255);">Contents is an online magazine for readers who create, edit, publish, analyze, and care for the contents of the internet. We publish in open, themed issues that run for about eight weeks. When we’re publishing an issue, a new article appears most Wednesdays.<br><br>We are biased toward open access, reader-friendly design and policy, quality over quantity, and the creation of usable beautiful things.</span>', 1),
(29, 'Forum', '&nbsp;Contents is an online magazine for readers who create, edit, publish, analyze, and care for the contents of the internet. We publish in open, themed issues that run for about eight weeks. When we’re publishing an issue, a new article appears most Wednesdays.<br><br>We are biased toward open access, reader-friendly design and policy, quality over quantity, and the creation of usable beautiful things.<br>', 1),
(75, 'Murree', '<div>Murree is a hill station, summer resort and the administrative centre of Murree Tehsil, Pakistan, which is a subdivision of Rawalpindi District and includes the Murree Hills. Murree was the summer capital of the British Raj in the Punjab Province</div><div><br></div>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`, `status`) VALUES
(1, 'admin@provab.com', 1),
(2, 'vijetha.provab@gmail.com', 1),
(3, 'nirmala.provab@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin_type`
--

CREATE TABLE IF NOT EXISTS `sub_admin_type` (
  `sub_admin_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_admin_type` varchar(250) NOT NULL,
  `sub_roll_type` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sub_admin_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sub_admin_type`
--

INSERT INTO `sub_admin_type` (`sub_admin_type_id`, `sub_admin_type`, `sub_roll_type`, `status`) VALUES
(4, 'call center Agemnts', 'sub4', 1),
(2, 'Data Entry operator', 'sub2', 1),
(3, 'Graphic Designer', 'sub3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin_users`
--

CREATE TABLE IF NOT EXISTS `sub_admin_users` (
  `sub_admin_users_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_admin_type_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `office_phone_no` varchar(20) NOT NULL,
  `notes` text NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sub_admin_users_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_type`
--

CREATE TABLE IF NOT EXISTS `supplier_type` (
  `supplier_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_type` varchar(250) NOT NULL,
  `sup_roll_type` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`supplier_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `supplier_type`
--

INSERT INTO `supplier_type` (`supplier_type_id`, `supplier_type`, `sup_roll_type`, `status`) VALUES
(1, 'Hotel Supplier', 'sup1', 1),
(2, 'Villa Supplier', 'sup2', 1),
(3, 'Car Supplier', 'sup3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sup_hotels`
--

CREATE TABLE IF NOT EXISTS `sup_hotels` (
  `sup_hotel_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `custom_hotel_id` varchar(20) NOT NULL,
  `hotel_code` varchar(50) NOT NULL,
  `city_name` varchar(250) NOT NULL,
  `hotel_name` varchar(250) NOT NULL,
  `main_first_name` varchar(250) NOT NULL,
  `main_last_name` varchar(250) NOT NULL,
  `main_email` varchar(250) NOT NULL,
  `main_phone_no` varchar(20) NOT NULL,
  `main_fax` varchar(50) NOT NULL,
  `hotel_address` varchar(250) NOT NULL,
  `hotel_desc` text NOT NULL,
  `hotel_policies` text NOT NULL,
  `near_by_area` varchar(250) NOT NULL,
  `near_by_attraction` varchar(250) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`sup_hotel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `sup_hotels`
--

INSERT INTO `sup_hotels` (`sup_hotel_id`, `supplier_id`, `custom_hotel_id`, `hotel_code`, `city_name`, `hotel_name`, `main_first_name`, `main_last_name`, `main_email`, `main_phone_no`, `main_fax`, `hotel_address`, `hotel_desc`, `hotel_policies`, `near_by_area`, `near_by_attraction`, `latitude`, `longitude`, `status`) VALUES
(1, 4, 'CRS101', 'CRS1', '2', 'Crown Plaza', 'Nirmala', 'Reddy', 'nirmala.provab@gmail.com', '9876543210', '651684984984', 'zdfghy', 'fhgytjyuik8', 'dfgtyui87890', 'test area', 'test attraction', '54.673831', '-2.526855', 1),
(23, 4, '67567567', 'CRS23', '2', 'hjgjghjghj', 'Provab Technosoft', 'jh', 'nirmala.provab1@gmail.com', '9876543210', '456', 'hf', 'gf<br>', 'j<br>', 'hj', 'jh', '54.673831', '-2.526855', 1),
(7, 4, '102', 'CRS7', '2', 'Palmers Lodge', 'Nirmala', 'Reddy', 'nirmala.provab@gmail.com', '9876543210', 'dsgt', 'COLLEGE CRESCENT 40., LONDON', 'This unique new central London hostel is housed in a Victorian listed building that received a substantial refurbishment to restore it to original condition It offers international travellers all the facilities expected at the very best hostels in London The hostel offers 35 guest rooms in total and facilities include a lobby with hotel safe lift access a newspaper stand TV lounge bar and disco Guests may also take advantage of the WLAN Internet access a laundry service and a car park fees apply', 'This unique new central London hostel is housed in a Victorian listed building that received a substantial refurbishment to restore it to original condition It offers international travellers all the facilities expected at the very best hostels in London The hostel offers 35 guest rooms in total and facilities include a lobby with hotel safe lift access a newspaper stand TV lounge bar and disco Guests may also take advantage of the WLAN Internet access a laundry service and a car park fees apply', 'Airport', 'dht', '54.673831', '-2.526855', 1),
(2, 4, 'CRS102', 'CRS2', '2', 'Taaj Banjara', 'Nirmala', 'Reddy', 'nirmala.provab@gmail.com', '9876543210', '651684984984', 'safrgrty', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', 'dgtrhy67i8', '', '', '54.673831', '-2.526855', 1),
(3, 8, 'CRS3', 'CRS3', '2', 'Crown Plaza1', 'Nirmala', 'Reddy', 'nirmala.provab@gmail.com', '9876543210', '651684984984', 'sxcfre', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', 'dsgt6uy', '', '', '54.673831', '-2.526855', 1),
(4, 4, 'CRS105', 'CRS4', '2', 'Taaj Banjara1', 'Nirmala', 'Reddy', 'nirmala.provab@gmail.com', '9876543210', '', 'asf r', 'The city hotel offers affordable accommodation ideal for the backpacker who wants to travel on a budget without sacrificing quality Facilities include a restaurant and car park', 'fdhgyi978o<br>', '', '', '54.673831', '-2.526855', 1),
(22, 4, '1250', 'CRS22', '7', 'fsghg', 'Provab Technosoft', 'adsfd', 'nirmala.provab1@gmail.com', '9876543210', 'dfsgd', 'ytu', 'ytyi', 'szf', '', '', '54.673831', '-2.526855', 1),
(13, 12, '123', 'CRS13', '7', 'ris_testing', 'riswana', 'fathima', 'riswana@gmail.com', '123456', '', 'tgu', 'try', 'werewr', '', '', '54.673831', '-2.526855', 1),
(5, 4, 'ds32', 'CRS5', '2', 'Prince Villiam', 'Nirmala', 'Reddy', 'nirmala.provab@gmail.com', '9876543210', '55454', '4545', 'This unique new central London hostel is housed in a Victorian listed building that received a substantial refurbishment to restore it to original condition It offers international travellers all the facilities expected at the very best hostels in London The hostel offers 35 guest rooms in total and facilities include a lobby with hotel safe lift access a newspaper stand TV ', '', 'sdsds', 'fdfdfd', '55.38535180341315', '-0.4064936718750687', 1),
(6, 4, 'dff', 'CRS6', '2', 'NOVOTEL', 'NOVOTEL', 'adfadf', 'adfadf@gmail.com', '9876543210', '666666', 'asd', 'Built in 1880 and renovated in 2001 the hotel offers a total of 47 rooms of which 12 are singles 29 are doubles and 6 are suites The facilities include a 24-hour reception a safe and a lift The hotel has a its own restaurant', 'asd', '', '', '54.673831', '-2.526855', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sup_hotel_extra_products`
--

CREATE TABLE IF NOT EXISTS `sup_hotel_extra_products` (
  `sup_hotel_extra_products_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_hotel_id` int(11) NOT NULL,
  `hotel_code` varchar(250) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_des` text NOT NULL,
  `payment_mode` int(11) NOT NULL COMMENT 'one Time payment =0,per day=1,per day Per Adult=2',
  `price` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`sup_hotel_extra_products_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `sup_hotel_extra_products`
--

INSERT INTO `sup_hotel_extra_products` (`sup_hotel_extra_products_id`, `sup_hotel_id`, `hotel_code`, `product_name`, `product_des`, `payment_mode`, `price`, `status`) VALUES
(8, 1, 'CRS1', 'Lunch', '', 1, '250', 1),
(3, 4, 'CRS4', 'BreakFast', '', 2, '200', 1),
(4, 7, 'CRS7', 'Breakfast', '', 2, '20', 1),
(7, 1, 'CRS1', 'Breakfast', '', 2, '150', 1),
(5, 3, 'CRS3', 'Breakfast', '', 2, '200', 1),
(6, 2, 'CRS2', 'Breakfast', '', 2, '20', 1),
(11, 9, 'CRS9', 'product2', '', 0, '120', 1),
(14, 12, 'CRS12', 'product2', '', 0, '123', 1),
(19, 15, 'CRS15', 'Lunch', 'Fresh Lunch Buffet', 1, '900', 1),
(18, 15, 'CRS15', 'Breack Fast', 'Fresh Break Fast Buffet\r\nserved(7 am to 10pm)', 1, '100', 1),
(20, 13, 'CRS13', 'Breack Fast', 'xcbfgh', 1, '100', 1),
(21, 13, 'CRS13', 'Lunch', 'zxdgd', 2, '100', 1),
(23, 22, 'CRS22', 'Breack Fast', 'zfds', 2, '100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sup_hotel_facilities`
--

CREATE TABLE IF NOT EXISTS `sup_hotel_facilities` (
  `sup_fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_hotel_id` int(11) NOT NULL,
  `hotel_code` varchar(250) NOT NULL,
  `amenity_list_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sup_fac_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `sup_hotel_facilities`
--

INSERT INTO `sup_hotel_facilities` (`sup_fac_id`, `sup_hotel_id`, `hotel_code`, `amenity_list_id`, `status`) VALUES
(1, 1, 'CRS1', 1, 1),
(2, 1, 'CRS1', 2, 1),
(3, 1, 'CRS1', 3, 1),
(14, 5, 'CRS5', 2, 1),
(6, 7, 'CRS7', 1, 1),
(7, 7, 'CRS7', 2, 1),
(8, 7, 'CRS7', 3, 1),
(9, 6, 'CRS6', 1, 1),
(10, 6, 'CRS6', 2, 1),
(13, 5, 'CRS5', 1, 1),
(15, 5, 'CRS5', 3, 1),
(16, 4, 'CRS4', 2, 1),
(17, 4, 'CRS4', 3, 1),
(18, 3, 'CRS3', 1, 1),
(19, 3, 'CRS3', 2, 1),
(20, 2, 'CRS2', 1, 1),
(21, 2, 'CRS2', 5, 1),
(43, 23, 'CRS23', 2, 1),
(32, 9, 'CRS9', 2, 1),
(39, 15, 'CRS15', 1, 1),
(42, 23, 'CRS23', 1, 1),
(44, 23, 'CRS23', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sup_hotel_images`
--

CREATE TABLE IF NOT EXISTS `sup_hotel_images` (
  `sup_hotel_images_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_hotel_id` int(11) NOT NULL,
  `hotel_code` varchar(250) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `image_desc` text,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`sup_hotel_images_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `sup_hotel_images`
--

INSERT INTO `sup_hotel_images` (`sup_hotel_images_id`, `sup_hotel_id`, `hotel_code`, `image_name`, `image_desc`, `status`) VALUES
(1, 1, 'CRS1', 'Chrysanthemum.jpg', '', 1),
(2, 1, 'CRS1', 'Penguins.jpg', '', 0),
(3, 1, 'CRS1', 'Tulips.jpg', '', 1),
(20, 1, 'CRS1', 'crowne-plaza-sheikh-zayd-road-dubai.jpg', NULL, 1),
(8, 4, '', '381_abacos2.jpg', 'klkllklk', 1),
(17, 3, 'CRS3', 'casino2.jpg', NULL, 1),
(19, 2, 'CRS2', '_1383.jpeg', NULL, 1),
(16, 5, 'CRS5', 'crowne_plaza_dubai_01.jpg', NULL, 1),
(15, 6, 'CRS6', '26145_37_b_tn.jpg', NULL, 1),
(13, 7, 'CRS7', '527463_6_b_tn.jpg', NULL, 1),
(14, 7, 'CRS7', 'crowne_plaza_dubai_01.jpg', NULL, 1),
(21, 9, 'CRS9', '2009LazzaraYachtsLSXNinetyTwoAft1920x1200.jpg', NULL, 1),
(18, 3, 'CRS3', '992650_187_b_tn.jpg', NULL, 1),
(22, 9, 'CRS9', '2009LazzaraYachtsLSXNinetyTwoAft1920x1200.jpg', NULL, 1),
(23, 3, 'CRS3', 'Penguins.jpg', NULL, 1),
(24, 15, 'CRS15', 'Chrysanthemum.jpg', NULL, 1),
(25, 15, 'CRS15', 'Chrysanthemum.jpg', NULL, 1),
(26, 13, 'CRS13', 'Jellyfish.jpg', 'dgfdh', 1),
(27, 13, 'CRS13', 'Hydrangeas.jpg', 'fxgjhgjk', 1),
(28, 23, 'CRS23', '12995slidder.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sup_hotel_near_by_location`
--

CREATE TABLE IF NOT EXISTS `sup_hotel_near_by_location` (
  `sup_hotel_near_by_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_hotel_id` int(11) NOT NULL,
  `hotel_code` varchar(250) NOT NULL,
  `global_near_by_location_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sup_hotel_near_by_location_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `sup_hotel_near_by_location`
--

INSERT INTO `sup_hotel_near_by_location` (`sup_hotel_near_by_location_id`, `sup_hotel_id`, `hotel_code`, `global_near_by_location_id`, `status`) VALUES
(11, 6, 'CRS6', 4, 1),
(10, 6, 'CRS6', 2, 1),
(9, 6, 'CRS6', 3, 1),
(12, 7, 'CRS7', 3, 1),
(13, 7, 'CRS7', 2, 1),
(20, 3, 'CRS3', 3, 1),
(15, 2, 'CRS2', 2, 1),
(16, 1, 'CRS1', 3, 1),
(17, 1, 'CRS1', 2, 1),
(18, 5, 'CRS5', 3, 1),
(19, 4, 'CRS4', 2, 1),
(27, 9, 'CRS9', 3, 1),
(30, 12, 'CRS12', 3, 1),
(34, 15, 'CRS15', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sup_hotel_reviews`
--

CREATE TABLE IF NOT EXISTS `sup_hotel_reviews` (
  `sup_hotel_reviews_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_hotel_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `hotel_code` varchar(250) NOT NULL,
  `user_review` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `star_rating` float NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sup_hotel_reviews_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sup_hotel_reviews`
--

INSERT INTO `sup_hotel_reviews` (`sup_hotel_reviews_id`, `sup_hotel_id`, `user_name`, `hotel_code`, `user_review`, `city`, `star_rating`, `date`, `status`) VALUES
(1, 4, '', '', 'Honda CRV 2013 – Superior with refinement (Expert Review)\r\n\r\nWith the arrival of more and more diesel cars in the domestic market, the value of petrol engine cars has decreased to an extent. Moreover, the trend of diesel SUVs in the market also did some blunder in the sales of petrol in-line SUVs like Honda CRV. Honda CRV was highly applauded by the automobile enthusiasts for its superb dynamics and advanced features when it was first launched, however, the increase in number of rivals dethroned it from SUV leader position. Now, the auto-giant Honda SIEL ...', '', 0, '0000-00-00', 2),
(2, 4, '', '', 'Honda CRV 2013 – Superior with refinement (Expert Review)\r\n\r\nWith the arrival of more and more diesel cars in the domestic market, the value of petrol engine cars has decreased to an extent. Moreover, the trend of diesel SUVs in the market also did some blunder in the sales of petrol in-line SUVs like Honda CRV. Honda CRV was highly applauded by the automobile enthusiasts for its superb dynamics and advanced features when it was first launched, however, the increase in number of rivals dethroned it from SUV leader position. Now, the auto-giant Honda SIEL ...', '', 2, '0000-00-00', 2),
(3, 2, '', '', 'Honda CRV 2013 – Superior with refinement (Expert Review)\r\n\r\nWith the arrival of more and more diesel cars in the domestic market, the value of petrol engine cars has decreased to an extent. Moreover, the trend of diesel SUVs in the market also did some blunder in the sales of petrol in-line SUVs like Honda CRV. Honda CRV was highly applauded by the automobile enthusiasts for its superb dynamics and advanced features when it was first launched, however, the increase in number of rivals dethroned it from SUV leader position. Now, the auto-giant Honda SIEL ...', '', 0, '0000-00-00', 0),
(4, 2, '', '', 'Honda CRV 2013 – Superior with refinement (Expert Review)\r\n\r\nWith the arrival of more and more diesel cars in the domestic market, the value of petrol engine cars has decreased to an extent. Moreover, the trend of diesel SUVs in the market also did some blunder in the sales of petrol in-line SUVs like Honda CRV. Honda CRV was highly applauded by the automobile enthusiasts for its superb dynamics and advanced features when it was first launched, however, the increase in number of rivals dethroned it from SUV leader position. Now, the auto-giant Honda SIEL ...', '', 0, '0000-00-00', 0),
(5, 4, '', '', 'Honda CRV 2013 – Superior with refinement (Expert Review)\r\n\r\nWith the arrival of more and more diesel cars in the domestic market, the value of petrol engine cars has decreased to an extent. Moreover, the trend of diesel SUVs in the market also did some blunder in the sales of petrol in-line SUVs like Honda CRV. Honda CRV was highly applauded by the automobile enthusiasts for its superb dynamics and advanced features when it was first launched, however, the increase in number of rivals dethroned it from SUV leader position. Now, the auto-giant Honda SIEL ...', '', 4, '0000-00-00', 1),
(7, 3, 'wewq', '', 'weqe', 'Bangalore', 2, '2013-03-28', 0),
(8, 1, 'xzs', '', 'dgrd', 'Mysore', 4, '2013-03-28', 1),
(9, 1, 'fdef', 'dsgfd', 'gfgdfgfdsg', 'fdgfds', 2, '2013-04-02', 1),
(10, 1, 'ffdgf', 'fgdf', 'gfdgfd fdgfdgfd', 'fgfd', 5, '2013-04-11', 1),
(11, 1, 'sfa', '', 'sdfgh', 'Bangalore', 3, '2013-04-03', 0),
(12, 1, 'v', '', 'bgfh', 'Bangalore', 2.5, '2013-04-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sup_hotel_room_details`
--

CREATE TABLE IF NOT EXISTS `sup_hotel_room_details` (
  `sup_room_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_hotel_id` int(11) NOT NULL,
  `hotel_code` varchar(250) NOT NULL,
  `global_room_category_type_id` int(11) NOT NULL,
  `room_name` varchar(250) NOT NULL,
  `room_desc` text NOT NULL,
  `occupancy` int(11) NOT NULL,
  `no_of_adults` int(11) NOT NULL,
  `no_of_childs` int(11) NOT NULL,
  `total_no_of_rooms` int(11) NOT NULL,
  `room_critical_level` varchar(50) NOT NULL,
  `no_of_rooms_left` int(11) NOT NULL,
  `room_policies` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sup_room_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `sup_hotel_room_details`
--

INSERT INTO `sup_hotel_room_details` (`sup_room_details_id`, `sup_hotel_id`, `hotel_code`, `global_room_category_type_id`, `room_name`, `room_desc`, `occupancy`, `no_of_adults`, `no_of_childs`, `total_no_of_rooms`, `room_critical_level`, `no_of_rooms_left`, `room_policies`, `status`, `created_date`) VALUES
(1, 4, 'CRS4', 1, 'Single Room1', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 7, 5, 4, 10, '1', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-04-22 13:44:06'),
(2, 4, 'CRS4', 4, 'Single Room', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 10, 5, 4, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-04-22 13:44:12'),
(3, 5, 'CRS5', 1, 'xzfv', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 10, 5, 4, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-04-22 13:44:20'),
(4, 3, 'CRS3', 1, 'xzfv', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 7, 5, 4, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-04-22 13:44:28'),
(5, 5, 'CRS5', 4, 'Single Room1', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 11, 5, 4, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-04-22 13:45:18'),
(6, 1, 'CRS1', 4, 'Standard Double Room Only', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 8, 5, 4, 10, '0', 10, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-04-22 13:45:40'),
(7, 1, 'CRS1', 1, 'Standard Single Room Only', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 7, 5, 4, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-04-22 13:44:57'),
(8, 7, 'CRS7', 4, 'Standard Double Room', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 5, 5, 5, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-03-15 07:37:10'),
(9, 6, 'CRS6', 4, 'Standard Double Room', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 8, 5, 5, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-03-15 08:55:46'),
(10, 3, 'CRS3', 4, 'Standard Double Room', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 6, 5, 5, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-03-15 09:01:18'),
(11, 2, 'CRS2', 5, 'Standard Triple Room Only', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 9, 5, 5, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-03-15 09:03:16'),
(12, 4, 'CRS4', 7, 'Standard Single Room Only', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 5, 5, 5, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-04-22 13:45:49'),
(13, 3, 'CRS3', 7, 'Standard Single Room Only', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 5, 5, 5, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-04-22 13:46:08'),
(14, 7, 'CRS7', 7, 'Standard Single Room', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 8, 5, 5, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 0, '2013-04-22 13:45:59'),
(15, 3, 'CRS3', 5, 'Standard Triple Room Only', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 8, 5, 5, 10, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-04-22 13:46:18'),
(16, 8, 'CRS8', 7, 'rty546', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 3, 2, 1, 3, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-04-22 13:46:28'),
(17, 9, 'CRS9', 4, 'room1', 'description', 19, 2, 1, 12, '0', 0, 'description', 1, '2013-04-16 12:23:24'),
(18, 12, 'CRS12', 4, 'Deluxe', 'Description', 18, 2, 3, 4, '0', 0, 'Description', 0, '2013-04-16 12:33:54'),
(19, 12, 'CRS12', 4, 'Ultra Deluxe', 'Description', 18, 12, 10, 12, '0', 0, 'Description', 1, '2013-04-16 12:33:44'),
(20, 12, 'CRS12', 7, 'Deluxe', 'Description', 18, 1, 2, 3, '1', 0, 'Description', 0, '2013-04-16 12:38:28'),
(22, 1, 'CRS1', 7, 'Standard Single Room Only', 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 7, 3, 2, 2, '0', 0, 'This unique new central London hostel is housed in a Victorian listed \r\nbuilding that received a substantial refurbishment to restore it to \r\noriginal condition  It offers international travellers all the \r\nfacilities expected at the very best hostels in London  The hostel \r\noffers 35 guest rooms in total  and facilities include a lobby with \r\nhotel safe  lift access  a newspaper stand  TV lounge  bar and disco  \r\nGuests may also take advantage of the WLAN Internet access  a laundry \r\nservice and a car park  fees apply', 1, '2013-04-22 13:44:46'),
(23, 15, 'CRS15', 7, 'df', 'ds', 6, 11, 2, 4, '0', 0, 'ds', 1, '2013-04-20 11:24:43'),
(24, 13, 'CRS13', 7, 'Standard Single Room Only', 'Sacdwgf&lt;br&gt;', 4, 3, 2, 2, '0', 0, 'thytj&lt;br&gt;', 1, '2013-04-24 05:39:13'),
(25, 23, 'CRS23', 4, 'dddddddddddd', 'dfgdh&lt;br&gt;', 3, 2, 1, 4, '0', 0, 'dghfgh&lt;br&gt;', 1, '2013-04-26 06:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `sup_hotel_room_facilities`
--

CREATE TABLE IF NOT EXISTS `sup_hotel_room_facilities` (
  `sup_hotel_room_facilities_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_hotel_id` int(11) NOT NULL,
  `hotel_code` varchar(250) NOT NULL,
  `sup_room_details_id` int(11) NOT NULL,
  `amenity_list_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sup_hotel_room_facilities_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sup_hotel_room_facilities`
--

INSERT INTO `sup_hotel_room_facilities` (`sup_hotel_room_facilities_id`, `sup_hotel_id`, `hotel_code`, `sup_room_details_id`, `amenity_list_id`, `status`) VALUES
(4, 4, '', 1, 3, 1),
(3, 4, '', 1, 2, 1),
(10, 6, 'CRS6', 9, 1, 1),
(11, 6, 'CRS6', 9, 2, 1),
(12, 5, 'CRS5', 5, 2, 1),
(13, 5, 'CRS5', 5, 5, 1),
(14, 4, 'CRS4', 2, 2, 1),
(15, 4, 'CRS4', 2, 5, 1),
(16, 3, 'CRS3', 10, 1, 1),
(17, 3, 'CRS3', 10, 2, 1),
(18, 2, 'CRS2', 11, 1, 1),
(19, 2, 'CRS2', 11, 2, 1),
(20, 1, 'CRS1', 6, 2, 1),
(21, 1, 'CRS1', 6, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sup_hotel_room_period_details`
--

CREATE TABLE IF NOT EXISTS `sup_hotel_room_period_details` (
  `sup_hotel_room_period_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_hotel_id` int(11) NOT NULL,
  `hotel_code` varchar(250) NOT NULL,
  `sup_room_details_id` int(11) NOT NULL,
  `room_avail_date_from` date NOT NULL,
  `room_avail_date_to` date NOT NULL,
  `check_markup` varchar(20) NOT NULL COMMENT '0="percentage" ,1="amount"',
  `check_discount` varchar(20) NOT NULL COMMENT '0="percentage" ,1="amount"',
  `status` int(11) NOT NULL,
  PRIMARY KEY (`sup_hotel_room_period_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sup_hotel_room_period_details`
--

INSERT INTO `sup_hotel_room_period_details` (`sup_hotel_room_period_details_id`, `sup_hotel_id`, `hotel_code`, `sup_room_details_id`, `room_avail_date_from`, `room_avail_date_to`, `check_markup`, `check_discount`, `status`) VALUES
(1, 1, 'CRS1', 6, '2013-03-24', '2013-05-31', '0', '0', 1),
(2, 6, 'CRS6', 9, '2013-03-24', '2013-07-23', '0', '0', 1),
(3, 5, 'CRS5', 5, '2013-03-23', '2013-05-28', '0', '0', 1),
(4, 3, 'CRS3', 13, '2013-03-23', '2013-05-31', '1', '0', 1),
(5, 3, 'CRS3', 10, '2013-03-23', '2013-06-19', '0', '0', 1),
(6, 3, 'CRS3', 15, '2013-03-23', '2013-06-25', '0', '0', 1),
(9, 12, 'CRS12', 18, '2013-04-30', '2013-05-01', '', '', 1),
(10, 1, 'CRS1', 22, '2013-04-18', '2013-06-13', '0', '0', 1),
(11, 7, 'CRS7', 14, '2013-04-18', '2013-04-19', '', '', 1),
(12, 8, 'CRS8', 16, '2013-05-02', '2013-07-20', '', '', 1),
(13, 15, 'CRS15', 23, '2013-04-22', '2013-06-07', '0', '0', 1),
(14, 13, 'CRS13', 24, '2013-04-25', '2013-04-29', '0', '', 1),
(15, 23, 'CRS23', 25, '2013-04-26', '2013-05-23', '0', '', 1),
(16, 1, 'CRS1', 22, '2015-11-11', '2015-11-12', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sup_hotel_videos`
--

CREATE TABLE IF NOT EXISTS `sup_hotel_videos` (
  `sup_hotel_videos_id` int(11) NOT NULL AUTO_INCREMENT,
  `sup_hotel_id` int(11) NOT NULL,
  `hotel_code` varchar(250) NOT NULL,
  `video_title` varchar(250) NOT NULL,
  `video_name` varchar(250) NOT NULL,
  `embed_video_code` text NOT NULL,
  `video_type_id` int(11) NOT NULL COMMENT '1-video file,2-embed_code',
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`sup_hotel_videos_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `sup_hotel_videos`
--

INSERT INTO `sup_hotel_videos` (`sup_hotel_videos_id`, `sup_hotel_id`, `hotel_code`, `video_title`, `video_name`, `embed_video_code`, `video_type_id`, `status`) VALUES
(1, 15, '', 'fgt', '', '<iframe width="420" height="315" src="http://www.youtube.com/embed/922ticRtTbY" frameborder="0" allowfullscreen></iframe>', 2, 1),
(3, 15, '', '', '20051210-w50s_56K.flv', '', 1, 1),
(5, 4, '', '', 'barsandtone.flv', '', 1, 1),
(6, 4, '', 'fgt', '', '<iframe width="420" height="315" src="http://www.youtube.com/embed/922ticRtTbY" frameborder="0" allowfullscreen></iframe>', 2, 1),
(9, 3, '', 'adw', '', '<iframe width="420" height="315" src="http://www.youtube.com/embed/922ticRtTbY" frameborder="0" allowfullscreen></iframe>', 2, 1),
(8, 3, '', '', '20051210-w50s_56K.flv', '', 1, 1),
(10, 15, '', 'dfdf', '', '<iframe width="420" height="315" src="http://www.youtube.com/embed/Rx-l_lARhUE" frameborder="0" allowfullscreen></iframe>', 2, 1),
(11, 13, '', '', '20051210-w50s_56K.flv', '', 1, 1),
(12, 3, '', '', 'HsFs3603dSequence_l.flv', '', 1, 1),
(13, 12, '', 'xdfcvdfgf', '', '<iframe width="560" height="315" src="http://www.youtube.com/embed/Ju8gxy5eI34" frameborder="0" allowfullscreen></iframe>', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sup_room_category_type`
--

CREATE TABLE IF NOT EXISTS `sup_room_category_type` (
  `sup_room_cate_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `categoty_type` varchar(250) NOT NULL,
  `sup_hotel_id` int(11) NOT NULL,
  `hotel_code` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`sup_room_cate_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sup_room_maintain_month`
--

CREATE TABLE IF NOT EXISTS `sup_room_maintain_month` (
  `sup_room_maintain_month_id` bigint(100) NOT NULL AUTO_INCREMENT,
  `sup_room_details_id` int(11) NOT NULL,
  `sup_hotel_room_period_details_id` int(11) NOT NULL,
  `sup_hotel_id` int(11) NOT NULL,
  `hotel_code` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `week_day` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `avilable_rooms` int(11) NOT NULL,
  `cost_price` varchar(20) NOT NULL,
  `markup` varchar(20) NOT NULL,
  `selling_price` varchar(20) NOT NULL,
  `discount_rule` varchar(250) NOT NULL,
  `check_discount` varchar(20) NOT NULL COMMENT '0="percentage" ,1="amount"',
  `check_markup` varchar(20) NOT NULL COMMENT '0="percentage" ,1="amount"',
  `final_price` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`sup_room_maintain_month_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2060 ;

--
-- Dumping data for table `sup_room_maintain_month`
--

INSERT INTO `sup_room_maintain_month` (`sup_room_maintain_month_id`, `sup_room_details_id`, `sup_hotel_room_period_details_id`, `sup_hotel_id`, `hotel_code`, `date`, `week_day`, `day`, `month`, `year`, `avilable_rooms`, `cost_price`, `markup`, `selling_price`, `discount_rule`, `check_discount`, `check_markup`, `final_price`, `status`) VALUES
(395, 9, 2, 6, 'CRS6', '2013-05-28', 'Tue', '28', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(396, 9, 2, 6, 'CRS6', '2013-05-29', 'Wed', '29', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(393, 9, 2, 6, 'CRS6', '2013-05-26', 'Sun', '26', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(394, 9, 2, 6, 'CRS6', '2013-05-27', 'Mon', '27', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(390, 9, 2, 6, 'CRS6', '2013-05-23', 'Thu', '23', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(391, 9, 2, 6, 'CRS6', '2013-05-24', 'Fri', '24', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(392, 9, 2, 6, 'CRS6', '2013-05-25', 'Sat', '25', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(388, 9, 2, 6, 'CRS6', '2013-05-21', 'Tue', '21', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(389, 9, 2, 6, 'CRS6', '2013-05-22', 'Wed', '22', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(385, 9, 2, 6, 'CRS6', '2013-05-18', 'Sat', '18', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(386, 9, 2, 6, 'CRS6', '2013-05-19', 'Sun', '19', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(387, 9, 2, 6, 'CRS6', '2013-05-20', 'Mon', '20', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(383, 9, 2, 6, 'CRS6', '2013-05-16', 'Thu', '16', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(384, 9, 2, 6, 'CRS6', '2013-05-17', 'Fri', '17', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(1223, 6, 1, 1, 'CRS1', '2013-04-27', 'Sat', '27', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1222, 6, 1, 1, 'CRS1', '2013-04-26', 'Fri', '26', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1221, 6, 1, 1, 'CRS1', '2013-04-25', 'Thu', '25', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1220, 6, 1, 1, 'CRS1', '2013-04-24', 'Wed', '24', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1219, 6, 1, 1, 'CRS1', '2013-04-23', 'Tue', '23', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1218, 6, 1, 1, 'CRS1', '2013-04-22', 'Mon', '22', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1217, 6, 1, 1, 'CRS1', '2013-04-21', 'Sun', '21', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1216, 6, 1, 1, 'CRS1', '2013-04-20', 'Sat', '20', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1215, 6, 1, 1, 'CRS1', '2013-04-19', 'Fri', '19', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1214, 6, 1, 1, 'CRS1', '2013-04-18', 'Thu', '18', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1213, 6, 1, 1, 'CRS1', '2013-04-17', 'Wed', '17', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1212, 6, 1, 1, 'CRS1', '2013-04-16', 'Tue', '16', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1211, 6, 1, 1, 'CRS1', '2013-04-15', 'Mon', '15', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1210, 6, 1, 1, 'CRS1', '2013-04-14', 'Sun', '14', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1209, 6, 1, 1, 'CRS1', '2013-04-13', 'Sat', '13', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1208, 6, 1, 1, 'CRS1', '2013-04-12', 'Fri', '12', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1207, 6, 1, 1, 'CRS1', '2013-04-11', 'Thu', '11', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1206, 6, 1, 1, 'CRS1', '2013-04-10', 'Wed', '10', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1205, 6, 1, 1, 'CRS1', '2013-04-09', 'Tue', '09', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1204, 6, 1, 1, 'CRS1', '2013-04-08', 'Mon', '08', '04', 2013, 9, '1200', '20', '1600', '2', '', '', '1800', 1),
(1203, 6, 1, 1, 'CRS1', '2013-04-07', 'Sun', '07', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1202, 6, 1, 1, 'CRS1', '2013-04-06', 'Sat', '06', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1201, 6, 1, 1, 'CRS1', '2013-04-05', 'Fri', '05', '04', 2013, 7, '1200', '20', '1600', '2', '', '', '1800', 1),
(1200, 6, 1, 1, 'CRS1', '2013-04-04', 'Thu', '04', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1199, 6, 1, 1, 'CRS1', '2013-04-03', 'Wed', '03', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1198, 6, 1, 1, 'CRS1', '2013-04-02', 'Tue', '02', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1197, 6, 1, 1, 'CRS1', '2013-04-01', 'Mon', '01', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1196, 6, 1, 1, 'CRS1', '2013-03-31', 'Sun', '31', '03', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1195, 6, 1, 1, 'CRS1', '2013-03-30', 'Sat', '30', '03', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1194, 6, 1, 1, 'CRS1', '2013-03-29', 'Fri', '29', '03', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1193, 6, 1, 1, 'CRS1', '2013-03-28', 'Thu', '28', '03', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1192, 6, 1, 1, 'CRS1', '2013-03-27', 'Wed', '27', '03', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1191, 6, 1, 1, 'CRS1', '2013-03-26', 'Tue', '26', '03', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1190, 6, 1, 1, 'CRS1', '2013-03-25', 'Mon', '25', '03', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1189, 6, 1, 1, 'CRS1', '2013-03-24', 'Sun', '24', '03', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(382, 9, 2, 6, 'CRS6', '2013-05-15', 'Wed', '15', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(381, 9, 2, 6, 'CRS6', '2013-05-14', 'Tue', '14', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(380, 9, 2, 6, 'CRS6', '2013-05-13', 'Mon', '13', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(379, 9, 2, 6, 'CRS6', '2013-05-12', 'Sun', '12', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(378, 9, 2, 6, 'CRS6', '2013-05-11', 'Sat', '11', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(377, 9, 2, 6, 'CRS6', '2013-05-10', 'Fri', '10', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(376, 9, 2, 6, 'CRS6', '2013-05-09', 'Thu', '09', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(375, 9, 2, 6, 'CRS6', '2013-05-08', 'Wed', '08', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(374, 9, 2, 6, 'CRS6', '2013-05-07', 'Tue', '07', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(373, 9, 2, 6, 'CRS6', '2013-05-06', 'Mon', '06', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(372, 9, 2, 6, 'CRS6', '2013-05-05', 'Sun', '05', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(371, 9, 2, 6, 'CRS6', '2013-05-04', 'Sat', '04', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(370, 9, 2, 6, 'CRS6', '2013-05-03', 'Fri', '03', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(369, 9, 2, 6, 'CRS6', '2013-05-02', 'Thu', '02', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(368, 9, 2, 6, 'CRS6', '2013-05-01', 'Wed', '01', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(367, 9, 2, 6, 'CRS6', '2013-04-30', 'Tue', '30', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(366, 9, 2, 6, 'CRS6', '2013-04-29', 'Mon', '29', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(365, 9, 2, 6, 'CRS6', '2013-04-28', 'Sun', '28', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(364, 9, 2, 6, 'CRS6', '2013-04-27', 'Sat', '27', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(363, 9, 2, 6, 'CRS6', '2013-04-26', 'Fri', '26', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(362, 9, 2, 6, 'CRS6', '2013-04-25', 'Thu', '25', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(361, 9, 2, 6, 'CRS6', '2013-04-24', 'Wed', '24', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(360, 9, 2, 6, 'CRS6', '2013-04-23', 'Tue', '23', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(359, 9, 2, 6, 'CRS6', '2013-04-22', 'Mon', '22', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(358, 9, 2, 6, 'CRS6', '2013-04-21', 'Sun', '21', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(357, 9, 2, 6, 'CRS6', '2013-04-20', 'Sat', '20', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(356, 9, 2, 6, 'CRS6', '2013-04-19', 'Fri', '19', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(355, 9, 2, 6, 'CRS6', '2013-04-18', 'Thu', '18', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(354, 9, 2, 6, 'CRS6', '2013-04-17', 'Wed', '17', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(353, 9, 2, 6, 'CRS6', '2013-04-16', 'Tue', '16', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(352, 9, 2, 6, 'CRS6', '2013-04-15', 'Mon', '15', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(351, 9, 2, 6, 'CRS6', '2013-04-14', 'Sun', '14', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(350, 9, 2, 6, 'CRS6', '2013-04-13', 'Sat', '13', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(349, 9, 2, 6, 'CRS6', '2013-04-12', 'Fri', '12', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(348, 9, 2, 6, 'CRS6', '2013-04-11', 'Thu', '11', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(347, 9, 2, 6, 'CRS6', '2013-04-10', 'Wed', '10', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(346, 9, 2, 6, 'CRS6', '2013-04-09', 'Tue', '09', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(345, 9, 2, 6, 'CRS6', '2013-04-08', 'Mon', '08', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(344, 9, 2, 6, 'CRS6', '2013-04-07', 'Sun', '07', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(343, 9, 2, 6, 'CRS6', '2013-04-06', 'Sat', '06', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(342, 9, 2, 6, 'CRS6', '2013-04-05', 'Fri', '05', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(341, 9, 2, 6, 'CRS6', '2013-04-04', 'Thu', '04', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(340, 9, 2, 6, 'CRS6', '2013-04-03', 'Wed', '03', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(339, 9, 2, 6, 'CRS6', '2013-04-02', 'Tue', '02', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(338, 9, 2, 6, 'CRS6', '2013-04-01', 'Mon', '01', '04', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(337, 9, 2, 6, 'CRS6', '2013-03-31', 'Sun', '31', '03', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(336, 9, 2, 6, 'CRS6', '2013-03-30', 'Sat', '30', '03', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(335, 9, 2, 6, 'CRS6', '2013-03-29', 'Fri', '29', '03', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(334, 9, 2, 6, 'CRS6', '2013-03-28', 'Thu', '28', '03', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(333, 9, 2, 6, 'CRS6', '2013-03-27', 'Wed', '27', '03', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(332, 9, 2, 6, 'CRS6', '2013-03-26', 'Tue', '26', '03', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(331, 9, 2, 6, 'CRS6', '2013-03-25', 'Mon', '25', '03', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(330, 9, 2, 6, 'CRS6', '2013-03-24', 'Sun', '24', '03', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(397, 9, 2, 6, 'CRS6', '2013-05-30', 'Thu', '30', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(398, 9, 2, 6, 'CRS6', '2013-05-31', 'Fri', '31', '05', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(399, 9, 2, 6, 'CRS6', '2013-06-01', 'Sat', '01', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(400, 9, 2, 6, 'CRS6', '2013-06-02', 'Sun', '02', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(401, 9, 2, 6, 'CRS6', '2013-06-03', 'Mon', '03', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(402, 9, 2, 6, 'CRS6', '2013-06-04', 'Tue', '04', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(403, 9, 2, 6, 'CRS6', '2013-06-05', 'Wed', '05', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(404, 9, 2, 6, 'CRS6', '2013-06-06', 'Thu', '06', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(405, 9, 2, 6, 'CRS6', '2013-06-07', 'Fri', '07', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(406, 9, 2, 6, 'CRS6', '2013-06-08', 'Sat', '08', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(407, 9, 2, 6, 'CRS6', '2013-06-09', 'Sun', '09', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(408, 9, 2, 6, 'CRS6', '2013-06-10', 'Mon', '10', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(409, 9, 2, 6, 'CRS6', '2013-06-11', 'Tue', '11', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(410, 9, 2, 6, 'CRS6', '2013-06-12', 'Wed', '12', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(411, 9, 2, 6, 'CRS6', '2013-06-13', 'Thu', '13', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(412, 9, 2, 6, 'CRS6', '2013-06-14', 'Fri', '14', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(413, 9, 2, 6, 'CRS6', '2013-06-15', 'Sat', '15', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(414, 9, 2, 6, 'CRS6', '2013-06-16', 'Sun', '16', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(415, 9, 2, 6, 'CRS6', '2013-06-17', 'Mon', '17', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(416, 9, 2, 6, 'CRS6', '2013-06-18', 'Tue', '18', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(417, 9, 2, 6, 'CRS6', '2013-06-19', 'Wed', '19', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(418, 9, 2, 6, 'CRS6', '2013-06-20', 'Thu', '20', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(419, 9, 2, 6, 'CRS6', '2013-06-21', 'Fri', '21', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(420, 9, 2, 6, 'CRS6', '2013-06-22', 'Sat', '22', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(421, 9, 2, 6, 'CRS6', '2013-06-23', 'Sun', '23', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(422, 9, 2, 6, 'CRS6', '2013-06-24', 'Mon', '24', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(423, 9, 2, 6, 'CRS6', '2013-06-25', 'Tue', '25', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(424, 9, 2, 6, 'CRS6', '2013-06-26', 'Wed', '26', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(425, 9, 2, 6, 'CRS6', '2013-06-27', 'Thu', '27', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(426, 9, 2, 6, 'CRS6', '2013-06-28', 'Fri', '28', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(427, 9, 2, 6, 'CRS6', '2013-06-29', 'Sat', '29', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(428, 9, 2, 6, 'CRS6', '2013-06-30', 'Sun', '30', '06', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(429, 9, 2, 6, 'CRS6', '2013-07-01', 'Mon', '01', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(430, 9, 2, 6, 'CRS6', '2013-07-02', 'Tue', '02', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(431, 9, 2, 6, 'CRS6', '2013-07-03', 'Wed', '03', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(432, 9, 2, 6, 'CRS6', '2013-07-04', 'Thu', '04', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(433, 9, 2, 6, 'CRS6', '2013-07-05', 'Fri', '05', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(434, 9, 2, 6, 'CRS6', '2013-07-06', 'Sat', '06', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(435, 9, 2, 6, 'CRS6', '2013-07-07', 'Sun', '07', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(436, 9, 2, 6, 'CRS6', '2013-07-08', 'Mon', '08', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(437, 9, 2, 6, 'CRS6', '2013-07-09', 'Tue', '09', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(438, 9, 2, 6, 'CRS6', '2013-07-10', 'Wed', '10', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(439, 9, 2, 6, 'CRS6', '2013-07-11', 'Thu', '11', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(440, 9, 2, 6, 'CRS6', '2013-07-12', 'Fri', '12', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(441, 9, 2, 6, 'CRS6', '2013-07-13', 'Sat', '13', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(442, 9, 2, 6, 'CRS6', '2013-07-14', 'Sun', '14', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(443, 9, 2, 6, 'CRS6', '2013-07-15', 'Mon', '15', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(444, 9, 2, 6, 'CRS6', '2013-07-16', 'Tue', '16', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(445, 9, 2, 6, 'CRS6', '2013-07-17', 'Wed', '17', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(446, 9, 2, 6, 'CRS6', '2013-07-18', 'Thu', '18', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(447, 9, 2, 6, 'CRS6', '2013-07-19', 'Fri', '19', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(448, 9, 2, 6, 'CRS6', '2013-07-20', 'Sat', '20', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(449, 9, 2, 6, 'CRS6', '2013-07-21', 'Sun', '21', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(450, 9, 2, 6, 'CRS6', '2013-07-22', 'Mon', '22', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(451, 9, 2, 6, 'CRS6', '2013-07-23', 'Tue', '23', '07', 2013, 10, '400', '20', '1500', '2', '', '', '1500', 1),
(552, 5, 3, 5, 'CRS5', '2013-04-25', 'Thu', '25', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(551, 5, 3, 5, 'CRS5', '2013-04-24', 'Wed', '24', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(550, 5, 3, 5, 'CRS5', '2013-04-23', 'Tue', '23', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(549, 5, 3, 5, 'CRS5', '2013-04-22', 'Mon', '22', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(548, 5, 3, 5, 'CRS5', '2013-04-21', 'Sun', '21', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(547, 5, 3, 5, 'CRS5', '2013-04-20', 'Sat', '20', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(546, 5, 3, 5, 'CRS5', '2013-04-19', 'Fri', '19', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(545, 5, 3, 5, 'CRS5', '2013-04-18', 'Thu', '18', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(544, 5, 3, 5, 'CRS5', '2013-04-17', 'Wed', '17', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(543, 5, 3, 5, 'CRS5', '2013-04-16', 'Tue', '16', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(542, 5, 3, 5, 'CRS5', '2013-04-15', 'Mon', '15', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(541, 5, 3, 5, 'CRS5', '2013-04-14', 'Sun', '14', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(540, 5, 3, 5, 'CRS5', '2013-04-13', 'Sat', '13', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(539, 5, 3, 5, 'CRS5', '2013-04-12', 'Fri', '12', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(538, 5, 3, 5, 'CRS5', '2013-04-11', 'Thu', '11', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(537, 5, 3, 5, 'CRS5', '2013-04-10', 'Wed', '10', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(536, 5, 3, 5, 'CRS5', '2013-04-09', 'Tue', '09', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(535, 5, 3, 5, 'CRS5', '2013-04-08', 'Mon', '08', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(534, 5, 3, 5, 'CRS5', '2013-04-07', 'Sun', '07', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(533, 5, 3, 5, 'CRS5', '2013-04-06', 'Sat', '06', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(532, 5, 3, 5, 'CRS5', '2013-04-05', 'Fri', '05', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(531, 5, 3, 5, 'CRS5', '2013-04-04', 'Thu', '04', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(530, 5, 3, 5, 'CRS5', '2013-04-03', 'Wed', '03', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(529, 5, 3, 5, 'CRS5', '2013-04-02', 'Tue', '02', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(528, 5, 3, 5, 'CRS5', '2013-04-01', 'Mon', '01', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(527, 5, 3, 5, 'CRS5', '2013-03-31', 'Sun', '31', '03', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(526, 5, 3, 5, 'CRS5', '2013-03-30', 'Sat', '30', '03', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(525, 5, 3, 5, 'CRS5', '2013-03-29', 'Fri', '29', '03', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(524, 5, 3, 5, 'CRS5', '2013-03-28', 'Thu', '28', '03', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(523, 5, 3, 5, 'CRS5', '2013-03-27', 'Wed', '27', '03', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(522, 5, 3, 5, 'CRS5', '2013-03-26', 'Tue', '26', '03', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(521, 5, 3, 5, 'CRS5', '2013-03-25', 'Mon', '25', '03', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(520, 5, 3, 5, 'CRS5', '2013-03-24', 'Sun', '24', '03', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(519, 5, 3, 5, 'CRS5', '2013-03-23', 'Sat', '23', '03', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(553, 5, 3, 5, 'CRS5', '2013-04-26', 'Fri', '26', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(554, 5, 3, 5, 'CRS5', '2013-04-27', 'Sat', '27', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(555, 5, 3, 5, 'CRS5', '2013-04-28', 'Sun', '28', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(556, 5, 3, 5, 'CRS5', '2013-04-29', 'Mon', '29', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(557, 5, 3, 5, 'CRS5', '2013-04-30', 'Tue', '30', '04', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(558, 5, 3, 5, 'CRS5', '2013-05-01', 'Wed', '01', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(559, 5, 3, 5, 'CRS5', '2013-05-02', 'Thu', '02', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(560, 5, 3, 5, 'CRS5', '2013-05-03', 'Fri', '03', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(561, 5, 3, 5, 'CRS5', '2013-05-04', 'Sat', '04', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(562, 5, 3, 5, 'CRS5', '2013-05-05', 'Sun', '05', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(563, 5, 3, 5, 'CRS5', '2013-05-06', 'Mon', '06', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(564, 5, 3, 5, 'CRS5', '2013-05-07', 'Tue', '07', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(565, 5, 3, 5, 'CRS5', '2013-05-08', 'Wed', '08', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(566, 5, 3, 5, 'CRS5', '2013-05-09', 'Thu', '09', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(567, 5, 3, 5, 'CRS5', '2013-05-10', 'Fri', '10', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(568, 5, 3, 5, 'CRS5', '2013-05-11', 'Sat', '11', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(569, 5, 3, 5, 'CRS5', '2013-05-12', 'Sun', '12', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(570, 5, 3, 5, 'CRS5', '2013-05-13', 'Mon', '13', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(571, 5, 3, 5, 'CRS5', '2013-05-14', 'Tue', '14', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(572, 5, 3, 5, 'CRS5', '2013-05-15', 'Wed', '15', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(573, 5, 3, 5, 'CRS5', '2013-05-16', 'Thu', '16', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(574, 5, 3, 5, 'CRS5', '2013-05-17', 'Fri', '17', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(575, 5, 3, 5, 'CRS5', '2013-05-18', 'Sat', '18', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(576, 5, 3, 5, 'CRS5', '2013-05-19', 'Sun', '19', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(577, 5, 3, 5, 'CRS5', '2013-05-20', 'Mon', '20', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(578, 5, 3, 5, 'CRS5', '2013-05-21', 'Tue', '21', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(579, 5, 3, 5, 'CRS5', '2013-05-22', 'Wed', '22', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(580, 5, 3, 5, 'CRS5', '2013-05-23', 'Thu', '23', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(581, 5, 3, 5, 'CRS5', '2013-05-24', 'Fri', '24', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(582, 5, 3, 5, 'CRS5', '2013-05-25', 'Sat', '25', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(583, 5, 3, 5, 'CRS5', '2013-05-26', 'Sun', '26', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(584, 5, 3, 5, 'CRS5', '2013-05-27', 'Mon', '27', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(585, 5, 3, 5, 'CRS5', '2013-05-28', 'Tue', '28', '05', 2013, 10, '400', '20', '1800', '2', '', '', '1600', 1),
(1988, 13, 4, 3, 'CRS3', '2013-05-31', 'Fri', '31', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1987, 13, 4, 3, 'CRS3', '2013-05-30', 'Thu', '30', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1986, 13, 4, 3, 'CRS3', '2013-05-29', 'Wed', '29', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1985, 13, 4, 3, 'CRS3', '2013-05-28', 'Tue', '28', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1984, 13, 4, 3, 'CRS3', '2013-05-27', 'Mon', '27', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1983, 13, 4, 3, 'CRS3', '2013-05-26', 'Sun', '26', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1982, 13, 4, 3, 'CRS3', '2013-05-25', 'Sat', '25', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1981, 13, 4, 3, 'CRS3', '2013-05-24', 'Fri', '24', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1980, 13, 4, 3, 'CRS3', '2013-05-23', 'Thu', '23', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1979, 13, 4, 3, 'CRS3', '2013-05-22', 'Wed', '22', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1978, 13, 4, 3, 'CRS3', '2013-05-21', 'Tue', '21', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1977, 13, 4, 3, 'CRS3', '2013-05-20', 'Mon', '20', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1976, 13, 4, 3, 'CRS3', '2013-05-19', 'Sun', '19', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1975, 13, 4, 3, 'CRS3', '2013-05-18', 'Sat', '18', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1974, 13, 4, 3, 'CRS3', '2013-05-17', 'Fri', '17', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1973, 13, 4, 3, 'CRS3', '2013-05-16', 'Thu', '16', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1972, 13, 4, 3, 'CRS3', '2013-05-15', 'Wed', '15', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1971, 13, 4, 3, 'CRS3', '2013-05-14', 'Tue', '14', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1970, 13, 4, 3, 'CRS3', '2013-05-13', 'Mon', '13', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1969, 13, 4, 3, 'CRS3', '2013-05-12', 'Sun', '12', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1968, 13, 4, 3, 'CRS3', '2013-05-11', 'Sat', '11', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1967, 13, 4, 3, 'CRS3', '2013-05-10', 'Fri', '10', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1966, 13, 4, 3, 'CRS3', '2013-05-09', 'Thu', '09', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1965, 13, 4, 3, 'CRS3', '2013-05-08', 'Wed', '08', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1964, 13, 4, 3, 'CRS3', '2013-05-07', 'Tue', '07', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1963, 13, 4, 3, 'CRS3', '2013-05-06', 'Mon', '06', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1962, 13, 4, 3, 'CRS3', '2013-05-05', 'Sun', '05', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1961, 13, 4, 3, 'CRS3', '2013-05-04', 'Sat', '04', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1960, 13, 4, 3, 'CRS3', '2013-05-03', 'Fri', '03', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1959, 13, 4, 3, 'CRS3', '2013-05-02', 'Thu', '02', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1958, 13, 4, 3, 'CRS3', '2013-05-01', 'Wed', '01', '05', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1957, 13, 4, 3, 'CRS3', '2013-04-30', 'Tue', '30', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1956, 13, 4, 3, 'CRS3', '2013-04-29', 'Mon', '29', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1955, 13, 4, 3, 'CRS3', '2013-04-28', 'Sun', '28', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1954, 13, 4, 3, 'CRS3', '2013-04-27', 'Sat', '27', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1953, 13, 4, 3, 'CRS3', '2013-04-26', 'Fri', '26', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1952, 13, 4, 3, 'CRS3', '2013-04-25', 'Thu', '25', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1951, 13, 4, 3, 'CRS3', '2013-04-24', 'Wed', '24', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1950, 13, 4, 3, 'CRS3', '2013-04-23', 'Tue', '23', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1949, 13, 4, 3, 'CRS3', '2013-04-22', 'Mon', '22', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1948, 13, 4, 3, 'CRS3', '2013-04-21', 'Sun', '21', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1947, 13, 4, 3, 'CRS3', '2013-04-20', 'Sat', '20', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1946, 13, 4, 3, 'CRS3', '2013-04-19', 'Fri', '19', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1945, 13, 4, 3, 'CRS3', '2013-04-18', 'Thu', '18', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1944, 13, 4, 3, 'CRS3', '2013-04-17', 'Wed', '17', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1943, 13, 4, 3, 'CRS3', '2013-04-16', 'Tue', '16', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1942, 13, 4, 3, 'CRS3', '2013-04-15', 'Mon', '15', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1941, 13, 4, 3, 'CRS3', '2013-04-14', 'Sun', '14', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1940, 13, 4, 3, 'CRS3', '2013-04-13', 'Sat', '13', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1939, 13, 4, 3, 'CRS3', '2013-04-12', 'Fri', '12', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1938, 13, 4, 3, 'CRS3', '2013-04-11', 'Thu', '11', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1937, 13, 4, 3, 'CRS3', '2013-04-10', 'Wed', '10', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1936, 13, 4, 3, 'CRS3', '2013-04-09', 'Tue', '09', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1935, 13, 4, 3, 'CRS3', '2013-04-08', 'Mon', '08', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1934, 13, 4, 3, 'CRS3', '2013-04-07', 'Sun', '07', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1933, 13, 4, 3, 'CRS3', '2013-04-06', 'Sat', '06', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1932, 13, 4, 3, 'CRS3', '2013-04-05', 'Fri', '05', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1931, 13, 4, 3, 'CRS3', '2013-04-04', 'Thu', '04', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1930, 13, 4, 3, 'CRS3', '2013-04-03', 'Wed', '03', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1929, 13, 4, 3, 'CRS3', '2013-04-02', 'Tue', '02', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1928, 13, 4, 3, 'CRS3', '2013-04-01', 'Mon', '01', '04', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1927, 13, 4, 3, 'CRS3', '2013-03-31', 'Sun', '31', '03', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1926, 13, 4, 3, 'CRS3', '2013-03-30', 'Sat', '30', '03', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1925, 13, 4, 3, 'CRS3', '2013-03-29', 'Fri', '29', '03', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1924, 13, 4, 3, 'CRS3', '2013-03-28', 'Thu', '28', '03', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1923, 13, 4, 3, 'CRS3', '2013-03-27', 'Wed', '27', '03', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1922, 13, 4, 3, 'CRS3', '2013-03-26', 'Tue', '26', '03', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1921, 13, 4, 3, 'CRS3', '2013-03-25', 'Mon', '25', '03', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(1920, 13, 4, 3, 'CRS3', '2013-03-24', 'Sun', '24', '03', 2013, 10, '2000', '10', '2010', '', '', '', '', 1),
(1919, 13, 4, 3, 'CRS3', '2013-03-23', 'Sat', '23', '03', 2013, 10, '1000', '20', '1020', '', '', '', '', 1),
(859, 10, 5, 3, 'CRS3', '2013-05-06', 'Mon', '06', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(858, 10, 5, 3, 'CRS3', '2013-05-05', 'Sun', '05', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(857, 10, 5, 3, 'CRS3', '2013-05-04', 'Sat', '04', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(856, 10, 5, 3, 'CRS3', '2013-05-03', 'Fri', '03', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(855, 10, 5, 3, 'CRS3', '2013-05-02', 'Thu', '02', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(854, 10, 5, 3, 'CRS3', '2013-05-01', 'Wed', '01', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(853, 10, 5, 3, 'CRS3', '2013-04-30', 'Tue', '30', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(852, 10, 5, 3, 'CRS3', '2013-04-29', 'Mon', '29', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(851, 10, 5, 3, 'CRS3', '2013-04-28', 'Sun', '28', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(850, 10, 5, 3, 'CRS3', '2013-04-27', 'Sat', '27', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(849, 10, 5, 3, 'CRS3', '2013-04-26', 'Fri', '26', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(848, 10, 5, 3, 'CRS3', '2013-04-25', 'Thu', '25', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(847, 10, 5, 3, 'CRS3', '2013-04-24', 'Wed', '24', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(846, 10, 5, 3, 'CRS3', '2013-04-23', 'Tue', '23', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(845, 10, 5, 3, 'CRS3', '2013-04-22', 'Mon', '22', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(844, 10, 5, 3, 'CRS3', '2013-04-21', 'Sun', '21', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(843, 10, 5, 3, 'CRS3', '2013-04-20', 'Sat', '20', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(842, 10, 5, 3, 'CRS3', '2013-04-19', 'Fri', '19', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(841, 10, 5, 3, 'CRS3', '2013-04-18', 'Thu', '18', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(840, 10, 5, 3, 'CRS3', '2013-04-17', 'Wed', '17', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(839, 10, 5, 3, 'CRS3', '2013-04-16', 'Tue', '16', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(838, 10, 5, 3, 'CRS3', '2013-04-15', 'Mon', '15', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(837, 10, 5, 3, 'CRS3', '2013-04-14', 'Sun', '14', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(836, 10, 5, 3, 'CRS3', '2013-04-13', 'Sat', '13', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(835, 10, 5, 3, 'CRS3', '2013-04-12', 'Fri', '12', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(834, 10, 5, 3, 'CRS3', '2013-04-11', 'Thu', '11', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(833, 10, 5, 3, 'CRS3', '2013-04-10', 'Wed', '10', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(832, 10, 5, 3, 'CRS3', '2013-04-09', 'Tue', '09', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(831, 10, 5, 3, 'CRS3', '2013-04-08', 'Mon', '08', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(830, 10, 5, 3, 'CRS3', '2013-04-07', 'Sun', '07', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(829, 10, 5, 3, 'CRS3', '2013-04-06', 'Sat', '06', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(828, 10, 5, 3, 'CRS3', '2013-04-05', 'Fri', '05', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(827, 10, 5, 3, 'CRS3', '2013-04-04', 'Thu', '04', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(826, 10, 5, 3, 'CRS3', '2013-04-03', 'Wed', '03', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(825, 10, 5, 3, 'CRS3', '2013-04-02', 'Tue', '02', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(824, 10, 5, 3, 'CRS3', '2013-04-01', 'Mon', '01', '04', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(823, 10, 5, 3, 'CRS3', '2013-03-31', 'Sun', '31', '03', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(822, 10, 5, 3, 'CRS3', '2013-03-30', 'Sat', '30', '03', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(821, 10, 5, 3, 'CRS3', '2013-03-29', 'Fri', '29', '03', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(820, 10, 5, 3, 'CRS3', '2013-03-28', 'Thu', '28', '03', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(819, 10, 5, 3, 'CRS3', '2013-03-27', 'Wed', '27', '03', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(818, 10, 5, 3, 'CRS3', '2013-03-26', 'Tue', '26', '03', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(817, 10, 5, 3, 'CRS3', '2013-03-25', 'Mon', '25', '03', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(816, 10, 5, 3, 'CRS3', '2013-03-24', 'Sun', '24', '03', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(815, 10, 5, 3, 'CRS3', '2013-03-23', 'Sat', '23', '03', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(860, 10, 5, 3, 'CRS3', '2013-05-07', 'Tue', '07', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(861, 10, 5, 3, 'CRS3', '2013-05-08', 'Wed', '08', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(862, 10, 5, 3, 'CRS3', '2013-05-09', 'Thu', '09', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(863, 10, 5, 3, 'CRS3', '2013-05-10', 'Fri', '10', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(864, 10, 5, 3, 'CRS3', '2013-05-11', 'Sat', '11', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(865, 10, 5, 3, 'CRS3', '2013-05-12', 'Sun', '12', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(866, 10, 5, 3, 'CRS3', '2013-05-13', 'Mon', '13', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(867, 10, 5, 3, 'CRS3', '2013-05-14', 'Tue', '14', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(868, 10, 5, 3, 'CRS3', '2013-05-15', 'Wed', '15', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(869, 10, 5, 3, 'CRS3', '2013-05-16', 'Thu', '16', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(870, 10, 5, 3, 'CRS3', '2013-05-17', 'Fri', '17', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(871, 10, 5, 3, 'CRS3', '2013-05-18', 'Sat', '18', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(872, 10, 5, 3, 'CRS3', '2013-05-19', 'Sun', '19', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(873, 10, 5, 3, 'CRS3', '2013-05-20', 'Mon', '20', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(874, 10, 5, 3, 'CRS3', '2013-05-21', 'Tue', '21', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(875, 10, 5, 3, 'CRS3', '2013-05-22', 'Wed', '22', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(876, 10, 5, 3, 'CRS3', '2013-05-23', 'Thu', '23', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(877, 10, 5, 3, 'CRS3', '2013-05-24', 'Fri', '24', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(878, 10, 5, 3, 'CRS3', '2013-05-25', 'Sat', '25', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(879, 10, 5, 3, 'CRS3', '2013-05-26', 'Sun', '26', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(880, 10, 5, 3, 'CRS3', '2013-05-27', 'Mon', '27', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(881, 10, 5, 3, 'CRS3', '2013-05-28', 'Tue', '28', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(882, 10, 5, 3, 'CRS3', '2013-05-29', 'Wed', '29', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(883, 10, 5, 3, 'CRS3', '2013-05-30', 'Thu', '30', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(884, 10, 5, 3, 'CRS3', '2013-05-31', 'Fri', '31', '05', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(885, 10, 5, 3, 'CRS3', '2013-06-01', 'Sat', '01', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(886, 10, 5, 3, 'CRS3', '2013-06-02', 'Sun', '02', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(887, 10, 5, 3, 'CRS3', '2013-06-03', 'Mon', '03', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(888, 10, 5, 3, 'CRS3', '2013-06-04', 'Tue', '04', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(889, 10, 5, 3, 'CRS3', '2013-06-05', 'Wed', '05', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(890, 10, 5, 3, 'CRS3', '2013-06-06', 'Thu', '06', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(891, 10, 5, 3, 'CRS3', '2013-06-07', 'Fri', '07', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(892, 10, 5, 3, 'CRS3', '2013-06-08', 'Sat', '08', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(893, 10, 5, 3, 'CRS3', '2013-06-09', 'Sun', '09', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(894, 10, 5, 3, 'CRS3', '2013-06-10', 'Mon', '10', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(895, 10, 5, 3, 'CRS3', '2013-06-11', 'Tue', '11', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(896, 10, 5, 3, 'CRS3', '2013-06-12', 'Wed', '12', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(897, 10, 5, 3, 'CRS3', '2013-06-13', 'Thu', '13', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(898, 10, 5, 3, 'CRS3', '2013-06-14', 'Fri', '14', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(899, 10, 5, 3, 'CRS3', '2013-06-15', 'Sat', '15', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(900, 10, 5, 3, 'CRS3', '2013-06-16', 'Sun', '16', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(901, 10, 5, 3, 'CRS3', '2013-06-17', 'Mon', '17', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(902, 10, 5, 3, 'CRS3', '2013-06-18', 'Tue', '18', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(903, 10, 5, 3, 'CRS3', '2013-06-19', 'Wed', '19', '06', 2013, 10, '1000', '10', '2000', '2', '', '', '1800', 1),
(1141, 15, 6, 3, 'CRS3', '2013-05-09', 'Thu', '09', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1140, 15, 6, 3, 'CRS3', '2013-05-08', 'Wed', '08', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1139, 15, 6, 3, 'CRS3', '2013-05-07', 'Tue', '07', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1138, 15, 6, 3, 'CRS3', '2013-05-06', 'Mon', '06', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1137, 15, 6, 3, 'CRS3', '2013-05-05', 'Sun', '05', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1136, 15, 6, 3, 'CRS3', '2013-05-04', 'Sat', '04', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1135, 15, 6, 3, 'CRS3', '2013-05-03', 'Fri', '03', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1134, 15, 6, 3, 'CRS3', '2013-05-02', 'Thu', '02', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1133, 15, 6, 3, 'CRS3', '2013-05-01', 'Wed', '01', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1132, 15, 6, 3, 'CRS3', '2013-04-30', 'Tue', '30', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1131, 15, 6, 3, 'CRS3', '2013-04-29', 'Mon', '29', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1130, 15, 6, 3, 'CRS3', '2013-04-28', 'Sun', '28', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1129, 15, 6, 3, 'CRS3', '2013-04-27', 'Sat', '27', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1128, 15, 6, 3, 'CRS3', '2013-04-26', 'Fri', '26', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1127, 15, 6, 3, 'CRS3', '2013-04-25', 'Thu', '25', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1126, 15, 6, 3, 'CRS3', '2013-04-24', 'Wed', '24', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1125, 15, 6, 3, 'CRS3', '2013-04-23', 'Tue', '23', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1124, 15, 6, 3, 'CRS3', '2013-04-22', 'Mon', '22', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1123, 15, 6, 3, 'CRS3', '2013-04-21', 'Sun', '21', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1122, 15, 6, 3, 'CRS3', '2013-04-20', 'Sat', '20', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1121, 15, 6, 3, 'CRS3', '2013-04-19', 'Fri', '19', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1120, 15, 6, 3, 'CRS3', '2013-04-18', 'Thu', '18', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1119, 15, 6, 3, 'CRS3', '2013-04-17', 'Wed', '17', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1118, 15, 6, 3, 'CRS3', '2013-04-16', 'Tue', '16', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1117, 15, 6, 3, 'CRS3', '2013-04-15', 'Mon', '15', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1116, 15, 6, 3, 'CRS3', '2013-04-14', 'Sun', '14', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1115, 15, 6, 3, 'CRS3', '2013-04-13', 'Sat', '13', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1114, 15, 6, 3, 'CRS3', '2013-04-12', 'Fri', '12', '04', 2013, 9, '1800', '20', '2400', '2', '', '', '2500', 1),
(1113, 15, 6, 3, 'CRS3', '2013-04-11', 'Thu', '11', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1112, 15, 6, 3, 'CRS3', '2013-04-10', 'Wed', '10', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1111, 15, 6, 3, 'CRS3', '2013-04-09', 'Tue', '09', '04', 2013, 9, '1800', '20', '2400', '2', '', '', '2500', 1),
(1110, 15, 6, 3, 'CRS3', '2013-04-08', 'Mon', '08', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1109, 15, 6, 3, 'CRS3', '2013-04-07', 'Sun', '07', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1108, 15, 6, 3, 'CRS3', '2013-04-06', 'Sat', '06', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1107, 15, 6, 3, 'CRS3', '2013-04-05', 'Fri', '05', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1106, 15, 6, 3, 'CRS3', '2013-04-04', 'Thu', '04', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1105, 15, 6, 3, 'CRS3', '2013-04-03', 'Wed', '03', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1104, 15, 6, 3, 'CRS3', '2013-04-02', 'Tue', '02', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1103, 15, 6, 3, 'CRS3', '2013-04-01', 'Mon', '01', '04', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1102, 15, 6, 3, 'CRS3', '2013-03-31', 'Sun', '31', '03', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1101, 15, 6, 3, 'CRS3', '2013-03-30', 'Sat', '30', '03', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1100, 15, 6, 3, 'CRS3', '2013-03-29', 'Fri', '29', '03', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1099, 15, 6, 3, 'CRS3', '2013-03-28', 'Thu', '28', '03', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1098, 15, 6, 3, 'CRS3', '2013-03-27', 'Wed', '27', '03', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1097, 15, 6, 3, 'CRS3', '2013-03-26', 'Tue', '26', '03', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1096, 15, 6, 3, 'CRS3', '2013-03-25', 'Mon', '25', '03', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1095, 15, 6, 3, 'CRS3', '2013-03-24', 'Sun', '24', '03', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1094, 15, 6, 3, 'CRS3', '2013-03-23', 'Sat', '23', '03', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1142, 15, 6, 3, 'CRS3', '2013-05-10', 'Fri', '10', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1143, 15, 6, 3, 'CRS3', '2013-05-11', 'Sat', '11', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1144, 15, 6, 3, 'CRS3', '2013-05-12', 'Sun', '12', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1145, 15, 6, 3, 'CRS3', '2013-05-13', 'Mon', '13', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1146, 15, 6, 3, 'CRS3', '2013-05-14', 'Tue', '14', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1147, 15, 6, 3, 'CRS3', '2013-05-15', 'Wed', '15', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1148, 15, 6, 3, 'CRS3', '2013-05-16', 'Thu', '16', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1149, 15, 6, 3, 'CRS3', '2013-05-17', 'Fri', '17', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1150, 15, 6, 3, 'CRS3', '2013-05-18', 'Sat', '18', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1151, 15, 6, 3, 'CRS3', '2013-05-19', 'Sun', '19', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1152, 15, 6, 3, 'CRS3', '2013-05-20', 'Mon', '20', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1153, 15, 6, 3, 'CRS3', '2013-05-21', 'Tue', '21', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1154, 15, 6, 3, 'CRS3', '2013-05-22', 'Wed', '22', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1155, 15, 6, 3, 'CRS3', '2013-05-23', 'Thu', '23', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1156, 15, 6, 3, 'CRS3', '2013-05-24', 'Fri', '24', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1157, 15, 6, 3, 'CRS3', '2013-05-25', 'Sat', '25', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1158, 15, 6, 3, 'CRS3', '2013-05-26', 'Sun', '26', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1);
INSERT INTO `sup_room_maintain_month` (`sup_room_maintain_month_id`, `sup_room_details_id`, `sup_hotel_room_period_details_id`, `sup_hotel_id`, `hotel_code`, `date`, `week_day`, `day`, `month`, `year`, `avilable_rooms`, `cost_price`, `markup`, `selling_price`, `discount_rule`, `check_discount`, `check_markup`, `final_price`, `status`) VALUES
(1159, 15, 6, 3, 'CRS3', '2013-05-27', 'Mon', '27', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1160, 15, 6, 3, 'CRS3', '2013-05-28', 'Tue', '28', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1161, 15, 6, 3, 'CRS3', '2013-05-29', 'Wed', '29', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1162, 15, 6, 3, 'CRS3', '2013-05-30', 'Thu', '30', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1163, 15, 6, 3, 'CRS3', '2013-05-31', 'Fri', '31', '05', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1164, 15, 6, 3, 'CRS3', '2013-06-01', 'Sat', '01', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1165, 15, 6, 3, 'CRS3', '2013-06-02', 'Sun', '02', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1166, 15, 6, 3, 'CRS3', '2013-06-03', 'Mon', '03', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1167, 15, 6, 3, 'CRS3', '2013-06-04', 'Tue', '04', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1168, 15, 6, 3, 'CRS3', '2013-06-05', 'Wed', '05', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1169, 15, 6, 3, 'CRS3', '2013-06-06', 'Thu', '06', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1170, 15, 6, 3, 'CRS3', '2013-06-07', 'Fri', '07', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1171, 15, 6, 3, 'CRS3', '2013-06-08', 'Sat', '08', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1172, 15, 6, 3, 'CRS3', '2013-06-09', 'Sun', '09', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1173, 15, 6, 3, 'CRS3', '2013-06-10', 'Mon', '10', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1174, 15, 6, 3, 'CRS3', '2013-06-11', 'Tue', '11', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1175, 15, 6, 3, 'CRS3', '2013-06-12', 'Wed', '12', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1176, 15, 6, 3, 'CRS3', '2013-06-13', 'Thu', '13', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1177, 15, 6, 3, 'CRS3', '2013-06-14', 'Fri', '14', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1178, 15, 6, 3, 'CRS3', '2013-06-15', 'Sat', '15', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1179, 15, 6, 3, 'CRS3', '2013-06-16', 'Sun', '16', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1180, 15, 6, 3, 'CRS3', '2013-06-17', 'Mon', '17', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1181, 15, 6, 3, 'CRS3', '2013-06-18', 'Tue', '18', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1182, 15, 6, 3, 'CRS3', '2013-06-19', 'Wed', '19', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1183, 15, 6, 3, 'CRS3', '2013-06-20', 'Thu', '20', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1184, 15, 6, 3, 'CRS3', '2013-06-21', 'Fri', '21', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1185, 15, 6, 3, 'CRS3', '2013-06-22', 'Sat', '22', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1186, 15, 6, 3, 'CRS3', '2013-06-23', 'Sun', '23', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1187, 15, 6, 3, 'CRS3', '2013-06-24', 'Mon', '24', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1188, 15, 6, 3, 'CRS3', '2013-06-25', 'Tue', '25', '06', 2013, 10, '1800', '20', '2400', '2', '', '', '2500', 1),
(1224, 6, 1, 1, 'CRS1', '2013-04-28', 'Sun', '28', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1225, 6, 1, 1, 'CRS1', '2013-04-29', 'Mon', '29', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1226, 6, 1, 1, 'CRS1', '2013-04-30', 'Tue', '30', '04', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1227, 6, 1, 1, 'CRS1', '2013-05-01', 'Wed', '01', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1228, 6, 1, 1, 'CRS1', '2013-05-02', 'Thu', '02', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1229, 6, 1, 1, 'CRS1', '2013-05-03', 'Fri', '03', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1230, 6, 1, 1, 'CRS1', '2013-05-04', 'Sat', '04', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1231, 6, 1, 1, 'CRS1', '2013-05-05', 'Sun', '05', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1232, 6, 1, 1, 'CRS1', '2013-05-06', 'Mon', '06', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1233, 6, 1, 1, 'CRS1', '2013-05-07', 'Tue', '07', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1234, 6, 1, 1, 'CRS1', '2013-05-08', 'Wed', '08', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1235, 6, 1, 1, 'CRS1', '2013-05-09', 'Thu', '09', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1236, 6, 1, 1, 'CRS1', '2013-05-10', 'Fri', '10', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1237, 6, 1, 1, 'CRS1', '2013-05-11', 'Sat', '11', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1238, 6, 1, 1, 'CRS1', '2013-05-12', 'Sun', '12', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1239, 6, 1, 1, 'CRS1', '2013-05-13', 'Mon', '13', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1240, 6, 1, 1, 'CRS1', '2013-05-14', 'Tue', '14', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1241, 6, 1, 1, 'CRS1', '2013-05-15', 'Wed', '15', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1242, 6, 1, 1, 'CRS1', '2013-05-16', 'Thu', '16', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1243, 6, 1, 1, 'CRS1', '2013-05-17', 'Fri', '17', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1244, 6, 1, 1, 'CRS1', '2013-05-18', 'Sat', '18', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1245, 6, 1, 1, 'CRS1', '2013-05-19', 'Sun', '19', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1246, 6, 1, 1, 'CRS1', '2013-05-20', 'Mon', '20', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1247, 6, 1, 1, 'CRS1', '2013-05-21', 'Tue', '21', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1248, 6, 1, 1, 'CRS1', '2013-05-22', 'Wed', '22', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1249, 6, 1, 1, 'CRS1', '2013-05-23', 'Thu', '23', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1250, 6, 1, 1, 'CRS1', '2013-05-24', 'Fri', '24', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1251, 6, 1, 1, 'CRS1', '2013-05-25', 'Sat', '25', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1252, 6, 1, 1, 'CRS1', '2013-05-26', 'Sun', '26', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1253, 6, 1, 1, 'CRS1', '2013-05-27', 'Mon', '27', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1254, 6, 1, 1, 'CRS1', '2013-05-28', 'Tue', '28', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1255, 6, 1, 1, 'CRS1', '2013-05-29', 'Wed', '29', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1256, 6, 1, 1, 'CRS1', '2013-05-30', 'Thu', '30', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1257, 6, 1, 1, 'CRS1', '2013-05-31', 'Fri', '31', '05', 2013, 10, '1200', '20', '1600', '2', '', '', '1800', 1),
(1447, 22, 10, 1, 'CRS1', '2013-05-20', 'Mon', '20', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1446, 22, 10, 1, 'CRS1', '2013-05-19', 'Sun', '19', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1445, 22, 10, 1, 'CRS1', '2013-05-18', 'Sat', '18', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1444, 22, 10, 1, 'CRS1', '2013-05-17', 'Fri', '17', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1443, 22, 10, 1, 'CRS1', '2013-05-16', 'Thu', '16', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1442, 22, 10, 1, 'CRS1', '2013-05-15', 'Wed', '15', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1439, 22, 10, 1, 'CRS1', '2013-05-12', 'Sun', '12', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1440, 22, 10, 1, 'CRS1', '2013-05-13', 'Mon', '13', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1441, 22, 10, 1, 'CRS1', '2013-05-14', 'Tue', '14', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1438, 22, 10, 1, 'CRS1', '2013-05-11', 'Sat', '11', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1437, 22, 10, 1, 'CRS1', '2013-05-10', 'Fri', '10', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1436, 22, 10, 1, 'CRS1', '2013-05-09', 'Thu', '09', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1435, 22, 10, 1, 'CRS1', '2013-05-08', 'Wed', '08', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1434, 22, 10, 1, 'CRS1', '2013-05-07', 'Tue', '07', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1433, 22, 10, 1, 'CRS1', '2013-05-06', 'Mon', '06', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1432, 22, 10, 1, 'CRS1', '2013-05-05', 'Sun', '05', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1431, 22, 10, 1, 'CRS1', '2013-05-04', 'Sat', '04', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1430, 22, 10, 1, 'CRS1', '2013-05-03', 'Fri', '03', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1429, 22, 10, 1, 'CRS1', '2013-05-02', 'Thu', '02', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1428, 22, 10, 1, 'CRS1', '2013-05-01', 'Wed', '01', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1427, 22, 10, 1, 'CRS1', '2013-04-30', 'Tue', '30', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1426, 22, 10, 1, 'CRS1', '2013-04-29', 'Mon', '29', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1425, 22, 10, 1, 'CRS1', '2013-04-28', 'Sun', '28', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1424, 22, 10, 1, 'CRS1', '2013-04-27', 'Sat', '27', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1423, 22, 10, 1, 'CRS1', '2013-04-26', 'Fri', '26', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1422, 22, 10, 1, 'CRS1', '2013-04-25', 'Thu', '25', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1421, 22, 10, 1, 'CRS1', '2013-04-24', 'Wed', '24', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1420, 22, 10, 1, 'CRS1', '2013-04-23', 'Tue', '23', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1419, 22, 10, 1, 'CRS1', '2013-04-22', 'Mon', '22', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1418, 22, 10, 1, 'CRS1', '2013-04-21', 'Sun', '21', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1417, 22, 10, 1, 'CRS1', '2013-04-20', 'Sat', '20', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1416, 22, 10, 1, 'CRS1', '2013-04-19', 'Fri', '19', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1415, 22, 10, 1, 'CRS1', '2013-04-18', 'Thu', '18', '04', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1448, 22, 10, 1, 'CRS1', '2013-05-21', 'Tue', '21', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1449, 22, 10, 1, 'CRS1', '2013-05-22', 'Wed', '22', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1450, 22, 10, 1, 'CRS1', '2013-05-23', 'Thu', '23', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1451, 22, 10, 1, 'CRS1', '2013-05-24', 'Fri', '24', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1452, 22, 10, 1, 'CRS1', '2013-05-25', 'Sat', '25', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1453, 22, 10, 1, 'CRS1', '2013-05-26', 'Sun', '26', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1454, 22, 10, 1, 'CRS1', '2013-05-27', 'Mon', '27', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1455, 22, 10, 1, 'CRS1', '2013-05-28', 'Tue', '28', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1456, 22, 10, 1, 'CRS1', '2013-05-29', 'Wed', '29', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1457, 22, 10, 1, 'CRS1', '2013-05-30', 'Thu', '30', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1458, 22, 10, 1, 'CRS1', '2013-05-31', 'Fri', '31', '05', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1459, 22, 10, 1, 'CRS1', '2013-06-01', 'Sat', '01', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1460, 22, 10, 1, 'CRS1', '2013-06-02', 'Sun', '02', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1461, 22, 10, 1, 'CRS1', '2013-06-03', 'Mon', '03', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1462, 22, 10, 1, 'CRS1', '2013-06-04', 'Tue', '04', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1463, 22, 10, 1, 'CRS1', '2013-06-05', 'Wed', '05', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1464, 22, 10, 1, 'CRS1', '2013-06-06', 'Thu', '06', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1465, 22, 10, 1, 'CRS1', '2013-06-07', 'Fri', '07', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1466, 22, 10, 1, 'CRS1', '2013-06-08', 'Sat', '08', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1467, 22, 10, 1, 'CRS1', '2013-06-09', 'Sun', '09', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1468, 22, 10, 1, 'CRS1', '2013-06-10', 'Mon', '10', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1469, 22, 10, 1, 'CRS1', '2013-06-11', 'Tue', '11', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1470, 22, 10, 1, 'CRS1', '2013-06-12', 'Wed', '12', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1471, 22, 10, 1, 'CRS1', '2013-06-13', 'Thu', '13', '06', 2013, 10, '200', '20', '1700', '', '', '', '', 1),
(1475, 14, 11, 7, 'CRS7', '2013-04-19', 'Fri', '19', '04', 2013, 100, '', '', '', '', '', '', '', 1),
(1474, 14, 11, 7, 'CRS7', '2013-04-18', 'Thu', '18', '04', 2013, 100, '', '', '', '', '', '', '', 1),
(1633, 16, 12, 8, 'CRS8', '2013-07-19', 'Fri', '19', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1632, 16, 12, 8, 'CRS8', '2013-07-18', 'Thu', '18', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1631, 16, 12, 8, 'CRS8', '2013-07-17', 'Wed', '17', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1630, 16, 12, 8, 'CRS8', '2013-07-16', 'Tue', '16', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1629, 16, 12, 8, 'CRS8', '2013-07-15', 'Mon', '15', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1628, 16, 12, 8, 'CRS8', '2013-07-14', 'Sun', '14', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1627, 16, 12, 8, 'CRS8', '2013-07-13', 'Sat', '13', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1626, 16, 12, 8, 'CRS8', '2013-07-12', 'Fri', '12', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1625, 16, 12, 8, 'CRS8', '2013-07-11', 'Thu', '11', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1624, 16, 12, 8, 'CRS8', '2013-07-10', 'Wed', '10', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1623, 16, 12, 8, 'CRS8', '2013-07-09', 'Tue', '09', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1622, 16, 12, 8, 'CRS8', '2013-07-08', 'Mon', '08', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1621, 16, 12, 8, 'CRS8', '2013-07-07', 'Sun', '07', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1620, 16, 12, 8, 'CRS8', '2013-07-06', 'Sat', '06', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1619, 16, 12, 8, 'CRS8', '2013-07-05', 'Fri', '05', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1618, 16, 12, 8, 'CRS8', '2013-07-04', 'Thu', '04', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1617, 16, 12, 8, 'CRS8', '2013-07-03', 'Wed', '03', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1616, 16, 12, 8, 'CRS8', '2013-07-02', 'Tue', '02', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1615, 16, 12, 8, 'CRS8', '2013-07-01', 'Mon', '01', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1614, 16, 12, 8, 'CRS8', '2013-06-30', 'Sun', '30', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1613, 16, 12, 8, 'CRS8', '2013-06-29', 'Sat', '29', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1612, 16, 12, 8, 'CRS8', '2013-06-28', 'Fri', '28', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1611, 16, 12, 8, 'CRS8', '2013-06-27', 'Thu', '27', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1610, 16, 12, 8, 'CRS8', '2013-06-26', 'Wed', '26', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1609, 16, 12, 8, 'CRS8', '2013-06-25', 'Tue', '25', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1608, 16, 12, 8, 'CRS8', '2013-06-24', 'Mon', '24', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1607, 16, 12, 8, 'CRS8', '2013-06-23', 'Sun', '23', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1606, 16, 12, 8, 'CRS8', '2013-06-22', 'Sat', '22', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1605, 16, 12, 8, 'CRS8', '2013-06-21', 'Fri', '21', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1604, 16, 12, 8, 'CRS8', '2013-06-20', 'Thu', '20', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1603, 16, 12, 8, 'CRS8', '2013-06-19', 'Wed', '19', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1602, 16, 12, 8, 'CRS8', '2013-06-18', 'Tue', '18', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1601, 16, 12, 8, 'CRS8', '2013-06-17', 'Mon', '17', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1600, 16, 12, 8, 'CRS8', '2013-06-16', 'Sun', '16', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1599, 16, 12, 8, 'CRS8', '2013-06-15', 'Sat', '15', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1598, 16, 12, 8, 'CRS8', '2013-06-14', 'Fri', '14', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1597, 16, 12, 8, 'CRS8', '2013-06-13', 'Thu', '13', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1596, 16, 12, 8, 'CRS8', '2013-06-12', 'Wed', '12', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1595, 16, 12, 8, 'CRS8', '2013-06-11', 'Tue', '11', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1594, 16, 12, 8, 'CRS8', '2013-06-10', 'Mon', '10', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1593, 16, 12, 8, 'CRS8', '2013-06-09', 'Sun', '09', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1592, 16, 12, 8, 'CRS8', '2013-06-08', 'Sat', '08', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1591, 16, 12, 8, 'CRS8', '2013-06-07', 'Fri', '07', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1590, 16, 12, 8, 'CRS8', '2013-06-06', 'Thu', '06', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1589, 16, 12, 8, 'CRS8', '2013-06-05', 'Wed', '05', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1588, 16, 12, 8, 'CRS8', '2013-06-04', 'Tue', '04', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1587, 16, 12, 8, 'CRS8', '2013-06-03', 'Mon', '03', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1586, 16, 12, 8, 'CRS8', '2013-06-02', 'Sun', '02', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1585, 16, 12, 8, 'CRS8', '2013-06-01', 'Sat', '01', '06', 2013, 10, '', '', '', '', '', '', '', 1),
(1584, 16, 12, 8, 'CRS8', '2013-05-31', 'Fri', '31', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1583, 16, 12, 8, 'CRS8', '2013-05-30', 'Thu', '30', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1582, 16, 12, 8, 'CRS8', '2013-05-29', 'Wed', '29', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1581, 16, 12, 8, 'CRS8', '2013-05-28', 'Tue', '28', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1580, 16, 12, 8, 'CRS8', '2013-05-27', 'Mon', '27', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1579, 16, 12, 8, 'CRS8', '2013-05-26', 'Sun', '26', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1578, 16, 12, 8, 'CRS8', '2013-05-25', 'Sat', '25', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1577, 16, 12, 8, 'CRS8', '2013-05-24', 'Fri', '24', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1576, 16, 12, 8, 'CRS8', '2013-05-23', 'Thu', '23', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1575, 16, 12, 8, 'CRS8', '2013-05-22', 'Wed', '22', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1574, 16, 12, 8, 'CRS8', '2013-05-21', 'Tue', '21', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1573, 16, 12, 8, 'CRS8', '2013-05-20', 'Mon', '20', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1572, 16, 12, 8, 'CRS8', '2013-05-19', 'Sun', '19', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1571, 16, 12, 8, 'CRS8', '2013-05-18', 'Sat', '18', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1570, 16, 12, 8, 'CRS8', '2013-05-17', 'Fri', '17', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1569, 16, 12, 8, 'CRS8', '2013-05-16', 'Thu', '16', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1568, 16, 12, 8, 'CRS8', '2013-05-15', 'Wed', '15', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1567, 16, 12, 8, 'CRS8', '2013-05-14', 'Tue', '14', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1566, 16, 12, 8, 'CRS8', '2013-05-13', 'Mon', '13', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1565, 16, 12, 8, 'CRS8', '2013-05-12', 'Sun', '12', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1564, 16, 12, 8, 'CRS8', '2013-05-11', 'Sat', '11', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1563, 16, 12, 8, 'CRS8', '2013-05-10', 'Fri', '10', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1562, 16, 12, 8, 'CRS8', '2013-05-09', 'Thu', '09', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1561, 16, 12, 8, 'CRS8', '2013-05-08', 'Wed', '08', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1560, 16, 12, 8, 'CRS8', '2013-05-07', 'Tue', '07', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1559, 16, 12, 8, 'CRS8', '2013-05-06', 'Mon', '06', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1558, 16, 12, 8, 'CRS8', '2013-05-05', 'Sun', '05', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1557, 16, 12, 8, 'CRS8', '2013-05-04', 'Sat', '04', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1556, 16, 12, 8, 'CRS8', '2013-05-03', 'Fri', '03', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1555, 16, 12, 8, 'CRS8', '2013-05-02', 'Thu', '02', '05', 2013, 10, '', '', '', '', '', '', '', 1),
(1634, 16, 12, 8, 'CRS8', '2013-07-20', 'Sat', '20', '07', 2013, 10, '', '', '', '', '', '', '', 1),
(1999, 24, 14, 13, 'CRS13', '2013-04-27', 'Sat', '27', '04', 2013, 10, '', '', '', '', '', '', '', 1),
(1997, 24, 14, 13, 'CRS13', '2013-04-25', 'Thu', '25', '04', 2013, 10, '', '', '', '', '', '', '', 1),
(1916, 23, 13, 15, 'CRS15', '2013-06-07', 'Fri', '07', '06', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1998, 24, 14, 13, 'CRS13', '2013-04-26', 'Fri', '26', '04', 2013, 10, '', '', '', '', '', '', '', 1),
(1912, 23, 13, 15, 'CRS15', '2013-06-03', 'Mon', '03', '06', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1913, 23, 13, 15, 'CRS15', '2013-06-04', 'Tue', '04', '06', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1914, 23, 13, 15, 'CRS15', '2013-06-05', 'Wed', '05', '06', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1915, 23, 13, 15, 'CRS15', '2013-06-06', 'Thu', '06', '06', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1911, 23, 13, 15, 'CRS15', '2013-06-02', 'Sun', '02', '06', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1910, 23, 13, 15, 'CRS15', '2013-06-01', 'Sat', '01', '06', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1909, 23, 13, 15, 'CRS15', '2013-05-31', 'Fri', '31', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1900, 23, 13, 15, 'CRS15', '2013-05-22', 'Wed', '22', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1901, 23, 13, 15, 'CRS15', '2013-05-23', 'Thu', '23', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1902, 23, 13, 15, 'CRS15', '2013-05-24', 'Fri', '24', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1903, 23, 13, 15, 'CRS15', '2013-05-25', 'Sat', '25', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1904, 23, 13, 15, 'CRS15', '2013-05-26', 'Sun', '26', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1905, 23, 13, 15, 'CRS15', '2013-05-27', 'Mon', '27', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1906, 23, 13, 15, 'CRS15', '2013-05-28', 'Tue', '28', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1907, 23, 13, 15, 'CRS15', '2013-05-29', 'Wed', '29', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1908, 23, 13, 15, 'CRS15', '2013-05-30', 'Thu', '30', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1888, 23, 13, 15, 'CRS15', '2013-05-10', 'Fri', '10', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1889, 23, 13, 15, 'CRS15', '2013-05-11', 'Sat', '11', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1890, 23, 13, 15, 'CRS15', '2013-05-12', 'Sun', '12', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1891, 23, 13, 15, 'CRS15', '2013-05-13', 'Mon', '13', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1892, 23, 13, 15, 'CRS15', '2013-05-14', 'Tue', '14', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1893, 23, 13, 15, 'CRS15', '2013-05-15', 'Wed', '15', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1894, 23, 13, 15, 'CRS15', '2013-05-16', 'Thu', '16', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1895, 23, 13, 15, 'CRS15', '2013-05-17', 'Fri', '17', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1896, 23, 13, 15, 'CRS15', '2013-05-18', 'Sat', '18', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1897, 23, 13, 15, 'CRS15', '2013-05-19', 'Sun', '19', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1898, 23, 13, 15, 'CRS15', '2013-05-20', 'Mon', '20', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1899, 23, 13, 15, 'CRS15', '2013-05-21', 'Tue', '21', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1886, 23, 13, 15, 'CRS15', '2013-05-08', 'Wed', '08', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1887, 23, 13, 15, 'CRS15', '2013-05-09', 'Thu', '09', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1884, 23, 13, 15, 'CRS15', '2013-05-06', 'Mon', '06', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1885, 23, 13, 15, 'CRS15', '2013-05-07', 'Tue', '07', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1882, 23, 13, 15, 'CRS15', '2013-05-04', 'Sat', '04', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1883, 23, 13, 15, 'CRS15', '2013-05-05', 'Sun', '05', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1880, 23, 13, 15, 'CRS15', '2013-05-02', 'Thu', '02', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1881, 23, 13, 15, 'CRS15', '2013-05-03', 'Fri', '03', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1878, 23, 13, 15, 'CRS15', '2013-04-30', 'Tue', '30', '04', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1879, 23, 13, 15, 'CRS15', '2013-05-01', 'Wed', '01', '05', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1876, 23, 13, 15, 'CRS15', '2013-04-28', 'Sun', '28', '04', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1877, 23, 13, 15, 'CRS15', '2013-04-29', 'Mon', '29', '04', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1874, 23, 13, 15, 'CRS15', '2013-04-26', 'Fri', '26', '04', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1875, 23, 13, 15, 'CRS15', '2013-04-27', 'Sat', '27', '04', 2013, 10, '600', '30', '780', '', '', '', '', 1),
(1871, 23, 13, 15, 'CRS15', '2013-04-23', 'Tue', '23', '04', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1872, 23, 13, 15, 'CRS15', '2013-04-24', 'Wed', '24', '04', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1873, 23, 13, 15, 'CRS15', '2013-04-25', 'Thu', '25', '04', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(1870, 23, 13, 15, 'CRS15', '2013-04-22', 'Mon', '22', '04', 2013, 10, '500', '30', '650', '', '', '', '', 1),
(2000, 24, 14, 13, 'CRS13', '2013-04-28', 'Sun', '28', '04', 2013, 10, '', '', '', '', '', '', '', 1),
(2001, 24, 14, 13, 'CRS13', '2013-04-29', 'Mon', '29', '04', 2013, 10, '', '', '', '', '', '', '', 1),
(2043, 25, 15, 23, 'CRS23', '2013-05-09', 'Thu', '09', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2042, 25, 15, 23, 'CRS23', '2013-05-08', 'Wed', '08', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2041, 25, 15, 23, 'CRS23', '2013-05-07', 'Tue', '07', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2040, 25, 15, 23, 'CRS23', '2013-05-06', 'Mon', '06', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2039, 25, 15, 23, 'CRS23', '2013-05-05', 'Sun', '05', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2038, 25, 15, 23, 'CRS23', '2013-05-04', 'Sat', '04', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2037, 25, 15, 23, 'CRS23', '2013-05-03', 'Fri', '03', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2036, 25, 15, 23, 'CRS23', '2013-05-02', 'Thu', '02', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2035, 25, 15, 23, 'CRS23', '2013-05-01', 'Wed', '01', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2034, 25, 15, 23, 'CRS23', '2013-04-30', 'Tue', '30', '04', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2033, 25, 15, 23, 'CRS23', '2013-04-29', 'Mon', '29', '04', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2032, 25, 15, 23, 'CRS23', '2013-04-28', 'Sun', '28', '04', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2031, 25, 15, 23, 'CRS23', '2013-04-27', 'Sat', '27', '04', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2030, 25, 15, 23, 'CRS23', '2013-04-26', 'Fri', '26', '04', 2013, 5, '2800', '11', '3108', '', '', '', '', 1),
(2044, 25, 15, 23, 'CRS23', '2013-05-10', 'Fri', '10', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2045, 25, 15, 23, 'CRS23', '2013-05-11', 'Sat', '11', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2046, 25, 15, 23, 'CRS23', '2013-05-12', 'Sun', '12', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2047, 25, 15, 23, 'CRS23', '2013-05-13', 'Mon', '13', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2048, 25, 15, 23, 'CRS23', '2013-05-14', 'Tue', '14', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2049, 25, 15, 23, 'CRS23', '2013-05-15', 'Wed', '15', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2050, 25, 15, 23, 'CRS23', '2013-05-16', 'Thu', '16', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2051, 25, 15, 23, 'CRS23', '2013-05-17', 'Fri', '17', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2052, 25, 15, 23, 'CRS23', '2013-05-18', 'Sat', '18', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2053, 25, 15, 23, 'CRS23', '2013-05-19', 'Sun', '19', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2054, 25, 15, 23, 'CRS23', '2013-05-20', 'Mon', '20', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2055, 25, 15, 23, 'CRS23', '2013-05-21', 'Tue', '21', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2056, 25, 15, 23, 'CRS23', '2013-05-22', 'Wed', '22', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2057, 25, 15, 23, 'CRS23', '2013-05-23', 'Thu', '23', '05', 2013, 5, '2800', '10', '3080', '', '', '', '', 1),
(2058, 22, 16, 1, 'CRS1', '2015-11-11', 'Wed', '11', '11', 2015, 5, '', '', '', '', '', '', '', 1),
(2059, 22, 16, 1, 'CRS1', '2015-11-12', 'Thu', '12', '11', 2015, 5, '', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `top_destinations`
--

CREATE TABLE IF NOT EXISTS `top_destinations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `top_destinations`
--

INSERT INTO `top_destinations` (`id`, `city_name`, `description`, `image`, `status`) VALUES
(1, 'Chitral Shindur', 'ffdgdfg aaaaaaa', 'images (1).jpg', 1),
(2, 'vatican', 'fdgdfg', 'image1s.jpg', 1),
(3, 'Central Park', 'Here''s what we tell friends who are visiting New York for the first time: See the Empire State Building, Times Square and the museums first. Go to at least one.', 'vatican-city.jpg', 1),
(8, 'aaa', 'aaaa aaaa aaaa', 'default2.jpg', 1),
(5, 'Roman Curia', 'Rome is one of those cities you could spend a year in and still feel like you''ve barely scratched its surface. Amazing historical sites, mind-blowing art—and the', 'home-wigwam.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL COMMENT 'b2b-1,b2c-2',
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fb_id` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `office_phone_no` varchar(20) NOT NULL,
  `contact_person_name` varchar(250) NOT NULL,
  `desig_of_contact` varchar(250) NOT NULL,
  `notes` text NOT NULL,
  `user_logo` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `register_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verify_token` varchar(100) NOT NULL,
  `balance_credit` double(11,2) NOT NULL,
  `last_credit` double(11,2) NOT NULL,
  `fax` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type_id`, `email`, `password`, `fb_id`, `name`, `last_name`, `address`, `city`, `zip_code`, `mobile_no`, `office_phone_no`, `contact_person_name`, `desig_of_contact`, `notes`, `user_logo`, `status`, `register_add_date`, `verify_token`, `balance_credit`, `last_credit`, `fax`) VALUES
(17, 1, 'satheeshperumal.provab@gmail.com', 'e6e061838856bf47e1de730719fb2609', '', 'Satheesh', '', 'vcbgfcn', '', '', '1221212', '', '', '', '', '1277294749_singapore_1.jpg', 1, '2013-04-25 06:51:38', '', 5080.00, 20.00, ''),
(33, 2, 'nirmala.provab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Nirmala', 'Reddy', 'xdgh eyty', 'bangalore', 'fhtyj', '3345', '9876543210', 'Admin', 'admin', 'vdsg', 'Chrysanthemum.jpg', 1, '2013-04-26 13:55:52', '', 0.00, 0.00, 'afdshyj'),
(19, 1, 'nirmala.vennapusa@gmail.com', 'b53f62082ae752fbdcfdfd437344640e', '', 'b2buser', '', 'dsgdf', '', '', '9876543210', '', '', '', '', '17037a48-bf5e-47f0-8a04-4a122f7fefd3.img.jpeg', 1, '2013-04-25 06:51:38', '', 2000.00, 2000.00, ''),
(20, 1, 'provab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Provab', '', 'xvfb', '', '', '9876543210', '9876543210', 'fgvfd', '', 'fghgjh', '', 1, '2013-04-27 11:47:08', '', 18200.00, 20000.00, ''),
(85, 2, 'vijetha.provab@gmail.com', 'd47d0f56db3d7a83f383a7e1c33b797d', '', 'vijetha', 'l ', 'dsfsd', 'Bangalore', '560059', '2143254', '', '', '', '', 'Chrysanthemum.jpg', 1, '2013-04-25 06:51:38', 'fbae5610461a8a7', 0.00, 0.00, '557'),
(101, 2, 'nimmi.956@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '100001581163728', 'Nirmala', 'Reddy', 'cvhnfyu', 'Mysore', 'juy', '9876543210', '', '', '', '', '', 1, '2013-04-25 06:51:38', '', 0.00, 0.00, '654857489'),
(22, 1, 'provab123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Provab Technosoft', '', 'zdgfd', '', '', '9876543210', '9876543210', 'xcfbdgffg', '', '', '', 1, '2013-04-25 06:51:38', '', 0.00, 0.00, ''),
(23, 2, 'ob.johnpaul@gmail.com', 'be535179b3b0938d39d8d3e480a4b067', '', 'johnpaul', '', 'aaaaa', '', '', '9876543210', '9876543210', 'xcfbdgf', 'cfg', 'aaaaaa', 'Chrysanthemum.jpg', 1, '2013-04-25 06:51:38', '', 0.00, 0.00, ''),
(24, 1, 'test@gmail.com', '5d793fc5b00a2348c3fb9ab59e5ca98a', '', 'test', '', 'tester address tester place', '', '', '1234567890', '0987654321', 'tester', 'tester', 'some notes here', 'WebDesignCompany (2).jpg', 1, '2013-04-25 06:51:38', '', 0.00, 0.00, ''),
(27, 1, 'admin@test.com', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '', 'admin', '', 'asasas', '', '', '3433434', '3434343422', 'dsdsds', 'sdsdsd', 'Notes & Comments ', '381_abacos2.jpg', 1, '2013-04-25 06:51:38', '', 0.00, 0.00, ''),
(29, 1, 'admin@provab.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Abaco Bahamas', 'dfghju', 'aaaaaa', 'bangalore', 'dvfdg', '3433434', '', '', '', '', 'Chrysanthemum.jpg', 1, '2013-04-26 14:06:38', '', 82560.00, 100000.00, 'fg'),
(53, 2, 'vvv@vv.com', '386c57017f4658ca5215569643f0189d', '', 'vvv', '', '', '', '', '', '', '', '', '', '', 0, '2013-04-25 06:51:38', '', 0.00, 0.00, ''),
(59, 2, 'nimmi.956@gmail.com', '6ea09665d0bc501ba9707dfb0cdd4e24', '', 'Nirmala', '', '', '', '', '', '', '', '', '', '', 0, '2013-04-25 06:51:38', 'cf37e6c33f22d69', 0.00, 0.00, ''),
(81, 2, 'vij@gmail.co.in', '8a695b45965f75497751050cc194fe0d', '', 'vije', '', '', '', '', '', '', '', '', '', '', 0, '2013-04-25 06:51:38', '36d1e49882f8e7f', 0.00, 0.00, ''),
(76, 2, 'vij@gmail.co', 'cb487a33ec0f374636b74d7013be69f2', '', 'vij', '', '', '', '', '', '', '', '', '', '', 0, '2013-04-25 06:51:38', '60d2f680d68f53a', 0.00, 0.00, ''),
(83, 2, 'nirmala.btech.v@gmail.com', '5023c8bc7c2455aa95a91a7e022a7f89', '', 'Nirmala', '', '', '', '', '', '', '', '', '', '', 1, '2013-04-25 06:51:38', 'e9f7271287feecc', 0.00, 0.00, ''),
(91, 2, 'yomahim@gmail.com', '5de6d65b641934d89e03f66f428681b6', '', 'fsjghfguisfjgifs', 'fskgnfsgifs', '', '', '', '', '', '', '', '', '', 1, '2013-04-25 06:51:38', 'a86301df573ad4b', 0.00, 0.00, ''),
(92, 2, 'momahim@gmail.com', '5f0c185ebe65545485173cc24368fc60', '', 'mahim', 'mo', 'karnataka', 'Mysore', '560042', '7894565895', '', '', '', '', 'E58F38A3F57556B25E5DED96F169D7.jpg', 1, '2013-04-25 06:51:38', 'd380d5f17491986', 0.00, 0.00, '45554'),
(97, 2, 'momahim@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '100004675174302', 'Mo', 'Mahim', '', '', '', '', '', '', '', '', '', 1, '2013-04-25 06:51:38', '', 0.00, 0.00, ''),
(100, 2, 'vijetha.provab@gmail.com', 'd47d0f56db3d7a83f383a7e1c33b797d', '100005429829655', 'Vijetha', 'Provab', '', '', '', '', '', '', '', '', '', 1, '2013-04-25 06:51:38', '', 0.00, 0.00, ''),
(103, 1, 'nirmala.provab12314@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'David Mathew', '', 'xzcvg', '', '', '9876543210', '', '', '', '', '', 1, '2013-04-25 06:51:38', '', 0.00, 0.00, ''),
(113, 2, 'satheeshperumal.provab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Nirmala', '', 'cvbgf', '', '', '9876543210', '9876543210', '', '', 'zdfghg', '0', 1, '2013-04-25 06:51:38', '', 0.00, 0.00, ''),
(114, 2, 'zomahim@gmail.com', 'd2b9c636579e94a82944af3966e009a1', '', 'zomahim', '', 'zomahim', '', '', '35434534', '3453435', '', '', 'dfsdf', '', 1, '2013-04-25 07:30:13', '', 0.00, 0.00, ''),
(115, 2, 'satishkola.provab@gmail.com', 'f5e1368519b47e03046f85e0d6d214ae', '', 'satishkola.provab', 'df', '', '', '', '', '', '', '', '', '', 0, '2013-04-25 07:10:22', '6c330368cbfc147', 0.00, 0.00, ''),
(118, 1, 'zomahim@gmail.com', 'd2b9c636579e94a82944af3966e009a1', '', 'zomahim', '', 'zomahim', '', '', '23', '', '', '', '', '', 1, '2013-04-25 08:34:41', '', 0.00, 0.00, ''),
(119, 2, 'srivastav.manish1987@gmail.com', '', '100001188967094', 'Manish', 'Srivastav', '', '', '', '', '', '', '', '', '', 1, '2013-04-26 04:13:28', '', 0.00, 0.00, ''),
(120, 2, 'kola.satish7@gmail.com', '', '100000285921346', 'Satish', 'Kola', '', '', '', '', '', '', '', '', '', 1, '2013-04-26 05:16:44', '', 0.00, 0.00, ''),
(121, 2, 'vijetha.provab1@gmail.com', '141aa900f365f4eae8501417e1c187b3', '', 'vijetha', 'l', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:56:28', 'aa33a897f53e7ed', 0.00, 0.00, ''),
(122, 2, 'vijetha.provab1@gmail.com', '141aa900f365f4eae8501417e1c187b3', '', 'vijetha', 'l', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:56:29', 'aa33a897f53e7ed', 0.00, 0.00, ''),
(123, 2, 'vijetha.provab1@gmail.com', '141aa900f365f4eae8501417e1c187b3', '', 'vijetha', 'l', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:56:29', 'aa33a897f53e7ed', 0.00, 0.00, ''),
(124, 2, 'vijetha.provab1@gmail.com', '141aa900f365f4eae8501417e1c187b3', '', 'vijetha', 'l', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:56:30', 'aa33a897f53e7ed', 0.00, 0.00, ''),
(125, 2, 'vijetha.provab1@gmail.com', '141aa900f365f4eae8501417e1c187b3', '', 'vijetha', 'l', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:56:30', 'aa33a897f53e7ed', 0.00, 0.00, ''),
(126, 2, 'vijetha.provab1@gmail.com', '141aa900f365f4eae8501417e1c187b3', '', 'vijetha', 'l', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:56:30', 'aa33a897f53e7ed', 0.00, 0.00, ''),
(127, 2, 'admin@provab.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Nirmala', 'Reddy', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:58:05', 'df1d5fe886d1b16', 0.00, 0.00, ''),
(128, 2, 'admin@provab.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Nirmala', 'Reddy', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:58:06', 'df1d5fe886d1b16', 0.00, 0.00, ''),
(129, 2, 'admin@provab.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Nirmala', 'Reddy', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:58:07', 'df1d5fe886d1b16', 0.00, 0.00, ''),
(130, 2, 'admin@provab.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Nirmala', 'Reddy', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:58:07', 'df1d5fe886d1b16', 0.00, 0.00, ''),
(131, 2, 'admin@provab.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Nirmala', 'Reddy', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:58:15', 'df1d5fe886d1b16', 0.00, 0.00, ''),
(132, 2, 'admin@provab.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Nirmala', 'Reddy', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:58:40', 'df1d5fe886d1b16', 0.00, 0.00, ''),
(133, 2, 'nirmala.provab@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'Nirmala', 'Reddy', '', '', '', '', '', '', '', '', '', 0, '2013-04-27 11:59:13', 'df1d5fe886d1b16', 0.00, 0.00, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
