const path = require('path');
const glob = require('glob');
const webpack = require('webpack');
const autoprefixer = require('autoprefixer');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const dotenv = require('dotenv').config();
const postcssCustomProperties = require('postcss-custom-properties');
const { WebpackManifestPlugin } = require('webpack-manifest-plugin');

const envVariables = process.env;

const {
    LOCAL_HOSTNAME,
    LOCAL_PROXY,
    LOCAL_SSL_KEY,
    LOCAL_SSL_CERT
} = envVariables;

const JS_DIR = path.resolve(__dirname, 'assets/src/js');
const BUILD_DIR = path.resolve(__dirname, 'assets/build');
const BLOCKS_JS_DIR = path.resolve(__dirname, 'blocks/*/assets/js');
const TEMPLATE_PARTS_JS_DIR = path.resolve(__dirname, 'template-parts/*/assets/js');

const entry = {
    'admin': JS_DIR + '/admin.js',
    'main': JS_DIR + '/main.js',
    'tiny-mce-customiser': JS_DIR + '/tiny-mce-customiser.js',
    'acf-field-code-block': JS_DIR + '/acf-field-code-block.js',
};

glob.sync(`${BLOCKS_JS_DIR}/**.js`).forEach(file => {
    entry[`block-${path.parse(file).name}`] = file;
});

glob.sync(`${TEMPLATE_PARTS_JS_DIR}/**.js`).forEach(file => {
    entry[`template-part-${path.parse(file).name}`] = file;
});

const output = {
    filename: 'js/[name].[contenthash].js',
    path: BUILD_DIR,
    publicPath: "/",
};

const rules = [
    {
        test: /\.js$/,
        exclude: /node_modules\/(?!(swiper|dom7|ssr-window|plyr))/,
        use: {
            loader: 'babel-loader',
            options: {
                presets: [
                    [
                        '@babel/preset-env', {
                            targets: 'defaults'
                        }
                    ]
                ]
            }
        }
    },
    {
        test: /\.scss$/,
        exclude: /node_modules/,
        use: [
            MiniCssExtractPlugin.loader, 
            {
                loader: 'css-loader',
                options: {
                    url: false
                }
            },
            { 
                loader: 'postcss-loader', 
                options: {
                    postcssOptions: {
                        plugins: [
                            postcssCustomProperties(),
                            autoprefixer()
                        ]
                    }
                }
            },
            'sass-loader'
        ]
    },
	{
		test: /\.(png|jpg|svg|jpeg|gif|ico)$/i,
        type: 'asset/resource',
        generator: {
            filename: 'img/[name][ext][query]'
        }
	},
	{
		test: /\.(woff|woff2)$/i,
        type: 'asset/resource',
        generator: {
            filename: 'fonts/[name][ext][query]'
        }
	},
];

const plugins = argv => [
    new CleanWebpackPlugin({
        cleanStaleWebpackAssets: (argv.mode === 'production')
    }),
    new MiniCssExtractPlugin({
        filename: 'css/[name].[contenthash].css',
        chunkFilename: "[id].css"
    }),
    new BrowserSyncPlugin({
        proxy: LOCAL_PROXY ? LOCAL_PROXY : 'http://localhost',
        host: LOCAL_HOSTNAME ? LOCAL_HOSTNAME : 'localhost',
        open: 'external',
        https: LOCAL_SSL_KEY && LOCAL_SSL_CERT ? { key: LOCAL_SSL_KEY, cert: LOCAL_SSL_CERT } : null,
        files: ["**/*.php"],
    }),
    new WebpackManifestPlugin({
        fileName: 'manifest.json',
    }),
];

module.exports = (env, argv) => ({
    entry: entry,
    output: output,
    devtool: 'source-map',
    module: {
        rules: rules
    },
    optimization: {
        minimize: argv.mode === 'production',
    },
    plugins: plugins(argv)
});
