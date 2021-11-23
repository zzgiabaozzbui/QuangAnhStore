<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../Frontend/font/themify-icons/themify-icons.css" />
    <link rel="stylesheet" type="text/css" href="../Frontend/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Frontend/css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="../Frontend/font/fontawesome-free-5.15.4/fontawesome-free-5.15.4-web/css/all.css" />
    <link rel="stylesheet" type="text/css" href="../Frontend/css/TinTuc.css" />
</head>

<body>
    <div class="main-app">
        <div class="container-sidebar">
            <?php
            require "../Shared_Element/sideBar.php";
            ?>
        </div>
        <div class="container-content">
            <?php
            require "../Shared_Element/Name.php";
            ?>


            <div class="container-item">
                <div class="container-title">
                    <h2>QUẢN LÝ TIN TỨC</h2>
                </div>
                <div class="container-top">
                    <div class="ct-search">
                        <form method="POST">
                            <input type="text" name="txtSearch1" id="txtSearch1" placeholder="Tìm kiếm..." value="<?php echo isset($_POST['txtSearch1']) ? $_POST['txtSearch1'] : '' ?>">
                        </form>
                    </div>
                    <form id="form-data" method="post">
                    <div class="ct-button">
                            <button type="button" id="btnThem">Thêm mới</button>
                            <button type="button" id="btnXoa" disabled >Xóa</button>
                        </div>
                    </form>
                </div>
                <div class="container-table tintuc">
                    <table id='customers'>
                        <thead>
                            <th class='check-box-indexs'><input type='checkbox' id='' name='' value=''> </th>
                            <th class='text-cencter'>Mã tin tức</th>
                            <th class='text-cencter'>Hình ảnh</th>

                            <th class='text-cencter'>Tiêu đề</th>
                            <th class='text-right'>Ngày đăng tin</th>
                            <th class='text-cencter'>Tóm tắt</th>
                            <th class='text-cencter'></th>
                            <th class='text-cencter'></th>
                            <th class='text-cencter'></th>
                        </thead>
                        <tbody class="customer-tintuc"></tbody>
                    </table>
                </div>



            </div>
        </div>
       
    
    


    </div>

    <script rel="text/javascript" src="../Frontend/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script rel="text/javascript" src="../Frontend/js/jquery-ui.min.js"></script>
    <script rel="text/javascript" src="../Frontend/js/TinTuc.js"></script>

</body>

</html>