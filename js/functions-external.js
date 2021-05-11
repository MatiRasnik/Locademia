$( document ).ready(function() {
    $("#header").load('/locademia/HF-External/header.php');
    $("#footer").load('/locademia/HF-External/footer.html');

    /*$.ajax({
        async: false,
        type: "POST",
        url: "/locademia/Form/VerificoSesion.php",
        success: function(asd){
          if(asd == 1){
          location.href ="/locademia/Form/Login.html";
          }
        }
    });*/
});