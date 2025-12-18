<?php

use App\Http\Controllers\Settings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HeroSlideController;

Route::get('/welcome', function () {
    return view('welcome');
})->name('home');

Route::get('/', function () {
    return view('index');
})->name('index');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::prefix('admin')
    ->middleware(['auth', 'verified'])->name('admin.')->group(function () {

    Route::get('hero-slides', [HeroSlideController::class, 'index'])->name('hero_slides.index');
    Route::get('hero-slides/create', [HeroSlideController::class, 'create'])->name('hero_slides.form');
    Route::post('hero-slides', [HeroSlideController::class, 'store'])->name('hero_slides.store');
    Route::get('hero-slides/{heroSlide}/edit', [HeroSlideController::class, 'edit'])->name('hero_slides.edit');
    Route::put('hero-slides/{heroSlide}', [HeroSlideController::class, 'update'])->name('hero_slides.update');
    Route::delete('hero-slides/{heroSlide}', [HeroSlideController::class, 'destroy'])->name('hero_slides.destroy');


});

Route::middleware(['auth'])->group(function () {
    Route::get('settings/profile', [Settings\ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::put('settings/profile', [Settings\ProfileController::class, 'update'])->name('settings.profile.update');
    Route::delete('settings/profile', [Settings\ProfileController::class, 'destroy'])->name('settings.profile.destroy');
    Route::get('settings/password', [Settings\PasswordController::class, 'edit'])->name('settings.password.edit');
    Route::put('settings/password', [Settings\PasswordController::class, 'update'])->name('settings.password.update');
    Route::get('settings/appearance', [Settings\AppearanceController::class, 'edit'])->name('settings.appearance.edit');
});

require __DIR__.'/auth.php';

// DBEAVER
// TABLEPLUS

// Comando para instalar laravel con composer: