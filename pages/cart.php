<?php include_once('../part/header.php'); ?>
<?php
if (isset($_POST['add_coupon']) && isset($_POST['code_coupon']) && $_POST['code_coupon'] != "") {
    //Ktra đăng nhập mới cho sử dụng coupon
    if (isset($_SESSION['login_user'])) {
        $code_coupon = $_POST['code_coupon'];
        //Ktra xem mã coupon này tồn tại hay không
        if ($coupon->getCoupon($code_coupon)) {
            $row = $coupon->getCoupon($code_coupon);

            //Ktra xem user đã sử dụng mã coupon này chưa
            if ($coupon->checkCouponIdUser($row['id_coupon'], $_SESSION['login_user']['id_user']) == 0) {
                $now = DateTime::createFromFormat('U.u', microtime(true));
                $result = $now->format("Y-m-d");
                $result = (int) strtotime($result);
                $time_start = (int) strtotime($row['time_start']);
                $time_end = (int) strtotime($row['time_end']);

                //Ktra xem coupon còn hạn sử dụng hay không
                if ($result >= $time_start && $result <= $time_end) {
                    $flag = 0;
                    foreach ($_SESSION['coupon'] as $itemcoupon) {
                        if ($itemcoupon[0] == $row['id_coupon']) {
                            $_SESSION['alert'] = "Mã khuyến " . $row['code_coupon'] . " chỉ áp dụng giảm 1 lần";
                            $flag = 1;
                            break;
                        } elseif ($itemcoupon[2] == $row['id_admin']) {
                            $_SESSION['alert'] = "Đã áp dụng 1 mã khuyến mãi cho cửa hàng " . $administrator->getAdminId($row['id_admin'])['name_brand'];
                            $flag = 1;
                            break;
                        }
                    }
                    if ($flag == 0) {
                        $itemcoupon = [$row['id_coupon'], $row['discount'], $row['id_admin']];
                        array_push($_SESSION['coupon'], $itemcoupon);
                        $_SESSION['alert'] = "Áp mã khuyến mãi thành công";
                    }
                } else {
                    $_SESSION['alert'] = "Mã khuyến mãi hết hạn";
                }
            } else {
                $_SESSION['alert'] = "Tài khoản đã sử dụng mã khuyến mãi này rồi";
            }
        } else {
            $_SESSION['alert'] = "Mã khuyến mãi không tồn tại";
        }
    } else {
        $_SESSION['alert'] = "Vui lòng đăng nhập trước khi nhập mã khuyến mãi";
    }
}
?>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cart</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Shop</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_cart = 0;
                            $discount_cart = 0;
                            foreach ($shopcart as $item1) { ?>
                                <tr>
                                    <td style="border-top: none;" colspan="7">
                                        <h1><b><?php echo $administrator->getAdminId($item1)['name_brand'] ?></b></h1>
                                    </td>
                                </tr>
                                <?php
                                $j = 0;
                                $i = 1;
                                $total_shop = 0;
                                foreach ($_SESSION['my-cart'] as $item) {
                                    $row = $product->getProductId($item[0]);
                                    if ($item[2] == $item1) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td class="thumbnail-img">
                                                <a href="">
                                                    <img class="img-fluid" src="../assets/img/upload/img_product/<?php echo $row['img_prd_1'] ?>" alt="" />
                                                </a>
                                            </td>
                                            <td class="name-pr">
                                                <a href="shop-detail.php?id_prd=<?php echo $row['id_prd'] ?>">
                                                    <?php echo $row['name_prd'] ?>
                                                </a>
                                            </td>
                                            <td class="price-pr">
                                                <p><?php echo number_format($row['price'], 0, '', ',') ?> VNĐ</p>
                                            </td>
                                            <!-- <td class="quantity-box"><input type="number" size="4" value="1" min="0" step="1" class="c-input-text qty text"></td> -->
                                            <td class="quantity-box">
                                                <form style="display: inline-block;" action="" method="post">
                                                    <input hidden type="text" name="id_minus" value="<?php echo $j ?>">
                                                    <button type="submit" class="btn" style="padding: 3px;"><i class="far fa-minus-square"></i></button>
                                                </form>
                                                <span style="padding: 1px;"><?php echo $item[1] ?></span>
                                                <form style="display: inline-block;" action="" method="post">
                                                    <input hidden type="text" name="id_plus" value="<?php echo $j ?>">
                                                    <button type="submit" class="btn" style="padding: 3px;"><i class="far fa-plus-square"></i></button>
                                                </form>
                                            </td>
                                            <td class="total-pr">
                                                <p><?php echo number_format($row['price'] * $item[1], 0, '', ',') ?> VNĐ</p>
                                            </td>
                                            <td class="remove-pr">
                                                <form action="" method="post">
                                                    <input hidden type="text" name="id_delete" value="<?php echo $j ?>">
                                                    <button type="submit" class="btn" type="button"><i class="fa fa-times"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                        $total_shop += $row['price'] * $item[1];
                                        $i++;
                                    }
                                    $j++;
                                }

                                $coupondiscount = 0;
                                foreach ($_SESSION['coupon'] as $itemcoupon) {
                                    if ($itemcoupon[2] == $item1) {
                                        $coupondiscount = $itemcoupon[1];
                                        break;
                                    }
                                }
                                $discount_shop = $total_shop * $coupondiscount;

                                ?>
                                <tr>
                                    <td colspan="7" class="text-right">
                                        <h4 class="p-0"><b><i><?php echo number_format($total_shop, 0, '', ',') ?> VNĐ</i></b></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" style="border-top: none;" class="text-right">
                                        <h4 class="p-0"><b><i>-<?php echo number_format($discount_shop, 0, '', ',') ?> VNĐ</i></b></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-right">
                                        <h2 class="p-0"><b><i><?php echo number_format($total_shop - $discount_shop, 0, '', ',') ?> VNĐ</i></b></h2>
                                    </td>
                                </tr>
                            <?php
                                $total_cart += $total_shop;
                                $discount_cart += $discount_shop;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-6 col-sm-6">
                <div class="coupon-box">
                    <form class="input-group input-group-sm" method="post">
                        <input name="code_coupon" class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                        <div class="input-group-append">
                            <button name="add_coupon" class="btn btn-theme" type="submit">Apply Coupon</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="update-box">
                    <form action="" method="post">
                        <input value="Delete Coupon" type="submit" name="delete-coupon">
                    </form>
                    <form action="" method="post">
                        <input value="Delete Cart" type="submit" name="delete-cart">
                    </form>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Order summary</h3>
                    <div class="d-flex">
                        <h4>Sub Total</h4>
                        <div class="ml-auto font-weight-bold"> <?php echo number_format($total_cart, 0, '', ',') ?> VNĐ </div>
                    </div>
                    <hr class="my-1">
                    <div class="d-flex">
                        <h4>Coupon Discount</h4>
                        <div class="ml-auto font-weight-bold"> <?php echo number_format($discount_cart, 0, '', ',') ?> VNĐ</div>
                    </div>
                    <div class="d-flex">
                        <h4>Tax</h4>
                        <div class="ml-auto font-weight-bold"> <?php echo number_format($total_cart * 0.1, 0, '', ',') ?> VNĐ</div>
                    </div>
                    <div class="d-flex">
                        <h4>Shipping Cost</h4>
                        <div class="ml-auto font-weight-bold"> Free </div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Grand Total</h5>
                        <div class="ml-auto h5"> <?php echo number_format($total_cart - $discount_cart + $total_cart * 0.1, 0, '', ',') ?> VNĐ</div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="col-12 d-flex shopping-box"><a href="checkout.php" class="ml-auto btn hvr-hover">Checkout</a> </div>
        </div>

    </div>
</div>
<!-- End Cart -->
<?php include_once('../part/footer.php'); ?>