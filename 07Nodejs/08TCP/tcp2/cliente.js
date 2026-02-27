const net = require("node:net")
const readline = require("readline")

const client = net.createConnection({ port: 8080 }, () => {
    console.log("Conectado al servidor")

    client.write("<<Prueba enviado datos al servidor>>")
})

const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
})

rl.on("line", (input) => {
    client.write(input)
})

client.on("data", (data) => {
    console.log("datos recibidos del servidor: " + data);
})

/* client.on("error", () => {
    console.log("Hubo un error");
    client.end()
}) */

client.on("end", () => {
    console.log("Desconeccion");

})