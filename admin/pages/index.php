<?php

use function PHPSTORM_META\elementType;

session_start();
// print_r($_SESSION['login_admin']);
if (!isset($_SESSION['login_admin'])) {
    // echo "<meta http-equiv='refresh' content='0;url=../../pages/login-admin.php'>";
    header("location: ../../pages/login-admin.php");
    exit;
}
$id_admin = $_SESSION['login_admin']['id_admin']; //đặt tạm

?>
<?php include_once('../../lib/db.php'); ?>
<?php include_once('../../lib/function.php'); ?>
<?php include_once('../../lib/category.class.php'); ?>
<?php include_once('../../lib/administrator.class.php'); ?>
<?php include_once('../../lib/role.class.php'); ?>
<?php include_once('../../lib/product.class.php'); ?>
<<<<<<< HEAD
<?php 
$category = new Category;
$administrator = new Administrator;
$product = new Product;
=======
<?php include_once('../../lib/user.class.php'); ?>
<?php include_once('../../lib/bill.class.php'); ?>
<?php include_once('../../lib/coupon.class.php'); ?>
<?php include_once('../../lib/evalution.class.php'); ?>
<?php include_once('../../lib/comment.class.php'); ?>
<?php include_once('../../lib/contact.class.php'); ?>
<?php
$category = new Category;
$administrator = new Administrator;
$product = new Product;
$user = new User;
$bill = new Bill;
$coupon = new Coupon;
$evalution = new Evalution;
$comment = new Comment;
$contact = new Contact;
if (!isset($_SESSION['alert'])) {
    $_SESSION['alert'] = "";
}
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
?>
<?php include_once('../part/header.php'); ?>


