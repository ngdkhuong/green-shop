<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card user-card">
                                <div class="card-header">
                                    <h5>Profile</h5>
                                </div>
                                <div class="card-block">
                                    <div class="usre-image">
                                        <img style="width: 100px; height: 100px;" src="../../assets/img/upload/avatar_admin/<?php echo $admin['avatar'] == "" ? "avatar.jpeg" : $admin['avatar']; ?>" class="img-radius" alt="User-Profile-Image">
                                    </div>
<<<<<<< HEAD
                                    <h6 class="f-w-600 m-t-25 m-b-10">
                                        <?php
                                        if ($admin['name_brand'] == "") {
                                            echo $admin['fullname'];
                                        } else {
                                            echo $admin['name_brand'];
                                        }
                                        ?>
                                    </h6>
=======
                                    <a href="index.php?control=profile">
                                        <h6 class="f-w-600 m-t-25 m-b-10">
                                            <?php
                                            if ($admin['name_brand'] == "") {
                                                echo $admin['fullname'];
                                            } else {
                                                echo $admin['name_brand'];
                                            }
                                            ?>
                                        </h6>
                                    </a>
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
                                    <!-- <p class="text-muted">Active | Male | Born 23.05.1992</p>
                                    <hr>
                                    <p class="text-muted m-t-15">Activity Level: 87%</p>
                                    <ul class="list-unstyled activity-leval">
                                        <li class="active"></li>
                                        <li class="active"></li>
                                        <li class="active"></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                    <div class="bg-c-blue counter-block m-t-10 p-20">
                                        <div class="row">
                                            <div class="col-4">
                                                <i class="ti-comments"></i>
                                                <p>1256</p>
                                            </div>
                                            <div class="col-4">
                                                <i class="ti-user"></i>
                                                <p>8562</p>
                                            </div>
                                            <div class="col-4">
                                                <i class="ti-bag"></i>
                                                <p>189</p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="m-t-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p> -->
                                    <hr>
                                    <div class="row justify-content-center user-social-link">
                                        <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                                        <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
                                        <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($_GET['control'] == "profile") { ?>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Thông tin tài khoản</h5>
                                        <a href="index.php?control=updateprofile" class="btn btn-primary mb-1">Cập nhập thông tin</a>
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
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Tài khoản</th>
                                                    <td><?php echo $admin['username'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Họ và tên</th>
                                                    <td><?php echo $admin['fullname'] == "" ? "(Chưa cập nhập)" : $admin['fullname'] ?></td>
                                                </tr>
                                                <?php if ($_SESSION['login_admin']['id_role'] == 3) { ?>
                                                    <tr>
                                                        <th scope="row">Tên cửa hàng</th>
                                                        <td><?php echo $admin['name_brand'] == "" ? "(Chưa cập nhập)" : $admin['name_brand'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    <th scope="row">Sđt</th>
                                                    <td><?php echo $admin['phone'] == "" ? "(Chưa cập nhập)" : $admin['phone'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <td><?php echo $admin['email'] == "" ? "(Chưa cập nhập)" : $admin['email'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Địa chỉ</th>
                                                    <td><?php echo $admin['address'] == "" ? "(Chưa cập nhập)" : $admin['address'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Mật khẩu</th>
<<<<<<< HEAD
                                                    <td><button class="btn btn-inverse">Thay đổi mật khẩu</button></td>
=======
                                                    <td><a href="index.php?control=changepassword" class="btn btn-inverse">Thay đổi mật khẩu</a></td>
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php
                        if ($_GET['control'] == "updateprofile") { ?>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Cập nhập thông tin tài khoản</h5>
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
                                        <table class="table table-hover">
                                            <tbody>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <tr>
                                                        <th>Họ và tên</th>
                                                        <td><input name="fullname" type="text" class="form-control" placeholder="Nhập họ và tên" value="<?php echo $fullname == "" ? $admin['fullname'] : $fullname ?>"></td>
                                                    </tr>
                                                    <?php
                                                    if ($_SESSION['login_admin']['id_role'] == 3) { ?>
                                                        <tr>
                                                            <th>Tên cửa hàng</th>
                                                            <td><input name="name_brand" type="text" class="form-control" placeholder="Nhập tên cửa hàng" value="<?php echo $name_brand == "" ? $admin['name_brand'] : $name_brand ?>"></td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                    <tr>
                                                        <th>Sđt</th>
                                                        <td><input name="phone" type="text" class="form-control" placeholder="Nhập số điện thoại" value="<?php echo $phone == "" ? $admin['phone'] : $phone ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td><input name="email" type="text" class="form-control" placeholder="Nhập email" value="<?php echo $email == "" ? $admin['email'] : $email ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Địa chỉ</th>
                                                        <td><input name="address" type="text" class="form-control" placeholder="Nhập địa chỉ" value="<?php echo $address == "" ? $admin['address'] : $address ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Avatar</th>
                                                        <td><input name="avatar" type="file" class="form-control"></td>
                                                    </tr>
                                                    <?php
                                                    if ($_SESSION['login_admin']['id_role'] == 3) { ?>
                                                        <tr>
                                                            <th>Banner cửa hàng</th>
                                                            <td><input name="banner" type="file" class="form-control"></td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                    <tr>
                                                        <td colspan="2"><button type="submit" class="btn btn-primary mb-1">Cập nhập</button></td>
                                                    </tr>
                                                </form>
                                            </tbody>
                                        </table>
                                        <?php if (count($err) > 0) { ?>
                                            <ul class="alert alert-danger">
                                                <?php
                                                foreach ($err as $value) {
                                                ?>
                                                    <li><?php echo $value ?></li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
<<<<<<< HEAD
=======
                        <?php
                        if ($_GET['control'] == "changepassword") { ?>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Thay đổi mật khẩu</h5>
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
                                        <table class="table table-hover">
                                            <tbody>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <tr>
                                                        <th>Mật khẩu mới</th>
                                                        <td><input name="mk" type="password" class="form-control" placeholder="Nhập mật khẩu mới" value=""></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Xác nhận mật khẩu mới</th>
                                                        <td><input name="conf_mk" type="password" class="form-control" placeholder="Nhập xác nhận mật khẩu mới" value=""></td>
                                                    </tr>

                                                    <tr>
                                                        <td colspan="2"><button type="submit" class="btn btn-primary mb-1">Cập nhập mật khẩu</button></td>
                                                    </tr>
                                                </form>
                                            </tbody>
                                        </table>
                                        <?php if (count($err) > 0) { ?>
                                            <ul class="alert alert-danger">
                                                <?php
                                                foreach ($err as $value) {
                                                ?>
                                                    <li><?php echo $value ?></li>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>