<?php
        unset($_SESSION['maj_ok']);
        unset($_SESSION['ajout_ok']);
        unset($_SESSION['ajout_ko']); 
        unset($_SESSION["maj_ko"]);
        unset($_SESSION['deja_existe_promo']);

require_once 'connect.php';

if(isset($_POST['promo_to_add']) && !empty($_POST['promo_to_add'])){
    //Ajoute la promo seulement si elle n'existe pas
    $query_promos = $bdd->query('SELECT count(*) 
                                 FROM promo 
                                 WHERE promo = '.$bdd->quote($_POST['promo_to_add'])); 
    $liste_promos = $query_promos->fetchALL(PDO::FETCH_ASSOC)[0];

    if($liste_promos['count(*)'] == 0){
      $bdd->prepare('INSERT INTO promo(promo) VALUES ('.$bdd->quote($_POST['promo_to_add']).')     ')->execute();
      $_SESSION['ajout_ok'] = "Ajout réussie!";

      $query_promos = $bdd->query('SELECT * FROM promo'); 
      $liste_promos = $query_promos->fetchALL(PDO::FETCH_ASSOC);

      //header('Location: administration.php?page=promos');
    }else{
      $_SESSION['deja_existe_promo'] = "Impossible d'ajouter une promo qui existe déjà";
      
      $query_promos = $bdd->query('SELECT * FROM promo'); 
      $liste_promos = $query_promos->fetchALL(PDO::FETCH_ASSOC);
      //header('Location: administration.php?page=promos');
      
  }
}else if(isset($_POST['promo_to_add']) && empty($_POST['promo_to_add'])){
    $_SESSION['ajout_ko'] = "Echec ajout!";

    //header('Location: administration.php?page=promos');
}



//Mise à jour de la promo
    if( !empty($_POST['promo_maj']) && isset($_POST['promo_maj']) && !empty($_POST['id_promo']) && isset($_POST['id_promo']) ){
      $promo_maj = $_POST['promo_maj'];
      $id_promo = $_POST['id_promo'];

      $bdd->prepare("UPDATE promo
                     SET promo = ". $bdd->quote($_POST['promo_maj']).
                    " WHERE id_promo  =". $id_promo)->execute();

          $query_promos = $bdd->query('SELECT * FROM promo'); 
          $liste_promos = $query_promos->fetchALL(PDO::FETCH_ASSOC);

          $_SESSION['maj_ok'] = 'La mise à jour a bien été effectuée!';

          //header('Location: administration.php?page=promos');
    }else if( empty($_POST['promo_maj']) && isset($_POST['promo_maj']) ) {
      $_SESSION["maj_ko"] = "Impossible d'ajouter une donnée vide!"; 
      //header('Location: administration.php?page=classes');
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


<?php if(isset($_SESSION['deja_existe_promo']) )  {

?>
<br/>
<div class="alert alert-danger message_ko" id="div_enregistrer" >
 <?php  echo $_SESSION['deja_existe_promo']; 
        unset($_SESSION['deja_existe_promo']);?>
</div>
<?php } else{ unset($_SESSION['deja_existe_promo']); }?>
