<?php

require_once 'Model/connect.php';

if( isset($_GET['id']) && !empty($_GET['id']) ){

	//Tester si la photo est déjà à la une, auquel cas afficher un message pour dire que la photo séléctionnée est dejà à la UNE
	$id = $_GET['id'];
	$id_event = $_GET['event'];
 	$query = $bdd->query('SELECT *
                       	  FROM photo
                          WHERE id_photo='. $id );
 	$photo = $query->fetchALL(PDO::FETCH_ASSOC)[0];

 	if($photo['photo_une'] == 0){

    	$bdd->prepare("UPDATE photo
                       SET photo_une = '1'
                       WHERE id_photo  =". $id )->execute();

	 	$_SESSION['photo_une_ok'] = "La photo a bien été mise à la UNE";
 	}else{
		$_SESSION['photo_une_ko'] = "La photo est déjà à la UNE";
 	}

 	header('Location: administration.php?page=photo&event='.$id_event);

}

?>
