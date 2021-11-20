<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../Frontend/font/themify-icons/themify-icons.css" />
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
                    <div class="ct-button">
                        <form id="form-data" method="post">
                            <button id="btnThem"><a  href="ThemMoiTT.php">Thêm mới</a></button>
                        </form>
                    </div>
                </div>

                <div class="container-table tintuc">
                    <table id='customers'>
                        <thead>
                            <th class='check-box-indexs'><input type='checkbox' id='' name='' value=''> </th>
                            <th class='text-cencter'>Mã tin tức</th>
                            <th class='text-cencter'>Hình ảnh</th>

                            <th class='text-cencter'>Tiêu đề</th>
                            <th class='text-cencter'>Ngày đăng tin</th>
                            <th class='text-cencter'>Tóm tắt</th>
                            <th class='text-cencter'>Sửa</th>
                            <th class='text-cencter'>Xóa</th>
                            <th class='text-cencter'>Xem</th>
                        </thead>
                        <tbody class="customer-tintuc"></tbody>
                    </table>
                </div>



            </div>





        </div>


    </div>

    <script rel="text/javascript" src="../Frontend/js/jquery-3.6.0.min.js"></script>
    <script rel="text/javascript" src="../Frontend/js/TinTuc.js"></script>
</body>

</html>