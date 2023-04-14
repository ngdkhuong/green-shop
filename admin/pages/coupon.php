<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="card-block">
                        <h4 class="m-b-10">Coupon mã khuyến mãi</h4>
                        <?php if ($_GET['control'] != 'addcoupon' && $_SESSION['login_admin']['id_role'] == 3) { ?>
                            <a href="index.php?control=addcoupon" class="btn btn-primary mb-2">Thêm mới mã khuyến mãi</a>
                        <?php } ?>
                        <!-- <p class="text-muted m-b-10">lorem ipsum dolor sit amet, consectetur adipisicing elit</p> -->
                        <!-- <ul class="breadcrumb-title b-t-default p-t-10">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Basic Componenets</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Bootstrap Basic Tables</a>
                            </li>
                        </ul> -->
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">
                    <?php if ($_GET['control'] == 'coupon') { ?>
                        <!-- Hover table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Danh sách mã khuyến mãi</h4>
                                <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa-chevron-left"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-times close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-hover display">
                                        <thead>
                                            <tr>
                                                <th>Mã khuyến mãi</th>
                                                <th>Giảm giá</th>
                                                <th>Thời gian bắt đầu</th>
                                                <th>Thời gian kết thúc</th>
                                                <th>Trạng thái</th>
                                                <th>Xử lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rows = $coupon->getAllCouponBrand($_SESSION['login_admin']['id_admin']);
                                            foreach ($rows as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row['code_coupon']; ?></td>
                                                    <td><?php echo $row['discount'] * 100; ?>%</td>
                                                    <td><?php echo date("d-m-Y", strtotime($row['time_start'])) ?></td>
                                                    <td><?php echo date("d-m-Y", strtotime($row['time_end'])) ?></td>
                                                    <td>
                                                        <?php
                                                        $now = DateTime::createFromFormat('U.u', microtime(true));
                                                        $result = $now->format("Y-m-d");
                                                        $result = (int) strtotime($result);
                                                        $time_start = (int) strtotime($row['time_start']);
                                                        $time_end = (int) strtotime($row['time_end']);
                                                        if ($result >= $time_start && $result <= $time_end) { ?>
                                                            <span class="label label-success">Còn hiệu lực</span>
                                                        <?php } elseif ($result < $time_start) { ?>
                                                            <span class="label label-warning">Chưa đến ngày</span>
                                                        <?php } else { ?>
                                                            <span class="label label-danger">Hết hạn</span>
                                                        <?php }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($result < $time_start) { ?>
                                                            <a href="?control=editcoupon&id_coupon=<?php echo $row['id_coupon'] ?>" class="btn btn-warning">Sửa</a>
                                                        <?php }
                                                        if ($result > $time_end) { ?>
                                                            <a href="?control=deletecoupon&id_coupon=<?php echo $row['id_coupon'] ?>" class="btn btn-danger">Xóa</a>
                                                        <?php }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Hover table card end -->
                    <?php } ?>

                    <?php if ($_GET['control'] == 'addcoupon') { ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Thêm mới mã khuyến mãi</h4>
                                <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa-chevron-left"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-times close-card"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-block">
                                <form method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mã coupon</label>
                                        <div class="col-sm-10">
                                            <input name="code_coupon" type="text" pattern="[^'\x22-]+" title="Không hợp lệ" class="form-control" placeholder="Mã giảm giá" value="<?php echo $code_coupon ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giảm giá</label>
                                        <div class="col-sm-10">
                                            <input name="discount" type="text" pattern="[^'\x22-]+" title="Không hợp lệ" class="form-control" placeholder="Nhập % giảm giá" value="<?php echo $discount ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Thời gian bắt đầu</label>
                                        <div class="col-sm-10">
                                            <input name="time_start" type="date" pattern="[^'\x22-]+" title="Không hợp lệ" class="form-control" value="<?php echo $time_start ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Thời gian kết thúc</label>
                                        <div class="col-sm-10">
                                            <input name="time_end" type="date" pattern="[^'\x22-]+" title="Không hợp lệ" class="form-control" value="<?php echo $time_end ?>">
                                        </div>
                                    </div>

                                    <?php if (count($err) > 0) { ?>
                                        <ul class="alert alert-danger">
                                            <?php
                                            foreach ($err as $value) {
                                            ?>
                                                <li><?php echo $value ?></li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                    <button class="btn btn-primary mb-2">Thêm mới</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($_GET['control'] == 'editcoupon') { ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Sửa thông tin Mã khuyến mãi ID: <?php echo $id_coupon ?></h4>
                                <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa-chevron-left"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-times close-card"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-block">
                            <form method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mã coupon</label>
                                        <div class="col-sm-10">
                                            <input name="code_coupon" type="text" pattern="[^'\x22-]+" title="Không hợp lệ" class="form-control" placeholder="Mã giảm giá" value="<?php echo $row['code_coupon'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giảm giá</label>
                                        <div class="col-sm-10">
                                            <input name="discount" type="text" pattern="[^'\x22-]+" title="Không hợp lệ" class="form-control" placeholder="Nhập % giảm giá" value="<?php echo $row['discount']*100 ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Thời gian bắt đầu</label>
                                        <div class="col-sm-10">
                                            <input name="time_start" type="date" pattern="[^'\x22-]+" title="Không hợp lệ" class="form-control" value="<?php echo $row['time_start'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Thời gian kết thúc</label>
                                        <div class="col-sm-10">
                                            <input name="time_end" type="date" pattern="[^'\x22-]+" title="Không hợp lệ" class="form-control" value="<?php echo $row['time_end'] ?>">
                                        </div>
                                    </div>

                                    <?php if (count($err) > 0) { ?>
                                        <ul class="alert alert-danger">
                                            <?php
                                            foreach ($err as $value) {
                                            ?>
                                                <li><?php echo $value ?></li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                    <button class="btn btn-primary mb-2">Sửa thông tin Mã khuyến mãi</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- Page-body end -->
            </div>
        </div>
    </div>
</div>