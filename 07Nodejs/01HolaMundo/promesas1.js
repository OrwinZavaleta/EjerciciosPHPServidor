function f1() {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve("termino")
            console.log("una tarea 1 muy extensa");
        }, 1000);
    })
}
function f2() {
    console.log("Tarea 2");
}
async function f3(params) {
    await f1();
    f2()
}

f3()