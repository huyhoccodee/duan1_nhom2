<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <!-- Import Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Căn chỉnh nút */
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
        <h1 class="text-center mb-4">Cập nhật sản phẩm</h1>
        <form id="updateForm" action="index.php?act=updatesp" method="post" enctype="multipart/form-data" class="p-4 bg-white shadow-sm rounded">
            <!-- Tên sản phẩm -->
            <div class="mb-3">
                <label for="tensp" class="form-label">Tên sản phẩm</label>
                <input type="text" name="tensp" id="tensp" class="form-control" value="<?php echo $sp['tensp'] ?>">
                <div id="tenspError" class="error-message"></div>
            </div>
            <!-- Ảnh sản phẩm -->
            <div class="mb-3">
                <label for="img" class="form-label">Ảnh sản phẩm</label>
                <input type="file" name="img" class="form-control" id="img">
                <img src="../upload/<?php echo $sp['img'] ?>" alt="" height="80px" class="mt-2">
            </div>
            <!-- Giá sản phẩm -->
            <div class="mb-3">
                <label for="gia" class="form-label">Giá sản phẩm</label>
                <input type="text" name="gia" id="gia" class="form-control" value="<?php echo $sp['gia'] ?>">
                <div id="giaError" class="error-message"></div>
            </div>
            <!-- Mô tả sản phẩm -->
            <div class="mb-3">
                <label for="mota" class="form-label">Mô tả sản phẩm</label>
                <textarea name="mota" id="mota" class="form-control" rows="3"><?php echo $sp['mota'] ?></textarea>
                <div id="motaError" class="error-message"></div>
            </div>
            <!-- Lượt xem sản phẩm -->
            <div class="mb-3">
                <label for="luotxem" class="form-label">Lượt xem sản phẩm</label>
                <input type="text" name="luotxem" id="luotxem" class="form-control" value="<?php echo $sp['luotxem'] ?>">
                <div id="luotxemError" class="error-message"></div>
            </div>
            <!-- Loại sản phẩm -->
            <div class="mb-3">
                <label for="idloai" class="form-label">Loại sản phẩm</label>
                <select name="idloai" id="idloai" class="form-select">
                    <?php
                    foreach ($listdanhmuc as $dm) {
                        echo "<option value='{$dm['id']}'>{$dm['name_dm']}</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- Size sản phẩm -->
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
            <!-- Màu sản phẩm -->
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
            <!-- Số lượng sản phẩm -->
            <div class="mb-3">
                <label for="soluong" class="form-label">Số lượng sản phẩm</label>
                <input type="text" name="soluong" id="soluong" class="form-control" value="<?php echo $sp['soluong'] ?>">
                <div id="soluongError" class="error-message"></div>
            </div>
            <!-- Hidden inputs -->
            <input type="hidden" name="masp" value="<?php echo $sp['id'] ?>">
            <input type="hidden" name="id_bt" value="<?php echo $sp['id_bt'] ?>">
            <!-- Buttons -->
            <div class="form-buttons">
                <button type="submit" class="btn btn-primary" name="capnhatsp" value="Cập nhật sản phẩm">Cập nhật sản phẩm</button>
                <a href="index.php?act=listsp" class="btn btn-secondary">Danh sách</a>
            </div>
        </form>
    </div>

    <script>
        // Validate form trước khi gửi
        document.getElementById("updateForm").addEventListener("submit", function(event) {
            let isValid = true;

            // Reset tất cả thông báo lỗi
            document.getElementById("tenspError").textContent = '';
            document.getElementById("giaError").textContent = '';
            document.getElementById("motaError").textContent = '';
            document.getElementById("luotxemError").textContent = '';
            document.getElementById("soluongError").textContent = '';

            // Lấy giá trị các trường
            var tensp = document.getElementById("tensp").value.trim();
            var gia = document.getElementById("gia").value.trim();
            var mota = document.getElementById("mota").value.trim();
            var luotxem = document.getElementById("luotxem").value.trim();
            var soluong = document.getElementById("soluong").value.trim();

            // Validate Tên sản phẩm
            if (tensp === '') {
                document.getElementById("tenspError").textContent = "Tên sản phẩm không được để trống.";
                isValid = false;
            }

            // Validate Giá sản phẩm
            if (gia === '' || isNaN(gia) || parseFloat(gia) <= 0) {
                document.getElementById("giaError").textContent = "Giá sản phẩm phải là một số và lớn hơn 0.";
                isValid = false;
            }

            // Validate Mô tả sản phẩm
            if (mota === '') {
                document.getElementById("motaError").textContent = "Mô tả sản phẩm không được để trống.";
                isValid = false;
            }

            // Validate Lượt xem sản phẩm
            if (luotxem === '' || isNaN(luotxem) || parseInt(luotxem) <= 0) {
                document.getElementById("luotxemError").textContent = "Lượt xem phải là một số và lớn hơn 0.";
                isValid = false;
            }

            // Validate Số lượng sản phẩm
            if (soluong === '' || isNaN(soluong) || parseInt(soluong) <= 0) {
                document.getElementById("soluongError").textContent = "Số lượng sản phẩm phải là một số và lớn hơn 0.";
                isValid = false;
            }

            // Nếu có lỗi, ngừng gửi form
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
