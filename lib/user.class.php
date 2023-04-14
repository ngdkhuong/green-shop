<?php
class User extends Database{
    function insertUser($username, $mk, $email, $phone){
        $sql= "INSERT INTO user (username, mk, email, phone) VALUES (?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $mk, $email, $phone]);
    }
    
    function getAllUser(){
        $sql="SELECT * FROM user";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getUserId($id_user){
        $sql="SELECT * FROM user WHERE id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_user]);
        $row = $stmt->fetch();
        return $row;
    }

    function checkEmailUser($email){
        $sql="SELECT * FROM user WHERE email=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->rowCount();
    }

    function checkPhoneUser($phone){
        $sql="SELECT * FROM user WHERE phone=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$phone]);
        return $stmt->rowCount();
    }

    function checkLoginUser($username, $mk){
        $sql="SELECT * FROM user WHERE username=? AND mk=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $mk]);
        return $stmt->rowCount();
    }
    
    function getLoginUser($username, $mk){
        $sql="SELECT * FROM user WHERE username=? AND mk=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $mk]);
        $row = $stmt->fetch();
        return $row;
    }

    function changePasswordUser($id_user, $mk){
        $sql="UPDATE user SET mk=? WHERE id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$mk, $id_user]);
    }

    function updateBankingUser($id_user, $stk, $bank){
        $sql="UPDATE user SET stk=?, bank=? WHERE id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$stk, $bank, $id_user]);
    }

    function updateProfileUser($id_user, $fullname, $address, $avatar){
        $sql="UPDATE user SET fullname=?, address=?, avatar=? WHERE id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fullname, $address, $avatar, $id_user]);
    }
}