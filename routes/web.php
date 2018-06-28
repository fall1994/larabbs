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

Route::get('/', 'PagesController@root')->name('root');


Route::get('test', function () {
    return view('layouts.app');
});

Auth::routes();

Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);
// Route::get('/users/{user}', 'UsersController@show')->name('users.show');
// Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
// Route::patch('/users/{user}', 'UsersController@update')->name('users.update');

// 无用路由
Route::get('/home', 'HomeController@index')->name('home');
Route::get('env', function () {
    return getenv('DB_DATABASE');
});
Route::get('now', function () {
    return Carbon\Carbon::now()->toDateTimeString();
});
Route::get('config', function () {
    config(['app.timezone' => 'America/Chicago']);
    return config('app.timezone');
});


Route::resource('topics', 'TopicsController', ['only' => ['index', 'show', 'create', 'store', 'update', 'edit', 'destroy']]);