<?php
class Bill extends Database{
    function getAllBill(){
        $sql="SELECT * FROM bill";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function countBill(){
        $sql="SELECT count(id_bill) as countbill FROM bill";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }

    function countBillSuccess(){
        $sql="SELECT count(id_bill) as countbill FROM bill WHERE status=5";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }

    function countBillIdUser($id_user){
        $sql="SELECT count(id_bill) as countbill FROM bill WHERE id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_user]);
        $row = $stmt->fetch();
        return $row;
    }

    function countBillIdUserSuccess($id_user){
        $sql="SELECT count(id_bill) as countbill FROM bill WHERE id_user=? AND status=5";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_user]);
        $row = $stmt->fetch();
        return $row;
    }

    function totalIdUserSuccess($id_user){
        $sql="SELECT sum(total) as sumtotal FROM bill WHERE status =5 AND id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_user]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function countBillIdUserOfBrand($id_user,$id_brand){
        $sql="SELECT count(id_bill) as countbill FROM bill WHERE id_user=? AND id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_user,$id_brand]);
        $row = $stmt->fetch();
        return $row;
    }

    function countBillIdUserSuccessOfBrand($id_user,$id_brand){
        $sql="SELECT count(id_bill) as countbill FROM bill WHERE id_user=? AND id_admin=? AND status=5";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_user,$id_brand]);
        $row = $stmt->fetch();
        return $row;
    }

    function totalIdUserSuccessOfBrand($id_user,$id_brand){
        $sql="SELECT sum(total) as sumtotal FROM bill WHERE status =5 AND id_user=? AND id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_user,$id_brand]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function sumQuanlityProduct(){
        $sql="SELECT sum(quanlity) as sumquanlity FROM detail_bill";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function sumQuanlityProductInMonth($time){
        $sql="SELECT sum(quanlity) as sumquanlity FROM bill
        INNER JOIN detail_bill ON bill.id_bill = detail_bill.id_bill WHERE time like '%".$time."%'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function revenue(){
        $sql="SELECT sum(total) as sumtotal FROM bill WHERE status =5";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    function revenueInMonth($time){
        $sql="SELECT sum(total) as sumtotal FROM bill WHERE time like '%".$time."%' AND status =5";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function countBillBrand($id_brand){
        $sql="SELECT count(id_bill) as countbill FROM bill WHERE id_admin=".$id_brand;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }

    function countBillSuccessBrand($id_brand){
        $sql="SELECT count(id_bill) as countbill FROM bill WHERE status=5 AND id_admin=".$id_brand;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row;
    }

    function sumQuanlityProductBrand($id_brand){
        $sql="SELECT sum(quanlity) as sumquanlity FROM bill
        INNER JOIN detail_bill ON bill.id_bill = detail_bill.id_bill WHERE id_admin=".$id_brand;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function sumQuanlityProductInMonthBrand($time, $id_brand){
        $sql="SELECT sum(quanlity) as sumquanlity FROM bill
        INNER JOIN detail_bill ON bill.id_bill = detail_bill.id_bill WHERE time like '%".$time."%' AND id_admin=".$id_brand;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function revenueBrand($id_brand){
        $sql="SELECT sum(total) as sumtotal FROM bill WHERE status =5 AND id_admin=".$id_brand;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    function revenueInMonthBrand($time, $id_brand){
        $sql="SELECT sum(total) as sumtotal FROM bill WHERE time like '%".$time."%' AND status =5 AND id_admin=".$id_brand;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getBillUser($id_user){
        $sql="SELECT * FROM bill WHERE id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_user]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getBillBrand($id_admin){
        $sql="SELECT * FROM bill WHERE id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_admin]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getBillId($id_bill){
        $sql="SELECT * FROM bill WHERE id_bill=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_bill]);
        $row = $stmt->fetch();
        return $row;
    }

    function getBillDetailId($id_bill){
        $sql="SELECT * FROM detail_bill WHERE id_bill=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_bill]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function countBillDetailIdProduct($id_prd){
        $sql="SELECT * FROM detail_bill WHERE id_prd=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_prd]);
        return $stmt->rowCount();
    }

    function getStatus($id_statusbill){
        $sql="SELECT * FROM statusbill WHERE id_statusbill=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_statusbill]);
        $row = $stmt->fetch();
        return $row;
    }

    function confBill($id_bill, $id_user){
        $sql="UPDATE bill SET status=2 WHERE id_bill=? AND id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_bill, $id_user]);
    }

    function cancelBill($id_bill, $id_user){
        $sql="UPDATE bill SET status=3 WHERE id_bill=? AND id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_bill, $id_user]);
    }

    function actionBill($id_bill, $id_admin){
        $sql="UPDATE bill SET status=4 WHERE id_bill=? AND id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_bill, $id_admin]);
    }

    function successBill($id_bill){
        $sql="UPDATE bill SET status=5 WHERE id_bill=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_bill]);
    }

    function failBill($id_bill){
        $sql="UPDATE bill SET status=6 WHERE id_bill=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_bill]);
    }

    function countProductOfCateSold($id_cate){
        $sql="SELECT product.id_cate FROM detail_bill
        INNER JOIN product ON detail_bill.id_prd = product.id_prd WHERE id_cate = ".$id_cate;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function insertBill($id_bill, $total, $id_user, $fullname, $address, $email, $phone, $id_coupon, $coupondiscount, $payment, $id_admin, $name_brand){
        $sql= "INSERT INTO bill(id_bill, total, id_user, fullname, address, email, phone, id_coupon, coupondiscount, payment, id_admin, name_brand) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_bill, $total, $id_user, $fullname, $address, $email, $phone, $id_coupon, $coupondiscount, $payment, $id_admin, $name_brand]);
    }

    function successPayment($id_bill){
        $sql="UPDATE bill SET status_payment=1, status=2 WHERE id_bill=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_bill]);
    }

    function insertBillDetail($id_bill, $id_prd, $quanlity, $name_prd, $price){
        $sql= "INSERT INTO detail_bill(id_bill, id_prd, quanlity, name_prd, price) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_bill, $id_prd, $quanlity, $name_prd, $price]);
    }
    
    
}