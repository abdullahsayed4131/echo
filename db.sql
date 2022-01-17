-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 01:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `echo`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(11) NOT NULL,
  `booking_unq_id` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `selected_date` varchar(100) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `booking_unq_id`, `name`, `email`, `mobile`, `selected_date`, `event_id`, `created_at`) VALUES
(36, 'pd605kbp', 'helloworld', 'helloworld@gmail.com', '9640734131', '2022-01-22 23:39:07', 5, '2022-01-17 12:27:45'),
(37, 'CwhivszH', 'hiimhere', 'hiimhere@gmail.com', '9912564463', '2022-01-25 23:39:07', 3, '2022-01-17 12:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Website Designing', '2022-01-15 18:38:05', NULL, NULL),
(2, 'Website Development', '2022-01-15 18:38:05', NULL, NULL),
(3, 'Android Development', '2022-01-15 18:38:05', NULL, NULL),
(4, 'Ios Development', '2022-01-15 18:38:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `technology_id` int(11) DEFAULT NULL,
  `event_date` timestamp NULL DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `location_id`, `category_id`, `technology_id`, `event_date`, `price`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Responsive design with bootstrap', 'Get started with Bootstrap, the world’s most popular framework for building responsive, mobile-first sites, with BootstrapCDN and a template starter page.', 1, 1, 1, '2022-01-20 18:09:07', 200, 1, '2022-01-15 18:09:07', NULL, NULL),
(2, 'Web Development with Laravel', 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.', 3, 2, 2, '2022-01-29 18:09:07', 600, 1, '2022-01-16 18:09:07', NULL, NULL),
(3, 'Dynamic Sites with Codeigniter', 'The small framework with powerful features\r\nCodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.', 5, 2, 3, '2022-01-25 18:09:07', 250, 1, '2022-01-16 18:09:07', NULL, NULL),
(4, 'Responsive design with Tailwind', 'Rapidly build modern websites without ever leaving your HTML.\r\nA utility-first CSS framework packed with classes like flex, pt-4, text-center and rotate-90 that can be composed to build any design, directly in your markup.', 1, 1, 4, '2022-01-29 18:09:07', 200, 1, '2022-01-15 18:09:07', NULL, NULL),
(5, 'React Native Android App Developemt', 'Create native apps for Android and iOS using React\r\nReact Native combines the best parts of native development with React, a best-in-class JavaScript library for building user interfaces.\r\n', 2, 3, 5, '2022-01-22 18:09:07', 1000, 1, '2022-01-16 18:09:07', NULL, NULL),
(6, 'Flutter Ios App Developemt', 'Flutter is an open source framework by Google for building beautiful, natively compiled, multi-platform applications from a single codebase.\r\n', 2, 4, 6, '2022-01-27 18:09:07', 1000, 1, '2022-01-16 18:09:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `created_at`) VALUES
(1, 'Hyderabad', '2022-01-15 18:41:37'),
(2, 'Vizag', '2022-01-15 18:41:37'),
(3, 'Bengaluru', '2022-01-15 18:41:37'),
(4, 'Mysore', '2022-01-15 18:41:37'),
(5, 'Delhi', '2022-01-15 18:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `name`, `created_at`) VALUES
(1, 'Bootstrap-4', '2022-01-15 18:44:29'),
(2, 'Laravel-6', '2022-01-15 18:44:45'),
(3, 'Codeigniter-3', '2022-01-15 18:45:23'),
(4, 'Tailwind Css', '2022-01-15 18:44:29'),
(5, 'React Native', '2022-01-15 18:44:29'),
(6, 'Flutter', '2022-01-15 18:44:29'),
(7, 'Python', '2022-01-15 18:44:29'),
(8, 'Node Js', '2022-01-15 18:44:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_details_ibfk_1` (`event_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
