<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('contenido/contenido');
});

//CATEGORIA S
Route::get('/categoria','CategoriaControlador@index');
Route::get('/categoria/selectCategoria','CategoriaControlador@selectCategoria');
Route::post('/categoria/registrar','CategoriaControlador@registrar');
Route::put('/categoria/actualizar','CategoriaControlador@actualizar');
Route::put('/categoria/desactivar','CategoriaControlador@desactivar');
Route::put('/categoria/activar','CategoriaControlador@activar');

//SERVICIOS
Route::get('/servicio','ServicioControlador@index');
Route::get('/servicio/ultimoservicio','ServicioControlador@ultimoservicio');
Route::post('/servicio/registrar','ServicioControlador@registrar');
Route::put('/servicio/actualizar','ServicioControlador@actualizar');
Route::put('/servicio/desactivar','ServicioControlador@desactivar');
Route::put('/servicio/activar','ServicioControlador@activar');


//Prestador
Route::get('/prestador/selectPrestador','PrestadorControlador@selectPrestador');

Route::get('/prestador','PrestadorControlador@index');
Route::post('/prestador/registrar','PrestadorControlador@registrar');
Route::put('/prestador/actualizar','PrestadorControlador@actualizar');
Route::put('/prestador/desactivar','PrestadorControlador@desactivar');
Route::put('/prestador/activar','PrestadorControlador@activar');

//Rol
Route::get('/rol','RolControlador@index');
Route::get('/rol/selectRol','RolControlador@selectRol');
Route::post('/rol/registrar','RolControlador@registrar');
Route::put('/rol/actualizar','RolControlador@actualizar');
Route::put('/rol/desactivar','RolControlador@desactivar');
Route::put('/rol/activar','RolControlador@activar');


//Usuario
Route::get('/usuario','UsuarioControlador@index');
Route::get('/list_user','UsuarioControlador@list_user');
Route::post('/usuario/registrar','UsuarioControlador@registrar');
Route::put('/usuario/actualizar','UsuarioControlador@actualizar');
Route::put('/usuario/desactivar','UsuarioControlador@desactivar');
Route::put('/usuario/activar','UsuarioControlador@activar');

//Cargo
Route::get('/cargo','CargoControlador@index');
Route::get('/cargo/selectCargo','CargoControlador@selectCargo');
Route::post('/cargo/registrar','CargoControlador@registrar');
Route::put('/cargo/actualizar','CargoControlador@actualizar');
Route::put('/cargo/desactivar','CargoControlador@desactivar');
Route::put('/cargo/activar','CargoControlador@activar');


//Clientes
Route::get('/cliente','ClienteControlador@index');
Route::post('/cliente/registrar','ClienteControlador@registrar');
Route::put('/cliente/actualizar','ClienteControlador@actualizar');
Route::put('/cliente/desactivar','ClienteControlador@desactivar');
Route::put('/cliente/activar','ClienteControlador@activar');


//empleado
Route::get('/empleado','EmpleadoControlador@index');
Route::post('/empleado/registrar','EmpleadoControlador@registrar');
Route::put('/empleado/actualizar','EmpleadoControlador@actualizar');
Route::put('/empleado/desactivar','EmpleadoControlador@desactivar');
Route::put('/empleado/activar','EmpleadoControlador@activar');

//usuarios
Route::get('/usuario','UsuarioControlador@index');
Route::post('/usuario/registrar','UsuarioControlador@registrar');