<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
            <li class="breadcrumb-item active">Thanh toán</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
<div class="checkout">
    <div class="container">
        <form action="index.php?act=checkout" method="post" class="khungmagg">
            <div class="form-group">
            <?php
            // Kiểm tra xem người dùng đã chọn mã giảm giá nào chưa
            $thongbao = '';
            $selected_magg = isset($_POST['name_magg']) ? $_POST['name_magg'] : ''; 
            $sql = "SELECT * FROM magiamgia WHERE is_delete = 1";
            $vouchers = pdo_query($sql);
            ?>

            <select name="name_magg" id="voucher" class="form-control custom-select w-50">
                <option value="">--Chọn mã giảm giá--</option>
                <?php
                foreach ($vouchers as $voucher) {
                    // Kiểm tra xem voucher đã hết hạn chưa
                    $expired = strtotime($voucher['end_date']) < time();                   
                    // Kiểm tra số lượng voucher còn lại
                    $disabled = $voucher['soluong'] <= 0 || $expired ? 'disabled' : '';                 
                    // Lấy giá trị min của voucher
                    $min_order_value = $voucher['min_order_value'] > 0 ? $voucher['min_order_value'] : 0;
                    // Tính tổng giá trị đơn hàng (bao gồm cả phí vận chuyển)
                    $tong = 0;
                    foreach ($_SESSION['giohang'] as $item) {
                        $thanhtien = $item[3] * $item[4];
                        $tong += $thanhtien;
                    }
                    $tt = $tong + 100000;
                    // Kiểm tra tổng đơn hàng có nằm trong phạm vi min_order_value không
                    if ($tt < $min_order_value) {
                        $disabled = 'disabled';
                    }                  
                    // Hiển thị lựa chọn mã giảm giá
                    $status_text = $expired ? 'Hết hạn' : ($voucher['soluong'] > 0 ? 'Còn ' . $voucher['soluong'] . ' mã' : 'Hết mã');
                    $status_text2 = "Đơn tối thiểu: {$min_order_value}";
                    $end_date = date('d-m-Y', strtotime($voucher['end_date']));
                    $selected = ($voucher['name_magg'] === $selected_magg) ? 'selected' : '';
                
                    echo "<option value='{$voucher['name_magg']}' {$disabled} {$selected}>
                        {$voucher['name_magg']} (HSD: {$end_date}) - {$status_text} - {$status_text2}
                    </option>";
                }
                ?>
            </select>
           </div>
           <input type="submit" name="apdungma" value="Áp dụng mã" class="nhap btn btn-primary w-20">
           <?php
                // Kiểm tra mã giảm giá khi người dùng áp dụng
                if (isset($_POST['apdungma']) && $_POST['name_magg']) {
                    // Lấy thông tin voucher đã chọn
                    $voucher_name = $_POST['name_magg'];
                    $voucher_check = pdo_query_one("SELECT * FROM magiamgia WHERE name_magg = ?", [$voucher_name]);
                    
                    // Kiểm tra nếu voucher tồn tại và có số lượng còn lại
                    if ($voucher_check && $voucher_check['soluong'] > 0 && strtotime($voucher_check['end_date']) > time()) {
                        // Voucher hợp lệ
                        $_SESSION['voucher'] = $voucher_check;
                        $checkmagg = $voucher_check; // Gán giá trị vào $checkmagg
                        $thongbao = "Mã giảm giá '{$voucher_name}' đã được áp dụng thành công!";
                    } else {
                        // Voucher không hợp lệ
                        $thongbao = "Mã giảm giá không hợp lệ hoặc đã hết hạn!";
                    }
                }
            ?>
                
                
                <span class="thongbao <?php echo isset($thongbao) && strpos($thongbao, 'thành công') !== false ? 'text-success' : 'text-danger'; ?>">
                    <?= isset($thongbao) ? $thongbao : '' ?>
                </span>


        </form>

     
        <form action="index.php?act=checkout" method="post">

            <div class="row">
                <div class="col-md-7">
                    <div class="billing-address">
                        <h2>Nhập thông tin thanh toán</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Người đặt hàng</label>
                                <input class="form-control" name="bill_name" type="text" placeholder="Tên" required
                                    value="<?php echo isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : ''; ?>">
                            </div>

                            <div class="col-md-6">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="bill_diachi" type="text" placeholder="Địa chỉ"
                                    required
                                    value="<?php echo isset($_SESSION['user']['diachi']) ? $_SESSION['user']['diachi'] : ''; ?>">
                            </div>
                            <div class="col-md-6">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="bill_sdt" type="text" placeholder="Số điện thoại"
                                    id="sdt" required
                                    value="<?php echo isset($_SESSION['user']['sdt']) ? $_SESSION['user']['sdt'] : ''; ?>">
                                <span class="thongbao"></span>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input class="form-control" name="bill_email" type="email" placeholder="Email" required
                                    id="email"
                                    value="<?php echo isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : ''; ?>">
                                <span class="thongbao"></span>
                            </div>
                        </div>

                    </div>

                    <?php 
                        if (isset($_SESSION['error'])) {
                            echo '<div class="alert alert-danger">';
                            foreach ($_SESSION['error'] as $key => $value) {
                                echo '<li>' . $value . '</li>';
                            }
                            echo '</div>';
                            
                        } 
                        
                    ?>
                </div>

                <div class="col-md-5">

                    <div class="checkout-summary">
                        <h2>Sản phẩm </h2>

                        <!-- -----------------------------------------------------magg-------------------------------------------------------- -->
                        <div class="checkout-content">
            <?php 
                $tong = 0;
                if (isset($_POST['apdungma']) && ($_POST['apdungma'])) {
                    $pvc = 0;
                    foreach ($_SESSION['giohang'] as $item) {
                        $thanhtien = $item[3] * $item[4];
                        $tong += $thanhtien;
                        $tt = $tong + 100000;
                        if (isset($checkmagg['giamgia'])) {
                            $pvc = $tt - $checkmagg['giamgia'];
                        }
                        echo '
                        <p>' . $item[2] . ' <span>' . number_format($item[3], 0, ',', '.') . ' VNĐ</span> | X' . $item[4] . '</p>';
                    }
            ?>
            <p>Phí vận chuyển<span><?php echo number_format(100000, 0, ',', '.') . ' VNĐ'; ?></span></p>
            <p class="">Giảm giá<span>
                <?php 
                if (isset($checkmagg['giamgia'])) {
                    if (isset($_POST['apdungma']) && ($_POST['apdungma'])) {
                        echo number_format($checkmagg['giamgia'], 0, ',', '.') . ' VNĐ';
                    }
                } else {
                    echo "0 VNĐ";
                } ?>
            </span></p>
            <h4>Thành tiền<span>
            <?php 
            if (isset($checkmagg['giamgia'])) {
                $pvc = $tt - $checkmagg['giamgia']; // Áp dụng giảm giá
                echo number_format($pvc, 0, ',', '.') . ' VNĐ';
            } else {
                echo number_format($tt, 0, ',', '.') . ' VNĐ';
            }
            ?>

            </span>
            </h4>
            <?php 
                } else {
                    foreach ($_SESSION['giohang'] as $item) {
                        $thanhtien = $item[3] * $item[4];
                        $tong += $thanhtien;
                        $tt = $tong + 100000;
                        echo '
                        <p>' . $item[2] . ' <span>' . number_format($item[3], 0, ',', '.') . ' VNĐ</span> | X' . $item[4] . '</p>';
                    }
            ?>
            <p>Phí vận chuyển<span><?php echo number_format(100000, 0, ',', '.') . ' VNĐ'; ?></span></p>
            <h4>Thành tiền<span><?php echo number_format($tt, 0, ',', '.') . ' VNĐ'; ?></span></h4>
            <?php } ?>
        </div>

                    <div class="checkout-payment">
                        <h2>Phương thức thanh toán</h2>
                        <div class="payment-methods">
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-1" name="id_pttt"
                                        value="1" require checked>
                                    <label class="custom-control-label" for="payment-1">Thanh toán khi nhận hàng</label>
                                </div>

                            </div>
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-2" name="id_pttt"
                                        value="2" require>
                                    <label class="custom-control-label" for="payment-2">Thanh toán oline qua
                                        VNPAY</label>
                                </div>
                                <div class="payment-content" id="payment-2-show">
                                    <p>

                                    </p>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-3" name="id_pttt"
                                        value="3" require>
                                    <label class="custom-control-label" for="payment-3">Thẻ ngân hàng(Bảo trì)</label>
                                </div>

                            </div>

                        </div>
                        <!-- ------------------------------------------------------magg------------------------------------------------------- -->
                        <div class="col-md-6">
                            <input type="hidden" name="total"
                                value="<?php if(isset($checkmagg['giamgia'])){ echo $pvc; }else{echo $tt;}?>">
                            <input type="hidden" name="thanhtien" value="<?php echo $thanhtien?>">
                        </div>
                        <!-- ------------------------------------------------------------------------------------------------------------- -->
                        <div class="checkout-btn tieude text-center mt-3 mb-3">
                            <a href="index.php?act=taikhoan"><input type="submit" value="Đặt hàng " name="dathang"
                                    class="nhap dathang text-bg-primary" onclick="check()"></a>

                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<!-- Checkout End -->
</body>
</html>