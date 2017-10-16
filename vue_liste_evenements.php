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

                            <a style="text-decoration: none" href="update_event.php?id=<?= $value['id_event']; ?>">
                              <button style="background-color:#AEB6BF;border:1px solid #AEB6BF" type="button" class="btn btn-default"><span style="color:blue"class="glyphicon glyphicon-wrench"></span></button>
                            </a>

                            |

                            <a href='delete_event.php?id=<?= $value['id_event']; ?>'>
                              <button style="background-color:#AEB6BF;border:1px solid #AEB6BF" type="button" class="btn btn-default"><span style="color:red" class="glyphicon glyphicon-remove"></span></button>
                            </a>

                          </td>
                          
                        </tr>
              <?php  } ?>
                      
            </table>   

  
          </div> <!-- ROW interne -->       

        <br/><br/><br/>
        <div style="text-align: right">
          <button class="btn btn-success">Ajouter</button>
        </div>
        <br/>
<?php }  ?>

            