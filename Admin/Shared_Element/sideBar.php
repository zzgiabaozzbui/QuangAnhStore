<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Frontend/css/sideBar.css?version=4">
    <link rel="stylesheet" href="../Frontend/font/themify-icons/themify-icons.css">
    <title>Document</title>
</head>
<body>
        <?php 
            require("DBname.php");
        ?>
        <div id="sideBar" >
            <div class="logo">   
                <b class="logo--name">
                    QuangAnhStore
                </b> 
                
            </div>      
            <div class="menu">
                <ul>
                    <a href="../Home/">
                        <li ><i class="ti-home" style="color: #2196f3;" ></i><p>Trang chủ</p></li>
                    </a>
                    <a href="../SanPham/">
                        <li><i class="ti-mobile"  style="color: black;"></i><p>Quản lý sản phẩm</p></li>
                    </a>
                    <a href="../DongSanPham/">
                        <li><i class="ti-truck"  style="color: #f44336;"></i><p>Dòng sản phẩm</p></li>
                    </a>
                    <a href="../PhuKien/">
                        <li><i class="ti-headphone" style="color: #00bcd4;"></i><p>Quản lý phụ kiện</p></li>
                    </a>
                    <a href="../PhuKien/">
                        <li><i class="ti-settings"  style="color: #9c27b0;"></i><p>Danh mục phụ kiện</p></li>
                    </a>
                    <a href="../DonHang/">
                        <li><i class="ti-write"  style="color: #f44336;"></i><p>Quản lý đơn hàng</p></li>
                    </a><a href="../TinTuc/">
                        <li><i class="ti-file"  style="color: #00bcd4;"></i><p>Quản lý tin tức</p></li>
                    </a>
                    <a href="../QuanTriHeThong/">
                        <li><i class="ti-id-badge"  style="color: #ff9800;" style="color: blue;"></i><p>Quản trị hệ thống</p></li>
                    </a>
                    
                    <a href="../QuangCao/">
                        <li><i class="ti-notepad"  style="color: #009688;"></i><p>Quản lý quảng cáo</p></li>
                    </a>
                    <a href="">
                        <li><i class="ti-share-alt"  style="color: #343a40;"></i><p>Đăng xuất</p></li>
                    </a>
                </ul>
           </div>
        </div>   
    <script>
        
    </script>
</body>
</html>