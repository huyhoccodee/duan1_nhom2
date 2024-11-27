<?php
$getCountCategories = count(loadall_danhmuc());
$getCountAccounts = count(loadall_dangky());
$getCountProducts = count(loadall_spkbt());
$getCountOrders = count(loadall_donhang());
?>
<div class="container-fluid py-4 pb-0">
    <div class="row">
        <!-- Card Khách hàng -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Khách hàng</p>
                                <h5 class="font-weight-bolder"><?php echo $getCountAccounts; ?></h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-primary text-white shadow text-center rounded-circle">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Danh mục -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Danh mục</p>
                                <h5 class="font-weight-bolder"><?php echo $getCountCategories; ?></h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-primary text-white shadow text-center rounded-circle">
                                <i class="fa-solid fa-tag"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Sản phẩm -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Sản phẩm</p>
                                <h5 class="font-weight-bolder"><?php echo $getCountProducts; ?></h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-primary text-white shadow text-center rounded-circle">
                                <i class="fa-solid fa-tag"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card Đơn hàng -->
        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Đơn hàng</p>
                                <h5 class="font-weight-bolder mb-0">
                                    <?= $getCountOrders; ?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-primary text-white shadow text-center rounded-circle">
                                <i class="fa-solid fa-basket-shopping"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bảng thông tin danh mục -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                        <tr>
                            <th>Mã danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Số lượng</th>
                            <th>Giá cao nhất</th>
                            <th>Giá thấp nhất</th>
                            <th>Giá trung bình</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Đổ dữ liệu -->
                        <?php foreach ($listthongke as $thongke) {
                        extract($thongke);
                         ?>
                        <tr>
                            <td><?php echo $madm ?></td>
                            <td><?php echo $tendm?></td>
                            <td><?php echo $countsp?></td>
                            <td><?php echo $maxprice?></td>
                            <td><?php echo $minprice?></t>
                            <td><?php echo $avgprice?></td>
       
                        </tr>
                        <?php
                        }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
