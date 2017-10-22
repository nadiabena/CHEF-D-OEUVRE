<?php

require_once 'connect.php';

$student = [];
if(isset($_GET['id_nom_recherche']) && !empty($_GET['id_nom_recherche']) ){
  //$nom_a_rechercher = $_GET['id_nom_recherche'];
    if(isset($_GET['id_user']) && !empty($_GET['id_user'])){
      $id_student = $_GET['id_user'];


      //Récupérer les informations de l'étudiant séléctionné
      $query_student = $bdd->query('SELECT * 
                                    FROM students
                                    WHERE idStudent = '.$id_student); //nom LIKE %'.$_GET['nom_recherche'].'%'

      $student = $query_student->fetchALL(PDO::FETCH_ASSOC)[0];
    }  
}

//select option promo
if(isset($_GET['select_promo"']) &&!empty($_GET['select_promo"']) ){
//alors je crée un tableau avec tous les éléves de la promo selected

}

//Register un student
if(isset($_GET['select_promo']) &&!empty($_GET['select_promo']) ){
//alors je crée un tableau avec tous les éléves de la promo selected

}


if(isset($_POST['select_register']) &&!empty($_POST['select_register']) && $_POST['select_register'] == "oui"){
  $bdd->prepare("UPDATE students
                 SET register = '1'
                 WHERE idStudent  =".$_GET['id_user'] )->execute();

  $_SESSION['maj_register_ok'] = "L'étudiant a bien été enregistré!";

  $query_student = $bdd->query('SELECT * 
                                FROM students
                                WHERE idStudent = '.$id_student); //nom LIKE %'.$_GET['nom_recherche'].'%'

  $student = $query_student->fetchALL(PDO::FETCH_ASSOC)[0];

  //header('Location: administration.php?page=students');
}


if(isset($_SESSION['maj_register_ok'])  && !empty($_SESSION['maj_register_ok']) )  { 
        unset($_SESSION['maj_register_ok']);
?>
<br/>
<div style="text-align:left; color:green; border:1px solid green" id="div_enregistrer" >
  L'étudiant a bien été enregistré!
</div>
<?php }else{
  unset($_SESSION['maj_register_ok']); // pour le refresh??? Marche pas..
}

?>
