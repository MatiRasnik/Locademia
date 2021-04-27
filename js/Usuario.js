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
        $.ajax({
            type: "POST",
            url: "../Form/logearse.php",
            data: {usuario:usuario,passw:passw},
            success: function(log){
                alert("log: " + log);
                if(log == 1){
                    alert(" logeado");
                return true; 
                }else{
                    alert("no logeado");
                return false;
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }   
        });
    }
}