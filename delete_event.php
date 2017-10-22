<?php

session_start();

require_once 'Model/connect.php';

    if(!empty($_GET['id']) && isset($_GET['id'])){
    	$id_event = $_GET['id'];

    	$bdd->prepare("DELETE
				   	   FROM event
	               	   WHERE id_event =". $id_event )->execute();

    	$_SESSION['suppression_ok'] = 'La suppression a bien été effectuée!';

    	header('Location: administration.php?page=event');

    }
?>
