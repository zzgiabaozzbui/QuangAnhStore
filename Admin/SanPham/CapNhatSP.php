<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
.main{
        display: flex;
}
.main .container-web{
    background-color: whitesmoke;
    flex: 1; 
    position: relative;
    overflow: hidden;
}
.btnUpdate{
    background-color: #0b7dda;
    color: white;
    padding: 4px 10px;
    border-radius: 5px;
    border: none;
        }
form{
    margin-left: 20px;
    margin-top: 10px;
        }
.form-control,
form input{
    width: 90% !important;
        }
    </style>
</head>
<body>
<div class="main">
        <?php
        require_once "../Shared_Element/sideBar.php";
        require_once "../Shared_Element/DB.php";
        ?>
        <div class="container-web">
        <?php
            require_once "../Shared_Element/Name.php";
            $maSP=$_GET['MaSP'];
            $querySelectSP="select TenSP, sanpham.MaDong,Tendong , HinhAnh,Gia from sanpham,tbldongsanpham
             where sanpham.MaDong=tbldongsanpham.Madong and MaSP='".$maSP."'";
            $resultSelectSP=selectItem($querySelectSP);
            if($resultSelectSP==null)
            return;
            else{        
                    $tenSP=$resultSelectSP[0]['TenSP'];
                    $dongSanPham=$resultSelectSP[0]['MaDong'];
                    $hinhAnh=$resultSelectSP[0]['HinhAnh'];
                    $gia=$resultSelectSP[0]['Gia'];
                    $tenDong=$resultSelectSP[0]['Tendong'];

                   
            }
        ?>
          <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="usr">Tên sản phẩm</label>
            <input type="text" class="form-control" name="txtTenSP" value="<?php echo $tenSP;?>" id="">
</div>
    <div class="form-group">
            <label for="usr">Dòng sản phẩm</label>
            <select class="form-control" name="cboDSP" id="">
                            <option value="<?php echo $dongSanPham ?>">
                        <?php
                            echo $tenDong;
                        ?>
                        </option>
                        <?php
                    
                    $querySelectDSP="Select * from tbldongsanpham where Madong!='".$dongSanPham."'";
                    $resultSelectDSP=selectListItems($querySelectDSP);
                    foreach ($resultSelectDSP as $DSP) {
                        echo "<option value='".$DSP['Madong']."'>".$DSP['Tendong']."</option>";
                    }
?>                          
                   </select>
</div>
    <div class="form-group">
        <label for="usr">Hình ảnh</label>
        <input class="form-control" type="file" name="fileUpload" value="">
</div>
    <div class="form-group">
        <label for="usr">Giá</label>
        <input  value="<?php echo $gia?>" type="text" name="txtGia" class="form-control " id="">
</div>
    <button type="submit" class="btnUpdate" name="btnUpdate">Cập nhật</button>
    <a href="index.php">Quay lại</a>
          <!-- -------------------------------- -->
          </form>  
          <img src="" alt="">
            <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['btnUpdate']))
                { 
                    if(isset($_POST['txtTenSP']))
                    {
                        $tenSP=$_POST['txtTenSP'];
                        $dongSP=$_POST['cboDSP'];
                        $gia=$_POST['txtGia'];
                        $FindNameDSP= selectItem("select Tendong from tbldongsanpham where Madong='".$dongSP."'");
                        
                        if($FindNameDSP!=null){
                            $tenDong= $FindNameDSP[0]['Tendong'];
                        $linkAnh= "../Frontend/img/Featured phone/".$tenDong."/";
                            
                    //     if ($_FILES['fileUpload']['error'] > 0){
                            
                    //         echo "Upload lỗi rồi!";
                    //     }
                        
                    // else {
                        move_uploaded_file($_FILES['fileUpload']['tmp_name'], $linkAnh . $_FILES['fileUpload']['name']);
                        $link=$linkAnh . $_FILES['fileUpload']['name'];
                        echo $link. "|".$gia;
                        if($_FILES['fileUpload']['name']==null)
                        {
                            $queryUpdateSP= "Update sanpham set TenSP='".$tenSP."',MaDong='".$dongSP."',Gia='".$gia."' where MaSP=".$maSP;
                        }
                        else
                            $queryUpdateSP= "Update sanpham set TenSP='".$tenSP."',MaDong='".$dongSP."',HinhAnh='".$link."',Gia=".$gia." where MaSP=".$maSP;
                            Change_Refresh($queryUpdateSP,"cập nhật sản phẩm");
                        
                        
    // }
                        
                    }
                        }
                        
                }
            ?>
            
            
        </div>
    </div>
    <script src="../Frontend/js/Format_Number.js"></script>
</body>
</html>