"use strict"
const url = 'api/comentarios';

let comentarios = document.querySelector(".comentarios-detalle");

let btn = document.querySelector(".enviar").addEventListener("click", agregar);

async function agregar() {
    let comentario = document.querySelector("#comentario").value;
    let username = document.querySelector("#username").value;
    let equipo_id = document.querySelector("#id_equipo").value;
   
    let nuevoComentario = {
        comentario: comentario,
        username: username,
        id_equipo: equipo_id,
    }
    if ( comentario != "") {

        try {
            let resp = await fetch(url, {
                "method": "POST",
                "headers": { "Content-type": "application/json" },
                "body": JSON.stringify(nuevoComentario)
            })
            if(resp.status == 201){
               console.log("comentario agregado");
            }
        }
        catch (error) {
            console.log("error" + error);
        }; 
    }else{
        console.log("no se puede agregar comentario vacio");
    }


}

    function darEvento (){
        document.querySelectorAll(".btn_eliminar").forEach(b => b.addEventListener("click", function(){ 
        borrar(b.id);
        mostrarComentarios();
    }));
}
   

async function borrar(id) {
   
  console.log(id);
    try {
        let resp = await fetch(url+"/"+id, {
            "method": "DELETE",
        });
        if (resp.ok) {
           console.log("comentario eliminado");
        } else {
          
        }
    }
    catch (error) {
        console.log("error" + error);
    }
}

let app = new Vue({
    el: "#comentarios-detalle",
    data: {
        comentarios: [],
        Evento: darEvento,
    },

    
});

async function mostrarComentarios() {

  
    try{
        let id = document.querySelector("#id_equipo").value;
        let respuesta = await fetch(url+"/"+id);
        if(respuesta.ok){
            let comentarios = await respuesta.json();
            app.comentarios = comentarios;
        }
        else{
            app.comentarios = [];
            console.log("no hay comentarios");
        }
    }
    catch(error){
        console.log("error" + error);
    }
}

mostrarComentarios();
 
