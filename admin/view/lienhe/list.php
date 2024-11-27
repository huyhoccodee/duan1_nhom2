<div class="main-content">
    <div class="page-content pt-4">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý liên hệ</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý liên hệ</a>
                                </li>
                                <li class="breadcrumb-item active">Tất cả liên hệ</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tất cả liên hệ</h4>

                            <table class="table table-bordered adm">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th>Id</th>
                                        <th>Tên người dùng</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Nội dung</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <?php 
                                            foreach($listlienhe as $lienhe){
                                                extract($lienhe);
                                                $xoalh="index.php?act=xoalh&id=".$id;
                                            echo'<tbody class="align-middle">
                                                <tr>
                                                    <td>'.$id.'</td>
                                                
                                                    <td>'.$lh_name.'</td>
                                                    <td>'.$lh_email.'</td>
                                                    <td>'.$lh_sdt.'</td>
                                                    <td>'.$lh_noidung.'</td>
                                                    <td><a href="'.$xoalh.'"><input type="button" value="Xóa" class="btn btn-danger"></a></td>
                                                </tr>
                                                
                                            </tbody>';
                                            }
                                            
                                            
                                            ?>
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