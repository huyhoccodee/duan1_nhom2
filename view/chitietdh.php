<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active">Tài khoản của tôi</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<div class="container my-4">
    <h2 class="text-center mb-4 text-primary "><strong>Chi tiết đơn hàng</strong></h2>
    
    <!-- Thông tin người nhận -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light text-dark p-3">
            <h5 class="mb-0">Thông tin người nhận</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <strong>Tên người nhận:</strong>
                    <p class="mb-0"><?= $dh['bill_name'] ?></p>
                </div>
                <div class="col-md-4">
                    <strong>Địa chỉ:</strong>
                    <p class="mb-0"><?= $dh['bill_diachi'] ?></p>
                </div>
                <div class="col-md-4">
                    <strong>Số điện thoại:</strong>
                    <p class="mb-0"><?= $dh['bill_sdt'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Danh sách sản phẩm -->
    <div class="card shadow-sm">
        <div class="card-header bg-light text-black p-3">
            <h5 class="mb-0">Danh sách sản phẩm</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered text-center align-middle">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ảnh sản phẩm</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Số lượng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listctdh as $ctdh): ?>
                        <tr>
                            <td><?= $ctdh['tensp'] ?></td>
                            <td>
                                <img src="upload/<?= $ctdh['img'] ?>" alt="<?= $ctdh['tensp'] ?>" class="img-fluid rounded" style="height: 70px; max-width: 100px;">
                            </td>
                            <td><?= number_format($ctdh['gia'], 0, ',', '.') ?> đ</td>
                            <td><?= $ctdh['soluong'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
