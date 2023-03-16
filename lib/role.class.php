<?php
class Role extends Database{
    function getAllRoles(){
        $sql="SELECT * FROM role";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }
}