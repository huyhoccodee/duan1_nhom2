<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
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
        </div>
    </div>
</div>