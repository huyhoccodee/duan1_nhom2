<?php
$getCountCategories = count(loadall_danhmuc());
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
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-primary text-white shadow text-center rounded-circle">
                                <i class="fa-brands fa-buffer"></i>
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
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
