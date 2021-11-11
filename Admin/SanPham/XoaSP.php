<?php
require_once "../Shared_Element/DB.php";
    $maSP= $_GET["MaSP"];
    $queryDelete= "Delete from sanpham where MaSP='".$maSP."'";
    $queryDeleteChiTiet= "Delete from chitietsanpham where Masanpham='".$maSP."'";
    $resultChiTiet=ChangeData($queryDeleteChiTiet,"xóa");
    $result=ChangeData($queryDelete,"xóa");
?>