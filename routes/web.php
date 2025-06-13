<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('home');
})->name("home-page");

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
    return view('login');
})->name("login");


//dashboard
Route::get('/register', function () {
    return view('register');
})->name("register");


//Post route example
Route::post("/submit", function(Request $request){
   $username = $request->input("username");
   return $username;
})->name("Serendipity-submit");




//Post route example
Route::post("/register", function(Request $request){

    $request->validate([
        'username' => 'required|min:3|max:30',
        'email' => 'required|min:3|max:30|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $username = "@".$request->input("username");
    $fullname = $request->input("full_name");
    $email = $request->input("email");
    $password = $request->input("password");
    $confirm_password = $request->input("password_confirmation");

    return "your full name is $username";
 })->name("register-submit");
 