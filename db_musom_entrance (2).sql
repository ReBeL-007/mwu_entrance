-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 06:48 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_musom_entrance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `default_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `merchant_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `official_seal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorized_signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `mobile`, `isVerified`, `created_at`, `updated_at`, `deleted_at`, `default_password`, `merchant_no`, `official_seal`, `authorized_signature`, `form_charge`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$g14tIlVZXMVPDs0GjiPh2.VrtZi/pUjqfA2NZVj3cezUNcFi/y722', 'hupfVUxJb2chZCHTzT7FxNIXIOgx4rgs2tmS84YhqiA1KwWONQn9VwemWbVI', NULL, NULL, NULL, '2021-03-14 05:58:39', NULL, NULL, NULL, '604da60f93b38_604da34eaa25a_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '604da60fb5a63_604da34eaa25a_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', NULL),
(2, 'User', 'user@user.com', '$2y$10$jhR9gozxESallChUMhUoEeVLNNtR4Q2Yhhfxd4bsqASQzboReJMIe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'IT Admin', 'itadmin@itadmin.com', '$2y$10$pn4sDgNXsh8TOOH1ZuIOZucVyq12ntG1Nmq3CEWVXFTd4bhyqy3oe', 'ipYRTnjtSxkmOJRbDKxaZKhs6v7x8VjrINYXvvYIPdjN8qNmYpVznZUUb0rR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'MUSOM', '0000', '$2y$10$GeBehA0nXIsPjetyvPG98uiVT5drGHdXryvbJR5gTyIt31Zm.O86u', NULL, NULL, NULL, '2021-03-12 07:31:53', '2021-03-12 07:31:53', NULL, 'password', 'NP-ES-MIDWESTERN', NULL, NULL, '10');

-- --------------------------------------------------------

--
-- Table structure for table `admins_groups`
--

CREATE TABLE `admins_groups` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins_permissions`
--

CREATE TABLE `admins_permissions` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins_roles`
--

CREATE TABLE `admins_roles` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins_roles`
--

