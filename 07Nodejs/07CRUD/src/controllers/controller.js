const path = require('path');
const ejs = require('ejs');
const userService = require('../services/service');
const db = require("../services/db");
const { title } = require('process');

async function home(req, res) {
    const filePath = path.join(__dirname, '../views/home.ejs');

    db.conect()

    const depart = await db.getDepart();

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
function craeteForm(req, res) {
    // const filePath = path.join(__dirname, '../views/createForm.ejs');

    // ejs.renderFile(filePath, {title: "Crear depart"}, (err, html) => {
    //     res.writeHead(200, { 'Content-Type': 'text/html' });
    //     res.end(html);
    // });
}
function insert(req, res) {
    // const filePath = path.join(__dirname, '../views/home.ejs');

    // ejs.renderFile(filePath, {title: "Crear depart"}, (err, html) => {
    //     res.writeHead(200, { 'Content-Type': 'text/html' });
    //     res.end(html);
    // });

    db.addDepart(dnombre, loc)

    // res.redirect("/")
}


module.exports = { home, craeteForm, insert };
