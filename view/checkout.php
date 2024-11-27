<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
            <li class="breadcrumb-item active">Thanh toán</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Checkout Start -->
<div class="checkout">
    <div class="container">

        <form action="index.php?act=checkout" method="post" class="khungmagg">
            <input type="text" name="name_magg" placeholder="Mã giảm giá" class="magg">
            <input type="submit" name="apdungma" value="Áp dụng mã" class="nhap">
            <?= isset($thongbao) ? $thongbao : '' ?>
        </form>
        <form action="index.php?act=checkout" method="post">

            <div class="row">
                <div class="col-md-7">
                    <div class="billing-address">
                        <h2>Nhập thông tin thanh toán</h2>

                        <!-- <div class="row">
                                <div class="col-md-6">
                                    <label>Người đặt hàng</label>
                                    <input class="form-control" name="bill_name" type="text" placeholder="Nhập tên" >
                                </div>
                               
                                <div class="col-md-6">
                                    <label>Địa chỉ</label>
                                    <input class="form-control" name="bill_diachi" type="text" placeholder="Nhập địa chỉ" >
                                </div>
                                <div class="col-md-6">
                                    <label>Số điện thoại</label>
                                    <input class="form-control" name="bill_sdt" type="text" placeholder="Nhập số điện thoại" id="sdt" >
                                    <span class="thongbao"></span>
                                </div>
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input class="form-control" name="bill_email" type="email" placeholder="Nhập email"  id="email">
                                    <span class="thongbao"></span>
                                </div>
                                
                                
                            </div> -->
                        <div class="row">
                            <div class="col-md-6">
                                <label>Người đặt hàng</label>
                                <input class="form-control" name="bill_name" type="text" placeholder="Tên" required
                                    value="<?php echo isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : ''; ?>">
                            </div>

                            <div class="col-md-6">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="bill_diachi" type="text" placeholder="Địa chỉ"
                                    required
                                    value="<?php echo isset($_SESSION['user']['diachi']) ? $_SESSION['user']['diachi'] : ''; ?>">
                            </div>
                            <div class="col-md-6">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="bill_sdt" type="text" placeholder="Số điện thoại"
                                    id="sdt" required
                                    value="<?php echo isset($_SESSION['user']['sdt']) ? $_SESSION['user']['sdt'] : ''; ?>">
                                <span class="thongbao"></span>
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input class="form-control" name="bill_email" type="email" placeholder="Email" required
                                    id="email"
                                    value="<?php echo isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : ''; ?>">
                                <span class="thongbao"></span>
                            </div>
                        </div>

                    </div>

                    <?php 
                        if (isset($_SESSION['error'])) {
                            echo '<div class="alert alert-danger">';
                            foreach ($_SESSION['error'] as $key => $value) {
                                echo '<li>' . $value . '</li>';
                            }
                            echo '</div>';
                            
                        } 
                        
                    ?>
                </div>

                <div class="col-md-5">

                    <div class="checkout-summary">
                        <h2>Sản phẩm </h2>

                        <!-- -----------------------------------------------------magg-------------------------------------------------------- -->
                        <div class="checkout-content">



                            <?php 
                                $tong=0;
                                if (isset($_POST['apdungma']) && ($_POST['apdungma'])) {
                                    
                                    $pvc=0;
                                 foreach ($_SESSION['giohang'] as $item){
                                    $thanhtien=$item[3]*$item[4];
                                    $tong+=$thanhtien;
                                    $tt=$tong+100000;
                                    if(isset($checkmagg['giamgia'])){$pvc=$tt-$checkmagg['giamgia'];}
                                    echo'
                                    <p>'.$item[2].' <span>'.$item[3].' </span> | X'.$item[4].'</p>';
                                 } ?>
                            <p>Phí vận chuyển<span>100000</span></p>

                            <p class="">Giảm giá<span><?php if(isset($checkmagg['giamgia'])){
                                    if (isset($_POST['apdungma']) && ($_POST['apdungma'])) {
                                    echo $checkmagg['giamgia'];}}else{echo "0đ";} ?></span></p>
                            <h4>Thành tiền<span><?php if(isset($checkmagg['giamgia'])){
                                                            echo $pvc;
                                                        }else{
                                                            echo $tt;
                                                            
                               }
                                } else{
                                    
                                    foreach ($_SESSION['giohang'] as $item){
                                        $thanhtien=$item[3]*$item[4];
                                        $tong+=$thanhtien;
                                        $tt=$tong+100000;
                                       
                                       echo'
                                       <p>'.$item[2].' <span>'.$item[3].' </span> | X'.$item[4].'</p>';
                                    } ?>
                                    <p>Phí vận chuyển<span>100000</span></p>


                                    <h4>Thành tiền<span><?php 
                                   echo $tt;
                                  
                                }
                        
                                     ?> </span></h4>


                        </div>
                        <!-- ------------------------------------------------------------------------------------------------------------- -->
                    </div>

                    <div class="checkout-payment">
                        <h2>Phương thức thanh toán</h2>
                        <div class="payment-methods">
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-1" name="id_pttt"
                                        value="1" require checked>
                                    <label class="custom-control-label" for="payment-1">Thanh toán khi nhận hàng</label>
                                </div>

                            </div>
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-2" name="id_pttt"
                                        value="2" require>
                                    <label class="custom-control-label" for="payment-2">Thanh toán oline qua
                                        VNPAY</label>
                                </div>
                                <div class="payment-content" id="payment-2-show">
                                    <p>

                                    </p>
                                </div>
                            </div>
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-3" name="id_pttt"
                                        value="3" require>
                                    <label class="custom-control-label" for="payment-3">Thẻ ngân hàng(Bảo trì)</label>
                                </div>

                            </div>

                        </div>
                        <!-- ------------------------------------------------------magg------------------------------------------------------- -->
                        <div class="col-md-6">
                            <input type="hidden" name="total"
                                value="<?php if(isset($checkmagg['giamgia'])){ echo $pvc; }else{echo $tt;}?>">
                            <input type="hidden" name="thanhtien" value="<?php echo $thanhtien?>">
                        </div>
                        <!-- ------------------------------------------------------------------------------------------------------------- -->
                        <div class="checkout-btn tieude">
                            <a href="index.php?act=taikhoan"><input type="submit" value="Đặt hàng " name="dathang"
                                    class="nhap dathang" onclick="check()"></a>

                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
<!-- Checkout End -->