<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../Css/cauhoi.css">
    <link rel="stylesheet" href="../../../css/HeaderStyle.css">
    <link rel="stylesheet" href="../../../css/FooterStyle.css">
    <title>Document</title>
</head>
<body>
    <?php 
    global $Tentk;
    $Tentk='manhhlunn';
    ?>
    <form action="" method="POST">
    <div class="header">
    <?php require_once '../../TrangchuDT/Header.php'?>
    </div>
    <div class="content">
        <div class="content__title">
            <h1>Hỏi đáp, bình luận</h1>
        </div>
        <div class="content__myques">
            <div class="myques__title">
                <h2>Bạn hãy đặt một câu hỏi hoặc bình luận gì đó ... </h2>
            </div>
            <div class="myques__body">
                <div class="body__input">
                    <textarea name="txtThem" id="" cols="30" rows="5" class="input" ></textarea>
                </div>
                <div class="body__send">
                    <button  class="send" name="btnSend" value=""><i class="ti-comment"></i>  Gửi</button>
                </div>
            </div>
        </div>
        <div class="content__ortherques">
            <div class="ortherques__title">
                 <h2>Các câu hỏi, bình luận khác</h2>
            </div>
            <div class="ortherques__list">
                <?php 

                include './Connect.php';
                $query='Select * from cauhoi order by MaCH desc';
                $result=mysqli_query($conn,$query);
                if(mysqli_num_rows($result)>0)
                {
                while ($row=mysqli_fetch_assoc($result)) {
                    $ava=strtoupper(substr($row['Tentaikhoan'],0,1)) ;
                   echo" <div class='ortherques__element'>";
                   echo" <div class='ortherques__element__name'>";
                   echo"    <div class='name__ava'>";
                   echo"         <div class='ava'>".$ava."</div>";
                   echo"         <h3 style='line-height: 47px;'>".$row['Tentaikhoan']."</h3>";
                   echo"     </div> ";
                   echo"     <div class='time'>";
                   echo"         <i class='ti-timer' style='line-height: 47px;'></i>";
                   $datetime=new DateTime($row['ThoiGian']);
                   $Time=$datetime->format('d/m/Y H:i:s');
                   echo"         <p style='line-height: 47px;'>".$Time."</p>";
                   echo"     </div>";
                   echo" </div>";
                   echo" <div class='ortherques__element__body'>";
                   echo"    <div class='element__body__text'>";
                   echo $row['Cauhoi'];
                   echo"    </div>";
                   echo"    <div class='element__body__rep'>";
                   echo"        <i class='ti-share-alt'></i>Trả lời";
                   echo"    </div>";
                   echo"</div>";
                   echo"<div class='ortherques__element__rep hide'>";
                   echo"    <div class='element__rep__input'>";
                   echo"        <textarea  cols='30' rows='4' class='inputrep' name='txtTraLoi' disabled></textarea>";
                   echo"    </div>";
                   echo"    <div class='element__rep__sendrep'>";
                  
                   echo"        <button class='sendrep' name='sendrep' value='".$row['MaCH']."'><i class='ti-comment-alt'></i> Gửi</button>";
                   echo"    </div>";
                   echo"</div>";
                    
                   echo"<div class='ortherques__list__answer'>";
                   $query2="Select * from traloicauhoi where IDcauhoi='".$row['MaCH']."' ";
                    $result2=mysqli_query($conn,$query2);
                    if(mysqli_num_rows($result2)>0)
                    {
                        while ($row2=mysqli_fetch_assoc($result2)) {
                   echo"    <div class='answer__element'>";
                   echo"        <div class='answer__element__name'>";
                   echo"            <div class='name__ava'>";
                   $ava2=strtoupper(substr($row2['Tentaikhoan'],0,1))  ;
                   echo"                <div class='ava avarep'>".$ava2."</div> ";
                   echo"                <h4 style='line-height: 40px;'>".$row2['Tentaikhoan']."</h4>";
                   echo"            </div>";
                   echo"            <div class='time'>";
                   $datetime2=new DateTime($row2['ThoiGian']);
                   $Time2=$datetime2->format('d/m/Y H:i:s');
                   echo"                <i class='ti-timer' style='line-height: 40px;'></i>";
                   echo"                <p style='line-height: 40px;'>".$Time2."</p>";
                   echo"            </div>";
                   echo"        </div>";
                   echo"        <div class='answer__element__text'>";
                   echo $row2['Cautraloi'];
                   echo"        </div>";
                   echo"    </div>";
                        }
                    }

                        

                   echo"</div>";
                   echo"</div>";
                    }
                }
                if (isset($_GET['MaCH'])) {

                        $MaCH=$_GET['MaCH'];
                        traloi($MaCH);
                    
                  }
                ?>
                
                
            </div>
        </div>
    </div>
    <div class="footer">
    <?php require_once '../../TrangchuDT/Footer.php'?>
    </div>
    <script>
        var hide=document.querySelectorAll('.ortherques__element__rep');
        var btn=document.querySelectorAll('.element__body__rep');
        var input=document.querySelectorAll('.inputrep');
        console.log(input);
        console.log(hide);
        console.log(btn);
        btn.forEach(function (elem, index) {
        elem.onclick=function()
        {
            hide[index].classList.remove('hide');
            input[index].disabled = false;
            
            input.forEach(function (elem2, index2) { 
                if(index2!=index)
                {
                    input[index2].disabled = true;
                    
                }
            });
            hide.forEach(function (elem3, index3) { 
                if(index3!=index)
                {
                    hide[index3].classList.add('hide');
                }
            });
        }
       
        });
        
            
</script>
<?php
     if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['btnSend']))
     {
         themCauHoi();
     }
     if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['sendrep']))
     {
         traloi($_POST['sendrep']);
     }
     function themCauHoi()
     {
        $txtThem = isset($_POST['txtThem']) ? $_POST['txtThem'] : '';
                if($txtThem=='')
                {
                    echo "<script type='text/javascript'> alert('Bạn chưa điền thông tin !!');</script>";exit('');
                }
                else
                {      
                    include './Connect.php';
                    $query="INSERT INTO cauhoi(Tentaikhoan,Cauhoi) VALUES('".$GLOBALS['Tentk']."','".$txtThem."')";
                    $result=mysqli_query($conn,$query);
                    if($result==true)
                    {
                    echo "<script type='text/javascript'> alert('Thành công !!'); </script>";
                    echo"<script>window.location.replace('cauhoi.php');</script>";
                    }
                else
                    {
                    echo "<script type='text/javascript'> alert('Thất bại !!');</script>";
                    }
                }
               
        
                
     }
     function traloi($MaCH)
     {
        $txtTraloi = isset($_POST['txtTraLoi']) ? $_POST['txtTraLoi'] : '';
        if($txtTraloi=='')
        {
            echo "<script type='text/javascript'> alert('Nhập câu trả lời !!'); </script>";
        }
        else
        {
            include './Connect.php';
                    $query="INSERT INTO traloicauhoi(IDcauhoi,Tentaikhoan,Cautraloi) VALUES('".$MaCH."','".$GLOBALS['Tentk']."','".$txtTraloi."')";
                    $result=mysqli_query($conn,$query);
                    if($result==true)
                    {
                    echo "<script type='text/javascript'> alert('Thành công !!'); </script>";
                    echo"<script>window.location.replace('cauhoi.php');</script>";
                    }
                    else
                    {
                    echo "<script type='text/javascript'> alert('Thất bại !!');</script>";
                    }
        }
       
     }

?>
</form>
</body>
</html>