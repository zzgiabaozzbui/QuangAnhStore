<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/traCuuDonHang.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <div class="header"></div>
    <div class="content">
        <div class="content__search">
            <div class="content__search__title">
                <h3 class="title__text">KIỂM TRA THÔNG TIN ĐƠN HÀNG & TÌNH TRẠNG VẬN CHUYỂN</h3>
            </div>
            <div class="content__search__body">
                <div class="search__item">
                    <label for="" class="labelInput__type">Số điện thoại :</label>
                    <input type="text" class="search__input" name="txtPhone">
                </div>
                <div class="search__item">
                    <label for="" class="labelInput__type">Mã hóa đơn :</label>
                    <input type="text" class="search__input" name='txtID'>
                </div>
                <div class="search__item">
                    <button class="btn__search" name="btnSearch">KIỂM TRA</button>
                </div>
            </div>
        </div>
        <div class="mess">
            <div class="mess__content">
                <div class="div__mess__img">
                    <img src="../Image/sad.png" alt="" class="mess__img">
                </div>
                <div class="mess__text">
                   Chưa tìm thấy đơn hàng!
                </div>
            </div>
        </div>
        <div class="list__bill ">
        <?php 
            if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['btnSearch']))
            {
                global $Phone;
                global $ID;
                $Phone = isset($_POST['txtPhone']) ? $_POST['txtPhone'] : '';
                $ID = isset($_POST['txtID']) ? $_POST['txtID'] : '';

                if($Phone=='' && $ID=='')
                {
                    echo "<script type='text/javascript'> alert('Hãy điền 1 trong 2 thông tin tìm kiếm !!');</script>";
                }
                else
                {
                    search();
                }
            }
            function search()
            {
                include './connect.php';
                $query="Select * from hoadon where Mahoadon='".$GLOBALS['ID']."' or SDT='".$GLOBALS['Phone']."'";
                $result=mysqli_query($conn,$query);
                if(mysqli_num_rows($result)>0)
                {
                    echo" <script>
                    var messbox=document.querySelector('.mess');
            
                         messbox.classList.add('hide')
            
                    </script>";
                    while ($row=mysqli_fetch_assoc($result)) {
                        $datetime=new DateTime($row['Ngaydat']);
                        $Time=$datetime->format('d/m/Y H:i:s');
                        
                        echo" <div class='bill__element'>";
                        echo" <div class='bill__ID'>";
                        echo"  <h3 class='ID'>Mã hóa đơn : ".$row['Mahoadon']."</h3>";
                        echo" </div>";
                        echo"<div class='bill__info'>";
                        echo"    <h4>Tên khách hàng : ".$row['Ten']."</h4>";
                        echo"</div>";
                        echo"<div class='bill__info'>";
                        echo"   <h4>Số điện thoại đặt hàng : ".$row['SDT']."</h4> ";
                        echo"</div>";
                        echo"<div class='bill__info'>";
                        
                        echo"    <h4>Thời gian đặt hàng : ".$Time."</h4>";
                        echo"</div>";
                        echo"<div class='bill__info'>";
                        echo"    <h4>Phương thức thanh toán : ".$row['Thanhtoan']."</h4>";
                        echo"</div>";
                        echo"<div class='bill__info'>";

                        echo"<h4>Tình trạng đơn hàng : ".$row['Trangthai']."</h4>";
                        echo"</div>";
                        if($row['Trangthai']=='Đang Giao')
                        {
                            echo"<div class='bill__info'>";
                            $datevc=date_create($row['NgayVanChuyen']);
                            $vcfm=date_format($datevc,"d/m/Y");
                            echo"<h4>Ngày vận chuyển : ".$vcfm."</h4>";
                            echo"</div>";    
                        }
                        else if($row['Trangthai']=='Giao hàng thành công')
                        {
                            echo"<div class='bill__info'>";
                            $dategh=date_create($row['NgayGiaoHang']);
                            $ghfm=date_format($dategh,"d/m/Y");
                            echo"<h4>Ngày giao hàng : ".$ghfm."</h4>";
                            echo"</div>";    
                        }
                        
                        echo"<div class='bill__info'>";
                        echo"    <h4>Địa chỉ nhận hàng : ".$row['Diachi']."</h4>";
                        echo"</div>";
                        echo"<div class='bill_list__title'>";
                        echo"    <h3>Danh sách sản phẩm</h3>";
                        echo"</div>";
                        echo"<div class='bill__list__content'>";
                        
                        
                        
                        
                        
                        $query2="Select * from chitiethoadon where Mahoadon ='".$row['Mahoadon']."'";
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

                                                echo"    <div class='bill__item'>";
                                                echo"       <div class='bill__item__info'>";
                                                echo"           <div class='div__item__img'>";
                                                echo"               <img src='http://localhost/DAC/QuangAnhStore/Admin/PhuKien/Image/". $row3['Hinhanh']."' class='item__img'>";
                                                echo"           </div>";
                                                echo"           <div class='item__amount'>";
                                                echo"     ".$row2['SoLuong']." x";
                                                echo"           </div>";
                                                echo"            <div class='item__name'>";
                                                echo"    ".$row3['Tenphukien']."";
                                                echo"            </div>";
                                                echo"          </div>";
                                                echo"        <div class='item__cost'>";
                                                $Giasp=number_format($row3['Gia']);
                                                echo"          ".$Giasp." đ";    
                                                echo"        </div>";
                                                echo"    </div>";
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

                                                echo"    <div class='bill__item'>";
                                                echo"       <div class='bill__item__info'>";
                                                echo"           <div class='div__item__img'>";
                                                echo"               <img src='../Image/". $row3['HinhAnh']."' class='item__img'>";
                                                echo"           </div>";
                                                echo"           <div class='item__amount'>";
                                                echo"     ".$row2['SoLuong']." x";
                                                echo"           </div>";
                                                echo"            <div class='item__name'>";
                                                echo"    ".$row3['TenSP']."";
                                                echo"            </div>";
                                                echo"          </div>";
                                                echo"        <div class='item__cost'>";
                                                $Giasp=number_format($row3['Gia']);
                                                echo"          ".$Giasp." đ";    
                                                echo"        </div>";
                                                echo"    </div>";
                                            }

                                        }
                                }
                            }
                        
                        }
                    
                            echo"<div class='bill__total'>";
                            echo"    <div class='bill__total__title'>";
                            echo"            - Tổng tiền :";
                            echo"    </div>";
                            echo"    <div class='bill__total__text'>";
                            $GiaFm=number_format($row['ThanhTien']);
                            echo"          ".$GiaFm." đ";
                            echo"    </div>";
                            echo"</div>";
                            echo"</div>";
                            echo"</div>";
                       
                        
                    }
                }
                else
                {
                    echo" <script>
                    var messbox=document.querySelector('.mess');
            
                         messbox.classList.remove('hide')
                        
                    </script>";
                }
            }
        
            
        ?>
        
            
        </div>
    </div>
    <vid class="footer"></vid>
    </form>
</body>
</html>