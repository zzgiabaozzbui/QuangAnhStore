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
        
        @media screen and (max-width: 830px)
        {
            section 
            {
                overflow-y: scroll;
            }
        }
    </style>
</head>
<body >
    <main>
        <section class="main">
            <div class="login--admin" align="center">
                <form action="#" method="post">
                    <div class="login__title" >
                        <img class="login__i" src="../Admin/Frontend/icon/bao.jpg" alt="userlogin">
                        <br>
                        <b class="login__title">Admin</b> 
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
                        <input  class="rp"  type="checkbox" name="" id="cborp" value="remember">
                        <label class="lblcbo" for="remember">Remember password</label>
                        <i class="forge"  >Forget password?</i>
                    </div>
                    
                    <button  type="submit" name="login__btnlogin" id="login__btnlogin" class="login__btnLogin"><b>Log In</b> </button>
                    
                </form>
            </div>
        </section>
    
    </main>
    <section class="aboutSection">
    <div class="container aboutContent">
 
       <h1>About</h1>
 
       <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt asperiores libero suscipit in sit exercitationem ad blanditiis. Reiciendis vero sed ipsam delectus in! Fuga omnis recusandae adipisci odio libero ipsa. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt asperiores libero suscipit in sit exercitationem ad blanditiis. Reiciendis vero sed ipsam delectus in! Fuga omnis recusandae adipisci odio.</p>
 
 
       <button class="home">Home</button>
 
    </div>
   </section>
    <?php
        
        require_once("datbase.php");
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['login__btnlogin']) ) {
            login();
        }
        
    ?>
</body>
</html>
