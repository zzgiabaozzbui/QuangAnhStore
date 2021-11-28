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
        return "<img src='../$link' style='width: 50px; border-radius: 100%;'>";
    }
    function Table1($result,$table_name,$r){
        if(isset($_POST["txtSearch"]))
            $key=$_POST["txtSearch"];
        else
            $key ="";
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
    function conect($query,$table_name,$r){
        //Step1
        $conn = mysqli_connect("localhost","root","",DATABASE);
        if($conn == true){
            //Step3
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                Table1($result,$table_name,$r);
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
        $query = "SELECT Quyen as Quyen , doanhthu AS size_status,tienpk AS size_status2,tiendt AS size_status3 FROM vm_bd ";
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

    


    function row($query){
        $conn = mysqli_connect("localhost","root","","qldt");
        if($conn == true){
            //Step3
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                $row = mysqli_num_rows($result);
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

    function SelectAll($id){
        
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
    
    function SearchByName(){
        if(isset($_POST["txtSearch"]))
            $key=$_POST["txtSearch"];
        else
            $key ="";
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
        echo "<script type='text/javascript'>";
        echo " var txtSearch = document.getElementById('txtSearch'); txtSearch.value = '".$key."'";
        echo "</script>";
        
        
        conect($query,$table_name,$r);
        
    }
    function SearchByNam($key){
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
        echo "<script type='text/javascript'>";
        echo " var txtSearch = document.getElementById('txtSearch'); txtSearch.value = '".$key."'";
        echo "</script>";
        
        
        conect($query,$table_name,$r);
        
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
            $linkAnh = "../Frontend/img/quantri/";
            if ($_FILES['fileUpload']['error'] > 0) {
                $link = "../Frontend/img/quantri/user.png";
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
            $linkAnh = "../Frontend/img/quantri/";
            if ($_FILES['fileUpload']['error'] > 0) {
                $link = "../Frontend/img/quantri/user.png";
            } else {
                //Copy ảnh và lấy link tương đối
                move_uploaded_file($_FILES['fileUpload']['tmp_name'],"../". $linkAnh . $_FILES['fileUpload']['name']);
                $link = $linkAnh . $_FILES['fileUpload']['name'];
            }

            $tit="";
            echo "<script type='text/javascript'>";
            echo "alert('Một nhân viên mới sẽ được thêm vào !!!');";
            echo "</script>";
            //step2
            $query = "INSERT INTO quantri VALUES( NULL,'".$tk."','".$mk."','".$name."','.$sex.','".$email."','".$dc."','".$date."','".$sdt."','.$quyen.','.$tt.','$link')";
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