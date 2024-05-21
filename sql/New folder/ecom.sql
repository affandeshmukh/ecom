-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 07:01 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brands_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brands_title`) VALUES
(1, 'Zebronics'),
(2, 'Royal'),
(3, 'Infinix'),
(4, 'Honda'),
(5, 'Joyalukkas ');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Electronics'),
(2, 'Friuts'),
(3, 'Mobiles'),
(4, 'Electric Scooty'),
(5, 'Gold');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `keywords` varchar(300) NOT NULL,
  `category_title` varchar(1000) NOT NULL,
  `brands_title` varchar(1000) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(25) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `price` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `description`, `keywords`, `category_title`, `brands_title`, `product_image1`, `product_image2`, `product_image3`, `price`, `date`, `status`) VALUES
(2, 'Zebronics ZEB-SD12 120GB 2.5\"(6.35cm) Solid State Drive (SSD) with SATA III Interface, 6Gb/s, Fast Performance, Ultra Low Power Consumption, S.M.A.R.T. Thermal Management and Silent Operation.', '2.5 inch Form Factor with SATA interface, Faster than HDD SATA III 6Gb/s support Sequential Read Speed 500Mb/s*, Write speed 400Mb/s*', 'ssd hdd hard disk', 'Electronics', 'Zebronics', '1.png', '2.png', '3.png', '649', '2024-04-06 04:35:05', 'true'),
(3, 'Apple fruit', 'Apple  (Malus sp., Rosaceae) is cultivated worldwide as a fruit tree, and is the most widely grown species in the genus Malus. The apple tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today. Apples have been grown for thousands of years in Asia and Europe, and were brought to North America by European colonists.', 'apple fruit fruits', 'Friuts', 'Royal', 'apple.jpg', 'apple.jpg', 'apple.jpg', '119', '2024-04-06 04:39:24', 'true'),
(4, 'Infinix Smart 8 8GB RAM 128GB Storage | 5000 mAh Heavy Battery | Android 13 Go | 50MP + AI Camera | Dual Sim (Shiny Gold)', 'Operating System Android 13 Go Processor Brand Mediatek Processor Type Helio G36 Processor Core Octa Core Primary Clock Speed 2.2 GHz Operating Frequency 2G GSM: B2/B3/B5/B8, 3G WCDMA: B1/B5/B8, 4G LTE: B1/B3/B5/B8/B38/B40/B41 Internal Storage 128 GB', 'mobiles phone ', 'Mobiles', 'Infinix', '711aFog+qFL._SY879_.jpg', '613zFJv8iCL._SY879_.jpg', '71WtcmQPHCL._SX466_.jpg', '7,999', '2024-04-06 04:42:58', 'true'),
(5, 'VIDA Powered by Hero V1 Pro Booking for Ex-Showroom Price (with Portable Charger, Black)', 'VIDA V1 Pro Electric Scooter comes with promising security, safety, and connectivity features with a tech-first ecosystem for a robust experience. ', 'electric ev scooty vehicle', 'Electric Scooty', 'Honda', '-original-imagz8xn2zysrhzs.webp', '-original-imagz8xn2zysrhz', '-original-imagz8xn2zysrhzs.webp', '99,999', '2024-04-06 04:49:25', 'true'),
(6, 'Joyalukkas Assayer Certified 10 grams, 24k (999) Yellow Gold Precious Gold Bar', 'Joyalukkas Assayer Certified 10 grams, 24k (999) Yellow Gold Precious Gold Bar', 'gold coin', 'Gold', 'Arhan', '61kkBn6ofAL._SY575_.jpg', '61bHqRnqKML._SY575_.jpg', '611SCVbDUQL._SY575_.jpg', '6700', '2024-04-06 04:53:25', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
