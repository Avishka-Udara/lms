<?php

use App\Http\Controllers\allcourcesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CourceController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\AssignmentController;

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
Route::resource('/allcources', allcourcesController::class);
Route::get('/allcources/{cource}/show', [allcourcesController::class, 'show'])->name('allcources.cource.show');


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

Route::resource('cources', courceController::class);

//Route::resource('cources/{cource}/materials', CourseMaterialController::class);

// Routes for cource materials
Route::get('/cources/{cource}/materials', [CourseMaterialController::class, 'index'])->name('cources.materials.index');
Route::get('/cources/{cource}/materials/create', [CourseMaterialController::class, 'create'])->name('cources.materials.create');
Route::post('/cources/{cource}/materials', [CourseMaterialController::class, 'store'])->name('cources.materials.store');
Route::get('/cources/{cource}/materials/{material}', [CourseMaterialController::class, 'show'])->name('cources.materials.show');
Route::get('/cources/{cource}/materials/edit/{material}', [CourseMaterialController::class, 'edit'])->name('cources.materials.edit');
Route::put('/cources/{cource}/materials/{material}', [App\Http\Controllers\CourseMaterialController::class, 'update'])->name('cources.materials.update');
Route::delete('/cources/{cource}/materials/{material}', [CourseMaterialController::class, 'destroy'])->name('cources.materials.destroy');


//cource enrollment 
Route::post('/cources/{cource}/enroll', [CourceController::class, 'enroll'])->name('cources.enroll');



Route::get('faq', function () {
    return view('welcome.faq');
});
Route::get('about1', function () {
    return view('welcome.about1');
});
Route::get('about2', function () {
    return view('welcome.about2');
});

