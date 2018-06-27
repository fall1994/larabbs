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

Route::get('env', function () {
	return getenv('DB_DATABASE');
});

Route::get('config', function () {
    config(['app.timezone' => 'America/Chicago']);
    return config('app.timezone');
});
