-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2020 at 06:38 PM
-- Server version: 10.3.23-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plaxerbd_freefire`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_setting`
--

CREATE TABLE `contact_setting` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `open_time` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `pinterest` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_setting`
--

INSERT INTO `contact_setting` (`id`, `address`, `open_time`, `email`, `phone`, `facebook`, `twitter`, `linkedin`, `pinterest`, `instagram`, `youtube`, `status`) VALUES
(5, '', '', 'plaxerbdgaming@gmail.com', '+8801715177188', 'https://www.facebook.com/A2758/', 'https://twitter.com/', '', '', 'https://www.facebook.com/A2758/', 'https://www.youtube.com/channel/UCL-Ft3aKhZw67SGBbFLTA4A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `id` int(11) NOT NULL,
  `tournament_id` varchar(20) NOT NULL,
  `custom_id` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom`
--

INSERT INTO `custom` (`id`, `tournament_id`, `custom_id`, `password`, `status`) VALUES
(2, 'Tournament40756', '5266859', '123456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `footer_menus`
--

CREATE TABLE `footer_menus` (
  `id` int(11) NOT NULL,
  `menu_item_name` varchar(100) NOT NULL,
  `menu_item_bangla` varchar(255) NOT NULL,
  `page_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(11) NOT NULL,
  `header_text` text DEFAULT NULL,
  `footer_text` text NOT NULL,
  `logo` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `header_text`, `footer_text`, `logo`, `status`) VALUES
(6, 'Plaxer Gaming Web', '<p>Copyright &copy; 2020 Plaxer. All rights reserved. Dashboard by&nbsp;<a href=\"plaxer.com\">plaxer.com</a></p>\r\n', '93395.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_item_name` varchar(100) NOT NULL,
  `menu_item_bangla` varchar(255) NOT NULL,
  `page_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(30) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_slug` varchar(30) NOT NULL,
  `page_description` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `id_code` varchar(255) NOT NULL,
  `bkash` varchar(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `f_name`, `email`, `password`, `id_code`, `bkash`, `status`) VALUES
(5, ' So Tom', '01882634191', 'eaa625a6169e426343b3702924c7939ea508b17b9188e271d2d1cc2b54fc01109f50e14a9425088fb7a294bf54c9e33317e60fdc9cb583b99dec124ba60a1ab5', '694427993', '01740006203', 1),
(6, 'So Ovi', '01705781901', 'eaa625a6169e426343b3702924c7939ea508b17b9188e271d2d1cc2b54fc01109f50e14a9425088fb7a294bf54c9e33317e60fdc9cb583b99dec124ba60a1ab5', '2055267493', '01740006203', 1),
(7, 'Mr Parves', '01315513136', '0c12348fe6cd05ac2012bba21616ac115c7c335b514ca2ff24c56aac4c3d4625b9878baf95f097c3ae1c7ef5e3e3df76058add88060341adf760a81f5eb11500', '2004928247', '01315513136', 1),
(8, 'Md Atik Musaddik', 'Atikutso602@gmail.com', '1c69ec29800b0bffd66ed57101259b4a8166e4b41f39bf425d20258591209c92ed3c795016a2141fa398d4233ab6568b341807046117b828eafc8cf2c0ff13ef', '6666666666', '01952543661', 1),
(9, 'Md Atik Musaddik', 'Atikutso600@gmail.com', '1c69ec29800b0bffd66ed57101259b4a8166e4b41f39bf425d20258591209c92ed3c795016a2141fa398d4233ab6568b341807046117b828eafc8cf2c0ff13ef', '6666666666', '01952543661', 1),
(10, 'Md Atik Musaddik', 'Gdusushshjfjskejjwjeje', '1c69ec29800b0bffd66ed57101259b4a8166e4b41f39bf425d20258591209c92ed3c795016a2141fa398d4233ab6568b341807046117b828eafc8cf2c0ff13ef', '6666666666', '01952543661', 1),
(11, 'Md Atik Musaddik', '01712345678', '1c69ec29800b0bffd66ed57101259b4a8166e4b41f39bf425d20258591209c92ed3c795016a2141fa398d4233ab6568b341807046117b828eafc8cf2c0ff13ef', '6666666666', '01912345678', 1),
(12, 'PM Parves Hossen', '01737121797', '238cd9fcc39b5ddd3ae93eebac8dafe9f408a982e114d54c261e8c7eb1ce3106a9b8f10ff492803eb3883c34a142714578722008687bf23a91df32a7218a0a9a', '2572811615', '01315513136', 1),
(13, 'Rakibul Islam', 'rakibphp512@gmail.com', '33b9c0bd5f27f6138b9ce78725a2d30ab860806600cf4b981bfca75df1a4a7d96664cf71d521be1b3abe9af6ca147f207dcd1ebf8953abb3be3b31d5de44f4c5', '12536458', '01687986378', 1),
(14, 'Sagor Islam', '01715396399', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 'r2hr67h78uj', '01715396399', 1),
(15, 'Md Zohirul Islam', '01918067999', 'b0412597dcea813655574dc54a5b74967cf85317f0332a2591be7953a016f8de56200eb37d5ba593b1e4aa27cea5ca27100f94dccd5b04bae5cadd4454dba67d', '2414406808', '01918067999', 1),
(16, 'Pollob', 'prangonpaul450@gmail.com', '177dccb414ced0b563522509ea43d1f5bdda439b0e8b481e2c4fdaa468d5e1a03b2c7f2902635560d6f8ddf632eedcca1d8ffacbb42e24068f67170086b67904', '866030547541453', '01307198523', 1),
(17, 'Rabby Khan', '01701343693', '2dfe7abe1b8b2dd729aeef74ca15aa8b16f174031b336bb7cfaccee01e40f1829936e7e856a402e17214afddc803b7b2285a5570b17f2ef819b6bb87db472162', '2218615949', '01701343693', 1),
(18, 'Arju Ahmed', '01740006203', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '546ghssg1', '01740006203', 1),
(19, 'Mostafizur ', '01951286099', 'd59bf12ed4580bd38df5d859c763092120580b37bf97388889466db8f2d7a7b4bf1f434eb4dd932eaad5307d746fcbf8544d09f67f12e7d1ca7697e452e239d0', '2385979050', '01951286099', 1),
(20, 'Mahfuzur Rahman  ', 'mahfuzurrahmanpranto78699@gmai', 'a9ecafcc2e86c4da9eaa29d0ecb5486953966fce8358b30fe1af0e72ae0ec5f3e79f4768a501c8c07fb51ec3a4e651fc45e78c1cba1e09b8a0a1e16da62efb87', '2077545320', '+8801729551317', 1),
(21, 'Mahfuzur Rahman  ', 'mahfuzurrahmanpranto78699@gmai', '488540464d662ec3f3b2253140d7b259c740d2831cee8b1e3b55427d7f258bd4914012deab3a188d1ab3a4496ee32ae411c2e5dad0c88684637815b7391e1c61', '2077545320', '+8801729551317', 1),
(22, 'Ahmed Bappy', '01316917063', '0a50b4de86d6a83d787d73bf11bbbc25779e7bb5d48e93095c5d4abad332e86e205808f92ec9c2a64ea3eaa322199b1549d0e361bbbd15874ba3917d0c1b98d0', '1624543684', '01645138018', 1),
(23, 'So Akib', '01319991047', '2bb865b608c716a2a1e4420fa6a9c634c725f8229a0725c0d21842544f91e1a9a04671a741ea8be4025411546bf035b0d62f28748560a144b8955df34155b19d', '2002031807', '01319991047', 1),
(24, 'Ahmed Bappi ', '01742575222', '21c3d7352265780cb96da70d3c10c7f97340cf9742fca5d05a2366f298b468f94a14afe3b3b39c3ce20d5d1c8b7366503155980f5dcd8c4ad846426c8671769e', '1624543684', '01645138018', 1),
(25, 'Rudra', '01755461573', 'eaa625a6169e426343b3702924c7939ea508b17b9188e271d2d1cc2b54fc01109f50e14a9425088fb7a294bf54c9e33317e60fdc9cb583b99dec124ba60a1ab5', '2152025166', '01755461573', 1),
(26, 'KABBO GAMER ', '01829276432', '6d6f2cbce53c2b84077851f8ed5df5ff6529d13f404d9244436f93f1f5801998d55b36d4deccb45dc1b36d29417c4f082e902d29419381eacb3f8ab10653d904', '1970338683', '01725700937', 1);

-- --------------------------------------------------------

--
-- Table structure for table `running_tournament`
--

CREATE TABLE `running_tournament` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `free_fire_id` varchar(15) NOT NULL,
  `tournament_id` varchar(20) NOT NULL,
  `tournament_name` varchar(50) NOT NULL,
  `tournament_level` varchar(20) NOT NULL,
  `trxid` varchar(10) NOT NULL,
  `bkash` varchar(11) NOT NULL,
  `counter_code` int(4) NOT NULL,
  `checked` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `running_tournament`
--

INSERT INTO `running_tournament` (`id`, `name`, `free_fire_id`, `tournament_id`, `tournament_name`, `tournament_level`, `trxid`, `bkash`, `counter_code`, `checked`, `status`) VALUES
(1, 'Rakibul Islam', '1246jkl', 'Tournament40756', 'Classic Single 48 Players', '1 upto 30', '5C424PC2WM', '01687986378', 5678, 1, 1),
(2, 'Rakibul Islam', '1246jkl', 'Tournament40756', 'Classic Single 48 Players', '1 upto 30', '5C424PC2WM', '01687986378', 5678, 1, 1),
(3, 'Rakibul Islam', '1246jky', 'Tournament91133', 'Classic Single 48 Players', '1 upto 30', '5C424PC2WN', '01687986378', 5678, 0, 0),
(4, ' So Tom', '694427993', 'Tournament91133', 'Classic Single 48 Players', '1 upto 30', '7KP814XDE', '01740006203', 7896, 0, 1),
(5, 'Md Atik Musaddik', '6666666666', 'Tournament36633', 'Classic Single 30 Players', '1 upto 30', '7KU53HHIPZ', '01912345678', 27581, 1, 1),
(19, 'Rabby Khan', '2218615949', 'Tournament1001', 'Classic Solo 48 Players', 'Any Level', '', '01701343693', 1001, 0, 1),
(20, 'Arju Ahmed', '01844555', 'Tournament75835', 'Classic Solo 48 Players', 'Any Level', '', '01740006203', 10010, 1, 1),
(21, 'Mostafizur ', '2385979050', 'Tournament75835', 'Classic Solo 48 Players', 'Any Level', '', '01951286099', 10010, 1, 1),
(22, 'Mr Parves', '2004928247', 'Tournament75835', 'Classic Solo 48 Players', 'Any Level', '', '01315513136', 10010, 1, 1),
(23, 'So Akib', '2002031807', 'Tournament75835', 'Classic Solo 48 Players', 'Any Level', '', '01319991047', 10010, 1, 1),
(24, 'Rudra', '2152025166', 'Tournament75835', 'Classic Solo 48 Players', 'Any Level', '', '01755461573', 10010, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `id` int(11) NOT NULL,
  `tournament_name` varchar(100) NOT NULL,
  `tournament_id` varchar(16) NOT NULL,
  `entry_fee` varchar(11) NOT NULL,
  `prize` int(11) NOT NULL,
  `tournament_type` varchar(30) NOT NULL,
  `tournament_map` varchar(15) NOT NULL,
  `players` int(11) NOT NULL,
  `level` varchar(15) NOT NULL,
  `counter_code` int(11) NOT NULL,
  `image` varchar(15) NOT NULL,
  `start_time` varchar(30) DEFAULT NULL,
  `open_time` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`id`, `tournament_name`, `tournament_id`, `entry_fee`, `prize`, `tournament_type`, `tournament_map`, `players`, `level`, `counter_code`, `image`, `start_time`, `open_time`, `status`) VALUES
(4, 'Classic Solo 30 Players', 'Tournament36633', '15', 303, 'Classic Solo', 'Bermuda', 30, '1 upto 30', 27581, '10147.jpeg', '', '11 Dec 2020 03:11:05pm', 1),
(5, 'Classic Solo 30 Players', 'Tournament31516', '15', 303, 'Classic Solo', 'Bermuda', 30, '31 upto 40', 27582, '16863.jpg', '2020-12-01T12:01', '05 Dec 2020 03:53:20pm', 1),
(6, 'Classic Solo 30 Players', 'Tournament77997', '15', 303, 'Classic Solo', 'Bermuda', 30, '41 upto 50', 27583, '55174.jpeg', '2020-12-01T12:01', '05 Dec 2020 03:54:21pm', 1),
(7, 'Classic Solo 30 Players', 'Tournament98262', '15', 303, 'Classic Solo', 'Bermuda', 30, '51 upto 60', 27584, '13698.jpeg', '2020-12-01T15:01', '05 Dec 2020 03:55:04pm', 1),
(8, 'Classic Solo 30 Players', 'Tournament3218', '15', 303, 'Classic Solo', 'Bermuda', 30, '61 upto 70', 27585, '48573.jpeg', '2020-12-01T16:01', '05 Dec 2020 03:58:05pm', 1),
(9, 'Classic Solo 30 Players', 'Tournament24474', '25', 606, 'Classic Solo', 'Bermuda', 30, '1 upto 30', 27586, '21926.jpeg', '2020-12-01T18:01', '05 Dec 2020 03:58:34pm', 1),
(10, 'Classic Solo 30 Players', 'Tournament57569', '25', 606, 'Classic Solo', 'Bermuda', 30, '31 upto 40', 27587, '45292.jpeg', '2020-12-01T22:01', '05 Dec 2020 03:59:01pm', 1),
(11, 'Classic Solo 30 Players', 'Tournament65663', '25', 606, 'Classic Solo', 'Bermuda', 30, '41 upto 50', 27588, '34834.jpg', '2020-12-02T10:01', '05 Dec 2020 03:59:33pm', 1),
(12, 'Classic Solo 30 Players', 'Tournament48843', '25', 606, 'Classic Solo', 'Bermuda', 30, '51 upto 60', 27589, '95132.jpg', '2020-12-02T11:01', '05 Dec 2020 04:00:01pm', 1),
(13, 'Classic Solo 48 Players', 'Tournament61092', '25', 606, 'Classic Solo', 'Bermuda', 30, '61 upto 70', 275811, '76230.jpg', '2020-12-02T12:01', '05 Dec 2020 04:00:22pm', 1),
(14, 'Classic Solo 48 Players', 'Tournament77653', '15', 555, 'Classic Solo', 'Bermuda', 48, '1 upto 30', 2758912, '39930.jpg', '2020-12-02T15:01', '05 Dec 2020 04:01:07pm', 1),
(15, 'Classic Solo 48 Players', 'Tournament91244', '15', 555, 'Classic Solo', 'Bermuda', 48, '31 upto 40', 275813, '67889.png', '2020-11-28T13:46', '05 Dec 2020 04:01:33pm', 1),
(16, 'Classic Solo 48 Players', 'Tournament51419', '15', 555, 'Classic Solo', 'Bermuda', 48, '41 upto 50', 275814, '58694.jpg', '2020-11-28T13:47', '05 Dec 2020 04:01:54pm', 1),
(17, 'Classic Solo 48 Players', 'Tournament6078', '15', 555, 'Classic Solo', 'Bermuda', 48, '51 upto 60', 275815, '23147.png', '2020-12-03T13:49', '05 Dec 2020 04:02:17pm', 1),
(18, 'Classic Solo 48 Players', 'Tournament24648', '15', 555, 'Classic Solo', 'Bermuda', 48, '61 upto 70', 276816, '51467.jpg', '2020-12-02T14:50', '05 Dec 2020 04:03:29pm', 1),
(19, 'Classic Solo 48 Players', 'Tournament36106', '25', 1010, 'Classic Solo', 'Bermuda', 48, '1 upto 30', 275817, '49411.jpg', '2020-12-03T13:51', '05 Dec 2020 04:03:58pm', 1),
(20, 'Classic Solo 48 Players', 'Tournament52104', '25', 1010, 'Classic Solo', 'Bermuda', 48, '31 upto 40', 275818, '86067.jpeg', '2020-12-04T22:53', '05 Dec 2020 04:04:17pm', 1),
(21, 'Classic Solo 48 Players', 'Tournament4639', '25', 1010, 'Classic Solo', 'Bermuda', 48, '41 upto 50', 275819, '43916.jpg', '2020-12-05T13:54', '05 Dec 2020 04:04:38pm', 1),
(22, 'Classic Solo 48 Players', 'Tournament75385', '25', 1010, 'Classic Solo', 'Bermuda', 48, '51 upto 60', 275820, '38698.jpg', '2020-12-05T09:31', '28 Nov 2020 03:32:04pm', 1),
(23, 'Classic Solo 48 Players', 'Tournament41633', '25', 1010, 'Classic Solo', 'Bermuda', 48, '61 upto 70', 275821, '77192.jpeg', '2020-12-05T10:33', '28 Nov 2020 03:33:28pm', 1),
(25, 'Classic Solo 48 Players', 'Tournament75835', 'Free', 101, 'Classic Solo', 'Bermuda', 48, 'Any Level', 10010, '6419.jpg', '', '11 Dec 2020 03:10:35pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ui_elements`
--

CREATE TABLE `ui_elements` (
  `id` int(11) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_title_bangla` varchar(255) NOT NULL,
  `banner_desc` varchar(255) NOT NULL,
  `banner_desc_bangla` varchar(255) NOT NULL,
  `header_banner` varchar(15) NOT NULL,
  `footer_banner_1` varchar(15) DEFAULT NULL,
  `footer_banner_2` varchar(15) DEFAULT NULL,
  `header_text` longtext DEFAULT NULL,
  `header_text_b` longtext DEFAULT NULL,
  `footer_text` longtext DEFAULT NULL,
  `footer_text_b` longtext DEFAULT NULL,
  `image` varchar(15) NOT NULL,
  `page_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `type` varchar(30) NOT NULL,
  `image` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `type`, `image`, `status`) VALUES
(6, 'Rakibul Islam', 'rakibphp512@gmail.com', '33b9c0bd5f27f6138b9ce78725a2d30ab860806600cf4b981bfca75df1a4a7d96664cf71d521be1b3abe9af6ca147f207dcd1ebf8953abb3be3b31d5de44f4c5', 'Administrator', '64416.jpg', 1),
(10, 'Arju Ahmed', 'arjuahmed266@gmail.com', 'af5782997ed6c080237947a2990275f4a50d52badcc96cbf2f1c9fc7150f95bb4f0f216e155fd53e20897750f998d779267c3e1d7a6cb393719082d60808d855', 'Administrator', '98068.jpeg', 1),
(13, 'Maruf', 'marufkhank@gmail.com', '204809e4273a25519d25f7a984faac6d1d2b1e7589d27cece9e69fedc87de5ab692ee19c4bdfaa83156220904f0fa5129d1d7a23404ec4581eecbbba595d974e', 'Editor', '25213.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

CREATE TABLE `winners` (
  `id` int(11) NOT NULL,
  `tournament_id` varchar(20) NOT NULL,
  `player_name` varchar(30) NOT NULL,
  `freefire_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_setting`
--
ALTER TABLE `contact_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_menus`
--
ALTER TABLE `footer_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `running_tournament`
--
ALTER TABLE `running_tournament`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ui_elements`
--
ALTER TABLE `ui_elements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winners`
--
ALTER TABLE `winners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_setting`
--
ALTER TABLE `contact_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `custom`
--
ALTER TABLE `custom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `footer_menus`
--
ALTER TABLE `footer_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `running_tournament`
--
ALTER TABLE `running_tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ui_elements`
--
ALTER TABLE `ui_elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `winners`
--
ALTER TABLE `winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
