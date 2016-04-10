-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2016 at 08:41 PM
-- Server version: 5.5.45
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_docs`
--

-- --------------------------------------------------------

--
-- Table structure for table `doc_config`
--

CREATE TABLE `doc_config` (
  `ID` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value_vi` text COLLATE utf8_unicode_ci NOT NULL,
  `value_en` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attributes` text COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doc_config`
--

INSERT INTO `doc_config` (`ID`, `label`, `name`, `value_vi`, `value_en`, `type`, `group`, `attributes`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nội dung header', 'contentHeader', '<p>dsa</p>', '', 'editor', '', '', 10, 1, '2016-03-25 16:20:23', '0000-00-00 00:00:00'),
(2, 'Logo', 'logo', '', '', 'file', '', '', 2, 1, '2016-03-24 14:31:06', '0000-00-00 00:00:00'),
(3, 'Banner', 'banner', '', '', 'file', '', '', 3, 1, '2016-03-25 15:57:08', '0000-00-00 00:00:00'),
(4, 'Nội dung footer', 'contentFooter', '<p>dsa<img src="http://laravel_docs.local/uploads/filemanager/654125f4-010d-476e-8a89-b2fb0fc1d996.jpg" alt="" /></p>', '', 'editor', '', '', 4, 1, '2016-03-25 16:26:33', '0000-00-00 00:00:00'),
(5, 'Hotline', 'hotline', 'dff', '', 'text', '', '{"placeholder":"Đường dây nóng"}', 5, 1, '2016-03-25 17:13:10', '0000-00-00 00:00:00'),
(6, 'Tiêu đề trang', 'meta_title', '4', '', 'textarea', '', '', 3, 1, '2016-03-27 07:52:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doc_customers`
--

CREATE TABLE `doc_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_card` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birth_day` date NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `verify_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doc_customers`
--

INSERT INTO `doc_customers` (`id`, `name`, `email`, `id_card`, `phone`, `gender`, `password`, `birth_day`, `address`, `role`, `status`, `verify_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hà Trọng Nguyên', 'nguyen1@gmail.com', '', '0555555555', '', '$2y$10$H2bTD2ycHyciVhlijCkTbu1T0Ii9JdTsK.YLrmd4cjKT.ThGbGIyO', '0000-00-00', '', '1', '1', '', 'sWRBX3AOiqx6At34LA9s2BksdWsXWygmEWR8Sotuy2lsknbBcUPs1WRdvh3Y', '2016-03-31 09:25:52', '2016-04-06 09:05:02'),
(2, 'Hà Trọng Nguyên', 'nguyen2@gmail.com', '', '01656228509', '', '$2y$10$AkgaP3wgdIbGfDEsCTWIPOfEURV2AEB/GCPc8UKrEnrSmp/ytVKEi', '0000-00-00', '', 'user', '1', '', 'QuJex1hqungRQY9MmQQEyvc4uh1Ls5NzeQqgQkJhncEdQK2SmEDCUlJtewfe', '2016-04-02 01:18:46', '2016-04-02 01:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `doc_customer_finance`
--

CREATE TABLE `doc_customer_finance` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doc_customer_finance`
--

INSERT INTO `doc_customer_finance` (`id`, `user_id`, `income`, `balance`, `created_at`, `updated_at`) VALUES
(1, 5, 0, 50, '2016-03-30 06:29:07', '2016-03-30 06:45:46'),
(2, 4, 0, 30, '2016-03-30 06:48:09', '2016-03-30 06:48:09'),
(3, 1, 0, 50000, '2016-03-30 08:09:52', '2016-03-30 08:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `doc_document`
--

CREATE TABLE `doc_document` (
  `id` int(10) UNSIGNED NOT NULL,
  `author` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `format` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `page_viewed` smallint(6) NOT NULL,
  `link_file` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tax_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doc_document`
--

INSERT INTO `doc_document` (`id`, `author`, `slug`, `title`, `price`, `format`, `thumbnail`, `page_viewed`, `link_file`, `tax_id`, `created_at`, `updated_at`) VALUES
(1, 1, '', 'Đề thi tốt nghiệp 2016', 5000, 'docx', '', 0, '12802821_914519861999377_558210973457457378_n.jpg', 7, '2016-03-23 17:00:00', '2016-03-31 09:23:55'),
(2, 1, '', 'sadsa', 200, '', '', 0, 'Capture.PNG', 7, '2016-03-31 10:00:59', '2016-03-31 10:00:59'),
(3, 1, '', 'sadsa', 200, '', '', 0, 'Capture.PNG', 7, '2016-03-31 10:01:19', '2016-04-03 06:55:00'),
(4, 1, '', 'sadsa', 200, '', '', 0, 'Capture.PNG', 7, '2016-03-31 10:01:28', '2016-03-31 10:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `doc_doc_keywords`
--

CREATE TABLE `doc_doc_keywords` (
  `id` int(10) UNSIGNED NOT NULL,
  `doc_id` int(11) NOT NULL,
  `key_word` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doc_doc_keywords`
--

INSERT INTO `doc_doc_keywords` (`id`, `doc_id`, `key_word`, `created_at`, `updated_at`) VALUES
(31, 1, 'Đề thi', '2016-03-31 09:23:55', '2016-03-31 09:23:55'),
(32, 1, 'Đề thi toán', '2016-03-31 09:23:55', '2016-03-31 09:23:55'),
(33, 3, 'adsad', '2016-04-03 06:55:00', '2016-04-03 06:55:00'),
(34, 3, 'adsada', '2016-04-03 06:55:00', '2016-04-03 06:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `doc_doc_meta`
--

CREATE TABLE `doc_doc_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `doc_id` int(11) NOT NULL,
  `num_viewed` int(11) NOT NULL,
  `num_downloaded` int(11) NOT NULL,
  `date_sold` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doc_message`
--

CREATE TABLE `doc_message` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doc_migrations`
--

CREATE TABLE `doc_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doc_migrations`
--

INSERT INTO `doc_migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2016_03_21_155001_create_taxonomy_table', 1),
('2016_03_21_155156_create_document_table', 1),
('2016_03_21_155207_create_doc_keywords_table', 1),
('2016_03_21_155233_create_doc_meta_table', 1),
('2016_03_21_155504_create_user_finance_table', 1),
('2016_03_21_155726_create_trading_history_table', 1),
('2016_03_21_155749_create_message_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2016_03_21_155001_create_taxonomy_table', 1),
('2016_03_21_155156_create_document_table', 1),
('2016_03_21_155207_create_doc_keywords_table', 1),
('2016_03_21_155233_create_doc_meta_table', 1),
('2016_03_21_155504_create_user_finance_table', 1),
('2016_03_21_155726_create_trading_history_table', 1),
('2016_03_21_155749_create_message_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doc_nav_backend`
--

CREATE TABLE `doc_nav_backend` (
  `ID` int(11) NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doc_nav_backend`
--

INSERT INTO `doc_nav_backend` (`ID`, `route`, `title`, `link`, `icon`, `parent`, `position`, `status`) VALUES
(1, 'Backend::config', 'Cấu hình website', 'backend/config/', 'fa-cogs', 0, 2, 1),
(2, 'Backend::transaction', 'Quản lý giao dịch', 'backend/transaction/', 'fa-shopping-cart ', 0, 3, 1),
(3, 'Backend::report', 'Thống kê', 'backend/report/', 'fa-line-chart', 0, 4, 1),
(4, 'Backend::customers', 'Quản lý người dùng', 'backend/customers/', 'fa-users', 0, 5, 1),
(5, 'Backend::dashboard', 'Trang tổng quan', 'backend/dashboard', 'fa-tachometer', 0, 1, 1),
(6, 'Backend::taxonomy', 'Quản lý danh mục', 'backend/taxonomy', 'fa-indent', 0, 10, 1),
(7, 'Backend::document', 'Quản lý tài liệu', 'backend/document', 'fa-file-text', 0, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doc_taxonomy`
--

CREATE TABLE `doc_taxonomy` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `parent` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doc_taxonomy`
--

INSERT INTO `doc_taxonomy` (`id`, `slug`, `tax_name`, `description`, `parent`, `created_at`, `updated_at`) VALUES
(1, 'giao-duc-dao-tao', 'Giáo dục - Đào tạo', '', 0, '2016-04-02 01:28:36', '2016-04-02 01:28:36'),
(2, 'mam-non', 'Mầm non', '', 1, '2016-04-02 01:29:11', '2016-04-02 01:29:11'),
(3, 'lop-3-12-thang-tuoi', 'Lớp 3 - 12 tháng tuổi', '', 2, '2016-04-02 01:30:41', '2016-04-02 01:30:41'),
(4, 'lop-12-24-thang-tuoi', 'Lớp 12 - 24 tháng tuổi', '', 2, '2016-04-02 01:30:53', '2016-04-02 01:30:53'),
(5, 'tieu-hoc', 'Tiểu học', '', 1, '2016-04-02 01:31:55', '2016-04-02 01:31:55'),
(6, 'lop-1', 'Lớp 1', '', 5, '2016-04-02 01:32:45', '2016-04-02 01:32:45'),
(7, 'lop-2', 'Lớp 2', '', 5, '2016-04-02 01:33:04', '2016-04-02 01:33:04'),
(8, 'trung-hoc-co-so', 'Trung học cơ sở', '', 1, '2016-04-02 01:33:39', '2016-04-02 01:33:39'),
(9, 'lop-6', 'Lớp 6', '', 8, '2016-04-02 01:33:58', '2016-04-02 01:33:58'),
(10, 'ky-nang-mem', 'Kỹ năng mềm', '', 0, '2016-04-02 01:34:24', '2016-04-02 01:34:24'),
(11, 'kinh-doanh-tiep-thi', 'Kinh doanh - Tiếp thị', '', 0, '2016-04-02 01:37:40', '2016-04-02 01:37:40'),
(12, 'kinh-te-quan-ly', 'Kinh tế - Quản lý', '', 0, '2016-04-02 01:38:06', '2016-04-02 01:38:06'),
(13, 'tai-chinh-ngan-hang', 'Tài chính - Ngân hàng', '', 0, '2016-04-02 01:38:24', '2016-04-02 01:38:24'),
(14, 'bieu-mau-van-ban', 'Biểu mẫu - Văn bản', '', 0, '2016-04-02 01:38:47', '2016-04-02 01:38:47'),
(15, 'cong-nghe-thong-tin', 'Công nghệ thông tin', '', 0, '2016-04-02 01:40:30', '2016-04-02 01:40:30'),
(16, 'ky-thuat-cong-nghe', 'Kỹ thuật - Công nghệ', '', 0, '2016-04-02 01:40:47', '2016-04-02 01:40:47'),
(17, 'ky-nang-lanh-dao', 'Kỹ năng lãnh đạo', '', 10, '2016-04-02 19:21:09', '2016-04-02 19:21:09'),
(18, 'ky-nang-quan-ly', 'Kỹ năng quản lý ', '', 10, '2016-04-02 19:21:21', '2016-04-02 19:21:21'),
(19, 'ky-nang-tu-duy-logic', 'Kỹ năng tư duy- logic', '', 10, '2016-04-02 19:21:29', '2016-04-02 19:21:29'),
(20, 'ky-nang-thuyet-trinh', 'Kỹ năng thuyết trình', '', 10, '2016-04-02 19:21:37', '2016-04-02 19:21:37'),
(21, 'ky-nang-giao-tiep', 'Kỹ năng giao tiếp', '', 10, '2016-04-02 19:21:45', '2016-04-02 19:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `doc_trading_history`
--

CREATE TABLE `doc_trading_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `trading_code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `trading_type` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `trading_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `trading_status` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `trading_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount_money` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doc_users`
--

CREATE TABLE `doc_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_card` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birth_day` date NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `verify_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doc_user_finance`
--

CREATE TABLE `doc_user_finance` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doc_config`
--
ALTER TABLE `doc_config`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doc_customers`
--
ALTER TABLE `doc_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `doc_customer_finance`
--
ALTER TABLE `doc_customer_finance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_document`
--
ALTER TABLE `doc_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_doc_keywords`
--
ALTER TABLE `doc_doc_keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_doc_meta`
--
ALTER TABLE `doc_doc_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_message`
--
ALTER TABLE `doc_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_nav_backend`
--
ALTER TABLE `doc_nav_backend`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doc_taxonomy`
--
ALTER TABLE `doc_taxonomy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_trading_history`
--
ALTER TABLE `doc_trading_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_users`
--
ALTER TABLE `doc_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `doc_user_finance`
--
ALTER TABLE `doc_user_finance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doc_config`
--
ALTER TABLE `doc_config`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `doc_customers`
--
ALTER TABLE `doc_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `doc_customer_finance`
--
ALTER TABLE `doc_customer_finance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `doc_document`
--
ALTER TABLE `doc_document`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doc_doc_keywords`
--
ALTER TABLE `doc_doc_keywords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `doc_doc_meta`
--
ALTER TABLE `doc_doc_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doc_message`
--
ALTER TABLE `doc_message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doc_nav_backend`
--
ALTER TABLE `doc_nav_backend`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `doc_taxonomy`
--
ALTER TABLE `doc_taxonomy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `doc_trading_history`
--
ALTER TABLE `doc_trading_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doc_users`
--
ALTER TABLE `doc_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doc_user_finance`
--
ALTER TABLE `doc_user_finance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
