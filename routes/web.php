<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/doctors', [HomeController::class, 'doctors'])->name('doctors');

#region Patients

use App\Http\Controllers\Patient\PatientLoginController;
use App\Http\Controllers\Patient\PatientProfileController;
use App\Http\Controllers\Patient\PatientQueryController;
use App\Http\Controllers\Patient\PatientAppointmentController;

Route::prefix('patient')->name('patient.')->group(function () {
    Route::post('/query', [PatientQueryController::class, 'query'])->name('query');
    Route::middleware('guest:patient')->group(function () {
        Route::get('/', function () {
            return redirect()->route('home');
        });
        Route::controller(PatientLoginController::class)->group(function () {
            Route::get('/login', 'index')->name('login');
            Route::post('/login', 'login')->name('login');
            Route::post('/signup', 'signup')->name('signup');
        });
    });

    Route::middleware('auth:patient')->group(function () {
        Route::get('/logout', [PatientLoginController::class, 'logout'])->name('logout');
        Route::get('/profile', [PatientProfileController::class, 'index'])->name('profile');
        Route::post('/profile', [PatientProfileController::class, 'update'])->name('profile');
        Route::prefix('appointment')->name('appointment.')->group(function () {
            Route::get('/doctor-info/{id?}', [PatientAppointmentController::class, 'doctorInfo'])->name('doctor-info');
            Route::post('/create', [PatientAppointmentController::class, 'create'])->name('create');
            Route::post('/cancel', [PatientAppointmentController::class, 'cancel'])->name('cancel');
        });
    });
});

#endregion

#region Doctor

use App\Http\Controllers\Doctor\DoctorAuthController;
use App\Http\Controllers\Doctor\DoctorDashboardController;
use App\Http\Controllers\Doctor\DoctorProfileController;
use App\Http\Controllers\Doctor\DoctorOfficeController;
use App\Http\Controllers\Doctor\DoctorAvailabilityController;
use App\Http\Controllers\Doctor\DoctorAppointmentController;

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

    Route::middleware('auth:doctor')->group(function () {
        Route::get('/logout', [DoctorAuthController::class, 'logout'])->name('logout');
        Route::get('/profile', [DoctorProfileController::class, 'index'])->name('profile');
        Route::post('/profile', [DoctorProfileController::class, 'update'])->name('profile');
        Route::get('/change-password', [DoctorProfileController::class, 'showChangePassword'])->name('change-password');
        Route::post('/change-password', [DoctorProfileController::class, 'updatePassword'])->name('change-password');
        Route::get('/dashboard', [DoctorDashboardController::class, 'index'])->name('dashboard');

        Route::resource('offices', DoctorOfficeController::class);
        Route::resource('availabilities', DoctorAvailabilityController::class);

        Route::controller(DoctorAppointmentController::class)->prefix('appointments')->name('appointments.')->group(function () {
            Route::get('/pending', 'pending')->name('pending');
            Route::get('/approved', 'approved')->name('approved');
            Route::get('/completed', 'completed')->name('completed');
            Route::get('/canceled', 'canceled')->name('canceled');
            Route::get('/detail/{id?}', 'detail')->name('detail');
            Route::post('/change-status', 'changeStatus')->name('changeStatus');
        });
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
use App\Http\Controllers\Admin\AdminAppointmentController;
use App\Http\Controllers\Admin\AdminQueryController;

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
        Route::get('/doctors/{doctor}/edit', [AdminDoctorController::class, 'edit'])->name('doctors.edit');
        Route::put('/doctors/{doctor}/update', [AdminDoctorController::class, 'update'])->name('doctors.update');
        Route::get('/patients', [AdminPatientController::class, 'index'])->name('patients');
        Route::get('/patients/{patient}/edit', [AdminPatientController::class, 'edit'])->name('patients.edit');
        Route::put('/patients/{patient}/update', [AdminPatientController::class, 'update'])->name('patients.update');

        Route::resource('specializations', AdminSpecializationController::class);
        Route::resource('queries', AdminQueryController::class);

        Route::controller(AdminAppointmentController::class)->prefix('appointments')->name('appointments.')->group(function () {
            Route::get('/pending', 'pending')->name('pending');
            Route::get('/approved', 'approved')->name('approved');
            Route::get('/completed', 'completed')->name('completed');
            Route::get('/canceled', 'canceled')->name('canceled');
            Route::get('/detail/{id?}', 'detail')->name('detail');
            Route::post('/change-status', 'changeStatus')->name('changeStatus');
        });
    });
});

#endregion