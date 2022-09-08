<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/flowers', [FlowerController::class, 'index']);
Route::get('/flowers/details/{id}', [FlowerController::class, 'show']);
// Insert :
Route::get('/flowers/insert', [FlowerController::class, 'create'])->middleware('isLoggedIn');
Route::post('/flowers/insert', [FlowerController::class, 'store'])->middleware('isLoggedIn');

// Update : 
Route::get('/flowers/update/{id}', [FlowerController::class, 'edit'])->middleware('isLoggedIn');;
Route::put('/flowers/update/{id}', [FlowerController::class, 'update'])->middleware('isLoggedIn');;

Route::get('/flowers/delete/{id}', [FlowerController::class, 'destroy'])->middleware('isLoggedIn');;

// Display all comments
Route::get('/comments', [CommentController::class, 'index']);


Route::get('/contact', function () {
    return view('contact');
});

// Login
Route::get('/login', [UserController::class, 'loginForm']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/logout', [UserController::class, 'logout']);
