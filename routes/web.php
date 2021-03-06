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
use App\Events\TaskEvent;

// Broadcast::routes(['middleware' => ['auth:api']]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('chat', 'ChatController@chat')->name('chat.chat');

Route::get('check', function()
{
    return session('chat');
});

Route::post('send', 'ChatController@send');
Route::post('getOldMessage','ChatController@getOldMessage');
Route::post('saveToSession','ChatController@saveToSession');


// Route::get('/event', function () {
//     event(new TaskEvent('Yo Sunzid?'));
// });

// Route::get('/listen', function () {
//     return view('listenBroadcast');
// });


// Route::get('/first', function () {
//    echo "Hello 5.8";
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
