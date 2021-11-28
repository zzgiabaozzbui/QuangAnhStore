<?php

header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "qldt", 3306);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['ma'];
$stmt = $conn->prepare("SELECT pk.Tenphukien,c.SoLuong,pk.Gia FROM hoadon h INNER JOIN chitiethoadon c ON h.Mahoadon = c.Mahoadon
  INNER JOIN chitietphukien pk ON c.MaSP = pk.Maphukien WHERE h.Mahoadon = '". $id ."' UNION 
 SELECT s.TenSP,c.SoLuong,s.Gia FROM hoadon h INNER JOIN chitiethoadon c ON h.Mahoadon = c.Mahoadon
 INNER JOIN sanpham s ON c.MaSP = s.MaSP WHERE h.Mahoadon = '". $id ."'");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
}
?>