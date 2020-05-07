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

mix.styles([ // CSS DE PÑANTILLA
   'resources/assets/plantilla/css/fontawesome.css',
   'resources/assets/plantilla/css/flag-icon.css',
   'resources/assets/plantilla/css/icofont.css',   
   'resources/assets/plantilla/css/prism.css',
  // 'resources/assets/plantilla/css/chartist.css',
  
   'resources/assets/plantilla/css/admin.css',
   'resources/assets/plantilla/css/bootstrap.css'
  
], 'public/css/plantilla.css')
.scripts([ //JS DE PLANTILLA

   'resources/assets/plantilla/js/jquery-3.3.1.min.js',
   'resources/assets/plantilla/js/popper.min.js',
   'resources/assets/plantilla/js/sweetalert2.js',
   'resources/assets/plantilla/js/bootstrap.js',
   'resources/assets/plantilla/js/icons/feather-icon/feather.min.js',
   'resources/assets/plantilla/js/icons/feather-icon/feather-icon.js',
   'resources/assets/plantilla/js/sidebar-menu.js',
   //'resources/assets/plantilla/js/chart/chartist/chartist.js',
  // 'resources/assets/plantilla/js/chart/chartjs/chart.min.js',
   'resources/assets/plantilla/js/lazysizes.min.js',
   'resources/assets/plantilla/js/prism/prism.min.js',
   'resources/assets/plantilla/js/clipboard/clipboard.min.js',
   'resources/assets/plantilla/js/custom-card/custom-card.js',
   'resources/assets/plantilla/js/counter/jquery.waypoints.min.js',
   'resources/assets/plantilla/js/counter/jquery.counterup.min.js',
   'resources/assets/plantilla/js/counter/counter-custom.js',
   //'resources/assets/plantilla/js/chart/peity-chart/peity.jquery.js',
  // 'resources/assets/plantilla/js/chart/sparkline/sparkline.js',
   'resources/assets/plantilla/js/admin-customizer.js',
  // 'resources/assets/plantilla/js/dashboard/default.js',
   //'resources/assets/plantilla/js/chat-menu.js',
   'resources/assets/plantilla/js/height-equal.js',
   'resources/assets/plantilla/js/lazysizes.min.js',

 



   'resources/assets/plantilla/js/admin-script.js',  
],  'public/js/plantilla.js')
.js(['resources/assets/js/app.js'],'public/js/app.js'); //JS DE VUE
