-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2018 at 01:46 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twilio_ivr`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `start_time` datetime NOT NULL,
  `venue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_time`, `venue`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Littel, Weber and Walter', 'Consequuntur fugit debitis nisi facere aspernatur rerum. Qui assumenda iste asperiores eligendi vel. Temporibus ut velit doloremque non.', '1973-10-07 12:09:49', '334 Brice Ramp Suite 194\nEstrellastad, AK 24488-5485', '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(2, 'Rosenbaum-Pollich', 'Minima odit vel ut eos et deleniti doloribus. Nihil ea velit velit rerum. Omnis quis neque rerum nam nobis.', '1977-07-27 08:36:03', '2275 Dejon Shoals\nSouth Ricardoburgh, KS 59806-8277', '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(3, 'Osinski, Balistreri and Leffler', 'Itaque velit voluptas non quia reiciendis assumenda. Sapiente asperiores ut aut vel sequi voluptatem. Quo quia qui sunt nisi. Rerum veritatis veniam eius aperiam voluptatem dolor.', '1975-07-14 09:57:48', '10131 Una Spur Suite 715\nLake Breanneshire, FL 78431-1297', '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(4, 'Anderson, Sauer and Cremin', 'Vel ullam molestiae id. Et soluta corrupti ratione sit ea. Deserunt beatae iusto est nostrum.', '2010-02-25 04:11:14', '942 Bessie Corner\nAmparoville, OK 10057', '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(5, 'Monahan, Wisoky and Mitchell', 'Molestiae culpa veritatis ad non cum labore consequatur. Ea vero beatae ut unde aliquam. In qui dolorum natus mollitia est perspiciatis ratione. Cupiditate dicta dolores dolores maiores non quis.', '1988-12-19 15:18:45', '68375 Gilbert Mountains Apt. 603\nSouth Ayanaview, NE 65490-5713', '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(6, 'Maggio, Kerluke and Hessel', 'Non mollitia commodi eos. Neque consequatur at aliquam eligendi. Nobis harum dicta et dignissimos. Quia amet illo hic ut quae quos velit.', '2008-08-18 12:05:57', '26715 Marcelle Port Apt. 619\nNew Mikaylaberg, PA 87624-5892', '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(7, 'Koepp, Toy and Bayer', 'Sint nihil impedit tempora. Quia itaque harum excepturi tenetur velit sit. Dignissimos aut doloribus ea illo eos voluptas.', '1974-12-22 09:47:13', '69373 Trantow Locks Apt. 874\nLexustown, VT 66335-3275', '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(8, 'Robel-Runte', 'Odio asperiores molestiae nemo mollitia velit. Ut sit eum voluptatibus quia voluptatem omnis eos. Non in odio id illo ipsa ipsa maiores in.', '1995-03-22 13:37:12', '877 Tristian Mountains\nAuerberg, VT 38337', '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(9, 'Beahan and Sons', 'Quasi nobis vitae et tempora sunt. Error et maxime et eligendi officiis aut.', '2016-12-28 15:00:15', '1206 Koby Orchard\nSouth Coraliebury, VA 21184', '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(10, 'Torp-Schuppe', 'Voluptas quis non magni. At velit accusamus illum doloribus pariatur tempore. Accusantium accusantium totam et qui.', '1999-10-26 10:31:46', '86008 Johnston Ports Suite 528\nWest Henri, NH 46469', '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_05_31_205732_create_1496253452_roles_table', 1),
(3, '2017_05_31_205733_create_1496253453_users_table', 1),
(4, '2017_05_31_211005_create_1496254205_events_table', 1),
(5, '2017_05_31_211614_create_1496254574_tickets_table', 1),
(6, '2017_05_31_211803_create_1496254683_payments_table', 1),
(7, '2017_05_31_222713_update_1496258833_payments_table', 1),
(8, '2017_06_01_200859_create_payments_tickets_table', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments_tickets`
--

