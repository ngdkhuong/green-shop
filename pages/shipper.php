<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once('../lib/db.php');
    include_once('../lib/bill.class.php');
    $bill = new Bill;
    if (isset($_POST['id_bill'])) {
        $id_bill = $_POST['id_bill'];
        
    }
    if(isset($_POST['thanhcong'])){
        $bill->successBill($id_bill);
    }
    if(isset($_POST['thatbai'])){
        $bill->failBill($id_bill);
    }
    
    ?>
    <table>
        <thead>
            <tr>
                <th>Mã hóa đơn</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $rows = $bill->getAllBill();
            foreach ($rows as $row) { ?>
                <tr>
                    <td style="padding: 10px"><?php echo $row['id_bill'] ?></td>
                    <td style="padding: 10px"><?php echo $bill->getStatus($row['status'])['name_status'] ?></td>
                    <td style="padding: 10px">
                        <?php if ($row['status'] == 4) { ?>
                            <form action="" method="post">
                                <input hidden type="text" name="id_bill" value="<?php echo $row['id_bill'] ?>">
                                <button name="thanhcong">Giao hàng</button>
                            </form>
                        <?php } ?>
                    </td>
                    <td style="padding: 10px">
                        <?php if ($row['status'] == 4) { ?>
                            <form action="" method="post">
                                <input hidden type="text" name="id_bill" value="<?php echo $row['id_bill'] ?>">
                                <button name="thatbai">Giao hàng thất bại</button>
                            </form>
                        <?php } ?>
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

</body>

</html>