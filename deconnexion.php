<?php
session_start();

//Détruit les variables de la session
session_unset();

//Initialiser le tableau des variables de session
$_SESSION = array();

//Détruit la session
session_destroy();

//Redirige le user vers la page de connexion
header('Location: index.php');
die();

?>