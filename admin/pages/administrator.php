<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="card-block">
                        <h4 class="m-b-10">Quản trị viên</h4>
                        <?php if ($_GET['control'] != 'addadmin' && $_SESSION['login_admin']['id_role']==1) { ?>
                            <a href="index.php?control=addadmin"><button class="btn btn-primary mb-2">Thêm mới quản trị viên</button></a>
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
                    <?php if ($_GET['control'] == 'addadmin') { ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Thêm mới quản trị viên</h4>
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
                                <form method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tên tài khoản</label>
                                        <div class="col-sm-10">
                                            <input name="username" type="text" pattern="[^'\x22-]+" title="Không hợp lệ" class="form-control" placeholder="Nhập tên tài khoản" value="<?php echo $username?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mật khẩu</label>
                                        <div class="col-sm-10">
                                            <input name="mk" type="password" pattern="[^'\x22-]+" title="Không hợp lệ" class="form-control" placeholder="Nhập mật khẩu" value="<?php echo $mk?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Xác nhận mật khẩu</label>
                                        <div class="col-sm-10">
                                            <input name="conf_mk" type="password" pattern="[^'\x22-]+" title="Không hợp lệ" class="form-control" placeholder="Nhập lại mật khẩu" value="<?php echo $conf_mk?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phân Quyền</label>
                                        <div class="col-sm-10">
                                            <select name="id_role" class="form-control">
                                            <?php 
                                            $role = new Role;
                                            $rows = $role->getAllRoles();
                                            print_r($rows);
                                            foreach($rows as $row1){ ?>
                                                <option value="<?php echo $row1['id_role'] ?>" <?php echo $row1['id_role']==3?"selected":"" ?>><?php echo $row1['name_role'] ?></option>
                                            <?php } ?>
                                            </select>
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
                                    <?php }  ?>
                                    <button class="btn btn-primary mb-2">Thêm mới quản trị viên</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($_GET['control'] == 'editadmin') { ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Sửa tài khoản quản trị viên ID: <?php echo $row['id_admin']?></h4>
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
                                <form method="post">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tên tài khoản</label>
                                        <div class="col-sm-10">
                                            <input name="username" pattern="[^'\x22-]+" title="Không hợp lệ" type="text" class="form-control" placeholder="Nhập tên tài khoản" value="<?php echo $row['username']?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Mật khẩu mới</label>
                                        <div class="col-sm-10">
                                            <input name="mk" pattern="[^'\x22-]+" title="Không hợp lệ" type="password" class="form-control" placeholder="Nhập mật khẩu mới" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Xác nhận mật khẩu mới</label>
                                        <div class="col-sm-10">
                                            <input name="conf_mk" pattern="[^'\x22-]+" title="Không hợp lệ" type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Phân Quyền</label>
                                        <div class="col-sm-10">
                                            <select name="id_role" class="form-control">
                                            <?php 
                                            $role = new Role;
                                            $rows = $role->getAllRoles();
                                            print_r($rows);
                                            foreach($rows as $row1){ ?>
                                                <option value="<?php echo $row1['id_role'] ?>" <?php echo $row1['id_role']==$row['id_role']?"selected":"" ?>><?php echo $row1['name_role'] ?></option>
                                            <?php } ?>
                                            </select>
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
                                    <?php }  ?>
                                    <button class="btn btn-primary mb-2">Thêm mới quản trị viên</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($_GET['control'] == 'administrator') { ?>

                        <!-- Hover table card start -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Danh sách quản trị viên</h4>
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
                                    <table class="table table-hover display">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tài khoản</th>
                                                <th>Họ tên</th>
                                                <th>Tên cửa hàng</th>
                                                <th>Email</th>
                                                <th>Sđt</th>
                                                <?php if($_SESSION['login_admin']['id_role']==1){ ?>
                                                    <th>Sửa</th>
                                                    <th>Xóa</th>     
                                                <?php }?>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $rows = $administrator->getAllAdmins();
                                            foreach ($rows as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row['id_admin'] ?></td>
                                                    <td><?php echo $row['username'] ?></td>
                                                    <td><?php echo $row['fullname'] == "" ? "Chưa cập nhập" : $row['fullname'] ?></td>
<<<<<<< HEAD
                                                    <td><?php echo $row['name_brand'] == "" ? "Chưa cập nhập" : $row['name_brand'] ?></td>
=======
                                                    <td><a href="?control=store&id_brand=<?php echo $row['id_admin']?>"><?php echo $row['name_brand'] == "" ? "Chưa cập nhập" : $row['name_brand'] ?></a></td>
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
                                                    <td><?php echo $row['email'] == "" ? "Chưa cập nhập" : $row['email'] ?></td>
                                                    <td><?php echo $row['phone'] == "" ? "Chưa cập nhập" : $row['phone'] ?></td>
                                                    <?php if($_SESSION['login_admin']['id_role']==1){ ?>
                                                        <td><a href="index.php?control=editadmin&id_admin=<?php echo $row['id_admin']?>" class="btn btn-warning">Sửa</a></td>
                                                        <td><a href="index.php?control=deleteadmin&id_admin=<?php echo $row['id_admin']?>" class="btn btn-danger">Xóa</a></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- Hover table card end -->
                </div>
                <!-- Page-body end -->
            </div>
        </div>
    </div>
</div>