"use strict"


const URL = "api/users";
mostrarUsuarios(URL);

async function mostrarUsuarios() {
    try {
        let respuesta = await fetch(URL);

        if (respuesta.status == 200) {
            let usuarios = await respuesta.json();
            console.log(JSON);
            for (let usuario of usuarios) {
                escribirListas(usuario);
            }
        }
    } catch (error) {
        console.log("no se pudo contactar con el servidor local");
        console.log(error);
    }
}

async function taerUsers(){
    try{
        let respuesta = await fetch(URL + "/" + id, {
            method: "GET"
        })
        if(respuesta.status == 200){
            let usuario = await respuesta.json();
            console.log(usuario);
        }else{
            console.log("no se pudo contactar con el servidor local");
        }
    }catch(error){
        console.log("no se pudo contactar con el servidor local");
        console.log(error);
    }
}

function escribirListas(user) {
    let tbody = document.getElementById("APIusers");
   
    let tr = document.createElement("tr");
    let td1 = document.createElement("td");
    let td2 = document.createElement("td");
    let button1 = document.createElement("button");
    let button2 = document.createElement("button");
    tbody.appendChild(tr);
    tr.appendChild(td1);
    tr.appendChild(td2);
    td2.appendChild(button1);
    td2.appendChild(button2);
    td1.innerHTML = user.username;
    if (user.username != "admin") {
        button1.id = user.id_usuario;
        button1.className="  fas fa-trash-alt";
        button1.addEventListener("click", ()=> { eliminarUsuario(button1.id); });
        if (user.privilege_level != 1) {
            button2.id = user.id_usuario;
            button2.innerHTML = "Admin";
            button2.className=" fas fa-user-cog  fas fa-trash-verde";
            button2.addEventListener("click", ()=> { volverAdmin(button2.id); });
        }else{
            button2.id = user.id_usuario;
            button2.innerHTML = "quitar admin";
            button2.className=" fas fa-user-cog  fas fa-trash-alt";
            button2.addEventListener("click",  ()=> {quitarAdmin(button2.id); });
        }
    }else {
        td2.innerHTML = "i'm the master, you can't modify me";
    }
}

async function eliminarUsuario(id) {
  
    try {
        let respuesta = await fetch(URL + "/" + id, {
            'method': "DELETE"
        });
        if (respuesta.status == 200) {
            console.log("usuario eliminado");
            document.getElementById("APIusers").innerHTML = "";
            mostrarUsuarios();
        } else {
            console.log("no se pudo eliminar el usuario");
        }
    } catch (error) {
        console.log("no se pudo contactar con el servidor local");
        console.log(error);
    }
}

async function volverAdmin(id) {
   

    try {
        let respuesta = await fetch(URL + "/" + id, {
            method: "PUT",
        })
        if (respuesta.status == 200) {
            console.log("usuario admin");
            document.getElementById("APIusers").innerHTML = "";
            mostrarUsuarios();
        } else {
            console.log("no se pudo hacer admin el usuario");
        }
    } catch (error) {
        console.log("no se pudo contactar con el servidor local");
        console.log(error);
    }
}

async function quitarAdmin(id) {
   
    try {
        let respuesta = await fetch(URL + "/" + id, {
            method: "UPDATE",
        })
        if (respuesta.status == 200) {
            console.log("usuario admin");
            document.getElementById("APIusers").innerHTML = "";
            mostrarUsuarios();
        } else {
            console.log("no se pudo hacer admin el usuario");
        }
    } catch (error) {
        console.log("no se pudo contactar con el servidor local");
        console.log(error);
    }
}

