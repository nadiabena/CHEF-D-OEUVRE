<?php if(isset($_SESSION['ajout_ok']) && !empty($_SESSION['ajout_ok'])  )  {
        unset($_SESSION['suppression_ok']);
        unset($_SESSION['maj_ok']);
        unset($_SESSION['ajout_ok']);
        
        unset($_SESSION['ajout_ko']);
?>
<br/>
<div style="text-align:left; color:green; border:1px solid green" id="div_enregistrer" >
  Ajout réussie!
</div>
<?php 
   
} else {
  unset($_SESSION['ajout_ok']);
}?>



<?php if(isset($_SESSION['maj_ok'])  && !empty($_SESSION['maj_ok']) )  { 
        unset($_SESSION['maj_ok']);
?>
<br/>
<div style="text-align:left; color:green; border:1px solid green" id="div_enregistrer" >
  Vos données ont bien été mises à jour!
</div>
<?php } ?>



<?php if(isset($_SESSION['suppression_ok']) && !empty($_SESSION['suppression_ok'])  )  { 
        unset($_SESSION['ajout_ok']);
?>
<br/>
<div style="text-align:left; color:green; border:1px solid green" id="div_enregistrer" >
  La suppression a été effectuée!
</div>
<?php 
  unset($_SESSION['suppression_ok']);  
} else { 
  unset($_SESSION['suppression_ok']);
}?>



<?php if(isset($_SESSION['ajout_ko'])  && !empty($_SESSION['ajout_ko']) )  { 
        unset($_SESSION['ajout_ko']);
?>
<br/>
<div style="text-align:left; color:red; border:1px solid red" id="div_enregistrer" >
  Impossible d'ajouter une entrée vide!
</div>
<?php } ?>



<?php

    try{
        $bdd = new PDO('mysql:host=localhost;dbname=my_upload;charset=utf8', 'root', 'user');

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }catch(PDOException $e){
        die('Erreur : '. $e->getMessage());
    }

if(isset($_GET['promo_to_add']) && !empty($_GET['promo_to_add'])){

  $bdd->prepare('INSERT INTO promo(promo) VALUES ('.$bdd->quote($_GET['promo_to_add']).')     ')->execute();

  $_SESSION['ajout_ok'] = "Ajout réussie!";
  
  $query_promos = $bdd->query('SELECT * FROM promo'); 
  $liste_promos = $query_promos->fetchALL(PDO::FETCH_ASSOC);

  header('Location: administration.php?page=promos');

}else if(isset($_GET['promo_to_add']) && empty($_GET['promo_to_add'])){
    $_SESSION['ajout_ko'] = "Echec ajout!";

    header('Location: administration.php?page=promos');
}

?>

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

                            <a style="text-decoration: none" href="update_promo.php?id=<?= $value['id_promo']; ?>">
                              <button onclick="update_promo()" style="background-color:#AEB6BF;border:1px solid #AEB6BF" type="button" class="btn btn-default"><span style="color:blue"class="glyphicon glyphicon-wrench"></span></button>
                            </a>

                            |

                            <a href='delete_promo.php?id=<?= $value['id_promo']; ?>'>
                              <button style="background-color:#AEB6BF;border:1px solid #AEB6BF" type="button" class="btn btn-default"><span style="color:red" class="glyphicon glyphicon-remove"></span></button>
                            </a>

                          </td>
                          
                        </tr>
              <?php  } ?>
                      
            </table>   

  
          </div> <!-- ROW interne -->

        <br/><br/><br/>
        <div id="div_button_ajouter" style="text-align: right">
          <button id="id_button_ajouter" onclick="creer_zone_ajout()" class="btn btn-success">Ajouter</button>
        </div>

        <div id="div_button_ajout_again" style="text-align: right">
        </div>

        <div id="div_button_annuler" style="text-align: right;">
          <button class="cacher" id="id_button_annuler" onclick="retirer_button_annuler()" class="btn btn-warning">Annuler ajout</button>
        </div>

        <div id="id_div_form">
        </div>

        <br/>
<?php }  ?>


<script type="text/javascript">
function retirer_button_annuler(){
    //retirer button annuler
    var id_button_annuler = document.getElementById('id_button_annuler');
    id_button_annuler.removeAttribute("class");


    var id_button_annuler = document.getElementById('id_button_annuler');
    id_button_annuler.setAttribute("class","cacher");


    //retirer formulaire
    var id_div_form = document.getElementById('id_div_form');
    id_div_form.removeChild(document.getElementById('myForm'));

    //Ajouter bouton 'Ajouter Promo'
    var id_button_ajouter = document.getElementById('id_button_ajouter');
    id_button_ajouter.removeAttribute("class"); 
    id_button_ajouter.setAttribute("onClick", "creer_zone_ajout()");
    id_button_ajouter.setAttribute("class","btn");
    id_button_ajouter.setAttribute("class","btn-success");
}

function creer_zone_ajout() {
    //var id_button_ajouter = document.getElementById('div_button_ajouter');
    //id_button_ajouter.removeChild(document.getElementById('id_button_ajouter'));

    var id_button_ajouter = document.getElementById('id_button_ajouter');
    id_button_ajouter.setAttribute("class","cacher");
    

    var id_button_annuler = document.getElementById('id_button_annuler');
    id_button_annuler.removeAttribute("class");
    id_button_annuler.setAttribute("class","btn");
    id_button_annuler.setAttribute("class","btn-warning");


    var form = document.createElement("FORM");
    form.setAttribute("id", "myForm");
    form.setAttribute("action","administration.php");
    form.setAttribute("method","GET");

    document.getElementById("id_div_form").appendChild(form);

    var input = document.createElement("INPUT");
    input.setAttribute("type", "text");
    input.setAttribute("name", "promo_to_add");
    input.setAttribute("size", "25");
    input.setAttribute("placeholder", "Entrez la promo à ajouter");
    document.getElementById("myForm").appendChild(input);

    var input_url = document.createElement("INPUT");
    input_url.setAttribute("type", "hidden");
    input_url.setAttribute("name", "page");
    input_url.setAttribute("value", "promos");
    document.getElementById("myForm").appendChild(input_url);

    var button = document.createElement("INPUT");
    button.setAttribute("type", "submit");
    button.setAttribute("value", "Ajouter");
    //button.setAttribute("class","btn btn-success");
    document.getElementById("myForm").appendChild(button);
}

function update_promo(){

    var input = document.createElement("INPUT");
    input.setAttribute("type", "text");
    input.setAttribute("name", "promo_to_update");
    input.setAttribute("size", "25");
    //document.getElementById("").appendChild(input);

    var button = document.createElement("BUTTON");
    var texte = document.createTextNode("Valider modification");


    var form = document.createElement("FORM");
    form.setAttribute("id", "id_form");
    form.setAttribute("action","update_promo.php");
    form.setAttribute("method","GET");

    //document.getElementById("").appendChild(input);
}

</script>

</body>

</html>