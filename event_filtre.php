<?php 

require_once 'Model/connect.php';

if(isset($_GET['event'])){
	$id = $_GET['event'];

 $query = $bdd->query('SELECT *
                       FROM event
                       WHERE id_event='. $bdd->quote($id) );

 $event = $query->fetchALL(PDO::FETCH_ASSOC)[0];

 echo $event['description_event']."<br/>";


// Récupérer toutes les photos de l'événement sélectioné:
 $query_photos_event = $bdd->query('SELECT image
									FROM event, photo
									WHERE event.id_event ='. $bdd->quote($id) . 
								   ' AND event.id_event = photo.id_event ');

 $photos_event = $query_photos_event->fetchALL(PDO::FETCH_ASSOC);


echo '<img src="$photos_event[0]["image"]" >';


}

?>

<div class="container">
	<div class="row">
<!-- 		<div class= "col-md-3">

		</div>	 -->

		<div style="border:1px solid red" class= "col-md-12">
			<?php
				if(sizeof($photos_event) == 0){ ?>
					<label> Aucune photo disponible pour cet événement! </label>	
		<?php	}else{
					foreach ($photos_event as $key => $value) { ?>
						<img src="<?= $value['image']?>" width="64px" height="auto">
			<?php   } 
				}?>

		</div>

	</div>
</div>



