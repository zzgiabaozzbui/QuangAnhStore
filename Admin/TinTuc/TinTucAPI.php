<?php
 $per_page = $_POST["per_page"];
 $index = $_POST["index"];
 $page = ($index - 1 )*$per_page;
 
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "qldt", 3306);
$qury = "SELECT t.MaTinTuc,t.HinhAnh,t.TieuDe,t.NgayDangTin,t.TomTat FROM tbltintuc t LIMIT ". $per_page ." OFFSET ". $page."";

$stmt = $conn->prepare($qury);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);
?>