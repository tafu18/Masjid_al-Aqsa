<?php

use App\Http\Controllers\DenemeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::get('/deneme', [DenemeController::class, 'GamePlay'])->name('gamePlay');
Route::get('/control/{id}/{answer}',[DenemeController::class,'isCorrect'])->name('isCorrect');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/welcome', [DenemeController::class, 'TopList'])->name('TopList');