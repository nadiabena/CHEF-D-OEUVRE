<?php


session_start();

require_once 'Model/connect.php';


    if(!empty($_GET['id']) && isset($_GET['id'])){
    	$id_event = $_GET['id'];

    	$bdd->prepare("UPDATE
				   	   SET event
	               	   WHERE id_event =". $id_event )->execute();

    	header('Location: administration.php');

    }


?>
