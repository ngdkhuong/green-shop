<?php include_once('../part/header.php'); ?>
<?php $search = isset($_GET['search']) ? $_GET['search'] : ""; ?>
<!-- Start All Title Box -->
<div class="all-title-box" class="">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>SHOP</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->
<div class="container">
    <div class="row">
        <div class="card card-outline-secondary my-4 col-12 p-0">
            <div class="card-header">
                <h2>Các cửa hàng liên quan đến "<span style="font-weight: 700;"><?php echo $search ?></span>"</h2>
            </div>
            <div class="card-body">
                <?php
                $rows = $administrator->getAllBrandsSearch($search);
                if (count($rows)==0){
                    echo "Không tìm thấy kết quả nào";
                }
                foreach ($rows as $row) { ?>
                    <div class="media mb-3">
                        <div class="mr-2">
                            <img style="width: 64px; height: 64px;" class="rounded-circle border p-1" src="../assets/img/upload/avatar_admin/avatar.jpeg" alt="">
                        </div>
                        <div class="media-body">
                            <h2><b>Cửa hàng</b> <?php echo $row['name_brand'] ?></h2>
                            <div><a class="p-0" style="color:black; font-weight: 400;" href="store.php?id_brand=<?php echo $row['id_admin']?>">Đến trang cửa hàng</a>  |  Sản phẩm: <?php echo $product->countAllProductsOfBrand($row['id_admin'])?>  |  Đánh giá: 5 <i class="fas fa-star"></i>  |  Lượt xem: 999  |  Lượt mua sản phẩm: 999</div>
                            <small class="text-muted">Hotline: 1900-123-456 | Email: store@gmail.com</small>
                        </div>
                    </div>
                    <hr>
                <?php }
                ?>
            </div>
        </div>
    </div>
</div>
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
                                        <option value="0" <?php echo $sort == 0 ? "selected" : "" ?>>Nothing</option>
                                        <option value="1" <?php echo $sort == 1 ? "selected" : "" ?>>High Price → Low Price</option>
                                        <option value="2" <?php echo $sort == 2 ? "selected" : "" ?>>Low Price → High Price</option>
                                    </select>
                                </div>
                                <button class="ml-1 btn hvr-hover text-white title" style="line-height: 28px; font-weight: bolder;">Lọc</button>
                                <p>Showing all <?php echo $product->countAllProductsAvailableSearch($search) ?> results</p>
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
                    <?php
                    $sl = 9;
                    $maxpage = ceil($product->countAllProductsAvailableSearch($search) / $sl);
                    if (!isset($_POST['page']) || $_POST['page'] == "" || $_POST['page'] == 0) {
                        $page = 1;
                    } else {
                        $page = $_POST['page'];
                    }

                    if ($page > $maxpage) {
                        $page = $maxpage;
                    }
                    $offset = ($page - 1) * $sl;
                    // $rows = $product->getAllProductsNumPagesAvailableSort($sl, $offset, $sort);
                    
                    
                    ?>
                    <div class="product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    <!-- Vòng lập sp -->
                                    <?php
                                    if($product->countAllProductsAvailableSearch($search)!=0){
                                        $rows = $product->getAllProductsNumPagesAvailableSortSearch($search, $sl, $offset, $sort);
                                    
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
                                    <?php }} ?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="list-view">
                                <!-- Vòng lập sp -->
                                <?php
                                if($product->countAllProductsAvailableSearch($search)!=0){
                                $rows = $product->getAllProductsNumPagesAvailableSortSearch($search, $sl, $offset, $sort);
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
                                <?php }} ?>
                            </div>
                            <div class="linkPage">
                                <form action="" style="display: inline-block;" method="post">
                                    <input hidden type="text" name="page" value="<?php echo $page - 1; ?>">
                                    <button class="btn hvr-hover" style="color: white; border: none;" type="submit">Trước</button>
                                </form>
                                <?php
                                for ($i = 1; $i <= $maxpage; $i++) { ?>
                                    <form action="" style="display: inline-block;" method="post">
                                        <input hidden type="text" name="page" value="<?php echo $i ?>">
                                        <button class="btn hvr-hover" style="color: white; border: none; <?php echo $page == $i ? "background-color: black;" : "" ?>" type="submit"><?php echo $i ?></button>
                                    </form>
                                    <!-- <a class="btn hvr-hover" style="color: white; border: none; <?php //echo $page == $i ? "background-color: black;" : "" 
                                                                                                        ?>" id="linkNum" href="?page=<?php //echo $i 
                                                                                                                                        ?>"><?php //echo $i 
                                                                                                                                                                                                    ?></a> -->
                                <?php } ?>
                                <form action="" style="display: inline-block;" method="post">
                                    <input hidden type="text" name="page" value="<?php echo $page + 1; ?>">
                                    <button class="btn hvr-hover" style="color: white; border: none;" type="submit">Sau</button>
                                </form>
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
                            <h3>Cửa hàng</h3>
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
                            <form action="" method="post">
                                <p>
                                    <input hidden id="amount1" name="filter1" type="text">
                                    <input hidden id="amount2" name="filter2" type="text">
                                    <input name="filter" type="text" id="amount" readonly style="border:0; color:#fbb714; font-weight:bold; width: 100%;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->
<?php include_once('../part/footer.php'); ?>