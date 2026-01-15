<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::view('/profile', 'profile')->name('profile');

    // 🎬 Film routes
    Route::get('/films', [FilmController::class, 'index'])->name('films.index');
    Route::post('/films', [FilmController::class, 'store'])->name('films.store');
    Route::patch('/films/{film}', [FilmController::class, 'update'])->name('films.update');
    Route::delete('/films/{film}', [FilmController::class, 'destroy'])->name('films.destroy');
});

require __DIR__.'/auth.php';
