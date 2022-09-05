<?php

use App\Http\Controllers\FlowerController;
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
// Insert :
Route::get('/flowers/insert', [FlowerController::class, 'create']);
Route::post('/flowers/insert', [FlowerController::class, 'store']);

// Update : 

Route::get('/flowers/update/{id}', [FlowerController::class, 'edit']);
Route::put('/flowers/update/{id}', [FlowerController::class, 'update']);

Route::get('/flowers/delete/{id}', [FlowerController::class, 'destroy']);
