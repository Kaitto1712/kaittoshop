-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 11:31 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaittoshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `parent_id`, `name`) VALUES
(1, 2, 'Váy nữ'),
(2, 2, 'Đầm'),
(3, 1, 'Áo vest'),
(4, 1, 'Áo khoác nam'),
(5, 3, 'Đai lưng'),
(7, 3, 'Vòng tay'),
(8, 2, 'Chân váy'),
(9, 1, 'Áo thun nam'),
(10, 1, 'Áo sơ mi nam'),
(18, 2, 'Áo sơ mi nữ'),
(19, 2, 'Áo khoác nữ');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_paren`
--

CREATE TABLE `catalog_paren` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog_paren`
--

INSERT INTO `catalog_paren` (`id`, `name`) VALUES
(1, 'Thời trang nam'),
(2, 'Thời trang nữ'),
(3, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `transaction_id`, `product_id`, `qty`, `size`, `amount`) VALUES
(59, 68, 28, 1, 'S', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `image_link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image_link1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_link2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_link3` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `describes` text COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `catalog_id`, `name`, `price`, `discount`, `image_link`, `image_link1`, `image_link2`, `image_link3`, `describes`, `created`) VALUES
(3, 3, 'Áo vest VNV', 1000000, 200000, 'upload/img/18465849561.jpg', 'upload/img/74758594118465849561.jpg', 'upload/img/149242517618465849561.jpg', 'upload/img/186754203118465849561.jpg', '', '2022-12-23 08:07:01'),
(15, 9, 'Luffy x Gucci x Lv x Streetstyle', 90000, 11000, 'https://product.hstatic.net/1000088324/product/tw004d-t_n1_719da8111cf84e0cad37a56d95c7ebac_master.png', 'https://product.hstatic.net/1000088324/product/tw004d-t_n1_719da8111cf84e0cad37a56d95c7ebac_master.png', 'https://product.hstatic.net/1000088324/product/tw004d-t_n1_719da8111cf84e0cad37a56d95c7ebac_master.png', 'https://product.hstatic.net/1000088324/product/tw004t-t_n2_fb3ad69010334c3485464d9fd5b3aa93_master.png', '', '2022-12-22 20:25:19'),
(17, 4, 'Áo StreetStyle Hoodie', 110000, 21000, 'https://product.hstatic.net/1000088324/product/tw025d-h_l1_a42e13c3983f466ea3c3c3b3465f724e_1024x1024.jpg', 'https://product.hstatic.net/1000088324/product/tw025d-h_l1_a42e13c3983f466ea3c3c3b3465f724e_1024x1024.jpg', 'https://product.hstatic.net/1000088324/product/tw025d-h_l1_a42e13c3983f466ea3c3c3b3465f724e_1024x1024.jpg', 'https://product.hstatic.net/1000088324/product/tw025d-h_l1_a42e13c3983f466ea3c3c3b3465f724e_1024x1024.jpg', '', '2022-12-22 20:27:07'),
(20, 1, 'Váy ngắn nữ', 150000, 25000, 'upload/img/1003156814.jpg', 'upload/img/1060538802-1.jpg', 'upload/img/1003156814.jpg', 'upload/img/1003156814.jpg', '', '2022-12-22 20:23:12'),
(21, 19, 'Áo sơ mi nữ', 250000, 35000, 'upload/img/409158397.jpg', 'upload/img/409158397.jpg', 'upload/img/409158397.jpg', 'upload/img/409158397.jpg', '', '2022-12-23 08:08:00'),
(22, 19, 'Áo khoác Hoodie', 250000, 35000, 'upload/img/1642833756.jpg', 'upload/img/1642833756.jpg', 'upload/img/1642833756.jpg', 'upload/img/1642833756.jpg', '', '2022-12-22 20:23:46'),
(23, 2, 'Đầm nữ Voan thắt nơ', 200000, 30000, 'upload/img/1274143968.jpg', 'upload/img/1274143968.jpg', 'upload/img/1274143968.jpg', 'upload/img/1274143968.jpg', '', '2022-12-22 20:23:59'),
(24, 5, 'Thắt lưng Tushi', 110000, 21000, 'upload/img/930297968.jpg', 'upload/img/930297968.jpg', 'upload/img/930297968.jpg', 'upload/img/930297968.jpg', '', '2022-12-22 20:25:37'),
(25, 5, 'Thắt lưng LV', 159000, 30000, 'upload/img/1527468086.jpg', 'upload/img/1527468086.jpg', 'upload/img/1527468086.jpg', 'upload/img/1527468086.jpg', '', '2022-12-22 20:25:52'),
(27, 7, 'Vòng tay 12 cung hoàng đạo', 40000, 10000, 'upload/img/2081689482.jpg', 'upload/img/2081689482.jpg', 'upload/img/2081689482.jpg', 'upload/img/2081689482.jpg', '', '2022-12-23 05:57:24'),
(28, 9, 'Áo KaittoShop', 150000, 50000, 'upload/img/1561262872.png', 'upload/img/1561262872.png', 'upload/img/1561262872.png', 'upload/img/1561262872.png', '', '2022-12-23 08:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_phone` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `status`, `user_id`, `user_name`, `user_email`, `user_phone`, `address`, `amount`, `message`, `created`) VALUES
(61, 2, 1, '1225', 'kaitto@gmail.com', '123', '123', 160000, '', '2022-12-23 16:32:21'),
(62, 2, 1, '1225', 'kaitto@gmail.com', '123', '123', 520000, '', '2022-12-23 16:32:48'),
(68, 1, 39, '', '', '', '', 150000, '', '2022-12-23 19:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `address`, `phone`, `level`, `created`) VALUES
(1, 'kaitto', '12', '1225', 'kaitto@gmail.com', '123', '123', 1, '2022-12-23 05:44:33'),
(2, 'admin', '123', 'admin', 'admin@gmail.com', 'hà nội', '12345', 2, '2022-11-27 15:38:59'),
(39, 'abc123', 'abc123', '123', NULL, '123', '123', 1, '2022-12-23 08:23:48'),
(40, '123', '123', '123', NULL, '123', '112', 1, '2022-12-23 12:22:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `catalog_paren`
--
ALTER TABLE `catalog_paren`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order1` (`product_id`),
  ADD KEY `order2` (`transaction_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product1` (`catalog_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactioj` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `catalog_paren`
--
ALTER TABLE `catalog_paren`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catalog`
--
ALTER TABLE `catalog`
  ADD CONSTRAINT `catalog_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `catalog_paren` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product1` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transactioj` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
