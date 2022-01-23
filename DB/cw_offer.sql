-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2021 at 01:37 PM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cw_offer`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `cms_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cms_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cms_description` text COLLATE utf8mb4_unicode_ci,
  `seo_meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active,0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cms_id`, `slug`, `cms_title`, `cms_description`, `seo_meta_title`, `seo_meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Terms-Conditions', 'Terms & Conditions', '<p>Qui cillum anim dolore cupidatat pariatur anim consequat. Pariatur culpa cillum sint officia. Dolore commodo dolor culpa enim adipisicing nulla proident voluptate. Laboris reprehenderit aliqua officia est nisi. Ipsum consectetur Lorem occaecat aliquip mollit excepteur quis do.</p><p>Sint sunt duis minim nulla do. Adipisicing adipisicing cupidatat labore excepteur enim enim esse. Deserunt reprehenderit sint duis nulla. Aute ipsum dolor do laborum est adipisicing. Anim enim commodo officia sunt quis.</p><p>Mollit laboris magna est tempor sit culpa. Est enim tempor ullamco exercitation tempor magna. Occaecat quis voluptate quis mollit officia.</p><p>Qui ea commodo qui magna culpa. Adipisicing pariatur excepteur laborum minim quis sit nisi duis ex. Qui nisi ad irure eu veniam nulla et enim. Velit enim consectetur tempor fugiat cupidatat.</p><p>Aliqua dolor eu qui sunt aliqua ullamco occaecat consectetur. Mollit incididunt sunt officia exercitation exercitation aliqua labore reprehenderit. Laboris proident esse anim deserunt reprehenderit voluptate exercitation. Deserunt magna voluptate deserunt et.<br /><br />&nbsp;</p><p>Qui cillum anim dolore cupidatat pariatur anim consequat. Pariatur culpa cillum sint officia. Dolore commodo dolor culpa enim adipisicing nulla proident voluptate. Laboris reprehenderit aliqua officia est nisi. Ipsum consectetur Lorem occaecat aliquip mollit excepteur quis do.</p><p>Sint sunt duis minim nulla do. Adipisicing adipisicing cupidatat labore excepteur enim enim esse. Deserunt reprehenderit sint duis nulla. Aute ipsum dolor do laborum est adipisicing. Anim enim commodo officia sunt quis.</p><p>Mollit laboris magna est tempor sit culpa. Est enim tempor ullamco exercitation tempor magna. Occaecat quis voluptate quis mollit officia.</p><p>Qui ea commodo qui magna culpa. Adipisicing pariatur excepteur laborum minim quis sit nisi duis ex. Qui nisi ad irure eu veniam nulla et enim. Velit enim consectetur tempor fugiat cupidatat.</p><p>Aliqua dolor eu qui sunt aliqua ullamco occaecat consectetur. Mollit incididunt sunt officia exercitation exercitation aliqua labore reprehenderit. Laboris proident esse anim deserunt reprehenderit voluptate exercitation. Deserunt magna voluptate deserunt et.</p>', 'Terms & Conditions', 'Terms & Conditions', 1, '2020-12-02 18:30:00', '2021-01-15 07:21:05'),
