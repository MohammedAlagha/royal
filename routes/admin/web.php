<?php

use Illuminate\Support\Facades\Route;

////login
//Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin-login');
//Route::post('admin/login', 'Auth\AdminLoginController@login');

Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware('auth')->group(function () {

    //admin home
    Route::get('/home','HomeController@index')->name('home');

    //categories routes
    Route::resource('categories','CategoriesController')->except('show');
    Route::get('categories-data','CategoriesController@data')->name('categories.data');

    //products routes
    Route::resource('products','ProductsController');
    Route::get('products-data','ProductsController@data')->name('products.data');

    //posts routes
    Route::resource('posts','PostsController');
    Route::get('posts-data','PostsController@data')->name('posts.data');

    //messages routes
    Route::resource('messages','MessagesController')->only(['index','show','destroy']);
    Route::get('messages-data','MessagesController@data')->name('messages.data');

    //users routes
    Route::resource('users','UsersController');
    Route::get('users-data','UsersController@data')->name('users.data');

    //settings routes
    Route::get('settings','SettingsController@edit')->name('settings');
    Route::put('settings','SettingsController@update');

    //subscribes routes
    Route::resource('subscribes','SubscribesController')->only(['index','destroy']);
    Route::get('subscribes-data','SubscribesController@data')->name('subscribes.data');


    //newsletters routes
    Route::resource('newsletters','NewslettersController')->only(['index','destroy','create','store']);
    Route::get('newsletters-data','NewslettersController@data')->name('newsletters.data');





});
