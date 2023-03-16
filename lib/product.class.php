<?php
class Product extends Database{

    function getAllProducts(){
        $sql="SELECT * FROM product";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAllProductsNumPages($sl,$offset){
        $sql="SELECT * FROM product LIMIT ".$sl." OFFSET ".$offset;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function countAllProducts(){
        $sql="SELECT * FROM product";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function getProductId($id_prd){
        $sql="SELECT * FROM product WHERE id_prd= ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_prd]);
        $row = $stmt->fetch();
        return $row;
    }

    function editProductId($id_prd, $name_prd, $id_cate, $img_prd_1, $img_prd_2, $img_prd_3, $detail, $cost, $price, $quanlity, $id_admin){
        $sql="UPDATE product SET name_prd=?, id_cate=?, img_prd_1=?, img_prd_2=?, img_prd_3=?, detail=?, cost=?, price=?, quanlity=?, id_admin=? WHERE id_prd=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name_prd, $id_cate, $img_prd_1, $img_prd_2, $img_prd_3, $detail, $cost, $price, $quanlity, $id_admin, $id_prd]);
    }

    function deleteProductId($id_prd, $id_admin){
        $sql="DELETE FROM product WHERE id_prd=? AND id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_prd, $id_admin]);
    }

    function insertProduct($name_prd, $id_cate, $img_prd_1, $img_prd_2, $img_prd_3, $detail, $cost, $price, $quanlity, $id_admin){
        $sql= "INSERT INTO product(name_prd, id_cate, img_prd_1, img_prd_2, img_prd_3, detail, cost, price, quanlity, id_admin) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name_prd, $id_cate, $img_prd_1, $img_prd_2, $img_prd_3, $detail, $cost, $price, $quanlity, $id_admin]);
    }
}

?>