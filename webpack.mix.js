//原廠
let mix = require('laravel-mix');

//非原廠
// const { mix } = require('laravel-mix');


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

// mix.js('resources/assets/js/app.js', 'public/js/app')
//     .extract(['lodash','jquery','axios','vue'])
//     .sass('resources/assets/sass/app.scss', 'public/css/app');
mix.browserSync('localhost:8000/hello');


mix.js('resources/assets/js/hello.js', 'public/js/hello')
   // .extract(['lodash','jquery','axios','vue'],'public/js/hello/hello-vendor')

    .js('resources/assets/js/app.js', 'public/js/app')
   // .extract(['lodash','jquery','axios','vue'],'public/js/app/app-vendor')

   // .extract(['lodash','jquery','axios','vue'],'public/js/common')
   .sass('resources/assets/sass/app.scss', 'public/css');

