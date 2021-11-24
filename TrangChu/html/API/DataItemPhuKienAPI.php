<?php

header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "qldt", 3306);
$stmt = $conn->prepare("SELECT c.Tenphukien,c.Hinhanh,c.Gia FROM  chitietphukien c");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

?>