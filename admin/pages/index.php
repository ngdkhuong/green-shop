<?php
session_start();
// print_r($_SESSION['login_admin']);
if (!isset($_SESSION['login_admin'])) {
    // echo "<meta http-equiv='refresh' content='0;url=../../pages/login-admin.php'>";
    header("location: ../pages/login-admin.php");
    exit;
}
?>
<?php include_once('../../lib/db.php'); ?>
<?php include_once('../../lib/category.class.php'); ?>
<?php include_once('../../lib/administrator.class.php'); ?>
<?php include_once('../../lib/role.class.php'); ?>
<?php include_once('../../lib/product.class.php'); ?>
<?php include_once('../part/header.php'); ?>


<?php
$id_admin = $_SESSION['login_admin']['id_admin']; //đặt tạm
$category = new Category;
$administrator = new Administrator;
$product = new Product;
$control = isset($_GET['control']) ? $_GET['control'] : "";

switch ($control) {
    case 'category':
        $name_cate = isset($_POST['name_cate']) ? $_POST['name_cate'] : "";
        if (isset($_POST['name_cate']) && $name_cate != "") {
            $category->insertCategory($name_cate, $id_admin);
        }
        include('category.php');
        break;

    case 'deletecategory':
        $id_cate = isset($_GET['id_cate']) ? $_GET['id_cate'] : "";
        if ($id_cate != "") {
            $category->deleteCategoryId($id_cate, $id_admin);
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=category'>";
        } else {
            echo "<meta http-equiv='refresh' content='0;url=../../../../pages/404.php'>";
        }
        break;

    case 'editcategory':
        $id_cate = isset($_GET['id_cate']) ? $_GET['id_cate'] : "";
        $name_cate_update = isset($_POST['name_cate_update']) ? $_POST['name_cate_update'] : "";
        if ($id_cate != "" && $name_cate_update != "") {
            $category->editCateId($id_cate, $name_cate_update, $id_admin);
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=category'>";
            break;
        } else {
            // echo "<meta http-equiv='refresh' content='0;url=../../../../pages/404.php'>";
        }
        include('category.php');
        break;

    case 'administrator':
        include('administrator.php');
        break;

    case 'addadmin':
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
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=administrator'>";
            break;
        }
        include('administrator.php');
        break;

    case 'deleteadmin':
        $id_admin = isset($_GET['id_admin']) ? $_GET['id_admin'] : "";
        if ($id_admin != "") {
            $administrator->deleteAdminId($id_admin);
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=administrator'>";
        } else {
            echo "<meta http-equiv='refresh' content='0;url=../../../../pages/404.php'>";
        }
        break;

    case 'editadmin':
        $id_admin = isset($_GET['id_admin']) ? $_GET['id_admin'] : "";
        $row = $administrator->getAdminId($id_admin);

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
            $administrator->editAdminId($id_admin, $mk, $id_role);
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=administrator'>";
            break;
        }
        include('administrator.php');
        break;

    case 'product':

        include('product.php');
        break;

    case 'addproduct':
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
                array_push($err, 'Vui lòng nhập giá gốc');
            }
            if ($price == "") {
                array_push($err, 'Vui lòng nhập giá bán');
            }
            if ($price > $cost) {
                array_push($err, 'Giá bán phải nhỏ hơn hoặc bằng giá gốc');
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
                        /* Creating a DateTime object from the current time. */
                        $now = DateTime::createFromFormat('U.u', microtime(true));
                        /* The above code is using the date function to format the date and time. */
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
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=product'>";
            break;
        }
        include('product.php');
        break;

    case 'editproduct':
        $id_prd = isset($_GET['id_prd']) ? $_GET['id_prd'] : "";
        $row = $product->getProductId($id_prd);

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
                array_push($err, 'Vui lòng nhập giá gốc');
            }
            if ($price == "") {
                array_push($err, 'Vui lòng nhập giá bán');
            }
            if ($price > $cost) {
                array_push($err, 'Giá bán phải nhỏ hơn hoặc bằng giá gốc');
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
            $product->editProductId($id_prd, $name_prd, $id_cate, $img_prd_1, $img_prd_2, $img_prd_3, $detail, $cost, $price, $quanlity, $id_admin);
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=product'>";
            break;
        }
        include('product.php');
        break;

    case 'deleteproduct':
        $id_prd = isset($_GET['id_prd']) ? $_GET['id_prd'] : "";
        if ($id_prd != "") {
            $product->deleteProductId($id_prd, $id_admin);
            echo "<meta http-equiv='refresh' content='0;url=index.php?control=product'>";
        } else {
            echo "<meta http-equiv='refresh' content='0;url=../../../../pages/404.php'>";
        }
        break;
    case 'profile':
        include('profile.php');
        break;

    case 'logout':
        session_unset();
        print_r($_SESSION['login_admin']);
        echo "<meta http-equiv='refresh' content='0;url=../../pages/login-admin.php'>";
        break;

    default:
        include('../dashboard/index.php');
        break;
}

include_once('../part/footer.php');
?>



