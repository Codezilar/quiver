-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 01:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiver`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalogue`
--

CREATE TABLE `catalogue` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(225) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalogue`
--

INSERT INTO `catalogue` (`id`, `title`, `body`, `thumbnail`, `category_id`) VALUES
(3, 'Uncategorized', 'Uncategorized', '1700121550background2.jpg', 4),
(4, 'Invincible', 'Invincible', '1700253070invin.jpg', 3),
(5, 'Seven Deadly Sins', 'nml,n', '1700484848seven.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(2, 'Action', 'Action movies'),
(3, 'Cartoons', 'Cartoons categories'),
(6, 'Horro', 'Horro movies'),
(7, 'Adventure', 'Adventure movie'),
(8, 'Drama', 'Drama movies'),
(9, 'Comedy', 'Comedy'),
(10, 'Romance', 'Romance');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `email`, `body`, `post_id`, `time`) VALUES
(5, 'zoeehimen@gmail.com', 'Amazing!!! Dope ASF', 18, '2023-11-24 19:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(300) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(225) NOT NULL,
  `rate` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `vq` varchar(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `trending` varchar(10) NOT NULL,
  `age` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `link`, `body`, `thumbnail`, `rate`, `time`, `vq`, `category_id`, `trending`, `age`) VALUES
(7, 'Vivo', 'ghjkkj', 'Vivo is about a lost wa ya muto wye tashi and bayin da za are yi she. So bi da in bah haka ba za a amu matsala', '1700125094vivo.jpg', '9', '80', 'HD', 2, '1', '13'),
(8, 'Fast and furious', 'cvbnm', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod esse dolore rem eaque in nemo! Vero, at ab. Laudantium a distinctio, quis in inventore facere qui aspernatur eum fuga et.\r\n', '1700127500fast.jpg', '1', '23', 'HD', 2, '1', '12'),
(9, 'Witcher', 'cvbnm', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod esse dolore rem eaque in nemo! Vero, at ab. Laudantium a distinctio, quis in inventore facere qui aspernatur eum fuga et.\r\n', '1700127813witch.jpg', '1', '23', 'HD', 7, '1', '12'),
(10, 'Green Night', 'dfghjit', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima perferendis earum molestias vero, unde tempora autem excepturi aspernatur, quod fugiat facilis cum recusandae ex corporis, voluptates pariatur eos labore necessitatibus.', '1700158042green.jpg', '1', '23', 'HD', 7, '1', '13'),
(11, 'Amazon', 'ghjm', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima perferendis earum molestias vero, unde tempora autem excepturi aspernatur, quod fugiat facilis cum recusandae ex corporis, voluptates pariatur eos labore necessitatibus.\r\n', '1700158211amazon.jpg', '9', '90', 'HD', 3, '1', '13'),
(12, 'Haymake', 'fgb2', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima perferendis earum molestias vero, unde tempora autem excepturi aspernatur, quod fugiat facilis cum recusandae ex corporis, voluptates pariatur eos labore necessitatibus.\r\n', '1700159341hay.jpg', '8', '70', 'HD', 6, '0', '18'),
(13, 'Perfect Match', 'gf67uygh2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium dolores inventore soluta nostrum ut excepturi error, perferendis quae itaque qui architecto ex minima tenetur corrupti laboriosam? Cum corporis cupiditate ipsum?\r\n', '1700161058perfect.jpg', '8', '79', 'HD', 10, '0', '16'),
(14, 'Still Hunter', 'ghvbj', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis unde optio dolores ratione modi inventore in sit tempora perferendis eveniet, dolorum facere corporis, numquam maiores earum architecto impedit beatae ab.\r\n', '1700161260still.jpg', '9', '78', 'HD', 6, '1', '16'),
(15, 'Habitat', 'Habitat', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ad ducimus molestiae ratione totam eius placeat error, aut excepturi. Velit consequuntur asperiores cumque earum magni, dolor fuga iusto amet dolorum?\r\n', '1700161425habiyt.jpg', '7', '65', 'HD', 10, '0', '16'),
(16, 'Black Panter', 'cfvgj', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur in quos magni ex, harum nobis qui quam dolore inventore sed sapiente aut doloremque quaerat iusto quo mollitia nulla voluptates. Consectetur.\r\n', '1700161844background.jpg', '9', '65', 'HD', 8, '1', '13'),
(17, 'Insite', 'cfvgj', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consectetur in quos magni ex, harum nobis qui quam dolore inventore sed sapiente aut doloremque quaerat iusto quo mollitia nulla voluptates. Consectetur.\r\n', '1700162147insit.jpg', '9', '65', 'HD', 8, '1', '13'),
(18, 'Dragon Ballls', 'https://www.youtube.com/watch?v=Xty2gi5cMa8', 'hvchvhjvykugfjhvhjvjg jvbbfh fhjb dckjb dib fyuf fy fhgf fhf chc cvhcv chb  cvhcvcv  nv  n  vnv  ', '1700578581Dragon-Ball.jpg', '9', '75', 'HD', 3, '1', '13');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `link` varchar(300) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(225) NOT NULL,
  `rate` varchar(225) NOT NULL,
  `time` varchar(225) NOT NULL,
  `vq` varchar(225) NOT NULL,
  `age` varchar(225) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `title`, `link`, `body`, `thumbnail`, `rate`, `time`, `vq`, `age`, `category_id`) VALUES
(3, 'Invincible Episode 1', 'kufyjbhnb', 'ytdfyfgugbjub jvgj', '1700482611invin.jpg', '8', '39', 'HD', '13', 4),
(4, 'Invincible Episode 2', 'dtghgnbgrhghn', 'hjljn', '1700482989invin.jpg', '9', '56', 'HD', '13', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(3, 'QUIVEROFFICIAL', '$2y$10$Cbu9mcNdWxe5inpYd5cgseRaNpc8hEzczNjVebNDFHnW3hr3tPLwC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogue`
--
ALTER TABLE `catalogue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`,`category_id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
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
-- AUTO_INCREMENT for table `catalogue`
--
ALTER TABLE `catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
