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
    .js('resources/js/chat-ajax.js', 'public/js')
    .js('resources/js/favorite-ajax.js', 'public/js')
    .js('resources/js/bookmark-ajax.js', 'public/js')
    .js('resources/js/edit-title.js', 'public/js')
    .js('resources/js/quit-ajax.js', 'public/js')
.autoload( { //追加ここから
    "jquery": [ '$', 'window.jQuery' ],
} )//追加ここまで
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
