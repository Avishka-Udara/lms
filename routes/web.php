<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\NewsController;
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

Route::resource('/', WelcomeController::class);
Route::resource('news', NewsController::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
});

Route::get('/home',[HomeController::class,'home']);

Route::resource('User', UserController::class);

Route::resource('posts', PostController::class);

Route::get('faq', function () {
    return view('welcome.faq');
});
Route::get('about1', function () {
    return view('welcome.about1');
});
Route::get('about2', function () {
    return view('welcome.about2');
});


