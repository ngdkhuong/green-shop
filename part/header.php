<?php session_start(); ?>
<?php include_once('../lib/db.php'); ?>
<?php include_once('../lib/function.php'); ?>
<?php include_once('../lib/category.class.php'); ?>
<?php include_once('../lib/administrator.class.php'); ?>
<?php include_once('../lib/role.class.php'); ?>
<?php include_once('../lib/product.class.php'); ?>
<?php
$category = new Category;
$administrator = new Administrator;
$product = new Product;
?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Green Shop - Nông sản tươi sạch</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="../assets/images/apple-touch-icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/elegant-icons.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                            <option>¥ JPY</option>
                            <option>$ USD</option>
                            <option>€ EUR</option>
                        </select>
                    </div>
                    <div class="right-phone-box">
                        <p>Call US :- <a href=""> +11 900 800 100</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="my-account.php"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <li><a href=""><i class="fas fa-location-arrow"></i> Our location</a></li>
                            <li><a href="contact-us.php"><i class="fas fa-headset"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="login-box">
                        <select class="selectpicker show-tick form-control" onchange="location = this.options[this.selectedIndex].value;" data-title="Login" data-placeholder="Sign In">
                            <option value="signup.php">Register Here</option>
                            <option value="login.php">Sign in</option>
                        </select>
                    </div>

                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="../assets/images/logo.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="dropdown">
                            <a href="shop.php" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">SHOP</a>
                            <ul class="dropdown-menu">
                                <?php
                                $rows = $administrator->getAllBrands();
                                foreach ($rows as $row) { ?>
                                    <li><a href="store.php?id_brand=<?php echo $row['id_admin'] ?>"><?php echo $row['name_brand'] ?></a></li>
                                <?php }
                                ?>
                            </ul>

                        </li>
                        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <?php
                if (!isset($_SESSION['sort-view'])) {
                    $_SESSION['sort-view'] = 0;
                }
                if (isset($_POST['sort-view'])) {
                    $_SESSION['sort-view'] = $_POST['sort-view'];
                }
                $sort = $_SESSION['sort-view'];

                if (!isset($_SESSION['my-cart']) || isset($_POST['delete-cart'])) {
                    $_SESSION['my-cart'] = [];
                }

                $flag = 0;
                $i = 0;
                foreach ($_SESSION['my-cart'] as $item) {
                    if (isset($_POST['id_prd'])) {
                        if ($_POST['id_prd'] == $item[0]) {
                            $flag = 1;
                            break;
                        }
                        $i++;
                    }
                }
                $soluong = isset($_POST['soluong']) ? $_POST['soluong'] : 1;
                if (isset($_POST['id_prd']) && $flag == 0) {
                    $item = [$_POST['id_prd'], $soluong];
                    array_push($_SESSION['my-cart'], $item);
                } else if (isset($_POST['id_prd']) && $flag == 1) {
                    $_SESSION['my-cart'][$i][1] += $soluong;
                }

                if (isset($_POST['id_delete'])) {
                    array_splice($_SESSION['my-cart'], $_POST['id_delete'], 1);
                }

                if (isset($_POST['id_plus'])) {
                    $index = $_POST['id_plus'];
                    if ($_SESSION['my-cart'][$index][1] == $product->getProductId($_SESSION['my-cart'][$index][0])['quanlity']) { ?>
                        <script>
                            alert('Sản phẩm vượt quá tồn kho, không thể đặt thêm');
                        </script>
                <?php } else {
                        $_SESSION['my-cart'][$index][1] += 1;
                    }
                }

                if (isset($_POST['id_minus'])) {
                    $index = $_POST['id_minus'];
                    if ($_SESSION['my-cart'][$index][1] > 1) {
                        $_SESSION['my-cart'][$index][1] -= 1;
                    } elseif ($_SESSION['my-cart'][$index][1] == 1) {
                        $_SESSION['my-cart'][$index][1] = 1;
                    }
                }
                ?>
                <!-- Start Atribute Navigation -->

                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href=""><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
                            <a href="">
                                <i class="fa fa-shopping-bag"></i>
                                <span class="badge"><?php echo count($_SESSION['my-cart']); ?></span>
                                <p>My Cart</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>


            <!-- Start Side Menu -->
            <div class="side">
                <a href="" class="close-side"><i class="fa fa-times"></i></a>
                <li class="cart-box">
                    <ul class="cart-list">
                        <?php
                        $total_cart = 0;
                        $j = 0;
                        foreach ($_SESSION['my-cart'] as $item) {
                            $row = $product->getProductId($item[0]);
                        ?>
                            <li>
                                <span class="float-right" style="margin-top: 15px;">
                                    <form action="" method="post">
                                        <input hidden type="text" name="id_delete" value="<?php echo $j ?>">
                                        <button type="submit" class="btn" type="button"><i class="fa fa-times"></i></button>
                                    </form>
                                </span>
                                <a href="shop-detail.php?id_prd=<?php echo $row['id_prd'] ?>" class="photo"><img src="../assets/img/upload/img_product/<?php echo $row['img_prd_1'] ?>" class="cart-thumb" alt="" /></a>
                                <h6 style="display: block;"><a href="shop-detail.php?id_prd=<?php echo $row['id_prd'] ?>"><?php echo $row['name_prd'] ?></a></h6>
                                <p><?php echo $item[1]; ?>x - <span class="price"><?php echo number_format($row['price'], 0, '', ',') ?> VNĐ</span></p>
                            </li>
                        <?php
                            $total_cart += $row['price'] * $item[1];
                            $j++;
                        } ?>
                        <li class="total">
                            <p class="mb-2"><strong>Total</strong>: <?php echo number_format($total_cart, 0, '', ',') ?> VNĐ</p>
                            <a href="cart.php" class="btn btn-default hvr-hover btn-cart">VIEW CART</a>
                        </li>

                    </ul>
                </li>
            </div>
            <!-- End Side Menu -->
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <form action="shop.php" method="get">
                <div class="input-group">
                    <button style="cursor: pointer;" class="input-group-addon"><i class="fa fa-search"></i></button>
                    <input name="search" type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </form>
        </div>
    </div>
    <!-- End Top Search -->