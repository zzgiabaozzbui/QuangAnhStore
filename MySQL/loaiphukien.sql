-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2021 lúc 02:41 PM
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
-- Cấu trúc bảng cho bảng `loaiphukien`
--

CREATE TABLE `loaiphukien` (
  `Maloai` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Tenloai` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Anhmota` varchar(200) NOT NULL,
  `MoTa` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaiphukien`
--

INSERT INTO `loaiphukien` (`Maloai`, `Tenloai`, `Anhmota`, `MoTa`) VALUES
('L01', 'Tai nghe không dây', 'th.jpg', ' Tai nghe không dây : là tai nghe kết nối với nguồn phát thông qua sóng vô tuyến không dây. Trên tai nghe không dây vẫn có thể xuất hiện dây dẫn để truyền tín hiệu từ bảng mạch tới 2 bên tai. '),
('L02', 'Tai nghe có dây', 'OIP.jpg', 'Tai nghe có dây : là tai nghe kết nối trực tiếp với nguồn phát thông qua dây và giắc cắm. '),
('L03', 'Cáp sạc', 'OIP2.jpg', 'Cáp, sạc là 2 phụ kiện giúp kết nối các thiết bị điện tử (Điện thoại, Tablet, ...) với nguồn điện mục đích sạc pin cho các thiết bị điện tử được kết nối.'),
('L04', 'Ốp lưng, bao da', 'OIP3.jpg', 'Ốp lưng, bao da là phụ kiện bảo vệ các thiết bị điện tử (Điện thoại, Tablet ,...) trước những tác nhân bên ngoài ảnh hưởng xấu đến thiết bị của bạn.'),
('L05', 'Sạc dự phòng', 'OIP4.jpg', 'Pin dự phòng là một phụ kiện được sản xuất để phục vụ đối tượng khách hàng dùng điện thoại, máy tính bảng, công dụng của nó là lưu trữ điện năng để sạc cho điện thoại, máy tính bảng ở bất cứ nơi đâu mà không cần ổ cắm điện.'),
('L06', 'Đồng hồ thông minh', 'OIP5.jpg', 'Đồng hồ thông minh là một thiết bị đeo tay có các tính năng của một chiếc đồng hồ bình thường với những tính năng: xem giờ, hẹn giờ, báo thức,... Điểm khác biệt của nó là có thêm những tính năng thông minh hiện đại như: Chăm sóc sức khỏe, đo nhịp tim, bước đi,...'),
('L07', 'Thiết bị mạng', 'OIP6.jpg', 'Thiết bị mạng là các thiết bị phục vụ cho nhu cầu sử dụng mạng của mọi người.'),
('L08', 'Kính dán cường lực', 'OIP7.jpg', 'Kính dán cường lực là phụ kiện bảo vệ các thiết bị điện tử (Điện thoại, Tablet ,...) trước những tác nhân bên ngoài ảnh hưởng xấu đến màn hình thiết bị của bạn.'),
('L09', 'Loa', 'OIP8.jpg', 'Loa là thiết bị phát âm thanh, giúp cung cấp trải nghiệm âm thanh cho người dùng trong phạm vi lớn.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loaiphukien`
--
ALTER TABLE `loaiphukien`
  ADD PRIMARY KEY (`Maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
