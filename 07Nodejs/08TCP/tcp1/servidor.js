const net = require("net")

const server = net.createServer((socket) => {
    console.log("cliente conectado");

    socket.write("Bienvenido a TCP en servidor\n")

    socket.on("data", (data) => {
        console.log("datos recibidos del cliente: " + data);
        socket.write("Echo: " + data)
    })

    socket.on("end", () => {
        console.log("Desconectado");
        console.log("======================");
    })

})

server.listen(8080, () => {
    console.log("Servidor escuchando en 8080");

})