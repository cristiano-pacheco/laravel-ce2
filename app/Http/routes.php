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



Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

// Route::get('exemplo', 'WelcomeController@exemplo');

Route::group(['prefix'=>'admin', 'where'=> ['id'=> '[0-9]+']], function ()
{
    
    Route::group(['prefix'=>'categories'],function(){
        // Rotas de Categories
        Route::get('/', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
        Route::post('/',['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
        Route::get('destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
        Route::get('edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::put('update/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
    });
    
    Route::group(['prefix'=>'products'],function(){
        // Rotas de Products
        Route::get('/', ['as' => 'products', 'uses' => 'ProductsController@index']);
        Route::post('/',['as' => 'products.store', 'uses' => 'ProductsController@store']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
        Route::get('destroy/{id}', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
        Route::get('edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        Route::put('update/{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
        
        Route::group(['prefix'=>'images'],function(){

            Route::get('{id}/product', ['as' => 'products.images', 'uses' => 'ProductsController@images']);
            Route::get('create/{id}/product', ['as' => 'products.images.create', 'uses' => 'ProductsController@createImage']);
            Route::post('store/{id}/product', ['as' => 'products.images.store', 'uses' => 'ProductsController@storeImage']);
            Route::get('destroy/{id}/image', ['as' => 'products.images.destroy', 'uses' => 'ProductsController@destroyImage']);
            
        });
    });

});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
