-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 03:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

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
-- Table structure for table `tbltintuc`
--

CREATE TABLE `tbltintuc` (
  `MaTinTuc` int(11) NOT NULL,
  `TieuDe` longtext CHARACTER SET utf8 DEFAULT NULL,
  `TomTat` longtext CHARACTER SET utf8 DEFAULT NULL,
  `NoiDung` longtext CHARACTER SET utf8 DEFAULT NULL,
  `NgayDangTin` date DEFAULT NULL,
  `TacGia` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `HinhAnh` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltintuc`
--

INSERT INTO `tbltintuc` (`MaTinTuc`, `TieuDe`, `TomTat`, `NoiDung`, `NgayDangTin`, `TacGia`, `HinhAnh`) VALUES
(115, '[Black Friday] Điểm mặt loạt deal điện thoại, laptop, đồng hồ, tai nghe, phụ kiện… giảm giá cực sốc tại Shop', 'Lâu lâu lại đến dịp khuyến mãi Black Friday và có thể nói đây là thời điểm mà người người mua hàng, nhà nhà mua hàng bởi các sản phẩm trong dịp này đều được giảm giá rất mạnh mẽ', ' 1. Xiaomi Mi Note 10\nGiảm giá 31%, từ 12.99 triệu xuống chỉ còn 8.99 triệu đồng. Máy có thiết kế hết sức ấn tượng với màn hình cong 2 bên đẹp mắt, đây là loại màn hình Super AMOLED 6.47 inch độ phân giải Full HD+, ở phía viển trên là một notch kiểu giọt nước nhỏ gọn để chứa camera selfie 32MP.\n2. Vivo V19\nGiảm giá 28% trong dịp Black Friday, hạ từ 8.99 triệu xuống chỉ còn 6.49 triệu đồng. Vivo V19 có thiết kế hiện đại với màn hình tràn viền, camera selfie kép nằm ở lỗ khoét hình viên thuốc góc trên bên phải màn hình, bộ camera này chứa 2 cảm biến 32MP + 8MP.\n3. Đồng hồ thông minh Huami Amazfit Bip\nVới mức giảm 40%, mẫu đồng hồ chính hãng này được giảm từ 2.09 triệu xuống chỉ còn 1.25 triệu đồng.\n4. Tai nghe Bluetooth Soundpeats True Capsule Smart Touch\nĐược giảm giá tới 63%, mẫu tai nghe này hạ từ 1.2 triệu xuống chỉ còn 450 ngàn đồng, quá hấp dẫn phải không nào?', '2021-11-29', 'Nguyễn Quang Bảo', '../Frontend/img/TinTuc/TT4.jpg'),
(116, 'Tổng hợp deal giảm giá NGẤT NGAY Black Friday ngày 1/12 tại QuângnhStore', 'Deal giảm giá Black Friday cực sốc ngày 28/11 tại CellphoneS', ' Tai nghe chụp tai Gaming Havit HV-H2232D:Tai nghe chụp tai Gaming Havit HV-H2232D sẽ có giá khuyến mãi là 300,000đ trong ngày 28/11 thuộc tuần lễ Black Friday tại CellphoneS.\nXiaomi Mi 11 Lite 5G\nĐiện thoại Xiaomi Mi 11 Lite 5G là sản phẩm độc quyền tại CellphoneS, sở hữu công nghệ 5G tiên tiến. Xiaomi Mi 11 Lite 5G sở hữu màn hình tràn viền lớn 6.5 inches kết hợp với camera trước đục lỗ và tần số quét màn hình lên đến 90Hz, giúp tăng diện tích hiển thị cho thiết bị cũng như đem lại hình ảnh chân thật, sắc nét và chuyển động mượt mà.', '2021-12-01', 'Phạm Đình Thắng', '../Frontend/img/TinTuc/TT1.jpg'),
(117, 'Giảm giá 30% ốp lưng dán màn hình .', 'Giảm giá 30% ốp cho các điện thoại màn mình chỉ có tại shop chúng tôi ', 'Ốp SamSung, IPhone,Xiaomi, Relemi....', '2021-11-30', 'Đinh Đức Mạnh', '../Frontend/img/TinTuc/TT2.jpg'),
(118, 'Giảm giá 50% tất cả phụ kiện', 'Giảm 50% các loại phụ kiện tai nghe ...', ' Tai nghe không dây,bluetooth...', '2021-11-29', 'Nguyễn Nghĩa Ninh', '../Frontend/img/TinTuc/TT5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbltintuc`
--
ALTER TABLE `tbltintuc`
  ADD PRIMARY KEY (`MaTinTuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbltintuc`
--
ALTER TABLE `tbltintuc`
  MODIFY `MaTinTuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
