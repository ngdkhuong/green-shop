<?php
if (!isset($_GET['id_prd']) || $_GET['id_prd'] == "") {
    header("location: shop.php");
    exit;
} else {
    $id_prd = $_GET['id_prd'];
}
?>
<?php
include_once('../part/header.php');
$row = $product->getProductId($id_prd);

if (!isset($_SESSION['view_prd'])) {
    $_SESSION['view_prd'] = [];
}

$flag1 = 0;

foreach ($_SESSION['view_prd'] as $view) {
    if (isset($id_prd)) {
        if ($_GET['id_prd'] == $view) {
            $flag1 = 1;
            break;
        }
    }
}

$view = $row['view'];

if (isset($_GET['id_prd']) && $flag1 == 0) {
    array_push($_SESSION['view_prd'], $_GET['id_prd']);
    $view = $row['view'] + 1;
    $product->viewProduct($view, $id_prd);
}

?>
<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Shop Detail</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Shop</a></li>
                    <li class="breadcrumb-item active">Shop Detail </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Detail  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"> <img class="d-block w-100" src="../assets/img/upload/img_product/<?php echo $row['img_prd_1'] ?>" alt="First slide"> </div>
                        <div class="carousel-item"> <img class="d-block w-100" src="../assets/img/upload/img_product/<?php echo $row['img_prd_2'] ?>" alt="Second slide"> </div>
                        <div class="carousel-item"> <img class="d-block w-100" src="../assets/img/upload/img_product/<?php echo $row['img_prd_3'] ?>" alt="Third slide"> </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                        <span class="sr-only">Next</span>
                    </a>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                            <img class="d-block w-100 img-fluid" src="../assets/img/upload/img_product/<?php echo $row['img_prd_1'] ?>" alt="" />
                        </li>
                        <li data-target="#carousel-example-1" data-slide-to="1">
                            <img class="d-block w-100 img-fluid" src="../assets/img/upload/img_product/<?php echo $row['img_prd_2'] ?>" alt="" />
                        </li>
                        <li data-target="#carousel-example-1" data-slide-to="2">
                            <img class="d-block w-100 img-fluid" src="../assets/img/upload/img_product/<?php echo $row['img_prd_3'] ?>" alt="" />
                        </li>
                    </ol>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <h2><?php echo $row['name_prd'] ?></h2>
                    <h5>
                        <?php if ($row['price'] < $row['cost']) { ?>
                            <del><?php echo number_format($row['cost'], 0, '', ',') ?> VNĐ</del>
                        <?php } ?>
                        <?php echo number_format($row['price'], 0, '', ',') ?> VNĐ
                    </h5>
                    <p class="available-stock">
                        <span> Còn lại: <?php echo $row['quanlity'] ?> sản phẩm
                            <!-- / <a href="">8 sold </a> -->
                        </span>
                    <p>
                    <h4>Mô tả chi tiết sản phẩm:</h4>
                    <p><?php echo $row['detail'] ?></p>
                    <form action="" method="post">
                        <ul>
                            <li>
                                <div class="form-group quantity-box">
                                    <label class="control-label">Quantity</label>
                                    <input name="soluong" class="form-control" value="1" min="1" max="<?php echo $row['quanlity'] ?>" type="number">
                                    <input type="hidden" name="id_prd" value="<?php echo $row['id_prd'] ?>">
                                </div>
                            </li>
                        </ul>
                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <!-- <a class="btn hvr-hover" data-fancybox-close="" href="">Buy New</a> -->
                                <button name="add-to-cart" class="btn hvr-hover text-white font-weight-bold" data-fancybox-close="" href="">Add to cart</button>
                            </div>
                        </div>
                    </form>
                    <div class="add-to-btn">
                        <div class="add-comp">
                            <form action="" method="post">
                                <input type="hidden" name="id_prd" value="<?php echo $row['id_prd'] ?>">
                                <button class="btn hvr-hover text-white font-weight-bold" name="add_to_wishlist"><i class="fas fa-heart"></i> Add to wishlist</button>
                            </form>
                        </div>
                        <div class="share-bar">
                            <a class="btn hvr-hover" href=""><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href=""><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href=""><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href=""><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                            <a class="btn hvr-hover" href=""><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $cmt = isset($_POST['cmt']) ? $_POST['cmt'] : "";
        if (isset($_POST['btn-cmt'])) {
            if (isset($_SESSION['login_user'])) {
                if ($cmt != "") {
                    $cmt = htmlspecialchars(addslashes(trim($cmt)));
                    $id_prd = $_GET['id_prd'];
                    $id_user = $_SESSION['login_user']['id_user'];
                    $comment->insertComment($id_prd, $id_user, $cmt);
                    $id_cmt = $comment->getCommentIdPrdIdUserLast($id_prd, $id_user)[0]['id_cmt'];
                    $id_admin = $product->getProductId($id_prd)['id_admin'];
                    $comment->insertRepComment($id_admin, $id_cmt);
                    $_SESSION['alert'] = "Bình luận thành công";
                }
            } else {
                $_SESSION['alert'] = "Vui lòng đăng nhập trước khi bình luận";
            }
        }

        if (isset($_POST['delete_cmt'])) {
            $id_cmt = $_POST['id_cmt'];
            $comment->deleteComment($id_cmt);
        }
        ?>
        <div class="row my-5">
            <div class="card card-outline-secondary my-4 col-xl-12 col-lg-12 col-md-12 p-0">
                <div class="card-header">
                    <h2>Product Reviews</h2>
                </div>

                <div class="card-body" style="padding-bottom: 0px;">
                    <form method="post">
                        <input name="cmt" type="text" style="height: 40px;padding: 10px;width:85%">
                        <button name="btn-cmt" type="submit" class="btn hvr-hover text-white" style="margin-bottom: 3px; height: 40px;">Bình luận</button>
                    </form>
                </div>
                <div class="card-body">
                    <hr>
                    <?php
                    $rows = $comment->getCommentIdPrd($id_prd);
                    foreach ($rows as $row) { ?>
                        <div class="media mb-3">
                            <div class="mr-2">
                                <img width="64px" height="64px" class="rounded-circle border p-1" src="../assets/img/upload/avatar_user/<?php echo $user->getUserId($row['id_user'])['avatar'] == "" ? "avatar.jpeg" : $user->getUserId($row['id_user'])['avatar']; ?>" alt="Generic placeholder image">
                            </div>
                            <div class="media-body">
                                <h3 class="pb-0">
                                    <b><?php echo $user->getUserId($row['id_user'])['fullname'] == "" ? $user->getUserId($row['id_user'])['username'] : $user->getUserId($row['id_user'])['fullname'] ?></b>
                                    <?php if (isset($_SESSION['login_user']) && $_SESSION['login_user']['id_user'] == $row['id_user']) { ?>
                                        <form method="post" style="display: inline-block;">
                                            <input type="hidden" name="id_cmt" value="<?php echo $row['id_cmt'] ?>">
                                            <button name="delete_cmt" style="background: #000000; color: #ffffff;cursor: pointer;">Xóa</button>
                                        </form>
                                    <?php }
                                    ?>

                                </h3>
                                <p style=""><?php echo $row['cmt'] ?></p>
                                <small class="text-muted">Thời gian bình luận
                                    <?php
                                    $date = date_create($row['time_cmt']);
                                    echo date_format($date, "d/m/Y H:i:s");
                                    ?>
                                </small>
                            </div>
                        </div>
                        <?php
                        $rows1 = $comment->getRepCommentIdComment($row['id_cmt']);
                        foreach ($rows1 as $key => $row1) { ?>
                            <div class="media mb-3 ml-5">
                                <div class="mr-2">
                                    <img width="64px" height="64px" class="rounded-circle border p-1" src="../assets/img/upload/avatar_admin/<?php echo $administrator->getAdminId($row1['id_admin'])['avatar'] == "" ? "avatar.jpeg" : $administrator->getAdminId($row1['id_admin'])['avatar'] ?>" alt="Generic placeholder image">
                                </div>
                                <div class="media-body">
                                    <h3 class="pb-0"><b><?php echo $administrator->getAdminId($row1['id_admin'])['name_brand'] == "" ? $administrator->getAdminId($row1['id_admin'])['username'] : $administrator->getAdminId($row1['id_admin'])['name_brand'] ?></b></h3>
                                    <p><?php echo $row1['rep_cmt'] ?></p>
                                    <small class="text-muted">Thời gian bình luận
                                        <?php
                                        $date = date_create($row1['time_rep_cmt']);
                                        echo date_format($date, "d/m/Y H:i:s");
                                        ?>
                                    </small>
                                </div>
                            </div>
                        <?php }
                        ?>
                        <hr>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Featured Products</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                </div>
                <div class="featured-products-box owl-carousel owl-theme">
                    <?php
                    $rows = $product->getAllProductsCateAvailable($product->getProductId($_GET['id_prd'])['id_cate']);
                    foreach ($rows as $row) { ?>
                        <div class="item">
                            <div class="products-single fix">
                                <div class="box-img-hover">
                                    <img src="../assets/img/upload/img_product/<?php echo $row['img_prd_1'] ?>" class="img-fluid" alt="Image">
                                    <div class="mask-icon">
                                        <ul>
                                            <li><a href="" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                            <li>
                                                <a href="">
                                                    <form method="post">
                                                        <input type="hidden" name="id_prd" value="<?php echo $row['id_prd'] ?>">
                                                        <button style="border: none;background-color: inherit;cursor: pointer;padding:0px;color:white;" name="add_to_wishlist" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></button>
                                                    </form>
                                                </a>
                                            </li>
                                        </ul>
                                        <form action="" method="post">
                                            <input hidden name="id_prd" value="<?php echo $row['id_prd'] ?>" type="text">
                                            <button name="add-to-cart" class="cart">Add to Cart</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="why-text">
                                    <h4><?php echo $row['name_prd'] ?></h4>
                                    <h5><?php echo number_format($row['price'], 0, ",") ?> VNĐ</h5>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Cart -->
<?php include_once('../part/footer.php'); ?>