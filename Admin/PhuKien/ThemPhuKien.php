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
                        <label class="txt-header">Thêm một phụ kiện mới</label>
                    </div>
                </div>
                <div class="body">
                     <div class="content">
                       <div class="content-left">
                       <div class="row">
                        <div class="col col-full"><input type="text" class="input " placeholder="Nhập tên phụ kiện ..." name="txtTenpk" required></div>
                       </div>
                        <div class="row">
                        <div class="col col-half"><input type="text" class="input " placeholder="Nhập mã phụ kiện ..." name="txtMapk" required></div>
                        <div class="col col-half col-half-right">
                        
                            <?php 
                            include './connect.php';
                            $query="Select * from loaiphukien";
                            $result=mysqli_query($conn,$query);
                            if(mysqli_num_rows($result)>0)
                            {
                            echo " <select class='input' name='cboLoai' required>";
                            echo "<option value='' disabled selected>" . "Vui lòng chọn loại phụ kiện ..." . "</option>";
                            while ($row=mysqli_fetch_assoc($result)) {
                            echo "<option value=".$row["Maloai"].">" . $row["Tenloai"] . "</option>";
                            }
                            echo "</select>";
                            }
                            ?>
                    
                        </div>
                        </div>
                    <div class="row">
                        <div class="col col-half"><input type="text" class="input " placeholder="Nhập trạng thái ..." name="txtTrangthai" required></div>
                        <div class="col col-half col-half-right"><input type="text" class="input " placeholder="Nhập giá phụ kiện ..." name="txtGia" required></div>
                        
                    </div>
                    <div class="row">
                       
                        <div class="col col-full"><input type="text" class="input " placeholder="Nhập nhà sản xuất ..." name="txtNSX" required></div>
                       
                    </div>
                    <div class="row">
                        <div class="col col-full"><input type="text" class="input " placeholder="Nhập tình trạng phụ kiện ..." name="txtTinhtrang" required></div>
                    </div>
                    <div class="row">
                        <div class="col col-full"><input type="text" class="input " placeholder="Thêm thông tin bảo hành ..." name="txtBaohanh" required></div>
                    </div>
                    <div class="row">
                   
                            <div class="col col-full rowGetFile">  
                            <div class="infoText">Thêm ảnh mô tả cho phụ kiện ...</div> 
                            <div class="iconupfile">
                            <i class="ti-cloud-up icon--upfile"></i>
                            </div>
                            <input type="file" name="image" id="" class="input  inputfile" placeholder="Chọn ảnh" required accept=".jpg, .jpeg, .png">
                            </div>
                    </div>
                        
                </div>
                <div class="content-right">
                    <textarea name="txtMota" id="" cols="40" rows="22" class=" input " placeholder="Thêm mô tả cho phụ kiện ..." required></textarea>
                    
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
                checkID();
            }
            function add()
            {
                $TenPK=$_POST['txtTenpk'];
                $MaPK=$_POST['txtMapk'];
                $Loai=$_POST['cboLoai'];
                $Trangthai=$_POST['txtTrangthai'];
                $Gia=$_POST['txtGia'];
                $NSX=$_POST['txtNSX'];
                $Tinhtrang=$_POST['txtTinhtrang'];
                $Baohanh=$_POST['txtBaohanh'];
                $Mota=$_POST['txtMota'];
                
                if(is_numeric($Gia)==true)
                {
                    
                    
                    if(isset($_FILES['image']) && $_FILES['image']['name']!="")
                    {
                    $file=$_FILES['image'];
                    $fileName=$file['name'];
                
                   
                    move_uploaded_file($file['tmp_name'],"../Image/".$fileName);
                    }
                    include './connect.php';
                    $query1="Insert into chitietphukien values('".$TenPK."','".$MaPK."','".$Mota."','".$Baohanh."','".$Tinhtrang."','".$Trangthai."','".$fileName."','".$Gia."','".$NSX."')";
                    $query2="Insert into phukhien values('".$MaPK."','".$Loai."')";
                    
                    $result1=mysqli_query($conn,$query1);
                    $result2=mysqli_query($conn,$query2);
			        if($result1==true && $result2==true)
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
                    echo "<script type='text/javascript'> alert('Sai định dạng giá !!');</script>";
                }

            }
            function checkID()
	        {
               
                $ID=$_POST['txtMapk'];
		        if($ID!=null)
		        {
                include './connect.php';
			    $query="Select * from chitietphukien where Maphukien = '".$ID."'";
                
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