let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
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
        //   "node_modules/font-awesome/css/font-awesome.min.css",
        "resources/assets/theme/css/materialize/css/materialize.min.css",
        "resources/assets/theme/fonts/iconfont/material-icons.css",
        "resources/assets/theme/css/shortcodes/combined/shortcodes.css",
        "resources/assets/theme/css/style.css",
        "resources/assets/theme/css/helpers.css",
        "resources/assets/theme/css/skins/vodacom.css",
    ], 'public/css/theme-bundle.css');