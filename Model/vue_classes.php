<?php  
      //unset($_SESSION["error_donnee_vide"]); 
require_once 'connect.php';

unset($_SESSION['ajout_ko']);
unset($_SESSION['ajout_ok']);
unset($_SESSION["error_promo"]);
unset($_SESSION['maj_ok']);
unset($_SESSION['ajout_ko_promo_non_existe']);
unset($_SESSION['deja_existe_classe']);


if(isset($_POST['promo_to_add']) && !empty($_POST['promo_to_add']) && isset($_POST['classe_to_add']) 
  && !empty($_POST['classe_to_add']) ){

  //Récupérer l'id de la promo entrée
  $query_promo_entree = $bdd->query('SELECT id_promo 
                                     FROM promo 
                                     WHERE promo ='.$bdd->quote($_POST['promo_to_add']));
  $liste_promo = $query_promo_entree->fetchALL(PDO::FETCH_ASSOC)[0];

  //Récupérer l'id de la classe entrée
  $query_classe_entree = $bdd->query('SELECT id_classe 
                                      FROM classe 
                                      WHERE classe ='.$bdd->quote($_POST['classe_to_add'])); 
  $liste_classe = $query_classe_entree->fetchALL(PDO::FETCH_ASSOC)[0];

  var_dump($liste_promo); echo "<br/> a la ligne <br/>";
  var_dump($liste_classe);

  if(sizeof($liste_promo) == 0){
    $_SESSION['ajout_ko_promo_non_existe'] = "Impossible d'ajouter une classe à une promo qui n'existe pas!";

    //header('Location: administration.php?page=classes');
  }else if(sizeof($liste_classe) == 0 ){

        $bdd->prepare('INSERT INTO classe(classe, id_promo) VALUES ('.$bdd->quote($_POST['classe_to_add']). 
        ', '. $liste_promo['id_promo']. ')     ')->execute();

        $_SESSION['ajout_ok'] = "Ajout réussie!";
        
        $query_classe = $bdd->query('SELECT * FROM classe'); 
        $liste_classe = $query_classe->fetchALL(PDO::FETCH_ASSOC);

        //header('Location: administration.php?page=classes');
  }else{
        $_SESSION['deja_existe_classe'] = "Echec! Impossible d'ajouter une même classe 2 fois!";
  }

}else if( isset($_POST["formPromo"]) && (empty($_POST['promo_to_add']) || empty($_POST['classe_to_add'])) ){
        $_SESSION['ajout_ko'] = "Echec ajout! Impossible d'ajouter des données vides!";
        // header('Location: administration.php?page=classes');
}


//Mise à jour de la promo
    if( !empty($_POST['promo_maj']) && isset($_POST['promo_maj']) && !empty($_POST['id_classe']) && isset($_POST['id_classe']) 
        && !empty($_POST['classe_maj']) && isset($_POST['classe_maj']) ){

      $classe_maj = $_POST['classe_maj']; 
      $promo_maj = $_POST['promo_maj'];      
      $id_classe = $_POST['id_classe'];


      //Récupérer l'id de la promo entrée
      $query_promo_entree = $bdd->query('SELECT id_promo 
                                         FROM promo 
                                         WHERE promo ='.$bdd->quote($promo_maj)) ;
      $id_promo = $query_promo_entree->fetchALL(PDO::FETCH_ASSOC)[0];
       if(sizeof($id_promo) == 0) {
      
         $_SESSION["error_promo"] = "Cette promo n'existe pas! <br/>
                                      Remarque: Vous devez d'abord ajouter une promo et ensuite seulement lui affecter une classe";
         //header('Location: administration.php?page=classes');
       }


      $bdd->prepare("UPDATE classe
                     SET classe = ". $bdd->quote($_POST['classe_maj']). ", id_promo= ".  $id_promo['id_promo'] .
                    " WHERE id_classe  =". $id_classe)->execute();

          $query_promos = $bdd->query('SELECT * FROM promo'); 
          $liste_promos = $query_promos->fetchALL(PDO::FETCH_ASSOC);

          $query_classes = $bdd->query('SELECT id_classe, classe, promo 
                                        FROM classe, promo
                                        WHERE classe.id_promo = promo.id_promo');
          $liste_classes = $query_classes->fetchALL(PDO::FETCH_ASSOC);



          $_SESSION['maj_ok'] = 'La mise à jour a bien été effectuée!';

          //header('Location: administration.php?page=classes');
    }else if( (empty($_POST['promo_maj']) && isset($_POST['promo_maj'])) || (empty($_POST['id_classe']) && isset($_POST['id_classe'])) || (empty($_POST['classe_maj']) && isset($_POST['classe_maj']))) {
      $_SESSION["error_donnee_vide"] = "Impossible d'ajouter une(des) donnée(s) vide!"; 
      //header('Location: administration.php?page=classes');
    }

?>



<?php if(isset($_SESSION['deja_existe_classe'])   )  { 
?>
<br/>
<div class="alert alert-danger message_ko" id="div_enregistrer" >
    <?= $_SESSION['deja_existe_classe']; ?>
</div>
<?php 
  unset($_SESSION['deja_existe_classe']);  
} else { 
  unset($_SESSION['deja_existe_classe']);
}?>





<?php if( isset($_SESSION['ajout_ko_promo_non_existe']) )  { ?>
<br/>
<div class="alert alert-danger message_ko" id="div_enregistrer" >
  <?php echo $_SESSION['ajout_ko_promo_non_existe']; unset($_SESSION['ajout_ko_promo_non_existe']);?>
</div>
<?php  unset($_SESSION['ajout_ko_promo_non_existe']);
 } else { unset($_SESSION['ajout_ko_promo_non_existe']); } ?>



<?php if(isset($_SESSION['suppression_classe_ok']) && !empty($_SESSION['suppression_classe_ok'])  )  { 
        unset($_SESSION['ajout_ok']);
?>
<br/>
<div class="alert alert-success message_ok" id="div_enregistrer" >
  La suppression a été effectuée!
</div>
<?php 
  unset($_SESSION['suppression_classe_ok']);  
} else { 
  unset($_SESSION['suppression_classe_ok']);
}?>


<?php if(isset($_SESSION['ajout_ok']) )  { 
        //unset($_SESSION['ajout_ok']);
?>
<br/>
<div class="alert alert-success message_ok" id="div_enregistrer" >
  <?php echo $_SESSION['ajout_ok']; 
        //unset($_SESSION['ajout_ok']); ?>
</div>
<?php } ?>


<?php if(isset($_SESSION['maj_ok'])  && !empty($_SESSION['maj_ok']) )  { 
        unset($_SESSION['maj_ok']);
?>
<br/>
<div class="alert alert-success message_ok" id="div_enregistrer" >
  Les données ont bien été mises à jour!
</div>
<?php } ?>


<?php if(isset($_SESSION["error_promo"])) {
?>
<br/>
<div class="alert alert-success message_ok" id="div_enregistrer" >
    <?php echo $_SESSION["error_promo"]; 
          //unset($_SESSION["error_promo"]); ?>
</div>
<?php } ?>



<?php if(isset($_SESSION["error_donnee_vide"])) {
?>
<br/> 
<div class="alert alert-danger message_ko" id="div_enregistrer" >
    <?php echo $_SESSION["error_donnee_vide"]; 
          unset($_SESSION["error_donnee_vide"]); ?>
</div>
<?php } ?>









<?php if(isset($_SESSION['ajout_ko'])) : ?>
<br/>
<div class="alert alert-danger message_ko" id="div_enregistrer" >
  <?= $_SESSION['ajout_ko']; ?>
</div>
<?php endif; ?>







