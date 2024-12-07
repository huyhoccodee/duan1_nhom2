<?php
// Chuyển hướng tới URL trang tài khoản
header('Location: http://localhost/duantest/index.php?act=taikhoan', true, 302); 
exit; // Kết thúc script để tránh thực thi thêm bất kỳ mã nào sau khi chuyển hướng
