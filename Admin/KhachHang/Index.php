<?php
    session_start();
    if(!isset($_SESSION["us"]))
    {
        echo "<script type='text/javascript'>";
        echo "alert('Bạn chưa đăng nhập!');";
        echo "window.location.href='http://localhost/QuangAnhStore/Login/Index.php';";
        echo "</script>";
    }

?>  
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách khách hàng</title>
        <meta charset="utf-8">
        <!-- <link rel="stylesheet" href="Index.css"> -->
        <link rel="stylesheet" href="./css/table.css">
        <link rel="stylesheet" href="../../Frontend/css/sideBar.css?version=1">
        <link rel="stylesheet" href="../../Frontend/font/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="./css/Index.css?version=1">
        <style>
            .btnexcel{
                font-weight: bold;
                font-family: 'Times New Roman', Times, serif;
                text-align-last: center;
                font-size: 17px;
                padding: 4px 20px 5px 20px;
                margin-left: 10px;
                background-color: rgba(233,30,99, 0.9);
                border: none;
                color: white;
                position: absolute;
                right: 5px;
            }
        </style>
    </head>
    <body > 
        
        <div class="main">
            
            <?php
                require "../Shared_Element/sideBar.php";
            ?>
            <div class="container-web">
                <?php
                    require "../Shared_Element/Name.php";
                ?>
                
                
                <div class="divmain" align="Center">
                    <h3 >Danh sách khách hàng </h3>
                    <form action="excel.php" method="post" id="Form_excel">
                        <button name="btnexcel" class="btnexcel">Xuất excel</button>
                    </form>
                    
                    <form method="POST" >
                        <div class="sear" align="left">
                            <input type="text" class="txtSearch" name="txtSearch" id="txtSearch"  placeholder="Nhập từ khóa cần tìm kiếm"  >
                            <button name="btnSearch" class="btnSearch">Tìm</button>
                        </div>
                    
                        <?php
                            //Chèn file php trong 1 tập tin khác
                            require('Funcion.php');
                            Select();
                            if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['btnSearch'])){
                                $sea=$_POST["txtSearch"];
                                echo "<script type='text/javascript'>";
                                echo "var tbl_Main = document.getElementById('tbl_Main'); tbl_Main.parentNode.removeChild(tbl_Main);;";
                                echo "var tbl_Main1 = document.getElementById('tbl_Main1'); tbl_Main1.parentNode.removeChild(tbl_Main1);;";
                                echo "</script>";
                                if ($sea=="") {
                                    Select();
                                } else {
                                    SearchByName();
                                }
                            }
                        ?>
                        <br>
                        <button align="center" class="btnAdd" name="btnAdd" onclick="return confirm('Bạn sẽ được chuyển đến trang thêm khách hàng!')" type="submit">
                            <img src="./img/icons8-add-60.png" style="width: 25px; ">
                            <b style="line-height: 20px;">Thêm</b>
                        </button>    
                    </form>
                    <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnAdd'])){
                            echo "<script type='text/javascript'>";
                            echo "window.location.href='Insert.php';";
                            echo "</script>";
                        }
                    ?>
                </div>
        
            </div>
        </div>
        
        
    </body>
</html>