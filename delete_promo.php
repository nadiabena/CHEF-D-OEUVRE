<?php

session_start();

require_once 'Model/connect.php';

    if(!empty($_GET['id']) && isset($_GET['id'])){
    	$id_promo = $_GET['id'];

    	$bdd->prepare("DELETE
				   	   FROM promo
	               	   WHERE id_promo =". $id_promo )->execute();

    	$_SESSION['suppression_ok'] = 'La suppression a bien été effectuée!';

    	header('Location: administration.php?page=promos');
    }

?>
