<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/QuangAnhStore/TrangChu/css/HeaderStyle.css">
    <link rel="stylesheet" href="http://localhost/QuangAnhStore/TrangChu/font/themify-icons/themify-icons.css">


    <!-- <link rel="stylesheet" href="../css/tablet.css"> -->
    <title>Document</title>
    
</head>

<body>


    <div id="main">
        <!-- Header -->
        <div class="header__height"></div>
        <div class="header__background">
            <!-- Điện thoại -->
            <div class="smartphone__header__logo">
                <a href="">
<<<<<<< Updated upstream
                    <img src="http://localhost/QuangAnhStore/TrangChu/img/Desktop%20logo/logo_Design.png" alt="">
=======
                    <img src="../HangDienThoai/1.png" alt="">

>>>>>>> Stashed changes
                </a>
            </div>



            <div class="smartphone__header__location">


                <i class="fas ti-angle-down"></i>
            </div>
            <div class="smartphone__shopping__cart">
                <i class="ti-bag"></i>
                <p>Giỏ hàng</p>
            </div>

            <!-- End Điện thoại -->
        </div>
        <!-- Header Background Tablet -->
        <div class="tablet__modal"></div>
        <div class="tablet__header__background">
            <!-- Tablet -->
            <div class="tablet__header__top">
                <div class="tablet__header__bottom__scroll">
                    <i class="fas fa-search"></i>
                    <input type="text" name="" id="" placeholder="Bạn cần tìm gì?">
                </div>
                <div class="tablet__header__top__right">
                    <div class="tablet__shopping__cart">
                        <i class="ti-bag"></i>
                        <p>Giỏ hàng</p>
                    </div>
                </div>
            </div>
            <div class="tablet__header__bottom">
                <i class="fas ti-search"></i>
                <input type="text" name="" id="" placeholder="Bạn cần tìm gì?">
            </div>

            <!-- End Tablet -->
        </div>
        <!-- End Header Background tablet -->
        <div class="header grid wide">
            <div class="row">
                <!-- Logo Icon -->
               
                <!-- Logo Image -->
                <div class="header__logo__img">
                    <a href="http://localhost/QuangAnhStore/TrangChu/html/TrangChuDT/trangchu.php">
                        <img src="http://localhost/QuangAnhStore/TrangChu/img/Desktop%20logo/LogoNew.jpg" alt="">
                    </a>
                </div>


                <!-- Submenu modal -->
                <div class="header__location__submenu__modal"></div>
                <!-- Search bar -->
                <div class="header__search__bar">
                    <div class="header__search__bar__icon">
                        <i class="fas ti-search"></i>
                    </div>
                    <div class="header__search__bar__input">
                        <input type="text" name="txtSearch" id="txtSearch" placeholder="Bạn cần tìm gì?" value="<?php echo isset($_POST['txtSearch']) ? $_POST['txtSearch'] : '' ?>">

                    </div>

                    <div class="header__search__bar__modal">

                    </div>

                </div>
                <!-- Navbar list -->
                <div class="header__navbar">
                    <ul class="header__navbar__list">
                    <li class="header__navbar__item">
                            <div class="header__navbar__item__wrapper">
                                <a href="http://localhost/QuangAnhStore/Login/KhachHang/Update.php" class="header__navbar__item__link">
                                    <i class="ti-info-alt"></i>
                                    <div class="header__navbar__item__link__desc__wrapper">
                                        <p>Chi tiết</p>
                                        <p>tài khoản</p>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="header__navbar__item">
                            <div class="header__navbar__item__wrapper">
                                <a href="http://localhost/QuangAnhStore/TrangChu/html/Chucnangtrangchu/chucnang/cauhoi.php" class="header__navbar__item__link">
                                    <i class="ti-comment-alt"></i>
                                    <div class="header__navbar__item__link__desc__wrapper">
                                        <p>Đặt câu hỏi</p>
                                        <p>bình luận</p>
                                    </div>
                                </a>
                            </div>
                        </li>

                     
                        <li class="header__navbar__item">
                            <div class="header__navbar__item__wrapper">
                                <a href="http://localhost/QuangAnhStore/TrangChu/html/ChucNangtrangchu/chucnang/tracuudonhang.php" class="header__navbar__item__link">
                                    <i class="fas ti-shopping-cart"></i>
                                    <div class="header__navbar__item__link__desc__wrapper">
                                        <p>Tra cứu</p>
                                        <p>đơn hàng</p>
                                    </div>
                                </a>
                            </div>
                        </li>

                        <li class="header__navbar__item">
                            <div class="header__navbar__item__wrapper">
                                <a href="http://localhost/QuangAnhStore/TrangChu/html/Chucnangtrangchu/chucnang/gioHang.php" class="header__navbar__item__link">
                                    <i class="ti-bag"></i>
                                    <div class="header__navbar__item__link__desc__wrapper">
                                        <p>Giỏ</p>
                                        <p>hàng</p>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li class="header__navbar__item">
                            <div class="header__navbar__item__wrapper__last" >
                                <form action="" name="login" method="POST" >
                                    <button  class="header__navbar__item__link" name="btndx" type="submit" style="background: none; border: none;">
                                        <div class="header__navbar__item__link__icon__wrapper__last">
                                            <i class="far ti-user"></i>
                                        </div>
                                        <?php 
                                            if(isset($_SESSION["uskh"]))
                                            {
                                                $tit = "Đăng xuất";
                                            }else if(!isset($_SESSION["uskh"])){
                                                $tit = "Đăng nhập";
                                            }
                                        ?>
                                        <div class="header__navbar__item__link__desc__wrapper">
                                            <p><?php echo $tit;?></p>
                                        </div>
                                    </button>
                                </form>
                                
                            </div>
                        </li>

                    </ul>
                </div>
            </div>


        </div>

    </div>
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['btndx'])){
            unset($_SESSION["uskh"]);
            echo "<script type='text/javascript'>";
            echo "window.location.href='http://localhost/QuangAnhStore/Login/Loginkh.php';";
            echo "</script>";
        }
    ?>

</body>

</html>