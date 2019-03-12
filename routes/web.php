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
Route::group([
    'middleware' => ['auth', 'admin'],
    'prefix' => 'admin',
], function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::resource('/topics', 'Admin\TopicController');
});

Route::get('/', function () {
    return view('home');
})->name('index');

Route::get('/redirect/{social}', 'SocialLoginController@redirect');
Route::get('/callback/{social}', 'SocialLoginController@callback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
