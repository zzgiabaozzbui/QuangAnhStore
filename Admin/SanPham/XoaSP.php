<?php
require_once "../Shared_Element/DB.php";
    $resultCheck="";
    $maSP= $_GET["MaSP"];
    $queryDelete= "Delete from sanpham where MaSP='".$maSP."'";
    $queryCheck="select * from chitietsanpham where Masanpham='".$maSP."'";
    $resultCheck=selectItem($queryCheck);
    if($resultCheck!=null)
    {
        $queryDeleteChiTiet= "Delete from chitietsanpham where Masanpham='".$maSP."'";
        $resultChiTiet=ChangeDataNoTitle($queryDeleteChiTiet,"xóa");   
    }
    $result=ChangeData($queryDelete,"xóa");
?>