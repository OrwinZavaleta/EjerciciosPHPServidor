import fs from "node:fs";
import readline from "node:readline";

const rl = readline.createInterface(process.stdin, process.stdout)

rl.question("Como te llamas > ", (answer) => {
    const stream = fs.createWriteStream(`./${answer}.md`)

    rl.setPrompt("Que quieres decir (exit para salir) > ")

    rl.prompt();

    rl.on("line", (data) => {
        if (data.toLowerCase().trim() === "exit") {
            stream.close();
            rl.close();
        } else {
            stream.write(`${data}\n`);
            rl.prompt();
        }
    })

    rl.on("close", ()=>console.log(">>>>>>>>>>>>>>>> Se ha terminado la escritura >>>>>>>>>>>>>"))
})