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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./Css/cssQuanLyPhuKien.css">
    <style>
    </style>
</head>
<body>

        <form action="" method="POST">
        <div class="main">
        <?php
                include "../Shared_Element/sideBar.php";
            ?>
            <div class="Content">
            <?php
                    require_once "../Shared_Element/Name.php";
                ?>
                <div class="QuanLyPhuKien">
                    <div class="header">
                        <div class="add-pk">
                            <a href="ThemPhuKien.php" class="add-pk-link">Thêm phụ kiện mới<i class="ti-pencil-alt icon--insert"></i></a>
                         </div>
                        <div class="search-pk">
                            <div class="search-by-name">
                                <input type="text" name="txtSearch" id="txtSearch" placeholder="Tìm kiếm" class="txtSearch" ><button class="btnSearch" name="btnSearch" ><i class="ti-search icon--search"></i></button>
                            </div>
                            <?php 
                                include './connect.php';
                                $query="Select * from loaiphukien";
                                $result=mysqli_query($conn,$query);
                                if(mysqli_num_rows($result)>0)
                                {
                                echo "<div class='search-by-type'>";
                                echo "<b class='txtSearchByType'>Lọc : </b>";
                                echo " <select class='cboLoai' name='cboFilter'>";
                   
                                while ($row=mysqli_fetch_assoc($result)) {
                                echo "<option value=".$row["Maloai"].">" . $row["Tenloai"] . "</option>";
                                }
                                echo "</select>";
                                echo "<button class='btnFilter' name='btnFilter' ><i class='ti-filter icon--filter'></i></button>" ;
                                echo "</div>";
                                }
                                ?>
                            <div class="refresh">
                                <a class="Refresh-link" href="QuanLyPhuKien.php"><i class="ti-reload icon--refresh"></i></a>
                             </div>
                        </div>
                    </div>
                        <?php
                            include './connect.php';
                                $itemperpage=4;
                                $currentpage=!empty($_GET['Page']) ? $_GET['Page'] : 1;
                                $offset=($currentpage-1)*$itemperpage;
                                $queryCount="Select * from chitietphukien";
                                $totalitem=mysqli_query($conn,$queryCount);
                                $numberitem=mysqli_num_rows($totalitem);
                                $totalpage=ceil($numberitem/$itemperpage);

                                $query="Select * from chitietphukien order by Maphukien limit ".$itemperpage." offset ".$offset."";
                                $result=mysqli_query($conn,$query);
                                if(mysqli_num_rows($result)>0)
                                {
                                    echo "<div class='body' id='body'>";
                                    echo "<table class='list-pk' id='tblMain'>";
                                    include './DuLieuBang.php';
                                    echo "</table >";
                                    echo "</div>";
                                    echo "<div class='footer' id='footer'>";
                                    include './NgatTrang.php';
                                    echo "</div>";   
                                }
                                else
                                {
                                    echo "No data";
                                }
                            ?>
                </div>    
        </form>
        <?php

if(($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['btnSearch']) || isset($_GET['key']))  )
{
    findByKey();
}
function findByKey()
{
    
    
    $key=isset($_POST['txtSearch']) ?  $_POST['txtSearch'] :$_GET['key'] ;
    
    include './connect.php';
    echo "<script type='text/javascript'> var element = document.getElementById('body');
    element.parentNode.removeChild(element);</script>";
    echo "<script type='text/javascript'> var element = document.getElementById('footer');
    element.parentNode.removeChild(element);</script>";
    $itemperpage=4;
    if(isset($_POST['btnSearch']))
    {
        $currentpage=1;
    }
    else
    {
        $currentpage=!empty($_GET['PageSearch']) ? $_GET['PageSearch'] : 1;
    }
    
    $offset=($currentpage-1)*$itemperpage;
    $queryCount="Select * from chitietphukien where Tenphukien like N'%".$key."%' or Maphukien like N'%".$key."%'";
    $totalitem=mysqli_query($conn,$queryCount);
    $numberitem=mysqli_num_rows($totalitem);
    $totalpage=ceil($numberitem/$itemperpage);
    $query="Select * from chitietphukien where Tenphukien like N'%".$key."%' or Maphukien like N'%".$key."%' order by Maphukien limit ".$itemperpage." offset ".$offset."";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0)
    {
        echo "<div class='body' id='body'>";
        echo "<table class='list-pk' id='tblMain'>";
        include './DuLieuBang.php';
        echo "</table >";
        echo "</div>";
        echo "<div class='footer' id='footer'>";
        include './NgatTrang.php';
        echo "</div>";   
    }
    else
    {
        echo "No data";
    }
}

if(($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['btnFilter']) || isset($_GET['type']))  )
{
    findByType();
}
function findByType()
{
    
    
    $type=isset($_POST['cboFilter']) ?  $_POST['cboFilter'] : $_GET['type'] ;

    include './connect.php';
    echo "<script type='text/javascript'> var element = document.getElementById('body');
    element.parentNode.removeChild(element);</script>";
    echo "<script type='text/javascript'> var element = document.getElementById('footer');
    element.parentNode.removeChild(element);</script>";
    $itemperpage=4;
    if(isset($_POST['btnFilter']))
    {
        $currentpage=1;
    }
    else
    {
        $currentpage=!empty($_GET['PageFilter']) ? $_GET['PageFilter'] : 1;
    }
    
    $offset=($currentpage-1)*$itemperpage;
    $queryCount="Select * from chitietphukien,phukhien WHERE chitietphukien.Maphukien=phukhien.MaPhuKien and MaLoai='".$type."'";
   
    $totalitem=mysqli_query($conn,$queryCount);
    $numberitem=mysqli_num_rows($totalitem);
    $totalpage=ceil($numberitem/$itemperpage);
    $query="Select * from chitietphukien,phukhien WHERE chitietphukien.Maphukien=phukhien.MaPhuKien and MaLoai='".$type."' order by chitietphukien.Maphukien limit ".$itemperpage." offset ".$offset."";
  
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0)
    {
        echo "<div class='body' id='body'>";
        echo "<table class='list-pk' id='tblMain'>";
        include './DuLieuBang.php';
        echo "</table >";
        echo "</div>";
        echo "<div class='footer' id='footer'>";
        include './NgatTrang.php';
        echo "</div>";   
    }
    else
    {
        echo "No data";
    }
}




?>

       

    
</body>
</html>