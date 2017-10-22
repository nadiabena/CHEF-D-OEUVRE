
        <h1 style="text-align:left; color:white"> <u> Gestion des photos à la UNE </u> </h1> <br/>

          <div class="row">


                <div class="col-md-12">
      
                  <form action="" method="GET" >  
                      <label>Evénement: </label>
                      <select onchange="filtre(this)" name="filtre_event" id="id_filtre_event" > 
                                  <option value="0">Choisissez un événement</option>
                    <?php      foreach ($liste_events as $key => $value) {
                      ?>
                                  <option id="<?= $value['id_event'] ?>" >
                                    <?= $value['description_event'] ?></option>
                    <?php } ?>
                      </select> 
                    <!-- <input type="hidden" name="<?php //= $value['id_promo'] ?>"> -->
                   <!-- <input name="promo_checkbox[]" type="checkbox" id="id_promo_checkbox" value="promo">Ok<br> -->
                  </form>
                </div> 

                <?php
                    if(sizeof($liste_photos) == 0){ ?>
                    <br/>
                    <p> Aucune photo n'est encore enregistrée! </p>

                <?php } else { ?>

                        <div id="id_photo_by_event">

                        </div>
                <?php }  ?>


<!--             <table>
              <tr>
                <th><u>Photo</u></th>
                <th><u>Mettre à la UNE</u></th>
              </tr>

                <div id="id_photo_by_event">

                </div>

              <?php 
                      //foreach ($liste_photos as $key => $value) { ?>
                        <tr>
                          <td width="80%"> <img src='<?//= $value['image']?>' width="48px"> </td>
                          <td width="20%"> 
                          
                            <button onclick="activer_photo_une(<?//=$value['id_photo']?>)" class="btn button_update_delete">
                              <span class="glyphicon glyphicon-thumbs-up"></span></p>  
                            </button>                          
                            
                            |

                            <a href='delete_promo.php?id=<?//= $value['id_photo']; ?>'>
                              <button class="btn btn-default button_update_delete">
                                <span class="glyphicon glyphicon-thumbs-down"></span>
                              </button>
                            </a>

                          </td>
                          
                        </tr>
              <?php // } ?>
                      
            </table>  -->  

  

        <br/><br/><br/>
<!-- <?php //}  ?> -->


</div> 

<script type="text/javascript" src="View/js/filtre_event_photo_une.js"></script>
