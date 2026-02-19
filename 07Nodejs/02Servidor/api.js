import http from "node:http";
import fs from "node:fs"
import fsPro from "node:fs/promises"

const PATH = "./public/usuarios.json"

const server = http.createServer(async (req, res) => {
    const { method, url } = req;

    if (method == "GET" && url == "/api/users") {

        const stream = fs.createReadStream(PATH, { encoding: "utf8" })
        res.writeHead(200, { "content-type": "application/json" })

        stream.pipe(res)
    } else if (method == "POST" && url == "/api/users") {
        let data = ""
        req.on("data", chunk => {
            data += chunk
        })

        req.on("end", async () => {
            try {
                const datos = JSON.parse(data)
                const usuarios = JSON.parse(await fsPro.readFile(PATH, { encoding: "utf8" }) || "[]")

                usuarios.push(datos);
                await fsPro.writeFile(PATH, JSON.stringify(usuarios))

                console.log(usuarios);

                res.writeHead(200, { "content-type": "application/json" })
                res.end(JSON.stringify({ message: "Usuario agregado correctamente" }))
            } catch (error) {

                console.error(error)

                res.writeHead(400, { "content-type": "application/json" })
                res.end(JSON.stringify({ message: "Error con el usuario" }))
            }
        })
    } else {
        res.writeHead(404, { "content-type": "application/json" })
        res.end(JSON.stringify({ message: "Route not found" }))
    }
})

server.listen(3000, () => {
    console.log("servidor iniciadoen el puerto 3000");
})
