<?php 
    function  insert_voucher($name_magg,$giamgia,$soluong){
        $sql="insert into magiamgia (name_magg,giamgia,soluong) values ('$name_magg','$giamgia','$soluong')";
        pdo_execute($sql);
    }
    function delete_voucher($id){
        $sql="delete from magiamgia where id=".$id;
        pdo_execute($sql);
    }
    function loadall(){
        $sql="select * from magiamgia order by id desc";
            $listvoucher=pdo_query($sql);
            return $listvoucher;
    }
?>