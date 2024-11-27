<?php 
if(is_array($dh)){
    extract($dh);
}

$dh = loadone_donhang($id); // Lấy đơn hàng theo ID
$current_status = $dh['id_trangthai']; // Trạng thái hiện tại của đơn hàng

// Danh sách trạng thái có thể thay đổi theo thứ tự
$valid_statuses = [1, 2, 3, 4, 5]; // Các trạng thái hợp lệ từ 1 đến 5
$cancel_status = 6; // Trạng thái "Hủy đơn hàng" có id = 6
?>

<div class="main-content">
    <div class="page-content pt-4 ">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý đơn hàng</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý đơn hàng</a>
                                </li>
                                <li class="breadcrumb-item active">Cập nhật đơn hàng</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Cập nhật đơn hàng</h4>
                            <form action="index.php?act=updatedh" method="post" class="p-3">
                                <div class="mb-3">
                                    <label for="bill_name" class="form-label">Tên người đặt hàng</label>
                                    <input type="text" name="bill_name" class="form-control" value="<?php echo $bill_name ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="bill_diachi" class="form-label">Địa chỉ</label>
                                    <input type="text" name="bill_diachi" class="form-control" value="<?php echo $bill_diachi ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="bill_sdt" class="form-label">Số điện thoại</label>
                                    <input type="text" name="bill_sdt" class="form-control" value="<?php echo $bill_sdt ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="bill_email" class="form-label">Email</label>
                                    <input type="email" name="bill_email" class="form-control" value="<?php echo $bill_email ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="idtrangthai" class="form-label">Trạng thái</label>
                                    <select name="idtrangthai" class="form-select" <?php if ($current_status == $cancel_status) echo 'disabled'; ?>>
                                        <?php 
                                        // Nếu trạng thái đơn hàng chưa hủy, cho phép chọn trạng thái theo thứ tự
                                        if ($current_status != $cancel_status) {
                                            $next_status = $current_status < 5 ? $current_status + 1 : $current_status; // Trạng thái tiếp theo

                                            // Vòng lặp cho phép chọn trạng thái theo thứ tự từ
                                            foreach ($valid_statuses as $status) {
                                                if ($status >= $next_status) {
                                                    echo '<option value="' . $status . '" ' . ($current_status == $status ? 'selected' : '') . '>' . get_status_name($status) . '</option>';
                                                }
                                            }
                                        } else {
                                            // Nếu trạng thái đã là "Hủy đơn hàng", chỉ hiển thị trạng thái "Hủy đơn hàng"
                                            echo '<option value="' . $cancel_status . '" selected>Hủy đơn hàng</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="ngaydathang" class="form-label">Ngày đặt hàng</label>
                                    <input type="text" name="ngaydathang" class="form-control" value="<?php echo $ngaydathang ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="total" class="form-label">Thành tiền</label>
                                    <input type="text" name="total" class="form-control" value="<?php echo $total ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="lydohuy" class="form-label">Lý do hủy</label>
                                    <textarea name="lydohuy" class="form-control" rows="3" disabled><?php echo isset($lydohuy) ? $lydohuy : ''; ?></textarea>
                                </div>
                                <div>
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <button type="submit" name="capnhat" value="Cập nhật" class="btn btn-primary">Cập nhật</button>
                                    <a href="index.php?act=listdh" class="btn btn-secondary">Quay lại</a>
                                </div>
                                <?php if (isset($thongbao) && $thongbao != "") echo "<div class='alert alert-info mt-3'>$thongbao</div>"; ?>
                            </form>
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

