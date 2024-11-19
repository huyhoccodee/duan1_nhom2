<?php

include "header.php";
include "../model/pdo.php";
include "../model/danhmuc.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        // Thêm danh mục
        case 'adddm':
            if (isset($_POST['themdanhmuc']) && $_POST['themdanhmuc']) {
                $tenloai = trim($_POST['tenloai']); // Loại bỏ khoảng trắng đầu cuối

                // Validate giá trị của $tenloai
                if (empty($tenloai)) {
                    $error = "Tên loại không được để trống.";
                } elseif (strlen($tenloai) < 3 || strlen($tenloai) > 50) {
                    $error = "Tên loại phải từ 3 đến 50 ký tự.";
                } else {
                    insert_danhmuc($tenloai);
                    $message = "Thêm danh mục thành công.";
                }
            }
            include "danhmuc/add.php";
            break;


        // Hiển thị danh sách danh mục
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/listdm.php";
            break;

        // Sửa danh mục
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id=$_GET['id'];
                $dm = loadone_danhmuc($id);
            }
            include "danhmuc/updatedm.php";
            break;

       // Cập nhật danh mục
        // case 'updatedm':
        //     if (isset($_GET['id']) && $_GET['id'] > 0) {
        //         $id = intval($_GET['id']); // Lấy id từ URL
        //         $dm = loadone_danhmuc($id); // Lấy thông tin danh mục cũ
        //     }

        //     if (isset($_POST['capnhatdm']) && $_POST['capnhatdm']) {
        //         $id = intval($_POST['id']); // Lấy id từ form
        //         $tenloai = trim($_POST['tenloai']); // Loại bỏ khoảng trắng đầu cuối

        //         // Kiểm tra điều kiện validate
        //         if (empty($tenloai)) {
        //             $error = "Tên loại không được để trống.";
        //         } elseif (strlen($tenloai) < 3 || strlen($tenloai) > 50) {
        //             $error = "Tên loại phải từ 3 đến 50 ký tự.";
        //         } else {
        //             // Nếu validate thành công, cập nhật danh mục vào cơ sở dữ liệu
        //             update_danhmuc($id, $tenloai); 
        //             $message = "Cập nhật danh mục thành công.";
        //         }
        //     }

        //     // Load danh mục để hiển thị trong danh sách
        //     $listdanhmuc = loadall_danhmuc();
        //     include "danhmuc/listdm.php"; // Chuyển đến trang danh sách
        //     break;
        case 'updatedm':
            if (isset($_POST['capnhatdm']) && $_POST['capnhatdm']) {
                $id=$_POST['id'];
                $tenloai=$_POST['tenloai'];
                update_danhmuc($id,$tenloai);
            }
            $listdanhmuc=loadall_danhmuc();
            include "danhmuc/listdm.php";
            break;


        // Xóa danh mục
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = intval($_GET['id']); // Chuyển ID về số nguyên
                delete_danhmuc($id);
                $message = "Xóa danh mục thành công.";
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/listdm.php";
            break;

        // Hành động mặc định
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
?>