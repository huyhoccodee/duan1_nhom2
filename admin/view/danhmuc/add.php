<div class="main-content">
    <div class="page-content pt-4 ">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý danh mục</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý danh mục</a>
                                </li>
                                <li class="breadcrumb-item active">Thêm danh mục</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm danh mục</h4>
                            <!-- Hiển thị thông báo lỗi nếu có -->
                            <?php if (isset($error)) { ?>
                                <div class="alert alert-danger">
                                    <?php echo $error; ?>
                                </div>
                            <!-- Hiển thị thông báo thành công -->
                            <?php } elseif (isset($message)) { ?>
                                <div class="alert alert-success">
                                    <?php echo $message; ?>
                                </div>
                            <?php } ?>

                            <form action="index.php?act=adddm" method="post">
                                <div class="mb-3">
                                    <label for="" class="form-label">Mã loại:</label>
                                    <input type="text" name="id" id="" class="form-control" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tên loại:</label>
                                    <input type="text" name="tenloai" id="" class="form-control" >
                                </div>
                                <button type="submit" name="themdanhmuc" value="Thêm danh mục" class="btn btn-primary">Thêm danh mục</button>
                            </form>
                            <a href="index.php?act=listdm" class="btn btn-secondary mt-3">Danh sách danh mục</a>
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
