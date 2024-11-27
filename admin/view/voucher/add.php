<div class="main-content">
    <div class="page-content pt-4 ">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý mã giảm giá</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý mã giảm giá</a>
                                </li>
                                <li class="breadcrumb-item active">Thêm mã giảm giá</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm mã giảm giá</h4>
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
                        <!-- end card-body-->
                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div>
    </div>
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