<?php
$control = isset($_GET['control']) ? $_GET['control'] : "";
switch ($control) {
    case 'category':
<<<<<<< HEAD
        if($_SESSION['login_admin']['id_role']!=3){
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $name_cate = isset($_POST['name_cate']) ? $_POST['name_cate'] : "";
        if (isset($_POST['name_cate']) && $name_cate != "") {
            $category->insertCategory($name_cate, $id_admin);
=======
        if ($_SESSION['login_admin']['id_role'] == 3) {
            $name_cate = isset($_POST['name_cate']) ? $_POST['name_cate'] : "";
            if (isset($_POST['add-cate']) && isset($_POST['name_cate']) && $name_cate != "") {
                $category->insertCategory($name_cate, $id_admin);
                $_SESSION['alert'] = "Thêm mới danh mục thành công";
            }
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
        }
        include('category.php');
        break;

    case 'deletecategory':
<<<<<<< HEAD
        if($_SESSION['login_admin']['id_role']!=3){
=======
        if ($_SESSION['login_admin']['id_role'] != 3) {
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $id_cate = isset($_GET['id_cate']) ? $_GET['id_cate'] : "";
        $row = $category->getCateId($id_cate);
        if ($_SESSION['login_admin']['id_admin'] != $row['id_admin']) {
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }

        if ($id_cate != "") {
            $category->deleteCategoryId($id_cate, $id_admin);
            $_SESSION['alert'] = "Xóa danh mục thành công";
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=category'>";
            exit;
        }
        break;

    case 'editcategory':
<<<<<<< HEAD
        if($_SESSION['login_admin']['id_role']!=3){
=======
        if ($_SESSION['login_admin']['id_role'] != 3) {
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $id_cate = isset($_GET['id_cate']) ? $_GET['id_cate'] : "";
        $row = $category->getCateId($id_cate);
        if ($_SESSION['login_admin']['id_admin'] != $row['id_admin']) {
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $name_cate_update = isset($_POST['name_cate_update']) ? $_POST['name_cate_update'] : "";
        if ($id_cate != "" && $name_cate_update != "") {
            $category->editCateId($id_cate, $name_cate_update, $id_admin);
            $_SESSION['alert'] = "Sửa danh mục thành công";
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=category'>";
            exit;
<<<<<<< HEAD
        } else {
            // echo "<meta http-equiv='refresh' content='0;url=../../../../pages/404.php'>";
=======
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
        }
        include('category.php');
        break;

    case 'administrator':
<<<<<<< HEAD
        if($_SESSION['login_admin']['id_role']!=1 && $_SESSION['login_admin']['id_role']!=2){
=======
        if ($_SESSION['login_admin']['id_role'] != 1 && $_SESSION['login_admin']['id_role'] != 2) {
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        include('administrator.php');
        break;

    case 'addadmin':
<<<<<<< HEAD
        if($_SESSION['login_admin']['id_role']!=1){
=======
        if ($_SESSION['login_admin']['id_role'] != 1) {
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $mk = isset($_POST['mk']) ? $_POST['mk'] : "";
        $conf_mk = isset($_POST['conf_mk']) ? $_POST['conf_mk'] : "";
        $id_role = isset($_POST['id_role']) ? $_POST['id_role'] : "";
        $err = [];
        $count = $administrator->checkUsername($username);

        if (isset($_POST['username'])) {
            if ($username == "") {
                array_push($err, 'Vui lòng nhập tên tài khoản');
            }
            if ($count != 0) {
                array_push($err, 'Tên tài khoản đã tồn tại');
            }
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
        if (isset($_POST['username']) && count($err) == 0 && $count == 0) {
            $username = htmlspecialchars(addslashes(trim($username)));
            $mk = md5(htmlspecialchars(addslashes(trim($mk))));
            $id_role = htmlspecialchars(addslashes(trim($id_role)));
            $administrator->insertAdmin($username, $mk, $id_role);
            $_SESSION['alert'] = "Thêm mới admin thành công";
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=administrator'>";
            exit;
        }
        include('administrator.php');
        break;

    case 'deleteadmin':
<<<<<<< HEAD
        if($_SESSION['login_admin']['id_role']!=1){
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $id_admin = isset($_GET['id_admin']) ? $_GET['id_admin'] : "";
        if ($id_admin != "") {
            $administrator->deleteAdminId($id_admin);
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=administrator'>";
            exit;
        } else {
            // echo "<meta http-equiv='refresh' content='0;url=../../../../pages/404.php'>";
=======
        if ($_SESSION['login_admin']['id_role'] != 1) {
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $id_admin_get = isset($_GET['id_admin']) ? $_GET['id_admin'] : "";
        if ($id_admin_get != "") {
            $administrator->deleteAdminId($id_admin_get);
            $_SESSION['alert'] = "Xóa admin thành công";
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=administrator'>";
            exit;
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
        }
        break;

    case 'editadmin':
<<<<<<< HEAD
        if($_SESSION['login_admin']['id_role']!=1){
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $id_admin = isset($_GET['id_admin']) ? $_GET['id_admin'] : "";
        $row = $administrator->getAdminId($id_admin);
=======
        if ($_SESSION['login_admin']['id_role'] != 1) {
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $id_admin_get = isset($_GET['id_admin']) ? $_GET['id_admin'] : "";
        $row = $administrator->getAdminId($id_admin_get);
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69

        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $mk = isset($_POST['mk']) ? $_POST['mk'] : "";
        $conf_mk = isset($_POST['conf_mk']) ? $_POST['conf_mk'] : "";
        $id_role = isset($_POST['id_role']) ? $_POST['id_role'] : "";
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
            $id_role = htmlspecialchars(addslashes(trim($id_role)));
            $administrator->editAdminId($id_admin_get, $mk, $id_role);
            $_SESSION['alert'] = "Sửa thông tin admin thành công";
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=administrator'>";
            exit;
        }
        include('administrator.php');
        break;

<<<<<<< HEAD
=======
    case 'coupon':
        include('coupon.php');
        break;

    case 'addcoupon':
        if ($_SESSION['login_admin']['id_role'] != 3) {
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $code_coupon = isset($_POST['code_coupon']) ? $_POST['code_coupon'] : "";
        $discount = isset($_POST['discount']) ? $_POST['discount'] : "";
        $time_start = isset($_POST['time_start']) ? $_POST['time_start'] : "";
        $time_end = isset($_POST['time_end']) ? $_POST['time_end'] : "";
        $err = [];
        if (isset($_POST['code_coupon'])) {
            if ($code_coupon == "") {
                array_push($err, 'Vui lòng nhập mã giảm giá');
            }
            if ($time_start == "") {
                array_push($err, 'Vui lòng nhập Thời gian bắt đầu');
            }
            if ($time_end == "") {
                array_push($err, 'Vui lòng nhập Thời gian kết thúc');
            }
            if ($time_end < $time_start) {
                array_push($err, 'Thời gian kết thúc phải lớn hơn Thời gian bắt đầu');
            }
        }
        $code_coupon = htmlspecialchars(addslashes(trim($code_coupon)));

        $checkCodeCoupon = $coupon->checkCodeCoupon($code_coupon);

        if ($checkCodeCoupon > 0) {
            $_SESSION['alert'] = "Mã khuyến mãi đã tồn tại";
        }

        if (isset($_POST['code_coupon']) && count($err) == 0 && $checkCodeCoupon == 0) {
            $time_start = htmlspecialchars(addslashes(trim($time_start)));
            $time_end = htmlspecialchars(addslashes(trim($time_end)));
            $discount = htmlspecialchars(addslashes(trim($discount / 100)));
            $id_admin = $_SESSION['login_admin']['id_admin'];
            $coupon->insertCoupon($code_coupon, $discount, $time_start, $time_end, $id_admin);
            $_SESSION['alert'] = "Thêm mới mã khuyến mãi thành công";
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=coupon'>";
            exit;
        }

        include('coupon.php');
        break;

    case 'deletecoupon':
        if ($_SESSION['login_admin']['id_role'] != 3) {
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }

        $id_coupon = isset($_GET['id_coupon']) ? $_GET['id_coupon'] : "";
        $row = $coupon->getCouponId($id_coupon);

        if ($_SESSION['login_admin']['id_admin'] != $row['id_admin']) {
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }

        if ($id_coupon != "") {
            $coupon->deleteCouponId($id_coupon, $id_admin);
            $_SESSION['alert'] = "Xóa mã khuyến mãi thành công";
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=coupon'>";
            exit;
        }
        break;

    case 'editcoupon':
        if ($_SESSION['login_admin']['id_role'] != 3) {
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $id_coupon = isset($_GET['id_coupon']) ? $_GET['id_coupon'] : "";
        $row = $coupon->getCouponId($id_coupon);
        if ($_SESSION['login_admin']['id_admin'] != $row['id_admin']) {
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $code_coupon = isset($_POST['code_coupon']) ? $_POST['code_coupon'] : "";
        $discount = isset($_POST['discount']) ? $_POST['discount'] : "";
        $time_start = isset($_POST['time_start']) ? $_POST['time_start'] : "";
        $time_end = isset($_POST['time_end']) ? $_POST['time_end'] : "";
        $err = [];
        if (isset($_POST['code_coupon'])) {
            if ($code_coupon == "") {
                array_push($err, 'Vui lòng nhập mã giảm giá');
            }
            if ($time_start == "") {
                array_push($err, 'Vui lòng nhập Thời gian bắt đầu');
            }
            if ($time_end == "") {
                array_push($err, 'Vui lòng nhập Thời gian kết thúc');
            }
            if ($time_end < $time_start) {
                array_push($err, 'Thời gian kết thúc phải lớn hơn Thời gian bắt đầu');
            }
        }
        $code_coupon = htmlspecialchars(addslashes(trim($code_coupon)));

        $checkCodeCouponIdCoupon = $coupon->checkCodeCouponIdCoupon($code_coupon, $id_coupon);

        if ($checkCodeCouponIdCoupon > 0) {
            $_SESSION['alert'] = "Mã khuyến mãi đã tồn tại";
        }

        if (isset($_POST['code_coupon']) && count($err) == 0 && $checkCodeCouponIdCoupon == 0) {
            $time_start = htmlspecialchars(addslashes(trim($time_start)));
            $time_end = htmlspecialchars(addslashes(trim($time_end)));
            $discount = htmlspecialchars(addslashes(trim($discount / 100)));
            $id_admin = $_SESSION['login_admin']['id_admin'];
            $coupon->editCouponId($id_coupon, $code_coupon, $discount, $time_start, $time_end, $id_admin);
            $_SESSION['alert'] = "Sửa thông tin mã khuyến mãi thành công";
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=coupon'>";
            exit;
        }

        include('coupon.php');
        break;

>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
    case 'product':
        include('product.php');
        break;

    case 'addproduct':
<<<<<<< HEAD
        if($_SESSION['login_admin']['id_role']!=3){
=======
        if ($_SESSION['login_admin']['id_role'] != 3) {
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $name_prd = isset($_POST['name_prd']) ? $_POST['name_prd'] : "";
        $id_cate = isset($_POST['id_cate']) ? $_POST['id_cate'] : "";
        $cost = isset($_POST['cost']) ? $_POST['cost'] : "";
        $price = isset($_POST['price']) ? $_POST['price'] : "";
        $quanlity = isset($_POST['quanlity']) ? $_POST['quanlity'] : "";
        $detail = isset($_POST['detail']) ? $_POST['detail'] : "";
        $img_prd_1 = isset($_FILES['img_prd_1']) ? $_FILES['img_prd_1'] : "";
        $img_prd_2 = isset($_FILES['img_prd_2']) ? $_FILES['img_prd_2'] : "";
        $img_prd_3 = isset($_FILES['img_prd_3']) ? $_FILES['img_prd_3'] : "";
        $err = [];

        if (isset($_POST['name_prd'])) {
            if ($name_prd == "") {
                array_push($err, 'Vui lòng nhập tên sản phẩm');
            }
            if ($cost == "") {
                array_push($err, 'Vui lòng nhập Giá sản phẩm');
            }
            if ($price == "") {
                array_push($err, 'Vui lòng nhập Giá bán hiện tại');
            }
            if ($price > $cost) {
                array_push($err, 'Giá bán hiện tại phải nhỏ hơn hoặc bằng Giá sản phẩm');
            }
            if ($quanlity == "") {
                array_push($err, 'Vui lòng nhập số lượng');
            }
            if ($detail == "") {
                array_push($err, 'Vui lòng nhập mô tả sản phẩm');
            }

            if ($_FILES['img_prd_1']['error'] > 0) {
                array_push($err, 'File Upload Bị Lỗi');
            } else {
                // Upload file
                $file_name = $_FILES['img_prd_1']['name'];
                $file_size = $_FILES['img_prd_1']['size'];
                $file_path = $_FILES['img_prd_1']['tmp_name'];
                $file_type = $_FILES['img_prd_1']['type'];
                if (strlen(strstr($file_type, 'image')) > 0) {
                    if ((round($file_size / 1014, 0)) <= 10240) {
                        $now = DateTime::createFromFormat('U.u', microtime(true));
                        $result = $now->format("m_d_Y_H_i_s_u");
                        $krr    = explode('_', $result);
                        $result = implode("", $krr);
                        // echo $result;
                        move_uploaded_file($_FILES['img_prd_1']['tmp_name'], '../../assets/img/upload/img_product/' . $result . $file_name);
                        $img_prd_1 = $result . $file_name;
                    } else {
                        array_push($err, 'Vui lòng nhập file < 10MB');
                    }
                } else {
                    array_push($err, 'Vui lòng nhập file định dạng là ảnh');
                }
            }
            if ($_FILES['img_prd_2']['error'] > 0) {
                array_push($err, 'File Upload Bị Lỗi');
            } else {
                // Upload file
                $file_name = $_FILES['img_prd_2']['name'];
                $file_size = $_FILES['img_prd_2']['size'];
                $file_path = $_FILES['img_prd_2']['tmp_name'];
                $file_type = $_FILES['img_prd_2']['type'];
                if (strlen(strstr($file_type, 'image')) > 0) {
                    if ((round($file_size / 1014, 0)) <= 10240) {
                        $now = DateTime::createFromFormat('U.u', microtime(true));
                        $result = $now->format("m_d_Y_H_i_s_u");
                        $krr    = explode('_', $result);
                        $result = implode("", $krr);
                        // echo $result;
                        move_uploaded_file($_FILES['img_prd_2']['tmp_name'], '../../assets/img/upload/img_product/' . $result . $file_name);
                        $img_prd_2 = $result . $file_name;
                    } else {
                        array_push($err, 'Vui lòng nhập file < 10MB');
                    }
                } else {
                    array_push($err, 'Vui lòng nhập file định dạng là ảnh');
                }
            }
            if ($_FILES['img_prd_3']['error'] > 0) {
                array_push($err, 'File Upload Bị Lỗi');
            } else {
                // Upload file
                $file_name = $_FILES['img_prd_3']['name'];
                $file_size = $_FILES['img_prd_3']['size'];
                $file_path = $_FILES['img_prd_3']['tmp_name'];
                $file_type = $_FILES['img_prd_3']['type'];
                if (strlen(strstr($file_type, 'image')) > 0) {
                    if ((round($file_size / 1014, 0)) <= 10240) {
                        $now = DateTime::createFromFormat('U.u', microtime(true));
                        $result = $now->format("m_d_Y_H_i_s_u");
                        $krr    = explode('_', $result);
                        $result = implode("", $krr);
                        // echo $result;
                        move_uploaded_file($_FILES['img_prd_3']['tmp_name'], '../../assets/img/upload/img_product/' . $result . $file_name);
                        $img_prd_3 = $result . $file_name;
                    } else {
                        array_push($err, 'Vui lòng nhập file < 10MB');
                    }
                } else {
                    array_push($err, 'Vui lòng nhập file định dạng là ảnh');
                }
            }
        }
        if (isset($_POST['name_prd']) && count($err) == 0) {
            $name_prd = htmlspecialchars(addslashes(trim($name_prd)));
            $id_cate = htmlspecialchars(addslashes(trim($id_cate)));
            $cost = htmlspecialchars(addslashes(trim($cost)));
            $price = htmlspecialchars(addslashes(trim($price)));
            $quanlity = htmlspecialchars(addslashes(trim($quanlity)));
            $detail = htmlspecialchars(addslashes(trim($detail)));
            $img_prd_1 = htmlspecialchars(addslashes(trim($img_prd_1)));
            $img_prd_2 = htmlspecialchars(addslashes(trim($img_prd_2)));
            $img_prd_3 = htmlspecialchars(addslashes(trim($img_prd_3)));
            $product->insertProduct($name_prd, $id_cate, $img_prd_1, $img_prd_2, $img_prd_3, $detail, $cost, $price, $quanlity, $id_admin);
            $_SESSION['alert'] = "Thêm mới sản phẩm thành công";
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=product'>";
            exit;
        }
        include('product.php');
        break;

    case 'editproduct':
<<<<<<< HEAD
        if($_SESSION['login_admin']['id_role']!=3){
=======
        if ($_SESSION['login_admin']['id_role'] != 3) {
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $id_prd = isset($_GET['id_prd']) ? $_GET['id_prd'] : "";
        $row = $product->getProductId($id_prd);
<<<<<<< HEAD
=======
        if ($_SESSION['login_admin']['id_admin'] != $row['id_admin']) {
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
        $name_prd = isset($_POST['name_prd']) ? $_POST['name_prd'] : "";
        $id_cate = isset($_POST['id_cate']) ? $_POST['id_cate'] : "";
        $cost = isset($_POST['cost']) ? $_POST['cost'] : "";
        $price = isset($_POST['price']) ? $_POST['price'] : "";
        $quanlity = isset($_POST['quanlity']) ? $_POST['quanlity'] : "";
        $detail = isset($_POST['detail']) ? $_POST['detail'] : "";
        $img_prd_1 = isset($_FILES['img_prd_1']) ? $_FILES['img_prd_1'] : "";
        $img_prd_2 = isset($_FILES['img_prd_2']) ? $_FILES['img_prd_2'] : "";
        $img_prd_3 = isset($_FILES['img_prd_3']) ? $_FILES['img_prd_3'] : "";
        $err = [];

        if (isset($_POST['name_prd'])) {
            if ($name_prd == "") {
                array_push($err, 'Vui lòng nhập tên sản phẩm');
            }
            if ($cost == "") {
                array_push($err, 'Vui lòng nhập Giá sản phẩm');
            }
            if ($price == "") {
                array_push($err, 'Vui lòng nhập Giá bán hiện tại');
            }
            if ($price > $cost) {
                array_push($err, 'Giá bán hiện tại phải nhỏ hơn hoặc bằng Giá sản phẩm');
            }
            if ($quanlity == "") {
                array_push($err, 'Vui lòng nhập số lượng');
            }
            if ($detail == "") {
                array_push($err, 'Vui lòng nhập mô tả sản phẩm');
            }
            if ($_FILES['img_prd_1']['error'] > 0) {
                // array_push($err, 'File Upload Bị Lỗi');
                $img_prd_1 = $row['img_prd_1'];
            } else {
                // Upload file
                $file_name = $_FILES['img_prd_1']['name'];
                $file_size = $_FILES['img_prd_1']['size'];
                $file_path = $_FILES['img_prd_1']['tmp_name'];
                $file_type = $_FILES['img_prd_1']['type'];
                if (strlen(strstr($file_type, 'image')) > 0) {
                    if ((round($file_size / 1014, 0)) <= 10240) {
                        $now = DateTime::createFromFormat('U.u', microtime(true));
                        $result = $now->format("m_d_Y_H_i_s_u");
                        $krr    = explode('_', $result);
                        $result = implode("", $krr);
                        // echo $result;
                        move_uploaded_file($_FILES['img_prd_1']['tmp_name'], '../../assets/img/upload/img_product/' . $result . $file_name);
                        $img_prd_1 = $result . $file_name;
                    } else {
                        array_push($err, 'Vui lòng nhập file < 10MB');
                    }
                } else {
                    array_push($err, 'Vui lòng nhập file định dạng là ảnh');
                }
            }
            if ($_FILES['img_prd_2']['error'] > 0) {
                // array_push($err, 'File Upload Bị Lỗi');
                $img_prd_2 = $row['img_prd_2'];
            } else {
                // Upload file
                $file_name = $_FILES['img_prd_2']['name'];
                $file_size = $_FILES['img_prd_2']['size'];
                $file_path = $_FILES['img_prd_2']['tmp_name'];
                $file_type = $_FILES['img_prd_2']['type'];
                if (strlen(strstr($file_type, 'image')) > 0) {
                    if ((round($file_size / 1014, 0)) <= 10240) {
                        $now = DateTime::createFromFormat('U.u', microtime(true));
                        $result = $now->format("m_d_Y_H_i_s_u");
                        $krr    = explode('_', $result);
                        $result = implode("", $krr);
                        // echo $result;
                        move_uploaded_file($_FILES['img_prd_2']['tmp_name'], '../../assets/img/upload/img_product/' . $result . $file_name);
                        $img_prd_2 = $result . $file_name;
                    } else {
                        array_push($err, 'Vui lòng nhập file < 10MB');
                    }
                } else {
                    array_push($err, 'Vui lòng nhập file định dạng là ảnh');
                }
            }
            if ($_FILES['img_prd_3']['error'] > 0) {
                // array_push($err, 'File Upload Bị Lỗi');
                $img_prd_3 = $row['img_prd_3'];
            } else {
                // Upload file
                $file_name = $_FILES['img_prd_3']['name'];
                $file_size = $_FILES['img_prd_3']['size'];
                $file_path = $_FILES['img_prd_3']['tmp_name'];
                $file_type = $_FILES['img_prd_3']['type'];
                if (strlen(strstr($file_type, 'image')) > 0) {
                    if ((round($file_size / 1014, 0)) <= 10240) {
                        $now = DateTime::createFromFormat('U.u', microtime(true));
                        $result = $now->format("m_d_Y_H_i_s_u");
                        $krr    = explode('_', $result);
                        $result = implode("", $krr);
                        // echo $result;
                        move_uploaded_file($_FILES['img_prd_3']['tmp_name'], '../../assets/img/upload/img_product/' . $result . $file_name);
                        $img_prd_3 = $result . $file_name;
                    } else {
                        array_push($err, 'Vui lòng nhập file < 10MB');
                    }
                } else {
                    array_push($err, 'Vui lòng nhập file định dạng là ảnh');
                }
            }
        }

        if (isset($_POST['name_prd']) && count($err) == 0) {
            $name_prd = htmlspecialchars(addslashes(trim($name_prd)));
            $id_cate = htmlspecialchars(addslashes(trim($id_cate)));
            $cost = htmlspecialchars(addslashes(trim($cost)));
            $price = htmlspecialchars(addslashes(trim($price)));
            $quanlity = htmlspecialchars(addslashes(trim($quanlity)));
            $detail = htmlspecialchars(addslashes(trim($detail)));
            $img_prd_1 = htmlspecialchars(addslashes(trim($img_prd_1)));
            $img_prd_2 = htmlspecialchars(addslashes(trim($img_prd_2)));
            $img_prd_3 = htmlspecialchars(addslashes(trim($img_prd_3)));
            $product->editProductId($id_prd, $name_prd, $id_cate, $img_prd_1, $img_prd_2, $img_prd_3, $detail, $cost, $price, $quanlity, $id_admin);
            $_SESSION['alert'] = "Sửa thông tin sản phẩm thành công";
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=product'>";
            exit;
        }
        include('product.php');
        break;

    case 'deleteproduct':
<<<<<<< HEAD
        if($_SESSION['login_admin']['id_role']!=3){
=======
        if ($_SESSION['login_admin']['id_role'] != 3) {
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }
        $id_prd = isset($_GET['id_prd']) ? $_GET['id_prd'] : "";
        $row = $product->getProductId($id_prd);
        if ($_SESSION['login_admin']['id_admin'] != $row['id_admin']) {
            echo "<meta http-equiv='refresh' content='0;url=index.php'>";
            exit;
        }

        if ($id_prd != "") {
            $product->deleteProductId($id_prd, $id_admin);
            $_SESSION['alert'] = "Xóa sản phẩm thành công";
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=product'>";
            exit;
<<<<<<< HEAD
        } else {
            // echo "<meta http-equiv='refresh' content='0;url=../../../../pages/404.php'>";
=======
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
        }
        break;

    case 'profile':
<<<<<<< HEAD
        $admin = $administrator->getAdminId($_SESSION['login_admin']['id_admin']);
=======
        $admin = $administrator->getAdminId($id_admin);
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
        include('profile.php');
        break;

    case 'updateprofile':
<<<<<<< HEAD
        $admin = $administrator->getAdminId($_SESSION['login_admin']['id_admin']);
=======
        $admin = $administrator->getAdminId($id_admin);
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
        $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : "";
        $name_brand = isset($_POST['name_brand']) ? $_POST['name_brand'] : "";
        $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $address = isset($_POST['address']) ? $_POST['address'] : "";
        $avatar = isset($_FILES['avatar']) ? $_FILES['avatar'] : "";
        $banner = isset($_FILES['banner']) ? $_FILES['banner'] : "";
<<<<<<< HEAD
        $err=[];

        if (isset($_POST['fullname'])){
            if($fullname==""){
                array_push($err, 'Vui lòng nhập họ và tên');
            }
            if($phone==""){
                array_push($err, 'Vui lòng nhập số điện thoại');
            }
            if($email==""){
                array_push($err, 'Vui lòng nhập email');
            }
            if($address==""){
                array_push($err, 'Vui lòng nhập địa chỉ');
            }
            if ($_FILES['avatar']['error'] > 0) {
                array_push($err, 'File Upload Bị Lỗi');
=======
        $err = [];

        if (isset($_POST['fullname'])) {
            if ($fullname == "") {
                array_push($err, 'Vui lòng nhập họ và tên');
            }
            if ($phone == "") {
                array_push($err, 'Vui lòng nhập số điện thoại');
            }
            if ($email == "") {
                array_push($err, 'Vui lòng nhập email');
            }
            if ($address == "") {
                array_push($err, 'Vui lòng nhập địa chỉ');
            }
            if ($_FILES['avatar']['error'] > 0) {
                // array_push($err, 'File Upload Bị Lỗi');
                $avatar = $admin['avatar'];
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
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
                        move_uploaded_file($_FILES['avatar']['tmp_name'], '../../assets/img/upload/avatar_admin/' . $result . $file_name);
                        $avatar = $result . $file_name;
                    } else {
                        array_push($err, 'Vui lòng nhập file < 10MB');
                    }
                } else {
                    array_push($err, 'Vui lòng nhập file định dạng là ảnh');
                }
            }
<<<<<<< HEAD
            if($banner!=""){
                if ($_FILES['banner']['error'] == 0){
                    // Upload file
                    $file_name = $_FILES['banner']['name'];
                    $file_size = $_FILES['banner']['size'];
                    $file_path = $_FILES['banner']['tmp_name'];
                    $file_type = $_FILES['banner']['type'];
                    if (strlen(strstr($file_type, 'image')) > 0) {
                        if ((round($file_size / 1014, 0)) <= 10240) {
                            $now = DateTime::createFromFormat('U.u', microtime(true));
                            $result = $now->format("m_d_Y_H_i_s_u");
                            $krr    = explode('_', $result);
                            $result = implode("", $krr);
                            // echo $result;
                            move_uploaded_file($_FILES['banner']['tmp_name'], '../../assets/img/upload/banner_store/' . $result . $file_name);
                            $banner = $result . $file_name;
                        }
                    }
                }
            }
            
        }
        if (isset($_POST['fullname']) && count($err) == 0){
=======
            if ($_FILES['banner']['error'] > 0) {
                // array_push($err, 'File Upload Bị Lỗi');
                $banner = $admin['banner'];
            } else {
                // Upload file
                $file_name = $_FILES['banner']['name'];
                $file_size = $_FILES['banner']['size'];
                $file_path = $_FILES['banner']['tmp_name'];
                $file_type = $_FILES['banner']['type'];
                if (strlen(strstr($file_type, 'image')) > 0) {
                    if ((round($file_size / 1014, 0)) <= 10240) {
                        $now = DateTime::createFromFormat('U.u', microtime(true));
                        $result = $now->format("m_d_Y_H_i_s_u");
                        $krr    = explode('_', $result);
                        $result = implode("", $krr);
                        // echo $result;
                        move_uploaded_file($_FILES['banner']['tmp_name'], '../../assets/img/upload/banner_store/' . $result . $file_name);
                        $banner = $result . $file_name;
                    } else {
                        array_push($err, 'Vui lòng nhập file < 10MB');
                    }
                } else {
                    array_push($err, 'Vui lòng nhập file định dạng là ảnh');
                }
            }
        }
        if (isset($_POST['fullname']) && count($err) == 0) {
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
            $fullname = htmlspecialchars(addslashes(trim($fullname)));
            $name_brand = htmlspecialchars(addslashes(trim($name_brand)));
            $phone = htmlspecialchars(addslashes(trim($phone)));
            $email = htmlspecialchars(addslashes(trim($email)));
            $address = htmlspecialchars(addslashes(trim($address)));
            $avatar = htmlspecialchars(addslashes(trim($avatar)));
            $banner = htmlspecialchars(addslashes(trim($banner)));
<<<<<<< HEAD
            $administrator->updateAdminId($_SESSION['login_admin']['id_admin'],$fullname,$name_brand, $phone, $email, $address, $avatar, $banner);
=======
            $administrator->updateAdminId($id_admin, $fullname, $name_brand, $phone, $email, $address, $avatar, $banner);
            $_SESSION['alert'] = "Cập nhập thông tin thành công";
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=profile'>";
            exit;
        }
        include('profile.php');
        break;

    case 'changepassword':
        $admin = $administrator->getAdminId($id_admin);
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
            $administrator->changePasswordAdmin($id_admin, $mk);
            $_SESSION['alert'] = "Đổi mật khẩu thành công";
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=profile'>";
            exit;
        }
        include('profile.php');
        break;

    case 'logout':
        session_unset();
        // print_r($_SESSION['login_admin']);
        echo "<meta http-equiv='refresh' content='0;url=../../pages/login-admin.php'>";
        exit;
<<<<<<< HEAD
=======
        break;

    case 'bill':
        if (isset($_POST['action_bill']) && isset($_POST['id_bill'])) {
            $id_bill = $_POST['id_bill'];
            $id_admin = $_SESSION['login_admin']['id_admin'];
            $rows = $bill->getBillDetailId($id_bill);
            $flag=0;
            $prd_err="";
            foreach ($rows as $row) {
                if($row['quanlity'] > $product->getProductId($row['id_prd'])['quanlity']){
                    $flag=1;
                    $prd_err = $prd_err.$row['id_prd']." ";
                }
            }
            if($flag == 0){
                foreach ($rows as $row) {
                    $id_prd = $row['id_prd'];
                    $quanlity = $product->getProductId($id_prd)['quanlity'] - $row['quanlity'];
                    $product->editQuanlityProductId($id_prd, $quanlity);
                }
                $bill->actionBill($id_bill, $id_admin);
                $_SESSION['alert'] = "Xử lý đơn hàng thành công";
            }else{
                $_SESSION['alert'] = "Xử lý đơn hàng thất bại. Sản phẩm ID ".$prd_err." không đủ tồn kho";
            }
            
        }
        include('bill.php');
        break;

    case 'comment':
        if(isset($_POST['delete_cmt'])){
            $id_cmt = $_POST['id_cmt'];
            $comment->deleteComment($id_cmt);
        }
        include('comment.php');
        break;

    case 'contact':
        if(isset($_POST['delete_contact'])){
            $id_contact = $_POST['id_contact'];
            $contact->deleteContact($id_contact);
        }
        include('contact.php');
        break;

    case 'store':
        include('../dashboard/store.php');
>>>>>>> 6d2ed111b7f00328b5e66f18533e7da0b6e94a69
        break;

    default:
        include('../dashboard/index.php');
        break;
}

include_once('../part/footer.php');
?>
