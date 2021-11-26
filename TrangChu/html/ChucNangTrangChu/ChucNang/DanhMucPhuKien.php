<?php 
        require_once "../../Header.php";
        require_once "../../Shared_Element/DB.php"
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Header -->
    <link rel="stylesheet" href="../../../font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> 
     <link rel="stylesheet" href="../../../css/HeaderStyle.css">
    <link rel="stylesheet" href="../css/tablet.css">
    <!-- Content-body -->
    <link rel="stylesheet" href="../../../css/HangDienThoai.css?version=2">
    <!-- Footer -->
    <link rel="stylesheet" href="../../../css/FooterStyle.css">
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
        <!-- <img src="../../../../Admin/Frontend/img/Featured âm thanh/1.jpg" alt=""> -->
        <div class="product_filter">
            <?php
                $maLoaiPK=$_GET['MaLoai'];
                echo' <form action="./DanhMucPhuKien.php" method="get">';
                echo'<input type="hidden" name="MaLoai" value="'.$maLoaiPK.'" />';
                    $Gia="";
                    $SapXep="";
                if(isset($_GET['Gia'])){
                    $Gia=$_GET['Gia'];//1-3000000
                   
                    $SapXep=$_GET['SapXep'];// cao, thấp
                }
                   
            ?>          
                <h3>Chọn theo tiêu chí</h3>
                <select name="Gia" id="" class="product_filter--select product_filter--select_active ">
                    <option value="">
                        Giá cả 
                    </option>
                    <option <?= $Gia == '1-500000' ? 'selected' : '' ?> value="1-500000">Dưới 500 ngàn</option>
                    <option <?= $Gia == '500001-1000000' ? 'selected' : '' ?> value="500001-1000000">500 ngàn - 1 triệu</option>
                    <option <?= $Gia == '1000001-5000000' ? 'selected' : '' ?> value="1000001-5000000">1 - 5 triệu</option>
                    <option <?= $Gia == '5000000-100000000' ? 'selected' : '' ?> value="5000000-100000000">Trên 5 triệu</option>
            
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
                    
                    $ProductNumber=1; // số sản phẩm trong 1 trang
                    $current_page=1;
                    if(isset($_GET['page'])){
                        $current_page=$_GET['page'];
                    }
                    
                    $index=($current_page-1)*$ProductNumber;  
                    $querySelect = " SELECT * FROM `phukhien` pk inner JOIN loaiphukien lpk on pk.MaLoai=lpk.Maloai
                    INNER join chitietphukien ctpk on pk.MaPhuKien=ctpk.Maphukien
                    where pk.MaLoai='".$maLoaiPK."' limit ".$index.",".$ProductNumber;
                    $resultSelect=selectListItems($querySelect);
                    foreach ($resultSelect as $product) {
                    echo'<div class="product-col">
                    <div class="product-favourite">
                        <p>Yêu thích</p>
                    </div>
                    <div class="product_img">                        
                        <a href="infoPhuKien.php?MaSp='.$product['MaPhuKien'].'"><img src="../Image/'.$product['Anhmota'].'" alt=""></a>  
                    </div>
                    <div class="product-info">
                        <div class="product-name">                        
                            <a href="infoPhuKien.php?MaSp='.$product['MaPhuKien'].'">
                           
                                <h4>'.$product['Tenphukien'].' </h4>
                            </a>
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
            $queryCount="Select count(MaPhuKien) as number from phukhien where MaLoai='".$maLoaiPK."'";
            $resultCount=selectListItems($queryCount);
            $number=0;
            if($resultCount != null and count($resultCount)>0)
            {
                $number=$resultCount[0]['number'];
                // Bởi nó ra mảng vị trí a[0][]
            }
            $pages= ceil($number/$ProductNumber);
            // page ví dụ lấy 2.5 thì ceil giúp làm tròn lên 3
            // if($number<$ProductNumber)
            // return;
            if($current_page>2)
            {
                $first_page=1;
                echo '<a  href="?page='.$first_page.'&MaLoai='.$maLoaiPK.'">Fisrt</a>';
            }

            for($i=1;$i<=$pages;$i++){
                if($i!=$current_page){
                    if($i>$current_page-3 && $i<$current_page+3)
                    echo '<a  href="?page='.$i.'&MaLoai='.$maLoaiPK.'">'.$i.'</a>';
                }     
                else
                echo '<a class="active" href="?page='.$i.'&MaLoai='.$maLoaiPK.'">'.$i.'</a>';
            }
            if($current_page<$pages-2)
            {
                $last_page=$pages;
                echo '<a  href="?page='.$last_page.'&MaLoai='.$maLoaiPK.'">Last</a>';
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
                    $SapXepDT="";

                    
                    if($Gia!="")
                    {
                        $GiaDT=explode('-',$Gia);
                    }
                    elseif($Gia=="")
                    {
                        $GiaDT[0]="0";
                        $GiaDT[1]="100000000";
                    }
                    if($SapXep!=""){
                        if($SapXep=="GiaCao")
                            $SapXepDT=" order by Gia desc";                       
                        else                        
                            $SapXepDT=" order by Gia asc"; 
                        
                    }
                    
                    
                    // ---------------------------Hết xử lý chuỗi-----------------
                    $index=($current_page-1)*$ProductNumber;  
                    
                    $querySelect = "SELECT * FROM `phukhien` pk inner JOIN loaiphukien lpk on pk.MaLoai=lpk.Maloai
                    INNER join chitietphukien ctpk on pk.MaPhuKien=ctpk.Maphukien
                    where pk.MaLoai='".$maLoaiPK."'
                     and (Gia between ".$GiaDT[0]." and ".$GiaDT[1].") ".$SapXepDT." limit ".$index.",".$ProductNumber;                   
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
                        <a href="infoPhuKien.php?MaSp='.$product['MaPhuKien'].'"><img src="../Image/'.$product['Anhmota'].'" alt=""></a>  
                    </div>
                    <div class="product-info">
                        <div class="product-name">                        
                            <a href="infoPhuKien.php?MaSp='.$product['MaPhuKien'].'">
                           
                                <h4>'.$product['Tenphukien'].' </h4>
                            </a>
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
                            <i class="ti-star star-color"></i>
                            <i class="ti-star star-color"></i>
                        </div>

                    </div>
                    
                </div>';
                        }
                        
                    
                    }
                    echo '</div> </div>';
                    // -------------- Phân trang có tìm kiếm------------------------
                  
                    echo '<div class="pagination" id="phanTrang">';
                    $queryCount="SELECT count(*) as 'number' FROM `phukhien` pk inner JOIN loaiphukien lpk on pk.MaLoai=lpk.Maloai
                    INNER join chitietphukien ctpk on pk.MaPhuKien=ctpk.Maphukien
                    where pk.MaLoai='".$maLoaiPK."'";
                 
            $resultCount=selectListItems($queryCount);
            $number=0;
            $info_next="&Gia=".$Gia."&SapXep=".$SapXep."&TimKiem=";
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
                echo '<a  href="?page='.$first_page.'&MaLoai='.$maLoaiPK.''.$info_next.'">Fisrt</a>';
            }

            for($i=1;$i<=$pages;$i++){
                if($i!=$current_page){
                    if($i>$current_page-3 && $i<$current_page+3)
                    echo '<a  href="?page='.$i.'&MaLoai='.$maLoaiPK.''.$info_next.'">'.$i.'</a>';
                }     
                else
                echo '<a class="active" href="?page='.$i.'&MaLoai='.$maLoaiPK.''.$info_next.'">'.$i.'</a>';
            }
            if($current_page<$pages-2)
            {
                $last_page=$pages;
                echo '<a  href="?page='.$last_page.'&MaLoai='.$maLoaiPK.''.$info_next.'">Last</a>';
            }
            echo "</div>";
            }
            
        ?>
    <!-- Footer -->
    <?php 
        require_once "../../Footer.php";
    ?>
</body>
</html>