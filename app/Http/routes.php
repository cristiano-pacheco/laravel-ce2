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

Route::pattern('category','[0-9]+');
Route::pattern('product','[0-9]+');
Route::pattern('id','[0-9]+');
Route::group(['prefix'=>'admin'], function (){

    // Rotas de Category
    Route::get('categories', [
        'as' => 'categories',
        'uses' => 'AdminCategoriesController@index'
    ]);

    Route::get('categories/{category}', [
        'as' => 'editCategory', function (\CodeCommerce\Category $category){
            echo $category->name;
        }
    ]);

    Route::put('categories/{id}', [
        'as' => 'saveEditCategory',
        'uses' => 'AdminCategoriesController@save'
    ]);

    Route::post('categories', [
        'as' => 'saveCategory',
        'uses' => 'AdminCategoriesController@save'
    ]);

    // Rotas de Products
    Route::get('products', [
        'as' => 'products',
        'uses' => 'AdminProductsController@index'
    ]);

    Route::get('products/{product}', [
        'as' => 'editProduct', function (\CodeCommerce\Product $product){
            echo $product->name;
        }
    ]);

    Route::put('products/{id}', [
        'as' => 'saveEditProduct',
        'uses' => 'AdminProductsController@save'
    ]);

    Route::post('products', [
        'as' => 'saveProduct',
        'uses' => 'AdminProductsController@save'
    ]);


});

// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

// Route::get('exemplo', 'WelcomeController@exemplo');

// Route::get('admin/products', 'AdminProductsController@index');

// Route::get('admin/categories', 'AdminCategoriesController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
