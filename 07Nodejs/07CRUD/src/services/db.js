const mysql = require('mysql2/promise');
require('dotenv').config({
    path: __dirname + "/../../.env",
    encoding: "utf8"
});

let pool

async function conect() {
    if (!pool) {
        pool = mysql.createPool({
            host: process.env.DB_HOST,
            user: process.env.DB_USER,
            password: process.env.DB_PASS,
            database: process.env.DB_DATABASE,
            waitForConnections: true,
            connectionLimit: 10,
            queueLimit: 0
        })
        console.log("Coneccion establecida");
    } else {
        console.log("pool ya creado");
    }
}


async function getEmple() {
    try {
        const [rows] = await pool.execute("SELECT * FROM emple");
        return rows;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}
async function getDepart() {
    try {
        const [rows] = await pool.execute("SELECT * FROM depart");
        return rows;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}
async function addDepart(dnombre, loc) {
    try {
        const [rows1] = await pool.execute("SELECT depart_no FROM depart ORDER BY depart_no DESC LIMIT 1");
console.log(rows1);

        const [rows] = await pool.execute("INSERT INTO depart VALUES (?,?,?)", [rows1]);
        return rows;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}


module.exports = {
    conect, getEmple, getDepart
};
