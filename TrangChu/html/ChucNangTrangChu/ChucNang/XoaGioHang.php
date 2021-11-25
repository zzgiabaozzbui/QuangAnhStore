<?php

    $account=$_GET['TenTaiKhoan'];
    $Masp=$_GET['MaSP'];
    include './connect.php';

    $query="Delete from giohang where Tentaikhoan='".$account."' and MaSp='".$Masp."'";  
	$result=mysqli_query($conn,$query);
    echo "<script type='text/javascript'>  window.location.href='gioHang.php';</script>";

?>