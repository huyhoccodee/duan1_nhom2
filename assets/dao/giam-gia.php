<?php
require_once 'pdo.php';
function giam_gia_insert($code, $giam_gia, $so_luong, $ngay_het_han)
{
    $sql = "INSERT INTO ma_giam_gia(code, giam_gia, so_luong, ngay_het_han) VALUES (?,?,?,?)";
    pdo_execute($sql, $code, $giam_gia, $so_luong, $ngay_het_han);
}
function giam_gia_select()
{
    $sql = "SELECT * FROM ma_giam_gia ORDER BY ngay_het_han DESC";
    return pdo_query($sql);
}
function giam_gia_update($id_ma_giam_gia, $code, $giam_gia, $so_luong, $ngay_het_han)
{
    $sql = "UPDATE ma_giam_gia SET code=?,giam_gia=?,so_luong=?,ngay_het_han=? WHERE id_ma_giam_gia=?";
    pdo_execute($sql, $code, $giam_gia, $so_luong, $ngay_het_han, $id_ma_giam_gia);
}
function giam_gia_select_by($id_ma_giam_gia)
{
    $sql = "SELECT * FROM ma_giam_gia WHERE id_ma_giam_gia = ?";
    return pdo_query_one($sql, $id_ma_giam_gia);
}
function giam_gia_delete_none($id_ma_giam_gia)
{
    $sql = "UPDATE ma_giam_gia SET display_gg='0' WHERE id_ma_giam_gia=?";
    if (is_array($id_ma_giam_gia)) {
        foreach ($id_ma_giam_gia as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id_ma_giam_gia);
    }
}
function giam_gia_update_so_luong($id_ma_giam_gia)
{
    $sql = "UPDATE ma_giam_gia  SET so_luong =so_luong -1 WHERE id_ma_giam_gia = ?";
    pdo_query($sql, $id_ma_giam_gia);
}
