<?php
class Evalution extends Database{
    function insertEvalution($id_admin, $id_user, $evalu){
        $sql= "INSERT INTO evalution(id_admin, id_user, evalution) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_admin, $id_user, $evalu]);
    }

    function checkEvalution($id_admin, $id_user){
        $sql="SELECT * FROM evalution WHERE id_admin=? AND id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_admin, $id_user]);
        return $stmt->rowCount();
    }

    function getEvalution($id_admin, $id_user){
        $sql="SELECT * FROM evalution WHERE id_admin=? AND id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_admin, $id_user]);
        $row = $stmt->fetch();
        return $row;
    }

    function editEvalution($id_admin, $id_user, $evalu){
        $sql="UPDATE evalution SET evalution=? WHERE id_admin=? AND id_user=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$evalu, $id_admin, $id_user]);
    }

    function countLikeBrand($id_admin){
        $sql="SELECT count(evalution) as countLike FROM evalution WHERE id_admin=? AND evalution=1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_admin]);
        $row = $stmt->fetch();
        return $row;
    }

    function countDisLikeBrand($id_admin){
        $sql="SELECT count(evalution) as countDisLike FROM evalution WHERE id_admin=? AND evalution=2";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_admin]);
        $row = $stmt->fetch();
        return $row;
    }
    
    
}