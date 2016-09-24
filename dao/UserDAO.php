<?php
    include "../config/ConfigDB.php";
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

                    echo "ok";
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

        public function register($nickname, $password, $password2){
            try
            {
                if($password2 == $password){
                    $id_person = 1;
                    $avatar = "nulo";
                    $sql_insert = $this->connect()->prepare("INSERT INTO tbl_users (id_person, nickname, password, avatar)
                                          VALUES (:id_person, :nickname, :password, :avatar)");
                    $sql_insert->bindParam(':id_person', $id_person );
                    $sql_insert->bindParam(':nickname', $nickname);
                    $sql_insert->bindParam(':password', $password);
                    $sql_insert->bindParam(':avatar', $avatar);
                    $sql_insert->execute();

                    echo "registrado exitomasamente";
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