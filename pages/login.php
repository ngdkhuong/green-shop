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
                    <form action="#">
                        <div class="input__item">
                            <input type="text" placeholder="Email address">
                            <span class="icon_mail"></span>
                        </div>
                        <div class="input__item">
                            <input type="text" placeholder="Password">
                            <span class="icon_lock"></span>
                        </div>
                        <button type="submit" class="btn hvr-hover text-white">Login Now</button>
                    </form>
                    <a href="" class="forget_pass">Forgot Your Password?</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login__register">
                    <h1>Dont’t Have An Account?</h1>
                    <a href="" class="btn hvr-hover text-white">Register Now</a>
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