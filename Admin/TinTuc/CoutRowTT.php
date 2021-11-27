<?php
 $per_page = $_POST["per_page"];
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "qldt", 3306);
$stmt = $conn->prepare("SELECT Count(*) as Dem FROM tbltintuc t ");
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);
$pages = $outp[0]["Dem"]%$per_page==0?$outp[0]["Dem"]/$per_page:floor($outp[0]["Dem"]/$per_page)+1;
echo json_encode($pages);

?>