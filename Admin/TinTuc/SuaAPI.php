<?php
header("Content-Type: application/json; charset=UTF-8");
$ma = $_POST["ma"];
$TieuDe = $_POST["TieuDe"];
$TomTat = $_POST["TomTat"];
$NoiDung = $_POST["NoiDung"];
$NgayDang = $_POST["NgayDang"];
$TacGia = $_POST["TacGia"];
$fileUpload = $_FILES["fileUpload"];
$linkAnh = "../Frontend/img/TinTuc/";

$conn = new mysqli("localhost", "root", "", "qldt", 3306);
    move_uploaded_file($fileUpload['tmp_name'], $linkAnh . $fileUpload['name']);
    $link = $linkAnh . $fileUpload['name'];
    if ($conn) {
        $query = "UPDATE tbltintuc t SET t.TieuDe = '" . $TieuDe . "' , t.TomTat = '" . $TomTat . "' ,t.NoiDung ='" . $NoiDung . "' ,t.NgayDangTin = '" . $NgayDang . "', t.TacGia = '" . $TacGia . "',t.HinhAnh = '" . $link . "' WHERE t.MaTinTuc = " . $ma . "";
        $result = mysqli_query($conn, $query);
           echo $result;
        
    } else {
        echo "Kết nối thất bại!" . mysqli_connect_error();
    }







