-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 03:55 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwpb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_kelas`
--

CREATE TABLE `tb_detail_kelas` (
  `id_detail` int(11) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `kd_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_kelas`
--

INSERT INTO `tb_detail_kelas` (`id_detail`, `nis`, `nip`, `kd_kelas`) VALUES
(1, 'adwdsd', 'adwdsad', 'asdwdaw'),
(2, 'mmm', 'mmm', 'mmm'),
(3, 'jjjhj', 'nknknkn', 'knnkn'),
(4, 'lllllllll', 'lklknknlk', 'vhvhvnbvn');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `tmpt_l` varchar(255) NOT NULL,
  `tgl_l` varchar(255) NOT NULL,
  `gol` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `prov` varchar(255) NOT NULL,
  `kota_kab` varchar(255) NOT NULL,
  `kec` varchar(255) NOT NULL,
  `kel` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `jk`, `tmpt_l`, `tgl_l`, `gol`, `alamat`, `prov`, `kota_kab`, `kec`, `kel`, `jabatan`) VALUES
(15, 'mmm', 'Dyo Ramanda Restyanto', 'LAKI - LAKI', 'Tangerang', '2021-09-11', 'Honorer', 'jl mandiri', 'banten', 'tangerang', 'cipondoh', 'poris plawad', 'Kepala'),
(16, 'nknknkn', 'Sandi Arba Putra', 'PEREMPUAN', 'Tangerang', '2021-09-03', 'PNS', 'jl mandiri', 'banten', 'tangerang', 'cipondoh', 'poris plawad', 'Kepala'),
(17, 'lklknknlk', 'Arif Iskandar', 'LAKI - LAKI', 'Tangerang', '2021-10-22', 'Honorer', 'jl mandiri', 'banten', 'tangerang', 'cipondoh', 'poris plawad', 'Kepala'),
(18, 'nknknkn', 'Muhamad Luthfi Sadli', 'PEREMPUAN', 'Tangerang', '2021-10-30', 'Honorer', 'jl mandiri', 'banten', 'tangerang', 'cipondoh', 'poris plawad', 'Kepala');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `kd_kelas` varchar(255) NOT NULL,
  `jml_murid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `kd_kelas`, `jml_murid`) VALUES
(1, 'XI RPL 1', 'asdwdaw', 'Rpl 1'),
(2, 'XI RPL 10', 'asdwdaw', 'Rpl 10'),
(3, 'XI RPL 10', 'mmm', '999'),
(4, 'XI RPL 10', 'mmm', 'Rpl 10'),
(13, 'XI RPL 10', 'asdwdaw', 'Rpl 1'),
(14, 'XI RPL 1', 'vhvhvnbvn', 'Rpl 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `jml_bayar` varchar(255) NOT NULL,
  `kd_bayar` varchar(255) NOT NULL,
  `tgl_bayar` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `nis`, `jml_bayar`, `kd_bayar`, `tgl_bayar`, `perihal`, `ket`) VALUES
(2, 'adwdsd', '800000', '0909099', '2021-09-14', 'adwdsdwad', 'dwadsdw'),
(4, 'mmm', '800000', '0909099', '2021-08-31', 'adwdsdwad', 'dwadsdw'),
(5, 'jjjhj', '800000', '0909099', '2021-09-04', 'adwdsdwad', 'dwadsdw'),
(6, 'mmm', '800000', '0909099', '2021-09-01', 'adwdsdwad', 'dwadsdw'),
(7, 'adwdsd', '800000', '0909099', '2021-10-20', 'adwdsdwad', 'dwadsdw'),
(8, 'adwdsd', '800000', '0909099', '2021-10-21', 'adwdsdwad', 'dwadsdw'),
(9, 'jjjhj', '800000', '0909099', '2021-10-07', 'adwdsdwad', 'dwadsdw'),
(10, 'mmm', '900000', '0909099', '2021-10-06', 'adwdsdwad', 'dwadsdw'),
(11, 'jjjhj', '800000', '0909099', '2021-10-06', 'adwdsdwad', 'dwadsdw'),
(12, 'jjjhj', '8000000', '0909099', '2021-10-13', 'adwdsdwad', 'dwadsdw'),
(14, 'jjjhj', '9000000', '0909099', '2021-09-28', 'adwdsdwad', 'dwadsdw');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` char(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `tmpt_lahir` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `alamat_siswa` varchar(255) NOT NULL,
  `kels` varchar(255) NOT NULL,
  `kecs` varchar(255) NOT NULL,
  `kota_kabs` varchar(255) NOT NULL,
  `provs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_siswa`, `agama`, `jk`, `tmpt_lahir`, `tgl_lahir`, `alamat_siswa`, `kels`, `kecs`, `kota_kabs`, `provs`) VALUES
(17, 'mmm', 'Dyo Ramanda Restyanto', 'Kristen', 'PEREMPUAN', 'Tangerang', '2021-09-10', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten'),
(18, 'jjjhj', 'Sandi Arba Putra', 'Katolik', 'LAKI - LAKI', 'Tangerang', '2021-09-17', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten'),
(19, 'lllllllll', 'Arif Iskandar', 'Islam', 'PEREMPUAN', 'Tangerang', '2021-09-18', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten'),
(20, 'mmm', 'Muhamad Luthfi Sadli', 'Katolik', 'LAKI - LAKI', 'Tangerang', '2021-09-21', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten'),
(21, 'adwdsd', 'Muhamad Luthfi Sadli', 'Islam', 'PEREMPUAN', 'Tangerang', '2021-10-22', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten'),
(22, 'jjjhj', 'Dyo Ramanda Restyanto', 'Islam', 'LAKI - LAKI', 'Tangerang', '2021-10-26', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten'),
(23, 'adwdsd', 'oi', 'Islam', 'LAKI - LAKI', 'Tangerang', '2021-10-08', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten'),
(24, 'adwdsd', 'oi', 'Kristen', 'PEREMPUAN', 'Tangerang', '2021-10-19', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten'),
(25, 'mmm', 'oi', 'Kristen', 'PEREMPUAN', 'Tangerang', '2021-10-30', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten'),
(26, 'mmm', 'Sandi Arba Putra', 'Katolik', 'LAKI - LAKI', 'Tangerang', '2021-10-06', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten'),
(27, 'adwdsd', 'adad', 'Islam', 'LAKI - LAKI', 'Tangerang', '2021-11-24', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten'),
(28, 'mmm', 'oi', 'Kristen', 'PEREMPUAN', 'Tangerang', '2021-10-02', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten'),
(29, 'lllllllll', 'oi', 'Islam', 'LAKI - LAKI', 'Tangerang', '2021-10-01', 'jl mandiri', 'poris plawad', 'cipondoh', 'tangerang', 'banten');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hak_akses` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `hak_akses`, `nama`, `status`) VALUES
(1, 'admin', 'EE1388F287FBB62637D9D99F3F45EDEA3935872547441922A3B2DFFA152DAC1E08A41FCD69AC190F08323CFB2DE939DA76A9D2B49FC0DEE3FBE46A52E607FDBC', 'Administrator', 'Luthfi', 'y'),
(2, 'bendahara', 'banyak', 'Bendahara', 'Arif, Dyo, Dan Sandi', 'y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_kelas`
--
ALTER TABLE `tb_detail_kelas`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_kelas`
--
ALTER TABLE `tb_detail_kelas`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
