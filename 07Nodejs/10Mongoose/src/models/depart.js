const { Schema, model } = require("mongoose");

const episodeSchema = new Schema(
    {
        depart_no: {
            type: Number,
            required: true,
            trim: true,
            unique: true,
        },
        dnombre: {
            type: String,
            required: true,
            trim: true,
            maxlength: 100
        },
        loc: {
            type: String,
            required: true,
            trim: true,
        },
    },
    {
        timestamps: false,
        versionKey: false,
        collection: "depart"
    }
);

module.exports = model("Depart", episodeSchema);