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
Route::post('follow/{user}','FollowsController@store');
// Route::get('/index','FollowsController@index');


Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/u/{user}', 'ProfileController@s')->name('profile');
Route::resource('/users', 'ProfileController');

Route::resource('/comments', 'CommentsController');





Route::resource('/tweets', 'TweetsController');


Route::get('/tweets/{tweet}/like','TweetsController@like');
// Route::get('/tweets/{tweet}/unlike','TweetsController@unlike');

Route::post('/comments/{id}','CommentsController@store')->name('comments.store');
