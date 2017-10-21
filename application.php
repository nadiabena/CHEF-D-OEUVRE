<?php
session_start();


require_once 'Model/config.php';

   
/*
if(empty($_GET['login_prenom']) || empty($_GET['password'])){
  $_SESSION['error_connexion'] = 'Erreur! Le mot de passe et/ou le login incorrect..';
  header('Location: index.php');
}

if(isset($_GET['login_prenom']) ){ //&& isset
  $login = $_GET['login_prenom'];
} */

  //Connexion
  //echo isset($_POST['password']);
  if(isset($_SESSION['login_prenom']) && isset($_SESSION['password']) ){
    
  }else{

  if(empty($_POST['login_prenom']) || empty($_POST['password'])){
        $_SESSION['error_connexion'] = 'Erreur! Le mot de passe et/ou le login incorrect..';
        header('Location: index.php');
  }else {

  if(isset($_POST['login_prenom']) && isset($_POST['password']) ){
    $login = $_POST['login_prenom'];
    $password = $_POST['password'];

    $_SESSION['login_prenom'] = $_POST['login_prenom'];
    $_SESSION['password'] = $_POST['password'];

    $query_student = $bdd->query('SELECT prenom, password_students
                                  FROM students
                                  WHERE 
                                   prenom ='.$bdd->quote($login). 
                                 ' AND password_students ='. $bdd->quote($password));
      if($query_student->rowcount() !=0 ){

        $_SESSION['login_prenom'] = $_POST['login_prenom'];
        $_SESSION['password'] = $_POST['password'];
        //$_SESSION['avatar_user'] = $_POST['avatar_user'];
        //echo "OK";
      }else{
        //echo "KO";
        $_SESSION['error_connexion'] = 'Erreur! Le mot de passe et/ou le login incorrect..';
        header('Location: index.php'); // On reste sur la page connexion tant que le user n'entre pas les bonnes données
      }
  }else if(isset($_SESSION['login_prenom']) && isset($_SESSION['password']) ){

  }

 }//Else
}



  //Afficher toutes les photos à la une
  $query_photo_une = $bdd->query('SELECT * 
                                  FROM photo
                                  WHERE photo_une = 1');
  $liste_photo_une = $query_photo_une->fetchALL(PDO::FETCH_ASSOC);


/*
  public function select_priority_events(){
    $query = 'SELECT *
          FROM events
          WHERE event_priority = 1
          AND event_date >= NOW()
          ORDER BY event_date
          LIMIT 3';
    $result = $this->_db->query($query);
    $tab = array();
    if($result->rowcount()!=0){
      while($row = $result->fetch()){
        $address = Db::getInstance()->select_address_with_id($row->event_address);
        $tab[] = new Event($row->event_id, $row->event_name, $row->event_date, $row->event_descri, $row->event_image, $row->event_priority, $address);
      }
    }
    return $tab;
  } 
  */











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
  <link rel="stylesheet" type="text/css" href="View/css/style.css">

</head>
<body>

<div style="min-height: 100%;" class="content" >
  <div  style="padding: 0;
  padding-bottom: 50px;" class="content-inside" >


  <div style="height:1100px; background-color: #34495E" class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div style="text-align:right;"> <!--  class="container_espace_membre" -->
            <p> <a style="color:white" class="espace_membre" href="espace_membre.php"> Espace membre</a> </p> 
          </div>
      </div>
    </div>
    
    <div class="row">  
      <div class="col-md-12">
        <h1 style="text-align:center; font-size: 30px; color:white"> Application d'upload des photos pour les anciens de becode</h1>
        <br/>
      </div>
    </div>

    <div class="row">  
      <div class="col-md-12">
        <p style="margin-right:100px; text-align:right ;color:white"> Bonjour, <?= $_SESSION['login_prenom'] ?>  <a style="color:white" href="deconnexion.php">déconnexion</a> </p>
        <br/><br/><br/>
      </div>
    </div>


    <div class="row">  
      <div class="col-md-6">
        <a href="galerie.php"> <p style="color:white"> <u> Visiter la galerie </u> <span class="glyphicon glyphicon-hand-right"></span> </p> </a> <br/>
      </div>
    </div>


    <div class="row">  
      <div class="col-md-6">
        <h1 style="color:white"> <u> Image à la UNE </u> </h1><br/><br/>
      </div>
    </div>

    
   <!-- <div class="container"> -->
      <div class="row"> 
      
            <div style="padding:20px; background-color: #AEB6BF; border-radius: 15px" class="col-md-offset-3 col-md-6">
          
              <?php
                    if(sizeof($liste_photo_une) == 0){ ?>
                      <p> Il n'a actuellement aucune photo à la UNE</p>  
              <?php }else{
                      foreach ($liste_photo_une as $key => $value) { ?>
                      <div style="padding-right:5px;" class="col-xs-3 col-md-3 shadow">
                        <img class="" style="box-shadow: 5px 5px 10px #888888;" src="<?= $value['image']?>" height="auto" width="128"/>

                        <button type="button">
                            <a href="<?= $value['image']?>" download>
                              <span class="glyphicon glyphicon-download"></span>
                            </a>
                        </button>

                      </div>
              <?php } }?>


                  

            </div>


      </div> <!-- row -->
<!--    </div> 
 -->

 <!--    </div> -->





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
        <p style="color:white"> Copyright 2017 | All rights reserved <a style="color:white" href="becodeorg@gmail.com">becodeorg@gmail.com </a> </p>
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

</body>

</html>

