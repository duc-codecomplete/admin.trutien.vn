<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\IsAdmin;

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

Route::get('/dang-nhap', [HomeController::class, 'signin'])->name("login");

Route::post('/dang-nhap', [HomeController::class, 'signinPost']);


Route::group(["middleware" => "auth"], function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::get('/logout', function() {
		Auth::logout();
		return redirect("/dang-nhap");
	});
	Route::get('/users', [HomeController::class, 'users']);
	Route::group(["prefix" => "promotions"], function () {
		Route::get('/', [HomeController::class, 'promotions']);
		Route::get('/add', [HomeController::class, 'promotionsAddGet']);
		Route::post('/add', [HomeController::class, 'promotionsAddPost']);
	});

	Route::group(["prefix" => "giftcodes"], function () {
		Route::get('/', [HomeController::class, 'giftcodes']);
		Route::get('/add', [HomeController::class, 'giftcodesAddGet']);
		Route::post('/add', [HomeController::class, 'giftcodesAddPost']);
	});

	Route::group(["prefix" => "shops"], function () {
		Route::get('/', [HomeController::class, 'shops']);
		Route::get('/add', [HomeController::class, 'shopsAddGet']);
		Route::post('/add', [HomeController::class, 'shopsAddPost']);
	});

	Route::group(["prefix" => "posts"], function () {
		Route::get('/', [HomeController::class, 'posts']);
		Route::get('/add', [HomeController::class, 'postsAddGet']);
		Route::post('/add', [HomeController::class, 'postsAddPost']);
		Route::get('/{id}/edit', [HomeController::class, 'postsEditGet']);
		Route::post('/{id}/edit', [HomeController::class, 'postsEditPost']);
		Route::get('/{id}/delete', [HomeController::class, 'postsDeleteGet']);
	});

	Route::group(["prefix" => "deposits"], function () {
		Route::get('/', [HomeController::class, 'deposits']);
		Route::get('/add', [HomeController::class, 'depositsProcess']);
		Route::get('/{id}/approve', [HomeController::class, 'depositsApprove']);
	});
});


