<?php
        unset($_SESSION['maj_ok']);
        unset($_SESSION['ajout_ok']);
        unset($_SESSION['ajout_ko']); 
        unset($_SESSION["maj_ko"]);
        unset($_SESSION['deja_existe_promo']);

require_once 'Model/config.php';

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




<!DOCTYPE html>
<html lang="fr">
<head>
  <title>MyUpload de BeCode</title>
  <meta name="author" content="Nadia B.">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="icon" type="image/png" sizes="32x32" href="Images/becode.jpg">

  <link rel="stylesheet" type="text/css" href="View/css/style.css">

</head>
<body>

        <h1 style="text-align:left; color:white"> <u> Gestion des promos </u> </h1>

          <div class="row">
                <?php
                    if(sizeof($liste_promos) == 0){ ?>
                    <br/>
                    <p> Aucune promo n'est encore enregistrée! </p>

                <?php } else { ?>

            <table>
              <tr>
                <th><u>Promo</u></th>
                <th><u>Mettre à jour/ Supprimer</u></th>
              </tr>

              <?php 
                      foreach ($liste_promos as $key => $value) { ?>
                        <tr>
                          <td width="80%"><?= $value['promo']?></td>
                          <td width="20%"> 
                          
                            <button onclick="update_promo(<?=$value['id_promo']?>)" class="btn button_update_delete"><span class="glyphicon glyphicon-wrench glyphicon_maj"></span></button>                          
                            
                            |

                            <a href='delete_promo.php?id=<?= $value['id_promo']; ?>'>
                              <button class="btn btn-default button_update_delete"><span class="glyphicon glyphicon-remove button_remove"></span></button>
                            </a>

                          </td>
                          
                        </tr>
              <?php  } ?>
                      
            </table>   

  

        <br/><br/><br/>

        <div id="div_button_ajouter" style="text-align: right">
          <button id="id_button_ajouter" onclick="creer_zone_ajout()" class="btn btn-success">Ajouter</button>
        </div>

        <div id="div_button_annuler_ajout" style="text-align: right;">
          <button id="id_button_annuler_ajout" onclick="retirer_button_annuler_ajout()" class="cacher">Annuler ajout</button>
        </div>

        <div id="id_div_form" class="cacher">
          <form id="myForm" action="" method="POST">
            <label>Promo</label>
            <input size="25" type="texte" name="promo_to_add" placeholder="Entrez la promo à ajouter">
            <input type="hidden" name="page" value="promos">
            <input type="submit" value="Ajouter">
          </form>
        </div>



        <div id="div_button_annuler_maj" style="text-align: right;">
          <button id="id_button_annuler_maj" onclick="retirer_button_annuler_maj()" class="btn btn-warning cacher">Annuler mise à jour</button>
        </div>



        <div class="cacher" id="id_div_mise_a_jour">
          <form action="" method="POST">
              Promo <input size="35" type="text" name="promo_maj" placeholder="Entrez la promo">
              <input type="hidden" name="page" value="promos" >
              <input id="test" type="hidden" name="id_promo" value="">
              <input type="submit" class="btn btn-primary" value="Mettre à jour">
          </form>
        </div>


        <br/>
<?php }  ?>


<script type="text/javascript">
  
  function creer_zone_ajout() {
      var id_button_ajouter = document.getElementById('id_button_ajouter');
      id_button_ajouter.setAttribute("class","cacher");

      var id_button_annuler_ajout = document.getElementById('id_button_annuler_ajout');
      id_button_annuler_ajout.removeAttribute("class");
      id_button_annuler_ajout.setAttribute("class","btn");
      id_button_annuler_ajout.setAttribute("class","btn-warning");

      var id_div_form = document.getElementById('id_div_form');
      id_div_form.removeAttribute("class");
  }


function retirer_button_annuler_ajout(){
    //retirer button annuler
    var id_button_annuler_ajout = document.getElementById('id_button_annuler_ajout');
    id_button_annuler_ajout.setAttribute("class","cacher");

    var id_button_annuler_maj = document.getElementById('id_button_annuler_maj');
    id_button_annuler_maj.setAttribute("class","cacher");

    //retirer formulaire
    var id_div_form = document.getElementById('id_div_form');
    id_div_form.setAttribute("class","cacher");

    //Ajouter bouton 'Ajouter Promo'
    var id_button_ajouter = document.getElementById('id_button_ajouter');
    id_button_ajouter.removeAttribute("class"); 
    id_button_ajouter.setAttribute("onClick", "creer_zone_ajout()");
    id_button_ajouter.setAttribute("class","btn");
    id_button_ajouter.setAttribute("class","btn-success");
}


function update_promo(id){
    //Faire apparaître la div "mise à jour"
    var id_div_mise_a_jour = document.getElementById('id_div_mise_a_jour');
    id_div_mise_a_jour.removeAttribute("class");

    //cacher le bouton ajouter
    var div_button_ajouter = document.getElementById('div_button_ajouter');
    div_button_ajouter.setAttribute("class","cacher");

    //ajouter le bouton annuler mise à jour
    var id_button_annuler_maj = document.getElementById('id_button_annuler_maj');
    id_button_annuler_maj.removeAttribute("class");

    var test = document.getElementById('test');
    test.value = id;
}

function retirer_button_annuler_maj(){
    var id_button_annuler_maj = document.getElementById('id_button_annuler_maj');
    id_button_annuler_maj.setAttribute("class", "cacher");

    var id_div_mise_a_jour = document.getElementById('id_div_mise_a_jour');
    id_div_mise_a_jour.setAttribute("class", "cacher");
    
    //remettre bouton ajouter promo
    var div_button_ajouter = document.getElementById('div_button_ajouter');
    div_button_ajouter.removeAttribute("class");
}

</script>

</body>

</html>