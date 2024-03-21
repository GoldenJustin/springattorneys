<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('home', function () {
    return view('homepage');
});


Route::get('about', function () {
    return view('about');
});

Route::get('service', function () {
    return view('services');
});

Route::get('team', function () {
    return view('team');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('acceptable-use', function () {
    return view('acceptable-use');
});


Route::get('gallery', function () {
    return view('gallery');
});