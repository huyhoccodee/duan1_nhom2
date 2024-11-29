<?php   
function pdo_get_connection(){
    $dburl = "mysql:host=localhost;dbname=duan1;charset=utf8";
    $username = 'root';
    $password = '';
    try {
        $conn = new PDO($dburl, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

/**
 * @param string
 * @param array
 * @throws PDOException
 */
function pdo_execute($sql, $params = []) {
    try {
        $conn = pdo_get_connection();  // Kết nối cơ sở dữ liệu
        $stmt = $conn->prepare($sql);  // Chuẩn bị câu lệnh SQL
        $stmt->execute($params);  // Thực thi câu lệnh với tham số

        return $stmt->rowCount();  // Trả về số dòng bị ảnh hưởng (chỉ cho các câu lệnh UPDATE, DELETE, INSERT)
    } catch (PDOException $e) {
        // Xử lý lỗi nếu có
        throw $e;  
    } finally {
        // Đảm bảo đóng kết nối
        if (isset($conn)) {
            unset($conn);  // Dọn dẹp đối tượng kết nối
        }
    }
}


function pdo_execute_return_lastInsertId($sql, $params = []){
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        return $conn->lastInsertId();  // Trả về ID của bản ghi vừa chèn
    } catch(PDOException $e) {
        throw $e;
    } finally {
        unset($conn);  // Đảm bảo đóng kết nối
    }
}

/**
 * @param string
 * @param array
 * @return array
 * @throws PDOException
 */
function pdo_query($sql, $params = []){
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Trả về tất cả các dòng kết quả
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);  // Đảm bảo đóng kết nối
    }
}

/**
 * @param string
 * @param array
 * @return array
 * @throws PDOException
 */
function pdo_query_one($sql, $params = []){
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        // Đảm bảo params là một mảng, ngay cả khi chỉ có một tham số
        if (!is_array($params)) {
            $params = [$params];  // Chuyển thành mảng nếu không phải mảng
        }
        $stmt->execute($params);  // Thực thi câu lệnh với tham số
        return $stmt->fetch(PDO::FETCH_ASSOC);  // Trả về một dòng kết quả
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);  // Đảm bảo đóng kết nối
    }
}


/**
 * @param string
 * @param array
 * @return mixed
 * @throws PDOException
 */
function pdo_query_value($sql, $params = []){
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? array_values($row)[0] : null;  // Trả về giá trị đầu tiên nếu có, nếu không trả về null
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);  // Đảm bảo đóng kết nối
    }
}
?>