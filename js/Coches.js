class Coches{

    constructor(Cedu, mat, tip, desc, link){
        this.cedula=Cedu;
        this.matricula=mat;
        this.tipo=tip;
        this.descripcion=desc;
        this.url=link;
    }

    get Cedu(){
        return this.cedula;
    }
    set Cedu(c){
        this.cedula=c;
    }
    get mat(){
        return this.matricula;
    }
    set mat(x){
        this.matricula=x;
    }
    get tip(){
        return this.tipo;
    }
    set tip(x){
        this.tipo=x;
    }
    get desc(){
        return this.desc;
    }
    set desc(x){
        this.desc=x;
    }
    get link(){
        return this.url;
    }
    set link(x){
        this.url=x;
    }
  
   autos(cedula){ 
       var x = 0;
       var coches = [];
        $.ajax({
            async: false,
            type: "POST",
            url: "../Form/TraigoCoches.php",
            data: {cedula:cedula},
            success: function(autos){
                if(autos[0] == 1){
                    x = 1;
                }else{
                    coches = autos;
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }   
        });
        if(x == 1){
            coches[0] = "asd";
            return coches;
        }else{
            return coches;
        }
    }

    horariosCoches(matricula){
        var x = 0;
        var horarios = [];
        $.ajax({
            async: false,
            type: "POST",
            url: "../Form/TraigoHorarios.php",
            data: {matricula:matricula},
            success: function(horas){
                if(horas[0] == 1){
                    x = 1;
                }else{
                    horarios = horas;
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }   
        });
        if(x == 1){
            horarios[0] = "asd";
            return horarios;
        }else{
            return horarios;
        }
    }
}