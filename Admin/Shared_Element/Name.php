<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        .menu-user{
            display: flex;
            justify-content: space-between;
            border-bottom:1px solid #d1d1d1 ;
            height: 51px;
        }
        .avatar-user{
            flex-basis: 30%;
            display: block;
            width: 300px;
            height: 50px;
            text-align: right;
            
            
        }
        .avatar-user img{ 
            margin-top: 10px;
            margin-left: 15px;
            display: inline-block;
            width: 30px;
            border-radius: 40px;
        
        }
        .avatar-user p{
                margin-top: 10px;
                display: inline-block;
                margin-left:10px ;
                margin-right:10px ;
                font-size: 16px;
                color: black;
        }
        .menu-button
        {
            cursor: pointer;
            margin:8px 0 0 5px;
        }
        .menu-button i{
            padding: 5px;
            font-size: 20px;
        }

    </style>
</head>
<body>
    
    <div class="menu-user">
        <div class="menu-button">
            <i class="ti-menu" id="icon-open" onclick="open_hidden()"></i>
        </div>
        <div>

        </div>
        <div class="avatar-user">
                <?php 
                    function avata(){
                        $query = "SELECT img  FROM quantri WHERE Tendangnhap = '".$_SESSION["us"]."' ";
                        $conn = mysqli_connect("localhost","root","","qldt");
                        if($conn == true){
                            //Step3
                            $result = mysqli_query($conn,$query);
                            if(mysqli_num_rows($result)>0){
                                while ($row2=mysqli_fetch_assoc($result)) {
                                    $img=$row2["img"];
                                }
                                if($img==NULL)
                                    return "http://localhost:8080/QuangAnhStore/Admin/Frontend/img/quantri/user.png";
                                else
                                    return $img;
                            }
                            else{
                                return "http://localhost:8080/QuangAnhStore/Admin/Frontend/img/quantri/user.png";
                            }
                        }
                        else{
                            echo "Connect error:" . mysqli_connect_error();
                        }    
                    }
                    
                ?>
                <img src="<?php echo avata();?>" alt="">
                <p>Phạm Thị Đình Thắng</p>
        </div>
    </div>
    <script>
        function open_hidden()
        {        
            var icon=document.getElementById("icon-open"); 
            console.log(icon);        
            var menuList= document.getElementById("sideBar");
            if(menuList.style.width=="250px")
            {
                menuList.style.animation = 'up linear 0.2s 1 forwards';
                menuList.style.width="60px";
            }     
            else
            { 
                menuList.style.animation = 'dow linear 0.2s 1 forwards';
                menuList.style.width="250px";
                
            }
                  
        }
    </script>
</body>
</html>