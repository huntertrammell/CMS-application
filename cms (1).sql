-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 01, 2019 at 07:25 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'PHP'),
(2, 'Javascript'),
(3, 'Wordpress'),
(4, 'Vue');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_date` date NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_status` varchar(255) NOT NULL DEFAULT 'Unnaproved',
  `comment_content` text NOT NULL,
  `comment_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_date`, `comment_author`, `comment_status`, `comment_content`, `comment_email`) VALUES
(1, 7, '2019-04-01', 'Hunter Trammell', 'approved', 'blah blah blah blah', 'hunterttrammell@gmail.com'),
(2, 7, '2019-04-01', 'Hunter Trammell', 'Unnaproved', 'barnacles on my dick', 'test@gmail.com'),
(3, 7, '2019-04-01', 'Hunter Trammell', 'Unnaproved', 'barnacles on my dick', 'test@gmail.com'),
(4, 7, '2019-04-01', 'Hunter Trammell', 'Unnaproved', 'barnacles on my dick', 'test@gmail.com'),
(5, 7, '2019-04-01', 'Hunter Trammell', 'Unnaproved', 'barnacles on my dick', 'test@gmail.com'),
(6, 1, '2019-04-01', 's', 'Unnaproved', 'sssssssssssssssssssss', 'hunterttrammell@gmail.com'),
(7, 1, '2019-04-01', 's', 'Unnaproved', 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'hunterttrammell@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 4, 'Hello_worldewewfewf', 'Hunter Trammell', '2019-03-31', 'hunter.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumewffffffffffffffffffffffffffffffffffff', 'hunter, javascript, php, test', 4, 'draftwfeef'),
(4, 3, 'testicles', 'Hunter Trammell', '2019-03-31', 'hunterPic.png', 'lorem ipsum blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blahblah blah blah blah blahblah blah blah blah blahblah blah blah blah blahblah blah blah blah blahblah blah blah blah blahblah blah blah blah blahblah blah blah blah blahblah blah blah blah blahblah blah blah blah blahblah blah blah blah blahblah blah blah blah blahblah blah blah blah blahblah blah blah blah blahblah blah blah blah blah', 'test, first uploaded post!, cms system', 4, 'Published'),
(6, 3, 's', 's', '2019-03-31', 'dragonball_RPG.PNG', 's', 's', 4, 's'),
(7, 1, 'ssasccacascacasc', 'asasc', '2019-03-31', 'gif_Generator.PNG', 'ascascascascascascascascascascascascascasccascascascascascascascascascascascascascascascascascaaaas', 'asasascascasc', 4, 'ascasc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
