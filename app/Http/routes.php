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
    Route::get('/projects/{category}/', 'ProjectController@category')->name('front.project.category');
    Route::get('/projects/{category}/{detail}', 'ProjectController@detail')->name('front.project.category.detail');
    Route::get('/projects/{category}/{type}/{list}', 'ProjectController@type')->name('front.project.category.type.list');
    Route::get('/news', 'NewsController@index')->name('front.new');
    Route::get('/news/{type}', 'NewsController@type')->name('front.new.type');
    Route::get('/news/{type}/{detail}', 'NewsController@detail')->name('front.new.detail');
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

    Route::get('/new-type', 'NewTypeController@index')->name('back.new_type');
    Route::any('/new-type/update/{id?}', 'NewTypeController@update')->name('back.new_type.update');
    Route::any('/new-type/destroy/{id}', 'NewTypeController@destroy')->name('back.new_type.destroy');

    Route::any('/new', 'NewController@index')->name('back.new');
    Route::any('/new/update/{id?}', 'NewController@update')->name('back.new.update');
    Route::any('/new/destroy/{id}', 'NewController@destroy')->name('back.new.destroy');

    Route::any('/slider', 'SliderController@index')->name('back.slider');
    Route::any('/press', 'PressController@index')->name('back.press');
    Route::any('/profile', 'ProfileController@index')->name('back.profile');

});

Route::auth();