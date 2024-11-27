<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Giỏ hàng</title>
    <style>
    .cart-summary {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        border: 1px solid #dee2e6;
    }

    .cart-btn button {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3 !important;
        color: white !important;
    }

    .cart-btn button:hover {
        background-color: #0056b3;
    }

    .breadcrumb-item a {
        text-decoration: none;
        color: #007bff;
    }

    .breadcrumb-item a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap py-3 bg-light">
        <div class="container">
            <ul class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="cart-page py-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th>Stt</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên</th>
                                    <th>Giá (VNĐ)</th>
                                    <th>Size</th>
                                    <th>Màu</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền (VNĐ)</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    $tong = 0;
                                    if (!empty($_SESSION['giohang'])) {
                                        foreach ($_SESSION['giohang'] as $item) {
                                        $thanhtien = $item[3] * $item[4];
                                        $tong += $thanhtien;
                                        // $xoasp = '<a href="index.php?act=delcart&i=' . $i . '" class="btn btn-danger btn-sm">Xóa</a>';
                                        $xoasp = '<a href="index.php?act=delcart&i=' . $i . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng không?\')">Xóa</a>';
                                        $increaseQty = '<form method="POST" action="index.php?act=increase&i=' . $i . '" style="display:inline;">
                                            <button type="submit" class="btn btn-success btn-sm">+</button>
                                                </form>';
                                        $decreaseQty = '<form method="POST" action="index.php?act=decrease&i=' . $i . '" style="display:inline;">
                                            <button type="submit" class="btn btn-warning btn-sm">-</button>
                                                </form>';
                                        echo '
                                                <tr class="text-center">
                                                    <td>' . ($i + 1) . '</td>
                                                    <td><img src="upload/' . $item[1] . '" alt="Hình ảnh" class="img-thumbnail" style="width: 80px; height: 80px;"></td>
                                                    <td>' . $item[2] . '</td>
                                                    <td>' . number_format($item[3], 0, ',', '.') . '</td>
                                                    <td>' . $item[7] . '</td>
                                                    <td>' . $item[8] . '</td>
                                                    <td>' . $decreaseQty . ' ' . $item[4] . ' ' . $increaseQty . '</td>
                                                    <td>' . number_format($thanhtien, 0, ',', '.') . '</td>
                                                    <td>' . $xoasp . '</td>
                                                </tr>';
                                        $i++;
                                        }
                                    } else {
                                        echo '<tr><td colspan="9" class="text-center">Giỏ hàng của bạn hiện đang trống.</td></tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <!-- Cart Summary -->
                <div class="col-md-6 offset-md-6 ">
                    <div class="cart-summary">
                        <h4 class="text-center mb-3">Chi tiết giỏ hàng</h4>
                        <div>
                            <?php
                            if (!empty($_SESSION['giohang'])) {
                                foreach ($_SESSION['giohang'] as $item) {
                                    echo '<p>' . $item[2] . ' <span class="fw-bold">x ' . $item[4] . '</span></p>';
                                }
                                echo '<p>Phí vận chuyển: <span class="fw-bold">' . number_format(100000, 0, ',', '.') . ' VNĐ</span></p>';
                                echo '<h5 class="text-end">Tổng thanh toán: <span class="fw-bold text-danger">' . number_format($tong + 100000, 0, ',', '.') . ' VNĐ</span></h5>';
                            }
                            ?>
                        </div>
                        <div class="cart-btn mt-3 text-center">
                            <a href="index.php?act=checkout">
                                <button class="btn btn-primary btn-lg">Thủ tục thanh toán</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>