$(document).ready(function(){

  $("#recherche").keyup(function(){
    var recherche = $(this).val();
    var key = 'lettres=' + recherche;
      if (recherche.length >= 0) {

        $.ajax({
          type : "GET",
          url : "vue_search.php",
          data : key,
          success : function(server_response){
            $("#resultat").html(server_response).show();
            $("#resultat").addClass("resultat");
          }
        });
      }
  });

  $("#recherche").focusout(function(){
    setTimeout(function(){
    $("#resultat").empty();
    $("#resultat").removeClass('resultat'); }, 100);
  });
});