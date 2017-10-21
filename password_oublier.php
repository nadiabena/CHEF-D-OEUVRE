<?php
//session_start();

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

// unset($_SESSION['envoi_password_ok']);  
// unset($_SESSION['envoi_password_ko']);


$envoi_password_ok = "";
$envoi_password_ko = "";

if(isset($_GET['email']) && !empty($_GET['email'])){
  //$_SESSION["envoi_password_ok"] = "Votre demande a bien été prise en compte, vous recevrez un nouveau mot de passe sous peu!";
  $envoi_password_ok = "Votre demande a bien été prise en compte, vous recevrez un nouveau mot de passe sous peu!";
}else if(isset($_GET['email']) && empty($_GET['email'])){
  //$_SESSION["envoi_password_ko"] = "Adresse email vide!";
  $envoi_password_ko = "Adresse email vide!";
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

  <link rel="icon" type="image/png" sizes="32x32" href="Images/becode.jpg">

  <link rel="stylesheet" type="text/css" href="View/css/style.css">

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

      <br/>
        <?php if(!empty($envoi_password_ok)){ 
           
        ?>
                <div class="alert alert-success p_envoi_password_ok" role="alert"> <?= $envoi_password_ok; ?> </div>

        <?php }else if(!empty($envoi_password_ko)){ 
                
        ?>
              <div class="alert alert-danger p_envoi_password_ko" role="alert">  <?= $envoi_password_ko; ?> </div>
        <?php } ?>

        Veuillez entrer votre adresse email sur lequel vous recevrez les directives pour réinitialiser votre
        mot de passe. <br/><br/>

        <form action="" method="GET">
            <div class="input-group">
              <input name="email" type="text" class="form-control" id="id_email" placeholder="Entrez votre adresse email">
              <input type="submit" class="btn btn-primary" value="Envoyer">
            </div>
        </form>

        <br/>
          <p class="p_equipe_administrative">   L'équipe administrative. </p>
     
  </div>

</body>

</html>


