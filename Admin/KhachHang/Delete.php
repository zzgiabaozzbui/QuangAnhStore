<?php
    session_start();
    if(!isset($_SESSION["us"]))
    {
        echo "<script type='text/javascript'>";
        echo "alert('Bạn chưa đăng nhập!');";
        echo "window.location.href='http://localhost:8080/QuangAnhStore/Login/Index.php';";
        echo "</script>";
    }

?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete customer</title>
</head>
<body>
<?php
            $ID = $_GET['ID'];
            //Step1
            $conn = mysqli_connect("localhost","root","",DATABASE);
            if($conn == true){
                //step2
                $query = "Delete FROM khachhang where MaKH = ".$ID."";
                //Step3
                $result = mysqli_query($conn,$query);
                if($result>0){
                    echo "<script type='text/javascript'>";
                    echo "alert('Xóa khách hàng thành công!!');";
                    echo "window.location.href='Index.php';";
                    echo "</script>";
                    
                }
                else{
                    echo "Data is empty";
                }
            }
            else{
                echo "Connect error:" . mysqli_connect_error();
            }
            if($tb!=""){
                echo "<script type='text/javascript'>";
                echo "alert('".$tit."');";
                echo "window.location.href='Index.php';";
                echo "</script>";
            }
        ?>
</body>
</html>