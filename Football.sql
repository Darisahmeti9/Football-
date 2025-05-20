CREATE TABLE `users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `emri` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL UNIQUE,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `is_admin` varchar(255) NOT NULL 
);

CREATE TABLE `products` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `product_name` VARCHAR(255) NOT NULL,
  `product_desc` TEXT NOT NULL,
  `product_quality` VARCHAR(255) NOT NULL,
  `product_rating` DECIMAL(3, 2) NOT NULL DEFAULT 0.00,  -- e.g., 4.50 for a rating of 4.5
  `product_image` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `shop` (
  `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `order_id` INT(11) NOT NULL,  -- Link to orders table
  `product_id` INT(11) NOT NULL,  -- Product ordered
  `quantity` INT NOT NULL,  -- Quantity of the product ordered
  `price` DECIMAL(10, 2) NOT NULL  -- Price at the time of purchase
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

