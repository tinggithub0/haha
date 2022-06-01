<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TodoListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/home');
Route::view('/home', '/home')->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// message
Route::prefix('message')->group(function () {
    Route::controller(MessageController::class)->group(function () {
        Route::get('/', 'index')->name('message');
        Route::get('/{id}', 'show')->name('message.show');
        Route::post('/', 'store');
        Route::put('/{id}', 'finish');
        Route::delete('/{id}', 'delete');
    });
});

// todolist
Route::prefix('todolist')->group(function () {
    Route::controller(TodoListController::class)->group(function () {
        Route::get('/', 'index')->name('todolist');
        Route::post('/', 'store');
        Route::put('/{id}', 'finish');
        Route::delete('/{id}', 'delete');
    });
});


