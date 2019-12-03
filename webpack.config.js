const MergeIntoSingleFilePlugin = require('webpack-merge-and-include-globally');

module.exports = {
    mode: 'production',
    entry: './index.js',
    output: {
        filename: '[name].js',
        path: __dirname + '/assets/js'
    },
    plugins: [
        new MergeIntoSingleFilePlugin({
            files: {
                "editorjs.js": [
                    "node_modules/@editorjs/editorjs/dist/editor.js",
                    "node_modules/@editorjs/header/dist/bundle.js",
                    "node_modules/@editorjs/image/dist/bundle.js",
                    "node_modules/@editorjs/inline-code/dist/bundle.js",
                    "node_modules/@editorjs/paragraph/dist/bundle.js",
                    "node_modules/@editorjs/marker/dist/bundle.js",
                    "node_modules/@editorjs/list/dist/bundle.js",
                    "node_modules/@editorjs/embed/dist/bundle.js",
                    "node_modules/@editorjs/link/dist/bundle.js",
                    "node_modules/@editorjs/table/dist/bundle.js",
                ]
            }
        }),
    ]
};