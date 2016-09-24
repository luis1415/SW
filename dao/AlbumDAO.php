<?php
include_once "../config/ConfigDB.php";
include "../models/Album.php";
    class  AlbumDAO extends ConfigDB{

        public function fecthData($id_user){

            $sql = $this->connect()->prepare("SELECT * FROM tbl_albumes WHERE id_user=:id_user");
            $sql->bindParam(':id_user', $id_user);
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();
            return $sql->fetchAll();

        }

        public function find($id_user,$id_album){

            $sql = $this->connect()->prepare("SELECT * FROM tbl_albumes WHERE id_user=:id_user AND id=:id_album");
            $sql->bindParam(':id_user', $id_user);
            $sql->bindParam(':id_album', $id_album);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);

        }

        public function insert(Album $album){

            $sql = $this->connect()->prepare("INSERT INTO tbl_albumes (name, description, id_user)
                                          VALUES (:name, :description, :id_user)");
            $sql->bindParam(':name', $album->getName());
            $sql->bindParam(':description', $album->getDescription());
            $sql->bindParam(':id_user', $album->getIdUser());
            $sql->execute();
            return "ok";

        }


        public function update(Album $album,$id_album){

            $sql = $this->connect()->prepare("UPDATE  tbl_albumes SET name = :name, description = :description WHERE id=:id;");
            $sql->bindParam(':name', $album->getName());
            $sql->bindParam(':description', $album->getDescription());
            $sql->bindParam(':id', $id_album);
            $sql->execute();
            return "ok";

        }

        public function delete($id_album){

            $sql = $this->connect()->prepare("DELETE FROM tbl_albumes WHERE  id=:id");
            $sql->bindParam(':id', $id_album);
            $sql->execute();
            return "ok";

        }


    }