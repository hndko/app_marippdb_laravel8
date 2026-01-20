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

// NOTE: Landing Page Routes - Public access
Route::get('/', [App\Http\Controllers\Frontend\LandingController::class, 'index'])->name('landing');
Route::get('/layanan', [App\Http\Controllers\Frontend\LandingController::class, 'services'])->name('landing.services');
Route::get('/fitur', [App\Http\Controllers\Frontend\LandingController::class, 'features'])->name('landing.features');
Route::get('/jadwal', [App\Http\Controllers\Frontend\LandingController::class, 'schedules'])->name('landing.schedules');
Route::get('/kontak', [App\Http\Controllers\Frontend\LandingController::class, 'contact'])->name('landing.contact');
Route::get('/tim', [App\Http\Controllers\Frontend\LandingController::class, 'team'])->name('landing.team');
Route::get('/testimoni', [App\Http\Controllers\Frontend\LandingController::class, 'testimonials'])->name('landing.testimonials');

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

    // --- Features Routes (Admin Only) ---
    Route::middleware(['role:admin'])->prefix('features')->name('features.')->group(function () {
        // NOTE: Display list of features
        Route::get('/', [App\Http\Controllers\Backend\FeatureController::class, 'index'])->name('index');

        // NOTE: Show form to create new feature
        Route::get('/create', [App\Http\Controllers\Backend\FeatureController::class, 'create'])->name('create');

        // NOTE: Store new feature
        Route::post('/', [App\Http\Controllers\Backend\FeatureController::class, 'store'])->name('store');

        // NOTE: Show form to edit feature
        Route::get('/{id}/edit', [App\Http\Controllers\Backend\FeatureController::class, 'edit'])->name('edit');

        // NOTE: Update feature
        Route::put('/{id}', [App\Http\Controllers\Backend\FeatureController::class, 'update'])->name('update');

        // NOTE: Delete feature
        Route::delete('/{id}', [App\Http\Controllers\Backend\FeatureController::class, 'destroy'])->name('destroy');
    });

    // --- Services Routes (Admin Only) ---
    Route::middleware(['role:admin'])->prefix('services')->name('services.')->group(function () {
        // NOTE: Display list of services
        Route::get('/', [App\Http\Controllers\Backend\ServiceController::class, 'index'])->name('index');

        // NOTE: Show form to create new service
        Route::get('/create', [App\Http\Controllers\Backend\ServiceController::class, 'create'])->name('create');

        // NOTE: Store new service
        Route::post('/', [App\Http\Controllers\Backend\ServiceController::class, 'store'])->name('store');

        // NOTE: Show form to edit service
        Route::get('/{id}/edit', [App\Http\Controllers\Backend\ServiceController::class, 'edit'])->name('edit');

        // NOTE: Update service
        Route::put('/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'update'])->name('update');

        // NOTE: Delete service
        Route::delete('/{id}', [App\Http\Controllers\Backend\ServiceController::class, 'destroy'])->name('destroy');
    });

    // --- Testimonials Routes (Admin Only) ---
    Route::middleware(['role:admin'])->prefix('testimonials')->name('testimonials.')->group(function () {
        // NOTE: Display list of testimonials
        Route::get('/', [App\Http\Controllers\Backend\TestimonialController::class, 'index'])->name('index');

        // NOTE: Show form to create new testimonial
        Route::get('/create', [App\Http\Controllers\Backend\TestimonialController::class, 'create'])->name('create');

        // NOTE: Store new testimonial
        Route::post('/', [App\Http\Controllers\Backend\TestimonialController::class, 'store'])->name('store');

        // NOTE: Show form to edit testimonial
        Route::get('/{id}/edit', [App\Http\Controllers\Backend\TestimonialController::class, 'edit'])->name('edit');

        // NOTE: Update testimonial
        Route::put('/{id}', [App\Http\Controllers\Backend\TestimonialController::class, 'update'])->name('update');

        // NOTE: Delete testimonial
        Route::delete('/{id}', [App\Http\Controllers\Backend\TestimonialController::class, 'destroy'])->name('destroy');
    });

    // --- Profile Routes ---
    Route::prefix('profile')->name('profile.')->group(function () {
        // NOTE: Show profile edit form
        Route::get('/', [App\Http\Controllers\Backend\ProfileController::class, 'edit'])->name('edit');

        // NOTE: Update profile info
        Route::put('/', [App\Http\Controllers\Backend\ProfileController::class, 'update'])->name('update');
    });
});
