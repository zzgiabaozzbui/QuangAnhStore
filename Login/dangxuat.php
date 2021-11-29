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
            
            unset($_SESSION["us"]);
            echo "<script type='text/javascript'>";
            echo "window.location.href='Index.php';";
            echo "</script>";
            
        ?>
    </body>
</html>
