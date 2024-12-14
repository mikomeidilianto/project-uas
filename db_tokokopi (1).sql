-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 07:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokokopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `foto`) VALUES
(1, 'Kopi Beska', 'Coffee & Non Coffees', '1733755342_6152f5f4f983ab4963c9.png'),
(2, 'Uramen', 'Ramen noodles', '1733755385_a45607687f078e03a542.png'),
(3, 'Geprek Goo', 'Ayam Geprek Goo', '1733755433_47f26ec7610d8d72dacc.png'),
(4, 'Ghurih', 'Tahu Baso gurih', '1733755476_4956c9d6d2c019fcaed0.png'),
(5, 'Mauchurros', 'Churros enak', '1733755561_50151599a603ae8dca47.png'),
(6, 'Mie Hap Hap', 'Mie goreng hap hap', '1733755588_0b57f87a0d28ab74ee94.png'),
(7, 'Tuan Dawet Indonesia', 'Es Dawet terenak', '1733755616_3da7ea18443b0afb91f3.png'),
(8, 'My Honey', 'Gorengan fry', '1733755650_efa613a6e04cc5dc1b56.png');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_product`, `quantity`) VALUES
(63, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_keranjang` int(11) NOT NULL,
  `status` enum('pending','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `category_id`, `foto`, `status`) VALUES
(4, 'Americano', 'Coffee ', 19000, 50, 1, '1734001735_6569330e9e56f156ed37.jpg', 'active'),
(6, 'Cappucino', 'Coffee ', 21000, 50, 1, '1734001776_39bcf09a48143795bd77.jpg', 'active'),
(8, 'Coffee Latte', 'Coffee ', 21000, 50, 1, '1734001809_780b23c9bcac89c7edc5.jpg', 'active'),
(10, 'Matcha Coffee', 'Coffee ', 23000, 50, 1, '1734001888_b0061337a2a9468ca407.jpg', 'active'),
(11, 'Tropical Punch', 'Non Coffee', 24000, 50, 1, '1734001936_18a3aa1363b9b3241c48.jpg', 'active'),
(12, 'Vietnam V60', 'Coffee ', 20000, 50, 1, '1734001976_55153766878ef67ecb9c.jpg', 'active'),
(13, 'Curry Beef Ramen', 'Ramen noodles', 25000, 50, 2, '1734002030_10d0b8881dc3b9459380.jpg', 'active'),
(14, 'Curry Chicken Ramen', 'Ramen noodles', 18000, 40, 2, '1734002075_c4b0928442a5af4d8859.jpg', 'active'),
(15, 'Karage Ramen', 'Ramen noodles', 25000, 18, 2, '1734002111_5393d70ac0c43f5a1e15.jpg', 'active'),
(16, 'Ramen Tantan', 'Ramen noodles', 18000, 0, 2, '1734002154_4ae30721b519ffaff209.png', 'inactive'),
(17, 'Ayam Geprek Hemat', 'Ayam geprek', 15000, 100, 3, '1734002199_3b12e5b10aed344f4182.jpeg', 'active'),
(18, 'Paket Geprek Lengkap', 'Ayam geprek', 20000, 50, 3, '1734002243_35b45ccb642888de8c7b.jpg', 'active'),
(19, 'Paket Geprek Mozzarella', 'Ayam geprek', 23000, 0, 3, '1734002283_fb6337730f52621b7220.jpg', 'inactive'),
(20, 'Churros Original (isi 6)', 'Churros', 15000, 30, 5, '1734002359_1ed07dbd94abdc4b9138.jpg', 'active'),
(21, 'Churros Chocolatte (isi 6)', 'Churros', 20000, 50, 5, '1734002409_6f02f932f779c91e73e8.jpg', 'active'),
(22, 'Mie Nyemek', 'Mie goreng', 15000, 20, 6, '1734002447_9c02496c65c05177b4fc.jpg', 'active'),
(23, 'Mie Tek Tek Goreng', 'Mie goreng', 18000, 70, 6, '1734002481_150b73c329bbf34ca93f.jpg', 'active'),
(24, 'Mie Tek Tek Kuah', 'Mie goreng', 18000, 40, 6, '1734002520_f3c670c0f08de34a7f68.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(100) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `nim`, `fakultas`, `telepon`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '', NULL, '', '12345', 'admin', '2024-11-30 13:00:28'),
(2, 'Miko meidilianto', '2310512133', NULL, '', '', 'customer', '2024-12-01 07:18:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_keranjang` (`id_keranjang`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`id_keranjang`) REFERENCES `keranjang` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
