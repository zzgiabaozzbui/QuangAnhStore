<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../Css/gioHang.css">
    <link rel="stylesheet" href="../../../css/HeaderStyle.css">
    <link rel="stylesheet" href="../../../css/FooterStyle.css">
    <title>Document</title>
</head>
<body>
    
    <?php 
         global $ID;
         $ID='dinhthang';
        $TenSP="";
        $Anh="";
        $Gia="";
        $SoLuong="";
        $SoSP="";
        $TongTien="";
        
          include './connect.php';
         $query2="SELECT COUNT(MaSp) as SOSP,SUM(ThanhTien) as TongTien FROM giohang WHERE Tentaikhoan='".$ID."' ORDER BY Tentaikhoan ";
         $result2=mysqli_query($conn,$query2);
         if(mysqli_num_rows($result2)>0)
         {
             while ($row2=mysqli_fetch_assoc($result2)) {
                $SoSP=$row2["SOSP"];
                $TongTien=$row2["TongTien"];
             }
         }
         $GiaFm=number_format($TongTien);
         global $Tong;
         $Tong=$TongTien;
    ?>
    <form action="" method="POST">
    <div class="header">
    <?php require_once '../../TrangchuDT/Header.php'?>
    </div>
    <div class="content">
        <div class="title">
            <a href="" class="back"> <i class="ti-home"></i>  Quay lại trang chủ</a>
            <h1>Giỏ hàng của bạn</h1>
        </div>
        <div class="cart__list">
            <?php 

            include './connect.php';
            $query="Select * from giohang where Tentaikhoan = '".$ID."'";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0)
            {
            while ($row=mysqli_fetch_assoc($result)) {
                if (strpos($row['MaSp'],'PK') !==false) {

                    $query3="Select * from chitietphukien where Maphukien='".$row['MaSp']."' ";
                    $result3=mysqli_query($conn,$query3);
                    if(mysqli_num_rows($result3)>0)    
                    {
                    while ($row3=mysqli_fetch_assoc($result3)) {

                    $MaSP=$row3["Maphukien"];
                    $TenSP=$row3["Tenphukien"];
                    $Anh=$row3["Hinhanh"];
                    $Gia=$row3["Gia"];
                    $GiaBan=number_format($Gia);
                    $SoLuong=$row["SoLuong"];

                    echo "<div class='cart__item'>";
                    echo "<div class='cart__item__content'>";
                    echo "<div class='cart__item__img'>";
                    echo" <img src='http://localhost/QuangAnhStore/Admin/Phukien/Image/". $Anh."'  class='cart__img'>";
                    echo" </div>";
                    echo" <div class='cart__item__text'>";
                    echo" <h3 class='item__name'>".$TenSP."</h3>";
                    echo" <h3 class='item__cost'>Giá bán : ".$GiaBan."đ</h3>";
                    echo" </div>";
                    echo"</div>";
                    echo" <div class='cart__item__footer'>";
                    echo"    <a href='XoaGioHang.php?TenTaiKhoan=".$ID."&MaSP=".$MaSP."' class='cart__item--delete'>Xóa khỏi giỏ</a>";
                    echo"  <div class='cart__item--selectnumber'>";
                    
                    echo"   <div class='div__update hide'> <a href='GiamGioHang.php?TenTaiKhoan=".$ID."&MaSP=".$MaSP."&Gia=".$Gia."' class='update-number'>-</a> </div>";
                    echo"       <input type='text' readonly class='select-number' value=".$SoLuong.">";
                    echo"    <div class='div__update'> <a href='TangGioHang.php?TenTaiKhoan=".$ID."&MaSP=".$MaSP."&Gia=".$Gia."' class='update-number'>+</a> </div>";           
                    echo"    </div>";
                    echo"  </div>";
                    echo"   </div>";

                    }
                    }
                } 
                else 
                {
                    $query3="Select * from sanpham where MaSP='".$row['MaSp']."' ";
                    $result3=mysqli_query($conn,$query3);
                    if(mysqli_num_rows($result3)>0)    
                    {
                    while ($row3=mysqli_fetch_assoc($result3)) {

                    $MaSP=$row3["MaSP"];
                    $TenSP=$row3["TenSP"];
                    $Anh=$row3["HinhAnh"];
                    $Gia=$row3["Gia"];
                    $GiaBan=number_format($Gia);
                    $SoLuong=$row["SoLuong"];

                    echo "<div class='cart__item'>";
                    echo "<div class='cart__item__content'>";
                    echo "<div class='cart__item__img'>";
                    echo" <img src=''". $Anh."'  class='cart__img'>";
                    echo" </div>";
                    echo" <div class='cart__item__text'>";
                    echo" <h3 class='item__name'>".$TenSP."</h3>";
                    echo" <h3 class='item__cost'>Giá bán : ".$GiaBan."đ</h3>";
                    echo" </div>";
                    echo"</div>";
                    echo" <div class='cart__item__footer'>";
                    echo"    <a href='XoaGioHang.php?TenTaiKhoan=".$ID."&MaSP=".$MaSP."' class='cart__item--delete'>Xóa khỏi giỏ</a>";
                    echo"  <div class='cart__item--selectnumber'>";
                    
                    echo"   <div class='div__update hide'> <a href='GiamGioHang.php?TenTaiKhoan=".$ID."&MaSP=".$MaSP."&Gia=".$Gia."' class='update-number'>-</a> </div>";
                    echo"       <input type='text' readonly class='select-number' value=".$SoLuong.">";
                    echo"    <div class='div__update'> <a href='TangGioHang.php?TenTaiKhoan=".$ID."&MaSP=".$MaSP."&Gia=".$Gia."' class='update-number'>+</a> </div>";           
                    echo"    </div>";
                    echo"  </div>";
                    echo"   </div>";
                    }
                }
                }   
                if($SoLuong==1)
                {
                    echo "<script type='text/javascript'> var hide=document.querySelector('.hide');
                        hide.style.display='none';
                    </script>";
                }
            }
            }
            ?>   

        </div>
        <div class="totalcost">
            <div class="totalcost__text">
                - Tổng tiền :
            </div>
            <div class="totalcost__money">
               <?php  echo $GiaFm ?> đ
            </div>
        </div>
        <div class="cus-info">
            <div class="cus-info__title">
               <h1>Thông tin mua hàng</h1>
            </div>
            <div class="cus-info__input">
                <div class="cus-info__row">
                    <p class="text__input">Họ và tên người nhận (Bắt buộc)</p>
                    <input type="text" class="input" required name='txtName'>
                </div>
                <div class="cus-info__row">
                    <p class="text__input">Số điện thoại nhận hàng (Bắt buộc)</p>
                    <input type="text" class="input" required name='txtSDT'>
                </div>
                <div class="cus-info__row">
                    <p class="text__input">Email khách hàng</p>
                    <input type="text" class="input" name='txtEmail'>
                </div>
                <div class="cus-info__row">
                    <p class="text__input">Lưu ý của khách hàng</p>
                    <input type="text" class="input" name='txtLuuy'>
                </div>
            </div>
        </div>
        <div class="receive-item">
            <div class="receive-item__title">
                <h1>Hãy chọn phương thức nhận hàng</h1>
             </div>
             <div class="receive-item__select">
                <div class="receive-item__select__content">
                    <input type="radio" name="select__content" id="LayTaiCuaHang" required value="0">
                   Lấy tại cửa hàng
                </div>
                <div class="receive-item__select__content">
                    <input type="radio" name="select__content" id="GiaoHangTanNoi" required value="1"> 
                    Giao hàng tận nơi
                </div>
             </div>
             <div class="receive-item__input">
                 <div class="receive-item__input__hide">
                    <p class="text__input">Địa chỉ nhận hàng ( Bắt buộc )</p>
                    <input type="text" class="input"  name='txtDiaChi'>
                </div>
             </div>
             <script> 
                var btn1Element=document.getElementById('LayTaiCuaHang');
                var btn2Element=document.getElementById('GiaoHangTanNoi');
                var hideElement=document.querySelector('.receive-item__input__hide');
                btn1Element.onchange=function(e)
                {
                    hideElement.style.display='none';
                }
                btn2Element.onchange=function(e)
                {
                    hideElement.style.display='block';
                }
            </script>   
        </div>
        <div class="payment__order">
            <div class="order">
                <button class="btnOrder btnpaymentorder" name="btnTTOffline">Đặt hàng thanh toán sau</button>
            </div>
            <div class="paymemnt-online">
               <div class="paymemnt-online__title">
                    Hoặc bạn có thể thanh toán ONLINE
               </div>
               <div class="paymemnt-online__content">
                <button class="btnPay btnpaymentorder" name="btnTTOnline">Thanh toán ONLINE</button>
               </div>
            </div>
        </div>
    </div>
    <div class="footer">
    <?php require_once '../../TrangchuDT/Footer.php'?>
    </div>
    </form>
    <?php 

        
        
        
        if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['btnTTOffline']))
        {  
            if($GLOBALS['Tong']==0)
            {
                echo "<script type='text/javascript'> alert('Giỏ hàng trống, hãy tiếp tục mua sắm và quay lại sau!!');</script>";
                exit('');
            }
            else
            {
                HoaDonOff();
            }
        }
        if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['btnTTOnline']))
        {       
            if($GLOBALS['Tong']==0)
            {
                echo "<script type='text/javascript'> alert('Giỏ hàng trống, hãy tiếp tục mua sắm và quay lại sau!!');</script>";
                exit('');
            }
            else
            {
                HoaDonOnl();
            }
            
        }
        function HoaDonOff()
        {  
            $TenKH=$_POST['txtName'];
            $SDT=$_POST['txtSDT'];
            $Email=$_POST['txtEmail'];
            $Luuy=$_POST['txtLuuy'];
           
            include './connect.php';
            if($_POST['select__content']==0)
            {
                $query="INSERT INTO hoadon(Ten,SDT,Email,Luuy,Thanhtoan,Thanhtien) VALUES('".$TenKH."','".$SDT."','".$Email."','".$Luuy."','Khi nhận hàng','". $GLOBALS['Tong']."')";
               
            }
            else
            {
            $DiaChi = isset($_POST['txtDiaChi']) ? $_POST['txtDiaChi'] : '';
                if($DiaChi=='')
                {
                    echo "<script type='text/javascript'> alert('Bạn chưa điền địa chỉ nhận hàng !!');</script>";exit('');
                }
                else
                {
                $query="INSERT INTO hoadon(Ten,SDT,Email,Luuy,Thanhtoan,Diachi,Thanhtien) VALUES('".$TenKH."','".$SDT."','".$Email."','".$Luuy."','Khi nhận hàng','".$DiaChi."','". $GLOBALS['Tong']."')";
                }
                
            }
            $query2 ="SELECT LAST_INSERT_ID() as ID";
            $result=mysqli_query($conn,$query);
            $result2=mysqli_query($conn,$query2);
			    if($result==true)
			    {
                        echo "<script type='text/javascript'> alert('Thành công !!');</script>";
                        if(mysqli_num_rows($result2)>0)
                        {
                            while ($row=mysqli_fetch_assoc($result2)) {
                            $MHD=$row['ID'];
                            }
                            $query3="Select * from giohang where Tentaikhoan = '".$GLOBALS['ID']."'";
                            $result3=mysqli_query($conn,$query3);
                            if(mysqli_num_rows($result3)>0)
                            {
                             while ($row=mysqli_fetch_assoc($result3)) {
                                $MaSP=$row["MaSp"];
                                $SoLuong=$row["SoLuong"];   
                                $query4="insert into chitiethoadon values('".$MHD."','".$MaSP."','".$SoLuong."') ";
                                $result4=mysqli_query($conn,$query4);
                                }
                            }
                            $query5="delete from giohang where Tentaikhoan='".$GLOBALS['ID']."' ";
                            $result5=mysqli_query($conn,$query5);
                            if($result5)
                            {
                               
                            }
                        }
                        echo"<script>window.location.replace('ThanhToanTrucTiep.php?MaHD=".$MHD."');</script>";
			    }
			    else
			    {
                        echo "<script type='text/javascript'> alert('Thất bại!!');</script>";
			    }

                    
        }
        function HoaDonOnl()
        {
            $TenKH=$_POST['txtName'];
            $SDT=$_POST['txtSDT'];
            $Email=$_POST['txtEmail'];
            $Luuy=$_POST['txtLuuy'];
            
            include './connect.php';
            if($_POST['select__content']==0)
            {
                $query="INSERT INTO hoadon(Ten,SDT,Email,Luuy,Thanhtoan,Thanhtien) VALUES('".$TenKH."','".$SDT."','".$Email."','".$Luuy."','Online','".$GLOBALS['Tong']."')";
            }
            else
            {
                $DiaChi = isset($_POST['txtDiaChi']) ? $_POST['txtDiaChi'] : '';
                if($DiaChi=='')
                {
                    echo "<script type='text/javascript'> alert('Bạn chưa điền địa chỉ nhận hàng !!');</script>";exit('');
                }
                else
                {      
                $query="INSERT INTO hoadon(Ten,SDT,Email,Luuy,Thanhtoan,Diachi,Thanhtien) VALUES('".$TenKH."','".$SDT."','".$Email."','".$Luuy."','Online','".$DiaChi."','".$GLOBALS['Tong']."')";
                }
            }
            $query2 ="SELECT LAST_INSERT_ID() as ID";
            $result=mysqli_query($conn,$query);
            $result2=mysqli_query($conn,$query2);
			    if($result==true)
			    {
                        echo "<script type='text/javascript'> alert('Thành công !!');</script>";
                        if(mysqli_num_rows($result2)>0)
                        {
                            while ($row=mysqli_fetch_assoc($result2)) {
                            $MHD=$row['ID'];
                            }
                            $query3="Select * from giohang where Tentaikhoan = '".$GLOBALS['ID']."'";
                            $result3=mysqli_query($conn,$query3);
                            if(mysqli_num_rows($result3)>0)
                            {
                             while ($row=mysqli_fetch_assoc($result3)) {
                                $MaSP=$row["MaSp"];
                                $SoLuong=$row["SoLuong"];   
                                $query4="insert into chitiethoadon values('".$MHD."','".$MaSP."','".$SoLuong."') ";
                                $result4=mysqli_query($conn,$query4);
                                }
                            }
                            $query5="delete from giohang where Tentaikhoan='".$GLOBALS['ID']."' ";
                            $result5=mysqli_query($conn,$query5);
                            if($result5)
                            {
                               
                            }
                        }
                        echo"<script>window.location.replace('ThanhToanOnline.php?MaHD=".$MHD."');</script>";
			    }
			    else
			    {
                        echo "<script type='text/javascript'> alert('Thất bại!!');</script>";
			    }
        }
    ?>
</body>
</html>