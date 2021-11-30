<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../Css/thanhToanOnline.css">
    <link rel="stylesheet" href="../../../css/HeaderStyle.css">
    <link rel="stylesheet" href="../../../css/FooterStyle.css">
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
   
    <div class="header">
    <?php require_once '../../TrangchuDT/Header.php'?>
    </div>
    <form action="">
    <div class="content">
        <div class="content__title">
            <a href="http://localhost/QuangAnhStore/TrangChu/html/TrangChuDT/trangchu.php" class="back"> <i class="ti-home"></i>  Quay lại trang chủ</a>
            <h1>Thanh toán online</h1>
        </div>
        <div class="content__bill">
            <div class="content__bill__title">
             <h1><i class="ti-receipt"></i>Đơn hàng</h1>
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
                                    echo"          <img src='http://localhost/QuangAnhStore/Admin/PhuKien/Image/". $Anh."'  class='bill__img'>";
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
                                    echo"          <img src='../../../../Admin/Phukien/". $Anh."'  class='bill__img'>";
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
                    - Mã đơn hàng :
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
        <div class="payment--online">
            <div class="payment--online__title">
                <h1>Phương thức thanh toán</h1>
            </div>
            <div class="payment--online__list">
                <div class="payment--online__content">
                    <div class="payment--online__content__text ">
                        
                            <input type="radio" name="payment" id="bank" class="rdo--payment">
                            <img src="http://localhost/QuangAnhStore/TrangChu/html/ChucNangTrangChu/Image/bank.png" alt="" class="img__icon">
                        
                        <h3>Thanh toán qua chuyển khoản ngân hàng</h3>
                    </div>
                    <div class="payment--online__content__hide bank">
                        <div class="hide__title">
                            <h3>Chuyển khoản với nội dung :ThanhToanHoaDon_Mã đơn hàng.</h3>
                        </div>
                        <div class="hide__text">
                            Số tài khoản : 0123456789 Ngân Hàng VIB chi nhánh ........ .....
                        </div>
                    </div>
                </div>

                <div class="payment--online__content">
                    <div class="payment--online__content__text ">
                        <input type="radio" name="payment" id="zalopay" class="rdo--payment">
                       <img src="http://localhost/QuangAnhStore/TrangChu/html/ChucNangTrangChu/Image/zalopay.png" alt="" class="img__icon">
                        <h3>Thanh toán qua ví điện tử ZALOPAY</h3>
                    </div>
                    <div class="payment--online__content__hide zalopay">
                        <div class="hide__title">
                            <h3>Chuyển tiền với nội dung :ThanhToanHoaDon_Mã đơn hàng.</h3>
                        </div>
                        <div class="hide__text">
                            Số điện thoại : 0123456789 
                        </div>
                    </div>
                </div>

                <div class="payment--online__content">
                    <div class="payment--online__content__text ">
                        <input type="radio" name="payment" id="shopeepay" class="rdo--payment">
                        <img src="http://localhost/QuangAnhStore/TrangChu/html/ChucNangTrangChu/Image/shopeepay.png" alt="" class="img__icon">
                        <h3>Thanh toán qua ví điện tử ShopeePay</h3>
                    </div>
                    <div class="payment--online__content__hide shopeepay">
                        <div class="hide__title">
                            <h3>Chuyển tiền với nội dung :ThanhToanHoaDon_Mã đơn hàng.</h3>
                        </div>
                        <div class="hide__text">
                            Số điện thoại : 0123456789
                        </div>
                    </div>
                </div>

                <div class="payment--online__content">
                    <div class="payment--online__content__text ">
                        <input type="radio" name="payment" id="momo" class="rdo--payment">
                       <img src="http://localhost/QuangAnhStore/TrangChu/html/ChucNangTrangChu/Image/momo.png" alt="" class="img__icon">
                        <h3>Thanh toán qua ví điện tử Momo</h3>
                    </div>
                    <div class="payment--online__content__hide momo">
                        <div class="hide__title">
                            <h3>Chuyển tiền với nội dung :ThanhToanHoaDon_Mã đơn hàng.</h3>
                        </div>
                        <div class="hide__text">
                            Số điện thoại : 0123456789
                        </div>
                    </div>
                </div>
            </div>
            <?php 
           echo" <script>
                var rdoBank=document.getElementById('bank');
                var rdoMomo=document.getElementById('momo');
                var rdoZalopay=document.getElementById('zalopay');
                var rdoShopeepay=document.getElementById('shopeepay');

               var bank=document.querySelector('.bank');
               var momo=document.querySelector('.momo');
               var zalopay=document.querySelector('.zalopay');
               var shopeepay=document.querySelector('.shopeepay');
               
              rdoBank.onchange=function(e)
              {
                  if(e.target.checked)
                  {
                    bank.style.display='block';
                    shopeepay.style.display='none';
                    zalopay.style.display='none';
                    momo.style.display='none';
                  }
                  
              }

              rdoMomo.onchange=function(e)
              {
                  if(e.target.checked)
                  {
                    momo.style.display='block';
                    bank.style.display='none';
                    shopeepay.style.display='none';
                    zalopay.style.display='none';
                  }
                  
              }

              rdoZalopay.onchange=function(e)
              {
                  if(e.target.checked)
                  {
                    zalopay.style.display='block';
                    momo.style.display='none';
                    bank.style.display='none';
                    shopeepay.style.display='none';
                  }
                  
              }

              rdoShopeepay.onchange=function(e)
              {
                  if(e.target.checked)
                  {
                    shopeepay.style.display='block';
                    zalopay.style.display='none';
                    momo.style.display='none';
                    bank.style.display='none';
                  }

              }
            </script>";
            ?>
        </div>
        <div class="btnSuccess">
            <div class="btn--success">
                <h3 class="text--success">Xác nhận thanh toán</h3>
            </div>
        </div>
        <div class="mess__box hide">
        <div class="mess ">
            <div class="mess__title">
            <div class="mess--close">
                <i class="ti-close"></i>
                </div>
                <i class="ti-package"></i> Đơn hàng của bạn đang được xử lý
            </div>
            <div class="mess__text">
                Chúng tôi sẽ tiến hành kiểm tra thông tin thanh toán của bạn, ngay sau khi xác minh bạn đã thanh toán thành công, chúng tôi sẽ
                làm việc với đơn vị vận chuyển để gửi sản phẩm đến tay bạn một cách nhanh nhất. Bạn cũng có thể xem thông tin trạng 
                thái đơn hàng của bạn trong phần tra cứu đơn hàng.
            </div>
            <div class="mess__thanks">
                <i class="ti-face-smile"></i> Cảm ơn bạn đã tin tưởng và sử dụng dịch vụ của chúng tôi.
            </div>
        </div>
        </div>
        
        <?php 
           echo" <script>
           var close=document.querySelector('.mess--close');
            var btnSuccess=document.querySelector('.btnSuccess');
            var messbox=document.querySelector('.mess__box');
            var payment=document.querySelector('.payment--online');
            btnSuccess.onclick=function()
            {
                messbox.classList.remove('hide');
                payment.style.display='none';
            }
            close.onclick=function()
                {
                    messbox.classList.add('hide');
                }
            </script>;";
            ?>
    </div>
    </form>
    <div class="footer">
    <?php require_once '../../TrangchuDT/Footer.php'?>  
    </div>
    
</body>
</html>