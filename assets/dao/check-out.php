<?php
include_once 'pdo.php';
function checkout_select_all($id_kh, $id_gio_hang)
{
    $sql = "SELECT gio_hang.id_gio_hang, san_pham.ten_san_pham, san_pham.hinh_anh, size.size, mau.mau, gio_hang.so_luong, (san_pham.price*gio_hang.so_luong) AS price FROM gio_hang JOIN chi_tiet_san_pham ON gio_hang.id_chi_tiet_san_pham = chi_tiet_san_pham.id_chi_tiet_san_pham JOIN san_pham ON chi_tiet_san_pham.id_san_pham = san_pham.id_san_pham JOIN size ON chi_tiet_san_pham.id_size = size.id_size JOIN mau ON chi_tiet_san_pham.id_mau = mau.id_mau WHERE gio_hang.id_kh = ? AND id_gio_hang " . $id_gio_hang;
    return pdo_query($sql, $id_kh);
}
function checkout_sum($id_kh, $id_gio_hang)
{
    $sql = "SELECT SUM(gio_hang.so_luong*san_pham.price) AS tong_gia, SUM(gio_hang.so_luong) AS tong_sl FROM gio_hang JOIN chi_tiet_san_pham ON gio_hang.id_chi_tiet_san_pham = chi_tiet_san_pham.id_chi_tiet_san_pham JOIN san_pham ON chi_tiet_san_pham.id_san_pham = san_pham.id_san_pham WHERE gio_hang.id_kh = ? AND id_gio_hang " . $id_gio_hang;
    return pdo_query_one($sql, $id_kh);
}
