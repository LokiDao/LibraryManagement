<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;

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
    return view('orders');
});

Route::get('/home', function () {
	return view('orders');
});

	Route::get('/login', function () {
		return view('login');
	});

Route::get('/us', [UserController::class, 'showAll']);

Route::get('/uf', [UserController::class, 'search']);

Route::get('/u', function () { return view('adduser'); });

Route::post('/u', [UserController::class, 'add']);

Route::get('/u{id}', [UserController::class, 'show']);

Route::post('/u{id}', [UserController::class, 'edit']);

Route::get('/us{id}', [UserController::class, 'delete']);


Route::get('/bs', [BookController::class, 'showAll']);

Route::get('/bf', [BookController::class, 'search']);

Route::get('/b', function () { return view('addbook'); });

Route::post('/b', [BookController::class, 'add']);

Route::get('/b{id}', [BookController::class, 'show']);

Route::post('/b{id}', [BookController::class, 'edit']);

Route::get('/bs{id}', [BookController::class, 'delete']);


Route::get('/os', [OrderController::class, 'showAll']);

Route::get('/of', [OrderController::class, 'search']);

Route::get('/o', function () { return view('addorder'); });

Route::post('/o', [OrderController::class, 'add']);

Route::get('/o{id}', [OrderController::class, 'show']);

Route::post('/o{id}', [OrderController::class, 'edit']);

Route::get('/os{id}', [OrderController::class, 'delete']);
