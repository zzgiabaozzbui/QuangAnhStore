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
$ID=$_GET['Maloai'];

        include './connect.php';
        $query="Delete from loaiphukien where Maloai = '".$ID."'";
        $result=mysqli_query($conn,$query);
        if($result > 0)
        {
        echo "<script type='text/javascript'> alert('Xóa thành công'); window.location.href='QuanLyDanhMucPhuKien.php';</script>";
        }
        else
        {
        echo "<script type='text/javascript'> alert('Xóa thất bại'); window.location.href='QuanLyDanhMucPhuKien.php';</script>";
        }
    
?>
</body>
</html>