import axios from "axios";
let personajes = [];

// function pedir(pag, callback) {
//     axios.get("https://rickandmortyapi.com/api/character/?page=" + pag)
//         .then(response => {
//             console.log("Peticion " + pag + ": " + response.data.results.length);

//             personajes.push(...response.data.results.map(p => p.name));

//             callback()

//         })
//         .catch(error => {
//             console.log(error);

//         })
// }
// const pedir2 = () => {
//     pedir(2, final)
// };


// pedir(1, pedir2)




// axios.get("https://rickandmortyapi.com/api/character/?page=1")
//     .then(response => {
//         console.log("Peticion 1: " + response.data.results.length);

//         personajes.push(...response.data.results.map(p => p.name));

//         axios.get("https://rickandmortyapi.com/api/character/?page=2")
//             .then(response => {
//                 console.log("Peticion 2: " + response.data.results.length);

//                 personajes.push(...response.data.results.map(p => p.name));

//                 console.log("Cantidad Personajes: " + personajes.length + "\nPersonajes: " + personajes);
//             })
//             .catch(error => {
//                 console.log(error);

//             })
//     })
//     .catch(error => {
//         console.log(error);

//     })

async function pedir(pagActual, limit) {
    if (pagActual > limit) return;
    try {
        const response = await axios.get("https://rickandmortyapi.com/api/character/?page=" + pagActual);

        console.log("Peticion " + pagActual + ": " + response.data.results.length);

        personajes.push(...response.data.results.map(p => p.name));

        pedir(pagActual + 1, limit);

        if (pagActual === limit) final();
    } catch (error) {
        console.log(error);
    }
}

function final() {
    console.log("Cantidad Personajes: " + personajes.length + "\nPersonajes: " + personajes);
}

pedir(1, 10);