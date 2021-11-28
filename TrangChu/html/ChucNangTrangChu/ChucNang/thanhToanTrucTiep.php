<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./themify-icons.css">
    <link rel="stylesheet" href="./Css/thanhToanOnline.css">
    <title>Document</title>
</head>
<body>
    <?php 
        
        $MHD=$_GET['MaHD'];
        $TongTien="";

         include './connect.php';
        $query="Select * from hoadon where Mahoadon='".$MHD."'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)>0)
        {
            while ($row=mysqli_fetch_assoc($result)) {
               $TongTien=$row["ThanhTien"];
            }
        }
        $GiaFm=number_format($TongTien);

    ?>
    <form action="">
    <div class="header">

    </div>
    <div class="content">
        <div class="content__title">
            <a href="" class="back"> <i class="ti-home"></i>  Quay lại trang chủ</a>
            <h1>Thanh toán trực tiếp</h1>
        </div>
        <div class="content__bill">
            <div class="content__bill__title">
                <h1><i class="ti-receipt"></i> Hóa đơn</h1>
            </div>
            <div class="content__bill__list">
            <?php 

                            include './connect.php';
                            $query2="Select * from hoadon,chitiethoadon where hoadon.mahoadon=chitiethoadon.mahoadon and chitiethoadon.Mahoadon='".$MHD."'";
                            $result2=mysqli_query($conn,$query2);
                            if(mysqli_num_rows($result2)>0)
                            {
                            while ($row2=mysqli_fetch_assoc($result2)) {
                                if (strpos($row2['MaSp'],'PK') !==false) {

                                    $query3="Select * from chitietphukien where Maphukien='".$row2['MaSp']."' ";
                                    $result3=mysqli_query($conn,$query3);
                                    if(mysqli_num_rows($result3)>0)    
                                        {
                                            while ($row3=mysqli_fetch_assoc($result3)) {

                                                $TenSP=$row3["Tenphukien"];
                                                $Anh=$row3["Hinhanh"];
                                                $Gia=$row3["Gia"];
                                                $GiaBan=number_format($Gia);
                                                $SoLuong=$row2["SoLuong"];
                                                echo"  <div class='content__bill__item'>";
                                                echo"  <div class='content__bill__item__box'>";
                                                echo"     <div class='bill__item__img'>";
                                                echo"          <img src='http://localhost/DAC/QuangAnhStore/Admin/PhuKien/Image/". $Anh."'  class='bill__img'>";
                                                echo"      </div>";
                                                echo"      <div class='bill__item__text'>";
                                                echo"          <h3 class='item__name'>".$TenSP."</h3>";
                                                echo"          <h3 class='item__cost'>Giá bán : ".$GiaBan." đ</h3>";
                                                echo"          <h3 class='item__num'>Số lượng : ".$SoLuong."</h3>";
                                                echo"      </div>";
                                                echo"  </div>";
                                                echo"</div>";
                                            }
                                        }       
                                }
                                else 
                                {
                                    $query3="Select * from sanpham where MaSP='".$row2['MaSp']."' ";
                                    $result3=mysqli_query($conn,$query3);
                                    if(mysqli_num_rows($result3)>0)    
                                        {
                                            while ($row3=mysqli_fetch_assoc($result3)) {

                                                $TenSP=$row3["TenSP"];
                                                $Anh=$row3["HinhAnh"];
                                                $Gia=$row3["Gia"];
                                                $GiaBan=number_format($Gia);
                                                $SoLuong=$row2["SoLuong"];
                                                echo"  <div class='content__bill__item'>";
                                                echo"  <div class='content__bill__item__box'>";
                                                echo"     <div class='bill__item__img'>";
                                                echo"          <img src='http://localhost/DAC/QuangAnhStore/Admin/PhuKien/Image/". $Anh."'  class='bill__img'>";
                                                echo"      </div>";
                                                echo"      <div class='bill__item__text'>";
                                                echo"          <h3 class='item__name'>".$TenSP."</h3>";
                                                echo"          <h3 class='item__cost'>Giá bán : ".$GiaBan." đ</h3>";
                                                echo"          <h3 class='item__num'>Số lượng : ".$SoLuong."</h3>";
                                                echo"      </div>";
                                                echo"  </div>";
                                                echo"</div>";
                                            }
                                        }       
                                }
                            }
                            }

                            ?>
    
            </div>
            <div class="billID">
                <div class="billID__title">
                    - Mã hóa đơn :
                </div>
                <div class="billID__text">
                   <?php echo $MHD?>
                </div>
            </div>
            <div class="totalcost">
                <div class="totalcost__title">
                    - Tổng tiền :
                </div>
                <div class="totalcost__text">
                <?php echo $GiaFm?> đ
                </div>
            </div>
        </div>
        <div class="mess__box">

       
        <div class="mess">
            <div class="mess__title">
                <div class="mess--close">
                <i class="ti-close"></i>
                </div>
                
                <i class="ti-package"></i> Đơn hàng của bạn đang được xử lý
            </div>
            <div class="mess__text">
                Chúng tôi sẽ tiến hành kiểm tra đơn hàng của bạn và nhân viên cửa hàng sẽ gọi điện trực tiếp cho bạn để xác minh đơn hàng,
                ngay sau khi hoàn tất chúng tôi sẽ làm việc với đơn vị vận chuyển để gửi sản phẩm đến tay bạn một cách nhanh nhất. Bạn cũng có thể xem thông tin trạng 
                thái đơn hàng của bạn trong phần tra cứu đơn hàng.
            </div>
            <div class="mess__thanks">
                <i class="ti-face-smile"></i> Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi.
            </div>
        </div>
        <?php 
           echo" <script>
            var close=document.querySelector('.mess--close');
            var messbox=document.querySelector('.mess__box');
            
                close.onclick=function()
                {
                    messbox.style.display='none';
                }
            
            </script>;";
            ?>
        </div>
    <div class="footer">

    </div>
    </form>
</body>
</html>