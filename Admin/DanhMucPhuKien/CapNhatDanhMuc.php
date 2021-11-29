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
    <link rel="stylesheet" href="./Css/cssCapNhatDanhMuc.css">
    <title>Document</title>
</head>
<body>
    <?php
        $ID=$_GET['Maloai'];
        $Tenloai="";
        $Anh="";
        $Mota="";
                  include './connect.php';
                  $query="Select * from loaiphukien where Maloai = '".$ID."'";
                 $result=mysqli_query($conn,$query);
                 if(mysqli_num_rows($result)>0)
                 {
                     while ($row=mysqli_fetch_assoc($result)) {
                         
                             $Tenloai=$row["Tenloai"];
                             $Anh=$row["Anhmota"];
                             $Mota=$row["MoTa"];
                     }
     
                 }
                 else
                 {
                     echo "Không có dữ liệu";
                 }
    ?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="main-content">
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
                    <label class="txt-header">Cập nhật loại phụ kiện</label>
                </div>
            </div>
            <div class="main">
                <div class="body-left">
                    <div class="row">
                        <input type="text" class="input" placeholder="Nhập mã loại phụ kiện ...." name="txtMaloai" required value="<?php echo $ID ?>" disabled>
                    </div>
                    <div class="row">
                        <input type="text" class="input" placeholder="Nhập tên loại phụ kiện ..." name="txtTenloai" required value="<?php echo isset($_POST['txtTenloai']) ? $_POST['txtTenloai'] : $Tenloai ?>">
                    </div>
                    <div class="row">
                        <textarea name="txtMota" id="" cols="2" rows="11" class=" input " placeholder="Thêm mô tả cho loại phụ kiện ..." required ><?php echo isset($_POST['txtMota']) ? $_POST['txtMota'] : $Mota ?></textarea>
                    </div>
                    <div class="row">
                        <div class="rowGetFile input">  
                            <div class="infoText">Cập nhật lại ảnh ...</div> 
                            <div class="getfile">
                            <input type="file" name="image" id="" class="input-file" placeholder="Chọn ảnh"  accept=".jpg, .jpeg, .png">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-right">
                    <div class="img">
                        <?php
                    echo "<td>" . "<img class='img-info'src='./Image/". $Anh ."' alt=''>" . "</td>";
                        ?>
                    </div>
                    <div class="nav">
                        <div class="save">
                            <button class="btn-Save" name="btnSave"><i class="ti-save icon--save"></i></button>
                        </div>
                        <div class="back">
                            <a href="QuanLyDanhMucPhuKien.php" class="link-back"><i class="ti-home icon--back"></i></a>
                        </div>
                    </div>   
                </div>    
            </div>
        </div>
    </div>
</div>
</form>
                 
<?php
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['btnSave']))
{
	edit();
}
function edit()
{
    
        include './connect.php';
		$ID=$_GET['Maloai'];
        $Tenloai=$_POST['txtTenloai'];
        $Mota=$_POST['txtMota'];
            if(isset($_FILES['image']) && $_FILES['image']['name']!="")
            {
            $file=$_FILES['image'];
            $fileName=$file['name'];
            move_uploaded_file($file['tmp_name'],"../Image/".$fileName);
        
			    $query="Update loaiphukien set Tenloai='".$Tenloai."',MoTa='".$Mota."',Anhmota='".$fileName."' where Maloai='".$ID."'";
            }
            else
            {
                $query="Update loaiphukien set Tenloai='".$Tenloai."',MoTa='".$Mota."' where Maloai='".$ID."'";  
            } 
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
	
		
   

 ?>
</body>
</html>