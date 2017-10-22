  
function creer_zone_ajout() {
    var id_button_ajouter = document.getElementById('id_button_ajouter');
    id_button_ajouter.setAttribute("class","cacher");

    var id_button_annuler_ajout = document.getElementById('id_button_annuler_ajout');
    id_button_annuler_ajout.removeAttribute("class");
    id_button_annuler_ajout.setAttribute("class","btn");
    id_button_annuler_ajout.setAttribute("class","btn-warning");

    var id_div_form = document.getElementById('id_div_form');
    id_div_form.removeAttribute("class");
}


function retirer_button_annuler_ajout(){
    //retirer button annuler
    var id_button_annuler_ajout = document.getElementById('id_button_annuler_ajout');
    id_button_annuler_ajout.setAttribute("class","cacher");

    var id_button_annuler_maj = document.getElementById('id_button_annuler_maj');
    id_button_annuler_maj.setAttribute("class","cacher");

    //retirer formulaire
    var id_div_form = document.getElementById('id_div_form');
    id_div_form.setAttribute("class","cacher");

    //Ajouter bouton 'Ajouter Promo'
    var id_button_ajouter = document.getElementById('id_button_ajouter');
    id_button_ajouter.removeAttribute("class"); 
    id_button_ajouter.setAttribute("onClick", "creer_zone_ajout()");
    id_button_ajouter.setAttribute("class","btn");
    id_button_ajouter.setAttribute("class","btn-success");
}


function update_promo(id){
    //Faire apparaître la div "mise à jour"
    var id_div_mise_a_jour = document.getElementById('id_div_mise_a_jour');
    id_div_mise_a_jour.removeAttribute("class");

    //cacher le bouton ajouter
    var div_button_ajouter = document.getElementById('div_button_ajouter');
    div_button_ajouter.setAttribute("class","cacher");

    //ajouter le bouton annuler mise à jour
    var id_button_annuler_maj = document.getElementById('id_button_annuler_maj');
    id_button_annuler_maj.removeAttribute("class");

    var test = document.getElementById('test');
    test.value = id;
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

