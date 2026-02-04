function f1(callbacks) {
    setTimeout(() => {
        console.log(1);
        callbacks()
    }, 200);
}

function f2() {
    console.log(2);
}

f1(f2)