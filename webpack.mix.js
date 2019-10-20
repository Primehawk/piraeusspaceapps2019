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




mix.styles(['resources/css/jquery-confirm.css' , 'resources/css/jquery-ui.min.css', 'resources/css/bootstrap.min.css' , 'resources/css/jquery.dataTables.min.css'  ],'public/css/combined-css.css');
mix.less('resources/less/app.less', 'public/css');
mix.combine([ 'public/css/combined-css.css', 'public/css/app.css' ],'public/css/piraiot.css');
mix.combine(['resources/js/jquery-3.4.1.min.js', 'resources/js/jquery-ui.min.js' , 'resources/js/popper.min.js', 'resources/js/fontawesome.js' , 'resources/js/jquery-confirm.js' , 'resources/js/Chart.bundle.min.js','resources/js/clipboard.min.js' , 'resources/js/bootstrap.min.js' , 'resources/js/jquery.dataTables.min.js'], 'public/js/app.js');


/*

mix.styles(['resources/css/jquery-confirm.css' , 'resources/css/bootstrap.min.css' , 'resources/css/jquery.dataTables.min.css'  ],'public/css/combined-css.css');
mix.less('resources/less/app.less', 'public/css');
mix.combine([ 'public/css/combined-css.css', 'public/css/app.css' ],'public/css/piraiot.css');
mix.combine(['resources/js/jquery-3.4.1.min.js', 'resources/js/popper.min.js', 'resources/js/fontawesome.js' , 'resources/js/jquery-confirm.js' , 'resources/js/Chart.bundle.min.js','resources/js/clipboard.min.js' , 'resources/js/bootstrap.min.js' , 'resources/js/jquery.dataTables.min.js'], 'public/js/app.js');



 */
