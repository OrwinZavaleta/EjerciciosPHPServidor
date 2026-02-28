const Depart = require("../models/depart");
const mongoose = require("mongoose");
const conectDB = require("../config/database")

require('dotenv').config({
    path: __dirname + "/../../.env",
    encoding: "utf8"
});

conectDB()

async function getDeparts() {
    try {
        const departs = await Depart.find()
        // console.log(departs);

        return departs;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}
async function addDepart(dnombre, loc) {
    try {
        // const lastId = await Depart.max("depart_no")
        const lastId = await Depart.findOne().sort({ depart_no: -1 }).select("depart_no")

        console.log(lastId.depart_no);

        await Depart.create({ depart_no: lastId.depart_no + 10, dnombre: dnombre, loc: loc })

    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}

async function getDepart(depart_no) {
    try {
        const depart = await Depart.findOne({ depart_no: depart_no })
        console.log(depart.depart_no);

        return depart
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}
async function editDepart(depart_no, dnombre, loc) {
    try {
        await Depart.updateOne({ depart_no: depart_no }, { dnombre: dnombre, loc: loc })
        return;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}
async function deleteDepart(depart_no) {
    try {
        await Depart.deleteOne({ depart_no: depart_no })
        return;
    } catch (error) {
        console.error("error en la consulta " + error)
        return null
    }
}


module.exports = {
    getDeparts, addDepart, getDepart, editDepart, deleteDepart
};
