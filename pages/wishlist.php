<?php include_once('../part/header.php'); ?>

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Wishlist</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Shop</a></li>
                    <li class="breadcrumb-item active">Wishlist</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Wishlist  -->
<div class="wishlist-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Unit Price </th>
                                <th>Stock</th>
                                <th>Add Item</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['login_user']['id_user'])) {
                                $rows = $wishlist->getWishlistIdUser($_SESSION['login_user']['id_user']);
                                foreach ($rows as $row) {
                                    $row1 = $product->getProductId($row['id_prd']); ?>
                                    <tr>
                                        <td class="thumbnail-img">
                                            <a href="">
                                                <img class="img-fluid" src="../assets/img/upload/img_product/<?php echo $row1['img_prd_1'] ?>" alt="" />
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="shop-detail.php?id_prd=<?php echo $row1['id_prd'] ?>">
                                                <?php echo $row1['name_prd'] ?>
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            <p><?php echo number_format($row1['price'], 0, ",") ?> đ</p>
                                        </td>
                                        <td class="quantity-box">còn <?php echo $row1['quanlity'] ?> sản phẩm</td>
                                        <td class="add-pr">
                                            <form action="" method="post">
                                                <input hidden name="id_prd" value="<?php echo $row1['id_prd'] ?>" type="text">
                                                <button name="add-to-cart" class="btn hvr-hover p-2 p" style="color: white; font-weight: bold;">Add to Cart</button>
                                            </form>
                                        </td>
                                        <td class="remove-pr">
                                            <form action="" method="post">
                                                <input hidden name="id_wishlist" value="<?php echo $row['id_wishlist'] ?>" type="text">
                                                <button name="delete-wishlist" style="font-weight: bold; border: none; padding: 15px; background-color: inherit;cursor: pointer;"><i class="fas fa-times"></i></button>
                                            </form>
                                            <a href="">
                                                
                                            </a>
                                        </td>
                                    </tr>

                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="6" style="text-align: center;">Đăng nhập để xem danh sách sản phẩm yêu thích</td>
                                </tr>
                            <?php }

                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Wishlist -->
<?php include_once('../part/footer.php'); ?>