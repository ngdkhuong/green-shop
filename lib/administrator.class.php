<?php

class Administrator extends Database {
    function insertAdmin($username, $mk, $id_role){
        $sql= "INSERT INTO administrator (username, mk, id_role) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $mk, $id_role]);
    }

    function getAllAdmins(){
        $sql="SELECT * FROM administrator";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAllBrands(){
        $sql="SELECT * FROM administrator WHERE id_role=3";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAllBrandsSearch($search){
        $sql="SELECT * FROM administrator WHERE id_role=3 AND name_brand LIKE '%".$search."%' LIMIT 3";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAdminId($id_admin){
        $sql="SELECT * FROM administrator WHERE id_admin= ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_admin]);
        $row = $stmt->fetch();
        return $row;
    }

    function checkUsername($username){
        $sql="SELECT * FROM administrator WHERE username=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->rowCount();
    }

    function checkLoginAdmin($username, $mk){
        $sql="SELECT * FROM administrator WHERE username=? AND mk=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $mk]);
        return $stmt->rowCount();
    }
    
    function getLoginAdmin($username, $mk){
        $sql="SELECT * FROM administrator WHERE username=? AND mk=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $mk]);
        $row = $stmt->fetch();
        return $row;
    }

    function deleteAdminId($id_admin){
        $sql="DELETE FROM administrator WHERE id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_admin]);
    }

    function editAdminId($id_admin, $mk, $id_role){
        $sql="UPDATE administrator SET mk=?, id_role=? WHERE id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$mk, $id_role, $id_admin]);
    }

    function updateAdminId($id_admin,$fullname,$name_brand, $phone, $email, $address, $avatar, $banner){
        $sql="UPDATE administrator SET fullname=?, name_brand=?, phone=?, email=?, address=?, avatar=?, banner=? WHERE id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fullname,$name_brand, $phone, $email, $address, $avatar, $banner, $id_admin]);
    }

    function changePasswordAdmin($id_admin, $mk){
        $sql="UPDATE administrator SET mk=? WHERE id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$mk, $id_admin]);
    }

    function viewStore($view,$id_admin){
        $sql="UPDATE administrator SET view=? WHERE id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$view,$id_admin]);
    }

    
}