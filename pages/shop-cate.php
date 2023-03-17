<?php
if (!isset($_GET['id_cate']) || $_GET['id_cate']==""){
    header("location: shop.php");
} else {
    $id_cate = $_GET['id_cate'];
}
?>
<?php include_once('../part/header.php'); ?>

<!-- Start All Title Box -->
<div class="all-title-box" class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>
                    <a style="color: white;" href="store.php?id_brand=<?php echo $category->getCateId($id_cate)['id_admin']?>"><?php echo $administrator->getAdminId($category->getCateId($id_cate)['id_admin'])['name_brand']?></a> 
                    / 
                    <a style="color: white;" href="shop-cate.php?id_cate=<?php echo $id_cate?>"><?php echo $category->getCateId($id_cate)['name_cate']?></a>
                    
                </h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<!-- Start Shop Page  -->
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-item-filter row">
                        <div class="col-md-8 col-sm-12 text-center text-sm-left">
                            <form action="" method="post">
                                <div class="toolbar-sorter-right" style="width: 50%">
                                    <span>Sort by </span>
                                    <select name="sort-view" id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                                        <option value="0" <?php echo $sort==0?"selected":""?>>Nothing</option>
                                        <option value="1" <?php echo $sort==1?"selected":""?>>High Price → Low Price</option>
                                        <option value="2" <?php echo $sort==2?"selected":""?>>Low Price → High Price</option>
                                    </select>
                                </div>
                                <button class="ml-1 btn hvr-hover text-white title" style="line-height: 28px; font-weight: bolder;">Lọc</button>
                                <p>Showing all <?php echo $product->countAllProductsOfCate($id_cate)?> results</p>
                            </form>
                        </div>
                        <div class="col-md-4 col-sm-12 text-center text-sm-right">
                            <ul class="nav nav-tabs ml-auto">
                                <li>
                                    <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    <!-- Vòng lập sp -->
                                    <?php
                                    $sl = 9;
                                    $maxpage = ceil($product->countAllProductsOfCate($id_cate) / $sl);
                                    if (!isset($_GET['page']) || $_GET['page'] == "" || $_GET['page'] == 0) {
                                        $page = 1;
                                    } else {
                                        $page = $_GET['page'];
                                    }

                                    if ($page > $maxpage) {
                                        $page = $maxpage;
                                    }
                                    $offset = ($page - 1) * $sl;

                                    $rows = $product->getAllProductsNumPagesAvailableOfCateSort($sl, $offset, $id_cate, $sort);
                                    foreach ($rows as $row) { ?>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <?php if ($row['price'] < $row['cost']) { ?>
                                                            <p class="sale">Sale</p>
                                                        <?php } else { ?>
                                                            <p class="new">New</p>
                                                        <?php } ?>
                                                    </div>
                                                    <img src="../assets/img/upload/img_product/<?php echo $row['img_prd_1'] ?>" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="shop-detail.php?id_prd=<?php echo $row['id_prd'] ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <form action="" method="post">
                                                            <input hidden name="id_prd" value="<?php echo $row['id_prd'] ?>" type="text">
                                                            <button class="cart">Add to Cart</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4><?php echo $row['name_prd'] ?></h4>
                                                    <h5><?php echo number_format($row['price'], 0, '', ',') ?> VNĐ</h5>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="list-view">
                                <!-- Vòng lập sp -->
                                <?php
                                $rows = $product->getAllProductsNumPagesAvailableOfCateSort($sl, $offset, $id_cate, $sort);
                                foreach ($rows as $row) { ?>
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <?php if ($row['price'] < $row['cost']) { ?>
                                                                <p class="sale">Sale</p>
                                                            <?php } else { ?>
                                                                <p class="new">New</p>
                                                            <?php } ?>
                                                        </div>
                                                        <img src="../assets/img/upload/img_product/<?php echo $row['img_prd_1'] ?>" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="shop-detail.php?id_prd=<?php echo $row['id_prd'] ?>" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                                <li><a href="" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4><?php echo $row['name_prd'] ?></h4>
                                                    <h5>
                                                        <?php if ($row['price'] < $row['cost']) { ?>
                                                            <del><?php echo number_format($row['cost'], 0, '', ',') ?> VNĐ</del>
                                                        <?php } ?>
                                                        <?php echo number_format($row['price'], 0, '', ',') ?> VNĐ
                                                    </h5>
                                                    <p><?php echo $row['detail'] ?></p>
                                                    <form action="" method="post">
                                                        <input hidden name="id_prd" value="<?php echo $row['id_prd'] ?>" type="text">
                                                        <button class="btn hvr-hover p-2 p" style="color: white; font-weight: bold;">Add to Cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="linkPage">
                                <a class="btn hvr-hover" style="color: white; border: none;" id="linkNum" href="?id_cate=<?php echo $id_cate; ?>&page=<?php echo $page - 1; ?>">Trước</a>
                                <?php
                                for ($i = 1; $i <= $maxpage; $i++) { ?>
                                    <a class="btn hvr-hover" style="color: white; border: none; <?php echo $page == $i ? "background-color: black;" : "" ?>" id="linkNum" href="?id_cate=<?php echo $id_cate; ?>&page=<?php echo $i ?>"><?php echo $i ?></a>
                                <?php } ?>
                                <a class="btn hvr-hover" style="color: white; border: none;" id="linkNum" href="?id_cate=<?php echo $id_cate; ?>&page=<?php echo $page + 1; ?>">Sau</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">
                    <div class="search-product">
                        <form action="#">
                            <input class="form-control" placeholder="Search here..." type="text">
                            <button type="submit"> <i class="fa fa-search"></i> </button>
                        </form>
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Danh mục thuộc cửa hàng</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree">
                            <?php
                            $row1 = $administrator->getAdminId($row['id_admin']);
                            ?>
                            <div class="list-group-collapse sub-men">
                                <a class="list-group-item list-group-item-action" href="store.php?id_brand=<?php echo $row1['id_admin']?>"><?php echo $row1['name_brand'] ?> <small class="text-muted">(<?php echo $product->countAllProductsOfBrand($row1['id_admin']) ?>)</small>
                                </a>
                                <div class="collapse show" id="" data-parent="">
                                    <div class="list-group">
                                        <?php $rows2 = $category->getAllCategorysOfidAdmin($row1['id_admin']);
                                        foreach ($rows2 as $row2) { ?>
                                            <a href="shop-cate.php?id_cate=<?php echo $row2['id_cate'] ?>" class="list-group-item list-group-item-action"><?php echo $row2['name_cate'] ?> <small class="text-muted">(<?php echo $product->countAllProductsOfCate($row2['id_cate']) ?>)</small></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Cửa hàng khác</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                            <?php
                            $rows1 = $administrator->getAllBrands();
                            $i = 1;
                            foreach ($rows1 as $row1) { ?>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men<?php echo $i ?>" data-toggle="collapse" aria-expanded="true" aria-controls="sub-men<?php echo $i ?>"><?php echo $row1['name_brand'] ?> <small class="text-muted">(<?php echo $product->countAllProductsOfBrand($row1['id_admin']) ?>)</small>
                                    </a>
                                    <div class="collapse" id="sub-men<?php echo $i ?>" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <?php $rows2 = $category->getAllCategorysOfidAdmin($row1['id_admin']);
                                            foreach ($rows2 as $row2) { ?>
                                                <a href="shop-cate.php?id_cate=<?php echo $row2['id_cate'] ?>" class="list-group-item list-group-item-action"><?php echo $row2['name_cate'] ?> <small class="text-muted">(<?php echo $product->countAllProductsOfCate($row2['id_cate']) ?>)</small></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++;
                            } ?>
                        </div>
                    </div>
                    <div class="filter-price-left">
                        <div class="title-left">
                            <h3>Price</h3>
                        </div>
                        <div class="price-box-slider">
                            <div id="slider-range"></div>
                            <p>
                                <input type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold;">
                                <button class="btn hvr-hover" type="submit">Filter</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->
<?php include_once('../part/footer.php'); ?>