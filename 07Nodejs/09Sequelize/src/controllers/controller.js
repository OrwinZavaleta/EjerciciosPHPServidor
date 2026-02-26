const path = require('path');
const ejs = require('ejs');
const service = require('../services/service');
const qs = require("querystring");

async function home(req, res) {
    const filePath = path.join(__dirname, '../views/home.ejs');

    const depart = await service.getDeparts()
    // console.log(depart);
    

    ejs.renderFile(filePath, { title: 'Inicio', depart }, (err, html) => {
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.end(html);
    });
}

function craeteForm(req, res) {
    const filePath = path.join(__dirname, '../views/createForm.ejs');

    ejs.renderFile(filePath, { title: "Crear depart" }, (err, html) => {
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.end(html);
    });
}
function insert(req, res) {
    const chunks = [];

    req.on('data', (chunk) => {
        chunks.push(chunk); //cada chunk leído es un buffer
    });

    req.on('end', async () => {
        const data = Buffer.concat(chunks); // Une varios buffers en uno solo
        const output = qs.parse(data.toString());
        await service.addDepart(output.dnombre, output.loc)
        res.writeHead(301, { Location: "/" })
        res.end();
    });
}
async function updateForm(req, res, id) {
    const filePath = path.join(__dirname, '../views/updateForm.ejs');

    depart = await service.getDepart(id)

    ejs.renderFile(filePath, { title: "Update depart", depart: depart }, (err, html) => {
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.end(html);
    });
}
function update(req, res, id) {
    const chunks = [];

    req.on('data', (chunk) => {
        chunks.push(chunk); //cada chunk leído es un buffer
    });

    req.on('end', async () => {
        const data = Buffer.concat(chunks); // Une varios buffers en uno solo
        const output = qs.parse(data.toString());
        await service.editDepart(id, output.dnombre, output.loc)
        res.writeHead(301, { Location: "/" })
        res.end();
    });
}
async function deleteDepart(req, res, id) {
    await service.deleteDepart(id)

    res.writeHead(301, { Location: "/" })
    res.end()
}




module.exports = { home, craeteForm, insert, updateForm, update, deleteDepart };
