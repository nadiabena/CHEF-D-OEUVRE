<?php
session_start();


if(isset($_GET['login_prenom'])){
  $login = $_GET['login_prenom'];
}



    try{
        $bdd = new PDO('mysql:host=localhost;dbname=my_upload;charset=utf8', 'root', 'user');

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      }catch(PDOException $e){
        die('Erreur : '. $e->getMessage());
      }

 //select pour récupérer le nom et prénom du student
  $var1 = $_SESSION['login_prenom'];
  $var2 = $_SESSION['password'];
  // $query_student = $bdd->query('SELECT nom, prenom
  //                               FROM students
  //                               WHERE prenom = '. $bdd->quote($var1) .
  //                              ' AND password_students ='. $bdd->quote($var2) );

  //var_dump($query_student);

  // $student_connected = [];
  // while ($donnees = $query_student->fetch()){
  //   $student_connected[] = array('nom' => $donnees['nom'],
  //                                'prenom' => $donnees['prenom'] );
  // }



  $query_student = "SELECT nom, prenom, email_students, promo, password_students
                    FROM students
                    WHERE prenom =". $bdd->quote($var1).
                   " AND password_students =". $bdd->quote($var2);
  
  $statement = $bdd->query($query_student);
  $student = $statement->fetchALL(PDO::FETCH_ASSOC);



  //Mise à jour des données:
  $_SESSION["error_pwd_and_conf"] = "";
  if(isset($_GET['email']) && isset($_GET['password']) && isset($_GET['confirm_password'])){
      //tester si les 2 mots de passe saissies sont identiques verifier que ce n'est pas vide les entrees
      if( $_GET['password'] !== $_GET['confirm_password'] ){ //!empty($_GET['password']) && !empty($_GET['confirm_password'])
        $_SESSION["error_pwd_and_conf"] = 'Erreur! Le mot de passe ne correspond pas la confirmation de mot de passe!';
        //echo 'error';
      }else{
        $_SESSION["error_pwd_and_conf"] = "";
        $bdd->prepare('UPDATE students 
                       SET email_students = '.$bdd->quote($_GET['email']).' , password_students ='. $bdd->quote($_GET['password']) .
                      ' WHERE nom ='. $bdd->quote($student[0]['nom']). 
                      ' AND prenom ='. $bdd->quote($student[0]['prenom']) )->execute(); //->execute()
      }
  }

  $query_student = "SELECT nom, prenom, email_students, promo, password_students
                    FROM students
                    WHERE prenom =". $bdd->quote($var1).
                   " AND password_students =". $bdd->quote($var2);
  
  $statement = $bdd->query($query_student);
  $student = $statement->fetchALL(PDO::FETCH_ASSOC);



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

  <link rel="stylesheet" type="text/css" href="style.css">  
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
        <p style="margin-right:100px; text-align:right ;color:white"> Bonjour, <?= $_SESSION['login_prenom']; ?>  <a style="color:white" href="deconnexion.php">déconnexion</a> </p>
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


                <label><?= $student[0]['promo'] ?></label>
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

                  <a href="application.php"> <button type="button" class="btn btn-default">Retour</button> </a> <!-- Récupérer le login et le mot de passe -->
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
        <a href="https://www.facebook.com/becode.org"> <img src="Images/facebook.png" alt="facebook" width="32px" height="32px"> </a>
        <a href="https://twitter.com/becodeorg"> <img src="Images/twitter.png" alt="twitter" width="32px" height="32px"> </a>
        <a href="https://www.instagram.com/becodeorg/"> <img src="Images/instagram.png" alt="instagram" width="32px" height="32px"> </a>
        <a href="https://www.linkedin.com/company/becode.org"> <img src="Images/linkedin.png" alt="linkedin" width="32px" height="32px"> </a>
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



</div>


<script>
  $(document).ready(function(){

function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}



    // $("#id_enregistrer").click(function(){
    //     $("p").toggle();
    // });






    function enregistrer_modif(){

    }
   
  });
</script>


</body>

</html>
