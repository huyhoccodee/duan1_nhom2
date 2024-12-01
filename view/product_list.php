<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap bg-light py-3">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Sản phẩm</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product List Start -->
    <div class="product-view py-4">
        <div class="container">
            <div class="row">
                <!-- Main Product List -->
                <div class="col-md-9">
                    <div class="row">
                        <?php foreach ($sphome as $sp) { ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card product-item shadow-sm">
                                    <div class="product-image">
                                        <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>">
                                            <img src="upload/<?php echo $sp['img'] ?>" class="card-img-top" alt="Product Image" height="240px">
                                        </a>
                                        <div class="product-action position-absolute top-0 end-0 p-2">
                                            <a href="#" class="btn btn-outline-danger btn-sm"><i class="fa fa-heart"></i></a>
                                            <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-search"></i></a>
                                            <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>" class="btn btn-outline-success btn-sm"><i class="fa fa-cart-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">
                                            <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>" class="text-dark text-decoration-none"><?php echo $sp['tensp'] ?></a>
                                        </h5>
                                        <div class="ratting text-warning mb-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price text-danger h6">
                                            <?php echo number_format($sp['gia'], 0, ',', '.') . ' VNĐ'; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-3">
                    <div class="sidebar-widget mb-4">
                        <h4 class="title">Danh mục</h4>
                        <ul class="list-group">
                            <?php foreach ($listdm as $dm) { ?>
                                <li class="list-group-item">
                                    <a href="index.php?act=sanpham&iddm=<?php echo $dm['id'] ?>" class="text-decoration-none"><?php echo $dm['name_dm'] ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="sidebar-widget">
                        <h4 class="title">Sản phẩm top 10</h4>
                        <ul class="list-group">
                            <?php foreach ($sptop10 as $sp) { ?>
                                <li class="list-group-item">
                                    <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>" class="text-decoration-none">
                                        <?php echo $sp['tensp']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product List End -->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
