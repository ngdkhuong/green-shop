<?php include_once('../part/header.php'); ?>
<?php
if (!isset($_SESSION['login_user'])) {
    echo "<meta http-equiv='refresh' content='0;url=login.php'>";
    exit;
}
$row = $user->getUserId($_SESSION['login_user']['id_user']);
// print_r($row);
?>

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>My Account</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Shop</a></li>
                    <li class="breadcrumb-item active">My Account</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start My Account  -->
<div class="my-account-box-main">
    <div class="container">
        <div class="my-account-page">
            <div class="row">

                <?php if (!isset($_GET['id_hd']) && isset($_GET['act']) && $_GET['act'] == "history") { ?>
                    <?php
                    if (isset($_POST['conf_bill']) && isset($_POST['id_bill'])) {
                        $id_bill = $_POST['id_bill'];
                        $id_user = $_SESSION['login_user']['id_user'];
                        $bill->confBill($id_bill, $id_user);
                    }
                    if (isset($_POST['cancel_bill']) && isset($_POST['id_bill'])) {
                        $id_bill = $_POST['id_bill'];
                        $id_user = $_SESSION['login_user']['id_user'];
                        $bill->cancelBill($id_bill, $id_user);
                    }
                    ?>
                    <div class="col-lg-12">
                        <div class="title-left">
                            <h1><b>Lịch sử giao dịch</b></h1>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="table-main table-responsive">
                            <table class="table display">
                                <thead>
                                    <tr>
                                        <th>Mã Hóa Đơn</th>
                                        <th>Tên Cửa hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Thời gian</th>
                                        <th>Xác nhận</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id_user = $_SESSION['login_user']['id_user'];
                                    $rows = $bill->getBillUser($id_user);
                                    foreach ($rows as $row) { ?>
                                        <tr>
                                            <td><a href="?act=history&id_hd=<?php echo $row['id_bill'] ?>"><?php echo $row['id_bill'] ?></a></td>
                                            <td><a href="store.php?id_brand=<?php echo $row['id_admin'] ?>"><?php echo $administrator->getAdminId($row['id_admin'])['name_brand'] ?></a></td>
                                            <td><?php echo $bill->getStatus($row['status'])['name_status'] ?></td>
                                            <td><?php echo date("d-m-Y H:i:s", strtotime($row['time'])) ?></td>
                                            <td>
                                                <?php
                                                if ($row['status'] == 1) { ?>
                                                    <form style="display: inline-block;" action="" method="post">
                                                        <input name="id_bill" type="hidden" name="" value="<?php echo $row['id_bill'] ?>">
                                                        <button name="conf_bill" style="border: none; background-color: inherit; cursor: pointer;">Xác nhận</button>
                                                    </form>|
                                                    <form style="display: inline-block;" action="" method="post">
                                                        <input name="id_bill" type="hidden" name="" value="<?php echo $row['id_bill'] ?>">
                                                        <button name="cancel_bill" style="border: none; background-color: inherit; cursor: pointer;">Hủy</button>
                                                    </form>
                                                <?php }
                                                ?>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php } elseif (isset($_GET['id_hd']) && isset($_GET['act']) && $_GET['act'] == "history") { ?>
                    <?php
                    $id_bill = $_GET['id_hd'];
                    $row1 = $bill->getBillId($id_bill);
                    ?>
                    <div class="col-lg-12">
                        <div class="title-left">
                            <h1><b>Chi tiết hóa đơn ID: <?php echo $id_bill ?> </b></h1>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="table-main table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình ảnh sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $rows = $bill->getBillDetailId($id_bill);
                                    $total_bill = 0;
                                    $i = 1;
                                    foreach ($rows as $row) { ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td class="thumbnail-img">
                                                <a href="">
                                                    <img class="img-fluid" src="../assets/img/upload/img_product/<?php echo $product->getProductId($row['id_prd'])['img_prd_1'] ?>" alt="" />
                                                </a>
                                            </td>
                                            <td class="name-pr">
                                                <a href="">
                                                    <?php echo $row['name_prd'] ?>
                                                </a>
                                            </td>
                                            <td class="price-pr">
                                                <p><?php echo number_format($row['price'], 0, '', ',') ?> VNĐ</p>
                                            </td>
                                            <td class="quantity-box"><?php echo $row['quanlity'] ?></td>
                                            <td class="price-pr">
                                                <p><?php echo number_format($row['price'] * $row['quanlity'], 0, '', ',') ?> VNĐ</p>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                        $total_bill += $row['price'] * $row['quanlity'];
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row my-5 col-lg-12">
                        <div class="col-lg-8 col-sm-12">
                            <table width="100%" class="needs-validation">
                                <tbody>
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 30%;"><label>Tên cửa hàng:</label></th>
                                        <td class="p-2"><?php echo $row1['name_brand'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 30%;"><label>Trạng thái hóa đơn: </label></th>
                                        <td class="p-2"><?php echo $bill->getStatus($row1['status'])['name_status'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 30%;"><label>Hình thức thanh toán: </label></th>
                                        <td class="p-2"><?php echo $row1['payment']==0?"Thanh toán khi nhận hàng":"Thanh toán điện tử" ?></td>
                                    </tr>
                                    <?php
                                    if ($row1['payment'] == 1) { ?>
                                        <tr>
                                            <th class="p-2 pl-5" style="width: 30%;"><label>Trạng thái thanh toán: </label></th>
                                            <td class="p-2"><?php echo $row1['status_payment']==0?"Thất bại":"Thành công" ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 30%;"><label>Thời gian: </label></th>
                                        <td class="p-2"><?php echo date("d-m-Y H:i:s", strtotime($row1['time'])) ?></td>
                                    </tr>
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 30%;"><label>Tên người mua hàng: </label></th>
                                        <td class="p-2"><?php echo $row1['fullname'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 30%;"><label>Địa chỉ giao hàng: </label></th>
                                        <td class="p-2"><?php echo $row1['address'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 30%;"><label>Sđt người nhận: </label></th>
                                        <td class="p-2"><?php echo $row1['phone'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="order-box">
                                <h3>Order summary</h3>
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> <?php echo number_format($total_bill, 0, '', ',') ?> VNĐ </div>
                                </div>
                                <hr class="my-1">
                                <?php
                                $coupondiscount = $row1['coupondiscount'];
                                ?>
                                <div class="d-flex">
                                    <h4>Coupon Discount</h4>
                                    <div class="ml-auto font-weight-bold"> <?php echo number_format($total_bill * $coupondiscount, 0, '', ',') ?> VNĐ</div>
                                </div>
                                <div class="d-flex">
                                    <h4>Tax</h4>
                                    <div class="ml-auto font-weight-bold"> <?php echo number_format($total_bill * 0.1, 0, '', ',') ?> VNĐ</div>
                                </div>
                                <div class="d-flex">
                                    <h4>Shipping Cost</h4>
                                    <div class="ml-auto font-weight-bold"> Free </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> <?php echo number_format($total_bill * (1.1 - $coupondiscount), 0, '', ',') ?> VNĐ</div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-sm-6 col-lg-4">
                        <div class="hover-team">
                            <div class="our-team"> <img src="../assets/img/upload/avatar_user/<?php echo $row['avatar'] == "" ? "avatar.jpeg" : $row['avatar']; ?>" alt="">
                                <div class="team-content">
                                    <h3 class="title"><?php echo $row['fullname'] == "" ? $row['username'] : $row['fullname']; ?></h3> <span class="post">Khách hàng</span>
                                </div>
                                <ul class="social">
                                    <li>
                                        <a href="" class="fab fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="" class="fab fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="" class="fab fa-google-plus"></a>
                                    </li>
                                    <li>
                                        <a href="" class="fab fa-youtube"></a>
                                    </li>
                                </ul>
                                <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                            </div>
                            <div class="team-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                            </div>
                            <hr class="my-0">
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-8 mb-3">
                        <div class="checkout-address">
                            <?php if (!isset($_GET['act'])) { ?>
                                <div class="title-left">
                                    <h1><b>Thông tin tài khoản</b></h1>
                                </div>
                                <table width="100%" class="needs-validation">
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 40%;"><label>Họ và tên: </label></th>
                                        <td class="p-2"><?php echo $row['fullname'] == "" ? "(Chưa cập nhập)" : $row['fullname']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 40%;"><label>Sđt: </label></th>
                                        <td class="p-2"><?php echo $row['phone'] == "" ? "(Chưa cập nhập)" : $row['phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 40%;"><label>Email: </label></th>
                                        <td class="p-2"><?php echo $row['email'] == "" ? "(Chưa cập nhập)" : $row['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 40%;"><label>Địa chỉ: </label></th>
                                        <td class="p-2"><?php echo $row['address'] == "" ? "(Chưa cập nhập)" : $row['address']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 40%;"><label>Stk: </label></th>
                                        <td class="p-2"><?php echo $row['stk'] == "" ? "(Chưa cập nhập)" : $row['stk']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="p-2 pl-5" style="width: 40%;"><label>Ngân hàng: </label></th>
                                        <td class="p-2"><?php echo $row['bank'] == "" ? "(Chưa cập nhập)" : $row['bank']; ?></td>
                                    </tr>
                                </table>
                                <hr class="mb-4">
                            <?php } ?>
                            <?php if (isset($_GET['act']) && $_GET['act'] == "updateprofile") { ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <?php
                                    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : "";
                                    $address = isset($_POST['address']) ? $_POST['address'] : "";
                                    $avatar = isset($_FILES['avatar']) ? $_FILES['avatar'] : "";
                                    $err = [];
                                    if (isset($_POST['fullname'])) {
                                        if ($fullname == "") {
                                            array_push($err, 'Vui lòng nhập họ và tên');
                                        }
                                        if ($address == "") {
                                            array_push($err, 'Vui lòng nhập địa chỉ');
                                        }
                                        if ($_FILES['avatar']['error'] > 0) {
                                            // array_push($err, 'File Upload Bị Lỗi');
                                            $avatar = $row['avatar'];
                                        } else {
                                            // Upload file
                                            $file_name = $_FILES['avatar']['name'];
                                            $file_size = $_FILES['avatar']['size'];
                                            $file_path = $_FILES['avatar']['tmp_name'];
                                            $file_type = $_FILES['avatar']['type'];
                                            if (strlen(strstr($file_type, 'image')) > 0) {
                                                if ((round($file_size / 1014, 0)) <= 10240) {
                                                    $now = DateTime::createFromFormat('U.u', microtime(true));
                                                    $result = $now->format("m_d_Y_H_i_s_u");
                                                    $krr    = explode('_', $result);
                                                    $result = implode("", $krr);
                                                    // echo $result;
                                                    move_uploaded_file($_FILES['avatar']['tmp_name'], '../assets/img/upload/avatar_user/' . $result . $file_name);
                                                    $avatar = $result . $file_name;
                                                } else {
                                                    array_push($err, 'Vui lòng nhập file < 10MB');
                                                }
                                            } else {
                                                array_push($err, 'Vui lòng nhập file định dạng là ảnh');
                                            }
                                        }
                                    }
                                    if (isset($_POST['fullname']) && count($err) == 0) {
                                        $fullname = htmlspecialchars(addslashes(trim($fullname)));
                                        $address = htmlspecialchars(addslashes(trim($address)));
                                        $avatar = htmlspecialchars(addslashes(trim($avatar)));
                                        $user->updateProfileUser($_SESSION['login_user']['id_user'], $fullname, $address, $avatar);
                                        echo "<meta http-equiv='refresh' content='0;url=my-account.php'>";
                                        exit;
                                    }
                                    ?>
                                    <div class="title-left">
                                        <h1><b>Cập nhập thông tin tài khoản</b></h1>
                                    </div>
                                    <table width="100%" class="needs-validation">
                                        <tr>
                                            <th class="p-2 pl-4" style="width: 30%;"><label>Họ và tên: </label></th>
                                            <td class="p-2"><input class="form-control" pattern="[^'\x22-]+" title="Không hợp lệ" value="<?php echo $row['fullname'] == "" ? $fullname : $row['fullname'] ?>" name="fullname" type="text"></td>
                                        </tr>
                                        <tr>
                                            <th class="p-2 pl-4" style="width: 30%;"><label>Địa chỉ: </label></th>
                                            <td class="p-2"><input class="form-control" pattern="[^'\x22-]+" title="Không hợp lệ" value="<?php echo $row['address'] == "" ? $address : $row['address'] ?>" name="address" type="text"></td>
                                        </tr>
                                        <tr>
                                            <th class="p-2 pl-4" style="width: 30%;"><label>Avatar: </label></th>
                                            <td class="p-2"><input class="form-control" name="avatar" type="file"></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td class="p-2">
                                                <?php if (count($err) > 0) { ?>
                                                    <ul class="alert alert-danger">
                                                        <?php
                                                        foreach ($err as $value) {
                                                        ?>
                                                            <li><?php echo $value ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                                <button class="ml-auto btn hvr-hover text-white">Cập nhập</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr class="mb-4">
                                </form>

                            <?php } ?>
                            <?php if (isset($_GET['act']) && $_GET['act'] == "changepassword") { ?>
                                <form action="" method="post">
                                    <?php
                                    $mk = isset($_POST['mk']) ? $_POST['mk'] : "";
                                    $conf_mk = isset($_POST['conf_mk']) ? $_POST['conf_mk'] : "";
                                    $err = [];
                                    if (isset($_POST['mk'])) {
                                        if ($mk == "") {
                                            array_push($err, 'Vui lòng nhập mật khẩu');
                                        }
                                        if ($conf_mk == "") {
                                            array_push($err, 'Vui lòng nhập xác nhận mật khẩu');
                                        } else {
                                            if ($mk != $conf_mk) {
                                                array_push($err, 'Xác nhận mật khẩu chưa chính xác');
                                            }
                                        }
                                    }
                                    if (isset($_POST['mk']) && count($err) == 0) {
                                        $mk = md5(htmlspecialchars(addslashes(trim($mk))));
                                        $user->changePasswordUser($_SESSION['login_user']['id_user'], $mk);
                                        echo "<meta http-equiv='refresh' content='0;url=my-account.php'>";
                                        exit;
                                    }
                                    ?>
                                    <div class="title-left">
                                        <h1><b>Thay đổi mật khẩu</b></h1>
                                    </div>
                                    <table width="100%" class="needs-validation">
                                        <tr>
                                            <th class="p-2 pl-4" style="width: 30%;"><label>Mật khẩu mới: </label></th>
                                            <td class="p-2"><input value="<?php echo $mk ?>" class="form-control" name="mk" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên"></td>
                                        </tr>
                                        <tr>
                                            <th class="p-2 pl-4" style="width: 30%;"><label>Xác nhận mật khẩu mới: </label></th>
                                            <td class="p-2"><input class="form-control" name="conf_mk" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ hoa và chữ thường và ít nhất 8 ký tự trở lên"></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td class="p-2">
                                                <?php if (count($err) > 0) { ?>
                                                    <ul class="alert alert-danger">
                                                        <?php
                                                        foreach ($err as $value) {
                                                        ?>
                                                            <li><?php echo $value ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                                <button class="ml-auto btn hvr-hover text-white">Cập nhập</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr class="mb-4">
                                </form>

                            <?php } ?>
                            <?php if (isset($_GET['act']) && $_GET['act'] == "updatebanking") { ?>
                                <form action="" method="post">
                                    <?php
                                    $stk = isset($_POST['stk']) ? $_POST['stk'] : "";
                                    $bank = isset($_POST['bank']) ? $_POST['bank'] : "";
                                    $err = [];
                                    if (isset($_POST['stk'])) {
                                        if ($stk == "") {
                                            array_push($err, 'Vui lòng nhập số tài khoản');
                                        }
                                        if ($bank == "") {
                                            array_push($err, 'Vui lòng nhập ngân hàng');
                                        }
                                    }
                                    if (isset($_POST['stk']) && count($err) == 0) {
                                        $stk = htmlspecialchars(addslashes(trim($stk)));
                                        $bank = htmlspecialchars(addslashes(trim($bank)));
                                        $user->updateBankingUser($_SESSION['login_user']['id_user'], $stk, $bank);
                                        echo "<meta http-equiv='refresh' content='0;url=my-account.php'>";
                                        exit;
                                    }
                                    ?>
                                    <div class="title-left">
                                        <h1><b>Cập nhật thông tin ngân hàng</b></h1>
                                    </div>
                                    <table width="100%" class="needs-validation">
                                        <tr>
                                            <th class="p-2 pl-4" style="width: 30%;"><label>Stk: </label></th>
                                            <td class="p-2"><input name="stk" pattern="[^'\x22-]+" title="Không hợp lệ" value="<?php echo $row['stk'] == "" ? $stk : $row['stk'] ?>" class="form-control" type="text"></td>
                                        </tr>
                                        <tr>
                                            <th class="p-2 pl-4" style="width: 30%;"><label>Ngân hàng: </label></th>
                                            <td class="p-2"><input name="bank" pattern="[^'\x22-]+" title="Không hợp lệ" value="<?php echo $row['bank'] == "" ? $bank : $row['bank'] ?>" class="form-control" type="text"></td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td class="p-2">
                                                <?php if (count($err) > 0) { ?>
                                                    <ul class="alert alert-danger">
                                                        <?php
                                                        foreach ($err as $value) {
                                                        ?>
                                                            <li><?php echo $value ?></li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                                <button class="ml-auto btn hvr-hover text-white">Cập nhập</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr class="mb-4">
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="bottom-box">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="account-box">
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="my-account.php?act=history"> <i class="fa fa-gift"></i> </a>
                            </div>
                            <div class="service-desc">
                                <h4>Lịch sử giao dịch</h4>
                                <p>Kiểm tra giao dịch</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="account-box">
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="my-account.php?act=changepassword"><i class="fa fa-lock"></i> </a>
                            </div>
                            <div class="service-desc">
                                <h4>Bảo mật</h4>
                                <p>Thay đổi mật khẩu</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="account-box">
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="my-account.php?act=updateprofile"> <i class="fa fa-location-arrow"></i> </a>
                            </div>
                            <div class="service-desc">
                                <h4>Tài khoản</h4>
                                <p>Cập nhập tài khoản</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="account-box">
                        <div class="service-box">
                            <div class="service-icon">
                                <a href="my-account.php?act=updatebanking"> <i class="fa fa-credit-card"></i> </a>
                            </div>
                            <div class="service-desc">
                                <h4>Thanh toán</h4>
                                <p>Cập nhật Stk Ngân hàng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End My Account -->
<?php include_once('../part/footer.php'); ?>