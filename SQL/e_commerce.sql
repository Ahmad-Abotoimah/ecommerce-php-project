-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 01:05 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_type` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `admin_type`) VALUES
(1, 'ahmad', 'ahmadabotoimah@gmail.com', 'Aa123456', 'uploads/admin_image/61ad4f6253e223.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `category_image`) VALUES
(5, 'Women', 'New Trend', 'images/women.jpg'),
(6, 'Men', 'New Trend ', 'images/man.jpg'),
(8, 'Bags', 'Spring 2018', 'images/bag.jpg'),
(9, 'Accessories', 'Spring 2018', 'images/belt.jpg'),
(10, 'Accessories', 'wotch', 'images/whatch.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_image` varchar(255) DEFAULT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_product_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_rate` int(11) DEFAULT NULL,
  `product_main_image` varchar(255) NOT NULL,
  `product_desc_image_1` varchar(255) DEFAULT NULL,
  `product_desc_image_2` varchar(255) DEFAULT NULL,
  `product_desc_image_3` varchar(255) DEFAULT NULL,
  `product_tag` varchar(255) NOT NULL,
  `product_categorie_id` int(11) NOT NULL,
  `product_nd_color_image` varchar(255) DEFAULT NULL,
  `product_thd_color_image` varchar(255) DEFAULT NULL,
  `product_fourth_color_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_price`, `product_quantity`, `product_rate`, `product_main_image`, `product_desc_image_1`, `product_desc_image_2`, `product_desc_image_3`, `product_tag`, `product_categorie_id`, `product_nd_color_image`, `product_thd_color_image`, `product_fourth_color_image`) VALUES
(10, 't-shirts', 'summer', '20', 4, NULL, 'images/product-01.jpg', NULL, NULL, NULL, 'sales', 5, NULL, NULL, NULL),
(11, 'jeans', 'summer', '30', 3, NULL, 'images/product-02.jpg', NULL, NULL, NULL, 'sales', 5, NULL, NULL, NULL),
(12, 'jeans', 'summmer', '10', 3, NULL, 'images/product-03.jpg', NULL, NULL, NULL, 'sales', 6, NULL, NULL, NULL),
(13, 'Couat', 'Winter', '50', 2, NULL, 'images/product-04.jpg', NULL, NULL, NULL, 'sales', 5, NULL, NULL, NULL),
(14, 't-shirts', 'summer', '34', 44, NULL, 'images/product-05.jpg', NULL, NULL, NULL, 'new', 5, NULL, NULL, NULL),
(15, 'wotch', 'accessorise', '23', 3, NULL, 'images/product-06.jpg', NULL, NULL, NULL, 'new', 9, NULL, NULL, NULL),
(16, 't-shirt', 'summer', '39', 3, NULL, 'images/product-01.jpg', NULL, NULL, NULL, 'women', 5, NULL, NULL, NULL),
(17, 'jeans', 'winter', '33', 3, NULL, 'images/product-03.jpg', NULL, NULL, NULL, 'men', 6, NULL, NULL, NULL),
(18, 'shoes', 'spoet', '66', 8, NULL, 'images/product-09.jpg', NULL, NULL, NULL, 'shoes', 6, NULL, NULL, NULL),
(20, 'wotch', 'wotches', '99', 9, NULL, 'images/product-06.jpg', NULL, NULL, NULL, 'watches', 9, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unique_visitors`
--

CREATE TABLE `unique_visitors` (
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `visitor_ip` varchar(255) NOT NULL,
  `visittor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unique_visitors`
--

INSERT INTO `unique_visitors` (`visit_date`, `visitor_ip`, `visittor_id`) VALUES
('2021-12-05 23:52:41', '::1', 1),
('2021-12-05 23:59:22', '::2', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_mobile` int(14) DEFAULT NULL,
  `user_location` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_mobile`, `user_location`, `user_image`, `user_gender`, `user_creation_date`) VALUES
(20, 'jana', 'jana@gmail.com', '23445', 2147483647, 'salt', ' uploads/user_image/61aa000157291avatar.png', 'female', '2021-12-03 10:49:01'),
(22, 'FM', 'fm@gmail.com', '7890-', 2147483647, 'salt', ' uploads/user_image/61aa0056164f8avatar.png', 'female', '2021-12-03 10:54:03'),
(23, 'lana', 'lana@test.com', '7890-87', 2147483647, 'amman', ' uploads/user_image/61aa00785aa8bavatar.png', 'female', '2021-12-03 11:08:11'),
(26, 'admin', 'admint@test.com', 'errrrrrrrrrr', 2147483647, 'salt', ' uploads/user_image/61ab99ed9a21cavatar.png', 'Male', '2021-12-03 11:39:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_user` (`comment_user_id`),
  ADD KEY `comment_product` (`comment_product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category` (`product_categorie_id`);

--
-- Indexes for table `unique_visitors`
--
ALTER TABLE `unique_visitors`
  ADD PRIMARY KEY (`visittor_id`),
  ADD UNIQUE KEY `visitor_ip` (`visitor_ip`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `unique_visitors`
--
ALTER TABLE `unique_visitors`
  MODIFY `visittor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_product` FOREIGN KEY (`comment_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`comment_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_category` FOREIGN KEY (`product_categorie_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
