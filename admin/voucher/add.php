<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive khung">
                            <div class="tieude">
                                <h2 class="adm">Thêm mới voucher</h2>
                            </div>
                           <form action="index.php?act=addvc" method="post" class="khung2" >
                                <div class="adm">
                                    Tên mã giảm giá <br>
                                    <input type="text" name="name_magg" class="form-control" required>
                                </div>
                                <div class="adm">
                                    Số tiền giảm<br>
                                    <input type="text" name="giamgia" class="form-control" required>
                                </div>
                                <!-- <div class="adm">
                                    Ngày hết hạn<br>
                                    <input type="date" name="end_date" class="form-control">
                                </div> -->
                                <div class="adm">
                                    Số lượng<br>
                                    <input type="number" name="soluong" class="form-control" required>
                                </div>
                                <div class="adm">
                                    <input type="submit" name="themmoi" value="Thêm mới" class="nhap">
                                    <a href="index.php?act=listvc"><input type="button" value="Danh sách" class="adleft nhap"></a>
                                </div>
                                <?php if(isset($thongbao)&&($thongbao!="")) echo $thongbao; ?>
                           </form>
                        </div>
                    </div>
                </div>
                </div>