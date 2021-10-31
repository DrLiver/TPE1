"use strict"


const URL = "http://localhost/trabajos/PRUEBAS/api/users";
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

function escribirListas(user) {
    let tabla = document.getElementById("APIusers");
    let tr = document.createElement("tr");
    let td1 = document.createElement("td");
    let td2 = document.createElement("td");
    tabla.appendChild(tr);
    tr.appendChild(td1);
    tr.appendChild(td2);
    td1.innerHTML = user.username;
    if (user.username != "admin") {

        td2.innerHTML = '<button id="deleteUser' + user.id_usuario + '"> eliminar </button>';
        document.getElementById("deleteUser" + user.id_usuario).addEventListener("click", function() {
            eliminarUsuario(user.id_usuario);
        });

        if (user.privilege_level != 1) {
            td2.innerHTML += '<button id="doAdmin' + user.id_usuario + '"> hacerlo admin </button>';
            document.getElementById("doAdmin" + user.id_usuario).addEventListener("click", function() {
                volverAdmin(user.id_usuario);
            });
        } else {
            td2.innerHTML += '<button id="quitAdmin' + user.id_usuario + '"> quitarle admin </button>';
            document.getElementById("quitAdmin" + user.id_usuario).addEventListener("click", function() {
                quitarAdmin(user.id_usuario);
            });
        }
    } else {
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

function prueba() {
    console.log("prueba");
}