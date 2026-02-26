const sequelize = require("../config/database");
const { Depart } = require("../models/depart")
require('dotenv').config({
    path: __dirname + "/../../.env",
    encoding: "utf8"
});

// await Depart.sync()

async function getEmple() {
    try {
        // const [rows] = await pool.execute("SELECT * FROM emple");
        console.log(departs);

        return departs;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}
async function getDeparts() {
    try {
        const departs = await Depart.findAll()
        // console.log(departs);

        return departs;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}
async function addDepart(dnombre, loc) { // TODO:
    try {
        // const [rows1] = await pool.execute("SELECT depart_no FROM depart ORDER BY depart_no DESC LIMIT 1");
        // const lastId = Depart.findOne({ order:  })

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
        const depart = await Depart.findOne({ where: { depart_no: depart_no } })
        return depart
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}
async function editDepart(depart_no, dnombre, loc) {
    try {
        await Depart.update({ dnombre: dnombre, loc: loc }, { where: { depart_no: depart_no } })
        return;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}
async function deleteDepart(depart_no) {
    try {
        await Depart.destroy({ where: { depart_no: depart_no } })
        return;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}


module.exports = {
    getEmple, getDeparts, addDepart, getDepart, editDepart, deleteDepart
};
