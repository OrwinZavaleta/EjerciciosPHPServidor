const dgram = require("dgram")
const readline = require("readline")

const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
})

const client = dgram.createSocket("udp4")


rl.on("line", (input) => {
    if (input === '*') {
        client.close()
        rl.close()
        return
    }
    const message = Buffer.from(input)

    client.send(message, 41234, "localhost", (error) => {
        if (error) {
            console.error("Error al enviar el mensaje", error)
        } else {
            console.log("<<<<<<<<Mensaje enviado");
        }
    })
})


client.on("message", (msg) => {
    console.log(`>>>>>> cliente recibio: ${msg}`);
    // client.close()
})