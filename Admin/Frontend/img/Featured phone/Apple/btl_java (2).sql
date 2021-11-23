-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 02:58 PM
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
-- Database: `btl_java`
--

-- --------------------------------------------------------

--
-- Table structure for table `bophan`
--

CREATE TABLE `bophan` (
  `MaBoPhan` varchar(15) NOT NULL,
  `TenBoPhan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bophan`
--

INSERT INTO `bophan` (`MaBoPhan`, `TenBoPhan`) VALUES
('bp001', 'Lễ tân'),
('bp002', 'Buồng phòng'),
('bp003', 'Kế toán – tài chính'),
('bp004', 'Nhân sự'),
('bp005', 'Kỹ thuật'),
('bp006', 'An ninh');

-- --------------------------------------------------------

--
-- Table structure for table `chitietnhapkho`
--

CREATE TABLE `chitietnhapkho` (
  `MaNhapKho` varchar(15) NOT NULL,
  `MaSp` varchar(15) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaNhap` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietnhapkho`
--

INSERT INTO `chitietnhapkho` (`MaNhapKho`, `MaSp`, `SoLuong`, `GiaNhap`) VALUES
('nk001', 'sp001', 3, 50000),
('nk001', 'sp002', 6, 40000),
('nk001', 'sp003', 30, 60000),
('nk001', 'sp004', 8, 80000),
('nk002', 'sp003', 30, 60000),
('nk002', 'sp005', 8, 80000),
('nk002', 'sp003', 30, 60000),
('nk002', 'sp004', 8, 80000),
('nk003', 'sp005', 30, 60000),
('nk003', 'sp006', 8, 80000),
('nk212', 'sp001', 555, 30000),
('xxxxx', 'sp001', 18, 2222),
('nk3377', 'sp004', 4, 400000),
('nk3377', 'sp005', 2, 20000),
('2222', 'sp004', 3, 999999),
('2222', 'sp004', 3, 999999),
('2222', 'sp001', 10, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `dangnhap`
--

CREATE TABLE `dangnhap` (
  `TaiKhoan` varchar(15) NOT NULL,
  `MatKhau` varchar(20) DEFAULT NULL,
  `MaNV` varchar(15) DEFAULT NULL,
  `PhanQuyen` int(11) DEFAULT NULL,
  `TrangThai` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dangnhap`
--

INSERT INTO `dangnhap` (`TaiKhoan`, `MatKhau`, `MaNV`, `PhanQuyen`, `TrangThai`) VALUES
('ThuHa', '123456', 'nv011', 3, b'0'),
('ThuHien004', '00112233', 'nv006', 2, b'1'),
('ThuyAn08', '123456', 'nv001', 1, b'1'),
('VanManh821', '000000', 'nv004', 2, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `datdichvu`
--

CREATE TABLE `datdichvu` (
  `MaHDDV` varchar(15) NOT NULL,
  `MaDV` varchar(15) DEFAULT NULL,
  `MaKH` varchar(15) DEFAULT NULL,
  `MaNV` varchar(15) DEFAULT NULL,
  `ThoiGianDat` datetime DEFAULT NULL,
  `ThoiGianBatDauSDDV` datetime DEFAULT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL,
  `GhiChu` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datdichvu`
--

INSERT INTO `datdichvu` (`MaHDDV`, `MaDV`, `MaKH`, `MaNV`, `ThoiGianDat`, `ThoiGianBatDauSDDV`, `SoLuong`, `ThanhTien`, `GhiChu`) VALUES
('hddv001', '', 'kh001', 'NV001', '2021-11-02 01:26:32', '2021-11-02 01:26:32', 1, 200000, ''),
('hddv002', 'dv002', 'kh001', 'NV001', '2021-01-03 21:57:56', '2021-11-03 21:00:00', 3, 60000, NULL),
('hddv003', 'dv004', 'kh003', 'NV002', '2021-11-03 21:56:16', '2021-11-03 21:56:16', 8, 90000, NULL),
('hddv004', 'dv005', 'kh004', 'NV003', '2021-11-03 21:56:16', '2021-11-03 21:56:16', 5, 400000, NULL),
('hddv005', 'dv001', 'kh005', 'NV001', '2021-11-03 21:56:16', '2021-11-03 21:56:16', 4, 200000, NULL),
('hddv007', 'dv005', 'kh004', 'NV001', '2021-11-02 12:15:15', '2021-11-30 12:10:00', 4, 8000000, '4 Nguời đăng ký Spa'),
('hddv009', 'dv002', 'kh001', 'NV001', '2021-11-02 01:31:51', '2021-11-02 01:31:52', 2, 1000000, 'ABC'),
('hddv011', 'dv004', 'kh001', 'NV001', '2021-11-02 01:32:44', '2021-11-11 01:32:00', 4, 2000000, 'Hế lô 2');

-- --------------------------------------------------------

--
-- Table structure for table `datphong`
--

CREATE TABLE `datphong` (
  `ID_DatPhong` varchar(15) NOT NULL,
  `MaPhong` varchar(15) DEFAULT NULL,
  `MaNV` varchar(15) DEFAULT NULL,
  `MaKH` varchar(15) DEFAULT NULL,
  `NgayDatPhong` datetime DEFAULT NULL,
  `DatCoc` float DEFAULT 0,
  `NgayNhanPhong` datetime DEFAULT NULL,
  `NgayTraPhong` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datphong`
--

INSERT INTO `datphong` (`ID_DatPhong`, `MaPhong`, `MaNV`, `MaKH`, `NgayDatPhong`, `DatCoc`, `NgayNhanPhong`, `NgayTraPhong`) VALUES
('dp001', 'ph001', 'nv002', 'kh001', '2021-09-12 08:29:00', 100000, '2021-09-20 21:29:00', '2021-09-21 06:29:00'),
('dp002', 'ph001', 'nv001', 'kh002', '2021-10-12 09:00:00', 200000, '2021-10-14 21:29:00', NULL),
('dp003', 'ph002', 'nv002', 'kh003', '2021-09-24 01:25:00', 50000, '2021-09-25 21:29:00', '2021-09-26 06:29:00'),
('dp004', 'ph003', 'nv003', 'kh004', '2021-10-13 03:32:00', 200000, '2021-10-15 21:29:00', NULL),
('dp005', 'ph004', 'nv004', 'kh005', '2021-09-11 05:22:00', 150000, '2021-09-13 21:00:00', '2021-09-14 06:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `dichvu`
--

CREATE TABLE `dichvu` (
  `MaDV` varchar(15) NOT NULL,
  `TenDV` varchar(50) DEFAULT NULL,
  `MoTaDichVu` varchar(500) DEFAULT NULL,
  `PhiDV` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`MaDV`, `TenDV`, `MoTaDichVu`, `PhiDV`) VALUES
('', 'Dịch vụ chăm sóc da mặt', 'Chăm sóc da mặt đặc biệt', 200000),
('dv001', 'Dịch vụ giặt ủi quần áo', 'Đây là dịch vụ được tạo ra nhằm đáp ứng nhu cầu vệ sinh cá nhân và mặc của khách hàng.', 100000),
('dv002', 'Dịch vụ xe đưa đón sân bay', 'Dịch vụ xe đưa đón nhằm đáp ứng nhu cầu di chuyển ngày càng cao và mong muốn tạo được trải nghiệm thoải mái nhất cho khách hàng.', 500000),
('dv003', 'Nhà hàng', 'Gồm khu phức hợp nhà hàng, với nhiều loại thiết kế nhà hàng sang trọng theo các phong cách khác nhau. Đến với dịch vụ nhà hàng du khách có thể đặt cho mình các bữa ăn tự chọn, buffet hoặc các món ăn theo gia đình… với nhiều lựa chọn hương vị ẩm thực khác nhau.', 1000000),
('dv004', 'Quầy bar', 'Đây là dịch vụ được tạo để phục vụ thức uống, nhạc,... đáp ứng nhu cầu giải trí, thư giãn của du khách.', 500000),
('dv005', 'Dịch vụ Spa', 'Để đáp ứng nhu cầu làm đẹp của các chị em phụ nữ, các dịch vụ Spa được mở ra nhiều hơn trong những năm gần đây. Bao gồm: xông hơi, lột mụn, gội đầu ...', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` varchar(15) NOT NULL,
  `MaKH` varchar(15) DEFAULT NULL,
  `NgayLapHD` date DEFAULT NULL,
  `ThanhTien` float DEFAULT 0,
  `TrangThai` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaKH`, `NgayLapHD`, `ThanhTien`, `TrangThai`) VALUES
('hd001', 'kh001', '2021-09-15', 0, b'0'),
('hd002', 'kh002', '2021-09-28', 0, b'1'),
('hd003', 'kh003', '2021-09-20', 0, b'1'),
('hd004', 'kh004', '2021-08-25', 0, b'0'),
('hd005', 'kh005', '2021-09-12', 0, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` varchar(15) NOT NULL,
  `TenKH` varchar(50) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` bit(1) DEFAULT NULL,
  `SDT` varchar(15) DEFAULT NULL,
  `CMND` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `NgaySinh`, `GioiTinh`, `SDT`, `CMND`, `Email`, `DiaChi`) VALUES
('kh001', 'Nguyễn Văn Linh', '2002-01-13', b'0', '0399645778', '021354231555', 'linhnguyen@gmail.com', 'Hà Nam'),
('kh002', 'Phạm Hồng Nhung', '2001-02-22', b'0', '0335642877', '023456278524', 'hongnhung@gmail.com', 'Hà Nội'),
('kh003', 'Nguyễn Nghĩa Ninh', '2001-05-14', b'1', '0335422544', '031215467525', 'ninhnguyen@gmail.com', 'Hải Phòng'),
('kh004', 'Bùi Đức Dũng', '2003-07-25', b'1', '0934562578', '045321562802', 'ducbui@gmail.com', 'Yên Bái'),
('kh005', 'Vũ Đình Công', '2002-09-21', b'1', '0946257853', '023105482002', 'congdinh@gmail.com', 'Nam Định');

-- --------------------------------------------------------

--
-- Table structure for table `kho`
--

CREATE TABLE `kho` (
  `MaSP` varchar(15) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kho`
--

INSERT INTO `kho` (`MaSP`, `SoLuong`) VALUES
('sp001', 5504),
('sp002', 8613),
('sp003', 632),
('sp004', 1039),
('sp005', 8425);

-- --------------------------------------------------------

--
-- Table structure for table `loaiphong`
--

CREATE TABLE `loaiphong` (
  `LoaiPhong` varchar(15) NOT NULL,
  `MoTaPhong` varchar(500) DEFAULT NULL,
  `GiaPhong` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaiphong`
--

INSERT INTO `loaiphong` (`LoaiPhong`, `MoTaPhong`, `GiaPhong`) VALUES
('Deluxe', 'Phòng trung cấp 2: Phòng đẹp, rộng 5*15m, có cửa sổ,giường đôi, view đẹp nhìn ra biển', 500000),
('Standard', 'Phòng bình dân: Phòng bình thường, rộng 10*4m, có cửa sổ, view đẹp giường đôi', 300000),
('Superior', 'Phòng thường: Phòng bình thường, rộng 8*4m, có cửa sổ, giường đơn', 200000),
('VIP', 'Phòng cao cấp: Phòng đẹp, rộng 10*4m, có cửa sổ, view đẹp nhìn ra biển', 600000),
('VIP2', 'Phòng thượng lưu: Phòng đẹp, rộng 10*4m, có cửa sổ, view đẹp nhìn ra biển', 900000);

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaSP` varchar(15) NOT NULL,
  `TenSP` varchar(255) DEFAULT NULL,
  `MoTaSP` varchar(255) DEFAULT NULL,
  `GiaSP` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaSP`, `TenSP`, `MoTaSP`, `GiaSP`) VALUES
('sp001', 'Đồ ăn nhẹ', 'Đồ ăn lành mạnh giúp bạn giảm cân hiệu quả.', 300000),
('sp002', 'Rượu vang', 'Rượu vang là một loại thức uống có cồn được lên men từ nho', 500000),
('sp003', 'Đồ dùng sinh hoạt', 'Thiết kế sang, tiện lợi', 200000),
('sp004', 'Nước hoa', 'Mùi hương thơm quyến rũ khiến bạn không thể nào quên', 3000000),
('sp005', 'Nước ngọt', 'Đủ mọi loại combo nước chỉ vs 20k x1', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` varchar(15) NOT NULL,
  `TenNCC` varchar(100) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `SoDT` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNCC`, `TenNCC`, `DiaChi`, `SoDT`) VALUES
('nc001', 'Công ty Hành Tinh Xanh', 'Tầng 4, Tòa Nhà Hàn Việt, 203 Minh Khai, Hai Bà Trưng, Hà Nội', '0945898289'),
('nc002', 'Công ty TNHH sản xuất và thương mại Mạnh Quang', 'Đường Nguyễn Chính, Quận Hoàng Mai, Hà Nội', '02462768552'),
('nc003', 'CÔNG TY TNHH TM & DV AN THÀNH HƯNG', 'Tổ 7 cụm 1, P. Trung Hòa, Q. Cầu Giấy, Tp Hà Nội', '0335311818'),
('nc004', 'Thiết bị khách sạn Vietsupply', 'A22-BT6 khu đô thị Nam Từ Liêm Hà Nội', '0947611111'),
('nc005', 'CÔNG TY TNHH STAR SOLUTIONS', 'Tầng 4, Công ty 29 - Bộ Quốc Phòng, 73 Nguyễn Trãi, Thanh Xuân, Hà Nội', '0868816522');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(15) NOT NULL,
  `MaBoPhan` varchar(15) DEFAULT NULL,
  `TenNV` varchar(50) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` bit(1) DEFAULT NULL,
  `SDT` varchar(15) DEFAULT NULL,
  `CMND` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `MaBoPhan`, `TenNV`, `NgaySinh`, `GioiTinh`, `SDT`, `CMND`, `Email`, `DiaChi`) VALUES
('nv001', 'bp001', 'Nguyễn Thùy An', '1996-02-08', b'1', '0278327892', '826182372927', 'Thuyan82@gmail.com', 'Thanh Xuân-Hà Nội'),
('nv002', 'bp001', 'Bùi Thị Duyên', '1996-05-02', b'1', '0836273842', '236473829', 'BuiTDuyen@gmail.com', 'Thanh Xuân-Hà Nội'),
('nv003', 'bp003', 'Đào Văn Mạnh', '1992-02-28', b'1', '0312728314', '362375829288', 'DaoVanManh@gmail.com', 'Đan Phượng-Hà Nội'),
('nv004', 'bp006', 'Phạm Hùng Mạnh', '1990-05-01', b'1', '0659238591', '947283746819', 'HungManh01@gmail.com', 'Hà Đông-Hà Nội'),
('nv005', 'bp003', 'Đặng Thục Linh', '1999-08-04', b'1', '0237823953', '482947528104', 'DangLinh@gmail.com', 'Vĩnh Phúc'),
('nv006', 'bp004', 'Đặng Thu Hiền', '1999-02-06', b'1', '0271293121', '838723428399', 'ThuHien821@gmail.com', 'Lào Cai'),
('nv007', 'bp005', 'Phạm Thanh Tùng', '1994-03-30', b'1', '0923789328', '462392347294', 'ThanhTung@gmail.com', 'Hà Giang'),
('nv008', 'bp005', 'Nguyễn Minh Sơn', '1995-04-21', b'1', '0718263221', '917423462792', 'MinhSonSL@gmail.com', 'Sơn La'),
('nv010', 'bp002', 'Nguyễn Văn Chiến', '2000-01-09', b'1', '0293871236', '492347192373', 'VanChien@gmail.com', 'Điện Biên'),
('nv011', 'bp003', 'Phạm Thu Hà', '2000-01-16', b'1', '0812361282', '283742387412', 'ThuHa@gmail.com', 'Hà Nội'),
('nv012', 'bp002', 'Phạm Bảo Duy', '1989-02-06', b'1', '0923642322', '929374283232', 'BaoDuy@gmail.com', 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `nhapkho`
--

CREATE TABLE `nhapkho` (
  `MaNhapKho` varchar(15) NOT NULL,
  `MaNCC` varchar(15) DEFAULT NULL,
  `NgayNhap` datetime DEFAULT NULL,
  `MaNV` varchar(15) DEFAULT NULL,
  `ChietKhau` int(11) DEFAULT NULL,
  `ThanhTien` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhapkho`
--

INSERT INTO `nhapkho` (`MaNhapKho`, `MaNCC`, `NgayNhap`, `MaNV`, `ChietKhau`, `ThanhTien`) VALUES
('nk001', 'nc001', '2021-05-12 03:00:00', 'nv001', 5, 0),
('nk002', 'nc002', '1998-09-25 20:29:00', 'nv003', 2, 0),
('nk003', 'nc003', '2020-09-22 12:45:00', 'nv001', 10, 0),
('nk004', 'nc003', '2021-02-28 21:30:00', 'nv004', 5, 0),
('nk005', 'nc002', '2021-04-11 15:12:00', 'nv001', 6, 0),
('nk007', 'nc001', '2021-11-01 11:58:15', 'Nv001', 0, 2222),
('nk008', 'nc005', '2021-11-01 11:58:45', 'Nv001', 20, 2222),
('nk009', 'nc001', '2021-11-01 12:18:32', 'Nv001', 0, 23213),
('nk050', 'nc001', '2021-11-01 15:22:04', 'Nv001', 6, 222222),
('nk212', 'nc004', '2021-11-01 16:44:07', 'Nv001', 6, 2312320),
('nk3377', 'nc001', '2021-11-01 17:06:42', 'Nv001', 20, 1640000),
('xxxxx', 'nc001', '2021-11-01 16:47:05', 'Nv001', 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `MaPhong` varchar(15) NOT NULL,
  `TenPhong` varchar(50) DEFAULT NULL,
  `LoaiPhong` varchar(15) DEFAULT NULL,
  `SoNguoiToiDa` int(11) DEFAULT NULL,
  `TinhTrangPhong` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`MaPhong`, `TenPhong`, `LoaiPhong`, `SoNguoiToiDa`, `TinhTrangPhong`) VALUES
('ph001', '6001', 'VIP', 4, 'Đã đặt'),
('ph002', '4002', 'Superior ', 4, 'Trống'),
('ph003', '4003', 'Deluxe', 4, 'Trống'),
('ph004', '4005', 'VIP2', 6, 'Trống'),
('ph005', '4004', 'Superior', 2, 'Trống'),
('ph006', '4008', 'Deluxe', 2, 'Trống'),
('ph007', '6008', 'VIP2', 2, 'Trống'),
('ph008', '8008', 'Superior', 2, 'Trống'),
('ph009', '7009', 'Deluxe', 2, 'Trống'),
('ph010', '5689', 'Standard', 2, 'Trống'),
('ph011', '7982', 'Superior', 2, 'Trống'),
('ph012', '7983', 'Superior', 2, 'Đang thuê'),
('ph013', '7985', 'VIP2', 6, 'Đang thuê');

-- --------------------------------------------------------

--
-- Table structure for table `phuthu`
--

CREATE TABLE `phuthu` (
  `MaPhuThu` varchar(15) NOT NULL,
  `MaKH` varchar(15) DEFAULT NULL,
  `MaSP` varchar(15) DEFAULT NULL,
  `SoLuongPhuthu` int(11) DEFAULT NULL,
  `NgayBan` date DEFAULT NULL,
  `ThanhTien` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phuthu`
--

INSERT INTO `phuthu` (`MaPhuThu`, `MaKH`, `MaSP`, `SoLuongPhuthu`, `NgayBan`, `ThanhTien`) VALUES
('pt001', 'kh001', 'sp001', 5, '2017-01-15', 0),
('pt002', 'kh001', 'sp002', 2, '2018-03-01', 0),
('pt003', 'kh003', 'sp002', 3, '2017-08-03', 0),
('pt004', 'kh002', 'sp003', 4, '2019-01-09', 0),
('pt005', 'kh004', 'sp004', 1, '2020-02-20', 0),
('pt006', 'kh002', 'sp001', 5, '2021-03-25', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`MaBoPhan`);

--
-- Indexes for table `dangnhap`
--
ALTER TABLE `dangnhap`
  ADD PRIMARY KEY (`TaiKhoan`);

--
-- Indexes for table `datdichvu`
--
ALTER TABLE `datdichvu`
  ADD PRIMARY KEY (`MaHDDV`);

--
-- Indexes for table `datphong`
--
ALTER TABLE `datphong`
  ADD PRIMARY KEY (`ID_DatPhong`);

--
-- Indexes for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`MaDV`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD UNIQUE KEY `CMND` (`CMND`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`MaSP`);

--
-- Indexes for table `loaiphong`
--
ALTER TABLE `loaiphong`
  ADD PRIMARY KEY (`LoaiPhong`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNCC`),
  ADD UNIQUE KEY `SoDT` (`SoDT`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD UNIQUE KEY `CMND` (`CMND`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `nhapkho`
--
ALTER TABLE `nhapkho`
  ADD PRIMARY KEY (`MaNhapKho`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`);

--
-- Indexes for table `phuthu`
--
ALTER TABLE `phuthu`
  ADD PRIMARY KEY (`MaPhuThu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
