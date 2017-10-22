<?php

session_start();

require_once 'Model/connect.php';

    if(!empty($_GET['id']) && isset($_GET['id'])){
    	$id_classe = $_GET['id'];

    	$bdd->prepare("DELETE
				   	   FROM classe
	               	   WHERE id_classe =". $id_classe )->execute();

    	$_SESSION['suppression_classe_ok'] = 'La suppression a bien été effectuée!';

    	header('Location: administration.php?page=classes');
    }

?>
