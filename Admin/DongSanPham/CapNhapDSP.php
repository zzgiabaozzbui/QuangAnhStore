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
    <?php
        $maDong= $_GET['MaDong'];
        $queryCheck="Select * from tbldongsanpham where Madong='".$maDong."'";
        $resutlCheck= selectItem($queryCheck);
        $tenDong= $resutlCheck[0]['Tendong'];
    ?>
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
                <input type="text"  id="email" placeholder="Nhập mã dòng" name="txtMaDong" value="<?php echo $maDong; ?>" readonly>
            </td>
        </tr>
        <tr>
            <td>
                <label for="">Tên dòng</label>
            </td>
            <td>
                <input type="text" class="form-control" id="email" placeholder="Nhập tên dòng" name="txtTenDong" value="<?php echo $tenDong; ?>">               
            </td>
        </tr>
    </table>
    <button type="submit" name="btnUpdate">Cập nhật</button>
        </div>
    </form>
    <a href="./index.php">Quay lại</a>
    </div>
    <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['btnUpdate']))
        {  
            $maDong= $_POST['txtMaDong'];
            $tenDong=$_POST['txtTenDong'];
            $queryUpdate="Update tbldongsanpham set Tendong='".$tenDong."' where Madong='".$maDong."'";
            $resultUpdate= Change_Refresh($queryUpdate,'cập nhật');
              
            
        }
    ?>
    

</body>
</html>