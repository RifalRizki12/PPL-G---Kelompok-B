-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 10:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `framework_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'muhammad yusuf azizi', 'admin@gmail.com', '321admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Petani'),
(2, 'Buruh'),
(3, 'Pramusaji'),
(4, 'Penjaga Toko'),
(5, 'Akuntan');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `job_name` varchar(100) NOT NULL,
  `job_desc` text NOT NULL,
  `job_max` int(11) NOT NULL,
  `job_user` int(11) NOT NULL,
  `job_image` varchar(100) NOT NULL,
  `job_req` varchar(250) NOT NULL,
  `job_salary` int(11) NOT NULL,
  `job_status` tinyint(1) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `category_id`, `job_name`, `job_desc`, `job_max`, `job_user`, `job_image`, `job_req`, `job_salary`, `job_status`, `owner_id`, `date_created`) VALUES
(12, 1, 'Petani padi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam vulputate dignissim suspendisse in est ante in nibh. Ligula ullamcorper malesuada proin libero nunc consequat. Sapien faucibus et molestie ac feugiat sed. Amet nisl purus in mollis nunc sed. Eu volutpat odio facilisis mauris sit amet. Quis auctor elit sed vulputate mi sit amet mauris commodo. Consequat interdum varius sit amet mattis vulputate enim nulla. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut. Praesent tristique magna sit amet purus. Iaculis urna id volutpat lacus. Nulla posuere sollicitudin aliquam ultrices sagittis orci. Aliquet lectus proin nibh nisl condimentum id venenatis a condimentum. Est pellentesque elit ullamcorper dignissim. Eu nisl nunc mi ipsum. Nunc sed id semper risus in hendrerit. Egestas purus viverra accumsan in nisl nisi. Lacus vel facilisis volutpat est velit egestas dui. Nisl nunc mi ipsum faucibus.', 5, 0, 'lowongan1606268200.jpg', 'umur diatas 20 tahun', 1000000, 1, 6, '2020-11-25 01:36:40'),
(13, 3, 'Pramusaji rumah makan padang', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam vulputate dignissim suspendisse in est ante in nibh. Ligula ullamcorper malesuada proin libero nunc consequat. Sapien faucibus et molestie ac feugiat sed. Amet nisl purus in mollis nunc sed. Eu volutpat odio facilisis mauris sit amet. Quis auctor elit sed vulputate mi sit amet mauris commodo. Consequat interdum varius sit amet mattis vulputate enim nulla. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut. Praesent tristique magna sit amet purus. Iaculis urna id volutpat lacus. Nulla posuere sollicitudin aliquam ultrices sagittis orci. Aliquet lectus proin nibh nisl condimentum id venenatis a condimentum. Est pellentesque elit ullamcorper dignissim. Eu nisl nunc mi ipsum. Nunc sed id semper risus in hendrerit. Egestas purus viverra accumsan in nisl nisi. Lacus vel facilisis volutpat est velit egestas dui. Nisl nunc mi ipsum faucibus.', 7, 0, 'lowongan1606268231.jpg', 'umur diatas 17 tahun', 700000, 1, 6, '2020-11-25 01:37:11'),
(14, 2, 'Buruh pabrik sirup', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam vulputate dignissim suspendisse in est ante in nibh. Ligula ullamcorper malesuada proin libero nunc consequat. Sapien faucibus et molestie ac feugiat sed. Amet nisl purus in mollis nunc sed. Eu volutpat odio facilisis mauris sit amet. Quis auctor elit sed vulputate mi sit amet mauris commodo. Consequat interdum varius sit amet mattis vulputate enim nulla. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut. Praesent tristique magna sit amet purus. Iaculis urna id volutpat lacus. Nulla posuere sollicitudin aliquam ultrices sagittis orci. Aliquet lectus proin nibh nisl condimentum id venenatis a condimentum. Est pellentesque elit ullamcorper dignissim. Eu nisl nunc mi ipsum. Nunc sed id semper risus in hendrerit. Egestas purus viverra accumsan in nisl nisi. Lacus vel facilisis volutpat est velit egestas dui. Nisl nunc mi ipsum faucibus.', 6, 0, 'lowongan1606268274.jpg', 'umur diatas 18 tahun', 1000000, 1, 6, '2020-11-25 01:37:54'),
(15, 1, 'Petani jagung', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam vulputate dignissim suspendisse in est ante in nibh. Ligula ullamcorper malesuada proin libero nunc consequat. Sapien faucibus et molestie ac feugiat sed. Amet nisl purus in mollis nunc sed. Eu volutpat odio facilisis mauris sit amet. Quis auctor elit sed vulputate mi sit amet mauris commodo. Consequat interdum varius sit amet mattis vulputate enim nulla. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut. Praesent tristique magna sit amet purus. Iaculis urna id volutpat lacus. Nulla posuere sollicitudin aliquam ultrices sagittis orci. Aliquet lectus proin nibh nisl condimentum id venenatis a condimentum. Est pellentesque elit ullamcorper dignissim. Eu nisl nunc mi ipsum. Nunc sed id semper risus in hendrerit. Egestas purus viverra accumsan in nisl nisi. Lacus vel facilisis volutpat est velit egestas dui. Nisl nunc mi ipsum faucibus.', 10, 0, 'lowongan1606268393.jpg', 'umur diatas 18 tahun', 1000000, 1, 5, '2020-11-25 01:39:53'),
(16, 5, 'Mencatat hasil panen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quam vulputate dignissim suspendisse in est ante in nibh. Ligula ullamcorper malesuada proin libero nunc consequat. Sapien faucibus et molestie ac feugiat sed. Amet nisl purus in mollis nunc sed. Eu volutpat odio facilisis mauris sit amet. Quis auctor elit sed vulputate mi sit amet mauris commodo. Consequat interdum varius sit amet mattis vulputate enim nulla. Egestas quis ipsum suspendisse ultrices gravida dictum fusce ut. Praesent tristique magna sit amet purus. Iaculis urna id volutpat lacus. Nulla posuere sollicitudin aliquam ultrices sagittis orci. Aliquet lectus proin nibh nisl condimentum id venenatis a condimentum. Est pellentesque elit ullamcorper dignissim. Eu nisl nunc mi ipsum. Nunc sed id semper risus in hendrerit. Egestas purus viverra accumsan in nisl nisi. Lacus vel facilisis volutpat est velit egestas dui. Nisl nunc mi ipsum faucibus.', 20, 0, 'lowongan1606268426.jpg', 's1 akuntansi', 5000000, 1, 5, '2020-11-25 01:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `owner_id` int(10) NOT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `owner_category` varchar(255) DEFAULT NULL,
  `owner_email` varchar(255) NOT NULL,
  `owner_password` varchar(150) NOT NULL,
  `owner_resume` varchar(255) DEFAULT NULL,
  `owner_ver` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`owner_id`, `owner_name`, `owner_category`, `owner_email`, `owner_password`, `owner_resume`, `owner_ver`) VALUES
(4, 'haruno sakura', 'buruh', 'sakura@gmail.com', '321sakura', 'resume_pemilik1606185713.jpg', 0),
(5, 'Uchiha Sasuke', 'Petani', 'sasuke@gmail.com', '321sasuke', 'resume_pemilik1606186592.jpg', 1),
(6, 'naruto uzumaki', 'hokage', 'naruto@gmail.com', '321naruto', 'resume_pemilik1606268028.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_code` varchar(255) DEFAULT NULL,
  `code_date_created` timestamp(6) NULL DEFAULT NULL,
  `payment_date_created` timestamp(6) NULL DEFAULT NULL,
  `payment_description` varchar(255) DEFAULT NULL,
  `payment_from` varchar(255) DEFAULT NULL,
  `payment_to` varchar(255) DEFAULT NULL,
  `payment_archive` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `no_rek` varchar(15) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `user_ver` tinyint(1) NOT NULL,
  `user_jobver` tinyint(1) NOT NULL,
  `job_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `phone`, `category`, `picture`, `resume`, `no_rek`, `email`, `password`, `user_ver`, `user_jobver`, `job_id`) VALUES
(1, 'Hyuga Hinata', 'Jl. Pelabuhan Tanjung Priok No.170, Bakalankrajan, Kec. Sukun, Kota Malang, Jawa Timur 65148\r\n', '08827294183', 'Hokage', 'foto1606183130.jpg', 'resume1606183130.jpg', '7531257812', 'hinata@gmail.com', '321hinata', 1, 0, 14),
(2, 'uzumaki boruto', 'asdvsvbsdbsd', '089999999999', 'akuntan', 'foto1606282945.jpg', 'resume1606282945.jpg', '7865248465', 'boruto@gmail.com', '321boruto', 0, 0, 16),
(3, 'sarada uchiha', 'svsdbdfsbb', '08827294182', 'buruh', 'foto1606282968.jpg', 'resume1606282968.jpg', '3215874265', 'sarada@gmail.com', '321sarada', 0, 0, 16),
(4, 'pencari kerja 1', 'jalan sesama 1', '08827294182', 'buruh', 'foto1606354901.jpg', 'resume1606354901.jpg', '4568156284', 'pk1@gmail.com', '321pk1', 1, 0, 12),
(5, 'pencari kerja 2', 'jalan sesama 2', '089999999999', 'akuntan', 'foto1606354951.jpg', 'resume1606354951.jpg', '6978542615', 'pk2@gmail.com', '321pk2', 1, 0, 15),
(6, 'pencari kerja 3', 'jalan sesama 3', '089999999999', 'akuntan', 'foto1606355119.jpg', 'resume1606355119.jpg', '3698756154', 'pk3@gmail.com', '321pk3', 1, 0, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `worker_id` (`owner_id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `owner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`owner_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
