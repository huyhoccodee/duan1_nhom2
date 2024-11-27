<div class="main-content">
    <div class="page-content pt-4">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý đơn hàng</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý đơn hàng</a>
                                </li>
                                <li class="breadcrumb-item active">Tất cả đơn hàng</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tất cả đơn hàng</h4>

                            <table class="table table-bordered adm">
                                <thead class="thead-dark">
                                    <tr>
                                        <!-- <th>Id</th> -->
                                        <th>ID tài khoản</th>
                                        <th>Tên người đặt</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Pttt</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày đặt</th>
                                        <th>Thành tiền</th>
                                        <th>Chi tiết(Hủy)</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php 
                                    foreach ($listdonhang as $bill) {
                                        extract($bill);
                                    ?>
                                    <tr>
                                        <td><?php echo $id_user; ?></td>
                                        <td><?php echo $bill_name; ?></td>
                                        <td><?php echo $bill_diachi; ?></td>
                                        <td><?php echo $bill_sdt; ?></td>
                                        <td><?php echo $bill_email; ?></td>
                                        <td>
                                            <?php
                                            switch ($id_pttt) {
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
                                        <td><?php echo $trangthai; ?></td>
                                        <td><?php echo $ngaydathang; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td>
                                                        <?php 
                                                        if ($trangthai == 'Hủy đơn hàng' && !empty($lydohuy)) {
                                                            echo $lydohuy; // Hiển thị lý do hủy
                                                        } else {
                                                            echo "---"; // Hiển thị "---" nếu chưa hủy
                                                        }
                                                        ?>
                                                    </td>
                                        <td>
                                            <a href="index.php?act=suabill&id=<?php echo $id; ?>">
                                                <input type="button" value="Sửa" class="btn btn-danger">
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- end card-body-->
                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">2024 © HKT TEAM.</div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Quản lý Website
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>