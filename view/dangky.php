<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký HKTmember</title>

    <!-- Link tới Bootstrap CSS từ CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active">Đăng ký</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<div class="login">
    <div class="container">
        <div class="section-header text-center mb-4">
            <h3>Đăng Ký HKT Member</h3>
            <p>Vui lòng điền đầy đủ thông tin để đăng ký tài khoản.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg p-4">
                    <div class="card-body">
                        <form action="index.php?act=dangky" method="post">
                            <div class="form-row">
                                <!-- Tên đăng nhập -->
                                <div class="form-group col-md-6">
                                    <label for="name">Tên đăng nhập</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Tên đăng nhập" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" />
                                    <?php 
                                    if (isset($_SESSION['error']['name'])) {
                                        echo '<div class="text-danger mt-2">' . $_SESSION['error']['name'] . '</div>';
                                    }
                                    ?>
                                </div>

                                <!-- Mật khẩu -->
                                <div class="form-group col-md-6">
                                    <label for="pass">Mật khẩu</label>
                                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : ''; ?>" />
                                    <?php 
                                    if (isset($_SESSION['error']['pass'])) {
                                        echo '<div class="text-danger mt-2">' . $_SESSION['error']['pass'] . '</div>';
                                    }
                                    ?>
                                </div>

                                <!-- Email -->
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
                                    <?php 
                                    if (isset($_SESSION['error']['email'])) {
                                        echo '<div class="text-danger mt-2">' . $_SESSION['error']['email'] . '</div>';
                                    }
                                    ?>
                                </div>

                                <!-- Số điện thoại -->
                                <div class="form-group col-md-6">
                                    <label for="sdt">Số điện thoại</label>
                                    <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Số điện thoại" value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : ''; ?>" />
                                    <?php 
                                    if (isset($_SESSION['error']['sdt'])) {
                                        echo '<div class="text-danger mt-2">' . $_SESSION['error']['sdt'] . '</div>';
                                    }
                                    ?>
                                </div>

                                <!-- Địa chỉ -->
                                <div class="form-group col-md-12">
                                    <label for="diachi">Địa chỉ</label>
                                    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ" value="<?php echo isset($_POST['diachi']) ? $_POST['diachi'] : ''; ?>" />
                                    <?php 
                                    if (isset($_SESSION['error']['diachi'])) {
                                        echo '<div class="text-danger mt-2">' . $_SESSION['error']['diachi'] . '</div>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- Nút đăng ký -->
                            <div class="form-group col-md-12">
                                <button type="submit" name="dangky" class="btn btn-primary btn-block" value="Đăng ký">Đăng ký</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
