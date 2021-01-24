const path = require('path');
const webpack = require('webpack');
const miniCss = require('mini-css-extract-plugin');

module.exports = {
    entry: [
        './resources/assets/app.js'
    ],
    output: {
        path: path.resolve(__dirname, 'public/assets/js'),
        filename: 'app.js'
    },
    module: {
        rules: [{
            test: /\.(s*)css$/,
            use: [
                miniCss.loader,
                'css-loader',
                'sass-loader',
                'postcss-loader',
            ]
        }]
    },
    plugins: [
        new miniCss({
            filename: '../css/app.css',
        }),
    ]
};