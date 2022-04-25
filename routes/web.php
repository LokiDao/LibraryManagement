<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/u', function () { return view('adduser'); });

Route::post('/u', [UserController::class, 'add']);

Route::get('/u{id}', [UserController::class, 'show']);

Route::post('/u{id}', [UserController::class, 'edit']);

Route::get('/us{id}', [UserController::class, 'delete']);
