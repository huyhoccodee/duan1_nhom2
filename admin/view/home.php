<?php
$getCountCategories = count(loadall_danhmuc());
$getCountAccounts = count(loadall_dangky());
$getCountProducts = count(loadall_spkbt());
$getCountOrders = count(loadall_donhang());

// Truy vấn cơ sở dữ liệu để lấy doanh thu của từng ngày trong tháng
$sql = "SELECT DATE(bill.ngaydathang) as date, SUM(bill.total) as revenue
        FROM bill
        WHERE bill.ngaydathang BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()
        GROUP BY DATE(bill.ngaydathang)
        ORDER BY date ASC";
$revenue_data = pdo_query($sql);

$dates = [];
$revenues = [];
foreach ($revenue_data as $row) {
    $dates[] = $row['date'];
    $revenues[] = $row['revenue'];
}

// Chuyển đổi dữ liệu PHP thành dạng JSON để sử dụng trong JavaScript
$dates_json = json_encode($dates);
$revenues_json = json_encode($revenues);

?>
<div class="main-content">
    <div class="page-content pt-4">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-20">Trang chủ</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Admin</a>
                                </li>
                                <li class="breadcrumb-item active">Trang chủ</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <i class="bx bx-layer float-right m-0 h2 text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Đơn đặt hàng</h6>
                            <h5 class="font-weight-bolder mb-0"><?= $getCountOrders; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <i class="bx bx-layer float-right m-0 h2 text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Khách hàng</h6>
                            <h5 class="font-weight-bolder mb-0"><?= $getCountAccounts; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <i class="bx bx-bx bx-analyse float-right m-0 h2 text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Danh mục</h6>
                            <h5 class="font-weight-bolder"><?php echo $getCountCategories; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <i class="bx bx-basket float-right m-0 h2 text-muted"></i>
                            <h6 class="text-muted text-uppercase mt-0">Sản phẩm</h6>
                            <h5 class="font-weight-bolder"><?php echo $getCountProducts; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Biểu đồ doanh thu tháng -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Biểu đồ thống kê doanh thu tháng</h4>
                            <!-- Đảm bảo bạn đã thêm thư viện Chart.js vào trang của mình -->
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                            <canvas id="revenueChart" width="400" height="200"></canvas>

                            <script>
                            // Lấy dữ liệu PHP đã chuyển đổi thành JSON
                            var dates = <?php echo $dates_json; ?>;
                            var revenues = <?php echo $revenues_json; ?>;

                            // Tạo biểu đồ với Chart.js
                            var ctx = document.getElementById('revenueChart').getContext('2d');
                            var revenueChart = new Chart(ctx, {
                                type: 'line', // Biểu đồ đường
                                data: {
                                    labels: dates, // Nhãn cho trục X (Ngày)
                                    datasets: [{
                                        label: 'Doanh thu',
                                        data: revenues, // Dữ liệu doanh thu cho trục Y
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        fill: false,
                                        tension: 0.1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                            </script>

                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- Thống kê sản phẩm -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title overflow-hidden">Thống kê</h4>
                            <div class="table-responsive">
                                <table class="table table-centered table-hover table-xl mb-0" id="recent-orders">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Tên danh mục</th>
                                            <th class="border-top-0">Số lượng</th>
                                            <th class="border-top-0">Giá cao nhất</th>
                                            <th class="border-top-0">Giá thấp nhất</th>
                                            <th class="border-top-0">Giá trung bình</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listthongke as $value) : ?>
                                        <tr>
                                            <td class="text-truncate"><?php echo $value['madm'] ?></td>
                                            <td class="text-truncate"><?php echo $value['tendm'] ?></td>
                                            <td>
                                                <span
                                                    class="badge badge-soft-success p-2"><?php echo $value['countsp'] ?></span>
                                            </td>
                                            <td class="text-truncate"><?php echo $value['maxprice'] ?></td>
                                            <td class="text-truncate"><?php echo $value['minprice'] ?></td>
                                            <td class="text-truncate"><?php echo $value['avgprice'] ?></td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">2024 © HKT TEAM.</div>
                <div class="col-sm-6">
                    <div class="text-sm-right d-none d-sm-block">
                        Quản lý Website
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content -->