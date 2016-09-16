<?php

$dsn = 'mysql:dbname=testdb;host=127.0.0.1';
$user = 'root';
$pass = '';

try {
    $gbd = new PDO($dsn , $user , $pass);
} catch(PDOException $e){
    echo "Fallo la conexión".$e->getMessage();
}
