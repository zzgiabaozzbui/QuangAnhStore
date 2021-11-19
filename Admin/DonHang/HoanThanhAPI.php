<?php

header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "qldt", 3306);
$stmt = $conn->prepare("SELECT h.Mahoadon,h.Ten, h.SDT,h.Email,h.Luuy,h.Ngaydat,h.NgayVanChuyen,h.NgayGiaoHang,h.Thanhtoan,h.Diachi,h.ThanhTien,h.Trangthai FROM hoadon h where TrangThai like '%Giao hàng thành công%'");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

?>