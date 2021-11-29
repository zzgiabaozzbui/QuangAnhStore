-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2021 lúc 04:12 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qldt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(55) NOT NULL,
  `MaDong` varchar(25) NOT NULL,
  `HinhAnh` longtext NOT NULL,
  `Gia` decimal(55,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MaDong`, `HinhAnh`, `Gia`) VALUES
(1, 'IPhone13', 'md002', '../Frontend/img/Featured phone/Apple/2.jpg', '29000000'),
(3, 'SamSung A71', 'md001', '../Frontend/img/Featured phone/SamSung/SamSungA71.jpg', '13000000'),
(9, 'Mi11', 'md003', '../Frontend/img/Featured phone/Xiaomi/Mi11.jpg', '8900000'),
(10, 'Vivo Z6', 'md005', '../Frontend/img/Featured phone/Vivo/VivoZ6.jfif', '9900000'),
(11, 'Xiaomi Redmi Note 10 Pro 6GB', 'md003', '../Frontend/img/Featured phone/Xiaomi/xiaomi-redmi-note-10-pro-thumb-vang-dong.jpg', '6700000'),
(13, 'Iphone11', 'md002', '../Frontend/img/Featured phone/Apple/iphone11.jpg', '16900000'),
(14, 'Samsung Galaxy Note 20 Ultra 5G', 'md001', '../Frontend/img/Featured phone/SamSung/Samsung Galaxy Note 20 Ultra 5G.webp', '22000000'),
(15, 'Samsung Galaxy S20 Ultra', 'md001', '../Frontend/img/Featured phone/SamSung/Samsung Galaxy S20 Ultra.jpg', '16000000'),
(16, 'Samsung Galaxy A02s', 'md001', '../Frontend/img/Featured phone/SamSung/Samsung Galaxy A02s.jfif', '3350000'),
(17, 'Samsung Galaxy A01 Core', 'md001', '../Frontend/img/Featured phone/SamSung/Samsung Galaxy A01 Core.jpg', '1850000'),
(18, 'Samsung Galaxy S20 FE 256GB (Fan Edition)', 'md001', '../Frontend/img/Featured phone/SamSung/Samsung Galaxy S20 FE 256GB (Fan Edition).jpg', '12750001'),
(29, 'iPhone 12 64GB', 'md002', '../Frontend/img/Featured phone/Apple/iphone-12-blue-select-2020.png', '20400000');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
