CREATE TABLE `users` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL UNIQUE,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`gender` varchar(10) NOT NULL,
	`date_created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`user_type` int(11) NOT NULL DEFAULT '2',
	`user_status` int(11) NOT NULL DEFAULT '1',
	`user_avatar_path` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `orders` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`referrence_number` varchar(255) NOT NULL UNIQUE,
	`payment_id` int(11) NOT NULL,
	`user_id` int(11) NOT NULL,
	`total` double(11,2) NOT NULL,
	`status_id` int(11) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`)
);

CREATE TABLE `ordered_items` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`product_id` int(11) NOT NULL,
	`order_id` int(11) NOT NULL,
	`quantity` int(11) NOT NULL,
	`subtotal` double(11,2) NOT NULL,
	`date_purchased` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
);

CREATE TABLE `products` (
	`id` int NOT NULL AUTO_INCREMENT,
	`product_name` varchar(255) NOT NULL UNIQUE,
	`product_image` varchar(255) NOT NULL,
	`description` varchar(10000) NOT NULL,
	`price_each` double(11,2) NOT NULL,
	`category_id` int(11) NOT NULL,
	`product_feedback` int(11) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `categories` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `payments` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`payment_type` int(11) NOT NULL,
	`amount` double(11,2) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `payment_type` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `transaction` (
	`ordered_items_id` int(11) NOT NULL,
	`product_name` varchar(255) NOT NULL,
	`quantity_ordered` int(11) NOT NULL,
	`date_purchased` varchar(255) NOT NULL,
	`price_each` double(11,2) NOT NULL,
	`order_subtotal` double(11,2) NOT NULL,
	`transaction_total` double(11,2) NOT NULL
);

CREATE TABLE `order_status` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`status` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `user_type` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`role` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `product_feedback` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`product_feedback` varchar(10000) NOT NULL,
	`product_rating` varchar(255) NOT NULL,
	`user_id` int(11) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `user_status` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`status` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`user_type`) REFERENCES `user_type`(`id`);

ALTER TABLE `users` ADD CONSTRAINT `users_fk1` FOREIGN KEY (`user_status`) REFERENCES `user_status`(`id`);

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`payment_id`) REFERENCES `payments`(`id`);

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk2` FOREIGN KEY (`status_id`) REFERENCES `order_status`(`id`);

ALTER TABLE `ordered_items` ADD CONSTRAINT `ordered_items_fk0` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`);

ALTER TABLE `ordered_items` ADD CONSTRAINT `ordered_items_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`);

ALTER TABLE `products` ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`);

ALTER TABLE `products` ADD CONSTRAINT `products_fk1` FOREIGN KEY (`product_feedback`) REFERENCES `product_feedback`(`id`);

ALTER TABLE `payments` ADD CONSTRAINT `payments_fk0` FOREIGN KEY (`payment_type`) REFERENCES `payment_type`(`id`);

ALTER TABLE `transaction` ADD CONSTRAINT `transaction_fk0` FOREIGN KEY (`ordered_items_id`) REFERENCES `ordered_items`(`id`);

ALTER TABLE `product_feedback` ADD CONSTRAINT `product_feedback_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

