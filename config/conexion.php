<?php

try{
    $user = 'root';
    $pass = '';
    $conn = new PDO('mysql:host=localhost;dbname=bdAlbum', $user , $pass );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "ERROR: " . $e->getMessage();
}

