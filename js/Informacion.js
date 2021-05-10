$( document ).ready(function(){
    sessionStorage.getItem('ci');
    console.log(sessionStorage.getItem('ci'))
    $("#Informacion").load('informacion.php');
    
});