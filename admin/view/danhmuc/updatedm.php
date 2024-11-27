
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
                                <li class="breadcrumb-item active">Sửa danh mục</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sửa danh mục</h4>
                            <form action="index.php?act=updatedm" method="post">
                                <input type="hidden" name="id" value="<?php echo $dm['id']; ?>"> <!-- ID được ẩn -->
                                <div class="mb-3">
                                    <label for="tenloai" class="form-label">Tên Loại</label>
                                    <input type="text" name="tenloai" id="tenloai" class="form-control" value="<?php echo isset($dm['name_dm']) ? $dm['name_dm'] : ''; ?>" required>
                                </div>
                                <div class="float-right">
                                    <a href="?act=listdm" class="btn btn-outline-success">Danh sách danh mục</a>
                                    <input type="submit" class="btn btn-success" value="Cập nhật danh mục" name="capnhatdm">
                                </div>
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
