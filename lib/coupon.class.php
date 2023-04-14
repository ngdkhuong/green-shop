<?php
class Coupon extends Database{
    function insertCoupon($code_coupon, $discount, $time_start, $time_end, $id_admin){
        $sql= "INSERT INTO coupon(code_coupon, discount, time_start, time_end, id_admin) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code_coupon, $discount, $time_start, $time_end, $id_admin]);
    }

    function checkCodeCoupon($code_coupon){
        $sql="SELECT * FROM coupon WHERE code_coupon=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code_coupon]);
        return $stmt->rowCount();
    }

    function checkCodeCouponIdCoupon($code_coupon, $id_coupon){
        $sql="SELECT * FROM coupon WHERE code_coupon=? AND id_coupon!=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code_coupon, $id_coupon]);
        return $stmt->rowCount();
    }

    function getAllCoupon(){
        $sql="SELECT * FROM coupon";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAllCouponBrand($id_admin){
        $sql="SELECT * FROM coupon WHERE id_admin =?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_admin]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getCoupon($coupon){
        $sql="SELECT * FROM coupon WHERE code_coupon=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$coupon]);
        $row = $stmt->fetch();
        return $row;
    }

    function checkCouponIdUser($id_coupon,$id_user){
        $sql="SELECT * FROM bill WHERE id_coupon=? AND id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_coupon,$id_user]);
        return $stmt->rowCount();
    }

    function getCouponId($id_coupon){
        $sql="SELECT * FROM coupon WHERE id_coupon=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_coupon]);
        $row = $stmt->fetch();
        return $row;
    }

    function deleteCouponId($id_coupon, $id_admin){
        $sql="DELETE FROM coupon WHERE id_coupon=? AND id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_coupon, $id_admin]);
    }

    function editCouponId($id_coupon, $code_coupon, $discount, $time_start, $time_end, $id_admin){
        $sql="UPDATE coupon SET code_coupon=?, discount=?, time_start=?, time_end=? WHERE id_coupon=? AND id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$code_coupon, $discount, $time_start, $time_end, $id_coupon, $id_admin]);
    }
}