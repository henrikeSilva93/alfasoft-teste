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
Route::get('/auth/login', [App\Http\Controllers\AuthController::class, 'loginPage'])->name('login.page');
Route::post('/auth/login', [App\Http\Controllers\AuthController::class, 'loginRequest'])->name('login.request');
Route::get('/auth/register', [App\Http\Controllers\AuthController::class, 'Register'])->name('auth.register');
Route::post('/auth/register', [App\Http\Controllers\AuthController::class, 'RegisterRequest'])->name('auth.register.request');
Route::get('/auth/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('contact')->group(function () {
    Route::get('/create', [App\Http\Controllers\ContactController::class, 'create'])->name('contacts.create');
    Route::post('/store', [App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');
    Route::get('/details/{id}', [App\Http\Controllers\ContactController::class, 'details'])->name('contacts.details');
    Route::get('/edit/{id}', [App\Http\Controllers\ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('/update/{id}', [App\Http\Controllers\ContactController::class, 'update'])->name('contacts.update');
    Route::get('/delete/{id}', [App\Http\Controllers\ContactController::class, 'delete'])->name('contacts.delete');
})->middleware('auth');
