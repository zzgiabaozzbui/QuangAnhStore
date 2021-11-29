<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Frontend/css/sideBar.css?version=4">
    <link rel="stylesheet" href="../Frontend/font/themify-icons/themify-icons.css">
    <title>Document</title>
    <style>
        .item-quantri{
            color: #72777a ;
            padding-left: 30px;
        }
        .item-quantri:hover{
            color: black;
        }
        #quantri{
            
            flex-direction: column;
            height: 80px;
            padding: 10px;
        }
    </style>
    <script>
        function open_hidden_qt()
        {        
            var menuList1= document.getElementById("quantri");
            if(menuList1.style.display == "none")
            {
                menuList1.style.display = "flex";
            }     
            else
            { 
                menuList1.style.display = "none";
                
            }
                  
        }
    </script>
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
                    <a href="http://localhost:8080/QuangAnhStore/Admin/Home/">
                        <li ><i class="ti-home" style="color: #2196f3;" ></i><p>Trang chủ</p></li>
                    </a>
                    <a href="http://localhost/QuangAnhStore/Admin/SanPham/">
                        <li><i class="ti-mobile"  style="color: black;"></i><p>Quản lý sản phẩm</p></li>
                    </a>
                    <a href="http://localhost/QuangAnhStore/Admin/DongSanPham/">
                        <li><i class="ti-truck"  style="color: #f44336;"></i><p>Dòng sản phẩm</p></li>
                    </a>
                    <a href="http://localhost/QuangAnhStore/Admin/Phukien/QuanLyPhuKien.php">
                        <li><i class="ti-headphone" style="color: #00bcd4;"></i><p>Quản lý phụ kiện</p></li>
                    </a>
                    <a href="http://localhost/QuangAnhStore/Admin/DanhmucPhukien/QuanLyDanhMucPhuKien.php">
                        <li><i class="ti-settings"  style="color: #9c27b0;"></i><p>Danh mục phụ kiện</p></li>
                    </a>
                    <a href="http://localhost:8080/QuangAnhStore/Admin/DonHang/">
                        <li><i class="ti-write"  style="color: #f44336;"></i><p>Quản lý đơn hàng</p></li>
                    </a>
                    <a href="http://localhost:8080/QuangAnhStore/Admin/TinTuc/">
                        <li><i class="ti-file"  style="color: #00bcd4;"></i><p>Quản lý tin tức</p></li>
                    </a>
                    <a  onclick="open_hidden_qt()">
                        <li ><i class="ti-id-badge"  style="color: #ff9800;" ></i><p>Quản trị hệ thống</p></li>
                        <div id="quantri" style="display: none;">
                            <a class="item-quantri"  href="http://localhost:8080/QuangAnhStore/Admin/QuanTriHeThong/Quantri/">
                            <i class="ti-user"  style="color:lightgreen; " ></i>Quản trị</a>
                            <br>
                            <a class="item-quantri"  href="http://localhost:8080/QuangAnhStore/Admin/QuanTriHeThong/KhachHang/">
                            <i class="ti-comments-smiley"  style="color: rgb(255, 20, 147);" ></i>Khách hàng</a>
                        </div>
                    </a>
                    
                    <a href="http://localhost:8080/QuangAnhStore/Admin/QuangCao/">
                        <li><i class="ti-notepad"  style="color: #009688;"></i><p>Quản lý quảng cáo</p></li>
                    </a>
                    <a href="http://localhost:8080/QuangAnhStore/Login/dangxuat.php">
                        <li><i class="ti-share-alt"  style="color: #343a40;"></i><p>Đăng xuất</p></li>
                    </a>
                </ul>
           </div>
        </div>   
        
</body>
</html>