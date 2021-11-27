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
    function show_education($index){
        if ($index=="0") {
            $education="Tiến sĩ";
        } else if ($index=="1"){
            $education="Thạc sĩ";
        }else if ($index=="2"){
            $education="Kỹ sư";
        }else if ($index=="3"){
            $education="Khác";
        }
        return $education;
    }
    function show_quyen($index){
        if ($index=="0") {
            $quyen="Quản trị";
        } else if ($index=="1"){
            $quyen="Quản lý";
        }else if ($index=="2"){
            $quyen="Nhân viên";
        }
        return $quyen;
    }
    
    

    function im($link){
        if($link==NULL){
            return "<img src='../../Frontend/img/quantri/user.png' style='width: 50px; border-radius: 100%;'>";

        }else
        return "<img src=".$link." style='width: 50px; border-radius: 100%;'>";
    }
    function Table1($result,$table_name){
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
    }
    function conect($query,$table_name){
        //Step1
        $conn = mysqli_connect("localhost","root","",DATABASE);
        if($conn == true){
            //Step3
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                Table1($result,$table_name);
            }
            else{
                echo "Data is empty";
            }
        }
        else{
            echo "Connect error:" . mysqli_connect_error();
        }
    }
    function Bieudo(){
        $query = "SELECT MaDong as Quyen , Gia AS size_status FROM sanpham WHERE 1 ";
        $conn = mysqli_connect("localhost","root","","qldt");
        if($conn == true){
            //Step3
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                
                return $result;
            }
            else{
                echo "Data is empty";
            }
        }
        else{
            echo "Connect error:" . mysqli_connect_error();
        }    
    }



    function SelectAll($id){
        $table_name = "tbl_Main";
        // Lệnh chỉ lấy ngày tháng năm:
        // $querySelectKey= "select ID,HoTen,GioiTinh,Date_format(NgaySinh,'%Y-%m-%d') as NgaySinh,
        // QueQuan,TrinhDoHocVan from tblsinhvien ;
        $query = "SELECT * FROM quantri where MaNV='".$id."'";
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
    function Select(){
        $table_name = "tbl_Main";
        $query = "SELECT MaNV, Tendangnhap, Matkhau, fullname, Gioitinh, Sdt, Quyen, Trangthai,img FROM quantri ";
        conect($query,$table_name);    
    }
    function SearchByName(){
        $table_name ="tbl_search";
        $key = $_POST['txtSearch'];
        if($key==''){
            $query = "SELECT MaNV, Tendangnhap, Matkhau, fullname, Gioitinh, Sdt, Quyen, Trangthai,img FROM quantri";
        }else{
            $query = "SELECT MaNV, Tendangnhap, Matkhau, fullname, Gioitinh, Sdt, Quyen, Trangthai,img FROM quantri where fullname like N'%".$key."%'";
        }
        echo "<script type='text/javascript'>";
        echo " var txtSearch = document.getElementById('txtSearch'); txtSearch.value = '".$key."'";
        echo "</script>";
        
        conect($query,$table_name);     
        
    }
    




    function Update($id,$tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt){
        $tit="";
        if ($tk=="") {
            $tit="Vui lòng không để trống số tài khoản của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        } else if($name=="") {
            $tit = "Vui lòng không để trống họ và tên của nhân viên!!!";
        
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($sex=="") {
            $tit="Vui lòng không để trống giới tính của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($email=="") {
            $tit="Vui lòng không để trống email của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($date=="") {
            $tit = "Vui lòng không để trống ngày sinh của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($dc=="") {
            $tit="Vui lòng không để trống địa chỉ của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($sdt=="") {
            $tit="Vui lòng không để trống số điện thoại của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($quyen=='Chọn quyền') {
            $tit="Vui lòng chọn quyền của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($tt=="Trạng thái") {
            $tit="Vui lòng chọn trạng thái của tài khoản!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else{
            $linkAnh = "../../Frontend/img/quantri/";
            if ($_FILES['fileUpload']['error'] > 0) {
                $link = "../../Frontend/img/quantri/user.png";
            } else {
                //Copy ảnh và lấy link tương đối
                move_uploaded_file($_FILES['fileUpload']['tmp_name'], $linkAnh . $_FILES['fileUpload']['name']);
                $link = $linkAnh . $_FILES['fileUpload']['name'];
            }

            $tit="";
            //Step1
            $conn = mysqli_connect("localhost","root","",DATABASE);
            if($conn == true){
                //step2
                $query = "UPDATE quantri SET Tendangnhap= '".$tk."',Matkhau='".$mk."',fullname='".$name."',Gioitinh ='.$sex.',Email ='".$email."',Diachi='".$dc."',Ngaysinh='".$date."',Sdt='".$sdt."',Quyen='.$quyen.',Trangthai='.$tt.',img='".$link."' WHERE MaNV= ".$id."";
                // echo $query;
                //Step3
                $result = mysqli_query($conn,$query);
                if($result==true){
                    $tit=  "Update data success";
                    md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
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
    function md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt){
        
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
        echo " var quyen = document.getElementById('quyen'); quyen.value = '".$quyen."';";
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
        $quyen=$_POST["quyen"];
        $tt=$_POST["tt"];
        if ($tk=="") {
            $tit="Vui lòng không để trống số tài khoản của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        } else if($name=="") {
            $tit = "Vui lòng không để trống họ và tên của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($sex=="") {
            $tit="Vui lòng không để trống giới tính của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($email=="") {
            $tit="Vui lòng không để trống email của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($date=="") {
            $tit = "Vui lòng không để trống ngày sinh của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($dc=="") {
            $tit="Vui lòng không để trống địa chỉ của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($sdt=="") {
            $tit="Vui lòng không để trống số điện thoại của nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($quyen=="Chọn quyền") {
            $tit="Vui lòng chọn quền cho nhân viên!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else if($tt=="Trạng thái") {
            $tit="Vui lòng chọn trạng thái của tài khoản!!!";
            md($tk,$mk,$name,$sex,$email,$dc,$date,$sdt,$quyen,$tt);
        }else{
            $linkAnh = "../../Frontend/img/quantri/";
            if ($_FILES['fileUpload']['error'] > 0) {
                $link = "../../Frontend/img/quantri/user.png";
            } else {
                //Copy ảnh và lấy link tương đối
                move_uploaded_file($_FILES['fileUpload']['tmp_name'], $linkAnh . $_FILES['fileUpload']['name']);
                $link = $linkAnh . $_FILES['fileUpload']['name'];
            }

            $tit="";
            echo "<script type='text/javascript'>";
            echo "alert('Một nhân viên mới sẽ được thêm vào !!!');";
            echo "</script>";
            //step2
            $query = "INSERT INTO quantri VALUES( NULL,'".$tk."','".$mk."','".$name."','.$sex.','".$email."','".$dc."','".$date."','".$sdt."','.$quyen.','.$tt.','.$link.')";
            //Step1
            $conn = mysqli_connect("localhost","root","",DATABASE);
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
?>