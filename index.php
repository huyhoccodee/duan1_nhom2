<?php
session_start();
if (isset($_SESSION['user'])) {
    $id_user= $_SESSION['user']['id'];
}

ob_start();

include "view/header.php";
include "model/pdo.php";
include "model/voucher.php";
include "model/dangky.php";

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
            

                
        case 'gioithieu':
            $mgg_list = loadall(); // Gọi hàm loadall để lấy toàn bộ danh sách mã giảm giá
                
            if (empty($mgg_list)) {
                echo "Không có mã giảm giá nào.";
            } else {
                include "view/gioithieu.php"; // Truyền dữ liệu vào file view
            }
                break;

        case 'dangky':
            unset($_SESSION['error']);
            if (isset($_POST['dangky']) && $_POST['dangky'] !== '') {
                $name = $_POST['name'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $sdt = $_POST['sdt'];   
            
                // Kiểm tra tên đăng nhập
                if (empty($name)) {
                    $_SESSION['error']['name'] = 'Bạn chưa nhập tên đăng nhập';
                }
            
                // Kiểm tra mật khẩu
                if (empty($pass)) {
                    $_SESSION['error']['pass'] = 'Bạn chưa nhập mật khẩu';
                } elseif (strlen($pass) < 6) {
                    $_SESSION['error']['pass'] = 'Mật khẩu phải có ít nhất 6 ký tự';
                }
            
                // Kiểm tra email
                if (empty($email)) {
                    $_SESSION['error']['email'] = 'Bạn chưa nhập email';
                } else {
                    $regex_email = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
                    if (!preg_match($regex_email, $email)) {
                        $_SESSION['error']['email'] = 'Email không hợp lệ';
                    }
                }
            
                // Kiểm tra số điện thoại
                if (empty($sdt)) {
                    $_SESSION['error']['sdt'] = 'Bạn chưa nhập số điện thoại';
                } else {
                    $regexPhone = '/^0[0-9]{9}$/';
                    if (!preg_match($regexPhone, $sdt)) {
                        $_SESSION['error']['sdt'] = 'Số điện thoại không hợp lệ';
                    }
                }
            
                // Kiểm tra địa chỉ
                if (empty($diachi)) {
                    $_SESSION['error']['diachi'] = 'Bạn chưa nhập địa chỉ';
                }
            
                // Nếu không có lỗi, thực hiện đăng ký
                if (empty($_SESSION['error'])) {           
                    insert_dangky($name, $pass, $email, $diachi, $sdt);
                    $_SESSION['success'] = "Đăng ký thành công. Vui lòng đăng nhập để mua hàng";
                    echo "<script>window.location.href = '?act=dangnhap';</script>";
                }
            }
            include "view/dangky.php";
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap']) && $_POST['dangnhap'] !== '') {
                $name = $_POST['name'];
                $pass = $_POST['pass'];
         
                // Khởi tạo một mảng để chứa thông báo lỗi
                $errors = [];
         
                // Kiểm tra tên đăng nhập
                if (empty($name)) {
                    $errors['name'] = 'Tên đăng nhập không được để trống';
                }
         
                // Kiểm tra mật khẩu
                if (empty($pass)) {
                    $errors['pass'] = 'Mật khẩu không được để trống';
                }
         
                // Nếu không có lỗi, thực hiện kiểm tra tài khoản
                if (empty($errors)) {
                    // Kiểm tra tài khoản và mật khẩu
                    $checkuser = checkuser($name, $pass);
                    if (is_array($checkuser)) {
                        // Nếu người dùng tồn tại, lưu thông tin vào session và chuyển hướng
                        $_SESSION['user'] = $checkuser;
                        header('Location: index.php');
                        exit; // Đảm bảo không tiếp tục xử lý thêm
                    } else {
                        // Nếu tài khoản không tồn tại hoặc mật khẩu sai
                        $thongbao = "Tài khoản không tồn tại hoặc mật khẩu không đúng";
                    }
                }
            }
         
            include "view/dangnhap.php";
            break;
        case 'dangxuat':
            session_unset();
            header('Location: index.php');
            include "view/trangchu.php";
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