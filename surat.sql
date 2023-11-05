-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2023 at 11:07 AM
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
  `keterangan` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kenaikan`
--

INSERT INTO `kenaikan` (`id`, `nama`, `nip`, `pangkat`, `tmt_golongan`, `gaji_pokok`, `pangkat_sekarang`, `pangkat_datang`, `gaji_sekarang`, `gaji_datang`, `keterangan`) VALUES
(2, 'asdawd', '213112', 'Ib', '2023-10-04', 2321.32, '2023-10-03', '2023-10-05', 23131.3, 122.22, 'asd');

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
  `catatan` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kk`
--

INSERT INTO `kk` (`id`, `no_kk`, `kepala_keluarga`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `jumlah_anggota`, `status_kk`, `catatan`) VALUES
(1, 23113, 'asdas', 'asdasd', 43, 43, 'sad', 'sad', 'asd', 'asd', 321, 2, 'Diambil', 'ada');

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
  `catatan` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ktp`
--

INSERT INTO `ktp` (`id`, `no_ktp`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `agama`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `tgl_pendaftaran`, `status_pengambilan`, `catatan`) VALUES
(1, 2131, 'asdsa', 'wadda', '2023-10-04', 'Laki-Laki', 'asdasd', 'Katholik', 'Kawin', 'sadasd', 'Indonesia', '2023-10-03', 'Proses', 'aasd');

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
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `nip`, `jenis_kelamin`, `alamat`, `divisi`, `jabatan`, `foto`) VALUES
(1, 'asdas', '1312', 'Perempuan', 'dasdas', 'asdas', 'sadas', 'asdad');

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
  `keterangan` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemangkatan`
--

INSERT INTO `pemangkatan` (`id`, `nama`, `nip`, `pangkat`, `jabatan`, `masa_kerja`, `latihan_jabatan`, `pendidikan`, `tanggal_lahir`, `catatan`, `keterangan`) VALUES
(1, 'adasda', '2131', 'Ib', 'sadsa', 21, '2131', 'SD', '2023-10-04', '2023-10-16', 'adasd');

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
  `keterangan` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `pengelola`, `perihal`, `tanggal_surat`, `no_surat`, `alamat`, `keterangan`) VALUES
(1, 'sadada', 'sadasda', '2023-10-04', '23asd', 'asdas', 'sadasd');

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
  `keterangan` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `tanggal_terima`, `asal_surat`, `tanggal_surat`, `no_surat`, `perihal`, `keterangan`) VALUES
(1, '2023-10-10', 'kakaka', '2023-10-02', '434xvc', 'asreq', '32432423');

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
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kk`
--
ALTER TABLE `kk`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ktp`
--
ALTER TABLE `ktp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemangkatan`
--
ALTER TABLE `pemangkatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
