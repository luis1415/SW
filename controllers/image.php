<?php
include "../dao/ImageDAO.php";

    ob_start();
    session_start();
    $imageDAO = new imageDAO();


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

    /**

    if(isset($_GET["find"])){
        if(isset($_SESSION["current_user"])){
            $row = $albumDAO->find($_SESSION["current_user"],$_GET["find"]);
            include "../views/album_detail.php";
        }
        else{
            header("location: user.php?login");
        }
    }
     *
     * */



    if(isset($_POST["insert"])){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $uploadOk = 1;
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $image = new Image_($target_file,$description,$title,"",$_SESSION["current_album"]);
            $imageDAO->insert($image);
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
        header("location: image.php?id_album=".$_SESSION["current_album"]);

    }
    elseif (isset($_POST["update"])){
        $name = $_POST["name"];
        $description = $_POST["description"];
        $id_album = $_POST["id_album"];
        $id_user = $_SESSION["current_user"];
        $album = new Album($name,$description,$id_user);
        $albumDAO->update($album,$id_album);
        header("location: album.php?data");
    }