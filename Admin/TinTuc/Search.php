<?php
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "qldt", 3306);
$per_page = $_POST["per_page"];
$index = $_POST["index"];
$page = ($index - 1 )*$per_page;
if (isset($_POST["action"])){
$searchname = $_POST["searchname"];
$query = "SELECT t.MaTinTuc,t.HinhAnh,t.TieuDe,t.NgayDangTin,t.TomTat FROM tbltintuc t where
(   t.MaTinTuc LIKE '%$searchname%' OR t.TieuDe LIKE '%$searchname%' OR  t.NgayDangTin LIKE '%$searchname%' OR t.TomTat LIKE '%$searchname%')";
echo $query ;
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($outp);
}
