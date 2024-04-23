<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// TEMP CODE. TODO: Move this to a new controller
Route::get('/persediaan', [App\Http\Controllers\HomeController::class, 'persediaan'])->name('persediaan');
Route::get('/mitigasi', [App\Http\Controllers\HomeController::class, 'mitigasi'])->name('mitigasi');
Route::get('/rantai', [App\Http\Controllers\HomeController::class, 'rantai'])->name('rantai');
Route::get('/mutu', [App\Http\Controllers\HomeController::class, 'mutu'])->name('mutu');
