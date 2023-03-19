<?php session_start(); ?>

<?php include_once('../lib/db.php'); ?>
<?php include_once('../lib/category.class.php'); ?>
<?php include_once('../lib/administrator.class.php'); ?>
<?php include_once('../lib/role.class.php'); ?>
<?php include_once('../lib/product.class.php'); ?>
<?php
$administrator = new Administrator;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Green Shop - Login Admin</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
    <meta name="keywords" content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes">
    <!-- Favicon icon -->
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../admin/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="../admin/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="../admin/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../admin/assets/css/style.css">
</head>

<body class="fix-menu">
    <!-- Pre-loader start -->
    <!-- <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div> -->
    <!-- Pre-loader end -->

    <section class="p-fixed d-flex text-center">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form method="post" class="md-float-material">

                            <img src="../assets/images/logo.png" alt="logo.png">
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Đăng nhập quản trị</h3>
                                    </div>
                                </div>
                                <hr />
                                <div class="input-group">
                                    <input type="text" name="username" class="form-control" placeholder="Nhập tài khoản">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" name="mk" class="form-control" placeholder="Nhập password">
                                    <span class="md-line"></span>
                                </div>
                                <?php
                                $numrows = -1;
                                if (isset($_POST["username"])) {
                                    $mk = isset($_POST["mk"]) ? $_POST["mk"] : "";
                                    $username = isset($_POST["username"]) ? $_POST["username"] : "";
                                    $username = htmlspecialchars(addslashes(trim($username)));
                                    $mk = htmlspecialchars(addslashes(trim($mk)));
                                    $mk = md5($mk);

                                    $numrows = $administrator->checkLoginAdmin($username, $mk);
                                    $row = $administrator->getLoginAdmin($username, $mk);
                                    if ($numrows == 1) {
                                        $_SESSION['login_admin']['id_admin'] = $row['id_admin'];
                                        $_SESSION['login_admin']['username'] = $row['username'];
                                        $_SESSION['login_admin']['id_role'] = $row['id_role'];
                                        echo "<meta http-equiv='refresh' content='0;url=../admin/pages/index.php'>";
                                        exit;
                                    } else { ?>
                                        <p style="color: red;">Sai mật khẩu hoặc tên đăng nhập</p>
                                    <?php }
                                }
                                ?>
                                
                                <div class="row m-t-25 text-left">
                                    <div class="col-sm-7 col-xs-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                        <a href="auth-reset-password.html" class="text-right f-w-600 text-inverse"> Forgot Your Password?</a>
                                    </div>
                                </div>

                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
                                    </div>
                                </div>


                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../admin/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../admin/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../admin/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../admin/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../admin/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="../../admin/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../../admin/assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../../admin/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="../../admin/assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../../admin/assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="../../admin/assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="../../admin/assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="../../admin/assets/js/common-pages.js"></script>
</body>

</html>