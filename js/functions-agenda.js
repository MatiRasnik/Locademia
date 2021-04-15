$( document ).ready(function(){

    $(".tipocoche").hide();
    
});

function tipo(tipo){ 
    $.ajax({
        url: "TipoCoche.php",
        type: "post",
        data: { tipo: tipo },
        success: function (html) {
          document.getElementById("phpcoche").innerHTML = html;
        },
        complete: function (html) {
            $(".tipocoche").show();
        }
    });
}