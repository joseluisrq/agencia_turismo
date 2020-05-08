
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

//Servicios
Vue.component('categoria', require('./components/Servicios/Categoria.vue'));
Vue.component('servicio', require('./components/Servicios/Servicio.vue'));
Vue.component('prestador', require('./components/Servicios/Prestador.vue'));

//Clientes
Vue.component('cliente', require('./components/Clientes/Cliente.vue'));

//Empleados
Vue.component('empleado', require('./components/Empleados/Empleado.vue'));
Vue.component('cargo', require('./components/Empleados/Cargo.vue'));


//Usuarios
Vue.component('rol', require('./components/Usuarios/Roles.vue'));
Vue.component('usuario', require('./components/Usuarios/Usuario.vue'));

const app = new Vue({
    el: '#app',
    data:{
        menu:8,
        ruta: 'http://127.0.0.1:8000/',
    }
});
