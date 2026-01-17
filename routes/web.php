<?php

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

Route::get('/', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts.list');

Route::prefix('contact')->group(function () {
    Route::get('/create', [App\Http\Controllers\ContactController::class, 'create'])->name('contacts.create');
    Route::post('/store', [App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');
    Route::get('/details/{id}', [App\Http\Controllers\ContactController::class, 'details'])->name('contacts.details');
});