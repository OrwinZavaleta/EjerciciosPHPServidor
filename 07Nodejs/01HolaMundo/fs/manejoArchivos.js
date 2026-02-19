import fs, { read } from "node:fs";
import readline from "node:readline";
import fsPromises from "node:fs/promises";

// const files = fs.readdirSync("./fs/");

// console.log(files);

/* fs.access("fs/original.txt", (err) => {
    if (err) {
        console.error("El archivo original no existe");
        return;
    }

    fs.access("fs/original_backup.txt", (err) => {
        if (!err) {
            console.error("El backup ya existe");
            return;
        }

        fs.copyFile("fs/original.txt", "fs/original_backup.txt", (err) => {
            if (err) console.error("no se pudo copiar el archivo")
            console.log("Se copio correctamente el archivo");

        })
    })
})
 */

// (async () => {
//     await fsPromises.writeFile("fs/saludo.txt", "Hola munode desde Node.JS")
//     const data = await fsPromises.readFile("fs/saludo.txt", { encoding: "utf-8" })

//     console.log(data);
// })();


// (async () => {
//     await fsPromises.writeFile("fs/registro.txt", "Fecha actual " + new Date() + "\n", { flag: "a", encoding: "utf8" })
//     const data = await fsPromises.readFile("fs/registro.txt", { encoding: "utf-8" })

//     console.log(data);
// })();


// const stream = fs.createReadStream("fs/registro.txt", { encoding: "utf8" })
// let datos = "";
// stream.once("data", () => {
//     console.log("Empiezo a datos");
// })
// stream.on("data", (chunk) => {
//     console.log("-- Leyendo");
//     datos += chunk 
// })
// stream.on("end", () => {
//     console.log("Lectura Terminada");
//     console.log("longitud: " + datos.length);

// })

// let lines = 0;

// const rl = readline.createInterface({
//     input: fs.createReadStream("fs/registro.txt", { encoding: "utf8" }),
//     crlfDelay: Infinity
// });

// rl.on("line", (line) => {
//     ++lines;
//     console.log("Caracteres por linea: " + line.length);
//     if (lines == 5) {
//         rl.close();
//         rl.removeAllListeners("line");
//     }
// })

// rl.on("close", () => {
//     console.log("numero total de lines: " + lines);

// });

// (async () => {
//     const rl = readline.createInterface({
//         input: fs.createReadStream("fs/broadband.sql", { encoding: "utf8" }),
//         crlfDelay: Infinity
//     });

//     let n = 0;
//     for await (const line of rl) {
//         n++;
//         console.log(`line: ${line}`);
//         if (n == 5) break
//     }
// })()

async function* leerLineas(archivo) {
    const stream = fs.createReadStream(archivo, { encoding: "utf8" })
    stream.on("close", () => console.log("--- El stream tambien terminado ---"))
    stream.on("end", () => console.log("--- El stream llego al final del archivo ---"))
    const rl = readline.createInterface({
        input: stream,
        crlfDelay: Infinity
    });

    try {
        for await (const linea of rl) {
            yield linea;
        }
    } finally {
        console.log("--- Limpiando recursos del generador (Cerrando archivo) ---");
        rl.removeAllListeners();
        rl.close();
        stream.destroy();
    }
}

async function procesarArchivo(ruta, limite) {
    const iterator = leerLineas(ruta);
    let n = 0;

    for await (const linea of iterator) {
        n++;
        console.log(`Procesando linea ${n} => ${linea}`);
        if (n >= limite) {
            iterator.return(); // Es inecesario ya que el break ya lo hace y viceversa
            // break;
        } else {
            // console.log("procesando")
        }
    }
}

procesarArchivo("fs/broadband.sql", 10)