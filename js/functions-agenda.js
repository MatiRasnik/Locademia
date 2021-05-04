$( document ).ready(function(){
    $("#agendadiv").hide();
    $('#autos').on('click', function(){
        alert($(this).text());
    });

    var coche = document.getElementById("phpcoche");
    $.ajax({
        url: "TipoCoche.php",
        type: "post",
        data: { tipo: "Hatchback" },
        success: function (html) {
            coche.innerHTML = html;
        }
    });
});

function agenda(){
    $("#agendadiv").show();
    document.getElementById("agendadiv").scrollIntoView();
}