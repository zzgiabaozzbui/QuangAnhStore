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
        font-size: 16px;
        color: black;
}
.menu-button
{
    
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
    <div></div>
    <div class="avatar-user">
            
            <img src="../Frontend/img/Avatar/115930872_972291409888076_2432106018067168137_n.jpg" alt="">
            <p>Phạm Đình Thắng</p>
    </div>
    </div>
    <script>
        function open_hidden()
        {        
            var icon=document.getElementById("icon-open"); 
            console.log(icon);        
            var menuList= document.getElementById("sideBar");
            if(menuList.style['display']!='block')
            {
                menuList.style['display']='block';
                icon.classList.remove("ti-menu")
                icon.classList.add("ti-close")
            }     
            else
            {
                menuList.style['display']='none';   
                icon.classList.add("ti-menu")
                icon.classList.remove("ti-close") 
            }
                  
        }
    </script>
</body>
</html>