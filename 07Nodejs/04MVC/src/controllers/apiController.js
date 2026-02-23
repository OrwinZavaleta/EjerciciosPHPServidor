const path = require('path');
const ejs = require('ejs');
const userService = require('../services/service');

function getUsers(req, res) {
    const users = userService.getUsers();

    res.writeHead(200, { 'Content-Type': 'application/json' });
    if (users.length === 0) {
        res.end(JSON.stringify({ message: "No hay usuarios todavia." }));
    }
    res.end(JSON.stringify(users));
}

function addUser(req, res) {
    let data = ""

    req.on("data", chunk => data += chunk)

    req.on("end", async () => {
        const user = JSON.parse(data)
        userService.addUser(user)

        res.writeHead(200, { 'Content-Type': 'application/json' });
        res.end(JSON.stringify({ message: "Se agrego el usuario correctamente." }));
    })

}

function getUser(req, res) {

}
function updateUser(req, res) {

}
function deleteUser(req, res) {

}

module.exports = { getUsers, addUser, getUser, updateUser, deleteUser };
