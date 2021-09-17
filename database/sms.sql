-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2021 at 12:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crestgate`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `classid` int(11) DEFAULT NULL,
  `accounttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` int(255) DEFAULT NULL,
  `term` int(255) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `studentid`, `classid`, `accounttype`, `accountname`, `accountnumber`, `bank`, `paymentstatus`, `session`, `term`, `time`, `d`, `m`, `y`, `created_at`, `updated_at`, `status`) VALUES
(6, 'Yemisi', 2, 1, NULL, NULL, NULL, NULL, 'Not Payed', 1, 1, '12:53:09', '30', 'Sep', '20', '2020-09-30 11:53:09', '2020-10-18 10:33:38', 'Active'),
(7, NULL, 3, 2, NULL, NULL, NULL, NULL, 'Not Payed', 1, 1, '10:20:33', '10', 'Oct', '20', '2020-10-10 21:20:33', '2020-10-12 22:13:45', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profilepics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moreinfo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymenttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `dob`, `gender`, `disability`, `religion`, `hobby`, `sport`, `profilepics`, `username`, `password`, `email`, `phoneno1`, `phoneno2`, `moreinfo`, `address`, `address2`, `position`, `category`, `country`, `state`, `zipcode`, `lga`, `paymenttype`, `accountname`, `accountno`, `bank`, `paymentstatus`, `accountemail`, `term`, `session`, `email_verified_at`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Obi Christopher', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Zeboss', '$2y$10$queSNuEIqapkxzEOWsnBROUBI2GqcHOW9q77iJ08vAh9jhs0mEwkK', 'ikchristo19@gmail.com', '2348105892905', NULL, NULL, '', NULL, 'CEO', 'Super Admin', 'Nigeria', 'Lagos', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12:00 AM', '25', '4', '2020', 'yc2NUtuHj9fmLB7nXrSQURgdnKnruTuwmDldP9vaOfBdqoOfuYHsOjlS1hXY', '2020-09-29 12:29:29', '2020-09-29 12:29:29', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `allocates`
--

CREATE TABLE `allocates` (
  `id` int(10) UNSIGNED NOT NULL,
  `dashboard` int(11) DEFAULT NULL,
  `event` int(11) DEFAULT NULL,
  `news` int(255) DEFAULT NULL,
  `gallery` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `subject` int(11) DEFAULT NULL,
  `book` int(11) DEFAULT NULL,
  `staff` int(11) DEFAULT NULL,
  `student` int(11) DEFAULT NULL,
  `result` int(255) DEFAULT NULL,
  `message` int(11) DEFAULT NULL,
  `payment` int(11) DEFAULT NULL,
  `trash` int(11) DEFAULT NULL,
  `assignment` int(11) DEFAULT NULL,
  `attendance` int(11) DEFAULT NULL,
  `syllabus` int(11) DEFAULT NULL,
  `hostel` int(11) DEFAULT NULL,
  `cbt` int(11) DEFAULT NULL,
  `library` int(11) DEFAULT NULL,
  `lvc` int(11) DEFAULT NULL,
  `lcc` int(11) DEFAULT NULL,
  `tutorial` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allocates`
--

