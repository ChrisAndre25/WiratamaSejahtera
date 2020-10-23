<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('product/')->name('product.')->group(function () {
    Route::get('dashboard', 'ProductController@show_dashboard')->name('dashboard');
    Route::get('add', 'ProductController@add')->name('add');
    Route::post('add', 'ProductController@store')->name('store');
    Route::get('edit/{product}', 'ProductController@edit')->name('edit');
    Route::match(['PUT','PATCH'], 'update/{product}', 'ProductController@update')->name('update');
    Route::get('visible/{product}', 'ProductController@visible')->name('visible');
    Route::get('hidden/{product}', 'ProductController@hidden')->name('hidden');
    Route::get('delete/{product}', 'ProductController@delete')->name('delete');
    Route::get('restore/{slug}', 'ProductController@restore')->name('restore');
    Route::get('destroy/{slug}', 'ProductController@destroy')->name('destroy');
    Route::post('category/add', 'ProductController@add_category')->name('add_category');
    Route::post('brand/add', 'ProductController@add_brand')->name('add_brand');
    Route::get('{product}', 'ProductController@show')->name('show');
});

Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/{category}', 'ProductController@category_index')->name('products.category_index');
Route::get('/brands', 'ProductController@brands_index')->name('products.brands_index');
Route::get('/brands/{brand}', 'ProductController@brand_index')->name('products.brand_index');
Route::post('/products/search', 'ProductController@search')->name('products.search');


