<?php
class Comment extends Database{
    function getCommentIdPrd($id_prd){
        $sql="SELECT * FROM comment WHERE id_prd=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_prd]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getCommentOfBrand($id_brand){
        $sql="SELECT * FROM comment INNER JOIN product ON comment.id_prd = product.id_prd  WHERE id_admin=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_brand]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getCommentIdPrdIdUserLast($id_prd,$id_user){
        $sql="SELECT * FROM comment WHERE id_prd=? AND id_user=? ORDER BY id_cmt desc";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_prd,$id_user]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function getRepCommentIdComment($id_cmt){
        $sql="SELECT * FROM rep_comment WHERE id_cmt=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_cmt]);
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function insertComment($id_prd,$id_user,$cmt){
        $sql= "INSERT INTO comment (id_prd, id_user, cmt) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_prd,$id_user,$cmt]);
    }

    function insertRepComment($id_admin,$id_cmt){
        $sql= "INSERT INTO rep_comment (id_admin, id_cmt) VALUES (?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_admin,$id_cmt]);
    }

    function deleteComment($id_cmt){
        $sql="DELETE FROM comment WHERE id_cmt=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_cmt]);
    }
}