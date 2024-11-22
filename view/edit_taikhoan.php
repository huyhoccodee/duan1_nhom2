<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Thêm liên kết đến Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
                if (isset($_SESSION['user'])&&(is_array($_SESSION['user']))) {
                    extract($_SESSION['user']);
                }
                
                ?>
    <form action="index.php?act=edit_taikhoan" method="post" enctype="multipart/form-data">
    <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-6 mx-auto">
                    <h3>Cập nhật tài khoản</h3>

                <label for="" class="form-label">Tên tài khoản</label>
                <input type="text" name="name" id="" value="<?=$name?>" class="form-control"><br>
                <label for="" class="form-label">Email</label>
                  <input type="email" name="email" id="" value="<?=$email?>" class="form-control"><br>
                  <label for="" class="form-label">Mật khẩu</label>
                <input type="text" name="pass" id="" value="<?=$pass?>" class="form-control"><br>
                <label for="" class="form-label">Địa chỉ</label>
                <input type="text" name="diachi" id="" value="<?=$diachi?>" class="form-control"><br>
                <label for="" class="form-label">Số điện thoại</label>
                <input type="text" name="sdt" id="" value="<?=$sdt?>" class="form-control"><br>
                <input type="hidden" name="id" value="<?=$id?>" class="form-control">
           <input type="submit" value="Cập nhật sản phẩm" name="capnhat" >
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
    </form>
</body>
</html>