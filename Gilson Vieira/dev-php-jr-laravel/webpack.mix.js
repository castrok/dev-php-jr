const mix = require('laravel-mix');

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

/*SWEETALERT 2*/
mix.scripts(['node_modules/@sweetalert2/theme-bootstrap-4/bootstrap-4.min.css'], 'public/css/sweetalert2.min.css')
    .scripts(['node_modules/sweetalert2/dist/sweetalert2.all.js'], 'public/js/sweetalert2.min.js')
