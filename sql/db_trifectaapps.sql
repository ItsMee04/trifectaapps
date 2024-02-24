-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2024 at 06:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_trifectaapps`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idshoppingcart` varchar(255) NOT NULL,
  `product` int(11) NOT NULL,
  `sales` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `idshoppingcart`, `product`, `sales`, `status`, `created_at`, `updated_at`) VALUES
(1, 'C-2024000001', 1, 2, 2, '2024-02-13 00:56:20', '2024-02-15 21:02:07'),
(2, 'C-2024000001', 3, 2, 2, '2024-02-13 00:57:01', '2024-02-15 21:02:07'),
(3, 'C-2024000002', 3, 2, 2, '2024-02-16 00:44:21', '2024-02-16 00:44:27'),
(4, 'C-2024000002', 1, 2, 2, '2024-02-16 00:44:23', '2024-02-16 00:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SURAT', 'PRODUK YANG MENGGUNAKAN SURAT SURAT / PRODUK YANG BERSURAT LENGKAP', 1, '2024-02-01 05:37:42', '2024-02-01 08:10:39'),
(2, 'NON SURAT', 'PRODUK YANG TIDAK MENGGUNAKAN / TIDAK BERSURAT', 1, '2024-02-01 05:39:20', '2024-02-01 05:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customername` varchar(255) NOT NULL,
  `customeraddress` text NOT NULL,
  `customercontact` varchar(255) NOT NULL,
  `customeridentity` varchar(255) NOT NULL,
  `customerpoint` int(11) NOT NULL DEFAULT 0,
  `customerdateofbirth` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customername`, `customeraddress`, `customercontact`, `customeridentity`, `customerpoint`, `customerdateofbirth`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Yoga Tri Utomo', 'Pabuaran', '0815-1236-4590', '3302260405970001', 5, '1997-05-07', 1, '2024-02-05 03:55:07', '2024-02-05 05:13:56'),
(3, 'Muhammad Agung Roemekso', 'Purwokerto', '0815-1236-4587', '3302260405970001', 0, '2024-02-16', 1, '2024-02-16 00:44:14', '2024-02-16 00:44:14');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employeename` varchar(255) NOT NULL,
  `employeeaddress` text NOT NULL,
  `employeecontact` varchar(255) NOT NULL,
  `employeeprofession` int(11) NOT NULL,
  `employeesignature` varchar(255) NOT NULL,
  `employeeavatar` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employeename`, `employeeaddress`, `employeecontact`, `employeeprofession`, `employeesignature`, `employeeavatar`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Indra Kusuma', 'Purwokerto', '081390469322', 2, 'Indra Kusumasignature-1707477472.png', 'Indra Kusumaavatar-1707477472.jpg', 1, '2024-02-05 12:55:03', '2024-02-09 04:17:52'),
(4, 'Dimas Anugerah Adibrata', 'Purbalingga', '081390469322', 2, 'Dimas Anugerah Adibratasignature-1707248128.png', 'Dimas Anugerah Adibrataavatar-1707248128.png', 1, '2024-02-06 12:35:28', '2024-02-06 12:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_01_31_103741_create_profession_table', 2),
(10, '2024_02_01_122344_create_categories_table', 3),
(12, '2024_02_01_142042_create_typeproduct_table', 4),
(13, '2024_02_01_160748_create_product_table', 5),
(14, '2024_02_05_092831_create_supplier_table', 6),
(17, '2024_02_05_102137_create_customer_table', 7),
(18, '2024_02_05_110540_create_employee_table', 8),
(19, '2024_02_06_175421_create_role_table', 9),
(20, '2024_02_13_030039_create_transaction_table', 10),
(21, '2024_02_13_034433_create_cart_table', 11),
(24, '2024_02_15_112442_create_orders_table', 12),
(25, '2024_02_20_112230_create_purchase_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codeproduct` varchar(255) NOT NULL,
  `nameproduct` varchar(255) NOT NULL,
  `priceproduct` double NOT NULL DEFAULT 0,
  `descriptionproduct` text NOT NULL,
  `typeproduct` int(11) NOT NULL,
  `weightproduct` double NOT NULL,
  `caratproduct` double NOT NULL,
  `photoproduct` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `codeproduct`, `nameproduct`, `priceproduct`, `descriptionproduct`, `typeproduct`, `weightproduct`, `caratproduct`, `photoproduct`, `status`, `created_at`, `updated_at`) VALUES
