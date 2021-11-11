<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách quản trị</title>
        <meta charset="utf-8">
        <!-- <link rel="stylesheet" href="Index.css"> -->
        <link rel="stylesheet" href="./css/table.css">
        <link rel="stylesheet" href="../../Frontend/css/sideBar.css?version=1">
        <link rel="stylesheet" href="../../Frontend/font/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="./css/Index.css">
    </head>
    <body >
        
        <div class="main">
            
            <?php
                require "../../Shared_Element/sideBar.php";
            ?>
            <div class="container-web">
                <?php
                    require "../../Shared_Element/Name.php";
                ?>
                <div class="divmain" align="Center">
                    <h3 >Danh sách quản trị viên</h3>
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
                        <button align="center" class="btnAdd" name="btnAdd" onclick="return confirm('Bạn sẽ được chuyển đến trang thêm quản trị!')" type="submit">
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