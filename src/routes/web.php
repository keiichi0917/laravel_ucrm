<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\InertiaTestController;

/*
|--------------------------------------------------------------------------
| InertiaTest 用のルーティング
|--------------------------------------------------------------------------
*/

Route::prefix('inertia')->name('inertia.')->group(function () {
    Route::get('/', [InertiaTestController::class, 'index'])->name('index');          // /inertia
    Route::get('/create', [InertiaTestController::class, 'create'])->name('create');  // /inertia/create
    Route::post('/', [InertiaTestController::class, 'store'])->name('store');         // POST /inertia
    Route::get('/show/{id}', [InertiaTestController::class, 'show'])->name('show');   // /inertia/show/1
    Route::delete('{id}', [InertiaTestController::class, 'delete'])->name('delete');
});

/*
|--------------------------------------------------------------------------
| その他の標準ルーティング
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
