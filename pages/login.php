<?php include_once('../part/header.php'); ?>

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>LOGIN</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">LOGIN</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Login Page  -->
<section class="login spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login__form">
                    <h1>Login</h1>
                    <form action="" method="post">
                        <?php
                        $numrows = -1;
                        $mk = isset($_POST["mk"]) ? $_POST["mk"] : "";
                        $username = isset($_POST["username"]) ? $_POST["username"] : "";
                        $username = htmlspecialchars(addslashes(trim($username)));
                        $mk = htmlspecialchars(addslashes(trim($mk)));
                        $mk = md5($mk);
                        $numrows = $user->checkLoginUser($username, $mk);
                        $row = $user->getLoginUser($username, $mk);
                        ?>
                        <div class="input__item">
                            <input name="username" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $username ?>" placeholder="Email address">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input name="mk" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên" placeholder="Password">
                            <span class="icon_lock"></span>
                        </div>
                        <?php if (isset($_POST["username"])) {
                            if ($numrows == 1) {
                                $_SESSION['login_user']['id_user'] = $row['id_user'];
                                $_SESSION['login_user']['username'] = $row['username'];
                                echo "<meta http-equiv='refresh' content='0;url=my-account.php'>";
                                exit;
                            } else { ?>
                                <p style="color: red;">Sai mật khẩu hoặc tên đăng nhập</p>
                        <?php }
                        } ?>
                        <button type="submit" class="btn hvr-hover text-white">Login Now</button>
                    </form>
                    <a href="" class="forget_pass">Forgot Your Password?</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__register">
                    <h1>Dont’t Have An Account?</h1>
                    <a href="signup.php" class="btn hvr-hover text-white">Register Now</a>
                </div>
            </div>
        </div>

        <div class="login__social">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <span>or</span>
                        <ul>
                            <li><a href="" class="facebook"><i class="fab fa-facebook"></i> Sign in With
                                    Facebook</a></li>
                            <li><a href="" class="google"><i class="fab fa-google"></i> Sign in With Google</a></li>
                            <li><a href="" class="twitter"><i class="fab fa-twitter"></i> Sign in With Twitter</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Login Page -->

<?php include_once('../part/footer.php'); ?>