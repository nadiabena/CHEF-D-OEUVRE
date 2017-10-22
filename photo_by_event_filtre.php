<?php 

session_start();

require_once 'Model/connect.php';

if(isset($_GET['event'])){
	$id = $_GET['event'];

 	$query = $bdd->query('SELECT *
                       FROM event
                       WHERE id_event='. $bdd->quote($id) );

 	$event = $query->fetchALL(PDO::FETCH_ASSOC)[0];

 	//echo $event['description_event']."<br/>";


	// Récupérer toutes les photos de l'événement sélectioné:
 	$query_photos_event = $bdd->query('SELECT id_photo, image
										FROM event, photo
										WHERE event.id_event ='. $bdd->quote($id) . 
									   ' AND event.id_event = photo.id_event ');

	$photos_event = $query_photos_event->fetchALL(PDO::FETCH_ASSOC);


	//echo '<img src="$photos_event[0]["image"]" >';
}






?>


<?php if(isset($_SESSION['photo_une_ok']) )  {  ?>
<br/>
<div class="alert alert-success message_ok" id="div_enregistrer" >
  <?= $_SESSION['photo_une_ok']; ?>
</div>
<?php
} else {
  unset($_SESSION['photo_une_ok']);
}?>

<?php if(isset($_SESSION['photo_une_ko']) )  {  ?>
<br/>
<div class="alert alert-success message_ok" id="div_enregistrer" >
  <?= $_SESSION['photo_une_ko']; ?>
</div>
<?php
} else {
  unset($_SESSION['photo_une_ko']);
}?>




<div class="container">
	<div class="row">
<!-- 		<div class= "col-md-3">

		</div>	 -->

		<div class= "col-md-12">
			<?php
				if(sizeof($photos_event) == 0){ ?>
					<label> Aucune photo disponible pour cet événement! </label>	
		<?php	}else{ ?>
			<table>
            	  <tr>
               		 <th><u>Photo</u></th>
                	 <th><u>Mettre à la UNE</u></th>
              	  </tr>

		<?php		foreach ($photos_event as $key => $value) { ?>
						<!-- <img src="<?//= $value['image']?>" width="64px" height="auto"> -->

						<!-- ici je dois afficher en forme de tableau -->



                        <tr>
                          <td width="80%"> <img src='<?= $value['image']?>' width="48px"> </td>
                          <td width="20%"> 
                          

                            <a href='activer_photo_une.php?id=<?= $value['id_photo']; ?>'>
                            	<button class="btn button_update_delete">
                              		<span class="glyphicon glyphicon-thumbs-up"></span></p>  
                            	</button>   
                            </a>                       
                            
                            |

                            <a href='deasctiver_photo_une.php?id=<?= $value['id_photo']; ?>'>
                              <button class="btn btn-default button_update_delete">
                                <span class="glyphicon glyphicon-thumbs-down"></span>
                              </button>
                            </a>

                          </td>
                          
                        </tr>




			<?php   } 
				}?>

		</div>

	</div>
</div>






