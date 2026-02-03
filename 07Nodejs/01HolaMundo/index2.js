const { sumar } = require("./operaciones");
const Persona = require("./Persona");
console.log("PID: ", process.id);
console.log("Cantidad de argumentos recibidos: ", process.argv.length);
console.log("Argumentos: ", process.argv);



let acum = 0;
for (let i = 5; i < process.argv.length; i++) {
    acum = sumar(Number(process.argv[i]), acum);
}
const per = new Persona(process.argv[2], process.argv[3], process.argv[4])
console.log(per);
console.log(per.mostrar());
console.log(acum);



