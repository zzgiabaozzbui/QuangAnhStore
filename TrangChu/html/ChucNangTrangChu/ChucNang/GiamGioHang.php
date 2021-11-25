<?php

    $account=$_GET['TenTaiKhoan'];
    $Masp=$_GET['MaSP'];
    $Gia=$_GET['Gia'];
    include './Connect.php';
    $query="Update giohang set SoLuong=SoLuong-1,ThanhTien=ThanhTien-'".$Gia."' where Tentaikhoan='".$account."' and MaSp='".$Masp."'";  
	$result=mysqli_query($conn,$query);
    echo "<script type='text/javascript'>  window.location.href='gioHang.php';</script>";

?>