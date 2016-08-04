-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2015 at 05:52 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `church_priest`
--

CREATE TABLE IF NOT EXISTS `church_priest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(55) NOT NULL,
  `middlename` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jadeonprog@gmail.com', '6b542917f9898a5b26c04806931ebfa2099daab5724855b733ba0e6eac4b3b40', '2015-12-15 01:41:56'),
('ejanemj@gmail.com', '57440c69b0794bd43786f770bcb87f1b1ea0d92187f5298daaaa0f7b45ec65eb', '2015-12-15 01:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requirement` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `requirement`, `created_at`, `updated_at`) VALUES
(1, 'NBI', '2015-11-27 09:58:16', '2015-11-27 09:58:16'),
(4, 'NSO', '2015-11-28 09:53:19', '2015-11-28 09:53:19'),
(7, 'SSS', '2015-11-28 14:47:28', '2015-11-28 14:47:28'),
(8, 'PAG-IBIG', '2015-11-28 14:47:47', '2015-11-28 14:47:47'),
(9, 'CENOMAR', '2015-11-29 06:38:30', '2015-11-29 06:38:30'),
(10, 'qjgw113', '2015-11-29 07:58:40', '2015-11-29 07:58:40'),
(11, 'bdnsfv.hfhdfd', '2015-11-29 07:59:07', '2015-11-29 07:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `status` enum('1','2','5') NOT NULL DEFAULT '1' COMMENT '5 = cancelled, 1 = reserved, 2 = done',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `requirement_ids` text NOT NULL,
  `participants` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(55) NOT NULL,
  `middlename` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `contact` int(11) NOT NULL,
  `address` text NOT NULL,
  `role` enum('0','1') NOT NULL COMMENT '1: admin ; 0: client',
  `remember_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`, `contact`, `address`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'Jade', 'Sanchez', 'Taboada', 'jadeonprog@gmail.com', '$2y$10$hHxuIn6v8CR/m9Hvp/M4aeyIelV0.DjKKz98fUSYwvrs8Hd6UUkGm', 0, '', '1', 'pRwg610PDbLzYhhKU82KdhEhOeQo0UInYjm8My2Zgq4mAhnXPmb9bPUblelL', '2015-11-27 05:15:44', '2015-12-15 06:04:44'),
(39, 'Dfhgfhf fgdg', 'Drdtfygh hghg', 'Ggfhjg hjg', 'sd@yui.com', '$2y$10$GBerLAQcPj51.mey1KDLdO.R9XPEhPqkubolx4ROuby38rZbU4jea', 234556, 'Ghi', '0', '', '2015-11-29 08:06:57', '2015-11-29 08:06:57'),
(40, 'Maryjane', 'Bantilan ', 'Llana', 'ejanemj@gmail.com', '$2y$10$HKRK/KExtSRtCwUPODgVg.KJy3xDn9RzvgTSunTHdCFXH3AXMc2qq', 2147483647, 'Hghj64675765', '0', '', '2015-12-15 08:36:24', '2015-12-15 08:36:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
