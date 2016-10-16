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


Route::group(['namespace' => 'Back', 'prefix' => 'admin'], function () {
    Route::get('/', 'IndexController@index')->name('back.index');

    Route::get('/project-type', 'ProjectTypeController@index')->name('back.project_type');
    Route::any('/project-type/update/{id?}', 'ProjectTypeController@update')->name('back.project_type.update');
    Route::any('/project-type/destroy/{id}', 'ProjectTypeController@destroy')->name('back.project_type.destroy');

    Route::any('/project-category', 'ProjectCategoryController@index')->name('back.project_category');
    Route::any('/project-category/update/{id?}', 'ProjectCategoryController@update')->name('back.project_category.update');
    Route::any('/project-category/destroy/{id}', 'ProjectCategoryController@destroy')->name('back.project_category.destroy');

    Route::any('/project-producer', 'ProjectProducerController@index')->name('back.project_producer');
    Route::any('/project-producer/update/{id?}', 'ProjectProducerController@update')->name('back.project_producer.update');
    Route::any('/project-producer/destroy/{id}', 'ProjectProducerController@destroy')->name('back.project_producer.destroy');

    Route::any('/project', 'ProjectController@index')->name('back.project');
    Route::any('/project/update/{id?}', 'ProjectController@update')->name('back.project.update');
    Route::any('/project/destroy/{id}', 'ProjectController@destroy')->name('back.project.destroy');
    Route::any('/project/change-project-type', 'ProjectController@changeProjectType')->name('back.project.change_project_type');

});

Route::auth();