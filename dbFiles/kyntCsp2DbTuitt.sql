-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2018 at 11:09 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'PS4'),
(2, 'XBOXONE'),
(3, 'NSWITCH'),
(4, 'PS4 ACC'),
(5, 'XBOXONE ACC'),
(6, 'NSWITCH ACC');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL,
  `date_purchased` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `referrence_number` varchar(255) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'pending'),
(2, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `price_each` decimal(11,2) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_image`, `description`, `price_each`, `category_id`) VALUES
(2, 'Monster Hunter: World', 'assets/img/uploads/mhw.jpg', 'Battle gigantic monsters in epic locales.\n\nAs a hunter, you''ll take on quests to hunt monsters in a variety of habitats.\nTake down these monsters and receive materials that you can use to create stronger weapons and armor in order to hunt even more dangerous monsters.\n\nIn Monster Hunter: World, the latest installment in the series, you can enjoy the ultimate hunting experience, using everything at your disposal to hunt monsters in a new world teeming with surprises and excitement.', '60.00', 1),
(21, 'Assasin''s Creed Origins', 'assets/img/uploads/ac.jpg', 'Assasin''s Creed Xbox One Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem ratione natus unde neque esse commodi, provident corporis adipisci, pariatur obcaecati nemo ea fugit? Consequatur consectetur, autem, commodi sequi esse non?', '60.00', 2),
(22, 'Battlefield', 'assets/img/product_imgs/bf.jpg', 'Battle Field on Xbox One\r\n', '49.99', 1),
(23, 'Zelda: Breath of the Wild 3', 'assets/img/uploads/botw.jpg', 'Zelda: Breath of the Wild on Nintendo Switch 3', '49.99', 3),
(25, 'Dark Souls 3', 'assets/img/uploads/ds3.jpg', 'Dark Soul 3 PS4', '60.00', 1),
(26, 'Final Fantasy XV', 'assets/img/uploads/ffxv.jpg', 'Final Fantasy Deluxe Edition PS4', '89.99', 1),
(27, 'Super Mario Odyssey', 'assets/img/uploads/mario.jpg', 'Super Mario Oddysey on Nintendo Switch', '59.90', 3),
(28, 'Mariokart Deluxe 8', 'assets/img/uploads/mariokart.jpg', 'Mariokart 8 Deluxe Edition on Nintendo Switch', '60.00', 3),
(29, 'Nintendo Switch Case', 'assets/img/uploads/nswitchCase.jpg', 'Nintendo Switch Case for Outdoors', '100.00', 6),
(30, 'Nintendo Switch Pro Controller', 'assets/img/uploads/nswitchController.jpg', 'For much comfortability', '75.00', 6),
(31, 'Nintendo Switch Driving Controller', 'assets/img/uploads/nswitchDriving.jpg', 'For much Driving Experience', '30.99', 6),
(32, 'PS4 Camera', 'assets/img/uploads/ps4Camera.jpeg', 'PS4 Camera for Streaming', '25.00', 4),
(33, 'PS4 Controller', 'assets/img/uploads/ps4Controller.jpeg', 'PS4 Controller (Special Edition)', '19.99', 4),
(34, 'PS4 Headset', 'assets/img/uploads/ps4Headset.jpg', 'PS4 Headset (Bass Amped)', '25.99', 4),
(35, 'Xbox One Controller', 'assets/img/uploads/xboxoneController.jpeg', 'Xbox One Controller (Special Edition)', '30.00', 5),
(36, 'Xbox One Headset', 'assets/img/uploads/xboxoneHeadset.jpg', 'Xbox One Headset (Treble Amped)', '45.00', 5),
(37, 'Xbox One Sensor', 'assets/img/uploads/xboxoneSensor.jpg', 'Xbox One Sensor for more Dancing Experience', '26.99', 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_feedback`
--

CREATE TABLE `product_feedback` (
  `id` int(11) NOT NULL,
  `product_feedback` varchar(10000) NOT NULL,
  `product_rating` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` int(11) NOT NULL DEFAULT '2',
  `user_status` int(11) NOT NULL DEFAULT '1',
  `user_avatar_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `gender`, `date_created`, `user_type`, `user_status`, `user_avatar_path`) VALUES
(1, 'admin', 'test123', 'laotabudlong@gmail.com', 'Kynt', 'Tabudlong', 'male', '2018-05-11 08:52:36', 1, 1, ''),
(2, 'knythiey', 'test123', 'kynt.tabudlong@gmail.com', 'Zoom', 'Simoy', 'male', '2018-05-11 14:12:11', 2, 1, ''),
(3, 'testuser', '448ed7416fce2cb66c285d182b1ba3df1e90016d', 'test@sample.com', 'test', 'user', 'male', '2018-05-15 10:15:36', 2, 1, ''),
(4, 'testadmin', '448ed7416fce2cb66c285d182b1ba3df1e90016d', 'test@admin.com', 'admin', 'test', 'male', '2018-05-16 11:09:04', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordered_items_fk0` (`product_id`),
  ADD KEY `ordered_items_fk1` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referrence_number` (`referrence_number`),
  ADD KEY `orders_fk0` (`payment_id`),
  ADD KEY `orders_fk1` (`user_id`),
  ADD KEY `orders_fk2` (`status_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_fk0` (`payment_type`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `products_fk0` (`category_id`);

--
-- Indexes for table `product_feedback`
--
ALTER TABLE `product_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_feedback_fk0` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_fk0` (`user_type`),
  ADD KEY `users_fk1` (`user_status`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `product_feedback`
--
ALTER TABLE `product_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD CONSTRAINT `ordered_items_fk0` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ordered_items_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_fk2` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_fk0` FOREIGN KEY (`payment_type`) REFERENCES `payment_type` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_feedback`
--
ALTER TABLE `product_feedback`
  ADD CONSTRAINT `product_feedback_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`id`),
  ADD CONSTRAINT `users_fk1` FOREIGN KEY (`user_status`) REFERENCES `user_status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
