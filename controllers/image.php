<?php
include "../dao/ImageDAO.php";

    ob_start();
    session_start();
    $imageDAO = new imageDAO();

    class contr_image{
        function drop_image(){
            $imageDAO = new imageDAO();
            $row = $imageDAO->drop_images();
            return $row;
        }

    }
    if(isset($_GET["id_album"])){
        if(isset($_SESSION["current_user"])){
            $rows_images = $imageDAO->fecthData($_GET["id_album"]);
            $_SESSION["current_album"] = $_GET["id_album"];
            include "../views/images.php";
        }
        else{
            header("location: user.php?login");
        }
    }

    if(isset($_GET["new"])){
        if(isset($_SESSION["current_user"])){
            include "../views/image_insert.php";
        }
        else{
            header("location: user.php?login");
        }
    }

    if(isset($_GET["edit"])){
        if(isset($_SESSION["current_user"])){
            $row = $imageDAO->find($_GET["edit"]);
            include "../views/image_detail.php";
        }
        else{
            header("location: user.php?login");
        }
    }

    if(isset($_POST["insert"])){
        $title = $_POST["title"];
        if(isset($_POST["id"])){
            $row = $imageDAO->find2($_POST["id"]);
            //var_dump($row);
            $photo = $row[0]["photo"];
            $description = $row[0]["description"];
            $image = new Image_($photo,$description,$title,"");
            $imageDAO->insert($image, $_SESSION["current_album"]);
        }

        $description = $_POST["description"];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $uploadOk = 1;
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $image = new Image_($target_file,$description,$title,"");
            $imageDAO->insert($image, $_SESSION["current_album"]);
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
        header("location: image.php?id_album=".$_SESSION["current_album"]);

    }

    if(isset($_GET["swap"])){
        $album = $_GET["album_id"];
        $imagen = $_GET["imagen_id"];
        // el orden de la imagen actual
        $orden = $imageDAO->find3($imagen, $album);
        $row = $imageDAO->swaping($imagen, $album, $orden);
        // swaping me devuelve el orden del que esta mas adelante que yo
        //var_dump($row);
        $adelante = $row[0]["orden_image"];
        // el id de la imagen siguiente
        $id_image_siguiente = $row[0]["fk_image"];
        // el id del album siguiente
        $id_album_siguiente = $row[0]["fk_album"];

        $actual = $orden[0]["orden_image"];
        var_dump($actual);
        // ahora tengo que hacer el cambio con update_orden en la base de datos
        $imageDAO->update_orden($actual, $adelante, $album, $imagen, $id_image_siguiente, $id_album_siguiente);

        header("location: image.php?id_album=".$_SESSION["current_album"]);
    }


    elseif (isset($_POST["update"])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $id_image = $_POST["id_image"];
        $id_user = $_SESSION["current_user"];
        $image = new Image_("", $description, $title, "", $_SESSION["current_album"]);
        $imageDAO->update($image, $id_image);
        header("location: image.php?id_album=".$_SESSION["current_album"]);
    }