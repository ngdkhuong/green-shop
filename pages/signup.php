<?php include_once('../part/header.php'); ?>

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>SIGNUP</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">SIGNUP</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Signup Page  -->
<section class="signup spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h1>Sign Up</h1>
                    <?php
                    $email = isset($_POST['email']) ? $_POST['email'] : "";
                    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
                    $mk = isset($_POST['mk']) ? $_POST['mk'] : "";
                    $conf_mk = isset($_POST['conf_mk']) ? $_POST['conf_mk'] : "";
                    $err = [];
                    $countEmail = $user->checkEmailUser($email);
                    $countPhone = $user->checkPhoneUser($phone);
                    if (isset($_POST['email'])) {
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
                        if ($countEmail >0) {
                            array_push($err, 'Địa chỉ email đã tồn tại');
                        }
                        if ($countPhone >0) {
                            array_push($err, 'Số điện thoại đã tồn tại');
                        }
                    }

                    if (isset($_POST['email']) && count($err) == 0 && $countEmail == 0 && $countPhone == 0) {
                        $email = htmlspecialchars(addslashes(trim($email)));
                        $phone = htmlspecialchars(addslashes(trim($phone)));
                        $username = $email;
                        $mk = md5(htmlspecialchars(addslashes(trim($mk))));
                        $user->insertUser($username, $mk, $email, $phone);
                        $_SESSION['alert'] = "Đăng ký thành công";
                        $email= "";
                        $phone= "";
                    } ?>
                    <form action="" method="post">
                        <div class="input__item">
                            <input name="email" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email address" value="<?php echo $email ?>">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input name="phone" type="text" pattern="[0-9]{10}" maxlength="12" placeholder="Your phone" value="<?php echo $phone ?>">
                            <span class="icon_phone"></span>
                        </div>
                        <div class="input__item">
                            <input name="mk" type="password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" placeholder="Password">
                            <span class="icon_lock"></span>
                        </div>
                        <div class="input__item">
                            <input name="conf_mk" type="password" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" placeholder="Confirm Password">
                            <span class="icon_lock"></span>
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
                        <button type="submit" class="btn hvr-hover text-white">Sign Up Now</button>
                    </form>
                    <h5>Already have an account? <a href="login.php">Log In!</a></h5>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__social__links">
                    <h3>Login With:</h3>
                    <ul>
                        <li><a href="" class="facebook"><i class="fab fa-facebook"></i> Sign in With Facebook</a>
                        </li>
                        <li><a href="" class="google"><i class="fab fa-google"></i> Sign in With Google</a></li>
                        <li><a href="" class="twitter"><i class="fab fa-twitter"></i> Sign in With Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Signup Page -->

<?php include_once('../part/footer.php'); ?>
