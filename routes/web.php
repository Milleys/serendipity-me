<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterUser;
use App\Http\Controllers\LoginUser;

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home-page');

//named routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->name("dashboard-page");



//named routes
Route::get('/contactus', function () {
    return view('contactus');
})->name("contactus-page");



//dashboard
Route::get('/login', function () {
    return view('dashboard');
})->name("login");


//dashboard
Route::get('/register', function () {
    return view('register');
})->name("register");

//dashboard
Route::get('/complete-profile', function () {
    return view('complete-profile');
})->name("complete-profile");



//Post route example
Route::post("/submit", function(Request $request){
   $username = $request->input("username");
   return $username;
})->name("Serendipity-submit");




Route::post('/register-submit', [RegisterUser::class, 'store'])->name('register-submit');
Route::post('/login', [LoginUser::class, 'authenticate'])->name('login-user');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/dashboard');
})->name('logout');