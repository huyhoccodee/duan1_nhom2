<div class="main-content">
    <div class="page-content pt-4">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Quản lý khách hàng</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript: void(0);">Quản lý khách hàng</a>
                                </li>
                                <li class="breadcrumb-item active">Thông tin khách hàng</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="?act=delete-kh" method="post">
                            <div class="card-body">
                                <h4 class="card-title">Tất cả khách hàng</h4>
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-dark bg-dark text-white">
                                        <tr>
                                            <th>Id</th>
                                            <th>Tên</th>
                                            <th>Password</th>
                                            <th>Email</th>
                                            <th>Số điện thoại</th>
                                            <th>Địa chỉ</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                            foreach($listdangky as $taikhoan){
                                                extract($taikhoan);
                                                $xoadk="index.php?act=xoadk&id=".$id;
                                                $suadk="index.php?act=suadk&id=".$id;
                                            echo'<tbody class="align-middle">
                                                <tr>
                                                    <td>'.$id.'</td>
                                                    <td>'.$name.'</td>
                                                    <td>'.$pass.'</td>
                                                    <td>'.$email.'</td>
                                                    <td>'.$sdt.'</td>
                                                    <td>'.$diachi.'</td>
                                                    <td><a href="'.$xoadk.'" ><input type="button" value="Xóa" class="btn btn-danger"></a>
                                                
                                                </tr>
                                                
                                            </tbody>';
                                            }
                                            
                                            
                                            ?>
                                </table>
                            </div>
                        </form>
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