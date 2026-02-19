import http from "node:http";
import path from "node:path";
import fs from "node:fs/promises"
import fsSync from "node:fs"

import { fileURLToPath } from 'url';
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);


const server = http.createServer(async (req, res) => {
    if (req.method === "GET") {
        switch (req.url) {
            case "/":
                const data =fsSync.readFile("./public/index.html", { encoding: "utf8" })
                res.writeHead(200, { "content-type": "text/html", "X-Powered-By": "Node.js" })
                res.end(data);
                break;
            case "":

            // case "/":
            //     const data = await fs.readFile("./public/index.html", { encoding: "utf8" })
            //     res.writeHead(200, { "content-type": "text/html", "X-Powered-By": "Node.js" })
            //     res.end(data);
            //     break;

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

                    res.writeHead(418, { "content-type": "text/html", "X-Powered-By": "Node.js" })
                    res.end("<h1>Not found 404</h1> <a href='/'>Regresar al home</a>")
                }
        }
        // res.end("<h1 onclick='alert(`hello`)'>hola, respuesta enviada con " + req.method + " .</h1>")
    } else if (req.method === "POST") {
        let body = ""

        req.on("data", chunk => {
            body += chunk
        })

        req.on("end", () => {
            res.end(body);
        })
    }


})


server.listen(3000, () => {
    console.log("servidor iniciadoen el puerto 3000");
})
// server.listen(3000)