CREATE TABLE `payments_tickets` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `tickets_amount` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2018-09-15 01:04:57', '2018-09-15 01:04:57'),
(2, 'Employee', '2018-09-15 01:04:57', '2018-09-15 01:04:57'),
(3, 'Customer', '2018-09-15 01:35:53', '2018-09-15 01:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `available_from` date NOT NULL,
  `available_to` date NOT NULL,
  `price` double(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `title`, `amount`, `available_from`, `available_to`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Early Bird Ticket', 100, '1973-06-09', '1973-08-08', 28.00, '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(2, 1, 'Regular Ticket', 1000, '1973-08-09', '1973-10-07', 33.60, '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(3, 2, 'Early Bird Ticket', 100, '1977-03-29', '1977-05-28', 15.00, '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(4, 2, 'Regular Ticket', 1000, '1977-05-29', '1977-07-27', 18.00, '2018-09-15 01:04:57', '2018-09-15 01:04:57', NULL),
(5, 3, 'Early Bird Ticket', 100, '1975-03-16', '1975-05-15', 23.00, '2018-09-15 01:04:58', '2018-09-15 01:04:58', NULL),
(6, 3, 'Regular Ticket', 1000, '1975-05-16', '1975-07-14', 27.60, '2018-09-15 01:04:58', '2018-09-15 01:04:58', NULL),
(7, 4, 'Early Bird Ticket', 100, '2009-10-28', '2009-12-27', 29.00, '2018-09-15 01:04:58', '2018-09-15 01:04:58', NULL),
(8, 4, 'Regular Ticket', 1000, '2009-12-28', '2010-02-25', 34.80, '2018-09-15 01:04:58', '2018-09-15 01:04:58', NULL),
(9, 5, 'Early Bird Ticket', 100, '1988-08-21', '1988-10-20', 28.00, '2018-09-15 01:04:58', '2018-09-15 01:04:58', NULL),
(10, 5, 'Regular Ticket', 1000, '1988-10-21', '1988-12-19', 33.60, '2018-09-15 01:04:58', '2018-09-15 01:04:58', NULL),
(11, 6, 'Early Bird Ticket', 100, '2008-04-20', '2008-06-19', 23.00, '2018-09-15 01:04:58', '2018-09-15 01:04:58', NULL),
(12, 6, 'Regular Ticket', 1000, '2008-06-20', '2008-08-18', 27.60, '2018-09-15 01:04:58', '2018-09-15 01:04:58', NULL),
(13, 7, 'Early Bird Ticket', 100, '1974-08-24', '1974-10-23', 15.00, '2018-09-15 01:04:58', '2018-09-15 01:04:58', NULL),
(14, 7, 'Regular Ticket', 1000, '1974-10-24', '1974-12-22', 18.00, '2018-09-15 01:04:58', '2018-09-15 01:04:58', NULL),
(15, 8, 'Early Bird Ticket', 100, '1994-11-22', '1995-01-21', 20.00, '2018-09-15 01:04:58', '2018-09-15 01:04:58', NULL),
(16, 8, 'Regular Ticket', 1000, '1995-01-22', '1995-03-22', 24.00, '2018-09-15 01:04:59', '2018-09-15 01:04:59', NULL),
(17, 9, 'Early Bird Ticket', 100, '2016-08-30', '2016-10-29', 26.00, '2018-09-15 01:04:59', '2018-09-15 01:04:59', NULL),
(18, 9, 'Regular Ticket', 1000, '2016-10-30', '2016-12-28', 31.20, '2018-09-15 01:04:59', '2018-09-15 01:04:59', NULL),
(19, 10, 'Early Bird Ticket', 100, '1999-06-28', '1999-08-27', 11.00, '2018-09-15 01:04:59', '2018-09-15 01:04:59', NULL),
(20, 10, 'Regular Ticket', 1000, '1999-08-28', '1999-10-26', 13.20, '2018-09-15 01:04:59', '2018-09-15 01:04:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$P9ld33sDoxbzcUds2DxWcuLsO3F3xJnQiKJ/BIm9txkv719IfgLI.', 1, '7Jak5GRuEnDtCfARMw88E7TESduxCCU2Z28U8cYa9Uhr1O98M3MSTlAd7WGX', '2018-09-15 01:04:57', '2018-09-15 01:04:57'),
(2, 'Employee', 'employee@admin.com', '$2y$10$NU0yP6fEZzSPLoo9RyzXIuI5cxYwPX1DTkWGidAug4.nDhvSogkwC', 2, 'IIL882P61LzIwkyb9Ci0tyTpYzGzw6vIWCFOUWUdpu2cHXMfV2oFNwMrgiMI', '2018-09-15 01:10:03', '2018-09-15 01:10:03'),
(3, 'Customer', 'customer@admin.com', '$2y$10$9wW11.hzZS7O5nRWgBCyq.b4o93hBEq70SUtkusLwFqGaMlr3WsgK', 3, 'bA9PLHEUjdfPC5fGLWCSL5hsZiQ7qrl547EQk1Wq5CtxhdbJTXJ4XdXJu0lW', '2018-09-15 01:36:17', '2018-09-15 01:36:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_deleted_at_index` (`deleted_at`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_tickets`
--
ALTER TABLE `payments_tickets`
  ADD KEY `payments_tickets_payment_id_foreign` (`payment_id`),
  ADD KEY `payments_tickets_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `41526_592f086e76f1b` (`event_id`),
  ADD KEY `tickets_deleted_at_index` (`deleted_at`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `41521_592f040dd61ce` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments_tickets`
--
ALTER TABLE `payments_tickets`
  ADD CONSTRAINT `payments_tickets_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_tickets_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `41526_592f086e76f1b` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `41521_592f040dd61ce` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
