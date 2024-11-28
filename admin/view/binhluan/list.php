<div class="main-content">
    <div class="page-content pt-4 ">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý bình luận</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý bình luận</a>
                                </li>
                                <li class="breadcrumb-item active">Danh sách bình luận</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách bình luận</h4>
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Số thứ tự</th>
                                        <th scope="col">Nội dung</th>
                                        <th scope="col">ID User</th>
                                        <th scope="col">ID Sản phẩm</th>
                                        <th scope="col">Ngày bình luận</th>
                                        <th scope="col">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listbl as $bl) { ?>
                                    <tr>
                                        <td><?php echo $bl['id_bl'] ?></td>
                                        <td><?php echo $bl['noidung'] ?></td>
                                        <td><?php echo $bl['id_user'] ?></td>
                                        <td><?php echo $bl['id_sp'] ?></td>
                                        <td><?php echo $bl['ngaybinhluan'] ?></td>
                                        <td>
                                            <a href="index.php?act=xoabl&id=<?php echo $bl['id_bl'] ?>"
                                                class="btn btn-danger btn-sm">Xóa</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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