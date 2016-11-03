<?php
    include_once "../config/ConfigDB.php";
    include "../models/User.php";
    include "PersonDAO.php";
    class  UserDAO extends ConfigDB{

        public function login($nickname, $password){
            try
            {
                $sql = $this->connect()->prepare("SELECT * FROM tbl_users WHERE nickname=:nickname AND password=:password");
                $sql->bindParam(':nickname', $nickname);
                $sql->bindParam(':password', $password);
                $sql->execute();
                $count = $sql->rowCount();
                $row = $sql->fetch(PDO::FETCH_ASSOC);

                if($count > 0){

                    $_SESSION["current_user"] = $row["id"];
                    $_SESSION["role"] = $row["role"];
                    return true;
                    }
                    else{
                        echo "usuario o contraseña incorrectos";
                        return false;

                }

            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            return false;
        }

        public function register($name,$nickname, $password, $password2){
            try
            {
                if($password2 == $password){
                    $person = new Person($name);
                    $personDao = new PersonDAO();
                    $id_person = $personDao->insert($person);
                    $avatar = "nulo";
                    $sql_insert = $this->connect()->prepare("INSERT INTO tbl_users (id_person, nickname, password, avatar)
                                          VALUES (:id_person, :nickname, :password, :avatar)");
                    $sql_insert->bindParam(':id_person', $id_person );
                    $sql_insert->bindParam(':nickname', $nickname);
                    $sql_insert->bindParam(':password', $password);
                    $sql_insert->bindParam(':avatar', $avatar);
                    $sql_insert->execute();




                    return true;

                }
                else{
                    echo "password no coinndicen";
                    return false;
                }

            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
           return false;
        }
    }