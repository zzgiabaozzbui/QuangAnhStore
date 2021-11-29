-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2021 lúc 02:39 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phukhien`
--

CREATE TABLE `phukhien` (
  `MaPhuKien` varchar(50) NOT NULL,
  `MaLoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phukhien`
--

INSERT INTO `phukhien` (`MaPhuKien`, `MaLoai`) VALUES
('PK001', 'L01'),
('PK002', 'L01'),
('PK003', 'L03'),
('PK004', 'L03'),
('PK005', 'L01'),
('PK006', 'L01'),
('PK007', 'L06'),
('PK008', 'L06'),
('PK009', 'L09'),
('PK010', 'L09'),
('PK011', 'L01'),
('PK012', 'L03'),
('PK013', 'L01'),
('PK014', 'L05');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `phukhien`
--
ALTER TABLE `phukhien`
  ADD PRIMARY KEY (`MaPhuKien`,`MaLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
