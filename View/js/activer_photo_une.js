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


/**
 * self représente l'objet sur lequel je clique
 * mon objet combo box [l'index de mon objet combo box]
 *  
 * @param  {[type]} self [description]
 * @return {[type]}      [description]
 */
    function filtre(self){
      var xhr;
      //var target = self[self.selectedIndex].id;
      //je récupére l'id de l'element sur lequel je clique dans ma combo

      xhr = getXHR();

      xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          if(self[self.selectedIndex].id >= 1){ 

            //document.getElementById("id_photo_by_event").innerHTML = "<br/>" + "<u>" + this.responseText + "</u>";

          } else {
            //document.getElementById("id_photo_by_event").innerHTML = "";  // Si je selectionne autre choix Tout ou 
          }
        }
      };

      //xhr.open("GET", "photo_by_event_filtre.php?event="+target, true);  //Méthode , UrL, base asynchro
      xhr.open("GET", "photo_by_event_filtre.php?event="+target, true);
      xhr.send();
    }
