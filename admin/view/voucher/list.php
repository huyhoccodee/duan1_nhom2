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
                                <li class="breadcrumb-item active">Danh sách mã giảm giá</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Danh sách mã giảm giá</h4>
                            <table class="table table-bordered adm">
                                <thead class="thead-dark ">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên mã giảm giá </th>
                                        <th>Số tiền giảm giá</th>
                                        
                                        <th>Số lượng</th>
                                        <th>Xóa</th>
                                    </tr>
                                </thead>
                                <?php 
                                foreach($listvoucher as $magiamgia){
                                    extract($magiamgia);
                                    $xoavc="index.php?act=xoavc&id=".$id;
                                    $suavc="index.php?act=suavc&id=".$id;
                                echo'<tbody class="align-middle">
                                    <tr>
                                        <td>'.$id.'</td>
                                        <td>'.$name_magg.'</td>
                                        <td>'.$giamgia.'</td>
                                        
                                        <td>'.$soluong.'</td>
                                        <td><a href="'.$xoavc.'"><input type="button" value="Xóa" class="btn btn-danger"></a></td>
                                    </tr>
                                    
                                </tbody>';
                                }                                
                                
                                ?>
                            </table>
                            <div>
                                    <a href="index.php?act=addvc"><input type="submit" name="themmoi" value="Thêm mới" class="btn btn-primary"></a> 
                            </div>
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
