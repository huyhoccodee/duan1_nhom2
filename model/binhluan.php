<?php
function insert_binhluan($noidung, $id_user, $id_sp, $ngaybinhluan){
    $sql = "insert into binhluan(noidung, id_user, id_sp, ngaybinhluan) values('$noidung', '$id_user', '$id_sp', '$ngaybinhluan')";
    pdo_execute($sql);
}
function loadall_binhluan($idpro){
    $sql =" SELECT * from binhluan join taikhoan on taikhoan.id=binhluan.id_user where binhluan.is_delete=0";
     if($idpro>0) $sql.=" AND id_sp='".$idpro."'";
     $sql.=" order by id_bl desc";
    $listbl=pdo_query($sql);
    return $listbl;
}
function delete_binhluan($id){
    $sql ="UPDATE binhluan set is_delete='1' where id_bl=".$id;
    pdo_execute($sql);
}

?>