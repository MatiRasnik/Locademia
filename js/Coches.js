class Coches{

    constructor(ci, matricula, tipo, desc, url){
        this.ci=ci;
        this.matricula=matricula;
        this.tipo=tipo;
        this.desc=desc;
        this.url=url;
    }

    get cedula(){
        return this.ci;
    }
    set cedula(x){
        this.ci=x;
    }
    get matricula(){
        return this.matricula;
    }
    set matricula(x){
        this.matricula=x;
    }
    get tipo(){
        return this.tipo;
    }
    set tipo(x){
        this.tipo=x;
    }
    get desc(){
        return this.desc;
    }
    set desc(x){
        this.desc=x;
    }
    get url(){
        return this.url;
    }
    set url(x){
        this.url=x;
    }
  
    traigoCoches(tipo){ 
       //trae todos los coches de un tipo
    }

    horariosCoches(matricula){
        //trae todas las reservas de un coche especifico
    }
}