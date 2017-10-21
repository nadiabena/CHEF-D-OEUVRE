


  function update_classe(id_classe){
      //Faire apparaître la div "mise à jour"
      var id_div_mise_a_jour = document.getElementById('id_div_mise_a_jour');
      id_div_mise_a_jour.removeAttribute("class");

      //cacher le bouton ajouter
      var div_button_ajouter = document.getElementById('div_button_ajouter');
      div_button_ajouter.setAttribute("class","cacher");

      //ajouter le bouton annuler mise à jour
      var id_button_annuler_maj = document.getElementById('id_button_annuler_maj');
      id_button_annuler_maj.removeAttribute("class");
      id_button_annuler_maj.setAttribute("class","btn-warning");

      var id = document.getElementById('id');
      id.value = id_classe;
  }

  function retirer_button_annuler_maj(){
    var id_button_annuler_maj = document.getElementById('id_button_annuler_maj');
    id_button_annuler_maj.setAttribute("class", "cacher");

    var id_div_mise_a_jour = document.getElementById('id_div_mise_a_jour');
    id_div_mise_a_jour.setAttribute("class", "cacher");
    
    //remettre bouton ajouter promo
    var div_button_ajouter = document.getElementById('div_button_ajouter');
    div_button_ajouter.removeAttribute("class");
  }

  function retirer_button_annuler(){
      //retirer button annuler
      var id_button_annuler = document.getElementById('id_button_annuler');
      id_button_annuler.removeAttribute("class");

      var id_button_annuler = document.getElementById('id_button_annuler');
      id_button_annuler.setAttribute("class","cacher");

      //retirer formulaire
      var id_div_form = document.getElementById('id_div_form');
      id_div_form.removeChild(document.getElementById('myForm'));

      //Ajouter bouton 'Ajouter Promo'
      var id_button_ajouter_classes = document.getElementById('id_button_ajouter_classes');
      id_button_ajouter_classes.removeAttribute("class"); 
      id_button_ajouter_classes.setAttribute("onClick", "creer_zone_ajout_classes()");
      id_button_ajouter_classes.setAttribute("class","btn");
      id_button_ajouter_classes.setAttribute("class","btn-success");
  }

  function creer_zone_ajout_classes() {
      var id_button_ajouter_classes = document.getElementById('id_button_ajouter_classes');
      id_button_ajouter_classes.setAttribute("class","cacher");
      

      var id_button_annuler = document.getElementById('id_button_annuler');
      id_button_annuler.removeAttribute("class");
      id_button_annuler.setAttribute("class","btn");
      id_button_annuler.setAttribute("class","btn-warning");


      var form = document.createElement("FORM");
      form.setAttribute("id", "myForm");
      form.setAttribute("action","");
      form.setAttribute("method","POST");

      document.getElementById("id_div_form").appendChild(form);


      var label_classe = document.createElement("LABEL");
      var texte_classe = document.createTextNode("Classe");
      label_classe.appendChild(texte_classe);

      var input_classe = document.createElement("INPUT");
      input_classe.setAttribute("type", "text");
      input_classe.setAttribute("name", "classe_to_add");
      input_classe.setAttribute("size", "35");
      input_classe.setAttribute("placeholder", "Entrez la classe à ajouter");  
      document.getElementById("myForm").appendChild(label_classe);
      document.getElementById("myForm").appendChild(input_classe);


      var label_promo = document.createElement("LABEL");
      var texte_promo = document.createTextNode("Promo");
      label_promo.appendChild(texte_promo);

      var input_promo = document.createElement("INPUT");
      input_promo.setAttribute("type", "text");
      input_promo.setAttribute("name", "promo_to_add");
      input_promo.setAttribute("size", "35");
      input_promo.setAttribute("placeholder", "Entrez la promo à ajouter");
      document.getElementById("myForm").appendChild(label_promo);
      document.getElementById("myForm").appendChild(input_promo);

      var input_url = document.createElement("INPUT");
      input_url.setAttribute("type", "hidden");
      input_url.setAttribute("name", "page");
      input_url.setAttribute("value", "classes"); //promos
      document.getElementById("myForm").appendChild(input_url);

      var button = document.createElement("INPUT");
      button.setAttribute("type", "submit");
      button.setAttribute("name", "formPromo");
      button.setAttribute("value", "Ajouter");

      document.getElementById("myForm").appendChild(button);
  }
