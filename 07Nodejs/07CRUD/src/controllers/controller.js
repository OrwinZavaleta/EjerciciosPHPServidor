const path = require('path');
const ejs = require('ejs');
const service = require('../services/service');
const { title } = require('process');
const qs = require("querystring")

async function home(req, res) {
    const filePath = path.join(__dirname, '../views/home.ejs');

    const depart = await service.getDeparts()

    ejs.renderFile(filePath, { title: 'Inicio', depart }, (err, html) => {
        res.writeHead(200, { 'Content-Type': 'text/html' });
        res.end(html);
    });
}

function craeteForm(req, res) {
    const filePath = path.join(__dirname, '../views/createForm.ejs');

    ejs.renderFile(filePath, { title: "Crear depart" }, (err, html) => {
        res.writeHead(200, { 'Content-Type': 'text/html', "Location": "/" });
        res.end(html);
    });
}
function insert(req, res) {
    const chunks = [];

    req.on('data', (chunk) => {
        chunks.push(chunk); //cada chunk leído es un buffer
    });

    req.on('end', () => {
        const data = Buffer.concat(chunks); // Une varios buffers en uno solo
        const output = qs.parse(data.toString());
        service.addDepart(output.dnombre, output.loc)
        res.writeHead(301, { Location: "/" })
        res.end();
    });
}
function updateForm(req, res, id) {
    const filePath = path.join(__dirname, '../views/updateForm.ejs');

    depart = service.getDepart(id)

    ejs.renderFile(filePath, { title: "Update depart", depart }, (err, html) => {
        res.writeHead(200, { 'Content-Type': 'text/html', "Location": "/" });
        res.end(html);
    });
}
function update(req, res, id) {
    const chunks = [];

    req.on('data', (chunk) => {
        chunks.push(chunk); //cada chunk leído es un buffer
    });

    req.on('end', () => {
        const data = Buffer.concat(chunks); // Une varios buffers en uno solo
        const output = qs.parse(data.toString());
        service.editDepart(id, output.dnombre, output.loc)
        res.writeHead(301, { Location: "/" })
        res.end();
    });
}




module.exports = { home, craeteForm, insert };
