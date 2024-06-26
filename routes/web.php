<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route accessible to guests
Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard.index');

Route::middleware(['superadmin'])->group(function () {
    // Superadmin specific routes go here
});

Route::middleware(['admin'])->group(function () {
    Route::get('/accounts', [App\Http\Controllers\AccountController::class, 'index'])->name('accounts.index');
    Route::get('/accounts-list', [App\Http\Controllers\AccountController::class, 'usersTable'])->name('accounts-list');
    Route::get('/accounts/{account}/edit', [App\Http\Controllers\AccountController::class, 'edit'])->name('accounts.edit');
    Route::put('/accounts/{account}/update', [App\Http\Controllers\AccountController::class, 'update'])->name('accounts.update');
    Route::delete('/accounts/{account}', [App\Http\Controllers\AccountController::class, 'destroy'])->name('accounts.destroy');
    Route::post('/accounts/store', [App\Http\Controllers\AccountController::class, 'store'])->name('accounts.store');
    Route::post('/accounts/create', [App\Http\Controllers\AccountController::class, 'create'])->name('accounts.create');

    Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients-list', [App\Http\Controllers\ClientController::class, 'clientTable'])->name('clients-list');
    Route::delete('/clients/{client}', [App\Http\Controllers\ClientController::class, 'destroy'])->name('clients.destroy');
    Route::get('/clients/{client}/edit', [App\Http\Controllers\ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}/update', [App\Http\Controllers\ClientController::class, 'update'])->name('clients.update');
    Route::post('/clients/store', [App\Http\Controllers\ClientController::class, 'store'])->name('clients.store');
    Route::post('/clients/view', [App\Http\Controllers\ClientController::class, 'view'])->name('clients.view');

    Route::get('/schedules', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedules.index');
    Route::get('/schedules-list', [App\Http\Controllers\ScheduleController::class, 'scheduleTable'])->name('schedules-list');
    Route::get('/schedules/{schedule}/edit', [App\Http\Controllers\ScheduleController::class, 'edit'])->name('schedules.edit');
    Route::put('/schedules/{schedule}/update', [App\Http\Controllers\ScheduleController::class, 'update'])->name('schedules.update');
    Route::delete('/schedules/{schedule}', [App\Http\Controllers\ScheduleController::class, 'destroy'])->name('schedules.destroy');
    Route::post('/schedules/store', [App\Http\Controllers\ScheduleController::class, 'store'])->name('schedules.store');
    Route::post('/schedules/create', [App\Http\Controllers\ScheduleController::class, 'create'])->name('schedules.create');
    Route::get('/schedules-table', [App\Http\Controllers\ScheduleController::class, 'viewSchedTable'])->name('schedules.viewtable');
    
    Route::get('/pets', [App\Http\Controllers\PetController::class, 'index'])->name('pets.index');
    Route::get('/pets-list', [App\Http\Controllers\PetController::class, 'petTable'])->name('pets-list');
    Route::post('/pets/store', [App\Http\Controllers\PetController::class, 'store'])->name('pets.store');
    Route::delete('/pets/{pet}', [App\Http\Controllers\PetController::class, 'destroy'])->name('pets.destroy');
    Route::get('/pets/{pet}/edit', [App\Http\Controllers\PetController::class, 'edit'])->name('pets.edit');
    Route::put('/pets/{pet}/update', [App\Http\Controllers\PetController::class, 'update'])->name('pets.update');
    Route::post('/pets/create', [App\Http\Controllers\PetController::class, 'create'])->name('pets.create');
    Route::get('/clients/{client}/pets', [App\Http\Controllers\PetController::class, 'view'])->name('pets.view');
});

Route::middleware(['user'])->group(function () {
    Route::get('/users', [App\Http\Controllers\UserDashboardController::class, 'index'])->name('user-dashboard.index');
    Route::get('/users/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('user-profile.index');
    
    // INFORMATION
    Route::get('/users/info/medical-services', [App\Http\Controllers\InfoController::class, 'index1'])->name('user-info.index-1');
    Route::get('/users/info/laboratory-tests', [App\Http\Controllers\InfoController::class, 'index2'])->name('user-info.index-2');
    Route::get('/users/info/diagnostic-imaging', [App\Http\Controllers\InfoController::class, 'index3'])->name('user-info.index-3');
    Route::get('/users/info/surgery', [App\Http\Controllers\InfoController::class, 'index4'])->name('user-info.index-4');
    Route::get('/users/info/emergency-services', [App\Http\Controllers\InfoController::class, 'index5'])->name('user-info.index-5');

    Route::get('/users/profile/edit-password', [App\Http\Controllers\ProfileController::class, 'editPassword'])->name('user-profile.edit-password');

});
