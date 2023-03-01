-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 08:53 PM
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
-- Database: `db_work1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id` int(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descrip` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `sub_title`, `title`, `descrip`, `image`, `status`) VALUES
(10, 'INTRODUCTION', 'ABOUT ME', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, sed repudiandae odit deserunt, quas quibusdam necessitatibus nesciunt eligendi esse sit non reprehenderit quisquam asperiores maxime blanditiis culpa vitae velit. Numquam!', '10.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_contents`
--

CREATE TABLE `tbl_banner_contents` (
  `id` int(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descrip` text NOT NULL,
  `btn_text` varchar(100) NOT NULL,
  `btn_url` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_banner_contents`
--

INSERT INTO `tbl_banner_contents` (`id`, `sub_title`, `title`, `descrip`, `btn_text`, `btn_url`, `status`) VALUES
(8, 'HELLO!', 'I AM WILL SMITH', 'I&#039;m Will Smith, professional web developer with long time experience in this field​.', 'SEE PORTFOLIOS', 'https://www.facebook.com/hzshohidul', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_image`
--

CREATE TABLE `tbl_banner_image` (
  `id` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_banner_image`
--

INSERT INTO `tbl_banner_image` (`id`, `image`, `status`) VALUES
(13, '13.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `image`, `status`) VALUES
(1, '1.png', 0),
(2, '2.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copyright`
--

CREATE TABLE `tbl_copyright` (
  `id` int(11) NOT NULL,
  `content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_copyright`
--

INSERT INTO `tbl_copyright` (`id`, `content`) VALUES
(3, 'Copyright © Website | All Rights Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_counting`
--

CREATE TABLE `tbl_counting` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `count` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_counting`
--

INSERT INTO `tbl_counting` (`id`, `icon`, `count`, `title`, `status`) VALUES
(1, 'fa-send', 70, 'Sed ex aut enim sunt', 1),
(2, 'fa-thumbs-up', 233, 'Proident fugiat qu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_education`
--

CREATE TABLE `tbl_education` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_education`
--

INSERT INTO `tbl_education` (`id`, `year`, `title`, `percentage`, `status`) VALUES
(3, 1994, 'Rerum saepe sapiente', 47, 0),
(4, 2000, 'Facere laudantium p', 83, 1),
(5, 2018, 'Officia voluptatem u', 53, 1),
(6, 2014, 'Ut in sit aut dolor', 83, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_education_title`
--

CREATE TABLE `tbl_education_title` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_education_title`
--

INSERT INTO `tbl_education_title` (`id`, `title`) VALUES
(1, 'EDUCATION');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_information`
--

CREATE TABLE `tbl_information` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_information`
--

INSERT INTO `tbl_information` (`id`, `title`, `address`, `phone`, `email`, `status`) VALUES
(1, 'Quis optio eiusmod ', 'Debitis ex eligendi ', '35', 'viber@mailinator.com', 1),
(2, 'Lorem quis aperiam v', 'Non voluptatibus non', '32', 'lodamot@mailinator.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_information_title`
--

CREATE TABLE `tbl_information_title` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descrip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_information_title`
--

INSERT INTO `tbl_information_title` (`id`, `sub_title`, `title`, `descrip`) VALUES
(1, 'Autem debitis et nec', 'Alias incidunt nihi', 'Nemo voluptate exerc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logos`
--

CREATE TABLE `tbl_logos` (
  `id` int(11) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_logos`
--

INSERT INTO `tbl_logos` (`id`, `logo`, `status`) VALUES
(16, '16.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `name`, `email`, `message`, `status`) VALUES
(1, 'Myra Barlow', 'vyzajanip@mailinator.com', 'Voluptatem eos dolor', 1),
(2, 'Gay Dodson', 'mowi@mailinator.com', 'Autem consequuntur o', 1),
(4, 'Lawrence Eaton', 'jymama@mailinator.com', 'A enim et vero quam ', 1),
(5, 'Amos Blake', 'fihej@mailinator.com', 'Neque maxime maxime Neque Maxime Maxime Neque Maxime Maxime Neque Maxime Maxime Neque Maxime Maxime Neque Maxime Maxime Neque Maxime Maxime Neque Maxime Maxime Neque Maxime Maxime Neque Maxime Maxime Neque Maxime Maxime Neque Maxime Maxime Neque Maxime Ma', 1),
(6, 'Amelia Walker', 'xuqugaz@mailinator.com', 'Excepteur similique ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_portfolio`
--

CREATE TABLE `tbl_portfolio` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descrip` varchar(500) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_portfolio`
--

INSERT INTO `tbl_portfolio` (`id`, `category`, `title`, `descrip`, `image`, `user_id`, `status`) VALUES
(1, 'provi', 'Eum harum dolores qu', '<p style=\"margin-bottom: 10px; line-height: 2;\">Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s withs the release of Letraset sheets containing Lorem Ipsum passags, and more recently with desktop publishing software like A', '1.jpeg', 6, 0),
(2, 'Velit in incididunt ', 'Nam ullamco magni au', '<div style=\"line-height: 19px;\"><p style=\"margin-bottom: 10px; line-height: 2;\">Express dolor sit amet, consectetur adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s withs the release of Letraset sheets containing Lorem Ipsum passags, and more recently with de', '2.jpg', 6, 0),
(4, 'Design', 'Quos ratione quis nosd', '<span style=\"font-size: medium;\"><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">Cras elementum pretiumi</font><span style=\"background-color: rgb(249, 249, 249);\"> Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s withs the release of Letraset sheets containing Lorem Ipsum passags, and more recently with de</span></span><span style=\"font-size: medium; background-color: rgb(249, 249, 249);\">Cr', '4.jpeg', 7, 0),
(5, 'Et praesentium autem', 'Omnis in provident ', '<p style=\"margin-bottom: 10px; line-height: 2;\"><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">consectetur </font>adipiscing elit. Cras sollicitudin, tellus vitae condimem egestliberos dolor auctor tellus, eu consectetur neque elit quis nunc. Cras elementum pretiumi Nullam justo efficitur, trist ligula pellentesque ipsum. Quisque thsr augue ipsum, vehicula tellus maximus. Was popularised in the 1960s withs the release of Letraset sheets containing Lorem Ipsum passags, and more', '5.jpeg', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_portfolio_title`
--

CREATE TABLE `tbl_portfolio_title` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_portfolio_title`
--

INSERT INTO `tbl_portfolio_title` (`id`, `sub_title`, `title`) VALUES
(1, 'PORTFOLIO SHOWCASE', 'MY RECENT BEST WORKS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `class`, `link`, `status`) VALUES
(2, 'fa-facebook', 'https://facebook.com/hzshohidul', 1),
(6, 'fa-twitter-square', 'https://twotter.com/hzshohidul', 1),
(7, 'fa-twitter', 'https://twotter.com/hzshohidul', 1),
(8, 'fa-instagram', 'https://instagram.com/hzshohidul', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `tag_name` varchar(100) NOT NULL,
  `letter` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`id`, `image`, `name`, `tag_name`, `letter`, `status`) VALUES
(2, '2.png', 'Haley Case', 'Ivory Gregory', 'Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.Vel elit, a sint, si.', 1),
(3, '3.jpeg', 'Roanna Vang', 'Signe Bartlett', 'At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.', 0),
(4, '4.jpg', 'Wing Fletcher', 'Geoffrey Buckner', 'Cupiditate labore co.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.At itaque repudianda.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial_title`
--

CREATE TABLE `tbl_testimonial_title` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_testimonial_title`
--

INSERT INTO `tbl_testimonial_title` (`id`, `sub_title`, `title`) VALUES
(1, 'TESTIMONIAL', 'HAPPY CUSTOMER QUOTES');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `image`) VALUES
(6, 'Admin Horm', 'admin@gmail.com', '$2y$10$mgcgkZU/3Em/Jc9MOAf3Z.khnBgpeGHA6jCKsR/EbU6aGTOzvLbrW', 'id_6_917516555869539301.png'),
(7, 'Editor Finch', 'editor@gmail.com', '$2y$10$2alJFyFKsZQHBW5luEfJn.JtEllSB6L9Gs6ctRKP7zQFmpQExs3cy', '7.jpeg'),
(8, 'Clinton Reilly', 'twitter@gmail.com', '$2y$10$ZxV2g486tNiurCUgb9YCd.WxP4dhmZNrz3kBQo0W/lue5lfEbZ2Hu', 'id_8_643468214760627842.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work`
--

CREATE TABLE `tbl_work` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descrip` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_work`
--

INSERT INTO `tbl_work` (`id`, `icon`, `title`, `descrip`, `status`) VALUES
(1, 'fa-youtube-play', 'Similique eos dolori', 'Molestias ut sapientMolestias ut sapientMolestias ut sapientMolestias ut sapientMolestias ut sapient', 0),
(5, 'fa-binoculars', 'Dicta cum reiciendis', 'Ullam fuga Elit ea', 1),
(6, 'fa-address-book', 'Iure ab tempora volu', 'Harum ex harum culpa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_title`
--

CREATE TABLE `tbl_work_title` (
  `id` int(11) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_work_title`
--

INSERT INTO `tbl_work_title` (`id`, `sub_title`, `title`, `status`) VALUES
(1, 'WHAT WE DO', 'SERVICES AND SOLUTIONS', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner_contents`
--
ALTER TABLE `tbl_banner_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner_image`
--
ALTER TABLE `tbl_banner_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_counting`
--
ALTER TABLE `tbl_counting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_education_title`
--
ALTER TABLE `tbl_education_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_information`
--
ALTER TABLE `tbl_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_information_title`
--
ALTER TABLE `tbl_information_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logos`
--
ALTER TABLE `tbl_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_portfolio`
--
ALTER TABLE `tbl_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_portfolio_title`
--
ALTER TABLE `tbl_portfolio_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimonial_title`
--
ALTER TABLE `tbl_testimonial_title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_work`
--
ALTER TABLE `tbl_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_work_title`
--
ALTER TABLE `tbl_work_title`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_banner_contents`
--
ALTER TABLE `tbl_banner_contents`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_banner_image`
--
ALTER TABLE `tbl_banner_image`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_copyright`
--
ALTER TABLE `tbl_copyright`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_counting`
--
ALTER TABLE `tbl_counting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_education`
--
ALTER TABLE `tbl_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_education_title`
--
ALTER TABLE `tbl_education_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_information`
--
ALTER TABLE `tbl_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_information_title`
--
ALTER TABLE `tbl_information_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_logos`
--
ALTER TABLE `tbl_logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_portfolio`
--
ALTER TABLE `tbl_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_portfolio_title`
--
ALTER TABLE `tbl_portfolio_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_testimonial_title`
--
ALTER TABLE `tbl_testimonial_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_work`
--
ALTER TABLE `tbl_work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_work_title`
--
ALTER TABLE `tbl_work_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
