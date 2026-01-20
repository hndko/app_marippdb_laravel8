<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// NOTE: Landing Page Route - Public access
Route::get('/', [App\Http\Controllers\Frontend\LandingController::class, 'index'])->name('landing');

// NOTE: Authentication Routes - Provided by UI scaffolding
Auth::routes();

// NOTE: Dashboard Route - Authenticated users
Route::get('/home', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('home');

// Middleware Group for Authenticated Users
Route::middleware(['auth'])->group(function () {

    // --- Student Management Routes (Admin & Operator) ---
    Route::middleware(['role:admin,operator'])->prefix('students')->name('students.')->group(function () {
        // NOTE: Display list of students
        Route::get('/', [App\Http\Controllers\Backend\StudentController::class, 'index'])->name('index');

        // NOTE: Show form to create new student
        Route::get('/create', [App\Http\Controllers\Backend\StudentController::class, 'create'])->name('create');

        // NOTE: Store new student data
        Route::post('/', [App\Http\Controllers\Backend\StudentController::class, 'store'])->name('store');

        // NOTE: Show specific student details
        Route::get('/{id}', [App\Http\Controllers\Backend\StudentController::class, 'show'])->name('show');

        // NOTE: Show form to edit student data
        Route::get('/{id}/edit', [App\Http\Controllers\Backend\StudentController::class, 'edit'])->name('edit');

        // NOTE: Update student data
        Route::put('/{id}', [App\Http\Controllers\Backend\StudentController::class, 'update'])->name('update');

        // NOTE: Delete student data
        Route::delete('/{id}', [App\Http\Controllers\Backend\StudentController::class, 'destroy'])->name('destroy');

        // NOTE: Verify student status (Admin/Operator only)
        Route::post('/{id}/verify', [App\Http\Controllers\Backend\StudentController::class, 'verify'])->name('verify');
    });

    // --- Verification Routes (Admin & Operator) ---
    Route::middleware(['role:admin,operator'])->prefix('verification')->name('verification.')->group(function () {
        // NOTE: Display list of students needing verification
        Route::get('/', [App\Http\Controllers\Backend\ValidationController::class, 'index'])->name('index');
    });

    // --- Settings Routes (Admin Only) ---
    Route::middleware(['role:admin'])->prefix('settings')->name('settings.')->group(function () {
        // NOTE: Display settings page
        Route::get('/', [App\Http\Controllers\Backend\SettingController::class, 'index'])->name('index');

        // NOTE: Update settings
        Route::post('/', [App\Http\Controllers\Backend\SettingController::class, 'update'])->name('update');
    });

    // --- Registration Routes (Student Only) ---
    Route::prefix('registration')->name('registration.')->group(function () {
        // NOTE: Display registration form for logged-in student
        Route::get('/', [App\Http\Controllers\Frontend\RegistrationController::class, 'index'])->name('index');

        // NOTE: Store registration data
        Route::post('/', [App\Http\Controllers\Frontend\RegistrationController::class, 'store'])->name('store');
    });

    // --- Graduation Result Routes (Student Only) ---
    Route::prefix('graduation')->name('graduation.')->group(function () {
        // NOTE: Display graduation announcement/result
        Route::get('/', [App\Http\Controllers\Frontend\ResultController::class, 'index'])->name('index');
    });

    // --- Announcement Routes (Admin & Operator? - Assuming Admin/Operator manages them) ---
    // Using simple auth middleware for now, or consider adding role middleware if needed
    Route::prefix('announcements')->name('announcements.')->group(function () {
        // NOTE: Display list of announcements
        Route::get('/', [App\Http\Controllers\Backend\AnnouncementController::class, 'index'])->name('index');

        // NOTE: Show form to create new announcement
        Route::get('/create', [App\Http\Controllers\Backend\AnnouncementController::class, 'create'])->name('create');

        // NOTE: Store new announcement
        Route::post('/', [App\Http\Controllers\Backend\AnnouncementController::class, 'store'])->name('store');

        // NOTE: Show form to edit announcement
        Route::get('/{id}/edit', [App\Http\Controllers\Backend\AnnouncementController::class, 'edit'])->name('edit');

        // NOTE: Update announcement
        Route::put('/{id}', [App\Http\Controllers\Backend\AnnouncementController::class, 'update'])->name('update');

        // NOTE: Delete announcement
        Route::delete('/{id}', [App\Http\Controllers\Backend\AnnouncementController::class, 'destroy'])->name('destroy');
    });

    // --- Profile Routes ---
    Route::prefix('profile')->name('profile.')->group(function () {
        // NOTE: Show profile edit form
        Route::get('/', [App\Http\Controllers\Backend\ProfileController::class, 'edit'])->name('edit');

        // NOTE: Update profile info
        Route::put('/', [App\Http\Controllers\Backend\ProfileController::class, 'update'])->name('update');
    });
});