(2, 'Privacy-Policy', 'Privacy Policy', '<p>Qui cillum anim dolore cupidatat pariatur anim consequat. Pariatur culpa cillum sint officia. Dolore commodo dolor culpa enim adipisicing nulla proident voluptate. Laboris reprehenderit aliqua officia est nisi. Ipsum consectetur Lorem occaecat aliquip mollit excepteur quis do.</p><p>Sint sunt duis minim nulla do. Adipisicing adipisicing cupidatat labore excepteur enim enim esse. Deserunt reprehenderit sint duis nulla. Aute ipsum dolor do laborum est adipisicing. Anim enim commodo officia sunt quis.</p><p>Mollit laboris magna est tempor sit culpa. Est enim tempor ullamco exercitation tempor magna. Occaecat quis voluptate quis mollit officia.</p><p>Qui ea commodo qui magna culpa. Adipisicing pariatur excepteur laborum minim quis sit nisi duis ex. Qui nisi ad irure eu veniam nulla et enim. Velit enim consectetur tempor fugiat cupidatat.</p><p>Aliqua dolor eu qui sunt aliqua ullamco occaecat consectetur. Mollit incididunt sunt officia exercitation exercitation aliqua labore reprehenderit. Laboris proident esse anim deserunt reprehenderit voluptate exercitation. Deserunt magna voluptate deserunt et.</p><p>Qui cillum anim dolore cupidatat pariatur anim consequat. Pariatur culpa cillum sint officia. Dolore commodo dolor culpa enim adipisicing nulla proident voluptate. Laboris reprehenderit aliqua officia est nisi. Ipsum consectetur Lorem occaecat aliquip mollit excepteur quis do.</p><p>Sint sunt duis minim nulla do. Adipisicing adipisicing cupidatat labore excepteur enim enim esse. Deserunt reprehenderit sint duis nulla. Aute ipsum dolor do laborum est adipisicing. Anim enim commodo officia sunt quis.</p><p>Mollit laboris magna est tempor sit culpa. Est enim tempor ullamco exercitation tempor magna. Occaecat quis voluptate quis mollit officia.</p><p>Qui ea commodo qui magna culpa. Adipisicing pariatur excepteur laborum minim quis sit nisi duis ex. Qui nisi ad irure eu veniam nulla et enim. Velit enim consectetur tempor fugiat cupidatat.</p><p>Aliqua dolor eu qui sunt aliqua ullamco occaecat consectetur. Mollit incididunt sunt officia exercitation exercitation aliqua labore reprehenderit. Laboris proident esse anim deserunt reprehenderit voluptate exercitation. Deserunt magna voluptate deserunt et.</p>', 'Privacy Policy', 'Privacy Policy', 1, '2020-12-02 18:30:00', '2021-01-15 07:21:17'),
(3, 'Buyer-Disclosure-Content', 'Buyer Disclosure Content', '<p>Qui cillum anim dolore cupidatat pariatur anim consequat. Pariatur culpa cillum sint officia. Dolore commodo dolor culpa enim adipisicing nulla proident voluptate. Laboris reprehenderit aliqua officia est nisi. Ipsum consectetur Lorem occaecat aliquip mollit excepteur quis do.</p><p>Sint sunt duis minim nulla do. Adipisicing adipisicing cupidatat labore excepteur enim enim esse. Deserunt reprehenderit sint duis nulla. Aute ipsum dolor do laborum est adipisicing. Anim enim commodo officia sunt quis.</p><p>Mollit laboris magna est tempor sit culpa. Est enim tempor ullamco exercitation tempor magna. Occaecat quis voluptate quis mollit officia.</p><p>Qui ea commodo qui magna culpa. Adipisicing pariatur excepteur laborum minim quis sit nisi duis ex. Qui nisi ad irure eu veniam nulla et enim. Velit enim consectetur tempor fugiat cupidatat.</p><p>Aliqua dolor eu qui sunt aliqua ullamco occaecat consectetur. Mollit incididunt sunt officia exercitation exercitation aliqua labore reprehenderit. Laboris proident esse anim deserunt reprehenderit voluptate exercitation. Deserunt magna voluptate deserunt et.<br />&nbsp;</p><p>Qui cillum anim dolore cupidatat pariatur anim consequat. Pariatur culpa cillum sint officia. Dolore commodo dolor culpa enim adipisicing nulla proident voluptate. Laboris reprehenderit aliqua officia est nisi. Ipsum consectetur Lorem occaecat aliquip mollit excepteur quis do.</p><p>Sint sunt duis minim nulla do. Adipisicing adipisicing cupidatat labore excepteur enim enim esse. Deserunt reprehenderit sint duis nulla. Aute ipsum dolor do laborum est adipisicing. Anim enim commodo officia sunt quis.</p><p>Mollit laboris magna est tempor sit culpa. Est enim tempor ullamco exercitation tempor magna. Occaecat quis voluptate quis mollit officia.</p><p>Qui ea commodo qui magna culpa. Adipisicing pariatur excepteur laborum minim quis sit nisi duis ex. Qui nisi ad irure eu veniam nulla et enim. Velit enim consectetur tempor fugiat cupidatat.</p><p>Aliqua dolor eu qui sunt aliqua ullamco occaecat consectetur. Mollit incididunt sunt officia exercitation exercitation aliqua labore reprehenderit. Laboris proident esse anim deserunt reprehenderit voluptate exercitation. Deserunt magna voluptate deserunt et.</p>', 'Buyer Disclosure Content', 'Buyer Disclosure Content', 1, '2020-12-02 18:30:00', '2021-01-15 07:20:38'),
(4, 'Buyer-Agent-Disclosure-Content', 'Buyer Agent Disclosure Content', '<p>Qui cillum anim dolore cupidatat pariatur anim consequat. Pariatur culpa cillum sint officia. Dolore commodo dolor culpa enim adipisicing nulla proident voluptate. Laboris reprehenderit aliqua officia est nisi. Ipsum consectetur Lorem occaecat aliquip mollit excepteur quis do.</p><p>Sint sunt duis minim nulla do. Adipisicing adipisicing cupidatat labore excepteur enim enim esse. Deserunt reprehenderit sint duis nulla. Aute ipsum dolor do laborum est adipisicing. Anim enim commodo officia sunt quis.</p><p>Mollit laboris magna est tempor sit culpa. Est enim tempor ullamco exercitation tempor magna. Occaecat quis voluptate quis mollit officia.</p><p>Qui ea commodo qui magna culpa. Adipisicing pariatur excepteur laborum minim quis sit nisi duis ex. Qui nisi ad irure eu veniam nulla et enim. Velit enim consectetur tempor fugiat cupidatat.</p><p>Aliqua dolor eu qui sunt aliqua ullamco occaecat consectetur. Mollit incididunt sunt officia exercitation exercitation aliqua labore reprehenderit. Laboris proident esse anim deserunt reprehenderit voluptate exercitation. Deserunt magna voluptate deserunt et.</p><p>Qui cillum anim dolore cupidatat pariatur anim consequat. Pariatur culpa cillum sint officia. Dolore commodo dolor culpa enim adipisicing nulla proident voluptate. Laboris reprehenderit aliqua officia est nisi. Ipsum consectetur Lorem occaecat aliquip mollit excepteur quis do.</p><p>Sint sunt duis minim nulla do. Adipisicing adipisicing cupidatat labore excepteur enim enim esse. Deserunt reprehenderit sint duis nulla. Aute ipsum dolor do laborum est adipisicing. Anim enim commodo officia sunt quis.</p><p>Mollit laboris magna est tempor sit culpa. Est enim tempor ullamco exercitation tempor magna. Occaecat quis voluptate quis mollit officia.</p><p>Qui ea commodo qui magna culpa. Adipisicing pariatur excepteur laborum minim quis sit nisi duis ex. Qui nisi ad irure eu veniam nulla et enim. Velit enim consectetur tempor fugiat cupidatat.</p><p>Aliqua dolor eu qui sunt aliqua ullamco occaecat consectetur. Mollit incididunt sunt officia exercitation exercitation aliqua labore reprehenderit. Laboris proident esse anim deserunt reprehenderit voluptate exercitation. Deserunt magna voluptate deserunt et.</p>', 'Buyer Agent Disclosure Content', 'Buyer Agent Disclosure Content', 1, '2020-12-02 18:30:00', '2021-01-15 07:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
  `email_log_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_error_message` longtext COLLATE utf8mb4_unicode_ci,
  `email_attempt` int(11) DEFAULT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1=SMS,2=Email',
  `email_status` tinyint(4) NOT NULL COMMENT '1=send,2=pending,3=notSend',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_logs`
--

INSERT INTO `email_logs` (`email_log_id`, `user_id`, `email_id`, `phone`, `subject`, `email_content`, `email_error_message`, `email_attempt`, `type`, `email_status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'testing85000@gmail.com', NULL, 'No Please assist me', '<p>Hello <strong>Tanveer Khan,</strong><br />\r\nLead Is generated.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:<br />\r\nName:Seller Agent s<br />\r\nEmail:testing85000@gmail.com<br />\r\nPhone:+918949452133<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 11:54:02', '2021-01-29 11:55:03'),
(2, NULL, 'testing85000@gmail.com', NULL, 'No Please assist me', '<p>Hello <strong>Seller Agent s,</strong><br />\r\nLead Is generated and&nbsp;you can contact buyer on below details:<br />\r\nName:Tanveer Khan<br />\r\nEmail:testing85000@gmail.com<br />\r\nPhone:+918949452149<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 11:54:02', '2021-01-29 11:55:04'),
(3, NULL, NULL, '+918949452149', NULL, 'Hello Tanveer Khan,\r\nLead Is generated.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:\r\nName:Seller Agent s\r\nEmail:testing85000@gmail.com\r\nPhone:+918949452133', NULL, 1, 1, 1, '2021-01-29 11:54:02', '2021-01-29 12:00:01'),
(4, NULL, NULL, '+918949452133', NULL, 'Hello Seller Agent s,\r\nLead Is generated and you can contact buyer on below details:\r\nName:Tanveer Khan\r\nEmail:testing85000@gmail.com\r\nPhone:+918949452149', NULL, 1, 1, 1, '2021-01-29 11:54:02', '2021-01-29 12:00:01'),
(5, NULL, 'jay.technource@gmail.com', NULL, 'Email- Buyer Agent', '<p>Hello <strong>Jay Sorathia,</strong><br />\r\nNew Offer Successfully submitted.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.<br />\r\nDetails:<br />\r\nName:Jay S<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:09:48', '2021-01-29 12:10:04'),
(6, NULL, 'jay.technource@gmail.com', NULL, 'Email- Buyer', '<p>Hello <strong>JNS,</strong><br />\r\nYour Offer Successfully submitted.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.<br />\r\nDetails:<br />\r\nName:Jay S<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:09:48', '2021-01-29 12:10:05'),
(7, NULL, 'jay.technource@gmail.com', NULL, 'Email- Seller Agent', '<p>Hello <strong>Jay S,</strong><br />\r\nNew Offer Successfully submitted.<br />\r\n<strong>Buyer Details:</strong><br />\r\nName:JNS<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\n<strong>Buyer Agent Details</strong>:<br />\r\nName:Jay Sorathia<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:09:48', '2021-01-29 12:10:06'),
(8, NULL, NULL, '+919033841243', NULL, 'Hello JNS,\r\nYour Offer Successfully submitted.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.\r\nName:Jay S\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243', NULL, 1, 1, 1, '2021-01-29 12:09:48', '2021-01-29 12:10:06'),
(9, NULL, NULL, '+919033841243', NULL, 'Hello Jay S,\r\nNew Offer Successfully submitted.\r\nBuyer Details:\r\nName:JNS\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243\r\nBuyer Agent Details:\r\nName:Jay Sorathia\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243', NULL, 1, 1, 1, '2021-01-29 12:09:48', '2021-01-29 12:10:06'),
(10, NULL, NULL, '+919033841243', NULL, 'Hello Jay Sorathia,\r\nNew Offer Successfully submitted.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.\r\nName:Jay S\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243', NULL, 1, 1, 1, '2021-01-29 12:09:48', '2021-01-29 12:10:07'),
(11, NULL, 'test@mailunator.com', NULL, 'No Please assist me', '<p>Hello <strong>khushbu,</strong><br />\r\nLead Is generated.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:<br />\r\nName:Seller Agent s<br />\r\nEmail:testing85000@gmail.com<br />\r\nPhone:+918949452133<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:15:03', '2021-01-29 12:16:03'),
(12, NULL, 'testing85000@gmail.com', NULL, 'No Please assist me', '<p>Hello <strong>Seller Agent s,</strong><br />\r\nLead Is generated and&nbsp;you can contact buyer on below details:<br />\r\nName:khushbu<br />\r\nEmail:test@mailunator.com<br />\r\nPhone:+11234567890<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:15:03', '2021-01-29 12:16:05'),
(13, NULL, NULL, '+11234567890', NULL, 'Hello khushbu,\r\nLead Is generated.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:\r\nName:Seller Agent s\r\nEmail:testing85000@gmail.com\r\nPhone:+918949452133', 'Mobile number is wrong', 1, 1, 3, '2021-01-29 12:15:03', '2021-01-29 13:32:01'),
(14, NULL, NULL, '+918949452133', NULL, 'Hello Seller Agent s,\r\nLead Is generated and you can contact buyer on below details:\r\nName:khushbu\r\nEmail:test@mailunator.com\r\nPhone:+11234567890', NULL, 1, 1, 1, '2021-01-29 12:15:03', '2021-01-29 13:32:02'),
(15, NULL, 'jay.technource@gmail.com', NULL, 'Buyer Offer success', '<p>Hello <strong>Jay S,</strong><br />\r\nNew Offer Successfully submitted.<br />\r\nYou can contact buyer on below details:\r\nName:Tanveer Khan<br />\r\nEmail:testing85000@gmail.com<br />\r\nPhone:+18967452367<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:35:26', '2021-01-29 13:32:03'),
(16, NULL, 'testing85000@gmail.com', NULL, 'Email- Buyer', '<p>Hello <strong>Tanveer Khan,</strong><br />\r\nYour Offer Successfully submitted.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.<br />\r\nDetails:<br />\r\nName:Jay S<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:35:26', '2021-01-29 13:32:04'),
(17, NULL, NULL, '+18967452367', NULL, 'Hello Tanveer Khan,\r\nYour Offer Successfully submitted.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.\r\nName:Jay S\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243', 'Mobile number is wrong', 1, 1, 3, '2021-01-29 12:35:26', '2021-01-29 13:32:05'),
(18, NULL, NULL, '+919033841243', NULL, 'Hello Jay S,\r\nNew Offer Successfully submitted\r\nBuyer Details:\r\nName:Tanveer Khan\r\nEmail:testing85000@gmail.com\r\nPhone:+18967452367', NULL, 1, 1, 1, '2021-01-29 12:35:26', '2021-01-29 13:32:05'),
(19, NULL, 'testing85000@gmail.com', NULL, 'Buyer Offer success', '<p>Hello <strong>Seller Agent s,</strong><br />\r\nNew Offer Successfully submitted.<br />\r\nYou can contact buyer on below details:\r\nName:Tanveer Khan<br />\r\nEmail:testing85000@gmail.com<br />\r\nPhone:+918947069009<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:36:22', '2021-01-29 13:32:06'),
(20, NULL, 'testing85000@gmail.com', NULL, 'Email- Buyer', '<p>Hello <strong>Tanveer Khan,</strong><br />\r\nYour Offer Successfully submitted.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.<br />\r\nDetails:<br />\r\nName:Seller Agent s<br />\r\nEmail:testing85000@gmail.com<br />\r\nPhone:+918949452133<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:36:22', '2021-01-29 13:32:07'),
(21, NULL, NULL, '+918947069009', NULL, 'Hello Tanveer Khan,\r\nYour Offer Successfully submitted.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.\r\nName:Seller Agent s\r\nEmail:testing85000@gmail.com\r\nPhone:+918949452133', NULL, 1, 1, 1, '2021-01-29 12:36:22', '2021-01-29 13:32:07'),
(22, NULL, NULL, '+918949452133', NULL, 'Hello Seller Agent s,\r\nNew Offer Successfully submitted\r\nBuyer Details:\r\nName:Tanveer Khan\r\nEmail:testing85000@gmail.com\r\nPhone:+918947069009', NULL, 1, 1, 1, '2021-01-29 12:36:22', '2021-01-29 13:32:07'),
(23, NULL, 'testing85000@gmail.com', NULL, 'No Please assist me', '<p>Hello <strong>Tanveer Khan,</strong><br />\r\nLead Is generated.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:<br />\r\nName:Seller Agent s<br />\r\nEmail:testing85000@gmail.com<br />\r\nPhone:+918949452133<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:40:19', '2021-01-29 13:32:08'),
(24, NULL, 'testing85000@gmail.com', NULL, 'No Please assist me', '<p>Hello <strong>Seller Agent s,</strong><br />\r\nLead Is generated and&nbsp;you can contact buyer on below details:<br />\r\nName:Tanveer Khan<br />\r\nEmail:testing85000@gmail.com<br />\r\nPhone:+918949452149<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:40:19', '2021-01-29 13:32:08'),
(25, NULL, NULL, '+918949452149', NULL, 'Hello Tanveer Khan,\r\nLead Is generated.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:\r\nName:Seller Agent s\r\nEmail:testing85000@gmail.com\r\nPhone:+918949452133', NULL, 1, 1, 1, '2021-01-29 12:40:19', '2021-01-29 13:32:08'),
(26, NULL, NULL, '+918949452133', NULL, 'Hello Seller Agent s,\r\nLead Is generated and you can contact buyer on below details:\r\nName:Tanveer Khan\r\nEmail:testing85000@gmail.com\r\nPhone:+918949452149', NULL, 1, 1, 1, '2021-01-29 12:40:19', '2021-01-29 13:32:08'),
(27, NULL, 'jay.technource@gmail.com', NULL, 'Buyer Offer success', '<p>Hello <strong>Jay S,</strong><br />\r\nNew Offer Successfully submitted.<br />\r\nYou can contact buyer on below details:\r\nName:Jay<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:54:14', '2021-01-29 13:32:09'),
(28, NULL, 'jay.technource@gmail.com', NULL, 'Email- Buyer', '<p>Hello <strong>Jay,</strong><br />\r\nYour Offer Successfully submitted.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.<br />\r\nDetails:<br />\r\nName:Jay S<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:54:14', '2021-01-29 13:32:10'),
(29, NULL, NULL, '+919033841243', NULL, 'Hello Jay,\r\nYour Offer Successfully submitted.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.\r\nName:Jay S\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243', NULL, 1, 1, 1, '2021-01-29 12:54:14', '2021-01-29 13:32:10'),
(30, NULL, NULL, '+919033841243', NULL, 'Hello Jay S,\r\nNew Offer Successfully submitted\r\nBuyer Details:\r\nName:Jay\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243', NULL, 1, 1, 1, '2021-01-29 12:54:14', '2021-01-29 13:32:10'),
(31, NULL, 'jay.technource@gmail.com', NULL, 'Buyer Offer success', '<p>Hello <strong>Jay S,</strong><br />\r\nNew Offer Successfully submitted.<br />\r\nYou can contact buyer on below details:\r\nName:JAY<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:55:13', '2021-01-29 13:32:10'),
(32, NULL, 'jay.technource@gmail.com', NULL, 'Email- Buyer', '<p>Hello <strong>JAY,</strong><br />\r\nYour Offer Successfully submitted.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.<br />\r\nDetails:<br />\r\nName:Jay S<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:55:13', '2021-01-29 13:32:11'),
(33, NULL, NULL, '+919033841243', NULL, 'Hello JAY,\r\nYour Offer Successfully submitted.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.\r\nName:Jay S\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243', NULL, 1, 1, 1, '2021-01-29 12:55:13', '2021-01-29 13:32:11'),
(34, NULL, NULL, '+919033841243', NULL, 'Hello Jay S,\r\nNew Offer Successfully submitted\r\nBuyer Details:\r\nName:JAY\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243', NULL, 1, 1, 1, '2021-01-29 12:55:13', '2021-01-29 13:32:11'),
(35, NULL, 'testing85000@gmail.com', NULL, 'No Please assist me', '<p>Hello <strong>Tanveer Khan,</strong><br />\r\nLead Is generated.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:<br />\r\nName:Seller Agent s<br />\r\nEmail:testing85000@gmail.com<br />\r\nPhone:+918949452133<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:55:35', '2021-01-29 13:32:12'),
(36, NULL, 'testing85000@gmail.com', NULL, 'No Please assist me', '<p>Hello <strong>Seller Agent s,</strong><br />\r\nLead Is generated and&nbsp;you can contact buyer on below details:<br />\r\nName:Tanveer Khan<br />\r\nEmail:testing85000@gmail.com<br />\r\nPhone:+918949452149<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:55:35', '2021-01-29 13:32:13'),
(37, NULL, NULL, '+918949452149', NULL, 'Hello Tanveer Khan,\r\nLead Is generated.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:\r\nName:Seller Agent s\r\nEmail:testing85000@gmail.com\r\nPhone:+918949452133', NULL, 1, 1, 1, '2021-01-29 12:55:35', '2021-01-29 13:32:13'),
(38, NULL, NULL, '+918949452133', NULL, 'Hello Seller Agent s,\r\nLead Is generated and you can contact buyer on below details:\r\nName:Tanveer Khan\r\nEmail:testing85000@gmail.com\r\nPhone:+918949452149', NULL, 1, 1, 1, '2021-01-29 12:55:35', '2021-01-29 13:32:13'),
(39, NULL, 'rishitechnource@mailinator.com', NULL, 'No Please assist me', '<p>Hello <strong>rishi,</strong><br />\r\nLead Is generated.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:<br />\r\nName:Seller Agent s<br />\r\nEmail:testing85000@gmail.com<br />\r\nPhone:+918949452133<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:55:35', '2021-01-29 13:32:14'),
(40, NULL, 'testing85000@gmail.com', NULL, 'No Please assist me', '<p>Hello <strong>Seller Agent s,</strong><br />\r\nLead Is generated and&nbsp;you can contact buyer on below details:<br />\r\nName:rishi<br />\r\nEmail:rishitechnource@mailinator.com<br />\r\nPhone:+918302347090<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:55:35', '2021-01-29 13:32:15'),
(41, NULL, NULL, '+918302347090', NULL, 'Hello rishi,\r\nLead Is generated.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:\r\nName:Seller Agent s\r\nEmail:testing85000@gmail.com\r\nPhone:+918949452133', NULL, 1, 1, 1, '2021-01-29 12:55:35', '2021-01-29 13:32:15'),
(42, NULL, NULL, '+918949452133', NULL, 'Hello Seller Agent s,\r\nLead Is generated and you can contact buyer on below details:\r\nName:rishi\r\nEmail:rishitechnource@mailinator.com\r\nPhone:+918302347090', NULL, 1, 1, 1, '2021-01-29 12:55:35', '2021-01-29 13:32:15'),
(43, NULL, 'jay.technource@gmail.com', NULL, 'Email- Buyer Agent', '<p>Hello <strong>Jay Sorathia,</strong><br />\r\nNew Offer Successfully submitted.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.<br />\r\nDetails:<br />\r\nName:Jay S<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:56:18', '2021-01-29 13:32:16'),
(44, NULL, 'jay.technource@gmail.com', NULL, 'Email- Buyer', '<p>Hello <strong>admin,</strong><br />\r\nYour Offer Successfully submitted.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.<br />\r\nDetails:<br />\r\nName:Jay S<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:56:18', '2021-01-29 13:32:17'),
(45, NULL, 'jay.technource@gmail.com', NULL, 'Email- Seller Agent', '<p>Hello <strong>Jay S,</strong><br />\r\nNew Offer Successfully submitted.<br />\r\n<strong>Buyer Details:</strong><br />\r\nName:admin<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\n<strong>Buyer Agent Details</strong>:<br />\r\nName:Jay Sorathia<br />\r\nEmail:jay.technource@gmail.com<br />\r\nPhone:+919033841243<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 12:56:18', '2021-01-29 13:32:18'),
(46, NULL, NULL, '+919033841243', NULL, 'Hello admin,\r\nYour Offer Successfully submitted.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.\r\nName:Jay S\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243', NULL, 1, 1, 1, '2021-01-29 12:56:18', '2021-01-29 13:32:18'),
(47, NULL, NULL, '+919033841243', NULL, 'Hello Jay S,\r\nNew Offer Successfully submitted.\r\nBuyer Details:\r\nName:admin\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243\r\nBuyer Agent Details:\r\nName:Jay Sorathia\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243', NULL, 1, 1, 1, '2021-01-29 12:56:18', '2021-01-29 13:32:18'),
(48, NULL, NULL, '+919033841243', NULL, 'Hello Jay Sorathia,\r\nNew Offer Successfully submitted.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.\r\nName:Jay S\r\nEmail:jay.technource@gmail.com\r\nPhone:+919033841243', NULL, 1, 1, 1, '2021-01-29 12:56:18', '2021-01-29 13:32:18'),
(49, NULL, 'rishitechnource@mailinator.com', NULL, 'No Please assist me', '<p>Hello <strong>rishi,</strong><br />\r\nLead Is generated.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:<br />\r\nName:Seller Agent s<br />\r\nEmail:testing85000@gmail.com<br />\r\nPhone:+918949452133<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 13:35:31', '2021-01-29 13:36:03'),
(50, NULL, 'testing85000@gmail.com', NULL, 'No Please assist me', '<p>Hello <strong>Seller Agent s,</strong><br />\r\nLead Is generated and&nbsp;you can contact buyer on below details:<br />\r\nName:rishi<br />\r\nEmail:rishitechnource@mailinator.com<br />\r\nPhone:+918302347093<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, 1, 2, 1, '2021-01-29 13:35:31', '2021-01-29 13:36:04'),
(51, NULL, NULL, '+918302347093', NULL, 'Hello rishi,\r\nLead Is generated.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:\r\nName:Seller Agent s\r\nEmail:testing85000@gmail.com\r\nPhone:+918949452133', NULL, 1, 1, 1, '2021-01-29 13:35:31', '2021-01-29 13:36:04'),
(52, NULL, NULL, '+918949452133', NULL, 'Hello Seller Agent s,\r\nLead Is generated and you can contact buyer on below details:\r\nName:rishi\r\nEmail:rishitechnource@mailinator.com\r\nPhone:+918302347093', NULL, 1, 1, 1, '2021-01-29 13:35:31', '2021-01-29 13:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `email_sms_masters`
--

CREATE TABLE `email_sms_masters` (
  `email_sms_master_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_sms_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_sms_masters`
--

INSERT INTO `email_sms_masters` (`email_sms_master_id`, `title`, `email_sms_key`, `parameters`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Forget Password', 'forget_password', 'USERNAME,RESET_PASS_OTP', 'Forget Password', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nYou have recently requested to reset your password please find your OTP below...<br />\r\nYour OTP: <strong>{{RESET_PASS_OTP}}</strong><br />\r\nIf you have not requested this then please ignore.<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', '2020-12-01 18:30:00', '2020-12-06 23:00:38'),
(2, 'Seller Agent Set Password', 'seller_agent_set_password', 'USERNAME,PASSWORD', 'Seller Agent Set Password', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nYour profile is created please click on the button:<br />\r\n<strong>{{PASSWORD}}</strong><br />\r\nand set your password.Please let us if you have any doubts once after you explore the system.<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', '2020-12-02 18:30:00', '2020-12-06 23:01:29'),
(3, 'Email- Buyer No Please assist me', 'email_buyer_no_please_assist_me', 'USERNAME,NAME,EMAIL,PHONE_NUMBER', 'No Please assist me', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nLead Is generated.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:<br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', '2020-12-29 18:30:00', '2021-01-04 07:49:18'),
(4, 'SMS-to Seller Agent No Please assist me', 'sms_to_seller_agent_no_please_assist_me', 'USERNAME,NAME,EMAIL,PHONE_NUMBER', 'No Please assist me', 'Hello {{USERNAME}},\r\nLead Is generated and you can contact buyer on below details:\r\nName:{{NAME}}\r\nEmail:{{EMAIL}}\r\nPhone:{{PHONE_NUMBER}}', NULL, '2021-01-05 04:24:49'),
(5, 'Email- Buyer', 'email_to_buyer', 'USERNAME,NAME,EMAIL,PHONE_NUMBER', 'Email- Buyer', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nYour Offer Successfully submitted.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.<br />\r\nDetails:<br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', '2020-12-29 18:30:00', '2021-01-04 07:54:12'),
(6, 'Email- Buyer Agent', 'email_to_buyer_agent', 'USERNAME,NAME,EMAIL,PHONE_NUMBER', 'Email- Buyer Agent', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nNew Offer Successfully submitted.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.<br />\r\nDetails:<br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', '2020-12-29 18:30:00', '2021-01-04 07:55:26'),
(7, 'Email- Seller Agent', 'email_to_seller_agent', 'USERNAME, NAME, EMAIL, PHONE_NUMBER, BUYER_AGENT_NAME, BUYER_AGENT_EMAIL, BUYER_AGENT_PHONE_NUMBER', 'Email- Seller Agent', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nNew Offer Successfully submitted.<br />\r\n<strong>Buyer Details:</strong><br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}<br />\r\n<strong>Buyer Agent Details</strong>:<br />\r\nName:{{BUYER_AGENT_NAME}}<br />\r\nEmail:{{BUYER_AGENT_EMAIL}}<br />\r\nPhone:{{BUYER_AGENT_PHONE_NUMBER}}<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', '2020-12-29 18:30:00', '2021-01-05 03:53:24'),
(8, 'SMS- Buyer', 'sms_to_buyer', 'USERNAME,NAME,EMAIL,PHONE_NUMBER', 'SMS- Buyer', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nYour Offer Successfully submitted.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.<br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}</p>', '2020-12-29 18:30:00', '2021-01-05 04:05:05'),
(9, 'SMS- Buyer Agent', 'sms_to_buyer_agent', 'USERNAME,NAME,EMAIL,PHONE_NUMBER', 'SMS- Buyer Agent', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nNew Offer Successfully submitted.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details.<br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}</p>', '2020-12-29 18:30:00', '2021-01-05 04:04:49'),
(10, 'SMS- Seller Agent', 'sms_to_seller_agent', 'USERNAME, NAME, EMAIL, PHONE_NUMBER, BUYER_AGENT_NAME, BUYER_AGENT_EMAIL, BUYER_AGENT_PHONE_NUMBER', 'SMS- Seller Agent', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nNew Offer Successfully submitted.<br />\r\n<strong>Buyer Details:</strong><br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}<br />\r\n<strong>Buyer Agent Details:</strong><br />\r\nName:{{BUYER_AGENT_NAME}}<br />\r\nEmail:{{BUYER_AGENT_EMAIL}}<br />\r\nPhone:{{BUYER_AGENT_PHONE_NUMBER}}</p>', '2020-12-29 18:30:00', '2021-01-05 04:04:15'),
(13, 'Email- Seller No Please assist me', 'email_seller_no_please_assist_me', 'USERNAME,NAME,EMAIL,PHONE_NUMBER', 'No Please assist me', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nLead Is generated and&nbsp;you can contact buyer on below details:<br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', '2020-12-29 18:30:00', '2021-01-04 07:52:00'),
(14, 'Email-Rejected Buyer', 'email_offer_reject_to_buyer', 'USERNAME,NAME,EMAIL,PHONE_NUMBER,TABLE', 'Email- Rejected to Buyer', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nYour Offer Rejected..<br />\r\nSeller Agent Details:<br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}<br />\r\nInformation:<br />\r\n{{TABLE}}<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', '2020-12-29 18:30:00', '2021-01-05 03:51:18'),
(15, 'Email- rejected Buyer Agent', 'email_offer_reject_to_buyer_agent', 'USERNAME,NAME,EMAIL,PHONE_NUMBER,TABLE', 'Email- Rejected to Buyer Agent', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nOffer Rejected.<br />\r\n<strong>Seller Agent Details:</strong><br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}<br />\r\n<strong>Information:</strong><br />\r\n{{TABLE}}<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', '2020-12-29 18:30:00', '2021-01-05 03:55:25'),
(16, 'Email- Rejected to Seller Agent', 'email_offer_reject_to_seller_agent', 'USERNAME, NAME, EMAIL, PHONE_NUMBER, BUYER_AGENT_NAME, BUYER_AGENT_EMAIL, BUYER_AGENT_PHONE_NUMBER, TABLE', 'Rejected Offer', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nNew Offer Successfully submitted.<br />\r\n<strong>Buyer Details:</strong><br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}<br />\r\n<strong>Buyer Agent Details:</strong><br />\r\nName:{{BUYER_AGENT_NAME}}<br />\r\nEmail:{{BUYER_AGENT_EMAIL}}<br />\r\nPhone:{{BUYER_AGENT_PHONE_NUMBER}}<br />\r\n<strong>Information:</strong><br />\r\n{{TABLE}}<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', '2020-12-29 18:30:00', '2021-01-05 03:56:09'),
(17, 'SMS-to Buyer No Please assist me', 'sms_to_buyer_no_please_assist_me', 'USERNAME,NAME,EMAIL,PHONE_NUMBER', 'No Please assist me', '<p>Hello {{USERNAME}},\r\nLead Is generated.\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details:\r\nName:{{NAME}}\r\nEmail:{{EMAIL}}\r\nPhone:{{PHONE_NUMBER}}', NULL, '2021-01-05 04:25:23'),
(18, 'SMS- Buyer Offer Reject', 'sms_reject_to_buyer', 'USERNAME,NAME,EMAIL,PHONE_NUMBER', 'Buyer Offer Reject', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nOffer Rejected.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details<br />\r\n<strong>Seller Agent Details:</strong><br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}</p>', '2020-12-29 18:30:00', '2021-01-05 03:58:18'),
(19, 'SMS- Buyer Agent Offer rejected', 'sms_reject_to_buyer_agent', 'USERNAME,NAME,EMAIL,PHONE_NUMBER', 'Buyer Agent Offer Reject', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nOffer Rejected.<br />\r\nWe have received your information the seller agent will contact you soon or you can contact seller agent on below details<br />\r\n<strong>Seller Agent Details:</strong><br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}</p>', '2020-12-29 18:30:00', '2021-01-05 03:59:39'),
(20, 'SMS- Seller Agent Offer Rejected', 'sms_reject_to_seller_agent', 'USERNAME, NAME, EMAIL, PHONE_NUMBER, BUYER_AGENT_NAME, BUYER_AGENT_EMAIL, BUYER_AGENT_PHONE_NUMBER', 'Seller Agent Offer Reject', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nOffer Rejected.<br />\r\n<strong>Buyer Details:</strong><br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}<br />\r\n<strong>Buyer Agent Details:</strong><br />\r\nName:{{BUYER_AGENT_NAME}}<br />\r\nEmail:{{BUYER_AGENT_EMAIL}}<br />\r\nPhone:{{BUYER_AGENT_PHONE_NUMBER}}</p>', '2020-12-29 18:30:00', '2021-01-05 04:01:11'),
(21, 'sms to seller agent - buyer success', 'sms_to_seller_agent_buyer_success', 'USERNAME,NAME,EMAIL,PHONE_NUMBER', 'Buyer Offer success', '<p>Hello {{USERNAME}},<br />\r\nNew Offer Successfully submitted\r\nBuyer Details:<br />\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}', NULL, NULL),
(22, 'email to seller agent - buyer success', 'email_to_seller_agent_buyer_success', 'USERNAME,NAME,EMAIL,PHONE_NUMBER', 'Buyer Offer success', '<p>Hello <strong>{{USERNAME}},</strong><br />\r\nNew Offer Successfully submitted.<br />\r\nYou can contact buyer on below details:\r\nName:{{NAME}}<br />\r\nEmail:{{EMAIL}}<br />\r\nPhone:{{PHONE_NUMBER}}<br />\r\nThank You,<br />\r\nTeam, City Worth Homes<br />\r\n&copy; Copyright 2020&nbsp; City Worth Homes| All Rights Reserved</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `lead_id` int(10) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`lead_id`, `property_id`, `name`, `phone_code`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'new moon', NULL, '1212121212', 'newMoon@gmail.com', 1, '2020-12-08 18:30:00', NULL),
(2, 6, 'Tanveer Khan', NULL, '08949452149', 'admin@mainator.com', 1, '2020-12-16 12:43:22', '2020-12-16 12:43:22'),
(3, 6, 'Tanveer Khan', NULL, '08949452149', 'tanveerk85000@gmail.com', 1, '2020-12-16 13:30:24', '2020-12-16 13:30:24'),
(4, 5, 'Tanveer Khan', NULL, '08949452149', 'tanveerk8500@gmail.com', 1, '2020-12-16 13:31:09', '2020-12-16 13:31:09'),
(5, 5, 'Tanveer Khan', NULL, '08949452149', 'admin@mailinator.com', 1, '2020-12-16 13:51:59', '2020-12-16 13:51:59'),
(6, 8, 'Tanveer Khan', NULL, '08949452149', 'admin@mailinator.com', 1, '2020-12-16 13:58:09', '2020-12-16 13:58:09'),
(7, 5, 'khushbu', NULL, '123456789', 'hertronicadmin@mailinator.com', 1, '2020-12-17 10:48:18', '2020-12-17 10:48:18'),
(8, 5, 'khushbu', NULL, '123456789', 'hertronicadmin@mailinator.com', 1, '2020-12-17 10:48:19', '2020-12-17 10:48:19'),
(9, 9, 'Jay', NULL, '9033841243', 'jay.technource@gmail.com', 1, '2020-12-17 18:42:58', '2020-12-17 18:42:58'),
(12, 6, 'Shen Test', NULL, '7033491529', 'swht0245@cityworth.com', 1, '2020-12-22 20:38:00', '2020-12-22 20:38:00'),
(13, 6, 'shen test', NULL, '7033491529', 'swht0245@cityworth.com', 1, '2020-12-22 20:38:47', '2020-12-22 20:38:47'),
(14, 13, 'Technource', NULL, '234567688', 'technource.test@gmail.com', 1, '2020-12-29 07:21:06', '2020-12-29 07:21:06'),
(15, 13, 'Jay', NULL, '9033841243', 'jay.technource@gmail.com', 1, '2020-12-30 14:04:30', '2020-12-30 14:04:30'),
(16, 5, 'Tanveer Khan', '+91', '8949452149', 'admin@gmail.com', 1, '2021-01-01 15:17:03', '2021-01-01 15:17:03'),
(17, 5, 'Tanveer Khan', '+91', '8949452149', 'admin@gmail.com', 1, '2021-01-01 15:17:23', '2021-01-01 15:17:23'),
(18, 5, 'Tanveer Khan', '+91', '8949452149', 'tanveerk8500@gmail.com', 1, '2021-01-04 09:08:57', '2021-01-04 09:08:57'),
(19, 14, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 1, '2021-01-04 09:37:11', '2021-01-04 09:37:11'),
(20, 14, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 1, '2021-01-04 09:37:13', '2021-01-04 09:37:13'),
(21, 14, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 1, '2021-01-04 09:37:15', '2021-01-04 09:37:15'),
(22, 13, 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', 1, '2021-01-05 05:32:34', '2021-01-05 05:32:34'),
(23, 13, 'Rishi Kumar', '+91', '8302347093', 'rishi@technource.com', 1, '2021-01-05 05:34:10', '2021-01-05 05:34:10'),
(24, 8, 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', 1, '2021-01-05 05:45:38', '2021-01-05 05:45:38'),
(25, 9, 'khushbu', '+1', '1234567890', 'testcwoffer@mailinator.com', 1, '2021-01-05 09:16:32', '2021-01-05 09:16:32'),
(26, 9, 'khushbu', '+1', '1234567890', 'testcwoffer@mailinator.com', 1, '2021-01-05 09:16:33', '2021-01-05 09:16:33'),
(27, 9, 'khushbu', '+1', '1234567890', 'testcwoffer@mailinator.com', 1, '2021-01-05 09:16:34', '2021-01-05 09:16:34'),
(28, 9, 'khushbu', '+1', '1234567890', 'testcwoffer@mailinator.com', 1, '2021-01-05 09:16:36', '2021-01-05 09:16:36'),
(29, 8, 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', 1, '2021-01-05 10:03:38', '2021-01-05 10:03:38'),
(30, 13, 'Tanveer Khan', '+91', '8947069009', 'testing85000@gmail.com', 1, '2021-01-05 11:17:15', '2021-01-05 11:17:15'),
(32, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 1, '2021-01-10 17:10:35', '2021-01-10 17:10:35'),
(33, 4, 'Tanveer Khan', '+1', '08949452149', 'admin@mailinator.com', 1, '2021-01-11 14:26:55', '2021-01-11 14:26:55'),
(34, 17, 'Sanjay Technource', '+91', '8238605801', 'sanjayr2810@gmail.com', 1, '2021-01-12 12:02:03', '2021-01-12 12:02:03'),
(35, 14, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 1, '2021-01-12 13:34:33', '2021-01-12 13:34:33'),
(36, 24, 'rishi', '+1', '533553', 'rishitechnource@mailinator.com', 1, '2021-01-19 15:15:49', '2021-01-19 15:15:49'),
(37, 24, 'Rishi', '+1', '2342321', 'rishitechnource@mailinator.com', 1, '2021-01-20 09:12:22', '2021-01-20 09:12:22'),
(38, 5, 'Tanveer Khan', '+1', '123456789', 'cw_offer@mailinator.com', 1, '2021-01-21 05:36:18', '2021-01-21 05:36:18'),
(39, 14, 'swht0245', '+1', '1111111111', 'swht0208@cityworth.com', 1, '2021-01-21 22:37:25', '2021-01-21 22:37:25'),
(40, 13, 'Simba', '+1', '7033491529', 'swht09999@cityworth.com', 1, '2021-01-21 22:43:55', '2021-01-21 22:43:55'),
(41, 6, 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', 1, '2021-01-22 18:54:58', '2021-01-22 18:54:58'),
(42, 6, 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', 1, '2021-01-23 13:25:12', '2021-01-23 13:25:12'),
(43, 18, 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', 1, '2021-01-25 15:15:10', '2021-01-25 15:15:10'),
(44, 5, 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', 1, '2021-01-25 15:15:58', '2021-01-25 15:15:58'),
(45, 8, 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', 1, '2021-01-25 15:23:08', '2021-01-25 15:23:08'),
(46, 8, 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', 1, '2021-01-25 15:24:58', '2021-01-25 15:24:58'),
(47, 5, 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', 1, '2021-01-25 15:28:45', '2021-01-25 15:28:45'),
(48, 6, 'Taylor Billingsley', '+1', '7037851086', 'tbillingsley@cityworthproperties.com', 1, '2021-01-28 16:26:34', '2021-01-28 16:26:34'),
(49, 4, 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', 1, '2021-01-29 11:54:02', '2021-01-29 11:54:02'),
(50, 18, 'khushbu', '+1', '1234567890', 'test@mailunator.com', 1, '2021-01-29 12:15:03', '2021-01-29 12:15:03'),
(51, 4, 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', 1, '2021-01-29 12:40:19', '2021-01-29 12:40:19'),
(52, 4, 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', 1, '2021-01-29 12:55:35', '2021-01-29 12:55:35'),
(53, 18, 'rishi', '+91', '8302347090', 'rishitechnource@mailinator.com', 1, '2021-01-29 12:55:35', '2021-01-29 12:55:35'),
(54, 5, 'rishi', '+91', '8302347093', 'rishitechnource@mailinator.com', 1, '2021-01-29 13:35:31', '2021-01-29 13:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2020_12_02_142127_create_email_sms_masters_table', 2),
(4, '2020_12_02_142150_create_cms_table', 2),
(5, '2020_12_02_142217_create_settings_table', 2),
(6, '2020_12_04_062837_create_properties_table', 3),
(8, '2020_12_04_091933_create_property_durations_table', 3),
(9, '2020_12_04_091902_create_property_images_table', 4),
(10, '2020_12_08_050047_create_offers_table', 5),
(11, '2020_12_08_050118_create_leads_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(10) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_code` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_ph_code` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_concessions` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settlement_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emd` double(10,2) DEFAULT NULL,
  `due_diligence` double(10,2) DEFAULT NULL,
  `finance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appraisal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_sale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_note` text COLLATE utf8mb4_unicode_ci,
  `contract_received` tinyint(4) NOT NULL COMMENT '1=Yes, 0=No',
  `buyer_offer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intend_to_pay` tinyint(4) NOT NULL COMMENT '1=cash, 2=Loan',
  `down_payment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_term` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest_rate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `est_cash_to_close` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_cost` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_taxes` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_fees` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mortgage` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mortgage_insurance` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estimated_payment` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL COMMENT '1=Buyer, 2=Buyer Agent',
  `pre_approved` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Yes, 0=No',
  `offer_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=Acceptd,2=Rejected,0=No Change',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `property_id`, `name`, `phone_code`, `phone`, `email`, `buyer_name`, `buyer_ph_code`, `buyer_phone`, `buyer_email`, `sale_price`, `seller_concessions`, `settlement_date`, `emd`, `due_diligence`, `finance`, `appraisal`, `inspection`, `home_sale`, `additional_note`, `contract_received`, `buyer_offer`, `intend_to_pay`, `down_payment`, `loan_term`, `interest_rate`, `est_cash_to_close`, `closing_cost`, `insurance`, `property_taxes`, `other_fees`, `mortgage`, `mortgage_insurance`, `hoa`, `estimated_payment`, `user_type`, `pre_approved`, `offer_status`, `created_at`, `updated_at`) VALUES
(69, 6, 'Shen Test', NULL, '7033491529', 'swht0208@cityworth.com', 'Brigadier', NULL, '7033106003', 'b02034910@cityworth.com', '2500000', '10000', '[\"3\"]', 500.00, 100.00, '[\"3\"]', '[\"2\"]', '[\"3\"]', '[\"2\"]', 'This is a test', 1, '2500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2020-12-22 20:41:46', '2020-12-22 20:41:46'),
(70, 6, 'Shen Test', NULL, '7033491529', 'swht0208@cityworth.com', 'Brigadier', NULL, '7033106003', 'b02034910@cityworth.com', '2500000', '10000', '[\"2\",\"3\"]', 500.00, 100.00, '[\"2\",\"3\"]', '[\"2\",\"3\"]', '[\"3\",\"4\"]', '[\"4\"]', 'This is a test', 1, '2500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2020-12-22 20:46:34', '2020-12-22 20:46:34'),
(71, 6, 'Shen Test', NULL, '7033491529', 'swht0208@cityworth.com', NULL, NULL, NULL, NULL, '1944', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1944', 2, '9', '30', '2', '213.84000000000003', '58.32000000000001', '100', '122', '212', '25.014445573323606', NULL, NULL, '459.0144455733236', 1, 1, 2, '2020-12-22 21:33:19', '2020-12-30 13:34:56'),
(73, 13, 'Bob', NULL, '1111111111', 'swht0245@cityworth.com', NULL, NULL, NULL, NULL, '4000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '4000000', 2, '20', '30', '3', '920000', '120000', '$1', '$1', '$1', '$66706.52', '$0', '$1', '66710.52', 1, 1, 0, '2020-12-23 15:59:04', '2020-12-23 15:59:44'),
(74, 8, 'Tanveer Khan', NULL, '08949452149', 'tanveerk8500@gmail.com', 'Tanveer Khan', NULL, '08949452149', 'testing85000@gmail.com', '20000', '12', '1', 21.00, 21.00, '0', '1', '1', '1', 'gf fdsgfd gfdg fd', 1, '20000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2020-12-29 11:32:46', '2020-12-29 11:32:46'),
(75, 8, 'Tanveer Khan', NULL, '08949452149', 'tanveerk8500@gmail.com', 'Tanveer Khan', NULL, '08949452149', 'testing85000@gmail.com', '27000', '100', '2', 21.00, 21.00, '0', '1', '1', '1', 'gf fdsgfd gfdg fd', 1, '27000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2020-12-29 11:33:56', '2020-12-29 11:33:56'),
(76, 8, 'Tanveer Khan', NULL, '08949452149', 'tanveerk8500@gmail.com', 'Tanveer Khan', NULL, '08949452149', 'testing85000@gmail.com', '27000', '100', '2', 21.00, 21.00, '0', '4', '3', '3', 'gf fdsgfd gfdg fd', 1, '27000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2020-12-29 11:34:18', '2020-12-29 11:34:18'),
(77, 8, 'Tanveer Khan', NULL, '08949452149', 'tanveerk8500@gmail.com', 'Tanveer Khan', NULL, '08949452149', 'testing85000@gmail.com', '27000', '12', '2', 150.00, 75.00, '0', '4', '3', '3', 'gf fdsgfd gfdg fd', 1, '27000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2020-12-29 11:34:47', '2020-12-29 11:34:47'),
(78, 4, 'Tanveer Khan', NULL, '08949452149', 'admin@gmail.com', 'Tanveer Khan', NULL, '08949452149', 'farmaan@gmail.com', '27000', '75', '1', 100.00, 100.00, '0', '4', '3', '3', 'sdf sfdsfsd fsd', 1, '27000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2020-12-29 11:39:29', '2020-12-29 11:39:29'),
(79, 4, 'Tanveer Khan', NULL, '08949452149', 'admin@gmail.com', 'Tanveer Khan', NULL, '08949452149', 'farmaan@gmail.com', '27000', '100', '2', 15.00, 7.50, '0', '3', '2', '2', 'sdf sfdsfsd fsd', 1, '27000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2020-12-29 11:40:29', '2020-12-30 13:34:05'),
(80, 14, 'this isi', NULL, '08949452149', 'admin@gmail.com', 'Tanveer Khan', NULL, '08949452149', 'testing85000@gmail.com', '20000', '100', '1', 100.00, 100.00, '4', '1', '2', '1', 'dsf dsgdfgdf gdfs g', 0, '20000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2020-12-30 13:47:49', '2020-12-30 13:47:49'),
(81, 14, 'this isi', NULL, '08949452149', 'admin@gmail.com', 'Tanveer Khan', NULL, '08949452149', 'testing85000@gmail.com', '20000', '100', '1', 100.00, 100.00, '4', '1', '5', '1', 'dsf dsgdfgdf gdfs g', 0, '20000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2020-12-30 13:48:08', '2020-12-30 13:48:08'),
(82, 14, 'this isi', NULL, '08949452149', 'admin@gmail.com', 'Tanveer Khan', NULL, '08949452149', 'testing85000@gmail.com', '20000', '100', '1', 100.00, 100.00, '5', '1', '5', '1', 'dsf dsgdfgdf gdfs g', 0, '20000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 2, '2020-12-30 13:48:26', '2020-12-30 13:50:15'),
(83, 14, 'this isi', NULL, '08949452149', 'admin@gmail.com', 'Tanveer Khan', NULL, '08949452149', 'testing85000@gmail.com', '20000', '99', '1', 100.00, 100.00, '5', '5', '4', '4', 'dsf dsgdfgdf gdfs g', 0, '20000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2020-12-30 13:51:16', '2020-12-30 13:51:16'),
(84, 14, 'this isi', NULL, '08949452149', 'admin@gmail.com', 'Tanveer Khan', NULL, '08949452149', 'testing85000@gmail.com', '20000', '99', '1', 100.00, 100.00, '5', '5', '4', '5', 'dsf dsgdfgdf gdfs g', 0, '20000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2020-12-30 13:51:31', '2020-12-30 13:51:31'),
(85, 6, 'Jay Sorathia', NULL, '123456', 'jay.technource@gmail.com', 'Jay', NULL, '7894561235', 'js@technource.com', '20000', '100', '3', 100.00, 100.00, '5', '2', '3', '2', 'hello', 0, '20000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2020-12-30 13:56:27', '2020-12-30 13:56:27'),
(86, 6, 'Jay Sorathia', NULL, '123456', 'jay.technource@gmail.com', 'Jay', NULL, '7894561235', 'js@technource.com', '20000', '200', '2', 100.00, 10.00, '5', '2', '3', '2', 'hello', 0, '20000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2020-12-30 13:57:10', '2020-12-30 13:57:10'),
(87, 6, 'Jay Sorathia', NULL, '123456', 'jay.technource@gmail.com', 'Jay', NULL, '7894561235', 'js@technource.com', '20000', '200', '2', 10.00, 5.00, '5', '2', '4', '2', 'hello', 0, '20000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2020-12-30 13:57:42', '2020-12-30 13:57:42'),
(88, 6, 'Jay Sorathia', NULL, '123456', 'jay.technource@gmail.com', 'Jay', NULL, '7894561235', 'js@technource.com', '20000', '200', '2', 10.00, 5.00, '5', '2', '4', '2', 'hello', 0, '20000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2020-12-30 14:00:45', '2020-12-30 14:00:45'),
(89, 6, 'Jay Sorathia', NULL, '123456', 'jay.technource@gmail.com', 'Jay', NULL, '7894561235', 'js@technource.com', '20000', '200', '2', 10.00, 5.00, '3', '2', '4', '2', 'hello', 0, '20000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2020-12-30 14:01:07', '2020-12-30 14:01:07'),
(90, 14, 'JAY', NULL, '9033841243', 'jay.technource@gmail.com', 'Jay Sorathia', NULL, '903384123', 'jay.technource@gmail.com', '20000', '100', '3', 100.00, 1000.00, '5', '2', '2', '2', 'Hello', 0, '20000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2020-12-30 14:36:21', '2020-12-30 14:36:21'),
(91, 14, 'JAY', NULL, '9033841243', 'jay.technource@gmail.com', 'Jay Sorathia', NULL, '903384123', 'jay.technource@gmail.com', '20000', '100', '1', 90.00, 100.00, '5', '2', '3', '5', 'Hello', 0, '20000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2020-12-30 14:37:13', '2020-12-30 14:37:13'),
(92, 14, 'JAY', NULL, '9033841243', 'jay.technource@gmail.com', 'Jay Sorathia', NULL, '903384123', 'jay.technource@gmail.com', '20000', '99', '1', 100.00, 100.00, '5', '2', '3', '5', 'Hello', 0, '20000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 2, '2020-12-30 14:37:51', '2020-12-30 14:39:39'),
(93, 5, 'Tanveer Khan', NULL, '08949452149', 'admin@mailinator.com', 'Tanveer Khan', NULL, '08949452149', 'tanveerk85000@gmail.com', '234324', '34', '1', 32423.00, 23423.00, '1', '1', '1', '1', 'f sdfdsfds fdsf s', 0, '234324', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2020-12-31 16:57:45', '2020-12-31 16:57:45'),
(94, 5, 'Tanveer Khan', NULL, '08949452149', 'admin@mailinator.com', 'Tanveer Khan', NULL, '08949452149', 'tanveerk85000@gmail.com', '234324', '34', '1', 32423.00, 23423.00, '1', '1', '1', '1', 'f sdfdsfds fdsf s', 0, '234324', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2020-12-31 16:58:30', '2020-12-31 16:58:30'),
(95, 14, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'JNS', '+91', '9033841243', 'jay.technource@gmail.com', '2500', '100', '2', 100.00, 99.00, '5', '2', '4', '2', 'Hay', 0, '2500', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-04 09:39:10', '2021-01-04 09:39:10'),
(96, 14, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'JNS', '+91', '9033841243', 'jay.technource@gmail.com', '25000', '96', '2', 100.00, 100.00, '5', '5', '4', '5', 'Hay', 0, '25000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-04 09:40:11', '2021-01-04 09:40:11'),
(97, 14, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'JNS', '+91', '9033841243', 'jay.technource@gmail.com', '25000', '96', '2', 100.00, 100.00, '5', '5', '4', '5', 'Hay', 0, '25000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-04 09:40:12', '2021-01-04 09:40:12'),
(98, 14, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'JNS', '+91', '9033841243', 'jay.technource@gmail.com', '25000', '96', '1', 100.00, 100.00, '5', '5', '4', '5', 'Hay', 0, '25000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-04 09:40:45', '2021-01-04 09:40:45'),
(99, 14, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'JNS', '+91', '9033841243', 'jay.technource@gmail.com', '25000', '99', '1', 100.00, 100.00, '5', '5', '4', '5', 'Hay', 0, '25000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-04 09:41:11', '2021-01-04 09:41:11'),
(100, 13, 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', '2132', '213', '1', 213.00, 23.00, '1', '1', '2', '1', 'sdf dsf sd', 0, '2132', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-05 05:48:14', '2021-01-21 22:02:40'),
(101, 8, 'Tanveer Khan', '+91', '8949452149', 'admin@mailinator.com', 'Tanveer Khan', '+91', '08949452149', 'testing85000@gmail.com', '1232', '2312', '1', 213.00, 123.00, '0', '1', '2', '1', 'sdsad', 0, '1232', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-05 09:04:21', '2021-01-05 09:04:21'),
(102, 8, 'Tanveer Khan', '+91', '8949452149', 'admin@mailinator.com', 'Tanveer Khan', '+91', '08949452149', 'testing85000@gmail.com', '1232', '2312', '1', 213.00, 123.00, '0', '1', '2', '1', 'sdsad', 0, '1232', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-05 09:05:28', '2021-01-05 09:05:28'),
(103, 9, 'Tanveer Khan', '+91', '08949452149', 'admin@mailinator.com', 'Tanveer Khan', '+91', '8949452149', 'testcwoffer@mailinator.com', '45345', '435', '1', 435.00, 45.00, '5', '1', '5', '1', 's sdfdsf', 0, '45345', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-05 09:07:43', '2021-01-05 09:07:43'),
(104, 9, 'khushbu', '+1', '1234567890', 'testcwoffer@mailinator.com', 'khushbu', '+1', '9876543210', 'testcwoffer@mailinator.com', '123', '1234', '3', 1234.00, 1234.00, '5', '1', '4', '1', 'test', 0, '123', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-05 09:19:29', '2021-01-05 09:19:29'),
(105, 9, 'khushbu', '+1', '9876543210', 'testcwoffer@mailinator.com', 'khushbu', '+1', '9876543210', 'testcwoffer@mailinator.com', '123', '123', '1', 123.00, 123.00, '5', '1', '4', '3', 'test', 0, '123', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-05 09:31:36', '2021-01-05 09:31:36'),
(106, 9, 'khushbu', '+1', '1234567890', 'testcwoffer@mailinator.com', 'khushbu', '+1', '1234567890', 'testcwoffer@mailinator.com', '123', '123', '1', 123.00, 123.00, '5', '3', '4', '3', 'test', 0, '123', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-05 09:36:00', '2021-01-05 09:36:00'),
(107, 9, 'khushbu', '+1', '1234567890', 'testcwoffer@mailinator.com', 'khushbu', '+1', '789456123', 'testcwoffer@mailinator.com', '123', '123', '3', 123.00, 123.00, '5', '3', '4', '3', 'test', 0, '123', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-05 09:42:54', '2021-01-05 09:42:54'),
(108, 9, 'khushbu', '+1', '9876543210', 'testcwoffer@mailinator.com', 'khushbu', '+1', '7894561230', 'testcwoffer@mailinator.com', '123', '123', '3', 133.00, 159.00, '5', '3', '3', '3', 'test', 0, '123', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-05 09:48:47', '2021-01-05 09:48:47'),
(109, 9, 'khushbu', '+1', '9876543210', 'khushbu@technource.com', 'khushbu', '+1', '12345687890', 'khushbu@technource.com', '123', '123', '3', 123.00, 123.00, '3', '3', '3', '3', 'test', 0, '123', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-05 09:53:41', '2021-01-05 09:53:41'),
(110, 9, 'khushbu', '+1', '9876543210', 'kb@technource.com', 'khushbu', '+1', '123456780', 'kb@technource.com', '123', '123', '3', 123.00, 123.00, '5', '4', '4', '4', 'test', 0, '123', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-05 09:56:20', '2021-01-05 09:56:20'),
(111, 13, 'Tanveer Khan', '+1', '8949452149', 'testing85000@gmail.com', 'Tanveer Khan', '+1', '08949452149', 'testing85000@gmail.com', '121', '2321', '1', 2323.00, 23.00, '5', '1', '5', '1', 'sdf sfd s', 0, '121', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 2, '2021-01-05 10:06:36', '2021-01-10 16:35:36'),
(112, 8, 'Tanveer Khan', '+91', '8949452149', 'tanveerk8500@gmail.com', NULL, NULL, NULL, NULL, '30775', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '30775', 2, '13', '30', '3', '', '', '', '', '', '', '', '', '1066.7', 1, 1, 0, '2021-01-05 11:21:03', '2021-01-05 11:21:03'),
(118, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:01', '2021-01-10 17:03:01'),
(119, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:04', '2021-01-10 17:03:04'),
(120, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:05', '2021-01-10 17:03:05'),
(121, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:05', '2021-01-10 17:03:05'),
(122, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:05', '2021-01-10 17:03:05'),
(123, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:05', '2021-01-10 17:03:05'),
(124, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:05', '2021-01-10 17:03:05'),
(125, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:06', '2021-01-10 17:03:06'),
(126, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:11', '2021-01-10 17:03:11'),
(127, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:12', '2021-01-10 17:03:12'),
(128, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:12', '2021-01-10 17:03:12'),
(129, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:12', '2021-01-10 17:03:12'),
(130, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:12', '2021-01-10 17:03:12'),
(131, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:12', '2021-01-10 17:03:12'),
(132, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:13', '2021-01-10 17:03:13'),
(133, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:13', '2021-01-10 17:03:13'),
(134, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:13', '2021-01-10 17:03:13'),
(135, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:13', '2021-01-10 17:03:13'),
(136, 14, 'Michell', '+1', '1111111111', 'swht0209@cityworth.com', 'Cassius', '+1', '1111111111', 'swht0210@cityworth.com', '4500000', '3000', '5', 1500.00, 250.00, '2', '5', '5', '4', 'We Want The HOUSE NOW', 0, '4500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:03:14', '2021-01-10 17:03:14'),
(137, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:04:46', '2021-01-10 17:04:46'),
(138, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:04:50', '2021-01-10 17:04:50'),
(139, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:04:50', '2021-01-10 17:04:50'),
(140, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:04:50', '2021-01-10 17:04:50'),
(141, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:04:50', '2021-01-10 17:04:50'),
(142, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:04:51', '2021-01-10 17:04:51'),
(143, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:04:51', '2021-01-10 17:04:51'),
(144, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:04:51', '2021-01-10 17:04:51'),
(145, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:04:51', '2021-01-10 17:04:51'),
(146, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:04:51', '2021-01-10 17:04:51'),
(147, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:05:05', '2021-01-10 17:05:05'),
(148, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:05:05', '2021-01-10 17:05:05'),
(149, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:05:05', '2021-01-10 17:05:05'),
(150, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:05:06', '2021-01-10 17:05:06'),
(151, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:05:06', '2021-01-10 17:05:06'),
(152, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:05:06', '2021-01-10 17:05:06'),
(153, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:05:06', '2021-01-10 17:05:06'),
(154, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:05:06', '2021-01-10 17:05:06'),
(155, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:05:07', '2021-01-10 17:05:07'),
(156, 14, 'Blitzcrank', '+1', '1111111111', 'swht0211@cityworth.com', 'Diego', '+1', '1111111111', 'swht0213@cityworth.com', '500000', '50', '3', 30.00, 40.00, '5', '3', '2', '2', 'Shamwow is good', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-10 17:09:37', '2021-01-10 17:09:37'),
(157, 14, 'Blitzcrank', '+1', '1111111111', 'swht0211@cityworth.com', 'Diego', '+1', '1111111111', 'swht0213@cityworth.com', '500000', '50', '3', 30.00, 40.00, '5', '3', '2', '2', 'Shamwow is good', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-10 17:09:38', '2021-01-10 17:09:38'),
(158, 14, 'Blitzcrank', '+1', '1111111111', 'swht0211@cityworth.com', 'Diego', '+1', '1111111111', 'swht0213@cityworth.com', '500000', '50', '3', 30.00, 40.00, '5', '3', '2', '2', 'Shamwow is good', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-10 17:09:38', '2021-01-10 17:09:38'),
(159, 14, 'Blitzcrank', '+1', '1111111111', 'swht0211@cityworth.com', 'Diego', '+1', '1111111111', 'swht0213@cityworth.com', '500000', '50', '3', 30.00, 40.00, '5', '3', '2', '2', 'Shamwow is good', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-10 17:09:38', '2021-01-10 17:09:38'),
(160, 14, 'Blitzcrank', '+1', '1111111111', 'swht0211@cityworth.com', 'Diego', '+1', '1111111111', 'swht0213@cityworth.com', '500000', '50', '3', 30.00, 40.00, '5', '3', '2', '2', 'Shamwow is good', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-10 17:09:38', '2021-01-10 17:09:38'),
(161, 14, 'Blitzcrank', '+1', '1111111111', 'swht0211@cityworth.com', 'Diego', '+1', '1111111111', 'swht0213@cityworth.com', '500000', '50', '3', 30.00, 40.00, '5', '3', '2', '2', 'Shamwow is good', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-10 17:10:08', '2021-01-10 17:10:08'),
(162, 14, 'Blitzcrank', '+1', '1111111111', 'swht0211@cityworth.com', 'Diego', '+1', '1111111111', 'swht0213@cityworth.com', '500000', '50', '3', 30.00, 40.00, '5', '3', '2', '2', 'Shamwow is good', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-10 17:10:08', '2021-01-10 17:10:08'),
(163, 14, 'Blitzcrank', '+1', '1111111111', 'swht0211@cityworth.com', 'Diego', '+1', '1111111111', 'swht0213@cityworth.com', '500000', '50', '3', 30.00, 40.00, '5', '3', '2', '2', 'Shamwow is good', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-10 17:10:08', '2021-01-10 17:10:08'),
(164, 14, 'Blitzcrank', '+1', '1111111111', 'swht0211@cityworth.com', 'Diego', '+1', '1111111111', 'swht0213@cityworth.com', '500000', '50', '3', 30.00, 40.00, '5', '3', '2', '2', 'Shamwow is good', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-10 17:10:09', '2021-01-10 17:10:09'),
(165, 14, 'Blitzcrank', '+1', '1111111111', 'swht0211@cityworth.com', 'Diego', '+1', '1111111111', 'swht0213@cityworth.com', '500000', '50', '3', 30.00, 40.00, '5', '3', '2', '2', 'Shamwow is good', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-10 17:10:09', '2021-01-10 17:10:09'),
(166, 14, 'Blitzcrank', '+1', '1111111111', 'swht0211@cityworth.com', 'Diego', '+1', '1111111111', 'swht0213@cityworth.com', '500000', '50', '3', 30.00, 40.00, '5', '3', '2', '2', 'Shamwow is good', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-10 17:10:09', '2021-01-10 17:10:09'),
(167, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:10:20', '2021-01-10 17:10:20'),
(168, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:10:20', '2021-01-10 17:10:20'),
(169, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:10:21', '2021-01-10 17:10:21'),
(170, 14, 'Billie', '+1', '1111111111', 'swht0210@cityworth.com', 'mikey', '+1', '1111111111', 'swht0210@cityworth.com', '120000', '500', '4', 500.00, 500.00, '5', '3', '3', '5', 'We want it now', 0, '120000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-10 17:10:21', '2021-01-10 17:10:21'),
(171, 14, 'Briggz', '+1', '1111111111', 'swht02214@cityworth.com', NULL, NULL, NULL, NULL, '21720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '21720', 2, '80', 'VA', '2', '', '', '', '', '', '', '', '', '660.76', 1, 1, 0, '2021-01-10 17:16:54', '2021-01-10 17:16:54'),
(172, 14, 'Briggz', '+1', '1111111111', 'swht02214@cityworth.com', NULL, NULL, NULL, NULL, '21720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '21720', 2, '80', 'VA', '2', '', '', '', '', '', '', '', '', '660.76', 1, 1, 0, '2021-01-10 17:16:56', '2021-01-10 17:16:56'),
(173, 14, 'Briggz', '+1', '1111111111', 'swht02214@cityworth.com', NULL, NULL, NULL, NULL, '21720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '21720', 2, '80', 'VA', '2', '', '', '', '', '', '', '', '', '660.76', 1, 1, 0, '2021-01-10 17:16:56', '2021-01-10 17:16:56'),
(174, 14, 'Briggz', '+1', '1111111111', 'swht02214@cityworth.com', NULL, NULL, NULL, NULL, '21720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '21720', 2, '80', 'VA', '2', '', '', '', '', '', '', '', '', '660.76', 1, 1, 0, '2021-01-10 17:16:56', '2021-01-10 17:16:56'),
(175, 14, 'Briggz', '+1', '1111111111', 'swht02214@cityworth.com', NULL, NULL, NULL, NULL, '21720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '21720', 2, '80', 'VA', '2', '', '', '', '', '', '', '', '', '660.76', 1, 1, 0, '2021-01-10 17:16:56', '2021-01-10 17:16:56'),
(176, 14, 'Briggz', '+1', '1111111111', 'swht02214@cityworth.com', NULL, NULL, NULL, NULL, '21720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '21720', 2, '80', 'VA', '2', '', '', '', '', '', '', '', '', '660.76', 1, 1, 0, '2021-01-10 17:16:57', '2021-01-10 17:16:57'),
(177, 14, 'Briggz', '+1', '1111111111', 'swht02214@cityworth.com', NULL, NULL, NULL, NULL, '21720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '21720', 2, '80', 'VA', '2', '', '', '', '', '', '', '', '', '660.76', 1, 1, 0, '2021-01-10 17:16:57', '2021-01-10 17:16:57'),
(178, 14, 'Briggz', '+1', '1111111111', 'swht02214@cityworth.com', NULL, NULL, NULL, NULL, '21720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '21720', 2, '80', 'VA', '2', '', '', '', '', '', '', '', '', '660.76', 1, 1, 0, '2021-01-10 17:16:59', '2021-01-10 17:16:59'),
(179, 14, 'Briggz', '+1', '1111111111', 'swht02214@cityworth.com', NULL, NULL, NULL, NULL, '21720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '21720', 2, '80', 'VA', '2', '', '', '', '', '', '', '', '', '660.76', 1, 1, 0, '2021-01-10 17:16:59', '2021-01-10 17:16:59'),
(180, 14, 'Briggz', '+1', '1111111111', 'swht02214@cityworth.com', NULL, NULL, NULL, NULL, '21720', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '21720', 2, '80', 'VA', '2', '', '', '', '', '', '', '', '', '660.76', 1, 1, 0, '2021-01-10 17:16:59', '2021-01-10 17:16:59'),
(181, 8, 'Tanveer Khan', '+1', '08949452149', 'testing85000@gmail.com', 'Tanveer Khan', '+1', '08949452149', 'farmaan@gmail.com', '21', '12', '1', 233.00, 12.00, '5', '1', '5', '1', 'fd sads dsadsa dsa', 0, '21', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-11 09:05:30', '2021-01-11 09:05:30'),
(182, 8, 'Tanveer Khan', '+1', '08949452149', 'testing85000@gmail.com', 'Tanveer Khan', '+1', '08949452149', 'farmaan@gmail.com', '21', '12', '1', 233.00, 12.00, '5', '1', '5', '1', 'fd sads dsadsa dsa', 0, '21', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-11 09:06:11', '2021-01-11 09:06:11'),
(183, 8, 'Tanveer Khan', '+1', '08949452149', 'testing85000@gmail.com', 'Tanveer Khan', '+1', '08949452149', 'farmaan@gmail.com', '21', '12', '1', 233.00, 12.00, '5', '1', '5', '1', 'fd sads dsadsa dsa', 0, '21', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-11 09:10:47', '2021-01-11 09:10:47'),
(184, 8, 'Tanveer Khan', '+1', '08949452149', 'testing85000@gmail.com', 'Tanveer Khan', '+1', '08949452149', 'farmaan@gmail.com', '21', '12', '1', 233.00, 12.00, '5', '1', '5', '1', 'fd sads dsadsa dsa', 0, '21', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-11 09:35:04', '2021-01-11 09:35:04'),
(185, 8, 'Tanveer Khan', '+1', '08949452149', 'testing85000@gmail.com', 'Tanveer Khan', '+1', '08949452149', 'farmaan@gmail.com', '28000', '12', '2', 100.00, 12.00, '5', '4', '4', '4', 'fd sads dsadsa dsa', 0, '28000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-11 09:43:58', '2021-01-11 09:43:58'),
(186, 8, 'Tanveer Khan', '+1', '08949452149', 'testing85000@gmail.com', 'Tanveer Khan', '+1', '08949452149', 'farmaan@gmail.com', '28000', '12', '2', 150.00, 75.00, '5', '4', '3', '3', 'fd sads dsadsa dsa', 0, '28000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-11 09:44:45', '2021-01-11 09:44:45'),
(187, 4, 'Tanveer Khan', '+1', '08949452149', 'admin@mailinator.com', NULL, NULL, NULL, NULL, '3029', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '3029', 2, '19', '20', '4.1', '', '', '', '', '', '', '', '', '1736.36', 1, 1, 0, '2021-01-11 11:40:07', '2021-01-11 11:40:07'),
(188, 4, 'Tanveer Khan', '+1', '08949452149', 'admin@mailinator.com', NULL, NULL, NULL, NULL, '3029', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '3029', 2, '19', '20', '4.1', '', '', '', '', '', '', '', '', '1736.36', 1, 1, 0, '2021-01-11 11:40:08', '2021-01-11 11:40:08'),
(189, 4, 'Tanveer Khan', '+1', '08949452149', 'admin@mailinator.com', NULL, NULL, NULL, NULL, '3029', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '3029', 2, '19', '20', '4.1', '', '', '', '', '', '', '', '', '1736.36', 1, 1, 0, '2021-01-11 11:40:15', '2021-01-11 11:40:15'),
(190, 4, 'Test', '+91', '8949452149', 'testing85000@gmail.com', 'Tanveer Khan', '+91', '8949452149', 'testing85000@gmail.com', '23424324', '324324324', '1', 324324.00, 234234.00, '5', '1', '5', '1', 'we need this', 0, '23424324', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-11 13:49:02', '2021-01-11 13:49:02'),
(191, 4, 'Tanveer Khan', '+1', '08949452149', 'admin@mailinator.com', 'Tanveer Khan', '+1', '08949452149', 'testing85000@gmail.com', '432432432', '23432', '1', 324.00, 324.00, '2', '1', '5', '1', 'sdfdsfdsfdsfds', 0, '432432432', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-11 14:04:59', '2021-01-11 14:04:59'),
(192, 8, 'Tanveer Khan', '+1', '08949452149', 'tanveerk8500@gmail.com', 'Tanveer Khan', '+1', '08949452149', 'farmaan@gmail.com', '34234', '343', '4', 34324.00, 32432.00, '4', '2', '4', '2', 's dsf ds', 0, '34234', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-12 04:42:19', '2021-01-12 04:42:19'),
(193, 8, 'Tanveer Khan', '+1', '08949452149', 'tanveerk8500@gmail.com', 'Tanveer Khan', '+1', '08949452149', 'farmaan@gmail.com', '3423434', '343', '4', 34324.00, 32432.00, '1', '1', '1', '1', 's dsf ds', 0, '3423434', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-12 04:42:55', '2021-01-12 04:42:55'),
(194, 16, 'Sanjay Singh Technource', '+91', '9724468081', 'sanjayr2810@gmail.com', 'Techno Source Web Pvt Ltd', '+91', '7940370882', 'technource@gmail.com', '14000000', '5', '2', 500000.00, 500000.00, '2', '3', '2', '2', 'Lets check this', 0, '14000000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-12 11:47:03', '2021-01-12 11:47:03'),
(195, 16, 'Sanjay Singh Technource', '+91', '9724468081', 'sanjayr2810@gmail.com', 'Techno Source Web Pvt Ltd', '+91', '7940370882', 'technource@gmail.com', '14000000', '10', '2', 500000.00, 500000.00, '2', '3', '2', '2', 'Lets check this', 0, '14000000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-12 11:54:32', '2021-01-12 11:54:32'),
(196, 16, 'Sanjay Singh Technource', '+91', '9724468081', 'sanjayr2810@gmail.com', 'Techno Source Web Pvt Ltd', '+91', '7940370882', 'technource@gmail.com', '15500000', '10', '5', 900000.00, 550000.00, '2', '3', '2', '2', 'Lets check this', 0, '15500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-12 11:55:44', '2021-01-12 11:55:44'),
(197, 16, 'Sanjay Singh Rajpurohit', '+91', '8238605801', 'sanjayr2810@gmail.com', 'Sanjay Singh', '+91', '8238605801', 'sanjayr2810@gmail.com', '1500000', '800', '4', 90000.00, 90000.00, '2', '2', '2', '2', 'Lets see', 0, '1500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-12 16:57:00', '2021-01-12 16:57:00'),
(198, 6, 'Jay Sorathia', '+91', '9033841243', 'admin@mailinator.com', NULL, NULL, NULL, NULL, '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2000', 1, '20', '20', '3', '', '', '', '', '', '', '', '', '467.57', 1, 1, 0, '2021-01-13 14:49:09', '2021-01-13 14:49:09'),
(199, 8, 'Tanveer Khan', '+1', '08949452149', 'admin@gmail.com', 'Tanveer Khan', '+1', '08949452149', 'testing85000@gmail.com', '1232132', '12', '1', 150.00, 75.00, '5', '5', '5', '5', 'dfsf sdfds fds fds', 0, '1232132', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-16 13:30:47', '2021-01-16 13:30:47'),
(200, 8, 'Marrof Ali', '+91', '1234343434', 'maroof@mailinator.com', 'Buyer Name', '+91', '123456565', 'Buyer@mailinator.com', '30000', '100', '1', 150.00, 75.00, '1', '0', '1', '0', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 0, '30000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-18 09:08:01', '2021-01-18 09:08:01'),
(201, 8, 'Marrof Ali', '+91', '1234343434', 'maroof@mailinator.com', 'Buyer Name', '+91', '123456565', 'Buyer@mailinator.com', '30000', '100', '1', 150.00, 75.00, '3', '4', '3', '3', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 0, '30000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-18 09:08:48', '2021-01-18 09:08:48'),
(202, 8, 'Marrof Ali', '+91', '1234343434', 'maroof@mailinator.com', 'Buyer Name', '+91', '123456565', 'Buyer@mailinator.com', '30001', '13', '2', 150.00, 75.00, '5', '4', '3', '3', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 0, '30001', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-18 09:10:14', '2021-01-18 09:10:14'),
(203, 8, 'Marrof Ali', '+91', '1234343434', 'maroof@mailinator.com', 'Buyer Name', '+91', '123456565', 'Buyer@mailinator.com', '30001', '11', '2', 150.00, 75.00, '5', '4', '3', '3', 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make', 0, '30001', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-18 09:10:36', '2021-01-18 09:10:36'),
(211, 18, 'srftretet', '+1', '435435435', 'testing85000@gmail.com', 'sdfdsfd', '+1', '32423432423', 'tanv@gmail.com', '23', '100', '1', 0.12, 0.06, '5', '1', '2', '1', '', 0, '23', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-18 10:44:51', '2021-01-18 10:44:51'),
(212, 18, '123User', '+1', '76575656', 'tanveer@technource.com', '123Buyer', '+1', '34324324', '123Byer@gmail.com', '12', '12', '1', 0.06, 0.03, '5', '1', '5', '1', 'sdefdsfdsf', 0, '12', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 2, '2021-01-18 11:26:40', '2021-01-19 17:33:05'),
(213, 14, 'rishi', '+91', '8302347093', 'rishitechnource@mailinator.com', 'test', '+91', '8302347090', 'rishitechnource@mailinator.com', '5000', '20', '3', 25.00, 0.00, '3', '2', '3', '2', 'Test', 0, '5000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-18 11:32:59', '2021-01-18 11:32:59'),
(214, 14, 'rishi', '+1', '798798', 'rishitechnource@mailinator.com', NULL, NULL, NULL, NULL, '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '20000', 1, '20', '15', '5', '', '', '', '', '', '', '', '', '600', 1, 1, 0, '2021-01-18 13:30:08', '2021-01-18 13:30:08'),
(215, 21, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'Jay', '+91', '9033841243', 'jay.technource@gmail.com', '10000', '200', '2', 40.00, 0.00, '2', '2', '2', '2', 'gfs', 0, '10000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-18 15:30:09', '2021-01-18 15:30:09'),
(216, 21, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'Jay', '+91', '9033841243', 'jay.technource@gmail.com', '20000', '100', '2', 40.00, 0.00, '2', '2', '2', '2', 'gfs', 0, '20000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-18 15:31:43', '2021-01-18 15:31:43'),
(217, 21, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'Jay', '+91', '9033841243', 'jay.technource@gmail.com', '20000', '100', '2', 400.00, 0.00, '2', '2', '2', '2', 'gfs', 0, '20000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-18 15:32:02', '2021-01-18 15:32:02'),
(218, 17, 'Sanjay Singh Rajpurohit', '+91', '8238605801', 'sanjayr2810@gmail.com', 'Sanjay Singh', '+91', '8238605801', 'sanjayr2810@gmail.com', '1550000', '10', '5', 7750.00, 0.00, '5', '2', '2', '2', 'Lets see', 1, '1550000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-19 08:22:00', '2021-01-19 08:23:29'),
(219, 16, 'Sanjay Singh Rajpurohit', '+91', '8238605801', 'sanjayr2810@gmail.com', 'Sanjay Singh', '+91', '8238605801', 'sanjayr2810@gmail.com', '17000000', '10', '5', 85000.00, 0.00, '5', '2', '3', '2', 'Lets see', 0, '17000000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-19 09:23:55', '2021-01-19 09:23:55'),
(220, 16, 'Sanjay Singh Rajpurohit', '+91', '8238605801', 'sanjayr2810@gmail.com', 'Sanjay Singh', '+91', '8238605801', 'sanjayr2810@gmail.com', '15000000', '9', '2', 80000.00, 0.00, '5', '2', '3', '5', 'Lets see', 0, '15000000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-19 09:25:21', '2021-01-19 09:25:21'),
(221, 24, 'rishi', '+1', '345435', 'rishitechnource@mailinator.com', 'test', '+1', '342339', 'rishitechnource@mailinator.com', '300000', '100', '4', 1500.00, 0.00, '4', '4', '4', '4', 'we', 0, '300000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 2, '2021-01-19 15:10:44', '2021-01-29 07:14:40'),
(222, 23, 'Sanjay Singh Rajpurohit', '+91', '8238605801', 'sanjayr2810@gmail.com', NULL, NULL, NULL, NULL, '170000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '170000000', 1, '20', '15', '3', '', '', '', '', '', '', '', '', '4000', 1, 1, 0, '2021-01-20 08:54:47', '2021-01-20 08:54:47'),
(223, 24, 'Rishi', '+1', '232121', 'rishitechnource@mailinator.com', 'Rishi', '+1', '23424', 'rishitechnource@mailinator.com', '3123123', '231', '4', 15615.61, 0.00, '3', '3', '3', '3', 'ew', 0, '3123123', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 1, '2021-01-20 09:10:15', '2021-01-29 07:14:46'),
(224, 24, 'Rishi', '+1', '232121', 'rishitechnource@mailinator.com', 'Rishi', '+1', '23424', 'rishitechnource@mailinator.com', '3123123', '100', '4', 15615.61, 0.00, '4', '4', '4', '4', 'ew', 0, '3123123', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 2, '2021-01-20 09:10:52', '2021-01-29 07:12:39'),
(225, 22, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', NULL, NULL, NULL, NULL, '85000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '85000', 1, '20', '15', '3', '', '', '', '', '', '', '', '', '400', 1, 1, 0, '2021-01-20 12:24:53', '2021-01-20 12:24:53');
INSERT INTO `offers` (`offer_id`, `property_id`, `name`, `phone_code`, `phone`, `email`, `buyer_name`, `buyer_ph_code`, `buyer_phone`, `buyer_email`, `sale_price`, `seller_concessions`, `settlement_date`, `emd`, `due_diligence`, `finance`, `appraisal`, `inspection`, `home_sale`, `additional_note`, `contract_received`, `buyer_offer`, `intend_to_pay`, `down_payment`, `loan_term`, `interest_rate`, `est_cash_to_close`, `closing_cost`, `insurance`, `property_taxes`, `other_fees`, `mortgage`, `mortgage_insurance`, `hoa`, `estimated_payment`, `user_type`, `pre_approved`, `offer_status`, `created_at`, `updated_at`) VALUES
(226, 22, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'Jay', '+91', '9033841243', 'jay.technource@gmail.com', '500000', '50', '1', 2500.00, 0.00, '5', '1', '1', '1', 'reyre', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-20 12:28:48', '2021-01-20 12:28:48'),
(227, 22, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'Jay', '+91', '9033841243', 'jay.technource@gmail.com', '500000', '50', '1', 2500.00, 0.00, '1', '1', '1', '1', 'fasds', 0, '500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-20 12:31:00', '2021-01-20 12:31:00'),
(228, 8, 'Tanveer Khan', '+1', '232132132', 'cw_offer@mailinator.com', NULL, NULL, NULL, NULL, '31717', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '31717', 1, '50', '15', '4.4', '32034.17', '317.17', '100', '200', '200', '0.00', '0.00', '0', '500', 1, 1, 0, '2021-01-20 12:43:50', '2021-01-20 12:43:50'),
(229, 8, 'Tanveer Khan', '+1', '342432', 'testing85000@gmail.com', 'wewwe', '+1', '43535435', 'wqeqe@gmai.com', '123232', '12', '1', 616.16, 308.08, '5', '1', '5', '1', 'testing', 0, '123232', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-20 12:48:16', '2021-01-20 12:48:16'),
(230, 22, 'admin', '+91', '9033841243', 'admin@mailinator.com', NULL, NULL, NULL, NULL, '90764', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '90764', 1, '20', '15', '3', '91671.64', '907.64', '100', '100', '100', '0.00', '0.00', '100', '400', 1, 1, 0, '2021-01-20 13:20:49', '2021-01-20 13:20:49'),
(231, 5, 'Tanveer Khan', '+91', '8947069009', 'cw_offer@mailinator.com', NULL, NULL, NULL, NULL, '4221', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '4221', 1, '56', '30', '4.4', '4263.21', '42.21', '100', '100', '20', '0.00', '0.00', '0', '220', 1, 1, 0, '2021-01-21 05:02:26', '2021-01-21 05:02:26'),
(232, 5, 'Tanveer Khan', '+1', '8947069009', 'testing85000@gmail.com', NULL, NULL, NULL, NULL, '4000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '4000', 2, '30', '20', '4', '1320', '120', '100', '100', '20', '17.12', '0', '0', '237.12', 1, 1, 0, '2021-01-21 05:26:16', '2021-01-21 05:26:16'),
(233, 5, 'Tanveer Khan', '+1', '8947069009', 'testing85000@gmail.com', NULL, NULL, NULL, NULL, '4000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '4000', 1, '30', '20', '4', '4040', '40', '100', '100', '20', '0.00', '0.00', '0', '220', 1, 1, 0, '2021-01-21 05:27:18', '2021-01-21 05:27:18'),
(234, 5, 'Tanveer Khan', '+1', '8947069009', 'testing85000@gmail.com', 'Tanveer Khjan', '+1', '123213213', 'wqeqe@gmai.com', '11232', '12', '1', 56.16, 0.00, '2', '1', '2', '1', 'sad sadsads adsa dsadas', 0, '11232', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-21 05:29:27', '2021-01-21 05:29:27'),
(235, 5, 'Tanveer Khan', '+1', '4543543543', 'testing85000@gmail.com', NULL, NULL, NULL, NULL, '4300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '4300', 2, '20', '30', '4', '989', '129', '100', '100', '20', '16.42', '0', '0', '236.42', 1, 1, 0, '2021-01-21 05:41:15', '2021-01-21 05:41:15'),
(236, 5, 'Tanveer Khan', '+1', '4543543543', 'testing85000@gmail.com', NULL, NULL, NULL, NULL, '4200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '4200', 1, '20', '30', '4', '4242', '42', '100', '100', '20', '0.00', '0.00', '0', '220', 1, 1, 0, '2021-01-21 05:42:57', '2021-01-21 05:42:57'),
(237, 5, 'Tanveer Khan', '+1', '2324234324', 'cw_offer@mailinator.com', 'wewwe', '+1', '243242343', 'wqeqe@gmai.com', '232132', '12', '1', 1160.66, 0.00, '1', '1', '1', '1', 'h jh gshdfdsg sdfdsf dsf ds fdsf dsf s', 0, '232132', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 2, '2021-01-21 05:47:26', '2021-01-21 09:59:06'),
(238, 22, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'Jay', '+91', '9033841243', 'jay.technource@gmail.com', '8500000', '50', '1', 42500.00, 0.00, '1', '1', '1', '1', 'hi', 0, '8500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-21 09:44:58', '2021-01-21 09:44:58'),
(239, 22, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'Jay', '+91', '9033784124', 'jay.technource@gmail.com', '9852145', '80', '1', 49260.72, 0.00, '5', '1', '1', '1', 'hi', 0, '9852145', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-21 09:47:03', '2021-01-21 09:47:03'),
(240, 22, 'Jay Sorathia', '+91', '9033841243', 'admin@mailinator.com', NULL, NULL, NULL, NULL, '85899', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '85899', 1, '20', '15', '3', '86729.71', '858.71', '100', '100', '100', '0.00', '0.00', '100', '400', 1, 1, 0, '2021-01-21 09:50:01', '2021-01-21 09:50:01'),
(241, 22, 'Jay Sorathia', '+91', '9033841243', 'admin@mailinator.com', NULL, NULL, NULL, NULL, '85000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '85000', 2, '12', '20', '3', '13600', '2550', '100', '100', '100', '410.12', '23.66', '100', '833.78', 1, 1, 0, '2021-01-21 09:56:45', '2021-01-21 09:56:45'),
(242, 13, 'swht0209', '+1', '7033491529', 'swht0209@cityworth.com', 'Terrabyte', '+1', '7777777777', 'swht0245@cityworth.com', '256000', '456', '4', 1280.00, 0.00, '4', '2', '2', '4', '', 0, '256000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-21 21:48:09', '2021-01-21 21:48:09'),
(243, 13, 'swht0209', '+1', '7033491529', 'swht0209@cityworth.com', 'Terrabyte', '+1', '7777777777', 'swht0245@cityworth.com', '500000', '456', '4', 2500.00, 0.00, '4', '2', '2', '4', '', 0, '500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-21 21:48:29', '2021-01-21 21:48:29'),
(244, 13, 'swht0209', '+1', '7777777777', 'swht0209@cityworth.com', NULL, NULL, NULL, NULL, '4196281', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '4196281', 1, '46', '30', '3', '4239579.03', '41976.03', '1', '1', '1', '0.00', '0.00', '1', '4', 1, 1, 0, '2021-01-21 21:50:10', '2021-01-21 22:02:29'),
(245, 13, 'Bear', '+1', '7777777777', 'bear@cityworth.com', 'adfas', '+1', '1111111111', 'bear@cityworth.com', '250000', '500', '3', 1250.00, 0.00, '3', '4', '1', '2', '', 1, '250000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-21 22:04:54', '2021-01-21 22:50:25'),
(246, 14, 'Jim Test', '+1', '7033491529', 'swht0245@cityworth.com', 'Brigadier', '+1', '7033491529', 'swht0245@cityworth.com', '250000', '60', '5', 1250.00, 0.00, '3', '0', '0', '3', 'Git Gud', 0, '250000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 2, '2021-01-21 22:20:48', '2021-01-21 23:05:16'),
(247, 23, 'Coca Cola', '+1', '7777777777', 'swht0212@cityworth.com', 'Brigg', '+1', '7777777777', 'swht0245@cityworth.com', '45000', '200', '3', 225.00, 0.00, '3', '4', '2', '2', 'Sup', 0, '45000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-21 22:40:15', '2021-01-21 22:40:15'),
(248, 13, 'Simba', '+1', '7033491529', 'swht09999@cityworth.com', NULL, NULL, NULL, NULL, '4256661', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '4256661', 2, '62', '15', '5.2', '2766829.65', '127699.83', '150', '30000', '40', '12960.49', '0', '50', '43200.49', 1, 1, 0, '2021-01-21 22:43:33', '2021-01-21 22:43:33'),
(249, 22, 'jkl', '+1', '7033491529', 'swht09999@cityworth.com', 'sdf', '+1', '777777777', 'swht0245@cityworth.com', '123523', '12312321312', '2', 617.62, 0.00, '5', '3', '1', '5', 'seatestaste', 0, '123523', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-21 22:46:12', '2021-01-21 22:46:12'),
(250, 22, 'jkl', '+1', '7033491529', 'swht09999@cityworth.com', 'sdf', '+1', '777777777', 'swht0245@cityworth.com', '123523', '12312321312', '2', 617.62, 0.00, '5', '3', '1', '5', 'seatestaste', 0, '123523', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-21 22:47:01', '2021-01-21 22:47:01'),
(257, 13, 'swht0212', '+1', '7033491529', 'swht0212@cityworth.com', 'ssdfsdf', '+1', '7033491529', 'swh0220@cityworth.com', '450000', '500', '2', 2250.00, 0.00, '5', '2', '4', '3', 'Big Gains', 0, '450000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-21 23:18:15', '2021-01-21 23:18:15'),
(258, 13, 'Big Dream', '+1', '7859622501', 'bigdreams@cityworth.com', NULL, NULL, NULL, NULL, '4000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '4000000', 2, '80', '30', '2.8', '3320000', '120000', '150', '30000', '40', '3287.16', '0', '50', '33527.16', 1, 1, 0, '2021-01-21 23:23:23', '2021-01-21 23:23:23'),
(259, 6, 'gts', '+1', '7032614487', 'gts12221@cityworth.com', '', '+1', '', '', '', '', '0', 10.00, 0.00, '0', '0', '0', '0', '', 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-22 17:12:17', '2021-01-22 17:12:17'),
(260, 6, 'gts', '+1', '7032225555', 'gts122211@cityworth.com', '', '+1', '', '', '', '', '0', 10.00, 0.00, '0', '0', '0', '0', '', 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-22 17:15:21', '2021-01-22 17:15:21'),
(261, 21, 'Chriz Yo', '+1', '7576101510', 'chollomon@cityworth.com', NULL, NULL, NULL, NULL, '20312', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '20312', 2, '24', '20', '3.2', '5484.24', '609.36', '100', '100', '100', '87.17', '0', '100', '487.17', 1, 1, 0, '2021-01-22 17:30:04', '2021-01-22 17:30:04'),
(262, 6, 'Christelle Hollomon', '+1', '7576101510', 'christellehollomon@gmail.com', NULL, NULL, NULL, NULL, '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2000', 2, '40', '15', '4', '860', '60', '100', '122', '212', '8.88', '0', '0', '442.88', 1, 1, 0, '2021-01-22 17:33:27', '2021-01-22 17:33:27'),
(263, 6, 'Christelle Hollomon', '+1', '7576101510', 'christellehollomon@gmail.com', NULL, NULL, NULL, NULL, '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2000', 2, '50', '15', '4', '1060', '60', '100', '122', '212', '7.4', '0', '0', '441.4', 1, 1, 0, '2021-01-22 17:34:15', '2021-01-22 17:34:15'),
(264, 6, 'Christelle Hollomon', '+1', '7576101510', 'christellehollomon@gmail.com', NULL, NULL, NULL, NULL, '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2000', 2, '50', '15', '6', '1060', '60', '100', '122', '212', '8.44', '0', '0', '442.44', 1, 1, 0, '2021-01-22 17:35:03', '2021-01-22 17:35:03'),
(265, 6, 'Christelle Hollomon', '+1', '7576101510', 'christellehollomon@gmail.com', NULL, NULL, NULL, NULL, '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2000', 2, '45', '15', '4.2', '960', '60', '100', '122', '212', '8.25', '0', '0', '442.25', 1, 1, 0, '2021-01-22 17:37:18', '2021-01-22 17:37:18'),
(266, 13, 'Sugar Ray', '+1', '7033491529', 'swht0214@cityworth.com', 'Terrabyte', '+1', '7777777777', 'swht0216@cityworth.com', '4500000', '45', '3', 22500.00, 0.00, '5', '3', '3', '3', 'LETS GOOOOOOOOOOOO', 0, '4500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-22 17:59:42', '2021-01-22 17:59:42'),
(267, 6, 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', '444444', '0', '1', 2222.22, 0.00, '2', '1', '0', '2', '', 0, '444444', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-22 18:59:18', '2021-01-22 18:59:18'),
(268, 6, 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', '444444', '0', '2', 2222.22, 0.00, '3', '2', '4', '2', '', 0, '444444', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-22 19:02:04', '2021-01-22 19:02:04'),
(269, 6, 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', NULL, NULL, NULL, NULL, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2200', 2, '3', '30', '3', '132', '66', '100', '122', '212', '9', '1.24', '0', '444.24', 1, 1, 0, '2021-01-23 13:24:18', '2021-01-23 13:24:18'),
(270, 6, 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', '444444', '0', '2', 2222.22, 0.00, '2', '1', '1', '2', '', 0, '444444', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-23 13:26:22', '2021-01-23 13:26:22'),
(271, 6, 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', '444444', '0', '2', 2222.22, 0.00, '2', '1', '3', '4', '', 0, '444444', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-23 13:27:29', '2021-01-23 13:27:29'),
(272, 6, 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', '444444', '0', '2', 2222.22, 0.00, '3', '2', '4', '3', '', 0, '444444', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 1, '2021-01-23 13:28:15', '2021-01-25 11:59:35'),
(273, 6, 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', 'David Shumway', '+1', '17037727925', 'davids@cityworth.com', '444444', '0', '2', 2222.22, 0.00, '3', '2', '4', '2', '', 0, '444444', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 2, '2021-01-23 13:28:31', '2021-01-25 11:59:26'),
(274, 8, 'Tanveer Khan', '+1', '324234324', 'testing85000@gmail.com', NULL, NULL, NULL, NULL, '30824', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '30824', 2, '13', '20', '4.2', '4931.84', '924.72', '100', '200', '200', '165.35', '8.58', '0', '673.93', 1, 1, 0, '2021-01-25 11:58:05', '2021-01-25 11:58:05'),
(275, 8, 'Tanveer Khan', '+1', '324234324', 'testing85000@gmail.com', NULL, NULL, NULL, NULL, '31149', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '31149', 1, '13', '20', '4.2', '31441.3', '311.3', '100', '200', '200', '0.00', '0.00', '0', '500', 1, 1, 0, '2021-01-25 11:58:32', '2021-01-25 11:58:32'),
(276, 9, 'Tanveer Khan', '+1', '23213', 'testing85000@gmail.com', NULL, NULL, NULL, NULL, '10301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '10301', 2, '14', '20', '3.7', '1751.17', '309.03', '2000', '1000', '1000', '52.29', '2.83', '100', '4155.12', 1, 1, 2, '2021-01-25 12:03:00', '2021-01-25 15:35:34'),
(277, 9, 'Tanveer Khan', '+1', '23213', 'testing85000@gmail.com', NULL, NULL, NULL, NULL, '10532', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '10532', 1, '14', '20', '3.7', '10627.22', '105.22', '2000', '1000', '1000', '0.00', '0.00', '100', '4100', 1, 1, 0, '2021-01-25 12:03:19', '2021-01-25 12:03:19'),
(278, 9, 'Tanveer Khan', '+1', '23213', 'testing85000@gmail.com', NULL, NULL, NULL, NULL, '10532', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '10532', 2, '14', 'FHA', '4.3', '1790.44', '315.96', '2000', '1000', '1000', '44.29', '2.9', '100', '4147.19', 1, 1, 1, '2021-01-25 12:35:08', '2021-01-25 15:37:29'),
(279, 9, 'Tanveer Khan', '+1', '23213', 'testing85000@gmail.com', NULL, NULL, NULL, NULL, '10532', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '10532', 2, '14', 'VA', '4.3', '1790.44', '315.96', '2000', '1000', '1000', '44.82', '0', '100', '4144.82', 1, 1, 2, '2021-01-25 12:38:05', '2021-01-25 15:35:28'),
(280, 13, 'swht0210', '+1', '7033491529', 'swht0210@cityworth.com', NULL, NULL, NULL, NULL, '4000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '4000000', 1, '20', '15', '3', '4040000', '40000', '150', '30000', '40', '0.00', '0.00', '50', '30240', 1, 1, 0, '2021-01-26 16:10:48', '2021-01-26 16:10:48'),
(281, 13, 'swht0200', '+1', '7033491529', 'swht0210@cityworth.com', 'swht208', '+1', '7033491529', 'swht0208@cityworth.com', '850000', '5000', '3', 4250.00, 0.00, '5', '3', '3', '3', 'What', 0, '850000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-26 16:16:42', '2021-01-26 16:16:42'),
(282, 8, 'swht0210', '+1', '7033491529', 'swht0210@cityworth.com', 'Yasserian', '+1', '7033491529', 'swht0207@cityworth.com', '500000', '5000', '2', 2500.00, 1250.00, '2', '2', '2', '2', 'Round 3', 0, '500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-26 16:20:48', '2021-01-26 16:20:48'),
(283, 13, 'swht0209', '+1', '7033491529', 'swht2010@cityworth.com', NULL, NULL, NULL, NULL, '3988244', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '3988244', 1, '20', '15', '3', '4025454.99', '39855.99', '150', '30000', '40', '0.00', '0.00', '50', '30240', 1, 1, 0, '2021-01-26 16:58:54', '2021-01-26 16:58:54'),
(284, 13, 'swht0209', '+1', '7033491529', 'swht0210@cityworth.com', 'Terrabyte', '+1', '7033491529', 'swht0245@cityworth.com', '500000', '250000', '2', 2500.00, 0.00, '3', '1', '2', '4', 'Please', 0, '500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-26 17:02:41', '2021-01-26 17:02:41'),
(285, 6, 'MR S', '+1', '7033491529', 'swht0207@cityworth.com', 'TimeTables', '+1', '7033491529', 'swht0208@cityworth.com', '450000', '40', '2', 2250.00, 0.00, '4', '2', '3', '2', '', 0, '450000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-26 17:05:40', '2021-01-26 17:05:40'),
(286, 23, 'swht0209', '+1', '7033491529', 'swht0209@cityworth.com', NULL, NULL, NULL, NULL, '170000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '170000000', 1, '20', '15', '3', '171700000', '1700000', '1000', '1500', '1000', '0.00', '0.00', '500', '4000', 1, 1, 0, '2021-01-26 19:04:54', '2021-01-26 19:04:54'),
(287, 6, 'Tablet test', '+1', '7033491529', 'swht0200@cityworth.com', NULL, NULL, NULL, NULL, '1942', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '1942', 2, '20', '15', '3', '486.68', '63.48', '100', '122', '212', '11.69', '0', '0', '445.69', 1, 1, 0, '2021-01-26 20:26:45', '2021-01-26 20:26:45'),
(288, 6, 'Los Alamos', '+1', '7033491529', 'swht0208@cityworth.com', 'Imba', '+1', '7033491529', 'swht0200@cityworth.com', '25000', '2000', '2', 125.00, 0.00, '5', '2', '2', '0', 'Lets gooooooooooooo', 0, '25000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-26 20:31:42', '2021-01-26 20:31:42'),
(289, 6, 'Billie Jean', '+1', '7033491529', 'swht0209@cityworth.com', 'Springhill', '+1', '7033491529', 'swht0210@cityworth.com', '4500000', '50000', '2', 22500.00, 0.00, '5', '4', '3', '4', '', 0, '4500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-26 20:36:02', '2021-01-26 20:36:02'),
(290, 6, 'Billie Jean', '+1', '7033491529', 'swht0209@cityworth.com', 'Springhill', '+1', '7033491529', 'swht0210@cityworth.com', '4500000', '500000', '1', 22500.00, 0.00, '5', '4', '3', '4', '', 0, '4500000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-26 20:36:27', '2021-01-26 20:36:27'),
(291, 6, 'Simps R Us', '+1', '7033491529', 'swht0200@cityworth.com', 'Twitch Stream', '+1', '7033491529', 'swht0209@cityworth.com', '2500000', '5000', '2', 12500.00, 0.00, '0', '4', '2', '3', 'abcdefg', 0, '2500000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-26 20:44:23', '2021-01-26 20:44:23'),
(292, 6, 'Twitch Stream', '+1', '7033491529', 'swht0209@cityworth.com', 'Imba', '+1', '7033491529', 'swht0200@cityworth.com', '250000', '23000', '1', 1250.00, 0.00, '1', '1', '1', '1', 'Get Gud', 0, '250000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-26 20:47:03', '2021-01-26 20:47:03'),
(293, 6, 'swthji', '+1', '7033491529', 'swht0200@cityworth.com', NULL, NULL, NULL, NULL, '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2000', 2, '63', 'VA', '3', '1320', '60', '100', '122', '212', '3.12', '0', '0', '437.12', 1, 1, 0, '2021-01-26 20:56:47', '2021-01-26 20:56:47'),
(294, 6, 'swht0200', '+1', '7033491529', 'swht0200@cityworth.com', NULL, NULL, NULL, NULL, '2000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2000', 1, '26', '15', '3', '2020', '20', '100', '122', '212', '0.00', '0.00', '0', '434', 1, 1, 0, '2021-01-26 21:13:33', '2021-01-26 21:13:33'),
(295, 22, 'Jay Sorathia', '+91', '9033841243', 'jaysorathia@mailinator.com', NULL, NULL, NULL, NULL, '85000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '85000', 1, '20', '15', '3', '85850', '850', '100', '100', '100', '0.00', '0.00', '100', '400', 1, 1, 1, '2021-01-27 11:35:03', '2021-01-27 11:37:25'),
(296, 6, 'gts1', '+1', '7034477776', 'gtstest1@cityworth.com', NULL, NULL, NULL, NULL, '2159', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2159', 2, '20', '30', '3', '496.57', '64.77', '100', '122', '212', '7.28', '0', '0', '441.28', 1, 1, 0, '2021-01-28 14:41:42', '2021-01-28 14:41:42'),
(297, 6, 'Tommy Shumway', '+1', '7033491489', 'TShumway@cityworthhomes.com', NULL, NULL, NULL, NULL, '2200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2200', 2, '20', '30', '3', '506', '66', '100', '122', '212', '7.42', '0', '0', '441.42', 1, 1, 0, '2021-01-28 16:27:26', '2021-01-28 16:27:26'),
(298, 6, 'Taylor Billingsley', '+1', '7037851086', 'tbillingsley@cityworthproperties.com', 'Avery', '+1', '7037851086', 'tgbills03@hotmail.com', '600000', '20000', '2', 6000.00, 0.00, '1', '1', '1', '1', '', 0, '600000', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2021-01-28 16:29:48', '2021-01-28 16:29:48'),
(299, 24, 'Jay Test', '+91', '9033841243', 'jay.technource@gmail.com', NULL, NULL, NULL, NULL, '150000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '150000', 2, '20', '15', '3', '34500', '4500', '20000', '200', '100', '828.7', '0', '50', '21178.7', 1, 1, 2, '2021-01-29 11:14:39', '2021-01-29 11:15:18'),
(300, 9, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'JNS', '+91', '9033841243', 'jay.technource@gmail.com', '850000', '100', '1', 4250.00, 0.00, '5', '1', '1', '1', 'sfsf', 0, '850000', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-29 12:09:48', '2021-01-29 12:09:48'),
(301, 9, 'Tanveer Khan', '+1', '8967452367', 'testing85000@gmail.com', NULL, NULL, NULL, NULL, '11000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '11000', 2, '20', '20', '3', '2530', '330', '2000', '1000', '1000', '48.8', '0', '100', '4148.8', 1, 1, 0, '2021-01-29 12:35:26', '2021-01-29 12:35:26'),
(302, 4, 'Tanveer Khan', '+91', '8947069009', 'testing85000@gmail.com', NULL, NULL, NULL, NULL, '3192', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '3192', 2, '15', '30', '3.4', '574.56', '95.76', '1200', '344', '122', '12.03', '0.46', '0', '1678.49', 1, 1, 0, '2021-01-29 12:36:22', '2021-01-29 12:36:22'),
(303, 9, 'Jay', '+91', '9033841243', 'jay.technource@gmail.com', NULL, NULL, NULL, NULL, '10226', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '10226', 1, '34', '15', '3.7', '10328.26', '102.26', '2000', '1000', '1000', '0.00', '0.00', '100', '4100', 1, 1, 0, '2021-01-29 12:54:14', '2021-01-29 12:54:14'),
(304, 9, 'JAY', '+91', '9033841243', 'jay.technource@gmail.com', NULL, NULL, NULL, NULL, '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '10000', 1, '36', '15', '3', '10100', '100', '2000', '1000', '1000', '0.00', '0.00', '100', '4100', 1, 1, 0, '2021-01-29 12:55:13', '2021-01-29 12:55:13'),
(305, 9, 'Jay Sorathia', '+91', '9033841243', 'jay.technource@gmail.com', 'admin', '+91', '9033841243', 'jay.technource@gmail.com', '2131553', '100', '1', 10657.76, 0.00, '5', '1', '1', '1', 'fsaf', 0, '2131553', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, '2021-01-29 12:56:18', '2021-01-29 12:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `property_id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `tranc_coordinator_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realtors_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=From Google,2=Manual',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manual_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_price` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_sales_price` int(11) DEFAULT NULL,
  `seller_concessions` int(11) DEFAULT NULL,
  `settlement_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emd` double(10,2) DEFAULT NULL,
  `due_diligence` double(10,2) DEFAULT NULL,
  `finance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appraisal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inspection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_sale` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoa` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive, 2=under contract,3=closed, 4=contract signed',
  `offer_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1=Accepted,0=pending,2=denied,3=waiting',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`property_id`, `seller_id`, `tranc_coordinator_name`, `realtors_name`, `address_type`, `address`, `manual_address`, `latitude`, `longitude`, `city`, `state`, `country`, `zip_code`, `listing_price`, `min_sales_price`, `seller_concessions`, `settlement_date`, `emd`, `due_diligence`, `finance`, `appraisal`, `inspection`, `home_sale`, `insurance`, `property_tax`, `other_fee`, `hoa`, `listing_status`, `offer_status`, `created_at`, `updated_at`) VALUES
(4, 7, 'maculam', 'harish', '1', 'Usal Beach Campground, Whitethorn, CA, USA', '', '39.8317707', '-123.8471395', 'Mendocino County', 'California', 'United States', '95589', '3000', 2900, 100, '[\"1\",\"2\"]', 15.00, 7.50, '[\"1\",\"2\"]', '[\"2\",\"3\"]', '[\"2\"]', '[\"1\",\"2\"]', '1200', '344', '122', NULL, 2, 1, '2020-12-08 00:52:32', '2020-12-30 13:34:05'),
(5, 7, 'maculamss', 'harishsa', '1', 'California City, CA, USA', '', '35.125801', '-117.9859038', 'Kern County', 'California', 'United States', '', '4000', 3800, 200, '[\"2\"]', 20.00, 10.00, '[\"1\",\"2\"]', '[\"2\",\"3\"]', '[\"2\",\"3\"]', '[\"2\",\"3\"]', '100', '100', '20', '100', 1, 1, '2020-12-10 00:18:48', '2021-01-25 15:43:10'),
(6, 7, 'Ashich', 'Asu', '1', '3013 Applebrook Ln, Oakton, VA 22124', '', '', '', '', 'North Carolina', 'United States', '', '2000', 1800, 200, '[\"2\"]', 10.00, 5.00, '[\"3\"]', '[\"2\"]', '[\"4\"]', '[\"2\"]', '100', '122', '212', NULL, 1, 1, '2020-12-10 11:50:14', '2021-01-25 11:59:35'),
(8, 8, 'Morrish', 'Marian', '1', 'North Carolina Museum of Art, Blue Ridge Road, Raleigh, NC, USA', '', '35.8100915', '-78.7023275', 'Wake County', 'North Carolina', 'United States', '27607', '30000', 27000, 12, '[\"2\"]', 150.00, 75.00, '[\"3\"]', '[\"4\"]', '[\"2\",\"3\"]', '[\"3\"]', '100', '200', '200', NULL, 1, 1, '2020-12-16 13:56:52', '2021-01-21 22:23:17'),
(9, 13, 'JNS', 'JNS', '1', 'Techno City, Grant Road, New Chali, Karachi, Pakistan', '', '', '', 'Karachi City', 'Sindh', 'Pakistan', '', '10000', 8000, 1000, '[\"1\",\"2\"]', 50.00, 100.00, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '2000', '1000', '1000', '100', 1, 0, '2020-12-17 18:36:58', '2021-01-29 12:56:18'),
(13, 21, 'Allison Gyovai', 'Evian Water', '1', '8081 Innovation Park Drive, Falls Church, VA, USA', '', '38.8625961', '-77.2239116', 'Fairfax County', 'Virginia', 'United States', '', '4000000', 10000, 20000, '[\"1\"]', 20000.00, 1.00, '[\"1\"]', '[\"1\",\"4\"]', '[\"1\",\"3\"]', '[\"1\",\"4\"]', '150', '30000', '40', '50', 1, 1, '2020-12-23 15:36:30', '2021-01-26 19:19:22'),
(14, 7, 'maculamss', 'Ashutosh', '1', 'Kemalöz, Uşak Otogarı, Uşak Merkez/Uşak, Turkey', '', '38.6748181', '29.3907223', 'Uşak Merkez', 'Uşak', 'Turkey', '64200', '20000', 19000, 99, '[\"1\"]', 100.00, 100.00, '[\"4\",\"5\"]', '[\"5\"]', '[\"3\",\"4\"]', '[\"5\"]', '200', '100', '100', '200', 1, 2, '2020-12-30 13:45:32', '2021-01-26 19:11:27'),
(16, 25, 'Sanjay Rajpurohit', 'Sanjay Singh Rajpurohit', '2', 'AAROHI HOMES, South Bopal, Bopal, Ahmedabad, Gujarat, India', 'Sanjay Home, South Bopal', '23.0357933', '72.4376499', 'Shela', 'Gujarat', 'India', '380058', '17000000', 15000000, 10, '[\"1\",\"2\",\"3\"]', 85000.00, NULL, '[\"5\"]', '[\"2\",\"3\"]', '[\"2\",\"3\"]', '[\"2\",\"3\"]', '1000', '1200', '800', '500', 1, 0, '2021-01-12 11:26:15', '2021-01-19 14:19:28'),
(17, 25, 'Sanjay Rajpurohit', 'Rajpurohit SanjaySingh', '1', 'Aarohi Residency, South Bopal, Bopal, Ahmedabad, Gujarat, India', '', '23.0142058', '72.4735223', 'Ahmedabad', 'Gujarat', 'India', '380058', '17000000', 15000000, 1000, '[\"5\"]', 85000.00, 80000.00, '[\"2\",\"3\"]', '[\"2\",\"3\"]', '[\"2\",\"4\"]', '[\"1\",\"2\"]', '1500', '1000', '2000', '200', 2, 2, '2021-01-12 12:00:50', '2021-01-21 21:45:55'),
(18, 7, 'Jay', 'JNS', '1', 'North Carolina Zoo, Zoo Parkway, Asheboro, NC, USA', '', '35.6297182', '-79.76477419999999', 'Asheboro', 'North Carolina', 'United States', '', '80000', 50000, 100, '[\"1\"]', 400.00, 200.00, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '100', '100', '100', '100', 2, 3, '2021-01-15 10:34:30', '2021-01-21 21:46:03'),
(19, 7, 'ABC', 'XYZ', '1', 'North Carolina, USA', '', '23.022505', '72.5713621', 'Ahmedabad', 'Gujarat', 'India', '', '800000', 200000, 100, '[\"1\"]', 4000.00, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '99', '100', '100', '100', 1, 0, '2021-01-15 12:14:13', '2021-01-18 15:13:02'),
(20, 7, 'rishi', 'test', '1', 'North Carolina, USA', '', '35.7595731', '-79.01929969999999', '', 'North Carolina', 'United States', '', '12000', 10000, 196, '[\"1\"]', 60.00, NULL, '[\"5\"]', '[\"5\"]', '[\"3\",\"4\",\"5\"]', '[\"3\",\"4\",\"5\"]', '100', '200', '8', '10', 3, 0, '2021-01-17 11:50:53', '2021-01-22 17:09:28'),
(21, 7, 'ABC', 'XYZ', '1', 'Technource, Makarba, Ahmedabad, Gujarat, India', '', '22.9935519', '72.4987754', 'Ahmedabad', 'Gujarat', 'India', '380051', '20000', 15000, 100, '[\"2\"]', 100.00, NULL, '[\"2\"]', '[\"2\"]', '[\"2\"]', '[\"2\"]', '100', '100', '100', '100', 1, 0, '2021-01-18 15:28:21', '2021-01-18 15:32:02'),
(22, 7, 'ABC', 'XYZ', '2', 'Technource - Top Web & Mobile App Development Company, Makarba, Ahmedabad, Gujarat, India``', 'Jay Office', '22.9935519', '72.4987754', 'Ahmedabad', 'Gujarat', 'India', '380051', '85000', 15000, 100, '[\"1\"]', 425.00, NULL, '[\"1\"]', '[\"1\"]', '[\"1\"]', '[\"1\"]', '100', '100', '100', '100', 2, 0, '2021-01-19 14:23:37', '2021-01-28 15:04:49'),
(23, 25, 'Sanjay Singh', 'Rajpurohit Sanjay', '2', 'Ahmedabad, Gujarat 380051, India', 'Sanjay House, Aarohi Homes', '22.9974387', '72.5107843', 'Ahmedabad', 'Gujarat', 'India', '', '170000000', 150000000, 1000, '[\"5\"]', 850000.00, NULL, '[\"5\"]', '[\"3\",\"4\"]', '[\"3\",\"4\"]', '[\"2\",\"3\"]', '1000', '1500', '1000', '500', 1, 1, '2021-01-19 14:23:44', '2021-01-21 22:46:48'),
(24, 7, 'Rishi', 'Test', '2', 'Technource - Top Web & Mobile App Development Company, Makarba, Ahmedabad, Gujarat, India', 'My Office', '22.9935519', '72.4987754', 'Ahmedabad', 'Gujarat', 'India', '380051', '150000', 100000, 100, '[\"4\"]', 750.00, NULL, '[\"4\"]', '[\"4\"]', '[\"4\"]', '[\"4\"]', '20000', '200', '100', '50', 1, 0, '2021-01-19 15:05:54', '2021-01-29 11:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `property_durations`
--

CREATE TABLE `property_durations` (
  `p_duration_id` int(10) UNSIGNED NOT NULL,
  `duration` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_durations`
--

INSERT INTO `property_durations` (`p_duration_id`, `duration`, `created_at`, `updated_at`) VALUES
(1, '15-30', '2020-12-03 18:30:00', NULL),
(2, '30-45', '2020-12-03 18:30:00', NULL),
(3, '45-60', '2020-12-03 18:30:00', NULL),
(4, '60+', '2020-12-03 18:30:00', NULL),
(5, 'None', '2020-12-29 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `p_image_id` int(10) UNSIGNED NOT NULL,
  `property_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`p_image_id`, `property_id`, `image`, `created_at`, `updated_at`) VALUES
(20, 4, '536861607408413.jpg', '2020-12-08 00:50:13', '2020-12-08 00:52:32'),
(21, 4, '556281607408414.jpg', '2020-12-08 00:50:14', '2020-12-08 00:52:32'),
(22, 5, '131641607579280.PNG', '2020-12-10 00:18:00', '2020-12-10 00:18:48'),
(23, 6, '888161607600764.PNG', '2020-12-10 11:46:04', '2020-12-10 11:50:14'),
(26, 8, '659621608126883.PNG', '2020-12-16 13:54:43', '2020-12-16 13:56:52'),
(27, 9, '86871608230077.jpg', '2020-12-17 18:34:37', '2020-12-17 18:36:58'),
(31, 14, '181031609335853.jpg', '2020-12-30 13:44:13', '2020-12-30 13:45:32'),
(33, 16, '949491610450461.jpg', '2021-01-12 11:21:01', '2021-01-12 11:26:15'),
(34, 16, '980121610450467.jpeg', '2021-01-12 11:21:07', '2021-01-12 11:26:15'),
(35, 16, '180491610450488.jpg', '2021-01-12 11:21:28', '2021-01-12 11:26:15'),
(36, 17, '298831610452765.jpg', '2021-01-12 11:59:25', '2021-01-12 12:00:50'),
(37, 17, '37251610452771.jpg', '2021-01-12 11:59:31', '2021-01-12 12:00:50'),
(38, 18, '225161610706791.jpg', '2021-01-15 10:33:11', '2021-01-15 10:34:30'),
(39, 19, '408081610712771.jpg', '2021-01-15 12:12:51', '2021-01-15 12:14:13'),
(41, NULL, '812111610956186.jpg', '2021-01-18 07:49:46', '2021-01-18 07:49:46'),
(42, NULL, '965701610956255.jpg', '2021-01-18 07:50:55', '2021-01-18 07:50:55'),
(43, 19, '267521610956569.jpg', '2021-01-18 07:56:09', '2021-01-18 07:56:58'),
(46, 19, '629761610956582.jpg', '2021-01-18 07:56:22', '2021-01-18 07:56:58'),
(57, NULL, '654031610963753.png', '2021-01-18 09:55:53', '2021-01-18 09:55:53'),
(59, 20, '921101610980653.jpg', '2021-01-18 14:37:33', '2021-01-18 14:37:37'),
(60, 19, '82781610982773.jpg', '2021-01-18 15:12:53', '2021-01-18 15:13:02'),
(61, 21, '792091610983429.jpg', '2021-01-18 15:23:49', '2021-01-18 15:28:21'),
(62, NULL, '290211611033039.jpg', '2021-01-19 05:10:39', '2021-01-19 05:10:39'),
(63, NULL, '491621611066067.JPG', '2021-01-19 14:21:07', '2021-01-19 14:21:07'),
(64, 22, '288981611066097.jpg', '2021-01-19 14:21:37', '2021-01-19 14:23:37'),
(65, 23, '163511611066129.JPG', '2021-01-19 14:22:09', '2021-01-19 14:23:44'),
(66, 24, '504391611068630.png', '2021-01-19 15:03:50', '2021-01-19 15:05:54'),
(67, 13, '322181611266485.png', '2021-01-21 22:01:25', '2021-01-21 22:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int(10) UNSIGNED NOT NULL,
  `text_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_value` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text' COMMENT 'text,image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `text_key`, `text_value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'home_setting_tagline_1', 'CW Instant Sale', 'text', NULL, '2021-01-28 16:45:11'),
(2, 'home_setting_tagline_2', 'Get a pre approval on the property you like', 'text', NULL, '2021-01-28 16:45:11'),
(3, 'home_setting_button', 'Get Started', 'text', NULL, '2021-01-28 16:45:11'),
(4, 'home_setting_banner_image', '143371610694147.PNG', 'image', NULL, '2021-01-15 07:02:27'),
(5, 'text_intro_1_line_1', 'Realtor', 'text', '2020-12-02 18:30:00', '2020-12-21 20:32:35'),
(6, 'text_intro_1_line_2', 'Hello there, i am the {{SELLER_AGENT_NAME}} of this Property. Please put your contact information below and i will get back to you as fast as possible.', 'text', '2020-12-02 18:30:00', '2020-12-22 12:34:14'),
(7, 'text_intro_2_line_1', 'Are you a Buyer or Agent?', 'text', '2020-12-02 18:30:00', '2020-12-22 12:53:17'),
(8, 'text_intro_2_line_2', 'I simply need to find out so I can I direct you to the proper team.', 'text', '2020-12-02 18:30:00', '2020-12-22 12:53:17'),
(9, 'intro_offer_range_line_1', 'Do you already have an offer range in mind?', 'text', '2020-12-02 18:30:00', '2020-12-22 12:55:26'),
(10, 'intro_offer_range_line_2', 'I can quickly look up how much similar listings have sold for in the area to give you an idea of a good offer amount.', 'text', NULL, '2020-12-22 12:55:26'),
(11, 'intro_offer_range_option_1', 'Yes, I have something in my mind.', 'text', '2020-12-02 18:30:00', '2020-12-22 12:55:26'),
(12, 'intro_offer_range_option_2', 'No, Please assist me.', 'text', '2020-12-02 18:30:00', '2020-12-22 12:55:26'),
(13, 'please_assist_me_text', 'Thank you for choosing our assistance, your information has been sent and you have also received email and sms for the same, now our agent will contact and assist you soon.', 'text', '2020-12-02 18:30:00', '2020-12-22 12:57:23'),
(14, 'please_assist_me_button_text', 'Ok', 'text', '2020-12-02 18:30:00', '2020-12-22 12:57:23'),
(15, 'offer_approved_line_1', 'Thank You!', 'text', '2020-12-02 18:30:00', '2020-12-22 12:58:27'),
(16, 'offer_approved_line_2', 'Your offer has been Pre - Approved!', 'text', '2020-12-02 18:30:00', '2020-12-22 12:58:27'),
(17, 'offer_approved_button_text', 'Submit New Offer', 'text', '2020-12-02 18:30:00', '2020-12-22 12:58:27'),
(18, 'text_agent_line_1', 'Hi, I\'m {{SELLER_AGENT_NAME}}', 'text', '2020-12-02 18:30:00', '2020-12-24 12:55:13'),
(19, 'text_agent_line_2', 'I am the listing agent for this property, go ahead and get started on the offer. Please contact me with any questions.', 'text', '2020-12-02 18:30:00', '2020-12-24 12:55:13'),
(20, 'text_agent_line_3', 'Agent Line 3', 'text', '2020-12-02 18:30:00', '2020-12-22 19:34:45'),
(21, 'text_agent_sub_title_1', 'Agent sub title 1', 'text', '2020-12-02 18:30:00', '2020-12-22 19:34:45'),
(22, 'text_agent_sub_title_2', 'Agent sub title  2', 'text', '2020-12-02 18:30:00', '2020-12-22 19:34:45'),
(23, 'text_agent_sub_title_3', 'Agent sub title  3', 'text', '2020-12-02 18:30:00', '2020-12-22 19:34:45'),
(24, 'text_agent_button_text', 'Submit Offer', 'text', '2020-12-02 18:30:00', '2020-12-24 12:55:13'),
(25, 'seo_setting_title', 'Citworth Offer Home Page SEO Title', 'text', '2020-12-02 18:30:00', '2021-01-15 15:55:22'),
(26, 'seo_setting_desc', 'Citworth Offer Home Page SEO Desc', 'text', '2020-12-02 18:30:00', '2021-01-15 15:55:22'),
(27, 'general_setting_admin_logo', '137481607318362.png', 'image', '2020-12-06 18:30:00', '2020-12-06 23:49:22'),
(28, 'general_setting_email_logo', '885011607318362.png', 'image', '2020-12-06 18:30:00', '2020-12-06 23:49:22'),
(29, 'general_setting_login_logo', '518711607321133.png', 'image', '2020-12-06 18:30:00', '2020-12-07 00:35:33'),
(30, 'general_setting_home_logo', '267821607516919.PNG', 'image', '2020-12-08 18:30:00', '2020-12-09 06:58:39'),
(31, 'front_agent_offer_not_approved', 'Sorry, Your offer has not approved!', 'text', '2020-12-24 00:00:00', '2020-12-24 12:52:10'),
(32, 'front_agent_offer_not_approved_btn', 'Resubmit Offer', 'text', '2020-12-24 00:00:00', '2020-12-24 12:52:10'),
(33, 'smtp_mailer', 'smtp', 'text', NULL, '2021-01-28 15:47:53'),
(34, 'smtp_host', 'smtp.office365.com', 'text', NULL, '2021-01-28 15:47:53'),
(35, 'smtp_port', '587', 'text', NULL, '2021-01-28 15:47:53'),
(36, 'smtp_email', 'match@cityworth.net', 'text', NULL, '2021-01-28 15:47:53'),
(37, 'smtp_password', 'Rap60682', 'text', NULL, '2021-01-28 15:47:53'),
(38, 'smtp_enc', 'tls', 'text', NULL, '2021-01-28 15:47:53'),
(43, 'seo_setting_image', '749371610726122.PNG', 'image', '2021-01-15 00:00:00', '2021-01-15 15:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL COMMENT '0=Admin, 1=Seller',
  `user_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active,0=Inactive',
  `admin_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Active,0=Inactive',
  `forgot_password_otp` int(11) DEFAULT NULL,
  `is_email_verify` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Not Verify, 1=Verify',
  `deleted` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=Not Deleted, 1=Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `tel_code`, `mobile_number`, `user_photo`, `user_type`, `user_status`, `admin_status`, `forgot_password_otp`, `is_email_verify`, `deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CW Offer Admin', 'cw_offer@mailinator.com', '$2y$10$ogCHIJH/.TQjR5V2KnrF8.xhu2Z4ekMUAe89l2boQQZYW3lcYHXY2', '+91', '1231231231', '873091608738157.png', 0, 1, 1, 6751, 0, 0, '2020-12-01 18:30:00', '2021-01-12 04:51:05', NULL),
(7, 'Seller Agent s', 'testing85000@gmail.com', '$2y$10$sJ6P00pBcB4ypjZZIyCG3OnCIZILLON3zFBrukhQKFWVdKJ5c0lhy', '+91', '8949452133', '520151608120943.png', 1, 1, 1, 3723, 0, 0, '2020-12-03 02:16:31', '2021-01-29 12:00:24', NULL),
(8, 'Mani', 'mani@mailinator.com', '$2y$10$T1rQgqVgCtrj54e9seCIqe2SrLuoCTUSraImSGHvCokBp1T3A221W', NULL, '1212121212', NULL, 1, 1, 1, NULL, 0, 0, '2020-12-08 04:17:14', '2020-12-10 14:38:33', NULL),
(9, 'dfgfdg', 'testinffg85000@gmail.com', NULL, '+91', '4354354543', NULL, 1, 1, 1, NULL, 0, 1, '2020-12-10 05:06:07', '2020-12-10 14:38:20', '2020-12-10 14:38:20'),
(10, 'ashish', 'ashish@mailinator.com', NULL, '+91', '1234567890', NULL, 1, 1, 1, 6817, 0, 1, '2020-12-16 12:03:49', '2020-12-16 12:08:44', '2020-12-16 12:08:44'),
(11, 'tanveer', 'cw_offer1@mailinator.com', NULL, '+1', '0894945214', NULL, 1, 1, 1, NULL, 0, 1, '2020-12-16 12:07:07', '2020-12-16 12:08:38', '2020-12-16 12:08:38'),
(12, 'Tanveer Khan', 'tanveerk8500@gmail.com', NULL, '+1', '0894945214', NULL, 1, 1, 1, NULL, 0, 1, '2020-12-16 12:10:34', '2020-12-17 18:32:13', '2020-12-17 18:32:13'),
(13, 'Jay S', 'jay.technource@gmail.com', '$2y$10$hFNQDKwaw7FS7HFU5a3HLewr4D/a54yvtBIjJv8tujufCZfLfkfjG', '+91', '9033841243', '277851608269972.jpg', 1, 1, 1, NULL, 0, 0, '2020-12-17 18:32:34', '2020-12-22 09:45:20', '2020-12-22 09:45:20'),
(14, 'swht0209', 'swht0209@cityworth.com', NULL, '+1', '7033491529', '209181608579027.png', 1, 1, 1, NULL, 0, 1, '2020-12-21 19:30:27', '2020-12-22 20:04:24', '2020-12-22 20:04:24'),
(15, 'swht0207', 'swht0207@cityworth.com', NULL, '+1', '7033491529', NULL, 1, 1, 1, NULL, 0, 0, '2020-12-21 19:36:31', '2020-12-21 19:36:31', NULL),
(16, 'swht0208', 'swht0208@cityworth.com', '$2y$10$88eExmxQKOIrbcas8226e.cnCfLekpecDuEFXWWxZl9fquFyXAvtm', '+1', '1111111111', '449991608581173.jpg', 1, 1, 1, 1994, 0, 1, '2020-12-21 19:39:49', '2020-12-22 19:46:23', '2020-12-22 19:46:23'),
(17, 'cwoffersellers', 'cwofferseller@mailinator.com', '$2y$10$npSIzITBqK2UEQFbrU5rue.HDh.4.0HrDS69on6mw3BZuv53c63oy', '+91', '0894945214', '666541608618164.png', 1, 1, 1, 5705, 0, 0, '2020-12-22 06:22:44', '2021-01-29 11:59:42', NULL),
(18, 'Jay Sorathia', 'js@technource.com', NULL, '+1', '9033841243', '229301608630424.jpg', 1, 1, 1, NULL, 0, 0, '2020-12-22 09:47:04', '2020-12-22 09:47:04', NULL),
(19, 'Swht210 TEst', 'swht02010@cityworth.com', NULL, '+1', '7032974084', NULL, 1, 1, 1, NULL, 0, 1, '2020-12-22 20:14:15', '2020-12-22 20:16:34', '2020-12-22 20:16:34'),
(20, 'swht030 test', 'swht030@cityworth.com', NULL, '+1', '7033491529', NULL, 1, 1, 1, NULL, 0, 1, '2020-12-22 20:30:56', '2020-12-22 20:31:48', '2020-12-22 20:31:48'),
(21, 'swht0200 Test', 'swht0200@cityworth.com', '$2y$10$KTHAxTmlr5Ay9iq.fYsFwu7jOO0G6XEJN7tHrwNyLxGsS0fcKpt4G', '+1', '7033491529', NULL, 1, 1, 1, 3051, 0, 1, '2020-12-22 20:51:21', '2021-01-26 19:40:02', '2021-01-26 19:40:02'),
(22, 'GTS TEst1', 'gtstest1@cityworth.com', NULL, '+1', '7032614487', '174241608738249.png', 1, 1, 1, NULL, 0, 1, '2020-12-23 15:43:49', '2021-01-28 14:50:34', '2021-01-28 14:50:34'),
(23, 'Rishi', 'rishi@technource.com', '$2y$10$2mNgQ8omfYFJwcH5danVfu1OsnbhsIA7lc2.4Gu2BgGR/Rq/wVOOi', '+91', '8302347093', '813861609765928.jpg', 1, 1, 1, 1964, 0, 0, '2021-01-04 13:11:04', '2021-01-10 16:38:38', NULL),
(24, 'Ultra', 'swht0220@cityworth.com', NULL, '+1', '1111111111', NULL, 1, 1, 1, NULL, 0, 0, '2021-01-10 17:28:59', '2021-01-10 17:28:59', NULL),
(25, 'Sanjay Singh Rajpurohit', 'technourceceo@gmail.com', '$2y$10$UwEYWXkDadRh1vFVdnQc2O9SbK2sdoLOMrzHNOuwUrCWukzsbqf..', '+91', '8238605801', '497831610450137.jpg', 1, 1, 1, NULL, 0, 0, '2021-01-12 11:15:37', '2021-01-21 22:03:24', NULL),
(26, 'David Shumway', 'DShumway@cityworthhomes.com', '$2y$10$r9MYJBtDMa3itJeVQbT7SONO.drUfAG6vGtr/cDsVTF3TaCQZTZ1.', '+1', '7036152184', '106371611847930.jpg', 1, 1, 1, NULL, 0, 0, '2021-01-28 15:28:52', '2021-01-28 15:32:10', NULL),
(27, 'Taylor Billingsley', 'TBillingsley@cityworthhomes.com', '$2y$10$1FCpb7ui5XYT/Y3e7bIQk.K8y9hTJucbZOQIJGFg3tn6W5b5HWeBm', '+1', '7037851086', NULL, 1, 1, 1, 7786, 0, 0, '2021-01-28 15:59:57', '2021-01-28 16:17:59', NULL),
(28, 'Tommy Shumway', 'TShumway@cityworthhomes.com', NULL, '+1', '7038957961', NULL, 1, 1, 1, NULL, 0, 0, '2021-01-28 16:21:15', '2021-01-28 16:21:15', NULL),
(29, 'Dave Shumway', 'DShumway@cityworth.com', NULL, '+1', '7032427113', NULL, 1, 1, 1, NULL, 0, 0, '2021-01-28 16:21:51', '2021-01-28 16:21:51', NULL),
(30, 'Christelle Hollomon', 'CHollomon@cityworth.com', NULL, '+1', '7576101510', NULL, 1, 1, 1, NULL, 0, 0, '2021-01-28 16:22:36', '2021-01-28 16:22:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`email_log_id`);

--
-- Indexes for table `email_sms_masters`
--
ALTER TABLE `email_sms_masters`
  ADD PRIMARY KEY (`email_sms_master_id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`lead_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `property_durations`
--
ALTER TABLE `property_durations`
  ADD PRIMARY KEY (`p_duration_id`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`p_image_id`),
  ADD KEY `property_images_property_id_foreign` (`property_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `cms_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `email_log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `email_sms_masters`
--
ALTER TABLE `email_sms_masters`
  MODIFY `email_sms_master_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `lead_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `property_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `property_durations`
--
ALTER TABLE `property_durations`
  MODIFY `p_duration_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `p_image_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `property_images`
--
ALTER TABLE `property_images`
  ADD CONSTRAINT `property_images_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`property_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
