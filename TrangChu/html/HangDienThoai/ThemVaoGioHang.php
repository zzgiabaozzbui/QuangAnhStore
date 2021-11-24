<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/ThemVaoGioHang.css?version=0">
    <link rel="stylesheet" href="../../css/HeaderStyle.css">
    <link rel="stylesheet" href="../../css/FooterStyle.css">
    <title>Shopping Cart</title>
</head>
<body>
    <?php 
    require_once "../Header.php";
    ?>
    <div class="Product_cart">
        <h2>Giỏ Hàng</h2>
        <div class="Product_cart-header">
            <div class="Product_cart_info-img">
                <img src="../../../Admin/Frontend/img/Featured phone/Apple/1.jpg" alt="">
            </div>
            <div class="Product_cart_info">
                <h3>Iphone 13</h3>
                <p>30.000.000 vnđ</p>    
                <div class="Product-promotion">
                <p>- Chương trình khuyến mãi</p>
                <ul>
                    <li>Miễn phí vận chuyển</li>
                    <li>Tặng kèm phiếu giảm giá cho lần mua tiếp theo</li>
                </ul>
            </div> 
            </div>
            
        </div>
        
        <div class="Product_cart-number">
                <div >
                        <p>-</p>
                    </div>
                    <div >
                        <p>1</p>
                    </div>
                    <div>
                        <p>+</p>
                    </div>
                </div>
                <div class="border-bottom"></div>
        <div class="Product-Total">
            <p>- Tổng tiền</p>
            <p>30.000.000 vnđ</p>
        </div>
        <div class="border-bottom"></div>
        <div class="info-Customer">
            <h2>Thông tin khách hàng</h2>
        </div>
    </div>
    
    <?php 
    require_once "../Footer.php";
    ?>
</body>
</html>