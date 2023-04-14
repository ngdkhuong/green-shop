<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="card-block">
                        <h4 class="m-b-10">Hóa đơn</h4>
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
                    <?php if ($_GET['control'] == 'bill' && !isset($_GET['id_hd'])) { ?>
                        <!-- Hover table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Danh sách hóa đơn</h4>
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
                                                <th>Mã Hóa Đơn</th>
                                                <th>Trạng thái</th>
                                                <th>Thời gian</th>
                                                <th>Tên người mua</th>
                                                <th>Sđt</th>
                                                <th>Email</th>
                                                <?php if ($_SESSION['login_admin']['id_role'] == 3) { ?>
                                                    <th>Xử lý đơn hàng</th>
                                                <?php } ?>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($_SESSION['login_admin']['id_role'] == 3) {
                                                $rows = $bill->getBillBrand($_SESSION['login_admin']['id_admin']);
                                            } else {
                                                $rows = $bill->getAllBill();
                                            }

                                            foreach ($rows as $row) { ?>
                                                <tr>
                                                    <td><a href="index.php?control=bill&id_hd=<?php echo $row['id_bill'] ?>"><?php echo $row['id_bill'] ?></a></td>
                                                    <td>
                                                        <?php if ($row['status'] == 2) { ?>
                                                            <span class="label label-primary"><?php echo $bill->getStatus($row['status'])['name_status'] ?></span>
                                                        <?php } elseif ($row['status'] == 3) { ?>
                                                            <span class="label label-danger"><?php echo $bill->getStatus($row['status'])['name_status'] ?></span>
                                                        <?php } elseif ($row['status'] == 4) { ?>
                                                            <span class="label label-warning"><?php echo $bill->getStatus($row['status'])['name_status'] ?></span>
                                                        <?php } elseif ($row['status'] == 5) { ?>
                                                            <span class="label label-success"><?php echo $bill->getStatus($row['status'])['name_status'] ?></span>
                                                        <?php } elseif ($row['status'] == 6) { ?>
                                                            <span class="label label-danger"><?php echo $bill->getStatus($row['status'])['name_status'] ?></span>
                                                        <?php } else { ?>
                                                            <span class="label label-danger" style="background: grey"><?php echo $bill->getStatus($row['status'])['name_status'] ?></span>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo date("d-m-Y H:i:s", strtotime($row['time'])) ?></td>
                                                    <td><?php echo $user->getUserId($row['id_user'])['fullname'] ?></td>
                                                    <td><?php echo $user->getUserId($row['id_user'])['phone'] ?></td>
                                                    <td><?php echo $user->getUserId($row['id_user'])['email'] ?></td>

                                                    <?php if ($_SESSION['login_admin']['id_role'] == 3) { ?>
                                                        <td>
                                                            <?php
                                                            if ($row['status'] == 2) { ?>
                                                                <form style="display: inline-block;" action="" method="post">
                                                                    <input name="id_bill" type="hidden" name="" value="<?php echo $row['id_bill'] ?>">
                                                                    <button name="action_bill" class="btn btn-success">Xử lý</button>
                                                                </form>
                                                            <?php } ?>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Hover table card end -->
                    <?php } ?>
                    <?php if ($_GET['control'] == 'bill' && isset($_GET['id_hd'])) { ?>
                        <?php
                        $id_bill = $_GET['id_hd'];
                        $row1 = $bill->getBillId($id_bill);
                        ?>
                        <!-- Hover table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Chi tiết hóa đơn ID: <?php echo $id_bill ?></h4>
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
                                <div class="table-main table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Hình ảnh sản phẩm</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rows = $bill->getBillDetailId($id_bill);
                                            $total_bill = 0;
                                            $i = 1;
                                            foreach ($rows as $row) { ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td class="thumbnail-img">
                                                        <a href="">
                                                            <img width="100px" class="img-fluid" src="../../assets/img/upload/img_product/<?php echo $product->getProductId($row['id_prd'])['img_prd_1'] ?>" alt="" />
                                                        </a>
                                                    </td>
                                                    <td class="name-pr">
                                                        <a href="">
                                                            <?php echo $row['name_prd'] ?>
                                                        </a>
                                                    </td>
                                                    <td class="price-pr">
                                                        <p><?php echo number_format($row['price'], 0, '', ',') ?> VNĐ</p>
                                                    </td>
                                                    <td class="quantity-box"><?php echo $row['quanlity'] ?></td>
                                                    <td class="price-pr">
                                                        <p><?php echo number_format($row['price'] * $row['quanlity'], 0, '', ',') ?> VNĐ</p>
                                                    </td>
                                                </tr>
                                            <?php
                                                $i++;
                                                $total_bill += $row['price'] * $row['quanlity'];
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row col-lg-12 mb-3">
                                <div class="col-lg-8 col-sm-12">
                                    <table width="100%" class="needs-validation">
                                        <tbody>
                                            <tr>
                                                <th class="p-2 pl-5" style="width: 30%;"><label style="margin-bottom: 0px;">Tên cửa hàng:</label></th>
                                                <td class="p-2"><?php echo $row1['name_brand'] ?></td>
                                            </tr>
                                            <tr>
                                                <th class="p-2 pl-5" style="width: 30%;"><label style="margin-bottom: 0px;">Trạng thái hóa đơn: </label></th>
                                                <td class="p-2"><?php echo $bill->getStatus($row1['status'])['name_status'] ?></td>
                                            </tr>
                                            <tr>
                                                <th class="p-2 pl-5" style="width: 30%;"><label style="margin-bottom: 0px;">Hình thức thanh toán: </label></th>
                                                <td class="p-2"><?php echo $row1['payment'] == 0 ? "Thanh toán khi nhận hàng" : "Thanh toán điện tử" ?></td>
                                            </tr>
                                            <?php
                                            if ($row1['payment'] == 1) { ?>
                                                <tr>
                                                    <th class="p-2 pl-5" style="width: 30%;"><label style="margin-bottom: 0px;">Trạng thái thanh toán: </label></th>
                                                    <td class="p-2"><?php echo $row1['status_payment'] == 0 ? "Thất bại" : "Thành công" ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <th class="p-2 pl-5" style="width: 30%;"><label style="margin-bottom: 0px;">Thời gian: </label></th>
                                                <td class="p-2"><?php echo date("d-m-Y H:i:s", strtotime($row1['time'])) ?></td>
                                            </tr>
                                            <tr>
                                                <th class="p-2 pl-5" style="width: 30%;"><label style="margin-bottom: 0px;">Tên người mua hàng: </label></th>
                                                <td class="p-2"><?php echo $row1['fullname'] ?></td>
                                            </tr>
                                            <tr>
                                                <th class="p-2 pl-5" style="width: 30%;"><label style="margin-bottom: 0px;">Địa chỉ giao hàng: </label></th>
                                                <td class="p-2"><?php echo $row1['address'] ?></td>
                                            </tr>
                                            <tr>
                                                <th class="p-2 pl-5" style="width: 30%;"><label style="margin-bottom: 0px;">Sđt người nhận: </label></th>
                                                <td class="p-2"><?php echo $row1['phone'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="order-box">
                                        <h5 class="mb-3">Order summary</h5>
                                        <div class="d-flex">
                                            <h6>Sub Total</h6>
                                            <div class="ml-auto font-weight-bold"> <?php echo number_format($total_bill, 0, '', ',') ?> VNĐ </div>
                                        </div>
                                        <hr class="my-1">
                                        <?php
                                        $coupondiscount = $row1['coupondiscount'];
                                        ?>
                                        <div class="d-flex">
                                            <h6>Coupon Discount</h6>
                                            <div class="ml-auto font-weight-bold">- <?php echo number_format($total_bill * $coupondiscount, 0, '', ',') ?> VNĐ</div>
                                        </div>
                                        <div class="d-flex">
                                            <h6>Tax</h6>
                                            <div class="ml-auto font-weight-bold"> <?php echo number_format($total_bill * 0.1, 0, '', ',') ?> VNĐ</div>
                                        </div>
                                        <div class="d-flex">
                                            <h6>Shipping Cost</h6>
                                            <div class="ml-auto font-weight-bold"> Free </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex gr-total">
                                            <h6>Grand Total</h6>
                                            <div class="ml-auto h6">
                                                <h6> <?php echo number_format($total_bill * (1.1 - $coupondiscount), 0, '', ',') ?> VNĐ</h6>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Hover table card end -->
                    <?php } ?>
                </div>
                <!-- Page-body end -->
            </div>
        </div>
    </div>
</div>