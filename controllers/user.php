<?php
include "../dao/UserDAO.php";

$nickname = $_POST["nickname"];
$password = $_POST["password"];

$userDAO = new UserDAO();

if(!empty($nickname) && !empty($password)){

    if($userDAO->login($nickname,$password)){
        header("location: ../views/home.html");
    }
    else{
        header("location: ../views/index.html");
    }

}




?>


