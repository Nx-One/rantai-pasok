<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/persediaan', [App\Http\Controllers\PersediaanController::class, 'index'])->name('persediaan');
Route::post('/persediaan/store', [App\Http\Controllers\PersediaanController::class, 'store'])->name('storePersediaan');
Route::get('/persediaan/edit/{id}', [App\Http\Controllers\PersediaanController::class, 'edit'])->name('editPersediaan');
Route::put('/persediaan/update/{id}', [App\Http\Controllers\PersediaanController::class, 'update'])->name('updatePersediaan');
Route::delete('/persediaan/delete/{id}', [App\Http\Controllers\PersediaanController::class, 'delete'])->name('deletePersediaan');
Route::get('/persediaan/history', [App\Http\Controllers\PersediaanController::class, 'history'])->name('historyPersediaan');

Route::get('/rantai', [App\Http\Controllers\RantaiController::class, 'index'])->name('rantai');
Route::get('/rantai/form', [App\Http\Controllers\RantaiController::class, 'form'])->name('formRantai');
Route::get('/rantai/history', [App\Http\Controllers\RantaiController::class, 'history'])->name('historyRantai');
Route::get('/rantai/edit/{id}', [App\Http\Controllers\RantaiController::class, 'edit'])->name('editRantai');
Route::post('/rantai/store', [App\Http\Controllers\RantaiController::class, 'store'])->name('storeRantai');
Route::delete('/rantai/delete/{id}', [App\Http\Controllers\RantaiController::class, 'delete'])->name('deleteRantai');
Route::put('/rantai/update/{id}', [App\Http\Controllers\RantaiController::class, 'update'])->name('updateRantai');

Route::get('/mitigasi', [App\Http\Controllers\MitigasiController::class, 'index'])->name('mitigasi.index');
Route::get('/mitigasi/edit/{id_record}', [App\Http\Controllers\MitigasiController::class, 'edit'])->name('mitigasi.edit');
Route::get('/mitigasi/show/{id_record}', [App\Http\Controllers\MitigasiController::class, 'show'])->name('mitigasi.show');
Route::put('/mitigasi/update/{id_record}', [App\Http\Controllers\MitigasiController::class, 'update'])->name('mitigasi.update');

Route::get('/mitigasi/hor1', [App\Http\Controllers\MitigasiController::class, 'hor1'])->name('hor1Mitigasi');
Route::get('/mitigasi/hor1/connection/{id_record}', [App\Http\Controllers\MitigasiController::class, 'hor1Connection'])->name('hor1Connection');
Route::get('/mitigasi/hor1/result/{id_record}', [App\Http\Controllers\MitigasiController::class, 'hor1Result'])->name('hor1Result');
Route::get('/mitigasi/hor2/{id_record}', [App\Http\Controllers\MitigasiController::class, 'hor2'])->name('hor2Mitigasi');
Route::get('/mitigasi/hor2/connection/{id_record}', [App\Http\Controllers\MitigasiController::class, 'hor2Connection'])->name('hor2Connection');
Route::get('/mitigasi/hor2/result/{id_record}', [App\Http\Controllers\MitigasiController::class, 'hor2Result'])->name('hor2Result');
Route::post('/mitigasi/create', [App\Http\Controllers\MitigasiController::class, 'createHor1'])->name('mitigasi.create');
Route::post('/mitigasi/hor1/create', [App\Http\Controllers\MitigasiController::class, 'createConnectionHor1'])->name('mitigasi.createConnectionHor1');
Route::post('/mitigasi/create2', [App\Http\Controllers\MitigasiController::class, 'createHor2'])->name('mitigasi.create2');
Route::post('/mitigasi/hor2/create', [App\Http\Controllers\MitigasiController::class, 'createConnectionHor2'])->name('mitigasi.createConnectionHor2');

Route::get('/mitigasi/pdf/{id_record}/{id_category}', [App\Http\Controllers\MitigasiController::class, 'pdf'])->name('mitigasi.pdf');


Route::get('/mutu', [App\Http\Controllers\MutuController::class, 'index'])->name('mutu');
