<?php
    function show_sex($index){
        if ($index=="1") {
            $sex="Nam";
        } else if ($index=="0"){
            $sex="Nữ";
        }else {
            $sex="Nam";
        }
        return $sex;
    }
    function show_tt($index){
        if ($index=="1") {
            $tt="Mở";
        } else if ($index=="0"){
            $tt="Khóa";
        }
        return $tt;
    }
    
    function SelectAll($id){
        
        $query = "SELECT * FROM KhachHang where MaKH='".$id."'";
        $conn = mysqli_connect("localhost","root","","qldt");
        if($conn == true){
            //Step3
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);
                return $row;
            }
            else{
                echo "Data is empty";
            }
        }
        else{
            echo "Connect error:" . mysqli_connect_error();
        }    
    }

    
    function Update($id,$tk,$mk,$name,$sex,$email,$sdt,$dc,$date,$tt){
        $tit="";
        if ($tk=="") {
            $tit="Vui lòng không để trống số tài khoản !!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$tt);
        } else if($name=="") {
            $tit = "Vui lòng không để trống họ và tên !!!";
        
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$tt);
        }else if($sex=="") {
            $tit="Vui lòng không để trống giới tính !!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$tt);
        }else if($email=="") {
            $tit="Vui lòng không để trống email !!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$tt);
        }else if($date=="") {
            $tit = "Vui lòng không để trống ngày sinh !!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$tt);
        }else if($dc=="") {
            $tit="Vui lòng không để trống địa chỉ !!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$tt);
        }else if($sdt=="") {
            $tit="Vui lòng không để trống số điện thoại !!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$tt);
        }else if($tt=="Trạng thái") {
            $tit="Vui lòng chọn trạng thái của tài khoản!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$tt);
        }else{
            $linkAnh = "http://localhost/QuangAnhStore/AdminFrontend/img/khachhang/";
            if ($_FILES['fileUpload']['error'] > 0) {
                $link = "http://localhost/QuangAnhStore/AdminFrontend/img/khachhang/user.png";
            } else {
                //Copy ảnh và lấy link tương đối
                move_uploaded_file($_FILES['fileUpload']['tmp_name'], $linkAnh . $_FILES['fileUpload']['name']);
                $link = $linkAnh . $_FILES['fileUpload']['name'];
            }
            $tit="";
            //Step1
            $conn = mysqli_connect("localhost","root","","qldt");
            if($conn == true){
                //step2
                $query = "UPDATE khachhang SET Tendangnhap= '".$tk."',Matkhau='".$mk."',fullname='".$name."',Gioitinh ='.$sex.',Email ='".$email."',Diachi='".$dc."',Ngaysinh='".$date."',Sdt='".$sdt."',Trangthai='.$tt.',img='".$link."'  WHERE MaKH= ".$id."";
                // echo $query;
                //Step3
                $result = mysqli_query($conn,$query);
                if($result==true){
                    $tit=  "Update data success";
                    md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$$tt);
                }
                else{
                    $tit=  "Update data failed";
                    
                }
            }
            else{
                $tit=  "Connect error:" . mysqli_connect_error();
            }
        }
        tbErro($tit);
    }
    function md($tk,$mk,$name,$sex,$email,$sdt,$dc,$date,$tt){
        
        echo "<script type='text/javascript'>";
        echo " var txttk = document.getElementById('txtTk'); txtTk.value = '".$tk."';";
        echo " var txtmk = document.getElementById('mk'); txtmk.value = '".$mk."';";
        echo " var txtTen = document.getElementById('txtTen'); txtTen.value = '".$name."';";

        if ($sex=="0") {
            echo " var rdoNu = document.getElementById('rdoNu'); rdoNu.checked = true;";
        } else {
            echo " var rdoNam = document.getElementById('rdoNam'); rdoNam.checked = true;";
        }

        echo " var txtemail = document.getElementById('txtemail'); txtemail.value = '".$email."';";
        echo " var txtdc = document.getElementById('txtdc'); txtdc.value = '".$dc."';";
        echo " var txtNS = document.getElementById('txtNS'); txtNS.value = '".$date."';";
        echo " var txtsdt = document.getElementById('txtsdt').value='".$sdt."';";
        echo " var tt = document.getElementById('tt').value='".$tt."';";
        echo "</script>";
    }
    function tbErro($tit){
        echo "<script type='text/javascript'>";
        echo " var txtTen = document.getElementById('erro'); txtTen.value = '$tit';";
        echo "</script>";
    }
    function Insert(){
        $tk=$_POST["txtTk"];
        $mk=$_POST["mk"];
        $name=$_POST["txtTen"];
        $sex=$_POST["sex"];
        $email=$_POST["txtemail"];
        $dc=$_POST["txtdc"];
        $date=$_POST["txtNS"];
        $sdt=$_POST["txtsdt"];
        $tt=$_POST["tt"];
        if ($tk=="") {
            $tit="Vui lòng không để trống số tài khoản !!!";
            md($tk,$mk,$name,$sex,$email,$sdt,$dc,$date,$tt);
        } else if($name=="") {
            $tit = "Vui lòng không để trống họ và tên !!!";
            md($tk,$mk,$name,$sex,$email,$sdt,$dc,$date,$tt);
        }else if($sex=="") {
            $tit="Vui lòng không để trống giới tính !!!";
            md($tk,$mk,$name,$sex,$email,$sdt,$dc,$date,$tt);
        }else if($email=="") {
            $tit="Vui lòng không để trống email !!!";
            md($tk,$mk,$name,$sex,$email,$sdt,$dc,$date,$tt);
        }else if($date=="") {
            $tit = "Vui lòng không để trống ngày sinh !!!";
            md($tk,$mk,$name,$sex,$email,$sdt,$dc,$date,$tt);
        }else if($dc=="") {
            $tit="Vui lòng không để trống địa chỉ !!!";
            md($tk,$mk,$name,$sex,$email,$sdt,$dc,$date,$tt);
        }else if($sdt=="") {
            $tit="Vui lòng không để trống số điện thoại !!!";
            md($tk,$mk,$name,$sex,$email,$sdt,$dc,$date,$tt);
        
        }else if($tt=="Trạng thái") {
            $tit="Vui lòng chọn trạng thái của tài khoản!!!";
            md($tk,$mk,$name,$sex,$email,$sdt,$dc,$date,$tt);
        }else{
            $linkAnh = "http://localhost/QuangAnhStore/Admin/Frontend/img/khachhang/";
            if ($_FILES['fileUpload']['error'] > 0) {
                $link = "http://localhost/QuangAnhStore/Admin/Frontend/img/khachhang/user.png";
            } else {
                //Copy ảnh và lấy link tương đối
                move_uploaded_file($_FILES['fileUpload']['tmp_name'], $linkAnh . $_FILES['fileUpload']['name']);
                $link = $linkAnh . $_FILES['fileUpload']['name'];
            }
            $tit="";
            echo "<script type='text/javascript'>";
            echo "alert('Một khách hàng mới sẽ được thêm vào !!!');";
            echo "</script>";
            //step2
            $query = "INSERT INTO khachhang VALUES( NULL,'".$tk."','".$mk."','".$name."','.$sex.','".$email."','".$sdt."','".$dc."','".$date."','.$tt.','$link')";
            echo $query;
            //Step1
            $conn = mysqli_connect("localhost","root","","qldt");
            if($conn == true){
                
                //Step3
                $result = mysqli_query($conn,$query);
                if($result==true){
                    
                    $tit= "Insert data success";
                }
                else{
                    $tit= "Insert data failed";
                }
            }
            else{
                $tit= "Connect error:" . mysqli_connect_error();
            }
        }
        tbErro($tit);
    }

    function md2($tk,$name,$sex,$email,$sdt,$dc,$date){
        
        echo "<script type='text/javascript'>";
        echo " var txttk = document.getElementById('txtTk'); txtTk.value = '".$tk."';";
        echo " var txtTen = document.getElementById('txtTen'); txtTen.value = '".$name."';";

        if ($sex=="0") {
            echo " var rdoNu = document.getElementById('rdoNu'); rdoNu.checked = true;";
        } else {
            echo " var rdoNam = document.getElementById('rdoNam'); rdoNam.checked = true;";
        }

        echo " var txtemail = document.getElementById('txtemail'); txtemail.value = '".$email."';";
        echo " var txtdc = document.getElementById('txtdc'); txtdc.value = '".$dc."';";
        echo " var txtNS = document.getElementById('txtNS'); txtNS.value = '".$date."';";
        echo " var txtsdt = document.getElementById('txtsdt').value='".$sdt."';";
        echo "</script>";
    }

    function forge(){
        $tk=$_POST["txtTk"];
        echo $tk;
        $name=$_POST["txtTen"];
        $sex=$_POST["sex"];
        $email=$_POST["txtemail"];
        $dc=$_POST["txtdc"];
        $date=$_POST["txtNS"];
        $sdt=$_POST["txtsdt"];
        if ($tk=="") {
            $tit="Vui lòng không để trống số tài khoản !!!";
            md2($tk,$name,$sex,$email,$sdt,$dc,$date);
        } else if($name=="") {
            $tit = "Vui lòng không để trống họ và tên !!!";
            md2($tk,$name,$sex,$email,$sdt,$dc,$date);
        }else if($sex=="") {
            $tit="Vui lòng không để trống giới tính !!!";
            md2($tk,$name,$sex,$email,$sdt,$dc,$date);
        }else if($email=="") {
            $tit="Vui lòng không để trống email !!!";
            md2($tk,$name,$sex,$email,$sdt,$dc,$date);
        }else if($date=="") {
            $tit = "Vui lòng không để trống ngày sinh !!!";
            md2($tk,$name,$sex,$email,$sdt,$dc,$date);
        }else if($dc=="") {
            $tit="Vui lòng không để trống địa chỉ !!!";
            md2($tk,$name,$sex,$email,$sdt,$dc,$date);
        }else if($sdt=="") {
            $tit="Vui lòng không để trống số điện thoại !!!";
            md2($tk,$name,$sex,$email,$sdt,$dc,$date);
        
        
        }else{
           
            $tit="";
            //step2
            $query = "Select Matkhau from khachhang where Tendangnhap='".$tk."' and fullname='".$name."' and Gioitinh = '$sex' and Email = '".$email."' and sdt='".$sdt."' and Diachi ='".$dc."' and Ngaysinh ='".$date."'";
            //echo $query;
            //Step1
            $conn = mysqli_connect("localhost","root","","qldt");
            if($conn == true){
                
                //Step3
                $result = mysqli_query($conn,$query);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                    $mk = $row["Matkhau"];}
                }
                else{
                    $tit= "không tìm thấy tài khoản";
                }
            }
            else{
                $tit= "Connect error:" . mysqli_connect_error();
            }
        }
        tbErro($tit);
        if($mk!=""){
            echo "<script type='text/javascript'>";
            echo "alert('Mật khẩu của tài khoản này là: ".$mk."');";
            echo "</script>";
        }
    }
?>