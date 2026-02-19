import http from "node:http";
import path from "node:path";
import fs from "node:fs/promises"
import fsSync from "node:fs"
import qs from "node:querystring"

import { fileURLToPath } from 'url';
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const server = http.createServer(async (req, res) => {
    console.log("Peticion: " + req.url);

    if (req.method === "GET") {

        switch (req.url) {
            case "/":
                const data = await fs.readFile("./public/formulario.html", { encoding: "utf8" })
                res.writeHead(200, { "content-type": "text/html", "X-Powered-By": "Node.js" })
                res.end(data);
                break;

            default:
                if (req.url.match(/.css$/)) {
                    const cssPath = path.join(__dirname, "public", req.url)
                    const stream = fsSync.createReadStream(cssPath, { encoding: "utf8" })
                    res.writeHead(200, { "content-type": "text/css", "X-Powered-By": "Node.js" })
                    stream.pipe(res)
                } else if (req.url.match(/.webp$/)) {
                    const imgPath = path.join(__dirname, "public", req.url)
                    const stream = fsSync.createReadStream(imgPath)
                    res.writeHead(200, { "content-type": "image/webp", "X-Powered-By": "Node.js" })
                    stream.pipe(res)

                } else {

                    res.writeHead(404, { "content-type": "text/html", "X-Powered-By": "Node.js" })
                    res.end("<h1>Not found 404</h1> <a href='/'>Regresar al home</a>")
                }
        }
    } else if (req.method === "POST") {
        switch (req.url) {
            case "/enviarForm":
                console.log("entro en form")
                let chunks = []

                req.on("data", chunk => {
                    chunks.push(chunk)
                })

                req.on("end", () => {
                    const data = Buffer.concat(chunks);

                    console.log(data.toString())

                    const json = qs.parse(data.toString())
                    let nombre = json.nombre
                    let correo = json.correo

                    res.writeHead(200, { "content-type": "text/html" })
                    res.write(`<h1>Se recibio el formulario</h1> <p>Nombre: ${nombre}</p><p>Correo: ${correo}</p>`)
                    res.end()
                })
                break;
            default:
                res.writeHead(404, { "content-type": "text/html", "X-Powered-By": "Node.js" })
                res.end("<h1>Not found 404</h1> <a href='/'>Regresar al home</a>")
        }
    } else {
        res.writeHead(404, { "content-type": "text/html", "X-Powered-By": "Node.js" })
        res.end("<h1>Not found 404</h1> <a href='/'>Regresar al home</a>")
    }

})


server.listen(3000, () => {
    console.log("servidor iniciadoen el puerto 3000");
})
