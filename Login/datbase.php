<?php
    function login(){
        $us = $_POST['txtus'];
        $ps = $_POST['txtps'];

        $conn = mysqli_connect('localhost', 'root', '', 'qldt');

        if ($conn) {
            $query = "select * from quantri where TenDangNhap='".$us."' and MatKhau='".$ps."'";
            // echo ".$query.";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result)>0) {
                echo "<script>";
                echo "alert('Bạn đã đăng nhập thành công');";
                echo "window.location.href='../Admin/Home';";
                echo  "</script>";
            } else {
                echo "<script>";
                echo "alert('Bạn đã đăng nhập thất bại');";
                echo  "</script>";
            }
        } else {
            echo "Ket noi that bai" . mysqli_connect_error();
        }
    }
?>