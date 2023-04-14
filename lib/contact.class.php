<?php
class Contact extends Database{
    function getAllContact(){
        $sql="SELECT * FROM contact_us";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }

    function insertContact($name,$email,$subject,$message){
        $sql= "INSERT INTO contact_us (name, email, subject, message) VALUES (?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name,$email,$subject,$message]);
    }

    function deleteContact($id_contact){
        $sql="DELETE FROM contact_us WHERE id_contact=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id_contact]);
    }
}