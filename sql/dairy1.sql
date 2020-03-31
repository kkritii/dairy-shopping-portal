-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2020 at 04:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(11) NOT NULL,
  `branch_location` text NOT NULL,
  `branch_admin` varchar(255) NOT NULL,
  `branch_opened_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL COMMENT 'Foreign Key',
  `product_id` int(11) NOT NULL COMMENT 'Foreign Key',
  `quantity` int(11) NOT NULL,
  `is_delivered` enum('yes','no','failed') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `email_activation` tinyint(4) NOT NULL DEFAULT 0,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `profile_pic` blob NOT NULL,
  `address` varchar(255) NOT NULL,
  `joined_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `is_active`, `email_activation`, `fullname`, `password`, `email`, `contact_number`, `profile_pic`, `address`, `joined_on`) VALUES
(40, 1, 0, 'Arun Prajapati', 'f95c1202207c71ee3d36b6dc00e53809', 'arunkp1122@gmail.com', '9860465326', 0x303031303073504f5254524149545f30303130305f425552535432303230303130363130303733383838325f434f5645522e6a706567, 'Kamalbinayak', '2020-03-12 08:16:47'),
(41, 1, 0, 'babin', 'f4771668c4b6693fa5e3f4bbd9de3d6b', 'datheputhebabin@gmail.com', '9843237372', '', 'byasi', '2020-03-12 08:18:03'),
(42, 1, 0, 'swostika shrestha', '1fc91e308c3d2977c8d2973bfd889d8b', 'sthaswostika2@gmail.com', '98398504-56', '', 'ktm', '2020-03-13 09:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `customer_delivery_address`
--

CREATE TABLE `customer_delivery_address` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `district` text NOT NULL,
  `city` text NOT NULL,
  `ward_no` int(11) NOT NULL,
  `house_no` int(11) NOT NULL,
  `street` text NOT NULL,
  `longitude` text DEFAULT NULL,
  `latitude` text DEFAULT NULL,
  `default_address` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_delivery_address`
--

INSERT INTO `customer_delivery_address` (`address_id`, `customer_id`, `district`, `city`, `ward_no`, `house_no`, `street`, `longitude`, `latitude`, `default_address`) VALUES
(1, 40, 'Bhaktapur', 'Kamalbiinayak', 10, 123, 'Tumacho', '85.3145', '27.7142', 1),
(2, 51, 'Bhaktapur', 'Kamalbiinayak', 10, 123, 'Tumacho', '85.3145', '27.7142', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(11) NOT NULL,
  `product_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_ids`)),
  `customer_id` int(11) NOT NULL,
  `payment_method` enum('cash_on_delivery','pay_with_esewa') NOT NULL DEFAULT 'cash_on_delivery',
  `total_order_price` varchar(11) NOT NULL,
  `delivery_cost` varchar(255) NOT NULL,
  `product&delivery_price` int(11) NOT NULL,
  `total_order_quantity` int(11) NOT NULL,
  `order_placed_date` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delivery_date` date DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  `order_status` enum('pending','successful','unsuccessful') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `deliver_employee_id` int(11) NOT NULL,
  `vechile_id` varchar(255) NOT NULL,
  `deliver_location` varchar(255) NOT NULL,
  `delivery_cost` varchar(255) NOT NULL,
  `is_delivered` tinyint(4) NOT NULL DEFAULT 0,
  `delivered_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `role` enum('superadmin','admin','delivery') NOT NULL DEFAULT 'admin',
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` blob NOT NULL,
  `joined_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(11) NOT NULL,
  `offer_name` text NOT NULL,
  `offer_description` varchar(255) NOT NULL,
  `offer_title` text NOT NULL,
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` text NOT NULL,
  `offer_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `offer_name`, `offer_description`, `offer_title`, `start_date`, `end_date`, `offer_status`) VALUES
(1, 'Bisket Offer', 'Buy products more than 2000Rs to get free Delivery😍', 'BISKET OFFER', '2020-03-23 10:06:28', 'April 12, 2020 12:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `size` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `rating` enum('1','2','3','4','5') DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `quantity_sold` int(11) NOT NULL DEFAULT 0,
  `image_source` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category`, `unit_price`, `size`, `description`, `rating`, `stock`, `quantity_sold`, `image_source`) VALUES
(81, 'GLASS DHAU', 'yogurt', 20, 2, ' ', NULL, 0, 0, 0x676c6173735f646861752e6a7067),
(82, 'SANO DHAU', 'yogurt', 60, 5, ' ', NULL, 229, 0, 0x73616e6f5f646861752e6a7067),
(83, 'KALA DHAU', 'yogurt', 200, 3, ' ', NULL, 110, 0, 0x6e6f726d616c5f646861752e6a7067),
(84, 'BATA DHAU', 'yogurt', 200, 3, ' ', NULL, 100, 0, 0x626174615f646861752e6a7067),
(85, 'MATKA DHAU', 'yogurt', 650, 5, ' ', NULL, 50, 0, 0x6d61746b615f646861752e6a7067),
(86, 'THULO DHAU', 'yogurt', 600, 5, ' ', NULL, 30, 0, 0x7468756c6f5f646861752e6a7067),
(87, 'KING CURD', 'yogurt', 800, 6, ' ', NULL, 25, 5, 0x6a756a755f646861752e6a7067),
(88, 'RED VELVET', 'cake', 1400, 1, ' ', NULL, 5, 0, 0x7265642d76656c7665742e6a7067),
(89, 'CHOCOLATE CAKE', 'cake', 600, 2, ' ', NULL, 2, 0, 0x63686f636f6c6174652d63616b652e6a7067),
(90, 'BLACK FOREST', 'cake', 999, 2, ' ', NULL, 2, 0, 0x626c61636b2d666f726573742e6a7067),
(91, 'RASPBERRY CAKE', 'cake', 1499, 2, ' ', NULL, 4, 1, 0x7261737062657272792d63616b652e6a7067),
(92, 'LEMON CHEESECAKE', 'cake', 600, 1, ' ', NULL, 0, 0, 0x6c656d6f6e2d6368656573652e6a7067),
(93, 'FISH CAKE', 'cake', 400, 1, ' ', NULL, 0, 0, 0x666973685f63616b652e6a7067),
(95, 'Churpi', 'cheese', 1100, 5, 'Tha flavor of chhurpi can best be described as fresh and tangy. ', NULL, 30, 0, 0x6368757270692e6a7067),
(96, 'Nepali Yak Cheese', 'cake', 650, 450, 'All natural, no preservatives added\r\nHand crafted in the Himalayas with centuries old recipe\r\nBest chews, with natural mineral and vitamins ', NULL, 30, 0, 0x4e6570616c692d79616b2d6368656573652e6a7067),
(97, 'test', 'yogurt', 200, 2, ' testestests', NULL, 123, 0, 0x35304434454530452d444630442d343230302d423433442d3144423841424138324542332e6a706567);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_delivery_address`
--
ALTER TABLE `customer_delivery_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `customer_delivery_address`
--
ALTER TABLE `customer_delivery_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
