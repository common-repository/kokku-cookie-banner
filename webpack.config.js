const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");

module.exports = {
    mode: process.env.NODE_ENV,
    entry: {
        main: [
            "./assets/frontend/js/main.js",
            "./assets/frontend/scss/main.scss",
        ],
        "color-picker": ["./assets/admin/js/color-picker.js"],
    },
    output: {
        filename: "js/[name].js",
        path: path.resolve(__dirname, "public"),
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "css/[name].css",
            chunkFilename: "[id].css",
        }),
        // Remove build folder(s) before building
        new CleanWebpackPlugin(),
    ],
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
            },
        ],
    },
};
