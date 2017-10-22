


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



