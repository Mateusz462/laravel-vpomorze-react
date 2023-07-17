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

mix.js('resources/js/app.js', 'public/js').sourceMaps()
   .js('react/src/main.jsx', 'public/js')
   .react()
   .vue()
   // .js('resources/js/components/matrix/changelogParser.js', 'public/js')
   // .js('resources/js/vue/index.js', 'public/js')
   // .js('resources/js/components/matrix/readable-random-string.js', 'public/js')
   // .js('resources/js/components/matrix/translate.js', 'public/js')
   // .css('resources/js/components/matrix/style.css', 'public/css')
   
   .css('resources/js/css/app.css', 'public/css')
   .css('resources/js/css/profiles.css', 'public/css')
   .sass('resources/sass/app.scss', 'public/css');
   