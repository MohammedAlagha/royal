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

Route::get('/','HomeController@index')->name('home');

//product
Route::get('products_list/{category?}','ProductsController@productsList')->name('products.products_list');
Route::get('product/{product}','ProductsController@show')->name('products.single_product');
Route::post('product/search','ProductsController@search')->name('product.search');

//product
Route::get('blog','PostsController@index')->name('blog');
Route::get('blog/{post}','PostsController@Show')->name('blog.single_post');


//contact
Route::get('contact','ContactController@showContact')->name('contact');
Route::post('messages/store','ContactController@storeMessages')->name('messages.store');


//about
Route::get('about','HomeController@showAbout')->name('about');

//subscribes
Route::post('subscribes/store','SubscribesController@store')->name('subscribes.store');



Auth::routes([
    'register'=>false
]);

//Route::get('/home', 'HomeController@index')->name('home');

