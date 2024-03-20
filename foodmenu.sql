-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 03:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodmenu`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`) VALUES
(1, 'Italian Cuisine', 'Delicious Italian dishes such as pasta, pizza, and risotto.', 'italian_cuisine.jpg'),
(2, 'Chinese Cuisine', 'Authentic Chinese dishes including dim sum, noodles, and stir-fries.', 'chinese_cuisine.jpg'),
(3, 'Mexican Cuisine', 'Spicy and flavorful Mexican dishes like tacos, burritos, and enchiladas.', 'mexican_cuisine.jpg'),
(4, 'Indian Cuisine', 'Rich and diverse Indian dishes such as curry, tandoori, and biryani.', 'indian_cuisine.jpg'),
(5, 'Japanese Cuisine', 'Exquisite Japanese dishes like sushi, sashimi, and ramen.', 'japanese_cuisine.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `cat_id`, `name`, `image`) VALUES
(1, 1, 'Spaghetti Carbonara', 'spaghetti_carbonara.jpg'),
(2, 1, 'Margherita Pizza', 'margherita_pizza.jpg'),
(3, 1, 'Risotto alla Milanese', 'risotto_milanese.jpg'),
(4, 1, 'Tiramisu', 'tiramisu.jpg'),
(5, 1, 'Bruschetta', 'bruschetta.jpg'),
(6, 1, 'Caprese Salad', 'caprese_salad.jpg'),
(7, 1, 'Osso Buco', 'osso_buco.jpg'),
(8, 2, 'Kung Pao Chicken', 'kung_pao_chicken.jpg'),
(9, 2, 'Beef and Broccoli Stir-Fry', 'beef_broccoli_stirfry.jpg'),
(10, 2, 'Dim Sum Platter', 'dim_sum_platter.jpg'),
(11, 2, 'Mapo Tofu', 'mapo_tofu.jpg'),
(12, 2, 'Peking Duck', 'peking_duck.jpg'),
(13, 2, 'Hot and Sour Soup', 'hot_sour_soup.jpg'),
(14, 2, 'Spring Rolls', 'spring_rolls.jpg'),
(15, 3, 'Chicken Enchiladas', 'chicken_enchiladas.jpg'),
(16, 3, 'Beef Tacos', 'beef_tacos.jpg'),
(17, 3, 'Quesadillas', 'quesadillas.jpg'),
(18, 3, 'Guacamole and Chips', 'guacamole_chips.jpg'),
(19, 3, 'Chiles Rellenos', 'chiles_rellenos.jpg'),
(20, 3, 'Fajitas', 'fajitas.jpg'),
(21, 3, 'Tres Leches Cake', 'tres_leches_cake.jpg'),
(22, 4, 'Chicken Tikka Masala', 'chicken_tikka_masala.jpg'),
(23, 4, 'Vegetable Biryani', 'vegetable_biryani.jpg'),
(24, 4, 'Paneer Butter Masala', 'paneer_butter_masala.jpg'),
(25, 4, 'Naan Bread', 'naan_bread.jpg'),
(26, 4, 'Palak Paneer', 'palak_paneer.jpg'),
(27, 4, 'Dal Tadka', 'dal_tadka.jpg'),
(28, 4, 'Samosas', 'samosas.jpg'),
(29, 5, 'Sushi Platter', 'sushi_platter.jpg'),
(30, 5, 'Ramen', 'ramen.jpg'),
(31, 5, 'Tempura', 'tempura.jpg'),
(32, 5, 'Teriyaki Chicken', 'teriyaki_chicken.jpg'),
(33, 5, 'Miso Soup', 'miso_soup.jpg'),
(34, 5, 'Udon Noodles', 'udon_noodles.jpg'),
(35, 5, 'Matcha Ice Cream', 'matcha_ice_cream.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `item_id`, `title`, `image`, `description`) VALUES
(18, 1, 'Creamy Spaghetti Carbonara with Pancetta', 'img/recipe/recipe-image-legacy-id-1001491_11-2e0fa5c.jpg', '  <h2>Ingredients:</h2>\r\n  <ul>\r\n    <li>350g spaghetti</li>\r\n    <li>150g pancetta or guanciale, diced (you can also use bacon if unavailable)</li>\r\n    <li>3 large eggs</li>\r\n    <li>75g grated Parmesan cheese</li>\r\n    <li>50g grated Pecorino Romano cheese</li>\r\n    <li>Freshly ground black pepper</li>\r\n    <li>Salt to taste</li>\r\n    <li>Optional: Chopped parsley for garnish</li>\r\n  </ul>\r\n\r\n  <h2>Instructions:</h2>\r\n  <ol>\r\n    <li>Bring a large pot of salted water to a boil. Add the spaghetti and cook according to the package instructions until al dente.</li>\r\n    <li>While the pasta is cooking, heat a large skillet over medium heat. Add the diced pancetta or guanciale and cook until crispy and golden brown, stirring occasionally. Remove from heat and set aside.</li>\r\n    <li>In a mixing bowl, whisk together the eggs, grated Parmesan cheese, and grated Pecorino Romano cheese until well combined.</li>\r\n    <li>Once the spaghetti is cooked, reserve about 1/2 cup of pasta water, then drain the spaghetti and return it to the pot.</li>\r\n    <li>Immediately add the cooked pancetta or guanciale to the pot with the spaghetti and toss to combine.</li>\r\n    <li>Pour the egg and cheese mixture over the hot spaghetti and quickly toss everything together until the pasta is evenly coated. The heat from the pasta will cook the eggs and melt the cheese, creating a creamy sauce. If the sauce seems too thick, gradually add a bit of the reserved pasta water until desired consistency is reached.</li>\r\n    <li>Season the spaghetti carbonara with freshly ground black pepper to taste. Be generous with the black pepper—it adds a wonderful flavor to the dish.</li>\r\n    <li>Serve the spaghetti carbonara immediately, garnished with chopped parsley if desired. Enjoy!</li>\r\n  </ol>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'user1', 'password1', 'user1@example.com', '2024-03-20 01:18:41'),
(2, 'user2', 'password2', 'user2@example.com', '2024-03-20 01:18:41'),
(3, 'user3', 'password3', 'user3@example.com', '2024-03-20 01:18:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cat` (`cat_id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
