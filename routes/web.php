<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/report', function () {
    return view('report');
});

Route::get('/chatgpt', function () {
    return view('chatgpt');
});

Route::get('/claude', function () {
    return view('claude');
});

Route::get('/belajar-php', [App\Http\Controllers\BelajarPHPController::class, 'index']);
