<?php
class Product extends Database{

    function getAllProducts(){
        $sql="SELECT * FROM product";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAllProductsAvailable(){
        $sql="SELECT * FROM product WHERE quanlity>0";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAllProductsNumPagesAvailable($sl,$offset){
        $sql="SELECT * FROM product WHERE quanlity>0 LIMIT ".$sl." OFFSET ".$offset;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAllProductsNumPagesAvailableSort($sl,$offset,$sort){
        if($sort==1){
            $sql="SELECT * FROM product WHERE quanlity>0 ORDER BY price DESC LIMIT ".$sl." OFFSET ".$offset;
        }elseif($sort==2){
            $sql="SELECT * FROM product WHERE quanlity>0 ORDER BY price ASC LIMIT ".$sl." OFFSET ".$offset;
        }else{
            $sql="SELECT * FROM product WHERE quanlity>0 LIMIT ".$sl." OFFSET ".$offset;
        }
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAllProductsNumPagesAvailableOfBrand($sl,$offset,$id_brand){
        $sql="SELECT * FROM product WHERE id_admin=".$id_brand." AND quanlity>0 LIMIT ".$sl." OFFSET ".$offset;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAllProductsNumPagesAvailableOfBrandSort($sl,$offset,$id_brand,$sort){
        if($sort==1){
            $sql="SELECT * FROM product WHERE id_admin=".$id_brand." AND quanlity>0 ORDER BY price DESC LIMIT ".$sl." OFFSET ".$offset;
        }elseif($sort==2){
            $sql="SELECT * FROM product WHERE id_admin=".$id_brand." AND quanlity>0 ORDER BY price ASC LIMIT ".$sl." OFFSET ".$offset;
        }else{
            $sql="SELECT * FROM product WHERE id_admin=".$id_brand." AND quanlity>0 LIMIT ".$sl." OFFSET ".$offset;
        }
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAllProductsNumPagesAvailableOfCate($sl,$offset,$id_cate){
        $sql="SELECT * FROM product WHERE id_cate=".$id_cate." AND quanlity>0 LIMIT ".$sl." OFFSET ".$offset;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getAllProductsNumPagesAvailableOfCateSort($sl,$offset,$id_cate, $sort){
        if($sort==1){
            $sql="SELECT * FROM product WHERE id_cate=".$id_cate." AND quanlity>0 ORDER BY price DESC LIMIT ".$sl." OFFSET ".$offset;
        }elseif($sort==2){
            $sql="SELECT * FROM product WHERE id_cate=".$id_cate." AND quanlity>0 ORDER BY price ASC LIMIT ".$sl." OFFSET ".$offset;
        }else{
            $sql="SELECT * FROM product WHERE id_cate=".$id_cate." AND quanlity>0 LIMIT ".$sl." OFFSET ".$offset;
        }
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

    function countAllProductsOfBrand($id_brand){
        $sql="SELECT * FROM product WHERE id_admin=".$id_brand;
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function countAllProductsOfCate($id_cate){
        $sql="SELECT * FROM product WHERE id_cate=".$id_cate;
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
        $sql="UPDATE product SET name_prd=?, id_cate=?, img_prd_1=?, img_prd_2=?, img_prd_3=?, detail=?, cost=?, price=?, quanlity=? WHERE id_prd=? AND id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name_prd, $id_cate, $img_prd_1, $img_prd_2, $img_prd_3, $detail, $cost, $price, $quanlity, $id_prd, $id_admin]);
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