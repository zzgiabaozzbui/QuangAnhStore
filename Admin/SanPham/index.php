<?php
session_start();
echo $_SESSION['us'];
 require "../Shared_Element/DB.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Frontend/css/SanPham.css?version=2">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .btnAdd{
            margin: 5px 0;
            display: inline-block;
        }
        #Form_excel button,
        .btnAdd .Add{
            background-color: #0b7dda;
            color: white;
            padding: 4px 10px;            
            border-radius: 5px;
        }
        .btnAdd .Add{
            margin-left: 42px;
        }
        table tr td a:hover{
            text-decoration: none;
        }
        .btnAdd a:hover,
        .phanTrang a:hover
        {
            text-decoration: none;
        }
        th,td{
            text-align: center;
        }
        #Form_excel{
            display: inline-block;
        }
        #Form_excel button{
            border: none;
        }
    </style>
</head>
<body>
    <div class="main">
        <?php
        require_once "../Shared_Element/sideBar.php";
        if(isset($_GET['TimKiem']))
        {
            $KeySearch=$_GET['TimKiem'];
        }
        else
        $KeySearch="";
        ?>
        <div class="container-web">
            <?php
            require_once "../Shared_Element/Name.php";
            ?>
            <form class="example" action="./index.php" method="get" style="margin:auto;max-width:300px">
                <input type="text" placeholder="Search.." name="TimKiem" value="<?php echo $KeySearch;?>">
                <button type="submit" value="btnSearch" ><i class="fa fa-search"></i></button>
