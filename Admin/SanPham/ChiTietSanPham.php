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
<?php
    require '../Shared_Element/DB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Frontend/css/SanPham.css?version=0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <title>Document</title>
    <style>
        form{
            margin-left: 20px;
            margin-top: 10px;
        }
       
        .moRong{
            height: 20px;
        }
    </style>
</head>
<body>
    <div class="main">
    <?php
        require_once '../Shared_Element/sideBar.php';
        
        $maSP= $_GET['MaSP'];      
        $querySelectByMaSP="select * from chitietsanpham where Masanpham=".$maSP;
        $resultSelectByMaSP=selectItem($querySelectByMaSP);
        if($resultSelectByMaSP==null)
        {
            $manHinh=$rom_ram=$boNho=$hdh=$cpu=$video=$kichThuoc=$trongLuong=$camera=$theNho=$wifi=$pin=$baoHanh=$gps=$mang=$ngaySX=$bluetooth=$audio=$tinhTrang=$moTa='';
        }
        else
        {
            $rom_ram=$resultSelectByMaSP[0]['RomRam'];
            $manHinh=$resultSelectByMaSP[0]['Manhinh'];
            $boNho=$resultSelectByMaSP[0]['Bonhotrong'];
            $cpu=$resultSelectByMaSP[0]['CPU'];
            $hdh=$resultSelectByMaSP[0]['Hedieuhanh'];
            $kichThuoc=$resultSelectByMaSP[0]['Kichthuoc'];
            $trongLuong=$resultSelectByMaSP[0]['Trongluong'];
            $camera=$resultSelectByMaSP[0]['Camera'];
            $theNho=$resultSelectByMaSP[0]['Thenho'];
            $wifi=$resultSelectByMaSP[0]['Wifi'];
            $pin=$resultSelectByMaSP[0]['Pin'];
            $baoHanh=$resultSelectByMaSP[0]['BaoHanh'];
            $gps=$resultSelectByMaSP[0]['GPS'];
            $mang=$resultSelectByMaSP[0]['Mang'];
            $ngaySX=$resultSelectByMaSP[0]['NgaySX'];
            $bluetooth=$resultSelectByMaSP[0]['Bluetooth'];
            $audio=$resultSelectByMaSP[0]['Audio'];
            $video=$resultSelectByMaSP[0]['Video'];
            $tinhTrang=$resultSelectByMaSP[0]['Tinhtrang'];
            $moTa=$resultSelectByMaSP[0]['Mota'];
        }
        
    ?>
    <div class="container-web">
        <?php require_once '../Shared_Element/Name.php';?>
        <form action="" method="post">
        <div class="form-group">
            <label for="usr">Mã sản phẩm:</label>
            <input type="text" class="form-control" name="txtMaSP" value="<?php echo $maSP; ?>" readonly id="usr">
</div>
        <div class="form-group">
            <label for="usr">Màn hình:</label>
            <input type="text" name="txtManHinh" class="form-control" value="<?php echo $manHinh; ?>" id="usr">
</div>
        <div class="form-group">
                <label for="usr">Rom/Ram:</label>
                <select class="form-control" name="cboRom_Ram" id="sel1">
                    <option value=" ">---Rom/Ram---</option>
                    <option <?= $rom_ram == '1GB' ? 'selected' : '' ?> value="1GB">1GB</option>
                    <option <?= $rom_ram == '2GB' ? 'selected' : '' ?> value="2GB">2GB</option>
                    <option <?= $rom_ram == '3GB' ? 'selected' : '' ?> value="3GB">3GB</option>
                    <option <?= $rom_ram == '4GB' ? 'selected' : '' ?> value="4GB">4GB</option>
                    <option <?= $rom_ram == '16GB' ? 'selected' : '' ?> value="16GB">16GB</option>
                    <option <?= $rom_ram == '32GB' ? 'selected' : '' ?> value="32GB">32GB</option>
                    <option <?= $rom_ram == '64GB' ? 'selected' : '' ?> value="64GB">64GB</option>
                    <option <?= $rom_ram == '128GB' ? 'selected' : '' ?> value="128GB">128GB</option>
        </select>
    </div>
         <div class="form-group">
                <label for="usr">Bộ nhớ trong:</label>
                <select class="form-control" name="cboBoNho" id="sel1">
                    <option value=" ">---Bộ nhớ trong---</option>
                    <option <?= $boNho == '1GB' ? 'selected' : '' ?> value="1GB">1GB</option>
                    <option <?= $boNho == '2GB' ? 'selected' : '' ?> value="2GB">2GB</option>
                    <option <?= $boNho == '3GB' ? 'selected' : '' ?> value="3GB">3GB</option>
                    <option <?= $boNho == '4GB' ? 'selected' : '' ?> value="4GB">4GB</option>
                    <option <?= $boNho == '16GB' ? 'selected' : '' ?> value="16GB">16GB</option>
                    <option <?= $boNho == '32GB' ? 'selected' : '' ?> value="32GB">32GB</option>
                    <option <?= $boNho == '64GB' ? 'selected' : '' ?> value="64GB">64GB</option>
                    <option <?= $boNho == '128GB' ? 'selected' : '' ?> value="128GB">128GB</option>
        </select>
 </div>
 <div class="form-group">
            <label for="usr">CPU:</label>
            <input type="text" name="txtCPU" value="<?php echo $cpu; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
                <label for="usr">Hệ điều hành:</label>
                <select class="form-control" name="cboHDH" id="sel1">
                    <option value=" ">---Hệ điều hành---</option>
                    <option <?= $hdh == 'Android' ? 'selected' : '' ?> value="Android">Android</option>
                    <option <?= $hdh == 'IOS' ? 'selected' : '' ?> value="IOS">IOS</option>
                    <option <?= $hdh == 'Windows Phone' ? 'selected' : '' ?> value="Windows Phone">Windows Phone</option>
                    <option <?= $hdh == 'Symbian' ? 'selected' : '' ?> value="Symbian">Symbian</option>
                    <option <?= $hdh == 'BackBerry OS' ? 'selected' : '' ?> value="BackBerry OS">BackBerry OS</option>
                    <option <?= $hdh == 'Bada' ? 'selected' : '' ?> value="Bada">Bada</option>
        </select>
 </div>
