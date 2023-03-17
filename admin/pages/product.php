<<<<<<< HEAD
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="card-block">
                        <h4 class="m-b-10">Sản phẩm</h4>
                        <?php if ($_GET['control'] != 'addproduct') { ?>
                            <a href="index.php?control=addproduct" class="btn btn-primary mb-2">Thêm mới sản phẩm</a>
                        <?php } ?>
                        <!-- <p class="text-muted m-b-10">lorem ipsum dolor sit amet, consectetur adipisicing elit</p> -->
                        <!-- <ul class="breadcrumb-title b-t-default p-t-10">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Basic Componenets</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Bootstrap Basic Tables</a>
                            </li>
                        </ul> -->
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">

                    <?php if ($_GET['control'] == 'product') { ?>
                        <!-- Hover table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Danh sách sản phẩm</h4>
                                <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa-chevron-left"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-times close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Hình sản phẩm</th>
                                                <th>Danh mục</th>
                                                <th>ID nhãn hàng</th>
                                                <th>Giá gốc</th>
                                                <th>Giá bán</th>
                                                <th>Số lượng</th>
                                                <th>Sửa</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rows = $product->getAllProducts();
                                            foreach ($rows as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row['id_prd'] ?></td>
                                                    <td><a href=""><?php echo $row['name_prd'] ?></a></td>
                                                    <td><img width="100px" src="../../assets/img/upload/img_product/<?php echo $row['img_prd_1'] ?>" alt=""></td>
                                                    <td title="<?php
                                                    $row1=$category->getCateId($row['id_cate']);
                                                    echo $row1['name_cate'];
                                                    ?>"><?php echo $row['id_cate'] ?></td>
                                                    <td title="<?php
                                                    $row2=$administrator->getAdminId($row['id_admin']);
                                                    echo $row2['username'];
                                                    ?>"><?php echo $row['id_admin'] ?></td>
                                                    <td><?php echo $row['cost'] ?></td>
                                                    <td><?php echo $row['price'] ?></td>
                                                    <td><?php echo $row['quanlity'] ?></td>
                                                    <td><a href="?control=editproduct&id_prd=<?php echo $row['id_prd'] ?>" class="btn btn-warning">Sửa</a></td>
                                                    <td><a href="?control=deleteproduct&id_prd=<?php echo $row['id_prd'] ?>" class="btn btn-danger">Xóa</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Hover table card end -->
                    <?php } ?>

                    <?php if ($_GET['control'] == 'addproduct') { ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Thêm mới sản phẩm</h4>
                                <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa-chevron-left"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-times close-card"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-block">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="name_prd" type="text" class="form-control" placeholder="Nhập tên sản phẩm" value="<?php echo $name_prd ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Danh mục</label>
                                        <div class="col-sm-10">
                                            <select name="id_cate" class="form-control">
                                                <?php
                                                $rows = $category->getAllCategorys();
                                                foreach ($rows as $row1) { 
                                                ?>
                                                <option value="<?php echo $row1['id_cate']?>"><?php echo $row1['name_cate'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giá gốc</label>
                                        <div class="col-sm-10">
                                            <input name="cost" type="number" class="form-control" placeholder="Nhập giá gốc: 100000" value="<?php echo $cost ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giá bán</label>
                                        <div class="col-sm-10">
                                            <input name="price" type="number" class="form-control" placeholder="Nhập giá bán: 90000" value="<?php echo $price ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Số lượng</label>
                                        <div class="col-sm-10">
                                            <input name="quanlity" type="number" class="form-control" placeholder="Nhập số lượng" value="<?php echo $quanlity ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mô Tả</label>
                                        <div class="col-sm-10">
                                            <textarea name="detail" rows="5" cols="5" class="form-control" placeholder="Nhập mô tả sản phẩm"><?php echo $detail ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình 1 sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="img_prd_1" type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình 2 sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="img_prd_2" type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình 3 sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="img_prd_3" type="file" class="form-control">
                                        </div>
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
                                    <button class="btn btn-primary mb-2">Thêm mới sản phẩm</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($_GET['control'] == 'editproduct') { ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Sửa thông tin sản phẩm ID: <?php echo $id_prd?></h4>
                                <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa-chevron-left"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-times close-card"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-block">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="name_prd" type="text" class="form-control" placeholder="Nhập tên sản phẩm" value="<?php echo $row['name_prd']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Danh mục</label>
                                        <div class="col-sm-10">
                                            <select name="id_cate" class="form-control">
                                                <?php
                                                $rows = $category->getAllCategorys();
                                                foreach ($rows as $row1) { 
                                                ?>
                                                <option value="<?php echo $row1['id_cate']?>"><?php echo $row1['name_cate'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giá gốc</label>
                                        <div class="col-sm-10">
                                            <input name="cost" type="number" class="form-control" placeholder="Nhập giá gốc: 100000" value="<?php echo $row['cost']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giá bán</label>
                                        <div class="col-sm-10">
                                            <input name="price" type="number" class="form-control" placeholder="Nhập giá bán: 90000" value="<?php echo $row['price']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Số lượng</label>
                                        <div class="col-sm-10">
                                            <input name="quanlity" type="number" class="form-control" placeholder="Nhập số lượng" value="<?php echo $row['quanlity']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mô Tả</label>
                                        <div class="col-sm-10">
                                            <textarea name="detail" rows="5" cols="5" class="form-control" placeholder="Nhập mô tả sản phẩm"><?php echo $row['detail']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình 1 sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="img_prd_1" type="file" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình 2 sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="img_prd_2" type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình 3 sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="img_prd_3" type="file" class="form-control">
                                        </div>
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
                                    <button class="btn btn-primary mb-2">Sửa thông tin sản phẩm</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- Page-body end -->
            </div>
        </div>
    </div>
=======
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="card-block">
                        <h4 class="m-b-10">Sản phẩm</h4>
                        <?php if ($_GET['control'] != 'addproduct') { ?>
                            <a href="index.php?control=addproduct" class="btn btn-primary mb-2">Thêm mới sản phẩm</a>
                        <?php } ?>
                        <!-- <p class="text-muted m-b-10">lorem ipsum dolor sit amet, consectetur adipisicing elit</p> -->
                        <!-- <ul class="breadcrumb-title b-t-default p-t-10">
                            <li class="breadcrumb-item">
                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Basic Componenets</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Bootstrap Basic Tables</a>
                            </li>
                        </ul> -->
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">

                    <?php if ($_GET['control'] == 'product') { ?>
                        <!-- Hover table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Danh sách sản phẩm</h4>
                                <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa-chevron-left"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-times close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Hình sản phẩm</th>
                                                <th>Danh mục</th>
                                                <th>ID nhãn hàng</th>
                                                <th>Giá gốc</th>
                                                <th>Giá bán</th>
                                                <th>Số lượng</th>
                                                <th>Sửa</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rows = $product->getAllProducts();
                                            foreach ($rows as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row['id_prd'] ?></td>
                                                    <td><a href=""><?php echo $row['name_prd'] ?></a></td>
                                                    <td><img width="100px" src="../../assets/img/upload/img_product/<?php echo $row['img_prd_1'] ?>" alt=""></td>
                                                    <td title="<?php
                                                    $row1=$category->getCateId($row['id_cate']);
                                                    echo $row1['name_cate'];
                                                    ?>"><?php echo $row['id_cate'] ?></td>
                                                    <td title="<?php
                                                    $row2=$administrator->getAdminId($row['id_admin']);
                                                    echo $row2['username'];
                                                    ?>"><?php echo $row['id_admin'] ?></td>
                                                    <td><?php echo $row['cost'] ?></td>
                                                    <td><?php echo $row['price'] ?></td>
                                                    <td><?php echo $row['quanlity'] ?></td>
                                                    <td><a href="?control=editproduct&id_prd=<?php echo $row['id_prd'] ?>" class="btn btn-warning">Sửa</a></td>
                                                    <td><a href="?control=deleteproduct&id_prd=<?php echo $row['id_prd'] ?>" class="btn btn-danger">Xóa</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Hover table card end -->
                    <?php } ?>

                    <?php if ($_GET['control'] == 'addproduct') { ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Thêm mới sản phẩm</h4>
                                <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa-chevron-left"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-times close-card"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-block">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="name_prd" type="text" class="form-control" placeholder="Nhập tên sản phẩm" value="<?php echo $name_prd ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Danh mục</label>
                                        <div class="col-sm-10">
                                            <select name="id_cate" class="form-control">
                                                <?php
                                                $rows = $category->getAllCategorys();
                                                foreach ($rows as $row1) { 
                                                ?>
                                                <option value="<?php echo $row1['id_cate']?>"><?php echo $row1['name_cate'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giá gốc</label>
                                        <div class="col-sm-10">
                                            <input name="cost" type="number" class="form-control" placeholder="Nhập giá gốc: 100000" value="<?php echo $cost ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giá bán</label>
                                        <div class="col-sm-10">
                                            <input name="price" type="number" class="form-control" placeholder="Nhập giá bán: 90000" value="<?php echo $price ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Số lượng</label>
                                        <div class="col-sm-10">
                                            <input name="quanlity" type="number" class="form-control" placeholder="Nhập số lượng" value="<?php echo $quanlity ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mô Tả</label>
                                        <div class="col-sm-10">
                                            <textarea name="detail" rows="5" cols="5" class="form-control" placeholder="Nhập mô tả sản phẩm"><?php echo $detail ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình 1 sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="img_prd_1" type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình 2 sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="img_prd_2" type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình 3 sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="img_prd_3" type="file" class="form-control">
                                        </div>
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
                                    <button class="btn btn-primary mb-2">Thêm mới sản phẩm</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($_GET['control'] == 'editproduct') { ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Sửa thông tin sản phẩm ID: <?php echo $id_prd?></h4>
                                <!-- <span>use class <code>table-hover</code> inside table element</span> -->
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa-chevron-left"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-times close-card"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-block">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="name_prd" type="text" class="form-control" placeholder="Nhập tên sản phẩm" value="<?php echo $row['name_prd']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Danh mục</label>
                                        <div class="col-sm-10">
                                            <select name="id_cate" class="form-control">
                                                <?php
                                                $rows = $category->getAllCategorys();
                                                foreach ($rows as $row1) { 
                                                ?>
                                                <option value="<?php echo $row1['id_cate']?>"><?php echo $row1['name_cate'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giá gốc</label>
                                        <div class="col-sm-10">
                                            <input name="cost" type="number" class="form-control" placeholder="Nhập giá gốc: 100000" value="<?php echo $row['cost']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Giá bán</label>
                                        <div class="col-sm-10">
                                            <input name="price" type="number" class="form-control" placeholder="Nhập giá bán: 90000" value="<?php echo $row['price']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Số lượng</label>
                                        <div class="col-sm-10">
                                            <input name="quanlity" type="number" class="form-control" placeholder="Nhập số lượng" value="<?php echo $row['quanlity']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mô Tả</label>
                                        <div class="col-sm-10">
                                            <textarea name="detail" rows="5" cols="5" class="form-control" placeholder="Nhập mô tả sản phẩm"><?php echo $row['detail']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình 1 sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="img_prd_1" type="file" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình 2 sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="img_prd_2" type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Hình 3 sản phẩm</label>
                                        <div class="col-sm-10">
                                            <input name="img_prd_3" type="file" class="form-control">
                                        </div>
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
                                    <button class="btn btn-primary mb-2">Sửa thông tin sản phẩm</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- Page-body end -->
            </div>
        </div>
    </div>
>>>>>>> huy
</div>