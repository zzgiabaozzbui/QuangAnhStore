<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Document</title>
    <style>
        .main {
            display: flex;
        }

        .main .container-web {
            background-color: whitesmoke;
            flex: 1;
            position: relative;
            overflow: hidden;
        }

        form {
            margin-left: 20px;
            margin-top: 10px;
        }

        .form-control,
        form input {
            width: 90% !important;
        }

        .moRong {
            height: 20px;
        }

        .btnAdd {
            background-color: #28a745;
            color: white;
            padding: 4px 10px;
        }
    </style>
</head>

<body>
    <div class="main">
        <?php
        require_once "../Shared_Element/sideBar.php";
        ?>
        <div class="container-web">
            <?php
            require_once "../Shared_Element/Name.php";

            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="usr">Tên sản phẩm</label>
                    <input required type="text" class="form-control" name="txtTenSP" id="">
                </div>
                <div class="form-group">
                    <label for="usr">Dòng sản phẩm</label>
                    <select required class="form-control" name="cboDSP" id="">
                        <option value=" ">---Danh Mục---</option>
                        <?php
                        require_once "../Shared_Element/DB.php";
                        $querySelectDSP = "Select * from tbldongsanpham";
                        $resultSelectDSP = selectListItems($querySelectDSP);
                        foreach ($resultSelectDSP as $DSP) {
                            echo "<option value='" . $DSP['Madong'] . "'>" . $DSP['Tendong'] . "</option>";
                        } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="usr">Hình ảnh</label>
                    <input required class="form-control" type="file" name="fileUpload" value="">
                </div>
                <div class="form-group">
                    <label for="usr">Giá</label>
                    <input required type="text" class=" form-control" name="txtGia" id="">
                </div>
                <button type="submit" class="btnAdd" name="btnAdd">Thêm mới</button>
                <a href="index.php">Quay lại</a>
            </form>
            <img src="" alt="">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' and isset($_POST['btnAdd'])) {
                if (isset($_POST['txtTenSP'])) {
                    $tenSP = $_POST['txtTenSP'];
                    $dongSP = $_POST['cboDSP'];
                    $gia = $_POST['txtGia'];
                    $FindNameDSP = selectItem("select Tendong from tbldongsanpham where Madong='" . $dongSP . "'");

                    if ($FindNameDSP != null) {
                        $tenDong = $FindNameDSP[0]['Tendong'];
                        $linkAnh = "../Frontend/img/Featured phone/" . $tenDong . "/";
                        if ($_FILES['fileUpload']['error'] > 0) {
                            echo "Bạn chưa chọn ảnh";
                        } else {
                            move_uploaded_file($_FILES['fileUpload']['tmp_name'], $linkAnh . $_FILES['fileUpload']['name']);
                            $link = $linkAnh . $_FILES['fileUpload']['name'];
                            echo $link;
                            $queryInsertSP = "Insert into sanpham values('','" . $tenSP . "','" . $dongSP . "','" . $link . "','" . $gia . "')";
                            ChangeData($queryInsertSP, "thêm mới sản phẩm");
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>