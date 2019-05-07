<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'student'], function() {
        Route::any('', 'StudentController@index');
        Route::get('add', 'StudentController@add');
        Route::get('edit/{id}', 'StudentController@edit');
        Route::get('delete/{id}', 'StudentController@delete');
        Route::post('save', 'StudentController@save');
    });

    Route::group(['prefix' => 'teacher'], function() {
        Route::any('', 'TeacherController@index');
        Route::get('add', 'TeacherController@add');
        Route::get('edit/{id}', 'TeacherController@edit');
        Route::get('delete/{id}', 'TeacherController@delete');
        Route::post('save', 'TeacherController@save');
    });

    Route::group(['prefix' => 'class'], function() {
        Route::any('', 'ClassController@index');
        Route::get('add', 'ClassController@add');
        Route::get('edit/{id}', 'ClassController@edit');
        Route::get('delete/{id}', 'ClassController@delete');
        Route::post('save', 'ClassController@save');
        Route::get('print', 'ClassController@print');
    });
});