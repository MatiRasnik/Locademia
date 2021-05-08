class Usuario{

    constructor(nomb, passw, ci){
        this.nombre=nomb;
        this.passw=passw;
        this.ci=ci;
    }

    get nomb(){
        return this.nombre;
    }
    set nomb(x){
        this.nombre=x;
    }
    get pass(){
        return this.passw;
    }
    set pass(x){
        this.passw=x;
    }
    get cedula(){
        return this.ci;
    }
    set cedula(x){
        this.ci=x;
    }
    
    login(usuario, passw){ 
        var x=0;
        $.ajax({
            async: false,
            type: "POST",
            url: "../Form/logearse.php",
            data: {usuario:usuario,passw:passw},
            success: function(log){
                var txt = log;
                var log2 = JSON.parse(txt);
                if(log[0] == "asd"){
                    x= 0;
                }else{
                    sessionStorage.setItem("ci", log2.ci);
                    sessionStorage.setItem("matricula", log2.matricula);
                    x = 1;
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }   
        });
        return x;
    }
}
