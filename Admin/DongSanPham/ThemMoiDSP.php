<?php
    session_start();
    if(!isset($_SESSION["us"]))
    {
        echo "<script type='text/javascript'>";
        echo "alert('Bạn chưa đăng nhập!');";
        echo "window.location.href='http://localhost/QuangAnhStore/Login/Index.php';";
        echo "</script>";
    }

?>
<?php
    require_once "../Shared_Element/DB.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Frontend/css/formByThang.css">
    <title>Document</title>
</head>
<body>
    <div class="container_Input">
    <form action="" method="post">
        <h3>Thêm mới dòng sản phẩm</h3>  
        <div class="inputForm">
        <table>
        <tr>
            <td>
                <label for="">Mã dòng</label>
            </td>
            <td>
                <input type="text"  id="email" placeholder="Nhập mã dòng" name="txtMaDong">
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Tên dòng</label>
            </td>
            <td>
                <input type="text" class="form-control" id="email" placeholder="Nhập tên dòng" name="txtTenDong">               
            </td>
        </tr>
    </table>
    <button type="submit" name="btnAdd">Thêm mới</button>
        </div>
    </form>
    <a href="./index.php">Quay lại</a>
    </div>
    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['btnAdd']))
        {  
            $maDong= $_POST['txtMaDong'];
            $tenDong=$_POST['txtTenDong'];
            $queryCheck="Select * from tbldongsanpham where Madong='".$maDong."'";
            $resutlCheck= selectItem($queryCheck);
            echo $queryCheck;
            if($resutlCheck!=null)
            {
                echo "<script>";
                echo "alert('Trùng mã dòng');";
                echo  "</script>";
                
            }
            
            else{
                $queryAdd= "insert into tbldongsanpham values('".$maDong."','".$tenDong."')";        
                $resutl= ChangeData($queryAdd,"Thêm mới");
            }
            
            
        }
    ?>
    

</body>
</html>