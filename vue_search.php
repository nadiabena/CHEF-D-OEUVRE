
<div class="barre_recherche" id="resultat">


<?php

require_once 'Model/connect.php';

if(isset($_GET['lettres'])){
	$lettres = $_GET['lettres'];

if (!empty($lettres)){

  $query_students = $bdd->query("SELECT * 
                                 FROM students 
                                 WHERE nom LIKE ".$bdd->quote($lettres.'%')." OR prenom LIKE ".$bdd->quote($lettres.'%'));
  $liste_students = $query_students->fetchALL(PDO::FETCH_ASSOC);


        foreach ($liste_students as $key => $value) { ?>

            <a href="#" onclick="recuperer_input(this, event)" id="<?= $value['idStudent'] ?>" class="id" data-id="<?= $value['idStudent'] ?>"><?= $value['nom']." ".$value['prenom'] ?></a> <br/>

        <?php } ?>
</div>
<?php
}
}
?>

<script type="text/javascript">
  function recuperer_input(elem, e){

    e.preventDefault();

    // var url = document.location.href;
    // var get = url.searchParams.get('id');

    var newId = elem.id;
    var contenu_p = elem.innerHTML;
    console.log(document.getElementById('recherche'));


    document.getElementById('recherche').value = contenu_p;
    document.getElementById('id_user').value = newId;
    //document.getElementById('recherche').setAttribute("value",contenu_p);


  }
</script>
