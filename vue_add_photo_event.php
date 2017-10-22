
        <h1 style="text-align:left; color:white" class="titre_vue"> <u>Ajout d'une photo à un événement </u> </h1>
        <br/>

          <div class="row">
                <?php
                    if(sizeof($liste_events) == 0){ ?>
                    <br/>
                    <p> Aucun événement n'est encore enregistré! </p>

                <?php } else { 
                  ?>
                 
                 <p style="padding-left:13px; "><i>Choisissez un événement et télécharger la photo à affecter à cet événement choisissez, ensuite valider</i></p> <br/>
                   
                <div class="col-md-12">
      
                  <form action="" method="GET" >  
                      <label>Evénement: </label>
                      <select name="select_event"> 
                                  <option value="event">Choisissez un événement</option>
                    <?php      foreach ($liste_events as $key => $value) {
                      ?>
                                  <option name="<?= $value['id_event'] ?>" value="<?= $value['description_event'] ?>">
                                    <?= $value['description_event'] ?></option>
                    <?php } ?>
                      </select>
                    <!-- <input type="hidden" name="<?php //= $value['id_promo'] ?>"> -->
                   <!-- <input name="promo_checkbox[]" type="checkbox" id="id_promo_checkbox" value="promo">Ok<br> -->
                      
                      <br/><br/>
                      <label>Photo:</label><input type="file" name="photo" id="id_photo" multiple>   <!-- accept="image/*" -->
                      <input type="submit" value="Valider" class="btn btn-success">
                  </form>
                </div>

                <div class="col-md-8">
                      <form action="" method="GET" enctype="multipart/form-data">
                      <!-- <label>Photo:</label><input type="file" name="photo" id="id_photo" multiple>   accept="image/*"
                      <input type="submit" value="Valider" class="btn btn-success"> -->
                    </form>

                    <!-- <select id="select" onchange="change();">
                              <option value="photo">Choisissez une photo</option>
                      <?php   //foreach ($liste_photos as $key => $value) {
                      ?>
                         
                        <option style="background:url('<?//= $value['image'] ?>') no-repeat; width:10px; height:10px;" value="<?//= $value['id_photo'] ?>"> </option>                              
                    <?php } ?>
                      </select> -->
                    <!-- <input type="checkbox" name="classe" value="classe">Ok<br> -->
<!--                     <?php //}  ?>
 -->                  <!-- </form> -->
                </div>

 


          </div> <!-- ROW interne -->


            <!-- Zone d'affichage de la recherche student -->
            <!-- ajouter bouton valider -->

          <br/><br/><br/>
          <div style="text-align: right;">
            <button onclick=" window.print();" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-print"></span> </button>
          </div>

        <br/>



<!--   <div style="height:860px; background-color: #34495E" class="container-fluid">
    
    <div class="row">  
      <div class="col-md-12 "> -->


<script type="text/javascript">

function change() {
 
select = document.getElementById("select");
select_s = select.style;
 
switch(select.selectedIndex) {
 
case 0 :
select_s.background = "url('View/Images/groupe_gagnant.JP') no-repeat";
break;
 
case 1 :
select_s.background = "url('View/Images/groupe_gagnant.JP') no-repeat";
break;
 
case 2 :
select_s.background = "url('View/Images/groupe_gagnant.JP') no-repeat";
break;

default:
select_s.background = "none";
break;
}
}  


</script>
