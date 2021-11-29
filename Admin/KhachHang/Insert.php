<?php
    session_start();
    if(!isset($_SESSION["us"]))
    {
        echo "<script type='text/javascript'>";
        echo "alert('Bạn chưa đăng nhập!');";
        echo "window.location.href='http://localhost:8080/QuangAnhStore/Login/Index.php';";
        echo "</script>";
    }

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert customer</title>
    <link rel="stylesheet" href="../../Frontend/css/sideBar.css?version=1">
    <link rel="stylesheet" href="../../Frontend/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./css/insert.css">
       
    </head>
    <body >
        <?php
            require_once('Funcion.php');
            
        ?>

        <div class="main">
            
            <?php
                require "../../Shared_Element/sideBar.php";
            ?>
            <div class="container-web">
                <?php
                    require "../../Shared_Element/Name.php";
                ?>
                <div class="mainup">
                    <div class="tit">
                        <h4 class="hin" >
                            THÊM KHÁCH HÀNG
                        </h4>
                    </div>
                    
                    <form class="mainf"  method="POST" enctype="multipart/form-data">
                        <table class="tbl" >
                            <tr>
                                <td class="lbl">Tài khoản:</td>
                                <td>
                                    <input class="inpu" type="text" name="txtTk" id="txtTk" placeholder="Vui lòng điền tài khoản" size="25" style="background-image: url(https://img.icons8.com/fluency-systems-filled/2x/ffffff/user.png); background-position: left;background-size: 25px;">
                                </td>
                                <td class="lbl">Giới tính:</td>
                                <td style="padding-bottom: 16px;background-image: url(https://img.icons8.com/windows/2x/ffffff/transgender.png);background-repeat: no-repeat; background-position: left 5px;background-size: 30px;">
                                    <input type="radio" checked class="sex" name="sex" id="rdoNam" value="1" >
                                        <label for="rdoNam">Nam</label> 
                                    </input>
                                    <input type="radio" class="sex" name="sex" id="rdoNu" value="0">
                                        <label for="rdoNu" >Nữ</label> 
                                    </input>
                                </td>
                            </tr>
                            
                            <tr>
                                <td  class="lbl" >Mật khẩu:</td>
                                <td>
                                    <input class="inpu" type="text" name="mk" id="mk" placeholder="Vui lòng điền mật khẩu" size="25" style="background-image: url(https://img.icons8.com/material-sharp/2x/ffffff/key.png); background-position: left;background-size: 18px;">
                                </td>
                                <td class="lbl">Trạng thái:  </td>
                                <td>
                                    <select  class="inpu" name="tt" id="tt" style="width: 170px;background-image: url(https://img.icons8.com/material-sharp/2x/ffffff/lock.png); background-position: left;background-size: 18px;">
                                        <option  hidden>Trạng thái</option>
                                        <option value="0">Khóa</option>
                                        <option  value="1">Mở</option>
                                        
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="lbl">Họ và tên:</td>
                                <td>
                                    <input class="inpu" type="text" name="txtTen" id="txtTen" placeholder="Vui lòng điền đầy đủ họ tên" size="25" style="background-image: url(https://img.icons8.com/ios-filled/2x/ffffff/name.png); background-position: left;background-size: 25px;">
                                </td>
                                <td class="lbl">Ngày sinh:</td>
                                <td>
                                    <input type="date"  class="inpu" name="txtNS" id="txtNS" value="<?php echo date('Y-m-d'); ?>" size="25" style="width: 170px;background-image: url(https://img.icons8.com/glyph-neue/2x/ffffff/birthday-presents.png); background-position: left;background-size: 25px;">
                                </td>
                            </tr>
                            <tr>
                                <td class="lbl">Email:</td>
                                <td>
                                    <input class="inpu" type="text" name="txtemail" id="txtemail" placeholder="Nhập email" size="25" style="background-image: url(https://img.icons8.com/external-kiranshastry-solid-kiranshastry/2x/ffffff/external-email-advertising-kiranshastry-solid-kiranshastry-1.png); background-position: left;background-size: 25px;">
                                </td>
                                <td class="lbl">Số điện thoại:</td>
                                <td>
                                    <input class="inpu"  type="text" name="txtsdt" id="txtsdt" placeholder="Nhập số điện thoại" id="txtQQ" size="25" style="width: 170px;background-image: url(https://img.icons8.com/material-sharp/2x/ffffff/phone.png); background-position: left;background-size: 25px;">
                                </td>

                            </tr>
                            
                            <tr>
                                
                                <td class="lbl">Địa chỉ:</td>
                                <td>
                                    <input class="inpu"  type="text" name="txtdc" id="txtdc" placeholder="Nhập địa chỉ" size="25" style="background-image: url(https://img.icons8.com/material-sharp/2x/ffffff/address.png); background-position: left;background-size: 25px;">
                                </td>
                                <td class="lbl">Hình ảnh:</td>
                                <td >
                                <input class="form-control" type="file" name="fileUpload" value="">
                                </td>
                            </tr>
                            <tr></tr>
                        </table>
                        <div class="div--bton">
                            <div>
                                <button onclick="return confirm('Bạn có chắc muốn thêm nhân viên này không ?')" class="btnA" name="btnAdd" type="submit" >
                                            
                                    <b> Thêm</b>
                                </button>
                            </div>
                            
                            <div>
                            <a href="Index.php" style="color: lavenderblush;">Quay lại</a></td>
                            
                            </div>
                            
                        </div>
                           
                        <div>
                        <input type="text" id="erro" disabled size="100%" style="margin-top: 20px; color:yellow;border: none;text-align:right;background: none;font:bold; font-size: 15px;">
                        </div>        
                    </form>
                </div>
        
            </div>
        </div>


            
        
        
        <?php
        
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnAdd'])){
                Insert();
            }
            
            
        ?>
    </body>
</html>
