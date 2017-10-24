<?php
session_start();


//if(isset($_POST['login_prenom']) && isset($_POST['password']) && !empty($_POST['login_prenom']) && !empty($_POST['password']) ){
//  $_SESSION['login'] = $_POST['login_prenom'];
//  $_SESSION['password'] = $_POST['password'];

//$_POST['login_prenom'] = $_SESSION['login'];
//$_POST['password'] = $_SESSION['password'];


if(isset($_SESSION['login']) && isset($_SESSION['password']) ){ 
  $_POST['login_prenom'] = $_SESSION['login'];
  $_POST['password'] = $_SESSION['password'];
}

if(!isset($_POST['login_prenom']) || !isset($_POST['password']) || empty($_POST['login_prenom']) || empty($_POST['password'])){
    $_SESSION['error_connexion'] = 'Erreur! Le mot de passe et/ou le login incorrect..';
    header('Location: connexion_admin.php');
}else{

}

//   // if(empty($_POST['login_prenom']) || empty($_POST['password'])){
  //       //$_SESSION['error_connexion'] = 'Erreur! Le mot de passe et/ou le login incorrect..';
  //      header('Location: connexion_admin.php');
  //
// 
// else if(isset($_GET['page'])){
//     $page = $_GET['page'];
// }else{
  //Si ma session est définie je ne fais rien..

//}
//else if(empty($_SESSION['login_prenom']) || empty($_SESSION['password']) ){
//}


require_once 'Model/connect.php';

  //Listes des administrateurs:
  // $query_administrateurs = $bdd->query('SELECT *
  //                                       FROM users');
  // $admins = [];
  
  // while ($donnees = $query_administrateurs->fetch()){
  //   $admins[] = array('id_user' => $donnees['id_user'],
  //                     'nom_user' => $donnees['nom_user'],  
  //                     'prenom_user' => $donnees['prenom_user'],
  //                     'datenaissance_user' => $donnees['datenaissance_user'],
  //                     'email_user' => $donnees['email_user'],
  //                     'login_user' => $donnees['login_user'],
  //                     'statut' => $donnees['statut']);
  // }


//Liste des administrateurs
$query_administrateurs = $bdd->query('SELECT * FROM users');
$liste_admin = $query_administrateurs->fetchALL(PDO::FETCH_ASSOC);

//Liste des événements
$query_events = $bdd->query('SELECT * FROM event');
$liste_events = $query_events->fetchALL(PDO::FETCH_ASSOC);

//Liste des promos
$query_promos = $bdd->query('SELECT * FROM promo');
$liste_promos = $query_promos->fetchALL(PDO::FETCH_ASSOC);

