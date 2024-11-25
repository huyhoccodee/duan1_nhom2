<?php
session_start();
if (isset($_SESSION['user'])) {
    $id_user= $_SESSION['user']['id'];
}

ob_start();
if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];

include "view/header.php";
include "model/pdo.php";
include "model/voucher.php";
include "model/dangky.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/donhang.php";

$sphome= loadall_spkobt($kyw="",$iddm=0);
$sptop10=load_sanpham_top10();
$listsize=loadall_size();
$listmau=loadall_mau();
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
            // edit tai khoan
        case 'edit_taikhoan':
                unset($_SESSION['error']);
                if (isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $name=$_POST['name'];
                    $pass=$_POST['pass'];
                    $email=$_POST['email'];
                    $diachi=$_POST['diachi'];
                    $sdt=$_POST['sdt'];
                    $id=$_POST['id'];
                    if (empty($email)) {
                        $_SESSION['error']['email'] = 'Bạn chưa nhập email';
                    } else {
                        $regex_email = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
                        if (!preg_match($regex_email, $email)) {
                            $_SESSION['error']['email'] = 'Email không hợp lệ';
                        }
                    }
                    if (empty($sdt)) {
                        $_SESSION['error']['sdt'] = 'Bạn chưa nhập sdt';
                    } else {
                        $regexPhone ='/^0[0-9]{9}$/';
                        if (!preg_match($regexPhone, $sdt)) {
                            $_SESSION['error']['sdt'] = 'số điện thoại không hợp lệ';
                        }
                    }
                    if (empty($_SESSION['error'])) {  
                    update_taikhoan($id,$name,$pass,$email,$diachi,$sdt);
                    $_SESSION['user']=checkuser($name,$pass);
                    header('Location: index.php?act=trangchu');
                    }
                }
                include "view/edit_taikhoan.php";
                break;
                // quen mat khau
                case 'quenmk':
                    if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {
                        
                        $email = $_POST['email'];
                        
        
                        
                         $sql = "SELECT * FROM taikhoan WHERE email ='$email'";
                         $checkemail = pdo_query_one($sql); 
                         if (is_array($checkemail)) {
                            $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                        } else {
                            $thongbao = "Email này không tồn tại";
                        }
                           } 
                        
                    include "view/quenmk.php";

                break;       
            // san pham
            case 'sanpham':
                if (isset($_POST['kyw'])&&($_POST['kyw']!="")) {
                    $kyw=$_POST['kyw'];
                }else {
                    $kyw="";
                }
                if (isset($_GET['iddm'])&&($_GET['iddm']>0)) {
                    $iddm=$_GET['iddm'];
                } else {
                   $iddm=0;
                }
                    $listdm=loadall_danhmuc();
                  $sphome= loadall_spkobt($kyw,$iddm);
                    $sptop10=load_sanpham_top10();
                    
                    include "view/product_list.php";
                    break;
                // chi tiet san pham
                case 'sanphamct':
                    if (isset($_GET['idsp'])&& ($_GET['idsp']>0) ) {
                        $id=$_GET['idsp'];
                        $sp=loadone_sanpham($id);   
                        $iddm=$sp['id_dm'];
                        $listspcungloai=load_sanpham_cungloai($id,$iddm);
                        $listdm=loadall_danhmuc();
                        include "view/product_detail.php";
                    } else {
                        include "view/trangchu.php";
                    }
                    break;
 
                    /**Giỏ hàng */
                    case 'addcart':
                        //lấy dữ liệu từ form
                        // if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                            
                        //     $id=$_POST['id'];
                        //     $img=$_POST['img'];
                        //     $tensp=$_POST['tensp'];
                        //     $gia=$_POST['gia'];
                        //     $soluong=1;
                            
                        //     $thanhtien=$soluong*$gia;
                        //     //khởi tạo mảng con
                        //     $item=array($id,$img,$tensp,$gia,$soluong,$thanhtien);
                        //     $_SESSION['giohang'][]=$item;
                            
                        // }
                        if (!isset($_SESSION['user'])) {
                            include "view/dangnhap.php";
                        }else{
                            if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                               
                                $id_sp=$_POST['id_sp'];
                                $img=$_POST['img'];
                                $tensp=$_POST['tensp'];
                                $gia=$_POST['gia'];
                                $id_size = $_POST['size'];
                                $id_mau = $_POST['mau'];
                             
           
                                if(isset($_POST['soluong'])&&($_POST['soluong']>0)){
                                    
                                    $soluong=$_POST['soluong'];
                                }else{
                                    $soluong=1;
                                }
                                foreach($listsize as $size){
                                    if ($size['idsize'] == $id_size) {
                                        $name_size = $size['size'];
                                    }
                                }
                                foreach($listmau as $mau){
                                    if ($mau['idmau'] == $id_mau) {
                                        $name_mau = $mau['mau'];
                                    }
                                }  
                                $id_bt=getspbt($id_sp,$id_size,$id_mau)['id_bt'];
                                $fg=0;
                                //ktra sp trùng thì cập nhật sl
                                $i=0;
                                foreach ($_SESSION['giohang'] as $item){
                                   
                                        if($item[0]===$id_sp && $item[5]===$id_size && $item[6]===$id_mau){
                                            $slnew=$soluong+$item[4];
                                            $_SESSION['giohang'][$i][4]=$slnew;
                                            $fg=1;
                                            break;
                                        }
                                        $i++;
                                }
                                
                                //khởi tạo mảng con
                                if($fg==0){
                                    $item=array($id_sp,$img,$tensp,$gia,$soluong,$id_size,$id_mau,$name_size,$name_mau,$id_bt);
                                    $_SESSION['giohang'][]=$item;
                                }
                            }
                         
                            include "view/cart.php";
                        }
                        
                    
                    break;
                         /**Xóa đơn hàng */
                    case 'delcart':
                        //xóa all
                        // if(isset($_POST['idcart'])){
                        //     array_splice($_SESSION['giohang'],$_GET['idcart'],1);
        
                            
                        // }else{
                        //     $_SESSION['giohang']=[];
                        // }
                        // include "view/cart.php";
                        if(isset($_GET['i'])&&($_GET['i']>=0)){
                            if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])>=0))
                                array_splice($_SESSION['giohang'],$_GET['i'],1);
                            }else{
                                if(isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
                            }
                            
                            if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])==0)){
                                
                                header('location: index.php');
                            }else{
                                header('location: index.php?act=addcart');
                            }
                     break;

                     case 'checkout':
                        unset($_SESSION['error']);
                        $tt = 0;
                    
                        // Kiểm tra mã giảm giá
                        if (isset($_POST['apdungma']) && ($_POST['apdungma'])) {
                            $name_magg = $_POST['name_magg'];
                            $checkmagg = null;
                            $sql = "SELECT * FROM magiamgia WHERE name_magg ='$name_magg' AND is_delete=1";
                            $checkmagg = pdo_query_one($sql);
                    
                            if (is_array($checkmagg)) {
                                // Giảm số lượng mã giảm giá
                                $sql = "UPDATE magiamgia SET soluong = soluong - 1 WHERE name_magg ='$name_magg'";
                                pdo_execute($sql);
                    
                                // Xóa mã giảm giá khi số lượng bằng 0
                                $sql = "UPDATE magiamgia SET is_delete = 0 WHERE soluong = 0";
                                pdo_execute($sql);
                    
                                $thongbao = "Nhập mã giảm giá thành công";
                            } else {
                                $thongbao = "Mã giảm giá này không tồn tại";
                            }
                        }
                    
                        // Kiểm tra thông tin thanh toán khi người dùng nhấn 'Đặt hàng'
                        if (isset($_POST['dathang']) && ($_POST['dathang'])) {
                            $id_user = $_SESSION['user']['id'];
                            $bill_name = $_POST['bill_name'];
                            $bill_diachi = $_POST['bill_diachi'];
                            $bill_sdt = $_POST['bill_sdt'];
                            $bill_email = $_POST['bill_email'];
                            $id_pttt = $_POST['id_pttt'];
                            $ngaydathang = date("Y-m-d ");
                            
                            // Kiểm tra tổng (total)
                            $total = isset($_POST['total']) ? $_POST['total'] : 0;
                    
                            // Kiểm tra các trường thông tin
                            if (empty($bill_email)) {
                                $_SESSION['error']['email'] = 'Bạn chưa nhập email';
                            } else {
                                $regex_email = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
                                if (!preg_match($regex_email, $bill_email)) {
                                    $_SESSION['error']['email'] = 'Email không hợp lệ';
                                }
                            }
                    
                            if (empty($bill_name)) {
                                $_SESSION['error']['name'] = 'Bạn chưa nhập tên';
                            } else {
                                $regex_name = "/^[\p{L}\s]+$/u"; // Chỉ cho phép chữ cái và khoảng trắng (hỗ trợ tiếng Việt).
                                if (!preg_match($regex_name, $bill_name)) {
                                    $_SESSION['error']['name'] = 'Tên không hợp lệ, chỉ được chứa chữ cái và khoảng trắng';
                                }
                            }
                    
                            if (empty($bill_diachi)) {
                                $_SESSION['error']['diachi'] = 'Bạn chưa nhập địa chỉ';
                            } else {
                                if (strlen($bill_diachi) < 10) {
                                    $_SESSION['error']['diachi'] = 'Địa chỉ quá ngắn, tối thiểu 10 ký tự';
                                }
                            }
                    
                            if (empty($bill_sdt)) {
                                $_SESSION['error']['sdt'] = 'Bạn chưa nhập số điện thoại';
                            } else {
                                $regexPhone = '/^0[0-9]{9}$/';
                                if (!preg_match($regexPhone, $bill_sdt)) {
                                    $_SESSION['error']['sdt'] = 'Số điện thoại không hợp lệ';
                                }
                            }
                    
                            // Nếu không có lỗi, thực hiện đặt hàng
                            if (empty($_SESSION['error'])) {
                                // Thêm đơn hàng vào database
                                $id_bill = insert_bill($id_user, $bill_name, $bill_diachi, $bill_sdt, $bill_email, $id_pttt, $ngaydathang, $total);
                                $_SESSION['id_bill'] = $id_bill;
                    
                                // Xử lý các sản phẩm trong giỏ hàng
                                if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) {
                                    foreach ($_SESSION['giohang'] as $item) {
                                        addtocart($id_user, $item[0], $item[1], $item[2], $item[3], $item[4], $id_bill, $item[5], $item[6], $item[9]);
                                    }
                                    unset($_SESSION['giohang']);
                                    header('location: index.php?act=taikhoan');
                                }
                            }
                        }
                    
                        // Bao gồm file view để hiển thị giao diện thanh toán
                        include "view/checkout.php";
                        break;

                        case 'taikhoan':
                            include "view/my-account.php";
                            break;
                        case 'chitietdh':
                            if (isset($_GET['id'])&& ($_GET['id']>0) ) {
                                $idbill=$_GET['id'];
                                $listctdh=getcart($idbill);
                            }
                            $id_user= $_SESSION['user']['id'];
                            $dh=getbill($id_user);
                            include "view/chitietdh.php";
                        break;
        default:
            include "view/trangchu.php";
            break;
    }

} else {
    include "view/trangchu.php";
}


include "view/footer.php";
?>