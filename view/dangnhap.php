<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="login">
    <div class="container">
        <div class="section-header text-center mb-4">
            <h3>Đăng Nhập</h3>
            <p>Vui lòng nhập thông tin để đăng nhập vào hệ thống.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg p-4">
                    <div class="card-body">
                        <form action="index.php?act=dangnhap" method="post">
                            <div class="form-row">
                                <!-- Tên đăng nhập -->
                                <div class="form-group col-md-12">
                                    <label for="name">Tên đăng nhập</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Tên đăng nhập" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" />
                                    <?php 
                                    if (isset($errors['name'])) {
                                        echo '<div class="text-danger mt-2">' . $errors['name'] . '</div>';
                                    }
                                    ?>
                                </div>

                                <!-- Mật khẩu -->
                                <div class="form-group col-md-12">
                                    <label for="pass">Mật khẩu</label>
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Mật khẩu" value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : ''; ?>" />
                                    <?php 
                                    if (isset($errors['pass'])) {
                                        echo '<div class="text-danger mt-2">' . $errors['pass'] . '</div>';
                                    }
                                    ?>
                                </div>
                                </div><a href="index.php?act=quenmk">Quên Mật Khẩu</a>
                            </div>

                            <!-- Nút đăng nhập -->
                            <div class="form-group col-md-12">
                                <button type="submit" name="dangnhap" class="btn btn-primary btn-block" value="Đăng nhập">Đăng nhập</button>
                            </div>
                            
                            <!-- Hiển thị lỗi tổng quát -->
                            <?php 
                            if (isset($thongbao)) {
                                echo '<div class="alert alert-danger mt-3">' . $thongbao . '</div>';
                            }
                            ?> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
