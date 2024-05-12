<?php

use App\Http\Controllers\Controller;

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

// GENERAL ROUTES
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

// AUTHENTICATION ROUTES

use App\Http\Controllers\AuthenticationController;

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/auth/sign_up', 'App\Http\Controllers\AuthenticationController@sign_up');

Route::get('/auth/sign_in', 'App\Http\Controllers\AuthenticationController@sign_in');

Route::get('/auth/redact', function() {
    return view('auth.redact');
});

Route::get('/auth/_redact', 'App\Http\Controllers\AuthenticationController@redact');

Route::get('/auth/delete', 'App\Http\Controllers\AuthenticationController@delete');

// NEWS ROUTES

use App\Http\Controllers\NewsController;

Route::get('/news/add', function() {
    return view('news.add');
});

Route::get('/news/_add', 'App\Http\Controllers\NewsController@add');

Route::get('/news/redact', 'App\Http\Controllers\NewsController@redact');

Route::get('/news/_redact', 'App\Http\Controllers\NewsController@_redact');

Route::get('/news/delete', 'App\Http\Controllers\NewsController@delete');

// DISH ROUTES