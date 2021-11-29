<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update customer</title>
    <link rel="stylesheet" href="../../Frontend/css/sideBar.css?version=1">
    <link rel="stylesheet" href="../../Frontend/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./css/Update.css">
        
    </head>
    <body >
        <?php
            require('Funcionkh.php');
            $id= $_GET["ID"];
            $row=SelectAll($id);
            $tk=$row["Tendangnhap"];
            $mk=$row["Matkhau"];
            $name=$row["fullname"];
            $sex=$row["Gioitinh"];
            $email=$row["Email"];
            $dc=$row["Diachi"];
            $date=$row["Ngaysinh"];
            $sdt=$row["sdt"];
            $tt=$row["Trangthai"];
            
            
        ?>

        <div class="main">
            
            
            <div class="mainup">
                <div class="tit">
                    <h4 class="hupdate" >
                        CHI TIẾT TÀI KHOẢN
                    </h4>
                </div>
                
                <form class="mainf" action="#" method="POST" enctype="multipart/form-data">
                <table class="tbl" >
                        <tr>
                            <td class="lbl">Tài khoản:</td>
                            <td>
                                <input class="inpu" type="text" name="txtTk" id="txtTk" value="<?php echo $tk;?>" size="25" style="background-image: url(https://img.icons8.com/fluency-systems-filled/2x/ffffff/user.png); background-position: left;background-size: 25px;">
                            </td>
                            <td class="lbl">Giới tính:</td>
                            <td style="padding-bottom: 16px;background-image: url(https://img.icons8.com/windows/2x/ffffff/transgender.png);background-repeat: no-repeat; background-position: left 5px;background-size: 30px;">
                                <input type="radio" checked <?php if($sex== 1) echo 'checked' ;else echo '';?> class="sex" name="sex" id="rdoNam" value="1" >
                                    <label for="rdoNam">Nam</label> 
                                </input>
                                <input type="radio" <?php if($sex== 0) echo 'checked' ;else echo '';?> class="sex" name="sex" id="rdoNu" value="0">
                                    <label for="rdoNu" >Nữ</label> 
                                </input>
                            </td>
                        </tr>
                        
                        <tr>
                            <td  class="lbl" >Mật khẩu:</td>
                            <td>
                                <input class="inpu" type="text" name="mk" id="mk" value="<?php echo $mk;?>" size="25" style="background-image: url(https://img.icons8.com/material-sharp/2x/ffffff/key.png); background-position: left;background-size: 18px;">
                            </td>
                            <td class="lbl">Trạng thái:  </td>
                            <td>
                                <select  class="inpu" name="tt" id="tt" style="width: 170px;background-image: url(https://img.icons8.com/material-sharp/2x/ffffff/lock.png); background-position: left;background-size: 18px;">
                                    <option  hidden>Trạng thái</option>
                                    <option <?= $tt == 0 ? 'selected' : '' ?> value="0">Khóa</option>
                                    <option  <?= $tt == 1 ? 'selected' : '' ?> value="1">Mở</option>
                                    
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="lbl">Họ và tên:</td>
                            <td>
                                <input class="inpu" type="text" name="txtTen" id="txtTen" value="<?php echo $name;?>" size="25" style="background-image: url(https://img.icons8.com/ios-filled/2x/ffffff/name.png); background-position: left;background-size: 25px;">
                            </td>
                            <td class="lbl">Ngày sinh:</td>
                            <td>
                                <input type="date"  class="inpu" name="txtNS" id="txtNS" value="<?php echo $date;?>" size="25" style="width: 170px;background-image: url(https://img.icons8.com/glyph-neue/2x/ffffff/birthday-presents.png); background-position: left;background-size: 25px;">
                            </td>
                        </tr>
                        <tr>
                            <td class="lbl">Email:</td>
                            <td>
                                <input class="inpu" type="text" name="txtemail" id="txtemail" value="<?php echo $email;?>" size="25" style="background-image: url(https://img.icons8.com/external-kiranshastry-solid-kiranshastry/2x/ffffff/external-email-advertising-kiranshastry-solid-kiranshastry-1.png); background-position: left;background-size: 25px;">
                            </td>
                            <td class="lbl">Số điện thoại:</td>
                            <td>
                                <input class="inpu"  type="text" name="txtsdt" id="txtsdt" value="<?php echo $sdt;?>" id="txtQQ" size="25" style="width: 170px;background-image: url(https://img.icons8.com/material-sharp/2x/ffffff/phone.png); background-position: left;background-size: 25px;">
                            </td>

                        </tr>
                        
                        <tr>
                            
                            <td class="lbl">Địa chỉ:</td>
                            <td>
                                <input class="inpu"  type="text" name="txtdc" id="txtdc" value="<?php echo $dc;?>" size="25" style="background-image: url(https://img.icons8.com/material-sharp/2x/ffffff/address.png); background-position: left;background-size: 25px;">
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
                            <button onclick="return confirm('Bạn có chắc muốn sửa thông tin khách hàng này không ?')" class="btnS" name="btnSave" type="submit" >
                                        
                                <b> Cập nhật</b>
                            </button>
                        </div>
                        
                        <div>
                        <a href="http://localhost/QuangAnhStore/Login/Loginkh.php" style="color: lavenderblush;">Quay lại</a></td>
                        
                        </div>
                        
                    </div>
                    <div>
                    <input type="text" id="erro" disabled size="100%" style="margin-top: 20px; color:yellow;border: none;text-align:right;background: none;font:bold; font-size: 15px;">
                    </div>                             
                            
                </form>
            </div>
        </div>
         
        
        
        <?php
        
            

            
            $id= $_GET["ID"];
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnSave'])){
                $tk=$_POST["txtTk"];
                $mk=$_POST["mk"];
                $name=$_POST["txtTen"];
                $sex=$_POST["sex"];
                $email=$_POST["txtemail"];
                $dc=$_POST["txtdc"];
                $date=$_POST["txtNS"];
                $sdt=$_POST["txtsdt"];
                $tt=$_POST["tt"];
                Update($id,$tk,$mk,$name,$sex,$email,$sdt,$dc,$date,$tt);
            }
            
            
            
        ?>
    </body>
</html>
