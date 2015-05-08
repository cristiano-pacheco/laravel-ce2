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



Route::group(['prefix'=>'admin','where'=>['id'=>'[0-9+]']], function (){

    // Rotas de Categories
    Route::get('categories', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
    Route::post('categories',['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
    Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
    Route::get('categories/destroy/{id}', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
    Route::get('categories/edit/{id}', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
    Route::put('categories/update/{id}', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
    
    // Rotas de Products
    Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@index']);
    Route::post('products',['as' => 'products.store', 'uses' => 'ProductsController@store']);
    Route::get('products/create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
    Route::get('products/destroy/{id}', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
    Route::get('products/edit/{id}', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
    Route::put('products/update/{id}', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
