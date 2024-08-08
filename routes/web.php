<?php
<<<<<<< HEAD
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',function(){
    return view('welcome');
});

Route::middleware('auth')->group(function (){
    Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile',[ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class,'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->group(function (){
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::patch('/users/update', [UserController::class, 'update'])->name('users.update');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
   
});



Route::resource('tasks', TaskController::class);

Route::get('language/{lang}', [LanguageController::class, 'changeLanguage'])->name('locale');

require __DIR__ . '/auth.php';
=======

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



>>>>>>> 0b13237f8b9a66532c5259167da06378c0ef33e3
