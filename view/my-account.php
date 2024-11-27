<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                        Lịch sử đặt hàng
                    </a>
                    <a class="nav-link text-danger" href="index.php?act=thoat">
                        <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="col-md-9">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-success">
                        <?= $_SESSION['message']; unset($_SESSION['message']); ?>
                    </div>
                <?php } ?>
                <?php if (isset($_SESSION['error'])) { ?>
                    <div class="alert alert-danger">
                        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                    </div>
                <?php } ?>

                <div class="tab-content">
                    <!-- Orders Tab Start -->
                    <div class="tab-pane fade show active" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                        <h2 class="text-primary mb-4">Lịch sử Đơn Hàng</h2>

                        <div class="table-responsive">
                            <?php 
                            if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] > 0) {
                                $billinfo = getbillinfo($_SESSION['user']['id']);
                                if (count($billinfo) > 0) {
                            ?>
                            <table class="table table-hover align-middle">
                                <thead class="bg-dark text-white">
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Phương thức thanh toán</th>
                                        <th>Tổng tiền</th>
                                        <th>Chi tiết</th>
                                        <th>Hành động</th>
                                        <th>Ghi chú</th>
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
                                                 Xem
                                            </a>
                                        </td>

                                        <td>
                                            <?php if ($bill['idtrangthai'] == 5) { ?>
                                                <!-- Trạng thái là "Hoàn thành", vô hiệu hóa nút Hủy -->
                                                <button class="btn btn-danger btn-sm" disabled>
                                                    Hủy
                                                </button>
                                            <?php } elseif ($bill['idtrangthai'] == 6) { ?>
                                                <!-- Trạng thái là "Đã hủy", hiển thị "Đã hủy" -->
                                                Đã hủy
                                            <?php } else { ?>
                                                <!-- Trạng thái 1, 2, 3, 4, có thể hủy -->
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelModal<?=$bill['id']?>">
                                                    Hủy
                                                </button>
                                            <?php } ?>
                                        </td>
                                        
                                        <td>
                                            <?php if ($bill['idtrangthai'] = 6) { ?>
                                                <?=$bill['lydohuy'] ?? '---'?>
                                            <?php } else { ?>
                                            <td>---</td>
                                            <?php } ?>
                                        </td>
                                        
                                    </tr>

                                    <!-- Modal Hủy Đơn Hàng -->
                                    <div class="modal fade" id="cancelModal<?=$bill['id']?>" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="index.php?act=huydh" method="POST">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="cancelModalLabel">Hủy Đơn Hàng</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="<?=$bill['id']?>">
                                                        <div class="form-group">
                                                            <label for="cancelReason">Lý do hủy:</label>
                                                            <textarea class="form-control" id="cancelReason" name="reason" rows="3" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                        <button type="submit" class="btn btn-danger">Xác nhận hủy</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
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
