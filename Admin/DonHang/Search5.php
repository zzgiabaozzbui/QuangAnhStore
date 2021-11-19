<?php
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "qldt", 3306);
if (isset($_POST["action"])){
$searchname = $_POST["searchname"];
$stmt = $conn->prepare("SELECT h.Mahoadon,h.Ten, h.SDT,h.Email,h.Luuy,h.Ngaydat,h.NgayVanChuyen,h.NgayGiaoHang,h.Thanhtoan,h.Diachi,h.ThanhTien,h.Trangthai FROM hoadon h
  where TrangThai like '%Giao hàng thành công%' and 
  ( h.Mahoadon LIKE '%$searchname%' OR h.Ten LIKE '%$searchname%' OR  h.SDT LIKE '%$searchname%' OR h.Email LIKE '%$searchname%' OR h.Diachi = '$searchname' OR h.Ngaydat LIKE '%$searchname%' OR h.NgayVanChuyen LIKE '%$searchname%' OR h.NgayGiaoHang LIKE '%$searchname%')");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
}
