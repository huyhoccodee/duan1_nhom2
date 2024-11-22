<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <!-- Import Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Quản lý sản phẩm</h1>
        
        <!-- Form lọc sản phẩm -->
        <form action="index.php?act=listsp" method="post" class="mb-4">
            <div class="row g-3">
                <!-- Tên sản phẩm -->
                <div class="col-md-4">
                    <label for="kyw" class="form-label">Tìm kiếm sản phẩm</label>
                    <input type="text" name="kyw" id="kyw" class="form-control" placeholder="Nhập tên sản phẩm" value="<?php echo isset($_POST['kyw']) ? $_POST['kyw'] : ''; ?>">
                </div>
                <!-- Danh mục -->
                <div class="col-md-4">
                    <label for="iddm" class="form-label">Danh mục</label>
                    <select name="iddm" id="iddm" class="form-select">
                        <option value="0" selected>Tất cả</option>
                        <?php
                        foreach ($listdanhmuc as $danhmuc) {
                            $selected = (isset($_POST['iddm']) && $_POST['iddm'] == $danhmuc['id']) ? 'selected' : '';
                            echo "<option value='{$danhmuc['id']}' {$selected}>{$danhmuc['name_dm']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- Nút lọc -->
                <div class="col-md-4 d-flex align-items-end w-100">
                    <button type="submit" name="listok" class="btn btn-danger" value="Lọc">Lọc sản phẩm</button>
                </div>
            </div>
        </form>

        <div class="d-flex justify-content-start mb-3">
            <a href="index.php?act=addsp" class="btn btn-primary">Thêm sản phẩm</a>
        </div>

        <!-- Nút thêm sản phẩm -->
        <div class="d-flex justify-content-start mb-3">
            <a href="index.php?act=spbt" class="btn btn-success">Thêm sản phẩm biến thể</a>
        </div>

        <!-- Bảng sản phẩm -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá sản phẩm</th>
                    <th>Size</th>
                    <th>Màu sắc</th>
                    <th colspan="2" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($listsanpham)) { ?>
                    <?php foreach ($listsanpham as $sp) { ?>
                        <tr>
                            <td><?php echo $sp['id']; ?></td>
                            <td><?php echo $sp['tensp']; ?></td>
                            <td>
                                <img src="../upload/<?php echo $sp['img']; ?>" alt="" class="img-thumbnail" style="height: 60px; width: auto;">
                            </td>
                            <td><?php echo $sp['gia']; ?></td>
                            <td><?php echo $sp['size']; ?></td>
                            <td><?php echo $sp['mau']; ?></td>
                            <td class="text-center">
                                <a href="index.php?act=suasp&id=<?php echo $sp['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                            </td>
                            <td class="text-center">
                                <a href="index.php?act=xoasp&id=<?php echo $sp['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Xóa sản phẩm này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="8" class="text-center">Không tìm thấy sản phẩm nào!</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
