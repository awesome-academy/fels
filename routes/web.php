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
    Route::resource('/dashboard', 'Admin\DashboardController')->only(['index']);
    Route::resource('/topics', 'Admin\TopicController');
});

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::get('/topic', 'Home\TopicController@index')->name('index');
    Route::get('topic/{slug}', 'Home\TopicController@show')->name('topics.show');
    Route::resource('/lessons/tests', 'Home\TestController')->only(['show', 'store']);
    Route::resource('showtests', 'Home\ShowTestController');
    Route::resource('index/word', 'Home\WordListController')->only(['show']);
    Route::resource('test/result', 'Home\ResultController')->only(['show']);
    Route::get('add/word/{id}', 'Home\WordListController@doFavorite')->name('wordlist.add');

    Route::get('topic/search', 'Home\TopicController@search')->name('topic.search');
    Route::get('word/review', 'Home\WordListController@reviewWord')->name('word.review');

    Route::resource('statis', 'Home\StatisticalController');
    Route::get('/statis/{id}', [
        'uses' => 'Home\StatisticalController@chart',
    ]);
    Route::get('word/review/{status}', 'Home\WordListController@filterWord')->name('word.filter');
    Route::group(['prefix' => 'user'], function () {
        Route::resource('/profile', 'Home\UserController');
        Route::get('/{id}/following', 'Home\UserController@following')->name('user.following');
        Route::get('/{id}/follower', 'Home\UserController@followers')->name('user.followers');
        Route::get('/{id}/results', 'Home\UserController@results')->name('user.results');
        Route::post('/follow', 'Home\UserController@doFollow')->name('user.follow');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
