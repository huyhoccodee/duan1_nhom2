<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap py-3 bg-light">
        <div class="container">
            <ul class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Liên hệ</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Start -->
    <div class="contact py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Form -->
                <div class="col-md-7">
                    <!-- Hiển thị lỗi hoặc thông báo thành công -->
                    <?php 
                    if (isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger">';
                        foreach ($_SESSION['error'] as $error) {
                            echo '<li>' . $error . '</li>';
                        }
                        echo '</div>';
                    }
                    if (isset($_SESSION['success'])) {
                        echo '<div class="alert alert-success">';
                        echo $_SESSION['success'];
                        echo '</div>';
                        unset($_SESSION['success']); // Xóa thông báo sau khi hiển thị
                    }
                    ?>
                    <div class="form">
                        <form action="index.php?act=lienhe" method="post">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Họ tên" name="lh_name" >
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email" name="lh_email" >
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Số điện thoại" name="lh_sdt" >
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" rows="5" placeholder="Nội dung" name="lh_noidung" ></textarea>
                            </div>
                            <div class="mt-3">
                                <button type="submit" name="guiyeucau" class="btn btn-primary" value="Gửi yêu cầu">Gửi yêu cầu</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Thông tin liên hệ -->
                <div class="col-md-5">
                    <div class="contact-info bg-light p-4 rounded">
                        <div class="section-header mb-3">
                            <h3>HKT STORE XIN CHÀO</h3>
                        </div>
                        <p><i class="fa fa-map-marker-alt me-2"></i>13 P. Trịnh Văn Bô, Xuân Phương, Nam Từ Liểm, Hà Nội</p>
                        <p><i class="fa fa-envelope me-2"></i>trngochuy969@gmail</p>
                        <p><i class="fa fa-phone me-2"></i>0334442709</p>
                        <div class="social mt-3">
                            <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="fa fa-linkedin"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
