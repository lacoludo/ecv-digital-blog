-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 15, 2016 at 02:20 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blog_projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'modo',
  `photo` varchar(255) NOT NULL DEFAULT 'membre.png'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `token`, `role`, `photo`) VALUES
(1, 'Irfaan', 'irfaankhodabukus@gmail.com', 'e38ad214943daad1d64c102faec29de4afe9da3d', 'rrvt43r4fr', 'admin', 'membre.png'),
(5, 'Khodabukus', 'irfaan_17@hotmail.com', 'password2', '1cRvKnu5yDD3FILVj5ZmqEDKQiJuuB', 'member', 'membre.png'),
(9, 'Irfaan Khodabukus', 'irfaan@gmail.com', 'e38ad214943daad1d64c102faec29de4afe9da3d', '', 'modo', 'membre.png'),
(10, 'Khodabukus', 'khodabukus@gmail.com', 'e38ad214943daad1d64c102faec29de4afe9da3d', '', 'modo', 'membre.png'),
(11, 'Khodabukus', 'kho@gmail.com', 'e38ad214943daad1d64c102faec29de4afe9da3d', '', 'modo', 'membre.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `post_id`, `date`, `seen`) VALUES
(2, 'Irfaan Khodabukus', 'irfaankhodabukus@gmail.com', 'super !', 2, '2016-12-03 19:03:53', 0),
(3, 'Irfaan Khodabukus', 'irfaankhodabukus@gmail.com', 'super top!', 4, '2016-12-13 21:59:13', 0),
(4, 'Irfaan Khodabukus', 'irfaankhodabukus@gmail.com', 'Super bravo !', 3, '2016-12-13 22:04:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `writer` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'post.png',
  `date` datetime NOT NULL,
  `posted` tinyint(1) NOT NULL,
  `modified` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `writer`, `image`, `date`, `posted`, `modified`) VALUES
(2, 'blog en php', 'projet pour creer un blog de avec un systeme de gestion membres', 'irfaan@gmail.com', 'post.png', '2016-12-02 00:00:00', 1, 0),
(3, 'blog en HTML', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s', 'irfaan@gmail.com', 'post.png', '2016-12-03 00:00:00', 1, 0),
(4, 'grand article', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'irfaankhodabukus@gmail.com', 'post.png', '2016-12-04 16:19:04', 1, 0),
(5, 'Deuxieme', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'irfaankhodabukus@gmail.com', 'post.png', '2016-12-04 13:18:45', 0, 0),
(6, 'article avec image', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'irfaankhodabukus@gmail.com', '6', '2016-12-04 15:04:43', 1, 0),
(7, 'article avec image UPDATE', 'TEST', 'irfaankhodabukus@gmail.com', '7.jpg', '2016-12-04 16:18:18', 0, 0),
(8, '3 article', 'salut a moi', 'irfaankhodabukus@gmail.com', '8.jpg', '2016-12-04 15:14:07', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;