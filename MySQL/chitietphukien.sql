-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 09:04 AM
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
-- Database: `btl_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietphukien`
--

CREATE TABLE `chitietphukien` (
  `Tenphukien` varchar(255) NOT NULL,
  `Maphukien` varchar(50) NOT NULL,
  `Mota` longtext NOT NULL,
  `Baohanh` varchar(100) NOT NULL,
  `Tinhtrang` varchar(50) NOT NULL,
  `Trangthai` varchar(50) NOT NULL,
  `Hinhanh` varchar(255) NOT NULL,
  `Gia` float DEFAULT NULL,
  `HangSanXuat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietphukien`
--

INSERT INTO `chitietphukien` (`Tenphukien`, `Maphukien`, `Mota`, `Baohanh`, `Tinhtrang`, `Trangthai`, `Hinhanh`, `Gia`, `HangSanXuat`) VALUES
('Tai nghe Bluetooth Apple AirPods 2 VN/A', 'PK001', 'Tai nghe Apple AirPods 2 – Thiết kế tối giản, chất lượng âm thanh tuyệt vời.\r\nVừa qua, Apple đã chính thức cho ra mắt chiếc tai nghe Airpods 2. Thế hệ thứ 2 lần này không có nhiều sự khác biệt so với thế hệ đầu về ngoại hình, trừ một số chi tiết về đèn báo hiệu cũng như ra mắt thêm phiên bản sạc không dây và sạc thường (sạc có dây). Ngoài ra, bạn có thể tham khảo thêm Apple Airpods Pro, sắp được ra mắt trong thời gian tới.', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày', 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 'Hết hàng', 'airpods-2_6.jpg', 3450000, 'Apple Chính hãng'),
('Tai nghe Bluetooth Apple AirPods Pro VN/A', 'PK002', 'Airpods Pro – Tai nghe bluetooth với chất âm rõ cùng khả năng chống nước IPX4\r\nMẫu AirPods xuất hiện lần đầu vào năm 2016, sau nhiều nâng cấp về thiết kế vào cấu hình, mẫu tai nghe bluetooth chính hãng ngày càng được hoàn thiện. Mới đây, Apple đã công bố mẫu tai nghe AirPods mới nhất – tai nghe bluetooth Apple Airpods Pro – với thiết kế mới cùng nhiều tính năng mới.', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX.', 'Mới 100% , chính hãng Apple Việt Nam.', 'Còn hàng', 'airpods-pro_5.jpg', 5450000, 'Apple Chính hãng'),
('Củ sạc nhanh Mophie 20w PD Type C', 'PK003', 'Củ sạc Mophie 20w PD Type C – Tiết kiệm thời gian sạc tối đa\r\nMophie là thương hiệu có độ tin cậy cao chuyên sản xuất các phụ kiện dành cho điện thoại di động. Củ sạc nhanh Mophie 20w PD Type-C hoàn toàn tương thích với để sạc nhanh tối đa với những chiếc điện thoại thông minh. Ngoài khả năng sạc nhanh, Mophie còn có hệ thống nào tân tiến.', 'Bảo hành 1 đổi 1 24 tháng bao gồm cả lỗi đứt, gãy.', 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất.', 'Còn hàng', 'cu-sac-nhanh-mophie-20w-pd-type-c_1_1.jpg\r\n', 250000, 'Mophie'),
('Sạc nhanh Anker Powerport III Nano 20W A2633', 'PK004', 'Sạc Anker PowerPort III Nano PD 20W A2633 - Công nghệ sạc nhanh với công xuất 20W mạnh mẽ\r\nBạn là người thường xuyên sử dụng các thiết bị điện tử cả ngày dài. Vấn đề mà bạn đang gặp phải là tình trạng hay hết pin nhưng khi sạc thời gian rất lâu. Vì vậy hàng sản xuất Anker đã cho ra đời sản phẩm sạc Anker PowerPort III Nano PD 20W A2633 phù hợp nhu cầu của bạn.', 'Bảo hành 18 tháng chính hãng.', 'Mới', 'Còn hàng', 'cu-sac-nhanh-anker-powerport-iii-nano-20w-pd-a2633_1.jpg\r\n', 285000, 'Anker'),
('Tai nghe Bluetooth Samsung Galaxy Buds Live', 'PK005', 'Samsung Galaxy Buds Live thiết kế hạt đậu vừa tai cùng khả năng khử tiếng ồn\r\nViệc sử dụng tai nghe từ lâu đã trở thành một thói quen của nhiều người bởi sự tiện lợi mà thiết bị này mang lại. Nhưng ngày nay, người dùng đòi hỏi ngày càng cao hơn đối với một chiếc tai nghe không chỉ ở thiết kế mà cả sự cải thiện về tính năng. Đáp ứng điều đó, Samsung đã cho ra mắt Samsung Galaxy Buds Live giúp trải nghiệm sử dụng tai nghe của người dùng trở nên tuyệt vời hơn.', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX. ', 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất.', 'Còn hàng', 'buds-live_1.jpg', 1690000, 'Samsung Chính hãng'),
('Tai nghe Bluetooth Samsung Galaxy Buds Pro', 'PK006', 'Tai nghe Samsung Galaxy Buds Pro - Thiết kế tinh tế cùng chất âm đột phá\r\nTai nghe True Wireless Samsung Galaxy Buds Pro là dòng sản phẩm tai nghe không dây thế hệ mới nhất từ Samsung. Với phiên bản lần này được lột xác hoàn toàn về thiết kế cũng như chất âm xứng đáng là lựa chọn hàng đầu cho người dùng đang mong muốn tìm cho mình một chiếc tai nghe không dây cao cấp để đồng hành cùng mình trong công việc và giải trí.', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX.', 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 'Còn hàng', 'buds-pro_1.jpg', 2990000, 'Samsung Chính hãng'),
('Apple Watch Series 7 41mm (GPS) Viền nhôm dây cao su | Chính hãng VN/A', 'PK007', 'Ra mắt cùng thời diểm ra mắt iPhone 2021, đồng hồ thông minh Apple Watch Series 7 có nhiều thay đổi về thiết kế so với các dòng Apple Watch trước đó. Cụ thể so với Series 6, thế hệ Series 7 này có sự thay đổi về kích thước với phiên bản màn hình lớn nhất gọi tên Apple Series 7 41mm 4g. Bên cạnh đó, Apple Watch Seri 7 41mm là phiên bản màn hình nhỏ nhất, nhỉnh hơn một chút so với phiên bản 40mm thế hệ trước, rất thích hợp với người dùng cổ tay nhỏ.', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX. ', 'Mới, đầy đủ phụ kiện từ nhà sản xuất.', 'Còn hàng', 'series_7-thumb_2.jpg', 11990000, 'Apple Chính hãng'),
('Apple Watch Series 3 42mm (GPS) viền nhôm dây cao su | chính hãng VN/A', 'PK008', 'Apple Watch Series 3 42mm GPS viền nhôm dây cao su - Dây đeo êm ái cho cảm giác sang trọng trên tay\r\nLà món phụ kiện cao cấp không thể thiếu của các tín đồ công nghệ, Apple Watch Series 3 42mm GPS viền nhôm dây cao su trang bị đầy đủ cảm biến đo sức khỏe hữu ích, thiết kế sang trọng với viền nhôm & dây đeo cao su êm ái sẽ mang đến trải nghiệm tốt nhất khi đeo trên tay.', 'Bảo hành chính hãng 12 tháng, 1 ĐỔI 1 trong 30 ngày đầu.', 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 'Còn hàng', 'watch-3-42mm.jpg', 5400000, 'Apple Chính hãng'),
('Loa Bluetooth JBL Charge 4', 'PK009', 'Loa JBL Charge 4 – Chống nước IPX7, âm thanh sống động\r\nLoa JBL Charge 4 là chiếc loa bluetooth thế hệ thứ tư thuộc dòng JBL Charge. Bạn sẽ có một bữa tiệc BBQ ngoài trời, hồ bơi hay bãi biển, ngập tràn âm thanh sống động, thỏa sức chơi đùa cùng với bạn bè.', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX.', 'Mới, đầy đủ phụ kiện từ nhà sản xuất.', 'Còn hàng', 'jbl-charge-4.jpg', 2590000, 'JBL'),
('Loa Bluetooth JBL PartyBox 310', 'PK010', 'Loa JBL PartyBox 310 - Loa bluetooth âm thanh ấn tượng, đèn LED nhiều màu\r\nJBL PartyBox 310 là một sản phẩm đến từ thương hiệu JBL chất lượng với chất âm mạnh mẽ, hiệu ứng ánh sáng độc đáo. JBL PartyBox 310 hứa hẹn mang đến cho người dùng trải nghiệm âm thanh tuyệt vời.', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX.', 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất', 'Còn hàng', 'jbl-partybox-310.jpg', 15900000, 'JBL'),
('Tai nghe không dây Samsung Galaxy Buds 2', 'PK011', 'Tai nghe Samsung Galaxy Buds2 –  Màu đầy cá tính và tính năng chống tiếng ồn vượt trội\r\nTiếp nối sự thành công đến từ chiếc tai nghe Samsung Galaxy Buds thì có lẽ việc Samsung bắt tay vào thực hiện sản phẩm tiếp theo là điều gần như được chắc chắn. Trên thị trường hiện nay thì các loại tai nghe không dây không hề thiếu, tuy nhiên để đảm bảo về mặt chất lượng của sản phẩm cũng như thương hiệu đáng tin cậy thì tai nghe bluetooth không dây Samsung Galaxy Buds 2 sẽ là một sự lựa chọn hoàn hảo.', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX.', 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất', 'Còn hàng', 'template_tai_nghe_galaxy_buds_2.jpg', 2990000, 'Samsung Chính hãng'),
('Sạc nhanh Samsung 1 cổng USB-C 25W', 'PK012', 'Củ sạc nhanh Samsung 25W USB-C 1 cổng - Phụ kiện thiết yếu cho người dùng Samsung\r\nCủ sạc của Samsung luôn được biết đến với chất lượng tốt cùng tốc độ sạc nhanh chóng. Nếu bạn đang cần một củ sạc mới cho điện thoại Samsung hoặc bất kỳ thiết bị smartphone nào, hãy mua ngay sản phẩm củ sạc Samsung 25W 1 cổng.', 'Bảo hành 1 ĐỔI 1 12 tháng tại trung tâm bảo hành chính hãng. ', 'Mới, đầy đủ phụ kiện từ nhà sản xuất', 'Còn hàng', 'cu-sac-nhanh-samsung-25w-1-cong-type-c_2.jpg', 420000, 'Samsung Chính hãng'),
('Tai nghe không dây chống ồn Sony WF-1000XM3', 'PK013', 'Sony WF-1000XM3 - Tai nghe sở hữu công nghệ không dây đích thực\r\nVới công nghệ không dây bluetooth và thiết kế tiện dụng vừa vặn mang lại sự thoải mái cả ngày dài, tai nghe chống ồn Sony WF-1000XM3 cho bạn sự tự do đích thực của công nghệ không dây.', 'Bảo hành 12 tháng chính hãng 1 đổi 1 trong 15 ngày nếu có lỗi phần cứng từ NSX.', 'Mới, đầy đủ phụ kiện từ nhà sản xuất.', 'Còn hàng', 'wf1000xm3_1_2.jpg', 3290000, 'Sony'),
('Pin sạc dự phòng Xiaomi Redmi 20000mah sạc nhanh 18W', 'PK014', 'Pin dự phòng Xiaomi Redmi 20000mAh – Phụ kiện pin sạc an toàn, hiệu suất cao\r\nXiaomi là thương hiệu vốn nổi tiếng với nhiều người tiêu dùng không chỉ bởi những chiếc điện thoại chất lượng, cấu hình cao giá rẻ mà còn những phụ kiện pin dự phòng cũng được nhiều người tin dùng. Dung lượng 20000mAh, cùng với khả năng sạc nhanh 18W thì pin sạc dự phòng Xiaomi Redmi 20000mAh sạc nhanh 18W là một lựa chọn hợp lý và hấp dẫn.', 'Bảo hành 1 ĐỔI 1 chính hãng 6 tháng.', 'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất', 'Còn hàng', 'pin-sac-du-phong-xiaomi-redmi-20000mah-sac-nhanh-18w-ts.jpg', 450000, 'Xiaomi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietphukien`
--
ALTER TABLE `chitietphukien`
  ADD PRIMARY KEY (`Maphukien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
