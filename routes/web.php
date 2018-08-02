<?php

Route::get('/', 'TestController@welcome')->name('inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show')->name('show-product'); //Ver producto individualmente

Route::post('/cart', 'CartDetailController@store')->name('carrito');//Carrito de compras
Route::delete('/cart', 'CartDetailController@destroy')->name('carrito-delete');//Eliminar producto del carrito de compras

Route::post('/order', 'CartController@update')->name('ordenar');//Ruta que se encargará de armar el pedido.

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/products', 'ProductController@index'); //Listado de productos
    Route::get('/products/create', 'ProductController@create'); //Formulario de creación
    Route::post('/products', 'ProductController@store');//Para guardar producto
    //Actualización o edición de productos
    Route::get('/products/{id}/edit', 'ProductController@edit')->name('editProd'); //Formulario de creación
    Route::put('/products/{id}/edit', 'ProductController@update')->name('actuaProd');//Para guardar producto
    //Eliminar producto
    Route::delete('/products/{id}', 'ProductController@destroy')->name('delProd');//Ruta para eliminar un producto

    //Subir imagenes
    Route::get('/products/{id}/images', 'ImageController@index')->name('view-images');//Ruta para ver las imagenes de un producto
    Route::post('/products/{id}/images/', 'ImageController@store')->name('upload-image');//Ruta para guardar las imagenes
    Route::delete('/products/{id}/images', 'ImageController@destroy')->name('delete-image');//Ruta para eliminar imagen
    Route::get('products/{id}/images/select/{image}', 'ImageController@outstanding')->name('destacar');//Destacar una imagen
});
