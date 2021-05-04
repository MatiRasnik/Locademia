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
                if(log == 0){
                    x= 0;
                }else{
                    sessionStorage.setItem("ci", log);
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