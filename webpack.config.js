var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')

    // Will output as public/build/app.js
    .addEntry('app', './assets/js/app.js')

    .enableSourceMaps(!Encore.isProduction())

;

module.exports = Encore.getWebpackConfig();