<?php
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "qldienthoai", 3306);
if (isset($_POST["action"])){
$searchname = $_POST["searchname"];
$stmt = $conn->prepare("SELECT d.MaDH,d.TenDonHang,d.MaKH,d.Masanpham,d.ThoiGianDat,d.soLuongDH,d.PhuongThucThanhToan,d.DiaChi,d.ThanhTien,d.TrangThai
 FROM donhang d
  where TrangThai like '%Chờ xác nhận%' and 
  ( d.MaDH LIKE '%$searchname%' OR d.TenDonHang LIKE '%$searchname%' OR d.MaKH = '$searchname' OR d.Masanpham = '$searchname' OR d.ThoiGianDat LIKE '%$searchname%')");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
}
