const mix = require('laravel-mix');

let Asset_version = Date.now().toString(); // grab latest asset version
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/css/app.scss', 'public/css/').version(Asset_version)
mix.babel('resources/js/app.js', 'public/js/app.js').version(Asset_version);
