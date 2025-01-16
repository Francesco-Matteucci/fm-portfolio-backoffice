<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProjectController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rotte di autenticazione
Auth::routes();

// Rotte admin, protette da auth
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.projects.index');
    })->name('dashboard');

    Route::resource('projects', ProjectController::class);
});