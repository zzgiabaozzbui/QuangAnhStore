<?php

header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "qldt", 3306);
$searchname = $_POST["searchname"];
$query ="SELECT s.TenSP,s.Gia,s.HinhAnh, 1 AS Type FROM sanpham s  INNER JOIN tbldongsanpham t ON s.MaDong = t.Madong WHERE s.TenSP LIKE '%$searchname%' OR t.Tendong LIKE '%$searchname%' UNION  SELECT c.Tenphukien,c.Gia,c.Hinhanh, 2 AS Type FROM  chitietphukien c WHERE c.Tenphukien LIKE '%$searchname%'";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

?>