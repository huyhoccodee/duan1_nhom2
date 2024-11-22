<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <!-- Import Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .form-buttons {
            display: flex;
            gap: 10px;
        }
        .error-message {
            color: red;
            font-size: 0.875rem;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Thêm sản phẩm</h1>
        <form id="addspbtForm" action="index.php?act=addspbt" method="post" enctype="multipart/form-data" class="p-4 bg-white shadow-sm rounded">
            <!-- Chọn sản phẩm -->
            <div class="mb-3">
                <label for="masp" class="form-label">Sản phẩm</label>
                <select name="masp" id="masp" class="form-select">
                    <?php
                    foreach ($listsanpham as $sp) {
                        echo "<option value='{$sp['id']}'>{$sp['tensp']}</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Chọn size sản phẩm -->
            <div class="mb-3">
                <label for="idsize" class="form-label">Size sản phẩm</label>
                <select name="idsize" id="idsize" class="form-select">
                    <?php
                    foreach ($listsize as $size) {
                        echo "<option value='{$size['idsize']}'>{$size['size']}</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Chọn màu sản phẩm -->
            <div class="mb-3">
                <label for="idmau" class="form-label">Màu sản phẩm</label>
                <select name="idmau" id="idmau" class="form-select">
                    <?php
                    foreach ($listmau as $mau) {
                        echo "<option value='{$mau['idmau']}'>{$mau['mau']}</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Nhập số lượng sản phẩm -->
            <div class="mb-3">
                <label for="soluong" class="form-label">Số lượng sản phẩm</label>
                <input type="text" name="soluong" id="soluong" class="form-control" >
                <div id="soluongError" class="error-message"></div> <!-- Error message here -->
            </div>
            <!-- Buttons -->
            <div class="form-buttons">
                <button type="submit" class="btn btn-primary" name="themspbt" value="Thêm mới">Thêm mới</button>
                <a href="index.php?act=listspbt" class="btn btn-secondary">Danh sách</a>
            </div>
        </form>
    </div>

    <!-- Validate with JavaScript -->
    <script>
        document.getElementById("addspbtForm").addEventListener("submit", function(event) {
            var soluong = document.getElementById("soluong").value;
            var soluongError = document.getElementById("soluongError");

            // Reset error message
            soluongError.textContent = '';

            // Validate: kiểm tra nếu là số và lớn hơn 0
            if (isNaN(soluong) || soluong <= 0) {
                soluongError.textContent = "Số lượng phải là số và lớn hơn 0.";
                event.preventDefault(); // Ngừng form gửi nếu có lỗi
            }
        });
    </script>
</body>
</html>
