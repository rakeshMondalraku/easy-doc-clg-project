<?php

use App\Http\Controllers\Admin\AdminSpecializationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DoctorLoginController;
use App\Http\Controllers\DoctorSignupController;
use App\Http\Controllers\PatientLoginController;
use App\Http\Controllers\PatientProfileController;

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


Route::prefix('patient')->name('patient.')->group(function () {
    Route::middleware('guest:patient')->group(function () {
        Route::get('/', function () {
            return redirect()->route('home');
        });
        Route::controller(PatientLoginController::class)->group(function () {
            Route::get('/login', 'index')->name('login');
            Route::post('/login', 'login')->name('login');
        });
    });

    Route::middleware('auth:patient')->group(function () {
        Route::get('/logout', [PatientLoginController::class, 'logout'])->name('logout');
        Route::get('/profile', [PatientProfileController::class, 'index'])->name('profile');
        Route::post('/profile', [PatientProfileController::class, 'update'])->name('profile');
    });
});

#endregion

#region Doctors

Route::get('/doctors', function () {
    return view('doctors');
});
Route::get('/doctors/login', function () {
    return view('doctors.login');
});
Route::get('/doctors/welcome', function () {
    return view('doctors.welcome');
});
Route::get('/doctors/appointments', function () {
    return view('doctors.appointments');
});
Route::get('/doctors/approved_appointments', function () {
    return view('doctors.approved_appointments');
});
Route::get('/doctors/profile', function () {
    return view('doctors.profile');
});
Route::prefix('doctor')->name('doctor.')->group(function () {
    Route::post('/signup', [DoctorSignupController::class, 'signup'])->name('signup');
});

#endregion


#region Doctor

Route::prefix('doctor')->name('doctor.')->group(function () {
    Route::middleware('guest:doctor')->group(function () {
        Route::get('/', function () {
            return redirect()->route('doctor.login');
        });
        Route::controller(DoctorLoginController::class)->group(function () {
            Route::get('/login', 'index')->name('login');
            Route::post('/login', 'login')->name('login');
        });
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/logout', [DoctorLoginController::class, 'logout'])->name('logout');
    });
});

#endregion

#region Admin

use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDoctorController;
use App\Http\Controllers\Admin\AdminPatientController;
use App\Http\Controllers\Admin\AdminProfileController;

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