console.log("Inicio del programa");

let despedirse = function (nombre, callback) {
    console.log("adios " + nombre);
    callback();
}

function saludar(nombre, callback) {
    console.log("hola" + nombre);
    setTimeout(() => {
        callback(nombre)
    }, 250);
}

function terminarPrograma() {
    console.log("Fin del programa");
}

saludar("Juan", (nombre)=>despedirse(nombre, terminarPrograma))
