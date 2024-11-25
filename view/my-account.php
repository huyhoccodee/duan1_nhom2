<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap bg-light py-3">
    <div class="container">
        <ul class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Trang chủ</a></li>
            <li class="breadcrumb-item active">Tài khoản của tôi</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- My Account Start -->
<div class="my-account py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="nav flex-column nav-pills bg-light p-3 rounded" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab">
                        <i class="fas fa-history me-2"></i>Lịch sử đặt hàng
                    </a>
                    <a class="nav-link text-danger" href="index.php?act=thoat">
                        <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- Orders Tab Start -->
                    <div class="tab-pane fade show active" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <h2 class="text-primary mb-4"><strong>Lịch sử Đơn Hàng</strong></h2>

                        <div class="table-responsive">
                            <?php 
                            if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] > 0) {
                                $billinfo = getbillinfo($_SESSION['user']['id']);
                                if (count($billinfo) > 0) {
                            ?>
                            <table class="table table-hover  align-middle">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Tổng tiền</th>
                                        <th>Chi tiết</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($billinfo as $bill) { ?>
                                    <tr>
                                        <td><?=$bill['id']?></td>
                                        <td><?=$bill['ngaydathang']?></td>
                                        <td><?=$bill['trangthai']?></td>
                                        <td>
                                            <?php 
                                            switch($bill['id_pttt']){
                                                case '1':
                                                    $txtmess = "Thanh toán khi nhận hàng";
                                                    break;
                                                case '2':
                                                    $txtmess = "Thanh toán qua VNPay";
                                                    break;
                                                default:
                                                    $txtmess = "Chưa chọn";
                                                    break;
                                            }
                                            echo $txtmess;
                                            ?>
                                        </td>
                                        <td><?=number_format($bill['total'], 0, ',', '.')?> đ</td>
                                        <td>
                                            <a href="index.php?act=chitietdh&id=<?=$bill['id']?>" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Xem
                                            </a>
                                        </td>
                                        <?php if ($bill['idtrangthai'] == 1) { ?>
                                        <td>
                                            <a href="index.php?act=huydh&id=<?=$bill['id']?>" class="btn btn-danger btn-sm">
                                                <i class="fas fa-times-circle"></i> Hủy
                                            </a>
                                        </td>
                                        <?php } else { ?>
                                        <td>---</td>
                                        <?php } ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php 
                                } else {
                                    echo '<h5 class="text-danger">Lịch sử mua hàng trống.</h5>';
                                    echo '<a href="index.php" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- Orders Tab End -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- My Account End -->

