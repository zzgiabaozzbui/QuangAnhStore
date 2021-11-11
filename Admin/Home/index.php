<?php
 require "../Shared_Element/DB.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Frontend/css/SanPham.css?Version=2">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        .container__header{
            display: flex;
            width: 99%;
            margin-left: 0;
            padding-left: 20px;
            padding-right: 20px;
            margin: 20px 0px 0px 10px;
            height: 150px;
        }
        .container__header a{
            flex: 1;
        }
        .container__header .item--nav{
            background-color: red;
            margin-right: 14px;
        }
        .container__header .nav--left{
            display: block;
            padding: 0 0px 0px 26px;
        }
        .container__header .nav--right{
            display: block;
            padding: 0 0px 0px 26px;
        }
    </style>
</head>
<body>
    <div class="main">
        <?php
        require "../Shared_Element/sideBar.php";
        ?>
        <div class="container">
            <?php
            require_once "../Shared_Element/Name.php" ;
            ?>
            <div class="container__header">
                <a id="1" class="item--nav">
                    <div class="nav--left">

                    </div>
                    <div class="nav--right">

                    </div>
                </a>
            </div>
            
            
        </div>
        
    </div>
</body>
</html>