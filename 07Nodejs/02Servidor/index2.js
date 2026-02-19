import http from "node:http";
import data from "./public/productos.json" with {type: "json"}


const server = http.createServer(async (req, res) => {
    res.writeHead(200, {"content-type": "application/json"})
    res.end(JSON.stringify(data))
})

server.listen(3000, () => {
    console.log("servidor iniciadoen el puerto 3000");
})