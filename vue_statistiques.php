<?php 

	require_once 'Model/config.php';


	

?>

<h1 style="text-align:left; color:white"> <u> Statistiques </u> </h1>

<div class="container">
	<div class="row">
        <div class="col-md-3">

        Promo:  <select>  
                    <option value="promo">Choisissez une promo</option>
                <?php      foreach ($liste_promos as $key => $value) {
                  ?>    
                              <option value="<?= $value['promo'] ?>"><?= $value['promo'] ?></option>
                <?php } ?>
                
                </select>
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
  ['Garçons', 8],
  ['Filles', 3]
]);

  // Optional; add a title and set the width and height of the chart
var options = {'title':'Promo 1 - Classe BXLAnderlecht', 'width':550, 'height':400};

//   var options = {
// chart: {
// title: 'Company Performance',
// subtitle: 'Sales, Expenses, and Profit: May-August'
// },
// chartArea:{
// backgroundColor: 'red'
// }
// };


  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>