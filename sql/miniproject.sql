-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2017 at 04:46 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postal` int(6) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `fk_address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `orders_line`
--

CREATE TABLE `orders_line` (
  `id` int(11) NOT NULL,
  `fk_order_id` int(11) NOT NULL,
  `fk_product_code` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` text,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `image`, `price`, `description`, `category`) VALUES
(1, 'Mama Mia Meatballs', 'SIDE01', 'img/Mama-Mia-Meatballs-1486730948.png', 10.50, 'Chicken meatballs cooked with mozzarella cheese, cream, napolitana sauce.', 'sides'),
(2, 'New Orleans Drumettes', 'SIDE02', 'img/New-Orleans-Drummets-1486730923.png', 10.50, 'Roasted chicken drumettes.', 'sides'),
(3, 'Molten Lava Cake', 'SIDE03', 'img/Molten-Lava-Cake-1486731026.png', 6.00, 'Chocolate lava cake filled with warm chocolate sauce.', 'sides'),
(4, 'Tempura Prawns', 'SIDE04', 'img/Tempura-King-Prawns-1486730731.png', 10.30, 'Juicy king prawns fried in tempura batter.', 'sides'),
(5, 'Cheesy Chicken Fingers', 'SIDE05', 'img/Cheesy-Chicken-Fingers-1486731210.png', 8.50, 'Fried chicken tenders filled with cheese.', 'sides'),
(6, 'Cinnamon Twist', 'SIDE06', 'img/Cinnamon_Twist_6pcs-1490002457.png', 8.20, 'Twisty bread sprinkled with cinnamon sugar.', 'sides'),
(7, 'Garlic Twist', 'SIDE07', 'img/Garlic_twist_6pcs-1490002437.png', 8.20, 'Twisted bread with garlic flavour.', 'sides'),
(8, 'Smoked Deli Wings', 'SIDE08', 'img/Smoked-Deli-Wings-1486730752.png', 7.50, 'Smoked chicken wings marinated in aromatic spices.', 'sides'),
(9, 'Criss Cut Fries', 'SIDE09', 'img/Criss-Cut-Fries-1486731129.png', 5.50, 'Criss-cut potato fries.', 'sides'),
(10, 'Soup', 'SIDE10', 'img/Cream_of_Mushroom_Soup-1489547423.png', 2.10, 'A bowl of rich mushroom soup.', 'sides'),
(11, 'Garlic Bread', 'SIDE11', 'img/Garlic-Bread-1486731087.png', 5.50, 'Oven-fresh garlic bread sprinkled with sesame seeds.', 'sides'),
(12, 'BBQ Criss Cut Fries', 'SIDE12', 'img/image-03.png', 6.00, 'Cries-cut potato fries drizzled with BBQ sauce.', 'sides'),
(13, 'Cheesy Chili Fries', 'SIDE13', 'img/image-01-1491478261.png', 6.00, 'Golden fried potato fries drizzled with mozzarella cheese and arrabiata sauce.', 'sides'),
(14, 'Crispy Fries', 'SIDE14', 'img/image-02-1491478307.png', 5.80, 'Golden fried potato fries.', 'sides'),
(15, 'TUSCANI &reg Chicken Alfredo Pasta', 'PASTA01', 'img/Tuscani_Chicken_Alfredo_Pasta.png', 15.50, 'Grilled chicken breast strips and rotini pasta baked in alfredo sauce with a layer of cheese. Served with an order of breadsticks. Serves 2.', 'pasta'),
(16, 'TUSCANI &reg Meaty Marinara Pasta ', 'PASTA02', 'img/Tuscani_Meaty_Marinara_Pasta.png', 15.50, 'Italian-seasoned meat sauce and rotini pasta topped with cheese. Served with an order of breadsticks. Serves 2.', 'pasta'),
(17, 'Chicken Bolognaise Spaghetti', 'SPAG01', 'img/Meatball-Bolognaise-Spaghetti-Chicken.png', 13.80, '&#9679 Chicken meatballs\r\n&#9679 Onions', 'pasta'),
(18, 'Creamy Carbonara Spaghetti', 'SPAG02', 'img/Creamy-Carbonara-Spaghetti.png', 13.80, '&#9679 Chicken rolls\r\n&#9679 Mushrooms\r\n&#9679 Roasted garlic\r\n&#9679 Onions', 'pasta'),
(19, 'Beef Arrabiata Spaghetti', 'SPAG03', 'img/Beef-Arrabiata-Spaghetti.png', 13.80, '&#9679 Beef brisket strips\r\n&#9679 Mushrooms\r\n&#9679 Capsicums\r\n&#9679 Roasted garlic \r\n&#9679 Onions', 'pasta'),
(20, 'Lipton Ice Lemon Tea', 'BEV01', 'img/Lipton-Ice-Lemon-Tea-can-1486731646.png', 2.00, NULL, 'beverage'),
(21, 'Mineral Water', 'BEV02', 'img/Mineral-Water-1486731578.png', 1.50, NULL, 'beverage'),
(22, 'Pepsi', 'BEV03', 'img/Pepsi-can-1486730043.png', 2.20, NULL, 'beverage'),
(23, '7Up Revive', 'BEV04', 'img/7UP-Revive-can-1486731416.png', 2.20, NULL, 'beverage'),
(24, 'Tropicana Twister (Apple)', 'BEV05', 'img/Tropicana-Twister-Apple-1486731393.png', 4.30, NULL, 'beverage'),
(25, 'Tropicana Twister (Orange)', 'BEV06', 'img/Tropicana-Twister-Orange-1486731371.png', 4.30, NULL, 'beverage');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmcode` varchar(32) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmcode`, `status`) VALUES
(1, 'admin', 'zzzykf@gmail.com', 'admin', '1679091c5a880faf6fb5e6087eb1b2dc', 'Active'),
(2, 'zzzykf', 'zzzykf@gmail.com', '123', '1679091c5a880faf6fb5e6087eb1b2dc', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_line`
--
ALTER TABLE `orders_line`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_line`
--
ALTER TABLE `orders_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
