"use strict"
const url = 'api/comentarios';

let btn = document.querySelector(".enviar").addEventListener("click", agregar);

async function agregar() {
    let comentario = document.querySelector("#comentario").value;
    let usuario_id = document.querySelector("#id_usuario").value;
    let equipo_id = document.querySelector("#id_equipo").value;
   
    let nuevoComentario = {
        comentario: comentario,
        id_usuario: usuario_id,
        id_equipo: equipo_id,
    }
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
}

