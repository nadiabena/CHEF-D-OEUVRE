<?php


try{
	$bdd = new PDO('mysql:host=localhost;dbname=my_upload;charset=utf8', 'root', 'user');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(PDOException $e){
    die('Erreur : '. $e->getMessage());
}

?>