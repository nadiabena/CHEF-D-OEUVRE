<?php

        unset($_SESSION['maj_ok']);
        unset($_SESSION['ajout_ok']);
        unset($_SESSION['ajout_ko']); 
        unset($_SESSION["maj_ko"]);
        unset($_SESSION['deja_existe_event']);

require_once 'connect.php';

if( isset($_POST['event_to_add']) && !empty($_POST['event_to_add']) ){
    $query_event = $bdd->query('SELECT count(*) 
                                FROM event 
                                WHERE description_event = '.$bdd->quote($_POST['event_to_add'])); 
    $liste_event = $query_event->fetchALL(PDO::FETCH_ASSOC)[0];

    if($liste_event['count(*)'] == 0){
      $bdd->prepare('INSERT INTO event(description_event) VALUES ('.$bdd->quote($_POST['event_to_add']).')     ')->execute();
      $_SESSION['ajout_ok'] = "Ajout réussie!";

    }else{
      $_SESSION['deja_existe_event'] = "Impossible d'ajouter un événement qui existe déjà";
    }

    $query_events = $bdd->query('SELECT * FROM event'); 
    $liste_events = $query_events->fetchALL(PDO::FETCH_ASSOC);
}else if(isset($_POST['event_to_add']) && empty($_POST['event_to_add'])){
    $_SESSION['ajout_ko'] = "Echec ajout! Impossible d'ajouter un événement vide";
}




if( !empty($_POST['event_maj']) && isset($_POST['event_maj']) && !empty($_POST['id_event']) && isset($_POST['id_event']) ){
      $event_maj = $_POST['event_maj'];
      $id_event = $_POST['id_event'];

        $bdd->prepare("UPDATE event
                       SET description_event = ". $bdd->quote($_POST['event_maj']).
                      " WHERE id_event  =". $id_event)->execute();

        $query_events = $bdd->query('SELECT * FROM event'); 
        $liste_events = $query_events->fetchALL(PDO::FETCH_ASSOC);

        $_SESSION['maj_ok'] = 'La mise à jour a bien été effectuée!';

}else if( empty($_POST['event_maj']) && isset($_POST['event_maj']) ) {
    $_SESSION["maj_ko"] = "Impossible d'ajouter une donnée vide!";
}

?>


<?php if(isset($_SESSION['ajout_ok']) )  {
?>

<br/>
<div class="alert alert-success message_ok" id="div_enregistrer" >
  Ajout réussie!
</div>
<?php
} else {
  unset($_SESSION['ajout_ok']);
}?>


<?php if(isset($_SESSION['maj_ko'])) {
?>
<br/> 
<div class="alert alert-danger message_ko" id="div_enregistrer" >
    <?php echo $_SESSION['maj_ko']; 
           ?>
</div>
<?php } ?>



<?php if(isset($_SESSION['maj_ok']) )  { 
        unset($_SESSION['maj_ok']); 
        $_SESSION['maj_ok'] = "";     
?>
<br/>
<div class="alert alert-success message_ok" role="alert" id="div_enregistrer" >
  Vos données ont bien été mises à jour!
</div>
<?php unset($_SESSION['maj_ok']); } ?>



<?php if(isset($_SESSION['suppression_ok']) )  { 
?>
<br/>
<div class="alert alert-success message_ok" id="div_enregistrer" >
  La suppression a été effectuée!
</div>
<?php 
  unset($_SESSION['suppression_ok']);  
} ?>



<?php if(isset($_SESSION['ajout_ko']) )  { 
        //unset($_SESSION['ajout_ko']);
?>
<br/>
<div class="alert alert-danger message_ko" id="div_enregistrer" >
  Impossible d'ajouter une entrée vide!
</div>
<?php } ?>


<?php if(isset($_SESSION['deja_existe_event']) )  {

?>
<br/>
<div class="alert alert-danger message_ko" id="div_enregistrer" >
 <?php  echo $_SESSION['deja_existe_event']; 
        unset($_SESSION['deja_existe_event']);?>
</div>
<?php } else{ unset($_SESSION['deja_existe_event']); }?>
