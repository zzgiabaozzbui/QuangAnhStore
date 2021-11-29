<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>dangxuat</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
            
            session_destroy();
            echo "<script type='text/javascript'>";
            echo "alert('Đăng xuất thành công');";
            echo "window.location.href='Index.php';";
            echo "</script>";
            
        ?>
    </body>
</html>
