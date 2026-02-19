const miiterable = {
    [Symbol.iterator]() {
        let paso = 0
        return {
            next() {
                paso++;
                if (paso <= 3) {
                    return { value: `Paso ${paso}`, done: false }
                } else {
                    return { value: undefined, done: true }
                }
            }
        }
    }
}

// for (const valor of miiterable) {
//     console.log(valor);

// }

// for (const [element] of "Node.js") {
//     console.log(element);

// }

function* generarNueros() {
    let i = 0
    while (i < 10) {
        yield i++
    }
}

// function* fibonacci() {
//     let [a, b] = [0, 1]
//     while (true) {
//         yield a;
//         [a, b] = [b, a + b]
//     }
// }

// // for (const i of generarNueros()) {
// //     console.log(i);
// // }

// const fibona = fibonacci()
// console.log(fibona.next().value);
// console.log(fibona.next().value);
// console.log(fibona.next().value);
// console.log(fibona.next().value);
// console.log(fibona.next().value);
// console.log(fibona.next().value);
// console.log(fibona.next().value);
// const fibona2 = fibonacci()
// console.log(fibona2.next().value);
// console.log(fibona2.next().value);
// console.log(fibona2.next().value);
// console.log(fibona2.next().value);
// console.log(fibona2.next().value);
// console.log(fibona2.next().value);
// console.log(fibona2.next().value);

// function* contar() {
//     let valor = 0;
//     while (true) {
//         valor = yield valor;
//     }
// }

// console.log(contar().next().value);
// console.log(contar().next(10).value);
// console.log(contar().next(2).value);
// console.log(contar().next(4).value);
