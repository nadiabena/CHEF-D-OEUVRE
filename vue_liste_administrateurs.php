        <h1 style="text-align:left; color:white"> <u>Gestion des administrateurs </u> </h1>

          <div class="row">
            <table>
              <tr>
                <th><u>Identifiant</u></th>
                <th><u>Nom</u></th>
                <th><u>Prénom</u></th>
                <th><u>Email</u></th>
                <th><u>Téléphone</u></th>
                <th><u>Date de naissance</u></th>
                <th><u>Statut</u></th>
                <th><u>Mettre à jour/ Supprimer</u></th>
              </tr>

              <?php 
                    if(sizeof($liste_admin) == 0){ ?>
                      <tr>
                        <td> Aucun administrateur n'est encore enregistré! </td>
                      </tr>     
              <?php }else{

                      foreach ($liste_admin as $key => $value) { ?>
                        <tr>
                          <td><?= $value['login_user']?></td>
                          <td><?= $value['nom_user']?></td>
                          <td><?= $value['prenom_user']?></td>
                          <td><?= $value['email_user']?></td>
                          <td><?= $value['telephone']?></td>
                          <td><?= $value['datenaissance_user']?></td>
                          <td><?= $value['statut']?></td>
                          <td> 

                            <a style="text-decoration: none" href="update_admin.php?id=<?= $value['id_user']; ?>">
                              <button style="background-color:#AEB6BF;border:1px solid #AEB6BF" type="button" class="btn btn-default"><span style="color:blue"class="glyphicon glyphicon-wrench"></span></button>
                            </a>

                            |

                            <a style="text-decoration: none" href="delete_admin.php?id=<?= $value['id_user']; ?>">
                              <button style="background-color:#AEB6BF;border:1px solid #AEB6BF" type="button" class="btn btn-default"><span style="color:red" class="glyphicon glyphicon-remove"></span></button>
                            </a>
                          </td>
                          
                        </tr>
              <?php   } } ?>
                      
            </table>   

  
          </div> <!-- ROW interne -->       

        <br/><br/><br/>
        <div style="text-align: right">
          <button class="btn btn-success">Ajouter</button>
        </div>
        <br/>



