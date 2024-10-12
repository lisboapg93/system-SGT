<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CreateAccount;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/createaccount', [CreateAccount::class, 'index'])->name('createaccount');
Route::post('/register', [UserController::class, 'create'])->name('register');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/tarefas', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tarefas', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tarefas/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tarefas/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});
