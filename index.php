<?php
session_start();


if (isset($_SESSION['error_connexion'])) { // Si ma session error existe alors
  $message_erreur = $_SESSION['error_connexion'];
  unset($_SESSION['error_connexion']);
} else {
  unset($message_erreur);  //Je réinitialise le message comme ça lors d'un refresh de la page le message disparaît
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <title>MyUpload BeCode</title>
  <meta name="author" content="Nadia B.">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="Content-Type" content="UTF-8">
  <meta name="Content-Language" content="fr">
  <meta name="Description" content="BeCode | Upload de photos">
  <meta name="Keywords" content="Upload, photos, BeCode, inside">
  <meta name="Publisher" content="BeCode"> 
  <meta name="Subject" content="Upload de BeCode">
  <meta name="Identifier-Url" content="">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="icon" type="image/png" sizes="32x32" href="View/Images/becode.jpg">

  <link rel="stylesheet" type="text/css" href="View/css/style.css">

</head>
<body>

  <div class="container_langue">
    <a class="" href="connexion_admin.php">Administration</a>
    <a class="lien_langue" href="">Fr</a>
    <a class="lien_langue" href="">Nl</a>  
    <a class="lien_langue" href="">En</a>  
  </div>

  <h1 style="padding-left: 550px; color:blue"> Bienvenue sur MyUpload de BeCode</h1>

  <div style = "margin-top:50px; border:1px solid black; height:330px; width:350px" class="container" id="connexion_se_connecter">
    <form name="connexion" action="application.php" method="POST">

      <div> <h4 style="color:blue">Connexion</h4> </div>

      <div>
        <hr/>

        <label for="login_prenom">Login:</label>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
          <input name="login_prenom" type="text" class="form-control" id="usr" placeholder="Login">
        </div>

        <label for="password">Password:</label>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
          <input name="password" type="password" class="form-control" id="pwd" placeholder="Password">
        </div>
        <div style="color:red"><?= isset($message_erreur) ? $message_erreur : false; ?></div>

        <hr/>

      </div>

      <!-- Trigger the modal with a button -->
      <input type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" value="Nouveau utilisateur?"> <!-- s'inscrire -->

      <input style ="text-align:center" type="submit" class="btn btn-primary" value="Se connecter">
      
      <br/><br/>
      <p class="password_oublier"> <a href="password_oublier.php">Mot de passe oublié?</a> </p>

    </form>  
   </div>


  <!-- La modal -->
  <div class="container">
  <!-- Modal -->

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Nouveau utilisateur</h4>
        </div>

        <div class="modal-body">
          <form name="inscription" action="confirmation_inscription.php" method="GET">

          <div>
            <label for="login_prenom">Prénom:<span style="color: red">*</span></label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
              <input name="login_prenom" type="text" class="form-control" id="id_login_prenom" placeholder="Prénom">
            </div>
            

            <label for="login_nom">Nom:<span style="color: red">*</span></label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
              <input name="login_nom" type="text" class="form-control" id="id_login_nom" placeholder="Nom">
            </div>
          
            <label for="password">Password: <span style="font-size:12px; font-weight: normal;"> <i> 8 caractéres</i> </span></label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
              <input name="password" type="password" class="form-control" id="id_password" placeholder="Password">
            </div>
          

            <label for="confirm_password">Confirm password:</label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
              <input name="confirm_password" type="password" class="form-control" id="id_confirm_password" placeholder="Confirm password">
            </div>
            

            <label for="email">Email:</label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
              <input name="email" type="text" class="form-control" id="id_email" placeholder="Email">
            </div>
          </div>

        </div>

        <div style="text-align:left" class="modal-footer">
          
          <ul style="list-style:none">
            <li style="font-size:12px"><span style="color: red">*</span>Entrez correctement votre prénom</li>
            <li style="font-size:12px"><span style="color: red">*</span>Entrez correctement votre nom </li>
          </ul>
            
          <div style="text-align: right">
            <a style="text-decoration: none" href="confirmation_inscription.php"><input id="id_enregistrer" type="submit" class="btn btn-success" value="S'enregistrer"> </a> <!-- disabled -->
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      
      </form>

      </div>
      
    </div>
  </div>
  
</div>  

</body>


<!--
<script type="text/javascript">

  function getXHR(){
    var xhr = null;
    //Si les navigateurs autre que IE;
    if(window.XMLHttpRequest){
      xhr = new XMLHttpRequest();
    }else if (window.ActiveXObject){//Si c'est du IE
      //deux cas selon les versions
      try{
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
      }catch(e){
        xhr = new ActiveXObject("Microsoft.XMLHTTP"); 
      }
    }else{ //Rien ne marche
      alert("Achetez-vous une autre machine");
      xhr = null;
    }
    return xhr;
  }

  function refresh(){
    var xhr;

    var password = document.getElementById("id_password").value;                        //Le message à rafraîchir
    var confirm_password = document.getElementById("id_connfirm_password").value;     

    xhr = getXHR();

    xhr.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200){
          if(password !== confirm_password)

          document.getElementById("myModal").innerHTML = this.responseText; 
        //document.getElementById("id_message").value = "";  //Je réinitialise la zone de saisie
      }
    };

    xhr.open("POST", "ajax_modal_connexion.php", true);  //Méthode , UrL, base asynchro
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); // Cette ligne permet de tenir compte de la méthode POST
    xhr.send(null);
  }



</script> -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){

    if($("#id_login_prenom").text().length > 2 && $("#id_login_nom").text().length > 2 &&  ($("#id_password").text() == $("#id_confirm_password").text() && $("#id_password").text().length == 8) && $("#id_email").text() > 5   ) {
          console.log('testeee');
            //$("#id_enregistrer").attr("disabled","false");
    }else{
        console.log('test');
        //$("#id_enregistrer").attr("disabled","false");
    }


    // $("#id_confirm_password").focusout(function(){
    //     $(this).css("background-color", "red");

    //     //refresh();
    // }); 





//id_login_prenom id_login_nom id_password id_confirm_password id_email

  });
</script>





</html>
