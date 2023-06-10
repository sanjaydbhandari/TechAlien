-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 20, 2023 at 04:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techaliendb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `popular`, `created_at`) VALUES
(81, 'Mobile', 'mobiles', 'All kinds of mobiles', '1679138689.jpg', 'Mobile', 'All kinds of mobiles', 'Mobile', 0, 0, '2023-03-18 11:24:49'),
(82, 'Headphones & Headsets', 'Headphones & Headsets', 'All kinds of HeadPhones', '1679138731.jpg', 'Headphones', 'All kinds of HeadPhones ', 'Headphones', 0, 0, '2023-03-18 11:25:31'),
(83, 'Cables & Cords', 'Cables & Cords', 'Charge and sync all your Lightning connector devices quickly and safely, using just one cable. Simply plug the USB end directly into any USB port to stay connected while you\'re at home, at work, or on the road.', '1679153484.jpg', 'Cables & Cords', 'Charge and sync all your Lightning connector devices quickly and safely, using just one cable. ', 'Cables & Cords', 1, 0, '2023-03-18 15:28:08'),
(84, 'Chargers & Adapters', 'Chargers & Adapters', 'fast, efficient charging,Features an ultracompact design', '1679153706.jpg', 'Chargers & Adapters', 'fast, efficient charging,Features an ultracompact design ', 'Chargers & Adapters', 1, 0, '2023-03-18 15:34:03'),
(85, 'Memory Cards', 'Memory Cards', 'Load Apps Faster with A1-rated Performance', '1679153890.jpg', 'Memory Cards', 'Load Apps Faster with A1-rated Performance', 'Memory Cards', 0, 0, '2023-03-18 15:38:10'),
(86, 'Covers & Stands', 'Covers & Stands', 'Different kinds of Mobile Stands to Choose From:', '1679154665.jpg', 'Covers & Stands', 'Covers & Stands', 'Covers & Stands', 1, 0, '2023-03-18 15:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `meta_title` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL COMMENT '0=show,1=hide',
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `quantity`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(12, 81, 'redmi Note 10', 'redmi Note 10', '', '', 10, 9999, '1679138773.jpg', 100, '', '', '', '2023-03-18 11:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE `registration` (
  `id` int(255) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone_number` bigint(10) NOT NULL,
  `addr` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `fullname`, `email`, `passwd`, `username`, `phone_number`, `addr`) VALUES
(13, '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE `signup` (
  `id` int(12) NOT NULL,
  `firstname` varchar(34) NOT NULL,
  `lastname` varchar(34) NOT NULL,
  `username` varchar(34) NOT NULL,
  `email` varchar(122) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `password` varchar(122) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `firstname`, `lastname`, `username`, `email`, `phonenumber`, `password`) VALUES
(1, 's', 'a', 'a', 'roshnibhandari08@gmail.com', 113323, 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `password`, `role`, `token`, `status`, `created_at`) VALUES
(66, 'sanjay', 'sanjaybhandari1211@gmail.com', 8605422632, '$2y$10$ZiSVWG.pU7TOaUR.jKZT8uINiwBzg3wjE23S9m34l2xyTdaef28Bm', 0, '82cf958c1d342db05ae4ad332353a6', 'not verified', '2023-03-14 07:02:43'),
(67, 'rosh', 'roshnibhandari08@gmail.com', 8605422632, '$2y$10$NSgcioFDsZt/hX/1/HSqNe.MoqCGD6xSSpgAtzUia7.1/GHuwLxbi', 1, 'd7133d23594162addd3a4fa1c6bdca', 'not verified', '2023-03-14 07:04:28'),
(68, 'sanjay', 'sanjaybhandari12@gmail.com', 5652122111, '$2y$10$CYSh39GOU6yHVKjxV2etZeFuWqdRV3pdWb/khNB6VXQgIZ2tlBRJq', 0, 'f1a53aac061a4b124bce7f22d84f53', 'not verified', '2023-03-14 07:53:34'),
(70, 'sanjay', 'sczc@gmail.dk', 8605422632, '$2y$10$zsbOxPHdb0iUQxjm5oYZr.ykoZe821Fp/zKISnoOGE84IRsu8DNla', 0, 'f69a028012f29f4ae2c067be15a929', 'not verified', '2023-03-14 10:40:26'),
(71, 'pranit', 'pranitnadawadekar934@gmail.com', 5652122111, '$2y$10$O.ITXu87kZVCbj.b4EfHyOkHruH.k6jbnCXRiW.BNcm9hb7q/4lvi', 0, '5a2ddc041b7ca35387ceda81060653', 'not verified', '2023-03-16 04:54:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
