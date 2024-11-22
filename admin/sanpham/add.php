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
        /* Căn chỉnh button đẹp hơn */
        .form-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Thêm sản phẩm</h1>
        <?php if (!empty($success)): ?>
            <div class="alert alert-success">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <form action="index.php?act=addsp" method="post" enctype="multipart/form-data" class="p-4 bg-white shadow-sm rounded">
            <div class="mb-3">
                <label for="masp" class="form-label">Mã sản phẩm</label>
                <input type="text" name="masp" id="masp" class="form-control" value="<?php echo isset($masp) ? $masp : ''; ?>">
                <?php if (isset($errors['masp'])): ?>
                    <div class="text-danger"><?php echo $errors['masp']; ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="tensp" class="form-label">Tên sản phẩm</label>
                <input type="text" name="tensp" id="tensp" class="form-control" value="<?php echo isset($tensp) ? $tensp : ''; ?>">
                <?php if (isset($errors['tensp'])): ?>
                    <div class="text-danger"><?php echo $errors['tensp']; ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Ảnh sản phẩm</label>
                <input type="file" name="img" id="img" class="form-control">
                <?php if (isset($errors['img'])): ?>
                    <div class="text-danger"><?php echo $errors['img']; ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="gia" class="form-label">Giá sản phẩm</label>
                <input type="text" name="gia" id="gia" class="form-control" value="<?php echo isset($gia) ? $gia : ''; ?>">
                <?php if (isset($errors['gia'])): ?>
                    <div class="text-danger"><?php echo $errors['gia']; ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="mota" class="form-label">Mô tả sản phẩm</label>
                <input type="text" name="mota" id="mota" class="form-control" value="<?php echo isset($mota) ? $mota : ''; ?>">
                <?php if (isset($errors['mota'])): ?>
                    <div class="text-danger"><?php echo $errors['mota']; ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="luotxem" class="form-label">Lượt xem</label>
                <input type="text" name="luotxem" id="luotxem" class="form-control" value="<?php echo isset($luotxem) ? $luotxem : ''; ?>">
                <?php if (isset($errors['luotxem'])): ?>
                    <div class="text-danger"><?php echo $errors['luotxem']; ?></div>
                <?php endif; ?>
            </div>


            <div class="mb-3">
                <label for="idloai" class="form-label">Loại sản phẩm</label>
                <select name="idloai" id="idloai" class="form-select">
                    <?php foreach ($listdanhmuc as $dm): ?>
                        <option value="<?php echo $dm['id']; ?>" <?php echo isset($id_dm) && $id_dm == $dm['id'] ? 'selected' : ''; ?>>
                            <?php echo $dm['name_dm']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" name="themsp" class="btn btn-primary" value="Thêm sản phẩm">Thêm sản phẩm</button>
            <a href="index.php?act=listsp" class="btn btn-secondary">Danh sách</a>
        </form>
    </div>

</body>
</html>
