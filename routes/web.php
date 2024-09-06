<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about-us', function(){
    return view('about');
})->name('about');

Route::get('/postsss', function(){
    return view('post');
})->name('post');

// Redirect route
Route::redirect('/test', 'about-us'); // can also give status code as a 3rd param, to specify whether redirection is temporary or permanent...

// Group routes
Route::prefix('page')->group(function(){
    Route::get('/one', function(){
        return view('page-one');
    })->name('page-one');

    Route::get('/two', function(){
        return view('page-two');
    })->name('page-two');

    Route::get('/three', function(){
        return view('page-three');
    })->name('page-three');
});

// If page not exists on the server, then instead of showing default 404 msg from laravel we can create custom pages
Route::fallback(function(){
    return "Page not found";
});