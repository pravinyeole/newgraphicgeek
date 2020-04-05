-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2020 at 06:09 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graphicgeeks_newgraphicgeek`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ordered_prod_details`
--

CREATE TABLE `ordered_prod_details` (
  `sr_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_price` decimal(5,2) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered_prod_details`
--

INSERT INTO `ordered_prod_details` (`sr_id`, `order_id`, `prod_id`, `prod_qty`, `prod_price`, `prod_name`, `prod_image`) VALUES
(1, 81483115, 3, 1, '169.00', 'Push and Pull', '3.jpg'),
(2, 81483115, 9, 1, '169.00', 'Lets That Shit Go', '9.jpg'),
(3, 81483115, 2, 1, '169.00', 'This Out Of The Box', '1.jpg'),
(4, 69761784, 2, 1, '1.00', 'If you are good for something never do it for free', '2.jpg'),
(5, 69761784, 2, 1, '1.00', 'If you are good for something never do it for free', '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment_response`
--

CREATE TABLE `payment_response` (
  `id` int(11) NOT NULL,
  `orderID` varchar(250) DEFAULT NULL,
  `mID` varchar(250) DEFAULT NULL,
  `txnID` varchar(250) DEFAULT NULL,
  `txnAmount` varchar(250) DEFAULT NULL,
  `paymentMode` varchar(250) DEFAULT NULL,
  `currency` varchar(250) DEFAULT NULL,
  `txnDate` datetime DEFAULT NULL,
  `txnStatus` varchar(250) DEFAULT NULL,
  `respCode` varchar(250) DEFAULT NULL,
  `respMsg` text DEFAULT NULL,
  `getwayName` varchar(250) DEFAULT NULL,
  `bankTxnID` varchar(250) DEFAULT NULL,
  `bankName` varchar(250) DEFAULT NULL,
  `checksumHash` varchar(250) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1 COMMENT '1-not delete,0-deleted',
  `dateAdded` datetime DEFAULT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_response`
--

INSERT INTO `payment_response` (`id`, `orderID`, `mID`, `txnID`, `txnAmount`, `paymentMode`, `currency`, `txnDate`, `txnStatus`, `respCode`, `respMsg`, `getwayName`, `bankTxnID`, `bankName`, `checksumHash`, `isDeleted`, `dateAdded`, `dateModified`) VALUES
(1, '81164717', 'dlgbhU55090917852509', '20191002111212800110168876390739284', '507.00', 'CC', 'INR', '1970-01-01 01:00:00', 'TXN_FAILURE', '227', 'Your payment has failed due to a technical error. Please try again or use a different payment method to complete the payment', 'ICICIPAY', '67969504139', 'AIB BANK', 'wFP47imFvMpALjfwXhbePoy4eRBj5g/Qua2r73mflW6POzKU8UXQxhJahHu6VFXnz+LfrsyqZntr3mnyUxVrgDMiNfO3g9+k7LQ+kpqfWcE=', 1, '2019-10-02 08:02:17', NULL),
(2, '17552628', 'dlgbhU55090917852509', '20191002111212800110168187490572679', '1.00', 'DC', 'INR', '2019-10-02 11:47:13', 'TXN_SUCCESS', '01', 'Txn Success', 'ICICIPAY', '67969606056', 'BANK OF MAHARASHTRA', 'gdyufw03IOs7uvGwHFr7y7s7w93EJ8zga7jEX2HDdG1dQxlLEs0IuYRaX2sdwPUS+0u5qO/5vyNe8+Vm8oMQHW7TEYhxls870l9NCCWQ2h8=', 1, '2019-10-02 08:19:15', NULL),
(3, '25619576', 'dlgbhU55090917852509', '20191016111212800110168877493133661', '169.00', NULL, 'INR', '1970-01-01 01:00:00', 'TXN_FAILURE', '141', 'User has not completed transaction.', NULL, '', NULL, 'h2tc3v0f0n220flg3AGN+vrd0pdcMH7CaNwOD9k+E8dbRcgmL85cUsv7+MXU4s74YIK9FoduMxDiBHsTBvNKRfYL8gSZ472VAx6RuCTgjww=', 1, '2019-10-16 19:53:47', NULL),
(4, '85108511', 'dlgbhU55090917852509', '20191020111212800110168471993337794', '169.00', NULL, 'INR', '1970-01-01 01:00:00', 'TXN_FAILURE', '141', 'User has not completed transaction.', NULL, '', NULL, 'NeLiL+GxZrz0nYPM7wuQ+B+9oqrnid0R3iq/N6kVaTqcjw/8cx0vabrUJyXw+xIRja9KTVHEqRIyzo6gwyH59EyajCjNG2zO05FJycxk3D8=', 1, '2019-10-20 20:16:30', NULL),
(5, '88207461', 'dlgbhU55090917852509', NULL, '1.00', NULL, 'INR', '1970-01-01 01:00:00', 'TXN_FAILURE', '2023', 'Repeat Request Inconsistent', NULL, '', NULL, 'tIP2BzrVlzC7u2xAEMKaPLjbP+4WfBizRCrRUBhVxdAFtgqYhH6HPsx3547iJJvPBwVO3sDjsnTiXrXNDnNHcUQ3Qk4H3kDjZ4EDjOYpmxc=', 1, '2019-10-24 18:26:39', NULL),
(6, '62959839', 'dlgbhU55090917852509', '20191024111212800110168873594411917', '1.00', 'PPI', 'INR', '2019-10-24 21:57:02', 'TXN_SUCCESS', '01', 'Txn Success', 'WALLET', '125082043740', 'WALLET', 'QCsrhBjaZwPHCHlVIxNjhSezBMTczASom4pyTGeI2bxapLBrnY3dEBLY0OLk8edcbTkjG8r1JQbWC5nOrVgOGPvyAQP0RHisll+UIyAAAdg=', 1, '2019-10-24 18:30:00', NULL),
(7, '69761784', 'dlgbhU55090917852509', '20191024111212800110168387394481369', '1.00', 'PPI', 'INR', '2019-10-24 22:20:49', 'TXN_SUCCESS', '01', 'Txn Success', 'WALLET', '125083672171', 'WALLET', 'NRfrNz+c5c1JVnXvX39vIQX8siT6vrE6CT335Hq0Y8L6Crl2EX1qBqZ7/Jy12v06GjYQ1z3+EKhKWrzcak2cIfnrcrUjUagFs17FJVMwdHQ=', 1, '2019-10-24 19:03:36', NULL),
(8, '69761784', 'dlgbhU55090917852509', '20191024111212800110168387394481369', '1.00', 'PPI', 'INR', '2019-10-24 22:20:49', 'TXN_SUCCESS', '01', 'Txn Success', 'WALLET', '125083672171', 'WALLET', 'NRfrNz+c5c1JVnXvX39vIQX8siT6vrE6CT335Hq0Y8L6Crl2EX1qBqZ7/Jy12v06GjYQ1z3+EKhKWrzcak2cIfnrcrUjUagFs17FJVMwdHQ=', 1, '2019-10-24 19:05:19', NULL),
(9, '84220030', 'dlgbhU55090917852509', '20191207111212800110168873401770620', '607.00', NULL, 'INR', '1970-01-01 01:00:00', 'TXN_FAILURE', '141', 'User has not completed transaction.', NULL, '', NULL, 'InKegcYSEx7ApnRaNSsYaNTgDoeJOqVry9V1xDxB+rt+w35KvjtI8dM+Bi92calbq4kaMPOvfvBhsNhVBOhQuy7zy9dQt/M/ET/L86m5fjc=', 1, '2019-12-07 17:11:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_type` tinyint(4) NOT NULL COMMENT '1 Poster,2 Painting',
  `p_name` varchar(255) DEFAULT NULL,
  `p_category` varchar(500) DEFAULT NULL,
  `p_sub_category` varchar(500) NOT NULL,
  `p_price` decimal(10,2) DEFAULT NULL,
  `p_image` varchar(255) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `discription` text DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `stock_count` int(11) DEFAULT NULL,
  `poster_id` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 Active,0 Delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_type`, `p_name`, `p_category`, `p_sub_category`, `p_price`, `p_image`, `created_date`, `discription`, `brand`, `stock_count`, `poster_id`, `size`, `status`) VALUES
(3, 1, 'Push and Pull', '1', '3,5,6', '169.00', '3.jpg', 1568844000, ' tttt', 'FPMS', 6, 'Poster3', 'A4', 1),
(4, 1, 'Shutup', '1', '2', '169.00', '4.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster4', 'A4', 1),
(5, 1, 'Think Big', '1', '2', '169.00', '5.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster5', 'A4', 1),
(6, 1, 'Dont Quit', '1', '2', '169.00', '6.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster6', 'A4', 1),
(7, 1, 'You Beauty', '1', '2', '169.00', '7.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster7', 'A4', 1),
(8, 1, 'Relax', '1', '2', '169.00', '8.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster8', 'A4', 1),
(9, 1, 'Lets That Shit Go', '1', '2', '169.00', '9.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster9', 'A4', 1),
(10, 1, 'Batman', '1', '2', '169.00', '10.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster10', 'A4', 1),
(11, 1, 'Do One Thing', '1', '2', '169.00', '11.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster11', 'A4', 1),
(12, 1, 'Being A Dick', '1', '2', '169.00', '12.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster12', 'A4', 1),
(13, 1, 'Your Knief', '1', '2', '169.00', '13.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster13', 'A4', 1),
(14, 1, 'Another Day Another Slay', '1', '2', '169.00', '14.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster14', 'A4', 1),
(15, 1, 'Change Out Lives', '1', '2', '169.00', '15.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster15', 'A4', 1),
(16, 1, 'Addicted', '1', '2', '169.00', '16.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster16', 'A4', 1),
(17, 1, 'Smile', '1', '2', '169.00', '17.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster17', 'A4', 1),
(18, 1, 'Never', '1', '2', '169.00', '18.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster18', 'A4', 1),
(19, 1, 'Do Epic Shit', '1', '2', '169.00', '19.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster19', 'A4', 1),
(20, 1, 'Hope', '1', '2', '169.00', '20.jpg', 1568844000, ' ', 'FPMS', 10, 'Poster20', 'A4', 1),
(21, 1, '56564', '3,5,7,11,14', '3,5,7,11,14', '665466.00', '1576692742Desert.jpg', 1576623600, 'fdfgdfggxv', NULL, 454, 'dffg', 'A4', 1),
(22, 1, 'Batman V1', '3,5,6,9,11,13', '3,5,6,9,11,13', '333.00', '1577124673offerimage.jpg', 1577055600, 'asdsdasd', NULL, 33, '4545', 'A3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_category`
--

CREATE TABLE `product_sub_category` (
  `sub_c_id` int(11) NOT NULL,
  `sub_c_name` varchar(100) NOT NULL,
  `sub_c_status` tinyint(4) NOT NULL COMMENT '0 inactive, 1 active',
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sub_category`
--

INSERT INTO `product_sub_category` (`sub_c_id`, `sub_c_name`, `sub_c_status`, `created_date`) VALUES
(1, 'Discounted', 1, '2019-12-07 15:04:32'),
(2, 'New Arrival', 1, '2019-12-07 15:04:32'),
(3, 'Best selling', 1, '2019-12-07 15:04:33'),
(4, 'Limited edition', 1, '2019-12-07 15:04:33'),
(5, 'Abstract', 1, '2019-12-07 15:04:33'),
(6, 'Superhero', 1, '2019-12-07 15:04:33'),
(7, 'Quote', 1, '2019-12-07 15:04:33'),
(8, 'Humour', 1, '2019-12-07 15:04:33'),
(9, 'Motivational', 1, '2019-12-07 15:04:33'),
(10, 'Sports', 1, '2019-12-07 15:04:33'),
(11, 'Movies', 1, '2019-12-07 15:04:33'),
(12, 'Doodles', 1, '2019-12-07 15:04:33'),
(13, 'Typography', 1, '2019-12-07 15:04:33'),
(14, 'Retro', 1, '2019-12-07 15:04:33'),
(15, 'Gaming', 1, '2019-12-07 15:04:33'),
(16, 'Others', 1, '2019-12-07 15:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `timezone` varchar(100) NOT NULL,
  `recaptcha` varchar(5) NOT NULL,
  `theme` varchar(100) NOT NULL,
  `shipping_charge` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `timezone`, `recaptcha`, `theme`, `shipping_charge`) VALUES
(1, 'GraphicGeeks', 'Asia/Kolkata', 'no', 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offers_coupn`
--

CREATE TABLE `tbl_offers_coupn` (
  `c_id` int(11) NOT NULL,
  `coupn_code` varchar(20) NOT NULL,
  `discount_type` tinyint(4) NOT NULL COMMENT '1 cash,2percent',
  `disc_amount` decimal(10,2) NOT NULL,
  `min_purchase_amt` decimal(10,2) NOT NULL,
  `start_date` varchar(20) DEFAULT NULL,
  `end_date` varchar(20) DEFAULT NULL,
  `offer_status` tinyint(4) NOT NULL COMMENT ' 0 Inactive,1 Active,2 Expired,3 Delete ',
  `offer_image` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_offers_coupn`
--

INSERT INTO `tbl_offers_coupn` (`c_id`, `coupn_code`, `discount_type`, `disc_amount`, `min_purchase_amt`, `start_date`, `end_date`, `offer_status`, `offer_image`, `description`, `create_date`) VALUES
(4, 'gfgdfgdfg', 2, '5.00', '200.00', NULL, NULL, 1, '1575481889Koala.jpg', 'fererewrwererwerwerer', '2019-12-04 23:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(1, 'fd46f1ca16332590c0f9266ca3b1c3', 2, '2019-09-21'),
(2, 'd46b189ce8fff428c75d86d56d490f', 3, '2019-10-04'),
(3, 'e2603d51f65eda990504cf69136015', 4, '2019-12-02'),
(4, 'e01ba783864ce3890344a89760da83', 5, '2019-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `last_login` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `banned_users` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `contact`, `role`, `password`, `last_login`, `status`, `banned_users`) VALUES
(1, 'superuser@gmail.com', 'Super', 'User', NULL, '1', 'sha256:1000::cDw3D52+wsaiFkLXr2M+CIHDR+WY1fsX', '2019-12-24 07:58:41 PM', 'approved', 'unban'),
(2, 'anikettandale111@gmail.com', 'Aniket', 'Tandale', '8542158596', '4', 'sha256:1000::cDw3D52+wsaiFkLXr2M+CIHDR+WY1fsX', '2019-12-27 06:23:23 AM', 'approved', 'unban'),
(3, 'aniket.t@mitlag.com', 'Aniket', 'Tandale', NULL, '2', 'sha256:1000:JDJ5JDEwJEVSR2pyOE5WMWhHMUx5RE9WTGtiYS52eVFZOGNJMjkvMnVpRlRmM3QwVkNqNlhDTFc0OE5L:D8aYKeMov4rawDuTcoHgJ9ftQgiQ/vtG', '2019-10-04 12:10:59 PM', 'approved', 'unban'),
(4, 'test@test.com', 'test', 'test', '9876543210', '2', '', '', 'pending', 'unban');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `u_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `u_state` varchar(100) DEFAULT NULL,
  `u_city` varchar(100) DEFAULT NULL,
  `u_address` varchar(200) DEFAULT NULL,
  `u_zipcode` int(11) DEFAULT NULL,
  `u_add_date` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`u_id`, `user_id`, `u_state`, `u_city`, `u_address`, `u_zipcode`, `u_add_date`) VALUES
(1, 2, 'Maharashtra', 'Nashik', 'BalramNagar Dhatrak Phata', 422003, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_order_details`
--

CREATE TABLE `user_order_details` (
  `o_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `order_total` decimal(5,2) NOT NULL,
  `used_promocode` int(11) NOT NULL DEFAULT 0,
  `shipping_address` text NOT NULL,
  `order_date` int(20) NOT NULL,
  `order_payment_status` tinyint(4) DEFAULT NULL COMMENT '1 Complete,2 Failed,3Pending',
  `order_status` tinyint(4) DEFAULT NULL COMMENT '1 New Order,2 Delivered,3 Cancelled',
  `order_comment` text DEFAULT NULL,
  `shipped_date` int(20) DEFAULT NULL,
  `order_received_date` int(20) DEFAULT NULL COMMENT '1 Success,2 Failed,3 Rejected,4 Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_order_details`
--

INSERT INTO `user_order_details` (`o_id`, `order_id`, `cust_id`, `order_total`, `used_promocode`, `shipping_address`, `order_date`, `order_payment_status`, `order_status`, `order_comment`, `shipped_date`, `order_received_date`) VALUES
(1, 93914541, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 0, 1, 1, NULL, NULL, NULL),
(2, 45204180, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1569794400, 1, 1, NULL, NULL, NULL),
(3, 83227448, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1569967200, 1, 1, NULL, NULL, NULL),
(4, 32844499, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1569967200, 1, 1, NULL, NULL, NULL),
(5, 87225603, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1569967200, 1, 1, NULL, NULL, NULL),
(6, 81164717, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1569967200, 1, 1, NULL, NULL, NULL),
(7, 17787435, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1569967200, 1, 2, NULL, NULL, NULL),
(8, 50573399, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1569967200, 1, 3, NULL, NULL, NULL),
(9, 15988298, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1569967200, 1, 2, NULL, NULL, NULL),
(10, 17552628, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1569967200, 1, 3, NULL, NULL, NULL),
(11, 81483115, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1570831200, 1, 3, NULL, NULL, NULL),
(12, 25619576, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571176800, 1, 3, NULL, NULL, NULL),
(13, 85108511, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571522400, 2, 2, NULL, NULL, NULL),
(14, 91582016, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571522400, NULL, NULL, NULL, NULL, NULL),
(15, 14343471, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571522400, NULL, NULL, NULL, NULL, NULL),
(16, 22817320, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571522400, NULL, NULL, NULL, NULL, NULL),
(17, 20199303, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571522400, NULL, NULL, NULL, NULL, NULL),
(18, 88207461, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571868000, 2, 2, NULL, NULL, NULL),
(19, 62959839, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571868000, 1, 3, NULL, NULL, NULL),
(20, 1208082, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571868000, NULL, NULL, NULL, NULL, NULL),
(21, 12356318, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571868000, NULL, NULL, NULL, NULL, NULL),
(22, 70065693, 2, '999.99', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571868000, NULL, NULL, NULL, NULL, NULL),
(23, 46156144, 3, '1.00', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571868000, NULL, 2, NULL, NULL, NULL),
(24, 69761784, 2, '1.00', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1571868000, 1, 3, NULL, NULL, NULL),
(25, 31115157, 2, '169.00', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1573858800, NULL, NULL, NULL, NULL, NULL),
(26, 86327745, 2, '169.00', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1575414000, NULL, NULL, NULL, NULL, NULL),
(27, 5492430, 2, '169.00', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1575500400, NULL, NULL, NULL, NULL, NULL),
(28, 15224912, 2, '169.00', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1575586800, NULL, NULL, NULL, NULL, NULL),
(29, 61908678, 2, '169.00', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1575586800, NULL, NULL, NULL, NULL, NULL),
(30, 52629020, 2, '169.00', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1575586800, NULL, NULL, NULL, NULL, NULL),
(31, 36933345, 2, '507.00', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1575673200, NULL, NULL, NULL, NULL, NULL),
(32, 86950461, 2, '576.65', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1575673200, NULL, NULL, NULL, NULL, NULL),
(33, 34924007, 2, '607.00', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1575673200, NULL, NULL, NULL, NULL, NULL),
(34, 34336177, 2, '576.65', 4, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1575673200, 2, NULL, NULL, NULL, NULL),
(35, 84220030, 2, '607.00', 0, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1575673200, 2, 2, NULL, NULL, NULL),
(36, 80445125, 2, '255.55', 4, 'BalramNagar Dhatrak Phata * Nashik * Maharashtra * 422003', 1576450800, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `ordered_prod_details`
--
ALTER TABLE `ordered_prod_details`
  ADD PRIMARY KEY (`sr_id`);

--
-- Indexes for table `payment_response`
--
ALTER TABLE `payment_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  ADD PRIMARY KEY (`sub_c_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_offers_coupn`
--
ALTER TABLE `tbl_offers_coupn`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `user_order_details`
--
ALTER TABLE `user_order_details`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordered_prod_details`
--
ALTER TABLE `ordered_prod_details`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_response`
--
ALTER TABLE `payment_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  MODIFY `sub_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_offers_coupn`
--
ALTER TABLE `tbl_offers_coupn`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_order_details`
--
ALTER TABLE `user_order_details`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
