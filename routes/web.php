<?php

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
    return view('frontend.welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('students', App\Http\Controllers\StudentController::class)->middleware('room:admin,operator'); // Middleware to be refined later if needed, for now just keeping it under auth but logically should be admin/operator

    // Registration Routes (for Students)
    Route::get('/registration', [App\Http\Controllers\RegistrationController::class, 'index'])->name('registration.index');
    Route::post('/registration', [App\Http\Controllers\RegistrationController::class, 'store'])->name('registration.store');
});
