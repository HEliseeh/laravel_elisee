<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\SessionsController;

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

Route::get('/', [PagesController::class, 'index']);

Route::get('/contact-us', [PagesController::class, 'contact']);

Route::get('/about', [PagesController::class, 'about']);

Route::get('/articles', [ArticlesController::class, 'index']);

Route::get('/article/{id}', [ArticlesController::class, 'show']);

Route::get('/create', [ArticlesController::class, 'create']);

Route::get('/articles/create', [ArticlesController::class, 'store']);

Route::get('/article/{article}/edit', [ArticlesController::class, 'edit']);

Route::patch('/article/{article}/edit', [ArticlesController::class, 'update']);   

Route::delete('/article/{article}/delete', [ArticlesController::class, 'delete']);    

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/login', [SessionsController::class, 'index'])->name('login');