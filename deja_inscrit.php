<?php
session_start();

  //(!empty($_GET) &&
  // if( isset($_GET['confirm_password']) && isset($_GET['password']) && isset($_GET['email'])  && isset($_GET['login_prenom']) && isset($_GET['login_nom']) &&
  //     !empty($_GET['confirm_password']) && !empty($_GET['password']) && !empty($_GET['email']) && !empty($_GET['login_prenom']) && !empty($_GET['login_nom']) ){
  //   $password = $_GET['password'];
  //   $confirm_password = $_GET['confirm_password'];
  //   $email = $_GET['email'];   // une adresse email est composé comment???

  //   $login_prenom = $_GET['login_prenom'];
  //   $login_nom = $_GET['login_nom'];

  //   $_SESSION['nom_student'] = $login_prenom;
  //   $_SESSION['prenom_student'] = $login_nom;

  //   $array_email = str_split($email);


  //   if($password !== $confirm_password){
  //     $_SESSION['error'] = "Le mot de passe ne correspond pas à la confirmation du mot de passe!";
  //     header('location: index.php');
  //   }
  // }

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

  <link rel="icon" type="image/png" sizes="32x32" href="Images/becode.jpg">

  <link rel="stylesheet" href="style.css">

</head>
<body>

  <div class="container_langue">
    <a class="lien_langue" href="">Fr</a>
    <a class="lien_langue" href="">Nl</a>  
    <a class="lien_langue" href="">En</a>  
  </div>

  <h1 style="padding-left: 500px; color:blue"> Bienvenue sur MyUpload de BeCode</h1>
  <br/><br/><br/>  
  <div class="confirmation_inscription">

      <p> <br/>     
        Bonjour <?= $_SESSION['prenom_student'].' '. $_SESSION['nom_student'].'!'; ?> <br/>
        <br/>
        Vous êtes déjà inscrit(e), donc vous ne pouvez pas à nouveau effectuer une réinscription.<br/><br/>
        Vous pouvez, par contre, directement vous connecter sur la plateforme!<br/>
        <br/>
                      <p class="p_equipe_administrative">   L'équipe administrative. </p>
      </p>
  </div>

</body>

</html>


