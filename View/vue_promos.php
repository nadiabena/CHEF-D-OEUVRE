
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


</div>
