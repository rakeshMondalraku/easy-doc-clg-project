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

