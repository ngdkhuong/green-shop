<?php session_start(); ?>
<?php include_once('../lib/db.php'); ?>
<?php include_once('../lib/function.php'); ?>
<?php include_once('../lib/category.class.php'); ?>
<?php include_once('../lib/administrator.class.php'); ?>
<?php include_once('../lib/role.class.php'); ?>
<?php include_once('../lib/product.class.php'); ?>
<<<<<<< HEAD
=======
<?php include_once('../lib/user.class.php'); ?>
<?php include_once('../lib/bill.class.php'); ?>
<?php include_once('../lib/coupon.class.php'); ?>
<?php include_once('../lib/evalution.class.php'); ?>
<?php include_once('../lib/wishlist.class.php'); ?>
<?php include_once('../lib/comment.class.php'); ?>
<?php include_once('../lib/contact.class.php'); ?>
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
<?php
$category = new Category;
$administrator = new Administrator;
$product = new Product;
$user = new User;
$bill = new Bill;
$coupon = new Coupon;
$evalution = new Evalution;
$wishlist = new Wishlist;
$comment = new Comment;
$contact = new Contact;
if (!isset($_SESSION['alert'])) {
    $_SESSION['alert'] = "";
}

// print_r($_SESSION['login_user']);
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

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="../admin/assets/css/datatable/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../admin/assets/css/datatable/jquery.dataTables.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="p-0">
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<<<<<<< HEAD
                    <div class="custom-select-box">
=======
                    <!-- <div class="custom-select-box">
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
                        <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                            <option>¥ JPY</option>
                            <option>$ USD</option>
                            <option>€ EUR</option>
                        </select>
<<<<<<< HEAD
                    </div>
