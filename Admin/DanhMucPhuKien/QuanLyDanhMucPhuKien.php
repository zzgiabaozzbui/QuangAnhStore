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
    <link rel="stylesheet" href="./Css/cssQuanLyDanhMucPhuKien.css">
  
   
</head>
<body>
<form action="" method="GET">
        <div class="main">
            <?php
                include "../Shared_Element/sideBar.php";
            ?>
            <div class="Content">
            <?php
                    require_once "../Shared_Element/Name.php";
                ?> 
                <div class="QuanLyLoaiPhuKien">
                    <div class="header">
                        <div class="add-loaipk">
                            <a href="ThemDanhMuc.php" class="add-loaipk-link">Thêm loại phụ kiện mới<i class="ti-pencil-alt icon--insert"></i></a>
                        </div>
                        <div class="search-loaipk">
                            <div class="search-by-name">
                                <input type="text" name="txtSearch" id="txtSearch" placeholder="Tìm kiếm" class="txtSearch" ><input type="submit" class="btnSearch" name="" value="Duyệt"></input>
                            </div>
                            <div class="refresh">
                                <a class="Refresh-link" href="QuanLyDanhMucPhuKien.php"><i class="ti-reload icon--refresh"></i></a>
                            </div>
                        </div>
                    </div>
        </form>
        <?php

               
                include './connect.php';
                $itemperpage=4;
                $currentpage=!empty($_GET['Page']) ? $_GET['Page'] : 1;
                $offset=($currentpage-1)*$itemperpage;
                if(isset($_GET['txtSearch']) && $_GET['txtSearch']!="")
                {
                    $key= $_GET['txtSearch'];
                    $queryCount="Select * from loaiphukien where Tenloai like N'%".$key."%' or Maloai like N'%".$key."%'";
                    $totalitem=mysqli_query($conn,$queryCount);
                    $numberitem=mysqli_num_rows($totalitem);
                    $totalpage=ceil($numberitem/$itemperpage);
                    $query="Select * from loaiphukien where Tenloai like N'%".$key."%' or Maloai like N'%".$key."%' order by Maloai limit ".$itemperpage." offset ".$offset."";
                }
                else
                {
                    $queryCount="Select * from loaiphukien";
                    $totalitem=mysqli_query($conn,$queryCount);
                    $numberitem=mysqli_num_rows($totalitem);
                    $totalpage=ceil($numberitem/$itemperpage);
                    $query="Select * from loaiphukien order by Maloai limit ".$itemperpage." offset ".$offset."";
                }
               
                
                $result=mysqli_query($conn,$query);
			    if(mysqli_num_rows($result)>0)
                {

                    echo "<div class='body' id='body'>";
                    echo "<table class='list-loaipk' id='tblMain'>";
                    echo "  <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th>Ảnh mô tả</th>
                            <th>Mô tả</th>
                            <th>Sửa</th>
                            <th>Xóa</th>";
                    while ($row=mysqli_fetch_assoc($result)) {
                  
                    echo "<tr>";
                    echo "<td>" . $row["Maloai"] . "</td>";
                    echo "<td>" . $row["Tenloai"] . "</td>";
                    echo "<td>" . "<img src='./Image/". $row["Anhmota"] ."' alt=''>" . "</td>";
                    echo "<td>" . $row["MoTa"] . "</td>";
                    echo "<td><a href='CapNhatDanhMuc.php?Maloai=".$row["Maloai"]."' class=''><i class='ti-pencil icon--update'></i></a></td>";
                    echo "<td><a href='XoaDanhMuc.php?Maloai=".$row["Maloai"]."' class='' onclick='return confirm(\"Are you sure you want to delete?\")'><i class='ti-trash icon--delete'></i></a></td>";
                    echo "</tr>";
                    }
                    echo "</table >";
                    echo "</div>";
                    echo "<div class='footer' id='footer'>";
                    if(isset($key))
                    {
                        if($currentpage>3)
                      {
                        $first=1;
                        echo"<a href='?Page=".$first."&txtSearch=".$key."' class='pageNumber'>First</a>";
                     }
                     for($num=1;$num<=$totalpage;$num++)
                     {
                        if($num>$currentpage-3 && $num<$currentpage+3)
                        {
                        if($num!=$currentpage)
                        {
                            echo"<a href='?Page=".$num."&txtSearch=".$key."' class='pageNumber'>".$num."</a>";
                        }
                        else
                        {
                            echo"<a href='?Page=".$num."&txtSearch=".$key."' class='pageCurrent'>".$num."</a>";
                        }
                        }
                        
                     }
                     if($currentpage<=$totalpage-3)
                        {
                            $last=$totalpage;
                            echo"<a href='?Page=".$last."&txtSearch=".$key."' class='pageNumber'>Last</a>";
                        }
                    }
                    else
                    {
                        if($currentpage>3)
                        {
                           $first=1;
                           echo"<a href='?Page=".$first."' class='pageNumber'>First</a>";
                        }
                        for($num=1;$num<=$totalpage;$num++)
                        {
                           if($num>$currentpage-3 && $num<$currentpage+3)
                           {
                           if($num!=$currentpage)
                           {
                               echo"<a href='?Page=".$num."' class='pageNumber'>".$num."</a>";
                           }
                           else
                           {
                               echo"<a href='?Page=".$num."' class='pageCurrent'>".$num."</a>";
                           }
                           }
                           
                        }
                        if($currentpage<=$totalpage-3)
                           {
                               $last=$totalpage;
                               echo"<a href='?Page=".$last."' class='pageNumber'>Last</a>";
                           }
                    }   
                    echo "</div>";   
                }
                else
                {
                    echo "No data";
                }
                
                echo "</div>";
                
        ?>
        
        
       

    
</body>
</html>