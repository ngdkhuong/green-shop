<?php include_once('../part/header.php'); ?>

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Checkout</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Shop</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <?php if (!isset($_SESSION['login_user'])) { ?>
            <div class="row new-account-login">
                <?php
                if (isset($_POST['login'])) {
                    $numrows = -1;
                    $mk = isset($_POST["mk"]) ? $_POST["mk"] : "";
                    $username = isset($_POST["username"]) ? $_POST["username"] : "";
                    $username = htmlspecialchars(addslashes(trim($username)));
                    $mk = htmlspecialchars(addslashes(trim($mk)));
                    $mk = md5($mk);
                    $numrows = $user->checkLoginUser($username, $mk);
                    $row = $user->getLoginUser($username, $mk);
                }

                if (isset($_POST["username"]) && isset($_POST['login'])) {
                    if ($numrows == 1) {
                        $_SESSION['login_user']['id_user'] = $row['id_user'];
                        $_SESSION['login_user']['username'] = $row['username'];
                        $_SESSION['alert'] = "Đăng nhập thành công";
                    } else {
                        $_SESSION['alert'] = "Đăng nhập thất bại";
                    }
                }
                ?>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Account Login</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Click here to Login</a></h5>
                    <form class="mt-3 collapse review-form-box" id="formLogin" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="InputEmail" class="mb-0">Email Address</label>
                                <input name="username" type="email" class="form-control" id="InputEmail" placeholder="Enter Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="InputPassword" class="mb-0">Password</label>
                                <input name="mk" type="password" class="form-control" id="InputPassword" placeholder="Password">
                            </div>
                        </div>
                        <button name="login" type="submit" class="btn hvr-hover">Login</button>
                    </form>
                </div>
                <?php
                if (isset($_POST['register'])) {
                    $email = isset($_POST['email']) ? $_POST['email'] : "";
                    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
                    $mk = isset($_POST['mk']) ? $_POST['mk'] : "";
                    $conf_mk = isset($_POST['conf_mk']) ? $_POST['conf_mk'] : "";
                    $err = [];
                    $countEmail = $user->checkEmailUser($email);
                    $countPhone = $user->checkPhoneUser($phone);
                    if (isset($_POST['email'])) {
                        if ($countEmail > 0) {
                            array_push($err, 'Địa chỉ email đã tồn tại');
                        }
                        if ($countPhone > 0) {
                            array_push($err, 'Số điện thoại đã tồn tại');
                        }
                        if ($email == "") {
                            array_push($err, 'Vui lòng nhập địa chỉ email');
                        }
                        if ($phone == "") {
                            array_push($err, 'Vui lòng nhập số điện thoại');
                        }
                        if ($mk == "") {
                            array_push($err, 'Vui lòng nhập mật khẩu');
                        }
                        if ($conf_mk == "") {
                            array_push($err, 'Vui lòng nhập xác nhận mật khẩu');
                        } else {
                            if ($mk != $conf_mk) {
                                array_push($err, 'Xác nhận mật khẩu chưa chính xác');
                            }
                        }
                    }
                    if (isset($_POST['email']) && count($err) == 0 && $countEmail == 0 && $countPhone == 0) {
                        $email = htmlspecialchars(addslashes(trim($email)));
                        $phone = htmlspecialchars(addslashes(trim($phone)));
                        $username = $email;
                        $mk = md5(htmlspecialchars(addslashes(trim($mk))));
                        $user->insertUser($username, $mk, $email, $phone);
                        $_SESSION['alert'] = "Đăng ký thành công";
                        $email = "";
                        $phone = "";
                    } else {
                        $_SESSION['alert'] = "Đăng ký thất bại";
                    }
                }
                ?>
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="title-left">
                        <h3>Create New Account</h3>
                    </div>
                    <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Click here to Register</a></h5>
                    <form class="mt-3 collapse review-form-box" id="formRegister" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="mb-0">Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Email" value="<?php echo isset($email) ? $email : ""; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mb-0">Phone</label>
                                <input name="phone" type="text" class="form-control" placeholder="Phone" value="<?php echo isset($phone) ? $phone : ""; ?>" pattern="[0-9]{10}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mb-0">Password</label>
                                <input name="mk" type="password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mb-0">Confirm password</label>
                                <input name="conf_mk" type="password" class="form-control" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên">
                            </div>
                        </div>
                        <?php if (isset($err) && count($err) > 0 && isset($_POST['register'])) { ?>
                            <ul class="alert alert-danger">
                                <?php
                                foreach ($err as $value) {
                                ?>
                                    <li><?php echo $value ?></li>
                                <?php } ?>
                            </ul>
                        <?php } ?>
                        <button name="register" type="submit" class="btn hvr-hover">Register</button>
                    </form>
                </div>
            </div>
        <?php } ?>
        <?php
        $id_coupon = 0;
        if(!isset($_SESSION['bill_checkout'])){
            $_SESSION['bill_checkout']=[];
        }
        if ((isset($_POST['checkout-bill']) && isset($_SESSION['login_user']))||(isset($_POST['redirect']) && isset($_SESSION['login_user']))) {
            $row = $user->getUserId($_SESSION['login_user']['id_user']);
            if ($row['fullname'] != "" && $row['phone'] != "" && $row['email'] != "" && $row['address'] != "") {
                if ($_SESSION['my-cart'] != []) {
                    foreach ($shopcart as $item1) {
                        $id_bill = "HD" . randMHD();
                        array_push($_SESSION['bill_checkout'], $id_bill);
                        $total = 0;
                        $coupondiscount = 0;
                        foreach ($_SESSION['my-cart'] as $item) {
                            $row1 = $product->getProductId($item[0]);
                            if ($item[2] == $item1) {
                                $total += $row1['price'] * $item[1];
                            }
                        }
                        foreach ($_SESSION['coupon'] as $itemcoupon) {
                            if ($itemcoupon[2] == $item1) {
                                $id_coupon = $itemcoupon[0];
                                $coupondiscount = $itemcoupon[1];
                            }
                        }
                        $id_user = $_SESSION['login_user']['id_user'];
                        $fullname = $user->getUserId($id_user)['fullname'];
                        $address = $user->getUserId($id_user)['address'];
                        $email = $user->getUserId($id_user)['email'];
                        $phone = $user->getUserId($id_user)['phone'];
                        $id_brand = $item1;
                        if(isset($_POST['redirect'])){
                            $payment = 1;
                        }else{
                            $payment = 0;
                        }
                        $name_brand = $administrator->getAdminId($item1)['name_brand'];
                        $total = $total * (1.1 - $coupondiscount);
                        $bill->insertBill($id_bill, $total, $id_user, $fullname, $address, $email, $phone, $id_coupon, $coupondiscount, $payment, $id_brand, $name_brand);
                        foreach ($_SESSION['my-cart'] as $item) {
                            if ($item[2] == $item1) {
                                $row = $product->getProductId($item[0]);
                                $name_prd = $row['name_prd'];
                                $price = $row['price'];
                                $bill->insertBillDetail($id_bill, $item[0], $item[1], $row['name_prd'], $row['price']);
                                $total += $row['price'] * $item[1];
                            }
                        }
                    }
                    include_once('../vnpay_php/vnpay_create_payment.php');
                    $_SESSION['my-cart'] = [];
                    $_SESSION['coupon'] = [];
                    $_SESSION['alert'] = "Đặt hàng thành công";
                    echo "<meta http-equiv='refresh' content='0;url=checkout.php'>";
                    exit;
                } else {
                    $_SESSION['alert'] = "Giỏ hàng của bạn hiện không có sản phẩm nào";
                }
            } else {
                $_SESSION['alert'] = "Vui lòng cập nhập thông tin trước khi đặt hàng";
            }
        }

        if(!isset($_SESSION['login_user'])){
            if(isset($_POST['checkout-bill'])||isset($_POST['redirect'])){
                $_SESSION['alert'] = "Vui lòng đăng nhập trước khi đặt hàng";
            }
        }
        ?>
        <div class="row">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="checkout-address">
                    <div class="title-left">
                        <h3>Billing address</h3>
                    </div>
                    <div class="needs-validation">
                        <?php if (isset($_SESSION['login_user'])) {
                            $row = $user->getUserId($_SESSION['login_user']['id_user']);
                        ?>
                            <div class="mb-3">
                                <label for="username">Họ và tên</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $row['fullname'] == "" ? "Vui lòng cập nhập trước khi thanh toán" : $row['fullname'] ?>" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username">Sđt</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $row['phone'] == "" ? "Vui lòng cập nhập trước khi thanh toán" : $row['phone'] ?>" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username">Email</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $row['email'] == "" ? "Vui lòng cập nhập trước khi thanh toán" : $row['email'] ?>" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username">Địa chỉ</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $row['address'] == "" ? "Vui lòng cập nhập trước khi thanh toán" : $row['address'] ?>" readonly>
                                </div>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="username">Stk</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php //echo $row['stk'] == "" ? "Vui lòng cập nhập trước khi thanh toán" : $row['stk'] 
                                                                                    ?>" readonly>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username">Ngân hàng</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php //echo $row['bank'] == "" ? "Vui lòng cập nhập trước khi thanh toán" : $row['bank'] 
                                                                                    ?>" readonly>
                                </div>
                            </div> -->
                            <hr class="mb-3">
                            <div class="col-12 d-flex shopping-box"> <a href="my-account.php" class="ml-auto btn hvr-hover">Đến cập nhập thông tin</a> </div>
                        <?php } else { ?>
                            <div class="mb-3">
                                <label for="username">Vui lòng đăng nhập</label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div>

                </div>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="odr-box">
                            <div class="title-left">
                                <h3>Shopping cart</h3>
                            </div>
                            <div class="rounded p-2 bg-light">
                                <?php
                                $total_cart = 0;
                                $discount_cart = 0;
                                foreach ($shopcart as $item1) { ?>
                                    <div>
                                        <h2><b><?php echo $administrator->getAdminId($item1)['name_brand'] ?></b></h2>
                                    </div>
                                    <?php
                                    $j = 0;
                                    $total_shop = 0;
                                    foreach ($_SESSION['my-cart'] as $item) {
                                        $row = $product->getProductId($item[0]);
                                        if ($item[2] == $item1) { ?>
                                            <div class="media mb-2 border-bottom">
                                                <div class="media-body"> <a href="shop-detail.php?id_prd=<?php echo $row['id_prd'] ?>"><?php echo $row['name_prd'] ?></a>
                                                    <div class="small text-muted">Price: <?php echo number_format($row['price'], 0, '', ',') ?> VNĐ<span class="mx-2">|</span> Qty: <?php echo $item[1] ?> <span class="mx-2">|</span> Subtotal: <?php echo number_format($row['price'] * $item[1], 0, '', ',') ?> VNĐ</div>
                                                </div>
                                            </div>
                                    <?php
                                            $total_shop += $row['price'] * $item[1];
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
                                    <div class="text-right"><b><i><?php echo number_format($total_shop, 0, '', ',') ?> VNĐ</i></b></div>
                                    <div class="text-right"><b><i>- <?php echo number_format($discount_shop, 0, '', ',') ?> VNĐ</i></b></div>
                                    <div class="text-right mb-3"><b><i><?php echo number_format($total_shop - $discount_shop, 0, '', ',') ?> VNĐ</i></b></div>
                                <?php
                                    $total_cart += $total_shop;
                                    $discount_cart += $discount_shop;
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-12">
                        <div class="order-box">
                            <div class="title-left">
                                <h3>Your order</h3>
                            </div>
                            <div class="d-flex">
                                <div class="font-weight-bold">Product</div>
                                <div class="ml-auto font-weight-bold">Total</div>
                            </div>
                            <div class="d-flex">
                                <h4>Sub Total</h4>
                                <div class="ml-auto font-weight-bold"> <?php echo number_format($total_cart, 0, '', ',') ?> VNĐ </div>
                            </div>
                            <hr class="my-1">
                            <div class="d-flex">
                                <h4>Coupon Discount</h4>
                                <div class="ml-auto font-weight-bold">- <?php echo number_format($discount_cart, 0, '', ',') ?> VNĐ</div>
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
                    <form class="col-6 d-flex shopping-box" action="" id="create_form" method="post">
                        <input hidden class="form-control" id="order_id" name="order_id" type="text" value="<?php echo "HD" . randMHD();?>" />
                        <input hidden class="form-control" name="total" type="number" value="<?php echo $total_cart - $discount_cart + $total_cart * 0.1?>" />
                        <textarea hidden class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Thanh toán đơn hàng GreenShop</textarea>
                        <select hidden name="bank_code" id="bank_code" class="form-control">
                            <option value="">Không chọn</option>
                            <option value="NCB"> Ngan hang NCB</option>
                            <option value="AGRIBANK"> Ngan hang Agribank</option>
                            <option value="SCB"> Ngan hang SCB</option>
                            <option value="SACOMBANK">Ngan hang SacomBank</option>
                            <option value="EXIMBANK"> Ngan hang EximBank</option>
                            <option value="MSBANK"> Ngan hang MSBANK</option>
                            <option value="NAMABANK"> Ngan hang NamABank</option>
                            <option value="VNMART"> Vi dien tu VnMart</option>
                            <option value="VIETINBANK">Ngan hang Vietinbank</option>
                            <option value="VIETCOMBANK"> Ngan hang VCB</option>
                            <option value="HDBANK">Ngan hang HDBank</option>
                            <option value="DONGABANK"> Ngan hang Dong A</option>
                            <option value="TPBANK"> Ngân hàng TPBank</option>
                            <option value="OJB"> Ngân hàng OceanBank</option>
                            <option value="BIDV"> Ngân hàng BIDV</option>
                            <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                            <option value="VPBANK"> Ngan hang VPBank</option>
                            <option value="MBBANK"> Ngan hang MBBank</option>
                            <option value="ACB"> Ngan hang ACB</option>
                            <option value="OCB"> Ngan hang OCB</option>
                            <option value="IVB"> Ngan hang IVB</option>
                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                        </select>
                        <div id="error">
                        </div>
                        <button type="submit" name="redirect" id="redirect" class="btn btn-default" style="border-radius: 0;">Thanh toán Redirect</button>
                    </form>
                    <form class="col-6 d-flex shopping-box" method="post">
                        <button name="checkout-bill" class="ml-auto btn hvr-hover text-white">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->
<?php include_once('../part/footer.php'); ?>