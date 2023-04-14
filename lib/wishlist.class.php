<?php
class Wishlist extends Database{
    function getAllWishlist(){
        $sql="SELECT * FROM wishlist";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getWishlistIdUser($id_user){
        $sql="SELECT * FROM wishlist WHERE id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_user]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function insertWishlist($id_prd,$id_user){
        $sql= "INSERT INTO wishlist (id_prd, id_user) VALUES (?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_prd,$id_user]);
    }

    function checkIdPrdIdUserInWishlist($id_prd,$id_user){
        $sql="SELECT * FROM wishlist WHERE id_prd=? AND id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_prd,$id_user]);
        return $stmt->rowCount();
    }

    function deleteWishlistId($id_wishlist){
        $sql="DELETE FROM wishlist WHERE id_wishlist=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_wishlist]);
    }
}