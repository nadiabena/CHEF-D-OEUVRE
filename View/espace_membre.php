
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

  <link rel="icon" type="image/png" sizes="32x32" href="../View/Images/becode.jpg">

  <link rel="stylesheet" type="text/css" href="../View/css/style.css">  
</head>

<body>

<div style="min-height: 100%;" class="content" >
  <div  style="padding: 0;
  padding-bottom: 50px;" class="content-inside" >


  <div style="height:860px; background-color: #34495E" class="container-fluid">
    
    <div class="row">  
      <div class="col-md-12">
        <h1 style="text-align:center; font-size: 30px; color:white"> Application d'upload des photos pour les anciens de becode</h1>
        <br/>
      </div>
    </div>

    <div class="row">  
      <div class="col-md-12">
        <p style="margin-right:100px; text-align:right ;color:white"> Bonjour, <?= $_SESSION['login_prenom']; ?>  <a style="color:white" href="../Model/deconnexion.php">déconnexion</a> </p>
        <br/>
      </div>
    </div>


    <div class="row">  
      <div class="col-md-6">
        <h1 style="color:white"> <u> Espace membre </u> </h1>
        <br/><br/>
      </div>
    </div>

    
   <!-- <div class="container"> -->
      <div class="row">
            <div style="padding:20px; background-color: #AEB6BF; border-radius: 15px" class="col-md-offset-3 col-md-6">
              <div style="text-align:right">

              <?php if( $_SESSION["error_pwd_and_conf"] == ""){ ?>

                <?php if(isset($_GET['message_enregistrer_ok']))  { ?>
                <div style="text-align:left; color:green; border:1px solid green" id="div_enregistrer" >
                  Vos données ont bien été mises à jour!
                </div>
                <?php } ?>
              <?php }else{ ?>

                 <?php if(isset($_GET['password_incorrect']))  { ?>
                <div style="text-align:left; color:red; border:1px solid red" id="div_password_incorrect" >
                  Erreur! Le mot de passe ne correspond pas la confirmation du mot de passe!
                </div>
                <?php } ?> 
              <?php } ?>


                <label><?= $student[0]['promo']; ?></label>
              </div>
            <form action="" method="GET">
                <label for="login_prenom">Prénom:</label>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                  <input disabled name="login_prenom" type="text" class="form-control" id="usr" placeholder="<?= $_SESSION['login_prenom'] ?>">
                </div>

                <label for="login_nom">Nom:</label>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
                  <input disabled name="login_nom" type="text" class="form-control" id="usr" placeholder="<?= $student[0]['nom'] ?>">
                </div>

                <label for="password">Password:</label>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                  <input size="8" name="password" type="password" class="form-control" id=""  value="<?= $student[0]['password_students'] ?>">
                </div>
                <div style="color:red"><?= isset($message_erreur) ? $message_erreur : false; ?></div>

                <label for="confirm_password">Confirm password:</label>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
                  <input size="8" name="confirm_password" type="password" class="form-control" id="" value="<?= $student[0]['password_students'] ?>">
                </div>
                <div style="color:red"><?= isset($message_erreur) ? $message_erreur : false; ?></div>

                <label for="email">Email:</label>
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
                  <input name="email" type="text" class="form-control" id="" value="<?= $student[0]['email_students'] ?>">
                </div>
                <br/><br/>

                <input type="hidden" name="message_enregistrer_ok">

                <input type="hidden" name="password_incorrect">

                <div style="text-align:right">
                  <input type="submit" id="id_enregistrer" style ="margin-left:160px" class="btn btn-success" value="Mettre à jour">

                  <a href="../application.php"> <button type="button" class="btn btn-default">Retour</button> </a> <!-- Récupérer le login et le mot de passe -->
                </div>

              </form>
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
        <a href="https://www.facebook.com/becode.org"> <img src="../View/Images/footer/facebook.png" alt="facebook" width="32px" height="32px"> </a>
        <a href="https://twitter.com/becodeorg"> <img src="../View/Images/footer/twitter.png" alt="twitter" width="32px" height="32px"> </a>
        <a href="https://www.instagram.com/becodeorg/"> <img src="../View/Images/footer/instagram.png" alt="instagram" width="32px" height="32px"> </a>
        <a href="https://www.linkedin.com/company/becode.org"> <img src="../View/Images/footer/linkedin.png" alt="linkedin" width="32px" height="32px"> </a>
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



</div>




</body>

</html>