INSERT INTO `admins_roles` (`admin_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `files` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_uploaded` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `slug`, `abbreviation`, `duration`, `description`, `weight`, `faculty_id`, `level_id`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Bachelor of Business Administration', 'bachelor-of-business-administration', 'BBA', NULL, NULL, 10, 1, 1, 'Admin', NULL, NULL, NULL, '2021-02-02 08:17:42', '2021-02-02 08:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `faculty` int(10) UNSIGNED DEFAULT NULL,
  `level` int(10) UNSIGNED DEFAULT NULL,
  `programs` int(10) UNSIGNED DEFAULT NULL,
  `campus` int(10) UNSIGNED DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_serial_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regd_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjects` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_codes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateOfBirth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passed_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `voucher` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `official_seal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorized_signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esewa_status` tinyint(1) NOT NULL DEFAULT 0,
  `pid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esewa_amt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_final_verified` tinyint(1) NOT NULL DEFAULT 0,
  `consent` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `user_id`, `faculty`, `level`, `programs`, `campus`, `payment_method`, `year`, `form_serial_no`, `sex`, `fname`, `mname`, `lname`, `regd_no`, `symbol_no`, `semester`, `exam_type`, `subjects`, `subject_codes`, `nationality`, `dateOfBirth`, `district`, `mother_name`, `father_name`, `ward`, `contact`, `email`, `board`, `passed_year`, `roll_no`, `division`, `image`, `signature`, `voucher`, `official_seal`, `authorized_signature`, `citizenship`, `esewa_status`, `pid`, `rid`, `esewa_amt`, `scd`, `is_verified`, `is_final_verified`, `consent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 2, 1, 1, 1, 4, '1', '1975', NULL, 'male', 'Plato Shepherd', 'Genevieve Ford', 'Uriah Chavez', 'Enim qui necessitat', NULL, 'First', 'Chance', '[\"1\"]', '[\"ACC001\"]', 'Maiores vel est a d', '२०७७-११-२९', 'Bhojpur', 'Oprah Dalton', 'Azalia Vincent', 'Tempore ullamco omn', 'Dolor iste id facere', 'kewoh@mailinator.com', '[\"Repellendus Consect\",\"Eveniet eiusmod ver\",\"Iusto laboriosam ea\",\"Blanditiis enim exce\",\"Est quia nostrum ess\"]', '[\"1986\",\"2004\",\"1982\",\"1985\",\"2009\"]', '[\"Repudiandae et sunt\",\"Optio nulla ea ulla\",\"Sed officia eos qui\",\"Inventore omnis adip\",\"Ut maiores esse cul\"]', '[\"Qui tenetur consequa\",\"Ut perferendis est\",\"Laborum Numquam et\",\"Ut maiores in vitae\",\"Sit anim elit est i\"]', '604b49b663545_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '604b49b6684fc_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', NULL, NULL, NULL, NULL, 0, '99d341a7293e1d00', NULL, NULL, NULL, 0, 0, 1, '2021-03-12 11:00:06', '2021-03-12 11:00:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'School of Management', 'school-of-management', NULL, '2021-02-02 08:15:52', '2021-02-02 08:15:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faculties_levels`
--

CREATE TABLE `faculties_levels` (
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties_levels`
--

INSERT INTO `faculties_levels` (`faculty_id`, `level_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `symbol_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faculty` int(10) UNSIGNED DEFAULT NULL,
  `level` int(10) UNSIGNED DEFAULT NULL,
  `campus` int(10) UNSIGNED DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caste` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateOfBirth2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tole` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `exam_centre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vdc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateOfBirth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_qualification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_qualification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_qualification` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `board` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passed_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `programs` int(10) UNSIGNED DEFAULT NULL,
  `voucher` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_final_verified` tinyint(1) NOT NULL DEFAULT 0,
  `consent` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `see_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `see_marksheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `see_provisional` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intermediate_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intermediate_marksheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intermediate_provisional` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bachelor_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bachelor_marksheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bachelor_provisional` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masters_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masters_marksheet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masters_provisional` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `official_seal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authorized_signature` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esewa_status` tinyint(1) NOT NULL DEFAULT 0,
  `citizenship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_letter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esewa_amt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disable_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disable_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disable_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disable_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `martyr_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `martyr_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `symbol_no`, `faculty`, `level`, `campus`, `year`, `payment_method`, `sex`, `fname`, `mname`, `lname`, `caste`, `religion`, `nationality`, `dateOfBirth2`, `tole`, `image`, `signature`, `is_verified`, `created_at`, `updated_at`, `deleted_at`, `exam_centre`, `vdc`, `dateOfBirth`, `district`, `mother_name`, `mother_qualification`, `mother_occupation`, `father_name`, `father_qualification`, `father_occupation`, `spouse_name`, `spouse_qualification`, `spouse_occupation`, `ward`, `contact`, `contact_address`, `email`, `board`, `passed_year`, `roll_no`, `division`, `programs`, `voucher`, `is_final_verified`, `consent`, `user_id`, `see_certificate`, `see_marksheet`, `see_provisional`, `intermediate_certificate`, `intermediate_marksheet`, `intermediate_provisional`, `bachelor_certificate`, `bachelor_marksheet`, `bachelor_provisional`, `masters_certificate`, `masters_marksheet`, `masters_provisional`, `official_seal`, `authorized_signature`, `esewa_status`, `citizenship`, `community_certificate`, `sponsor_letter`, `pid`, `rid`, `esewa_amt`, `scd`, `disable_status`, `disable_class`, `disable_no`, `disable_description`, `martyr_status`, `martyr_no`) VALUES
(1, '1001', 1, 1, NULL, NULL, '0', 'male', 'rajan', NULL, 'prajapati', 'caste', 'religion', 'Nepali', NULL, NULL, '601910d061c6a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '601910d06b7d3_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', 1, '2021-02-02 08:44:00', '2021-02-02 08:44:44', NULL, NULL, NULL, '२०७७-१०-१', 'Bhaktapur', 'Mother', NULL, NULL, 'Father', NULL, NULL, NULL, NULL, NULL, NULL, '9813348990', 'rebelprajapati88@gmail.com', NULL, '[\"slc\",\"HEB\",null,null]', '[\"2068\",\"2070\",null,null]', '[\"75\",\"75\",null,null]', '[\"first\",\"First\",null,null]', 1, '601910d0703e4_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', 0, 1, 1, '601910d075372_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '601910d07a135_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '601910d07f020_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '601910d0839f1_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '601910d089d2a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '601910d08eb1f_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '601910d093adc_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', NULL, NULL, 'c923e1b8e7a9b524', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL),
(2, '1002', 1, 1, 4, NULL, '1', 'male', 'Tanisha James', 'Katelyn Ware', 'Mercedes Singleton', 'Aliquid anim dolorum', 'Consequuntur volupta', 'Reprehenderit cupid', NULL, 'Dolore in ex similiq', '604b35540e570_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '604b3554c8beb_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', 0, '2021-03-12 09:33:08', '2021-03-12 09:33:08', NULL, NULL, 'Nulla deleniti reici', '२०७७-११-२९', NULL, 'Nissim Ware', 'Nihil officiis sint', 'Reprehenderit ullam', 'Miranda Morton', 'Voluptatem ea tempor', 'Sunt est voluptas', 'Logan Maynard', 'Labore et quo sapien', 'Optio voluptas duci', '+1 (869) 662-7885', '+1 (988) 993-8368', 'kavewekul@mailinator.com', NULL, '[\"Est sint ab dolor o\",\"Error perferendis se\",\"Sunt voluptas dolor\",\"Autem sapiente et Na\"]', '[\"1976\",\"2005\",\"1971\",\"1997\"]', '[\"In dolore eius digni\",\"Minus quis ut enim l\",\"Aut maxime ut ipsum\",\"Repellendus Qui sun\"]', '[\"Voluptatum facere ex\",\"Incidunt nobis esse\",\"Maxime soluta dolore\",\"Deleniti laborum Ut\"]', 1, NULL, 0, 1, 2, '604b3554cdb99_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '604b3554dab68_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '604b3554e0b42_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '604b3554e7e1c_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', NULL, NULL, '4a6fb0012c57add9', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL),
(3, '1003', 1, 1, 4, NULL, '1', 'female', 'Ritu', NULL, 'Prajapati', 'Newar', 'Hindu', 'Nepali', NULL, 'Nasanani', '604da34dea8cc_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '604da34e96601_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', 1, '2021-03-14 05:46:54', '2021-03-14 06:20:43', NULL, NULL, 'Madhyapur', '२०७७-१२-१', 'Ilam', 'Hira Laxmi Prajapati', NULL, NULL, 'Dil Kumar Prajapati', NULL, NULL, NULL, NULL, NULL, '5', '98273783838', 'ritu@gmail.com', NULL, '[\"Government of Nepal\",null,null,null]', '[\"2069\",null,null,null]', '[\"88\",null,null,null]', '[\"Distinction\",null,null,null]', 1, NULL, 0, 1, 3, '604da34eaa25a_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '604da34eac7d7_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '604da34eaee5c_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '604da60f93b38_604da34eaa25a_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', '604da60fb5a63_604da34eaa25a_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', 0, '604da34eb13c8_60198415d828a_6017e626c1776_5ff4614480275_5ff45e7caadfc_5fe5b2360d20a_logo head.png', NULL, NULL, '73cbaafbd67d52e6', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `slug`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Bachelors', 'bachelors', NULL, NULL, '2021-02-02 08:16:16', '2021-02-02 08:16:16');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_03_14_075105_create_admins_table', 1),
(4, '2020_03_15_091331_create_permissions_table', 1),
(5, '2020_03_15_091626_create_roles_table', 1),
(6, '2020_03_15_091858_create_admins_permissions_table', 1),
(7, '2020_03_15_092055_create_admins_roles_table', 1),
(8, '2020_03_15_092224_create_roles_permissions_table', 1),
(9, '2020_04_01_110918_create_group_table', 1),
(10, '2020_04_01_111118_create_programs_table', 1),
(11, '2020_04_01_111218_create_grades_table', 1),
(12, '2020_04_01_111646_create_admins_groups_table', 1),
(13, '2020_09_04_100037_create_subjects_table', 1),
(14, '2020_09_04_113457_create_questions_table', 1),
(15, '2020_09_04_151358_create_answersheets_table', 1),
(16, '2020_09_07_065343_add_to_subjects_table', 1),
(17, '2020_09_11_152033_add_is_uploaded_to_answers', 1),
(18, '2020_09_15_110901_add_default_passowrd_to_admin', 1),
(19, '2020_09_27_190049_create_faculties_table', 1),
(20, '2020_09_27_191040_create_levels_table', 1),
(21, '2020_09_28_111628_create_faculties_levels_table', 1),
(22, '2020_09_28_122938_create_courses_table', 1),
(23, '2020_09_28_143635_create_subs_table', 1),
(24, '2020_09_28_154459_create_exam_form_table', 1),
(25, '2020_09_28_154610_add_columns_to_form_table', 1),
(26, '2020_09_28_184910_add_column_to_form_table', 1),
(27, '2020_09_28_193217_add_columns_to_forms_table', 1),
(28, '2020_12_27_120038_add_column_to_forms_table', 1),
(29, '2021_01_01_120150_add_columns_to_admins_table', 1),
(30, '2021_01_26_165640_add_charge_to_admins', 1),
(31, '2021_02_01_114855_add_disable_option_in_form', 1),
(35, '2021_02_08_095814_create_internal_exam_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_management_access', 'user-management-access', NULL, NULL, NULL),
(2, 'permission_create', 'permission-create', NULL, NULL, NULL),
(3, 'permission_edit', 'permission-edit', NULL, NULL, NULL),
(4, 'permission_show', 'permission-show', NULL, NULL, NULL),
(5, 'permission_delete', 'permission-delete', NULL, NULL, NULL),
(6, 'permission_access', 'permission-access', NULL, NULL, NULL),
(7, 'role_create', 'role-create', NULL, NULL, NULL),
(8, 'role_edit', 'role-edit', NULL, NULL, NULL),
(9, 'role_show', 'role-show', NULL, NULL, NULL),
(10, 'role_delete', 'role-delete', NULL, NULL, NULL),
(11, 'role_access', 'role-access', NULL, NULL, NULL),
(12, 'user_create', 'user-create', NULL, NULL, NULL),
(13, 'user_edit', 'user-edit', NULL, NULL, NULL),
(14, 'user_show', 'user-show', NULL, NULL, NULL),
(15, 'user_delete', 'user-delete', NULL, NULL, NULL),
(16, 'user_access', 'user-access', NULL, NULL, NULL),
(17, 'subject_create', 'subject-create', NULL, NULL, NULL),
(18, 'subject_edit', 'subject-edit', NULL, NULL, NULL),
(19, 'subject_show', 'subject-show', NULL, NULL, NULL),
(20, 'subject_delete', 'subject-delete', NULL, NULL, NULL),
(21, 'subject_access', 'subject-access', NULL, NULL, NULL),
(22, 'question_create', 'question-create', NULL, NULL, NULL),
(23, 'question_edit', 'question-edit', NULL, NULL, NULL),
(24, 'question_show', 'question-show', NULL, NULL, NULL),
(25, 'question_delete', 'question-delete', NULL, NULL, NULL),
(26, 'question_access', 'question-access', NULL, NULL, NULL),
(27, 'answer_create', 'answer-create', NULL, NULL, NULL),
(28, 'answer_edit', 'answer-edit', NULL, NULL, NULL),
(29, 'answer_show', 'answer-show', NULL, NULL, NULL),
(30, 'answer_delete', 'answer-delete', NULL, NULL, NULL),
(31, 'answer_access', 'answer-access', NULL, NULL, NULL),
(32, 'answer_download', 'answer-download', NULL, NULL, NULL),
(33, 'question_download', 'question-download', NULL, NULL, NULL),
(34, 'program_create', 'program-create', NULL, NULL, NULL),
(35, 'program_edit', 'program-edit', NULL, NULL, NULL),
(36, 'program_show', 'program-show', NULL, NULL, NULL),
(37, 'program_delete', 'program-delete', NULL, NULL, NULL),
(38, 'program_access', 'program-access', NULL, NULL, NULL),
(39, 'form_create', 'form-create', NULL, NULL, NULL),
(40, 'form_edit', 'form-edit', NULL, NULL, NULL),
(41, 'form_show', 'form-show', NULL, NULL, NULL),
(42, 'form_delete', 'form-delete', NULL, NULL, NULL),
(43, 'form_access', 'form-access', NULL, NULL, NULL),
(44, 'form_download', 'form-download', NULL, NULL, NULL),
(45, 'card_download', 'card-download', NULL, NULL, NULL),
(46, 'group_create', 'group-create', NULL, NULL, NULL),
(47, 'group_edit', 'group-edit', NULL, NULL, NULL),
(48, 'group_show', 'group-show', NULL, NULL, NULL),
(49, 'group_delete', 'group-delete', NULL, NULL, NULL),
(50, 'group_access', 'group-access', NULL, NULL, NULL),
(51, 'triplicate_download', 'triplicate-download', NULL, NULL, NULL),
(52, 'faculty_create', 'faculty-create', NULL, NULL, NULL),
(53, 'faculty_edit', 'faculty-edit', NULL, NULL, NULL),
(54, 'faculty_show', 'faculty-show', NULL, NULL, NULL),
(55, 'faculty_delete', 'faculty-delete', NULL, NULL, NULL),
(56, 'faculty_access', 'faculty-access', NULL, NULL, NULL),
(57, 'level_create', 'level-create', NULL, NULL, NULL),
(58, 'level_edit', 'level-edit', NULL, NULL, NULL),
(59, 'level_show', 'level-show', NULL, NULL, NULL),
(60, 'level_delete', 'level-delete', NULL, NULL, NULL),
(61, 'level_access', 'level-access', NULL, NULL, NULL),
(62, 'course_create', 'course-create', NULL, NULL, NULL),
(63, 'course_edit', 'course-edit', NULL, NULL, NULL),
(64, 'course_show', 'course-show', NULL, NULL, NULL),
(65, 'course_delete', 'course-delete', NULL, NULL, NULL),
(66, 'course_access', 'course-access', NULL, NULL, NULL),
(67, 'sub_create', 'sub-create', NULL, NULL, NULL),
(68, 'sub_edit', 'sub-edit', NULL, NULL, NULL),
(69, 'sub_show', 'sub-show', NULL, NULL, NULL),
(70, 'sub_delete', 'sub-delete', NULL, NULL, NULL),
(71, 'sub_access', 'sub-access', NULL, NULL, NULL),
(72, 'exam_access', 'exam-access', '2021-02-08 06:46:16', '2021-02-08 06:46:16', NULL),
(73, 'exam_create', 'exam-create', '2021-02-08 06:46:16', '2021-02-08 06:46:16', NULL),
(74, 'exam_edit', 'exam-edit', '2021-02-08 06:46:16', '2021-02-08 06:46:16', NULL),
(75, 'exam_show', 'exam-show', '2021-02-08 06:46:16', '2021-02-08 06:46:16', NULL),
(76, 'exam_delete', 'exam-delete', '2021-02-08 06:46:16', '2021-02-08 06:46:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `files` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL, NULL),
(2, 'User', 'user', NULL, NULL, NULL),
(3, 'IT Admin', 'it-admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 9),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 40),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(2, 40),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 51),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(3, 41),
(3, 42),
(3, 43),
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49),
(3, 50),
(3, 51),
(3, 52),
(3, 53),
(3, 54),
(3, 55),
(3, 56),
(3, 57),
(3, 58),
(3, 59),
(3, 60),
(3, 61),
(3, 62),
(3, 63),
(3, 64),
(3, 65),
(3, 66),
(3, 67),
(3, 68),
(3, 69),
(3, 70),
(3, 71),
(3, 72),
(3, 73),
(3, 74),
(3, 75),
(3, 76);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grade_id` int(10) UNSIGNED DEFAULT NULL,
  `deadline` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subs`
--

CREATE TABLE `subs` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` int(10) UNSIGNED DEFAULT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subs`
--

INSERT INTO `subs` (`id`, `subject_code`, `title`, `slug`, `description`, `course_id`, `semester`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ACC001', 'Accounting', 'accounting', NULL, 1, 'First', NULL, '2021-02-08 05:54:14', '2021-02-08 05:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'rajan prajapati', 'rebelprajapati88@gmail.com', '$2y$10$H7N.sIXKooLHn9j9RjzYZe8j8N2rXfspFjsN4v/b5NliQAPuG81/6', 'h6QOLA4SMnA9HsWr1NTBvuCaacPZkUiVYSmicHduAvoJXowtGADiR2mfvYNd', '2021-02-02 08:07:24', '2021-02-02 08:07:24', NULL),
(2, 'rajan prajapati', 'test@gmail.com', '$2y$10$ZQ0YBHc6bpQJfO5vincRteDRx4FiMlxNotu0iL1CLwp/X1/MpZINe', 'e4wjReFQXXb8DLf8ym14M9BLUMO88QO5YVojhz7DH4Ax3tehQKoJWEvWjRAv', '2021-02-08 10:17:32', '2021-02-08 10:17:32', NULL),
(3, 'ritu', 'ritu@gmail.com', '$2y$10$ArV21xGvntgl3uNlu7IXiesZLDuLMtEJEwIyyoAX4VaIP9Crodon6', NULL, '2021-03-14 05:42:14', '2021-03-14 05:42:14', NULL),
(4, 'tester', 'tester@gmail.com', '$2y$10$dF3SvmE7P0KDIf9EWJcyJOFvsM/FYlN/lYPSTF.DmRRXeG/0VoivK', NULL, '2021-03-21 06:03:31', '2021-03-21 06:03:31', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admins_groups`
--
ALTER TABLE `admins_groups`
  ADD PRIMARY KEY (`admin_id`,`group_id`),
  ADD KEY `admins_groups_group_id_foreign` (`group_id`);

--
-- Indexes for table `admins_permissions`
--
ALTER TABLE `admins_permissions`
  ADD PRIMARY KEY (`admin_id`,`permission_id`),
  ADD KEY `admins_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `admins_roles`
--
ALTER TABLE `admins_roles`
  ADD PRIMARY KEY (`admin_id`,`role_id`),
  ADD KEY `admins_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_admin_id_foreign` (`admin_id`),
  ADD KEY `answers_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_faculty_id_foreign` (`faculty_id`),
  ADD KEY `courses_level_id_foreign` (`level_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_user_id_foreign` (`user_id`),
  ADD KEY `exams_faculty_foreign` (`faculty`),
  ADD KEY `exams_level_foreign` (`level`),
  ADD KEY `exams_programs_foreign` (`programs`),
  ADD KEY `exams_campus_foreign` (`campus`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faculties_name_unique` (`name`);

--
-- Indexes for table `faculties_levels`
--
ALTER TABLE `faculties_levels`
  ADD PRIMARY KEY (`faculty_id`,`level_id`),
  ADD KEY `faculties_levels_level_id_foreign` (`level_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forms_faculty_foreign` (`faculty`),
  ADD KEY `forms_level_foreign` (`level`),
  ADD KEY `forms_campus_foreign` (`campus`),
  ADD KEY `forms_programs_foreign` (`programs`),
  ADD KEY `forms_user_id_foreign` (`user_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_program_id_foreign` (`program_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `levels_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `roles_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_subject_code_unique` (`subject_code`),
  ADD KEY `subjects_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subs_course_id_foreign` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subs`
--
ALTER TABLE `subs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins_groups`
--
ALTER TABLE `admins_groups`
  ADD CONSTRAINT `admins_groups_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admins_permissions`
--
ALTER TABLE `admins_permissions`
  ADD CONSTRAINT `admins_permissions_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admins_roles`
--
ALTER TABLE `admins_roles`
  ADD CONSTRAINT `admins_roles_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admins_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_campus_foreign` FOREIGN KEY (`campus`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_faculty_foreign` FOREIGN KEY (`faculty`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_level_foreign` FOREIGN KEY (`level`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_programs_foreign` FOREIGN KEY (`programs`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faculties_levels`
--
ALTER TABLE `faculties_levels`
  ADD CONSTRAINT `faculties_levels_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `faculties_levels_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `forms_campus_foreign` FOREIGN KEY (`campus`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forms_faculty_foreign` FOREIGN KEY (`faculty`) REFERENCES `faculties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forms_level_foreign` FOREIGN KEY (`level`) REFERENCES `levels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forms_programs_foreign` FOREIGN KEY (`programs`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `forms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subs`
--
ALTER TABLE `subs`
  ADD CONSTRAINT `subs_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
