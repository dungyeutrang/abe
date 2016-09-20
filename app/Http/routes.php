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

Route::group(['namespace' => 'Front'], function () {
    Route::get('/', 'IndexController@index')->name('front.index');
    Route::get('/projects', 'ProjectController@index')->name('front.project');
    Route::get('/news', 'NewsController@index')->name('front.new');
    Route::get('/press', 'PressController@index')->name('front.press');
    Route::get('/contact', 'ContactController@index')->name('front.contact');
    Route::get('/profile', 'ProfileController@index')->name('front.profile');
});

