<?php

use Illuminate\Support\Facades\Route;

#region Patients

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/profile', function () {
    return view('profile');
});

#endregion

#region Doctor

use App\Http\Controllers\Doctor\DoctorAuthController;
use App\Http\Controllers\Doctor\DoctorDashboardController;
use App\Http\Controllers\Doctor\DoctorProfileController;

Route::prefix('doctor')->name('doctor.')->group(function () {
    Route::middleware('guest:doctor')->group(function () {
        Route::get('/', function () {
            return redirect()->route('doctor.login');
        });
        Route::controller(DoctorAuthController::class)->group(function () {
            Route::get('/login', 'index')->name('login');
            Route::post('/login', 'login')->name('login');
            Route::get('/signup', 'showSignupForm')->name('signup');
            Route::post('/signup', 'signup')->name('signup');
        });
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/logout', [DoctorAuthController::class, 'logout'])->name('logout');
        Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
        Route::post('/profile', [AdminProfileController::class, 'update'])->name('profile');
        Route::get('/change-password', [AdminProfileController::class, 'showChangePassword'])->name('change-password');
        Route::post('/change-password', [AdminProfileController::class, 'updatePassword'])->name('change-password');
        Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');
    });
});

#endregion

#region Admin

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminPatientController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSpecializationController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.login');
        });
        Route::controller(AdminLoginController::class)->group(function () {
            Route::get('/login', 'index')->name('login');
            Route::post('/login', 'login')->name('login');
        });
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout');
        Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
        Route::post('/profile', [AdminProfileController::class, 'update'])->name('profile');
        Route::get('/change-password', [AdminProfileController::class, 'showChangePassword'])->name('change-password');
        Route::post('/change-password', [AdminProfileController::class, 'updatePassword'])->name('change-password');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/doctors', [AdminDoctorController::class, 'index'])->name('doctors');
        Route::get('/patients', [AdminPatientController::class, 'index'])->name('patients');
        Route::get('/patients', [AdminPatientController::class, 'index'])->name('patients');

        Route::resource('specializations', AdminSpecializationController::class);
    });
});

#endregion