import fs from "node:fs";
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


const stream = fs.createReadStream("fs/registro.txt", { encoding: "utf8" })
let datos = "";
stream.once("data", () => {
    console.log("Empiezo a datos");
})
stream.on("data", (chunk) => {
    console.log("-- Leyendo");
    datos += chunk 
})
stream.on("end", () => {
    console.log("Lectura Terminada");
    console.log("longitud: " + datos.length);

})