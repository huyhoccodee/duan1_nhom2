<?php 
    function insert_voucher($name_magg, $giamgia, $soluong, $end_date) {
        $sql = "INSERT INTO magiamgia (name_magg, giamgia, soluong, end_date) VALUES ('$name_magg', '$giamgia', '$soluong', '$end_date')";
        pdo_execute($sql);
    }
    
    function delete_voucher($id){
        $sql="delete from magiamgia where id=".$id;
        pdo_execute($sql);
    }
    function loadall() {
        $sql = "SELECT * FROM magiamgia ORDER BY id DESC";
        $listvoucher = pdo_query($sql);
        return $listvoucher;
    }
    // Hàm lấy thông tin voucher theo ID
    function loadone_voucher($id) {
    $sql = "SELECT * FROM magiamgia WHERE id = ?";
    return pdo_query_one($sql, $id);  // Hàm pdo_query_one trả về một kết quả duy nhất (voucher)
    }
    // Hàm cập nhật voucher vào cơ sở dữ liệu
    function update_voucher($id, $name_magg, $giamgia, $soluong, $end_date) {
        $sql = "UPDATE magiamgia SET name_magg=?, giamgia=?, soluong=?, end_date=? WHERE id=?";
        $params = [$name_magg, $giamgia, $soluong, $end_date, $id];  // Đảm bảo sử dụng mảng
        pdo_execute($sql, $params);  // Gọi hàm pdo_execute với mảng tham số
    }
    
    
?>