-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 12:30 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qldt`
--

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `Tendangnhap` varchar(25) NOT NULL,
  `Matkhau` varchar(25) DEFAULT NULL,
  `fullname` varchar(55) DEFAULT NULL,
  `Gioitinh` int(2) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `Diachi` varchar(255) DEFAULT NULL,
  `Ngaysinh` date DEFAULT NULL,
  `Trangthai` int(11) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `Tendangnhap`, `Matkhau`, `fullname`, `Gioitinh`, `Email`, `sdt`, `Diachi`, `Ngaysinh`, `Trangthai`, `img`) VALUES
(1, 'a', '1', 'Nguyễn Quang Bảo', 1, 'zzgiabaozzbui@gmail.com', '0399645778', 'Thái Bình', '2021-11-02', 1, 'Frontend/img/khachhang/71089849_952558758417428_8367291828201848832_n.jpg'),
(2, 'dinhcong', '1', 'Vũ ĐÌnh Công', 1, 'zzgiabao2zzbui@gmail.com', '0399645231', 'Thái Bình', '2021-11-09', 1, NULL),
(3, 'dinhthang', '1', 'Phạm Đình Thắng', 1, 'zzgiabao3zzbui@gmail.com', '0396512402', 'Thái Bình', '2021-11-02', 1, NULL),
(4, 'nn01', '1', 'Nguyễn Quang Minh', 1, 'zzgiabao21345zzbui@gmail.com', '0395786231', 'Thái Bình', '2021-11-01', 1, NULL),
(5, 'qb02', '1', 'Nguyễn Nghĩa Ninh', 1, 'zzgiabao21345zzbui@gmail.com', '0398723457', 'Thái Bình', '2021-11-03', 1, NULL),
(6, 'acc05', '1', 'Đinh Thị Thơm', 0, 'zzgiabaozzbui@gmail.com', '0396213579', 'Thái Bình', '2021-11-03', 0, NULL),
(7, 'quocninh', '1', 'Hoàng Thị Nhung', 0, 'zzgiabaozzbui@gmail.com', '0167539460', 'Thái Bình', '2021-11-03', 0, NULL),
(8, 'ducmanh', '1', 'Nguyễn Thị Thảo', 0, 'zzgiabaozzbui@gmail.com', '0399658329', 'Thái Bình', '2021-11-03', 0, NULL),
(10, 'gb231', '1', 'Đinh Đức Mạnh', 1, 'zzgiabao21345zzbui@gmail.com', '0391278656', 'Thái Bình', '2021-11-03', 1, NULL),
(11, 'cvb14', '1', 'Nguyễn Quang Huy', 1, 'zzgiabao21345zzbui@gmail.com', '0395423876', 'Thái Bình', '2021-11-03', 1, NULL),
(12, 'nininin', '1', 'Lại Quang Nam', 1, 'zzgiabao21345zzbui@gmail.com', '0342586413', 'Thái Bình', '2021-11-03', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`,`Tendangnhap`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
