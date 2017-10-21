        <h1 style="text-align:left; color:white"> <u> Gestion des classes </u> </h1>

          <div class="row">
                <?php
                    if(sizeof($liste_classes) == 0){ ?>
                    <br/>
                    <p> Aucune classe n'est encore enregistrée! </p>

                <?php } else { ?>

            <table>
              <tr>
                <th><u>Classe</u></th>
                <th><u>Promo</u></th>
                <th><u>Mettre à jour/ Supprimer</u></th>
              </tr>

              <?php 
                      foreach ($liste_classes as $key => $value) { ?>
                        <tr>
                          <td width="40%"><?= $value['classe']?></td>
                          <td width="40%"><?= $value['promo']?></td>
                          <td width="20%"> 

<!--                             <a style="text-decoration: none" href="update_promo.php?id=<?//= $value['id_promo']; ?>">
                              <button type="button" class="btn btn-default button_update_delete"><span class="glyphicon glyphicon-wrench glyphicon_maj"></span></button>
                            </a> -->

                            <button onclick="update_classe(<?=$value['id_classe']?>)" class="btn button_update_delete"><span class="glyphicon glyphicon-wrench glyphicon_maj"></span></button> 
                           
                            |

                            <a href='delete_classe.php?id=<?= $value['id_classe']; ?>'>
                              <button class="btn btn-default button_update_delete"><span class="glyphicon glyphicon-remove button_remove"></span></button>
                            </a>

                          </td>
                          
                        </tr>
              <?php  } ?>

            </table>

          <?php }  ?>
          </div> <!-- ROW interne -->       

        <br/><br/><br/>


        <div id="div_button_ajouter" style="text-align: right">
          <button id="id_button_ajouter_classes" onclick="creer_zone_ajout_classes()" class="btn btn-success">Ajouter</button>
        </div>

        <div id="id_div_form">
        </div>


        <div id="div_button_annuler" style="text-align: right;">
          <button id="id_button_annuler" onclick="retirer_button_annuler()" class="btn btn-warning cacher">Annuler ajout</button>
        </div>


        <div class="cacher" id="id_div_mise_a_jour">
          <form action="" method="POST">
              Classe <input size="35" type="text" placeholder="Entrez la classe à modifier" name="classe_maj"> 
              Promo <input size="35" type="text" placeholder="Entrez la promo à modifier" name="promo_maj">

              <input id="id" type="hidden" name="id_classe" value="">
              <input type="hidden" name="page" value="classes">
              <input type="submit" class="btn btn-primary" value="Mettre à jour">
          </form>
        </div>

        <div id="div_button_annuler" style="text-align: right;">
          <button id="id_button_annuler_maj" onclick="retirer_button_annuler_maj()" class="btn btn-warning cacher">Annuler mise à jour</button>
        </div>

        <br/>