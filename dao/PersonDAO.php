<?php
include_once "../config/ConfigDB.php";
include "../models/Person.php";
class  PersonDAO extends ConfigDB{


    public function insert(Person $person){

        $sql = $this->connect()->prepare("INSERT INTO tbl_persons (name)
                                          VALUES (:name)");
        $sql->bindParam(':name', $person->getName());
        $sql->execute();

        $stmt = $this->connect()->prepare("SELECT LAST_INSERT_ID()");
        $stmt->execute();
        $lastId = $stmt->fetch(PDO::FETCH_NUM);
        $last_id = $lastId[0];

        return $last_id;

    }




}