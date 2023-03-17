<?php include_once('../part/header.php'); ?>

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
                            $j = 0;
                            foreach ($_SESSION['my-cart'] as $item) {
                                $row = $product->getProductId($item[0]);
                            ?>
                                <tr>
                                    <td><?php echo $j + 1; ?></td>
                                    <td class="thumbnail-img">
                                        <a href="">
                                            <img class="img-fluid" src="../assets/img/upload/img_product/<?php echo $row['img_prd_1'] ?>" alt="" />
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
                                $total_cart += $row['price'] * $item[1];
                                $j++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-6 col-sm-6">
                <div class="coupon-box">
                    <div class="input-group input-group-sm">
                        <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                        <div class="input-group-append">
                            <button class="btn btn-theme" type="button">Apply Coupon</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="update-box">
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
                    <!-- <div class="d-flex">
                        <h4>Discount</h4>
                        <div class="ml-auto font-weight-bold"> $ 40 </div>
                    </div> -->
                    <hr class="my-1">
                    <?php $coupondiscount = 0.2; //đặt tạm 
                    ?>
                    <div class="d-flex">
                        <h4>Coupon Discount</h4>
                        <div class="ml-auto font-weight-bold"> <?php echo number_format($total_cart * $coupondiscount, 0, '', ',') ?> VNĐ</div>
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
                        <div class="ml-auto h5"> <?php echo number_format($total_cart * (1.1 - $coupondiscount), 0, '', ',') ?> VNĐ</div>
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