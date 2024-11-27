<?php
require_once 'pdo.php';

function danh_gia_insert($id_kh, $id_san_pham, $danh_gia, $noi_dung, $ngay_danh_gia, $display_danh_gia)
{
    $sql = "INSERT INTO danh_gia(id_kh, id_san_pham, danh_gia, noi_dung, ngay_danh_gia, display_danh_gia) VALUES (?,?,?,?,?,?)";
    pdo_execute($sql, $id_kh, $id_san_pham, $danh_gia, $noi_dung, $ngay_danh_gia, $display_danh_gia);
}

function danh_gia_update($id_danh_gia, $id_kh, $id_san_pham, $noi_dung, $ngay_danh_gia)
{
    $sql = "UPDATE danh_gia SET id_kh=?,id_san_pham=?,noi_dung=?,ngay_danh_gia=? WHERE id_danh_gia=?";
    pdo_execute($sql, $id_kh, $id_san_pham, $noi_dung, $ngay_danh_gia, $id_danh_gia);
}

function danh_gia_delete($id_danh_gia)
{
    $sql = "DELETE FROM danh_gia WHERE id_danh_gia=?";
    if (is_array($id_danh_gia)) {
        foreach ($id_danh_gia as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id_danh_gia);
    }
}
function danh_gia_delete_none($id_danh_gia)
{
    $sql = "UPDATE danh_gia SET display_danh_gia='0' WHERE id_danh_gia=?";
    if (is_array($id_danh_gia)) {
        foreach ($id_danh_gia as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id_danh_gia);
    }
}
function danh_gia_select_thong_ke_all()
{
    $sql = "SELECT danh_gia.id_san_pham, san_pham.ten_san_pham, SUM(1) AS 'tong_danh_gia', MIN(ngay_danh_gia) AS 'moi_nhat', MAX(ngay_danh_gia) AS 'cu_nhat' FROM danh_gia JOIN san_pham ON danh_gia.id_san_pham = san_pham.id_san_pham GROUP BY danh_gia.id_san_pham, san_pham.ten_san_pham";
    return pdo_query($sql);
}
function danh_gia_select_all()
{
    $sql = "SELECT * FROM danh_gia JOIN user ON danh_gia.id_kh = user.id_kh ORDER BY ngay_danh_gia DESC";
    return pdo_query($sql);
}
function danh_gia_count_by_id($id_san_pham)
{
    $sql = "SELECT COUNT(*) FROM danh_gia WHERE id_san_pham = ?";
    return pdo_query_count($sql, $id_san_pham);
}
function danh_gia_select_by_id($id_san_pham)
{
    $sql = "SELECT * FROM danh_gia JOIN user ON danh_gia.id_kh = user.id_kh  WHERE id_san_pham=? ORDER BY ngay_danh_gia DESC";
    return pdo_query($sql, $id_san_pham);
}

function danh_gia_exist($id_danh_gia)
{
    $sql = "SELECT count(*) FROM danh_gia WHERE id_danh_gia=?";
    return pdo_query_value($sql, $id_danh_gia) > 0;
}
//-------------------------------//
function danh_gia_select_by_hang_hoa($id_san_pham)
{
    $sql = "SELECT * FROM danh_gia JOIN khach_hang ON khach_hang.id_kh = danh_gia.id_kh WHERE id_san_pham = ? ORDER BY ngay_danh_gia DESC ";
    return pdo_query($sql, $id_san_pham);
}
function danh_gia_feedback($id_san_pham)
{
    $sql = "SELECT * FROM danh_gia JOIN user ON danh_gia.id_kh = user.id_kh WHERE danh_gia.id_san_pham = ?";
    return pdo_query($sql, $id_san_pham);
}
function danh_gia_exist_products($id_don_hang)
{
    $sql = "SELECT * FROM `danh_gia` JOIN chi_tiet_san_pham ON danh_gia.id_san_pham = chi_tiet_san_pham.id_san_pham JOIN chi_tiet_don_hang ON chi_tiet_san_pham.id_chi_tiet_san_pham = chi_tiet_don_hang.id_chi_tiet_san_pham WHERE chi_tiet_don_hang.id_chi_tiet_don_hang = ?";
    return pdo_query_one($sql, $id_don_hang);
}
