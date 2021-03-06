<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/verify', 'Auth\AuthController@verifyLogin');

Route::group(['prefix' => 'admin', 'namespace' => '\Admin', 'middleware' => ['auth']], function() {

    Route::get('/', 'PrincipalController@index');

    //Rutas Usuario y empleados
    Route::post('/user/verifyCreate', 'UserController@verifyCreate');
    Route::post('/user/verifyEdit', 'UserController@verifyEdit');
    Route::resource('/user','UserController');

    //Ruta Habitaciones
    Route::get('/habitacion/verifyDpi/{dpiData}','ReservacionController@verifyDpi');
    Route::resource('/habitacion','HabitacionController');

    //Ruta para Administración de las habitaciones
    Route::post('/adminH/BajaH','AdministracionHabitacion@Bajah');
    Route::resource('/adminH','AdministracionHabitacion');

    ////Ruta para Reservaciones
    Route::resource('/reservacion','ReservacionController');





    ///Ruta para Clientes
    Route::post('/cliente/verifyDpi','ClienteController@verifyDpi');
    Route::post('/cliente/verifyDpiEdit','ClienteController@verifyDpiEdit');
    Route::post('/cliente/verifyNit','ClienteController@verifyNit');
    Route::post('/cliente/verifyNitEdit','ClienteController@verifyNitEdit');
    Route::get('/cliente/showDiscount/{id}','ClienteController@showDiscount');
    Route::resource('/cliente','ClienteController');

    ////Ruta para items
    Route:resource('/item','itemController');

    ////Rutas para InventarioController
    Route::get('/inventario/showPlus/{id}','InventarioController@showPlus');
    Route::post('/inventario/storePlus','InventarioController@storePlus');
    Route::resource('/inventario','InventarioController');







});

// Route::get('/', function () {
//     return view('welcome');
// });
