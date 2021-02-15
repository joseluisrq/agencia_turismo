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
Route::group(['middleware' => ['cors']], function () {
  

    Route::group(['middleware'=>['guest']],function(){
        Route::get('/','Auth\LoginController@mostrarFormularioLogin'); 
        Route::post('/login','Auth\LoginController@login')->name('login');  
    });


    Route::group(['middleware'=>['auth']],function(){

        Route::get('/main', function () {
            return view('contenido/contenido');
        })->name('main'); 

        Route::post('/cerrarsesion','Auth\LoginController@cerrarSesion')->name('cerrarsesion'); 
        
        //middleware  para roles
        Route::group(['middleware'=>['Administrador']],function(){  
            //CATEGORIA S
                Route::get('/categoria','CategoriaControlador@index');
                Route::get('/categoria/selectCategoria','CategoriaControlador@selectCategoria');
                Route::get('/categoria/prueba','CategoriaControlador@selectCategoria2');
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
                Route::get('/servicio/buscarServicioVenta', 'ServicioControlador@buscarServicioVenta');
                Route::get('/servicio/listarServicio', 'ServicioControlador@listarServicio');
                Route::get('/servicio/listarServiciosVenta', 'ServicioControlador@listarServiciosVenta');

                
                
                
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
                Route::put('/rol/actualizar','RolControlador@actualizar')->name('put');
                Route::put('/rol/desactivar','RolControlador@desactivar');
                Route::put('/rol/activar','RolControlador@activar');
                
                //caja

                Route::post('/caja/registrar','CajaControlador@registrar');
                Route::get('/caja','CajaControlador@index');
                Route::get('/detallecaja/obtenerDetalles','CajaControlador@detallecaja');
                Route::put('/caja/cerrar','CajaControlador@cerrar');
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
                Route::get('/cliente/selectCliente', 'ClienteControlador@selectCliente');
                
                //empleado
                Route::get('/empleado','EmpleadoControlador@index');
                Route::get('/empleado/selectEmpleado','EmpleadoControlador@selectEmpleado');
                Route::post('/empleado/registrar','EmpleadoControlador@registrar');
                Route::put('/empleado/actualizar','EmpleadoControlador@actualizar');
                Route::put('/empleado/desactivar','EmpleadoControlador@desactivar');
                Route::put('/empleado/activar','EmpleadoControlador@activar');
                
                //usuarios
                Route::get('/usuario','UsuarioControlador@index');
                Route::post('/usuario/registrar','UsuarioControlador@registrar');

                //paquetes
                
                Route::get('/paquete', 'PaqueteControlador@index');
                Route::post('/paquete/registrar', 'PaqueteControlador@store');
                Route::put('/paquete/desactivar', 'PaqueteControlador@desactivar');
                Route::get('/paquete/obtenerCabecera', 'PaqueteControlador@obtenerCabecera');
                Route::get('/paquete/obtenerCabeceraCli', 'PaqueteControlador@obtenerCabeceraCli');
                Route::get('/paquete/ultimopaquete','PaqueteControlador@ultimopaquete');
                Route::get('/paquete/listarPaquetesVenta', 'PaqueteControlador@listarPaquetesVenta');
                Route::get('/paquete/buscarPaqueteVenta', 'PaqueteControlador@buscarPaqueteVenta');
            
                Route::get('/paquete/obtenerDetalles', 'PaqueteControlador@obtenerDetalles');
                Route::get('/paquete/obtenerClientes', 
                'PaqueteControlador@obtenerClientes');

                Route::get('/paquete/pdf/{id}','PaqueteControlador@pdf')->name('venta_pdf');
                Route::get('/paquete/pdfTicket/{id}','PaqueteControlador@pdfTicket')->name('paqueteticket_pdf');
                Route::get('/paquete/listarPdf','PaqueteControlador@listarPdf')->name('ventas_pdf');





                Route::get('/venta', 'VentaController@index');
                Route::post('/venta/registrar', 'VentaController@store');
                Route::put('/venta/desactivar', 'VentaController@desactivar');
                Route::get('/venta/obtenerCabecera', 'VentaController@obtenerCabecera');
                Route::get('/venta/obtenerDetalles', 'VentaController@obtenerDetalles');
                Route::get('/venta/pdf/{id}','VentaController@pdf')->name('venta_pdf');
                Route::get('/venta/pdfTicket/{id}','VentaController@pdfTicket')->name('ventaticket_pdf');
                Route::get('/venta/listarPdf','VentaController@listarPdf')->name('ventas_pdf');


                
        });
        Route::group(['middleware'=>['Operaciones']],function(){

        });
        Route::group(['middleware'=>['Cajero']],function(){

        });

    
        
        
    });

});
