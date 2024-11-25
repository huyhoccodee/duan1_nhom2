<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật tài khoản</title>
    <!-- Thêm liên kết đến Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
    if (isset($_SESSION['user']) && (is_array($_SESSION['user']))) {
        extract($_SESSION['user']);
    }
?>

<form action="index.php?act=edit_taikhoan" method="post" enctype="multipart/form-data">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <!-- Tạo khung viền và màu nền cho form -->
                <div class="border border-primary rounded p-4 bg-light">
                    <h3 class="mb-4 text-center">Cập nhật tài khoản</h3>

                    <div class="mb-3">
                        <label for="name" class="form-label">Tên tài khoản</label>
                        <input type="text" name="name" id="name" value="<?=$name?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" value="<?=$email?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="pass" class="form-label">Mật khẩu</label>
                        <input type="text" name="pass" id="pass" value="<?=$pass?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="diachi" class="form-label">Địa chỉ</label>
                        <input type="text" name="diachi" id="diachi" value="<?=$diachi?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="sdt" class="form-label">Số điện thoại</label>
                        <input type="text" name="sdt" id="sdt" value="<?=$sdt?>" class="form-control">
                    </div>
                    <input type="hidden" name="id" value="<?=$id?>" class="form-control">

                    <div class="mb-3">
                        <input type="submit" value="Cập nhật tài khoản" name="capnhat" class="btn btn-primary w-100">
                    </div>

                    <?php 
                        if (isset($_SESSION['error'])) {
                            echo '<div class="alert alert-danger">';
                            foreach ($_SESSION['error'] as $key => $value) {
                                echo '<li>' . $value . '</li>';
                            }
                            echo '</div>';

                        } 
                        
                    ?> 
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>