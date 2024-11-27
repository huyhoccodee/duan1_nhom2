<?php
function getspbt($id_sp,$id_size,$id_mau){
    $sql="SELECT id_bt FROM spbienthe WHERE id_sp='$id_sp' AND id_size='$id_size' AND id_mau='$id_mau'";
   return pdo_query_one($sql);
        
} 
function getcart($idbill){
    $sql = "SELECT * FROM cart WHERE id_bill=".$idbill;
    $listctdh=pdo_query($sql);
    return $listctdh;
}

function huydh($idbill, $soluong, $id_spbt, $reason) {
    // Cập nhật trạng thái đơn hàng thành "Hủy" và lưu lý do hủy
    $sql = "UPDATE bill SET id_trangthai = 6, lydohuy = :reason WHERE id = :idbill";
    pdo_execute($sql, [
        'reason' => $reason,
        'idbill' => $idbill
    ]);


}
function getsoluong($idbill,$id_bt){
    $sql="select soluong from cart where id_bill='$idbill' and id_spbt='$id_bt'";
    return pdo_query_one($sql);
}
function getbt_cart($idbill){
    $sql="select id_spbt from cart where id_bill='$idbill'";
    $listbt=pdo_query($sql);
    return $listbt;
}
function getbill($id_user){
    $sql="SELECT * FROM bill WHERE  bill.id_user=".$id_user;
    $dh=pdo_query_one($sql);
        return $dh;
}
function getbillinfo($id_user){
    $sql="SELECT * FROM bill join trangthaidh on bill.id_trangthai=trangthaidh.idtrangthai  WHERE  bill.id_user=".$id_user;
    $listdh=pdo_query($sql);
    return $listdh;
}
    function insert_bill($id_user,$bill_name,$bill_diachi,$bill_sdt,$bill_email,$id_pttt,$ngaydathang,$total){
        // $conn = pdo_get_connection();
        $sql="INSERT INTO bill (id_user,bill_name,bill_diachi,bill_sdt,bill_email,id_pttt,ngaydathang,total) 
        VALUES('".$id_user."','".$bill_name."','".$bill_diachi."','".$bill_sdt."','".$bill_email."','".$id_pttt."','".$ngaydathang."','".$total."')";
         return  pdo_execute_return_lastInsertId($sql);
    }
    function addtocart($id_user,$id_sp,$img,$tensp,$gia,$soluong,$id_bill, $id_size, $id_mau,$id_bt){
        
        $sql="INSERT INTO cart (id_user,id_sp,img,tensp,gia,soluong,id_bill,id_spbt) 
        VALUES('".$id_user."','".$id_sp."','".$img."','".$tensp."','".$gia."','".$soluong."','".$id_bill."','".$id_bt."')";
        pdo_execute($sql);
        $query = "UPDATE spbienthe SET soluong=soluong-'$soluong' WHERE id_sp='$id_sp' AND id_size='$id_size' AND id_mau='$id_mau'";
        pdo_execute($query);
    }
    function delete_donhang($id){
        $sql="delete from bill where id=".$id;
        pdo_execute($sql);
    }
    function loadall_donhang(){
        $sql="select * from bill join trangthaidh on bill.id_trangthai=trangthaidh.idtrangthai order by id desc";
            $listdonhang=pdo_query($sql);
            return $listdonhang;
    }
    function loadall_trangthaidh(){
        $sql="select * from trangthaidh";
        $listtrangthai=pdo_query($sql);
        return $listtrangthai;
    }
    function loadall_pttt(){
        $sql="select * from phuongthuctt";
        $listpttt=pdo_query($sql);
        return $listpttt;
    }
    function loadall_mgg(){
        $sql="select * from magiamgia";
        $listmgg=pdo_query($sql);
        return $listmgg;
    }
    function update_donhang($id, $id_trangthai) {
        $sql = "UPDATE bill SET id_trangthai = ? WHERE id = ?";
        pdo_execute($sql, [$id_trangthai, $id]);
    }
    function loadone_donhang($id){
        $sql="select * from bill where id=".$id;
        $dh=pdo_query_one($sql);
        return $dh;
    }
    function loadall_thongke() {
        $sql = "select danhmuc.id as madm, danhmuc.name_dm as tendm, count(sanpham.id) as countsp, min(sanpham.gia) as minprice, max(sanpham.gia) as maxprice, avg(sanpham.gia) as avgprice";
        $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.id_dm";
        $sql.=" group by danhmuc.id order by danhmuc.id desc";
        $listtk=pdo_query($sql);
        return $listtk;
    }
    function get_current_status($id) {
        $sql = "SELECT id_trangthai FROM bill WHERE id = ?";
        $result = pdo_query_one($sql, $id);
        return $result['id_trangthai'];
    }
    function get_status_name($status_id) {
        switch ($status_id) {
            case 1: return "Chờ xác nhận";
            case 2: return "Đang xử lý";
            case 3: return "Đang giao hàng";
            case 4: return "Đã nhận hàng";
            case 5: return "Hoàn thành";
            case 6: return "Hủy đơn hàng";
            default: return "Không xác định";
        }
    }
    
    
    
?>