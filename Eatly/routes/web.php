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

use Auth;

Route::get('/logout', function() {
    Auth::logout();
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

use App\Http\Controllers\DishController;

Route::get('/dish/add', function() {
    return view('dish.add');
});

Route::get('/dish/_add', 'App\Http\Controllers\DishController@add');

Route::get('/dish/redact', 'App\Http\Controllers\DishController@redact');

Route::get('/dish/_redact', 'App\Http\Controllers\DishController@_redact');

Route::get('/dish/delete', 'App\Http\Controllers\DishController@delete');

Route::get('/dish/{id}', function(string $id) {
    return view('dish.single')->with('id', $id);
});

// REVIEW ROUTES



Route::get('/review/add', 'App\Http\Controllers\ReviewController@add');

Route::get('/review/_add', 'App\Http\Controllers\ReviewController@_add');

Route::get('/review/redact', 'App\Http\Controllers\ReviewController@redact');

Route::get('/review/_redact', 'App\Http\Controllers\ReviewController@_redact');

Route::get('/review/delete', 'App\Http\Controllers\ReviewController@delete');