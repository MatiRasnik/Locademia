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
        $.ajax({
            async: false,
            type: "POST",
            url: "../Form/TraigoCoches.php",
            data: {cedula:cedula},
            success: function(autos){
                if(autos == 0){
                    x = 1;
                }
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) { 
                alert("Status: " + textStatus); alert("Error: " + errorThrown); 
            }   
        });
        if(x == 1){
            return x;
        }else{
            return autos;
        }
    }

    horariosCoches(matricula){
        //trae todas las reservas de un coche especifico
    }
}