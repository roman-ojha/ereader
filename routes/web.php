<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
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
    dd("Welcome");
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login']);
Route::get('/categories', [CategoryController::class, 'get']);

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});
