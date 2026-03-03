const net = require("node:net")

const client = net.createConnection({ port: 8080 }, () => {
    console.log("Conectado al servidor")

    client.write("<<Prueba enviado datos al servidor>>")
})

client.on("data", (data) => {
    console.log("datos recibidos del servidor: " + data);

    client.end()
})


client.on("end", () => {
    console.log("Desconeccion");

})