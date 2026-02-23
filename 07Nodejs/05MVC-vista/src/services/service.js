const fs = require('fs');
const path = require('path');

const dataPath = path.join(__dirname, '../data/users.json');

function readUsers() {
    const data = fs.readFileSync(dataPath, { encoding: "utf8" });
    return JSON.parse(data || "[]");
}

function addUser(user) {
    const usuarios = readUsers()

    usuarios.push(user)

    fs.writeFileSync(dataPath, JSON.stringify(usuarios))
}

function getUsers() {
    return readUsers();
}

function updateUser(id, user) {
    const usuarios = readUsers()

    const idUser = usuarios.findIndex(u => u.id === id);

    usuarios[idUser].name = user.name

    fs.writeFileSync(dataPath, JSON.stringify(usuarios))
}
function getUser(id) {
    const usuarios = readUsers()

    const user = usuarios.find(u => u.id === id);

    return user;
}
function deleteUser(id) {
    const usuarios = readUsers()

    const idUser = usuarios.findIndex(u => u.id === id);

    usuarios.splice(idUser, 1)
}


module.exports = {
    getUsers,
    addUser,
    getUser,
    updateUser,
    deleteUser
};
