const dgram = require("dgram")
const server = dgram.createSocket("udp4")

server.on("message", (msg, rinfo) => {
    console.log(`Servidor recibio: <<${msg}>> de ${rinfo.address}:${rinfo.port}`);

    const response = Buffer.from(msg.toString().toUpperCase())

    server.send(response, rinfo.port, rinfo.address, (error) => {
        if (error) {
            console.error("Error al enviar la respuesta", error)
        } else {
            console.log("Respuesta enviada");
        }
    })
})

server.on("listening", () => {
    const address = server.address();
    console.log(`Servidor UDP iniciado en ${address.address}:${address.port}`)
})

server.on("error", (err) => {
    console.error('Error en servidor UDP: ', err)
    server.close()
})

server.bind(41234, () => {
    console.log("Servidor escuchando en el puerto 41234");
})

