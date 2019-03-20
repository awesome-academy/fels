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
Auth::routes();

Route::group([
    'middleware' => ['auth', 'admin'],
    'prefix' => 'admin',
], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::resource('/topics', 'Admin\TopicController');
});

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::get('/', 'Home\TopicController@index')->name('index');
    Route::get('/{slug}', 'Home\TopicController@show')->name('topics.show');
    Route::resource('word', 'Home\WordListController');
    Route::resource('/lessons/tests', 'Home\TestController');
    Route::get('/showtest/{id}', 'Home\ShowTestController@show')->name('showtests.show');
});

Route::get('/home', 'HomeController@index')->name('home');
