


<div class="main-content">
    <div class="page-content pt-4">
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
                                <li class="breadcrumb-item active">Danh sách danh mục</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="?act=delete-dm" method="post">
                            <div class="card-body">
                                <h4 class="card-title">Tất cả danh mục
                                    <a href="?act=adddm" class="btn btn-success float-right "
                                        style="transform: translateY(-30%);"> <i class="bx bx-plus pr-1"></i>Thêm
                                        danh
                                        mục </a>
                                </h4>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên danh mục</th>
                                            <th colspan="2" class="text-center">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($listdanhmuc as $dm) { ?>
                                            <tr>
                                                <td><?php echo $dm['id']; ?></td>
                                                <td><?php echo $dm['name_dm']; ?></td>
                                                <td class="text-center">
                                                    <a href="index.php?act=suadm&id=<?php echo $dm['id']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="index.php?act=xoadm&id=<?php echo $dm['id']; ?>" class="btn btn-danger btn-sm">Xóa</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
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
