<?php
include "../dao/AlbumDAO.php";

    ob_start();
    session_start();
    $albumDAO = new AlbumDAO();


    if(isset($_GET["data"])){
        if(isset($_SESSION["current_user"])){
            $rows_albumes = $albumDAO->fecthData($_SESSION["current_user"]);
            include "../views/home.php";
        }
        else{
            header("location: user.php?login");
        }
    }

    if(isset($_GET["new"])){
        if(isset($_SESSION["current_user"])){
            include "../views/album_insert.php";
        }
        else{
            header("location: user.php?login");
        }
    }

    if(isset($_GET["find"])){
        if(isset($_SESSION["current_user"])){
            header("location: image.php?id_album=".$_GET["find"]);
        }
        else{
            header("location: user.php?login");
        }
    }

    if(isset($_GET["edit"])){
        if(isset($_SESSION["current_user"])){
            $row = $albumDAO->find($_SESSION["current_user"],$_GET["edit"]);
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

