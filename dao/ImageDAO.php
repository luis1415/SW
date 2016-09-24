<?php
include_once "../config/ConfigDB.php";
include "../models/Image_.php";
class  ImageDAO extends ConfigDB{

    public function fecthData($id_album){

        $sql = $this->connect()->prepare("SELECT * FROM tbl_images WHERE id_album=:id_album");
        $sql->bindParam(':id_album', $id_album);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $rows_images = $sql->fetchAll();

    }

    public function find($id_image){

        $sql = $this->connect()->prepare("SELECT * FROM tbl_images WHERE  id=:id_image");
        $sql->bindParam(':id_image', $id_image);
        $sql->execute();
        return $row = $sql->fetch(PDO::FETCH_ASSOC);

    }

    public function insert(Image_ $image){

        $sql = $this->connect()->prepare("INSERT INTO tbl_images (photo, description, title, comments, id_album)
                                          VALUES (:photo, : description,  :title, :comments, :id_album)");
        $sql->bindParam(':photo', $image->getPhoto());
        $sql->bindParam(':description', $image->getDescription());
        $sql->bindParam(':title', $image->getTitle());
        $sql->bindParam(':comments', $image->getComments());
        $sql->bindParam(':id_album', $image->getIdAlbum());
        $sql->execute();
        return "ok";

    }


    public function update(Image_ $image,$id_image){

        $sql = $this->connect()->prepare("UPDATE  tbl_images SET photo = :photo, description = :description, title = :title, comments =:comments, id_album =:id_album WHERE id=:id;");
        $sql->bindParam(':photo', $image->getPhoto());
        $sql->bindParam(':description', $image->getDescription());
        $sql->bindParam(':title', $image->getTitle());
        $sql->bindParam(':comments', $image->getComments());
        $sql->bindParam(':id_album', $image->getIdAlbum());
        $sql->bindParam(':id', $id_image);
        $sql->execute();
        return "ok";

    }

    public function delete($id_imagee){

        $sql = $this->connect()->prepare("DELETE FROM tbl_image WHERE  id=:id");
        $sql->bindParam(':id', $id_image);
        $sql->execute();
        return "ok";

    }


}