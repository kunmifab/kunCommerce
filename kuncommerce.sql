-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 04:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuncommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Phones', 'phones-3tj', 'categories/lQhkKF0FGrZAOzvhDk9u3agAkETOfOxBpKA8hubO.jpg', '2022-08-04 21:52:10', '2022-08-04 21:52:10'),
(2, 'Mobile Accessories', 'mobile-accessories-ygy', 'categories/tY3vg9KG5qBJUaJ62w9ChuyGm16OH9aIZ5kEM88E.jpg', '2022-08-04 21:52:32', '2022-08-04 21:52:32'),
(3, 'Men\'s Wears', 'mens-wears-8k2', 'categories/EIP1LKFCk7Mexu8Ooo67FNnjWdRNPAFsyg2c7Wz2.jpg', '2022-08-04 21:52:53', '2022-08-04 21:52:53'),
(4, 'Women\'s Wears', 'womens-wears-nlj', 'categories/alxKcSUzoqVqamKaxixmHXdxbOn5k0bRdSExMLCk.jpg', '2022-08-04 21:53:10', '2022-08-04 21:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `sign`, `abbr`, `created_at`, `updated_at`) VALUES
(1, 'Naira', '₦', 'NGN', '2022-08-04 21:56:25', '2022-08-04 21:56:25'),
(2, 'Dollar', '$', 'USD', '2022-08-04 21:56:49', '2022-08-04 21:56:49'),
(3, 'Euro', '€', 'EUR', '2022-08-04 21:57:04', '2022-08-04 21:57:04'),
(4, 'Pound Sterling', '£', 'GBP', '2022-08-04 21:57:18', '2022-08-04 21:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `escrows`
--

CREATE TABLE `escrows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'received',
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `escrows`
--

INSERT INTO `escrows` (`id`, `order_id`, `amount`, `status`, `paid_at`, `created_at`, `updated_at`) VALUES
(1, 14, 380246, 'sent', '2022-08-10 15:28:47', '2022-08-10 15:23:15', '2022-08-10 15:28:47'),
(2, 15, 5500, 'sent', '2022-08-10 15:31:16', '2022-08-10 15:30:43', '2022-08-10 15:31:16'),
(3, 16, 5500, 'sent', '2022-08-22 15:32:34', '2022-08-10 16:00:36', '2022-08-22 15:32:34'),
(4, 17, 599500, 'sent', '2022-08-22 15:38:57', '2022-08-22 15:35:22', '2022-08-22 15:38:57'),
(5, 18, 149050, 'received', NULL, '2022-08-22 16:42:01', '2022-08-22 16:42:01'),
(6, 19, 385746, 'sent', '2022-08-22 17:26:42', '2022-08-22 16:46:32', '2022-08-22 17:26:42'),
(7, 20, 599500, 'sent', '2022-08-22 17:26:29', '2022-08-22 17:25:24', '2022-08-22 17:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(10, '2022_07_05_202106_create_transactions_table', 1),
(14, '2022_07_17_095926_create_plans_table', 2),
(15, '2022_07_18_104843_create_accounts_table', 3),
(32, '2014_10_12_000000_create_users_table', 4),
(33, '2014_10_12_100000_create_password_resets_table', 4),
(34, '2019_05_03_000001_create_customer_columns', 4),
(35, '2019_05_03_000002_create_subscriptions_table', 4),
(36, '2019_05_03_000003_create_subscription_items_table', 4),
(37, '2019_08_19_000000_create_failed_jobs_table', 4),
(38, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(39, '2022_07_05_201945_create_products_table', 4),
(40, '2022_07_05_202021_create_categories_table', 4),
(42, '2022_07_05_203552_create_roles_table', 4),
(43, '2022_07_07_140009_create_currencies_table', 4),
(45, '2022_08_03_121035_create_order_product_table', 4),
(46, '2022_08_04_163428_create_transactions_table', 4),
(52, '2022_08_03_111805_create_orders_table', 9),
(55, '2022_07_05_202137_create_wallets_table', 10),
(58, '2022_08_08_130534_create_escrows_table', 11),
(59, '2022_08_08_102205_create_reviews_table', 12),
(62, '2022_08_22_105058_create_notifications_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `review_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `content`, `order_id`, `review_id`, `user_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Review', 'By Akinkunmi Akinola', NULL, 11, NULL, NULL, 'seen', '2022-08-22 16:15:54', '2022-08-22 18:13:43'),
(2, 'Order', 'Item(s) bought by Akinkunmi Akinola', 18, NULL, NULL, NULL, 'seen', '2022-08-22 16:42:01', '2022-08-22 18:13:43'),
(3, 'Order', 'Item(s) bought by Akinkunmi Akinola', 19, NULL, NULL, NULL, 'seen', '2022-08-22 16:46:32', '2022-08-22 18:41:09'),
(4, 'Product', 'A new product Sneakers has been added by Akinkunmi Akinola', NULL, NULL, NULL, 6, 'seen', '2022-08-22 17:00:11', '2022-08-22 19:07:34'),
(5, 'Order', 'Item(s) bought by Dami Aremu', 20, NULL, NULL, NULL, 'seen', '2022-08-22 17:25:24', '2022-08-22 19:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `escrow_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'received',
  `billing_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_postalcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `error` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'stripe',
  `billing_subtotal` int(11) NOT NULL,
  `billing_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `escrow_status`, `billing_name`, `billing_address`, `billing_city`, `billing_state`, `billing_email`, `billing_phone`, `billing_name_on_card`, `billing_postalcode`, `error`, `payment_gateway`, `billing_subtotal`, `billing_total`, `created_at`, `updated_at`) VALUES
(14, 3, 2, 'sent', 'Kunmi', 'ejsjss', 'fszf', 'Rgb', 'akin.tenplus@gmail.com', '2345678', 'Kunmi', '23456', NULL, 'stripe', 345678, 380246, '2022-08-10 15:23:14', '2022-08-10 15:28:47'),
(15, 1, 5, 'sent', 'Kunmi', 'ejsjss', 'fszf', 'Rgb', 'akin.tenplus@gmail.com', '2345678', 'Kunmi', '23456', NULL, 'stripe', 5000, 5500, '2022-08-10 15:30:42', '2022-08-10 15:31:16'),
(16, 1, 5, 'sent', 'Kunmi', 'ejsjss', 'fszf', 'Rgb', 'akin.tenplus@gmail.com', '2345678', 'Kunmi', '23456', NULL, 'stripe', 5000, 5500, '2022-08-10 16:00:36', '2022-08-22 15:32:33'),
(17, 4, 1, 'sent', 'Kunmi', 'ejsjss', 'fszf', 'Rgb', 'akin.tenplus@gmail.com', '2345678', 'Dami', '23456', NULL, 'stripe', 545000, 599500, '2022-08-22 15:35:21', '2022-08-22 15:38:57'),
(18, 1, 4, 'received', 'Kunmi', 'ejsjss', 'fszf', 'Rgb', 'akin.tenplus@gmail.com', '2345678', 'Kunmi', '23456', NULL, 'stripe', 135500, 149050, '2022-08-22 16:42:00', '2022-08-22 16:42:00'),
(19, 1, 5, 'sent', 'Kunmi', 'ejsjss', 'fszf', 'Rgb', 'akin.tenplus@gmail.com', '2345678', 'Kunmi', '23456', NULL, 'stripe', 350678, 385746, '2022-08-22 16:46:31', '2022-08-22 17:26:42'),
(20, 4, 1, 'sent', 'Kunmi', 'ejsjss', 'fszf', 'Rgb', 'akin.tenplus@gmail.com', '2345678', 'Dami', '23456', NULL, 'stripe', 545000, 599500, '2022-08-22 17:25:24', '2022-08-22 17:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `product_id`, `order_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 4, '2022-08-04 22:05:50', '2022-08-04 22:05:50'),
(2, 4, 2, 2, '2022-08-04 22:13:40', '2022-08-04 22:13:40'),
(3, 4, 3, 2, '2022-08-04 22:14:47', '2022-08-04 22:14:47'),
(4, 4, 4, 2, '2022-08-08 15:47:34', '2022-08-08 15:47:34'),
(5, 2, 5, 1, '2022-08-08 15:49:24', '2022-08-08 15:49:24'),
(6, 3, 6, 1, '2022-08-08 15:50:57', '2022-08-08 15:50:57'),
(7, 2, 7, 1, '2022-08-08 15:52:38', '2022-08-08 15:52:38'),
(8, 1, 8, 1, '2022-08-08 15:53:46', '2022-08-08 15:53:46'),
(9, 1, 9, 1, '2022-08-08 16:14:45', '2022-08-08 16:14:45'),
(10, 4, 9, 1, '2022-08-08 16:14:45', '2022-08-08 16:14:45'),
(11, 2, 10, 1, '2022-08-08 18:12:54', '2022-08-08 18:12:54'),
(12, 1, 1, 1, '2022-08-08 18:46:29', '2022-08-08 18:46:29'),
(13, 3, 2, 1, '2022-08-08 18:47:55', '2022-08-08 18:47:55'),
(14, 1, 1, 1, '2022-08-08 18:59:05', '2022-08-08 18:59:05'),
(15, 4, 2, 2, '2022-08-08 19:30:35', '2022-08-08 19:30:35'),
(16, 5, 3, 2, '2022-08-09 15:51:46', '2022-08-09 15:51:46'),
(17, 2, 4, 1, '2022-08-09 17:14:52', '2022-08-09 17:14:52'),
(18, 2, 5, 1, '2022-08-09 17:16:27', '2022-08-09 17:16:27'),
(19, 3, 6, 1, '2022-08-10 15:02:59', '2022-08-10 15:02:59'),
(20, 3, 7, 1, '2022-08-10 15:06:18', '2022-08-10 15:06:18'),
(21, 3, 8, 1, '2022-08-10 15:08:10', '2022-08-10 15:08:10'),
(22, 3, 9, 1, '2022-08-10 15:09:47', '2022-08-10 15:09:47'),
(23, 3, 10, 1, '2022-08-10 15:12:32', '2022-08-10 15:12:32'),
(24, 3, 11, 1, '2022-08-10 15:15:08', '2022-08-10 15:15:08'),
(25, 3, 12, 1, '2022-08-10 15:16:35', '2022-08-10 15:16:35'),
(26, 4, 13, 1, '2022-08-10 15:19:19', '2022-08-10 15:19:19'),
(27, 2, 14, 1, '2022-08-10 15:23:14', '2022-08-10 15:23:14'),
(28, 5, 15, 1, '2022-08-10 15:30:42', '2022-08-10 15:30:42'),
(29, 5, 16, 1, '2022-08-10 16:00:36', '2022-08-10 16:00:36'),
(30, 1, 17, 1, '2022-08-22 15:35:21', '2022-08-22 15:35:21'),
(31, 3, 18, 1, '2022-08-22 16:42:00', '2022-08-22 16:42:00'),
(32, 4, 18, 1, '2022-08-22 16:42:00', '2022-08-22 16:42:00'),
(33, 2, 19, 1, '2022-08-22 16:46:31', '2022-08-22 16:46:31'),
(34, 5, 19, 1, '2022-08-22 16:46:31', '2022-08-22 16:46:31'),
(35, 1, 20, 1, '2022-08-22 17:25:24', '2022-08-22 17:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `slug`, `stripe_plan`, `cost`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 'basic', 'Basic', 10.00, NULL, '2022-07-17 10:03:19', '2022-07-17 10:03:35'),
(2, 'Professional', 'professional', 'Professional', 50.00, NULL, '2022-07-17 10:05:31', '2022-07-17 10:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path-4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `description`, `image_path_1`, `image_path_2`, `image_path_3`, `image_path-4`, `quantity`, `category_id`, `user_id`, `currency_id`, `created_at`, `updated_at`) VALUES
(1, 'Iphone 13', 'iphone-13-2vc', 545000, 'The iPhone 13 is the successor to Apple\'s best selling iPhone 12, and it improves upon a successful formula: $800 price for a flagship processor and a 6.1-inch screen size that is not too large, nor too small. The iPhone 13 brings a new Apple A15 Bionic chip and improvements to the dual camera setup consisting of a wide and ultra-wide camera.', 'products/KuryCpTU2utV2TY5YrBWAu4hUB2juiHtWM40vzI0.jpg', 'products/KjfEozLBVoPtDxQqw79dhQoQLwyqoE83bSdoHVjk.jpg', NULL, NULL, 24, 1, 1, 1, '2022-08-04 21:57:54', '2022-08-22 17:25:24'),
(2, 'Samsung S20', 'samsung-s20-3yk', 345678, 'Samsung Galaxy S20 is the successor of Galaxy S10 Lite. Specifications include a 6.5-inch FHD+ display, Snapdragon 865 chipset with 6GB/8GB RAM and 128GB/256GB storage, and 4500 battery. There is a triple-camera setup on the back, with the same main sensor found in regular Galaxy S20.', 'products/28VfdNESVptdvOwN4EATV0uzg6zaTvezHb8jdgbJ.jpg', 'products/hM7Ul5fFIXwXPtUw8Ny28kqTY1CnoqNFxWz2tM2X.jpg', NULL, NULL, 7, 1, 1, 1, '2022-08-04 22:01:02', '2022-08-22 16:46:31'),
(3, 'Apple Airpod Pro', 'apple-airpod-pro-9jx', 128000, 'The AirPods Pro are Apple’s best true wireless earbuds to date, but they’re also its most expensive. The addition of key features like active noise cancellation, transparency mode, on-board controls and silicone ear tips are all upgrades over the previous two models. Despite Sony’s WF-1000XM3 outperforming these in terms of audio and noise cancellation, the AirPods Pro do a decent job with both, and hands-free Siri is a key feature Sony doesn’t offer.', 'products/op9DseZo8nYKI5msJuNDoCEcC29vgXXMNTmTu6dB.jpg', NULL, NULL, NULL, -1, 2, 1, 1, '2022-08-04 22:02:54', '2022-08-22 16:42:00'),
(4, 'Nokia 105', 'nokia-105-7tz', 7500, 'Nokia 105 is a feature phone by the Finland-based manufacturer that was launched in India at an MRP of Rs 1,499. The device will be selling at a price of Rs 1,199 online through the Nokia phones shop. The device comes in two SIM variants: Single SIM and dual SIM and three colours: Black, Blue and Pink. It supports mini SIM.\r\n\r\nNokia 105 comes in a polycarbonate body and features a 1.77-inch QQVGA display. It measures 119 x 49.2 x 14.4mm. With the single SIM, the device weighs 74.04 g (including battery) and with dual SIM, the device weighs 73.02 g (including battery).\r\n\r\nThe feature phone offers a RAM of 4MB and can store up to 2,000 contacts and up to 500 SMS. It runs on Nokia Series 30+ software. There is a microUSB port (USB 1.1).\r\n\r\nThe phone comes with Snake and four other pre-loaded Gameloft games that include Tetris, Sky Gift and Airstrike. The phone has been given a 3.5mm headphone jack and users can listen to music, access news and sports with the built-in radio. \r\n\r\nThe feature phone is backed by an 800mAh removable battery. Nokia claims that the phone will give a standby time of more than 25 days and a talk time of up to 14.4 hours.\r\n\r\nThe Nokia 105 box packs in the Nokia 105 feature phone, a quick start guide and a microUSB charger.', 'products/FkrxJcJqSKyyUGiSnZruZ9GekB7jUSyPNlZPByXI.jpg', 'products/wbHTxIUAaSq3sLt8hKNzbQR2awbR5l9nzQDRW11C.jpg', NULL, NULL, 5, 1, 1, 1, '2022-08-04 22:04:40', '2022-08-22 16:42:01'),
(5, 'Calvin Klein Boxer', 'calvin-klein-boxer-qxn', 5000, '3 in 1 Calvin Klein Boxer to make you come out confident and clean while being all sexy and ready to wow the ladies!', 'products/N4Xcn2hcXUnS2UYMmNBfoWQCQuxCNBDVT5V6xz2f.jpg', 'products/f1kC2tfJ8E1DfiPHSZpUnA75V3jrt98fIaJqtJiF.jpg', NULL, NULL, 5, 3, 3, 1, '2022-08-09 15:48:58', '2022-08-22 16:46:31'),
(6, 'Sneakers', 'sneakers-qzj', 12000, 'One of the most simple wears', 'products/bD3FyD40gLLoQw4t4gFNO2PXl7rfHb3tLr3ImGhx.jpg', NULL, NULL, NULL, 40, 3, 1, 1, '2022-08-22 17:00:11', '2022-08-22 17:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star_rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `comment`, `star_rating`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'This is a good elastic boxers that everyone loves.', 2, '2022-08-10 19:12:57', '2022-08-10 19:12:57'),
(2, 1, 4, 'Lovely stuff', 2, '2022-08-10 19:13:48', '2022-08-10 19:13:48'),
(3, 1, 4, 'yes the best', 5, '2022-08-10 19:15:32', '2022-08-10 19:15:32'),
(4, 1, 5, 'yes', 4, '2022-08-10 19:56:43', '2022-08-10 19:56:43'),
(5, 1, 1, 'This is one of the best phones i have ever seen!', 2, '2022-08-11 17:12:51', '2022-08-11 17:12:51'),
(6, 4, 1, 'I love this phone so much , it is awesome!', 5, '2022-08-22 15:36:25', '2022-08-22 15:36:25'),
(7, 1, 5, 'It is really nice', 5, '2022-08-22 16:07:27', '2022-08-22 16:07:27'),
(8, 1, 5, 'It is nice', 4, '2022-08-22 16:09:19', '2022-08-22 16:09:19'),
(9, 1, 5, 'It is nice', 4, '2022-08-22 16:10:20', '2022-08-22 16:10:20'),
(10, 1, 4, 'This phone is really handy and portable', 5, '2022-08-22 16:12:26', '2022-08-22 16:12:26'),
(11, 1, 1, 'This is one of the most sophisticated mobile phones.', 5, '2022-08-22 16:15:54', '2022-08-22 16:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2022-08-04 21:46:46', '2022-08-04 21:46:46'),
(2, 'Buyer', '2022-08-04 21:46:55', '2022-08-04 21:46:55'),
(3, 'Seller', '2022-08-04 21:47:03', '2022-08-04 21:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `buyer_id`, `seller_id`, `product_id`, `amount`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 16500, 2, '2022-08-04 22:14:47', '2022-08-04 22:14:47'),
(2, 1, 1, 4, 16500, 2, '2022-08-08 15:47:34', '2022-08-08 15:47:34'),
(3, 1, 1, 2, 380246, 1, '2022-08-08 15:49:24', '2022-08-08 15:49:24'),
(4, 1, 1, 3, 140800, 1, '2022-08-08 15:50:57', '2022-08-08 15:50:57'),
(5, 1, 1, 2, 380246, 1, '2022-08-08 15:52:39', '2022-08-08 15:52:39'),
(6, 1, 1, 1, 599500, 1, '2022-08-08 15:53:47', '2022-08-08 15:53:47'),
(7, 1, 1, 1, 607750, 1, '2022-08-08 16:14:45', '2022-08-08 16:14:45'),
(8, 1, 1, 4, 607750, 1, '2022-08-08 16:14:45', '2022-08-08 16:14:45'),
(9, 1, 1, 2, 380246, 1, '2022-08-08 18:12:54', '2022-08-08 18:12:54'),
(10, 1, 1, 1, 599500, 1, '2022-08-08 18:46:29', '2022-08-08 18:46:29'),
(11, 1, 1, 3, 140800, 1, '2022-08-08 18:47:55', '2022-08-08 18:47:55'),
(12, 1, 1, 1, 599500, 1, '2022-08-08 18:59:05', '2022-08-08 18:59:05'),
(13, 1, 1, 4, 16500, 2, '2022-08-08 19:30:36', '2022-08-08 19:30:36'),
(14, 2, 3, 5, 11000, 2, '2022-08-09 15:51:46', '2022-08-09 15:51:46'),
(15, 2, 1, 2, 380246, 1, '2022-08-09 17:14:52', '2022-08-09 17:14:52'),
(16, 2, 1, 2, 380246, 1, '2022-08-09 17:16:28', '2022-08-09 17:16:28'),
(17, 3, 1, 3, 140800, 1, '2022-08-10 15:02:59', '2022-08-10 15:02:59'),
(18, 3, 1, 3, 140800, 1, '2022-08-10 15:06:19', '2022-08-10 15:06:19'),
(19, 3, 1, 3, 140800, 1, '2022-08-10 15:08:10', '2022-08-10 15:08:10'),
(20, 3, 1, 3, 140800, 1, '2022-08-10 15:09:47', '2022-08-10 15:09:47'),
(21, 3, 1, 3, 140800, 1, '2022-08-10 15:12:32', '2022-08-10 15:12:32'),
(22, 3, 1, 3, 140800, 1, '2022-08-10 15:15:08', '2022-08-10 15:15:08'),
(23, 3, 1, 3, 140800, 1, '2022-08-10 15:16:35', '2022-08-10 15:16:35'),
(24, 3, 1, 4, 8250, 1, '2022-08-10 15:19:20', '2022-08-10 15:19:20'),
(25, 3, 1, 2, 380246, 1, '2022-08-10 15:23:14', '2022-08-10 15:23:14'),
(26, 1, 3, 5, 5500, 1, '2022-08-10 15:30:43', '2022-08-10 15:30:43'),
(27, 1, 3, 5, 5500, 1, '2022-08-10 16:00:36', '2022-08-10 16:00:36'),
(28, 4, 1, 1, 599500, 1, '2022-08-22 15:35:22', '2022-08-22 15:35:22'),
(29, 1, 1, 3, 149050, 1, '2022-08-22 16:42:01', '2022-08-22 16:42:01'),
(30, 1, 1, 4, 149050, 1, '2022-08-22 16:42:01', '2022-08-22 16:42:01'),
(31, 1, 1, 2, 385746, 1, '2022-08-22 16:46:31', '2022-08-22 16:46:31'),
(32, 1, 3, 5, 385746, 1, '2022-08-22 16:46:32', '2022-08-22 16:46:32'),
(33, 4, 1, 1, 599500, 1, '2022-08-22 17:25:24', '2022-08-22 17:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `username`, `website`, `address_1`, `address_2`, `phone_num`, `role_id`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'Akinkunmi', 'Akinola', 'akin.tenplus@gmail.com', NULL, '$2y$10$cOM08r8BWADZQYOuNyOEtOxZgk1iNcOMbDcJ0yv0IuVdg5L//GS0q', 'kunmifab', NULL, NULL, NULL, NULL, 1, NULL, '2022-08-04 21:48:57', '2022-08-04 21:48:57', NULL, NULL, NULL, NULL),
(2, 'Farouq', 'Akinola', 'akinolaakinkunmifa@gmail.com', NULL, '$2y$10$.JIF7FL6w50JZAZSzuB08.IcrBqalVrBelTnd5qR56DTDmPGklOd2', 'freddy', NULL, NULL, NULL, NULL, 2, NULL, '2022-08-04 21:51:04', '2022-08-04 21:51:04', NULL, NULL, NULL, NULL),
(3, 'Tolu', 'Olajuigbe', 'tolusmog@gmail.com', NULL, '$2y$10$1YJEkQhHA9Zz4khm44JCMecrrFAosjHRVA2RSjoFIwBXcbrBpP976', 'smoggy', NULL, NULL, NULL, NULL, 3, NULL, '2022-08-09 15:42:30', '2022-08-09 15:42:30', NULL, NULL, NULL, NULL),
(4, 'Dami', 'Aremu', 'damiaremu@gmail.com', NULL, '$2y$10$GB6H98zbOL0LxJeBFW/a..nPSL.r.C6C5DT4XDTdkcaHR3vjg72gu', 'daremzy', NULL, NULL, NULL, NULL, 2, NULL, '2022-08-22 15:34:16', '2022-08-22 15:34:16', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 3, 407746, '2022-08-09 15:42:30', '2022-08-22 17:26:42'),
(2, 1, 2558992, NULL, '2022-08-22 17:26:29'),
(3, 2, 0, NULL, NULL),
(4, 4, 0, '2022-08-22 15:34:16', '2022-08-22 15:34:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escrows`
--
ALTER TABLE `escrows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `escrows`
--
ALTER TABLE `escrows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
