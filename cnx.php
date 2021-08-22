<?php
try{

$cnx = new PDO('mysql:host=localhost;dbname=blog_cuisine;charset=utf8', 'root', '');   
    $cnx->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}catch(PDOException $e){
    echo 'Une erreur de connexion est survenue';
}

?>