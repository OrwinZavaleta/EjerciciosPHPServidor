const { DataTypes } = require("sequelize");
const sequelize = require("../config/database");

const Depart = sequelize.define("Depart", {
    depart_no: {
        type: DataTypes.INTEGER,
        allowNull: false,
        primaryKey: true
    },
    dnombre: {
        type: DataTypes.STRING,
        allowNull: true
    },
    loc: {
        type: DataTypes.STRING,
        allowNull: true
    }
}, {
    freezeTableName: true,
    timestamps: false
})

module.exports = { Depart }