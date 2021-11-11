<?php
//select.php  
$output = '';
$connect = mysqli_connect("localhost", "root", "", "qldt", 3306);

if ($connect == true) {
   $query = "CALL Proc_Get_DemDonHang()";
   $result = mysqli_query($connect, $query);
   $data = mysqli_fetch_assoc($result);

   echo json_encode($data);  
}
