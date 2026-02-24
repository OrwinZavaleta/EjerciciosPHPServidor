const fs = require('fs');
const path = require('path');
const db = require("../repositories/db");

// const dataPath = path.join(__dirname, '../data/users.json');
db.conect()

async function getDeparts() {
    return await db.getDeparts();
}

async function addDepart(dnombre, loc) {
    return await db.addDepart(dnombre, loc);
}
async function getDepart(depart_no) {
    return await db.getDepart(depart_no);
}
async function editDepart(depart_no, dnombre, loc) {
    return await db.editDepart(depart_no, dnombre, loc);
}
async function deleteDepart(depart_no) {
    return await db.deleteDepart(depart_no);
}





module.exports = {
    getDeparts, addDepart, getDepart, editDepart, deleteDepart
};
