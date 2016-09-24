<?php
include "../dao/UserDAO.php";
    ob_start();
    session_start();
    $userDAO = new UserDAO();

    //getters

    if(isset($_GET["login"])){
        if(isset($_SESSION["current_user"])){
            header("location: album.php?data");
        }
        else{
            include "../views/index.html";
        }
    }


    if(isset($_GET["register"])){
        if(isset($_SESSION["current_user"])){
            header("location: album.php");
        }
        else{
            include "../views/register.html";
        }
    }

    if(isset($_GET["logout"])){
        if(isset($_SESSION["current_user"])){
            unset($_SESSION['current_user']);
            session_destroy();
            header("location: user.php?login");
        }
        else{
            echo "ya esta desconectado";
        }
    }

    //post



    if(isset($_POST["login"])){
        $nickname = $_POST["nickname"];
        $password = $_POST["password"];
        if(!empty($nickname) && !empty($password)){

            if($userDAO->login($nickname,$password)){

                header("location: album.php?data");
            }
            else{
                header("location: user.php?login");
            }

        }
        else{
            header("location: user.php?login");
        }
    }
    else if(isset($_POST["register"])){
        $name = $_POST["name"];
        $nickname = $_POST["nickname"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        if(!empty($name) && !empty($nickname) && !empty($password) && !empty($password2)){

            if($userDAO->register($name,$nickname,$password,$password2)){
                header("location: user.php?login");
            }
            else{
                header("location: user.php?register");
            }
        }
        else{
            header("location: user.php?register");
        }


    }






?>


