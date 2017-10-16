
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
            <label for="login_prenom">Prénom:*</label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
              <input name="login_prenom" type="text" class="form-control" id="usr" placeholder="Prénom">
            </div>
            

            <label for="login_nom">Nom:*</label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
              <input name="login_nom" type="text" class="form-control" id="usr" placeholder="Nom">
            </div>
          
            <label for="password">Password:</label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
              <input name="password" type="password" class="form-control" id="id_password" placeholder="Password">
            </div>
            <div style="color:red">Erreur</div>

            <label for="confirm_password">Confirm password:</label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
              <input name="confirm_password" type="password" class="form-control" id="id_connfirm_password" placeholder="Confirm password">
            </div>
              <div style="color:red">Erreur</div>

            <label for="email">Email:</label>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope"></span></span>
              <input name="email" type="text" class="form-control" id="pwd" placeholder="Email">
            </div>
          </div>

        </div>

        <div style="text-align:left" class="modal-footer">
          
          <ul style="list-style:none">
            <li style="font-size:12px">*entrez correctement votre prénom</li>
            <li style="font-size:12px">*entrez correctement votre nom </li>
          </ul>
            
          <div style="text-align: right">
            <a style="text-decoration: none" href="confirmation_inscription.php"><input type="submit" class="btn btn-success" value="S'enregistrer"> </a> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      
      </form>


      </div>
      
    </div>
