  function checker() {
    // if(document.getElementById("promo_checkbox").checked == true){
    //     console.log("checked!");
    //     //console.log("Quelle promo selected: "+);

    // }
  
  }

  function creer_contenu_student(){
    //Griser le bouton recherche
    var id_zone_recherche = document.getElementById('id_zone_recherche');
    id_zone_recherche.disabled = true; 
    id_zone_recherche.setAttribute("style","color:gray");

   
    var form = document.createElement("FORM");
    form.setAttribute("id", "myForm");
    form.setAttribute("action","administration.php");
    form.setAttribute("method","GET");
    document.getElementById("id_div_form").appendChild(form);

    var input_url = document.createElement("INPUT");
    input_url.setAttribute("type", "hidden");
    input_url.setAttribute("name", "page");
    input_url.setAttribute("value", "students");
    document.getElementById("myForm").appendChild(input_url);


    var button = document.createElement("INPUT");
    button.setAttribute("type", "submit");
    button.setAttribute("value", "Valider");
    document.getElementById("myForm").appendChild(button);
  }
