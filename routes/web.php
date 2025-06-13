<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

//named routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->name("dashboard-page");


//grouped routes

