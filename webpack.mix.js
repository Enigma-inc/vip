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
    .sass('resources/assets/sass/paper-theme.scss', 'public/css')
    .styles([
        "resources/assets/theme/bootstrap/css/bootstrap.css",
        "node_modules/font-awesome/css/font-awesome.min.css",
        "resources/assets/theme/css/materialize/css/materialize.min.css",
        "resources/assets/theme/fonts/iconfont/material-icons.css",
        "resources/assets/theme/css/shortcodes/combined/shortcodes.css",
    ], 'public/css/theme-bundle.css')
    .styles([
        "resources/assets/theme/css/helpers.css",
        "resources/assets/theme/css/skins/admin.css",
        "resources/assets/theme/css/skins/vodacom.css",
        "node_modules/toastr/build/toastr.min.css",
        "node_modules/vueditor/dist/style/vueditor.min.css",
    ], 'public/css/vendor.css')
    .styles([
        "resources/assets/theme/bootstrap/css/bootstrap.css",
        "node_modules/font-awesome/css/font-awesome.min.css",
        "resources/assets/theme/css/materialize/css/materialize.min.css",
        "resources/assets/theme/fonts/iconfont/material-icons.css",
        "resources/assets/theme/css/shortcodes/combined/shortcodes.css",
        "resources/assets/theme/css/style.css",
        "resources/assets/theme/css/helpers.css",
        "resources/assets/theme/css/skins/vodacom.css",
    ], 'public/css/front-theme-bundle.css')
    .scripts(['node_modules/jquery/dist/jquery.js',
        'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',
        'node_modules/slick-carousel/slick/slick.js',
        "resources/assets/theme/js/theme/imagesloaded.js",
        "resources/assets/theme/js/theme/materialize.min.js",
        "resources/assets/theme/js/theme/menuzord.js",
        "resources/assets/theme/js/theme/jquery.easing.min.js",
        "resources/assets/theme/js/theme/jquery.sticky.min.js",
        "resources/assets/theme/js/theme/smoothscroll.min.js",
        "resources/assets/theme/js/theme/jquery.stellar.min.js",
        "resources/assets/theme/js/theme/scripts.js"
    ], 'public/vendor/bundle.js')
    .autoload({ 'jquery': ['window.$', 'window.jQuery'] })
    .copyDirectory('node_modules/font-awesome/fonts', 'public/fonts');