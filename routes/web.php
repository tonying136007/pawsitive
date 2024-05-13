<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/schedule', [App\Http\Controllers\Scheduling\ScheduleController::class, 'index'])->name('schedule');

Route::middleware(['auth'])->group(function () {
    Route::get('/accounts', [App\Http\Controllers\AccountController::class, 'index'])->name('accounts.index');
    Route::get('/accounts-list', [App\Http\Controllers\AccountController::class, 'usersTable'])->name('accounts-list');

    Route::get('/accounts/{account}/edit', [App\Http\Controllers\AccountController::class, 'edit'])->name('accounts.edit');
    
    Route::put('/accounts/{account}/update', [App\Http\Controllers\AccountController::class, 'update'])->name('accounts.update');

    Route::delete('/accounts/{account}', [App\Http\Controllers\AccountController::class, 'destroy'])->name('accounts.destroy');

    Route::post('/accounts/store', [App\Http\Controllers\AccountController::class, 'store'])->name('accounts.store');
    Route::post('/accounts/create', [App\Http\Controllers\AccountController::class, 'create'])->name('accounts.create');

    Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients-list', [App\Http\Controllers\ClientController::class, 'clientTable'])->name('clients-list');

    Route::post('/clients/store', [App\Http\Controllers\ClientController::class, 'store'])->name('clients.store');

    Route::get('/clients/{client}/edit', [App\Http\Controllers\ClientController::class, 'edit'])->name('clients.edit');
    
    Route::put('/clients/{client}/update', [App\Http\Controllers\ClientController::class, 'update'])->name('clients.update');

    Route::delete('/clients/{client}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('clients.destroy');
    
    
});