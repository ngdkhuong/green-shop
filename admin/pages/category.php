<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="card-block">
                        <?php
                        if (isset($_GET['id_cate']) && $_GET['control'] == 'editcategory') {
                        ?>
                            <h4 class="m-b-10">Sửa tên danh mục sản phẩm ID: <?php echo $_GET['id_cate'] ?></h4>
                            <p>
                                <?php
                                $row = $category->getCateId($_GET['id_cate']);
                                ?>
                            <form action="" method="post">
                                <div class="form-group row mb-2">
                                    <div class="col-sm-8">
                                        <input name="name_cate_update" type="text" class="form-control form-control-sm" placeholder="Nhập tên danh mục muốn thay đổi" value="<?php echo $row['name_cate']; ?>">
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-2">Sửa danh mục</button>
                            </form>
                        <?php } else { ?>
                            <h4 class="m-b-10">Danh mục sản phẩm</h4>
                            <form action="" method="post">
                                <div class="form-group row mb-2">
                                    <div class="col-sm-8">
                                        <input name="name_cate" type="text" class="form-control form-control-sm" placeholder="Nhập tên danh mục cần thêm mới">
                                    </div>
                                </div>
                                <button class="btn btn-primary mb-2">Thêm mới danh mục</button>
                            </form>
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

                    <!-- Hover table card start -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Danh sách danh mục sản phẩm</h4>
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
                                            <th>Tên danh mục</th>
                                            <th>Id nhãn hàng</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rows = $category->getAllCategorys();
                                        foreach ($rows as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['id_cate'] ?></td>
                                                <td><?php echo $row['name_cate'] ?></td>
                                                <td><?php echo $row['id_admin'] ?></td>
                                                <td><a href="?control=editcategory&id_cate=<?php echo $row['id_cate'] ?>" class="btn btn-warning">Sửa</a></td>
                                                <td><a href="?control=deletecategory&id_cate=<?php echo $row['id_cate'] ?>" class="btn btn-danger">Xóa</a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Hover table card end -->
                </div>
                <!-- Page-body end -->
            </div>
        </div>
    </div>
</div>