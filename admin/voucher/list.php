<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered adm">
                                <thead class="thead-dark ">
                                    <tr>
                                        <th>Id</th>
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
                    </div>
                </div>
                </div>