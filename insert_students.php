<?php


  if( (!empty($_POST) && isset($_POST['confirm_password'])) && isset($_POST['password'])  ){
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password !== $confirm_password){
      $_SESSION['error'] = "Le mot de passe ne correspon pas à la confirmation du mot de passe!";
      header('location: inscription.php');
    }

  }




  if(!empty($_POST) && isset($_POST['email'])){
    $email = $_POST['email'];
  }




      

/**
 * Insert du mot de passe dans la DB et du statut resgiter en attente == 0 (1 == enregistré)
 */

  try{
      $this->_db = new PDO('mysql:host=localhost;dbname=my_upload;charset=utf8', 'root', 'user');

      $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch(PDOException $e) {
      die('Erreur : ' . $e->getMessage());
    }



?>