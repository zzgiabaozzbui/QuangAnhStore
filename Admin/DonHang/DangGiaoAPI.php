<?php

header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "qldt", 3306);
$stmt = $conn->prepare("SELECT d.MaDH,d.TenDonHang,d.MaKH,d.Masanpham,d.ThoiGianDat,d.NgayVanChuyen,d.soLuongDH,d.PhuongThucThanhToan,d.DiaChi,d.ThanhTien,d.TrangThai FROM donhang d where TrangThai like '%Đang Giao%'");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>