<?php

require_once 'Model/connect.php';

if( isset($_GET['id']) && !empty($_GET['id']) ){

	//Tester si la photo est déjà à la une, auquel cas afficher un message pour dire que la photo séléctionnée est dejà à la UNE
	$id = $_GET['id'];

 	$query = $bdd->query('SELECT *
                       	  FROM photo
                          WHERE id_photo='. $id );
 	$photo = $query->fetchALL(PDO::FETCH_ASSOC)[0];

 	if($photo['photo_une'] == 1){
 		// update à faire

    	$bdd->prepare("UPDATE photo
                       SET photo_une = '0'
                       WHERE id_photo  =". $id )->execute();

	 	//$_SESSION['photo_une_ok'] = "La photo n'est plus à la UNE!";
 	}else{
		//$_SESSION['photo_une_ko'] = "La photo n'est pas à la UNE!";
 	}	

 	header('Location: administration.php?page=photo');
 	
}

?>