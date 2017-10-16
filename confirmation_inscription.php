<?php
session_start();
  //connexion a la db et via le nom et prénom voir si cette personne est deja inscrite et la renvoyer vers la page 
  //deja inscrite
  try{
      $bdd = new PDO('mysql:host=localhost;dbname=my_upload;charset=utf8', 'root', 'user');

      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }catch(PDOException $e) {
      die('Erreur : ' . $e->getMessage());
  }


  //(!empty($_GET) &&
  if( isset($_GET['confirm_password']) && isset($_GET['password']) && isset($_GET['email'])  && isset($_GET['login_prenom']) && isset($_GET['login_nom']) &&
      !empty($_GET['confirm_password']) && !empty($_GET['password']) && !empty($_GET['email']) && !empty($_GET['login_prenom']) && !empty($_GET['login_nom']) ){

    $password = $_GET['password'];
    $confirm_password = $_GET['confirm_password'];
    $email = $_GET['email'];   // une adresse email est composé comment???

    $login_prenom = $_GET['login_prenom'];
    $login_nom = $_GET['login_nom'];

    $_SESSION['prenom_student'] = $_GET['login_prenom'];
    $_SESSION['nom_student'] = $_GET['login_nom'];

    //$array_email = str_split($email); //tester l'email son format


    if($password !== $confirm_password){
      $_SESSION['error'] = "Le mot de passe ne correspond pas à la confirmation du mot de passe!";
      header('location: index.php');
    }

  }



  //Test pour savoir si l'apprenant existe dans la base de données, s'il est enregistré
  $query_students_existe = $bdd->query('SELECT idStudent, prenom, nom
                                        FROM students
                                        WHERE prenom ='.$bdd->quote($login_prenom) .
                                       ' AND nom ='. $bdd->quote($login_nom) .
                                       ' AND register = 1');
  $resultat = $query_students_existe->fetch(); //$item = $statement->fetchALL(PDO::FETCH_ASSOC);

  if($query_students_existe->rowcount() !=0 ){
        //echo "Vous n'avez pas le droit de vous inscrire!\n";
        /////$_SESSION['prenom_student'] = $_GET['login_prenom'];
        /////$_SESSION['nom_student'] = $_GET['login_nom'];

        header('Location: deja_inscrit.php');
  }//else{
      // $query = $bdd->query('SELECT idStudent
      //                       FROM students
      //                       WHERE register = 1');
      // $resultat = $query->fetch(); //$item = $statement->fetchALL(PDO::FETCH_ASSOC);

       // if($query_students_existe->rowcount() !=0 ){
       //    header('Location: deja_inscrit.php');
       // }

  //}



  //envoie d'un mail à l'administrateur pour l'avertir qu'un nouveau user désire s'enregistre:
  $to      = 'becodeorg@gmail.com';
  $subject = "Demande d'inscription sur la plateforme MyUpload";
  $message = 'Bonjour !';
  $headers = 'From: webmaster' . "\r\n"; //.
     //'Reply-To: webmaster@example.com' . "\r\n" .
     //'X-Mailer: PHP/' . phpversion();

  mail($to, $subject, $message, $headers); 














  /*if(!empty($_GET) && isset($_GET['email'])){
    $email = $_GET['email'];
  } */


  /**
   * Insert du mot de passe et de l'email dans la DB, du statut resgiter en attente == 0 (1 == enregistré)
   */


  // //Test pour savoir si l'apprenant existe dans la base de données, s'il est enregistré
  // $query_students_existe = $bdd->query('SELECT idStudent, prenom, nom
  //                                       FROM students
  //                                       WHERE prenom ='.$bdd->quote($login_prenom) .
  //                                      ' AND nom ='. $bdd->quote($login_nom) );
  // $resultat = $query_students_existe->fetch(); //$item = $statement->fetchALL(PDO::FETCH_ASSOC);

  // if($query_students_existe->rowcount() !=0 ){
  //       echo "Vous n'avez pas le droit de vous inscrire!\n";
  //       header('Location: index.php');
  // }else{
  //     $query = $bdd->query('SELECT idStudent
  //                           FROM students
  //                           WHERE register = 1');
  //     $resultat = $query->fetch(); //$item = $statement->fetchALL(PDO::FETCH_ASSOC);

  //      if($query_students_existe->rowcount() !=0 ){
  //         header('Location: deja_inscrit.php');
  //      }


  //   // if( $resultat[0]['register'] == 1){
  //   //   echo "Vous êtes déjà inscrit!\n";
  //   //   header('Location: deja_inscrit.php');
  //   // }


  // }


  //Test pour savoir si on est déjà enregistré
  /*$query_students = $bdd->query('SELECT idStudent, prenom, nom
                                 FROM students
                                 WHERE register = 0 
                                 AND prenom ='.$bdd->quote($login_prenom) .
                                ' AND nom ='. $bdd->quote($login_nom) );

  if($query_students->rowcount() !=0 ){
        echo "KO, vous etes déjà inscrit ou vous n'avez pas le droit de vous inscrire";
   
        header('location: inscription.php'); 
      }
  



    $bdd->prepare('INSERT INTO students(password_students, email_students, register)
                   VALUES ('.$bdd->quote($password_students).', '.$bdd->quote($email_students).', '. 0 .')')->execute();
  
    $_SESSION['login'] = $_POST['login']; 
    $_SESSION['password'] = $_POST['password']; */



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
        Cher BeCodeurs,<br/>
        <br/>
        Nous vous remercions pour votre inscription! <br/><br/>
        L'administrateur validera votre inscription endéans les 24heures. Vous recevrez un email de confirmation sur votre email <a href=""> <?= $email; ?> </a><br/>
        <br/>
        Notez toutefois, que seuls les anciens becodeurs peuvent/pourront accèder au contenu du site.<br/>
        <br/> <br>
                                                                                       <p class="p_equipe_administrative">   L'équipe administrative. </p>
      </p>
  </div>


</body>

</html>

