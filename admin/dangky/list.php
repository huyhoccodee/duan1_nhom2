<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>

</head>

<body>
    <div class="container my-3 text-center">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <div class="mb-4">
                        <h2 class="text-danger"> Danh sách thành viên đăng ký</h2>
                    </div>
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
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>