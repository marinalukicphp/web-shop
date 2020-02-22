-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 08:10 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id_art` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id_art`, `brand`, `price`, `description`, `image`) VALUES
(7, 'Fossil', 220, 'New collection', 'fossil_muski.jpg'),
(11, 'Festina', 140, 'New collection', 'festina_muski.jpg'),
(12, 'Guess', 320, 'New collection', 'guess_zenski.jpg'),
(13, 'Casio', 180, 'New collection', 'casio_zenski.jpg'),
(16, 'Seiko', 450, 'New collection', 'seiko_zenski.jpg'),
(18, 'Police', 454, 'New collection', 'police_muski.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `mens_watches` varchar(100) NOT NULL,
  `womans_watches` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`mens_watches`, `womans_watches`) VALUES
('Fossil', 'Guess'),
('Festina', 'Casio'),
('Police', 'Seiko');

-- --------------------------------------------------------

--
-- Table structure for table `featured_products`
--

CREATE TABLE `featured_products` (
  `id_product` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured_products`
--

INSERT INTO `featured_products` (`id_product`, `name`, `price`, `image`) VALUES
(1, 'Fossil', 320, 'fossil_zenski.jpg'),
(2, 'Festina', 454, 'festina_muski.jpg'),
(3, 'Guess', 220, 'guess_zenski.jpg'),
(4, 'Casio', 140, 'casio_muski.jpg'),
(5, 'Seiko', 180, 'seiko_muski.jpg'),
(6, 'Police', 450, 'police_muski.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `logo_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo_name`) VALUES
(7, 'festina.logo.png'),
(11, 'police_logo.png'),
(12, 'casio_logo.png'),
(13, 'guess_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `id_art` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `total` double NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_name`, `product_price`, `id_art`, `count`, `total`, `client_name`, `email`, `phone`, `address`, `time`, `order_number`) VALUES
(2, 3, 'Fossil', 220, 7, 1, 220, 'Marina Lukic', 'lukicmarina1988@gmail.com', '060/1829558', 'Sumadijska 17,Mladenovac', '2019-11-02 18:33:38', 1),
(3, 3, 'Festina', 140, 11, 1, 140, 'Marina Lukic', 'lukicmarina1988@gmail.com', '060/1829558', 'Sumadijska 17,Mladenovac', '2019-11-02 18:33:38', 1),
(4, 3, 'Guess', 320, 12, 2, 640, 'Marina Lukic', 'lukicmarina1988@gmail.com', '060/1829558', 'Sumadijska 17,Mladenovac', '2019-11-02 18:34:36', 2),
(5, 3, 'Casio', 180, 13, 1, 180, 'Marina Lukic', 'lukicmarina1988@gmail.com', '060/1829558', 'Sumadijska 17,Mladenovac', '2019-11-02 18:34:36', 2),
(6, 3, 'Seiko', 450, 16, 1, 450, 'Marina Lukic', 'lukicmarina1988@gmail.com', '060/1829558', 'Sumadijska 17,Mladenovac', '2019-11-02 18:35:20', 3),
(7, 3, 'Police', 454, 18, 2, 908, 'Marina Lukic', 'lukicmarina1988@gmail.com', '060/1829558', 'Sumadijska 17,Mladenovac', '2019-11-02 18:35:20', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name_surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name_surname`, `email`, `password`, `phone`, `address`, `role`) VALUES
(1, 'Nikola Dimitrijevic', 'admin@gmail.com', 'admin', '065555555', 'Lomina 48', 'a'),
(3, 'Marina Lukic', 'lukicmarina1988@gmail.com', 'marina', '060/1829558', 'Sumadijska 17,Mladenovac', 'c'),
(4, 'Petar Petrovic', 'pera@gmail.com', 'pera', '09989867', 'Kosmajska 120', 'c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_art`);

--
-- Indexes for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `featured_products`
--
ALTER TABLE `featured_products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
