<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
    Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
    Route::get('/todo/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::patch('/todo/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
    Route::patch('/todo/{todo}/uncomplete', [TodoController::class, 'uncomplete'])->name('todo.uncomplete');
    Route::get('/todo/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::patch('/todo/{todo}', [TodoController::class, 'update'])->name('todo.update');
    Route::delete('/todo/{todo}', [TodoController::class, 'destroy'])->name('todo.destroy');
    Route::delete('/todo', [TodoController::class, 'destroyCompleted'])->name('todo.deleteallcompleted');

    // Route Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
    Route::patch('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    
    Route::middleware('admin')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::patch('/user/{user}/makeadmin', [UserController::class, 'makeadmin'])->name('user.makeadmin');
        Route::patch('/user/{user}/removeadmin', [UserController::class, 'removeadmin'])->name('user.removeadmin');
    });
});

require __DIR__.'/auth.php';
