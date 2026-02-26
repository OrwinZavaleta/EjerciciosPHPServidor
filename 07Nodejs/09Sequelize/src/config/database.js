const { Sequelize } = require("sequelize");
require('dotenv').config({
    path: __dirname + "/../../.env",
    encoding: "utf8"
});

const sequelize = new Sequelize(process.env.DB_DATABASE, process.env.DB_USER, process.env.DB_PASS, {
    host: process.env.DB_HOST,
    dialect: "mysql"
});

async function connect() {
    try {
        await sequelize.authenticate()
        console.log("Coneccion exitosa con la bbdd");
    } catch (error) {
        console.error("Error al conectar a la base de datos: ", error)
    }
}
connect()

module.exports = sequelize 