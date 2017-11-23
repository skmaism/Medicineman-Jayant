-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2017 at 01:57 AM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skmaism_sarfaesi_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_agencies`
--



--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Officer'),
(3, 'Employee'),
(4, 'Accouts'),
(5, 'Uploader'),
(6, 'Checker'),
(7, 'Approver');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `email_2` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `fb_link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `in_link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gpluse_link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `config_google_analytics` text COLLATE utf8_unicode_ci,
  `config_mail_protocol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `config_smtp_port` int(4) DEFAULT NULL,
  `config_smtp_host` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `config_smtp_username` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `config_smtp_password` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `config_smtp_timeout` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default` int(2) DEFAULT '1',
  `status` int(2) DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `owner`, `address`, `email`, `email_2`, `mobile`, `phone`, `logo`, `meta_title`, `meta_keyword`, `meta_description`, `fb_link`, `twitter_link`, `in_link`, `gpluse_link`, `youtube_link`, `config_google_analytics`, `config_mail_protocol`, `config_smtp_port`, `config_smtp_host`, `config_smtp_username`, `config_smtp_password`, `config_smtp_timeout`, `default`, `status`, `created`, `modified`) VALUES
(1, 'Sarfaesi', 'Sarfaesi Pvt. Ltd', 'Jaipur', 'admin@sarfaesi.com', 'admin@sarfaesi.com', '1234567890', '1234567890', 'sarfaesi-logo.png', 'Sarfaesi', 'Sarfaesi', 'Sarfaesi', 'https://www.facebook.com/Sarfaesi', 'https://twitter.com/Sarfaesi', 'https://www.linkedin.com/company/Sarfaesi', 'https://plus.google.com/100133904560309301455/Sarfaesi', '', NULL, 'mail', NULL, '', '', '', '', 1, 1, '2014-05-07 13:15:37', '2017-03-21 07:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(2) DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `username`, `password`, `role_id`, `image_path`, `status`, `created`, `modified`) VALUES
(2, 'Sarfaesi', '', 'admin@sarfaesi.com', '1234567890', 'India', 'admin@sarfaesi.com', '885e384f88de6d419d74a1c05a63b91c2f2c07b0', 1, 'img/users/sarfaesi-logo.png', 1, '2016-02-11 20:43:31', '2016-02-11 07:37:56'),
(3, 'ratnesh', '', 'ratnesh.trivedi@auhpm.in', '9928907497', 'Jaipur', 'ratnesh.trivedi@auhpm.in', '885e384f88de6d419d74a1c05a63b91c2f2c07b0', 4, 'img/users/_1476861267.', 1, '2016-10-19 03:14:27', '2016-10-19 03:14:27'),
(5, 'Sushil', '', 'sushil@sarfaesi.com', '1234567890', NULL, 'sushil@sarfaesi.com', '885e384f88de6d419d74a1c05a63b91c2f2c07b0', 1, 'img/users/sarfaesi-logo.png', 1, '2017-01-24 00:00:00', '2017-01-24 00:00:00'),
(6, 'Surendar', '', 'surendar@sarfaesi.com', '1234567890', NULL, 'surendar@sarfaesi.com', '885e384f88de6d419d74a1c05a63b91c2f2c07b0', 1, 'img/users/sarfaesi-logo.png', 1, '2017-01-24 00:00:00', '2017-01-24 00:00:00'),
(7, 'Vikram', '', 'vikram@sarfaesi.com', '1234567890', NULL, 'vikram@sarfaesi.com', '885e384f88de6d419d74a1c05a63b91c2f2c07b0', 7, 'img/users/sarfaesi-logo.png', 1, '2017-01-24 00:00:00', '2017-01-24 00:00:00'),
(8, 'Narandra', '', 'narandra@sarfaesi.com', '1234567890', NULL, 'narandra@sarfaesi.com', '885e384f88de6d419d74a1c05a63b91c2f2c07b0', 5, 'img/users/sarfaesi-logo.png', 1, '2017-01-24 00:00:00', '2017-01-24 00:00:00'),
(9, 'Deepak', '', 'deepak@sarfaesi.com', '1234567890', NULL, 'deepak@sarfaesi.com', '885e384f88de6d419d74a1c05a63b91c2f2c07b0', 6, 'img/users/sarfaesi-logo.png', 1, '2017-01-24 00:00:00', '2017-01-24 00:00:00'),
(10, 'Nitesh', '', 'vipinnverma@gmail.com', '1234567890', NULL, 'nitesh@sarfaesi.com', '885e384f88de6d419d74a1c05a63b91c2f2c07b0', 5, 'img/users/sarfaesi-logo.png', 1, '2017-01-24 00:00:00', '2017-01-24 00:00:00'),
(11, 'Bheem', '', 'vipin@solutionavenues.com', '1234567890', NULL, 'bheem@sarfaesi.com', '885e384f88de6d419d74a1c05a63b91c2f2c07b0', 1, 'img/users/sarfaesi-logo.png', 1, '2017-01-24 00:00:00', '2017-01-24 00:00:00');

-- --------------------------------------------------------


--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);



--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for dumped tables
--


ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `history_records`
--

ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;

