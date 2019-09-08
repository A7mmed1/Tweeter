<?php


use App\Notifications\NewFollower;
use App\User;


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
Route::post('/follow','ProfileController@followOrUnfollow');
Route::resource('/users', 'ProfileController');

Route::resource('/comments', 'CommentsController');





Route::resource('/tweets', 'TweetsController');


Route::post('like/{tweet}/','TweetsController@like');
Route::post('unlike/{tweet}/','TweetsController@unlike');

Route::post('/comments/{id}','CommentsController@store')->name('comments.store');

// Route::get('/x',function(){
//     // $user= Auth::user();
//     // $user->notify(new NewFollower (User::findorFail(2)));
//     foreach(Auth::user()->notifications as $notification){
//
//         $notification->markAsRead();
//     }
// });
