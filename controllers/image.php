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
        $description = $_POST["description"];
        $target_dir = "../uploads/";
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
        $title = $_POST["title"];
        $description = $_POST["description"];
        $id_image = $_POST["id_image"];
        $id_user = $_SESSION["current_user"];
        $image = new Image_("", $description, $title, "", $_SESSION["current_album"]);
        $imageDAO->update($image, $id_image);
        header("location: image.php?id_album=".$_SESSION["current_album"]);
    }