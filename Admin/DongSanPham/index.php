<?php
 require "../Shared_Element/DB.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Frontend/css/SanPham.css?Version=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        .btnAdd{
            margin: 5px 0;
        }
        .btnAdd .Add{
            background-color: #0b7dda;
            color: white;
            padding: 4px 10px;
            margin-left: 45px;
            border-radius: 5px;
        }
        .btnAdd a:hover,
        .phanTrang a:hover
        {
            text-decoration: none;
        }
        th,td{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="main">
    <?php
    require "../Shared_Element/sideBar.php";
    ?>
    <div class="container-web">
        <?php
        require_once "../Shared_Element/Name.php" ;
        if(isset($_GET['TimKiem']))
        {
            $KeySearch=$_GET['TimKiem'];
        }
        ?>
        
        <form class="example" action="./index.php" method="get" style="margin:auto;max-width:300px">
                <input type="text" placeholder="Search.." name="TimKiem">
                <button type="submit" value="btnSearch" ><i class="fa fa-search"></i></button>
</form>
            <div class="btnAdd">
                <a class="Add" href="ThemMoiDSP.php">Thêm mới</a>
            </div>
            <form action="" method="post">
                <table class="table" id="tblDSP">
                    <thead>
                        <tr>
                            <th>Mã dòng sản phẩm</th>
                            <th>Dòng sản phẩm</th>
                            <th></th>
                            <th></th>
                            
                        </tr>                
                    </thead>
                    <tbody>
                        <?php
                        $ProductNumber=10; // số sản phẩm trong 1 trang
                        $current_page=1;
                        
                       
                        if(isset($_GET['page'])){
                            $current_page=$_GET['page'];
                        }
                        
                        $index=($current_page-1)*$ProductNumber;  
                        $querySelect= "Select * from tblDongSanPham limit ".$index.",".$ProductNumber."";
                        
                        $resuilSelectList=selectListItems($querySelect);
                    
                        foreach ($resuilSelectList as $dongSanPham ) {
                            $jsCheck="return confirm('Bạn có chắc chắn muốn xóa?');";
                            echo "<tr>";
                            echo "<td>".$dongSanPham['Madong']."</td>";
                            echo "<td>".$dongSanPham['Tendong']."</td>";
                            echo "<td><a href='CapNhapDSP.php?MaDong=".$dongSanPham['Madong']."'>Sửa</a></td>";
                            echo '<td><a  onclick="'.$jsCheck.'" href="XoaDSP.php?MaDong='.$dongSanPham["Madong"].'">Xóa</a></td>';
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </form>
            <div class="phanTrang" id="phanTrang">
                <?php
            $queryCount="Select count(Madong) as number from tbldongsanpham";
         

            $resultCount=selectListItems($queryCount);
            $number=0;
            if($resultCount != null and count($resultCount)>0)
            {
                $number=$resultCount[0]['number'];
                // Bởi nó ra mảng vị trí a[0][]
            }
            $pages= ceil($number/$ProductNumber);
            // page ví dụ lấy 2.5 thì ceil giúp làm tròn lên 3
            if($current_page>3)
            {
                $first_page=1;
                echo '<a name="numberPage" href="?page='.$first_page.'">Fisrt</a>';
            }

            for($i=1;$i<=$pages;$i++){
                if($i!=$current_page){
                    if($i>$current_page-3 && $i<$current_page+3)
                    echo '<a name="numberPage" href="?page='.$i.'">'.$i.'</a>';
                }     
                else
                echo '<a name="numberPage" class="action" href="?page='.$i.'">'.$i.'</a>';
            }
            if($current_page<$pages-3)
            {
                $last_page=$pages;
                echo '<a name="numberPage"  href="?page='.$last_page.'">Last</a>';
            }
            
            ?>
            </div>
            <?php
                if($_SERVER['REQUEST_METHOD'] === 'GET')
                { 
                    echo "<script type='text/javascript'> 
                    var main= document.getElementById('tblDSP');
                    var phanTrang= document.getElementById('phanTrang');
                    main.innerHTML=` `;
                    phanTrang.innerHTML=` `;
                    </script>";
                    $KeySearch=isset($_GET['TimKiem']) ? $_GET['TimKiem'] : '';
                   
    
                    echo '<table class="table" id="tblDongSanPham">
                    <thead>
                        <tr>
                            <th>Mã dòng sản phẩm</th>
                            <th>Dòng sản phẩm</th>
                            <th></th>
                            <th></th>
                            
                        </tr>                
                    </thead>
                    <tbody>';               
                        $ProductNumber=10; // số sản phẩm trong 1 trang
                        $current_page=1;
                        if(isset($_GET['page'])){
                            $current_page=$_GET['page'];
                        }                      
                        $index=(($current_page-1)*$ProductNumber);  
                        $querySelect= "Select * from tblDongSanPham where Madong like '%".$KeySearch."%' or Tendong like '%".$KeySearch."%'"." limit ".$index.",".$ProductNumber."";
                        
                        $resuilSelectList=selectListItems($querySelect);   
                        foreach ($resuilSelectList as $dongSanPham ) {
                            $jsCheck="return confirm('Bạn có chắc chắn muốn xóa?');";
                            echo "<tr>";
                            echo "<td>".$dongSanPham['Madong']."</td>";
                            echo "<td>".$dongSanPham['Tendong']."</td>";
                            echo "<td><a href='CapNhapDSP.php?MaDong=".$dongSanPham['Madong']."'>Sửa</a></td>";
                            echo '<td><a  onclick="'.$jsCheck.'" href="XoaDSP.php?MaDong='.$dongSanPham["Madong"].'">Xóa</a></td>';
                            echo "</tr>";
                        }
                    
                    echo "</tbody>";
                    echo "</table>";
                    $queryCount="Select count(Madong) as number from tbldongsanpham where Madong like '%".$KeySearch."%' or Tendong like '%".$KeySearch."%'";
                
                    echo '<div class="phanTrang" id="phanTrang">';
                    $resultCount=selectListItems($queryCount);
                     $number=0;
                    if($resultCount != null and count($resultCount)>0)
                    {
                        $number=$resultCount[0]['number'];
                        // Bởi nó ra mảng vị trí a[0][]
                    }
                    $pages= ceil($number/$ProductNumber);
                    // page ví dụ lấy 2.5 thì ceil giúp làm tròn lên 3
                    if($current_page>3)
                    {
                        $first_page=1;
                        echo '<a name="numberPage" href="?page='.$first_page.'">Fisrt</a>';
                    }
                    
                     function searchString($KeySearch)
                     {
                         return ($KeySearch!='')?'&TimKiem='.$KeySearch.'':'&TimKiem=';
                     }
                        
                     
                    for($i=1;$i<=$pages;$i++){
                        if($i!=$current_page){
                            echo '<a name="numberPage" href="?page='.$i."".searchString($KeySearch).'">'.$i.'</a>';                  
                        }     
                        else
                        echo '<a name="numberPage"  class="action" href="?page='.$i."".searchString($KeySearch).'">'.$i.'</a>';
            
                        
                    }
                    if($current_page<$pages-3)
                    {
                        $last_page=$pages;
                        echo '<a name="numberPage" href="?page='.$last_page.'">Last</a>';
                    }                       
                        echo "</div>";
                }
            ?>
    </div>
    </div>
</body>
</html>