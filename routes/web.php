<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\FlowerController;
use App\Http\Controllers\CommentController;
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

Route::get('/', function () {
    return view('home');
})->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


// API Routes
Route::get('/api/flowers', [ApiController::class, 'index']);
Route::get('/api/flowers/lp={num1}&hp={num2}', [ApiController::class, 'fetchPrice']);

Route::get('/read-api', function () {
    $response = Http::withOptions(["verify" => false])->get('https://swapi.dev/api/people/?format=json');

    dd($response->body());
});

// Upload a file :
Route::get('/upload-file', [FlowerController::class, 'upload_file']);
Route::post('/upload-file', [FlowerController::class, 'upload_file_submit']);

// Use AJAX with Laravel
Route::get('/ajax-form', [UserController::class, 'ajax_form']);
Route::post('/get-users', [UserController::class, 'index'])->name('users');
