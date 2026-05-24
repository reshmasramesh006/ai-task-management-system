<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect home to tasks (clean entry point)
Route::redirect('/', '/tasks');

// Auth protected routes
Route::middleware(['auth'])->group(function () {

    // Task module (Repository + Service pattern)
    Route::resource('tasks', TaskController::class);

    // Optional dashboard (if needed)
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

// Auth routes (Breeze / Jetstream)
require __DIR__.'/auth.php';