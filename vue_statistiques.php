<?php 

require_once 'Model/config.php';
	
if(isset($_POST['select_promo']) && !empty($_POST['select_promo'])){

  $promo_selected = $_POST['select_promo'];

  $query_boys = $bdd->query('SELECT count(*)
                             FROM students, promo, classe
                             WHERE genre = "M"
                               AND promo.id_promo = classe.id_promo
                               AND classe.id_classe = students.id_classe
                               AND promo.promo ='.$bdd->quote($_POST['select_promo']) );
  $nombre_boys = $query_boys->fetchALL(PDO::FETCH_ASSOC)[0];


  $query_girls = $bdd->query('SELECT count(*)
                              FROM students, promo, classe
                              WHERE genre = "F"
                                AND promo.id_promo = classe.id_promo
                                AND classe.id_classe = students.id_classe
                                AND promo.promo ='.$bdd->quote($_POST['select_promo']) );
  $nombre_girls = $query_girls->fetchALL(PDO::FETCH_ASSOC)[0];

//Si on séléctionne une promo qui n'a pas encore d'eleve afficher message adéquat.. 
}

?>

<h1 style="text-align:left; color:white"> <u> Statistiques </u> </h1>

<div class="container">
	<div class="row">
        <div class="col-md-4">

        <form  action="" method="POST">
          Promo:  <select id="id_select_promo" name="select_promo">  
                      <option value="promo">Choisissez une promo</option>
                  <?php      foreach ($liste_promos as $key => $value) {
                    ?>
                                <option value="<?= $value['promo'] ?>"><?= $value['promo'] ?></option>
                  <?php } ?>

                  </select>
                  
                  <input type="hidden" name="page" value="stat">  
                  <input type="submit" value="Valider" />
        </form>
                <br/><br/>
        </div>
	</div>
</div>



<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Pourcentage', 'Boys by Girls'],
  ['Garçons', <?= $nombre_boys['count(*)'] ?> ],             
  ['Filles', <?= $nombre_girls['count(*)'] ?> ]               
]);

  // Optional; add a title and set the width and height of the chart
var options = {'title':'<?= $promo_selected; ?> ', 'width':550, 'height':400};   //Promo 1 - Classe BXLAnderlecht 

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);

}
</script>