<?php
function erro($erro)
{
    echo "<script type='text/javascript'>";
    echo " var mess = document.getElementById('failed').style.display ='flex';";
    echo " var messe = document.getElementById('messerror').innerHTML='$erro';  ";
    echo "</script>";
}

function login()
{
    $us = $_POST['txtus'];
    $ps = $_POST['txtps'];

    $conn = mysqli_connect('localhost', 'root', '', 'qldt');

    if ($conn) {
        $query = "select * from quantri where TenDangNhap='" . $us . "'";
        // echo ".$query.";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            if ($conn) {
                $query = "select * from quantri where TenDangNhap='" . $us . "' and MatKhau='" . $ps . "'";
                // echo ".$query.";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    echo "<script>";
                    echo "alert('Bạn đã đăng nhập thành công');";
                    echo "window.location.href='http://localhost/QuangAnhStore/Admin/Home/Index.php';";
                    echo  "</script>";
                } else {
                    erro("Mật khẩu không đúng");
                    // echo "<script>";
                    // echo "alert('Bạn đã đăng nhập thất bại');";
                    // echo  "</script>";
                }
            } else {
                erro("Tài khoản hoặc mật khẩu không đúng");
                // echo "Ket noi that bai" . mysqli_connect_error();
            }
        } else {
            erro("Tài khoản không tồn tại");
            // echo "<script>";
            // echo "alert('Bạn đã đăng nhập thất bại');";
            // echo  "</script>";
        }
    } else {
        erro("Bạn đã đăng nhập thất bại");
        // echo "Ket noi that bai" . mysqli_connect_error();
    }
}
function loginkh()
{
    $us = $_POST['txtus'];
    $ps = $_POST['txtps'];

    $conn = mysqli_connect('localhost', 'root', '', 'qldt');

    if ($conn) {
        $query = "select * from quantri where TenDangNhap='" . $us . "' and MatKhau='" . $ps . "'";
        // echo ".$query.";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>";
            echo "alert('Bạn đã đăng nhập thành công');";
            echo "window.location.href='http://localhost/QuangAnhStore/TrangChu/html/TrangChuDT/trangchu.php';";
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
