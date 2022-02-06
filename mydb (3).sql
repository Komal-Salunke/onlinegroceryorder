-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 25, 2021 at 03:43 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `razorpay_payment_id` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`, `razorpay_payment_id`) VALUES
(1, 'pawar', 'pawar2000swapnil@gmail.com', '9579212411', 'csdcdsxv', 'cash on delevery', '[{\"p_id\":\"25\",\"quantity\":\"1\"},{\"p_id\":\"24\",\"quantity\":\"1\"},{\"p_id\":\"26\",\"quantity\":\"1\"}]', '176.00', NULL),
(2, 'pawar', 'pawar2000swapnil@gmail.com', '9579212411', 'sdvfdbfd', 'Online', '[{\"p_id\":\"11\",\"quantity\":\"1\"},{\"p_id\":\"25\",\"quantity\":\"1\"},{\"p_id\":\"24\",\"quantity\":\"1\"}]', '325.00', 'pay_H6hzsFBlrAY5nE'),
(3, 'Anuradha', 'anusankpal76@gmail.com', '7498409568', 'pune', 'Online', '[{\"p_id\":\"24\",\"quantity\":\"1\"},{\"p_id\":\"35\",\"quantity\":\"1\"},{\"p_id\":\"28\",\"quantity\":\"1\"},{\"p_id\":\"11\",\"quantity\":\"1\"},{\"p_id\":\"25\",\"quantity\":\"1\"}]', '575.00', 'pay_HEYSCDLEgZbrbp'),
(4, 'Anuradha', 'anusankpal76@gmail.com', '7498409568', 'm', 'cash on delevery', '[{\"p_id\":\"5\",\"quantity\":\"1\"},{\"p_id\":\"11\",\"quantity\":\"1\"}]', '250.00', NULL),
(5, '', '', '', '', 'Online', '[{\"p_id\":\"26\",\"quantity\":\"1\"},{\"p_id\":\"25\",\"quantity\":\"1\"}]', '141.00', ''),
(6, 'Anuradha', 'anusankpal76@gmail.com', '7498409568', 'kolhapur', 'Online', '[{\"p_id\":\"24\",\"quantity\":\"1\"},{\"p_id\":\"28\",\"quantity\":\"1\"},{\"p_id\":\"5\",\"quantity\":\"1\"}]', '295.00', 'pay_HEabkeZdwEtrVb'),
(7, 'riya patil', 'mehara345@gmail.com', '7498409568', 'kagal', 'Online', '[{\"p_id\":\"24\",\"quantity\":\"1\"},{\"p_id\":\"28\",\"quantity\":\"1\"},{\"p_id\":\"25\",\"quantity\":\"1\"},{\"p_id\":\"26\",\"quantity\":\"1\"}]', '356.00', 'pay_HEbLDAd3ex22hH'),
(8, 'Anuradha', 'anusankpal76@gmail.com', '74989409568', 'kolhapur', 'Online', '[{\"p_id\":\"28\",\"quantity\":\"1\"},{\"p_id\":\"24\",\"quantity\":\"1\"},{\"p_id\":\"25\",\"quantity\":\"1\"},{\"p_id\":\"26\",\"quantity\":\"1\"}]', '356.00', 'pay_HEwUSDeEPmhKkA');

-- --------------------------------------------------------

--
-- Table structure for table `pass_reset`
--

DROP TABLE IF EXISTS `pass_reset`;
CREATE TABLE IF NOT EXISTS `pass_reset` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(2, 'Sonu Desai', 'sonu', 'e10adc3949ba59abbe56e057f20f883e'),
(31, 'Anuradha Sankpal', 'anuradha', 'e10adc3949ba59abbe56e057f20f883e'),
(35, 'kiran patil', 'kiran', 'e10adc3949ba59abbe56e057f20f883e'),
(36, 'tina', '123456', 'e10adc3949ba59abbe56e057f20f883e'),
(30, 'Amar Murgi', 'amar', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

DROP TABLE IF EXISTS `tbl_categories`;
CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(20) NOT NULL,
  `active` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(31, 'vegetables', 'vege.png', 'Yes', 'Yes'),
(18, 'Food-grains', 'gg.jfif', 'Yes', 'Yes'),
(30, 'Fruits', 'myf.png', 'Yes', 'Yes'),
(33, 'Beverages', 'beve.jfif', 'Yes', 'Yes'),
(22, 'Bakery & Dairy', 'd.jfif', 'Yes', 'Yes'),
(23, 'Staples', 'staples.jfif', 'Yes', 'Yes'),
(24, 'Frozen Foods & ice-cream', 'ic.jfif', 'Yes', 'Yes'),
(25, 'Jam & sauces', 'jamso.jfif', 'Yes', 'Yes'),
(26, 'Cleaning & Household', 'ho.jfif', 'Yes', 'Yes'),
(36, 'ice-cream', 'ii.jfif', 'Yes', 'Yes'),
(37, 'Mango', '', 'No', 'No'),
(39, 'vegetables', '1 img.jfif', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

DROP TABLE IF EXISTS `tbl_items`;
CREATE TABLE IF NOT EXISTS `tbl_items` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `categories_id` int UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `title`, `description`, `price`, `image_name`, `categories_id`, `featured`, `active`) VALUES
(11, 'Apples', 'Fresh Baby apples.', '170.00', 'Items-Name-330.jpg', 31, 'Yes', 'Yes'),
(5, 'Juice', 'Fresh juice.', '80.00', 'Items-Name-7710.jpg', 33, 'Yes', 'Yes'),
(28, 'Kissan jam', 'kissan mixed fruit jam', '180.00', 'jam.jpg', 25, 'Yes', 'Yes'),
(24, 'Fresho Banana', ' A Grade Fresh Organic Hills Banana.', '35.00', 'banana.jfif', 30, 'Yes', 'Yes'),
(25, 'Strawberry', ' Fresh, hygienic and natural Strawberry.', '120.00', 'stra.jfif', 30, 'Yes', 'Yes'),
(26, 'Brinjal', 'Long,purple, and fleshly variety Brinjal.', '21.00', 'bri.jfif', 31, 'Yes', 'Yes'),
(27, 'Carrot', ' Fresh organic Carrot.', '40.00', 'ca.jfif', 31, 'Yes', 'Yes'),
(29, 'Maggi', 'Maggi masala instant noodles vegetarian.', '10.00', 'maggi.jpg', 28, 'Yes', 'Yes'),
(30, 'oats', 'Kelloggs oats, Rolled oats,High protein.', '275.00', 'oats.jpg', 28, 'Yes', 'Yes'),
(31, 'Milk', 'Delicious and pure milk.', '70.00', 'Items-Name-378.jfif', 22, 'Yes', 'Yes'),
(32, 'Lays', 'Tasty', '10.00', 'lays.jpg', 28, 'Yes', 'Yes'),
(33, 'Atta', 'Natural', '120.00', 'atta.jpg', 23, 'Yes', 'Yes'),
(34, 'Salt', 'Pure Tata Salt.', '5.00', 'salt.jpg', 23, 'Yes', 'Yes'),
(35, 'Toor Dal', 'Tata Sampana dal', '70.00', 'oilimg.jfif', 18, 'Yes', 'Yes'),
(36, 'ketchup', 'Yummy and tasty.', '75.00', 'ketchup.jpg', 25, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `items` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `items`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Strawberry', '120.00', 1, '0.00', '2021-04-29 09:05:44', 'ordered', 'Anuradha sankpal', '8569874589', 'anusankpal76@gmail.com', 'Kolhapur'),
(2, 'Kissan jam', '180.00', 2, '0.00', '2021-04-29 09:07:30', 'ordered', 'Amar Murgi', '8745963214', 'amar45@gmail.com', 'Mumbai'),
(3, 'Brinjal', '21.00', 1, '0.00', '2021-04-29 09:10:51', 'ordered', 'siya patil', '9632587412', 'patilsiya456@gmail.com', 'Gune galli, nehru road, sangali.'),
(4, 'Apples', '170.00', 1, '340.00', '2021-04-29 09:16:17', 'ordered', 'kiyara mehara', '9632587412', 'mehara345@gmail.com', 'pune'),
(5, 'Fresho Banana', '35.00', 2, '70.00', '2021-04-29 09:21:48', 'ordered', 'kiyara mehara', '8745963214', 'mehara345@gmail.com', 'Kolkata'),
(6, 'Kissan jam', '180.00', 2, '0.00', '2021-04-29 09:23:36', 'delivered', 'Amar Murgi', '8745963214', 'amar45@gmail.com', 'Nagpur'),
(7, 'Fresho Banana', '35.00', 1, '35.00', '2021-05-01 10:51:53', 'ordered', 'siya patil', '8569874589', 'patilsiya456@gmail.com', 'pune'),
(8, 'Fresho Banana', '35.00', 1, '35.00', '2021-05-01 10:51:53', 'ordered', 'siya patil', '8569874589', 'patilsiya456@gmail.com', 'pune');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `date`) VALUES
(1, 'anu', 'sankpal', 'anusankpal', 'anusankpal76@gmail.com', '$2y$04$Di2xnD9f51ZECWTMGSz2de0VGEHHZA9P2bJ7D86UufYOdM6QXPezi', '2021-03-31'),
(4, 'rani', 'patil', 'rani', 'ranipatil@gmail.com', '$2y$04$peb4WlDH7u8.r5P/MrtSUObzLiU3xwPZCW8x4WB6QzJWMN2vHC/LO', '2021-04-07'),
(3, 'Priti', 'Raut', 'priti', 'pritiraut@gmail.com', '$2y$04$EE5N3yct9nI9ylFQWm.Kl.nZbNYG9YBShPfNibqtxpYUKbzk0Kb3O', '2021-04-04'),
(5, 'poonam', 'patil', 'poonam', 'poonampatil76@gmail.com', '$2y$04$GgHx.TOsqtZOvz08XkZRCOyA0rSsktstE721MlCdN742WYHp7vieG', '2021-04-10'),
(6, 'amar', 'murgi', 'amar', 'amar45@gmail.com', '$2y$04$BOAXhOiaJLQnHiD72B4H5ej/ImDOlJb1TDirFRXfCXQA1RrFsCzKW', '2021-04-30'),
(7, 'sukanya', 'sankpal', 'sukii', 'mehara345@gmail.com', '$2y$04$MM/cgCuZlHl1Y.fuVZZjteGjAj3id/ekqonTe9rUbMonlaAWcO6Bi', '2021-04-30'),
(8, 'sam', 'mehara', 'sam', 'asdf@gmail.com', '$2y$04$JWL6MYSS5wQA1oTRBdUHWuS6mJf4AQ/1x9NusVBNI3ULwMWdeJ91a', '2021-04-30'),
(9, 'ram', 'mehata', 'ram', 'mehata345@gmail.com', '$2y$04$8koojdMiBBW98vcB8bMGfeWQ2EqR90/1HEyrWBujElp4q14nuSUVK', '2021-04-30'),
(10, 'tina', 'bandi', 'tina', 'tina345@gmail.com', '$2y$04$AYUYfTpOaVsVNE.TLUNb6OtjUne0WnpnOWpSu//5F4X.WAKwSrWcG', '2021-04-30'),
(11, 'samira', 'Birla', 'samira', 'sam45@gmail.com', '$2y$04$krVlfTOhlKc8JLY/BjzDH.S17TeOpVlufklXZtpKQYmD6f16xooYS', '2021-04-30'),
(12, 'mira ', 'modi', 'mira', 'mira45@gmail.com', '$2y$04$AXaAR9V2si78A7959wxbHOLQ.pKCs7UvLaZbK.oy6DlTTTV1D19Pq', '2021-04-30'),
(13, 'kishan', 'Mehata', 'kishan', 'kk345@gmail.com', '$2y$04$kny/X4MkU2yvieJECpbLGuxP3WBPiX0mHZH/SkxGskG7MvKgNIAXO', '2021-05-01'),
(14, 'Priya', 'mehara', 'priya', 'priyamehara345@gmail.com', '$2y$04$N/WlbBZKpV/ndtXlq2wWMeSIfMIVDUZOifWMyEeXXWzJL.1ObuL4y', '2021-05-01'),
(15, 'tiya', 'jhadhav', 'tiya', 'jhadhav345@gmail.com', '$2y$04$HtOyGRLl4IUiYNrxur51VugeyROrs0FtaFCpLCtt2WcUkocZAwMVi', '2021-05-01'),
(16, 'ram', 'sankpal', 'meera', 'meera76@gmail.com', '$2y$04$ZzmfFNLTZyjast9t6.fWl./9QDt8.CcYtWu27Ztf8jDKpa7O5hChS', '2021-05-01'),
(17, 'shital', 'patil', 'shital', 'shital345@gmail.com', '$2y$04$JbNixVowTxT8HblP/Ek8/O7clval0hmGM8PmnI.hSTE5KeX2mMh/O', '2021-05-24'),
(18, 'riya', 'patil', 'riya', 'riya76@gmail.com', '$2y$04$2CKP1PkFMs8049iXa6CqauraVHqTFB5zHeHfW.rO1poXyvdZxX/Bq', '2021-05-25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
