let mix = require('laravel-mix');

/*
 |---------------------------------------------------------------wee-----------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles([
        "resources/assets/theme/bootstrap/css/bootstrap.css",
        "node_modules/font-awesome/css/font-awesome.min.css",
        "resources/assets/theme/css/materialize/css/materialize.min.css",
        "resources/assets/theme/fonts/iconfont/material-icons.css",
        "resources/assets/theme/css/shortcodes/combined/shortcodes.css",
        "resources/assets/theme/css/style.css",
        "resources/assets/theme/css/helpers.css",
        "resources/assets/theme/css/skins/vodacom.css",
    ], 'public/css/theme-bundle.css')
    .scripts(['node_modules/jquery/dist/jquery.js',
        'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js'
    ], 'public/vendor/bundle.js')
    .autoload({ 'jquery': ['window.$', 'window.jQuery'] })
    .copyDirectory('node_modules/font-awesome/fonts', 'public/fonts');