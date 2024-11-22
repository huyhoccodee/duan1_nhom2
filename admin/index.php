<?php

include "header.php";
include "../model/pdo.php";
include "../model/danhmuc.php";
include "../model/voucher.php";
include "../model/dangky.php";
include "../model/sanpham.php";


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

    //    Cập nhật danh mục
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
        // add voucher
        case 'addvc':
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $name_magg=$_POST['name_magg'];
                $giamgia=$_POST['giamgia'];
                
                $soluong=$_POST['soluong'];
                insert_voucher($name_magg,$giamgia,$soluong);
                $thongbao="Thêm mới thành công";
            }
            include "voucher/add.php";  

        break;
        // list voucher
        case 'listvc':
            
            $listvoucher=loadall();
            include "voucher/list.php";

        break;
        // xoa voucher
        case 'xoavc':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_voucher($_GET['id']);
              }
              $listvoucher=loadall();
            include "voucher/list.php";

        break;
        /**LIÊN HỆ */
        
        // list lien he
        case 'listlh':
            $sql="select * from lienhe order by lh_name";
            $listlienhe=pdo_query($sql);
            include "lienhe/list.php";

        break;

        //xoa lien he
        case 'xoalh':
            if(isset($_GET['id'])&&($_GET['id']>0)){
               $sql="delete from lienhe where id=".$_GET['id'];
               pdo_execute($sql);
              }
              $sql="select * from lienhe order by lh_name";
              $listlienhe=pdo_query($sql);
            include "lienhe/list.php";
            break;

            /**ĐĂNG KÝ */
            //list đk
        case 'listdangky':
            
            $listdangky=loadall_dangky();
            include "dangky/list.php";

        break;
        // xóa đk
        case 'xoadk':
            if(isset($_GET['id'])&&($_GET['id']>0)){
                delete_dangky($_GET['id']);
              }
              $listdangky=loadall_dangky();
            include "dangky/list.php";

        break; 

        case 'addsp':
            if (isset($_POST['themsp']) && $_POST['themsp']) {
                $errors = []; // Mảng lưu lỗi
        
                // Validate mã sản phẩm
                $masp = trim($_POST['masp']);
                if (empty($masp)) {
                    $errors['masp'] = "Mã sản phẩm không được để trống.";
                }
        
                // Validate tên sản phẩm
                $tensp = trim($_POST['tensp']);
                if (empty($tensp)) {
                    $errors['tensp'] = "Tên sản phẩm không được để trống.";
                }
        
                // Validate giá sản phẩm
                $gia = trim($_POST['gia']);
                if (!is_numeric($gia) || $gia <= 0) {
                    $errors['gia'] = "Giá sản phẩm phải là số và lớn hơn 0.";
                }
        
                // Validate mô tả sản phẩm
                $mota = trim($_POST['mota']);
                if (empty($mota)) {
                    $errors['mota'] = "Mô tả không được để trống.";
                }
        
                // Validate hình ảnh sản phẩm
                $img = $_FILES['img']['name'];
                if (empty($img)) {
                    $errors['img'] = "Hình ảnh không được để trống.";
                } elseif ($_FILES['img']['size'] > 2 * 1024 * 1024) {
                    $errors['img'] = "Hình ảnh phải nhỏ hơn 2MB.";
                }
        
                // Validate lượt xem sản phẩm
                $luotxem = trim($_POST['luotxem']);
                if (!is_numeric($luotxem) || $luotxem <= 0) {
                    $errors['luotxem'] = "Lượt xem phải là số và không được nhỏ hơn 0.";
                }
        
                if (empty($errors)) {
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($img);
                    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                        // Thực hiện insert nếu không có lỗi
                        $id_dm = $_POST['idloai'];
                        insert_sanpham($masp, $tensp, $img, $gia, $mota, $luotxem, $id_dm);
                        $success = "Thêm sản phẩm thành công!";
                    }
                }
            }
    
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        
        

        case 'listsp':
            if (isset($_POST['listok'])&&($_POST['listok'])) {
                $kyw=$_POST['kyw'];
                $iddm=$_POST['iddm'];
            } else{
                $kyw='';
                $iddm=0;
            }
            $listdanhmuc=loadall_danhmuc();
            $listsanpham=loadall_sanpham($kyw,$iddm);
        include "sanpham/list.php";
        break; 

        case 'spbt':
            $listsanpham=loadall_spkbt();
            $listdanhmuc=loadall_danhmuc();
        $listsize=loadall_size();
        $listmau=loadall_mau();
            include "sanpham/spbt.php";
            break;

        case 'addspbt':
            if (isset($_POST['themspbt']) && $_POST['themspbt']) {
                $masp=$_POST['masp'];
               $idsize=$_POST['idsize'];
               $idmau=$_POST['idmau'];
               $soluong=$_POST['soluong'];
               insert_spbt($masp,$idsize,$idmau,$soluong);
            }
            $listsanpham=loadall_sanpham();
            include "sanpham/list.php";
            $listdanhmuc=loadall_danhmuc();
            $listsize=loadall_size();
            $listmau=loadall_mau();
          
            break;

        case 'xoasp':
            if (isset($_GET['id'])&& ($_GET['id']>0) ) {
                $id=$_GET['id'];
                delete_sanpham($id);
            }
            $listsanpham=loadall_sanpham();
            include "sanpham/list.php";
            break;
            case 'suasp':
                if (isset($_GET['id'])&& ($_GET['id']>0) ) {
                    $id=$_GET['id'];
                    $sp=loadone_sanpham($id);
                }
                $listdanhmuc=loadall_danhmuc();
            $listsize=loadall_size();
            $listmau=loadall_mau();
                include "sanpham/update.php";
            break;

            case 'updatesp':
                if (isset($_POST['capnhatsp']) && $_POST['capnhatsp']) {
                    $id_bt=$_POST['id_bt'];
                    $masp=$_POST['masp'];
                    $tensp=$_POST['tensp'];
                    $img=$_FILES['img']['name'];
                   $target_dir="../upload/";
                   $target_file=$target_dir.basename($_FILES["img"]['name']);
                   if (move_uploaded_file($_FILES["img"]["tmp_name"],$target_file)) {
                    
                   }
                   $gia=$_POST['gia'];
                   $mota=$_POST['mota'];
                   $luotxem=$_POST['luotxem'];
                   $id_dm=$_POST['idloai'];
                   $idsize=$_POST['idsize'];
                   $idmau=$_POST['idmau'];
                   $soluong=$_POST['soluong'];
                   update_sanpham($masp,$tensp,$img,$gia,$mota,$luotxem,$id_dm,$idsize,$idmau,$soluong,$id_bt);
                }
                $listdanhmuc=loadall_danhmuc();
                $listsize=loadall_size();
                $listmau=loadall_mau();
                $listsanpham=loadall_sanpham();
                include "sanpham/list.php";
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