<div class="form-group">
            <label for="usr">Kích thước:</label>
            <input type="text" name="txtKichThuoc" value="<?php echo $kichThuoc; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Trọng lượng:</label>
            <input type="text" name="txtTrongLuong" value="<?php echo $trongLuong; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Camera:</label>
            <input type="text" name="txtCamera" value="<?php echo $camera; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Thẻ nhớ:</label>
            <input type="text" name="txtTheNho" value="<?php echo $theNho; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Wifi:</label>
            <input type="text" name="txtWifi" value="<?php echo $wifi; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Pin:</label>
            <input type="text" name="txtPin" value="<?php echo $pin; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Bảo hành:</label>
            <input type="text" name="txtBaoHanh" value="<?php echo $baoHanh; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">GPS:</label>
            <input type="text" name="txtGPS" value="<?php echo $gps; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Mạng:</label>
            <input type="text" name="txtMang" value="<?php echo $mang; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Ngày sản xuất:</label>
            <input type="date" name="dtNSX" value="<?php echo $ngaySX; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Bluetooth:</label>
            <input type="text" name="txtBluetooth" value="<?php echo $bluetooth; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Audio:</label>
            <input type="text" name="txtAudio" value="<?php echo $audio; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Video:</label>
            <input type="text" name="txtVideo" value="<?php echo $video; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Tình trạng:</label>
            <input type="text" name="txtTinhTrang" value="<?php echo $tinhTrang; ?>" class="form-control" id="usr">
</div>
<div class="form-group">
            <label for="usr">Mô tả:</label>
            <textarea id="MoTa"  name="txtMoTa"><?php echo $moTa; ?></textarea>
</div>
<button type="submit" name="btnCapNhat" class="btn btn-primary ">Cập nhật</button>
<a href="index.php">Quay lại</a>
<div class="moRong"></div>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['btnCapNhat']))
        { 
            $rom_ram=$_POST['cboRom_Ram'];
            $manHinh=$_POST['txtManHinh'];
            $boNho=$_POST['cboBoNho'];
            $cpu=$_POST['txtCPU'];
            $hdh=$_POST['cboHDH'];
            $kichThuoc=$_POST['txtKichThuoc'];
            $trongLuong=$_POST['txtTrongLuong'];
            $camera=$_POST['txtCamera'];
            $theNho=$_POST['txtTheNho'];
            $wifi=$_POST['txtWifi'];
            $pin=$_POST['txtPin'];
            $baoHanh=$_POST['txtBaoHanh'];
            $gps=$_POST['txtGPS'];
            $mang=$_POST['txtMang'];
            $ngaySX=$_POST['dtNSX'];
            $bluetooth=$_POST['txtBluetooth'];
            $audio=$_POST['txtAudio'];
            $video=$_POST['txtVideo'];
            $tinhTrang=$_POST['txtTinhTrang'];
            $moTa=$_POST['txtMoTa'];
            if($resultSelectByMaSP==null)
            {
                $queryInsertCTSP= "INSERT INTO `chitietsanpham`
                (`Masanpham`, `Manhinh`, `RomRam`, `Bonhotrong`, `CPU`, `Hedieuhanh`, `Kichthuoc`,
                 `Trongluong`, `Camera`, `Thenho`, `Wifi`, `Pin`, `BaoHanh`, `GPS`, `Mang`, `NgaySX`, `Bluetooth`, `Audio`, `Video`, `Tinhtrang`, `Mota`)
                  VALUES ('".$maSP."','".$manHinh."','".$rom_ram."','".$boNho."','".$cpu."','".$hdh."','".$kichThuoc."','".$trongLuong."',
                  '".$camera."','".$theNho."','".$wifi."','".$pin."','".$baoHanh."','".$gps."','".$mang."','".$ngaySX."','".$bluetooth."',
                  '".$audio."','".$video."','".$tinhTrang."','".$moTa."')";
                 ChangeData($queryInsertCTSP,"cập nhật");
            }
            else
            {
                $queryUpdateCTSP="UPDATE `chitietsanpham` SET `Manhinh`='".$manHinh."',`RomRam`='".$rom_ram."',
                `Bonhotrong`='".$boNho."',`CPU`='".$cpu."',`Hedieuhanh`='".$hdh."',`Kichthuoc`='".$kichThuoc."',`Trongluong`='".$trongLuong."',
                `Camera`='".$camera."',`Thenho`='".$theNho."',`Wifi`='".$wifi."',`Pin`='".$pin."',`BaoHanh`='".$baoHanh."',`GPS`='".$gps."',
                `Mang`='".$mang."',`NgaySX`='".$ngaySX."',`Bluetooth`='".$bluetooth."',`Audio`='".$audio."',`Video`='".$video."',`Tinhtrang`='".$tinhTrang."',
                `Mota`='".$moTa."' WHERE Masanpham=".$maSP;
                ChangeData($queryUpdateCTSP,"cập nhật");
            }
        }
        ?>
    </div>
    </div>
    <script src="../Frontend/js/Format_Number.js"></script>
    <script>
        $(function(){
            $('#MoTa').summernote({
                height: 500,   //set editable area's height
                codemirror: { // codemirror options
                theme: 'monokai'
  }
});
        })
    </script>

</body>
</html>