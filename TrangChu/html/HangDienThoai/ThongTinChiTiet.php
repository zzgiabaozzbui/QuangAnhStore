<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Header -->
    <link rel="stylesheet" href="../../font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../../font/fontawesome-free-5.15.4-desktop/svgs"> 
     -->
    <!-- Content-body -->
    <link rel="stylesheet" href="../../css/ChiTietDienThoai.css?version=1">
    <!-- Footer -->

    <title>Thông tin chi tiết</title>
    <style>
       
    </style>
</head>
<body>
    <?php
        require_once "../TrangChuDT/Header.php";
        require "../Shared_Element/DB.php";
        $maSP= $_GET['MaSP'];
        $selectSP="select sp.*,ctsp.* from sanpham sp INNER JOIN chitietsanpham ctsp on sp.MaSP=ctsp.Masanpham where sp.MaSP='".$maSP."'";
        $resultSP=selectItem($selectSP);
        // Thông tin sản phẩm
        $tenSP=$resultSP[0]['TenSP'];
        $hinhAnh=$resultSP[0]['HinhAnh'];
        $maDong=$resultSP[0]['MaDong'];
        $Gia=$resultSP[0]['Gia'];

        // Chi tiết sản phẩm
        $manHinh=$resultSP[0]['Manhinh'];
        $ram=$resultSP[0]['RomRam'];
        $boNhoTrong=$resultSP[0]['Bonhotrong'];
        $cpu=$resultSP[0]['CPU'];
        $hdh=$resultSP[0]['Hedieuhanh'];
        $kichThuoc=$resultSP[0]['Kichthuoc'];
        $trongLuong=$resultSP[0]['Trongluong'];
        $camera=$resultSP[0]['Camera'];
        $theNho=$resultSP[0]['Thenho'];
        $wifi=$resultSP[0]['Wifi'];
        $pin=$resultSP[0]['Pin'];
        $baoHanh=$resultSP[0]['BaoHanh'];
        $gps=$resultSP[0]['GPS'];
        $mang=$resultSP[0]['Mang'];
        $bluetooth=$resultSP[0]['Bluetooth'];
        $audio=$resultSP[0]['Audio'];
        $video=$resultSP[0]['Video'];
        $tinhTrang=$resultSP[0]['Tinhtrang'];
        $moTa=$resultSP[0]['Mota'];
    ?>
    <div id="product">
            <div class="product_detail">
                <div class="box-product-name">
                    <div class="product_detail-name">
                        <h3><?php echo $tenSP; ?></h3>
                    </div>
                </div>
                <div class="product_detail-container">
                    <div class="product_detail-left">
                        <div class="product_detail-img">
                        <img src="../../../Admin/Frontend/<?php echo $hinhAnh; ?>" alt="Ảnh điện thoại">
                        </div>
                    </div>
                    <div class="product_detail-center">
                            <div class="product-installment">
                                <p>Trả góp 0%</p>
                            </div>
                            <div class="product-price">
                                <h3><?php echo number_format($Gia);?> vnđ</h3>
                            </div>
                            
                            <div class="product-promotion">
                                <div class="product-promotion-heading">
                                    <i class="ti-gift"></i>
                                    Khuyến Mãi
                                </div>
                                <div class="product-promotion-content">
                                    <ul>
                                        <li>1. Miễn phí vận chuyển</li>
                                        <li>2. Giảm giá 1% khi giao dịch trực tiếp tại cửa hàng</li>
                                        <li>3. Tặng kèm phiếu giảm giá cho lần mua hàng tiếp theo</li>
                                    </ul>
                                    
                                </div> 
                                <div class="product-promotion-footer">
                                    <i class="ti-mobile margin_left7"></i>
                                    Siêu rẻ-Siêu hot
                                </div>                      
                            </div>
                             <!-- ---------------------- -->
                             <div class="product-promotion" style="border: 0.1px solid #ccc;">
                                <div class="product-promotion-heading more-promotion-header">
                                    <i></i> Ưu Đãi Thêm
                                </div>
                                <div class="product-promotion-content more-promotion-content">
                                    <ul>
                                        <li>
                                            <i class="ti-check"></i>
                                            <p>Giảm thêm tới 1% cho thành viên QuangAnh</p>
                                        </li>
                                        <li>
                                            <i class="ti-check"></i>
                                            <p>
                                            Giảm 5% tối đa 500k khi thanh toán bằng ví Moca trên ứng dụng Grab (áp dụng đơn hàng từ 500k)
                                            </p>
                                        </li>
                                        <li>
                                            <i class="ti-check"></i>
                                            <p>
                                            Giảm 500.000đ khi thanh toán hoặc trả góp từ 5 triệu trở lên bằng thẻ tín dụng FE Credit
                                            </p>
                                        </li>
                                    </ul>
                                    
                                </div> 
                                                   
                            </div>
                            <div class="Product-btn">
                                <form action="ThongTinChiTiet.php?MaSP=<?php echo $maSP;?>" method="post">
                                <button type="submit" class="btnBuy_Cart" name="btnAdd_Cart">
                                    <i class="ti-shopping-cart-full"></i>
                                    Thêm vào giỏ hàng
                            </button>
                                </form>                         
                                
                            <button class="btnBuy_Cart" onclick="location.href='ThemVaoGioHang.php?MaSP=<?php echo $maSP; ?>'">
                                Mua ngay
                            </button>              
                            </div>
                            
                            
                    </div>
                    <div class="product_detail-right">
                            <div class="product-general">
                                <div class="product-general-header margin_10">
                                    <p>Thông tin máy</p>
                                </div>
                                <div class="product-general-content margin_10">
                                    <div class="">
                                        <i class="ti-mobile"></i>
                                        <p>Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất</p>
                                    </div>
                                    <div class="">
                                        <i class="ti-shield"></i>
                                        <p>Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple Việt Nam.
                                             1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất.
                                              Gia hạn bảo hành thời gian giãn cách</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- Mô tả sản phẩm -->

            <div class="product-des">
                
                <!-- Đặc điểm nổi bật -->
                <div class="product-des-highlight" id="show-More">
                <div class="product-des-highlight__heading">
                    <h3>Đặc điểm nổi bật</h3>
                </div>
                <div class="product-des-highlight__content">
                <?php echo $moTa ?>
                </div>
         <div onclick="ShowMore()" class="product-show_More" id="showIC" >
                Xem thêm
                <i class="ti-angle-down"></i>
         </div>                      
