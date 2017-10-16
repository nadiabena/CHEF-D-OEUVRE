<?php

/*
session_start();

    try{
        $bdd = new PDO('mysql:host=localhost;dbname=my_upload;charset=utf8', 'root', 'user');

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }catch(PDOException $e){
        die('Erreur : '. $e->getMessage());
    }


    if(!empty($_GET['id']) && isset($_GET['id'])){
    	$id_event = $_GET['id'];

    	$bdd->prepare("DELETE
				   	   FROM event
	               	   WHERE id_event =". $id_event )->execute();

    	$_SESSION['suppression_ok'] = 'La suppression a bien été effectuée!';

    	header('Location: administration.php');

    }

*/


?>
