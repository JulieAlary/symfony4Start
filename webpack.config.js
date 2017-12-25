var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')

    // Will output as public/build/app.js
    .addEntry('app', './assets/js/app.js')
    .addEntry('global', './assets/css/custom.css')

    .autoProvidejQuery()

    .enableSourceMaps(!Encore.isProduction())

;

module.exports = Encore.getWebpackConfig();