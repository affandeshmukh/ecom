-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 08:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

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
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`product_id`, `ip_address`, `quantity`) VALUES
(2, '192.168.2.192', 2),
(4, '::1', 2),
(6, '::1', 2);

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
(4, 'a', 'Operating System Android 13 Go Processor Brand Mediatek Processor Type Helio G36 Processor Core Octa Core Primary Clock Speed 2.2 GHz Operating Frequency 2G GSM: B2/B3/B5/B8, 3G WCDMA: B1/B5/B8, 4G LTE: B1/B3/B5/B8/B38/B40/B41 Internal Storage 128 GB', 'mobiles phone ', 'Mobiles', 'Infinix', '711aFog+qFL._SY879_.jpg', '613zFJv8iCL._SY879_.jpg', '71WtcmQPHCL._SX466_.jpg', '10', '2024-04-17 18:26:08', 'true'),
(5, 'aa', 'VIDA V1 Pro Electric Scooter comes with promising security, safety, and connectivity features with a tech-first ecosystem for a robust experience. ', 'electric ev scooty vehicle', 'Electric Scooty', 'Honda', '-original-imagz8xn2zysrhzs.webp', '-original-imagz8xn2zysrhz', '-original-imagz8xn2zysrhzs.webp', '99,999', '2024-04-17 18:25:51', 'true'),
(6, 'a', 'Joyalukkas Assayer Certified 10 grams, 24k (999) Yellow Gold Precious Gold Bar', 'gold coin', 'Gold', 'Arhan', '61kkBn6ofAL._SY575_.jpg', '61bHqRnqKML._SY575_.jpg', '611SCVbDUQL._SY575_.jpg', '7999', '2024-04-17 18:26:04', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_num` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_num`) VALUES
(1, 'new', 'new@gmail.com', '$2y$10$Fn9PFpRz52kPmwBOVvZ4..8i8fsxxfZpi0xQThky8Gc3krGVfK.7a', '', '::1', 'nn', '2136459870');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`product_id`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
