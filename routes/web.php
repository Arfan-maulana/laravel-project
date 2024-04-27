<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
    Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
    Route::get('/todo/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::patch('/todo/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
    Route::patch('/todo/{todo}/uncomplete', [TodoController::class, 'uncomplete'])->name('todo.uncomplete');
    Route::get('/todo/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::patch('/todo/{todo}', [TodoController::class, 'update'])->name('todo.update');
    Route::patch('/user/{user}/makeadmin', [UserController::class, 'makeadmin'])->name('user.makeadmin');
    Route::patch('/user/{user}/removeadmin', [UserController::class, 'removeadmin'])->name('user.removeadmin');
    Route::delete('/todo/{todo}', [TodoController::class, 'destroy'])->name('todo.destroy');
    Route::delete('/todo', [TodoController::class, 'destroyCompleted'])->name('todo.deleteallcompleted');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});



require __DIR__.'/auth.php';
