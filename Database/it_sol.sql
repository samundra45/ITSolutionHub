-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 09:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_sol`
--

-- --------------------------------------------------------

--
-- Table structure for table `hire_user`
--

CREATE TABLE `hire_user` (
  `h_id` int(10) NOT NULL,
  `e_email` varchar(50) NOT NULL,
  `h_email` varchar(50) NOT NULL,
  `demand` int(50) NOT NULL,
  `notes` varchar(100) NOT NULL,
  `expert_accept` varchar(2) NOT NULL,
  `customer_payment` varchar(2) NOT NULL,
  `bkash_no` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` int(50) NOT NULL,
  `prblm_name` varchar(50) NOT NULL,
  `details` varchar(200) NOT NULL,
  `prblm_type` varchar(50) NOT NULL,
  `dev_type` varchar(50) NOT NULL,
  `dev_model` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `street_number` int(15) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `post_code` int(15) NOT NULL,
  `max_budget` int(10) NOT NULL,
  `negotiable` varchar(50) NOT NULL,
  `j_status` varchar(2) NOT NULL,
  `assigned_email` varchar(50) NOT NULL,
  `customer_payment` int(50) NOT NULL,
  `bkash_no` int(15) NOT NULL,
  `cp_date` int(11) NOT NULL DEFAULT current_timestamp(),
  `job_accept` int(50) NOT NULL,
  `job_done` int(50) NOT NULL,
  `ja_date` varchar(15) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `email`, `phone_no`, `prblm_name`, `details`, `prblm_type`, `dev_type`, `dev_model`, `street`, `street_number`, `city_name`, `post_code`, `max_budget`, `negotiable`, `j_status`, `assigned_email`, `customer_payment`, `bkash_no`, `cp_date`, `job_accept`, `job_done`, `ja_date`) VALUES
(1, 'email@gmail.com', 880, 'Graphics Card', 'Graphics Card Destroyed', 'Hardware', 'Laptop', 'Acer Aspire 5', 'Gollamari', 123, 'Khulna', 9208, 1500, '1', '', 'Expert@gmail.com', 2500, 1308764186, 2147483647, 1, 1, '2023-10-09 02:2'),
(4, 'email@gmail.com', 880, 'Front End Development', 'Front End Development for a Web Project', 'Software', 'Laptop', '000', 'Uttara', 16, 'Dhaka', 1000, 50000, '1', '', 'expert@gmail.com', 60000, 1308764186, 2147483647, 0, 1, '2023-10-09 01:4'),
(5, 'email@gmail.com', 880, 'Display Problem', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Quia, ipsam magni nam eaque officia cumque?', 'Hardware', 'Desktop', 'Samsung 512H', 'Palbari Road', 13, 'Jessore', 10003, 5000, '1', '', 'expert@gmail.com', 7500, 1308764186, 2147483647, 1, 1, '2023-10-13 12:5'),
(6, 'email@gmail.com', 880, 'RAM problem', 'hjajhgacjhgdjha jgadg fashja', 'Hardware', 'Desktop', '12416546', 'Shaheb Bazar', 12, 'Rajshahi', 6600, 3000, '0', '', 'expert@gmail.com', 3000, 1308764186, 2147483647, 0, 0, '2023-10-09 14:4'),
(7, 'email1@gmail.com', 880, 'RAM problem', 'RAM destroyed', 'Hardware', 'Desktop', 'HP0123', 'Gollamari', 12, 'Khulna', 9208, 1500, '1', '', '', 0, 0, 2147483647, 0, 0, '2023-10-13 12:4');

-- --------------------------------------------------------

--
-- Table structure for table `job_bid`
--

CREATE TABLE `job_bid` (
  `b_id` int(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `note` varchar(100) NOT NULL,
  `job_id` int(50) NOT NULL,
  `bidder_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_bid`
--

INSERT INTO `job_bid` (`b_id`, `amount`, `note`, `job_id`, `bidder_email`) VALUES
(8, 3000, 'I can solve this problem.', 1, 'expert@gmail.com'),
(9, 60000, 'I am interested', 4, 'expert@gmail.com'),
(10, 2500, 'I can fix this', 1, 'Expert@gmail.com'),
(11, 60000, 'I am interested', 4, 'expert@gmail.com'),
(14, 7500, 'hjhkjnkxznkj', 5, 'expert@gmail.com'),
(15, 7500, 'hjhkjnkxznkj', 5, 'expert@gmail.com'),
(16, 3000, 'I can fix this', 6, 'expert@gmail.com'),
(17, 3000, 'I can fix this', 6, 'expert@gmail.com'),
(18, 2500, 'I can solve this problem.', 7, 'expert@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pro_img`
--

CREATE TABLE `pro_img` (
  `pi_id` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_img`
--

INSERT INTO `pro_img` (`pi_id`, `email`, `url`) VALUES
(NULL, 'email@gmail.com', 'img/avatar.jpeg'),
(NULL, 'expert@gmail.com', 'img/expert@gmail.com_2023.09.17_10.31.21pm.jpg'),
(NULL, 'email1@gmail.com', 'img/avatar.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(50) DEFAULT current_timestamp(),
  `earning` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `earning`) VALUES
(4, 'Samundra Dhakal', 'email@gmail.com', 'k\nnrjm_++,', '1', 0),
(5, 'Expert', 'expert@gmail.com', 'k\nnrjm_++,', '2', 23750),
(8, 'Tanvir Emon', 'email1@gmail.com', 'k\nnrjm_++,', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE `users_admin` (
  `email` varchar(15) NOT NULL DEFAULT 'admin@gmail.com',
  `password` varchar(15) NOT NULL DEFAULT 'password001'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`email`, `password`) VALUES
('admin@gmail.com', 'password001');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `u_id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tag_line` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `about` varchar(200) NOT NULL,
  `web` varchar(50) NOT NULL,
  `fb` varchar(50) NOT NULL,
  `twt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`u_id`, `email`, `tag_line`, `address`, `about`, `web`, `fb`, `twt`) VALUES
(1, 'email@gmail.com', 'Your tag line', 'Where are you from?', 'Write about yourself', 'https://google.com/', 'https://facebook.com/', 'https://twitter.com/'),
(2, 'expert@gmail.com', 'Software Engineer', 'Nepal', 'Lorem ipsum dolor sit amet consectetur adipisicing elit Quia, ipsam magni nam eaque officia cumque?', 'https://google.com/', 'https://facebook.com/', 'https://twitter.com/'),
(3, 'email1@gmail.com', 'Your tag line', 'Where are you from?', 'Write about yourself', 'https://google.com/', 'https://facebook.com/', 'https://twitter.com/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hire_user`
--
ALTER TABLE `hire_user`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_bid`
--
ALTER TABLE `job_bid`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hire_user`
--
ALTER TABLE `hire_user`
  MODIFY `h_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_bid`
--
ALTER TABLE `job_bid`
  MODIFY `b_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `u_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
