<?php
include_once "../config/ConfigDB.php";
include "../models/Image_.php";
class  ImageDAO extends ConfigDB{

    public function fecthData($id_album){

        $sql = $this->connect()->prepare("SELECT * FROM tbl_albumes_images ia INNER JOIN tbl_images i ON i.id = ia.fk_image WHERE ia.fk_album = :album ORDER BY orden_image;");
        $sql->bindParam(':album', $id_album);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();

    }

    public function find($id_image){

        $sql = $this->connect()->prepare("SELECT * FROM tbl_images WHERE  id=:id_image");
        $sql->bindParam(':id_image', $id_image);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);

    }


    public function insert(Image_ $image, $orden){

        $st = $this->connect();
        $sql = $st->prepare("INSERT INTO tbl_images (photo, description, title, comments)
                                          VALUES (:photo, :description,  :title, :comments)");
        $sql->bindParam(':photo', $image->getPhoto());
        $sql->bindParam(':description', $image->getDescription());
        $sql->bindParam(':title', $image->getTitle());
        $sql->bindParam(':comments', $image->getComments());

        $sql->execute();

        $stmt = $st->prepare("SELECT LAST_INSERT_ID()");
        $stmt->execute();
        $lastId = $stmt->fetch(PDO::FETCH_NUM);
        $last_idx = $lastId[0];

        echo $last_idx;
        echo $orden;

        $sql2 = $this->connect()->prepare("INSERT INTO tbl_albumes_images(fk_album, fk_image)
                                          VALUES (:fk_album, :fk_image)");
        $sql2->bindParam(':fk_album', $orden);
        $sql2->bindParam(':fk_image', $last_idx);
        $sql2->execute();

        return "ok";

    }


    public function update(Image_ $image,$id_image){

        $sql = $this->connect()->prepare("UPDATE  tbl_images SET  description = :description, title = :title, comments =:comments WHERE id=:id;");
        $sql->bindParam(':description', $image->getDescription());
        $sql->bindParam(':title', $image->getTitle());
        $sql->bindParam(':comments', $image->getComments());
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