<?php

use App\Http\Controllers\AuthMainController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::post('/register', [AuthController::class, 'register'])->name('register');
// Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
// Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');




Route::get('/home', [MainController::class, 'index'])->name('home');
Route::post('/home', [MainController::class, 'task_store'])->name('task.store');
Route::delete('/home/{task}', [MainController::class, 'task_destroy'])->name('task.destroy');
Route::post('/home/{task}', [MainController::class, 'task_complete'])->name('task.complete');

Route::get('/login', [AuthMainController::class, 'show_login'])->name('show.login');
Route::get('/register', [AuthMainController::class, 'show_register'])->name('show.register');
Route::post('/register', [AuthMainController::class, 'register'])->name('register');
Route::post('/login', [AuthMainController::class, 'login'])->name('login');
Route::post('/logout', [AuthMainController::class, 'logout'])->name('logout');


// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
