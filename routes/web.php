<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
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
Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('home', [App\Http\Controllers\PostController::class, 'index'])->name('homepage');


Route::get('gallery', [ImageController::class, 'gallery'])->name('gallery.image');


Route::controller(AuthController::class)->group(function () {
    Route::get('auth/login', 'login')->name('login');
    Route::post('auth/login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {

    Route::controller(PostController::class)->prefix('post')->group(function () {
        Route::get('', 'create')->name('create');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
    });

    Route::post('/upload', [ImageController::class, 'upload'])->name('store.image');
    Route::get('/upload/image', [ImageController::class, 'create'])->name('create.image');
    // Route::get('indeximage', [ImageController::class, 'index'])->name('index.image');

    Route::get('dashboard', [App\Http\Controllers\AuthController::class, 'dashboard'])->name('dashboard');

    Route::delete('posts/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{id}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
    Route::delete('/images/{id}', [ImageController::class, 'destroy'])->name('images.destroy');

    // Route::post('/images/upload', [ImageController::class, 'upload'])->name('admin.images.upload');
});