INSERT INTO `allocates` (`id`, `dashboard`, `event`, `news`, `gallery`, `class`, `subject`, `book`, `staff`, `student`, `result`, `message`, `payment`, `trash`, `assignment`, `attendance`, `syllabus`, `hostel`, `cbt`, `library`, `lvc`, `lcc`, `tutorial`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-19 22:22:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `allocate_times`
--

CREATE TABLE `allocate_times` (
  `id` int(10) UNSIGNED NOT NULL,
  `allocatee` int(11) DEFAULT NULL,
  `allocated` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjectid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `name`, `testid`, `qno`, `classid`, `subjectid`, `qtype`, `question`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `correct_answer`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(69, NULL, '24', '1', '1', NULL, 'objective', 'There are ____ type of pollution', '2', '6', '8', '3', NULL, NULL, NULL, '06:25:36', '11', 'Oct', '2020', NULL, '2020-10-11 17:25:36', '2020-10-11 17:28:09', 'Active'),
(70, NULL, '24', '2', '1', NULL, 'theory', 'Define Pollution?', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '06:25:36', '11', 'Oct', '2020', NULL, '2020-10-11 17:25:36', '2020-10-11 17:27:56', 'Active'),
(71, NULL, '24', '3', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '06:25:36', '11', 'Oct', '2020', NULL, '2020-10-11 17:25:36', '2020-10-11 17:25:36', 'Active'),
(72, NULL, '25', '1', '1', NULL, 'gap', 'There are ____ type of pollution', NULL, NULL, NULL, NULL, '3', NULL, NULL, '06:35:22', '11', 'Oct', '2020', NULL, '2020-10-11 17:35:22', '2020-10-20 19:53:52', 'Active'),
(73, NULL, '25', '2', '1', NULL, 'objective', 'You are ____ old?', '10', '14', '12', '15', NULL, NULL, NULL, '06:35:22', '11', 'Oct', '2020', NULL, '2020-10-11 17:35:22', '2020-10-20 19:54:18', 'Active'),
(74, NULL, '26', '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:36:28', '28', 'Dec', '2020', NULL, '2020-12-28 12:36:28', '2020-12-28 12:36:28', 'Active'),
(75, NULL, '26', '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:36:28', '28', 'Dec', '2020', NULL, '2020-12-28 12:36:28', '2020-12-28 12:36:28', 'Active'),
(76, NULL, '26', '3', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:36:28', '28', 'Dec', '2020', NULL, '2020-12-28 12:36:28', '2020-12-28 12:36:28', 'Active'),
(77, NULL, '26', '4', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:36:28', '28', 'Dec', '2020', NULL, '2020-12-28 12:36:28', '2020-12-28 12:36:28', 'Active'),
(78, NULL, '27', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:43:51', '28', 'Dec', '2020', NULL, '2020-12-28 12:43:51', '2020-12-28 12:43:51', 'Active'),
(79, NULL, '27', '2', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:43:51', '28', 'Dec', '2020', NULL, '2020-12-28 12:43:51', '2020-12-28 12:43:51', 'Active'),
(80, NULL, '27', '3', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:43:51', '28', 'Dec', '2020', NULL, '2020-12-28 12:43:51', '2020-12-28 12:43:51', 'Active'),
(81, NULL, '28', '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:45:21', '28', 'Dec', '2020', NULL, '2020-12-28 12:45:21', '2020-12-28 12:45:21', 'Active'),
(82, NULL, '28', '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:45:21', '28', 'Dec', '2020', NULL, '2020-12-28 12:45:21', '2020-12-28 12:45:21', 'Active'),
(83, NULL, '28', '3', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:45:21', '28', 'Dec', '2020', NULL, '2020-12-28 12:45:21', '2020-12-28 12:45:21', 'Active'),
(84, NULL, '29', '1', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:50:42', '28', 'Dec', '2020', NULL, '2020-12-28 12:50:42', '2020-12-28 12:50:42', 'Active'),
(85, NULL, '29', '2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:50:42', '28', 'Dec', '2020', NULL, '2020-12-28 12:50:42', '2020-12-28 12:50:42', 'Active'),
(86, NULL, '29', '3', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01:50:42', '28', 'Dec', '2020', NULL, '2020-12-28 12:50:42', '2020-12-28 12:50:42', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ass_decs`
--

CREATE TABLE `ass_decs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjectid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noofqa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noofq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mpq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `queststatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ass_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ass_decs`
--

INSERT INTO `ass_decs` (`id`, `name`, `classid`, `subjectid`, `code`, `noofqa`, `noofq`, `mpq`, `tm`, `start_date`, `end_date`, `start_time`, `end_time`, `queststatus`, `ass_status`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(24, 'Mathematics', '1', '1', NULL, '3', '3', '5', '15', '2020-10-11', '2020-10-12', '19:24', '10:00', NULL, 'Closed', 1, 1, '06:25:36', '11', 'Oct', '2020', NULL, '2020-10-11 17:25:36', '2020-10-17 19:59:25', 'Active'),
(25, 'new assignment', '1', '1', NULL, '2', '2', '2', '4', '2020-10-11', '2020-10-12', '19:33', '19:35', 'completed', '', 1, 1, '01:33:33', '28', 'Dec', '2020', NULL, '2020-10-11 17:35:22', '2020-12-28 12:33:33', 'Active'),
(26, 'jdjfks', '2', NULL, NULL, '4', '4', '1', '4', '2020-12-28', '2020-12-30', '14:35', '10:00', NULL, NULL, 1, 1, '01:36:28', '28', 'Dec', '2020', NULL, '2020-12-28 12:36:28', '2020-12-28 12:36:28', 'Active'),
(27, 'lklksd', '1', '2', NULL, '3', '3', '1', '3', '2020-12-28', '2020-12-29', '14:42', '10:30', NULL, NULL, 1, 1, '01:43:50', '28', 'Dec', '2020', NULL, '2020-12-28 12:43:50', '2020-12-28 12:43:50', 'Active'),
(28, 'bkfkk', '2', NULL, NULL, '3', '3', '1', '3', '2020-12-28', '2020-12-29', '14:44', '10:00', NULL, NULL, 1, 1, '01:45:21', '28', 'Dec', '2020', NULL, '2020-12-28 12:45:21', '2020-12-28 12:45:21', 'Active'),
(29, 'bkfkk', '2', NULL, NULL, '3', '3', '1', '3', '2020-12-28', '2020-12-29', '14:44', '10:00', NULL, NULL, 1, 1, '01:50:42', '28', 'Dec', '2020', NULL, '2020-12-28 12:50:42', '2020-12-28 12:50:42', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `ass_scores`
--

CREATE TABLE `ass_scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `studentid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjectid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `questionid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msgid` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `classid` int(255) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `classid`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(3, 2, 1, 1, '06:55:18', '11', 'Oct', '2020', '780933478', '2020-09-30 16:48:29', '2020-10-11 18:01:29', 'Deleted'),
(4, NULL, 1, 1, '02:46:37', '10', 'Oct', '2020', '803057659', '2020-10-10 11:23:02', '2020-10-10 14:04:08', 'Deleted'),
(6, 2, 1, 1, '12:26:37', '10', 'Oct', '2020', '532312503', '2020-10-10 11:26:37', '2020-10-10 11:31:21', 'Deleted'),
(7, 2, 1, 1, '12:33:56', '10', 'Oct', '2020', '115680252', '2020-10-10 11:33:56', '2020-10-10 13:37:35', 'Deleted'),
(8, 2, 1, 1, '02:38:25', '10', 'Oct', '2020', '517582819', '2020-10-10 13:38:25', '2020-10-11 18:01:24', 'Deleted'),
(9, 1, 1, 1, '03:04:54', '10', 'Oct', '2020', '592399470', '2020-10-10 14:04:19', '2020-10-10 17:02:52', 'Deleted'),
(10, 2, 1, 1, '06:53:18', '11', 'Oct', '2020', '783050259', '2020-10-10 17:39:15', '2020-10-11 18:01:17', 'Deleted'),
(11, 1, 1, 1, '07:05:21', '11', 'Oct', '2020', '488300712', '2020-10-11 18:01:41', '2020-10-11 18:05:50', 'Deleted'),
(12, 1, 1, 1, '07:54:23', '11', 'Oct', '2020', '118590952', '2020-10-11 18:12:24', '2020-10-11 18:54:23', 'Active'),
(14, 1, 1, 1, '05:37:08', '12', 'Oct', '2020', '633442963', '2020-10-12 16:37:08', '2020-10-12 16:38:04', 'Active'),
(15, 1, 1, 1, '06:53:52', '20', 'Oct', '2020', '276322148', '2020-10-20 17:53:52', '2020-10-20 17:53:52', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_lists`
--

CREATE TABLE `attendance_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `attendanceid` int(11) DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `attendance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_lists`
--

INSERT INTO `attendance_lists` (`id`, `attendanceid`, `studentid`, `attendance`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(2, 4, 2, 'Present', '12:23:02', '10', 'Oct', '20', '637009773', '2020-10-10 11:23:02', '2020-10-10 14:04:08', 'Deleted'),
(3, 9, 2, 'Present', '03:04:54', '10', 'Oct', '20', '442498978', '2020-10-10 14:04:19', '2020-10-10 17:02:52', 'Deleted'),
(4, 10, NULL, 'Present', '06:40:35', '10', 'Oct', '20', '596405445', '2020-10-10 17:39:15', '2020-10-11 18:01:17', 'Deleted'),
(5, 11, 3, 'Absent', '07:05:21', '11', 'Oct', '20', '194038304', '2020-10-11 18:01:41', '2020-10-11 18:05:50', 'Deleted'),
(6, 11, 3, 'Absent', '07:05:21', '11', 'Oct', '20', '528379599', '2020-10-11 18:01:41', '2020-10-11 18:05:50', 'Deleted'),
(7, 12, 2, 'Absent', '07:12:24', '11', 'Oct', '20', '402434560', '2020-10-11 18:12:24', '2020-10-11 18:12:24', 'Active'),
(8, 12, 3, 'Present', '07:54:23', '11', 'Oct', '20', '226073667', '2020-10-11 18:12:24', '2020-10-11 18:54:23', 'Active'),
(11, 14, 2, 'Absent', '05:37:08', '12', 'Oct', '20', '444320558', '2020-10-12 16:37:08', '2020-10-12 16:37:08', 'Active'),
(12, 14, 3, 'Absent', '05:37:08', '12', 'Oct', '20', '619722015', '2020-10-12 16:37:08', '2020-10-12 16:38:04', 'Active'),
(13, 15, 2, NULL, '06:53:53', '20', 'Oct', '20', '495838256', '2020-10-20 17:53:53', '2020-10-20 17:53:53', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `classid`, `subject`, `author`, `edition`, `price`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'INSIDEOUT', '1', '1', 'Judeson A. Ogberaha', NULL, '2,500', 1, 1, '07:58:58', '06', 'Oct', '20', '884523959', '2020-10-06 18:58:58', '2020-10-06 18:58:58', 'Active'),
(2, 'New English', '2', '2', 'A.D Samuel', NULL, '2,500', 1, 1, '07:51:56', '10', 'Oct', '20', '704368285', '2020-10-10 18:51:56', '2020-10-10 20:35:52', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `address`, `term`, `session`, `time`, `d`, `m`, `y`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Ojo Branch', '1, Ogbene Achike Street, Isashi Off km 23, Lagos Badagry Expressway, Ojo-Lagos', 1, 1, '12:33:42', '30', 'Sep', '20', '2020-09-30 11:33:42', '2020-09-30 11:33:42', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `card_saves`
--

CREATE TABLE `card_saves` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbts`
--

CREATE TABLE `cbts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjectid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qtype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct_answer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_decs`
--

CREATE TABLE `cbt_decs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjectid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noofqa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noofq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mpq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `queststatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ass_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cbt_scores`
--

CREATE TABLE `cbt_scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `studentid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjectid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `questionid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clas`
--

CREATE TABLE `clas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `captain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clas`
--

INSERT INTO `clas` (`id`, `name`, `category`, `teacher`, `captain`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'J.S.S 1', 'None', '2', '', 1, 1, '01:31:18', '29', 'Sep', '20', '653658943', '2020-09-29 12:31:18', '2020-10-13 16:29:52', 'Active'),
(2, 'J.S.S 2', 'None', '2', '3', 1, 1, '11:54:47', '01', 'Oct', '20', '184313597', '2020-10-01 22:54:47', '2020-10-13 16:31:38', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `demos`
--

CREATE TABLE `demos` (
  `id` int(10) UNSIGNED NOT NULL,
  `newno` int(11) DEFAULT NULL,
  `newid` int(255) DEFAULT NULL,
  `newsyll` int(255) DEFAULT NULL,
  `newclass` int(255) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demos`
--

INSERT INTO `demos` (`id`, `newno`, `newid`, `newsyll`, `newclass`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 2, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-29 16:20:00', '2020-12-28 12:50:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postid` int(11) DEFAULT NULL,
  `postcat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `title`, `details`, `link`, `source`, `category`, `postid`, `postcat`, `type`, `image`, `video`, `term`, `session`, `time`, `d`, `m`, `y`, `created_at`, `updated_at`, `status`) VALUES
(1, '146258549', 'Newman', 'Savage Elicite Decleration Day, a day of video sharing and video advertising', NULL, NULL, 'Others', 2, 'staff', 'video', '97264_09_01_08_1602277268.png', '92444_09_01_16_1602277276.mp4', 1, 1, '10:00 AM', '15', '10', '2020', '2020-10-09 20:01:16', '2020-10-09 20:01:16', 'Active'),
(2, '617833391', 'Interhouse Sport', 'This is an interhouse sport event', NULL, NULL, 'Others', 1, 'Admin', 'image', '29396_03_59_17_1604678357.jpg', NULL, 1, 1, '10:00 AM', '13', '11', '2020', '2020-11-06 14:59:17', '2020-11-06 14:59:17', 'Active'),
(3, '850656547', 'Efe Naming Ceremony', 'alll students and staffs are invited to attend the naming ceremony of our principal Efe, whose wife just put to bed.', NULL, NULL, 'Others', 1, 'Admin', 'image', '82051_04_02_57_1604678577.jpg', NULL, 1, 1, '05:00 PM', '05', '11', '2020', '2020-11-06 15:02:57', '2020-11-06 15:15:49', 'Active'),
(4, '361048026', 'New Event', 'A new event is coming up', NULL, NULL, 'Others', 1, 'Admin', 'image', '84997_04_31_04_1604680264.gif', NULL, 1, 1, '05:31 PM', '06', '11', '2020', '2020-11-06 15:31:04', '2020-11-06 15:56:30', 'Deleted'),
(5, '780393619', 'New Event', 'There is a new event coming up', NULL, NULL, 'Non', 1, 'Admin', 'image', '86808_04_57_43_1604681863.jpg', NULL, 1, 1, '05:59 PM', '06', '11', '2020', '2020-11-06 15:57:43', '2020-11-06 15:57:43', 'Active'),
(6, '516766337', 'Event will end this evening', 'This event will close at 6:02', NULL, NULL, 'Others', 1, 'Admin', 'image', '65068_05_01_01_1604682061.jpg', NULL, 1, 1, '06:02 PM', '06', '11', '2020', '2020-11-06 16:01:01', '2020-11-06 16:01:01', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `category`, `time`, `d`, `m`, `y`, `created_at`, `updated_at`, `status`) VALUES
(1, 'What is your school name?', 'Crest Gate', 'Others', NULL, NULL, NULL, NULL, '2020-10-17 03:14:11', '2020-10-17 03:27:24', 'Active'),
(2, 'Where is your school located?', 'In Isashi', 'Others', NULL, NULL, NULL, NULL, '2020-10-17 03:28:34', '2020-10-17 03:28:34', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postid` int(11) DEFAULT NULL,
  `postcat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `title`, `details`, `link`, `source`, `category`, `postid`, `postcat`, `type`, `image`, `video`, `term`, `session`, `time`, `d`, `m`, `y`, `created_at`, `updated_at`, `status`) VALUES
(1, '575067927', 'Newman', 'fun fair', NULL, NULL, 'Fun Fair', 2, 'staff', 'image', '89492_09_12_56_1602277976.gif', NULL, 1, 1, '09:12:56', '09', '10', '20', '2020-10-09 20:12:56', '2020-10-09 20:12:56', 'Active'),
(2, '820300489', 'Interhouse Sport', 'interhouse sporting event and activity.', NULL, NULL, 'Fun Fair', 1, 'Admin', 'image', '51494_08_16_04_1605255364.jpg', NULL, 1, 1, '08:16:04', '13', '11', '20', '2020-11-13 07:16:04', '2020-11-13 07:16:04', 'Active'),
(3, '382129775', 'Interhouse Run', 'interhouse Running event and activity.', NULL, NULL, 'Fun Fair', 1, 'Admin', 'image', '63609_08_22_07_1605255727.jpg', NULL, 1, 1, '08:22:07', '13', '11', '20', '2020-11-13 07:22:07', '2020-11-13 07:22:07', 'Active'),
(4, '789871789', 'Interhouse Run', 'interhouse Running event and activity.', NULL, NULL, 'Fun Fair', 1, 'Admin', 'image', '25494_08_22_15_1605255735.jpg', NULL, 1, 1, '08:22:15', '13', '11', '20', '2020-11-13 07:22:15', '2020-11-13 07:22:15', 'Active'),
(5, '350890550', 'Interhouse Run', 'interhouse Running event and activity.', NULL, NULL, 'Fun Fair', 1, 'Admin', 'image', '65393_08_22_50_1605255770.jpg', NULL, 1, 1, '08:22:50', '13', '11', '20', '2020-11-13 07:22:50', '2020-11-13 07:22:50', 'Active'),
(6, '673100757', 'Interhouse Run', 'interhouse Running event and activity.', NULL, NULL, 'Fun Fair', 1, 'Admin', 'image', '93095_08_23_22_1605255802.jpg', NULL, 1, 1, '08:23:22', '13', '11', '20', '2020-11-13 07:23:22', '2020-11-13 07:23:22', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_rooms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostel_master` int(255) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`id`, `name`, `no_of_rooms`, `hostel_master`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Diamond Hostel', '20', 2, 1, 1, '02:15:26', '11', 'Oct', '20', '359224513', '2020-10-01 21:24:24', '2020-10-11 13:15:26', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_lists`
--

CREATE TABLE `hostel_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `hostelid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `classid` int(11) DEFAULT NULL,
  `user_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hostel_lists`
--

INSERT INTO `hostel_lists` (`id`, `hostelid`, `userid`, `classid`, `user_category`, `room`, `bed`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(4, 1, 2, 1, 'Student', 'A100', NULL, 1, 1, '10:58:16', '01', 'Oct', '20', '753912978', '2020-10-01 21:58:16', '2020-10-01 21:59:14', 'Active'),
(6, 1, 3, NULL, 'Staff', 'A200', NULL, 1, 1, '02:07:39', '11', 'Oct', '20', '881850051', '2020-10-11 13:07:39', '2020-10-11 13:07:39', 'Active'),
(7, 1, 3, 2, 'Student', 'A100', NULL, 1, 1, '02:08:23', '11', 'Oct', '20', '880148198', '2020-10-11 13:08:23', '2020-10-12 22:13:45', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `name`, `classid`, `subject`, `author`, `edition`, `download`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Basic Science', '1', '1', 'The Lantern', '1st Edition', 'Yes', 1, 1, '07:47:11', '29', 'Sep', '20', '431185253', '2020-09-29 18:47:11', '2020-09-29 18:47:11', 'Active'),
(2, 'Neural Science', '1', '2', 'Judeson A. Ogberaha', NULL, 'Yes', 1, 1, '10:14:20', '12', 'Oct', '20', '149833907', '2020-10-12 21:14:20', '2020-10-12 21:14:20', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reciever` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recieveremail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rcat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msgcat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msgstats` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(93, '2014_10_12_000000_create_users_table', 1),
(94, '2019_08_19_000000_create_failed_jobs_table', 1),
(95, '2020_06_04_175007_create_admins_table', 1),
(96, '2020_06_04_175210_create_staff_table', 1),
(97, '2020_06_04_175228_create_students_table', 1),
(98, '2020_06_04_175405_create_galleries_table', 1),
(99, '2020_06_04_175441_create_settings_table', 1),
(100, '2020_06_04_175643_create_subjects_table', 1),
(101, '2020_06_04_175655_create_books_table', 1),
(102, '2020_06_04_175711_create_results_table', 1),
(103, '2020_06_04_183522_create_r_tables_table', 1),
(104, '2020_06_04_195701_create_events_table', 1),
(105, '2020_06_04_195842_create_accounts_table', 1),
(106, '2020_06_04_202109_create_sites_table', 1),
(107, '2020_06_07_200805_create_messages_table', 1),
(108, '2020_06_19_201349_create_clas_table', 1),
(109, '2020_07_04_114959_create_payments_table', 1),
(110, '2020_07_08_183919_create_attachments_table', 1),
(111, '2020_07_09_123732_create_sessions_table', 1),
(112, '2020_07_21_164112_create_r_subs_table', 1),
(113, '2020_07_26_073915_create_terms_table', 1),
(114, '2020_07_28_160656_create_attendances_table', 1),
(115, '2020_07_28_165456_create_cbts_table', 1),
(116, '2020_07_28_165650_create_cbt_scores_table', 1),
(117, '2020_07_28_170125_create_spendings_table', 1),
(118, '2020_07_28_170812_create_libraries_table', 1),
(119, '2020_07_28_171000_create_syllabi_table', 1),
(120, '2020_07_28_171333_create_hostels_table', 1),
(121, '2020_07_28_171749_create_assignments_table', 1),
(122, '2020_07_30_154816_create_studs_table', 1),
(123, '2020_07_30_162553_create_stfs_table', 1),
(124, '2020_07_31_093606_create_sms_table', 1),
(125, '2020_08_07_131041_create_pays_table', 1),
(126, '2020_08_07_131114_create_payeds_table', 1),
(127, '2020_08_11_213253_create_branches_table', 1),
(128, '2020_08_17_200418_create_cbt_decs_table', 1),
(129, '2020_08_17_200832_create_ass_decs_table', 1),
(130, '2020_08_17_221406_create_ass_scores_table', 1),
(131, '2020_08_19_153146_create_demos_table', 1),
(132, '2020_09_02_173632_create_faqs_table', 1),
(133, '2020_09_05_191444_create_services_table', 1),
(134, '2020_09_25_185932_create_syll_lists_table', 1),
(135, '2020_09_27_214752_create_class_lists_table', 1),
(136, '2020_09_27_214823_create_card_saves_table', 1),
(137, '2020_09_27_214856_create_event_categories_table', 1),
(138, '2020_09_29_093808_create_hostel_lists_table', 1),
(139, '2020_09_29_232123_create_attendance_lists_table', 2),
(140, '2020_10_04_114251_create_allocates_table', 3),
(141, '2020_10_04_120811_create_allocate_times_table', 3),
(142, '2020_10_17_050710_create_pays_table', 4),
(143, '2020_10_17_230250_create_news_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postid` int(11) DEFAULT NULL,
  `postcat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `title`, `details`, `link`, `source`, `category`, `postid`, `postcat`, `type`, `image`, `video`, `term`, `session`, `time`, `d`, `m`, `y`, `created_at`, `updated_at`, `status`) VALUES
(1, '371258992', 'Savage Elicite Decleration Day, a day of video sharing and video advertising', 'Savage Elicite Decleration Day, a day of video sharing and video advertising, Savage Elicite Decleration Day, a day of video sharing and video advertising. Savage Elicite Decleration Day, a day of video sharing and video advertising', NULL, NULL, 'Non', 1, 'Admin', 'image', '75379_01_42_30_1603114950.jpg', NULL, 1, 1, '01:42:30', '19', 'Oct', '2020', '2020-10-19 12:42:30', '2020-10-19 12:42:30', 'Active'),
(2, '281729398', 'sense is necessary', 'u think say u wise u re a mumu man \r\nsense is something people in our today world ignore\r\ntake for example christy \r\nthis night she have been saying people are not wise\r\nmeanwhile she mumu pass mumu wey mumu pass mumu wey acclaim say he mumu', NULL, NULL, 'Non', 1, 'Admin', 'image', '53696_07_59_45_1603223985.jpg', NULL, 1, 1, '07:59:45', '20', 'Oct', '2020', '2020-10-20 18:59:45', '2020-10-28 13:39:56', 'Deleted'),
(3, '928755287', 'Christmas Carol', 'Dear Parents and Students, we will be having the annual christmas carol soon. Please watch out for the date.', NULL, NULL, 'Christmas Day', 1, 'Admin', 'image', '39300_08_26_00_1605255960.jpg', NULL, 1, 1, '08:26:00', '13', 'Nov', '2020', '2020-11-13 07:26:00', '2020-11-13 07:26:00', 'Active'),
(4, '593534502', 'New Event', 'We will be having the graduation ceremony soon.', NULL, NULL, 'Others', 1, 'Admin', 'image', '97163_08_43_09_1605256989.jpg', NULL, 1, 1, '08:43:09', '13', 'Nov', '2020', '2020-11-13 07:43:09', '2020-11-13 07:43:09', 'Active'),
(5, '233265413', 'school resumption', 'School resumption', NULL, NULL, 'Others', 1, 'Admin', 'image', '57342_08_58_59_1605257939.jpg', NULL, 1, 1, '08:58:59', '13', 'Nov', '2020', '2020-11-13 07:58:59', '2020-11-13 07:58:59', 'Active'),
(6, '428450724', 'This evenings event', 'This evenings event', NULL, NULL, 'Others', 1, 'Admin', 'image', '85637_09_00_23_1605258023.jpg', NULL, 1, 1, '09:00:23', '13', 'Nov', '2020', '2020-11-13 08:00:23', '2020-11-13 08:00:23', 'Active'),
(7, '400501138', 'Christmas Party', 'This is a christmas party', NULL, NULL, 'Others', 1, 'Admin', 'image', '58786_09_01_22_1605258082.jpg', NULL, 1, 1, '09:01:22', '13', 'Nov', '2020', '2020-11-13 08:01:22', '2020-11-13 08:01:22', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `payeds`
--

CREATE TABLE `payeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `payid` int(11) DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `classid` int(11) DEFAULT NULL,
  `amount_payed` int(11) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payeds`
--

INSERT INTO `payeds` (`id`, `payid`, `studentid`, `classid`, `amount_payed`, `term`, `session`, `time`, `d`, `m`, `y`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 2, 1, 20000, 1, 1, NULL, '17', '10', '20', '2020-10-17 14:43:38', '2020-10-20 19:50:53', 'Active'),
(4, 2, 2, 1, 3000, 1, 1, NULL, '17', '10', '20', '2020-10-17 15:54:27', '2020-10-17 16:49:38', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  `classid` int(11) DEFAULT NULL,
  `accounttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_pay` int(255) DEFAULT NULL,
  `infostatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payed` int(255) DEFAULT NULL,
  `session` int(255) DEFAULT NULL,
  `term` int(255) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `staffid`, `classid`, `accounttype`, `accountname`, `accountnumber`, `bank`, `paymentstatus`, `to_pay`, `infostatus`, `payed`, `session`, `term`, `time`, `d`, `m`, `y`, `created_at`, `updated_at`, `status`) VALUES
(4, 'Sunday', 2, NULL, NULL, NULL, NULL, NULL, 'Not Payed', 21000, NULL, 21000, 1, 1, '09:18:44', '02', 'Oct', '2020', '2020-10-02 20:18:44', '2020-10-17 21:59:52', 'Active'),
(5, 'Adeniyi', 3, NULL, NULL, NULL, NULL, NULL, 'Not Payed', 20000, NULL, 15000, 1, 1, '02:07:39', '11', 'Oct', '2020', '2020-10-10 21:12:39', '2020-10-17 21:32:02', 'Active'),
(6, 'Adeniyi', 3, NULL, NULL, NULL, NULL, NULL, 'Not Payed', 20000, NULL, NULL, 1, 1, '03:35:28', '04', 'Nov', '2020', '2020-11-04 14:35:28', '2020-11-04 14:35:28', 'Active'),
(7, 'Adeniyi', 3, NULL, NULL, NULL, NULL, NULL, 'Not Payed', 20000, NULL, NULL, 1, 1, '08:52:52', '21', 'Dec', '2020', '2020-12-21 19:52:52', '2020-12-21 19:52:52', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `id` int(10) UNSIGNED NOT NULL,
  `class` int(11) DEFAULT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id`, `class`, `name`, `price`, `discount`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'School Fees', 25000, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, '2020-10-17 12:49:12', '2020-10-17 12:49:12', 'Active'),
(2, 1, 'Chrismas Party', 3000, 0, 1, 1, NULL, NULL, NULL, NULL, NULL, '2020-10-17 12:53:45', '2020-10-17 12:53:45', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `classid` int(11) DEFAULT NULL,
  `studentid` int(11) DEFAULT NULL,
  `tablerand` int(11) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `classid`, `studentid`, `tablerand`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(5, 1, 2, NULL, 1, 1, '12:53:10', '30', 'Sep', '20', NULL, '2020-09-30 11:53:10', '2020-10-18 10:33:39', 'Active'),
(6, 2, 3, NULL, 1, 1, '10:20:33', '10', 'Oct', '20', NULL, '2020-10-10 21:20:33', '2020-10-12 22:13:45', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `r_subs`
--

CREATE TABLE `r_subs` (
  `id` int(10) UNSIGNED NOT NULL,
  `sub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjectid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_attendance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_test` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_exam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_forward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_average` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `r_tables`
--

CREATE TABLE `r_tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `rand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_open` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_present` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_punctual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_absent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport_open` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport_present` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport_punctual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport_absent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_open` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_present` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_punctual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_absent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loyalty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `honesty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cleaniness` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `punctuality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regularity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conduct_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `illness_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `illness_nature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_gross_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_average` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_average` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indoor_game` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ball_game` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `combative_game` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `track` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `throw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swimming` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight_lifting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organisation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contribution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principal_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shool_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `details`, `image`, `category`, `time`, `d`, `m`, `y`, `created_at`, `updated_at`, `status`) VALUES
(6, 'Quality Education', 'In Crest Gate, we make sure that the content of each and every subject of topic been taught to our children is explained and disected properly to aid you child to easily understand and retail what he or she is been taught.', '57917_02_18_27_1603894707.jpeg', 'Head', NULL, NULL, NULL, NULL, '2020-10-28 13:18:27', '2020-10-28 13:18:40', 'Active'),
(7, 'Computer and information Technology Training', 'It is our goal and mission, that every child in crestgate, is aware of the change in information and technological advancement.', '71259_02_36_41_1603895801.jpeg', 'Head', NULL, NULL, NULL, NULL, '2020-10-28 13:36:41', '2020-10-28 13:36:50', 'Active'),
(8, 'Health Care Facilities', 'We made sure facilities and equipments are put in place to cater for sick of injured children to heal or minimized the effect of injuries or sicknesses incured by staffs or students.', '41108_02_38_41_1603895921.jpeg', 'Head', NULL, NULL, NULL, NULL, '2020-10-28 13:38:41', '2020-10-28 13:38:48', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `from`, `to`, `category`, `view`, `time`, `d`, `m`, `y`, `created_at`, `updated_at`, `status`) VALUES
(1, '2020/2021', 'October, 2020', 'April, 2021', 'Open', '1', '01:30:15', '29', 'Sep', '20', '2020-09-29 12:30:15', '2020-09-29 12:30:15', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `dash_page1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dash_page2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dash_page3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dash_wig1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dash_wig2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dash_wig3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dash_wig4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_attendance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_test` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_exam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_forward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_average` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `dash_page1`, `dash_page2`, `dash_page3`, `dash_wig1`, `dash_wig2`, `dash_wig3`, `dash_wig4`, `m_attendance`, `m_test`, `m_exam`, `m_total`, `m_forward`, `m_average`, `m_grade`, `term`, `session`, `time`, `d`, `m`, `y`, `created_at`, `updated_at`, `status`) VALUES
(1, NULL, NULL, NULL, 'class', 'student', 'staff', 'subject', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-29 12:29:36', '2020-12-21 21:36:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_no_prefix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` int(11) DEFAULT NULL,
  `phoneno` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sim` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sam` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutus` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pp` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `simi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sami` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sbi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cui` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `name`, `title`, `footer`, `email`, `facebook`, `instagram`, `twitter`, `youtube`, `pinterest`, `linkin`, `admission_no_prefix`, `address`, `phoneno`, `sim`, `sam`, `aboutus`, `tc`, `pp`, `image`, `simi`, `sami`, `aui`, `sbi`, `type`, `background`, `background2`, `cui`, `acc_name`, `acc_number`, `acc_bank`, `pay_name`, `pay_price`, `pay_discount`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Crestgate Schools', 'Excellence Through God', 'Copyright © 2020 Crestgate Schools', 'crestgateschools@yahoo.com', 'http://facebook.com/crestgate', 'http://instagram.com/crestgate', 'twitter.com/crestgate', 'youtube.com/crestgate', 'pinterest.com/crestgate', 'linkedin.com/crestgate', NULL, 1, '08023640704, 08152721220, 07062368657.', '<h3>Do you want to get in touch with?</h3><p><span style=\"font-family: &quot;Times New Roman&quot;;\">We will be happy to help you in any little way we can.</span></p>', '<h3>Why not register you child with us?&nbsp; &nbsp;</h3><p><span style=\"font-family: &quot;Times New Roman&quot;;\">We want join us on the journey to creating a brighter future and career path of blizz and beauty for your child?</span><br></p>', 'With years of experience, we have been able to train our staffs to study the diferent technics that works well for each child and make sure we bring out the best in them. We believe that the quality education given to a child, will create a brighter and beautiful future for that child and those around the child. \r\nLike the bible says, \"Train up a child in the way he should go and when he is old he will not depart from it\".  So why don\'t you join us on the journey to creating a brighter future of blizz and beauty for your child?', '<div class=\"col-md-12\" style=\"float: left; width: 1170px; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h2 style=\"font-family: inherit; line-height: 1.1; color: rgb(51, 51, 51); margin-bottom: 0px; font-size: 25px; padding: 0px 0px 25px;\">Terms and conditions</h2><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words..</p><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p></div></div><div class=\"col-md-12\" style=\"float: left; width: 1170px; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h3 style=\"font-family: inherit; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); margin-bottom: 0px; font-size: 16px; padding: 0px 0px 12px;\">Cookies</h3><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through</p><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures</p></div></div><div class=\"col-md-12\" style=\"float: left; width: 1170px; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h3 style=\"font-family: inherit; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); margin-bottom: 0px; font-size: 16px; padding: 0px 0px 12px;\">License</h3><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p></div></div><div class=\"col-md-12\" style=\"float: left; width: 1170px; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h3 style=\"font-family: inherit; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); margin-bottom: 0px; font-size: 16px; padding: 0px 0px 12px;\">You must not</h3><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">Republish material form Chamb.com<br>Sell, rent or sub-license material form https:Chamb.com<br>Reproduce, duplicate or copy material form Chamb.com<br>Redistribute content from Chamb (unless content is specifically made for redistribution).</p></div></div><div class=\"col-md-12\" style=\"float: left; width: 1170px; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h3 style=\"font-family: inherit; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); margin-bottom: 0px; font-size: 16px; padding: 0px 0px 12px;\">User Comments</h3><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">This Agreement shall begin on the date hereof.<br>Certain parts of this website offer the opportunity for users to post and exchange opinions, information, material and data (\'Comments\') in areas of the website. Chamb does not screen, edit, publish or review Comments prior to their appearance on the website and Comments do not reflect the views or opinions ofChamb, its agents or affiliates. Comments reflect the view and opinion of the person who posts such view or opinion. To the extent permitted by applicable laws Chambshall not be responsible or liable for the Comments or for any loss cost, liability, damages or expenses caused and or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.<br>Chambreserves the right to monitor all Comments and to remove any Comments which it considers in its absolute discretion to be inappropriate, offensive or otherwise in breach of these Terms and Conditions.<br>You warrant and represent that:<br>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;<br>The Comments do not infringe any intellectual property right, including without limitation copyright, patent or trademark, or other proprietary right of any third party;<br>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material or material which is an invasion of privacy<br>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.<br>You hereby grant to Chamb a non-exclusive royalty-free license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">Online directory distributors when they list us in the directory may link to our Web site in the same manner as they hyperlink to the Web sites of other listed businesses; and<br>Systemwide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.<br>These organizations may link to our home page, to publications or to other Web site information so long as the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site.<br>We may consider and approve in our sole discretion other link requests from the following types of organizations:<br>commonly-known consumer and/or business information sources such as Chambers of Commerce, American Automobile Association, AARP and Consumers Union;<br>dot.com community sites;<br>associations or other groups representing charities, including charity giving sites, online directory distributors;<br>internet portals;<br>accounting, law and consulting firms whose primary clients are businesses; and<br>educational institutions and trade associations.<br>We will approve link requests from these organizations if we determine that: (a) the link would not reflect unfavorably on us or our accredited businesses (for example, trade associations or other organizations representing inherently suspect types of business, such as work-at-home opportunities, shall not be allowed to link); (b)the organization does not have an unsatisfactory record with us; (c) the benefit to us from the visibility associated with the hyperlink outweighs the absence of ; and (d) where the link is in the context of general resource information or is otherwise consistent with editorial content in a newsletter or similar product furthering the mission of the organization.</p><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">These organizations may link to our home page, to publications or to other Web site information so long as the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and it products or services; and (c) fits within the context of the linking party\'s site.</p><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">If you are among the organizations listed in paragraph 2 above and are interested in linking to our website, you must notify us by sending an e-mail to info@Chamb.com. Please include your name, your organization name, contact information (such as a phone number and/or e-mail address) as well as the URL of your site, a list of any URLs from which you intend to link to our Web site, and a list of the URL(s) on our site to which you would like to link. Allow 2-3 weeks for a response.</p><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">Approved organizations may hyperlink to our Web site as follows:</p></div></div><div class=\"col-md-12\" style=\"float: left; width: 1170px; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h3 style=\"font-family: inherit; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); margin-bottom: 0px; font-size: 16px; padding: 0px 0px 12px;\">By use of our corporate name; or</h3><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">By use of the uniform resource locator (Web address) being liked to; or<br>By use of any other description of our Web site or material being linked to that makes sense within the context and format of content on the linking party\'s site.<br>No use of Chamb\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">Whilst we endeavour to ensure that the information this website is correct, we do not warrant its completeness or accuracy; nor do commit to ensuring that the website remains available or that the material on the website is kept up to date.</p></div></div><div class=\"col-md-12\" style=\"float: left; width: 1170px; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h3 style=\"font-family: inherit; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); margin-bottom: 0px; font-size: 16px; padding: 0px 0px 12px;\">Disclaimer</h3><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">To the maximum extent permitted by applicable law, we exclude all representations, warranties and coditions relating to our website and the use of this website(including, without limitation, any warranties implied by law in respect of satisfactory wuality, fitness for purpose and/or the use of reasonable care and skill). Nothing in disclaimer will:</p><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">limit or exclude our or your liability for death or personal injury resulting from negligence; limit or exclude our or your liability for fraud or fraudulent misrepresentation;<br>limit any of our or your liabilities that may not be excluded under applicable low; or<br>exclude any of our or your liabilities that may not be excluded under applicable law.<br>The limitations and exclusions of liability set out in this Section and elswhere in this disclaimer:(a) are subject to the paragraph; and (b) govern all liabilities arising under the disclaimer<br>or in relation to the subject matter of this disclaimer, including liabilities arising in contract, in tort (including negligence) and for breach of statutory duty.</p></div></div>', '<div class=\"col-md-12\" style=\"width: 1170px; float: left; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h2 style=\"margin-bottom: 0px; font-family: inherit; line-height: 1.1; color: rgb(51, 51, 51); font-size: 25px; padding: 0px 0px 25px;\">Privacy Policy</h2><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words..</p><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p></div></div><div class=\"col-md-12\" style=\"width: 1170px; float: left; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h3 style=\"margin-bottom: 0px; font-family: inherit; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); font-size: 16px; padding: 0px 0px 12px;\">Cookies</h3><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through</p><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures</p></div></div><div class=\"col-md-12\" style=\"width: 1170px; float: left; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h3 style=\"margin-bottom: 0px; font-family: inherit; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); font-size: 16px; padding: 0px 0px 12px;\">License</h3><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p></div></div><div class=\"col-md-12\" style=\"width: 1170px; float: left; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h3 style=\"margin-bottom: 0px; font-family: inherit; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); font-size: 16px; padding: 0px 0px 12px;\">You must not</h3><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">Republish material form Chamb.com<br>Sell, rent or sub-license material form https:Chamb.com<br>Reproduce, duplicate or copy material form Chamb.com<br>Redistribute content from Chamb (unless content is specifically made for redistribution).</p></div></div><div class=\"col-md-12\" style=\"width: 1170px; float: left; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h3 style=\"margin-bottom: 0px; font-family: inherit; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); font-size: 16px; padding: 0px 0px 12px;\">User Comments</h3><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">This Agreement shall begin on the date hereof.<br>Certain parts of this website offer the opportunity for users to post and exchange opinions, information, material and data (\'Comments\') in areas of the website. Chamb does not screen, edit, publish or review Comments prior to their appearance on the website and Comments do not reflect the views or opinions ofChamb, its agents or affiliates. Comments reflect the view and opinion of the person who posts such view or opinion. To the extent permitted by applicable laws Chambshall not be responsible or liable for the Comments or for any loss cost, liability, damages or expenses caused and or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.<br>Chambreserves the right to monitor all Comments and to remove any Comments which it considers in its absolute discretion to be inappropriate, offensive or otherwise in breach of these Terms and Conditions.<br>You warrant and represent that:<br>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;<br>The Comments do not infringe any intellectual property right, including without limitation copyright, patent or trademark, or other proprietary right of any third party;<br>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material or material which is an invasion of privacy<br>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.<br>You hereby grant to Chamb a non-exclusive royalty-free license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">Online directory distributors when they list us in the directory may link to our Web site in the same manner as they hyperlink to the Web sites of other listed businesses; and<br>Systemwide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.<br>These organizations may link to our home page, to publications or to other Web site information so long as the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site.<br>We may consider and approve in our sole discretion other link requests from the following types of organizations:<br>commonly-known consumer and/or business information sources such as Chambers of Commerce, American Automobile Association, AARP and Consumers Union;<br>dot.com community sites;<br>associations or other groups representing charities, including charity giving sites, online directory distributors;<br>internet portals;<br>accounting, law and consulting firms whose primary clients are businesses; and<br>educational institutions and trade associations.<br>We will approve link requests from these organizations if we determine that: (a) the link would not reflect unfavorably on us or our accredited businesses (for example, trade associations or other organizations representing inherently suspect types of business, such as work-at-home opportunities, shall not be allowed to link); (b)the organization does not have an unsatisfactory record with us; (c) the benefit to us from the visibility associated with the hyperlink outweighs the absence of ; and (d) where the link is in the context of general resource information or is otherwise consistent with editorial content in a newsletter or similar product furthering the mission of the organization.</p><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">These organizations may link to our home page, to publications or to other Web site information so long as the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and it products or services; and (c) fits within the context of the linking party\'s site.</p><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">If you are among the organizations listed in paragraph 2 above and are interested in linking to our website, you must notify us by sending an e-mail to info@Chamb.com. Please include your name, your organization name, contact information (such as a phone number and/or e-mail address) as well as the URL of your site, a list of any URLs from which you intend to link to our Web site, and a list of the URL(s) on our site to which you would like to link. Allow 2-3 weeks for a response.</p><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">Approved organizations may hyperlink to our Web site as follows:</p></div></div><div class=\"col-md-12\" style=\"width: 1170px; float: left; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h3 style=\"margin-bottom: 0px; font-family: inherit; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); font-size: 16px; padding: 0px 0px 12px;\">By use of our corporate name; or</h3><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">By use of the uniform resource locator (Web address) being liked to; or<br>By use of any other description of our Web site or material being linked to that makes sense within the context and format of content on the linking party\'s site.<br>No use of Chamb\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">Whilst we endeavour to ensure that the information this website is correct, we do not warrant its completeness or accuracy; nor do commit to ensuring that the website remains available or that the material on the website is kept up to date.</p></div></div><div class=\"col-md-12\" style=\"width: 1170px; float: left; color: rgb(51, 51, 51); font-family: Raleway, sans-serif; background-color: rgb(244, 249, 253);\"><div class=\"terms-box\" style=\"padding: 35px 0px 0px;\"><h3 style=\"margin-bottom: 0px; font-family: inherit; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); font-size: 16px; padding: 0px 0px 12px;\">Disclaimer</h3><p style=\"margin-bottom: 0px; line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">To the maximum extent permitted by applicable law, we exclude all representations, warranties and coditions relating to our website and the use of this website(including, without limitation, any warranties implied by law in respect of satisfactory wuality, fitness for purpose and/or the use of reasonable care and skill). Nothing in disclaimer will:</p><p style=\"line-height: 25px; color: rgb(52, 52, 54); padding-bottom: 20px;\">limit or exclude our or your liability for death or personal injury resulting from negligence; limit or exclude our or your liability for fraud or fraudulent misrepresentation;<br>limit any of our or your liabilities that may not be excluded under applicable low; or<br>exclude any of our or your liabilities that may not be excluded under applicable law.<br>The limitations and exclusions of liability set out in this Section and elswhere in this disclaimer:(a) are subject to the paragraph; and (b) govern all liabilities arising under the disclaimer<br>or in relation to the subject matter of this disclaimer, including liabilities arising in contract, in tort (including negligence) and for breach of statutory duty.</p></div></div>', '47075_11_04_11_1608591851.png', '70763_11_04_11_1608591851.JPG', '71655_11_04_11_1608591851.JPG', '22978_11_04_11_1608591851.JPG', '54046_10_54_54_1608591294.JPG', 'image', '43281_11_04_11_1608591851.JPG', '64944_10_48_34_1608590914.mp4', '22764_11_04_11_1608591851.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-29 12:29:36', '2020-12-21 22:04:11', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `spendings`
--

CREATE TABLE `spendings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `othernames` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profilepics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moreinfo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymenttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentstatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stafftype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `firstname`, `othernames`, `dob`, `gender`, `disability`, `religion`, `hobby`, `sport`, `profilepics`, `username`, `password`, `email`, `phoneno1`, `phoneno2`, `moreinfo`, `address`, `address2`, `position`, `category`, `country`, `state`, `zipcode`, `lga`, `paymenttype`, `accountname`, `accountno`, `bank`, `paymentstatus`, `accountemail`, `stafftype`, `hostel`, `sex`, `branch`, `term`, `session`, `email_verified_at`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Mr Sunday', 'Julius Michael', '1989-02-14', NULL, 'No', 'Christainity', 'Playing Chess', 'Football', '33607_09_18_44_1601673524.gif', 'Sunday', '$2y$10$cOJhMlaeySYrpFTOO1BEE.1M5RhUTTAfrzkERg7YjdaE.TEv9s5ue', 'sunday@gmail.com', '(+234) 903-4568-903', NULL, 'This is teacher.', 'No 4, Badimus Street.', NULL, 'Non', 'Senior Secondary', 'Nigeria', 'Lagoss', '1200411', 'OJO', NULL, NULL, NULL, NULL, NULL, NULL, 'Day', NULL, 'Male', '1', 1, 1, NULL, '09:18:44', '02', 'Oct', '20', 'JKGOzykiieaqqcl9NFYruzXlTliuxl06EpB9WmxWEeNVL9d7va3YBizKllc3', '2020-10-02 20:18:44', '2020-10-02 20:18:44', 'Active'),
(3, 'Mr Adeniyi', 'Oluwatobi Akande', '1992-12-13', NULL, 'No', 'Christainity', 'Playing Scrabble', 'Table Tennis', '91620_10_12_39_1602367959.jpg', 'Adeniyi', '$2y$10$ZX0h.ZChDgweOtmk09fOL.PeX7KikGRwjAL8YZ9RLEHR2v7.vmASi', 'adeniyi@gmail.com', '(+234) 812-4958-934', '(+234) 703-4589-493', 'I am a teacher', 'No 4, Harmony Estate, Isashi', NULL, 'Non', 'Senior Secondary', 'Nigeria', 'lagos', '1200300', 'OJO', NULL, NULL, NULL, NULL, NULL, NULL, 'Boarding', NULL, 'Male', '1', 1, 1, NULL, '10:12:40', '10', 'Oct', '20', '420053721', '2020-10-10 21:12:40', '2020-10-11 13:07:38', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `stfs`
--

CREATE TABLE `stfs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `othernames` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profilepics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moreinfo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lga` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `livewith` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `studenttype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` int(255) DEFAULT NULL,
  `admission_no` int(255) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `othernames`, `dob`, `gender`, `disability`, `religion`, `hobby`, `sport`, `profilepics`, `username`, `password`, `email`, `phoneno1`, `phoneno2`, `moreinfo`, `address`, `address2`, `position`, `category`, `country`, `state`, `zipcode`, `lga`, `livewith`, `fname`, `mname`, `studenttype`, `hostel`, `sex`, `branch`, `admission_no`, `term`, `session`, `email_verified_at`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Adeyinka', 'Oluwatosin Yemisi', '2009-12-24', NULL, 'No', 'Christainity', 'Playing Scrabble, Netting', 'Volley Ball', '13432_01_09_06_1601471346.jpeg', 'Yemisi', '$2y$10$NnnaA2cLbRmYw.nT4WDUXecO/snc7Z7HCF4uE9RTiXDJF7aHwNdUe', 'Yemisi2234@gmail.com', '(+234) 905-8737-472', NULL, 'This is a student', 'No 16, Saint Mary Street, Isashi, Ojo LGA, Lagos', NULL, 'Non', 'Junior Secondary', 'Nigeria', 'Ogun State', '1000110', 'IBA', 'parents', NULL, NULL, 'Boarding', NULL, 'Female', 1, 564, 1, 1, NULL, '12:53:10', '30', 'Sep', '20', 'pq09OYDUdQeTuuEFKeIqIf5ZNAoTayLVm1RFuXUhsECGFq99mY5yz4EOOrSC', '2020-09-30 11:53:10', '2020-10-19 08:40:40', 'Active'),
(3, 'Ifechukwu', 'Okechukwu Chika', '2005-10-04', NULL, 'No', 'Christainity', 'Talking', 'Football', '94437_10_20_33_1602368433.gif', 'Chika', '$2y$10$tB/pKs5hEfZtDXBJRZFLb.8q3FfWMrWZX6t6l6LDZqS0NZo4cOX3q', 'chika@gmail.com', '(+234) 823-4885-898', NULL, 'I am a student', 'Ayobo Road, Ipaja, Lagos Anchor University, Lagos, Address', 'Ayobo Road, Ipaja, Lagos Anchor University, Lagos, Address', 'Non', 'Senior Secondary', 'Nigeria', 'lagos', '100242_', 'OJO', 'parents', 'Mr Ifechukwu Francise', 'Mrs Ifechukwu onyekachi', 'Boarding', NULL, 'Male', 1, 535, 1, 1, NULL, '10:20:33', '10', 'Oct', '20', '881621999', '2020-10-10 21:20:33', '2020-10-12 22:13:45', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `studs`
--

CREATE TABLE `studs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `classid`, `teacher`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Mathematics', '1', '3', 1, 1, '05:19:37', '29', 'Sep', '20', '391624556', '2020-09-29 16:19:37', '2020-10-13 15:40:14', 'Active'),
(2, 'English Language', '1', '2', 1, 1, '07:51:07', '10', 'Oct', '20', '780437590', '2020-10-10 18:51:07', '2020-10-13 16:22:29', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `syllabi`
--

CREATE TABLE `syllabi` (
  `id` int(10) UNSIGNED NOT NULL,
  `classid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjectid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syllabi`
--

INSERT INTO `syllabi` (`id`, `classid`, `subjectid`, `download`, `term`, `session`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, '1', '1', NULL, 1, 1, '06:23:50', '29', '09', '20', '490326656', '2020-09-29 16:22:10', '2020-09-29 18:41:25', 'Active'),
(2, '1', '2', NULL, 1, 1, '02:30:49', '13', '10', '20', '128814263', '2020-10-13 13:30:49', '2020-10-13 13:30:49', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `syll_lists`
--

CREATE TABLE `syll_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `syllid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtopic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syll_lists`
--

INSERT INTO `syll_lists` (`id`, `syllid`, `topic`, `subtopic`, `time`, `d`, `m`, `y`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(2, '1', 'Algebra', 'Definition\r\nTypes\r\nImportance', '05:22:10', '29', '09', '20', '875282551', '2020-09-29 16:22:10', '2020-09-29 18:41:25', 'Active'),
(3, '1', 'Fraction', 'Definition\r\nTypes\r\nImportance', '05:22:10', '29', '09', '20', '321337904', '2020-09-29 16:22:10', '2020-09-29 18:41:25', 'Active'),
(4, '1', 'Probability', 'Definition\r\nTypes\r\nImportance', '05:22:10', '29', '09', '20', '195310538', '2020-09-29 16:22:10', '2020-09-29 18:41:25', 'Active'),
(5, '1', 'Logic', 'Definition\r\nTypes\r\nImportance', '05:22:10', '29', '09', '20', '734043270', '2020-09-29 16:22:10', '2020-09-29 18:41:25', 'Active'),
(6, '1', 'Algebra', 'Definition\r\nTypes\r\nImportance', '06:23:50', '29', '09', '20', '319905079', '2020-09-29 17:23:50', '2020-09-29 18:41:25', 'Active'),
(7, '2', 'literature', 'all', '02:30:49', '13', '10', '20', '999347371', '2020-10-13 13:30:49', '2020-10-13 13:30:49', 'Active'),
(8, '2', 'oral', 'all', '02:30:49', '13', '10', '20', '174568500', '2020-10-13 13:30:49', '2020-10-13 13:30:49', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`, `session`, `from`, `to`, `category`, `view`, `time`, `d`, `m`, `y`, `created_at`, `updated_at`, `status`) VALUES
(1, 'First', '1', 'October, 2020', 'December, 2020', 'Open', '1', '01:30:58', '29', 'Sep', '20', '2020-09-29 12:30:58', '2020-09-29 12:30:58', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneno1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` int(11) DEFAULT NULL,
  `session` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_id_unique` (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_id_unique` (`id`);

--
-- Indexes for table `allocates`
--
ALTER TABLE `allocates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `allocates_id_unique` (`id`);

--
-- Indexes for table `allocate_times`
--
ALTER TABLE `allocate_times`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `allocate_times_id_unique` (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assignments_id_unique` (`id`);

--
-- Indexes for table `ass_decs`
--
ALTER TABLE `ass_decs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ass_decs_id_unique` (`id`);

--
-- Indexes for table `ass_scores`
--
ALTER TABLE `ass_scores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ass_scores_id_unique` (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attachments_id_unique` (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attendances_id_unique` (`id`);

--
-- Indexes for table `attendance_lists`
--
ALTER TABLE `attendance_lists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attendance_lists_id_unique` (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `books_id_unique` (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branches_id_unique` (`id`);

--
-- Indexes for table `card_saves`
--
ALTER TABLE `card_saves`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `card_saves_id_unique` (`id`);

--
-- Indexes for table `cbts`
--
ALTER TABLE `cbts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cbts_id_unique` (`id`);

--
-- Indexes for table `cbt_decs`
--
ALTER TABLE `cbt_decs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cbt_decs_id_unique` (`id`);

--
-- Indexes for table `cbt_scores`
--
ALTER TABLE `cbt_scores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cbt_scores_id_unique` (`id`);

--
-- Indexes for table `clas`
--
ALTER TABLE `clas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clas_id_unique` (`id`);

--
-- Indexes for table `demos`
--
ALTER TABLE `demos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `demos_id_unique` (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_id_unique` (`id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `event_categories_id_unique` (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_id_unique` (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galleries_id_unique` (`id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hostels_id_unique` (`id`);

--
-- Indexes for table `hostel_lists`
--
ALTER TABLE `hostel_lists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hostel_lists_id_unique` (`id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `libraries_id_unique` (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `messages_id_unique` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_id_unique` (`id`);

--
-- Indexes for table `payeds`
--
ALTER TABLE `payeds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payeds_id_unique` (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_id_unique` (`id`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pays_id_unique` (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `results_id_unique` (`id`);

--
-- Indexes for table `r_subs`
--
ALTER TABLE `r_subs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `r_subs_id_unique` (`id`);

--
-- Indexes for table `r_tables`
--
ALTER TABLE `r_tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `r_tables_id_unique` (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_id_unique` (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_id_unique` (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sites_id_unique` (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spendings`
--
ALTER TABLE `spendings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_id_unique` (`id`);

--
-- Indexes for table `stfs`
--
ALTER TABLE `stfs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_id_unique` (`id`);

--
-- Indexes for table `studs`
--
ALTER TABLE `studs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_id_unique` (`id`);

--
-- Indexes for table `syllabi`
--
ALTER TABLE `syllabi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `syllabi_id_unique` (`id`);

--
-- Indexes for table `syll_lists`
--
ALTER TABLE `syll_lists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `syll_lists_id_unique` (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `terms_id_unique` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `phoneno1` (`phoneno1`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `allocates`
--
ALTER TABLE `allocates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `allocate_times`
--
ALTER TABLE `allocate_times`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `ass_decs`
--
ALTER TABLE `ass_decs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ass_scores`
--
ALTER TABLE `ass_scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `attendance_lists`
--
ALTER TABLE `attendance_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `card_saves`
--
ALTER TABLE `card_saves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbts`
--
ALTER TABLE `cbts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_decs`
--
ALTER TABLE `cbt_decs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cbt_scores`
--
ALTER TABLE `cbt_scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clas`
--
ALTER TABLE `clas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `demos`
--
ALTER TABLE `demos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostel_lists`
--
ALTER TABLE `hostel_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payeds`
--
ALTER TABLE `payeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `r_subs`
--
ALTER TABLE `r_subs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_tables`
--
ALTER TABLE `r_tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spendings`
--
ALTER TABLE `spendings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stfs`
--
ALTER TABLE `stfs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studs`
--
ALTER TABLE `studs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `syllabi`
--
ALTER TABLE `syllabi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `syll_lists`
--
ALTER TABLE `syll_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
