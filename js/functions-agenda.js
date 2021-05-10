$( document ).ready(function(){
    $("#agendadiv").hide();
    $('#autos').on('click', function(){
        alert($(this).text());
    });
});

function agenda(){
    $("#agendadiv").show();
    document.getElementById("agendadiv").scrollIntoView();
}