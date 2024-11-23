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
                                            ?>
                                            
                                               <input type="hidden" name="mau" id="color<?php echo $mau['idmau']?>" value="<?php echo $mau['idmau']?>">
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
                            
                    </div>
                    
                    
                    
                    <div class="col-md-3">
                        <div class="sidebar-widget category">
                            <h2 class="title">Danh mục</h2>
                            <ul>
                                <?php 
                                foreach ($listdm as $dm) {
                                    ?>
                                    <li><a href="index.php?act=sanpham&iddm=<?php echo $dm['id']?>"><?php echo $dm['name_dm']?></a></li>
                                    <?php
                                }
                                ?>
                                
                              
                                
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
                                
                               
                            </ul>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Product List End -->
        
        
        
