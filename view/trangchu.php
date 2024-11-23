<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>


    <!-- Main Slider Start -->
    <div class="home-slider ">
        <div class="main-slider ">
            <div class="main-slider-item "><img src="img/slider-4.jpg" alt="Slider Image" /></div>
            <div class="main-slider-item"><img src="img/slider-5.jpg" alt="Slider Image" /></div>
            <div class="main-slider-item"><img src="img/slider-6.jpg" alt="Slider Image" /></div>
        </div>
    </div>
    <!-- Main Slider End -->


    <!-- Feature Start-->
    <div class="feature">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-shield"></i>
                        <h2>Uy tín, chất lượng</h2>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-shopping-bag"></i>
                        <h2>Sản phẩm chất lượng</h2>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-truck"></i>
                        <h2>Giao hàng toàn quốc</h2>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-phone"></i>
                        <h2>Hỗ trợ qua điện thoại</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End-->

    <!-- Featured Product Start -->
    <div class="featured-product">
        <div class="container">
            <div class="section-header">
                <h3>Sản phẩm nổi bật</h3>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                <?php
                    foreach ($sptop10 as $sp) {
                        
                    
                    ?>
                <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-image">
                            <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id']?>">
                                <img src="upload/<?php echo $sp['img']?>" alt="Product Image" height="240px">
                            </a>
                            <div class="product-action">

                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>"><i
                                        class="fa fa-search"></i></a>
                                <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>"><i
                                        class="fa fa-cart-plus"></i></a>
                                <form action="index.php?act=addcart" method="post">


                                    <input type="hidden" name="id_user" value="<?php echo $tk['id_user']?>">
                                    <input type="hidden" name="img" value="<?php echo $sp['img']?>">
                                    <input type="hidden" name="tensp" value="<?php echo $sp['tensp']?>">
                                    <input type="hidden" name="gia" value="<?php echo $sp['gia']?>">
                                    <?php foreach ($listsize as $size ) {
                                            ?>

                                    <input type="hidden" name="size" id="size<?php echo $size['idsize']?>"
                                        value="<?php echo $size['idsize']?>">
                                    <?php
                                        }?>
                                    <?php foreach ($listmau as $mau ) {
                                            ?>

                                    <input type="hidden" name="mau" id="color<?php echo $mau['idmau']?>"
                                        value="<?php echo $mau['idmau']?>">
                                    <?php
                                        }?>
                                </form>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="title"><a
                                    href="index.php?act=sanphamct&idsp=<?php echo $sp['id']?>"><?php echo $sp['tensp']?></a>
                            </div>
                            <div class="ratting">
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
    </div>
    </div>
    <!-- Featured Product End -->

    <!-- Recent Product Start -->
    <div class="recent-product">
        <div class="container">
            <div class="section-header">
                <h3>Tất cả sản phẩm </h3>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                <?php
                    foreach ($sphome as $sp)   {
                        
?> <div class="col-lg-3">
                    <div class="product-item">
                        <div class="product-image">
                            <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id']?>">
                                <img src="upload/<?php echo $sp['img']?>" alt="Product Image" height="240px">
                            </a>
                            <div class="product-action">

                                <a href="#"><i class="fa fa-heart"></i></a>
                                <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id']?>"><i
                                        class="fa fa-search"></i></a>
                                <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>"><i
                                        class="fa fa-cart-plus"></i></a>
                                <form action="index.php?act=addcart" method="post">

                                    <input type="hidden" name="id_user" value="<?php echo $tk['id_user']?>">
                                    <input type="hidden" name="id_sp" value="<?php echo $sp['id']?>">
                                    <input type="hidden" name="img" value="<?php echo $sp['img']?>">
                                    <input type="hidden" name="tensp" value="<?php echo $sp['tensp']?>">
                                    <input type="hidden" name="gia" value="<?php echo $sp['gia']?>">
                                    <?php foreach ($listsize as $size ) {
                                            ?>

                                    <input type="hidden" name="size" id="size<?php echo $size['idsize']?>"
                                        value="<?php echo $size['idsize']?>">
                                    <?php
                                        }?>
                                    <?php foreach ($listmau as $mau ) {
                                            ?>

                                    <input type="hidden" name="mau" id="color<?php echo $mau['idmau']?>"
                                        value="<?php echo $mau['idmau']?>">
                                    <?php
                                        }?>

                                </form>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="title"><a
                                    href="index.php?act=sanphamct&idsp=<?php echo $sp['id']?>"><?php echo $sp['tensp']?></a>
                            </div>
                            <div class="ratting">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="price"><?php echo $sp['gia'] ?></div>
                        </div>
                    </div>
                </div>
                <?php }?>

            </div>
        </div>
    </div>
    <!-- Recent Product End -->


    <!-- Brand Start -->
    <div class="brand">
        <div class="container">
            <div class="section-header">
                <h3>Các thương hiệu</h3>
            </div>
            <div class="brand-slider">
                <div class="brand-item"><img src="img/mac.webp" alt=""></div>
                <div class="brand-item"><img src="img/dell.webp" alt=""></div>
                <div class="brand-item"><img src="img/hp.webp" alt=""></div>
                <div class="brand-item"><img src="img/asus.webp" alt=""></div>
                <div class="brand-item"><img src="img/acer.webp" alt=""></div>
                <div class="brand-item"><img src="img/lenovo.webp" alt=""></div>
            </div>
        </div>
    </div>
    <!-- Brand End -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>