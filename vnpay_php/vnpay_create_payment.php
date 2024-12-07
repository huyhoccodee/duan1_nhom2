<?php
if (!isset($_SESSION)) {
    session_start();
}

// Kiểm tra giỏ hàng
if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
    $tongTienHang = 0;
    $phiVanChuyen = 100000;

    // Tính tổng tiền hàng
    foreach ($_SESSION['giohang'] as $item) {
        $thanhtien = $item[3] * $item[4];
        $tongTienHang += $thanhtien;
    }

    // Tổng tiền đơn hàng = tổng tiền hàng + phí vận chuyển
    $tt = $tongTienHang + $phiVanChuyen;

    // Lưu giá trị vào session để xử lý thanh toán
    $_SESSION['order']['total_price'] = $tt;


}
    
date_default_timezone_set('Asia/Ho_Chi_Minh');

/**
 * Cấu hình thanh toán qua VNPay
 *
 * @author CTT VNPAY
 */

require_once("config.php");
require_once("../model/pdo.php");
require_once("../model/donhang.php");



date_default_timezone_set("Asia/Ho_Chi_Minh");
$date = date('Y-m-d H:i:s');

// Giả sử $tt đã được tính toán trước khi gọi mã này
// $tt = tổng giỏ hàng + phí vận chuyển, ví dụ: 
// $tt = 200000 + 100000 (phí vận chuyển) = 300000

$vnp_TxnRef = rand(100000, 999999); // Mã giao dịch (random hoặc lấy từ hệ thống)
$vnp_OrderInfo = "Thanh toán hóa đơn";
$vnp_OrderType = "billpayment";
$vnp_Amount =$tt * 100;
$vnp_Locale = "vn";
$vnp_BankCode = "";
$vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

$_SESSION['order']['payment_method'] = 'Thanh toán Online';
$_SESSION['order']['date'] = date('Y-m-d H:i:s');
$_SESSION['order']['total_price'] = $tt;
$_SESSION['order']['id_don_hang'] = $vnp_TxnRef;


// Lưu thông tin vào bảng bill
$id_user = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;
$bill_name = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : null;
$bill_diachi = isset($_SESSION['user']['diachi']) ? $_SESSION['user']['diachi'] : null;
$bill_sdt = isset($_SESSION['user']['sdt']) ? $_SESSION['user']['sdt'] : null;
$bill_email = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : null;



$id_pttt = 2; // Giả sử phương thức thanh toán mặc định là VNPay
$ngaydathang = $date;
$total = $tt;

// Insert đơn hàng vào DB và lấy id đơn hàng vừa tạo
$bill_id = insert_bill($id_user, $bill_name, $bill_diachi, $bill_sdt, $bill_email, $id_pttt, $ngaydathang, $total);

// Lưu thông tin chi tiết đơn hàng vào bảng cart
foreach ($_SESSION['giohang'] as $item) {
    $id_sp = $item[0];  // ID sản phẩm
    $img = $item[1];    // Hình ảnh sản phẩm
    $tensp = $item[2];  // Tên sản phẩm
    $gia = $item[3];    // Giá sản phẩm
    $soluong = $item[4]; // Số lượng
    $id_size = $item[5]; // ID kích thước
    $id_mau = $item[6];  // ID màu sắc
    $id_bt = getspbt($id_sp, $id_size, $id_mau); // Lấy ID biến thể sản phẩm

    // Thêm sản phẩm vào giỏ hàng
    addtocart($id_user, $id_sp, $img, $tensp, $gia, $soluong, $bill_id, $id_size, $id_mau, $id_bt);
}
$inputData = array(
    "vnp_Version" => "2.1.0",
    "vnp_TmnCode" => $vnp_TmnCode,
    "vnp_Amount" => $vnp_Amount, // Tính toán đúng tổng
    "vnp_Command" => "pay",
    "vnp_CreateDate" => date('YmdHis'),
    "vnp_CurrCode" => "VND",
    "vnp_IpAddr" => $vnp_IpAddr,
    "vnp_Locale" => $vnp_Locale,
    "vnp_OrderInfo" => $vnp_OrderInfo,
    "vnp_OrderType" => $vnp_OrderType,
    "vnp_ReturnUrl" => $vnp_Returnurl,
    "vnp_TxnRef" => $vnp_TxnRef,
);

if (isset($vnp_BankCode) && $vnp_BankCode != "") {
    $inputData['vnp_BankCode'] = $vnp_BankCode;
}

ksort($inputData);
$query = "";
$hashdata = "";
$i = 0;
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
    $query .= urlencode($key) . "=" . urlencode($value) . '&';
}
$hashdata = rtrim($hashdata, "&");
$query = rtrim($query, "&");

$vnp_Url = $vnp_Url . "?" . $query;
if (isset($vnp_HashSecret)) {
    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
    $vnp_Url .= '&vnp_SecureHash=' . $vnpSecureHash;
}
unset($_SESSION['giohang']);  // Xóa giỏ hàng trong session

header('Location: ' . $vnp_Url);
die();
?>
