<?php
    session_start();

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="login.js"></script>
    <link rel="stylesheet" href="login.css">
    <style>
        
        body
        {
            text-align: center;
            -webkit-font-smoothing: antialiased;
            color: #fff;
            padding: 0;
            margin: 0;
        }

        .main{
            background: linear-gradient(rgb(2 105 172), rgb(93 177 206 / 84%), rgb(233 233 233 / 52%));
            z-index: 99;
            position: absolute;
            width: 100%;
            height: 100vh;
            top: 0;
            left: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            outline: none;
        }
        .login--admin{
            background-image: linear-gradient(#ff0026,#009FFF);
            border-radius: 10px;
            width: 300px;
            height: 350px;
            margin: 120px auto;
            padding: 20px 20px;
            box-shadow: 50px 50px 70px #333;
            
        }
        .login__btnLogin{
            color: white;
            font-family: 'Times New Roman', Times, serif;;
            font-size: 20px;
            border: none;
            background-image: linear-gradient(to right,#f0465f94,#3aabf1a8);;
            margin-top: 40px;
            margin-right: 5px;
            padding: 10px;
            width: 40%;
            border-radius: 40px;
        }
        
    </style>
    <?php
    if(isset($_COOKIE['us']) and isset($_COOKIE['ps'])){
        $key =  $_COOKIE['us'];
        $key2 = $_COOKIE['ps'];
        $query = "SELECT img,fullname  FROM quantri WHERE Tendangnhap = '".$key."' ";
        $conn = mysqli_connect("localhost","root","","qldt");
        if($conn == true){
            //Step3
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                while ($row2=mysqli_fetch_assoc($result)) {
                    $img='http://localhost/QuangAnhStore/Admin/'.$row2["img"];
                    $name=$row2["fullname"];
                }
                if($img==NULL)
                    $img= "http://localhost/QuangAnhStore/Admin/Frontend/img/quantri/user.png";
                else if($name==NULL)
                    $name= "LOGIN";
                else
                    $img = $img;
                    $name= $name;
            }
            else{
                $name= "LOGIN";
            }
        }
        else{
            $name= "LOGIN";
        }   
    }
    else{
        $img= "http://localhost/QuangAnhStore/Admin/Frontend/img/quantri/user.png";
        $name= "LOGIN";
    }
    ?>
</head>
<body >
    <main>
        <section class="main">
            <div class="login--admin" align="center">
                <form method="post">
                    <div class="login__title" >
                        <img class="login__i" src="<?php echo $img;?>" alt="userlogin">
                        <br>
                        <b class="login__title"><?php echo $name;?></b> 
                    </div>
                    <br>
                    <div class="login__tk">
                        <div align="left"  >
                            <b>Username:</b>
                            
                            <br>
                            <input id="txtus" name="txtus" class="login__txttk" type="text" size="40" placeholder="Type your username"  >
                        </div> 
                        <br>
                        <div align="left" >
                            <b>Password: </b>
                            <br>
                            <input id="txtps" name="txtps" class="login__txttk" type="text" size="40" placeholder="Type your password"  >
                        </div> 
                    </div>
                    <div >
                        <input  class="rp"  type="checkbox" name="cborp" id="cborp" value="remember">
                        <label class="lblcbo" for="remember">Remember password</label>
                        <a class="forge" href="https://www.facebook.com/adminQLKS" style="font-size: 11px;">Forget password?</a>
                    </div>
                    
                    <button  type="submit" name="login__btnlogin" id="login__btnlogin" class="login__btnLogin"><b>Log In</b> </button>
                    
                </form>
            </div>
        </section>
    
    </main>
    <?php
    if(isset($_COOKIE['us']) and isset($_COOKIE['ps'])){
        $key =  $_COOKIE['us'];
        $key2 = $_COOKIE['ps'];
        echo "<script type='text/javascript'>";
        echo " var txtus = document.getElementById('txtus'); txtus.value = '".$key."';";
        echo " var txtps = document.getElementById('txtps'); txtps.value = '".$key2."';";
        echo " var txtps = document.getElementById('cborp').checked = true;";
        echo "</script>";
    }else{
        echo "<script type='text/javascript'>";
        echo " var txtps = document.getElementById('cborp').checked = false;";
        echo "</script>";
    }
        
    ?>
    <?php
        
        require_once("datbase.php");
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['login__btnlogin']) ) {
            if(isset($_POST['cborp'])){
                setcookie("us",$_POST["txtus"], time() + 3000,'/');
                // $_COOKIE['us'];
                setcookie("ps", $_POST["txtps"], time() + 3000,'/');
                // $_COOKIE['ps'];
            }
            else{
                setcookie("us",$_POST["txtus"], time() - 30000,'/');
                // $_COOKIE['us'];
                setcookie("ps", $_POST["txtps"], time() - 30000,'/');
                // $_COOKIE['ps'];
            }
            
            

            $_SESSION['us'] = $_POST["txtus"];
            //echo $_SESSION['us'];
            login();
        }
        
    ?>
</body>
</html>
