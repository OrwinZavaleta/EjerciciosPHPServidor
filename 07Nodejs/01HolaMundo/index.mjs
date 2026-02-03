// const { mult, sumar } = require("./operaciones");
// const Persona = require("./Persona");
import { Persona } from "./Persona.mjs";

// const colors = require("colors");
// console.log("Hola Mundo!!!".green.bgRed);
// console.log("Hola Mundo!!!".bgRed);

// const axios = require("axios").default;

// axios.get("https://rickandmortyapi.com/api/character")
//     .then(response => {
//         console.log(response.data);
//     })
//     .catch(error => {
//         console.log(error);

//     })


// const multiplicacion = mult(3434, 8234);
// const suma = sumar(3434, 8234);
// console.log(multiplicacion);
// console.log(suma);

const pers = new Persona("Rocio", "Ordemar", 24);
console.log(pers.mostrar());

