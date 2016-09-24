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

    if(isset($_GET["find"])){
        if(isset($_SESSION["current_user"])){
            $row = $albumDAO->find($_SESSION["current_user"],$_GET["find"]);
            include "../views/album_detail.php";
        }
        else{
            header("location: user.php?login");
        }
    }



    if(isset($_POST["insert"])){
        $name = $_POST["name"];
        $description = $_POST["description"];
        $id_user = $_SESSION["current_user"];
        $album = new Album($name,$description,$id_user);
        $albumDAO->insert($album);
        header("location: album.php?data");

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