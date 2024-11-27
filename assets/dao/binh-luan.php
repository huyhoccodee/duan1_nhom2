<?php
require_once 'pdo.php';

function binh_luan_insert($id_kh, $id_san_pham, $noi_dung, $ngay_bl, $display_binh_luan)
{
    $sql = "INSERT INTO binh_luan(id_kh, id_san_pham, noi_dung, ngay_bl, display_binh_luan) VALUES (?,?,?,?,?)";
    pdo_execute($sql, $id_kh, $id_san_pham, $noi_dung, $ngay_bl, $display_binh_luan);
}

function binh_luan_update($id_binh_luan, $id_kh, $id_san_pham, $noi_dung, $ngay_bl)
{
    $sql = "UPDATE binh_luan SET id_kh=?,id_san_pham=?,noi_dung=?,ngay_bl=? WHERE id_binh_luan=?";
    pdo_execute($sql, $id_kh, $id_san_pham, $noi_dung, $ngay_bl, $id_binh_luan);
}
function binh_luan_update_content($id_binh_luan, $noi_dung)
{
    $sql = "UPDATE binh_luan SET noi_dung=? WHERE id_binh_luan = ?";
    pdo_execute($sql, $noi_dung, $id_binh_luan);
}

function binh_luan_delete($id_binh_luan)
{
    $sql = "DELETE FROM binh_luan WHERE id_binh_luan=?";
    if (is_array($id_binh_luan)) {
        foreach ($id_binh_luan as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id_binh_luan);
    }
}
function binh_luan_delete_none($id_binh_luan)
{
    $sql = "UPDATE binh_luan SET display_binh_luan='0' WHERE id_binh_luan=?";
    if (is_array($id_binh_luan)) {
        foreach ($id_binh_luan as $ma) {
            pdo_execute($sql, $ma);
        }
    } else {
        pdo_execute($sql, $id_binh_luan);
    }
}
function binh_luan_select_thong_ke_all()
{
    $sql = "SELECT binh_luan.id_san_pham, san_pham.ten_san_pham, SUM(1) AS 'tong_binh_luan', MIN(ngay_bl) AS 'moi_nhat', MAX(ngay_bl) AS 'cu_nhat' FROM binh_luan JOIN san_pham ON binh_luan.id_san_pham = san_pham.id_san_pham GROUP BY binh_luan.id_san_pham, san_pham.ten_san_pham";
    return pdo_query($sql);
}
function binh_luan_select_all()
{
    $sql = "SELECT * FROM binh_luan JOIN user ON binh_luan.id_kh = user.id_kh ORDER BY ngay_bl DESC";
    return pdo_query($sql);
}
function binh_luan_count_by_id($id_san_pham)
{
    $sql = "SELECT COUNT(*) FROM binh_luan WHERE id_san_pham = ?";
    return pdo_query_count($sql, $id_san_pham);
}
function binh_luan_select_by_id($id_san_pham)
{
    $sql = "SELECT * FROM binh_luan JOIN user ON binh_luan.id_kh = user.id_kh  WHERE id_san_pham=? ORDER BY ngay_bl DESC";
    return pdo_query($sql, $id_san_pham);
}

function binh_luan_exist($id_binh_luan)
{
    $sql = "SELECT count(*) FROM binh_luan WHERE id_binh_luan=?";
    return pdo_query_value($sql, $id_binh_luan) > 0;
}
//-------------------------------//
function binh_luan_select_by_hang_hoa($id_san_pham)
{
    $sql = "SELECT * FROM binh_luan JOIN khach_hang ON khach_hang.id_kh = binh_luan.id_kh WHERE id_san_pham = ? ORDER BY ngay_bl DESC ";
    return pdo_query($sql, $id_san_pham);
}
function binh_luan_select_all_by_product($id_san_pham)
{
    $sql = "SELECT * FROM binh_luan JOIN user ON binh_luan.id_kh = user.id_kh WHERE id_san_pham = ? ORDER BY ngay_bl DESC";
    return pdo_query($sql, $id_san_pham);
}
function detail_binh_luan_by_id($id_binh_luan)
{
    $sql = "SELECT * FROM binh_luan WHERE id_binh_luan = ?";
    return pdo_query_one($sql, $id_binh_luan);
}
function detail_binh_luan_insert($id_binh_luan, $content, $id_kh, $ngay_reply)
{
    $sql = "INSERT INTO reply_comment(id_binh_luan, content, id_kh, ngay_reply) VALUES (?,?,?,?)";
    pdo_execute($sql, $id_binh_luan, $content, $id_kh, $ngay_reply);
}
function reply_binh_luan_select()
{
    $sql = "SELECT * FROM binh_luan JOIN reply_comment ON binh_luan.id_binh_luan = reply_comment.id_binh_luan JOIN user ON binh_luan.id_kh = user.id_kh";
    return pdo_query($sql);
}
function reply_binh_luan_by_id($id_reply_comment)
{
    $sql = "SELECT * FROM reply_comment WHERE id_reply_comment = ?";
    return pdo_query_one($sql, $id_reply_comment);
}
function reply_binh_luan_update($id_reply_comment, $content)
{
    $sql = "UPDATE reply_comment SET content=? WHERE id_reply_comment = ?";
    pdo_execute($sql, $content, $id_reply_comment);
}
function reply_binh_luan_delete($id_reply_comment)
{
    $sql = "DELETE FROM reply_comment WHERE id_reply_comment = ?";
    pdo_execute($sql, $id_reply_comment);
}
function reply_binh_luan_by_dropdown($id_binh_luan)
{
    $sql = "SELECT * FROM reply_comment JOIN user ON reply_comment.id_kh = user.id_kh WHERE id_binh_luan = ?";
    return pdo_query($sql, $id_binh_luan);
}
