<?php
require_once 'pdo.php';
include_once 'toast-message.php';
function user_insert($ho_ten, $ten_dang_nhap, $mat_khau, $email, $phone, $hinh_anh, $trang_thai, $dia_chi, $kich_hoat, $display_user, $id_roles)
{
    $sql = "INSERT INTO user(ho_ten, ten_dang_nhap, mat_khau, email, phone, hinh_anh, trang_thai, dia_chi, kich_hoat, display_user, id_roles) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ho_ten, $ten_dang_nhap, $mat_khau, $email, $phone, $hinh_anh, $trang_thai, $dia_chi, $kich_hoat, $display_user, $id_roles);
    showSuccessToast('Bạn đã đăng ký tài khoản thành công!');
}
function user_login($user, $password)
{
    $sql = "SELECT * FROM user WHERE ten_dang_nhap = ?  AND mat_khau = ?";
    $login = pdo_query_one($sql, $user, $password);
    if ($login != false) {
        if ($login['kich_hoat'] == 1) {
            $_SESSION['login'] = $login;
            header('location: index.php');
        } else {
            showErrorToast('Tài khoản của bạn đã bị khoá do vi phạm tiêu chuẩn của chúng tôi, Bạn có thể đăng ký mới bên cạnh!');
        }
    } else {
        showErrorToast('Tài khoản không đúng!');
    }
    return $login;
}
function user_logout()
{
    if (isset($_SESSION['login'])) {
        unset($_SESSION['login']);
    }
}
function user_tim_pass($ten_dang_nhap, $email)
{
    $sql = "SELECT * FROM user WHERE ten_dang_nhap = ?  AND email = ?";
    $searchPass = pdo_query_one($sql, $ten_dang_nhap, $email);
    return $searchPass;
}
function user_update($id_kh, $ho_ten, $ten_dang_nhap, $mat_khau, $email, $phone, $hinh_anh, $trang_thai, $dia_chi, $kich_hoat, $display_user, $id_roles)
{
    $sql = "UPDATE user SET ho_ten=?,ten_dang_nhap=?,mat_khau=?,email=?,phone=?,hinh_anh=?,trang_thai=?,dia_chi=?,kich_hoat=?,display_user=?,id_roles=? WHERE id_kh = ?";
    $change = pdo_execute($sql,  $ho_ten, $ten_dang_nhap, $mat_khau, $email, $phone, $hinh_anh, $trang_thai, $dia_chi, $kich_hoat, $display_user, $id_roles, $id_kh);
    return $change;
}

function user_delete($id_kh)
{
    $sql = "DELETE FROM user  WHERE id_kh=?";
    if (is_array($id_kh)) {
        foreach ($id_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id_kh);
    }
}
function user_delete_none($id_kh)
{
    $sql = "UPDATE user SET display_user = 0  WHERE id_kh=?";
    if (is_array($id_kh)) {
        foreach ($id_kh as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id_kh);
    }
}
function user_select_all()
{
    $sql = "SELECT * FROM user JOIN roles ON user.id_roles = roles.id_roles";
    return pdo_query($sql);
}

function user_select_by_id($id_kh)
{
    $sql = "SELECT * FROM user WHERE id_kh=?";
    return pdo_query_one($sql, $id_kh);
}

function user_exist($id_kh)
{
    $sql = "SELECT count(*) FROM user WHERE id_kh=?";
    return pdo_query_value($sql, $id_kh) > 0;
}

function user_select_by_role($id_roles)
{
    $sql = "SELECT * FROM user WHERE id_roles=?";
    return pdo_query($sql, $id_roles);
}

function user_change_password($id_kh, $mat_khau_moi)
{
    $sql = "UPDATE user SET mat_khau=? WHERE id_kh=?";
    pdo_execute($sql, $mat_khau_moi, $id_kh);
}
