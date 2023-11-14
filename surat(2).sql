-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 06:43 PM
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
(9, 'sad', '223', 'Ia', '2023-11-09', 2, '2023-10-31', '2023-11-01', 3, 4, 'sda', '2023-11-08 10:47:12', '2023-11-08 10:47:12');

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
(5, 2323, 'asd', 'ada', 32, 123, 'adsa', 'asd', 'ads', 'dsa', 232, 2, 'Diambil', 'sad', '2023-11-14 09:16:34', '2023-11-14 09:15:45');

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
(3, 23, 'sadas', 'sadas', '2023-11-08', 'Laki-Laki', 'sadsa', 'Islam', 'Kawin', 'koko', 'Indonesia', '2023-11-08', 'Diambil', 'sad', '2023-11-08 10:37:56', '2023-11-08 10:37:56');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `surat_masuk_id`, `judul`, `pesan`, `tanggal`, `created_at`, `updated_at`) VALUES
(2, 8, 'Surat Masuk Baru', 'Anda menerima surat baru dengan nomor adit', '2023-11-14', '2023-11-14 10:35:40', '2023-11-14 10:35:40'),
(3, 9, 'Surat Masuk Baru', 'Anda menerima surat baru dengan nomor kemah', '2023-11-14', '2023-11-14 10:42:50', '2023-11-14 10:42:50');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(99) NOT NULL,
  `nip` varchar(99) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` varchar(99) NOT NULL,
  `divisi` varchar(99) NOT NULL,
  `jabatan` varchar(99) NOT NULL,
  `foto` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `nip`, `jenis_kelamin`, `alamat`, `divisi`, `jabatan`, `foto`, `updated_at`, `created_at`) VALUES
(6, 'asdsa', '23', 'Laki-Laki', 'sad', 'asd', 'asd', 'ads', '2023-11-08 10:44:57', '2023-11-08 10:44:57'),
(7, 'asd', '23', 'Laki-Laki', 'asd', 'ads', 'ads', 'das', '2023-11-08 10:47:41', '2023-11-08 10:47:41');

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
(3, 'asd', '232', 'Ia', 'asd', 23, '3', 'SD', '2023-11-16', '2023-11-11', 'sad', '2023-11-08 10:37:24', '2023-11-08 10:37:24');

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
(3, 'sadsa', 'sa', '2023-11-10', '23', 'sad', 'dsa', '2023-11-08 10:37:02', '2023-11-08 10:37:02'),
(4, 'adit', 'adit', '2023-11-02', '23', 'ada', 'asdasd', '2023-11-14 09:26:53', '2023-11-14 09:26:53');

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
(1, '2023-10-10', 'kakaka', '2023-10-02', '434xvc', 'asreq', '32432423', '2023-11-05 14:09:58', NULL),
(6, '2023-11-22', 'asdasdas', '2023-11-08', '23', 'ads', 'asd', '2023-11-14 09:28:01', '2023-11-14 09:28:01'),
(7, '2023-11-14', 'adit', '2023-11-15', '323', 'ads', 'adit', '2023-11-14 09:41:43', '2023-11-14 09:41:43'),
(8, '2023-11-15', 'adit', '2023-11-16', 'adit', 'adit', 'adit', '2023-11-14 10:35:40', '2023-11-14 10:35:40'),
(9, '2023-11-16', 'kemah', '2023-11-17', 'kemah', '123', 'ad', '2023-11-14 10:42:50', '2023-11-14 10:42:50');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifikasi` (`surat_masuk_id`);

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
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kenaikan`
--
ALTER TABLE `kenaikan`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kk`
--
ALTER TABLE `kk`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ktp`
--
ALTER TABLE `ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pemangkatan`
--
ALTER TABLE `pemangkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi` FOREIGN KEY (`surat_masuk_id`) REFERENCES `surat_masuk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;