<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Danh Mục</title>
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h3 class="text-center mb-4">Cập Nhật Danh Mục</h3>
        <form action="index.php?act=updatedm" method="post">
            <input type="hidden" name="id" value="<?php echo $dm['id']; ?>">
            <div class="mb-3">
                <label for="tenloai" class="form-label">Tên Loại</label>
                <input type="text" name="tenloai" id="tenloai" class="form-control" value="<?php echo $dm['name_dm']; ?>" required>
            </div>
            <button type="submit" name="capnhatdm" class="btn btn-primary" value="Cập nhật danh mục">Cập nhật danh mục</button>
        </form>
        <a href="index.php?act=listdm" class="btn btn-secondary mt-3">Danh sách danh mục</a>
    </div>

    <!-- Thêm Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
