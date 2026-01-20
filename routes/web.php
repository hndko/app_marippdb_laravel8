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

Route::get('/', [App\Http\Controllers\Frontend\LandingController::class, 'index'])->name('landing');

Auth::routes();

Route::get('/home', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('students', App\Http\Controllers\Backend\StudentController::class)->middleware('role:admin,operator');
    Route::get('/verification', [App\Http\Controllers\Backend\ValidationController::class, 'index'])->name('verification.index')->middleware('role:admin,operator');

    // Settings Routes
    Route::get('/settings', [App\Http\Controllers\Backend\SettingController::class, 'index'])->name('settings.index')->middleware('role:admin');
    Route::post('/settings', [App\Http\Controllers\Backend\SettingController::class, 'update'])->name('settings.update')->middleware('role:admin');

    Route::post('/students/{student}/verify', [App\Http\Controllers\Backend\StudentController::class, 'verify'])->name('students.verify')->middleware('role:admin,operator');

    // Registration Routes (for Students)
    Route::get('/registration', [App\Http\Controllers\Frontend\RegistrationController::class, 'index'])->name('registration.index');
    Route::post('/registration', [App\Http\Controllers\Frontend\RegistrationController::class, 'store'])->name('registration.store');

    // Announcement Route (News - Admin Managed)
    Route::resource('announcements', App\Http\Controllers\Backend\AnnouncementController::class);

    // Graduation Result Route (for Students)
    Route::get('/graduation', [App\Http\Controllers\Frontend\ResultController::class, 'index'])->name('graduation.index');

    // Profile Routes
    Route::get('/profile', [App\Http\Controllers\Backend\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\Backend\ProfileController::class, 'update'])->name('profile.update');
});
