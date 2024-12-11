<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;

Route::get('/', function () {
    return view('main-page');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::post('/signin', [UserController::class, 'login']);

Route::post('/signup', [UserController::class], 'register');

Route::post('/blog', function () {
    return view('blogs');
});

Route::post('/blog/{slug}', function ($slug) {
    return 'ini blogs page';
});

Route::get('/category/{slug}', function ($slug) {
    $category = request()->query('category', 'general');
    return 'ini category page, kategori: ' . $category;
});

Route::get('/author/{username}', function () {
    return 'author page';
});

Route::get('/privacy-policy', function () {
    return 'akebijakan privasi';
});

Route::get('/profile', function () {
    return view('profile');
})->middleware(AuthMiddleware::class);

