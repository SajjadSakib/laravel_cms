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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'resources/css/all.min.css',
        'resources/css/fontawesome.min.css',
        'resources/css/sb-admin-2.min.css',
        'resources/css/bootstrap.min.css',
        'resources/css/blog-home.css',
    ],'public/css/lib.css')
    .scripts([
        'resources/js/jquery.min.js',
        'resources/js/bootstrap.bundle.min.js',
        'resources/js/jquery.easing.min.js',
        'resources/js/sb-admin-2.min.js',
    ],'public/js/lib.js');
