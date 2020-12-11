-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 03:08 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `type`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ibrahim khalil', 'admin@gmail.com', '$2y$10$MOZriaMnWTffBriXl/gAJ.W6Y76T3M6L95Jd13g5A9Fs/iUFxVYYO', NULL, NULL, 1, 'ALqIhO3Piala9XEXbGkQf4AeVKVrH9us67rthOVTZ1wMSfRU2guLATedObkC', '2020-10-30 04:09:19', '2020-10-30 04:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_slug`, `brand_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'apple', 'public/brands/2020-10-30-12-15-14-3728.jpg', 1, NULL, NULL),
(2, 'Aarong', 'aarong', 'public/brands/2020-10-30-12-15-35-9676.jpg', 1, NULL, NULL),
(3, 'Cats Eye', 'cats-eye', 'public/brands/2020-10-30-12-16-00-6142.png', 1, NULL, NULL),
(4, 'Richman', 'richman', 'public/brands/2020-10-30-12-16-16-8846.jpg', 1, NULL, NULL),
(5, 'bakara', 'bakara', 'public/brands/2020-10-30-12-16-35-9556.png', 1, NULL, NULL),
(6, 'Symphony', 'symphony', 'public/brands/2020-10-30-12-17-04-3367.png', 1, NULL, NULL),
(7, 'Walton', 'walton', 'public/brands/2020-10-30-12-17-15-6911.png', 1, NULL, NULL),
(8, 'khaun daun', 'khaun-daun', 'public/brands/2020-10-30-12-17-46-3456.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'electronincs', 'electronincs', 1, NULL, NULL),
(2, 'women', 'women', 1, NULL, NULL),
(3, 'man', 'man', 1, NULL, NULL),
(4, 'baby', 'baby', 1, NULL, NULL),
(5, 'mobile', 'mobile', 1, NULL, NULL),
(6, 'food', 'food', 1, NULL, NULL),
(7, 'Laptop', 'laptop', 1, NULL, NULL),
(8, 'Televesion', 'televesion', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cupons`
--

CREATE TABLE `cupons` (
  `cupon_id` bigint(20) UNSIGNED NOT NULL,
  `cupon_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cupon_offer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cupons`
--

INSERT INTO `cupons` (`cupon_id`, `cupon_name`, `cupon_offer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'newOffer', '10', 1, '2020-10-30 12:50:50', NULL),
(2, 'test', '12', 1, '2020-10-30 12:50:56', NULL);

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
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2020_10_18_064419_create_admins_table', 1),
(29, '2020_10_18_130038_create_categories_table', 1),
(30, '2020_10_18_131234_create_sub_categories_table', 1),
(31, '2020_10_18_131327_create_brands_table', 1),
(32, '2020_10_19_063637_create_products_table', 1),
(33, '2020_10_20_125444_create_cupons_table', 1),
(34, '2020_10_20_125518_create_whislists_table', 1),
(35, '2020_10_22_035630_create_sliders_table', 1),
(36, '2020_10_25_125652_create_shippings_table', 1),
(37, '2020_10_25_125716_create_orders_table', 1),
(38, '2020_10_25_132125_create_order_products_table', 1),
(39, '2020_10_27_133358_create_subscribers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `order_track_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` double NOT NULL,
  `order_qty` int(11) NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `transection_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_ship_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_ship_cost` double DEFAULT NULL,
  `order_cupon_cost` double DEFAULT NULL,
  `order_vat` double DEFAULT NULL,
  `order_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_track_id`, `user_id`, `shipping_id`, `order_total`, `order_qty`, `payment_method`, `payment_status`, `transection_id`, `order_ship_method`, `order_ship_cost`, `order_cupon_cost`, `order_vat`, `order_day`, `order_month`, `order_year`, `order_status`, `created_at`, `updated_at`) VALUES
(1, '31484', 1, 1, 2533.52, 8, 'hand_cash', 1, NULL, 'sundorbon', 100, 345.48, 0, '2020-10-30', '2020-10', '2020', 3, '2020-10-30 12:58:27', NULL),
(2, '46464', 1, 2, 1336.72, 6, 'hand_cash', 0, NULL, 'sundorbon', 100, 182.28, 0, '2020-10-31', '2020-10', '2020', 0, '2020-10-31 03:23:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_size`, `product_color`, `product_qty`, `product_image`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'টমেটো', NULL, NULL, 3, 'public/products/2020-10-30-12-26-46-57440.jpg', 93, '2020-10-30 12:58:27', NULL),
(2, 1, 6, 'লিচু', NULL, NULL, 2, 'public/products/2020-10-30-12-29-28-74450.jpg', 1000, '2020-10-30 12:58:27', NULL),
(3, 1, 7, 'পেপে', NULL, NULL, 3, 'public/products/2020-10-30-12-30-11-82990.jpg', 200, '2020-10-30 12:58:27', NULL),
(4, 2, 6, 'লিচু', NULL, NULL, 1, 'public/products/2020-10-30-12-29-28-74450.jpg', 1000, '2020-10-31 03:23:51', NULL),
(5, 2, 5, 'গাজর', NULL, NULL, 1, 'public/products/2020-10-30-12-27-46-25960.jpg', 120, '2020-10-31 03:23:51', NULL),
(6, 2, 3, 'alu', NULL, NULL, 1, 'public/products/2020-10-30-12-24-36-37160.jpg', 120, '2020-10-31 03:23:51', NULL),
(7, 2, 4, 'টমেটো', NULL, NULL, 3, 'public/products/2020-10-30-12-26-46-57440.jpg', 93, '2020-10-31 03:23:51', NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_brand_id` tinyint(4) NOT NULL,
  `product_category_id` tinyint(4) NOT NULL,
  `product_sub_category_id` tinyint(4) DEFAULT NULL,
  `buying_price` double DEFAULT NULL,
  `selling_price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyone_getone` tinyint(4) DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `sort_des` text COLLATE utf8mb4_unicode_ci,
  `long_des` text COLLATE utf8mb4_unicode_ci,
  `offer_perchentage` double DEFAULT NULL,
  `offer_start_date` date DEFAULT NULL,
  `offer_end_date` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_code`, `product_slug`, `product_images`, `product_brand_id`, `product_category_id`, `product_sub_category_id`, `buying_price`, `selling_price`, `qty`, `video_link`, `buyone_getone`, `size`, `color`, `weight`, `sort_des`, `long_des`, `offer_perchentage`, `offer_start_date`, `offer_end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'শাক সবজি ', 'ghdg8546', 'vagetable-product-ghdg8546', '[\"public\\/products\\/2020-10-30-12-21-32-70260.jpg\",\"public\\/products\\/2020-10-30-12-21-32-55781.jpg\",\"public\\/products\\/2020-10-30-12-21-32-64652.jpg\"]', 8, 6, NULL, 100, 120, 12, NULL, 1, 'long,sm', 'blue,gray', NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose</span>', 35, '2020-10-30', '2021-04-28', 1, NULL, NULL),
(2, 'pizza', 'fgsf36585', 'pizza-fgsf36585', '[\"public\\/products\\/2020-10-30-12-23-24-30350.jpg\",\"public\\/products\\/2020-10-30-12-23-25-83231.jpg\",\"public\\/products\\/2020-10-30-12-23-25-28892.jpg\"]', 8, 6, NULL, 700, 900, 4, NULL, NULL, 'small,midum,long', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose', NULL, NULL, NULL, 1, NULL, NULL),
(3, 'alu', 'fsdf5778', 'alu-fsdf5778', '[\"public\\/products\\/2020-10-30-12-24-36-37160.jpg\",\"public\\/products\\/2020-10-30-12-24-36-16511.jpg\",\"public\\/products\\/2020-10-30-12-24-36-74712.jpg\"]', 8, 6, NULL, 100, 120, 5, NULL, 1, NULL, NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose</span>', NULL, NULL, NULL, 1, NULL, NULL),
(4, 'টমেটো', '85', '-85', '[\"public\\/products\\/2020-10-30-12-26-46-57440.jpg\",\"public\\/products\\/2020-10-30-12-26-46-65791.jpg\",\"public\\/products\\/2020-10-30-12-26-46-65242.jpg\"]', 8, 6, NULL, 90, 110, 52, NULL, 1, NULL, NULL, NULL, 'dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lodable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span>', 15, '2020-10-30', '2021-07-15', 1, NULL, NULL),
(5, 'গাজর', 'fdsfs85452', '-fdsfs85452', '[\"public\\/products\\/2020-10-30-12-27-46-25960.jpg\",\"public\\/products\\/2020-10-30-12-27-46-19931.jpg\",\"public\\/products\\/2020-10-30-12-27-46-25472.jpg\"]', 8, 6, NULL, 100, 120, 150, NULL, 1, NULL, NULL, NULL, 'dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span>', NULL, NULL, NULL, 1, NULL, NULL),
(6, 'লিচু', '6584', '-6584', '[\"public\\/products\\/2020-10-30-12-29-28-74450.jpg\",\"public\\/products\\/2020-10-30-12-29-28-36741.jpg\",\"public\\/products\\/2020-10-30-12-29-29-28022.jpg\"]', 3, 3, 14, 700, 1000, 500, NULL, NULL, NULL, NULL, NULL, 'dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span>', NULL, NULL, NULL, 1, NULL, NULL),
(7, 'পেপে', 'fsdaf5safsaf', '-fsdaf5safsaf', '[\"public\\/products\\/2020-10-30-12-30-11-82990.jpg\",\"public\\/products\\/2020-10-30-12-30-12-53811.jpg\",\"public\\/products\\/2020-10-30-12-30-12-29912.jpg\"]', 3, 3, 14, 120, 200, 400, NULL, NULL, NULL, NULL, NULL, 'dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span>', NULL, NULL, NULL, 1, NULL, NULL),
(8, 'ফুল কপি', 'fsdf584f', '-fsdf584f', '[\"public\\/products\\/2020-10-30-12-31-47-58530.jpg\",\"public\\/products\\/2020-10-30-12-31-47-54911.jpg\",\"public\\/products\\/2020-10-30-12-31-47-48272.jpg\"]', 2, 2, NULL, 700, 900, 50, NULL, NULL, NULL, NULL, 500, 'dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lodable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span>', 20, '2020-10-30', '2021-05-19', 1, NULL, NULL),
(9, 'সবুজ শাক', '857fdfsd', '-857fdfsd', '[\"public\\/products\\/2020-10-30-12-33-00-89830.jpg\",\"public\\/products\\/2020-10-30-12-33-00-68141.jpg\",\"public\\/products\\/2020-10-30-12-33-00-38202.jpg\"]', 4, 4, 18, 13, 20, 120, NULL, NULL, NULL, NULL, 200, 'dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lodable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span>', NULL, NULL, NULL, 1, NULL, NULL),
(10, 'কমলা লেবু', 'fds875fd', '-fds875fd', '[\"public\\/products\\/2020-10-30-12-34-46-75920.jpg\",\"public\\/products\\/2020-10-30-12-34-46-59481.jpg\",\"public\\/products\\/2020-10-30-12-34-46-57662.jpg\"]', 5, 5, 6, 50, 80, 300, NULL, 1, NULL, NULL, 40, 'dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span>', NULL, NULL, NULL, 1, NULL, NULL),
(11, 'Waltop z24', 'fsdfsa58', 'waltop-z24-fsdfsa58', '[\"public\\/products\\/2020-10-30-12-36-43-26390.jpg\",\"public\\/products\\/2020-10-30-12-36-43-29621.jpg\",\"public\\/products\\/2020-10-30-12-36-43-18752.jpg\"]', 7, 5, 6, 7500, 9000, 42, NULL, NULL, NULL, 'blue,black,gray', 1.5, 'dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', 'dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', NULL, NULL, NULL, 1, NULL, NULL),
(12, 'symphone f5', 'fsdf587', 'symphone-f5-fsdf587', '[\"public\\/products\\/2020-10-30-12-39-20-79830.jpg\",\"public\\/products\\/2020-10-30-12-39-20-88281.jpg\",\"public\\/products\\/2020-10-30-12-39-20-59112.jpg\"]', 6, 5, 4, 700, 2587, 55, NULL, 1, NULL, 'black,gray,blue', 2.5, 'dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span>', NULL, NULL, NULL, 1, NULL, NULL),
(13, 'switch', 'fdsfs587', 'switch-fdsfs587', '[\"public\\/products\\/2020-10-30-12-40-55-96440.jpg\",\"public\\/products\\/2020-10-30-12-40-55-78641.jpg\",\"public\\/products\\/2020-10-30-12-40-55-93722.jpg\"]', 7, 1, 1, 15, 25, 33, NULL, NULL, NULL, NULL, NULL, 'dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span>', NULL, NULL, NULL, 1, NULL, NULL),
(14, 'light', 'fddsfs55', 'light-fddsfs55', '[\"public\\/products\\/2020-10-30-12-41-53-71390.jpg\",\"public\\/products\\/2020-10-30-12-41-53-84181.jpg\",\"public\\/products\\/2020-10-30-12-41-54-75002.jpg\"]', 5, 1, 2, 55, 120, 302, NULL, 1, NULL, NULL, NULL, 'dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lodable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">dable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lo</span>', NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_division` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_upozila` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`shipping_id`, `shipping_first_name`, `shipping_last_name`, `shipping_phone`, `shipping_email`, `shipping_division`, `shipping_district`, `shipping_upozila`, `shipping_zip_code`, `created_at`, `updated_at`) VALUES
(1, 'ibrahim', 'khalil', '01761326599', 'khalil.cmt.bpi@gmail.com', 'Rangpur', 'Dinajpur', 'khansama', '3020', NULL, NULL),
(2, 'monayem', 'islam', '01310118550', 'monayem@gmail.com', 'Rangpur', 'Dinajpur', 'sodor', '5230', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `product_slug`, `slider_image`, `slider_thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'vagetable-product-ghdg8546', 'public/sliders/2020-10-30-12-51-47-9179.jpg', 'this is dummy thumnail', 1, NULL, NULL),
(2, '-85', 'public/sliders/2020-10-30-12-52-27-2415.jpg', 'this is tometo thumnail', 1, NULL, NULL),
(3, '-fds875fd', 'public/sliders/2020-10-30-12-53-06-8285.jpg', 'this is dummy thumnail', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_category_id`, `sub_category_name`, `sub_category_slug`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Swithc', 'swithc', 1, 1, NULL, NULL),
(2, 'Lights', 'lights', 1, 1, NULL, NULL),
(3, 'Fan', 'fan', 1, 1, NULL, NULL),
(4, 'Symphony', 'symphony', 5, 1, NULL, NULL),
(5, 'walton', 'walton', 5, 1, NULL, NULL),
(6, 'ipone', 'ipone', 5, 1, NULL, NULL),
(7, 'LG', 'lg', 8, 1, NULL, NULL),
(8, 'Sony', 'sony', 8, 1, NULL, NULL),
(9, 'Hp', 'hp', 7, 1, NULL, NULL),
(10, 'Lenovo', 'lenovo', 7, 1, NULL, NULL),
(11, 'Acher', 'acher', 7, 1, NULL, NULL),
(12, 'Asus', 'asus', 7, 1, NULL, NULL),
(13, 'Shirt', 'shirt', 3, 1, NULL, NULL),
(14, 'T-Shirts', 't-shirts', 3, 1, NULL, NULL),
(15, 'Watch', 'watch', 3, 1, NULL, NULL),
(16, 'Juice', 'juice', 4, 1, NULL, NULL),
(17, 'dress', 'dress', 4, 1, NULL, NULL),
(18, 'food', 'food', 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `image`, `address`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jinath jahan sumaia', 'aboutsoftmart@gmail.com', '01796726183', NULL, '$2y$10$883i3DPETxTtMJ0POPrGXuPbL/YGjqClkRR0ytKwCnLkkhr7RPkJa', NULL, NULL, 1, NULL, '2020-10-30 06:57:49', '2020-10-30 06:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `whislists`
--

CREATE TABLE `whislists` (
  `whislist_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whislists`
--

INSERT INTO `whislists` (`whislist_id`, `user_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, NULL, NULL),
(2, 1, 5, 1, NULL, NULL);

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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`cupon_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `whislists`
--
ALTER TABLE `whislists`
  ADD PRIMARY KEY (`whislist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cupons`
--
ALTER TABLE `cupons`
  MODIFY `cupon_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `shipping_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `whislists`
--
ALTER TABLE `whislists`
  MODIFY `whislist_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
