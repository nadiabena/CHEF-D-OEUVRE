<?php
session_start();

require_once 'connect.php';

if(isset($_GET['login_prenom'])){
  $login = $_GET['login_prenom'];
}



 //select pour récupérer le nom et prénom du student
  $var1 = $_SESSION['login_prenom'];
  $var2 = $_SESSION['password'];
  // $query_student = $bdd->query('SELECT nom, prenom
  //                               FROM students
  //                               WHERE prenom = '. $bdd->quote($var1) .
  //                              ' AND password_students ='. $bdd->quote($var2) );

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
