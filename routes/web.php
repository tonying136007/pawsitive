<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/schedule', [App\Http\Controllers\Scheduling\SchedController::class, 'index'])->name('schedule');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/accounts', [App\Http\Controllers\AccountController::class, 'index'])->name('accounts.index');

    Route::get('/accounts-list', [App\Http\Controllers\AccountController::class, 'usersTable'])->name('accounts-list');

    Route::get('/users/{user}/edit', [App\Http\Controllers\AccountController::class, 'edit'])->name('users.edit');
    
    Route::delete('/users/{user}', [App\Http\Controllers\AccountController::class, 'destroy'])->name('users.destroy');
});