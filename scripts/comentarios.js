"use strict"
const url = 'api/comentarios';



let btn = document.querySelector(".enviar").addEventListener("click", agregar);

 function agregar(e) {
    e.preventDefault();
    let comentario = document.querySelector("#comentario").value;
    let username = document.querySelector("#username").value;
    let equipo_id = document.querySelector("#id_equipo").value;
    let puntaje = document.querySelector("#puntuacion").value;
    let hoy = new Date();
   
    let nuevoComentario = {
        comentario: comentario,
        username: username,
        id_equipo: equipo_id,
        puntaje: puntaje,
        fecha: hoy.getHours() + ":" + hoy.getMinutes() + ":" + hoy.getSeconds(),
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
            document.querySelector("#comentario").value = "";
            mostrarComentarios();    //actualizar la lista de comentarios
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
        puntaje: 0.0,
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
            app.puntaje= puntosTotales();
        }
        else{
            app.comentarios = [];
            app.puntaje= 0.0;
        }
    }
    catch(error){
        console.log("error" + error);
    }
}
mostrarComentarios();

function puntosTotales(){
    let puntos = 0.0;
    for (let i = 0; i < app.comentarios.length; i++) {
        puntos += Number(app.comentarios[i].puntaje);
    }
    return puntos;
}




