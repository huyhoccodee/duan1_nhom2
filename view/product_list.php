    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                           
                            <?php foreach ($sphome as $sp) {
                                ?>
                                <div class="col-lg-4">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id']?>">
                                            <img src="upload/<?php echo $sp['img']?>" alt="Product Image"  height="240px">
                                        </a>
                                        <div class="product-action">
                                        
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id']?>"><i class="fa fa-search"></i></a>
                                            <a href="index.php?act=sanphamct&idsp=<?php echo $sp['id'] ?>"><i class="fa fa-cart-plus"></i></a>
                                            <form action="index.php?act=addcart" method="post">
                                        
                                        <input type="hidden" name="id_user" value="<?php echo $tk['id_user']?>">
                                            <input type="hidden" name="id_sp" value="<?php echo $sp['id']?>">
                                                <input type="hidden" name="img" value="<?php echo $sp['img']?>">
                                                <input type="hidden" name="tensp" value="<?php echo $sp['tensp']?>">
                                                <input type="hidden" name="gia" value="<?php echo $sp['gia']?>">
                                                <?php foreach ($listsize as $size ) {
                                            ?>
                                            
                                               <input type="hidden" name="size" id="size<?php echo $size['idsize']?>" value="<?php echo $size['idsize']?>">
                                               <?php
                                        }?>
                                        <?php foreach ($listmau as $mau ) {
                                            ?><input type="hidden" name="mau" id="color<?php echo $mau['idmau']?>" value="<?php echo $mau['idmau']?>">
                                               <?php
                                        }?>
                                              
                                              </form>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="title"><a href="index.php?act=sanphamct&idsp=<?php echo $sp['id']?>"><?php echo $sp['tensp']?></a></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price"> <?php echo $sp['gia']?></div>
                                    </div>
                                </div>
                            </div>
                                <?php
                            }?>
                            <!-- <div class="col-lg-4">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="img/anh1.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="title"><a href="product-detail.php">Lenovo Slim 7 Pro X</a></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price"> 22.890.000  <span>29.990.000</span></div>
                                    </div>/-strong/-heart:>:o:-((:-h </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="img/anh2.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="title"><a href="product-detail.php">Acer Nitro 5 AN515-58-56CH </a></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">21.590.000  <span>26.990.000</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="img/anh3.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="title"><a href="product-detail.php">Acer Nitro 5 AN515-58-57QW </a></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>/-strong/-heart:>:o:-((:-h <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">16.990.000  <span>21.990.000</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="img/anh4.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="title"><a href="product-detail.php">Dell Latitude 5400</a></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">6.490.000  <span>9.990.000</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="img/anh5.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>/-strong/-heart:>:o:-((:-h <div class="product-content">
                                        <div class="title"><a href="product-detail.php">Asus TUF Gaming F15</a></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">16.890.000  <span>19.990.000</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="img/anh6.png" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="title"><a href="product-detail.php">Asus TUF Dash F15 2022</a></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">30.890.000 <span>35.990.000</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="img/anh7.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">/-strong/-heart:>:o:-((:-h <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="title"><a href="product-detail.php">HP Envy x360 2-in-1 2023 15-fh0013dx 7H1S7UA </a></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">41.290.000 <span>50.890.000</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="img/anh8.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="title"><a href="product-detail.php">HP Envy x360 2-in-1 14-es0013dx</a></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">15.490.000 <span>19.990.000</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">/-strong/-heart:>:o:-((:-h <div class="product-item">
                                    <div class="product-image">
                                        <a href="product-detail.php">
                                            <img src="img/anh9.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="product-detail.php"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="title"><a href="product-detail.php">ASUS ROG Zephyrus M16 GU603ZM</a></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">30.890.000  <span>35.990.000đ</span></div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        
                        <!-- <div class="col-lg-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Trước</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Sau</a>
                                    </li>
                                </ul>
                            </nav>
                        </div> -->
                    </div>
                    
                    
                    
                    <div class="col-md-3">
                        <div class="sidebar-widget category">
                            <h2 class="title">Danh mục</h2>
                            <ul><?php 
                                foreach ($listdm as $dm) {
                                    ?>
                                    <li><a href="index.php?act=sanpham&iddm=<?php echo $dm['id']?>"><?php echo $dm['name_dm']?></a></li>
                                    <?php
                                }
                                ?>
                                
                                <!-- <li><a href="#">Hp</a></li>
                                <li><a href="#">Asus</a></li>
                                <li><a href="#">Lenovo</a></li>
                                <li><a href="#">Macbook</a></li> -->
                            </ul>
                        </div>
                        
                        <div class="col-md-30">
                            <h2 class="title">Sản phẩm top 10</h2>
                            <ul >
                            <?php 
                                foreach ($sptop10 as $sp) {
                                    ?>
                                    <li ><a href="index.php?act=sanphamct&idsp=<?php echo $sp['id']?>"><?php echo $sp['tensp']?></a></li>
                                    <?php
                                }
                                ?>
                                
                                <!-- <li><a href="#">Laptop Asus UX3402ZA-KM219W </a></li>
                                <li><a href="#">Laptop Asus Zenbook UX363EA-HP726W </a></li>
                                <li><a href="#">HP EliteBook Dragonfly G3 6Z979PA</a></li>
                                <li><a href="#"> Laptop HP  14-ef0030TU 6K773PA</a></li>
                                <li><a href="#">Laptop LG Gram 14Z90Q-G.AH75A5 </a></li>
                                <li><a href="#">Laptop Dell Latitude 5420 L5420I714WP</a></li>
                                <li><a href="#"> Laptop Dell XPS 13 9320 5CG56</a></li>
                                <li><a href="#">Laptop Lenovo Thinkpad 21C1006YVA</a></li>
                                <li><a href="#">Laptop Lenovo Thinkpad 21E8003FVN</a></li>
                                <li><a href="#">Laptop Lenovo Thinkpad 21E8S02500 </a></li> -->
                            </ul>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Product List End -->