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

        public function register($nickname, $password){
            try
            {
                $sql = $this->connect()->prepare("INSERT INTO tbl_users VALUES(nickname=:nickname, password=:password)");
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
    }