"use strict"
const url = 'api/comentarios';

let comentarios = document.querySelector(".comentarios-detalle");

let btn = document.querySelector(".enviar").addEventListener("click", agregar);

 function agregar(e) {
    e.preventDefault();
    let comentario = document.querySelector("#comentario").value;
    let username = document.querySelector("#username").value;
    let equipo_id = document.querySelector("#id_equipo").value;
   
    let nuevoComentario = {
        comentario: comentario,
        username: username,
        id_equipo: equipo_id,
    }
    if ( comentario != "") {
        fetch(url, {
            method: "POST",
            headers: { 'Content-type': 'application/json' },
            body: JSON.stringify(nuevoComentario)
        })
        .then(resp => resp.json())
            .then(data => {
            console.log(data);
            mostrarComentarios();
        })
            .catch(error => console.log(error));
        }
        else{
            console.log("no se puede agregar un comentario vacio");
        }
          
}

   
async function borrar(id) {
   
    try {
        let resp = await fetch(url+"/"+id, {
            "method": "DELETE",
        });
        if (resp.ok) {
            mostrarComentarios();
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
    },
    methods: {
        Evento: function (id) {
            id = id.currentTarget.id;
            borrar(id);
         }
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
        }
    }
    catch(error){
        console.log("error" + error);
    }
}
mostrarComentarios();
 
