
        <h1 style="text-align:left; color:white"> <u>Gestion des événements </u> </h1>

          <div class="row">
                <?php
                    if(sizeof($liste_events) == 0){ ?>
                    <br/>
                    <p> Aucun événement n'est encore enregistré! </p>

                <?php } else { ?>

            <table>
              <tr>
                <th><u>Evénement</u></th>
                <th><u>Mettre à jour/ Supprimer</u></th>
              </tr>

              <?php 
                      foreach ($liste_events as $key => $value) { ?>
                        <tr>
                          <td width="80%"><?= $value['description_event']?></td>
                          <td width="20%"> 

                            <button onclick="update_event(<?=$value['id_event']?>)"  class="btn btn-default button_update_delete"><span class="glyphicon glyphicon-wrench glyphicon_maj"></span></button>

                            |

                            <a href='delete_event.php?id=<?= $value['id_event']; ?>'>
                              <button class="btn btn-default button_update_delete"><span class="glyphicon glyphicon-remove button_remove"></span></button>
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
        

        <div id="div_button_annuler_ajout" style="text-align: right;">
          <button id="id_button_annuler_ajout" onclick="retirer_button_annuler_ajout()" class="cacher">Annuler ajout</button>
        </div>

        <div id="id_div_form" class="cacher">
          <form id="myForm" action="" method="POST">
            <label>Evénement</label>
            <input size="35" type="texte" name="event_to_add" placeholder="Entrez l'événement à ajouter">
            <input type="hidden" name="page" value="event">
            <input type="submit" value="Ajouter">
          </form>
        </div>
        <br/>


        <div id="div_button_annuler_maj" style="text-align: right;">
          <button id="id_button_annuler_maj" onclick="retirer_button_annuler_maj()" class="btn btn-warning cacher">Annuler mise à jour</button>
        </div>

        <div class="cacher" id="id_div_mise_a_jour">
          <form action="" method="POST">
              Evénement <input size="35" type="text" name="event_maj" placeholder="Entrez l'événement">
              <input type="hidden" name="page" value="event" >
              <input id="test" type="hidden" name="id_event" value="">
              <input type="submit" class="btn btn-primary" value="Mettre à jour">
          </form>
        </div>
        <br/>



<?php }  ?>