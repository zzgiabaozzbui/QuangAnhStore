<!DOCTYPE html>
<html>
    <head>
        <title>Delete</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h3>Delete</h3>
        <?php
            $ID = $_GET['ID'];
            //Step1
            $conn = mysqli_connect("localhost","root","",DATABASE);
            if($conn == true){
                echo "'".$ID."'";
                //step2
                $query = "Delete FROM quantri where MaNV = ".$ID."";
                //Step3
                $result = mysqli_query($conn,$query);
                if($result>0){
                    echo "<script type='text/javascript'>";
                    echo "alert('Xóa nhân viên thành công!!');";
                    echo "window.location.href='Index.php';";
                    echo "</script>";
                    
                }
                else{
                    echo "Data is empty";
                }
            }
            else{
                echo "Connect error:" . mysqli_connect_error();
            }
        ?>
    </body>
</html>