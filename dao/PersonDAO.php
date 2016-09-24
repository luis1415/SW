<?php
include "../config/ConfigDB.php";
class  PersonDAO extends ConfigDB{


    public function insert(Person $person){

        $sql = $this->connect()->prepare("INSERT INTO tbl_person (name)
                                          VALUES (:name)");
        $sql->bindParam(':name', $person->getName());
        $sql->execute();
        return "ok";

    }




}