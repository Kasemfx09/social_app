-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 06:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `social_users`
--

CREATE TABLE `social_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `education` varchar(150) DEFAULT NULL,
  `occupation` varchar(150) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `c_pass` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `about_me` text DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `agree` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `create_at` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `update_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_users`
--

INSERT INTO `social_users` (`id`, `name`, `uname`, `education`, `occupation`, `age`, `email`, `cell`, `password`, `c_pass`, `gender`, `about_me`, `photo`, `agree`, `status`, `trash`, `create_at`, `update_at`) VALUES
(37, 'Md. Abul Kasem', 'Manik', 'Masters', 'PHP devs', 25, 'kasem@gmail.com', '018565146625', '$2y$10$ECghLXPxe5.wg', '', 'Male', ' Hi', '1636910397_866858234_photo.jpg', 'agree', 1, 0, '2021-11-09 20:35:50', '2021-11-15 06:11:57'),
(38, 'Jamie', 'Jam', 'Masters', 'Bsc', 23, 'jam@gmail.com', '018652558525', '$2y$10$27LOYPvV/Sdh/', '', 'Female', ' Hi!', '1636911127_308685544_woman-crop.jpg', 'agree', 1, 0, '2021-11-09 21:08:12', '2021-11-14 06:11:10'),
(42, 'labib', 'Faizan', 'KG-2', 'Student', 8, 'labib21@gmail.com', '01853546985', '$2y$10$MaZ5QgpiA2Ara', '', 'Male', ' Hi I am Labib', '1636909720_846885627_photo-4.jpg', 'agree', 1, 0, '2021-11-13 21:48:39', '2021-11-14 02:11:48'),
(43, 'Abdullah All Anas', 'Anas', '', '', 5, 'kasem2@gmail.com', '01850351598', '$2y$10$EnZloSc6SMItp', '', '', ' ', '1636913280_1850525918_boy5.jpg', 'agree', 1, 0, '2021-11-15 00:07:03', '2021-11-14 07:11:52'),
(44, 'Afreen ', 'Mona', NULL, NULL, NULL, 'mona@gmail.com', '01850453343', '$2y$10$V6mzXq5Ut32/W', '', 'Female', NULL, '1636914186_647125011_girls6.jpg', 'agree', 1, 0, '2021-11-15 00:21:46', NULL),
(45, 'Maruf Ahmed', 'Maruf', NULL, NULL, NULL, 'Maruf@gmail.com', '019856656558', '$2y$10$sZjdntS.TaX0j', '', 'Male', NULL, '1636914389_895003596_boy6.jpg', 'agree', 1, 0, '2021-11-15 00:25:25', NULL),
(46, 'Manik', 'Md. Kasem', NULL, NULL, NULL, 'akm@gmail.com', '0185656565565', '$2y$10$IZqtKigWficJ/', '', 'Male', NULL, NULL, 'agree', 1, 0, '2021-11-17 21:45:28', NULL),
(47, 'Nisa', 'Sumaiya', NULL, NULL, NULL, 'nisa@gmail.com', '015656565656', '$2y$10$eALLJDPS6QzXI', '', 'Female', NULL, NULL, 'agree', 1, 0, '2021-11-18 23:16:57', NULL),
(48, 'mon', 'mona', 'Masters', 'ghnghf', 25, 'mon@gmail.com', '0185201212545', '$2y$10$yMYFl6lReHF/G', '', 'Male', ' ', NULL, 'agree', 1, 0, '2021-11-18 23:24:18', '2021-11-18 06:11:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `social_users`
--
ALTER TABLE `social_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `social_users`
--
ALTER TABLE `social_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
