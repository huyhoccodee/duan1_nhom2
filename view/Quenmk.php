<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
    <!-- Thêm liên kết Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap bg-light py-3">
        <div class="container">
            <ul class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active">Quên Mật Khẩu</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Main Content Start -->
    <main class="catalog mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3 class="text-center mb-4">Quên mật khẩu</h3>
                    <div class="box_content form_account p-4 border rounded">
                    <form action="index.php?act=quenmk" method="post">
          <div>
            <p>Email</p>
            <input type="email" name="email" placeholder="email" required>
          </div>
          <span ><?= isset($thongbao) ? $thongbao : '' ?></span><br>

          <input type="submit" value="Gửi" name="guiemail">
          <input type="reset" value="Nhập lại">
        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main Content End -->

    <!-- Thêm liên kết Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Bootstrap validation
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>