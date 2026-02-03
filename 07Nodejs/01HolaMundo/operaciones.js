function sumar(a, b) {
    return a + b;
}
function restar(a, b) {
    return a - b;
}
function multiplicar(a, b) {
    return a * b;
}
function dividir(a, b) {
    if (b !== 0) {
        return a / b;
    } else {
        return "Falla"
    }
}

module.exports = {
    sumar: sumar,
    restar: restar,
    mult: multiplicar
}