<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function(){

    Route::get('/', 'AdminController@index');


    /**
     * Rutas de administracion de slider
     */
    Route::get('/slider', [
        'uses'  => 'SliderController@index',
        'as'    => 'slider.index'
    ]);

    Route::post('/slider/create', [
        'uses'  => 'SliderController@store',
        'as'    => 'slider.store'
    ]);

    Route::get('/slider/edit/{id}',[
       'uses'   => 'SliderController@edit',
        'as'    => 'slider.edit'
    ]);

    Route::post('/slider/update',[
        'uses'   => 'SliderController@update',
        'as'    => 'slider.update'
    ]);

    Route::get('/slider/delete/{id}',[
        'uses'   => 'SliderController@destroy',
        'as'    => 'slider.destroy'
    ]);

    /**
     * Rutas de administracion de proveedores
     */
    Route::get('/proveedor', [
        'uses'  => 'ProveedorController@index',
        'as'    => 'proveedor.index'
    ]);

    Route::post('/proveedor/create', [
        'uses'  => 'ProveedorController@store',
        'as'    => 'proveedor.store'
    ]);

    Route::post('/proveedor/update', [
        'uses'  => 'ProveedorController@update',
        'as'    => 'proveedor.update'
    ]);

    Route::get('/proveedor/edit/{id}', [
        'uses'  => 'ProveedorController@edit',
        'as'    => 'proveedor.edit'
    ]);

    Route::get('/proveedor/delete/{id}', [
        'uses'  => 'ProveedorController@destroy',
        'as'    => 'proveedor.delete'
    ]);

    /**
     * Rutas de administracion de productos
     */
    Route::get('/producto', [
        'uses'  => 'ProductoController@index',
        'as'    => 'producto.index'
    ]);

    /**
     * Rutas de administracion de administradores
     */
    Route::get('/admins', [
        'uses'  => 'AdminController@indexAdmins',
        'as'    => 'admins.index'
    ]);

});