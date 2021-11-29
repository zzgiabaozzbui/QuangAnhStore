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
        <title>Danh sách quản trị</title>
        <meta charset="utf-8">
        <!-- <link rel="stylesheet" href="Index.css"> -->
        <link rel="stylesheet" href="./css/table.css">
        <link rel="stylesheet" href="../../Frontend/css/sideBar.css?version=1">
        <link rel="stylesheet" href="../../Frontend/font/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="./css/Index.css">
    </head>
    <style>
        .container-web{
    flex: 1;
    height: 100vh;
}
        .divmain{
    background: linear-gradient( -45deg, #23a6d5,#23d5ab);
    /* border-radius: 2%; */
    max-width: 100%;
    max-height: 92%;
    height: 100vh;
    color: white;
    margin: 0px;
    padding-top: 10px;
    position: relative;
}
    </style>
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
                    <h3 >Danh sách quản trị viên</h3>
                    <form method="POST" >
                        <div class="sear" align="left">
                            <input type="text" class="txtSearch" name="txtSearch" id="txtSearch"  placeholder="Nhập từ khóa cần tìm kiếm" >
                            <button name="btnSearch" class="btnSearch">Tìm</button>
                            
                        </div>
                    
                        <?php
                            //Chèn file php trong 1 tập tin khác
                            require('Funcion.php');
                            //Getall
                            if(!isset($_GET['se']))
                                SearchByName();
                            

                            if( isset($_GET['se'])){
                                echo "<script type='text/javascript'>";
                                echo "var tbl_Main = document.getElementById('tbl_Main'); tbl_Main.parentNode.removeChild(tbl_Main);;";
                                echo "var tbl_Main1 = document.getElementById('tbl_Main1'); tbl_Main1.parentNode.removeChild(tbl_Main1);;";
                                echo "</script>";
                                $key=$_GET["se"];
                                $current_page=isset($_GET['page']) ? $_GET['page'] : 1;
                                //Hiện từ dòng $sta+1
                                $sta=($current_page-1)*5;

                                $table_name ="tbl_Main";
                                if($key==""){
                                    $query = "SELECT MaNV, Tendangnhap, Matkhau, fullname, Gioitinh, Sdt, Quyen, Trangthai,img FROM quantri ";
                                    $r= row($query);
                                    $query=$query."LIMIT ".$sta.", 5";
                                }else{
                                    $query = "SELECT MaNV, Tendangnhap, Matkhau, fullname, Gioitinh, Sdt, Quyen, Trangthai,img FROM quantri where fullname like N'%".$key."%'";
                                    $r= row($query);
                                    $query=$query."LIMIT ".$sta.", 5";
                                }
                                
                                $conn = mysqli_connect("localhost","root","","qldt");
                                if($conn == true){
                                    //Step3
                                    $result = mysqli_query($conn,$query);
                                    if(mysqli_num_rows($result)>0){
                                        $table_name1 = "$table_name"."1";
                                        echo "<div id='".$table_name."' class='tbl-header ' >";
                                        echo "<table class='tb' cellpadding='0' cellspacing='0' border='0'>";
                                        echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Mã nhân viên </th>
                                            <th>Tài khoản </th>
                                            <th>Mật khẩu </th>
                                            <th>Họ và tên </th>
                                            <th>Giới tính </th>
                                            <th>Số điện thoại </th>
                                            <th>Quyền </th>
                                            <th >Trạng thái </th>
                                            <th >Ảnh </th>
                                            <th >Chi tiết </th>";
                                        
                                            echo "</tr>";
                                            echo "</thead>";
                                        echo "</table>";
                                        echo "</div>";

                                        echo "<div id='".$table_name1."' class='tbl-content tb' >";
                                        echo "<table class='tb' cellpadding='0' cellspacing='0' border='0'>";
                                        echo "<tbody>";
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr >";
                                                echo "<td>" . $row["MaNV"] . "</td>";
                                                echo "<td>" . $row["Tendangnhap"] . "</td>";
                                                echo "<td>" . $row["Matkhau"] . "</td>";
                                                echo "<td>" . $row["fullname"] . "</td>";
                                                echo "<td>" . show_sex($row["Gioitinh"]) . "</td>";
                                                echo "<td>" . $row["Sdt"] . "</td>";
                                                echo "<td>" . show_quyen($row["Quyen"]) . "</td>";
                                                echo "<td >".show_tt($row["Trangthai"])."</td>";
                                                echo "<td >".im($row["img"])."</td>";
                                                
                                                echo "<td >
                                                    <a href='Update.php?ID=".$row["MaNV"]."'>
                                                        <img class='im'  width='20' height='20' src='https://img.icons8.com/ios-filled/2x/ffffff/visible.png'>
                                                    </a> 
                                                </td>";
                                            echo "</tr>";
                                                
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "</div>";

                                        //đóng các thẻ phân trang tồn tại trước đó
                                        echo "<script type='text/javascript'>";
                                        echo "if (document.getElementById('pt')) {var tbl_Main = document.getElementById('pt'); tbl_Main.parentNode.removeChild(tbl_Main);}";
                                        echo "</script>";
                                        echo "<div class=' tb' >";

                                        echo "<table id='pt' class='tb' cellpadding='0' cellspacing='0' border='0'>";
                                            echo "<tbody>";
                                            //lấy trang hiện tai từ đừng link
                                            $current_page=isset($_GET['page']) ? $_GET['page'] : 1;
                                            //Tính và làm tròn tổng trang, mỗi trang 5 dòng
                                            $total_page = ceil($r/5);
                                            //Phân trang
                                            
                                                echo "<tr >";
                                                    echo "<td style='border:none;'>";
                                                        if ($current_page > 1 && $total_page > 1){
                                                            echo '<a href="index.php?se='.($key).'&page='.($current_page-1).'">Prev</a> | ';
                                                        }
                                                        
                                                        // Lặp khoảng giữa
                                                        for ($i = 1; $i <= $total_page; $i++){
                                                            // Nếu là trang hiện tại thì hiển thị thẻ span
                                                            // ngược lại hiển thị thẻ a
                                                            if ($i == $current_page){
                                                                echo '<span>'.$i.'</span> | ';
                                                            }
                                                            else{
                                                                echo '<a href="index.php?se='.($key).'&page='.$i.'">'.$i.'</a> | ';
                                                            }
                                                        }
                                                    
                                                        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                                                        if ($current_page < $total_page && $total_page > 1){
                                                            echo '<a href="index.php?se='.($key).'&page='.($current_page+1).'">Next</a> | ';
                                                        }
                                                    echo "</td >";
                                                echo "</tr>"; 
                                            echo "</tbody>";
                                        echo "</table>";
                                        echo "</div>";
                                    }
                                    else{
                                        echo "Data is empty";
                                    }
                                }
                                else{
                                    echo "Connect error:" . mysqli_connect_error();
                                }
                            }
                            //Tìm  kiếm ban đầu
                            if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['btnSearch'])){
                                echo "<script type='text/javascript'>";
                                echo "var tbl_Main = document.getElementById('tbl_Main'); tbl_Main.parentNode.removeChild(tbl_Main);;";
                                echo "var tbl_Main1 = document.getElementById('tbl_Main1'); tbl_Main1.parentNode.removeChild(tbl_Main1);;";
                                echo "</script>";
                                
                                SearchByName();
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