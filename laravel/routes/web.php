<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CreateAccount;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/createaccount', [CreateAccount::class, 'create'])->name('users.create');
Route::post('/register', [UserController::class, 'store'])->name('users.store');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');
Route::get('/home', [HomeController::class, 'index'])->name('home');


// Route::middleware(['auth'])->group(function () {
//     Route::post('/login', [HomeController::class, 'login'])->name('login');
//     Route::get('/tarefas', [TaskController::class, 'index'])->name('tasks.index');
//     Route::post('/tarefas', [TaskController::class, 'store'])->name('tasks.store');
//     Route::put('/tarefas/{id}', [TaskController::class, 'update'])->name('tasks.update');
//     Route::delete('/tarefas/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
// });

// Rota de Logout (Protegida por 'auth')
Route::middleware(['auth'])->post('/logout', [HomeController::class, 'logout'])->name('logout');


// Grupo de rotas para tarefas (Protegidas por 'auth')
Route::middleware(['auth'])->group(function () {
    // Route::post('/home', [LoginController::class, 'index'])->name('login');
    Route::get('/tarefas', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tarefas', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/tarefas/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tarefas/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

