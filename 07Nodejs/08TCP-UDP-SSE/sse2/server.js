const http = require("http")
const fs = require("node:fs")
const path = require("path")

const server = http.createServer((req, res) => {

    if (req.url == "/" && req.method == "GET") {
        let pathArch = path.join(__dirname, "./client.html")
        const html = fs.readFileSync(pathArch, { encoding: "utf8" })
        res.writeHead(200, { "content-type": "text/html" })
        res.end(html)
    } else if (req.url = "/datos") {


        // res.setHeader("Access-Control-Allow-Origin", "*")
        // res.setHeader("Access-Control-Allow-Methods", "GET")
        // res.setHeader("Access-Control-Allow-Header", "Content-Type")

        res.writeHead(200, {
            "Content-Type": "text/event-stream",
            "Cache-Control": "no-cache",
            Connection: "keep-alive"
        })

        const sendEvent = () => {
            // const eventData = `data:<h1 onClick="()=>confirm("You've been pawn")">Click me!</h1>\ndata:${new Date().toLocaleDateString()}\ndata:${new Date().toLocaleTimeString()}\n\n`
            const eventData = `data: ${Math.floor(Math.random() * 101)}\ndata:${new Date().toLocaleDateString()}\ndata:${new Date().toLocaleTimeString()}\n\n`

            res.write(eventData)
        }

        const intervalId = setInterval(sendEvent, 3000);

        req.on("close", () => {
            clearInterval(intervalId)
        })
    }

})

server.listen(3000, () => {
    console.log("Servidor SSE escuchando en http://localhost:3000");

})