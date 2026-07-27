<?php

use Illuminate\Support\Facades\Route;

// Splash screen — this is now the entry point
Route::get('/', function () {
    return view('splash');
})->name('splash');

// Actual home page — now lives at /home
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');