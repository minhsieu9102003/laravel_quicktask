<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/users',[UserController::class, 'index'])->name('users.index');
Route::get('/users/create',[UserController::class, 'create'])->name('users.create');
Route::get('/users/edit',[UserController::class, 'edit'])->name('users.edit');
Route::get('/users/{user}',[UserController::class, 'show'])->name('users.show');
Route::post('/user',[UserController::class, 'store'])->name('users.store'); 
Route::put('/users/{user}',[UserController::class, 'update'])->name('users.update'); 
Route::delete('/users/{user}',[UserController::class, 'delete'])->name('users.delete'); 

Route::resource('tasks',TaskController::class);