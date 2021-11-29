-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2021 lúc 04:03 PM
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
-- Cơ sở dữ liệu: `qldt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `Mahoadon` int(11) NOT NULL,
  `Ten` varchar(100) NOT NULL,
  `SDT` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Luuy` varchar(500) NOT NULL,
  `Ngaydat` datetime NOT NULL DEFAULT current_timestamp(),
  `Thanhtoan` varchar(100) NOT NULL,
  `Trangthai` varchar(100) NOT NULL DEFAULT 'Chờ xác nhận',
  `Diachi` varchar(200) NOT NULL DEFAULT 'Nhận tại cửa hàng',
  `ThanhTien` float NOT NULL,
  `NgayVanChuyen` date DEFAULT NULL,
  `NgayGiaoHang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`Mahoadon`, `Ten`, `SDT`, `Email`, `Luuy`, `Ngaydat`, `Thanhtoan`, `Trangthai`, `Diachi`, `ThanhTien`, `NgayVanChuyen`, `NgayGiaoHang`) VALUES
(59, 'Phan Anh Tú ', '0979605611', 'manhhlunn@gmail.com', '', '2021-11-29 21:48:05', 'Khi nhận hàng', 'Chờ xác nhận', 'Đống Đa - Hà Nội', 8970000, NULL, NULL),
(60, 'Đinh Đức Mạnh', '0979605612', 'quocanh3012@gmail.com', '', '2021-11-29 21:49:14', 'Online', 'Chờ xác nhận', 'Hạ long - Quảng Ninh', 16900000, NULL, NULL),
(61, 'Nguyễn Nghĩa Ninh', '0123456789', '', '', '2021-11-29 00:00:00', 'Trực tiếp', 'Chờ xác nhận', 'Thái Bình', 10800000, NULL, NULL),
(62, 'Nguyễn Quang Bảo', '0123456', 'manhhlunn@gmail.com', '', '2021-11-29 00:00:00', 'Online', 'Chờ xác nhận', 'Tuần Châu', 500000, '0000-00-00', '0000-00-00'),
(63, 'Nguyễn Nghĩa Ninh', '0979605611', '', '', '2021-11-29 21:55:29', 'Khi nhận hàng', 'Chờ xác nhận', 'Đống Đa - Hà Nội', 10800000, NULL, NULL),
(64, 'Nguyễn Nghĩa Ninh', '0979606123', '', '', '2021-11-29 21:59:20', 'Khi nhận hàng', 'Chờ xác nhận', 'Nhận tại cửa hàng', 36120000, NULL, NULL),
(65, 'Đinh Đức Mạnh', '0979605611', '', '', '2021-11-29 22:01:58', 'Khi nhận hàng', 'Chờ xác nhận', 'Nhận tại cửa hàng', 46450000, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`Mahoadon`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `Mahoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
