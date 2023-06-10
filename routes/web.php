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
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TimetablesController;

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


//timetable
Route::get('/timetables',[TimetablesController::class, 'index'])->name('timetables.index');
Route::get('/timetables/create', [TimetablesController::class, 'create'])->name('timetables.create');
Route::post('/timetables', [TimetablesController::class, 'store'])->name('timetables.store');
Route::get('/timetables/{timetable}', [TimetablesController::class, 'show'])->name('timetables.show');
Route::get('/timetables/{timetable}/edit', [TimetablesController::class, 'edit'])->name('timetables.edit');
Route::put('/timetables/{timetable}', [TimetablesController::class, 'update'])->name('timetables.update');
Route::delete('/timetables/{timetable}', [TimetablesController::class, 'destroy'])->name('timetables.destroy');




Route::get('faq', function () {
    return view('welcome.faq');
});
Route::get('about1', function () {
    return view('welcome.about1');
});
Route::get('about2', function () {
    return view('welcome.about2');
});



//assignment

Route::middleware('auth')->group(function () {
    Route::get('/cources/{cource}/assignments', [AssignmentController::class, 'index'])->name('cources.assignments.index');
    Route::get('/cources/{cource}/assignments/create', [AssignmentController::class, 'create'])->name('cources.assignments.create');
    Route::post('/cources/{cource}/assignments', [AssignmentController::class, 'store'])->name('cources.assignments.store');
    Route::get('/cources/{cource}/assignments/{assignment}', [AssignmentController::class, 'show'])->name('cources.assignments.show');
    Route::get('/cources/{cource}/assignments/edit/{assignment}', [AssignmentController::class, 'edit'])->name('cources.assignments.edit');
    Route::put('/cources/{cource}/assignments/{assignment}', [AssignmentController::class, 'update'])->name('cources.assignments.update');
    Route::delete('/cources/{cource}/assignments/{assignment}', [AssignmentController::class, 'destroy'])->name('cources.assignments.destroy');
    
});

//submission

Route::get('/cources/{cource}/assignments/{assignment}/submissions', [SubmissionController::class, 'index'])->name('cources.assignments.submission.index');
Route::get('/cources/{cource}/assignments/{assignment}/submissions/create', [SubmissionController::class, 'create'])->name('cources.assignments.submission.create');
Route::post('/cources/{cource}/assignments/{assignment}/submissions', [SubmissionController::class, 'store'])->name('cources.assignments.submission.store');
Route::get('/cources/{cource}/assignments/{assignment}/submissions/{submission}', [SubmissionController::class, 'show'])->name('cources.assignments.submission.show');
Route::get('/cources/{cource}/assignments/{assignment}/submissions/edit/{submission}', [SubmissionController::class, 'edit'])->name('cources.assignments.submission.edit');
Route::put('/cources/{cource}/assignments/{assignment}/submissions/{submission}', [SubmissionController::class, 'update'])->name('cources.assignments.submission.update');
Route::delete('/cources/{cource}/assignments/{assignment}/submissions/{submission}', [SubmissionController::class, 'destroy'])->name('cources.assignments.submission.destroy');

