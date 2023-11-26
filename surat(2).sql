-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2023 at 07:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

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
-- Table structure for table `kenaikan`
--

CREATE TABLE `kenaikan` (
  `id` int(9) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `nip` varchar(99) NOT NULL,
  `pangkat` enum('Ia','Ib','Ic','Id','IIa','IIb','IIc','IId','IIIa','IIIb','IIIc','IIId','IVa','IVb','IVc','IVd','IVe') NOT NULL,
  `tmt_golongan` date NOT NULL,
  `gaji_pokok` float NOT NULL,
  `pangkat_sekarang` date NOT NULL,
  `pangkat_datang` date NOT NULL,
  `gaji_sekarang` float NOT NULL,
  `gaji_datang` float NOT NULL,
  `keterangan` varchar(99) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kenaikan`
--

INSERT INTO `kenaikan` (`id`, `nama`, `nip`, `pangkat`, `tmt_golongan`, `gaji_pokok`, `pangkat_sekarang`, `pangkat_datang`, `gaji_sekarang`, `gaji_datang`, `keterangan`, `updated_at`, `created_at`) VALUES
(9, 'sad', '223', 'Ia', '2023-11-09', 2, '2023-10-31', '2023-11-01', 3, 4, 'sda', '2023-11-08 10:47:12', '2023-11-08 10:47:12'),
(10, 'aditya', '201864', 'IVc', '2023-11-09', 230000, '2023-11-15', '2023-11-24', 83922, 21978800, 'ja', '2023-11-19 01:00:52', '2023-11-19 01:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `kk`
--

CREATE TABLE `kk` (
  `id` int(9) NOT NULL,
  `no_kk` int(16) NOT NULL,
  `kepala_keluarga` varchar(99) NOT NULL,
  `alamat` varchar(99) NOT NULL,
  `rt` int(9) NOT NULL,
  `rw` int(9) NOT NULL,
  `desa` varchar(99) NOT NULL,
  `kecamatan` varchar(99) NOT NULL,
  `kabupaten` varchar(99) NOT NULL,
  `provinsi` varchar(99) NOT NULL,
  `kode_pos` int(9) NOT NULL,
  `jumlah_anggota` int(9) NOT NULL,
  `status_kk` enum('Diambil','Belum Diambil','Proses') NOT NULL,
  `catatan` varchar(9) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kk`
--

INSERT INTO `kk` (`id`, `no_kk`, `kepala_keluarga`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `jumlah_anggota`, `status_kk`, `catatan`, `updated_at`, `created_at`) VALUES
(5, 2323, 'asd', 'ada', 32, 123, 'adsa', 'asd', 'ads', 'dsa', 232, 2, 'Diambil', 'sad', '2023-11-14 09:16:34', '2023-11-14 09:15:45'),
(6, 847477, 'udin petot', 'sasa', 32, 123, 'ad', 'asd', 'ads', 'asda', 23545, 5, 'Proses', 'sa', '2023-11-19 01:08:48', '2023-11-19 01:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `ktp`
--

CREATE TABLE `ktp` (
  `id` int(11) NOT NULL,
  `no_ktp` int(16) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `tempat_lahir` varchar(99) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(99) NOT NULL,
  `agama` enum('Islam','Katholik','Protestan','Hindu','Buddha','Konghucu') NOT NULL,
  `status_perkawinan` enum('Kawin','Belum Kawin') NOT NULL,
  `pekerjaan` varchar(99) NOT NULL,
  `kewarganegaraan` enum('Indonesia') NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `status_pengambilan` enum('Diambil','Belum Diambil','Proses') NOT NULL,
  `catatan` varchar(99) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ktp`
--

INSERT INTO `ktp` (`id`, `no_ktp`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `tgl_pendaftaran`, `status_pengambilan`, `catatan`, `updated_at`, `created_at`) VALUES
(3, 23, 'sadas', 'sadas', '2023-11-08', 'Laki-Laki', 'sadsa', 'Islam', 'Kawin', 'koko', 'Indonesia', '2023-11-08', 'Diambil', 'sad', '2023-11-08 10:37:56', '2023-11-08 10:37:56'),
(4, 23245555, 'lwos', 'sda', '2023-11-14', 'Laki-Laki', 'sada', 'Islam', 'Kawin', 'sadasd', 'Indonesia', '2023-11-23', 'Belum Diambil', 'asd', '2023-11-19 01:20:09', '2023-11-19 01:20:09');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(9) NOT NULL,
  `surat_masuk_id` int(11) NOT NULL,
  `judul` varchar(99) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  `dibaca` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `surat_masuk_id`, `judul`, `pesan`, `tanggal`, `dibaca`, `created_at`, `updated_at`) VALUES
(36, 45, 'Surat Masuk Baru', 'Anda menerima surat baru dengan nomor 2321 pada tanggal surat 02-11-2023', '2023-11-25', 1, '2023-11-25 03:52:39', '2023-11-25 03:52:39'),
(37, 46, 'Surat Masuk Baru', 'Anda menerima surat baru dengan nomor 23 pada tanggal surat 11-11-2023', '2023-11-25', 0, '2023-11-25 03:53:11', '2023-11-25 03:53:11'),
(38, 47, 'Surat Masuk Baru', 'Anda menerima surat baru dengan nomor anjg pada tanggal surat 11-11-2023', '2023-11-25', 0, '2023-11-25 04:59:15', '2023-11-25 04:59:15'),
(39, 48, 'Surat Masuk Baru', 'Anda menerima surat baru dengan nomor 2001 pada tanggal surat 02-11-2023', '2023-11-25', 0, '2023-11-25 12:29:59', '2023-11-25 05:29:59'),
(40, 49, 'Surat Masuk Baru', 'Anda menerima surat baru dengan nomor 232asd pada tanggal surat 10-11-2023', '2023-11-26', 0, '2023-11-26 10:40:36', '2023-11-26 10:40:36'),
(41, 50, 'Surat Masuk Baru', 'Anda menerima surat baru dengan nomor 23 pada tanggal surat 17-11-2023', '2023-11-26', 0, '2023-11-26 10:40:53', '2023-11-26 10:40:53');

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
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `nip` varchar(99) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(99) NOT NULL,
  `divisi` varchar(99) NOT NULL,
  `jabatan` varchar(99) NOT NULL,
  `foto` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `nip`, `jenis_kelamin`, `alamat`, `divisi`, `jabatan`, `foto`, `updated_at`, `created_at`) VALUES
(9, 'bujan', '232322', 'Laki-Laki', 'sada', 'ads', 'asdsa', '1700383507.png', '2023-11-19 01:45:07', '2023-11-19 01:29:27'),
(10, 'udin', NULL, 'Laki-Laki', 'ads', 'sadas', 'sadas', '1700383528.png', '2023-11-19 02:47:33', '2023-11-19 01:31:45'),
(11, 'anjkeng', '1231231', 'Laki-Laki', 'sada', 'asdas', 'asdas', '1700386665.png', '2023-11-19 02:37:45', '2023-11-19 02:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `pemangkatan`
--

CREATE TABLE `pemangkatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `nip` varchar(99) NOT NULL,
  `pangkat` enum('Ia','Ib','Ic','Id','IIa','IIb','IIc','IId','IIIa','IIIb','IIIc','IIId','IVa','IVb','IVc','IVd','IVe') NOT NULL,
  `jabatan` varchar(99) NOT NULL,
  `masa_kerja` int(9) NOT NULL,
  `latihan_jabatan` varchar(99) NOT NULL,
  `pendidikan` enum('SD','SMP','SMA/SLTA','D3','S1','S2','S3') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `catatan` date NOT NULL,
  `keterangan` varchar(99) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemangkatan`
--

INSERT INTO `pemangkatan` (`id`, `nama`, `nip`, `pangkat`, `jabatan`, `masa_kerja`, `latihan_jabatan`, `pendidikan`, `tanggal_lahir`, `catatan`, `keterangan`, `updated_at`, `created_at`) VALUES
(3, 'asd', '232', 'Ia', 'asd', 23, '3', 'SD', '2023-11-16', '2023-11-11', 'sad', '2023-11-08 10:37:24', '2023-11-08 10:37:24'),
(4, 'sad', '2131', 'IVc', 'asdsa', 13, '3', 'D3', '2023-11-15', '2023-11-16', 'sada', '2023-11-19 01:19:20', '2023-11-19 01:19:20');

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
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `pengelola` varchar(99) NOT NULL,
  `perihal` varchar(99) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `no_surat` text NOT NULL,
  `alamat` varchar(99) NOT NULL,
  `keterangan` varchar(99) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `pengelola`, `perihal`, `tanggal_surat`, `no_surat`, `alamat`, `keterangan`, `updated_at`, `created_at`) VALUES
(13, 'misiign', 'asd', '2023-11-09', 'adit', 'sada', 'sad', '2023-11-25 03:23:11', '2023-11-25 03:23:11'),
(14, 'mengontol', '3', '2023-11-15', '3', 'ada', 'sad', '2023-11-25 03:24:04', '2023-11-25 03:24:04'),
(15, 'adit', '3', '2023-11-15', 'ad', 'sadsa', 'asdasd', '2023-11-25 03:40:37', '2023-11-25 03:40:37'),
(16, 'adit', 'adit', '2023-11-14', 'adit', 'ada', 'adit', '2023-11-25 03:45:32', '2023-11-25 03:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar_notifikasi`
--

CREATE TABLE `surat_keluar_notifikasi` (
  `id` int(11) NOT NULL,
  `surat_keluar_id` int(11) NOT NULL,
  `judul` varchar(99) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  `dibaca` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keluar_notifikasi`
--

INSERT INTO `surat_keluar_notifikasi` (`id`, `surat_keluar_id`, `judul`, `pesan`, `tanggal`, `dibaca`, `created_at`, `updated_at`) VALUES
(5, 13, 'Surat Keluar Baru', 'Anda telah mengeluarkan surat dengan nomor adit pada tanggal surat 09-11-2023', '2023-11-25', 0, '2023-11-25 03:23:11', '2023-11-25 03:23:11'),
(6, 14, 'Surat Keluar Baru', 'Anda telah mengeluarkan surat dengan nomor 3 pada tanggal surat 15-11-2023', '2023-11-25', 0, '2023-11-25 03:24:04', '2023-11-25 03:24:04'),
(7, 15, 'Surat Keluar Baru', 'Anda telah mengeluarkan surat dengan nomor ad pada tanggal surat 15-11-2023', '2023-11-25', 0, '2023-11-25 03:40:37', '2023-11-25 03:40:37'),
(8, 16, 'Surat Keluar Baru', 'Anda telah mengeluarkan surat dengan nomor adit pada tanggal surat 14-11-2023', '2023-11-25', 0, '2023-11-25 03:45:32', '2023-11-25 03:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `asal_surat` varchar(99) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `no_surat` text NOT NULL,
  `perihal` varchar(99) NOT NULL,
  `keterangan` varchar(99) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `tanggal_terima`, `asal_surat`, `tanggal_surat`, `no_surat`, `perihal`, `keterangan`, `updated_at`, `created_at`) VALUES
(45, '2023-11-11', 'asd', '2023-11-02', '2321', '3', 'adit', '2023-11-25 03:52:39', '2023-11-25 03:52:39'),
(46, '2023-11-16', 'asdasdas', '2023-11-11', '23', 'adit', '3', '2023-11-25 03:53:11', '2023-11-25 03:53:11'),
(47, '2023-11-09', 'anjg', '2023-11-11', 'anjg', 'asd', 'sadsa', '2023-11-25 04:59:15', '2023-11-25 04:59:15'),
(48, '2023-11-29', 'sada', '2023-11-02', '2001', 'asd', 'sad', '2023-11-25 05:29:59', '2023-11-25 05:08:15'),
(49, '2023-12-01', 'asdsa', '2023-11-10', '232asd', 'asd', 'sad', '2023-11-26 10:40:36', '2023-11-26 10:40:36'),
(50, '2023-11-10', 'asdsadsada', '2023-11-17', '23', 'adit', 'sada', '2023-11-26 10:40:53', '2023-11-26 10:40:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nip` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nip`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aditya', 12210778, 'aditya.neo5@gmail.com', NULL, '$2y$10$MOx6J0nrZkaehD/NAUym5OIHSEqRigT40JdrwLqTmNQrU3vM9Vl/2', 'admin', NULL, '2023-11-26 10:17:03', '2023-11-26 10:17:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kenaikan`
--
ALTER TABLE `kenaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kk`
--
ALTER TABLE `kk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ktp`
--
ALTER TABLE `ktp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifikasi` (`surat_masuk_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemangkatan`
--
ALTER TABLE `pemangkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar_notifikasi`
--
ALTER TABLE `surat_keluar_notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_keluar_notifikasi` (`surat_keluar_id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kenaikan`
--
ALTER TABLE `kenaikan`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kk`
--
ALTER TABLE `kk`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ktp`
--
ALTER TABLE `ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pemangkatan`
--
ALTER TABLE `pemangkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `surat_keluar_notifikasi`
--
ALTER TABLE `surat_keluar_notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi` FOREIGN KEY (`surat_masuk_id`) REFERENCES `surat_masuk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `surat_keluar_notifikasi`
--
ALTER TABLE `surat_keluar_notifikasi`
  ADD CONSTRAINT `surat_keluar_notifikasi` FOREIGN KEY (`surat_keluar_id`) REFERENCES `surat_keluar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
