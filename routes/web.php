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

    Route::get('/accounts/{account}/edit', [App\Http\Controllers\AccountController::class, 'edit'])->name('accounts.edit');
    Route::put('/accounts/{account}/update', [App\Http\Controllers\AccountController::class, 'update'])->name('accounts.update');

    Route::delete('/accounts/{account}', [App\Http\Controllers\AccountController::class, 'destroy'])->name('accounts.destroy');

    Route::post('/accounts/store', [App\Http\Controllers\AccountController::class, 'store'])->name('accounts.store');
    Route::post('/accounts/create', [App\Http\Controllers\AccountController::class, 'create'])->name('accounts.create');
});