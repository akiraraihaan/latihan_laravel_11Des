<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main-page');
});

Route::get('/signin', function () {
    return 'ini sign in page';
});

Route::get('/signup', function () {
    return 'ini sign up page';
});

Route::post('/signin', function () {
    return 'ini sign in page';
});

Route::post('/signup', function () {
    return 'ini sign up page';
});

Route::post('/blog', function () {
    return 'ini blogs page';
});

Route::post('/blog/{slug}', function ($slug) {
    return 'ini blogs page';
});

Route::get('/category/{slug}', function ($slug) {
    $category = request()->query('category', 'general');
    return 'ini category page, kategori: ' . $category;
});

Route::get('/author/{username}', function ($username) {
    return 'author page';
});

Route::get('/privacy-policy', function ($username) {
    return 'akebijakan privasi';
});


