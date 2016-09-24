<?php
include "../dao/AlbumDAO.php";




    ob_start();
    session_start();

    $albumDAO = new AlbumDAO();
    $rows_albumes = $albumDAO->fecthData($_SESSION["current_user"]);
    include "../views/albumes.php";


    if(isset($_POST["insert"])){
        $name = $_POST["name"];
        $description = $_POST["description"];
        $id_user = $_SESSION["current_user"];
        $album = new Album($name,$description,$id_user);
        header("location: ../views/albumes.php");

    }
    elseif (isset($_POST["update"])){
        $name = $_POST["name"];
        $description = $_POST["description"];

    }

