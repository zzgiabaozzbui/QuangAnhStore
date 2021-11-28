<?php 
    //setcookie('tk','thangyb27',time()+60,'/');

        require_once "../TrangChuDT/Header.php";
        require_once "../Shared_Element/DB.php"
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Header -->
    <link rel="stylesheet" href="../../font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> 
     <link rel="stylesheet" href="../../css/HeaderStyle.css">
    <link rel="stylesheet" href="../css/tablet.css">
    <!-- Content-body -->
    <link rel="stylesheet" href="../../css/HangDienThoai.css?version=2">
    <!-- Footer -->
    <link rel="stylesheet" href="../../css/FooterStyle.css">
    <title>Dòng sản phẩm</title>
</head>
<body>
    <!-- Header -->

    <div id="product">
        <div class="product_swipper">
            <img src="../../img/Slide/Ads/1.webp" alt="">
            <img src="../../img/Slide/Ads/2.webp" alt="">
            <!-- <img src="../../img/Slide/Ads/1.webp" alt=""> -->
        </div>
        <div class="product_filter">
            <?php
                
                $maDong=$_GET['Madong'];
                echo' <form action="./index.php" method="get">';
                echo'<input type="hidden" name="Madong" value="'.$maDong.'" />';
                    $Gia="";
                    $Ram="";
                    $BoNho= "";
                    $KichThuoc="";
                    $TinhTrang="";
                    $SapXep="";
                if(isset($_GET['Gia'])){
                    $Gia=$_GET['Gia'];//1-3000000
                    $Ram=$_GET['Ram'];// 1GB
                    $BoNho= $_GET['BoNho'];// 1GB
                    $KichThuoc=$_GET['KichThuoc'];  //Trên 6 inch
                    $TinhTrang=$_GET['TinhTrang']; // 1 2
                    $SapXep=$_GET['SapXep'];// cao, thấp
                }
                   
            ?>          
                <h3>Chọn theo tiêu chí</h3>
                <select name="Gia" id="" class="product_filter--select product_filter--select_active ">
                    <option value="">
                        Giá cả 
                    </option>
                    <option <?= $Gia == '1-3000000' ? 'selected' : '' ?> value="1-3000000">Dưới 3 triệu</option>
                    <option <?= $Gia == '3000001-6000000' ? 'selected' : '' ?> value="3000001-6000000">3 - 6 triệu</option>
                    <option <?= $Gia == '6000001-9000000' ? 'selected' : '' ?> value="6000001-9000000">6 - 9 triệu</option>
                    <option <?= $Gia == '9000001-12000000' ? 'selected' : '' ?> value="9000001-12000000">9 - 12 triệu</option>
                    <option <?= $Gia == '12000001-100000000' ? 'selected' : '' ?> value="12000001-100000000">Trên 12 triệu</option>
                </select>
                <select name="Ram" id="" class="product_filter--select">
                    <option value="">Ram</option>
                    <option <?= $Ram == '1GB' ? 'selected' : '' ?> value="1GB">1GB</option>
                    <option <?= $Ram == '2GB' ? 'selected' : '' ?> value="2GB">2GB</option>
                    <option <?= $Ram == '3GB' ? 'selected' : '' ?> value="3GB">3GB</option>
                    <option <?= $Ram == '4GB' ? 'selected' : '' ?> value="4GB">4GB</option>
                    <option <?= $Ram == '16GB' ? 'selected' : '' ?> value="16GB">16GB</option>
                    <option <?= $Ram == '32GB' ? 'selected' : '' ?> value="32GB">32GB</option>
                    <option <?= $Ram == '64GB' ? 'selected' : '' ?> value="64GB">64GB</option>
                    <option <?= $Ram == '128GB' ? 'selected' : '' ?> value="128GB">128GB</option>
                </select>
                <select name="BoNho" id="" class="product_filter--select">
                    <option value="">Bộ nhớ trong</option>
                    <option <?= $BoNho == '1GB' ? 'selected' : '' ?> value="1GB">1GB</option>
                    <option <?= $BoNho == '2GB' ? 'selected' : '' ?> value="2GB">2GB</option>
                    <option <?= $BoNho == '3GB' ? 'selected' : '' ?> value="3GB">3GB</option>
                    <option <?= $BoNho == '4GB' ? 'selected' : '' ?> value="4GB">4GB</option>
                    <option <?= $BoNho == '16GB' ? 'selected' : '' ?> value="16GB">16GB</option>
                    <option <?= $BoNho == '32GB' ? 'selected' : '' ?> value="32GB">32GB</option>
                    <option <?= $BoNho == '64GB' ? 'selected' : '' ?> value="64GB">64GB</option>
                    <option <?= $BoNho == '128GB' ? 'selected' : '' ?> value="128GB">128GB</option>
                </select>
                <select name="KichThuoc" id="" class="product_filter--select">
                    <option <?= $KichThuoc == '' ? 'selected' : '' ?> value="">Kích thước</option>
                    <option <?= $KichThuoc == '6 inchs-' ? 'selected' : '' ?> value="6 inchs-">Trên 6 inchs</option>
                    <option <?= $KichThuoc == '-6 inchs' ? 'selected' : '' ?> value="-6 inchs">Dưới 6 inchs</option>                    
                </select>
                <select name="TinhTrang" id="" class="product_filter--select">
                    <option value="">Tình trạng</option>
                    <option <?= $TinhTrang == '1' ? 'selected' : '' ?> value="1">Sản phẩm mới</option> 
                    <option <?= $TinhTrang == '2' ? 'selected' : '' ?> value="2">Sản phẩm cũ</option>
                                     
                </select>
                <h3>Sắp xếp theo</h3>
                <select name="SapXep" id="" class="product_filter--select">
                    <option <?= $SapXep == 'GiaCao' ? 'selected' : '' ?> value="GiaCao">Giá cao</option>
                    <option <?= $SapXep == 'GiaThap' ? 'selected' : '' ?> value="GiaThap">Giá thấp</option>
                </select>
                <button type="submit" name="TimKiem">TÌM KIẾM</button>
            </form>
            
        </div>
        <div class="product-list" id="productID">
            <div class="product-row">
                <?php
                    
                    $ProductNumber=10; // số sản phẩm trong 1 trang
                    $current_page=1;
                    if(isset($_GET['page'])){
                        $current_page=$_GET['page'];
                    }
                    
                    $index=($current_page-1)*$ProductNumber;  
                    $querySelect = "select * from sanpham where madong='".$maDong."' limit ".$index.",".$ProductNumber;
                    
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
        
        <div class="pagination" id="phanTrang">
        <?php
            $queryCount="Select count(MaSp) as number from sanpham where madong='".$maDong."'";
            $resultCount=selectListItems($queryCount);
            $number=0;
            if($resultCount != null and count($resultCount)>0)
            {
                $number=$resultCount[0]['number'];
                // Bởi nó ra mảng vị trí a[0][]
            }
            $pages= ceil($number/$ProductNumber);
            // page ví dụ lấy 2.5 thì ceil giúp làm tròn lên 3
            
            if($current_page>2)
            {
                $first_page=1;
                echo '<a  href="?page='.$first_page.'&Madong='.$maDong.'">Fisrt</a>';
            }

            for($i=1;$i<=$pages;$i++){
                if($i!=$current_page){
                    if($i>$current_page-3 && $i<$current_page+3)
                    echo '<a  href="?page='.$i.'&Madong='.$maDong.'">'.$i.'</a>';
                }     
                else
                echo '<a class="active" href="?page='.$i.'&Madong='.$maDong.'">'.$i.'</a>';
            }
            if($current_page<$pages-2)
            {
                $last_page=$pages;
                echo '<a  href="?page='.$last_page.'&Madong='.$maDong.'">Last</a>';
            }
            
            ?>
          </div>
    </div>
    <?php
            if($_SERVER["REQUEST_METHOD"]=== 'GET' and isset($_GET['TimKiem']))
            {
            
                echo "<script type='text/javascript'> 
                    var main= document.getElementById('productID');
                    var phanTrang= document.getElementById('phanTrang');
                    main.innerHTML=` `;
                    phanTrang.innerHTML=` `;
                    </script>";
                    echo '<div class="product-list" id="productID">
                    <div class="product-row">';
                    
                    $ProductNumber=10; // số sản phẩm trong 1 trang
                    $current_page=1;
                    if(isset($_GET['page'])){
                        $current_page=$_GET['page'];
                    }
                    // --------------------------Xử lý chuỗi---------------------
                    $GiaDT=null;
                    $BoNhoDT="";
                    $KichThuocDT="";
                    $SapXepDT="";
                    $RamDT="";
                    $BoNhoDT="";
                    $TinhTrangDT="";
                    if($Gia!="")
                    {
                        $GiaDT=explode('-',$Gia);
                    }
                    elseif($Gia=="")
                    {
                        $GiaDT[0]="0";
                        $GiaDT[1]="100000000";
                    }
                    if($Ram!="")
                    {
                        $RamDT="and RomRam='".$Ram."'";
                    }
                    if($BoNho!="")
                    {
                        $BoNhoDT="and Bonhotrong='".$BoNho."'";
                    }
                    if($KichThuoc!=""){
                        if($KichThuoc=="6 inchs-")
                       
                            $KichThuocDT="and Kichthuoc > 6";                         
                        else                        
                            $KichThuocDT="and Kichthuoc < 6";                         
                    }
                    if($SapXep!=""){
                        if($SapXep=="GiaCao")
                            $SapXepDT=" order by Gia desc";                       
                        else                        
                            $SapXepDT=" order by Gia asc"; 
                        
                    }
                    if($TinhTrang!="")
                    {
                            $TinhTrangDT="and Tinhtrang='".$TinhTrang."'";                     
                    }
                   
                    
                    // ---------------------------Hết xử lý chuỗi-----------------
                    $index=($current_page-1)*$ProductNumber;  
                    // $querySelectTenDong="select Tendong from tbldongsanpham where Madong='".$maDong."'";
                    // $resultSelectTenDong=selectItem($querySelectTenDong);
                    // $resultSelectTenDong[0]['Tendong'];
                    $querySelect = "select * from sanpham sp INNER JOIN chitietsanpham ctsp
                     on sp.MaSP=ctsp.Masanpham WHERE sp.MaDong='".$maDong."'
                     and (Gia between ".$GiaDT[0]." and ".$GiaDT[1].") ".$RamDT." ".$BoNhoDT." ".$KichThuocDT." ".$TinhTrangDT." ".$SapXepDT." limit ".$index.",".$ProductNumber;                    
                    $resultSelect=selectListItems($querySelect);
                    foreach ($resultSelect as $product) {                        
                        // $selectCTSP="select * from chitietsanpham ctsp inner join sanpham sp 
                        // on ctsp.masanpham=sp.MaSP where ctsp.masanpham='".$product['MaSP']."' ".$RamDT." ".$BoNhoDT." ".$KichThuocDT." ".$TinhTrangDT."";                                           
                        // $info_SP=selectItem($selectCTSP);
                        if($product!=null)
                        {
                        
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
                        
                            <p>'.$product['Kichthuoc'].' inch</p>
                            <p>'.$product['RomRam'].'</p>
                            <p>'.$product['Bonhotrong'].'</p>
                        </div>
                        <div class="product-price">
                            <p>'.number_format($product['Gia']).' vnđ</p>
                            <div class="product-number_sell">                           
                                <p>Đã bán 100</p>                         
                            </div>
                        </div>
                        <div class="product-star">
                            <i class="ti-star star-color"></i>
                            <i class="ti-star star-color"></i>
                            <i class="ti-star star-color"></i>
                            <i class="ti-star"></i>
                            <i class="ti-star"></i>
                        </div>

                    </div>
                    
                </div>';
                        }
                        
                    
                    }
                    echo '</div> </div>';
                    // -------------- Phân trang có tìm kiếm------------------------
                  
                    echo '<div class="pagination" id="phanTrang">';
                    $queryCount="select count(sp.MaSP) as number FROM sanpham sp INNER JOIN chitietsanpham ctsp on sp.MaSP=ctsp.Masanpham 
                    WHERE sp.MaDong='".$maDong."' ".$RamDT." ".$BoNhoDT." ".$KichThuocDT." ".$TinhTrangDT." ".$TinhTrangDT."";
            $resultCount=selectListItems($queryCount);
            $number=0;
            $info_next="&Gia=".$Gia."&Ram=".$Ram."&BoNho=".$BoNho."&KichThuoc=".$KichThuoc."&TinhTrang=".$TinhTrang."&SapXep=".$SapXep."&TimKiem=";
            if($resultCount != null and count($resultCount)>0)
            {
                $number=$resultCount[0]['number'];
                // Bởi nó ra mảng vị trí a[0][]
            }
            $pages= ceil($number/$ProductNumber);
            // page ví dụ lấy 2.5 thì ceil giúp làm tròn lên 3
            if($current_page>2)
            {
                $first_page=1;
                echo '<a  href="?page='.$first_page.'&Madong='.$maDong.''.$info_next.'">Fisrt</a>';
            }

            for($i=1;$i<=$pages;$i++){
                if($i!=$current_page){
                    if($i>$current_page-3 && $i<$current_page+3)
                    echo '<a  href="?page='.$i.'&Madong='.$maDong.''.$info_next.'">'.$i.'</a>';
                }     
                else
                echo '<a class="active" href="?page='.$i.'&Madong='.$maDong.''.$info_next.'">'.$i.'</a>';
            }
            if($current_page<$pages-2)
            {
                $last_page=$pages;
                echo '<a  href="?page='.$last_page.'&Madong='.$maDong.''.$info_next.'">Last</a>';
            }
            echo "</div>";
            }
            
        ?>
    <!-- Footer -->
    <?php 
        require_once "../TrangChuDT/Footer.php";
    ?>
</body>
</html>