<?php

class Category extends Database {
    function insertCategory($name_cate, $id_admin){
        $sql= "INSERT INTO category(name_cate, id_admin) VALUES (?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name_cate, $id_admin]);
    }
    
    function getAllCategorys(){
        $sql="SELECT * FROM category";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAllCategorysOfidAdmin($id_admin){
        $sql="SELECT * FROM category WHERE id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_admin]);
        $rows = $stmt->fetchAll();
        return $rows;
    }
    
    function getCateId($id_cate){
        $sql="SELECT * FROM category WHERE id_cate= ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_cate]);
        $row = $stmt->fetch();
        return $row;
    }

    function deleteCategoryId($id_cate, $id_admin){
        $sql="DELETE FROM category WHERE id_cate=? AND id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_cate, $id_admin]);
    }

    function editCateId($id_cate, $name_cate){
        $sql="UPDATE category SET name_cate=? WHERE id_cate=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name_cate, $id_cate]);
    }
}
?>