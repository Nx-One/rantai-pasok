<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// TEMP CODE. TODO: Move this to a new controller
Route::get('/persediaan', [App\Http\Controllers\PersediaanController::class, 'index'])->name('persediaan');
Route::get('/persediaan/history', [App\Http\Controllers\PersediaanController::class, 'history'])->name('historyPersediaan');
Route::get('/mitigasi', [App\Http\Controllers\MitigasiController::class, 'index'])->name('mitigasi');
Route::get('/mitigasi/hor2', [App\Http\Controllers\MitigasiController::class, 'hor2'])->name('horMitigasi');
Route::get('/rantai', [App\Http\Controllers\RantaiController::class, 'index'])->name('rantai');
Route::get('/rantai/form', [App\Http\Controllers\RantaiController::class, 'form'])->name('formRantai');
Route::get('/mutu', [App\Http\Controllers\MutuController::class, 'index'])->name('mutu');
