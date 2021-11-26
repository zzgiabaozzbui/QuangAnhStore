<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../Css/infoPhuKien.css">
    <title>Document</title>
</head>
<body>
    <?php
        global $ID;
        global $Gia;
        global$Trangthai;
        $ID=$_GET['MaSp'];
        $Ten='';
        $Mota='';
        $Baohanh='';
        $TinhTrang='';
        $TrangThai='';
        $Anh='';
        $Gia='';
        $NSX='';
        
        include './connect.php';
            $query="Select * from chitietphukien where Maphukien = '".$ID."'";
            $result=mysqli_query($conn,$query);
                    if(mysqli_num_rows($result)>0)    
                    {
                        while ($row=mysqli_fetch_assoc($result)) 
                        {
                            $Ten=$row['Tenphukien'];
                            $Mota=$row['Mota'];
                            $Baohanh=$row['Baohanh'];
                            $TinhTrang=$row['Tinhtrang'];
                            $TrangThai=$row['Trangthai'];
                            $Anh=$row['Hinhanh'];
                            $Gia=$row['Gia'];
                            $NSX=$row['HangSanXuat'];

                        }   
                    }
        $GiaBan=number_format($Gia);



    ?>
    <form action="" method="POST">
    <div class="main">
        <div class="header">      
                    
        </div>
        <div class="content">
            <div class="content__header">
                <div class="content__header__name">
                    <h1><?php  echo $Ten?></h1>
                    <p>(Mã phụ kiện : <?php  echo $ID?>)</p>
                </div>
            </div>
            <div class="content__body">
                <div class="content__body__box">
                    <div class="box__image">
                        <img src="http://localhost/DAC/QuangAnhStore/Admin/PhuKien/Image/<?php  echo $Anh?>" alt="" class="content__image">
                    </div>
                    <div class="box__info__buy">
                        <div class="box__info__status1">
                        <?php  echo $TrangThai?>
                        </div>
                        <div class="box__info__cost">
                        <?php  echo $GiaBan?> đ
                        </div>
                        <div class="box__info__status2__manufacturer_warranty">
                        <div class="box__info__status2 ">
                            <div class="box__info__title box__info__title__first">
                                <i class="ti-headphone"></i>  Tình trạng phụ kiện
                            </div>
                            <p class="box__info__text">
                            <?php  echo $TinhTrang?>
                            </p>
                        </div>
                        <div class="box__info__manufacturer ">
                            <div class="box__info__title">
                                <i class="ti-truck"></i>  Nhà sản xuất
                            </div>
                            <p class="box__info__text">
                                <?php  echo $NSX?>
                            </p>   
                        </div>
                        <div class="box__info__warranty ">
                            <div class="box__info__title">
                               <i class="ti-heart-broken"></i> Bảo hành
                            </div>
                            <p class="box__info__text">
                                    <?php  echo $Baohanh?>
                            </p>
                        </div>
                        </div>
                        <div class="box__buy">
                            <button class="btnBuy" name="btnBuy"><i class="ti-shopping-cart"></i> Thêm vào giỏ hàng</button>
                        </div>
                        <div class="box__buy">
                            <button class="btnBuyNow" name="btnBuyNow">Mua ngay</button>
                        </div>
                    </div>
                    <div class="box__des__gift">
                        <div class="box__des ">
                            <div class="box__des__title ">
                                <i class="ti-info-alt"></i>
                                Thông tin phụ kiện
                            </div>
                            <div class="box__des__text">
                                    <?php  echo $Mota?>
    
                            </div>
                        </div>
                        <div class="box__gift">
                            <div class="box__gift__title">
                                <i class="ti-gift"></i>
                                Ưu đãi
                            </div>
                            <div class="box__gift__text">
                                <div class="gift_text">
                                    <i class="ti-package" style="color: #FFD700;"></i>Miễn phí vận chuyển
                                </div>
                                <div class="gift_text">
                                    <i class="ti-money" style="color: #00FF00;"></i>Giảm giá 1% đối với trường hợp thanh toán trực tiếp tại cửa hàng
                                </div>
                                <div class="gift_text">
                                    <i class="ti-ticket" style="color: #FF0000;"></i>Tặng kèm phiếu giảm giá cho lần mua hàng tiếp theo
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="similar">
                <h2 class="similar__title">Sản phẩm tương tự</h2>    
                <div class="similar__list">
                
                    <?php 
                    include './connect.php';
                    $querysimilar="Select * from chitietphukien,phukhien where chitietphukien.Maphukien=phukhien.MaPhuKien and phukhien.MaLoai=(SELECT phukhien.MaLoai FROM chitietphukien,phukhien where chitietphukien.Maphukien=phukhien.MaPhuKien AND chitietphukien.Maphukien='".$GLOBALS['ID']."') and chitietphukien.Maphukien!='".$GLOBALS['ID']."' LIMIT 5";
                    $resultsimilar=mysqli_query($conn,$querysimilar);
                    if(mysqli_num_rows($resultsimilar)>0)
                    while ($rowsimilar=mysqli_fetch_assoc($resultsimilar)) {

                       echo" <div class='similar__item'>";
                       echo" <a href='infoPhukien.php?MaSp=".$rowsimilar['Maphukien']."' class='similar__item__link'>";
                       echo" <div class='similar__item__box'>";
                       echo"     <div class='similar__item__img'>";
                       echo"     <img src='http://localhost/DAC/QuangAnhStore/Admin/PhuKien/Image/".$rowsimilar['Hinhanh']."'  class='similar__img'>";
                       echo"     </div>";
                       echo"     <div class='similar__item__name'>";
                       echo $rowsimilar['Tenphukien']    ;
                       echo"     </div>";
                       echo"     <div class='similar__item__cost'>";
                       $GiaFM=number_format($rowsimilar['Gia']);
                       echo $GiaFM." đ";
                       echo"     </div>";
                       echo" </div>";
                       echo" </a>";
                       echo"</div>";

                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="footer">

        </div>
    </div>
    </form>
    
    <?php 
        if($GLOBALS['TrangThai']!=='Còn hàng')
        {
            echo "<script type='text/javascript'> var hide=document.querySelector('.btnBuy');
            var hide2=document.querySelector('.btnBuyNow');
            hide.style.display='none';
            hide2.style.display='none';
            </script>";
        }
        




        if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['btnBuy']))
        {
            addToCart();
        }
        function addToCart()
        {
            $username='manhhlunn';
            include './connect.php';
            $query="select * from giohang where Tentaikhoan='".$username."' and MaSp='".$GLOBALS['ID']."'";
            $result=mysqli_query($conn,$query);
            
            if(mysqli_num_rows($result)>0)    
            {
                
                $query2="update giohang set SoLuong=SoLuong+1,ThanhTien=ThanhTien+'".$GLOBALS['Gia']."' where Tentaikhoan='".$username."' and MaSp='".$GLOBALS['ID']."'";
            }
            else
            {
                $query2="insert into  giohang values('manhhlunn','".$GLOBALS['ID']."','1','".$GLOBALS['Gia']."')";
            }
            echo $query2;
            $result2=mysqli_query($conn,$query2);

            if($result2==true)
            {
                echo "<script type='text/javascript'> alert('Thêm giỏ hàng thành công !!');</script>";
                echo "<script type='text/javascript'>  window.location.href='gioHang.php';</script>";
            }
            else
            {
                echo "<script type='text/javascript'> alert('Thất bại !!');</script>";
            }

        }
    
    ?>
</body>
</html>