=======
                    </div> -->
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
                    <div class="right-phone-box">
                        <p>Call US :- <a href=""> +11 900 800 100</a></p>
                    </div>
                    <div class="our-link">
                        <ul>
                            <li><a href="my-account.php"><i class="fa fa-user s_color"></i> My Account</a></li>
                            <?php if (isset($_SESSION['login_user'])) { ?>
                                <li><a href=""><i class="fas fa-location-arrow"></i> Welcome
                                        <?php
                                        $row = $user->getUserId($_SESSION['login_user']['id_user']);
                                        if ($row['fullname'] == "") {
                                            echo $row['username'];
                                        } else {
                                            echo $row['fullname'];
                                        }
                                        ?>
                                    </a></li>
                                <?php if (isset($_GET['logout'])) {
                                    session_unset();
                                    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
                                    exit;
                                } ?>
                                <li><a href="index.php?logout"><i class="fas fa-power-off"></i> Logout</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<<<<<<< HEAD

                    <div class="login-box">
                        <script type="text/javascript">
                            function goto_url(url) {
                                if (url != '0')
                                    window.location.assign('' + url + '');
                            }
                        </script>

                        <select name="select" onchange="goto_url(this.value);" id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">

                          
                            <option value="http://localhost/green-shop/pages/checkout.php">Register Here</option>

                            <option value="http://localhost/green-shop/pages/login.php">Sign In</option>
                        </select>
                    </div>
=======
                    <div class="login-box">
                        <select name="login-box" class="selectpicker show-tick form-control" onchange="location = this.options[this.selectedIndex].value;" data-title="Login" data-placeholder="Sign In">
                            <option value="signup.php">Register Here</option>
                            <option value="login.php">Sign in</option>
                        </select>
                    </div>

>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
                    <div class="text-slid-box">
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                                </li>
                                <!-- <li>
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
<<<<<<< HEAD
                                </li>
=======
                                </li> -->
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
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
<<<<<<< HEAD
                                <li><a href="shop.php">Sidebar Shop</a></li>
                                <li><a href="shop-detail.php">Shop Detail</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li>
                                <li><a href="my-account.php">My Account</a></li>
                                <li><a href="wishlist.php">Wishlist</a></li>
=======
                                <?php
                                $rows = $administrator->getAllBrands();
                                foreach ($rows as $row) { ?>
                                    <li><a href="store.php?id_brand=<?php echo $row['id_admin'] ?>"><?php echo $row['name_brand'] ?></a></li>
                                <?php }
                                ?>
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
                            </ul>

                        </li>
                        <li class="nav-item"><a class="nav-link" href="wishlist.php">Wishlist</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact-us.php">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                <?php
                if (!isset($_SESSION['min-price'])) {
                    $_SESSION['min-price'] = 0;
                }

                if (!isset($_SESSION['max-price'])) {
                    $_SESSION['max-price'] = 2000000;
                }

                if (isset($_POST['filter-price'])) {
                    $_SESSION['min-price'] = $_POST['min-price'];
                    $_SESSION['max-price'] = $_POST['max-price'];
                }
                ?>

                <?php
                if (!isset($_SESSION['sort-view'])) {
                    $_SESSION['sort-view'] = 0;
                }
                if (isset($_POST['sort-view'])) {
                    $_SESSION['sort-view'] = $_POST['sort-view'];
                }
                $sort = $_SESSION['sort-view'];

                if (!isset($_SESSION['coupon'])) {
                    $_SESSION['coupon'] = [];
                }

                if (!isset($_SESSION['my-cart']) || !isset($_SESSION['coupon']) || isset($_POST['delete-cart'])) {
                    $_SESSION['my-cart'] = [];
                    $_SESSION['coupon'] = [];
                }

                if (isset($_POST['delete-coupon'])) {
                    $_SESSION['coupon'] = [];
                }

                if (isset($_POST['add-to-cart'])) {
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
                        $idshop = $product->getProductId($_POST['id_prd'])['id_admin']; //3
                        $item = [$_POST['id_prd'], $soluong, $idshop];
                        array_push($_SESSION['my-cart'], $item);
                    } else if (isset($_POST['id_prd']) && $flag == 1) {
                        if ($_SESSION['my-cart'][$i][1] + $soluong > $product->getProductId($_SESSION['my-cart'][$i][0])['quanlity']) {
                            $_SESSION['alert'] = "Chỉ thêm vào giỏ được " . $product->getProductId($_SESSION['my-cart'][$i][0])['quanlity'] . " sản phẩm. Vì tồn kho không đủ số lượng bạn yêu cầu";
                            $_SESSION['my-cart'][$i][1] = $product->getProductId($_SESSION['my-cart'][$i][0])['quanlity'];
                        } else {
                            $_SESSION['my-cart'][$i][1] += $soluong;
                        }
                    }
                }



                if (isset($_POST['id_delete'])) {
                    array_splice($_SESSION['my-cart'], $_POST['id_delete'], 1);
                }

                if (isset($_POST['id_plus'])) {
                    $index = $_POST['id_plus'];
                    if ($_SESSION['my-cart'][$index][1] == $product->getProductId($_SESSION['my-cart'][$index][0])['quanlity']) {
                        $_SESSION['alert'] = "Sản phẩm vượt quá tồn kho, không thể đặt thêm";
                    } else {
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

                $shopcart = [];
                foreach ($_SESSION['my-cart'] as $item) {
                    $flag1 = 0;
                    foreach ($shopcart as $item1) {
                        if ($item1 == $item[2]) {
                            $flag1 = 1;
                            break;
                        }
                    }
                    if ($flag1 == 0) {
                        array_push($shopcart, $item[2]);
                    }
                }
                ?>
                <?php
                if (isset($_POST['add_to_wishlist'])) {
                    if (isset($_SESSION['login_user'])) {
                        $id_prd = $_POST['id_prd'];
                        $id_user = $_SESSION['login_user']['id_user'];
                        if ($wishlist->checkIdPrdIdUserInWishlist($id_prd, $id_user) == 0) {
                            $wishlist->insertWishlist($id_prd, $id_user);
                            $_SESSION['alert'] = "Thêm vào Wishlist thành công";
                        } else {
                            $_SESSION['alert'] = "Sản phẩm này đã có trong Wishlist";
                        }
                    } else {
                        $_SESSION['alert'] = "Vui lòng đăng nhập trước khi thêm sản phẩm vào Wishlist";
                    }
                }

                if (isset($_POST['delete-wishlist'])) {
                    $id_wishlist = $_POST['id_wishlist'];
                    $wishlist->deleteWishlistId($id_wishlist);
                }
                ?>
                <!-- Start Atribute Navigation -->

                <div class="attr-nav">
                    <ul>
                        <li class="search"><a href=""><i class="fa fa-search"></i></a></li>
                        <li class="side-menu">
                            <a href="">
                                <i class="fa fa-shopping-bag"></i>
<<<<<<< HEAD
                                <span class="badge">3</span>
=======
                                <span class="badge"><?php echo count($_SESSION['my-cart']); ?></span>
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
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
                        foreach ($shopcart as $item1) { ?>
                            <li style="padding: 10px 15px 10px 15px !important;"><b><?php echo $administrator->getAdminId($item1)['name_brand'] ?></b></li>
                            <?php
                            $j = 0;
                            $total_shop = 0;
                            foreach ($_SESSION['my-cart'] as $item) {
                                $row = $product->getProductId($item[0]);
                                if ($item[2] == $item1) { ?>
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
                                    $total_shop += $row['price'] * $item[1];
                                    $total_cart += $row['price'] * $item[1];
                                }
                                $j++;
                            } ?>
                            <li style="padding: 10px 15px 10px 15px !important; text-align: end; border-bottom: none;"><b><i><?php echo number_format($total_shop, 0, '', ',') ?> VNĐ</i></b></li>
                        <?php }
                        ?>
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
                    <input name="search" type="text" class="form-control" pattern="[^'\x22-]+" title="Không hợp lệ" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </form>
        </div>
    </div>
    <!-- End Top Search -->