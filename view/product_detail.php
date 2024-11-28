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

    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center product-detail-top">
                        <div class="col-md-5">
                            <div class="product-slider-single">
                                <img src="upload/<?php echo $sp['img']?>" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title">
                                    <h2><?php echo $sp['tensp']?></h2>
                                </div>
                                <div class="ratting text-warning mb-2">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price"><?php echo $sp['gia']?></div>
                                <form action="index.php?act=addcart" method="post">
                                    <div class="quantity">
                                        <h4>Số lượng:</h4>
                                        <div class="qty">
                                            <input type="number" value="1" name="soluong" min="1"
                                                max="<?php echo $sp['soluong']?>">
                                        </div><br>
                                        <h4>Size</h4>
                                        <?php foreach ($listsize as $size ) { ?>
                                        <label for="size<?php echo $size['idsize']?>"><?php echo $size['size']?></label>
                                        <input type="radio" name="size" id="size<?php echo $size['idsize']?>"
                                            value="<?php echo $size['idsize']?>" checked>
                                        <?php }?>
                                        <br>
                                        <h4>Màu</h4>
                                        <?php foreach ($listmau as $mau ) { ?>
                                        <label for="color<?php echo $mau['idmau']?>"><?php echo $mau['mau']?></label>
                                        <input type="radio" name="mau" id="color<?php echo $mau['idmau']?>"
                                            value="<?php echo $mau['idmau']?>" checked>
                                        <?php }?>
                                    </div>
                                    <div class="action">
                                        <input type="hidden" name="id_user" value="<?php echo $id_user?>">
                                        <input type="hidden" name="id_sp" value="<?php echo $sp['id_sp']?>">
                                        <input type="hidden" name="img" value="<?php echo $sp['img']?>">
                                        <input type="hidden" name="tensp" value="<?php echo $sp['tensp']?>">
                                        <input type="hidden" name="gia" value="<?php echo $sp['gia']?>">
                                        <input class="clickmua btn btn-primary" type="submit" name="addtocart"
                                            value="Thêm vào giỏ hàng">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#description">Mô tả</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#reviews">Bình luận</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="description" class="container tab-pane active"><br>
                                <h4>Thiết kế</h4>
                                <p><?php echo $sp['mota'] ?></p>
                            </div>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script>
                            $(document).ready(function() {
                                $("#reviews").load("view/binhluan/formbinhluan.php", {
                                    idsp: <?=$sp['id']?>
                                });
                            });
                            </script>

                            <div id="reviews" class="container tab-pane fade"><br>
                                <div class="reviews-submit">
                                    <div class="row form">
                                        <div class="col-sm-12">
                                            <textarea placeholder="Đánh giá"></textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="section-header">
                        <h3>Sản phẩm liên quan</h3>
                    </div>
                </div>

                <div class="row align-items-center product-slider product-slider-3">
                    <?php foreach ($listspcungloai as $sp) { ?>
                    <div class="col-lg-12">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>">
                                    <img src="upload/<?php echo $sp['img'] ?>" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#" class="btn btn-outline-danger btn-sm"><i class="fa fa-heart"></i></a>
                                    <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id']?>"
                                        class="btn btn-outline-secondary btn-sm"><i class="fa fa-search"></i></a>
                                    <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>"
                                        class="btn btn-outline-success btn-sm"><i class="fa fa-cart-plus"></i></a>
                                </div>
                            </div>
                            <div class="product-content text-center">
                                <div class="title"><a
                                        href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>"><?php echo $sp['tensp']?></a>
                                </div>
                                <div class="ratting text-warning">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price"><?php echo $sp['gia']?></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="sidebar-widget category">
                    <h2 class="title">Danh mục</h2>
                    <ul class="list-group">
                        <?php foreach ($listdm as $dm) { ?>
                        <li class="list-group-item"><a
                                href="index.php?act=sanpham&iddm=<?php echo $dm['id']?>"><?php echo $dm['name_dm']?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="col-md-23">
                    <h2 class="title">Sản phẩm top 10</h2>
                    <ul class="list-group">
                        <?php foreach ($sptop10 as $sp) { ?>
                        <li class="list-group-item"><a
                                href="index.php?act=sanphamct&idsp=<?php echo $sp['id']?>"><?php echo $sp['tensp']?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Product Detail End -->

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>