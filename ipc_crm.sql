-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2021 pada 15.34
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipc_crm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktifitas`
--

CREATE TABLE `aktifitas` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `aktifitas` text NOT NULL,
  `url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aktifitas`
--

INSERT INTO `aktifitas` (`id`, `user_id`, `jenis`, `aktifitas`, `url`, `created_at`, `updated_at`) VALUES
(17, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21051183037', '2021-05-10 06:19:57', '2021-05-11 13:19:57'),
(18, 2, 'update', 'Melakukan perubahan pada akun', '/profile/edit', '2021-05-11 00:02:53', '2021-05-11 13:02:53'),
(19, 2, 'registrasi', 'Mengirim ulang persyaratan pendaftaran perusahaan', '/', '2021-05-11 04:09:31', '2021-05-11 13:09:31'),
(20, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21051183037', '2021-05-11 06:38:40', '2021-05-11 13:19:57'),
(21, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21051101597', '2021-05-11 07:22:29', '2021-05-11 14:22:29'),
(22, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21051101597', '2021-05-11 07:24:19', '2021-05-11 14:24:19'),
(23, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21051100735', '2021-05-11 07:29:32', '2021-05-11 14:29:32'),
(24, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21051100735', '2021-05-11 07:30:05', '2021-05-11 14:30:05'),
(25, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21051493258', '2021-05-13 23:25:01', '2021-05-14 06:25:01'),
(26, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21051493258', '2021-05-13 23:27:57', '2021-05-14 06:27:57'),
(27, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21051496769', '2021-05-14 00:52:02', '2021-05-14 07:52:02'),
(28, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21051496769', '2021-05-14 00:52:39', '2021-05-14 07:52:39'),
(29, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21051438013', '2021-05-14 00:59:26', '2021-05-14 07:59:26'),
(30, 2, 'update', 'Merubah data perusahaan', '/', '2021-05-14 02:10:09', '2021-05-14 09:10:09'),
(31, 2, 'update', 'Merubah data perusahaan', '/', '2021-05-14 02:23:32', '2021-05-14 09:23:32'),
(32, 2, 'update', 'Merubah data perusahaan', '/', '2021-05-14 02:31:59', '2021-05-14 09:31:59'),
(33, 2, 'update', 'Merubah data perusahaan', '/', '2021-05-14 02:35:59', '2021-05-14 09:35:59'),
(34, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21051483808', '2021-05-14 03:04:45', '2021-05-14 10:04:45'),
(35, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21051438013', '2021-05-14 03:05:41', '2021-05-14 10:05:41'),
(36, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21051483808', '2021-05-14 03:06:03', '2021-05-14 10:06:03'),
(37, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21051554658', '2021-05-15 16:50:52', '2021-05-15 23:50:52'),
(38, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21051554658', '2021-05-15 17:47:23', '2021-05-16 00:47:23'),
(39, 3, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21051692803', '2021-05-16 08:56:38', '2021-05-16 15:56:38'),
(40, 3, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21051692803', '2021-05-16 08:58:45', '2021-05-16 15:58:45'),
(41, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21051814239', '2021-05-17 19:45:05', '2021-05-18 02:45:05'),
(42, 4, 'registrasi', 'Mendaftarkan perusahaan Octopus', '/', '2021-05-27 11:49:12', '2021-05-27 18:49:12'),
(43, 4, 'registrasi', 'Mengirim ulang persyaratan pendaftaran perusahaan', '/', '2021-05-27 11:50:24', '2021-05-27 18:50:24'),
(44, 4, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21052755496', '2021-05-27 11:51:05', '2021-05-27 18:51:05'),
(45, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21051814239', '2021-05-27 11:52:13', '2021-05-27 18:52:13'),
(46, 4, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21052755496', '2021-05-27 11:53:52', '2021-05-27 18:53:52'),
(47, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21052716112', '2021-05-27 12:21:41', '2021-05-27 19:21:41'),
(48, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21052787460', '2021-05-27 12:24:05', '2021-05-27 19:24:05'),
(49, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21052744150', '2021-05-27 12:24:55', '2021-05-27 19:24:55'),
(50, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21052929158', '2021-05-29 14:05:59', '2021-05-29 21:05:59'),
(51, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21052929158', '2021-05-29 14:07:53', '2021-05-29 21:07:53'),
(52, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21052936547', '2021-05-29 14:08:11', '2021-05-29 21:08:11'),
(53, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21052936547', '2021-05-29 14:08:43', '2021-05-29 21:08:43'),
(54, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21052999500', '2021-05-29 14:18:18', '2021-05-29 21:18:18'),
(55, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21052999500', '2021-05-29 14:19:32', '2021-05-29 21:19:32'),
(56, 4, 'registrasi', 'Mendaftarkan perusahaan Octopus', '/', '2021-05-29 15:06:53', '2021-05-29 22:06:53'),
(57, 4, 'registrasi', 'Mengirim ulang persyaratan pendaftaran perusahaan', '/', '2021-05-29 15:09:03', '2021-05-29 22:09:03'),
(58, 4, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21052940009', '2021-05-29 15:18:23', '2021-05-29 22:18:23'),
(59, 4, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21052940009', '2021-05-29 15:19:01', '2021-05-29 22:19:01'),
(60, 4, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21052958830', '2021-05-29 15:29:44', '2021-05-29 22:29:44'),
(61, 4, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21052958830', '2021-05-29 15:32:02', '2021-05-29 22:32:02'),
(62, 4, 'registrasi', 'Mendaftarkan perusahaan Octopus', '/', '2021-05-29 15:39:34', '2021-05-29 22:39:34'),
(63, 4, 'registrasi', 'Mengirim ulang persyaratan pendaftaran perusahaan', '/', '2021-05-29 15:39:57', '2021-05-29 22:39:57'),
(64, 4, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21052913801', '2021-05-29 15:40:51', '2021-05-29 22:40:51'),
(65, 4, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21052913801', '2021-05-29 15:43:38', '2021-05-29 22:43:38'),
(66, 5, 'registrasi', 'Mendaftarkan perusahaan Aji', '/', '2021-06-03 14:23:34', '2021-06-03 21:23:34'),
(67, 5, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21060379460', '2021-06-03 14:24:59', '2021-06-03 21:24:59'),
(68, 5, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-care/21060379460', '2021-06-03 14:27:00', '2021-06-03 21:27:00'),
(69, 6, 'update', 'Melakukan perubahan pada akun', '/profile/edit', '2021-06-13 13:32:03', '2021-06-13 20:32:03'),
(70, 6, 'update', 'Melakukan perubahan pada akun', '/profile/edit', '2021-06-13 13:34:20', '2021-06-13 20:34:20'),
(71, 6, 'update', 'Melakukan perubahan pada akun', '/profile/edit', '2021-06-13 13:35:14', '2021-06-13 20:35:14'),
(72, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-care/21061494352', '2021-06-13 17:34:23', '2021-06-14 00:34:23'),
(73, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-service/21061494352', '2021-06-13 17:37:45', '2021-06-14 00:37:45'),
(74, 5, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-service/21061523329', '2021-06-15 12:11:07', '2021-06-15 19:11:07'),
(75, 5, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-service/21061523329', '2021-06-15 12:20:16', '2021-06-15 19:20:16'),
(76, 8, 'registrasi', 'Mendaftarkan perusahaan PT. Develovers', '/', '2021-06-19 05:58:10', '2021-06-19 12:58:10'),
(77, 2, 'update', 'Melakukan perubahan pada akun', '/profile/edit', '2021-06-27 11:44:20', '2021-06-27 18:44:20'),
(78, 2, 'update', 'Melakukan perubahan pada akun', '/profile/edit', '2021-06-27 11:50:45', '2021-06-27 18:50:45'),
(79, 9, 'update', 'Melakukan perubahan pada akun', '/profile/edit', '2021-07-14 22:31:57', '2021-07-15 05:31:57'),
(80, 9, 'update', 'Melakukan perubahan pada akun', '/profile/edit', '2021-07-14 22:32:23', '2021-07-15 05:32:23'),
(81, 8, 'update', 'Melakukan perubahan pada akun', '/profile/edit', '2021-07-14 22:33:12', '2021-07-15 05:33:12'),
(82, 4, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-service/21071554178', '2021-07-14 23:06:12', '2021-07-15 06:06:12'),
(83, 10, 'registrasi', 'Mendaftarkan perusahaan PT Octopus', '/', '2021-07-15 04:14:42', '2021-07-15 11:14:42'),
(84, 10, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-service/21071561771', '2021-07-15 04:16:11', '2021-07-15 11:16:11'),
(85, 10, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-service/21071561771', '2021-07-15 04:17:23', '2021-07-15 11:17:23'),
(86, 10, 'update', 'Merubah data perusahaan', '/', '2021-07-15 04:18:04', '2021-07-15 11:18:04'),
(87, 10, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-service/21071535233', '2021-07-15 05:11:38', '2021-07-15 12:11:38'),
(88, 2, 'update', 'Melakukan perubahan pada akun', '/profile/edit', '2021-08-19 19:27:43', '2021-08-20 02:27:43'),
(89, 2, 'update', 'Melakukan perubahan pada akun', '/profile/edit', '2021-08-19 19:30:27', '2021-08-20 02:30:27'),
(90, 2, 'cs', 'Membuat pengaduan baru, Perihal : test', '/customer-service/21090855827', '2021-09-08 12:48:52', '2021-09-08 19:48:52'),
(91, 2, 'cs', 'Menutup pengaduan, Perihal : test', '/customer-service/21090855827', '2021-09-08 14:29:37', '2021-09-08 21:29:37'),
(92, 2, 'update', 'Merubah data perusahaan', '/', '2021-09-08 14:31:22', '2021-09-08 21:31:22'),
(93, 2, 'cs', 'Membuat pengaduan baru, Perihal : Tes', '/customer-service/21110231791', '2021-11-02 03:19:40', '2021-11-02 10:19:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `company`
--

CREATE TABLE `company` (
  `id` bigint(20) NOT NULL,
  `leader_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `company`
