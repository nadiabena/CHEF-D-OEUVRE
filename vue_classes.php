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

                            <a style="text-decoration: none" href="update_promo.php?id=<?= $value['id_promo']; ?>">
                              <button style="background-color:#AEB6BF;border:1px solid #AEB6BF" type="button" class="btn btn-default"><span style="color:blue"class="glyphicon glyphicon-wrench"></span></button>
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
        <div style="text-align: right">
          <button class="btn btn-success">Ajouter</button>
        </div>
        <br/>
<?php }  ?>

            