(1, 'P-2024000001', 'Cincin Permata', 2500000, 'Cincin Permata Merah', 1, 1, 24, 'P-2024000001-1707792070.png', 1, '2024-02-03 11:48:47', '2024-02-12 19:41:10'),
(3, 'P-2024000002', 'Cincin Emas', 2500000, 'Cincin Emas', 1, 1, 24, 'P-2024000002-1707792086.png', 1, '2024-02-04 14:45:16', '2024-02-12 19:41:26'),
(6, 'P-2024000003', 'Cincin Permata Biru', 0, 'Cincin dengan permata biru', 1, 2.5, 24, 'P-2024000003-1708603935.png', 2, '2024-02-22 05:12:15', '2024-02-22 05:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE `profession` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profession` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`id`, `profession`, `status`, `created_at`, `updated_at`) VALUES
(2, 'KEPALA TOKO', 1, '2024-01-31 03:55:49', '2024-01-31 03:55:49'),
(4, 'KARYAWAN', 1, '2024-02-01 08:09:04', '2024-02-01 08:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idpurchase` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `weightproduct` decimal(8,2) NOT NULL,
  `caratproduct` decimal(8,2) NOT NULL,
  `purchaseprice` bigint(20) NOT NULL,
  `purchasedate` date NOT NULL,
  `conditionproduct` varchar(255) NOT NULL,
  `categoriesproduct` int(11) NOT NULL,
  `photoproduct` varchar(55) DEFAULT NULL,
  `typeproduct` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `idpurchase`, `productname`, `weightproduct`, `caratproduct`, `purchaseprice`, `purchasedate`, `conditionproduct`, `categoriesproduct`, `photoproduct`, `typeproduct`, `status`, `created_at`, `updated_at`) VALUES
(6, 'PU-2024000001', 'Cincin Permata Biru', 2.50, 24.00, 3000000, '2024-02-22', '2', 1, 'P-2024000003-1708603935.png', 1, 2, '2024-02-22 05:12:15', '2024-02-22 05:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, '2024-02-06 11:29:02', '2024-02-06 11:29:02'),
(2, 'KEPALA TOKO', 1, '2024-02-06 11:30:05', '2024-02-06 11:30:05'),
(3, 'KARYAWAN', 1, '2024-02-06 11:31:59', '2024-02-06 11:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `suppliername` varchar(255) NOT NULL,
  `supplieraddress` text NOT NULL,
  `suppliercontact` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `suppliername`, `supplieraddress`, `suppliercontact`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Central Musik Purwokerto', 'Roxy Square Building\r\nLt LG blok C6 no3 Purwokerto – Banyumas', '0857-1692-8889', 1, '2024-02-05 03:05:29', '2024-02-05 03:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idtransaction` varchar(255) NOT NULL,
  `idshoppingcart` varchar(255) NOT NULL,
  `customer` int(11) NOT NULL,
  `purchasedate` date NOT NULL,
  `total` bigint(20) NOT NULL,
  `sales` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `idtransaction`, `idshoppingcart`, `customer`, `purchasedate`, `total`, `sales`, `status`, `created_at`, `updated_at`) VALUES
(1, 'T-2024000001', 'C-2024000001', 1, '2024-02-16', 5000000, 2, 2, '2024-02-15 21:02:07', '2024-02-16 19:40:45'),
(2, 'T-2024000002', 'C-2024000002', 3, '2024-02-16', 5000000, 2, 2, '2024-02-16 00:44:27', '2024-02-16 19:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `typeproduct`
--

CREATE TABLE `typeproduct` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typeproduct`
--

INSERT INTO `typeproduct` (`id`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CINCIN', 1, '2024-02-01 07:56:38', '2024-02-01 07:56:38'),
(2, 'GELANG', 1, '2024-02-01 07:58:04', '2024-02-01 07:58:04'),
(3, 'KALUNG', 1, '2024-02-01 07:58:09', '2024-02-01 07:58:09'),
(6, 'ANTING', 1, '2024-02-01 08:06:02', '2024-02-01 08:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iduser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `iduser`, `username`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 'indrakusuma', '$2y$12$.Qw/y33owwFeOPBYKLUxOOB1ESywtNqHUxNskTzhKYw/NrdSAXoIC', 1, 1, NULL, NULL, NULL),
(5, 4, 'dimasanugerah', '$2y$12$EfgPk9moSFnvAICc9cgCHOuRBtScelVtmJy8H8m8KOeAieSAi/Pe6', 1, 1, NULL, '2024-02-09 04:08:59', '2024-02-09 04:09:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeproduct`
--
ALTER TABLE `typeproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profession`
--
ALTER TABLE `profession`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
