<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./Css/cssThemPhuKien.css">
       
    <title>Document</title>
</head>
<body>
<?php
   $ID=$_GET['Maphukien'];
   $Tenphukien="";
   $Trangthai="";
   $Gia="";
   $Hangsanxuat="";
   $Anhmota="";
   $Baohanh="";
   $Tinhtrang="";
   $Mota="";
   $Loai="";
             include './connect.php';
			 $query="Select * from chitietphukien,phukhien WHERE chitietphukien.Maphukien=phukhien.MaPhuKien and chitietphukien.Maphukien = '".$ID."'";
			$result=mysqli_query($conn,$query);
			if(mysqli_num_rows($result)>0)
			{
				while ($row=mysqli_fetch_assoc($result)) {
                    
						$Tenphukien=$row["Tenphukien"];
						$Trangthai=$row["Trangthai"];
						$Gia=$row["Gia"];
						$Hangsanxuat=$row["HangSanXuat"];
						$Anhmota=$row["Hinhanh"];
				        $Baohanh=$row["Baohanh"];
                        $Mota=$row["Mota"];
                        $Tinhtrang=$row["Tinhtrang"];
                        $Loai=$row["MaLoai"];
                }

			}
			else
			{
				echo "Không có dữ liệu";
			}
 ?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="main">
    <?php
                include "../Shared_Element/sideBar.php";
            ?> 
        <div class="Main-content">
        <?php
                    require_once "../Shared_Element/Name.php";
                ?> 
            <div class="newProduct">
                <div class="header">
                    <div class="header-content">
                        <label class="txt-header">Cập nhật phụ kiện</label>
                    </div>
                </div>
                <div class="body">
                     <div class="content">
                       <div class="content-left">
                       <div class="row">
                        <div class="col col-full"><input type="text" class="input " placeholder="Nhập tên phụ kiện ..." name="txtTenpk" required value="<?php echo isset($_POST['txtTenpk']) ? $_POST['txtTenpk'] : $Tenphukien ?>"> </div>
                       </div>
                        <div class="row">
                        <div class="col col-half"><input type="text" class="input " placeholder="Nhập mã phụ kiện ..." name="txtMapk" required value="<?php echo($ID) ?>" disabled=""></div>
                        <div class="col col-half col-half-right">
                        
                        <?php 
                            include './connect.php';
                            $query="Select * from loaiphukien";
                            $result=mysqli_query($conn,$query);
                            if(mysqli_num_rows($result)>0)
                            {
                            if(isset($_POST['cboLoai']))
                            {
                                $Loai=$_POST['cboLoai'];
                            }    
                            echo " <select class='input cboLoai' name='cboLoai' required>";
                            echo "<option value='' disabled selected>" . "Vui lòng chọn loại phụ kiện ..." . "</option>";
                            while ($row=mysqli_fetch_assoc($result)) {
                                echo "<option value=".$row["Maloai"]." ";
                                if($Loai==$row['Maloai'])
                                {
                                    echo ' selected="selected"';
                                }
                                
                                echo ">" . $row["Tenloai"] . "</option>";
                            }
                            echo "</select>";
                            }
                            ?>
                    
                        </div>
                        </div>
                    <div class="row">
                        <div class="col col-half"><input type="text" class="input " placeholder="Nhập trạng thái ..." name="txtTrangthai" required value="<?php echo isset($_POST['txtTrangthai']) ? $_POST['txtTrangthai'] : $Trangthai ?>"></div>
                        <div class="col col-half col-half-right"><input type="text" class="input " placeholder="Nhập giá phụ kiện ..." name="txtGia" required value="<?php echo isset($_POST['txtGia']) ? $_POST['txtGia'] : $Gia ?>"> </div>
                        
                    </div>
                    <div class="row">
                       
                        <div class="col col-full"><input type="text" class="input " placeholder="Nhập nhà sản xuất ..." name="txtNSX" required value="<?php echo isset($_POST['txtNSX']) ? $_POST['txtNSX'] : $Hangsanxuat ?>"></div>
                       
                    </div>
                    <div class="row">
                        <div class="col col-full"><input type="text" class="input " placeholder="Nhập tình trạng phụ kiện ..." name="txtTinhtrang" value="<?php echo isset($_POST['txtTinhtrang']) ? $_POST['txtTinhtrang'] : $Tinhtrang ?>"></div>
                    </div>
                    <div class="row">
                        <div class="col col-full"><input type="text" class="input " placeholder="Thêm thông tin bảo hành ..." name="txtBaohanh" required value="<?php echo isset($_POST['txtBaohanh']) ? $_POST['txtBaohanh'] : $Baohanh ?>"></div>
                    </div>
                    <div class="row">
                   
                            <div class="col col-full rowGetFile">  
                            <div class="infoText">Cập nhật mô tả cho phụ kiện ...</div> 
                            <div class="iconupfile">
                            <i class="ti-cloud-up icon--upfile"></i>
                            </div>
                            <input type="file" name="image" id="" class="input  inputfile" placeholder="Chọn ảnh" accept=".jpg, .jpeg, .png">
                            </div>
                    </div>
                        
                </div>
                <div class="content-right">
                    <textarea name="txtMota" id="" cols="40" rows="22" class=" input " placeholder="Thêm mô tả cho phụ kiện ..." required><?php echo isset($_POST['txtMota']) ? $_POST['txtMota'] : $Mota ?></textarea>
                    
                    <div class="nav">
                       <div class="save">
                            <button class="btn-Save" name="btnSave"><i class="ti-save icon--save"></i></button>
                         </div>
                         
                            <div class="back">
                                
                                <a href="QuanLyPhuKien.php" class="link-back"><i class="ti-home icon--back"></i></a>
                                
                            </div>
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
    $Gia=$_POST['txtGia'];
    if(is_numeric($Gia)==true)
    {
        include './connect.php';
		$ID=$_GET['Maphukien'];
        $Tenphukien=$_POST['txtTenpk'];
        $Trangthai=$_POST['txtTrangthai'];
        $Hangsanxuat=$_POST['txtNSX'];
        $Baohanh=$_POST['txtBaohanh'];
        $Tinhtrang=$_POST['txtTinhtrang'];
        $Mota=$_POST['txtMota'];
        $Loai=$_POST['cboLoai'];
            if(isset($_FILES['image']) && $_FILES['image']['name']!="")
            {
            $file=$_FILES['image'];
            $fileName=$file['name'];
        
            
    
       
            move_uploaded_file($file['tmp_name'],"../Image/".$fileName);
        
			    $query="Update chitietphukien set Tenphukien='".$Tenphukien."',Mota='".$Mota."',Baohanh='".$Baohanh."',Tinhtrang='".$Tinhtrang."',Trangthai='".$Trangthai."',Hinhanh='".$fileName."',Gia='".$Gia."',HangSanXuat='".$Hangsanxuat."' where Maphukien='".$ID."'";
            }
            else
            {
                $query="Update chitietphukien set Tenphukien='".$Tenphukien."',Mota='".$Mota."',Baohanh='".$Baohanh."',Tinhtrang='".$Tinhtrang."',Trangthai='".$Trangthai."',Gia='".$Gia."',HangSanXuat='".$Hangsanxuat."' where Maphukien='".$ID."'";   
            }
            $query2="Update phukhien set MaLoai='".$Loai."'where Maphukien='".$ID."'";  
			$result=mysqli_query($conn,$query);
            $result2=mysqli_query($conn,$query2);
			if($result==true && $result2==true)
			{
                
                echo "<script type='text/javascript'> alert('Thành công !!');</script>";
                
			}
			else
			{
                echo "<script type='text/javascript'> alert('Thất bại!!');</script>";
			}
    }
    else
    {
                echo "<script type='text/javascript'> alert('Sai định dạng giá!!');</script>";
    }       
	
		
   }

 ?>
    

    
</body>
</html>