<?php
include "../dao/UserDAO.php";
    ob_start();
    session_start();
    $name = $_POST["name"];
    $nickname = $_POST["nickname"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    $userDAO = new UserDAO();

    if(isset($_POST["login"])){
        if(!empty($nickname) && !empty($password)){

            if($userDAO->login($nickname,$password)){

                header("location: ../views/home.html");
            }
            else{
                header("location: ../views/index.html");
            }

        }
    }
    else if(isset($_POST["register"])){
        if(!empty($name) && !empty($nickname) && !empty($password) && !empty($password2)){

            if($userDAO->register($name,$nickname,$password,$password2)){
                header("location: ../views/home.html");
            }
            else{
                header("location: ../views/index.html");
            }


        }


    }






?>