</div>
                <!-- Cấu hình/Thông số -->
                <div class="product-des-config">
                    <h3>Thông số kĩ thuật</h3>
                    <div class="table-config-size">
                    <table class="produc-config__table">
                    <tr>
                            <td>Kích thước màn hình</td>
                            <td><?php echo $kichThuoc; ?> inches</td>
                        </tr>
                        <tr>
                            <td>Công nghệ màn hình </td>
                            <td><?php echo $manHinh; ?></td>
                        </tr>
                        <tr>
                            <td>Trọng lượng</td>
                            <td><?php echo $trongLuong; ?></td>
                        </tr>
                        <tr>
                            <td>Camera</td>
                            <td><?php echo $camera; ?></td>
                        </tr>
                        <tr>
                            <td>Video</td>
                            <td><?php echo $video; ?></td>
                        </tr>
                        <tr>
                            <td>Audio</td>
                            <td><?php echo $audio; ?></td>
                        </tr>
                        <tr>
                            <td>Ram/Rom</td>
                            <td><?php echo $ram; ?></td>
                        </tr>   
                        <tr>
                            <td>Bộ nhớ trong</td>
                            <td><?php echo $boNhoTrong; ?></td>
                        </tr>
                        
                       
                        
                    </table>
                    </div>
                    <div onclick="OpenMoreConfig()" class="show-More__config" id="show-More__config">
                        Xem cấu hình hình chi tiết
                    <i class="ti-angle-down"></i>
                    </div>
                </div>
            </div>
            <div class="product-list" id="productID">
                <h3>Sản phẩm tương tự</h3>
            <div class="product-row">
                <?php 
                    $querySelect = "select * from sanpham where madong='".$maDong."' and maSP!='".$maSP."' ORDER BY RAND()
                    LIMIT 5";
                    $resultSelect=selectListItems($querySelect);
                    foreach ($resultSelect as $product) {
                        $selectCTSP="select * from chitietsanpham where masanpham='".$product['MaSP']."'";
                        $info_SP=selectItem($selectCTSP);
                        $selectNumberBuy="SELECT Sum(SoLuong) as 'number' FROM `chitiethoadon` where MaSp='".$product['MaSP']."' GROUP by MaSp ";
                        $countBuy=selectItem($selectNumberBuy);
                        $soLuongBan=0;
                        if($countBuy!=null)
                        {
                            $soLuongBan=$countBuy[0]['number'];
                        }
                    echo'<div class="product-col">
                    <div class="product-favourite">
                        <p>Yêu thích</p>
                    </div>
                    <div class="product_img">                        
                        <a href="ThongTinChiTiet.php?MaSP='.$product['MaSP'].'"><img src="../../../Admin/Frontend/'.$product['HinhAnh'].'" alt=""></a>  
                    </div>
                    <div class="product-info">
                        <div class="product-name">                        
                            <a href="ThongTinChiTiet.php?MaSP='.$product['MaSP'].'">
                           
                                <h4>'.$product['TenSP'].' </h4>
                            </a>
                        </div>
                        
                        <div class="product-more_info">
                        
                            <p>'.$info_SP[0]['Kichthuoc'].' inch</p>
                            <p>'.$info_SP[0]['RomRam'].'</p>
                            <p>'.$info_SP[0]['Bonhotrong'].'</p>
                        </div>
                        <div class="product-price">
                            <p>'.number_format($product['Gia']).' vnđ</p>
                            <div class="product-number_sell">                           
                                <p>Đã bán '.$soLuongBan.'</p>                         
                            </div>
                        </div>
                        <div class="product-star">
                            <i class="ti-star star-color"></i>
                            <i class="ti-star star-color"></i>
                            <i class="ti-star star-color"></i>
                            <i class="ti-star star-color"></i>
                            <i class="ti-star star-color"></i>
                        </div>

                    </div>
                    
                </div>';
                    }
                ?>                  
            </div>
        </div>
        <?php
            if($_SERVER["REQUEST_METHOD"]=== 'POST' and isset($_POST['btnAdd_Cart']))
            {
                if(!isset($_COOKIE['tk'])){
                    echo "<script>alert('Bạn chưa có tài khoản để thêm giỏ hàng')</script>";
                    return;
                }
                $tenTK="dinhthang";
                $queryInsertCart="insert into giohang values('".$tenTK."','".$maSP."',1,'".$Gia."')";
                $resuiltInsertCart=ChangeDataNoReturn($queryInsertCart,"thêm giỏ hàng");
                             
            }
        ?>
            <!-- Chi tiết cấu hình -->
            <div id="modal" class="">
            <div class="product-config-modal js_modal">
                <div class="product-config-modal_title">
                <h3>Thông số kĩ thuật</h3>
                <i class="ti-close" id="closeModal" onclick="closeModal()"></i>
                </div>
                <div class="produc-config-modal_content">
                <h3>Màn hình</h3>
                    <div class="table-More_config-size">
                    <table class="produc-config__table">
                        <tr>
                            <td>Kích thước màn hình</td>
                            <td><?php echo $kichThuoc; ?> inches</td>
                        </tr>
                        <tr>
                            <td>Công nghệ màn hình </td>
                            <td>120Hz, Super Retina XDR với ProMotion 6.1‑inch, OLED, 458 pp, HDR display, True Tone, Wide color (P3), Haptic Touch</td>
                        </tr>
                        <tr>
                            <td>Trọng lượng</td>
                            <td><?php echo $trongLuong; ?></td>
                        </tr>
                    </table>
                    </div>
                    <h3>Camera</h3>
                    <div class="table-More_config-size">
                    <table class="produc-config__table">
                        <tr>
                            <td>Camera</td>
                            <td><?php echo $camera; ?></td>
                        </tr>
                        <tr>
                            <td>Video</td>
                            <td><?php echo $video; ?></td>
                        </tr>
                        <tr>
                            <td>Audio</td>
                            <td><?php echo $audio; ?></td>
                        </tr>
        
                    </table>
                    </div>   
                    <h3>Vi xử lý</h3>
                    <div class="table-More_config-size">
                    <table class="produc-config__table">
                        <tr>
                            <td>CPU</td>
                            <td><?php echo $cpu; ?></td>
                        </tr>                              
                    </table>
                    </div>  
                    <h3>Ram và lưu trữ</h3>
                    <div class="table-More_config-size">
                    <table class="produc-config__table">
                        <tr>
                            <td>Ram</td>
                            <td><?php echo $ram; ?></td>
                        </tr>   
                        <tr>
                            <td>Bộ nhớ trong</td>
                            <td><?php echo $boNhoTrong; ?></td>
                        </tr>
                        <tr>
                            <td>Thẻ nhớ</td>
                            <td><?php echo $theNho; ?></td>
                        </tr>                            
                    </table>
                    </div> 
                    <h3>Pin</h3>
                    <div class="table-More_config-size">
                    <table class="produc-config__table">
                        <tr>
                            <td>Pin</td>
                            <td><?php echo $pin; ?></td>
                        </tr>   
                                               
                    </table>
                    </div> 
                    <h3>Giao tiếp & kết nối</h3>
                    <div class="table-More_config-size">
                    <table class="produc-config__table">
                       
                        <tr>
                            <td>Hệ điều hành</td>
                            <td><?php echo $hdh; ?></td>
                        </tr> 
                            <td>Wifi</td>
                            <td><?php echo $wifi; ?></td>
                        </tr> 
                         
                        <tr>
                            <td>GPS</td>
                            <td><?php echo $gps; ?></td>
                        </tr>
                        <tr>
                            <td>Mạng</td>
                            <td><?php echo $mang; ?></td>
                        </tr> 
                        <tr>
                            <td>Bluetooth</td>
                            <td><?php echo $bluetooth; ?></td>
                        </tr>                     
                    </table>
                    </div>
                    <h3>Tình trạng</h3>
                    <div class="table-More_config-size">
                    <table class="produc-config__table">
                        
                        <tr>
                            <td>Tình trạng</td>
                            <td><?php if($tinhTrang=='1') echo 'Sản phẩm mới'; 
                            else echo 'sản phẩm cũ'; ?></td>
                        </tr> 
                                            
                    </table>
                    </div>
                </div>
            
            </div>
            
            <!-- Kết thúc mô tả -->
            
    </div>
    <?php
        require_once "../TrangChuDT/Footer.php";
    ?>
    <script>
        const modalContainer= document.querySelector('.js_modal')
        const modal=document.querySelector('#modal');
        function ShowMore()
        {
            var show=document.getElementById('show-More');
            var showIC=document.getElementById('showIC');
            show.style.height='auto'
            showIC.style.display='none'
        }
        
        function OpenMoreConfig(){
            var showMore=document.getElementById('show-More__config')
            var modal=document.getElementById('modal');
            modal.style.display='flex'
        }
        function closeModal()
        {
            var modal=document.getElementById('modal');
            modal.style.display='none'
        }
        modalContainer.addEventListener('click',function(event){
            event.stopPropagation()
        })
        modal.addEventListener('click',closeModal)
        
    </script>
</body>
</html>