--

INSERT INTO `company` (`id`, `leader_name`, `company_name`, `npwp`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(8, 'Adis', 'Octopus', '123.123.123', 'Bekasi', '3', '2021-06-12 15:46:17', '2021-06-12 15:36:52'),
(12, 'Niko Arista', 'PT Dolphin', '876.876.876', 'Bekasi Utara', '2', '2021-05-11 06:09:51', '2021-09-08 14:31:22'),
(15, 'Apip', 'Octopus', '123.123.123', 'Bekasi Utara', '4', '2021-05-29 15:40:23', '2021-05-29 15:40:23'),
(16, 'Contoh', 'Aji', '123', 'Bekasi', '5', '2021-06-03 14:24:10', '2021-06-03 14:24:10'),
(17, 'Afif Defriant', 'PT. Develovers', '12345.12345.12345', 'Bekasi Utara', '8', '2021-06-19 19:11:47', '2021-06-19 19:11:47'),
(18, 'Afif Defriant', 'PT Octopus', '111111111', 'Bekasi', '10', '2021-07-15 04:15:28', '2021-07-15 04:18:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `company_regis`
--

CREATE TABLE `company_regis` (
  `id` bigint(20) NOT NULL,
  `leader_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `surat_permohonan` varchar(255) NOT NULL,
  `foto_npwp` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `cek_npwp` text DEFAULT NULL,
  `cek_surat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `confirm_regis`
--

CREATE TABLE `confirm_regis` (
  `id` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `code` varchar(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `confirm_regis`
--

INSERT INTO `confirm_regis` (`id`, `email`, `password`, `code`, `created_at`, `updated_at`) VALUES
(1, 'afif.defriant17@mhs.ubharajaya.ac.id', 'afif123', '778593', '2021-07-14 22:42:43', '2021-07-14 22:42:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `kepada` bigint(20) NOT NULL,
  `notif` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_read` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `user_id`, `kepada`, `notif`, `url`, `is_read`, `created_at`, `updated_at`) VALUES
(59, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050681293', '1', '2021-04-05 07:50:35', '2021-11-02 10:20:27'),
(60, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050777131', '1', '2021-05-07 08:45:37', '2021-11-02 10:20:27'),
(61, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050798132', '1', '2021-05-07 08:47:12', '2021-11-02 10:20:27'),
(62, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050777131', '1', '2021-05-07 08:51:11', '2021-11-02 10:20:27'),
(63, 1, 2, 'CS Admin Membalas pengaduan andaaaaaaaaaaaaaaaaaaaaaaa', '/customer-care/21050798132', '1', '2021-05-07 08:51:16', '2021-11-02 10:20:27'),
(66, 1, 2, 'Pengaduan anda sedang ditangani oleh Admin', '/customer-care', '1', '2021-05-07 10:19:32', '2021-11-02 10:20:27'),
(67, 1, 2, 'Pengaduan anda sedang ditangani oleh petugas kami', '/customer-care', '1', '2021-05-07 10:21:25', '2021-11-02 10:20:27'),
(68, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-07 11:23:07', '2021-11-02 10:20:27'),
(69, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050790966', '1', '2021-05-07 11:23:25', '2021-11-02 10:20:27'),
(70, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050736789', '1', '2021-05-08 10:07:32', '2021-11-02 10:20:27'),
(71, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050736789', '1', '2021-05-08 10:08:17', '2021-11-02 10:20:27'),
(72, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050799695', '1', '2021-05-08 10:08:32', '2021-11-02 10:20:27'),
(73, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050799695', '1', '2021-05-09 00:12:35', '2021-11-02 10:20:27'),
(74, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050799695', '1', '2021-05-09 00:18:23', '2021-11-02 10:20:27'),
(75, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050799695', '1', '2021-05-09 00:19:20', '2021-11-02 10:20:27'),
(76, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050799695', '1', '2021-05-09 00:51:57', '2021-11-02 10:20:27'),
(77, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-09 16:20:44', '2021-11-02 10:20:27'),
(78, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-09 16:34:22', '2021-11-02 10:20:27'),
(79, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-09 16:35:34', '2021-11-02 10:20:27'),
(80, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-09 16:41:11', '2021-11-02 10:20:27'),
(81, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050955500', '1', '2021-05-09 16:41:21', '2021-11-02 10:20:27'),
(82, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050955500', '1', '2021-05-09 16:43:08', '2021-11-02 10:20:27'),
(83, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050955500', '1', '2021-05-09 16:44:09', '2021-11-02 10:20:27'),
(84, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-09 16:44:17', '2021-11-02 10:20:27'),
(85, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050926635', '1', '2021-05-09 16:44:31', '2021-11-02 10:20:27'),
(86, 1, 2, 'Pendaftaran perusahaan ditunda', '/company-registration/reupload', '1', '2021-05-09 23:44:23', '2021-11-02 10:20:27'),
(87, 1, 2, 'Pendaftaran perusahaan ditunda', '/company-registration/reupload', '1', '2021-05-09 23:47:13', '2021-11-02 10:20:27'),
(88, 1, 2, 'Perusahaan anda berhasil didaftarkan', '/', '1', '2021-05-09 23:56:10', '2021-11-02 10:20:27'),
(89, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050955500', '1', '2021-05-10 00:12:01', '2021-11-02 10:20:27'),
(90, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21050955500', '1', '2021-05-10 00:12:39', '2021-11-02 10:20:27'),
(91, 1, 2, 'Pendaftaran perusahaan ditunda', '/company-registration/reupload', '1', '2021-05-11 06:09:12', '2021-11-02 10:20:27'),
(92, 1, 2, 'Perusahaan anda berhasil didaftarkan', '/', '1', '2021-05-11 06:09:51', '2021-11-02 10:20:27'),
(93, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-11 06:11:15', '2021-11-02 10:20:27'),
(94, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051189810', '1', '2021-05-11 06:12:05', '2021-11-02 10:20:27'),
(95, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051189810', '1', '2021-05-11 06:15:35', '2021-11-02 10:20:27'),
(96, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051189810', '1', '2021-05-11 06:16:03', '2021-11-02 10:20:27'),
(97, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051189810', '1', '2021-05-11 06:18:38', '2021-11-02 10:20:27'),
(98, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051189810', '1', '2021-05-11 06:19:36', '2021-11-02 10:20:27'),
(99, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-11 06:20:06', '2021-11-02 10:20:27'),
(100, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051183037', '1', '2021-05-11 06:20:09', '2021-11-02 10:20:27'),
(101, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051183037', '1', '2021-05-11 06:20:55', '2021-11-02 10:20:27'),
(102, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051183037', '1', '2021-05-11 06:21:42', '2021-11-02 10:20:27'),
(103, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051183037', '1', '2021-05-11 06:22:29', '2021-11-02 10:20:27'),
(104, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051183037', '1', '2021-05-11 06:22:43', '2021-11-02 10:20:27'),
(105, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-11 07:22:48', '2021-11-02 10:20:27'),
(106, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051101597', '1', '2021-05-11 07:23:00', '2021-11-02 10:20:27'),
(107, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-11 07:29:39', '2021-11-02 10:20:27'),
(108, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051100735', '1', '2021-05-11 07:29:48', '2021-11-02 10:20:27'),
(109, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-13 23:26:50', '2021-11-02 10:20:27'),
(110, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051493258', '1', '2021-05-13 23:26:55', '2021-11-02 10:20:27'),
(111, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051493258', '1', '2021-05-13 23:27:49', '2021-11-02 10:20:27'),
(112, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-14 00:52:26', '2021-11-02 10:20:27'),
(113, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051496769', '1', '2021-05-14 00:52:29', '2021-11-02 10:20:27'),
(114, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-14 00:59:34', '2021-11-02 10:20:27'),
(115, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051438013', '1', '2021-05-14 00:59:40', '2021-11-02 10:20:27'),
(116, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051438013', '1', '2021-05-14 01:00:15', '2021-11-02 10:20:27'),
(117, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051438013', '1', '2021-05-14 01:04:01', '2021-11-02 10:20:27'),
(118, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-14 03:05:47', '2021-11-02 10:20:27'),
(119, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051483808', '1', '2021-05-14 03:05:50', '2021-11-02 10:20:27'),
(120, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-15 17:47:12', '2021-11-02 10:20:27'),
(121, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051554658', '1', '2021-05-15 17:47:14', '2021-11-02 10:20:27'),
(122, 1, 3, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-16 08:58:09', '2021-09-08 21:18:18'),
(123, 1, 3, 'CS Admin Membalas pengaduan anda', '/customer-care/21051692803', '1', '2021-05-16 08:58:36', '2021-09-08 21:18:18'),
(124, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-17 19:46:10', '2021-11-02 10:20:27'),
(125, 1, 4, 'Pendaftaran perusahaan ditunda', '/company-registration/reupload', '1', '2021-05-27 11:50:04', '2021-07-15 06:10:52'),
(126, 1, 4, 'Perusahaan anda berhasil didaftarkan', '/', '1', '2021-05-27 11:50:35', '2021-07-15 06:10:52'),
(127, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21051814239', '1', '2021-05-27 11:51:24', '2021-11-02 10:20:27'),
(128, 1, 4, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-27 11:51:33', '2021-07-15 06:10:52'),
(129, 1, 4, 'CS Admin Membalas pengaduan anda', '/customer-care/21052755496', '1', '2021-05-27 11:52:35', '2021-07-15 06:10:52'),
(130, 1, 4, 'CS Admin Membalas pengaduan anda', '/customer-care/21052755496', '1', '2021-05-27 11:53:23', '2021-07-15 06:10:52'),
(131, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-29 14:06:11', '2021-11-02 10:20:27'),
(132, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21052929158', '1', '2021-05-29 14:07:45', '2021-11-02 10:20:27'),
(133, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-29 14:08:17', '2021-11-02 10:20:27'),
(134, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21052936547', '1', '2021-05-29 14:08:23', '2021-11-02 10:20:27'),
(135, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-29 14:19:20', '2021-11-02 10:20:27'),
(136, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-care/21052999500', '1', '2021-05-29 14:19:25', '2021-11-02 10:20:27'),
(137, 1, 4, 'Pendaftaran perusahaan ditunda', '/company-registration/reupload', '1', '2021-05-29 15:08:48', '2021-07-15 06:10:52'),
(138, 1, 4, 'Perusahaan anda berhasil didaftarkan', '/', '1', '2021-05-29 15:17:56', '2021-07-15 06:10:52'),
(139, 1, 4, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-29 15:18:32', '2021-07-15 06:10:52'),
(140, 1, 4, 'CS Admin Membalas pengaduan anda', '/customer-care/21052940009', '1', '2021-05-29 15:18:38', '2021-07-15 06:10:52'),
(141, 1, 4, 'CS Admin Membalas pengaduan anda', '/customer-care/21052940009', '1', '2021-05-29 15:18:55', '2021-07-15 06:10:52'),
(142, 1, 4, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-29 15:31:15', '2021-07-15 06:10:52'),
(143, 1, 4, 'CS Admin Membalas pengaduan anda', '/customer-care/21052958830', '1', '2021-05-29 15:31:56', '2021-07-15 06:10:52'),
(144, 1, 4, 'Pendaftaran perusahaan ditunda', '/company-registration/reupload', '1', '2021-05-29 15:39:48', '2021-07-15 06:10:52'),
(145, 1, 4, 'Perusahaan anda berhasil didaftarkan', '/', '1', '2021-05-29 15:40:23', '2021-07-15 06:10:52'),
(146, 1, 4, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-05-29 15:40:59', '2021-07-15 06:10:52'),
(147, 1, 4, 'CS Admin Membalas pengaduan anda', '/customer-care/21052913801', '1', '2021-05-29 15:41:35', '2021-07-15 06:10:52'),
(148, 1, 4, 'CS Admin Membalas pengaduan anda', '/customer-care/21052913801', '1', '2021-05-29 15:43:03', '2021-07-15 06:10:52'),
(149, 1, 5, 'Perusahaan anda berhasil didaftarkan', '/', '1', '2021-06-03 14:24:10', '2021-06-15 19:19:47'),
(150, 1, 5, 'Pengaduan anda sedang ditangani', '/customer-care', '1', '2021-06-03 14:25:46', '2021-06-15 19:19:47'),
(151, 1, 5, 'CS Admin Membalas pengaduan anda', '/customer-care/21060379460', '1', '2021-06-03 14:26:03', '2021-06-15 19:19:47'),
(152, 1, 5, 'CS Admin Membalas pengaduan anda', '/customer-care/21060379460', '1', '2021-06-03 14:26:51', '2021-06-15 19:19:47'),
(153, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-service', '1', '2021-06-13 17:37:29', '2021-11-02 10:20:27'),
(154, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-service/21061494352', '1', '2021-06-13 17:37:35', '2021-11-02 10:20:27'),
(155, 1, 5, 'Pengaduan anda sedang ditangani', '/customer-service', '1', '2021-06-15 12:17:29', '2021-06-15 19:19:47'),
(156, 1, 5, 'CS Admin Membalas pengaduan anda', '/customer-service/21061523329', '1', '2021-06-15 12:17:43', '2021-06-15 19:19:47'),
(157, 1, 5, 'CS Admin Membalas pengaduan anda', '/customer-service/21061523329', '1', '2021-06-15 12:18:40', '2021-06-15 19:19:47'),
(158, 1, 8, 'Perusahaan anda berhasil didaftarkan', '/', '1', '2021-06-19 19:11:47', '2021-07-15 05:33:01'),
(159, 1, 4, 'Pengaduan anda sedang ditangani', '/customer-service', '1', '2021-07-14 23:07:17', '2021-07-15 06:10:52'),
(160, 1, 4, 'CS Admin Membalas pengaduan anda', '/customer-service/21071554178', '1', '2021-07-14 23:08:29', '2021-07-15 06:10:52'),
(161, 1, 4, 'CS Admin Membalas pengaduan anda', '/customer-service/21071554178', '1', '2021-07-14 23:10:49', '2021-07-15 06:10:52'),
(162, 1, 10, 'Perusahaan anda berhasil didaftarkan', '/', '1', '2021-07-15 04:15:28', '2021-07-15 12:11:53'),
(163, 1, 10, 'Pengaduan anda sedang ditangani', '/customer-service', '1', '2021-07-15 04:16:27', '2021-07-15 12:11:53'),
(164, 1, 10, 'CS Admin Membalas pengaduan anda', '/customer-service/21071561771', '1', '2021-07-15 04:16:50', '2021-07-15 12:11:53'),
(165, 1, 10, 'Pengaduan anda sedang ditangani', '/customer-service', '1', '2021-07-15 05:11:44', '2021-07-15 12:11:53'),
(166, 1, 10, 'CS Admin Membalas pengaduan anda', '/customer-service/21071535233', '1', '2021-07-15 05:11:47', '2021-07-15 12:11:53'),
(167, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-service', '1', '2021-09-08 12:49:01', '2021-11-02 10:20:27'),
(168, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-service/21090855827', '1', '2021-09-08 12:49:27', '2021-11-02 10:20:27'),
(169, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-service/21090855827', '1', '2021-09-08 12:52:52', '2021-11-02 10:20:27'),
(170, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-service/21090855827', '1', '2021-09-08 12:54:39', '2021-11-02 10:20:27'),
(171, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-service/21090855827', '1', '2021-09-08 12:56:37', '2021-11-02 10:20:27'),
(172, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-service/21090855827', '1', '2021-09-08 14:11:29', '2021-11-02 10:20:27'),
(173, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-service/21090855827', '1', '2021-09-08 14:13:07', '2021-11-02 10:20:27'),
(174, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-service/21090855827', '1', '2021-09-08 14:16:25', '2021-11-02 10:20:27'),
(175, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-service/21090855827', '1', '2021-09-08 14:18:12', '2021-11-02 10:20:27'),
(176, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-service/21090855827', '1', '2021-09-08 14:20:39', '2021-11-02 10:20:27'),
(177, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-service/21090855827', '1', '2021-09-08 14:29:24', '2021-11-02 10:20:27'),
(178, 1, 2, 'Pengaduan anda sedang ditangani', '/customer-service', '1', '2021-11-02 03:19:58', '2021-11-02 10:20:27'),
(179, 1, 2, 'CS Admin Membalas pengaduan anda', '/customer-service/21110231791', '1', '2021-11-02 03:20:21', '2021-11-02 10:20:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` varchar(50) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `aplikasi` varchar(50) NOT NULL,
  `kegiatan` varchar(50) NOT NULL,
  `permasalahan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `admin_nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `user_id`, `perihal`, `nama`, `perusahaan`, `email`, `tanggal`, `aplikasi`, `kegiatan`, `permasalahan`, `status`, `admin_id`, `admin_nama`, `created_at`, `updated_at`) VALUES
('21050626634', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2020-10-04', 'Opus', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-06 01:06:32', '2021-05-06 08:11:09'),
('21050659661', 2, 'Lorem', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-03-02', 'Billing', 'Import', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus numquam facilis error laudantium laborum placeat rerum tenetur, consequuntur beatae aliquam dolorem blanditiis odit dicta voluptates repellat. In quis beatae error.', '4', 1, 'CS Admin', '2021-05-05 23:11:35', '2021-05-06 07:29:13'),
('21050666478', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2020-10-04', 'Opus', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-06 01:07:07', '2021-05-06 08:11:18'),
('21050681293', 2, 'Lorem', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2020-10-04', 'Billing', 'Import', 'From chat apps and polls to live sports commentary and mapped locations, Pusher empowers developers to create powerful realtime features at scale. We handle complex infrastructure so that you can focus on the experience.', '4', 1, 'CS Admin', '2021-05-06 00:39:17', '2021-05-06 08:10:58'),
('21050736789', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2020-10-04', 'Billing', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-07 10:19:20', '2021-05-08 17:08:24'),
('21050777131', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2020-10-04', 'Opus', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-07 07:57:05', '2021-05-07 16:04:18'),
('21050790966', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2020-10-04', 'Billing', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-07 11:22:56', '2021-05-07 18:23:50'),
('21050798132', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2020-10-04', 'Billing', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-07 08:18:50', '2021-05-07 15:53:17'),
('21050799695', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2020-10-04', 'Billing', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-07 10:21:18', '2021-05-09 22:56:50'),
('21050926635', 2, 'test', 'Afif Defriant', 'Dolphin', 'defriant17@gmail.com', '2020-10-04', 'Opus', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-09 16:43:34', '2021-05-09 23:44:41'),
('21050955500', 2, 'test', 'Afif Defriant', 'Dolphin', 'defriant17@gmail.com', '2020-10-04', 'Opus', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-09 15:57:06', '2021-05-10 07:12:56'),
('21051100735', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2020-10-04', 'Billing', 'Batal Muat', 'test', '4', 1, 'CS Admin', '2021-05-11 07:29:32', '2021-05-11 14:30:05'),
('21051101597', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-04-04', 'Octopus', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-11 07:22:29', '2021-05-11 14:24:19'),
('21051183037', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2020-10-04', 'Opus', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-11 06:19:57', '2021-05-11 13:23:00'),
('21051189810', 2, 'Test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-04-04', 'Billing', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-11 06:11:01', '2021-05-11 13:19:45'),
('21051438013', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-04-04', 'Billing', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-14 00:59:26', '2021-05-14 10:05:41'),
('21051483808', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-05-13', 'Billing', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-14 03:04:45', '2021-05-14 10:06:03'),
('21051493258', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-04-04', 'Billing', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-13 23:25:01', '2021-05-14 06:27:57'),
('21051496769', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-04-04', 'Billing', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-14 00:52:02', '2021-05-14 07:52:39'),
('21051554658', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-05-15', 'Opus', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-15 16:50:52', '2021-05-16 00:47:23'),
('21051692803', 3, 'test', 'Nafis Rislando', 'Octopus', 'napis@gmail.com', '2021-05-16', 'Billing', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-16 08:56:38', '2021-05-16 15:58:45'),
('21051814239', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-05-18', 'Billing', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-17 19:45:05', '2021-05-27 18:52:13'),
('21052755496', 4, 'test', 'Snowy Kucing', 'Octopus', 'wdn.snowy30@gmail.com', '2021-05-27', 'Octopus', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-27 11:51:05', '2021-05-27 18:53:52'),
('21052913801', 4, 'test', 'Snowy Kucing', 'Octopus', 'wdn.snowy30@gmail.com', '2021-05-29', 'Billing', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-29 15:40:51', '2021-05-29 22:43:38'),
('21052929158', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-05-29', 'Opus', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-29 14:05:59', '2021-05-29 21:07:53'),
('21052936547', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-05-29', 'Opus', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-29 14:08:11', '2021-05-29 21:08:43'),
('21052940009', 4, 'test', 'Snowy Kucing', 'Octopus', 'wdn.snowy30@gmail.com', '2021-05-29', 'Opus', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-29 15:18:23', '2021-05-29 22:19:01'),
('21052958830', 4, 'test', 'Snowy Kucing', 'Octopus', 'wdn.snowy30@gmail.com', '2021-05-29', 'Billing', 'Export', 'test', '4', 1, 'CS Admin', '2021-05-29 15:29:44', '2021-05-29 22:32:02'),
('21052999500', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-05-29', 'Billing', 'Import', 'test', '4', 1, 'CS Admin', '2021-05-29 14:18:18', '2021-05-29 21:19:32'),
('21060379460', 5, 'test', 'Wahyu Andriyan', 'Aji', 'andriwahyu477@gmail.com', '2021-06-03', 'Billing', 'Export', 'test', '4', 1, 'CS Admin', '2021-06-03 14:24:59', '2021-06-03 21:27:00'),
('21061494352', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-06-14', 'Billing', 'Import', 'test', '4', 1, 'CS Admin', '2021-06-13 17:34:23', '2021-06-14 00:37:45'),
('21061523329', 5, 'test', 'Wahyu Andriyan', 'Aji', 'andriwahyu477@gmail.com', '2021-06-15', 'Billing', 'Import', 'test', '4', 1, 'CS Admin', '2021-06-15 12:11:07', '2021-06-15 19:20:16'),
('21071535233', 10, 'test', 'Afif Defriant', 'PT Octopus', 'afifdefriant01@gmail.com', '2021-07-14', 'Billing', 'Export', 'test', '4', 1, 'CS Admin', '2021-07-15 05:11:38', '2021-07-15 12:11:47'),
('21071554178', 4, 'test', 'Snowy Doe', 'Octopus', 'wdn.snowy30@gmail.com', '2021-07-14', 'Opus', 'Import', 'test', '4', 1, 'CS Admin', '2021-07-14 23:06:12', '2021-07-14 06:14:55'),
('21071561771', 10, 'test', 'Afif Defriant', 'PT Octopus', 'afifdefriant01@gmail.com', '2021-07-14', 'Opus', 'Import', 'test', '4', 1, 'CS Admin', '2021-07-15 04:16:11', '2021-07-15 11:17:23'),
('21090855827', 2, 'test', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-09-08', 'Billing', 'Import', 'test', '4', 1, 'CS Admin', '2021-09-08 12:48:52', '2021-09-08 21:29:37'),
('21110231791', 2, 'Tes', 'Afif Defriant', 'PT Dolphin', 'defriant17@gmail.com', '2021-11-02', 'Opus', 'Export', 'tes', '2', 1, 'CS Admin', '2021-11-02 03:19:40', '2021-11-02 10:20:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id` bigint(20) NOT NULL,
  `pengaduan_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balasan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id`, `pengaduan_id`, `user_id`, `balasan`, `created_at`, `updated_at`) VALUES
(92, 21050659661, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus numquam facilis error laudantium laborum placeat rerum tenetur, consequuntur beatae aliquam dolorem blanditiis odit dicta voluptates repellat. In quis beatae error.\nLorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus numquam facilis error laudantium laborum placeat rerum tenetur', '2021-05-05 23:12:39', '2021-05-06 06:12:39'),
(93, 21050659661, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus numquam facilis error laudantium laborum placeat rerum tenetur', '2021-05-05 23:13:09', '2021-05-06 06:13:09'),
(94, 21050659661, 1, 'Temporibus numquam facilis error laudantium laborum placeat rerum tenetur', '2021-05-05 23:13:31', '2021-05-06 06:13:31'),
(105, 21050659661, 2, 'In quis beatae error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus numquam facilis error laudantium laborum placeat rerum tenetur', '2021-05-06 00:25:13', '2021-05-06 07:25:13'),
(106, 21050659661, 1, 'Temporibus numquam facilis error laudantium laborum placeat rerum tenetur', '2021-05-06 00:25:48', '2021-05-06 07:25:48'),
(107, 21050681293, 1, 'We handle complex infrastructure so that you can focus on the experience.', '2021-05-06 00:39:47', '2021-05-06 07:39:47'),
(108, 21050681293, 2, 'We handle complex infrastructure so that you can focus on the experience.', '2021-05-06 00:44:29', '2021-05-06 07:44:29'),
(109, 21050681293, 1, 'We handle complex infrastructure so that you can focus on the experience.', '2021-05-06 00:44:57', '2021-05-06 07:44:57'),
(110, 21050681293, 2, 'test', '2021-05-06 01:07:43', '2021-05-06 08:07:43'),
(111, 21050626634, 1, 'test', '2021-05-06 01:07:57', '2021-05-06 08:07:57'),
(112, 21050626634, 2, 'test', '2021-05-06 01:08:38', '2021-05-06 08:08:38'),
(113, 21050666478, 1, 'test', '2021-05-06 01:10:17', '2021-05-06 08:10:17'),
(114, 21050626634, 1, 'test', '2021-05-06 01:10:23', '2021-05-06 08:10:23'),
(115, 21050681293, 1, 'test', '2021-05-06 01:10:29', '2021-05-06 08:10:29'),
(116, 21050777131, 1, 'test', '2021-05-07 08:45:37', '2021-05-07 15:45:37'),
(117, 21050798132, 1, 'test', '2021-05-07 08:47:12', '2021-05-07 15:47:12'),
(118, 21050798132, 2, 'test', '2021-05-07 08:50:51', '2021-05-07 15:50:51'),
(119, 21050777131, 2, 'test', '2021-05-07 08:51:02', '2021-05-07 15:51:02'),
(120, 21050777131, 1, 'test', '2021-05-07 08:51:11', '2021-05-07 15:51:11'),
(121, 21050798132, 1, 'test', '2021-05-07 08:51:16', '2021-05-07 15:51:16'),
(122, 21050777131, 2, 'test', '2021-05-07 08:55:53', '2021-05-07 15:55:53'),
(123, 21050777131, 1, 'test', '2021-05-07 08:56:02', '2021-05-07 15:56:02'),
(124, 21050777131, 2, 'test', '2021-05-07 08:58:02', '2021-05-07 15:58:02'),
(125, 21050777131, 1, 'test', '2021-05-07 08:58:10', '2021-05-07 15:58:10'),
(126, 21050790966, 1, 'test', '2021-05-07 11:23:25', '2021-05-07 18:23:25'),
(127, 21050736789, 1, 'test', '2021-05-08 10:07:32', '2021-05-08 17:07:32'),
(128, 21050736789, 2, 'test', '2021-05-08 10:08:10', '2021-05-08 17:08:10'),
(129, 21050736789, 1, 'test', '2021-05-08 10:08:17', '2021-05-08 17:08:17'),
(130, 21050799695, 1, 'test', '2021-05-08 10:08:32', '2021-05-08 17:08:32'),
(131, 21050799695, 2, 'test', '2021-05-09 00:12:03', '2021-05-09 07:12:03'),
(132, 21050799695, 1, 'test', '2021-05-09 00:12:35', '2021-05-09 07:12:35'),
(133, 21050799695, 2, 'test', '2021-05-09 00:18:14', '2021-05-09 07:18:14'),
(134, 21050799695, 1, 'test', '2021-05-09 00:18:23', '2021-05-09 07:18:23'),
(135, 21050799695, 2, 'test', '2021-05-09 00:19:14', '2021-05-09 07:19:14'),
(136, 21050799695, 1, 'test', '2021-05-09 00:19:20', '2021-05-09 07:19:20'),
(137, 21050799695, 2, 'test', '2021-05-09 00:51:48', '2021-05-09 07:51:48'),
(138, 21050799695, 1, 'test', '2021-05-09 00:51:57', '2021-05-09 07:51:57'),
(139, 21050955500, 1, 'test', '2021-05-09 16:41:21', '2021-05-09 23:41:21'),
(140, 21050955500, 2, 'test', '2021-05-09 16:42:54', '2021-05-09 23:42:54'),
(141, 21050955500, 1, 'test', '2021-05-09 16:43:08', '2021-05-09 23:43:08'),
(142, 21050955500, 2, 'test', '2021-05-09 16:44:02', '2021-05-09 23:44:02'),
(143, 21050955500, 1, 'test', '2021-05-09 16:44:09', '2021-05-09 23:44:09'),
(144, 21050926635, 1, 'test', '2021-05-09 16:44:31', '2021-05-09 23:44:31'),
(145, 21050955500, 1, 'test', '2021-05-10 00:12:01', '2021-05-10 07:12:01'),
(146, 21050955500, 2, 'test', '2021-05-10 00:12:30', '2021-05-10 07:12:30'),
(147, 21050955500, 1, 'test', '2021-05-10 00:12:39', '2021-05-10 07:12:39'),
(148, 21051189810, 1, 'test', '2021-05-11 06:12:05', '2021-05-11 13:12:05'),
(149, 21051189810, 2, 'test', '2021-05-11 06:15:30', '2021-05-11 13:15:30'),
(150, 21051189810, 1, 'test', '2021-05-11 06:15:35', '2021-05-11 13:15:35'),
(151, 21051189810, 2, 'test', '2021-05-11 06:15:56', '2021-05-11 13:15:56'),
(152, 21051189810, 1, 'test', '2021-05-11 06:16:03', '2021-05-11 13:16:03'),
(153, 21051189810, 2, 'test', '2021-05-11 06:18:32', '2021-05-11 13:18:32'),
(154, 21051189810, 1, 'test', '2021-05-11 06:18:38', '2021-05-11 13:18:38'),
(155, 21051189810, 2, 'test', '2021-05-11 06:19:12', '2021-05-11 13:19:12'),
(156, 21051189810, 1, 'test', '2021-05-11 06:19:36', '2021-05-11 13:19:36'),
(157, 21051183037, 1, 'test', '2021-05-11 06:20:09', '2021-05-11 13:20:09'),
(158, 21051183037, 2, 'test', '2021-05-11 06:20:49', '2021-05-11 13:20:49'),
(159, 21051183037, 1, 'test', '2021-05-11 06:20:55', '2021-05-11 13:20:55'),
(160, 21051183037, 2, 'test', '2021-05-11 06:21:35', '2021-05-11 13:21:35'),
(161, 21051183037, 1, 'test', '2021-05-11 06:21:42', '2021-05-11 13:21:42'),
(162, 21051183037, 2, 'test', '2021-05-11 06:22:23', '2021-05-11 13:22:23'),
(163, 21051183037, 1, 'test', '2021-05-11 06:22:29', '2021-05-11 13:22:29'),
(164, 21051183037, 2, 'test', '2021-05-11 06:22:39', '2021-05-11 13:22:39'),
(165, 21051183037, 1, 'test', '2021-05-11 06:22:43', '2021-05-11 13:22:43'),
(166, 21051101597, 1, 'test', '2021-05-11 07:23:00', '2021-05-11 14:23:00'),
(167, 21051100735, 1, 'test', '2021-05-11 07:29:48', '2021-05-11 14:29:48'),
(168, 21051493258, 1, 'test', '2021-05-13 23:26:55', '2021-05-14 06:26:55'),
(169, 21051493258, 2, 'test', '2021-05-13 23:27:37', '2021-05-14 06:27:37'),
(170, 21051493258, 1, 'test', '2021-05-13 23:27:49', '2021-05-14 06:27:49'),
(171, 21051496769, 1, 'test', '2021-05-14 00:52:29', '2021-05-14 07:52:29'),
(172, 21051438013, 1, 'test', '2021-05-14 00:59:40', '2021-05-14 07:59:40'),
(173, 21051438013, 2, 'test', '2021-05-14 01:00:09', '2021-05-14 08:00:09'),
(174, 21051438013, 1, 'test', '2021-05-14 01:00:15', '2021-05-14 08:00:15'),
(175, 21051438013, 2, 'test', '2021-05-14 01:03:54', '2021-05-14 08:03:54'),
(176, 21051438013, 1, 'test', '2021-05-14 01:04:01', '2021-05-14 08:04:01'),
(177, 21051483808, 1, 'test', '2021-05-14 03:05:50', '2021-05-14 10:05:50'),
(178, 21051554658, 1, 'test', '2021-05-15 17:47:14', '2021-05-16 00:47:14'),
(179, 21051692803, 1, 'test', '2021-05-16 08:58:36', '2021-05-16 15:58:36'),
(180, 21051814239, 1, 'test', '2021-05-27 11:51:24', '2021-05-27 18:51:24'),
(181, 21052755496, 1, 'test', '2021-05-27 11:52:35', '2021-05-27 18:52:35'),
(182, 21052755496, 4, 'test', '2021-05-27 11:52:53', '2021-05-27 18:52:53'),
(183, 21052755496, 1, 'test', '2021-05-27 11:53:23', '2021-05-27 18:53:23'),
(184, 21052929158, 1, 'test', '2021-05-29 14:07:45', '2021-05-29 21:07:45'),
(185, 21052936547, 1, 'test', '2021-05-29 14:08:23', '2021-05-29 21:08:23'),
(186, 21052999500, 1, 'test', '2021-05-29 14:19:25', '2021-05-29 21:19:25'),
(187, 21052940009, 1, 'test', '2021-05-29 15:18:38', '2021-05-29 22:18:38'),
(188, 21052940009, 4, 'test', '2021-05-29 15:18:47', '2021-05-29 22:18:47'),
(189, 21052940009, 1, 'test', '2021-05-29 15:18:55', '2021-05-29 22:18:55'),
(190, 21052958830, 1, 'test', '2021-05-29 15:31:56', '2021-05-29 22:31:56'),
(191, 21052913801, 1, 'test', '2021-05-29 15:41:35', '2021-05-29 22:41:35'),
(192, 21052913801, 4, 'test', '2021-05-29 15:42:30', '2021-05-29 22:42:30'),
(193, 21052913801, 1, 'test', '2021-05-29 15:43:03', '2021-05-29 22:43:03'),
(194, 21060379460, 1, 'test', '2021-06-03 14:26:03', '2021-06-03 21:26:03'),
(195, 21060379460, 5, 'test', '2021-06-03 14:26:32', '2021-06-03 21:26:32'),
(196, 21060379460, 1, 'test', '2021-06-03 14:26:51', '2021-06-03 21:26:51'),
(197, 21061494352, 1, 'test', '2021-06-13 17:37:35', '2021-06-14 00:37:35'),
(198, 21061523329, 1, 'test', '2021-06-15 12:17:43', '2021-06-15 19:17:43'),
(199, 21061523329, 5, 'test', '2021-06-15 12:17:57', '2021-06-15 19:17:57'),
(200, 21061523329, 1, 'test', '2021-06-15 12:18:40', '2021-06-15 19:18:40'),
(201, 21071554178, 1, 'test', '2021-07-14 23:08:29', '2021-07-15 06:08:29'),
(202, 21071554178, 4, 'test', '2021-07-14 23:10:07', '2021-07-15 06:10:07'),
(203, 21071554178, 1, 'test', '2021-07-14 23:10:49', '2021-07-15 06:10:49'),
(204, 21071561771, 1, 'test', '2021-07-15 04:16:50', '2021-07-15 11:16:50'),
(205, 21071535233, 1, 'test', '2021-07-15 05:11:47', '2021-07-15 12:11:47'),
(206, 21090855827, 1, 'test', '2021-09-08 12:49:27', '2021-09-08 19:49:27'),
(207, 21090855827, 2, 'test', '2021-09-08 12:50:47', '2021-09-08 19:50:47'),
(208, 21090855827, 1, 'test', '2021-09-08 12:52:52', '2021-09-08 19:52:52'),
(209, 21090855827, 2, 'test', '2021-09-08 12:53:53', '2021-09-08 19:53:53'),
(210, 21090855827, 1, 'test', '2021-09-08 12:54:39', '2021-09-08 19:54:39'),
(211, 21090855827, 2, 'test', '2021-09-08 12:56:01', '2021-09-08 19:56:01'),
(212, 21090855827, 1, 'test', '2021-09-08 12:56:37', '2021-09-08 19:56:37'),
(213, 21090855827, 2, 'test', '2021-09-08 14:11:09', '2021-09-08 21:11:09'),
(214, 21090855827, 1, 'test', '2021-09-08 14:11:29', '2021-09-08 21:11:29'),
(215, 21090855827, 2, 'test', '2021-09-08 14:11:50', '2021-09-08 21:11:50'),
(216, 21090855827, 1, 'test', '2021-09-08 14:13:07', '2021-09-08 21:13:07'),
(217, 21090855827, 2, 'test', '2021-09-08 14:16:01', '2021-09-08 21:16:01'),
(218, 21090855827, 1, 'test', '2021-09-08 14:16:25', '2021-09-08 21:16:25'),
(219, 21090855827, 2, 'test', '2021-09-08 14:17:41', '2021-09-08 21:17:41'),
(220, 21090855827, 1, 'test', '2021-09-08 14:18:12', '2021-09-08 21:18:12'),
(221, 21090855827, 2, 'test', '2021-09-08 14:20:05', '2021-09-08 21:20:05'),
(222, 21090855827, 1, 'test', '2021-09-08 14:20:39', '2021-09-08 21:20:39'),
(223, 21090855827, 1, 'test', '2021-09-08 14:29:24', '2021-09-08 21:29:24'),
(224, 21110231791, 1, 'tessss', '2021-11-02 03:20:21', '2021-11-02 10:20:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `profession`, `email`, `phone`, `address`, `email_verified_at`, `password`, `picture`, `profile`, `company_status`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin', 'admin', '0000000', 'Bekasi', NULL, '$2y$10$ZfYCf4Zd.fF6Zl7AOAbrau7T6yG/bktX9JybDp138mnUPdq8nW6h6', 'avatar-4_1608148300.png', 'completed', 'unregistered', 'admin', NULL, '2020-12-16 19:50:04', '2020-12-16 19:50:04'),
(2, 'Afif', 'Defriant', 'Web Developer', 'defriant17@gmail.com', '081314957058', 'Bekasi Utara', NULL, '$2y$10$OTqiaxKkEJHkbx5m0P7JtONiL/fp2NpVPvMiv47anJM7y5eYc1.ZG', 'avatar-7_1629401427.png', 'completed', 'registered', 'user', NULL, '2021-02-15 19:58:12', '2021-05-11 06:09:51'),
(3, 'Nafis', 'Rislando', 'Graphic Designer', 'napis@gmail.com', '08131313313', 'Bekasi', NULL, '$2y$10$8A2MwEq38YBSVUQ2T.28Guum8KeaXqGHtVe0MW.1YDdzIY82rd/NS', 'avatar-3_1620525053.png', 'completed', 'registered', 'user', NULL, '2021-04-28 03:30:11', '2021-04-28 03:35:12'),
(4, 'Snowy', 'Doe', 'Pet', 'wdn.snowy30@gmail.com', '12345', 'Bekasi', NULL, '$2y$10$efxnFBJIDyqV9uKc6XFm1uMPZlXP8f4ZyCadnxbVYGblPNwuHawGa', '3248158939_1622116060.jpg', 'completed', 'registered', 'user', NULL, '2021-05-27 11:45:18', '2021-05-29 15:40:23'),
(5, 'Wahyu', 'Andriyan', 'Mahasiswa', 'andriwahyu477@gmail.com', '123456', 'Bekasi', NULL, '$2y$10$iLRwJAWUf1hskpvJhOSfx.4Ot0CsqFwb4r9g5ZYAn.NSG52GBUUmu', 'avatar-2_1619580772_1622730115.png', 'completed', 'registered', 'user', NULL, '2021-06-03 14:20:34', '2021-06-03 14:24:10'),
(6, 'Defriant', 'Afif', 'Web Dev', 'afif123@gmail.com', '1234567', 'Bekasi Utara', NULL, '$2y$10$2ohdx9HtyDquwDlqYSV7jOKXpGIW2e8WEQCcQYGm0wQYrebeOMmsm', 'Ember_Spirit_icon_1623591314.png', 'completed', 'unregistered', 'user', NULL, '2021-06-13 13:18:55', '2021-06-13 13:18:55'),
(7, 'Revo', 'Tamaslan', 'Pro Gamer', 'revotamaslan@gmail.com', '0869696969', 'Burj Khalifa', NULL, '$2y$10$1Fmmgx84WEUQv5v/xQryzeIakakEtEG/S85G0HkhxjC7fENPVWiNC', 'Jeongyeon-Profile-Age-Life-Facts_1623599535.jpg', 'completed', 'unregistered', 'user', NULL, '2021-06-13 15:51:02', '2021-06-13 15:51:02'),
(8, 'Wahyu', 'Andriyan', 'Pro Player', 'wahyu@gmail.com', '123456789', 'Bekasi Utara', NULL, '$2y$10$8fooff8HyHNciZaMhwkI.eKQApZKnFvou9YfPkTbr7t8IobISGZHS', 'avatar-4_1624079779.png', 'completed', 'registered', 'user', NULL, '2021-06-19 04:51:29', '2021-06-19 19:11:47'),
(9, 'Aji', 'Jati', 'Programer', 'aji@gmail.com', '081313131313', 'Bekasi Utara', NULL, '$2y$10$TQmjiFBCXciwlyIdQZLP2uJST0AAmE7fIcbEGqhARdQG/K.mhKz9W', 'avatar-3_1626301943.png', 'completed', 'unregistered', 'user', NULL, '2021-06-19 18:48:53', '2021-06-19 18:48:53'),
(10, 'Afif', 'Defriant', 'Mahasiswa', 'afifdefriant01@gmail.com', '081314957058', 'Bekasi', NULL, '$2y$10$0FCMekmnycU9NxJY7zHInOrxbiJyoQR4jQi6zpT6bZ2dchfpF4Ovi', 'avatar_1626322451.png', 'completed', 'registered', 'user', NULL, '2021-07-15 04:13:42', '2021-07-15 04:15:28'),
(11, 'asdasd', 'awdawd', 'Programmer', 'wdn.snowy26@gmail.com', '15155', 'bekasi', NULL, '$2y$10$EuzOifKmack2wdcWGcsrWOayhlJiVI7LmIPeAgT2FhnvL.x6Z4Y4a', NULL, 'completed', 'unregistered', 'user', NULL, '2021-09-21 07:56:57', '2021-09-21 07:56:57');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktifitas`
--
ALTER TABLE `aktifitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `company_regis`
--
ALTER TABLE `company_regis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `confirm_regis`
--
ALTER TABLE `confirm_regis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktifitas`
--
ALTER TABLE `aktifitas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `company`
--
ALTER TABLE `company`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `company_regis`
--
ALTER TABLE `company_regis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `tutup_pengaduan_otomatis` ON SCHEDULE EVERY 30 SECOND STARTS '2021-05-03 21:19:30' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE pengaduan SET status = '4' WHERE TIMEDIFF(NOW(), updated_at) > '24:00:00' AND status = '2'$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
