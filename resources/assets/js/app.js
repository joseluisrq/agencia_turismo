
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('categoria', require('./components/Categoria.vue'));
Vue.component('servicio', require('./components/Servicio.vue'));
Vue.component('cliente', require('./components/Cliente.vue'));
Vue.component('empleado', require('./components/Empleado.vue'));
Vue.component('prestador', require('./components/Prestador.vue'));

Vue.component('rol', require('./components/Roles.vue'));

const app = new Vue({
    el: '#app',
    data:{
        menu:6,
        ruta: 'http://127.0.0.1:8000/',
    }
});