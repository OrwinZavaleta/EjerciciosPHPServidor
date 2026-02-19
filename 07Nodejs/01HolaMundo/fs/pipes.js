import fs from "node:fs";
import { Transform } from "node:stream";
import { pipeline } from "node:stream/promises";

const toMayus = new Transform({
    transform(chunk, _enc, callback) {
        this.push(chunk.toString("utf8").toUpperCase());
        callback()
    }
})
const toSep = new Transform({
    transform(chunk, _enc, callback) {
        this.push(chunk.toString("utf8").split("").join("_"));
        callback()
    }
});
const remplazar = new Transform({
    transform(chunk, _enc, callback) {
        this.push(chunk.toString("utf8").split("").map((letra) => (letra === " ") ? "*_" : letra).join(""));
        callback()
    }
});
const remplazar2 = new Transform({
    transform(chunk, _enc, callback) {
        this.push(chunk.toString("utf8").replaceAll("a", "_*_"));
        callback()
    }
});

// fs.createReadStream("./fs/original.txt", { encoding: "utf8" })
//     .pipe(toMayus)
//     .pipe(toSep)
//     .pipe(fs.createWriteStream("./fs/original-copia.txt", { encoding: "utf8" }))
//     .on("finish", () => console.log("Transformacion completada"))
//     .on("error", (err) => console.error("Error en la tuberia", err))

(async () => {
    try {
        await pipeline(fs.createReadStream("./fs/original.txt"), remplazar2, fs.createWriteStream("./fs/original-copia-2.txt"))
        console.log("Transformacion completada");
    } catch (err) {
        console.error("error en la pipe: " + err)
    }
})()