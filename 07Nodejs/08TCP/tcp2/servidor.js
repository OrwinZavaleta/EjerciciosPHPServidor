const net = require("net")

let nCliente = 0;

const server = net.createServer((socket) => {
    console.log("==cliente conectado==");
    let clienteact = ++nCliente

    if (nCliente >= 4) {
        console.log("We don't need more people!!!");
        socket.write("We don't need more people!!!")
        socket.end()
    }

    socket.write("Bienvenido a TCP en servidor, cliente " + clienteact + "\n")

    socket.on("data", (data) => {
        console.log("datos recibidos del cliente " + clienteact + ": " + data);

        socket.write("Servidor: " + data.toString().toUpperCase())
    })

    socket.on("end", () => {
        nCliente--
        console.log("Desconectado");
        console.log("======================");
    })

    socket.on("error", () => {
        console.log("Hubo un error");
    })
})

server.listen(8080, () => {
    console.log("Servidor escuchando en 8080");

})