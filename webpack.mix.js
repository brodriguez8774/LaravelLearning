const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/vue_learning.js', 'public/js')
    .sass('resources/assets/sass/base.scss', 'public/css')
    .sass('resources/assets/sass/vue_learning.scss', 'public/css')
    .version();