</form>
            <div class="btnAdd">
            <a class="Add" href="ThemMoiSP.php">Thêm mới</a>
            </div>
            <form action="Excel.php" method="post" id="Form_excel">
                <button name="btnExcel" type="submit">
                <i class="far fa-file-excel"></i>    
                Xuất excel
            </button>
    </form>
            <form action="" method="post">
                <table id="tblSP" class="table">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Dòng sản phẩm</th>
                            <th>Giá</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            
                        </tr>                
                    </thead>
                    <tbody>
                        <?php
                        $ProductNumber=5; // số sản phẩm trong 1 trang
                        $current_page=1;
                        if(isset($_GET['page'])){
                            $current_page=$_GET['page'];
                        }
                        
                        $index=($current_page-1)*$ProductNumber;  
                        $querySelect= "Select * from SanPham limit ".$index.",".$ProductNumber."";
                        $resuilSelectList=selectListItems($querySelect);
                        // if($resuilSelectList==null)
                        // {
                        //     echo "Bảng không có dữ liệu";
                        // }
                        // else
                        foreach ($resuilSelectList as $sanPham ) {
                            $jsCheck="return confirm('Bạn có chắc chắn muốn xóa?');";
                            $querySelectSP="select TenSP, sanpham.MaDong,Tendong , HinhAnh,Gia from sanpham,tbldongsanpham
                            where sanpham.MaDong=tbldongsanpham.Madong and MaSP='".$sanPham['MaSP']."'";
                            $resultSelectSP=selectItem($querySelectSP);
                            $tenDong=$resultSelectSP[0]['Tendong'];
                            echo "<tr>";
                            echo "<td>".$sanPham['MaSP']."</td>";
                            echo "<td><img src='".$sanPham["HinhAnh"]."' alt=''></td>";
                            
                            echo "<td>".$sanPham["TenSP"]."</td>";
                            echo "<td>".$tenDong."</td>";
                            echo "<td>".number_format($sanPham['Gia'])." VNĐ</td>";
                            echo "<td><a href='CapNhatSP.php?MaSP=".$sanPham['MaSP']."'>Sửa</a></td>";
                            echo '<td><a  onclick="'.$jsCheck.'" href="XoaSP.php?MaSP='.$sanPham["MaSP"].'">Xóa</a></td>';
                            echo "<td><a href='ChiTietSanPham.php?MaSP=".$sanPham['MaSP']."'>Xem chi tiết</a></td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>
            </form>
            
            <div id="phanTrang" class="phanTrang">
                <?php
            $queryCount="Select count(MaSp) as number from sanpham";
            $resultCount=selectListItems($queryCount);
            $number=0;
            if($resultCount != null and count($resultCount)>0)
            {
                $number=$resultCount[0]['number'];
                // Bởi nó ra mảng vị trí a[0][]
            }
            $pages= ceil($number/$ProductNumber);
            // page ví dụ lấy 2.5 thì ceil giúp làm tròn lên 3
            if($current_page>2)
            {
                $first_page=1;
                echo '<a  href="?page='.$first_page.'">Fisrt</a>';
            }

            for($i=1;$i<=$pages;$i++){
                if($i!=$current_page){
                    if($i>$current_page-3 && $i<$current_page+3)
                    echo '<a  href="?page='.$i.'">'.$i.'</a>';
                }     
                else
                echo '<a class="action" href="?page='.$i.'">'.$i.'</a>';
            }
            if($current_page<$pages-2)
            {
                $last_page=$pages;
                echo '<a  href="?page='.$last_page.'">Last</a>';
            }
            
            ?>
    
            </div>
            <?php
                if($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['TimKiem']))
                {
                    
                    echo "<script type='text/javascript'> 
                    var main= document.getElementById('tblSP');
                    var phanTrang= document.getElementById('phanTrang');
                    main.innerHTML=` `;
                    phanTrang.innerHTML=` `;
                    </script>";
                    $KeySearch=isset($_GET['TimKiem']) ? $_GET['TimKiem'] : ''; 
                    echo '<table class="table" id="tblSP">
                    <thead>
                        <tr>
                        <th>Mã sản phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Dòng sản phẩm</th>
                        <th>Giá</th>
                        <th></th>
                        <th></th>
                        <th></th>
                            
                        </tr>                
                    </thead>
                    <tbody>'; 
                     $ProductNumber=5; // số sản phẩm trong 1 trang
                        $current_page=1;
                        if(isset($_GET['page'])){
                            $current_page=$_GET['page'];
                        }                      
                        $index=(($current_page-1)*$ProductNumber);  
                        $querySelect= "Select MaSP,TenSP, sanpham.MaDong,Tendong , HinhAnh,Gia from sanpham INNER JOIN tbldongsanpham ON sanpham.MaDong=tbldongsanpham.Madong 
                        where MaSP like '%".$KeySearch."%' or TenSP like '%".$KeySearch."%' or Tendong like '%".$KeySearch."%'"
                        ." limit ".$index.",".$ProductNumber."";
                        
                        $resuilSelectList=selectListItems($querySelect);   
                        foreach ($resuilSelectList as $sanPham ) {
                            $jsCheck="return confirm('Bạn có chắc chắn muốn xóa?');";
                            $querySelectSP="select TenSP, sanpham.MaDong,Tendong , HinhAnh,Gia from sanpham,tbldongsanpham
                            where sanpham.MaDong=tbldongsanpham.Madong and MaSP='".$sanPham['MaSP']."'";
                            $resultSelectSP=selectItem($querySelectSP);
                            $tenDong=$resultSelectSP[0]['Tendong'];
                            echo "<tr>";
                            echo "<td>".$sanPham['MaSP']."</td>";
                            echo "<td><img src='".$sanPham["HinhAnh"]."' alt=''></td>";
                            
                            echo "<td>".$sanPham["TenSP"]."</td>";
                            echo "<td>".$tenDong."</td>";
                            echo "<td>".number_format($sanPham['Gia'])." VNĐ</td>";
                            echo "<td><a href='CapNhatSP.php?MaSP=".$sanPham['MaSP']."'>Sửa</a></td>";
                            echo '<td><a  onclick="'.$jsCheck.'" href="XoaSP.php?MaSP='.$sanPham["MaSP"].'">Xóa</a></td>';
                            echo "<td><a href='ChiTietSanPham.php?MaSP=".$sanPham['MaSP']."'>Xem chi tiết</a></td>";
                            echo "</tr>";
                        }
                    
                    echo "</tbody>";
                    echo "</table>";
                    $queryCount="Select COUNT( MaSP) as number from sanpham INNER JOIN tbldongsanpham ON sanpham.MaDong=tbldongsanpham.Madong where MaSP like '%".$KeySearch."%' or TenSP like '%".$KeySearch."%' or Tendong like '%".$KeySearch."%'";
                
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
                    
                    
                     function searchString($KeySearch)
                     {
                         return ($KeySearch!='')?'&TimKiem='.$KeySearch.'':'&TimKiem=';
                     }
                        
                     if($current_page>3)
                        {
                            $first_page=1;
                            echo '<a name="numberPage" href="?page='.$first_page."".searchString($KeySearch).'">First</a>';
                        }  
                    for($i=1;$i<=$pages;$i++){
                        if($i!=$current_page){
                            if($i>$current_page-3 && $i<$current_page+3 )
                            echo '<a name="numberPage" href="?page='.$i."".searchString($KeySearch).'">'.$i.'</a>';                  
                        }     
                        else
                        echo '<a name="numberPage"  class="action" href="?page='.$i."".searchString($KeySearch).'">'.$i.'</a>';
            
                        
                    }
                    if($current_page<$pages-3)
                    {
                        $last_page=$pages;
                        echo '<a name="numberPage" href="?page='.$last_page."".searchString($KeySearch).'">Last</a>';
                    }  
                                       
                        echo "</div>";
                        
                }
            ?>
        </div>
    </div>

       
</body>
</html>