<?php
    session_start();
?>
<?php include_once('../../lib/db.php'); ?>
<?php include_once('../../lib/category.class.php'); ?>
<?php include_once('../../lib/administrator.class.php'); ?>
<?php include_once('../../lib/role.class.php'); ?>
<?php include_once('../../lib/product.class.php'); ?>
<?php include_once('../../lib/revenue.class.php')?>
<?php include_once('../part/header.php'); ?>

<?php
    // Kiểm tra kết quả truy vấn
    if ($result > 0) {
        // Lấy kết quả và trả về dưới dạng JSON
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "Tên khách hàng: " . $row["name"] . " - Địa chỉ: " . $row["address"] . "<br>";
        }
    } else {
        // Trả về thông báo lỗi nếu không tìm thấy kết quả
        echo "Không tìm thấy kết quả";
    }
?>
