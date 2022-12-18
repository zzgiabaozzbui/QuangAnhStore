<?php
ob_start();
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="./login.css">
    <style>
        .main {
            z-index: 99;
            position: absolute;
            width: 100%;
            margin: auto;
            top: 0;
            left: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            outline: none;
        }

        .login--admin {
            background: linear-gradient(rgb(2 105 172), rgb(93 177 206 / 54%));
            border-radius: 10px;
            max-width: 430px;
            height: 500px;
            margin: 120px auto;
            padding: 20px 20px;
            box-shadow: 0 2px 12px 0 rgb(0 0 0 / 40%);

        }

        .login__btnLogin {
            color: white;
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            border: none;
            margin-top: 40px;
            margin-right: 5px;
            padding: 10px;
            width: 60%;
            border-radius: 4px;
            background: linear-gradient(to right, #B2FEFA, #0ED2F7);
        }

        .mess-icon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
            background-image: url("http://localhost/QuangAnhStore/Login/KhachHang/img/error.png");
            background-repeat: no-repeat;

        }

        .failed {
            content: "";
            display: none;
            justify-content: flex-start;
            align-items: center;
            background: #fbe0e0e6;
            color: #ff8d8d;
            border-radius: 3px;
            padding-left: 10px;

        }

        .remem {
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        .remember {
            width: 50%;
        }
    </style>
    <?php
    if (isset($_COOKIE['us']) and isset($_COOKIE['ps'])) {
        $key =  $_COOKIE['us'];
        $key2 = $_COOKIE['ps'];
        $img = "";
        $name = "";
        $query = "SELECT img,fullname  FROM quantri WHERE Tendangnhap = '" . $key . "' ";
        $conn = mysqli_connect("localhost", "root", "", "qldt");
        if ($conn == true) {
            //Step3
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row2 = mysqli_fetch_assoc($result)) {
                    $img = 'http://localhost/QuangAnhStore/Admin/' . $row2["img"];
                    $name = $row2["fullname"];
                }
                if ($img == NULL)
                    $img = "http://localhost/QuangAnhStore/Login/KhachHang/img/logo2.png";
                else 
                        if ($name == NULL)
                    $name = "LOGIN";
                else {

                    $img = $img;
                    $name = $name;
                }
            } else {
                $name = "LOGIN";
            }
        } else {
            $name = "LOGIN";
        }
    } else {
        $img = "http://localhost/QuangAnhStore/Login/KhachHang/img/logo2.png";
        $name = "Đăng nhập vào QuangAnhStore";
    } ?>
</head>

<body>
    <main>
        <section class="main">
            <div class="login--admin" align="center">
                <form class="login-admin-form" method="post">
                    <div class="login__title">
                        <img class="login__i" src="<?php echo $img; ?>" alt="userlogin">
                        <br>
                        <div class="login__title"><b><?php echo $name; ?></b></div>
                    </div>
                    <br>
                    <div class="login__tk">
                        <div align="left">
                            <b>Username:</b>

                            <br>
                            <input required id="txtus" name="txtus" class="login__txttk" type="text" size="40" placeholder="Type your username">
                        </div>
                        <br>
                        <div align="left">
                            <b>Password: </b>
                            <br>
                            <input required id="txtps" name="txtps" class="login__txttk" type="text" size="40" placeholder="Type your password">
                        </div>
                    </div>
                    <br />
                    <div class="remem">
                        <div class="remember">
                            <input class="rp" type="checkbox" name="cborp" id="cborp" value="remember" />
                            <label class="lblcbo" for="remember">Remember password</label>
                        </div>
                        <a class="forge" href="https://www.facebook.com/adminQLKS" style="font-size: 11px;">Forget password?</a>
                    </div>

                    <br />
                    <div class="failed" id="failed">
                        <span class="mess-icon"></span>
                        <span class="messerror" id="messerror"></span>
                    </div>
                    <button type="submit" name="login__btnlogin" id="login__btnlogin" class="login__btnLogin"><b>Đăng nhập</b> </button>

                </form>
            </div>
        </section>

    </main>
    <?php
    if (isset($_COOKIE['us']) and isset($_COOKIE['ps'])) {
        echo "<script type='text/javascript'>";
        echo " var txtus = document.getElementById('txtus'); txtus.value = '" . $key . "';";
        echo " var txtps = document.getElementById('txtps'); txtps.value = '" . $key2 . "';";
        echo " var txtps = document.getElementById('cborp').checked = true;";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo " var txtps = document.getElementById('cborp').checked = false;";
        echo "</script>";
    }

    require_once("datbase.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['login__btnlogin'])) {
        if (isset($_POST['cborp'])) {
            setcookie("us", $_POST["txtus"], time() + 30000, '/');
            // $_COOKIE['us'];
            setcookie("ps", $_POST["txtps"], time() + 30000, '/');
            // $_COOKIE['ps'];
        } else {
            setcookie("us", $_POST["txtus"], time() - 300000, '/');
            // $_COOKIE['us'];
            setcookie("ps", $_POST["txtps"], time() - 300000, '/');
            // $_COOKIE['ps'];
        }



        $_SESSION['us'] = $_POST["txtus"];
        //echo $_SESSION['us'];
        login();
    }
    ?>
</body>

</html>