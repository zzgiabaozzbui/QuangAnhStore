<?php
 require "../Shared_Element/DB.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <script src="home.js"></script>
    <link rel="stylesheet" href="home.css">
    <script type="text/javascript" src="jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    <script src="home.js"></script>

    <link rel="stylesheet" href="../../Frontend/css/sideBar.css?version=1">
    <link rel="stylesheet" href="../../Frontend/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./css/Index.css?version=1">
    <title>Document</title>
    <style>
        .main{
            display: flex;
        }
        .container{
            flex: 1;
            height: 100vh;
            
        }

        .container__header--home{
            display: flex;
            max-width: 100%;
            max-height: 100%;
            margin: 5px;
            padding: 10px 70px 10px 20px;
            position: relative;
        }
        .container--chart{
            padding: 10px 20px 20px 150px;
            width: 100%;
        }
        #chart-container {
            max-height: 100%;
            width:1000px;
            height: 520px;
            padding: 10px;
        }
        .item--nav{
            background: linear-gradient( #25b7c4, #25c481);;
            width: 100%;
            margin-left: 0;
            margin: 10px 0px 0px 100px;
            height: 100px;
            border-radius: 10px;
            padding-left: 25px;
            padding-top: 5px;
            box-shadow: 0 4px 10px rgb(0 0 0 / 16%)
        }
        .item--nav{
            flex: 1;
            width: 240px;
        }
        .item--nav{
            margin-right: 14px;
        }
        .nav--left{
            
            padding: 0;
        }
        .nav--right{
            height: 73px;
        }
        #text1{
            color: white;
            text-align: left;
        }
        .img--navone{
            background-image: "https://img.icons8.com/ios-filled/2x/ffffff/visible.png";
        }
        .textmoney{
            color: white;
            text-align: center;
            font-weight: bold;
            font-size: 30px;
            position: relative;

            bottom: 25px;
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
            <div class="container__header--home">
                <a id="1" class="item--nav">
                    <div class="nav--left">
                        <b id="text1">Doanh thu điện thoại :</b>
                    </div>
                    
                    <div class="nav--right">
                        <canvas id="myCanvas" width="70px" height="70px"></canvas>
                        <b class="textmoney">70M</b>
                        
                    </div>
                </a>
                <a id="2" class="item--nav">
                <div class="nav--left">
                        <b id="text1">Doanh thu phụ kiện :</b>
                    </div>
                    
                    <div class="nav--right">
                        <canvas id="myCanvas2" width="70px" height="70px"></canvas>
                        <b class="textmoney">70M</b>
                        
                    </div>
                </a>
                <a id="3" class="item--nav">
                <div class="nav--left">
                        <b id="text1">Tổng doanh thu :</b>
                    </div>
                    
                    <div class="nav--right">
                        <canvas id="myCanvas3" width="70px" height="70px"></canvas>
                        <b class="textmoney">70M</b>
                        
                    </div>
                </a>
                
            </div>
            <div class="container--chart">
                <div id="chart-container">
                    <canvas id="graph" width="800px" height="400px" ></canvas>
                </div>
            </div>
            
            
        </div>
        
    </div>
</body>
<script>
    //Canvas tròn của a1
    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");
    
    
    ctx.beginPath();
    ctx.strokeStyle = 'rgba(255,255,255,0.5)';//Đặt màu đường
    ctx.lineWidth = 7; //Độ rộng
    ctx.arc(35,35,25,0,2*Math.PI);
    ctx.stroke();

    ctx.beginPath();
    ctx.strokeStyle = 'rgb(255,255,255)';//Đặt màu đường
    ctx.lineWidth = 6; //Độ rộng
    ctx.arc(35,35,25,1.5*Math.PI,0.3*2*Math.PI);
    ctx.stroke();

    //Chữ trong canvas
    ctx.font = '18px bold Arial';
    
    ctx.fillStyle = 'White';
    ctx.fillText('60%', 20, 40);


    //Canvas tròn của a2
    var c = document.getElementById("myCanvas2");
    var ctx = c.getContext("2d");
    
    
    ctx.beginPath();
    ctx.strokeStyle = 'rgba(255,255,255,0.5)';//Đặt màu đường
    ctx.lineWidth = 7; //Độ rộng
    ctx.arc(35,35,25,0,2*Math.PI);
    ctx.stroke();

    ctx.beginPath();
    ctx.strokeStyle = 'rgb(255,255,255)';//Đặt màu đường
    ctx.lineWidth = 6; //Độ rộng
    ctx.arc(35,35,25,1.5*Math.PI,0.3*2*Math.PI);
    ctx.stroke();

    //Chữ trong canvas
    ctx.font = '18px bold Arial';

    ctx.fillStyle = 'White';
    ctx.fillText('60%', 20, 40);


    //Canvas tròn của a3
    var c = document.getElementById("myCanvas3");
    var ctx = c.getContext("2d");
    
    
    ctx.beginPath();
    ctx.strokeStyle = 'rgba(255,255,255,0.5)';//Đặt màu đường
    ctx.lineWidth = 7; //Độ rộng
    ctx.arc(35,35,25,0,2*Math.PI);
    ctx.stroke();

    ctx.beginPath();
    ctx.strokeStyle = 'rgb(255,255,255)';//Đặt màu đường
    ctx.lineWidth = 6; //Độ rộng
    ctx.arc(35,35,25,1.5*Math.PI,0.3*2*Math.PI);
    ctx.stroke();

    //Chữ trong canvas
    ctx.font = '18px bold Arial';

    ctx.fillStyle = 'White';
    ctx.fillText('60%', 20, 40);

</script>
</html>