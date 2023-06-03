-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 04:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `lms_adminn`
--

CREATE TABLE `lms_adminn` (
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phonenumber` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `lms_adminn`
--

INSERT INTO `lms_adminn` (`fullname`, `username`, `email`, `phonenumber`, `password`) VALUES
('Mahad', 'Admin', 'mahadashraf.850@gmail.com', '03414427668', '$2y$10$/F2qHG17LxSQqmfi5pFkJuBC6forhhqMNuWCcWBsAqQue5aLvYo8q');

-- --------------------------------------------------------

--
-- Table structure for table `lms_author`
--

CREATE TABLE `lms_author` (
  `id` int(6) NOT NULL,
  `Author_name` varchar(191) NOT NULL,
  `Author_status` varchar(191) NOT NULL,
  `created_on` varchar(191) NOT NULL,
  `updated_on` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lms_author`
--

INSERT INTO `lms_author` (`id`, `Author_name`, `Author_status`, `created_on`, `updated_on`) VALUES
(3, 'Bacha', 'enable', '2022-12-06T16:17', ''),
(4, 'ali ', 'enable', '2022-12-08T14:44', '');

-- --------------------------------------------------------

--
-- Table structure for table `lms_book`
--

CREATE TABLE `lms_book` (
  `id` int(6) NOT NULL,
  `book_category` varchar(191) NOT NULL,
  `book_author` varchar(191) NOT NULL,
  `book_location_rack` varchar(191) NOT NULL,
  `book_name` varchar(191) NOT NULL,
  `book_isbn_number` varchar(191) NOT NULL,
  `book_no_of_copy` varchar(191) NOT NULL,
  `book_status` varchar(191) NOT NULL,
  `added_on` varchar(191) NOT NULL,
  `updated_on` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lms_book`
--

INSERT INTO `lms_book` (`id`, `book_category`, `book_author`, `book_location_rack`, `book_name`, `book_isbn_number`, `book_no_of_copy`, `book_status`, `added_on`, `updated_on`) VALUES
(3, 'database', 'Bacha', 'a1', 'bachaland of wonders', '2', '1', 'enable', '2022-12-07T20:17', ''),
(5, 'programming', 'Bacha', 'a1', 'bacha of the oz', '345', '3', 'enable', '2022-12-08T14:33', ''),
(6, 'EE', 'Bacha', 'a2', 'Junglu BOOK', '234', '1', 'enable', '2022-12-08T14:45', ''),
(7, 'electrical', 'Bacha', 'a1', 'data structures', '234', '2', 'enable', '2022-12-08T16:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `lms_category`
--

CREATE TABLE `lms_category` (
  `id` int(6) NOT NULL,
  `Category_name` varchar(191) NOT NULL,
  `Category_status` varchar(191) NOT NULL,
  `created_on` varchar(191) NOT NULL,
  `updated_on` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lms_category`
--

INSERT INTO `lms_category` (`id`, `Category_name`, `Category_status`, `created_on`, `updated_on`) VALUES
(6, 'program', 'unable', '2022-12-08T14:32', '2022-12-09T15:59'),
(7, 'EE', 'enable', '2022-12-08T14:43', ''),
(9, 'electrical', 'enable', '2022-12-08T15:56', '');

-- --------------------------------------------------------

--
-- Table structure for table `lms_issue_book`
--

CREATE TABLE `lms_issue_book` (
  `id` int(6) NOT NULL,
  `book_id` varchar(191) NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `issue_date_time` varchar(191) NOT NULL,
  `expected_return_date` varchar(191) NOT NULL,
  `return_date_time` varchar(191) NOT NULL,
  `book_fines` varchar(191) NOT NULL,
  `book_issue_status` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lms_issue_book`
--

INSERT INTO `lms_issue_book` (`id`, `book_id`, `user_id`, `issue_date_time`, `expected_return_date`, `return_date_time`, `book_fines`, `book_issue_status`) VALUES
(2, '234', '123', '2022-12-07T21:27', '2022-12-15T21:27', '', '0', 'not return'),
(3, '2222', '123', '2022-12-07T23:15', '2022-12-15T23:15', '', '111', 'return'),
(4, '234', '123', '2022-12-08T14:46', '2022-12-08T14:46', '', '111', 'enable'),
(5, '234', '20p-0563', '2022-12-08T16:05', '2022-12-13T16:05', '', '0', 'return'),
(6, '234', '20p-0563', '2022-12-08T16:05', '2022-12-13T16:05', '', '0', 'not return');

-- --------------------------------------------------------

--
-- Table structure for table `lms_location_rack`
--

CREATE TABLE `lms_location_rack` (
  `id` int(6) NOT NULL,
  `location_rack_name` varchar(191) NOT NULL,
  `location_rack_status` varchar(191) NOT NULL,
  `created_on` varchar(191) NOT NULL,
  `updated_on` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lms_location_rack`
--

INSERT INTO `lms_location_rack` (`id`, `location_rack_name`, `location_rack_status`, `created_on`, `updated_on`) VALUES
(2, 'a1', 'enable', '2022-12-07T17:58', ''),
(3, 'a2', 'enable', '2022-12-08T14:45', ''),
(4, 'a2', 'enable', '2022-12-08T14:45', '');

-- --------------------------------------------------------

--
-- Table structure for table `lms_setting`
--

CREATE TABLE `lms_setting` (
  `setting_id` int(11) NOT NULL,
  `library_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `library_address` text COLLATE utf8_unicode_ci NOT NULL,
  `library_contact_number` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `library_email_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `library_total_book_issue_day` int(5) NOT NULL,
  `library_one_day_fine` decimal(4,2) NOT NULL,
  `library_issue_total_book_per_user` int(3) NOT NULL,
  `library_currency` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `library_timezone` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lms_setting`
--

INSERT INTO `lms_setting` (`setting_id`, `library_name`, `library_address`, `library_contact_number`, `library_email_address`, `library_total_book_issue_day`, `library_one_day_fine`, `library_issue_total_book_per_user`, `library_currency`, `library_timezone`) VALUES
(1, 'ABC Library', 'Business Street 105, NY 0256', '7539518521', 'abc_library@gmail.com', 10, '1.00', 3, 'INR', 'Asia/Calcutta');

-- --------------------------------------------------------

--
-- Table structure for table `lms_user`
--

CREATE TABLE `lms_user` (
  `id` int(6) NOT NULL,
  `rollno` varchar(191) NOT NULL,
  `fullname` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phonenumber` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `department` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lms_user`
--

INSERT INTO `lms_user` (`id`, `rollno`, `fullname`, `username`, `email`, `phonenumber`, `password`, `department`) VALUES
(1, '23', 'bacha', 'bachaa', 'mahadashraf.850@gmail.com', '12345', 'fast123', 'CS'),
(3, '235', 'gag', 'Bacha', 'mahadashraf.650@yahoo.com', '24566666', '$2y$10$DyF3notgZU6IQWiCVna84e6IWRPeTspmpu.lQkNuvPedy7W2YenrC', 'CS'),
(4, '2', 'bob', 'bob', 'mahadashraf.650@yahoo.com', '234', '$2y$10$NrAhXMts2u3SV5KlEsSlHuaeN67ly.xE.xq8XRx.7XQNpLbpz8532', 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `userr`
--

CREATE TABLE `userr` (
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phonenumber` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`fullname`, `username`, `email`, `phonenumber`, `password`, `department`) VALUES
('mahad', 'Bacha', 'mahadashraf.850@gmail.com', '03414427668', 'fast123', 'CS'),
('bacha', 'bachaaa', 'mahadashraf.650@yahoo.com', '12345678', '$2y$10$wYwShD.peaQS93HVPnbhw.wScb0f37Q0Uuqgs4Vt3BcIEYSsLNM4W', 'EE'),
('sherjeel', 'bob', 'mahadashraf.650@yahoo.com', '03414427668', '$2y$10$KhcAZvE940kQoVJnj7boOObLEOdrAAMIT.T8.UXG5K8qHbzwVvLGq', 'CS'),
('mahad', 'mahdd', 'mahadashraf.650@yahoo.com', '12345', '$2y$10$JrmdSsm/4Tu6cqi8DwNijOa2FBnx1tMSuAGXIon1sLZ8UkYMf/r9S', 'CS'),
('mahad', 'mahdd', 'mahadashraf.650@yahoo.com', '12345', '$2y$10$YOaQj8Z1soNJlNzyArHpb.3JFD4iJi63yq6hqFLeOf423V3i7pJuC', 'CS'),
('mahad', 'mahdd', 'mahadashraf.650@yahoo.com', '12345', '$2y$10$I4EGUc6I2CVrG/EWrEIYOeuxGTkvIRatbQrv9r/L36q5nnuAdJh96', 'CS'),
('mahad', 'mahdd', 'mahadashraf.650@yahoo.com', '12345', '$2y$10$Nsn.pYGvv/OXeYgczDQ77esYNQ3rt5pMoGZuCMEDRwhRx/reGuQoK', 'CS'),
('mahad', 'mahdd', 'mahadashraf.650@yahoo.com', '12345', '$2y$10$CcSN0ePGBKVMQbERiKtD1eFdxoqQ6xAF5Ex6B4a8mg4AASDP2dE1i', 'CS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lms_author`
--
ALTER TABLE `lms_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lms_book`
--
ALTER TABLE `lms_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lms_category`
--
ALTER TABLE `lms_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lms_issue_book`
--
ALTER TABLE `lms_issue_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lms_location_rack`
--
ALTER TABLE `lms_location_rack`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lms_setting`
--
ALTER TABLE `lms_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `lms_user`
--
ALTER TABLE `lms_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lms_author`
--
ALTER TABLE `lms_author`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lms_book`
--
ALTER TABLE `lms_book`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lms_category`
--
ALTER TABLE `lms_category`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lms_issue_book`
--
ALTER TABLE `lms_issue_book`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lms_location_rack`
--
ALTER TABLE `lms_location_rack`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lms_setting`
--
ALTER TABLE `lms_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lms_user`
--
ALTER TABLE `lms_user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
