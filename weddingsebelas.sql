-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2024 at 01:42 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weddingsebelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bridal_styles`
--

CREATE TABLE `bridal_styles` (
  `id_bridalstyle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket_bridalstyle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_paket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_paket` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bridal_styles`
--

INSERT INTO `bridal_styles` (`id_bridalstyle`, `nama_paket_bridalstyle`, `deskripsi_paket`, `harga_paket`, `created_at`, `updated_at`) VALUES
('BS0001', 'Paket Pengantin Batak', '2 gaun', 13000000, '2024-09-10 21:34:44', '2024-09-10 21:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `bridal_style_images`
--

CREATE TABLE `bridal_style_images` (
  `id` bigint UNSIGNED NOT NULL,
  `bridal_style_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pakaian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_paket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dekorasis`
--

CREATE TABLE `dekorasis` (
  `id_dekorasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dekorasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_dekorasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_dekorasi` int NOT NULL,
  `foto_dekorasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dekorasi_image`
--

CREATE TABLE `dekorasi_image` (
  `id` bigint UNSIGNED NOT NULL,
  `dekorasi_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id_dishes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dishes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_dishes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_dishes` int NOT NULL,
  `foto_dishes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dishes_images`
--

CREATE TABLE `dishes_images` (
  `id` bigint UNSIGNED NOT NULL,
  `dishes_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasis`
--

CREATE TABLE `dokumentasis` (
  `id_dokumentasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket_dokumentasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_dokumentasi` enum('foto','fotovideo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_dokumentasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_dokumentasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_dokumentasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumentasis`
--

INSERT INTO `dokumentasis` (`id_dokumentasi`, `nama_paket_dokumentasi`, `jenis_dokumentasi`, `deskripsi_dokumentasi`, `harga_dokumentasi`, `foto_dokumentasi`, `created_at`, `updated_at`) VALUES
('DK0001', 'Bronze', 'foto', '3 jam dokumentasi. cetak foto ukutan 30x40, all soft file via google drive', '3000000', NULL, '2024-09-17 13:00:23', '2024-09-17 13:00:23'),
('DK0002', 'Silver', 'foto', '6 jam dokumentasi, 2 cetak foto ukuran 30x40, 25 edited foto, all soft file via google drive', '8000000', NULL, '2024-09-17 13:09:49', '2024-09-17 13:09:49'),
('DK0003', 'Gold', 'foto', '6 jam dokumentasi, 1 cetak foto ukuran 12R, 1 cetak foto ukuran 5R, 25 edited foto, all soft file via google drive', '12000000', NULL, '2024-09-17 13:11:26', '2024-09-17 13:11:26'),
('DK0004', 'Platinum', 'foto', '6 jam dokumentasi, 1 cetak foto ukuran 16R, 1 cetak foto ukuran 12R, 1 etak foto ukuran 8R, 25 edited foto, 1 menit video cinematic, all soft file via google drive', '17000000', NULL, '2024-09-17 13:12:42', '2024-09-17 13:12:42'),
('DK0005', 'Diamond', 'foto', '8 jam dokumentasi, 1 cetak foto ukuran 20R, 1 cetak foto ukuran 12R, 1 cetak foto ukuran 8R, 50 edited foto, 2x1 menit video cinematic, all soft file via google drive', '3000000', NULL, '2024-09-17 13:16:12', '2024-09-17 13:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi_images`
--

CREATE TABLE `dokumentasi_images` (
  `id` bigint UNSIGNED NOT NULL,
  `dokumentasi_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumentasi_images`
--

INSERT INTO `dokumentasi_images` (`id`, `dokumentasi_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'DK0001', 'dokumentasi _images/public', '2024-09-17 13:00:24', '2024-09-17 13:00:24'),
(2, 'DK0002', 'dokumentasi _images/public', '2024-09-17 13:09:49', '2024-09-17 13:09:49'),
(3, 'DK0003', 'dokumentasi _images/public', '2024-09-17 13:11:26', '2024-09-17 13:11:26'),
(4, 'DK0004', 'dokumentasi _images/public', '2024-09-17 13:12:42', '2024-09-17 13:12:42'),
(5, 'DK0005', 'dokumentasi _images/public', '2024-09-17 13:16:12', '2024-09-17 13:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gedungs`
--

CREATE TABLE `gedungs` (
  `id_gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_gedung` enum('indoor','outdoor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_gedung` int NOT NULL,
  `alamat_gedung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_sewa_gedung` int NOT NULL,
  `status_gedung` enum('tersedia','tidak_tersedia') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_gedung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_gedung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gedung_images`
--

CREATE TABLE `gedung_images` (
  `id` bigint UNSIGNED NOT NULL,
  `gedung_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hiburans`
--

CREATE TABLE `hiburans` (
  `id_hiburan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket_hiburan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_hiburan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_sewa_hiburan` int NOT NULL,
  `foto_hiburan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hiburan_images`
--

CREATE TABLE `hiburan_images` (
  `id` bigint UNSIGNED NOT NULL,
  `hiburan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maincourses`
--

CREATE TABLE `maincourses` (
  `id_maincourse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket_maincourse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_paket_maincourse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_paket_maincourse` int NOT NULL,
  `foto_paket_maincourse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maincourse_images`
--

CREATE TABLE `maincourse_images` (
  `id` bigint UNSIGNED NOT NULL,
  `maincourse_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_27_041312_create_bridal_styles_table', 1),
(5, '2024_08_28_004229_create_bridal_style_images_table', 1),
(6, '2024_08_29_194509_create_dekorasis_table', 1),
(7, '2024_08_29_194918_create_dekorasi_images_table', 1),
(8, '2024_08_30_155818_create_dishes_table', 1),
(9, '2024_08_30_160159_create_dishes_images_table', 1),
(10, '2024_09_02_035236_create_dokumentasis_table', 1),
(11, '2024_09_02_035436_create_dokumentasi_images_table', 1),
(12, '2024_09_03_014120_create_gedungs_table', 1),
(13, '2024_09_03_014435_create_gedung_images_table', 1),
(14, '2024_09_03_034815_create_hiburans_table', 1),
(15, '2024_09_03_034833_create_hiburan_images_table', 1),
(16, '2024_09_03_062322_create_maincourses_table', 1),
(17, '2024_09_03_062349_create_maincourse_images_table', 1),
(18, '2024_09_03_071448_create_souvenirs_table', 1),
(19, '2024_09_03_071458_create_souvenir_images_table', 1),
(20, '2024_09_03_081413_create_undangans_table', 1),
(21, '2024_09_03_081435_create_undangan_images_table', 1),
(22, '2024_09_08_171448_create_pending_orders_table', 1),
(23, '2024_09_10_005908_create_ongoing_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ongoing_orders`
--

CREATE TABLE `ongoing_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GKr2Sbd633iNNIumrNKfrEfwmFW7OthFkMpVnfhA', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMk9WWXhPN3A4elJXQ1lIdnRwQjBtZnhWSzZKczd0ZmRyV3V4bW04WiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYm9va2luZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1726618897),
('j8qCf45eRARxgdIuJ4p4kiNpJmL9nQTr8G4Hc9ma', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieFNiT0JKTFV0ejFMMFEzRUI4Y0hjVlNJWWEzUmZ0SGZSejRpdlpaYiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1726562617),
('r4sxjvy4cyjK0COLwH3jAFnNflaZlZaf0lwZFizy', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN0JBU0tTblJvOFlJMUlIWHZJbEZtZ0dSNGRJUWN3U1BJYTIxNTVwbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ib29raW5nIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1726605597);

-- --------------------------------------------------------

--
-- Table structure for table `souvenirs`
--

CREATE TABLE `souvenirs` (
  `id_souvenir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket_souvenir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_paket_souvenir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `souvenir_images`
--

CREATE TABLE `souvenir_images` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_souvenir` enum('premium','standar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_paket_souvenir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `souvenir_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `undangans`
--

CREATE TABLE `undangans` (
  `id_undangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_undangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahan_undangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_undangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_undangan` int NOT NULL,
  `foto_undangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `undangan_images`
--

CREATE TABLE `undangan_images` (
  `id` bigint UNSIGNED NOT NULL,
  `undangan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tepa', 'tepa@gmail.com', 'admin', NULL, '$2y$12$nAzADQXOSpO2FHR7YkdLZuQU35BkqEGiRlLsd.7i4puYph1L9n1Pe', NULL, '2024-09-10 21:17:32', '2024-09-10 21:17:32'),
(2, 'anas', 'anas@gmail.com', 'user', NULL, '$2y$12$T3v.J65yyIhixSm9IFDwnu9meP0rU/ucj3uBOGmHYRcmCRvqIQMuu', NULL, '2024-09-16 18:17:44', '2024-09-16 18:17:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bridal_styles`
--
ALTER TABLE `bridal_styles`
  ADD PRIMARY KEY (`id_bridalstyle`);

--
-- Indexes for table `bridal_style_images`
--
ALTER TABLE `bridal_style_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dekorasis`
--
ALTER TABLE `dekorasis`
  ADD PRIMARY KEY (`id_dekorasi`);

--
-- Indexes for table `dekorasi_image`
--
ALTER TABLE `dekorasi_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id_dishes`);

--
-- Indexes for table `dishes_images`
--
ALTER TABLE `dishes_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumentasis`
--
ALTER TABLE `dokumentasis`
  ADD PRIMARY KEY (`id_dokumentasi`);

--
-- Indexes for table `dokumentasi_images`
--
ALTER TABLE `dokumentasi_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gedungs`
--
ALTER TABLE `gedungs`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `gedung_images`
--
ALTER TABLE `gedung_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiburans`
--
ALTER TABLE `hiburans`
  ADD PRIMARY KEY (`id_hiburan`);

--
-- Indexes for table `hiburan_images`
--
ALTER TABLE `hiburan_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maincourses`
--
ALTER TABLE `maincourses`
  ADD PRIMARY KEY (`id_maincourse`);

--
-- Indexes for table `maincourse_images`
--
ALTER TABLE `maincourse_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongoing_orders`
--
ALTER TABLE `ongoing_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `souvenirs`
--
ALTER TABLE `souvenirs`
  ADD PRIMARY KEY (`id_souvenir`);

--
-- Indexes for table `souvenir_images`
--
ALTER TABLE `souvenir_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `undangans`
--
ALTER TABLE `undangans`
  ADD PRIMARY KEY (`id_undangan`);

--
-- Indexes for table `undangan_images`
--
ALTER TABLE `undangan_images`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bridal_style_images`
--
ALTER TABLE `bridal_style_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dekorasi_image`
--
ALTER TABLE `dekorasi_image`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dishes_images`
--
ALTER TABLE `dishes_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokumentasi_images`
--
ALTER TABLE `dokumentasi_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gedung_images`
--
ALTER TABLE `gedung_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hiburan_images`
--
ALTER TABLE `hiburan_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maincourse_images`
--
ALTER TABLE `maincourse_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ongoing_orders`
--
ALTER TABLE `ongoing_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `souvenir_images`
--
ALTER TABLE `souvenir_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `undangan_images`
--
ALTER TABLE `undangan_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
