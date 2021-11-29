-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 05:30 AM
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
-- Table structure for table `quantri`
--

CREATE TABLE `quantri` (
  `MaNV` int(11) NOT NULL,
  `Tendangnhap` varchar(255) NOT NULL,
  `Matkhau` varchar(255) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `Gioitinh` int(2) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Diachi` varchar(100) NOT NULL,
  `Ngaysinh` date NOT NULL,
  `Sdt` varchar(25) NOT NULL,
  `Quyen` int(2) NOT NULL,
  `Trangthai` int(2) NOT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quantri`
--

INSERT INTO `quantri` (`MaNV`, `Tendangnhap`, `Matkhau`, `fullname`, `Gioitinh`, `Email`, `Diachi`, `Ngaysinh`, `Sdt`, `Quyen`, `Trangthai`, `img`) VALUES
(1, 'a', '1', 'Nguyễn Quang Bảo', 1, 'zzgiabaozzbui@gmail.com', 'Nam Định', '2001-09-24', '0399645778', 0, 1, 'http://localhost:8080/QuangAnhStore/Admin/Frontend/img/quantri/71089849_952558758417428_8367291828201848832_n.jpg'),
(2, 'dinhthang', '1', 'Phạm Đình Thắng', 1, 'zzgiabaozzbui@gmail.com', 'Nam Định', '2001-09-24', '0399654875', 0, 1, '../Frontend/img/quantri/user.png'),
(3, 'ngianinh', '1', 'Nguyễn Nghĩa Ninh', 1, 'zzgiabaozzbui@gmail.com', 'Nam Định', '2001-09-24', '0399652453', 0, 1, NULL),
(4, 'ducmanh', '1', 'Đinh Đức Mạnh', 1, 'zzgiabaozzbui@gmail.com', 'Nam Định', '2001-09-24', '0395421375', 0, 1, NULL),
(5, 'phamhieu', '1', 'Phạm Quang Hiếu', 1, 'phamhieu@gmail.com', 'Ninh Bình', '2002-09-21', '0395421325', 0, 1, NULL),
(6, 'duyennguyen', '1', 'Nguyễn Thị Duyên', 0, 'duyennguyen@gmail.com', 'Hải Phòng', '2001-08-12', '0396542785', 0, 1, NULL),
(7, 'quochieu', '1', 'Nguyễn Quốc Hiếu', 1, 'duyennguyen@gmail.com', 'Hà Nội', '2001-05-23', '0396524822', 2, 1, NULL),
(8, 'thompham', '1', 'Phạm Thị Thơm', 0, 'thompham@gmail.com', 'Thái Bình', '2000-03-03', '0645242251', 2, 1, NULL),
(9, 'hoangnhung', '1', 'Hoàng Thị Nhung', 0, 'hoangnhung@gmail.com', 'Hà Nội', '2001-05-20', '0396452187', 0, 1, NULL),
(10, 'nguyenhieu', '1', 'Nguyễn Hiếu Minh', 1, 'nguyenhieu@gmail.com', 'Yên Bái', '2001-12-24', '0167523421', 1, 1, NULL),
(11, 'quangnam', '1', 'Lại Quang Nam', 1, 'quangnam@gmail.com', 'Yên Bái', '2001-03-22', '0399654222', 0, 1, NULL),
(12, 'buithuy', '1', 'Bùi Thị Thúy', 0, 'buithuy@gmail.com', 'tp.HCM', '2001-09-24', '0123456789', 2, 1, NULL),
(13, 'hieupham', '1', 'Phạm Hiếu', 1, 'hieupham@gmail.com', 'Lào Cai', '2001-09-24', '0312458623', 0, 1, NULL),
(14, 'minhvo', '1', 'Vũ Võ Minh', 1, 'minhvo@gmail.com', 'Hải Dương', '2001-09-24', '0321547865', 0, 1, NULL),
(16, 'quangtran', '1', 'Trần ĐÌnh Quang', 1, 'quangtran@gmail.com', 'Huế', '2001-09-10', '0324561302', 0, 0, NULL),
(17, 'minhquang', '1', 'Nguyễn Quang Minh', 1, 'minhquang@gmail.com', 'Quảng Ninh', '2002-11-01', '0321532142', 1, 1, NULL),
(18, 'baonguyen', '1', 'Nguyễn Quang Bảo', 1, 'baonguyen@gmail.com', 'Nam Định', '2012-11-07', '0354621575', 1, 1, NULL),
(19, 'tuoitran', '1', 'Tràn Thị Tươi', 0, 'tuoitran@gmail.com', 'Thái Bình', '2003-11-07', '0231542354', 1, 0, NULL),
(20, 'hieutran', '1', 'Trần Hữu Hiếu', 1, 'hieutran@gmail.com', 'Huế', '2000-11-07', '0396452315', 1, 0, NULL),
(21, 'maivu', '1', 'Vũ Thì Mai', 0, 'maivu@gmail.com', 'Thái Bình', '2001-08-07', '0396425584', 1, 0, NULL),
(22, 'congthang', '1', 'Nguyễn Công Thắng', 1, 'congthang@gmail.com', 'Nam Định', '2001-12-03', '0396452321', 1, 0, NULL),
(23, 'dinhvan', '1', 'Phạm Đình Văn', 1, 'dinhvan@gmail.com', 'Hà Nội', '2002-03-12', '0396513321', 0, 1, NULL),
(24, 'quangminh', '1', 'Vũ Quang Minh', 1, 'quangminh@gmail.com', 'Hà Nội', '2001-11-07', '0312545325', 1, 0, NULL),
(25, 'buiminh', '1', 'Bùi Văn Minh', 1, 'buiminh@gmail.com', 'Yên Bái', '2003-11-07', '0396452310', 1, 1, NULL),
(26, 'quocnam', '1', 'Vũ Quốc Nam', 1, 'quocnam@gmail.com', 'Thái Bình', '2001-05-01', '0396458125', 1, 1, NULL),
(27, 'b', '1', 'Phan Đình Giót', 3, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(28, 'b', '1', 'Nguyễn Quang Lưu', 3, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(29, 'b', '1', 'Phan Đình Phùng', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(30, 'b', '1', 'Phan Anh', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(31, 'b', '1', 'Lưu Bá', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 0, 1, NULL),
(32, 'b', '1', 'Lại Văn Sâm', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 0, 0, NULL),
(33, 'b', '1', 'Nguyễn Quang Bảo', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(34, 'b', '1', 'Nguyễn Quang Bảo', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(35, 'b', '1', 'Nguyễn Quang Bảo', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(36, 'b', '1', 'Nguyễn Quang Bảo', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(37, 'b', '1', 'Nguyễn Quang Bảo', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(38, 'b', '1', 'Nguyễn Quang Bảo', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(39, 'b', '1', 'Nguyễn Quang Bảo', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(40, 'b', '1', 'Nguyễn Quang Bảo', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(41, 'b', '1', 'Nguyễn Quang Bảo', 0, 'zzgiabao21345zzbui@gmail.com', 'Thái Bình', '2021-11-07', '0399645778', 1, 1, NULL),
(43, 'abc123', '1', 'Nguyễn Quang Bảo', 1, 'zzgiabao2zzbui@gmail.com', 'Thái Bình', '2021-11-01', '0399645778', 1, 0, '../Frontend/img/quantri/1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`MaNV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quantri`
--
ALTER TABLE `quantri`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
