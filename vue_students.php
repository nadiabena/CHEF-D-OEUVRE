<?php

require_once 'Model/config.php';

$student = [];
if(isset($_GET['id_nom_recherche']) && !empty($_GET['id_nom_recherche']) ){
  //$nom_a_rechercher = $_GET['id_nom_recherche'];
    if(isset($_GET['id_user']) && !empty($_GET['id_user'])){
      $id_student = $_GET['id_user'];


      //Récupérer les informations de l'étudiant séléctionné
      $query_student = $bdd->query('SELECT * 
                                    FROM students
                                    WHERE idStudent = '.$id_student); //nom LIKE %'.$_GET['nom_recherche'].'%'

      $student = $query_student->fetchALL(PDO::FETCH_ASSOC)[0];
    }  
}

//select option promo
if(isset($_GET['select_promo"']) &&!empty($_GET['select_promo"']) ){
//alors je crée un tableau avec tous les éléves de la promo selected

}

//Register un student
if(isset($_GET['select_promo']) &&!empty($_GET['select_promo']) ){
//alors je crée un tableau avec tous les éléves de la promo selected

}


if(isset($_POST['select_register']) &&!empty($_POST['select_register']) && $_POST['select_register'] == "oui"){
  $bdd->prepare("UPDATE students
                 SET register = '1'
                 WHERE idStudent  =".$_GET['id_user'] )->execute();

  $_SESSION['maj_register_ok'] = "L'étudiant a bien été enregistré!";

  $query_student = $bdd->query('SELECT * 
                                FROM students
                                WHERE idStudent = '.$id_student); //nom LIKE %'.$_GET['nom_recherche'].'%'

  $student = $query_student->fetchALL(PDO::FETCH_ASSOC)[0];

  //header('Location: administration.php?page=students');
}


if(isset($_SESSION['maj_register_ok'])  && !empty($_SESSION['maj_register_ok']) )  { 
        unset($_SESSION['maj_register_ok']);
?>
<br/>
<div style="text-align:left; color:green; border:1px solid green" id="div_enregistrer" >
  L'étudiant a bien été enregistré!
</div>
<?php }else{
  unset($_SESSION['maj_register_ok']); // pour le refresh??? Marche pas..
}

?>



        <h1 style="text-align:left; color:white"> <u>Gestion des étudiants </u> </h1>

          <div class="row">
                <?php
                    if(sizeof($liste_promos) == 0){ ?>
                    <br/>
                    <p> Aucun étudiant n'est encore enregistré! </p>

                <?php } else { ?>
                <div class="col-md-3">

                
                <form action="" method="GET" >
                  Promo:  <select name="select_promo">  
                                <option value="promo">Choisissez une promo</option>
                  <?php      foreach ($liste_promos as $key => $value) {
                    ?>
                                <option name="<?= $value['id_promo'] ?>" value="<?= $value['promo'] ?>"><?= $value['promo'] ?></option>
                  <?php } ?>
                          </select>


                  <!-- <input type="hidden" name="<?php //= $value['id_promo'] ?>"> -->

                 <!-- <input name="promo_checkbox[]" type="checkbox" id="id_promo_checkbox" value="promo">Ok<br> -->

                </form>

                </div>
                <div class="col-md-3">

                <form action="" method="GET" >  
                  Classe: <select>
                                <option value="classe">Choisissez une classe</option>
                    <?php      foreach ($liste_classes as $key => $value) {
                    ?>
                                 <option value="<?= $value['classe'] ?>"><?= $value['classe'] ?></option>
                  <?php } ?>
                          </select>

                  <!-- <input type="checkbox" name="classe" value="classe">Ok<br> -->

                </form>
                </div>

                <div class="col-md-4 col-md-offset-2">
                  <form class="form-group" style="text-align:right" action="" method="GET">
                    <input name="id_nom_recherche" size="35" type="text" id="recherche" placeholder="Rechercher un nom..">
                    <input type="hidden" name="id_user" id="id_user">
                    <input id="id_zone_recherche" type="submit" value="Rechercher"> <!-- onclick="creer_contenu_student()"  -->
                    <input type="hidden" name="page" value="students">

                      <?php include 'vue_search.php' ?>

                  </form>
                </div>

          </div> <!-- ROW interne -->


          <!-- Zone d'affichage de la recherche student -->
          <div id="id_div_form">
            <!-- <label> <?php //=$student['nom'] - $student['nom'] - $student['nom'] ?> </label> -->
            <br/><br/>
            <?php
              if(sizeof($student) != 0 ){
                ?>

                  <table>

                    <th><u>Nom</u></th>
                    <th><u>Prénom</u></th>
                    <th><u>Email</u></th>
                    <th><u>Enregistré(e)</u></th>  
                    <tr>
                      <td> <?= $student['nom']?> </td>
                      <td> <?= $student['prenom']?> </td>
                      <td> <?= $student['email_students']?> </td>
                      <td> <?php if($student['register'] == 0){
                                  echo 'Non';
                                  $enregistree = 0;
                                 }else{   
                                  echo 'Oui';
                                 }
                            ?> </td>
                    </tr>
                  </table>
              <?php } ?>

                  <?php if(isset($enregistree) && $enregistree == 0){ ?>
                    <br/><br/>
                    <form action="" method="POST">          
                      <label>Voulez-vous enregistrer cette personne?</label>
                      <select name="select_register">
                        <option value="choix">Choix</option>
                        <option value="non">Non</option>
                        <option value="oui">Oui</option>
                      </select>
                      <input type="hidden" name="page" value="students">

                      <input type="submit" name="valider_register" class="btn btn-success" value="Valider">
                    </form>
                  <?php } ?>


          </div>

          <br/><br/><br/>
          <div style="text-align: right;">
            <button onclick=" window.print();" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-print"></span> </button>
          </div>

        <br/>
<?php }  ?>


<!--   <div style="height:860px; background-color: #34495E" class="container-fluid">
    
    <div class="row">  
      <div class="col-md-12 "> -->

<script type="text/javascript">
  function checker() {
    // if(document.getElementById("promo_checkbox").checked == true){
    //     console.log("checked!");
    //     //console.log("Quelle promo selected: "+);

    // }
  
  }

  function creer_contenu_student(){
    //Griser le bouton recherche
    var id_zone_recherche = document.getElementById('id_zone_recherche');
    id_zone_recherche.disabled = true; 
    id_zone_recherche.setAttribute("style","color:gray");

   
    var form = document.createElement("FORM");
    form.setAttribute("id", "myForm");
    form.setAttribute("action","administration.php");
    form.setAttribute("method","GET");
    document.getElementById("id_div_form").appendChild(form);

    var input_url = document.createElement("INPUT");
    input_url.setAttribute("type", "hidden");
    input_url.setAttribute("name", "page");
    input_url.setAttribute("value", "students");
    document.getElementById("myForm").appendChild(input_url);


    var button = document.createElement("INPUT");
    button.setAttribute("type", "submit");
    button.setAttribute("value", "Valider");
    document.getElementById("myForm").appendChild(button);




  }

</script>


