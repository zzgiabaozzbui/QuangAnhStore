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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./Css/cssThemDanhMuc.css">
    
    <title>Document</title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
<div class="main">
            <?php
                include "../Shared_Element/sideBar.php";
            ?>
    <div class="Content">
            <?php
                    require_once "../Shared_Element/Name.php";
            ?> 
    <div class="newCategory">
                <div class="header">
                        <div class="header-content">
                                <label class="txt-header">Thêm một loại phụ kiện mới</label>
                        </div>
                </div>
                <div class="body">
                    <div class="row">
                        <input type="text" class="input" placeholder="Nhập mã loại phụ kiện ...." name="txtMaloai" required>
                    </div>
                    <div class="row">
                        <input type="text" class="input" placeholder="Nhập tên loại phụ kiện ..." name="txtTenloai" required>
                    </div>
                    <div class="row">
                        <textarea name="txtMota" id="" cols="20" rows="7" class=" input " placeholder="Thêm mô tả cho loại phụ kiện ..." required></textarea>
                    </div>
                    <div class="row">
                        <div class="rowGetFile input">  
                            <div class="infoText">Chọn ảnh mô tả ...</div> 
                            <div class="getfile">
                            <input type="file" name="image" id="" class="input-file" placeholder="Chọn ảnh" required accept=".jpg, .jpeg, .png">
                            </div>
                        </div>
                    </div>
                        
                </div>
                <div class="footer">
                       <div class="save">
                            <button class="btn-Save" name="btnSave"><i class="ti-save icon--save"></i></button>
                        </div>
                        <div class="back">
                            <a href="QuanLyDanhMucPhuKien.php" class="link-back"><i class="ti-home icon--back"></i></a>
                        </div>
                </div>  
     </div>
</form>
<?php
            if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['btnSave']))
            {
                checkID();
            }
            function add()
            {

                $MaLoai=$_POST['txtMaloai'];
                $TenLoai=$_POST['txtTenloai'];
                $Mota=$_POST['txtMota'];
                if(isset($_FILES['image']) && $_FILES['image']['name']!="")
                {
                    $file=$_FILES['image'];
                    $fileName=$file['name'];
                    move_uploaded_file($file['tmp_name'],"./Image/".$fileName);
                }
                include './connect.php';
                $query="Insert into loaiphukien values('".$MaLoai."','".$TenLoai."','".$fileName."','".$Mota."')";
                
                $result=mysqli_query($conn,$query);
			    if($result==true)
			    {
                        echo "<script type='text/javascript'> alert('Thành công !!');</script>";
			    }
			    else
			    {
                        echo "<script type='text/javascript'> alert('Thất bại!!');</script>";
			    }
            }
            function checkID()
	        {
               
                $ID=$_POST['txtMaloai'];
		        if($ID!=null)
		        {
                include './connect.php';
			    $query="Select * from loaiphukien where Maloai = '".$ID."'";
                
			    $result=mysqli_query($conn,$query);
                echo mysqli_num_rows($result);
			    if(mysqli_num_rows($result)>0)
			    {
                    
                    echo "<script type='text/javascript'> alert('Mã đã tồn tại !!');</script>";
                    
			    }
			    else
			    {
				add();
			    }
		        }
            }
		   
		


    ?>
</body>
</html>