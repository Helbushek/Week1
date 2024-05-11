<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function () {
    return Controller::user();
});

Route::get('/dishes', function () {
    return Controller::dishes();
});

Route::get('/news', function () {
    return Controller::news();
});

Route::get('/reviews', function () {
    return Controller::review();
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/auth/sign_up', 'App\Http\Controllers\AuthenticationController@sign_up');

Route::get('/auth/sign_in', 'App\Http\Controllers\AuthenticationController@sign_in');