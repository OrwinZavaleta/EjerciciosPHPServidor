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
async function getDeparts() {
    try {
        const [rows] = await pool.execute("SELECT * FROM depart");
        return rows;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}
async function addDepart(dnombre, loc) {
    console.log(dnombre);
    console.log(loc);

    try {
        const [rows1] = await pool.execute("SELECT depart_no FROM depart ORDER BY depart_no DESC LIMIT 1");
        console.log(rows1);

        const [rows] = await pool.execute("INSERT INTO depart(depart_no, dnombre, loc) VALUES (?,?,?)", [rows1[0].depart_no + 10, dnombre, loc]);
        console.log(rows);

        return rows;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}

async function getDepart(depart_no) {
    try {
        const [rows] = await pool.execute("SELECT * FROM depart WHERE depart_no = ? ", [depart_no]);
        return rows;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}
async function editDepart(depart_no, dnombre, loc) {
    try {
        const [rows] = await pool.execute("UPDATE depart SET dnombre = ? , loc = ? WHERE depart_no = ? ", [dnombre, loc, depart_no]);
        return rows;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}
async function deleteDepart(depart_no) {
    try {
        const [rows] = await pool.execute("DELETE FROM depart WHERE depart_no = ? ", [depart_no]);
        return rows;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}


module.exports = {
    conect, getEmple, getDeparts, addDepart, getDepart, editDepart, deleteDepart
};
