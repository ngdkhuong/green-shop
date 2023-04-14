<link rel="stylesheet" href="../assets/css/chartcss.css">
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <?php
                        $now = DateTime::createFromFormat('U.u', microtime(true));
                        $time = $now->format("Y-m");
                        if ($_SESSION['login_admin']['id_role'] == 3) {
                            $profit = 0.9;
                            $id_brand = $_SESSION['login_admin']['id_admin'];
                            $sluongHd = $bill->countBillBrand($id_brand)['countbill'];
                            $sluongHdThanhcong = $bill->countBillSuccessBrand($id_brand)['countbill'];
                            $doanhSo = $bill->sumQuanlityProductBrand($id_brand)[0]['sumquanlity'];
                            $doanhSo = !empty($doanhSo) ? $doanhSo : 0;
                            $doanhSoThang = $bill->sumQuanlityProductInMonthBrand($time, $id_brand)[0]['sumquanlity'];
                            $doanhSoThang = !empty($doanhSoThang) ? $doanhSoThang : 0;
                            $doanhThu = $bill->revenueBrand($id_brand)[0]['sumtotal'];
                            $doanhThuThang = $bill->revenueInMonthBrand($time, $id_brand)[0]['sumtotal'];
                            $loiNhuan = $bill->revenueBrand($id_brand)[0]['sumtotal'] * $profit;
                            $loiNhuanThang = $bill->revenueInMonthBrand($time, $id_brand)[0]['sumtotal'] * $profit;
                        } else {
                            $profit = 0.1;
                            $sluongHd = $bill->countBill()['countbill'];
                            $sluongHdThanhcong = $bill->countBillSuccess()['countbill'];
                            $doanhSo = $bill->sumQuanlityProduct()[0]['sumquanlity'];
                            $doanhSo = !empty($doanhSo) ? $doanhSo : 0;
                            $doanhSoThang = $bill->sumQuanlityProductInMonth($time)[0]['sumquanlity'];
                            $doanhSoThang = !empty($doanhSoThang) ? $doanhSoThang : 0;
                            $doanhThu = $bill->revenue()[0]['sumtotal'];
                            $doanhThuThang = $bill->revenueInMonth($time)[0]['sumtotal'];
                            $loiNhuan = $bill->revenue()[0]['sumtotal'] * $profit;
                            $loiNhuanThang = $bill->revenueInMonth($time)[0]['sumtotal'] * $profit;
                        }
                        ?>
                        <!-- order-card start -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-blue order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Orders Received</h6>
                                    <h4 class="text-right"><i class="ti-shopping-cart f-left"></i><span><?php echo $sluongHd ?></span>
                                    </h4>
                                    <p class="m-b-0">Completed Orders<span class="f-right"><?php echo $sluongHdThanhcong ?></span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-green order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total Sales</h6>
                                    <h4 class="text-right"><i class="ti-tag f-left"></i><span><?php echo $doanhSo  ?></span></h4>
                                    <p class="m-b-0">This Month<span class="f-right"><?php echo $doanhSoThang  ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-yellow order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Revenue</h6>
                                    <h4 class="text-right"><i class="ti-reload f-left"></i><span><?php echo number_format($doanhThu, 0, '', ',')  ?>đ</span></h4>
                                    <p class="m-b-0">This Month<span class="f-right"><?php echo number_format($doanhThuThang, 0, '', ',') ?>đ</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card bg-c-pink order-card">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total Profit</h6>
                                    <h4 class="text-right"><i class="ti-wallet f-left"></i><span><?php echo number_format($loiNhuan, 0, '', ',') ?>đ</span>
                                    </h4>
                                    <p class="m-b-0">This Month<span class="f-right"><?php echo number_format($loiNhuanThang, 0, '', ',') ?>đ</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- order-card end -->

                        <!-- statustic and process start -->
                        <div class="col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Statistics</h5>
                                    <form action="" method="post">
                                        <input class="p-1" type="month" name="date-thongke" id="" value="<?php echo isset($_POST['date-thongke']) ? $_POST['date-thongke'] : "" ?>">
                                        <select class="p-2" name="op-thongke" id="">
                                            <option value="1" <?php
                                                                if (isset($_POST['op-thongke']) && $_POST['op-thongke'] == 2) {
                                                                    echo "selected";
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>>Năm</option>
                                            <option value="2" <?php
                                                                if (isset($_POST['op-thongke']) && $_POST['op-thongke'] == 2) {
                                                                    echo "selected";
                                                                } else {
                                                                    echo "";
                                                                }
                                                                ?>>Tháng</option>
                                        </select>
                                        <button name="thongke" type="submit">Thống kê</button>
                                    </form>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa-chevron-left"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i>
                                            </li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                            <li><i class="fa fa-times close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <figure class="highcharts-figure">
                                        <div id="container"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Customer Feedback</h5>
                                </div>
                                <div class="card-block">
                                    <?php
                                    $like = $evalution->countLikeBrand($_SESSION['login_admin']['id_admin'])['countLike'];
                                    $dislike = $evalution->countDisLikeBrand($_SESSION['login_admin']['id_admin'])['countDisLike'];
                                    ?>
                                    <span class="d-block text-c-blue f-24 f-w-600 text-center"><?php echo $like + $dislike; ?></span>
                                    <canvas id="myChart" style="width:30%;max-width:700px"></canvas>
                                    <!-- <canvas id="feedback-chart" height="100"></canvas> -->
                                    <!-- <figure class="highcharts-figure">
                                        <div id="container"></div>
                                    </figure> -->
                                    <div class="row justify-content-center m-t-15">
                                        <div class="col-auto b-r-default m-t-5 m-b-5">
                                            <h4>
                                                <?php
                                                if (($like + $dislike) != 0) {
                                                    echo $like / ($like + $dislike) * 100;
                                                } else {
                                                    echo 0;
                                                }
                                                ?> %
                                            </h4>
                                            <p class="text-success m-b-0"><i class="ti-hand-point-up m-r-5"></i>Like
                                            </p>
                                        </div>
                                        <div class="col-auto m-t-5 m-b-5">
                                            <h4>
                                                <?php
                                                if (($like + $dislike) != 0) {
                                                    echo $dislike / ($like + $dislike) * 100;
                                                } else {
                                                    echo 0;
                                                }
                                                ?> %
                                            </h4>
                                            <p class="text-danger m-b-0"><i class="ti-hand-point-down m-r-5"></i>Dislike
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- statustic and process end -->
                        <!-- tabs card start -->
                        <div class="col-sm-12">
                            <div class="card tabs-card">
                                <div class="card-block p-0">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-home"></i>Sản phẩm</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-key"></i>Danh mục</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fa fa-play-circle"></i>Khách hàng</a>
                                            <div class="slide"></div>
                                        </li>
                                        <?php if ($_SESSION['login_admin']['id_role'] != 3) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i class="fa fa-database"></i>Cửa hàng</a>
                                                <div class="slide"></div>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="home3" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table display1">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 15%;">Ảnh sản phẩm</th>
                                                            <th style="width: 20%;">Tên sản phẩm</th>
                                                            <th style="width: 20%;">Danh mục</th>
                                                            <th style="width: 15%;">Giá bán thực</th>
                                                            <th style="width: 15%;">Trạng thái</th>
                                                            <th style="width: 15%;">Lượt xem</th>
                                                            <th style="width: 15%;">Lượt mua</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if ($_SESSION['login_admin']['id_role'] == 3) {
                                                            $rows = $product->getAllProductsOfBrand($_SESSION['login_admin']['id_admin']);
                                                        } else {
                                                            $rows = $product->getAllProducts();
                                                        }
                                                        foreach ($rows as $row) { ?>
                                                            <tr>
                                                                <td style="width: 15%;"><img width="50px" src="../../assets/img/upload/img_product/<?php echo $row['img_prd_1'] ?>" alt="prod img" class="img-fluid"></td>
                                                                <td style="width: 20%;"><?php echo $row['name_prd'] ?></td>
                                                                <td style="width: 20%;"><?php echo $category->getCateId($row['id_cate'])['name_cate'] ?></td>
                                                                <td style="width: 15%;"><?php echo number_format($row['price'], 0, '', ',') ?>đ</td>
                                                                <td style="width: 15%;"><?php if ($row['quanlity'] > 0) { ?>
                                                                        <span class="label label-success">Còn hàng</span>
                                                                    <?php } elseif ($row['quanlity'] < 10) { ?>
                                                                        <span class="label label-warning">Sắp hết hàng</span>
                                                                    <?php } else { ?>
                                                                        <span class="label label-danger">Hết hàng</span>
                                                                    <?php }
                                                                    ?>
                                                                </td>
                                                                <td style="width: 15%;"><?php echo $row['view'] ?></td>
                                                                <td style="width: 15%;"><?php echo $bill->countBillDetailIdProduct($row['id_prd']); ?></td>
                                                            </tr>
                                                        <?php }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="profile3" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table display1">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 15%;">ID Danh mục</th>
                                                            <th style="width: 15%;">Tên danh mục</th>
                                                            <th style="width: 15%;">Tên cửa hàng</th>
                                                            <th style="width: 20%;">Số lượng sản phẩm</th>
                                                            <th style="width: 20%;">Lượt xem</th>
                                                            <th style="width: 15%;">Lượt mua</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        if ($_SESSION['login_admin']['id_role'] == 3) {
                                                            // $rows = $product->getAllProductsOfBrand($_SESSION['login_admin']['id_admin']);
                                                            $rows = $category->getAllCategorysOfidAdmin($_SESSION['login_admin']['id_admin']);
                                                        } else {
                                                            $rows = $category->getAllCategorys();
                                                        }

                                                        foreach ($rows as $row) { ?>
                                                            <tr>
                                                                <td style="width: 15%;"><?php echo $row['id_cate'] ?></td>
                                                                <td style="width: 15%;"><?php echo $row['name_cate'] ?></td>
                                                                <td style="width: 15%;"><?php echo $administrator->getAdminId($row['id_admin'])['name_brand'] ?></td>
                                                                <td style="width: 20%;"><?php echo $product->countAllProductsOfCate($row['id_cate']) ?></td>
                                                                <td style="width: 20%;"><?php echo $row['view'] ?></td>
                                                                <td style="width: 15%;"><?php echo $bill->countProductOfCateSold($row['id_cate']); ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="messages3" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table display1">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 15%;">Id KH</th>
                                                            <th style="width: 20%;">Tên KH</th>
                                                            <th style="width: 20%;">Email</th>
                                                            <th style="width: 15%;">Phone</th>
                                                            <th style="width: 15%;">Số đơn hàng</th>
                                                            <th style="width: 15%;">Tỉ lệ đơn hàng thành công</th>
                                                            <th style="width: 15%;">Số tiền đã thanh toán</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $arrayusers = [];
                                                        if ($_SESSION['login_admin']['id_role'] == 3) {
                                                            $rows = $bill->getBillBrand($_SESSION['login_admin']['id_admin']);
                                                            foreach ($rows as $row) {
                                                                $flag = 0;
                                                                foreach ($arrayusers as $itemuser) {
                                                                    if ($itemuser == $row['id_user']) {
                                                                        $flag = 1;
                                                                        break;
                                                                    }
                                                                }

                                                                if ($flag == 0) {
                                                                    array_push($arrayusers, $row['id_user']);
                                                                }
                                                            }
                                                        } else {
                                                            $rows = $bill->getAllBill();
                                                            foreach ($rows as $row) {
                                                                $flag = 0;
                                                                foreach ($arrayusers as $itemuser) {
                                                                    if ($itemuser == $row['id_user']) {
                                                                        $flag = 1;
                                                                        break;
                                                                    }
                                                                }

                                                                if ($flag == 0) {
                                                                    array_push($arrayusers, $row['id_user']);
                                                                }
                                                            }
                                                        }

                                                        // print_r($arrayusers);
                                                        foreach ($arrayusers as $itemuser) { ?>
                                                            <?php $row = $user->getUserId($itemuser);
                                                            if ($_SESSION['login_admin']['id_role'] == 3) {
                                                                $countbill = $bill->countBillIdUserOfBrand($row['id_user'], $_SESSION['login_admin']['id_admin'])['countbill'];
                                                                $countbillsuccess = $bill->countBillIdUserSuccessOfBrand($row['id_user'], $_SESSION['login_admin']['id_admin'])['countbill'];
                                                                $ratesuccess = number_format($countbillsuccess / $countbill * 100, 2, '.', '');
                                                                $totalusersuccess = number_format($bill->totalIdUserSuccessOfBrand($row['id_user'], $_SESSION['login_admin']['id_admin'])[0]['sumtotal'], 0, '', ',');
                                                            } else {
                                                                $countbill = $bill->countBillIdUser($row['id_user'])['countbill'];
                                                                $countbillsuccess = $bill->countBillIdUserSuccess($row['id_user'])['countbill'];
                                                                $ratesuccess = number_format($countbillsuccess / $countbill * 100, 2, '.', '');
                                                                $totalusersuccess = number_format($bill->totalIdUserSuccess($row['id_user'])[0]['sumtotal'], 0, '', ',');
                                                            }

                                                            ?>
                                                            <tr>
                                                                <td style="width: 15%;"><?php echo $row['id_user'] ?></td>
                                                                <td style="width: 20%;"><?php echo $row['fullname'] ?></td>
                                                                <td style="width: 20%;"><?php echo $row['email'] ?></td>
                                                                <td style="width: 15%;"><?php echo $row['phone'] ?></td>
                                                                <td style="width: 15%;"><?php echo $countbill ?></td>
                                                                <td style="width: 15%;"><?php echo $ratesuccess  ?>%</td>
                                                                <td style="width: 15%;"><?php echo $totalusersuccess ?>đ</td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php
                                        if ($_SESSION['login_admin']['id_role'] != 3) {
                                            $rows = $administrator->getAllBrands();
                                            $profit = 0.9; ?>

                                            <div class="tab-pane" id="settings3" role="tabpanel">
                                                <div class="table-responsive">
                                                    <table class="table display1">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 10%;">Id</th>
                                                                <th style="width: 15%;">Tên Shop</th>
                                                                <th style="width: 15%;">Ảnh đại diện</th>
                                                                <!-- <th style="width: 15%;">Phone</th>
                                                            <th style="width: 15%;">Email</th>
                                                            <th style="width: 15%;">Địa chỉ</th> -->
                                                                <th style="width: 10;">Lượt xem</th>
                                                                <th style="width: 10;">Tổng số đơn hàng</th>
                                                                <th style="width: 10;">Đơn hàng thành công</th>
                                                                <th style="width: 10;">Danh số</th>
                                                                <th style="width: 10;">Doanh thu</th>
                                                                <th style="width: 10;">Lợi nhuận</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            foreach ($rows as $row) { ?>
                                                                <tr>
                                                                    <td style="width: 10%;"><?php echo $row['id_admin'] ?></td>
                                                                    <td style="width: 15%;"><a href="?control=store&id_brand=<?php echo $row['id_admin'] ?>"><?php echo $row['name_brand'] == "" ? "Chưa cập nhập" : $row['name_brand'] ?></a></td>
                                                                    <td style="width: 15%;"><img width="50px" src="../../assets/img/upload/avatar_admin/<?php echo $row['avatar'] ?>" alt=""></td>
                                                                    <!-- <td style="width: 15%;"><?php //echo $row['phone'] 
                                                                                                    ?></td>
                                                                <td style="width: 15%;"><?php //echo $row['email'] 
                                                                                        ?></td>
                                                                <td style="width: 15%;"><?php //echo $row['address'] 
                                                                                        ?></td> -->
                                                                    <td style="width: 10%;"><?php echo $row['view'] ?></td>
                                                                    <td style="width: 10%;"><?php echo $bill->countBillBrand($row['id_admin'])['countbill'] ?></td>
                                                                    <td style="width: 10%;"><?php echo $bill->countBillSuccessBrand($row['id_admin'])['countbill'] ?></td>
                                                                    <td style="width: 10%;"><?php echo $bill->sumQuanlityProductBrand($row['id_admin'])[0]['sumquanlity'] == "" ? 0 : $bill->sumQuanlityProductBrand($row['id_admin'])[0]['sumquanlity'] ?></td>
                                                                    <td style="width: 10%;"><?php echo number_format($bill->revenueBrand($row['id_admin'])[0]['sumtotal'] == "" ? 0 : $bill->revenueBrand($row['id_admin'])[0]['sumtotal'], 0, '', ',') ?>đ</td>
                                                                    <td style="width: 10%;"><?php echo number_format($bill->revenueBrand($row['id_admin'])[0]['sumtotal'] * 0.9, 0, '', ',') ?>đ</td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tabs card end -->

                        <!-- social statustic start -->
                        <!-- <div class="col-md-12 col-lg-4">
                            <div class="card">
                                <div class="card-block text-center">
                                    <i class="fa fa-envelope-open text-c-blue d-block f-40"></i>
                                    <h4 class="m-t-20"><span class="text-c-blue">8.62k</span>
                                        Subscribers</h4>
                                    <p class="m-b-20">Your main list is growing</p>
                                    <button class="btn btn-primary btn-sm btn-round">Manage
                                        List</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-block text-center">
                                    <i class="fa fa-twitter text-c-green d-block f-40"></i>
                                    <h4 class="m-t-20"><span class="text-c-blgreenue">+40</span>
                                        Followers</h4>
                                    <p class="m-b-20">Your main list is growing</p>
                                    <button class="btn btn-success btn-sm btn-round">Check them
                                        out</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="card">
                                <div class="card-block text-center">
                                    <i class="fa fa-puzzle-piece text-c-pink d-block f-40"></i>
                                    <h4 class="m-t-20">Business Plan</h4>
                                    <p class="m-b-20">This is your current active plan</p>
                                    <button class="btn btn-danger btn-sm btn-round">Upgrade to
                                        VIP</button>
                                </div>
                            </div>
                        </div> -->
                        <!-- social statustic end -->
                        <!-- users visite and profile start -->
                        <!-- <div class="col-md-4">
                            <div class="card user-card">
                                <div class="card-header">
                                    <h5>Profile</h5>
                                </div>
                                <div class="card-block">
                                    <div class="usre-image">
                                        <img src="../assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    </div>
                                    <h6 class="f-w-600 m-t-25 m-b-10">Alessa Robert</h6>
                                    <p class="text-muted">Active | Male | Born 23.05.1992</p>
                                    <hr />
                                    <p class="text-muted m-t-15">Activity Level: 87%</p>
                                    <ul class="list-unstyled activity-leval">
                                        <li class="active"></li>
                                        <li class="active"></li>
                                        <li class="active"></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <div class="bg-c-blue counter-block m-t-10 p-20">
                                        <div class="row">
                                            <div class="col-4">
                                                <i class="ti-comments"></i>
                                                <p>1256</p>
                                            </div>
                                            <div class="col-4">
                                                <i class="ti-user"></i>
                                                <p>8562</p>
                                            </div>
                                            <div class="col-4">
                                                <i class="ti-bag"></i>
                                                <p>189</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="m-t-15 text-muted">Lorem Ipsum is simply dummy
                                        text of the printing and typesetting industry.</p>
                                    <hr />
                                    <div class="row justify-content-center user-social-link">
                                        <div class="col-auto"><a href=""><i class="fa fa-facebook text-facebook"></i></a>
                                        </div>
                                        <div class="col-auto"><a href=""><i class="fa fa-twitter text-twitter"></i></a>
                                        </div>
                                        <div class="col-auto"><a href=""><i class="fa fa-dribbble text-dribbble"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Activity Feed</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa-chevron-left"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i>
                                            </li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                            <li><i class="fa fa-times close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <ul class="feed-blog">
                                        <li class="active-feed">
                                            <div class="feed-user-img">
                                                <img src="../assets/images/avatar-3.jpg" class="img-radius " alt="User-Profile-Image">
                                            </div>
                                            <h6><span class="label label-danger">File</span>
                                                Eddie uploaded new files: <small class="text-muted">2 hours ago</small></h6>
                                            <p class="m-b-15 m-t-15">hii <b> @everone</b> Lorem
                                                Ipsum is simply dummy text of the printing and
                                                typesetting industry.</p>
                                            <div class="row">
                                                <div class="col-auto text-center">
                                                    <img src="../assets/images/blog/blog-r-1.jpg" alt="img" class="img-fluid img-100">
                                                    <h6 class="m-t-15 m-b-0">Old Scooter</h6>
                                                    <p class="text-muted m-b-0">
                                                        <small>PNG-100KB</small>
                                                    </p>
                                                </div>
                                                <div class="col-auto text-center">
                                                    <img src="../assets/images/blog/blog-r-2.jpg" alt="img" class="img-fluid img-100">
                                                    <h6 class="m-t-15 m-b-0">Wall Art</h6>
                                                    <p class="text-muted m-b-0">
                                                        <small>PNG-150KB</small>
                                                    </p>
                                                </div>
                                                <div class="col-auto text-center">
                                                    <img src="../assets/images/blog/blog-r-3.jpg" alt="img" class="img-fluid img-100">
                                                    <h6 class="m-t-15 m-b-0">Microphone</h6>
                                                    <p class="text-muted m-b-0">
                                                        <small>PNG-150KB</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="diactive-feed">
                                            <div class="feed-user-img">
                                                <img src="../assets/images/avatar-4.jpg" class="img-radius " alt="User-Profile-Image">
                                            </div>
                                            <h6><span class="label label-success">Task</span>Sarah
                                                marked the Pending Review: <span class="text-c-green"> Trash Can Icon
                                                    Design</span><small class="text-muted">2
                                                    hours ago</small></h6>
                                        </li>
                                        <li class="diactive-feed">
                                            <div class="feed-user-img">
                                                <img src="../assets/images/avatar-2.jpg" class="img-radius " alt="User-Profile-Image">
                                            </div>
                                            <h6><span class="label label-primary">comment</span>
                                                abc posted a task: <span class="text-c-green">Design a new
                                                    Homepage</span> <small class="text-muted">6
                                                    hours ago</small></h6>
                                            <p class="m-b-15 m-t-15"> hii <b> @everone</b> Lorem
                                                Ipsum is simply dummy text of the printing and
                                                typesetting industry.</p>
                                        </li>
                                        <li class="active-feed">
                                            <div class="feed-user-img">
                                                <img src="../assets/images/avatar-3.jpg" class="img-radius " alt="User-Profile-Image">
                                            </div>
                                            <h6><span class="label label-warning">Task</span>Sarah
                                                marked : <span class="text-c-green"> do Icon
                                                    Design</span><small class="text-muted">10
                                                    hours ago</small></h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                        <!-- users visite and profile end -->
                    </div>
                </div>
                <?php
                $sumProducts = [];
                $revenues = [];
                $titles = [];
                if (isset($_POST['thongke'])) {
                    if ($_POST['op-thongke'] == 1) {
                        $titles = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
                        for ($i = 1; $i <= 12; $i++) {
                            $time = substr($_POST['date-thongke'], 0, 5); //2023-
                            if ($i < 10) {
                                $time = $time . "0" . $i;
                            } else {
                                $time = $time . $i;
                            }
                            // echo $time . "<br>";
                            if ($_SESSION['login_admin']['id_role'] == 3) {
                                $profit = 0.9;
                                $id_brand = $_SESSION['login_admin']['id_admin'];
                                $sumQuanlityProductInMonthBrand = $bill->sumQuanlityProductInMonthBrand($time, $id_brand)[0]['sumquanlity'];
                                if (!empty($sumQuanlityProductInMonthBrand)) {
                                    array_push($sumProducts, $sumQuanlityProductInMonthBrand);
                                } else {
                                    array_push($sumProducts, '0');
                                }
                                $revenueInMonthBrand = $bill->revenueInMonthBrand($time, $id_brand)[0]['sumtotal'];
                                if (!empty($revenueInMonthBrand)) {
                                    array_push($revenues, $revenueInMonthBrand * $profit);
                                } else {
                                    array_push($revenues, '0');
                                }
                            } else {
                                $profit = 0.1;
                                $sumQuanlityProductInMonth = $bill->sumQuanlityProductInMonth($time)[0]['sumquanlity'];
                                if (!empty($sumQuanlityProductInMonth)) {
                                    array_push($sumProducts, $sumQuanlityProductInMonth);
                                } else {
                                    array_push($sumProducts, '0');
                                }
                                $revenueInMonth = $bill->revenueInMonth($time)[0]['sumtotal'];
                                if (!empty($revenueInMonth)) {
                                    array_push($revenues, $revenueInMonth * $profit);
                                } else {
                                    array_push($revenues, '0');
                                }
                            }
                        }
                    } elseif ($_POST['op-thongke'] == 2) {
                        // echo substr($_POST['date-thongke'], 0, 4);//Lấy năm
                        // echo substr($_POST['date-thongke'], 5);//Lấy tháng
                        $countday = lastday(substr($_POST['date-thongke'], 5), substr($_POST['date-thongke'], 0, 4));
                        $countday = substr($countday, 8);
                        for ($i = 1; $i <= $countday; $i++) {
                            $time = substr($_POST['date-thongke'], 0, 8); //2023-02
                            if ($i < 10) {
                                $time = $time . "-0" . $i;
                            } else {
                                $time = $time . "-" . $i;
                            }
                            // echo $time . "<br>";
                            if ($_SESSION['login_admin']['id_role'] == 3) {
                                $profit = 0.9;
                                $id_brand = $_SESSION['login_admin']['id_admin'];
                                $sumQuanlityProductInMonthBrand = $bill->sumQuanlityProductInMonthBrand($time, $id_brand)[0]['sumquanlity'];
                                if (!empty($sumQuanlityProductInMonthBrand)) {
                                    array_push($sumProducts, $sumQuanlityProductInMonthBrand);
                                } else {
                                    array_push($sumProducts, '0');
                                }
                                $revenueInMonthBrand = $bill->revenueInMonthBrand($time, $id_brand)[0]['sumtotal'];
                                if (!empty($revenueInMonthBrand)) {
                                    array_push($revenues, $revenueInMonthBrand * $profit);
                                } else {
                                    array_push($revenues, '0');
                                }
                            } else {
                                $profit = 0.1;
                                $sumQuanlityProductInMonth = $bill->sumQuanlityProductInMonth($time)[0]['sumquanlity'];
                                if (!empty($sumQuanlityProductInMonth)) {
                                    array_push($sumProducts, $sumQuanlityProductInMonth);
                                } else {
                                    array_push($sumProducts, '0');
                                }
                                $revenueInMonth = $bill->revenueInMonth($time)[0]['sumtotal'];
                                if (!empty($revenueInMonth)) {
                                    array_push($revenues, $revenueInMonth * $profit);
                                } else {
                                    array_push($revenues, '0');
                                }
                            }
                            array_push($titles, $i);
                        }
                    }
                } else {
                    $titles = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];
                    for ($i = 1; $i <= 12; $i++) {
                        $now = DateTime::createFromFormat('U.u', microtime(true));
                        $time = $now->format("Y-");
                        if ($i < 10) {
                            $time = $time . "0" . $i;
                        } else {
                            $time = $time . $i;
                        }
                        if ($_SESSION['login_admin']['id_role'] == 3) {
                            $profit = 0.9;
                            $id_brand = $_SESSION['login_admin']['id_admin'];
                            $sumQuanlityProductInMonthBrand = $bill->sumQuanlityProductInMonthBrand($time, $id_brand)[0]['sumquanlity'];
                            if (!empty($sumQuanlityProductInMonthBrand)) {
                                array_push($sumProducts, $sumQuanlityProductInMonthBrand);
                            } else {
                                array_push($sumProducts, '0');
                            }
                            $revenueInMonthBrand = $bill->revenueInMonthBrand($time, $id_brand)[0]['sumtotal'];
                            if (!empty($revenueInMonthBrand)) {
                                array_push($revenues, $revenueInMonthBrand * $profit);
                            } else {
                                array_push($revenues, '0');
                            }
                        } else {
                            $profit = 0.1;
                            $sumQuanlityProductInMonth = $bill->sumQuanlityProductInMonth($time)[0]['sumquanlity'];
                            if (!empty($sumQuanlityProductInMonth)) {
                                array_push($sumProducts, $sumQuanlityProductInMonth);
                            } else {
                                array_push($sumProducts, '0');
                            }
                            $revenueInMonth = $bill->revenueInMonth($time)[0]['sumtotal'];
                            if (!empty($revenueInMonth)) {
                                array_push($revenues, $revenueInMonth * $profit);
                            } else {
                                array_push($revenues, '0');
                            }
                        }
                    }
                }

                ?>
            </div>
        </div>
    </div>

</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const data = {
        labels: [
            'Like',
            'Dislike'
        ],
        datasets: [{
            label: 'Lượt đánh giá',
            data: [<?php echo $like ?>, <?php echo $dislike ?>],
            backgroundColor: [
                'rgb(6, 215, 139)',
                'rgb(239, 89, 90)'
            ],
            hoverOffset: 2
        }]
    };

    const config = {
        type: 'doughnut',
        data: data
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>


<script>
    Highcharts.chart('container', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Thống kê doanh số bán hàng và lợi nhuận',
            align: 'left'
        },
        xAxis: {
            categories: [
                <?php
                foreach ($titles as $title) {
                    echo "'" . $title . "',";
                }
                ?>
            ]
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Số lượng sản phẩm',
            data: [
                <?php
                foreach ($sumProducts as $sumProduct) {
                    echo $sumProduct . ",";
                }
                ?>
            ]
        }, {
            name: 'Lợi nhuận thu được',
            data: [
                <?php
                foreach ($revenues as $revenue) {
                    echo $revenue . ",";
                }
                ?>
            ]
        }]
    });
</script>