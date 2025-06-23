<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterUser;
use App\Http\Controllers\LoginUser;
use App\Http\Controllers\SerendipityController;



//get routes
Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/home');
    }
    return view('dashboard');
})->name('dashboard-page');

//named routes
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name("home-page");



//named routes
Route::get('/contactus', function () {
    return view('contactus');
})->name("contactus-page");


Route::middleware('guest')->group(function() {
    //dashboard
    Route::get('/login', function () {
        return view('dashboard');
    })->name("login");

    
    //dashboard
    Route::get('/register', function () {
        return view('register');
    })->name("register");

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard-page');

});




//dashboard
Route::get('/complete-profile', function () {
    return view('complete-profile');
})->name("complete-profile");


//to profile
Route::get('/profile', [SerendipityController::class, 'show'])->name('profile')->middleware('auth');



//post routes

//My Serendipity Button
Route::post('/serendipity-submit', [SerendipityController::class, 'fetchActivity'])->name('Serendipity-submit');
Route::post('/register-submit', [RegisterUser::class, 'store'])->name('register-submit');
Route::post('/login', [LoginUser::class, 'authenticate'])->name('login-user');

//add serentipity to account
Route::post('/save-serendipity', [SerendipityController::class, 'save'])
    ->name('serendipity.save')
    ->middleware('auth');

//update serendipity
Route::put('/serendipities/{id}', [SerendipityController::class, 'update'])->name('serendipities.update');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');