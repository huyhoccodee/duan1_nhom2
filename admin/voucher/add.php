<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới voucher</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-qj0AnBT+BxAkWBZ6PuHTI9QCl2tuRjQg9O61V1FfWkxT2WjCXWrkXVfke5U3lg9s" crossorigin="anonymous">
</head>
<body>
    <!-- Form thêm mới voucher -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="table-responsive p-4 border rounded bg-light shadow">
                    <div class="text-center mb-4">
                        <h2 class="text-primary">Thêm mới voucher</h2>
                    </div>
                    <form action="index.php?act=addvc" method="post" class="khung2" >
                                <div class="adm">
                                    Tên mã giảm giá <br>
                                    <input type="text" name="name_magg" class="form-control" required>
                                </div>
                                <div class="adm">
                                    Số tiền giảm<br>
                                    <input type="number" name="giamgia" class="form-control" required>
                                </div>
                                <!-- <div class="adm">
                                    Ngày hết hạn<br>
                                    <input type="date" name="end_date" class="form-control">
                                </div> -->
                                <div class="adm">
                                    Số lượng<br>
                                    <input type="number" name="soluong" class="form-control" min="1" required>
                                </div>
                                <div class="adm">
                                    <input type="submit" name="themmoi" value="Thêm mới" class="nhap">
                                    <a href="index.php?act=listvc"><input type="button" value="Danh sách" class="adleft nhap"></a>
                                </div>
                                <?php if(isset($thongbao)&&($thongbao!="")) echo $thongbao; ?>
                           </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Link JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-gBWz9jRPsPflqVW89jyyjU5KvKIvPS8WkkF+rpP5Gg9CLpB2x7ynXSAiTylVV2Y0" crossorigin="anonymous"></script>
</body>
</html>