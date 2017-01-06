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

Route::group(['middleware' => 'web'], function () {
    Route::get('socket', 'SocketController@index');
    Route::post('sendmessage', 'SocketController@sendMessage');
    Route::get('writemessage', 'SocketController@writemessage');

    Route::group(array('middleware' => 'auth'), function() {
        Route::get('/', 'HomeController@index');
        Route::group(array('prefix' => 'admin'), function() {
            Route::resource('categories', CategoriesController::class, ['except' => ['show']]);
            Route::resource('users', UsersController::class);
            Route::resource('products', ProductsController::class);
            Route::resource('supplies', SuppliesController::class, ['except' => ['show']]);
            Route::resource('customers', CustomersController::class, ['except' => ['show']]);
            Route::resource('prices', PricesController::class, ['except' => ['show']]);
            Route::resource('bills', BillsController::class);
            Route::resource('imports', ImportsController::class);
        });
    });
    Route::auth();
});
