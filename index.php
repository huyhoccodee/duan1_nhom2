<?php


include "view/header.php";
include "model/pdo.php";
include "model/voucher.php";



if (isset($_GET['act'])&&($_GET['act']!="")) {
    $act=$_GET['act'];
    switch ($act) {
        case 'lienhe':
            unset($_SESSION['error']);
            if (isset($_POST['guiyeucau']) && ($_POST['guiyeucau'])) {
                // Nhận dữ liệu từ form
                $lh_name = trim($_POST['lh_name']);
                $lh_email = trim($_POST['lh_email']);
                $lh_sdt = trim($_POST['lh_sdt']);
                $lh_noidung = trim($_POST['lh_noidung']);
        
                // Kiểm tra các trường dữ liệu
                if (empty($lh_name)) {
                    $_SESSION['error']['name'] = 'Bạn chưa nhập tên';
                }
                if (empty($lh_email)) {
                    $_SESSION['error']['email'] = 'Bạn chưa nhập email';
                } else {
                    $regex_email = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
                    if (!preg_match($regex_email, $lh_email)) {
                        $_SESSION['error']['email'] = 'Email không hợp lệ';
                    }
                }
                if (empty($lh_sdt)) {
                    $_SESSION['error']['sdt'] = 'Bạn chưa nhập số điện thoại';
                } else {
                    $regexPhone = '/^0[0-9]{9}$/';
                    if (!preg_match($regexPhone, $lh_sdt)) {
                        $_SESSION['error']['sdt'] = 'Số điện thoại không hợp lệ';
                    }
                }
                if (empty($lh_noidung)) {
                    $_SESSION['error']['noidung'] = 'Bạn chưa nhập nội dung';
                }
        
                // Nếu không có lỗi thì lưu dữ liệu
                if (empty($_SESSION['error'])) {
                    $sql = "INSERT INTO lienhe (lh_name, lh_email, lh_sdt, lh_noidung) VALUES ('$lh_name', '$lh_email', '$lh_sdt', '$lh_noidung')";
                    pdo_execute($sql);
                    $_SESSION['success'] = 'Gửi liên hệ thành công! Chúng tôi sẽ phản hồi sớm nhất.';
                }
            }
        
            // Hiển thị form liên hệ
            include "view/lienhe.php";
            break;

            case 'chinhsach':
                include "view/chinhsach.php";
                break;
            
                // case 'gioithieu':
                //     $sql="select * from magiamgia where is_delete=1";
                //     $mgg=pdo_query_one($sql);
                //             include "view/gioithieu.php";
                //             break;  
                
                case 'gioithieu':
                    $mgg_list = loadall(); // Gọi hàm loadall để lấy toàn bộ danh sách mã giảm giá
                
                    if (empty($mgg_list)) {
                        echo "Không có mã giảm giá nào.";
                    } else {
                        include "view/gioithieu.php"; // Truyền dữ liệu vào file view
                    }
                    break;

        default:
            include "view/index.php";
            break;
    }
} else {
    include "view/index.php";
}


include "view/footer.php";
?>