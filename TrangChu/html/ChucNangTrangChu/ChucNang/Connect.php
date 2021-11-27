<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        $host="localhost";
        $user="root";
        $pass="";
        $database="qldt";
        $conn=mysqli_connect($host,$user,$pass,$database);
        if($conn==true)
        {
        }   
        else
        {
            echo "Connect fail :" .mysqli_connect_errno();
            exit;

        } 
    ?>
    
    
</body>
</html>