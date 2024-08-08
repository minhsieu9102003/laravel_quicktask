<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ChangeLanguage;
use App\Http\Controllers\LanguageController;

    Route::get('/', function () {
        return view('welcome');
    })->middleware(ChangeLanguage::class);
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified','locale'])->name('dashboard');
    
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    })->middleware(ChangeLanguage::class);;
    Route::get('lang/{lang}', [LanguageController::class,'changeLanguage'])->name('locale')->middleware(ChangeLanguage::class);
    require __DIR__.'/auth.php';



