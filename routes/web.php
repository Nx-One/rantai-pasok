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
Route::get('/mitigasi/hor1', [App\Http\Controllers\MitigasiController::class, 'hor1'])->name('hor1Mitigasi');
Route::get('/mitigasi/hor1/connection', [App\Http\Controllers\MitigasiController::class, 'hor1Connection'])->name('hor1Connection');
Route::get('/mitigasi/hor1/result', [App\Http\Controllers\MitigasiController::class, 'hor1Result'])->name('hor1Result');
Route::get('/mitigasi/hor2', [App\Http\Controllers\MitigasiController::class, 'hor2'])->name('hor2Mitigasi');
Route::get('/mitigasi/hor2/connection', [App\Http\Controllers\MitigasiController::class, 'hor2Connection'])->name('hor2Connection');
Route::get('/mitigasi/hor2/result', [App\Http\Controllers\MitigasiController::class, 'hor2Result'])->name('hor2Result');
Route::get('/rantai', [App\Http\Controllers\RantaiController::class, 'index'])->name('rantai');
Route::get('/rantai/form', [App\Http\Controllers\RantaiController::class, 'form'])->name('formRantai');
Route::get('/mutu', [App\Http\Controllers\MutuController::class, 'index'])->name('mutu');
