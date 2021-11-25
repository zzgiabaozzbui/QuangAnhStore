<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$ID=$_GET['Maphukien'];

        include './connect.php';
        $query="Delete from chitietphukien where Maphukien = '".$ID."'";
        $query2="Delete from phukhien where Maphukien = '".$ID."'";
        $result=mysqli_query($conn,$query);
        $result2=mysqli_query($conn,$query2);
        if($result > 0 && $result2>0)
        {
        echo "<script type='text/javascript'> alert('Xóa thành công'); window.location.href='QuanLyPhuKien.php';</script>";
        }
        else
        {
            echo "<script type='text/javascript'> alert('Xóa thất bại'); window.location.href='QuanLyPhuKien.php';</script>";
        }
    
?>
</body>
</html>