<div class="container-app" id="container-Sua">
    <div class="container-title">
        <h2>SỬA TIN TỨC</h2>
    </div>

    <div class="container-content">
        <form action="" method="post">
            <div class="form-group">
                <label for="usr">Tiêu đề</label>
                <input required type="text" class="form-control txtTieuDe" value="<?php echo isset($_POST['txtTieuDe']) ? $_POST['txtTieuDe'] : '' ?>" name="txtTieuDe" id="txtTieuDe">
            </div>
            <div class="form-group">
                <label for="usr">Tóm tắt</label>
                <input required type="text" class="form-control txtTomTat" name="txtTomTat" value="<?php echo isset($_POST['txtTomTat']) ? $_POST['txtTomTat'] : '' ?>" id="txtTomTat">
            </div>
            <div class="form-group">
                <label for="usr">Nội dung</label>
                <textarea required type="text" class="form-control txtNoiDung" name="txtNoiDung" value="<?php echo isset($_POST['txtNoiDung']) ? $_POST['txtNoiDung'] : '' ?>" id="txtNoiDung"> </textarea>
            </div>
            <div class="form-group">
                <label for="usr">Ngày đăng tin</label>
                <input required type="date" class="form-control" name="dateNgayDang" value="<?php echo isset($_POST['dateNgayDang']) ? $_POST['dateNgayDang'] : '' ?>" id="dateNgayDang">
            </div>
            <div class="form-group">
                <label for="usr">Người viết tin</label>
                <input required type="text" class="form-control" name="txtTacGia" value="<?php echo isset($_POST['txtTacGia']) ? $_POST['txtTacGia'] : '' ?>" id="txtTacGia">
            </div>
            <div class="form-group">
                <label for="usr">Hình ảnh</label>
                <input required class="form-control fileUpload" type="file" name="fileUpload" value="<?php echo isset($_FILES['fileUpload']) ? $_FILES['fileUpload'] : '' ?>" id="fileUpload">
            </div>
            <button type="button" id="btnLuu" name="btnLuu">Lưu</button>
            <a href="TinTucHome.php">Quay lại</a>
        </form>
    </div>
</div>