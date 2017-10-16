
<div class="barre_recherche" id="resultat">


<?php

try{
	$bdd = new PDO('mysql:host=localhost;dbname=my_upload;charset=utf8', 'root', 'user');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(PDOException $e){
    die('Erreur : '. $e->getMessage());
}

if(isset($_GET['lettres'])){
	$lettres = $_GET['lettres'];

if (!empty($lettres)){

  $query_students = $bdd->query("SELECT * 
                                 FROM students 
                                 WHERE nom LIKE ".$bdd->quote($lettres.'%')." OR prenom LIKE ".$bdd->quote($lettres.'%'));
  $liste_students = $query_students->fetchALL(PDO::FETCH_ASSOC);

      
        foreach ($liste_students as $key => $value) { ?>
          <a href="administration.php?page=students&id=<?= $value['idStudent'] ?>" >

            <p onclick="recuperer_input()" id="<?= $value['idStudent'] ?>">  <?= $value['nom']." ".$value['prenom'] ?> </p>

          </a>
        <?php } ?>
</div>
<?php
}
}
?>

<script type="text/javascript">
  function recuperer_input(){
    //console.log("je passe dans la function ");
    //Dans l'input recherche y mettre la valeur du p
    
    // var id = '<?php //echo $_GET['id']; ?>';
    // var contenu_p = document.getElementById(id).value;

    //console.log("test: "+contenu_p);
    document.getElementById('id_nom_recherche').innerHTML = contenu_p;

    document.getElementById('id_nom_recherche').setAttribute("value",contenu_p);






  }
</script>