//Liste des classes
$query_classes = $bdd->query('SELECT id_classe, classe, promo 
                              FROM classe, promo
                              WHERE classe.id_promo = promo.id_promo');
$liste_classes = $query_classes->fetchALL(PDO::FETCH_ASSOC);

//Liste des photos
$query_photos = $bdd->query('SELECT * FROM photo');
$liste_photos = $query_photos->fetchALL(PDO::FETCH_ASSOC);






  //Connexion
  if(empty($_POST['login_prenom']) || empty($_POST['password'])){
       $_SESSION['error_connexion'] = 'Erreur! Le mot de passe et/ou le login incorrect..';
       header('Location: connexion_admin.php');
  } else if(isset($_POST['login_prenom']) && isset($_POST['password']) ){
    $login = $_POST['login_prenom'];
    $password = $_POST['password'];

    $_SESSION['login'] = $_POST['login_prenom'];
    $_SESSION['password'] = $_POST['password'];

    $query_student = $bdd->query('SELECT login_user, password_user
                                  FROM users
                                  WHERE 
                                   login_user ='.$bdd->quote($login). 
                                 ' AND password_user ='. $bdd->quote($password));
      if($query_student->rowcount() !=0 ){

        $_SESSION['login'] = $_POST['login_prenom'];
        $_SESSION['password'] = $_POST['password'];
        //$_SESSION['avatar_user'] = $_POST['avatar_user'];
        //echo "OK";
      }else{
        //echo "KO";
        $_SESSION['error_connexion'] = 'Erreur! Le mot de passe et/ou le login incorrect..';
       header('Location: connexion_admin.php'); // On reste sur la page connexion tant que le user n'entre pas les bonnes données
      }
 }



?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>MyUpload de BeCode</title>
  <meta name="author" content="Nadia B.">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="View/font-awesome/css/font-awesome.min.css">

  <link rel="icon" type="image/png" sizes="32x32" href="Images/becode.jpg">

  <link rel="stylesheet" type="text/css" href="View/css/style.css">

</head>
<body>

<div style="min-height: 100%;" class="content" >
  <div  style="padding: 0;
  padding-bottom: 50px;" class="content-inside" >


  <div style="height:1100px; background-color: #34495E" class="container-fluid">
    
    <div class="row">  
      <div class="col-md-12">
        <br/>
        <p style="margin-right:100px; text-align:right ;color:white"> Bonjour, <?= $_SESSION['login'] ?>  <a style="color:white" href="Model/deconnexion.php">déconnexion</a> </p>
        <br/>
      </div>
    </div>

    <div class="row">  
      <div class="col-md-12">
        <h1 style="text-align:left; font-size: 30px; color:white"> Partie administration </h1>
        
        <br/><br/><br/>
      </div>
    </div>

    <div class="row">  
        <div class="col-md-3" style="background-color: #AEB6BF; border-radius: 15px">
          <h1 style="text-align:left; color:white;"> <u> Opérations </u> </h1>

          <p> <i class="fa fa-users" aria-hidden="true"></i> <a href="administration.php?page=promos"> Gestion des promos </a></p>
          <p> <i class="fa fa-users" aria-hidden="true"></i> <a href="administration.php?page=classes"> Gestion des classes </a></p>           
          <p> <i class="fa fa-users" aria-hidden="true"></i> <a href="administration.php?page=students"> Gestion des étudiants </a></p>
          <p> <i class="fa fa-camera-retro" aria-hidden="true"></i> <a href="administration.php?page=event"> Gestion des événements </a></p>         
          <p class="lien_menu" id="menu"> <i class="fa fa-cog" aria-hidden="true"></i> Gestion du contenu du site </p>

            <div id="sous_menu" style="padding-left: 30px; display: none;">
                <p id="" style="font-size:12px"> <i class="fa fa-cog" aria-hidden="true"></i> <a href="administration.php?page=add_photo_event"> Ajouter photo à un événement </a></p>               
                <p id="sous_menu_photo" style="font-size:12px"> <i class="fa fa-file-image-o" aria-hidden="true"></i> <a href="administration.php?page=photo"> Gestion des photos à la UNE </a></p>
            </div>

          <p> <i class="fa fa-user" aria-hidden="true"></i> <a href="administration.php?page=admin"> Gestion des administrateurs </a></p>
          <p> <i class="fa fa-bar-chart" aria-hidden="true"></i> <a href="administration.php?page=stat"> Statistiques </a></p>
                   
          <p> <span class="glyphicon glyphicon-folder-close"></span> <a href="administration.php?page=archive"> Archives </a> </p>

        </div>    

      <div class="col-md-9" style="background-color: #AEB6BF; border-radius: 15px"> 

        
        <!-- <?php //include 'vue_liste_administrateurs.php'; ?> -->

        <?php
              if(!empty($_GET['page']) && isset($_GET['page'])){
                $page = $_GET['page'];
                    switch($page){
                      case 'admin':
                                    // unset($_SESSION['maj_ok']);
                                    // unset($_SESSION['suppression_ok']);   
                                    include 'vue_liste_administrateurs.php';
                                    break;
                      case 'event': 
                                    include 'Controller/vue_liste_evenements.php';
                                    break;
                      case 'stat': 
                                    include 'vue_statistiques.php';
                                    break;   
                      case 'promos': 
                                    include 'Controller/vue_promos.php';
                                    break;   
                      case 'students': 
                                    include 'Controller/vue_students.php';
                                    break;  
                      case 'classes': 
                                    include 'Controller/vue_classes.php';
                                    break;
                      case 'add_photo_event':          
                                    include 'vue_add_photo_event.php';
                                    break;
                      case 'photo':          
                                    include 'vue_photo.php';
                                    break;                                    
                      case 'archive': 
                                    //include 'vue_archive.php';
                                    break;
                      default:
                                    include 'View/vue_error404.php';
                                    break;
                                  
                  }
              }else if(!isset($_GET['page']) || empty($_GET['page'])){
                include 'vue_bienvenue_admin.php';
              }

        ?>

      <!-- <?php //include 'vue_liste_evenements.php'; ?> -->


      </div>
    </div> <!-- ROW Parent-->





    <br/>

<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
              <div style="text-align:center; border-top: 1px solid white;"> 
        <br/> 
        <p style="color:white"> Suivez-nous </p>
        <a href="https://www.facebook.com/becode.org"> <img src="View/Images/footer/facebook.png" alt="facebook" width="32px" height="32px"> </a>
        <a href="https://twitter.com/becodeorg"> <img src="View/Images/footer/twitter.png" alt="twitter" width="32px" height="32px"> </a>
        <a href="https://www.instagram.com/becodeorg/"> <img src="View/Images/footer/instagram.png" alt="instagram" width="32px" height="32px"> </a>
        <a href="https://www.linkedin.com/company/becode.org"> <img src="View/Images/footer/linkedin.png" alt="linkedin" width="32px" height="32px"> </a>
        <br/>
        <br/>

        <p style="color:white"> Powered by Nadia </p>
        <p style="color:white"> Copyright &copy; 2017 | All rights reserved <a style="color:white" href="becodeorg@gmail.com">becodeorg@gmail.com </a> </p>
          </div>
      </div>
    </div>
    </div>
</footer>    




    </div> <!-- row -->
  </div>  <!--container-fluid> -->

<!--
  <div class="container_espace_membre">
    <p> Bonjour, <?= $login ?>  <a href="index.php">déconnexion</a> <a class="espace_membre" href="">Espace membre</a> </p>
  </div>

  <h1 style="font-size: 30px;padding-left: 300px; color:blue"> Application d'upload des photos pour les anciens de becode</h1>
  <br/><br/><br/>

  <div class="container-fluid">
    <div class="row">        
        <h1> <u> Image à la UNE </u> </h1>
        <div style="padding-right:5px;" class="col-xs-3 col-md-3 event-box shadow">
          <img src="Images/groupe_gagnant.JP"  height="auto" width="128"/> 
        </div>

        <div style="padding-right:5px; padding-left:5px" class="col-xs-3 col-md-3 event-box shadow">
          <img src="Images/groupe_gagnant.JP"  height="auto" width="128"/> 
        </div>

        <div style="padding-right:5px; padding-left:5px" class="col-xs-3 col-md-3 event-box shadow">
          <img src="Images/nadia.jpg"  height="auto" width="128"/> 
        </div>

    </div>
  </div> -->

</div>

<script type="text/javascript" src="View/js/search.js"></script>
<script type="text/javascript" src="View/js/vue_classes.js"></script>
<script type="text/javascript" src="View/js/vue_promos.js"></script>
<script type="text/javascript" src="View/js/vue_students.js"></script>
<script type="text/javascript" src="View/js/vue_liste_evenements.js"></script>

<script>

$(document).ready(function(){
    $("#menu").click(function(){
        if($("#sous_menu").css('display') == 'none'){
            $("#sous_menu").css('display', 'block');
        }else{
          $("#sous_menu").css('display', 'none');
        }
    });


    //Récupérer l'url si page=photo ou  page=add_photo_event alors display block
    if(location.toString().indexOf("photo") != -1){
        $("#sous_menu").css('display', 'block');
    }

});

</script>

</body>

</html>

